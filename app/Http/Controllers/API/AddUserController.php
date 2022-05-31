<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class AddUserController extends Controller
{
    public function getRoleId()
    {
        return Role::allData();
    }

    public function addUser(){
        dd("something");
    }
}
