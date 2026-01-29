<?php

use App\Helper\Database\AssetManagerMigration;
use App\Repository\Models\UserManagement\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {

  /** @var \App\Repository\Models\UserManagement\User $model */
  private User $model;

  public function __construct() {
    parent::__construct();
    $this->model = new User;
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->model->getTable(), function(Blueprint $table) {
      $table->uuid('id');
      $table->string('first_name', 150);
      $table->string('last_name', 150)
        ->nullable();
      $table->string('email', 255);
      $table->string('password', 255)
        ->nullable();
      $table->uuid('role_id');

      // create timestamp field
      $this->timestamp($table, true);

      // setup primary key for the table
      $table->primary('id');

      // create table index
      $table->index('email', 'idx_users1');
      $table->index('role_id', 'idx_users2');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->model->getTable());
  }
};