<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $casts = ['created_at' => 'datetime:U', 'updated_at' => 'datetime:U'];
    protected $primaryKey = 'class_id';
    protected $fillable = [
                            'service_name',
                            'service_price',
                            'service_status',
                            'service_image',
                            'service_class_id'
                        ];
}
