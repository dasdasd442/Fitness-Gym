<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $primaryKey = 'class_id';
    protected $fillable = [
                            'class_name', 
                            'class_instructor_id', 
                            'class_price', 
                            'class_cur_number',
                            'class_max_number', 
                            'class_schedule',
                            'class_time',
                            'class_status',
                            'class_image',
                            'class_description'
                        ];
}
