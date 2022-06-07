<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AddUserController extends Controller
{
    public function getRoleId()
    {
        return Role::allData();
    }

    // public function addUser(){
    //     return dd("something");
    // }
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     // 'name' => 'required',
        //     // 'branchType' => 'required',
        //     // 'tax_id' => 'required',
        //     // 'isCashRegisterUser' => 'required',
        //     // 'isEnableShipment' => 'required',
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'email' => 'required | email ',
        //     'password' => 'required |min:6',
        //     'role_id' => 'required',
            
        // ]);

        dd($request->all());
        
        // $tax_id = $request->tax_id;
        // $data = array();
        // $data['first_name'] = $request->firstName;
        // $data['last_name'] = $request->lastName;
        // $data['email'] = $request->email;
        // $data['password'] = $request->password;
        // $data['user_type'] = $request->role_id;
      
    }
}
