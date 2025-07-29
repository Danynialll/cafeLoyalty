<?php

namespace Modules\Counter\Controllers;

use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\SalesModel;
use App\Controllers\BaseController;

class CounterController extends BaseController
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
        return view('App\Modules\Counter\Views\index', [
            'items' => $items
        ]);
    }
}
