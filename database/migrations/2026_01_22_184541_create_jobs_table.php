<?php

use App\Helper\Database\AssetManagerMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends AssetManagerMigration {
  public function __construct() {
    parent::__construct();
    $this->table = 'jobs';
  }

  /**
   * Run the migrations.
   */
  public function up() : void {
    Schema::create($this->fullTableName(), function(Blueprint $table) {
      $table->id();
      $table->string('queue')->index();
      $table->longText('payload');
      $table->unsignedTinyInteger('attempts');
      $table->unsignedInteger('reserved_at')->nullable();
      $table->unsignedInteger('available_at');
      $table->unsignedInteger('created_at');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void {
    Schema::dropIfExists($this->fullTableName());
  }
};
