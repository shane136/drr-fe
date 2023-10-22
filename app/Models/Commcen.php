<?php

namespace App\Models;

use CodeIgniter\Model;

class Commcen extends Model
{
  protected $table = 'commcen';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'CONTACT', 'ADDRESS', 'POSITION'];
}