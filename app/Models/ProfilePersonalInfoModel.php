<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfilePersonalInfoModel extends Model
{
    protected $table      = 'personal_information';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid', 'name', 'email', 'mobile', 'age', 'dob', 'height', 'weight', 'location', 'complete_address','education', 'profession', 'annual_income', 'food_pref', 'lifestyle_habits', 'religion','drinker', 'smoker', 'degree_of_openness', 'ideology', 'hobbies', 'family_info','describe_d', 'past_relationship','created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('personal_information');

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
                ->like('name', $searchMain)
                ->orLike('email', $searchMain)
                ->orLike('mobile', $searchMain)
                ->orLike('age', $searchMain)
                ->orLike('dob', $searchMain)
                ->orLike('height', $searchMain)
                ->orLike('weight', $searchMain)
                ->orLike('location', $searchMain)
                ->orLike('complete_address', $searchMain)
                ->orLike('education', $searchMain)
                ->orLike('profession', $searchMain)
                ->orLike('annual_income', $searchMain)
                ->orLike('food_pref', $searchMain)
                ->orLike('lifestyle_habits', $searchMain)
                ->orLike('religion', $searchMain)
                ->orLike('drinker', $searchMain)
                ->orLike('smoker', $searchMain)
                ->orLike('degree_of_openness', $searchMain)
                ->orLike('ideology', $searchMain)
                ->orLike('hobbies', $searchMain)
                ->orLike('family_info', $searchMain)
                ->orLike('describe_d', $searchMain)
                ->orLike('past_relationship', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}