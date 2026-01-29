<?php

namespace Database\Seeders;

use App\Repository\Models\UserManagement\Permission;
use Illuminate\Database\Seeder;

class DefaultPermissions extends Seeder {
  /**
   * @return void
   */
  public function run() : void {
    $data = [
      [
        'id' => 'd6e113a2-efcc-4b18-85e9-7fbd2ae2da2c',
        'name' => 'UserManagement.User.Create',
        'label' => 'Create New User',
      ],
      [
        'id' => 'f20b19b1-28dc-4eac-b7d0-ba3e42ff4954',
        'name' => 'UserManagement.User.Delete',
        'label' => 'Delete Existing User',
      ]
    ];

    foreach($data as $d) {
      Permission::create([
        'id' => $d['id'],
        'name' => $d['name'],
        'label' => $d['label'],

        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
  }
}