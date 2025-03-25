<?php

namespace App\Http\sControllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChaufferController extends Controller
{
    public function requestIndex(){
        $accountRequests = User::where('type','chauffer')
        ->where('status','requested')->get();
        return view('admin.chauffer.request',compact('accountRequests'));
    }
    public function index(){
        $accounts = User::where('type','chauffer')
        ->where('status','register')->get();
        return view('admin.chauffer.index',compact('accounts'));
    }
}
