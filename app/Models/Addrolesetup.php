<?php

namespace App\Models;
use CodeIgniter\Model;

class Addrolesetup extends Model
{
    protected $table      = 'rolesetup';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','discription', 'created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('rolesetup');

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
                ->like('discription', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}