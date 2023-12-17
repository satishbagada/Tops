<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class categoryController extends Controller
{
    public function index()
    {
        return view("Items.Category.index");
    }
}
