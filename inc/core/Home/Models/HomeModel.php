<?php
namespace Core\Home\Models;
use CodeIgniter\Model;

class HomeModel extends Model
{
    public $settinginfo;
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'image', 'last_login', 'last_logout', 'ip_address', 'status', 'is_admin', 'usertype', 'password'];

    public function settings(){
        $query = $this->db->table('setting')->get();
        return $query->getRow(); 
    }

    public function checkUser($email, $password)
    {
        $user = $this->db->table('user')
            ->where('email', $email)
            ->get()
            ->getRow();

            if ($user && password_verify($password, $user->password)) {
                return $user;
            }
        return null;
    }

    public function checkEmail($email)
    {
        $email = $this->db->table('user')
            ->where('email', $email)
            ->get()
            ->getRow();
        return $email;
    }


    public function setRegister(array $data)
    {
        $builder = $this->db->table('user');
        return $builder->insert($data);
    }

    public function last_login($id)
    {
        return $this->db->table('user')
            ->set('last_login', date('Y-m-d H:i:s'))
            ->set('ip_address', $_SERVER['REMOTE_ADDR'])
            ->where('id', $id)
            ->update();
    }

    public function last_logout($id)
    {
        return $this->db->table('user')
            ->set('last_logout', date('Y-m-d H:i:s'))
            ->where('id', $id)
            ->update();
    }
}
