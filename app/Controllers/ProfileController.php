<?php

namespace App\Controllers;

use App\Models\AuthModel;

class ProfileController extends BaseController
{public function index()
    {
        return view('admin/profile/profile',[ 'dashboard' => 1, 'title' => 'Profile' ]);
    }

    public function nextpage($num)
    {
        $branchModel = new AuthModel();
        $branch = $branchModel->find($num);
        return view('backend/profile/profile',[ 'dashboard' => $num,'title' => 'Profile', 'branch' => $branch ]);
    }

    public function update()
    {
        $branchModel = new AuthModel();
        $employeeId = $this->request->getPost('employee_id');
  
        $branch = $branchModel->where('employee_id', $employeeId)->first();

        // dd($employeeId );
        $image = $this->request->getFile('profile_image');
        if ($image) {
            $newName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads', $newName);
            $imagePath = 'uploads/' . $newName;
        } else {
            $imagePath = 'uploads/default_image.jpg'; 
        }
        $formTextarea = $this->request->getPost('formtextarea');
        log_message('debug', 'Form Textarea Value: ' . $formTextarea);
        $data = [
            'username' => $this->request->getPost('username'),
            'employee_id' => $this->request->getPost('employee_id'),
            'email' => $this->request->getPost('email'),
            'mobile' => $this->request->getPost('mobile'),
            'role' => $this->request->getPost('role'),
            'github_link' => $this->request->getPost('github_link'),
            'twitter_link' => $this->request->getPost('twitter_link'),
            'linkdin_link' => $this->request->getPost('linkdin_link'),
            'portfolio_link' => $this->request->getPost('portfolio_link'),
            'formtextarea' => $formTextarea,
            'profile_image' => $imagePath,
        ];
        
        // Update user data
        if ($branchModel->update($branch['id'], $data)) {
            $session = session();
            $session->set([
                'username' => $data['username'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'role' => $data['role'],
                'github_link' => $data['github_link'],
                'twitter_link' => $data['twitter_link'],
                'linkdin_link' => $data['linkdin_link'],
                'portfolio_link' => $data['portfolio_link'],
                'formtextarea' => $data['formtextarea'],
                'profile_image' => $imagePath,
            ]);
        
    
            return redirect()->to('/profile');
        } 
      
    }
}
