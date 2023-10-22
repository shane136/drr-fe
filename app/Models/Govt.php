<?php

namespace App\Models;

use CodeIgniter\Model;

class Govt extends Model
{
  protected $table = 'govt';

  protected $primaryKey = 'ID';
  protected $allowedFields = ['HEAD', 'CONTACT', 'EMAIL', 'OFFICE_ID'];
}