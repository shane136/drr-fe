<?php

namespace App\Models;

use CodeIgniter\Model;

class Training extends Model
{
  protected $table = 'training';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'CONTACT', 'ADDRESS', 'POSITION'];

}