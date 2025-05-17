<?php
namespace Core\Dashboard\Controllers;
use App\Controllers\PeginationController;

class Dashboard extends \CodeIgniter\Controller
{
    public function __construct(){
        $this->config = include realpath( __DIR__."/../Config.php" );
        $this->model = new \Core\Dashboard\Models\DashboardModel();
        $this->db = \Config\Database::connect();
    }
    
    public function index( $page = false ) {
        $master = "dashboard";
        $dashboarddata = [
            'dashboard' => $master,
            'title' => $master, 
            'heading' => "Dashboard", 
            'print' => '', 
            'searchname' => "Search $master", 
            'searching'=> '',
            'filterinput'=> '',
            'filterids'=>json_encode([]),
            'mainid'=> "get$master",
            'addbtnroute'=> "$master/add",
            'routeURL'=> "$master/get",
            'editroute'=> "/$master/edit/",
            'deleteURL'=> "$master/deleteit",
        ];
        $view = view("Core\Dashboard\Views\home",$dashboarddata);
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => $view,
        ];
        return view('Core\Dashboard\Views\index', $data);
    }

    public function get()
    {
        $pagelimit = $this->request->getVar('pagelimit');

        $limit = $pagelimit;
        $searchMain = $this->request->getVar('allData');
        $offset = $this->request->getVar('page'); 

        $whichfunction = $this->request->getVar('whichfunction');
        $builder = $this->model->getSearchAll($searchMain, $whichfunction);
        

        if($whichfunction == 'arrivals'){
            $builder->orderBy('start', 'ASC');
            $builder->select('name, adult, rooms, start, reserve_status');
        }else if($whichfunction == 'departures'){
            $builder->orderBy('end', 'ASC');
            $builder->select('name, adult, rooms, end, reserve_status');
        }else{
            $builder->orderBy('id', 'ASC');
        }
        
        $totalRows = $builder->countAllResults(false); 
        $builder->offset($offset)->limit($limit);
        $data = $builder->get()->getResultArray();

        $colorMap = [
            '#198754' => 'Check In',
            '#ffca2c' => 'Reserved',
            '#0d6efd' => 'Temporary Reserved',
            '#6c757d' => 'Hold'
        ];
        
        foreach ($data as &$value) {
            $value['colorstatus'] = $colorMap[$value['reserve_status']] ?? 'Unknown';
        }

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
           'check' => $searchMain,
           'data' => $data,
           'pagination' => $pagination->createLinks()
        ]);
    }
}