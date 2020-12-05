<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    
    protected $table = "admin";
    // protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $primaryKey = 'admin_id';
    protected $fillable = [
                            'name', 
                            'email', 
                            'password', 
                        ];
}
