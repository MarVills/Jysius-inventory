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
    public function addUser(Request $request)
    {
        $this->validate($request, [
            // 'name' => 'required',
            // 'branchType' => 'required',
            // 'tax_id' => 'required',
            // 'isCashRegisterUser' => 'required',
            // 'isEnableShipment' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required | email ',
            'password' => 'required |min:6',
            'role' => 'required',
            // 'branchType' => 'required',
        ]);

        // $tax_id = $request->tax_id;
        // $data = array();
        // $data['name'] = $request->name;
        // $data['branch_type'] = $request->branchType;
        // $data['is_cash_register'] = $request->isCashRegisterUser;
        // $data['is_shipment'] = $request->isEnableShipment;
        // $data['user_id'] = $request->user_id;
        // $data['created_by'] = Auth::user()->id;

        $tax_id = $request->tax_id;
        $data = array();
        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['user_type'] = $request->role;
        // $data['branch_type'] = $request->branchType;
        // $data['user_id'] = $request->user_id;
        // $data['created_by'] = Auth::user()->id;
        $message = "============ This Wroked =============";

        $data = $request->all();
        DB::table('users')->insert($data);
        // return Response::json(true);
        return redirect()->route('...')->with('jsAlert', $message);

        // if ($tax_id == 'no-tax') {
        //     $data['taxable'] = 0;
        // } elseif ($tax_id == 'default-tax') {
        //     $data['taxable'] = 1;
        //     $data['is_default'] = 1;
        //     $taxRowCount = Tax::getTotals();

        //     if ($taxRowCount == 0) {
        //         $response = [
        //             'message' => Lang::get('lang.no_tax_added_default')
        //         ];

        //         return response()->json($response, 404);
        //     } else {
        //         $tax = Tax::getId();
        //         $data['tax_id'] = $tax;
        //     }
        // } else {
        //     $data['taxable'] = 1;
        //     $data['is_default'] = 0;
        //     $data['tax_id'] = $tax_id;
        // }

        // $branch_id = Branch::getInsertedId($data);
        // if ($branch_id) {
        //     CashRegister::store([
        //         "title" => 'Main Cash Register',
        //         "branch_id" => $branch_id,
        //         "sales_invoice_id" => 2,
        //         "receiving_invoice_id" => 4,
        //         "created_by" => Auth::user()->id
        //     ]);
        //     $response = [
        //         'message' => Lang::get('lang.branch') . ' ' . Lang::get('lang.successfully_added')
        //     ];

        //     return response()->json($response, 200);
        // }
    }
}
