<?php

namespace App\Controllers;
use App\Models\MrPerfectModel;
use App\Controllers\PeginationController;

class MrPerfectController extends \App\Controllers\BaseController
{
    protected $routegroupname;
    protected $routes;
    protected $masters;

    public function __construct()
    {
        $this->routegroupname = 'admin'; 
        $this->routes = 'mrperfect'; 
        $this->masters = 'MrPerfect'; 
    }

    public function index()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new MrPerfectModel();
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
            'th'=>["MrnMr ID","Age Range","Height Range","Weight Range","Location","Food Pref","Lifestyle","Degree of Openness","Hobbies","Religion","Ideology","Qualities","Additional","Negotiable Requirement","Non Negotiable Requirements","Partner Sexual Position","Political Ideology","Pet Friendly","Want To Have Children","Want To Get Married","Have Children ?","Previous Marriage ?","HIV Status"],
            'td'=>json_encode(["mrnmr_id", "age_range", "height_range", "weight_range", "location", "food_pref", "lifestyle", "degree_of_openness", "hobbies", "religion", "ideology", "qualities", "additional", "negotiable_requirement", "non_negotiable_requirements", "partner_sexual_position", "political_ideology", "pet_friendly", "want_to_have_children", "want_to_get_married", "have_children", "previous_marriage", "hiv_status",]),
            'mainid'=> "get$route",
            'addbtnroute'=> "$group/add$route/$masters",
            'routeURL'=> "$group/get$route",
            'editroute'=> "$group/edit$route/$masters/",
            'deleteURL'=> "$group/delete$route",
            'masterkey'=> $masters,
        ];
        return view('admin/mrperfect/mrperfect', $mainDetails);
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
        return view('admin/mrperfect/add_edit_mrperfect', $mainDetails);
    }

    public function editPage($master,$uid)
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new MrPerfectModel();
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
        return view('admin/mrperfect/add_edit_mrperfect', $addDatas);
    }

    public function dataInsert()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $detailsModel = new MrPerfectModel();
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
        $detailsModel = new MrPerfectModel();
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
        $detailsModel = new MrPerfectModel();
    
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
        $detailsModel = new MrPerfectModel();
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
