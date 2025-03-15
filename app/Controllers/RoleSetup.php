<?php

namespace App\Controllers;
use App\Models\Addrolesetup;
use App\Controllers\PeginationController;

class RoleSetup extends \App\Controllers\BaseController
{
    protected $session;
    protected $permissionname;

    public function __construct()
    {
        $this->session = \Config\Services::session(); 
        helper(['url']); 

        $this->permissionname = 'Permissions'; 
        permissionvaluecheck($this->permissionname);
    }

    public function index()
    {
        $master = $this->permissionname;
        $detailsModel = new Addrolesetup();
        $selectDetails = $detailsModel->findAll();
        $mainDetails = [   
            'dashboard' => $master,
            'title' => $master, 
            'heading' => "Manage $master", 
            'print' => '', 
            'searchname' => "Manage $master", 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'th'=>["Rolls Name"],
            'mainid'=> "get$master",
            'addbtnroute'=> "admin/add$master/$master",
            'routeURL'=> "get$master",
            'editroute'=> "admin/edit$master/$master/",
            'deleteURL'=> "admin/delete$master",
            'td'=>json_encode(["discription"]),
        ];
        return view('admin/settings/permission_settings/manageroles', $mainDetails);
    }

    public function addPage($master)
    {
        $permission = permissiontypecheck($this->permissionname,'create');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to("$master");
        }
        $mainDetails = [   
                            'dashboard' => $master,
                            'title' => $master, 
                            'print' => '', 
                            'heading'=> "Add $master", 
                            'detailsdata'=> json_encode([]),
                            'editit' => false,
                            'formid' => "form$master",
                            'formroute' => "admin/set$master",
                            'successroute' => "admin/$master",
                        ];
        return view('admin/settings/permission_settings/add_edit_rolesetup', $mainDetails);
    }

    public function editPage($master,$uid)
    {
        $permission = permissiontypecheck($this->permissionname,'edit');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to("$master");
        }
        $detailsModel = new Addrolesetup();
        $selectDetails = $detailsModel
            ->where('uid', $uid)
            ->first();
        $mainDetails = json_encode([$selectDetails]);
        $id = $selectDetails['id'];
        $addDatas = [   
                        'dashboard' => $master,
                        'title' => $master, 
                        'heading'=> "Add $master",  
                        'detailsdata'=> $mainDetails,
                        'editit' => $id,
                        'formid' => "form$master",
                        'formroute' => "admin/setupdate$master",
                        'successroute' => "admin/$master",
                    ];
        return view('admin/settings/permission_settings/add_edit_rolesetup', $addDatas);
    }

    public function dataInsert()
    {
        $permission = permissiontypecheck($this->permissionname,'create');
        if(!$permission){
            return $this->response->setJSON([
                'status' => 'error',
                'locationChange' => true,
                'message' => 'Your are not having permission for access this!!'
            ]);
        }
        $detailsModel = new Addrolesetup();
        $data = $this->request->getVar("addrolesid");
        $data = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON received in addrolesid");
        }
        $processedData = [];
        foreach ($data as $item) {
            $item['uid'] = bin2hex(random_bytes(8)); 
            $item['created_at'] = date('Y-m-d H:i:s'); 
            $item['updated_at'] = date('Y-m-d H:i:s'); 
            $processedData[] = $item;
        }
        foreach ($processedData as $record) {
            $detailsModel->insert($record);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => true,
            'message' => 'Data inserted successfully!'
        ]);
    }

    public function dataUpdate(){
        $permission = permissiontypecheck($this->permissionname,'edit');
        if(!$permission){
            return $this->response->setJSON([
                'status' => 'error',
                'locationChange' => true,
                'message' => 'Your are not having permission for access this!!'
            ]);
        }
        $detailsModel = new Addrolesetup();

        $id = $this->request->getVar(index: "edit");
        $selectedValue  = $detailsModel->where('id', $id)->first();
        $uid = $selectedValue['uid'];

        $data = $this->request->getVar("addrolesid");
        $data = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON received in addrolesid");
        }
        $processedData = [];
        foreach ($data as $item) {
            $item['uid'] = $uid; 
            $item['updated_at'] = date('Y-m-d H:i:s'); 
            $processedData[] = $item;
        }
        foreach ($processedData as $record) {
            $detailsModel->update($id, $record);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => true,
            'message' => 'Data Updated successfully!'
        ]);
    }


    public function deletedetails()
    {
        $permission = permissiontypecheck($this->permissionname,'delete');
        if(!$permission){
            return $this->response->setJSON([
                'status' => 'error',
                'locationChange' => true,
                'message' => 'Your are not having permission for access this!!'
            ]);
        }
        $detailsModel = new Addrolesetup();
        
        if ($this->request->getPost('delete')) {
            $id = $this->request->getPost('delete');
            $detailsModel->delete($id);
    
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Deleted row successfully!',
                'new_csrf_token' => csrf_hash(),
            ]);
        }
    
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid request!',
            'new_csrf_token' => csrf_hash(), 
        ]);
    }

    public function getalldetails()
    {
        $detailsModel = new Addrolesetup();
        $pagelimit = $this->request->getPost('pagelimit');
        $masterkey = $this->request->getPost('masterkey');
        
        $limit = $pagelimit;
        $searchMain = $this->request->getPost('allData');
        $offset = $this->request->getVar('page'); 

        $builder = $detailsModel->getSearchAll($searchMain);
        if($masterkey){
            $totalRows = $builder->where('masterkey',$masterkey)->countAllResults(false); 
            $builder->where('masterkey',$masterkey)->orderBy('id', 'ASC')->offset($offset)->limit($limit);
        }else{
            $totalRows = $builder->countAllResults(false); 
            $builder->orderBy('id', 'ASC')->offset($offset)->limit($limit);
        }
        
        $data = $builder->get()->getResultArray();

        // Configure pagination
        $pagination = new PeginationController([
           'baseURL' => base_url('assets/include/getPeginationData.php'),
           'totalRows' => $totalRows,
           'perPage' => $limit,
           'currentPage' => $offset,
           'contentDiv' => 'normal',
           'getpagechange' => 'leadbrowse'
        ]);

        // Output JSON response
        return $this->response->setJSON([
           'status' => 'success',
           'data' => $data,
           'pagination' => $pagination->createLinks()
        ]);
    }
}
