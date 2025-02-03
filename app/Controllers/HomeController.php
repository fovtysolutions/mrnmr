<?php

namespace App\Controllers;
use App\Models\CertificateModel;

class HomeController extends \App\Controllers\BaseController
{
    protected $session;
    protected $routes;
    protected $masters;

    public function __construct()
    {
        $this->session = \Config\Services::session(); 
        helper(['url']);
        $this->routes = 'dashboard'; 
        $this->masters = 'Dashboard'; 
    }

    public function index()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $usedid = $masters;
        $ids = ["school_name","name","school_class"];
        $requireids = ["school_name","name","school_class"];
        $mainDetails = [   
                            'dashboard' => $masters,
                            'title' => $masters, 
                            'heading'=> "$masters", 
                            'jsonData'=> json_encode([]),
                            'edititsingle' => false,
                            'formid' => "form$route",
                            'formroute' => "set$route",
                            'location' => '',
                            'masterkey'=> $masters,
                            'inputids'=>$ids,
                            'requireids'=>$requireids,
                            'usedid'=>$usedid,
                            'changepage'=>'',
                            'laststep'=>'laststep',
                            'increasing' => false,
                            'rowdisplay'=> true
                        ];
        return view('admin/dashboard/dashboard', $mainDetails);
    }

    public function dataInsert()
    {
        $masters = $this->masters;
        $detailsModel = new CertificateModel();
        $data = $this->request->getPost();
        $data['uid'] = bin2hex(random_bytes(8)); 
        $data['masterkey'] = $masters; 
        $data['created_at'] = date('Y-m-d H:i:s'); 
        $data['updated_at'] = date('Y-m-d H:i:s'); 
        $detailsModel->insert($data);
        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => true,
            'message' => 'Data inserted successfully!',
            'name' => $this->request->getPost('name'),
            'school_class' => $this->request->getPost('school_class'),
            'school_name' => $this->request->getPost('school_name'),
            'new_csrf_token' => csrf_hash()
        ]);
    }
}
