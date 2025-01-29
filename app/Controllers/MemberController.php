<?php

namespace App\Controllers;
use App\Models\MemberModel;
use App\Controllers\PeginationController;

class MemberController extends \App\Controllers\BaseController
{
    protected $routegroupname;
    protected $routes;
    protected $masters;

    public function __construct()
    {
        $this->routegroupname = 'admin'; 
        $this->routes = 'member'; 
        $this->masters = 'Member'; 
    }

    public function index()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new MemberModel();
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
            'th'=>["MrnMr ID","Date of registration","First Name","Last Name","Membership Status","Personal Interview Date","Days To Reg. End","DOB","Age","Height","Weight","Location","Education","Profession","Annual Income (INR)","Food Pref","Smoker","Drinker","Hobbies","Religion","Political Ideology","Family Info.","Describe","Past Relationship","Photo","Email","Phone","MySexual Position","Anal Sex Mandatory","Out To Parents","Degree of Openness","Type of Relationship","Want To Get Married","Want To Have Children","The Idea Of Romance","Social Media Handles","Pet Friendly","Have Children ?","Previous Marriage ?","HIV Status"],
            'td'=>json_encode(["mrnmr_id","registration_date","first_name","last_name","membership_status","personal_interview_date","days_to_reg_end","dob","age","height","weight","location","education","profession","annual_income","food_pref","smoker","drinker","hobbies","religion","political_ideology","family_info","describe_d","past_relationship","photo","email","phone","sexual_position","anal_sex_mandatory","out_to_parents","degree_of_openness","relationship_type","want_to_get_married","want_to_have_children","idea_of_romance","social_media_handles","pet_friendly","have_children","previous_marriage","hiv_status"]),
            'mainid'=> "get$route",
            'addbtnroute'=> "$group/add$route/$masters",
            'routeURL'=> "$group/get$route",
            'editroute'=> "$group/edit$route/$masters/",
            'deleteURL'=> "$group/delete$route",
            'masterkey'=> $masters,
        ];
        return view('admin/member/member', $mainDetails);
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
        return view('admin/member/add_edit_member', $mainDetails);
    }

    public function editPage($master,$uid)
    {
        $route = $this->routes;
        $masters = $this->masters;
        $group = $this->routegroupname;
        $detailsModel = new MemberModel();
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
        return view('admin/member/add_edit_member', $addDatas);
    }

    public function dataInsert()
    {
        $route = $this->routes;
        $masters = $this->masters;
        $detailsModel = new MemberModel();
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
        $detailsModel = new MemberModel();
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
        $detailsModel = new MemberModel();
    
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
        $detailsModel = new MemberModel();
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
