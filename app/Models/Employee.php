<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $guard = 'employee';


    protected $table = "employee";
    // protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $primaryKey = 'employee_id';
    protected $fillable = [
                            'employee_name', 
                            'employee_age', 
                            'email', 
                            'password', 
                            'employee_type', 
                            'employee_status',
                            'date_hired'
                        ];
}
