<?php

namespace Modules\Customer\Controllers;

use App\Models\ItemModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    protected $users_model;
    protected $items_model;
    protected $sales_model;

    public function __construct()
    {
        $this->items_model             = new ItemModel();
        $this->session                = service('session');
    }

    public function index()
    {
        $items = $this->items_model->findAll();
        return view('App\Modules\Customer\Views\home', [
            'items' => $items
        ]);
    }
}
