<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transactiondetail";
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
            'employee_id',
            'transaction_date',
            'status',
            'admin_id',
    ];
}
