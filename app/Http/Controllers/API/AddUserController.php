<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use Illuminate\Support\Facades\DB;
// use App\User;
// use App\Models\Role;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Branch;
// use FontLib\Table\Type\name;
// use Illuminate\Support\Facades\Response;

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
        // throw ValidationException::withMessages([$request->email => 'This value is incorrect']);
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | min:6',
            'roleId' => 'required',
            // 'userType' => '',
            //'branchPermission' => 'required',
        ]);

        // if(!(isset($request->email))){
        //     return response()->json([
        //         'message' =>  "Email already exist",
        //     ], 442);   
        // }else{
        //     return response()->json([
        //         'message' =>  "Else executed",
        //     ], 200);   
        // }

        $data = array();
        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password); 
        $data['role_id'] = $request->roleId;
        $data['user_type'] = "staff";
        $data['branch_id'] = implode(', ', $request->branchPermission);
        $data['verified'] = true;
        $data['token'] = '';
     
        //$response = "something";
        // $data = $request->all();
       
        // return response()->json($response, 200);
        // return print_r($data);
        // $response =  DB::table('users')->insert($data);
        
        $response = AddUser::create($data);
        return response()->json([
            'message' =>  "User saved successfully",
            'data' => $response,
        ], 200);

        

        
        
       
        // if($response){
        //     return response()->json([
        //         'message' =>  $errorMessage,
        //         'data' => $response,
        //     ], 200);
        // }else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Saving user failed',
        //         // 'data' => $response,
        //     ], 442);
        // }
        
        // return response()->json([
        //     'message' => 'User saved successfully',
        //     'data' => $response,

        // ], 200);
      
    }
}
