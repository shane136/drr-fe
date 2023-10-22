<?php

namespace App\Models;

use CodeIgniter\Model;

class Ops extends Model
{
  protected $table = 'ops';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'CONTACT', 'ADDRESS', 'POSITION'];
}