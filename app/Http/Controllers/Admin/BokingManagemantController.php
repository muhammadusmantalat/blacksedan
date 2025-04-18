<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Chauffer;
use App\Models\User;
use App\Models\DeleteRequest; 
use App\Mail\ChaufferAssignRideMail;  
use App\Models\AdminNotification;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class BokingManagemantController extends Controller
{
    public function offersIndex(){
        $bookings = Booking::with('vehicle')->orderBy('id' , 'DESC')
        ->where('status','Booked')
        ->get();
        $chauffers = Chauffer::latest()->get();
        return view('admin.offer.index',compact('bookings','chauffers'));
    }
    public function upComingRidesIndex(){
        $bookings = Booking::with('vehicle')->orderBy('id' , 'DESC')
        ->whereIn('status',['Accepted','On The Way'])
        // ->where('chauffeurs_response','accepted')
        ->get();
        return view('admin.upComingRides.index',compact('bookings'));
    }
    public function pastRidesIndex(){
        $bookings = Booking::with('vehicle')->orderBy('id' , 'DESC')
        ->whereIn('status',['Completed','cancelled'])
        // ->where('chauffeurs_response','accepted')
        ->get();
        // return $bookings;
        return view('admin.pastRides.index',compact('bookings'));
    }
  
    public function assign(Request $request, $id){
        $booking = Booking::find($id);
        $booking->update([
            'chauffer_id'=>$request->chauffeur_id
        ]);
        $chauffer = Chauffer::find($request->chauffeur_id);
        $data['pickup_location'] = $booking->pickup_location;
        $data['dropOff_location'] = $booking->dropOff_location;
        $data['pickup_date'] = $booking->pickup_date;
        $data['pickup_time'] = $booking->pickup_time;
        $data['instruction'] = $booking->instruction;
        $data['name'] = $chauffer->fname;
        Mail::to($chauffer->email)->send(new ChaufferAssignRideMail($data));
        return redirect()->route('getBooking')->with(['status' => true, 'message' => 'Chauffeur Assigned Successfully']);
    }

    
    public function getOfferCount(){
       $orderCount = Booking::whereIn('status', ['Booked','On The Way'])
       ->count();
        return response()->json(['count' => $orderCount]);
    }

    public function getUpComingCount(){
       $orderCount = Booking::whereIn('status', ['Accepted','On The Way'])->count();
        return response()->json(['count' => $orderCount]);
    }

    public function getPastRideCount(){
       $orderCount = Booking::whereIn('status', ['cancelled','Completed'])->count();
        return response()->json(['count' => $orderCount]);
    }

    public function notificationCounter(){
        $orderCount = AdminNotification::where('status', '0')->count();
         return response()->json(['count' => $orderCount]);
    }
    public function notificationIndex(){
        $requests = AdminNotification::latest()->get();
        AdminNotification::where('status', '0')->update([
            'status'=>'1',
        ]);
        return view('admin.notifications.index',compact('requests'));
    }
    public function deleteAccountRequests(){
        $orderCount = DeleteRequest::count();
         return response()->json(['count' => $orderCount]);
    }
    public function deleteAccountRequestsIndex(){
        $requests = DeleteRequest::latest()->get();
        return view('admin.deleteRequests.index',compact('requests'));
    }
    public function deleteAccount($id){
        $data = DeleteRequest::find($id);
        if($data->type == 'customer'){
            User::destroy($data->user_id);
            $data->delete();
        }elseif($data->type == 'chauffeur'){
            $data->delete();
            Chauffer::destroy($data->chauffeur_id );
        }
        return redirect()->back()->with(['status' , true , 'message' => 'Delete successfuly']);
    }

    
    // public function assign(Request $request, $id){
    //     $booking = Booking::find($id);
    //     $booking->update([
    //         'chauffer_id'=>$request->chauffeur_id
    //     ]);
    //     return redirect()->route('getBooking')->with(['status' => true, 'message' => 'Chauffeur Assigned Successfully']);
    // }
}
