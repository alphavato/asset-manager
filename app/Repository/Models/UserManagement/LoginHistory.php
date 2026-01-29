<?php

namespace App\Repository\Models\UserManagement;

use App\Repository\Models\BaseModel;

class LoginHistory extends BaseModel {
  /** @var string $table */
  protected $table = 'user_management.login_history';
}