<?php
namespace Core\Events\Models;
use CodeIgniter\Model;

class EventsModel extends Model
{
	public function __construct(){
        $this->config = include realpath( __DIR__."/../Config.php" );
        $this->db = \Config\Database::connect();
    }

    public $settinginfo;

    public function settings(){
        $query = $this->db->table('setting')->get();
        return $query->getRow(); 
    }

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
                ->like('rolename', $searchMain)
                ->orlike('description', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }

    public function getById($id){
        $query = $this->db->table('events')->where('id', $id)->get();
        return $query->getRow(); 
    } 

    public function updateit($id, $data)
    {
        if (!is_numeric($id)) {
            return $id; 
        }
        return $this->db->table('events')->where('id', $id)->update($data);
    }

    public function insertit($data)
    {
        return $this->db->table('events')->insert($data);
    }

    public function deleteit($id)
    {
        return $this->db->table('events')->where('id', $id)->delete();
    }
}
