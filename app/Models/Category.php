<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'cat_name',
        'cat_logo',
        'cat_status',
        'created_date',
        'updated_date'

    ];
    protected $table='category';
    public $timestamps=false;
    
}
