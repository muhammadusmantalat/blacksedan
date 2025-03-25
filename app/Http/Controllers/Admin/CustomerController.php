<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(){
        $accounts = User::where('type','customer')
        ->where('status','register')->get();
        return view('admin.customer.index',compact('accounts'));
    }
}
