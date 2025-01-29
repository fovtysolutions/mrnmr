<?php

namespace App\Models;
use CodeIgniter\Model;

class MrPerfectModel extends Model
{
    protected $table      = 'mymrperfect';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid', 'masterkey', 'mrnmr_id','age_range','height_range','weight_range','location','food_pref','lifestyle','degree_of_openness','hobbies','religion','ideology','qualities','additional','negotiable_requirement','non_negotiable_requirements','partner_sexual_position','political_ideology','pet_friendly','want_to_have_children','want_to_get_married','have_children','previous_marriage','hiv_status','created_at', 'updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('mymrperfect');

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
                ->orLike('mrnmr_id', $searchMain)
                ->orLike('age_range', $searchMain)
                ->orLike('height_range', $searchMain)
                ->orLike('weight_range', $searchMain)
                ->orLike('location', $searchMain)
                ->orLike('food_pref', $searchMain)
                ->orLike('lifestyle', $searchMain)
                ->orLike('degree_of_openness', $searchMain)
                ->orLike('hobbies', $searchMain)
                ->orLike('religion', $searchMain)
                ->orLike('ideology', $searchMain)
                ->orLike('qualities', $searchMain)
                ->orLike('additional', $searchMain)
                ->orLike('negotiable_requirement', $searchMain)
                ->orLike('non_negotiable_requirements', $searchMain)
                ->orLike('partner_sexual_position', $searchMain)
                ->orLike('political_ideology', $searchMain)
                ->orLike('pet_friendly', $searchMain)
                ->orLike('want_to_have_children', $searchMain)
                ->orLike('want_to_get_married', $searchMain)
                ->orLike('have_children', $searchMain)
                ->orLike('previous_marriage', $searchMain)
                ->orLike('hiv_status', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}