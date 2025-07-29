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
        $redeemable = $this->request->getPost('redeemable');
        $json = $this->request->getPost('order_json');
        $orderItems = json_decode($json, true);

        dd($redeemable);

        foreach ($orderItems as $item) {
            $model->insert([
                'name'      => $item['name'],
                'price'     => $item['price'],
                'quantity'  => $item['quantity']
            ]);
        }


        
    
    }
}
