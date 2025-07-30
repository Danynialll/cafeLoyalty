<?php

namespace Modules\Counter\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class LoyaltyController extends BaseController
{
    

    public function checkCode($code = null)
    {
        $model = new UserModel();
        $user = $model->where('u_membership_id', $code)->first();

        if ($user) {
            return $this->respond([
                'success' => true,
                'user' => [
                    'name' => $user['u_name'],
                    'points' => $user['u_points'],
                    'created_at' => $user['u_created_at']
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
        $user = $model->where('u_phone', $num)->first();

        if ($user) {
            return $this->respond([
                'success' => true,
                'user' => [
                    'name' => $user['u_name'],
                    'points' => $user['u_points'],
                    'created_at' => $user['u_created_at']
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
