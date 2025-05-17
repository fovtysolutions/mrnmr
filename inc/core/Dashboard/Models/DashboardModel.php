<?php
namespace Core\Dashboard\Models;
use CodeIgniter\Model;

class DashboardModel extends Model
{
	public function __construct(){
        $this->config = include realpath( __DIR__."/../Config.php" );
        $this->db = \Config\Database::connect();
        $this->session = session();
    }

    public $settinginfo;
    public function settings(){
        $query = $this->db->table('setting')->get();
        return $query->getRow(); 
    }

    public function bookingCount()
    {
        return $this->db->table('hotel_booking_bookings')->where('admin_uid', $this->session->get('uid'))->countAllResults();
    }

    public function latestBooking()
    {
        return $this->db->table('hotel_booking_bookings')->where('admin_uid', $this->session->get('uid'))->orderBy('id', 'DESC')->limit(10)->get()->getResultArray();
    }

    public function getSearchAll($searchMain = null, $whichfunction = null)
    {
        if($whichfunction == 'arrivals'){   
            $timestamp = 'start';
        }else if($whichfunction == 'departures'){
            $timestamp = 'end';
        }else{
            $timestamp = 'start';
        }
        $builder = $this->db->table('hotel_booking_bookings')->where('admin_uid', $this->session->get('uid'));

        if (is_array($searchMain)) {
            $builder->groupStart(); 

            foreach ($searchMain as $field => $value) {
                if (!empty($value)) {
                    $builder->orLike($field, $value); 
                }
            }
            $builder->groupEnd();
            return $builder;
        }

        if (!empty($searchMain)) {
            $builder->groupStart()
                ->like($timestamp, $searchMain)
                ->groupEnd();
        }
        return $builder;
    }
}
