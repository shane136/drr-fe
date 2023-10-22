<?php

namespace App\Models;

use CodeIgniter\Model;

class notification extends Model
{
  protected $table = 'notification';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['NAME', 'INCIDENT', 'CONTACT', 'LOCATION', 'STATUS'];
}