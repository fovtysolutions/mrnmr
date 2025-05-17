<?php
namespace Core\Home\Controllers;

class Home extends \CodeIgniter\Controller
{
    public function __construct(){
        $this->config = include realpath( __DIR__."/../Config.php" );

        // if( get_session("frontend_template") ){
        //     $this->template = get_session("frontend_template");
        // }else{
        //     $this->template = get_option("frontend_template", "Stackblue");
        // }
        $this->template = "Stackblue";
        $this->model = new \Core\Home\Models\HomeModel();
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
    }

    public function index() {
        $session = session();
        $baseurl = base_url('login');
        $pagename = 'show404';
    
        if (!$session->get('isLogIn')) {
            $pagename = 'redirect';
        };
    
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view("Frontend\\".$this->template."\Views\\$pagename")
        ];
    
        echo view("Frontend\\".$this->template."\Views\\index", $data);
    }

    public function login() {
        $data = [
            "title" => "Login",
            "desc" => "Discription",
            "content" => view("Backend\Admin\Views\Auth\login"),
        ];
        return view("Backend\Admin\Views\Auth\auth", $data);
    }

    public function submitlogin()
    {
        $session = session();
        $validation = \Config\Services::validation();

        if ($session->get('isLogIn')) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'You are already logged in!!',
                'locationChange' => base_url('dashboard'),
                'new_csrf_token' => csrf_hash(),
            ]);
        }

        $validation->setRules([
            'email' => ['label' => lang('App.email'), 'rules' => 'required|valid_email|max_length[100]|trim'],
            'password' => ['label' => lang('App.password'), 'rules' => 'required|max_length[32]'],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'false',
                'message' => $validation->getErrors(),
                'new_csrf_token' => csrf_hash(),
            ]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->model->checkUser($email, $password);
        if ($user) {
        
            if($user->is_admin == 1){
                $userisadmin = 1;
            } else if($user->is_admin == 2){
                $userisadmin = 2;
            } else if($user->is_admin == 3){
                $userisadmin = 3;
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => "No user found!!",
                    'new_csrf_token' => csrf_hash(),
                ]);
            }

            $sessionData = [
                'isLogIn'    => true,
                'isAdmin'    => $userisadmin,
                'user_type'  => $user->is_admin,
                'id'         => $user->id,
                'fullname'   => $user->username,
                'email'      => $user->email,
                'role'      => $user->roleandpermissions,
                'image'      => $user->image,
                'last_login' => $user->last_login,
                'last_logout'=> $user->last_logout,
                'ip_address' => $user->ip_address,
                'uid' =>  $user->uid
            ];

            $session->set($sessionData);
            $this->model->last_login($user->id);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Login successfull!!',
                'locationChange' => base_url('dashboard'),
                'new_csrf_token' => csrf_hash(),
            ]);
        } else { 
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid email or password!!',
                'new_csrf_token' => csrf_hash(),
            ]);
        }
    }

    public function register(){
        $data = [
            "title" => "Register",
            "desc" => "Discription",
            "content" => view("Backend\Admin\Views\Auth\\register"),
        ];
        return view("Backend\Admin\Views\Auth\auth", $data);
    }

    public function submitregister()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => ['label' => lang('App.email'), 'rules' => 'required|valid_email|max_length[100]|trim|is_unique[user.email]'],
            'password' => ['label' => lang('App.password'), 'rules' => 'required|max_length[32]'],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors(),
                'new_csrf_token' => csrf_hash(),
            ]);
        }
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPassword');
        if($password != $confirmPassword){
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Your Password not matched from confirm password!!",
                'new_csrf_token' => csrf_hash(),
            ]);
        }

        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT); 
        $username = $this->request->getPost('username');
        $age = $this->request->getPost('age');
        $city = $this->request->getPost('city');
        $familybg = $this->request->getPost('familybg');
        $profession = $this->request->getPost('profession');
        $mobile = $this->request->getPost('mobile');
        $uid = uniqid(); 
        $is_admin = 1;
        $usertype = 1;
        $status = 0;

        $data = [
            "username" => $username,
            "email" => $email,
            "age" => $age,
            "city" => $city,
            "profession" => $profession,
            "familybg" => $familybg,
            "mobile" => $mobile,
            "password" => $password, 
            "uid" => $uid,
            "is_admin" => $is_admin,
            "usertype" => $usertype,
            "status" => $status,
        ];

        if ($this->model->setregister($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'You are registered successfully',
                'locationChange' => base_url('login'),
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

    private function generateCaptcha()
    {
        helper('captcha');

        $captchaConfig = [
            'img_path'      => WRITEPATH . 'captcha/',
            'img_url'       => base_url('writable/captcha/'),
            'font_path'     => WRITEPATH . 'fonts/captcha.ttf',
            'img_width'     => 343,
            'img_height'    => 64,
            'expiration'    => 600,
            'word_length'   => 4,
            'font_size'     => 32,
            'img_id'        => 'Imageid',
            'pool'          => '23456789abcdefghijkmnpqrstuvwxyz',
            'colors'        => [
                'background' => [255, 255, 255],
                'border' => [228, 229, 231],
                'text' => [49, 141, 1],
                'grid' => [241, 243, 246]
            ]
        ];

        return create_captcha($captchaConfig);
    }

    public function forgot() {
        $data = [
            "title" => "forgot",
            "desc" => "Discription",
            "content" => view("Backend\Admin\Views\Auth\\forgot"),
        ];
        return view("Backend\Admin\Views\Auth\auth", $data);
    }

    public function submitforgot()
    {
        $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $user = $this->db->table('user')->where('email', $email)->get()->getRow();
        $send_email = $this->db->table('email_config')->where('id',1)->get()->getRow();	
        if ($user) {
            $random_key = "MR" . date('y') . strtoupper(bin2hex(random_bytes(2))); // Generate secure token
            $this->db->table('user')->where('email', $email)->update(['password_reset_token' => $random_key]);
            $emailService = \Config\Services::email();
            $config = array(
                'protocol'  => $send_email->protocol,
                'SMTPHost' => $send_email->SMTPHost,
                'SMTPPort' => $send_email->SMTPPort,
                'SMTPUser' => $send_email->SMTPUser,
                'SMTPPass' => $send_email->SMTPPass,
                'mailtype'  => $send_email->mailtype,
                'charset'   => $send_email->charset,
            );
            $emailService->initialize((array) $config);
            $subject = "Password Reset";
            $htmlContent = "Your OTP code is <b>{$random_key}</b>";
            $emailService->setFrom($send_email->fromEmail, $send_email->fromName);
            $emailService->setTo(strtolower($email));
            $emailService->setSubject($subject);
            $emailService->setMessage($htmlContent);
            if (!$emailService->send()) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Otp send to your email!!',
                    'locationChange' => base_url('otp'),
                    'new_csrf_token' => csrf_hash(),
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to send OTP email!!',
                    'new_csrf_token' => csrf_hash(),
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email Not Found!!',
                'new_csrf_token' => csrf_hash(),
            ]);
        }
    }

    public function logout()
    { 
        $session = session();
        $this->model->last_logout($session->id);
        session()->destroy();
        return redirect()->to('login');
    }
   
    public function show404() {
        $session = session();
        $baseurl = base_url('login');
        $pagename = 'show404';
    
        if (!$session->get('isLogIn')) {
            $pagename = 'redirect';
        };
    
        $data = [
            "title" => $this->config['name'],
            "desc" => $this->config['desc'],
            "content" => view("Frontend\\".$this->template."\Views\\$pagename")
        ];
    
        echo view("Frontend\\".$this->template."\Views\\index", $data);
    }

    public function otp(){
        $data = [
            "title" => "OTP",
            "desc" => "Discription",
            "content" => view("Backend\Admin\Views\Auth\\otp"),
        ];
        return view("Backend\Admin\Views\Auth\auth", $data);
    }
    public function check_code()
    {
        $code = $this->request->getPost('code');
        $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $user = $this->db->table('user')->where('email', $email)->where('password_reset_token', $code)->get()->getRow();
        if ($user) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Please Enter New Password!!',
                'locationChange' => base_url('reset'),
                'new_csrf_token' => csrf_hash(),
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'OTP Code Does Not Match!!',
                'locationChange' => base_url('reset'),
                'new_csrf_token' => csrf_hash(),
            ]);
        }
    }

    public function reset(){
        $data = [
            "title" => "Reset",
            "desc" => "Discription",
            "content" => view("Backend\Admin\Views\Auth\\reset"),
        ];
        return view("Backend\Admin\Views\Auth\auth", $data);
    }

    public function new_password()
    {
        $password = $this->request->getPost('password');
        $cpassword = $this->request->getPost('confirmPassword');
        if($password != $cpassword){
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Your Password not matched from confirm password!!",
                'new_csrf_token' => csrf_hash(),
            ]);
        }
        $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = $this->db->table('user')->where('email', $email)->get()->getRow();
        if ($user) {
            $this->db->table('user')->where('email', $email)->update([
                'password' => $hashedPassword,
                'password_reset_token' => ''
            ]);
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Password Changed Successfully!!',
                'locationChange' => base_url('login'),
                'new_csrf_token' => csrf_hash(),
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Your email not found!!',
                'new_csrf_token' => csrf_hash(),
            ]);
        }
    }

    function randstrGen($mode = null, $len = null) {
        $result = "";
        if ($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif ($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif ($mode == 4):
            $chars = "0123456789";
        endif;
        $charArray = str_split($chars);
        for ($i = 0; $i < $len; $i++) {
            $randItem = array_rand($charArray);
            $result .= "" . $charArray[$randItem];
        }
        return $result;
    }

    public function singleuploader()
    {
        $file = $this->request->getFile('file');
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No file was uploaded.',
            ]);
        }
        $fileType = $this->request->getPost('filetype');
        $allowedTypes = [];
        if ($fileType === 'image') {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
        } elseif ($fileType === 'document') {
            $allowedTypes = ['pdf', 'xls', 'xlsx'];
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid file type provided.',
            ]);
        }
        $fileExtension = $file->getClientExtension();
        if (!in_array($fileExtension, $allowedTypes)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Invalid file format. Allowed formats: " . implode(', ', $allowedTypes),
            ]);
        }
        $maxFileSize = 5 * 1024 * 1024; 
        if ($file->getSize() > $maxFileSize) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'File size exceeds the maximum limit of 5 MB.',
            ]);
        }
        if ($file->isValid() && !$file->hasMoved()) {
            $uploadPath = WRITEPATH . 'uploads/' . $fileType;
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            return $this->response->setJSON([
                'status' => 'success',
                'filename' => 'uploads/' . $fileType . '/' . $newName,
                'message' => 'File uploaded successfully.',
            ]);
        }
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to upload the file.',
        ]);
    }
    public function multiuploader()
    {
        $files = $this->request->getFiles();
        $fileType = $this->request->getPost('filetype');
        $allowedTypes = [];

        if ($fileType === 'image') {
            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];
        } elseif ($fileType === 'document') {
            $allowedTypes = ['pdf', 'xls', 'xlsx'];
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid file type provided.',
            ]);
        }

        $uploadedFiles = $files['files'];
        $uploadedPaths = [];

        foreach ($uploadedFiles as $key => $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $ext = $file->getClientExtension();
                if (!in_array($ext, $allowedTypes)) {
                    continue;
                }

                if ($file->getSize() > 5 * 1024 * 1024) {
                    continue;
                }

                $uploadPath = FCPATH . 'uploads/' . $fileType;
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);

                $uploadedPaths[] = [
                    'id' => rand(10,1000),
                    'file' => 'uploads/' . $fileType . '/' . $newName,
                    'original_name' => $file->getClientName(),
                    'size' => $file->getSize(),
                    'extension' => $ext
                ];
            }
        }

        if (empty($uploadedPaths)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No valid files were uploaded.',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Files uploaded successfully.',
            'files' => $uploadedPaths,
        ]);
    }

}