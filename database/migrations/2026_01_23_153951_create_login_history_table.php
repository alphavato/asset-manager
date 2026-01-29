<?php

use App\Helper\Database\AssetManagerMigration;
use App\Repository\Models\UserManagement\LoginHistory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  /** @var \App\Repository\Models\UserManagement\LoginHistory $model */
  private LoginHistory $model;

  public function __construct() {
    parent::__construct();
    $this->model = new LoginHistory();
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->model->getTable(), function(Blueprint $table) {
      $table->uuid('id');
      $table->uuid('user_id');
      $table->string('ip_address', 50);
      $table->string('user_agent', 255)
        ->nullable();
      $table->boolean('is_success');

      // create timestamp field
      $this->timestamp($table);

      // setup primary key for the table
      $table->primary('id');

      // create table index
      $table->index('user_id', 'idx_login_history1');
      $table->index('ip_address', 'idx_login_history2');
      $table->index('is_success', 'idx_login_history3');
      $table->index('created_at', 'idx_login_history4');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->model->getTable());
  }
};