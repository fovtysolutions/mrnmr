<?php

namespace App\Models;
use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','username', 'email', 'mobile','age','city','profession','familybg','password','verify','user_type', 'created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('users');

        if (is_array($searchMain)) {
            $builder->groupStart(); 
            foreach ($searchMain as $field => $value) {
                if (!empty($value)) {
                    $builder->orLike($field, $value); 
                }
            }
            $builder->groupEnd();
            $log = json_encode($builder);
            return $builder;
        }

        if (!empty($searchMain)) {
            $builder->groupStart()
                ->like('username', $searchMain)
                ->orLike('email', $searchMain)
                ->orLike('mobile', $searchMain)
                ->orLike('age', $searchMain)
                ->orLike('city', $searchMain)
                ->orLike('profession', $searchMain)
                ->orLike('familybg', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}