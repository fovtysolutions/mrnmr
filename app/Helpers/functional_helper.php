<?php

if (!function_exists('greet')) {
    function greet($name)
    {
        return "Hello, " . ucfirst($name) . "!";
    }
}

if (!function_exists('inputsection')) {
    function inputsection($tag, $label, $value, $id = null, $type = 'text', $condition1 = '', $condition2 = '', $array = [])
    {
        if ($tag == "input") {
            if($type == 'checkbox' || $type == "radio") {
                $class = 'check-box';
            }else{
                $class = 'form-control form-control-sm';
            }
            return '
            <div class="col-md-4 col-xl-4">
                <div class="form-group row align-items-center" id="'.$id.'div" >
                    <label for="' . $id . '" class="col-sm-4 col-form-label">' . $label . '</label>
                    <div class="col-sm-8">
                        <input type="' . $type . '" class="'.$class.'" id="' . $id . '" name="' . $id . '" placeholder="Enter ' . $label . '" value="' . $value . '" ' . $condition1 . ' ' . $condition2 . '>
                    </div>
                </div>
            </div>';
        }

        if ($tag == "select") {
            $options = '';
            foreach ($array as $key => $value) {
                $options .= '<option value="' . $value . '">' . $value . '</option>';
            }
            return '
            <div class="col-md-4 col-xl-4">
                <div class="form-group row">
                    <label for="' . $id . '" class="col-sm-4 col-form-label">' . $label . '</label>
                    <div class="col-sm-8">
                        <select class="form-control form-control-sm" id="' . $id . '" name="' . $id . '">
                            ' . $options . '
                        </select>
                        <span id="' . $id . '_error"></span>
                    </div>
                </div>
            </div>';
        }

        if ($tag == "textarea") {
            return '
            <div class="col-md-4 col-xl-4">
                <div class="form-group row">
                    <label for="' . $id . '" class="col-sm-4 col-form-label">' . $label . '</label>
                    <div class="col-sm-8">
                        <textarea class="form-control form-control-sm" id="' . $id . '" name="' . $id . '" placeholder="Enter ' . $label . '" ' . $condition1 . ' ' . $condition2 . '>' . $value . '</textarea>
                    </div>
                </div>
            </div>';
        }

        return '';
    }
}

if (!function_exists('litab')) {
    function litab($name,$icon,$active)
    {
        return '
            <li class="step nav-item '. $active .'">
                <a class="nav-link step-icon" id="'. $name .'-tab" >
                    <div class="circle">
                        <i class="'. $icon .'"></i>
                    </div>
                    <span class="step-text">'. $name .'</span>
                </a>
            </li>
        ';
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
    function permissionvaluecheck($permissionname)
    {
        $session = \Config\Services::session(); 

        if (!$session->get('logged_in')) {
            redirect()->to('/login')->send();
            exit;
        }

        $permissionFound = false;
        $roleId = $session->get('role');
        if ($session->get('user_type')) {
            $permissionFound = true;
        }
        $permissionModel = new \App\Models\RolesAndPermissionModel();
        $role = $permissionModel->find($roleId);
        if ($role) {
            $requiredPermission = json_decode($role['permission'], true);
            foreach ($requiredPermission as $key => $permission) {
                if (isset($permission['value']) && $permission['value'] === $permissionname) {
                    $permissionFound = true;
                    break; 
                }
            }

            if (!$permissionFound) {
                redirect()->to('/dashboard/1')->send();
                exit;
            }
        }
    }
}

if (!function_exists('permissiontypecheck')) {
    function permissiontypecheck($permissionname,$permissiontype)
    {
        $session = \Config\Services::session(); 

        $roleId = $session->get('role');
        $permissionModel = new \App\Models\RolesAndPermissionModel();
        $role = $permissionModel->find($roleId);
        $checkPermission = false;
        if ($role) {
            $requiredPermission = json_decode($role['permission'], true);
            foreach ($requiredPermission as $key => $permission) {
                if (isset($permission['value']) && $permission['value'] === $permissionname) {
                    if ($permission['type'] == $permissiontype) {
                        $checkPermission = true;
                    }
                }
            }
        }
        if ($session->get('user_type')) {
            $checkPermission = true;
        }
        return $checkPermission;
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


if (!function_exists('headerux')) {
    function headerux($name,$icon,$active)
    {
        return '
            <li class="nav-item">
                <a class="nav-link '. $active .' custom-tab-link" id="'. $name .'-tab" >'. $icon .'</a>
            </li>
        ';
    }
}