<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function CustomerPage(Request $request){
        return view('pages.admin.admin-customer');
    }//end method
    public function CustomerList(Request $request){
        return Customer::all();
    }//end method
    
    public function CustomerCreate(Request $request){
        $name    = $request->input('name');
        $email   = $request->input('email');
        $mobile  = $request->input('mobile');
        $address = $request->input('address');
        $status  = $request->input('status');

        return Customer::create([
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'address' => $address,
            'status' => $status
        ]);


    }//end method
    function CustomerById(Request $request){
        return Customer::find($request->input('id'));
    }//end method
    function CustomerUpdate(Request $request){
        return Customer::where('id',$request->input('id'))->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'status'=>$request->input('status')
        ]);
    }//end method
    function CustomerDelete(Request $request){
        return Customer::where('id',$request->input('id'))->delete();
    }//end method
}
