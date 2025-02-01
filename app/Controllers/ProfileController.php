<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ProfilePersonalInfoModel;
use App\Models\ProfileReferenceModel;
use App\Models\ProfileSocialmediaModel;
use App\Models\ProfileDocumentsModel;
use App\Models\ProfileMrRightModel;

class ProfileController extends BaseController
{
    protected $authModel;
    protected $personalinfomodel;
    protected $referencemodel;
    protected $socialmodel;
    protected $documentmodel;
    protected $mrrightmodel;
    protected $alltable;
 
    public function __construct() {
    
        $this->authModel = new AuthModel();
        $this->personalinfomodel = new ProfilePersonalInfoModel();
        $this->reference = new ProfileReferenceModel();
        $this->socialmodel = new ProfileSocialmediaModel();
        $this->documentmodel = new ProfileDocumentsModel();
        $this->mrrightmodel = new ProfileMrRightModel();
    
        // Query builder without executing `get()`
        $this->alltable = $this->authModel
            ->select('auth.*, personal_information.*, profile_reference.*, profile_social_media_links.*, profile_your_mr_right.*, profile_documents.*')
            ->join('personal_information', 'auth.uid = personal_information.uid', 'left')
            ->join('profile_reference', 'auth.uid = profile_reference.uid', 'left')
            ->join('profile_social_media_links', 'auth.uid = profile_social_media_links.uid', 'left')
            ->join('profile_your_mr_right', 'auth.uid = profile_your_mr_right.uid', 'left')
            ->join('profile_documents', 'auth.uid = profile_documents.uid', 'left');
    }
    
    public function index()
    {
        dd($this->alltable);
        return view('admin/profile/profile',[ 'dashboard' => 1, 'title' => 'Profile' ]);
    }

    public function nextpage($num)
    {
        $branchModel = new AuthModel();
        $branch = $branchModel->find($num);
        return view('admin/profile/profile',[ 'dashboard' => $num,'title' => 'Profile', 'branch' => $branch ]);
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
            'facebook_link' => $this->request->getPost('facebook_link'),
            'instagram_link' => $this->request->getPost('instagram_link'),
            'twitter_link' => $this->request->getPost('twitter_link'),
            'linkdin_link' => $this->request->getPost('linkdin_link'),
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


