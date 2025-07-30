<?php

namespace Modules\Customer\Controllers;

use App\Models\UserModel;
use App\Models\AuthUsersModel;
use App\Controllers\BaseController;

class CustomerAuthController extends BaseController
{
    protected $users_model;
    protected $auth_users_model;

    public function __construct()
    {
        $this->users_model             = new UserModel();
        $this->auth_users_model        = new AuthUsersModel();
        $this->session                 = service('session');
    }

    public function login()
    {
        return view('App\Modules\Customer\Views\auth\login');
    }

    public function register()
    {
        return view('App\Modules\Customer\Views\auth\register');
    }

    public function registerHandle()
    {
        if ($this->request->isAJAX()) {

            $data = $this->request->getPost();
            $username = trim($data['username']);
            $name = trim($data['name']);
            $email = trim($data['email']);
            $phone = trim($data['phone']);
            $password = $data['password'];
            $confirm = $data['confirm_password'];

            if ($password !== $confirm) {
                return $this->response->setJSON(['success' => false, 'message' => 'Passwords do not match.']);
            }

            // Check if user exists
            if ($this->users_model->where('u_email', $email)->first()) {
                return $this->response->setJSON(['success' => false, 'message' => 'email already exists.']);
            }

            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $this->auth_users_model->insert([
                'au_username' => $username,
                'au_password' => $hashed,
                'au_type' => 'customer',
            ]);
            $au_id = $this->auth_users_model->insertID();

            //generate random membership ID
            $membership_id = rand(1000000000, 9999999999);

            $this->users_model->insert([
                'u_au_id' => $au_id,
                'u_name' => $name,
                'u_email' => $email,
                'u_phone' => $phone,
                'u_membership_id' => $membership_id,
                'u_points' => 0 // Default points
            ]);

            return $this->response->setJSON(['success' => true, 'message' => 'Registration successful.']);
        }
    }

    public function loginHandle()
    {
        if ($this->request->isAJAX()) {

            $data = $this->request->getPost();
            $username = trim($data['username']);
            $password = trim($data['password']);
            $user_id = $this->users_model->where('u_au_id', $this->auth_users_model->where('au_username', $username)->first()['au_id'])->first();

            $user = $this->auth_users_model->where('au_username', $username)->first();

            if ($user && password_verify($password, $user['au_password'])) {
                session()->set([
                    'id' => $user['au_id'],
                    'username' => $user['au_username'],
                    'user_id' => $user_id['u_id'],
                    'isLoggedIn' => true
                ]);

                return $this->response->setJSON(['success' => true, 'message' => 'Login successful.']);
            }

            return $this->response->setJSON(['success' => false, 'message' => 'Invalid credentials.']);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
