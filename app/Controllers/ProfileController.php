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
        $this->session = \Config\Services::session();
        $this->authModel = new AuthModel();
        $this->personalinfomodel = new ProfilePersonalInfoModel();
        $this->referencemodel = new ProfileReferenceModel();
        $this->socialmodel = new ProfileSocialmediaModel();
        $this->documentmodel = new ProfileDocumentsModel();
        $this->mrrightmodel = new ProfileMrRightModel();
    }
    
    public function index()
    {
        $useruid = $this->session->get('user_uid');
        $UsersauthModel = $this->authModel->where('uid', $useruid)->first() ?? [];
        $Userspersonalinfomodel = $this->personalinfomodel->where('uid', $useruid)->first() ?? [];
        $Usersreference = $this->referencemodel->where('uid', $useruid)->first() ?? [];
        $Userssocialmodel = $this->socialmodel->where('uid', $useruid)->first() ?? [];
        $Usersdocumentmodel = $this->documentmodel->where('uid', $useruid)->first() ?? [];
        $Usersmrrightmodel = $this->mrrightmodel->where('uid', $useruid)->first() ?? [];

        $data = array_merge(
            (array) $UsersauthModel,
            (array) $Userspersonalinfomodel,
            (array) $Usersreference,
            (array) $Userssocialmodel,
            (array) $Usersdocumentmodel,
            (array) $Usersmrrightmodel
        );
        return view('admin/profile/profile',[ 'dashboard' => 'Profile', 'title' => 'Profile', 'data' => $data ]);
    }

    public function editprofile()
{
    $useruid = $this->session->get('user_uid');
    $UsersauthModel = $this->authModel->where('uid', $useruid)->first() ?? [];
    $Userspersonalinfomodel = $this->personalinfomodel->where('uid', $useruid)->first() ?? [];
    $Usersreference = $this->referencemodel->where('uid', $useruid)->first() ?? [];
    $Userssocialmodel = $this->socialmodel->where('uid', $useruid)->first() ?? [];
    $Usersdocumentmodel = $this->documentmodel->where('uid', $useruid)->first() ?? [];
    $Usersmrrightmodel = $this->mrrightmodel->where('uid', $useruid)->first() ?? [];

    $data = array_merge(
        (array) $UsersauthModel,
        (array) $Userspersonalinfomodel,
        (array) $Usersreference,
        (array) $Userssocialmodel,
        (array) $Usersdocumentmodel,
        (array) $Usersmrrightmodel
    );
    return view('admin/profile/profile', [
        'dashboard' => 'Edit Profile',
        'title' => 'Edit Profile',
        'data' => $data
    ]);
}


    public function update()
    {
        $useruid = $this->session->get('user_uid');
        $UsersauthModel = $this->authModel->where('uid', $useruid)->first();
        $Userspersonalinfomodel = $this->personalinfomodel->where('uid', $useruid)->first();
        $Usersreference = $this->referencemodel->where('uid', $useruid)->first();
        $Userssocialmodel = $this->socialmodel->where('uid', $useruid)->first();
        $Usersdocumentmodel = $this->documentmodel->where('uid', $useruid)->first();
        $Usersmrrightmodel = $this->mrrightmodel->where('uid', $useruid)->first();

        $postdata = $this->request->getPost();
        $postdata['uid'] = $useruid;

        $this->authModel->update($UsersauthModel['id'], $postdata);
        if(!$Userspersonalinfomodel){
            $this->personalinfomodel->insert($postdata);
        }else{
            $this->personalinfomodel->update($Userspersonalinfomodel['id'], $postdata);
        }

        if(!$Usersreference){
            $this->referencemodel->insert($postdata);
        }else{
            $this->referencemodel->update($Usersreference['id'], $postdata);
        }

        if(!$Userssocialmodel){
            $this->socialmodel->insert($postdata);
        }else{
            $this->socialmodel->update($Userssocialmodel['id'], $postdata);
        }

        if(!$Usersdocumentmodel){
            $this->documentmodel->insert($postdata);
        }else{
            $this->documentmodel->update($Usersdocumentmodel['id'], $postdata);
        }

        if(!$Usersmrrightmodel){
            $this->mrrightmodel->insert($postdata);
        }else{
            $this->mrrightmodel->update($Usersmrrightmodel['id'], $postdata);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'locationChange' => true,
            'message' => 'Data updated successfully!',
            'new_csrf_token' => csrf_hash()
        ]);
    }
}


