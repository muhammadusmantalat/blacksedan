<?php

namespace App\Http\Controllers\Frontend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Chauffer;
use App\Models\Booking;
use App\Models\DeleteRequest;
use App\Models\AdminNotification;
use App\Mail\CustomerRegistrationMail;
use App\Mail\UpdateRideNotifyChauffe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function getLoginPage(){
        return view('frontend.customer-sign-in');
    }

    public function getRegisterPage(){
        return view('frontend.customer-sign-up');
    }

    public function customerRides() {
        $completeBookings = Booking::where('customer_id',Auth::user()->id)->where('status','Completed')->latest()->get();
        $upComingBookings = Booking::where('customer_id',Auth::user()->id)->whereIn('status',['Accepted','On The Way','Booked'])->latest()->get();
        $cancleBookings = Booking::where('customer_id',Auth::user()->id)->whereIn('status',['cancelled','Completed'])->latest()->get();
        return view('frontend.customer-rides',compact('completeBookings','upComingBookings','cancleBookings'));
    }
    public function updateRide(Request $request){
        $booking = Booking::find($request->booking_id);
        $booking->first_name = $request->fname;
        $booking->last_name = $request->lname;
        $booking->pickup_location = $request->pickup_location;
        $booking->pickup_latitude = $request->pickup_latitude;
        $booking->pickup_longitude = $request->pickup_longitude;
        $booking->dropOff_location = $request->dropOff_location;
        $booking->dropoff_latitude = $request->dropoff_latitude;
        $booking->dropoff_longitude = $request->dropoff_longitude;
        $booking->flight_number = $request->flight_number;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->instruction = $request->instruction;
        $booking->save();
        $isChanged = (
            $booking->first_name == $request->fname ||
            $booking->last_name == $request->lname ||
            $booking->pickup_location == $request->pickup_location ||
            $booking->dropOff_location == $request->dropOff_location ||
            $booking->flight_number == $request->flight_number ||
            $booking->email == $request->email ||
            $booking->phone_number == $request->phone_number ||
            $booking->instruction == $request->instruction
        );
        $data['booking'] = $booking;
        if($booking->chauffer_id !== NULL){
            $user = Chauffer::find($booking->chauffer_id);
            $customer = User::find($booking->customer_id);
            if($user){
                $data['message'] = 'The Customer : '.$customer->fname .$customer->lname.' has updated his ride details. Which is from '.$booking->pickup_location.' to '.$booking->dropOff_location.'.';
                $data['user'] = $user->fname;
                Mail::to($user->email)->send(new UpdateRideNotifyChauffe($data));
            }
        }
        if($isChanged){
            // return "ok";
            $customer = User::find($booking->customer_id);
            $data['message'] = 'The Customer : '.$customer->fname .$customer->lname.' has updated his ride details. Which is from '.$booking->pickup_location.' to '.$booking->dropOff_location.'.';
            $email = 'booking@blacksedans.ca';
            $data['user'] = 'Admin';
            Mail::to($email)->send(new UpdateRideNotifyChauffe($data));
            AdminNotification::create([
                'title'=>'Ride Updation',
                'body'=>'The Customer : '.$customer->fname .$customer->lname.' has updated his ride details. Which is from '.$booking->pickup_location.' to '.$booking->dropOff_location.'.',
            ]);
        }
        return redirect()->back();
    }
    public function cancleRide(Request $request)
{
    try {
        DB::beginTransaction(); // Start transaction

        $booking = Booking::find($request->ride_id);

        if (!$booking) {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found',
            ], 404);
        }

        $booking->update(['status' => 'cancelled']);

        DB::commit(); // Commit transaction

        return response()->json([
            'status' => 'success',
            'message' => 'Ride cancelled successfully',
        ]);
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback transaction on error

        return response()->json([
            'status' => 'error',
            'message' => 'Something went wrong',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function registerCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|string|max:20',
            'password'  => 'required|min:6',
        ], [
            'email.unique' => 'This email is already taken',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        // Create user with proper mapping
        $user =  User::create([
            'fname'    => $request->full_name,
            'lname'    => $request->last_name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => bcrypt($request->password),
            'status'   => 'registered',
            'type'     => 'customer',
        ]);
        $data['name'] = $user->fname;
        Mail::to($user->email)->send(new CustomerRegistrationMail($data));
        return response()->json(['message' => 'Registration successful!']);
    }
    public function checkEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (User::where('email', $request->email)->exists()) {
            return response()->json(['duplicate' => true, 'message' => 'This email is already taken'], 400);
        } 

        return response()->json(['duplicate' => false, 'message' => 'Email is available'], 200);
    }
    public function logoutCustomer(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
 
            return redirect()->route('customer.login')->with('success', 'Logout successfully.');

        }
    public function loginCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }

        Auth::login($user);

        return response()->json([
            'message' => 'Login successful! Redirecting...',
            'redirect' => route('customer.rides')
        ]);
    }
    public function getaccountPage() {
        $user = Auth::user();
        $cards = $user->creditCardDetail;
        return view('frontend.customer-account', compact('user' , 'cards'));
    }

    public function updateCustomer(Request $req, $id) {
        $validator = Validator::make($req->all(), [
            'full_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $id,
            'phone'     => 'required|string|max:20',
        ], [
            'email.unique' => 'This email is already taken',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::findOrFail($id); // Ensures it throws a 404 if not found
    
        $user->fname = $req->full_name;
        $user->lname = $req->last_name;
        $user->email = $req->email;
        $user->phone = $req->phone;
    
        if (!empty($req->password)) {
            $user->password = bcrypt($req->password); // Hash password before saving
        }
    
        $user->save();
    
        return response()->json(['message' => 'Profile updated successfully!']);
    }
    
    
    public function store($user_id)
    {
        // Guard ka check karna
        if (Auth::guard('web')->check() && Auth::id() == $user_id) {
            $type = 'customer';
            $user_id = Auth::id(); // Web guard se user ka ID
            $chauffeur_id = null;
        } elseif (Auth::guard('chauffeur')->check()) {
            $type = 'chauffeur';
            $user_id = null;
            $chauffeur_id = Auth::id(); // Chauffeur guard se chauffeur ka ID
        } else {
            return response()->json(['error' => 'Unauthorized request.'], 403);
        }
    
        $existingRequest =  DeleteRequest::where('user_id', Auth::user()->id)->first();
        if ($existingRequest) {
            return response()->json(['message' => 'Your Request is already in process.'], 400);
        }
    
    
        // Delete request logic
        DeleteRequest::create([
                // $test = 'name' => Auth::user()->name,
                // dd($test),
            'name' => Auth::user()->fname, 
            'email' => Auth::user()->email, 
            'type' => $type, 
            'user_id' => $user_id, 
            'chauffeur_id' => $chauffeur_id,
        ]);
    
        return response()->json(['message' => 'Delete request submitted successfully.']);
    }

    //add credit card details

public function addCreditCard(Request $request)
{
    $validator = Validator::make($request->all(), [
        'card_name' => 'required|string|max:255',
        'card_number' => 'required|string|max:255',
        'expiry_date' => 'required|string|max:255',
        'cvv'        => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = Auth::user();

    $user->creditCardDetail()->create([
        'name' => $request->card_name,
        'card_number' => $request->card_number,
        'expiry_date' => $request->expiry_date,
        'cvv'        => $request->cvv,
        'save_later' => $request->save_later,
    ]);

    return response()->json(['message' => 'Credit card details added successfully!']);

}

//update create credit card details

public function updateCreditCard(Request $request)
{
    return $request;
    $validator = Validator::make($request->all(), [
        'card_name' => 'required|string|max:255',
        // 'card_number' => 'required|string|max:255|unique:credit_cards,card_number',
        'expiry_date' => 'required|string|max:255',
        'cvv'        => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = Auth::user();
    
    // User ka card get karna (Agar ek user ka ek hi card hai)
    $card = $user->creditCardDetail()->first();

    if (!$card) {
        return response()->json(['error' => 'No credit card found for this user'], 404);
    }

    // Update credit card details
    $card->update([
        'name' => $request->card_name,
        'card_number' => $request->card_number,
        'expiry_date' => $request->expiry_date,
        'cvv'        => $request->cvv,
        'cvv'        => $request->save_later,
    ]);

    return response()->json(['message' => 'Credit card details updated successfully!']);
}


}
