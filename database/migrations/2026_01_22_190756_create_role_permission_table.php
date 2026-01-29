<?php

use App\Helper\Database\AssetManagerMigration;
use App\Repository\Models\UserManagement\RolePermission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  /** @var \App\Repository\Models\UserManagement\RolePermission $model */
  private RolePermission $model;

  public function __construct() {
    parent::__construct();
    $this->model = new RolePermission();
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->model->getTable(), function(Blueprint $table) {
      $table->uuid('role_id');
      $table->uuid('permission_id');

      // create timestamp field
      $this->timestamp($table);

      // create table index
      $table->index('role_id', 'idx_role_permission1');
      $table->index('permission_id', 'idx_role_permission2');

      // foreign key
      $table->foreign('role_id', 'fk_role_permission1')
        ->references('id')->on('user_management.roles')
        ->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('permission_id', 'fk_role_permission2')
        ->references('id')->on('user_management.permissions')
        ->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->model->getTable());
  }
};