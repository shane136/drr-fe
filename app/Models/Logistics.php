<?php

namespace App\Models;

use CodeIgniter\Model;

class Logistics extends Model
{
  protected $table = 'logistics';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'CONTACT', 'ADDRESS', 'POSITION'];
}