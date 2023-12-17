<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="comment";
    protected $primaryKey="com_id";
    protected $fillable=['com_id','com_creater','com_comments','com_date'];
    public $timestamps = false;
}
