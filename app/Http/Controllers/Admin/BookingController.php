<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Chauffer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $chauffers = User::where('type','chauffer')->latest()->get();
        $bookings = Booking::with('vehicle')
        ->whereIn('status',['Booked','On The Way'])
        ->orderBy('id' , 'DESC')->get();
        $chauffers = Chauffer::latest()->get();
        return view('admin.bookings.index',compact('bookings','chauffers'));
    }

    // display all booking data on view
    public function show(Request $request)
    {
        $booking = Booking::with('vehicle')->find($request->id);
        $bookings = view('admin.bookings.model', compact('booking'))->render();
        return response()->json($bookings);
    }
    public function destroy($id){
        Booking::destroy($id);
        return redirect()->back()->with(['status' , true , 'message' => 'Delete successfuly']);
    }
}
