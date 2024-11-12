<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idmember', 'idpackage', 'order_date', 'status', 'unique_code'];

    public function validateOrder($idmember, $uniqueCode)
    {
        return $this->where(['idmember' => $idmember, 'unique_code' => $uniqueCode, 'status' => 'pending'])->first();
    }
    public function getPendingOrders()
    {
        return $this->where('status', 'pending')->findAll();
    }
    public function getlaporanbulanan()
    {
        return $this->where('status', 'confirmed')->findAll();
    }
}
