<?php

namespace Modules\Counter\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class SubmitController extends BaseController
{
    public function submit()
    {
        $model = new UserModel();
        $phone = $this->request->getPost('customer_phone');
        $order = $this->request->getPost('order_json');
        dd($phone, $order);
    
    }
}
