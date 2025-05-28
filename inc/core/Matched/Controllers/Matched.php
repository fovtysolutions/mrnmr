<?php
namespace Core\Matched\Controllers;
use App\Controllers\PeginationController;

class Matched extends \CodeIgniter\Controller
{
    public function __construct()
    {
        $this->config = include realpath(__DIR__ . "/../Config.php");
        $this->model = new \Core\Matched\Models\MatchedModel();
        $this->db = \Config\Database::connect();
        $this->master =  $this->config['id'];
    }

    public function index()
    {
        $master = $this->master;
        $permission = permissionvaluecheck($this->config['id'], 'create');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to($master);
        }
        $addDatas = [
            'contentfilename' => 'Core\Matched\Views\contentinputfields',
            'title' => "Matched",
            'heading' => "Add Matched",
            'detailsdata' => [],
            'editit' => false,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Matched\Views\content', $addDatas)
        ];
        return view('Core\Matched\Views\index', $data);
    }

    public function get()
    {
        $permission = permissionvaluecheck($this->config['id'], 'view');
        if(!$permission){
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'You have not permission to access this page!',
                'new_csrf_token' => csrf_hash()
            ]);
        }
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
        $permission = permissionvaluecheck($this->config['id'], 'create');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to($master);
        }
        $addDatas = [
            'contentfilename' => 'Core\Matched\Views\contentinputfields',
            'title' => "Matched",
            'heading' => "Add Matched",
            'detailsdata' => [],
            'editit' => false,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Matched\Views\content', $addDatas)
        ];
        return view('Core\Matched\Views\index', $data);
    }

    public function edit($id)
    {
        $master = $this->master;
        $permission = permissionvaluecheck($this->config['id'], 'edit');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to($master);
        }
        $detailsModel = $this->model->getById($id);
        $id = $detailsModel->id;
        $addDatas = [
            'contentfilename' => 'Core\Matched\Views\contentinputfields',
            'title' => "Matched",
            'heading' => "Edit Matched",
            'detailsdata' => $detailsModel,
            'editit' => $id,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Matched\Views\content', $addDatas)
        ];
        return view('Core\Matched\Views\index', $data);
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

    public function deleteit()
    {
        $permission = permissionvaluecheck($this->config['id'], 'delete');
        if(!$permission){
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'You have not permission to access this page!',
                'new_csrf_token' => csrf_hash()
            ]);
        }
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
