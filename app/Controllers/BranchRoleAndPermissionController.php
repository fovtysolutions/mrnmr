<?php

namespace App\Controllers;
use App\Models\RolesAndPermissionModel;
use App\Models\Addrolesetup;
use App\Controllers\PeginationController;

class BranchRoleAndPermissionController extends \App\Controllers\BaseController
{
    protected $session;
    protected $permissionname;

    public function __construct()
    {
        $this->session = \Config\Services::session(); 
        helper(['url']); 

        $this->permissionname = 'Roles And Permissions'; 
        permissionvaluecheck($this->permissionname);
    }
    public function index()
    {
        $master = $this->permissionname;
        $detailsModel = new RolesAndPermissionModel();
        $selectDetails = $detailsModel->findAll();
        $mainDetails = [   
            'dashboard' => $master,
            'title' => $master, 
            'heading' => $master, 
            'print' => '', 
            'searchname' => $master, 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'th'=>["Role Name","Role Description","Role Status"],
            'mainid'=> 'getroleandpermission',
            'addbtnroute'=> "roleandpermission/$master",
            'routeURL'=> 'getroleandpermission',
            'editroute'=> "/roleandpermissionedit/$master/",
            'deleteURL'=> 'deleteroleandpermission',
            'td'=>json_encode(["role_name","role_discription","role_status"]),
        ];
        return view('admin/settings/permission_settings/rollandpermissions', $mainDetails);
    }

    public function addPage($master)
    {
        $permission = permissiontypecheck($this->permissionname,'create');
        if(!$permission){
            session()->setFlashdata('error', 'You have not permission to access this page!');
            return redirect()->to("roleandpermission");
        }
        $rolesModel = new Addrolesetup();
        $rolesDetails = $rolesModel->findAll();
        $mainDetails = [   
                            'dashboard' => $master,
                            'title' => $master, 
                            'heading'=> "Add $master", 
                            'detailsdata'=> json_encode([]),
                            'editit' => false,
                            'permissions' => $rolesDetails,
                            'permission'=> json_encode([]),
                        ];
        return view('admin/settings/permission_settings/role_view_edit_add', $mainDetails); 
    }

    public function editPage($master,$uid)
    {
            $permission = permissiontypecheck($this->permissionname,'edit');
            if(!$permission){
                session()->setFlashdata('error', 'You have not permission to access this page!');
                return redirect()->to("roleandpermission");
            }
            $rolesModel = new Addrolesetup();
            $rolesDetails = $rolesModel->findAll();
            $detailsModel = new RolesAndPermissionModel();
            $selectDetails = $detailsModel->where('uid', $uid)->first();
            $permission = json_decode($selectDetails['permission']);
            $permission = json_encode($permission);
            $ids = $selectDetails['id'];
            $detailsadded = [   
                                'dashboard' => $master,
                                'title' => $master, 
                                'heading'=> 'View / Edit', 
                                'permission'=> $permission, 
                                'detailsdata'=> $selectDetails,
                                'permissions' => $rolesDetails,
                                'editit' => $ids,
                            ];
            return view('admin/settings/permission_settings/role_view_edit_add', $detailsadded);
    }

    public function dataInsert()
    {
        if($this->request->getVar(index: "edit")){
            $permission = permissiontypecheck($this->permissionname,'edit');
            if(!$permission){
                return $this->response->setJSON([
                    'status' => 'error',
                    'locationChange' => true,
                    'message' => 'Your are not having permission for access this!!'
                ]);
            }
        }else{
            $permission = permissiontypecheck($this->permissionname,'create');
            if(!$permission){
                return $this->response->setJSON([
                    'status' => 'error',
                    'locationChange' => true,
                    'message' => 'Your are not having permission for access this!!'
                ]);
            }
        }
        $detailsModel = new RolesAndPermissionModel();
        if($this->request->getVar(index: "edit")){
            $id = $this->request->getVar(index: "edit");
            $selectedValue  = $detailsModel->where('id', $id)->first();
            $uid = $selectedValue['uid'];
        }else{
            $uid = bin2hex(random_bytes(8));
        }

        $data = $this->request->getPost(); 
        $data['uid'] = $uid;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['session_true'] = true;
        
        if(!$this->request->getVar(index: "edit")){
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        $this->session->set($data);

        $sessionData = $this->session->get();

        if($this->request->getVar(index: "edit")){
            $id = $this->request->getVar(index: "edit");
            $detailsModel->update($id, $sessionData);
        }else{
            $detailsModel->insert($sessionData);
        }

        $this->session->remove('session_true');
        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => true,
            'message' => 'Data inserted successfully successfully!!',
            'csrf_token' => csrf_hash(),
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
        $detailsModel = new RolesAndPermissionModel();
        if($this->request->getVar(index: "delete")){
            $id = $this->request->getVar(index: "delete");
            $detailsModel->delete($id);
            return $this->response->setJSON([
                'status' => 'success',
                'massage' => 'deleted row!!',
                'csrf_token' => csrf_hash(),
            ]);
        }

    }

    public function getalldetails()
    {
        $detailsModel = new RolesAndPermissionModel();
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
