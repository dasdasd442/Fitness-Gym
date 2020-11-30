<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_id',
        'product_id',
        'service_id',
        'transaction_id',
        'total_qty',
        'order_amount'
    ];
}
