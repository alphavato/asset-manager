<?php

namespace App\Helper\Database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class AssetManagerMigration extends Migration {
  /** @var string $table table name */
  protected string $table;

  /** @var string schema name */
  protected string $schema;

  public function __construct() {
    $this->table = '';
    $this->schema = '';
  }

  /**
   * this function will return a table with schema name depends
   * on $table and $schema props
   *
   * @return string table name with schema
   */
  protected function fullTableName() : string {
    if(trim($this->schema) === '') {
      $this->schema = 'system';
    }

    return trim(sprintf("%s.%s", $this->schema, $this->table));
  }

  protected function timestamp(Blueprint $table, bool $softDelete = false) : void {
    $table->timestamp('created_at')
      ->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->timestamp('updated_at')
      ->default(DB::raw('CURRENT_TIMESTAMP'));

    if($softDelete) {
      $table->timestamp('deleted_at')
        ->nullable()->default(null);
    }
  }
}