<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function CustomerPage(Request $request){
        return view('pages.admin.admin-customer');
    }//end method
    public function CustomerList(Request $request){
        return User::all();
    }//end method
    public function CustomerCreate(Request $request){
        //return User
    }//end method
}
