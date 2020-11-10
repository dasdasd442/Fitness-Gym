<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employee";
    // protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $primaryKey = 'employee_id';
    protected $fillable = [
                            'employee_name', 
                            'employee_age', 
                            'employee_email', 
                            'employee_password', 
                            'employee_type', 
                            'employee_status',
                            'date_hired'
                        ];
}
