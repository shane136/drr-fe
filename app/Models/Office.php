<?php

namespace App\Models;

use CodeIgniter\Model;

class Office extends Model
{
  protected $table = 'office';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME'];
}