<?php
namespace Core\Profile\Controllers;
use App\Controllers\PeginationController;

class Profile extends \CodeIgniter\Controller
{
    public function __construct()
    {
        $this->config = include realpath(__DIR__ . "/../Config.php");
        $this->model = new \Core\Profile\Models\ProfileModel();
        $this->db = \Config\Database::connect();
        $this->master =  $this->config['id'];
    }

    public function index()
    {
        $master = $this->master;
        $userprofile = $this->model->getByuId('user');
        $profiledetails = $this->model->getByuId('profile_details');
        $contentdetails = [
            'contentfilename' => 'Core\Profile\Views\contentinputfields',
            'title' => $master, 
            'heading' => "Profile", 
            'userprofile' => $userprofile,
            'profile' => $profiledetails,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Profile\Views\frontpage', $contentdetails)
        ];
        return view('Core\Profile\Views\index', $data);
    }

    public function edit()
    {
        $master = $this->master;
        $checkprofile = $this->model->checkandaddprofile();
        $userprofile = $this->model->getByuId('user');
        $profiledetails = $this->model->getByuId('profile_details');
        $uid = $userprofile->uid;
        $addDatas = [
            'contentfilename' => 'Core\Profile\Views\contentinputfields',
            'title' => "Profile",
            'heading' => "Edit Profile",
            'editit' => $uid,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
            'userprofile' => $userprofile,
            'profile' => $profiledetails,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Profile\Views\content', $addDatas)
        ];
        return view('Core\Profile\Views\index', $data);
    }

    public function datasetup()
    {
        $isEdit = $this->request->getPost('edit');
        $postData = $this->request->getPost();
        if ($isEdit) {
            $id = $this->request->getPost('edit');
            $selectedValue = $this->model->getById($id);
            if (!$selectedValue) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid data or record not found.',
                    'new_csrf_token' => csrf_hash()
                ]);
            }
            $postData['updated_at'] = date('Y-m-d H:i:s');
            $user = [
                'username' => $postData['username'],
                'email' => $postData['email'],
                'mobile' => $postData['mobile'],
                'age' => $postData['age'],
                'city' => $postData['city'],
                'state' => $postData['state'],
                'profession' => $postData['profession'],
                'familybg' => $postData['familybg'],
            ];   

        } else {
            $postData['uid'] = bin2hex(random_bytes(8)); 
            $postData['masterkey'] = $this->master; 
            $postData['created_at'] = date('Y-m-d H:i:s'); 
            $postData['updated_at'] = date('Y-m-d H:i:s');   
        }
        try {
            unset($postData['csrf']);
            if ($isEdit) {
                unset($postData['edit']);
                unset($postData['username']);
                unset($postData['email']);
                unset($postData['mobile']);
                unset($postData['age']);
                unset($postData['city']);
                unset($postData['state']);
                unset($postData['profession']);
                unset($postData['familybg']);
                if(!$this->model->updateit('profile_details',$isEdit, $postData) && !$this->model->updateit('user',$isEdit, $user)){
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => "something went wrong!!",
                        'new_csrf_token' => csrf_hash()
                    ]);
                }
                $message = 'Data updated successfully!!';
            } else {
                if(!$this->model->insertit($postData)){
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => "something went wrong!!",
                        'new_csrf_token' => csrf_hash()
                    ]);
                }
                $message = 'Data saved successfully!!';
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while saving the data.',
                'details' => $e->getMessage(),
                'new_csrf_token' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => base_url($this->master),
            'message' => $message,
            'csrf_token' => csrf_hash(),
        ]);
    }
}
