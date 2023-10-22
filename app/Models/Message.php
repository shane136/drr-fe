<?php

namespace App\Models;

use CodeIgniter\Model;

class message extends Model
{
  protected $table = 'message';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'INCIDENT', 'CONTACT', 'LOCATION'];
}