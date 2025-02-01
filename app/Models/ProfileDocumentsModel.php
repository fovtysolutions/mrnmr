<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileDocumentsModel extends Model
{
    protected $table      = 'profile_documents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','photo1', 'photo2', 'address_proof', 'pan_card','created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('profile_documents');

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
                ->like('photo1', $searchMain)
                ->orLike('photo2', $searchMain)
                ->orLike('address_proof', $searchMain)
                ->like('pan_card', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}