<?php

namespace App\Models;
use CodeIgniter\Model;

class CertificateModel extends Model
{
    protected $table      = 'certificate';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid', 'masterkey', "school_uid", "school_name", "name", "school_class", 'created_at', 'updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('certificate');

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
                ->orLike('masterkey', $searchMain)
                ->orLike('school_name', $searchMain)
                ->orLike('name', $searchMain)
                ->orLike('school_class', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}