<?php

use App\Helper\Database\AssetManagerMigration;

return new class extends AssetManagerMigration {
  /**
   * Run the migrations.
   */
  public function up() : void {
    DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');

    DB::statement('CREATE SCHEMA IF NOT EXISTS "user_management";');
    DB::statement('CREATE SCHEMA IF NOT EXISTS "system";');
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    DB::statement('DROP SCHEMA IF EXISTS user_management CASCADE;');
    DB::statement('DROP SCHEMA IF EXISTS system CASCADE;');
  }
};
