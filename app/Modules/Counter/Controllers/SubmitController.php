<?php

namespace Modules\Counter\Controllers;

use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\SalesModel;
use App\Models\OrdersModel;
use App\Controllers\BaseController;

class SubmitController extends BaseController
{
    protected $users_model;
    protected $items_model;
    protected $sales_model;
    protected $orders_model;

    public function __construct()
    {
        $this->users_model             = new UserModel();
        $this->items_model             = new ItemModel();
        $this->sales_model             = new SalesModel();
        $this->orders_model            = new OrdersModel();
        $this->session                 = service('session');
    }
    public function submit()
    {
        $phone = $this->request->getPost('customer_phone');
        $redeemable = $this->request->getPost('redeemable');
        if ($phone) {
            $user = $this->users_model->where('phone', $phone)->select('id, points')->first();

            $points = (int) $user['points'];
            $redeemable = (int) $this->request->getPost('redeemable');
            $updated_points = $points + $redeemable;

            $this->users_model->update($user['id'], ['points' => $updated_points]);
        }
        
        $json = $this->request->getPost('order_json');
        $orderItems = json_decode($json, true);

        foreach ($orderItems as $item) {
            $this->sales_model->insert([
                'sl_it_id'     => $item['it_id'],
                'sl_quantity'  => $item['quantity']
            ]);
        }
        
        return $this->respond([
            'success' => true,
            'message' => 'Order submitted successfully',
            'points'  => $updated_points ?? null
        ]);
    }
}
