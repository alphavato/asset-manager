<?php

use App\Helper\Database\AssetManagerMigration;
use App\Repository\Models\UserManagement\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  /** @var \App\Repository\Models\UserManagement\Permission $model */
  private Permission $model;

  public function __construct() {
    parent::__construct();
    $this->model = new Permission();
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->model->getTable(), function(Blueprint $table) {
      $table->uuid('id');
      $table->string('name', 255);
      $table->string('label', 150)
        ->nullable();
      $table->string('short_description', 255)
        ->nullable();

      // create timestamp field
      $this->timestamp($table, true);

      // setup primary key for the table
      $table->primary('id');

      // create table index
      $table->index('name', 'idx_permissions1');
      $table->unique('name');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->model->getTable());
  }
};