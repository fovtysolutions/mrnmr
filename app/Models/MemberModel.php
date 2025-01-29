<?php

namespace App\Models;
use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table      = 'member';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid', 'masterkey', 'mrnmr_id','registration_date','first_name','last_name','membership_status','personal_interview_date','days_to_reg_end','dob','age','height','weight','location','education','profession','annual_income','food_pref','smoker','drinker','hobbies','religion','political_ideology','family_info','describe_d','past_relationship','photo','email','phone','sexual_position','anal_sex_mandatory','out_to_parents','degree_of_openness','relationship_type','want_to_get_married','want_to_have_children','idea_of_romance','social_media_handles','pet_friendly','have_children','previous_marriage','hiv_status', 'created_at', 'updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('member');

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
                ->orLike('registration_date', $searchMain)
                ->orLike('first_name', $searchMain)
                ->orLike('last_name', $searchMain)
                ->orLike('membership_status', $searchMain)
                ->orLike('personal_interview_date', $searchMain)
                ->orLike('days_to_reg_end', $searchMain)
                ->orLike('dob', $searchMain)
                ->orLike('age', $searchMain)
                ->orLike('height', $searchMain)
                ->orLike('weight', $searchMain)
                ->orLike('location', $searchMain)
                ->orLike('education', $searchMain)
                ->orLike('profession', $searchMain)
                ->orLike('annual_income', $searchMain)
                ->orLike('food_pref', $searchMain)
                ->orLike('smoker', $searchMain)
                ->orLike('drinker', $searchMain)
                ->orLike('hobbies', $searchMain)
                ->orLike('religion', $searchMain)
                ->orLike('family_info', $searchMain)
                ->orLike('describe_d', $searchMain)
                ->orLike('past_relationship', $searchMain)
                ->orLike('photo', $searchMain)
                ->orLike('email', $searchMain)
                ->orLike('phone', $searchMain)
                ->orLike('sexual_position', $searchMain)
                ->orLike('anal_sex_mandatory', $searchMain)
                ->orLike('out_to_parents', $searchMain)
                ->orLike('degree_of_openness', $searchMain)
                ->orLike('relationship_type', $searchMain)
                ->orLike('want_to_get_married', $searchMain)
                ->orLike('want_to_have_children', $searchMain)
                ->orLike('idea_of_romance', $searchMain)
                ->orLike('social_media_handles', $searchMain)
                ->orLike('pet_friendly', $searchMain)
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