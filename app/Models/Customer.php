<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U', 
                        'membership_start_date' => 'datetime:Y-m-d h:i:s', 'membership_end_date' => 'datetime:Y-m-d h:i:s'];
    protected $primaryKey = 'customer_id';
    protected $fillable = [
                            'customer_name', 
                            'customer_age', 
                            'customer_email', 
                            'customer_password', 
                            'customer_status',
                            'membership_start_date',
                            'membership_end_date',
                            'membership_expires_in',
                        ];
}
