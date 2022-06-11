<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Facades\Response;

class AddUserController extends Controller
{
    // public function getRoleId()
    // {
    //     return Role::allData();
    // }

    // public function addUser(){
    //     return dd("something");
    // }
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email ',
            'password' => 'required |min:6',
            'roleId' => 'required',
            // 'userType' => '',
            //'branchPermission' => 'required',
        ]);

        $data = array();
        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); 
        $data['role_id'] = $request->roleId;
        // $data['user_type'] = $request->userType;
        $data['branch_id'] = implode(", ", $request->branchPermission);

        //dd($request->all());
        //$response = "something";
        // $data = $request->all();
        $response = AddUser::create($data);
        return print_r($data);
        // User::query()->truncate();
        // $response =  DB::table('users')->insert($data);
      
        // return response()->json([
        //     'status' => 'success',
        //     'data' => $response,
        // ], 200);

        // return "something";
        // return response()->json($response, 200);

      
      
    }
}
