<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MainFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {   
        $module_paths = get_module_paths();

        if( !empty($module_paths) ){
            foreach ($module_paths as $key => $module_path) {
                $filter_file = $module_path . "/Filters/beforeFilter.php";
                if( file_exists( $filter_file ) ){
                    include_once $filter_file;
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $module_paths = get_module_paths();

        if( !empty($module_paths) ){
            foreach ($module_paths as $key => $module_path) {
                $filter_file = $module_path . "/Filters/afterFilter.php";
                if( file_exists( $filter_file ) ){
                    include_once $filter_file;
                }
            }
        }
    }
}