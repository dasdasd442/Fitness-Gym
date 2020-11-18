<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClass extends Model
{
    use HasFactory;
    protected $table = "customerclass";
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $fillable = ['class_id', 'customer_id'];
}
