<?php

namespace App\Models;
use CodeIgniter\Model;

class EventsModel extends Model
{
    protected $table      = 'events';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['uid', 'masterkey', 'event_id','event_date','event_name','participants','matches_percentage','created_at', 'updated_at'];

    public function getSearchAll($searchMain = null)
    {
        $builder = $this->db->table('events');

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
                ->orLike('event_id', $searchMain)
                ->orLike('event_date', $searchMain)
                ->orLike('event_name', $searchMain)
                ->orLike('participants', $searchMain)
                ->orLike('matches_percentage', $searchMain)
                ->orLike('created_at', $searchMain)
                ->orLike('updated_at', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}