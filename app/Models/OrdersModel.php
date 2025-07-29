<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'or_id';

    protected $allowedFields = [
        'or_it_id',
        'or_sweetness',
        'or_ice',
        'or_cream',
        'or_quantity',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'or_created_at';
    protected $updatedField  = 'or_updated_at';
}
