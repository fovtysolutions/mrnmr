<?php

namespace App\Controllers;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session(); // Initialize the session
    }

    public function index()
    {
        return view('auth/auth',[ 'dashboard' => "login", 'title' => 'Login' ]);
    }

    public function login(){
        $email = $this->request->getVar("email");
        $password = $this->request->getVar("password");
        $userModel = new AuthModel();
        $userinfo = $userModel->where('email', $email)->first();
        if (password_verify($password, $userinfo['password'])) {
            
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'errorno' => 1,
                'massage' => "Password is not Valid!!",
                'new_csrf_token' => csrf_hash()
            ]);
        }
        
        if($userinfo){
            if($userinfo['user_type'] == 'admin'){
                $user = 'admin';
            }else{
                $user = 'user';
            }
            $this->session->set([
                'user_uid' => $userinfo['uid'],
                'username' => $userinfo['username'],
                'mobile' => $userinfo['mobile'],
                'verify' => $userinfo['verify'],
                'user_type' => $user,
                'logged_in' => true,
            ]);
            return $this->response->setJSON([
                'status' => 'success',
                'errorno' => 1,
                'massage' => "Login successfully!!",
                'new_csrf_token' => csrf_hash()
            ]);
        }else{
            return $this->response->setJSON([
                'status' => 'error',
                'errorno' => 1,
                'massage' => "Credestial doesn't matched!!",
                'new_csrf_token' => csrf_hash()
            ]);
        }
    }

    public function register()
    {
        return view('auth/auth',[ 'dashboard' => "register", 'title' => 'Register' ]);
    }
    public function forgotpassword()
    {
        return view('auth/auth',[ 'dashboard' => "forgotpassword", 'title' => 'Forgot Password' ]);
    }
    public function resetpassword()
    {
        return view('auth/auth',[ 'dashboard' => "resetpassword", 'title' => 'Reset Password' ]);
    }
    public function registerpost()
    {
        $username = $this->request->getVar("username");
        $email = $this->request->getVar("email");
        $mobile = $this->request->getVar("mobile");
        $age = $this->request->getVar("age");
        $city = $this->request->getVar("city");
        $profession = $this->request->getVar("profession");
        $familybg = $this->request->getVar("familybg");
        $password = $this->request->getVar("password");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $uid = bin2hex(random_bytes(8));
        $veriy = 'notveriy';
        $user_type = 'Admin';

        $userModel = new AuthModel();
        $userinfo = $userModel->where('email', $email)->first();
        if($userinfo){
            return $this->response->setJSON([
                'status' => 'error',
                'errorno' => 1,
                'massage' => 'This user already exist!!',
                'new_csrf_token' => csrf_hash()
            ]);
        }else{
            $data = [
                'username' => $username,
                'email' => $email,
                'mobile' => $mobile,
                'age' => $age,
                'city' => $city,
                'profession' => $profession,
                'familybg' => $familybg,
                'password' => $password,
                'uid' => $uid,
                'veriy' => $veriy,
                'user_type' => $user_type,
            ];
            $userModel->insert($data);
            return $this->response->setJSON([
                'status' => 'success',
                'errorno' => 1,
                'massage' => 'You are register successfuly!!',
                'new_csrf_token' => csrf_hash()
            ]);
        }
    }

    public function logout()
    {
        $this->session->destroy(); // Destroy the session
        return view('auth/clear_auth'); // Redirect to the login page
    }

}
