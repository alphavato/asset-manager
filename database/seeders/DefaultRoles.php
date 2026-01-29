<?php

namespace Database\Seeders;

use App\Repository\Models\UserManagement\Role;
use Illuminate\Database\Seeder;

class DefaultRoles extends Seeder {
  /**
   * @return void
   */
  public function run() : void {
    $roles = [
      [
        'id' => '8a041853-5fd9-4b61-a9bd-3b07b404664d',
        'name' => 'Super Administrator',
        'level' => 999,
      ],
      [
        'id' => 'f20b19b1-28dc-4eac-b7d0-ba3e42ff4954',
        'name' => 'Auditor',
        'level' => 100,
      ]
    ];

    foreach($roles as $role) {
      Role::create([
        'id' => $role['id'],
        'name' => $role['name'],
        'level' => $role['level'],
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
  }
}