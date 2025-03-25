<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RequestStatus;
use Illuminate\Support\Facades\Mail;


class AdminCustomerController extends Controller
{
    public function index(){
        $accounts = User::where('type','customer')
        ->where('status','registered')->get();
        return view('admin.customer.index',compact('accounts'));
    }
    public function edit($id)
    {
        $customer = User::find($id);
        return view('admin.customer.edit',compact('customer'));
    }
    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        $customer->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
        ]);

        return redirect()->route('customer.index')->with(['status' => true, 'message' => 'Updated Successfully']);
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with(['status' => true, 'message' => 'Deleted successfully']);
    }
    public function customerStatus(Request $request,$id){
        $customer = User::find($id);
        $status = $request->status;
        $data['name'] = $customer->fname;
        $data['email'] = $customer->email;
        if($status == '1'){
            $customer->update([
                'is_active'=>$status,
            ]);
            // Mail::to($user->email)->send(new AccountStatus($data));
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }elseif($status == '2'){
            $reason = $request->reason;
            $customer->update([
                'is_active'=>$status,
            ]);
            $data['reason'] = $reason;
            // Mail::to($user->email)->send(new AccountStatus($data));
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }
    }
}
