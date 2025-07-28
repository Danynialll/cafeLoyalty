<?php

namespace Modules\Counter\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class LoyaltyController extends BaseController
{
    public function index()
    {
        return view('App\Modules\Counter\Views\index');
    }

    public function checkCode($code = null)
    {
        $model = new UserModel();
        $user = $model->where('membership_id', $code)->first();

        if ($user) {
            return $this->respond([
                'success' => true,
                'user' => [
                    'name' => $user['name'],
                    'points' => $user['points'],
                    'created_at' => $user['created_at']
                ]
            ]);
        } else {
            return $this->respond([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
    }

    public function checkNum($num = null)
    {
        $model = new UserModel();
        $user = $model->where('phone', $num)->first();

        if ($user) {
            return $this->respond([
                'success' => true,
                'user' => [
                    'name' => $user['name'],
                    'points' => $user['points'],
                    'created_at' => $user['created_at']
                ]
            ]);
        } else {
            return $this->respond([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
    }
}
