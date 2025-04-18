<?php

namespace App\Http\Controllers\Frontend;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Chauffer;
use App\Models\Booking;
use Illuminate\Support\Str;
use App\Models\DeleteRequest;
use App\Models\AdminNotification;
use App\Mail\CustomerRegistrationMail;
use App\Mail\UpdateRideNotifyChauffe;
use App\Mail\UpdateRideNofifyCustomer;
use App\Mail\UpdateRideNofifyAdmin;
use App\Mail\CustomerForgetPassswordLink;
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

    public function forgetEmailPage(){
        return view('frontend.customer-reset-email');
    }

    public function forgetEmailSend(Request $request){
       
        try {
            // Validate input manually so we can catch it properly
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
            ]);
    
            if ($validator->fails()) {
                // Return proper 422 error response
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            // Check if reset already exists
            $exists = DB::table('password_resets')->where('email', $request->email)->first();
    
            if ($exists) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Reset Password link has already been sent.'
                ]);
            }
    
            // Send reset link
            $token = Str::random(30);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
    
            $data['url'] = url('customer_change_password_page', $token);
    
            Mail::to($request->email)->send(new CustomerForgetPassswordLink($data));
    
            return response()->json([
                'status' => 'success',
                'message' => 'Reset Password link sent successfully. Please check your email.'
            ]);
    
        } catch (ValidationException $e) {
            // Handle validation errors separately
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error occurred.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Handle other errors
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while sending the reset link. Please try again later.',
                'debug' => $e->getMessage() // Remove in production
            ], 500);
        }
        return view('frontend.customer-reset-email');
    }

    public function changePassowrd($id)
    {

        $user = DB::table('password_resets')->where('token', $id)->first();

        if (isset($user)) {
            return view('frontend.customer-changePassowrd', compact('user'));
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $validated = $request->validate([
                'password' => 'required|min:8',
                'confirmed' => 'required|same:password',
            ]);

            // Update password
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);

            // Remove token from resets table
            DB::table('password_resets')->where('email', $request->email)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Password changed successfully!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }


    public function customerRides() {
        $completeBookings = Booking::where('customer_id',Auth::user()->id)->where('status','Completed')->latest()->get();
        $upComingBookings = Booking::where('customer_id',Auth::user()->id)->whereIn('status',['Accepted','On The Way','Booked'])->latest()->get();
        $cancleBookings = Booking::where('customer_id',Auth::user()->id)->whereIn('status',['cancelled','Completed'])->latest()->get();
        return view('frontend.customer-rides',compact('completeBookings','upComingBookings','cancleBookings'));
    }
    public function updateRide1(Request $request){
        $booking = Booking::find($request->booking_id);
        $booking->first_name = $request->fname;
        $booking->last_name = $request->lname;
        // $booking->pickup_location = $request->pickup_location;
        // $booking->pickup_latitude = $request->pickup_latitude;
        // $booking->pickup_longitude = $request->pickup_longitude;
        // $booking->dropOff_location = $request->dropOff_location;
        // $booking->dropoff_latitude = $request->dropoff_latitude;
        // $booking->dropoff_longitude = $request->dropoff_longitude;
        $booking->flight_number = $request->flight_number;
        $booking->email = $request->email;
        $booking->phone_number = $request->phone_number;
        $booking->pickup_time = $request->pickup_time;
        $booking->instruction = $request->instruction;
        $booking->save();
        // return $booking;
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
    // update ride
    public function updateRide(Request $request)
    {
        // return $request;
        try {
            $booking = Booking::find($request->booking_id);
            $vehicle = Vehicle::find($booking->vehicle_id);
            if (!$vehicle) {
                return redirect()->back()->with(['status' => false, 'error' => 'Invalid vehicle selected']);
            }
            $basePrice = $vehicle->base_price;
            $airportSurcharge = 0;
            $gratuityAmount = 0;
            $taxAmount = 0;
            $totalAmount = 0;
            if ($booking->airport_pickup === 'yes') {
                if ($vehicle->id === 3) {
                    $airportSurcharge = number_format(15, 2, '.', '');
                } else if ($vehicle->id === 2) {
                    $airportSurcharge = number_format(10, 2, '.', '');
                } else if ($vehicle->id === 4) {
                    $airportSurcharge = number_format(15, 2, '.', '');
                } else if ($vehicle->id === 5) {
                    $airportSurcharge = number_format(20, 2, '.', '');
                }
            }
            if ($booking->trip_type === 'one_way') {
                $pickupLatitude = $request->pickup_latitude;
                $pickupLongitude = $request->pickup_longitude;
                $dropoffLatitude = $request->dropoff_latitude;
                $dropoffLongitude = $request->dropoff_longitude;
                $apiKey = env('GOOGLE_MAP_KEY');
                $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins={$pickupLatitude},{$pickupLongitude}&destinations={$dropoffLatitude},{$dropoffLongitude}&key={$apiKey}";
                $response = file_get_contents($url);
                if ($response === false) {
                    return redirect()->back()->with(['status' => false, 'message' => 'Error fetching data from Google API']);
                }
                $data = json_decode($response);
                
                if ($data->status === 'OK' && isset($data->rows[0]->elements[0]->distance->value)) {
                    $distance = $data->rows[0]->elements[0]->distance->value / 1000;
                    $pricePerKilometer = $vehicle->price_per_kilometer;
                    $amount = number_format($distance * $pricePerKilometer, 2, '.', '');
                    $subTotal = number_format($amount + $basePrice + $airportSurcharge, 2, '.', '');
                    $gratuityAmount =  number_format($subTotal * 0.15, 2, '.', '');
                    $taxAmount =  number_format($subTotal * 0.05, 2, '.', '');
                    $totalAmount = number_format($subTotal + $gratuityAmount + $taxAmount, 2, '.', '');
                    if ($vehicle->id === 3 &&  $totalAmount < 150) {
                        $totalAmount = number_format(150, 2, '.', '');
                        $subTotals = number_format($totalAmount - $amount, 2, '.', '');
                        $gratuityAmount1 = number_format($subTotals * 0.15, 2, '.', '');
                        $taxAmount1 = number_format($subTotals * 0.05, 2,'.', '');
                        $basePrice = number_format($subTotals - $gratuityAmount1 - $taxAmount1, 2, '.', '');
                        $subTotal = number_format($amount + $basePrice + $airportSurcharge, 2, '.', '');
                        $gratuityAmount =   number_format($subTotal * 0.15, 2, '.', '');
                        $taxAmount =  number_format($subTotal * 0.05, 2, '.', '');
                        $totalAmount = number_format($subTotal + $gratuityAmount + $taxAmount, 2, '.', '');
                    } elseif ($vehicle->id === 2 &&  $totalAmount < 110) {
                        $totalAmount = number_format(110, 2, '.', '');
                        $subTotals = number_format($totalAmount - $amount, 2, '.', '');
                        $gratuityAmount1 = number_format($subTotals * 0.15, 2, '.', '');
                        $taxAmount1 = number_format($subTotals * 0.05, 2,'.', '');
                        $basePrice = number_format($subTotals - $gratuityAmount1 - $taxAmount1, 2, '.', '');
                        $subTotal = number_format($amount + $basePrice + $airportSurcharge, 2, '.', '');
                        $gratuityAmount =   number_format($subTotal * 0.15, 2, '.', '');
                        $taxAmount =  number_format($subTotal * 0.05, 2, '.', '');
                        $totalAmount = number_format($subTotal + $gratuityAmount + $taxAmount, 2, '.', '');
                    }
                    try {
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
                        $booking->pickup_time = $request->pickup_time;
                        $booking->instruction = $request->instruction;

                        $booking->distance = $distance;
                        $booking->base_price = $basePrice;
                        $booking->subtotal = $subTotal;
                        $booking->gratuity = $gratuityAmount;
                        $booking->tax = $taxAmount;
                        $booking->air_port_charges = $airportSurcharge;
                        $booking->total_amount = $totalAmount;

                        $booking->save();
                    } catch (\Exception $e) {
                        return $e->getMessage();
                    }
                    if ($booking->chauffer_id !== NULL) {
                        $user = Chauffer::find($booking->chauffer_id);
                        $customer = User::find($booking->customer_id);
                        if ($user) {
                            $data1 = [
                                'name' => $user->fname,
                                'pickup_location' => $booking->pickup_location,
                                'dropOff_location' => $booking->dropOff_location,
                                'pickup_date' => $booking->pickup_date,
                                'pickup_time' => $booking->pickup_time,
                                'instruction' => $booking->instruction,
                                'trip_type'=> $booking->trip_type,
                            ];
                            $data2 = [
                                'name' => $customer->fname,
                                'pickup_location' => $booking->pickup_location,
                                'dropOff_location' => $booking->dropOff_location,
                                'pickup_date' => $booking->pickup_date,
                                'pickup_time' => $booking->pickup_time,
                                'instruction' => $booking->instruction,
                                'distance' => $booking->distance,
                                'total_amount' => $booking->total_amount,
                                'trip_type'=> $booking->trip_type,
                            ];
                            $data3 = [
                                'name' => 'Admin',
                                'pickup_location' => $booking->pickup_location,
                                'dropOff_location' => $booking->dropOff_location,
                                'pickup_date' => $booking->pickup_date,
                                'pickup_time' => $booking->pickup_time,
                                'instruction' => $booking->instruction,
                                'distance' => $booking->distance,
                                'total_amount' => $booking->total_amount,
                                'trip_type'=> $booking->trip_type,
                            ];
                            try {
                                Mail::to($user->email)->send(new UpdateRideNotifyChauffe($data1));
                                Mail::to($customer->email)->send(new UpdateRideNofifyCustomer($data2));
                                Mail::to('booking@blacksedans.ca')->send(new UpdateRideNofifyAdmin($data3));
                            } catch (\Exception $e) {
                                return $e->getMessage();
                            }
                        }
                    }else if ($booking->chauffer_id == NULL){
                        $customer = User::find($booking->customer_id);
                        if ($customer) {
                            $data2 = [
                                'name' => $customer->fname,
                                'pickup_location' => $booking->pickup_location,
                                'dropOff_location' => $booking->dropOff_location,
                                'pickup_date' => $booking->pickup_date,
                                'pickup_time' => $booking->pickup_time,
                                'instruction' => $booking->instruction,
                                'distance' => $booking->distance,
                                'total_amount' => $booking->total_amount,
                                'trip_type'=> $booking->trip_type,
                            ];
                            $data3 = [
                                'name' => 'Admin',
                                'pickup_location' => $booking->pickup_location,
                                'dropOff_location' => $booking->dropOff_location,
                                'pickup_date' => $booking->pickup_date,
                                'pickup_time' => $booking->pickup_time,
                                'instruction' => $booking->instruction,
                                'distance' => $booking->distance,
                                'total_amount' => $booking->total_amount,
                                'trip_type'=> $booking->trip_type,
                            ];
                            try {
                                Mail::to($customer->email)->send(new UpdateRideNofifyCustomer($data2));
                                Mail::to('booking@blacksedans.ca')->send(new UpdateRideNofifyAdmin($data3));
                            } catch (\Exception $e) {
                                return $e->getMessage();
                            }
                    }}
                    return redirect()->back();
                } else {
                    return redirect()->back()->with(['status' => false, 'message' => 'Error processing distance data']);
                }
            } else if ($booking->trip_type === 'by_hour') {
                // return $request;
                $duration = $request->duration_hours;

                if ($vehicle->id === 3) {
                    $basePrice = number_format(140, 2, '.', '');
                } else if ($vehicle->id === 2) {
                    $basePrice = number_format(110, 2, '.', '');
                }
                else if($vehicle->id === 4){
                    $basePrice = number_format(175, 2, '.', '');
                }
                else if($vehicle->id === 5){
                    $basePrice = number_format(250, 2, '.', '');
                }
                $subTotal = number_format($basePrice * $duration + $airportSurcharge, 2, '.', '');
                $gratuityAmount =  number_format($subTotal * 0.15, 2, '.', '');
                $taxAmount = number_format($subTotal * 0.05, 2, '.', '');
                $totalAmount = number_format($subTotal + $gratuityAmount + $taxAmount, 2, '.', '');
                try {
                    $booking->first_name = $request->fname;
                    $booking->last_name = $request->lname;

                    $booking->pickup_location = $request->pickup_location;
                    $booking->pickup_latitude = $request->pickup_latitude;
                    $booking->pickup_longitude = $request->pickup_longitude;
                    // $booking->dropOff_location = $request->dropOff_location;
                    // $booking->dropoff_latitude = $request->dropoff_latitude;
                    // $booking->dropoff_longitude = $request->dropoff_longitude;

                    $booking->flight_number = $request->flight_number;
                    $booking->email = $request->email;
                    $booking->phone_number = $request->phone_number;
                    $booking->pickup_time = $request->pickup_time;
                    $booking->instruction = $request->instruction;

                    $booking->duration_hours = $duration;
                    $booking->base_price = $basePrice;
                    $booking->subtotal = $subTotal;
                    $booking->gratuity = $gratuityAmount;
                    $booking->tax = $taxAmount;
                    $booking->air_port_charges = $airportSurcharge;
                    $booking->total_amount = $totalAmount;

                    $booking->save();
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
                if ($booking->chauffer_id !== NULL) {
                    $user = Chauffer::find($booking->chauffer_id);
                    $customer = User::find($booking->customer_id);
                    if ($user) {
                        $data1 = [
                            'name' => $user->fname,
                            'pickup_location' => $booking->pickup_location,
                            // 'dropOff_location' => $booking->dropOff_location,
                            'pickup_date' => $booking->pickup_date,
                            'pickup_time' => $booking->pickup_time,
                            'instruction' => $booking->instruction,
                            'duration_hours'=> $request->duration_hours,
                            'trip_type'=> $booking->trip_type,
                        ];
                        $data2 = [
                            'name' => $customer->fname,
                            'pickup_location' => $booking->pickup_location,
                            // 'dropOff_location' => $booking->dropOff_location,
                            'pickup_date' => $booking->pickup_date,
                            'pickup_time' => $booking->pickup_time,
                            'instruction' => $booking->instruction,
                            'distance' => $booking->distance,
                            'total_amount' => $booking->total_amount,
                            'trip_type'=> $booking->trip_type,
                            'duration_hours'=> $request->duration_hours,
                        ];
                        $data3 = [
                            'name' => 'Admin',
                            'pickup_location' => $booking->pickup_location,
                            // 'dropOff_location' => $booking->dropOff_location,
                            'pickup_date' => $booking->pickup_date,
                            'pickup_time' => $booking->pickup_time,
                            'instruction' => $booking->instruction,
                            'distance' => $booking->distance,
                            'total_amount' => $booking->total_amount,
                            'duration_hours'=> $request->duration_hours,
                            'trip_type'=> $booking->trip_type,
                        ];
                        try {
                            Mail::to($user->email)->send(new UpdateRideNotifyChauffe($data1));
                            Mail::to($customer->email)->send(new UpdateRideNofifyCustomer($data2));
                            Mail::to('booking@blacksedans.ca')->send(new UpdateRideNofifyAdmin($data3));
                        } catch (\Exception $e) {
                            return $e->getMessage();
                        }
                    }
                }else if ($booking->chauffer_id == NULL){
                    // return $booking;
                    $customer = User::find($booking->customer_id);
                    if ($customer) {
                        $data2 = [
                            'name' => $customer->fname,
                            'pickup_location' => $booking->pickup_location,
                            'dropOff_location' => $booking->dropOff_location,
                            'pickup_date' => $booking->pickup_date,
                            'pickup_time' => $booking->pickup_time,
                            'instruction' => $booking->instruction,
                            'distance' => $booking->distance,
                            'total_amount' => $booking->total_amount,
                            'trip_type'=> $booking->trip_type,
                            'duration_hours'=> $request->duration_hours,
                        ];
                        $data3 = [
                            'name' => 'Admin',
                            'pickup_location' => $booking->pickup_location,
                            'dropOff_location' => $booking->dropOff_location,
                            'pickup_date' => $booking->pickup_date,
                            'pickup_time' => $booking->pickup_time,
                            'instruction' => $booking->instruction,
                            'distance' => $booking->distance,
                            'total_amount' => $booking->total_amount,
                            'trip_type'=> $booking->trip_type,
                            'duration_hours'=> $request->duration_hours,
                        ];
                        try {
                            Mail::to($customer->email)->send(new UpdateRideNofifyCustomer($data2));
                            // return $booking;
                            Mail::to('booking@blacksedans.ca')->send(new UpdateRideNofifyAdmin($data3));
                        } catch (\Exception $e) {
                            return $e->getMessage();
                        }
                    }

                }
                return redirect()->back();
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => false, 'error' => $e->getMessage()]);
        }
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
        // return $req->phone;
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
        // return $user;
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
        // return $request;
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
            'save_later'        => $request->save_later,
        ]);

        return response()->json(['message' => 'Credit card details updated successfully!']);
    }


}
