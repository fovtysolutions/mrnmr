<?php
namespace Core\Profile\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
	public function __construct(){
        $this->config = include realpath( __DIR__."/../Config.php" );
        $this->db = \Config\Database::connect();
        $this->session = session();
        $this->uid = $this->session->get('uid');
    }

    public $settinginfo;

    public function settings(){
        $query = $this->db->table('setting')->get();
        return $query->getRow(); 
    }

    public function getUsersprofile(){
        $query = $this->db->table('user')
                          ->select('user.*, profile_details.*')
                          ->join('profile_details', 'profile_details.uid = user.uid', 'left')
                          ->where('user.uid', $this->uid)
                          ->get();
        return $query->getRow(); 
    }

    public function checkandaddprofile(){
        $query = $this->db->table('profile_details')->where('uid', $this->uid)->get()->getRow();
        if(!$query){
            $data = [
                'uid' => $this->uid
            ];
            return $this->insertit($data);
        }
        return true;
    }

    public function getByuId($table){
        $query = $this->db->table($table)->where('uid', $this->uid)->get();
        return $query->getRow(); 
    }

    public function getById($id){
        $query = $this->db->table('profile_details')->where('uid', $id)->get();
        return $query->getRow(); 
    } 

    public function updateit($table, $id, $data)
    {
        return $this->db->table($table)->where('uid', $id)->update($data);
    }

    public function insertit($data)
    {
        return $this->db->table('profile_details')->insert($data);
    }
}
