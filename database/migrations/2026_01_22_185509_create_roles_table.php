<?php

use App\Helper\Database\AssetManagerMigration;
use App\Repository\Models\UserManagement\Role;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  /** @var \App\Repository\Models\UserManagement\Role $model */
  private Role $model;

  public function __construct() {
    parent::__construct();
    $this->model = new Role();
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->model->getTable(), function(Blueprint $table) {
      $table->uuid('id');
      $table->string('name', 150);
      $table->string('short_description', 255)
        ->nullable();
      $table->unsignedInteger('level')->default(0);

      // create timestamp field
      $this->timestamp($table, true);

      // setup primary key for the table
      $table->primary('id');

      // create table index
      $table->index('level', 'idx_roles1');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->model->getTable());
  }
};