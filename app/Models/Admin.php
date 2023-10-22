<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
  protected $table = 'admin';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'CONTACT', 'ADDRESS', 'POSITION'];
}