<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileReferenceModel extends Model
{
    protected $table      = 'profile_reference';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','ref1_name',  'ref1_phone','ref1_address', 'ref2_name', 'ref2_phone', 'ref2_address','created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('profile_reference');

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
                ->like('ref1_name', $searchMain)
                ->orLike('ref1_phone', $searchMain)
                ->orLike('ref1_address', $searchMain)
                ->like('ref2_name', $searchMain)
                ->orLike('ref2_phone', $searchMain)
                ->orLike('ref2_address', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}