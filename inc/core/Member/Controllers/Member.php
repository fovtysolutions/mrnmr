<?php
namespace Core\Member\Controllers;
use App\Controllers\PeginationController;

class Member extends \CodeIgniter\Controller
{
    public function __construct()
    {
        $this->config = include realpath(__DIR__ . "/../Config.php");
        $this->model = new \Core\Member\Models\MemberModel();
        $this->db = \Config\Database::connect();
        $this->master =  $this->config['id'];
    }

    public function index()
    {
        $master = $this->master;
        $contentdetails = [
            'contentfilename' => 'Core\Member\Views\contentinputfields',
            'title' => $master, 
            'heading' => "Member List", 
            'print' => '', 
            'searchname' => "Member List", 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'th'=>["MrnMr ID","Date of registration","First Name","Last Name","Membership Status","Personal Interview Date","Days To Reg. End","DOB","Age","Height","Weight","Location","Education","Profession","Annual Income (INR)","Food Pref","Smoker","Drinker","Hobbies","Religion","Political Ideology","Family Info.","Describe","Past Relationship","Photo","Email","Phone","MySexual Position","Anal Sex Mandatory","Out To Parents","Degree of Openness","Type of Relationship","Want To Get Married","Want To Have Children","The Idea Of Romance","Social Media Handles","Pet Friendly","Have Children ?","Previous Marriage ?","HIV Status"],
            'mainid' => "get$master",
            'addbtnroute' => "$master/add",
            'routeURL' => "$master/get",
            'editroute' => "/$master/edit/",
            'deleteURL' => "$master/deleteit",
            'td' => json_encode(["mrnmr_id","registration_date","first_name","last_name","membership_status","personal_interview_date","days_to_reg_end","dob","age","height","weight","location","education","profession","annual_income","food_pref","smoker","drinker","hobbies","religion","political_ideology","family_info","describe_d","past_relationship","photo","email","phone","sexual_position","anal_sex_mandatory","out_to_parents","degree_of_openness","relationship_type","want_to_get_married","want_to_have_children","idea_of_romance","social_media_handles","pet_friendly","have_children","previous_marriage","hiv_status"]),
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Member\Views\frontpage', $contentdetails)
        ];
        return view('Core\Member\Views\index', $data);
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
            'contentfilename' => 'Core\Member\Views\contentinputfields',
            'title' => "Member",
            'heading' => "Add Member",
            'detailsdata' => [],
            'perfectdata' => [],
            'editit' => false,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Member\Views\content', $addDatas)
        ];
        return view('Core\Member\Views\index', $data);
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
        $perfectdetailsModel = $this->model->getperfectById($id);
        $id = $detailsModel->uid;
        $addDatas = [
            'contentfilename' => 'Core\Member\Views\contentinputfields',
            'title' => "Member",
            'heading' => "Edit Member",
            'detailsdata' => $detailsModel,
            'perfectdatas' => $perfectdetailsModel,
            'editit' => $id,
            'formid' => "form$master",
            'formroute' => "$master/datasetup",
            'successroute' => $master,
        ];
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view('Core\Member\Views\content', $addDatas)
        ];
        return view('Core\Member\Views\index', $data);
    }

    public function datasetup()
    {
        $dataone = $this->request->getPost('dataone') ?? [];
        $datatwo = $this->request->getPost('datatwo') ?? [];

        $isEdit = isset($dataone['edit']) && !empty($dataone['edit']);

        if ($isEdit) {
            $id = $dataone['edit'];
            $selectedValue = $this->model->getById($id);

            if (!$selectedValue) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid data or record not found.',
                    'new_csrf_token' => csrf_hash()
                ]);
            }

            $dataone['updated_at'] = date('Y-m-d H:i:s');
            $datatwo['updated_at'] = date('Y-m-d H:i:s');
        } else {
            $uid = bin2hex(random_bytes(8));
            $timestamp = date('Y-m-d H:i:s');

            $dataone['uid'] = $uid;
            $datatwo['uid'] = $uid;
            $dataone['masterkey'] = $this->master;
            $datatwo['masterkey'] = $this->master;
            $dataone['created_at'] = $timestamp;
            $dataone['updated_at'] = $timestamp;
            $datatwo['created_at'] = $timestamp;
            $datatwo['updated_at'] = $timestamp;
        }

        try {
            unset($dataone['csrf']);
            unset($datatwo['csrf']);

            if ($isEdit) {
                unset($dataone['edit']);
                if (
                    !$this->model->updateDataone($id, $dataone) ||
                    !$this->model->updateDatatwo($id, $datatwo)
                ) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Something went wrong!!',
                        'new_csrf_token' => csrf_hash()
                    ]);
                }
                $message = 'Data updated successfully!!';
            } else {
                if (
                    !$this->model->inserDataone($dataone) ||
                    !$this->model->inserDatatwo($datatwo)
                ) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Something went wrong!!',
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
            'new_csrf_token' => csrf_hash()
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
