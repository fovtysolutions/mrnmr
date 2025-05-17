<?php
use CodeIgniter\HTTP\URI;
use Config\Services;
use Config\Database;

if (!function_exists('getInfoById')) {
    function getInfoById($table,$id,$value) {
        $db = Database::connect();
        $query = $db->table($table)->where('id',$id)->get();
        $row = $query->getRow();
        if($row){
            return $row->$value;
        }else{
            return false;
        }
    }
}

if (!function_exists('getInfoByUid')) {
    function getInfoByUid($table,$uid,$value) {
        $db = Database::connect();
        $query = $db->table($table)->where('admin_uid',$uid)->get();
        $row = $query->getRow();
        if($row){
            return $row->$value;
        }else{
            return false;
        }
    }
}

if (!function_exists('showingtablenumberofrow')) {
    function showingtablenumberofrow()
    {
        return '
            <li class="controls-pages-cnt">
                <select id="rowSelect">
                    <option value="10">Show 10</option>
                    <option value="20">Show 20</option>
                    <option value="50">Show 50</option>
                    <option value="100">Show 100</option>
                    <option value="200">Show 200</option>
                    <option value="300">Show 300</option>
                </select>
            </li>
        ';
    }
}

if (!function_exists('tableloader')) {
    function tableloader()
    {
        return '
            <section class="loader-dots-container">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </section>
        ';
    }
}

if( ! function_exists('getOrdinalSuffix') ){
    function getOrdinalSuffix($number) {
        if (!in_array(($number % 100), [11, 12, 13])) {
            switch ($number % 10) {
                case 1: return 'st';
                case 2: return 'nd';
                case 3: return 'rd';
            }
        }
        return 'th';
    }
}

if( ! function_exists('_e') ){
    function _e($text = '', $strip_tags = true){
        if($strip_tags){
            if(DEMO){
                if( filter_var($text, FILTER_VALIDATE_EMAIL) ){
                    echo hideEmailAddress($text);
                }else{
                    if($text != ""){
                        echo strip_tags($text);
                    }else{
                        echo $text;
                    }
                }
            }else{
                if($text != ""){
                    echo strip_tags($text);
                }else{
                    echo $text;
                }
            }
        }else{
            echo $text;
        }
    }
}

if( ! function_exists('_ec') ){
    function _ec($text = '', $strip_tags = true){
        if(DEMO){
            if( filter_var($text, FILTER_VALIDATE_EMAIL) ){
                echo hideEmailAddress($text);
            }else{
                echo $text;
            }
        }else{
            echo $text;
        }
    }
}

if( ! function_exists('get_module_paths') ){
    function get_module_paths(){
        $configs = array();
        $folders = array(
            ROOTPATH . 'inc/plugins/',
            ROOTPATH . 'inc/core/',
            ROOTPATH . 'inc/superadmin/',
            ROOTPATH . 'inc/themes/backend/',
            ROOTPATH . 'inc/themes/frontend/',
        );

        $module_paths = array();

        foreach ( $folders as $folder )
        {
            $directories = glob( $folder . '*' );

            if ( !empty( $directories ) )
            {
                foreach ( $directories as $directory )
                {
                    if( file_exists( $directory . "/Config.php" ) ){
                        $module_paths[] = $directory;
                    }
                }
            }
        }

        return $module_paths;
    }
}

if (!function_exists('display')) {
    function display($text = null) {
        $db = \Config\Database::connect();
        $table  = 'language';
        $phrase = 'phrase';
        $setting_table = 'setting';
        $default_lang  = 'english';

        // Get language setting from `setting` table
        $data = $db->table($setting_table)->get()->getRow();

        $language = !empty($data->language) ? $data->language : $default_lang;

        if (!empty($text)) {
            if ($db->tableExists($table)) { 
                if ($db->fieldExists($phrase, $table)) { 
                    if ($db->fieldExists($language, $table)) {
                        $row = $db->table($table)
                                  ->select($language)
                                  ->where($phrase, $text)
                                  ->get()
                                  ->getRow(); 

                        return !empty($row->$language) ? esc($row->$language) : false;
                    }
                }
            }
        }
        return false;
    }
}

if( ! function_exists('hideEmailAddress') ){
    function hideEmailAddress($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            list($first, $last) = explode('@', $email);
            $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
            $last = explode('.', $last);
            $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
            $hideEmailAddress = $first.'@'.$last_domain.'.'.$last['1'];
            return $hideEmailAddress;
        }
    }
}

if( ! function_exists('directory_map') ){
    function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
    {
        if ($fp = @opendir($source_dir))
        {
            $filedata	= array();
            $new_depth	= $directory_depth - 1;
            $source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

            while (FALSE !== ($file = readdir($fp)))
            {
                // Remove '.', '..', and hidden files [optional]
                if ($file === '.' OR $file === '..' OR ($hidden === FALSE && $file[0] === '.'))
                {
                    continue;
                }

                is_dir($source_dir.$file) && $file .= DIRECTORY_SEPARATOR;

                if (($directory_depth < 1 OR $new_depth > 0) && is_dir($source_dir.$file))
                {
                    $filedata[$file] = directory_map($source_dir.$file, $new_depth, $hidden);
                }
                else
                {
                    $filedata[] = $file;
                }
            }

            closedir($fp);
            return $filedata;
        }

        return FALSE;
    }
}

if (!function_exists('filtersection')) {
    function filtersection($tag, $label, $value, $id = null, $type = 'text', $condition1 = '', $condition2 = '', $array = [])
    {
        if ($tag == "input") {
            return '
            <div class="form-group mb-2 mr-2">
                <input type="' . $type . '" class="form-control" id="' . $id . '" name="' . $id . '" placeholder="Search ' . $label . '" value="' . $value . '" ' . $condition1 . ' ' . $condition2 . '>
            </div>';
        }

        if ($tag == "select") {
            $options = '<option value="">Select ' . $label . '</option>';
            foreach ($array as $key => $value) {
                $options .= '<option value="' . $value . '">' . $value . '</option>';
            }

            return '
            <div class="form-group mb-2 mr-2">
                    <select class="form-control" id="' . $id . '" name="' . $id . '">
                        ' . $options . '
                    </select>
            </div>';
        }
    }
}

if (!function_exists('permissionvaluecheck')) {
    function permissionvaluecheck($permissionname, $permissiontype)
    {
        $session = session();
        $db = \Config\Database::connect();

        $permissionFound = false;
        $roleId = $session->get('role');

        if ($session->get('user_type') == 2) {
            return true;
        }

        $role = $db->table('rolesandpermission')->where('id', $roleId)->get()->getRow();
        if ($role) {
            $requiredPermission = json_decode($role->permissions, true);
            if (is_array($requiredPermission)) {
                foreach ($requiredPermission as $permission) {
                    if (isset($permission['value']) && $permission['value'] === $permissionname) {
                        if ($permission['type'] == $permissiontype) {
                            $permissionFound = true;
                        }
                    }
                }
            }
        }

        return $permissionFound;
    }
}



