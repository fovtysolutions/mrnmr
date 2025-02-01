<?php

namespace App\Models;
use CodeIgniter\Model;

class ProfileSocialmediaModel extends Model
{
    protected $table      = 'profile_social_media_links';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid','instagram_link', 'facebook_link', 'twitter_link', 'linkedin_link','created_at','updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('profile_social_media_links');

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
                ->like('instagram_link', $searchMain)
                ->orLike('facebook_link', $searchMain)
                ->orLike('twitter_link', $searchMain)
                ->like('linkdin_link', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}