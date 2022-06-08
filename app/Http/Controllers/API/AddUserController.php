<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUser;
use Illuminate\Support\Facades\Hash;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Facades\DB;
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
            // 'branchPermission' => '',
        ]);

        $data = array();
        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); 
        $data['role_id'] = $request->roleId;
        // $data['user_type'] = $request->userType;
        // $data['branch_id'] = $request->branchPermission;

        // dd($request->all());

        // $data = $request->all();
        $response = AddUser::create($data);
      
        return response()->json([
            'status' => 'sucess',
            'data' => $response,
        ], 200);
        // return view();
        // return response()->json($response, 200);

      
      
    }
}
