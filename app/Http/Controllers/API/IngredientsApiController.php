<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientsApiController extends Controller
{
    //
    public function index()
    {
        ini_set('memory_limit', '1024MB');
        return Ingredient::with('variants')->get();
    }
}
