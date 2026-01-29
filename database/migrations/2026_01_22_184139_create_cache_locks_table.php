<?php

use App\Helper\Database\AssetManagerMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  public function __construct() {
    parent::__construct();
    $this->table = 'cache_locks';
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->fullTableName(), function(Blueprint $table) {
      $table->string('key')->primary();
      $table->string('owner');
      $table->integer('expiration')->index();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->fullTableName());
  }
};
