<?php

namespace App\Models;

use CodeIgniter\Model;

class Accounts extends Model
{
  protected $table = 'accounts';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'ACCOUNT_TYPE', 'USERNAME', 'PASSWORD'];
}