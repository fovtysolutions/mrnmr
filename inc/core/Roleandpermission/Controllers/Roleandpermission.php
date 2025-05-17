<?php
namespace Core\Roleandpermission\Controllers;
use App\Controllers\PeginationController;

class Roleandpermission extends \CodeIgniter\Controller
{
    public function __construct()
    {
        $this->config = include realpath(__DIR__ . "/../Config.php");
        $this->model = new \Core\Roleandpermission\Models\RoleandpermissionModel();
        $this->db = \Config\Database::connect();
        $this->master = "roleandpermission";
    }

    public function index()
    {
        $master = $this->master;
        $contentdetails = [
            'dashboard' => $master,
            'title' => $master, 
            'heading' => "Roll List", 
            'print' => '', 
            'searchname' => "Roll List", 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'th'=>["Role Name","Role Description","Role Status"],
            'mainid' => "get$master",
            'addbtnroute' => "$master/add",
            'routeURL' => "$master/get",
            'editroute' => "/$master/edit/",
            'deleteURL' => "$master/deleteit",
            'td'=>json_encode(["role_name","role_discription","role_status"]),
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Roleandpermission\Views\Roleandpermissionpage', $contentdetails)
        ];
        return view('Core\Roleandpermission\Views\index', $data);
    }

    public function get()
    {
        $pagelimit = $this->request->getVar('pagelimit');

        $limit = $pagelimit;
        $searchMain = $this->request->getVar('allData');
        $offset = $this->request->getVar('page');

        $builder = $this->model->getSearchAll($searchMain);

        $totalRows = $builder->countAllResults(false);
        $builder->orderBy('id', 'ASC')->offset($offset)->limit($limit);

        $data = $builder->get()->getResultArray();

        $pagination = new PeginationController([
            'baseURL' => base_url('assets/include/getPeginationData.php'),
            'totalRows' => $totalRows,
            'perPage' => $limit,
            'currentPage' => $offset,
            'contentDiv' => 'normal',
            'getpagechange' => 'leadbrowse'
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $data,
            'pagination' => $pagination->createLinks()
        ]);
    }

    public function add()
    {
        $master = $this->master;
        $addDatas = [
            'dashboard' => $master,
            'title' => "Role & Permissions",
            'heading' => "Add Role & Permissions",
            'detailsdata' => [],
            'editit' => false,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'permission'=> json_encode([]),
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Roleandpermission\Views\content', $addDatas)
        ];
        return view('Core\Roleandpermission\Views\index', $data);
    }

    public function edit($id)
    {
        $master = $this->master;
        $detailsModel = $this->model->getById($id);
        $id = $detailsModel->id;
        $permissions = json_decode($detailsModel->permissions);
        $addDatas = [
            'dashboard' => $master,
            'title' => "Role & Permissions",
            'heading' => "Add Role & Permissions",
            'detailsdata' => $detailsModel,
            'editit' => $id,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'permission'=> json_encode($permissions),
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Roleandpermission\Views\content', $addDatas)
        ];
        return view('Core\Roleandpermission\Views\index', $data);
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
        } else {
            $postData['role_status'] = 'Active';  
            $postData['uid'] = uniqid(); 
        }
        try {
            unset($postData['csrf']);
            unset($postData['permission']);
            if ($isEdit) {
                unset($postData['edit']);
                if(!$this->model->updateit($isEdit, $postData)){
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
                        'message' => "something went wrong!!hjhggh",
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
    
    public function deleteit()
    {
        if ($ids = $this->request->getPost('delete')) {
            if ($this->model->deleteit($ids)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Password Changed Successfully!!',
                    'new_csrf_token' => csrf_hash(),
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Something went wrong!!',
                    'new_csrf_token' => csrf_hash(),
                ]);
            }
        }
    }
}
