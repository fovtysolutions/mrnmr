<?php

namespace App\Controllers;
use App\Models\EventsModel;
use App\Controllers\PeginationController;

class EventsController extends \App\Controllers\BaseController
{
    protected $routegroupname;
    protected $routes;
    protected $masters;

    public function __construct()
    {
        $this->routegroupname = 'admin'; 
        $this->routes = 'events'; 
        $this->masters = 'Events'; 
    }

    public function index()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new EventsModel();
        $selectDetails = $detailsModel->findAll();
        $mainDetails = [   
            'dashboard' => $masters,
            'title' => $masters, 
            'heading' => "$masters", 
            'print' => '', 
            'searchname' => "Manage $masters", 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'th'=>["Event Id","Event Date","Event Name","Participants","Matches Percentage"],
            'td'=>json_encode(["event_id","event_date","event_name","participants","matches_percentage"]),
            'mainid'=> "get$route",
            'addbtnroute'=> "$group/add$route/$masters",
            'routeURL'=> "$group/get$route",
            'editroute'=> "$group/edit$route/$masters/",
            'deleteURL'=> "$group/delete$route",
            'masterkey'=> $masters,
        ];
        return view('admin/events/events', $mainDetails);
    }

    public function addPage($master)
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $mainDetails = [   
                            'dashboard' => $masters,
                            'title' => $masters, 
                            'heading'=> "$masters", 
                            'detailsdata'=> json_encode([]),
                            'editit' => false,
                            'formid' => "form$route",
                            'formroute' => "$group/set$route",
                            'successroute' => "$group/$route",
                            'masterkey'=> $masters,
                        ];
        return view('admin/events/add_edit_events', $mainDetails);
    }

    public function editPage($master,$uid)
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new EventsModel();
        $selectDetails = $detailsModel->where('uid', $uid)->first();
        $mainDetails = json_encode([$selectDetails]);
        $id = $selectDetails['id'];
        $addDatas = [   
                        'dashboard' => $masters,
                        'title' => $masters, 
                        'heading'=> "$masters",  
                        'detailsdata'=> $mainDetails,
                        'editit' => $id,
                        'formid' => "form$route",
                        'formroute' => "$group/setupdate$route",
                        'successroute' => "$group/$route",
                        'masterkey'=> $masters,
                    ];
        return view('admin/events/add_edit_events', $addDatas);
    }

    public function dataInsert()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $detailsModel = new EventsModel();
        $data = $this->request->getVar($masters);
        $masterkey = $this->request->getVar('masterkey');
        $data = json_decode($data, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Invalid JSON received in addrolesid");
        }
        $processedData = [];
        foreach ($data as $item) {
            $item['uid'] = bin2hex(random_bytes(8)); 
            $item['masterkey'] = $masterkey; 
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
            'message' => 'Data inserted successfully!',
            'new_csrf_token' => csrf_hash()
        ]);
    }

    public function dataUpdate(){
        $route = $this->routes;
        $masters = $this->masters;
        $detailsModel = new EventsModel();
        $id = $this->request->getVar(index: "edit");
        $selectedValue  = $detailsModel->where('id', $id)->first();
        $uid = $selectedValue['uid'];

        $data = $this->request->getVar($masters);
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
            'message' => 'Data Updated successfully!',
            'new_csrf_token' => csrf_hash()
        ]);
    }

    public function deletedetails()
    {
        $detailsModel = new EventsModel();
    
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
        $detailsModel = new EventsModel();
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
           'pagination' => $pagination->createLinks(),
           'new_csrf_token' => csrf_hash()
        ]);
    }
}
