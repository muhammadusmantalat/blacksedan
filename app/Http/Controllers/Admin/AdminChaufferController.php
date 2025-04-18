<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chauffer;
use App\Mail\RequestStatus;
use Illuminate\Support\Facades\Mail;

  
class AdminChaufferController extends Controller
{
    public function requestIndex(){
        $accountRequests = User::where('type','chauffer')
        ->where('status','requested')->latest()->get();
        return view('admin.chauffer.request',compact('accountRequests'));
    }
    public function requestStatus(Request $request,$id){
        $status = $request->status;
        $user = User::find($id);
        // return $user;
        $data['name'] = $user->fname;
        $data['email'] = $user->id;
        if($status == '1'){  
            $url = asset('chauffeur-sign-up');
            $data['url'] = $url;
            Mail::to($user->email)->send(new RequestStatus($data));
            $user->request_status = 1;
            $user->save();
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }elseif($status == '2'){
            $reason = $request->reason;
            $data['reason'] = $reason;
            Mail::to($user->email)->send(new RequestStatus($data));
            $user->request_status = 2;
            $user->save();
            User::destroy($id);
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }
    }   
    public function requestCount(){
        $orderCount = User::where('status', 'requested')
        ->where('request_status','0')
        ->count();
         return response()->json(['count' => $orderCount]);
    }
    public function index(){
        $accounts = Chauffer::all();
        return view('admin.chauffer.index',compact('accounts'));
    }
    public function edit($id)
    {
        $chauffer = Chauffer::find($id);
        return view('admin.chauffer.edit',compact('chauffer'));
    }
    public function update(Request $request, $id)
    {
        $chauffer = Chauffer::find($id);
        $chauffer->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
        ]);

        return redirect()->route('chauffer.index')->with(['status' => true, 'message' => 'Updated Successfully']);
    }
    public function destroy($id)
    {
        Chauffer::destroy($id);
        return redirect()->back()->with(['status' => true, 'message' => 'Deleted successfully']);
    }
    public function chaufferStatus(Request $request,$id){
        $chauffer = Chauffer::find($id);
        $data['name'] = $chauffer->fname;
        $data['email'] = $chauffer->email;
        $status = $request->status;
        if($status == '1'){
            $chauffer->update([
                'is_active'=>$status,
            ]);
            // Mail::to($user->email)->send(new AccountStatus($data));
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }elseif($status == '2'){
            $reason = $request->reason;
            $data['reason'] = $reason;
            $chauffer->update([
                'is_active'=>$status,
            ]);
            // Mail::to($user->email)->send(new AccountStatus($data));
            return redirect()->back()->with(['status' => true, 'message' => 'Status Updated successfully']);
        }
    }
}
