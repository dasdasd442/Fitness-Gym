<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrylog extends Model
{
    use HasFactory;
    protected $table = "entrylog";
    protected $primaryKey = 'log_id';
    protected $fillable = ['customer_id', 'date_entry'];
}
