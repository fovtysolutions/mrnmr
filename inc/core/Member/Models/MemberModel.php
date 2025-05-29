<?php
namespace Core\Member\Models;
use CodeIgniter\Model;

class MemberModel extends Model
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
                ->like('rolename', $searchMain)
                ->orlike('description', $searchMain)
                ->groupEnd();
        }
        return $builder;
    }

    public function getById($id){
        $query = $this->db->table('member')->where('uid', $id)->get();
        return $query->getRow(); 
    } 

    public function getperfectById($id){
        $query = $this->db->table('mymrperfect')->where('uid', $id)->get();
        return $query->getRow(); 
    }

    public function updateDataone($id, $data)
    {
        return $this->db->table('member')->where('uid', $id)->update($data);
    }

    public function updateDatatwo($id, $data)
    {
        return $this->db->table('mymrperfect')->where('uid', $id)->update($data);
    }

    public function inserDataone($data)
    {
        return $this->db->table('member')->insert($data);
    }

    public function inserDatatwo($data)
    {
        return $this->db->table('mymrperfect')->insert($data);
    }

    public function deleteit($id)
    {
        return $this->db->table('member')->where('id', $id)->delete();
    }
}
