<?php

namespace Modules\Customer\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    protected $users_model;
    

    public function __construct()
    {
        $this->users_model             = new UserModel();
        $this->session                = service('session');
    }

    public function index()
    {
        $user_id = $this->session->get('user_id');
        if (!$user_id) {
            return redirect()->to('/customer/login');
        }
        $user = $this->users_model->where('u_id', $user_id)->first();

        $data = [
            'name' => $user['u_name'],
            'email' => $user['u_email'],
            'phone' => $user['u_phone'],
            'points' => $user['u_points'],
            'membership_id' => $user['u_membership_id'],
        ];
        
        return view('App\Modules\Customer\Views\dashboard', $data);
    }

    public function membership()
    {
        $user_id = $this->session->get('user_id');
        if (!$user_id) {
            return redirect()->to('/customer/login');
        }
        $user = $this->users_model->where('u_id', $user_id)->first();

        $data = [
            'name' => $user['u_name'],
            'email' => $user['u_email'],
            'phone' => $user['u_phone'],
            'points' => $user['u_points'],
            'membership_id' => $user['u_membership_id'],
        ];

        return view('App\Modules\Customer\Views\membership', $data);
    }
}
