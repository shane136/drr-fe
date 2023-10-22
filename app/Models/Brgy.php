<?php

namespace App\Models;

use CodeIgniter\Model;

class Brgy extends Model
{
  protected $table = 'brgy';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['BRGY', 'NAME', 'CONTACT_NUMBER', 'EMAIL_ADD'];
}