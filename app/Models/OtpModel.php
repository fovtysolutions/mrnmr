<?php

namespace App\Models;
use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table      = 'otp';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['branch_id','useruid','userotp', 'userlink','created_at','updated_at'];
}
