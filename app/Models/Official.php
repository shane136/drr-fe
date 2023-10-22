<?php

namespace App\Models;

use CodeIgniter\Model;

class Official extends Model
{
  protected $table = 'official';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'ADDRESS', 'NUMBER', 'EMAIL_ADDRESS', 'DEPARTMENT_ID'];
}