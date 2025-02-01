<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileMrRightModel extends Model
{
    protected $table      = 'profile_your_mr_right';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','partner_age', 'partner_height', 'partner_weight','partner_location', 'partner_education','partner_profession', 'partner_annual_income','partner_food_pref', 'partner_lifestyle_habits','partner_degree_of_openness', 'partner_hobbies', 'partner_religion', 'partner_ideology','partner_family_info', 'partner_describe_d', 'partner_us_to_consider','created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('profile_your_mr_right');

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
                ->like('partner_age', $searchMain)
                ->orLike('partner_height', $searchMain)
                ->orLike('partner_weight', $searchMain)
                ->like('partner_location', $searchMain)
                ->like('partner_education', $searchMain)
                ->like('partner_profession', $searchMain)
                ->like('partner_annual_income', $searchMain)
                ->like('partner_food_pref', $searchMain)
                ->like('partner_lifestyle_habits', $searchMain)
                ->like('partner_degree_of_openness', $searchMain)
                ->like('partner_hobbies', $searchMain)
                ->like('partner_religion', $searchMain)
                ->like('partner_ideology', $searchMain)
                ->like('partner_family_info', $searchMain)
                ->like('partner_describe_d', $searchMain)
                ->like('partner_us_to_consider', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}