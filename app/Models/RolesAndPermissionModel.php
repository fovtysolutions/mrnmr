<?php

namespace App\Models;
use CodeIgniter\Model;

class RolesAndPermissionModel extends Model
{
    protected $table      = 'rolesandpermission';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','role_name', 'role_status', 'permission', 'role_discription', 'created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('rolesandpermission');

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
                ->like('role_name', $searchMain)
                ->like('role_status', $searchMain)
                ->like('role_discription', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}