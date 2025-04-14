<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Chauffer;
use App\Models\Vehicle;
use App\Models\DeleteRequest;
use App\Models\Vehicledetail;
use App\Mail\ChaufferForgetPassswordLink;
use Illuminate\Support\Facades\DB;
use App\Mail\RegistrationMail;
use Illuminate\Support\Str;
use App\Mail\CustomerRideOnTheWayMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ChaufferController extends Controller
{
    public function getLoginPage(){
        return view('frontend.chauffeur-sign-in');
    }

    public function getChaufferAccount(){
        $user = Auth::guard('chauffeur')->user();
        $userVehicle = Vehicledetail::where('chauffers_id',$user->id)->first();
        $vehicles =  Vehicle::latest()->get();
        // return $vehicle;
        return view('frontend.chauffeur-account', compact('user','userVehicle','vehicles'));
    }

    public function forgetEmailPage(){
        return view('frontend.chauffeur-reset-email');
    }

    public function forgetEmailSend(Request $request){
       
        try {
            // Validate input manually so we can catch it properly
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:chauffers,email',
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
    
            $data['url'] = url('chauffeur_change_password_page', $token);
    
            Mail::to($request->email)->send(new ChaufferForgetPassswordLink($data));
    
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
        return view('frontend.chauffeur-reset-email');
    }

    public function changePassowrd($id)
    {

        $user = DB::table('password_resets')->where('token', $id)->first();

        if (isset($user)) {
            return view('frontend.chauffeur-changePassowrd', compact('user'));
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

    public function chaufferData(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $user = User::create([
            'fname'  => $request->fname,
            'lname'  => $request->lname,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'status' => 'requested',
            'type'   => 'chauffer',
        ]);
    
        return response()->json([
            'status'  => 'success',
            'message' => 'Data sent to admin successfully.'
        ]);
    }
    

    public function Chauffersigup(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email'    => 'required|email|unique:chauffers,email',
                'phone'     => 'required|string|max:20',
                'password'  => 'required|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            // Create or update the chauffeur user in the new table
            $user = Chauffer::create([
                'email'    => $request->email,
                'fname'    => $request->full_name,
                'lname'    => $request->last_name,
                'phone'    => $request->phone,
                'password' => bcrypt($request->password),
            ]);
            $data['name'] = $user->fname;
            Mail::to($user->email)->send(new RegistrationMail($data));
            return response()->json([
                'message'  => $user->wasRecentlyCreated ? 'Registration successful!' : 'User updated successfully!',
                'user'     => $user,
                // 'redirect' => route('chauffeur.login')
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!', 'details' => $e->getMessage()], 500);
        }
    }
    

    public function chauffeurLogin(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|email',
                'password' => 'required|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            // Chauffeur model se user fetch karen
            $user = Chauffer::where('email', $request->email)->first();
            // return $user;
    
            // Agar user na mile ya password match na kare
            // if (!$user || !Hash::check($request->password, $user->password)) {
            //     return response()->json(['message' => 'Invalid credentials.'], 401);
            // }
            if (!auth()->guard('chauffeur')->attempt([
                'email' => $request->email, 
                'password' => $request->password])) 
                {
                    return response()->json(['message' => 'Invalid email or password.'], 401);
                }
            // return "k";
            // Agar login successful ho to success message return karein
            return response()->json(['message' => 'Login successful!'], 200);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!', 'details' => $e->getMessage()], 500);
        }
    }
    
    // Email validation for checking duplicate emails
    public function chaufferEmail(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'type'  => 'required|in:chauffer,customer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $existingUser = Chauffer::where('email', $request->email)->first();
        
        if ($existingUser) {
            // Email exists; check if type matches
            if ($existingUser->type !== $request->type) {
                return response()->json([
                    'duplicate' => true, 
                    'message' => 'This email is already registered.'
                ], 400);
            }
            // Allow if same type (e.g., updating existing chauffeur)
            return response()->json(['duplicate' => true, 'message' => 'Email already in use.'], 200);
        }
        
        return response()->json(['duplicate' => false, 'message' => 'Email is available.'], 200);
    }

    public function chauffeurRides() {
        $completeBookings = Booking::where('chauffer_id',Auth::guard('chauffeur')->user()->id)->where('status','Completed')->latest()->get();
        $upComingBookings = Booking::where('chauffer_id',Auth::guard('chauffeur')->user()->id)->whereIn('status',['Accepted','On The Way'])->latest()->get();
        $offers = Booking::where('chauffer_id',Auth::guard('chauffeur')->user()->id)->where('status','Booked')->latest()->get();
        $cancleBookings = Booking::where('chauffer_id',Auth::guard('chauffeur')->user()->id)->whereIn('status',['cancelled','Completed'])->latest()->get();
        $vehicles = Vehicle::latest()->get();
        return view('frontend.chauffeur-rides',compact('vehicles','offers','completeBookings','upComingBookings','cancleBookings'));
    }
    public function chauffeurRidesAccept(Request $request) {
        $id = $request->bookingId;
        $data = Booking::find($id);
    
        if ($data) {
            $data->status = 'Accepted';
            $data->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Offer Accepted Successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found',
            ], 404);
        }
    } 
    public function chauffeurRidesStatus(Request $request) {
        $id = $request->btnId;
        $booking = Booking::with('vehicle')->find($id);
    
        if ($booking) {
            $booking->chauffeurs_response = $request->status;
            if ($request->status == '2') {
                $booking->status = 'Completed';
            }elseif($request->status == '1') {
                $data['name'] = $booking->first_name;
                $data['phone'] = Auth::guard('chauffeur')->user()->phone;
                $data['vehicle'] = $booking->vehicle->name;
                $booking->status = 'On The Way';
                Mail::to($booking->email)->send(new CustomerRideOnTheWayMail($data));
            }
            $booking->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status Successfully',
                // 'DATA'=>$data,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Booking not found',
            ], 404);
        }
    }
    public function updateChauffeur(Request $request) {
        try {
            $validator = Validator::make($request->all(), [

                'fname'     => 'string|max:255',
                'lname'     => 'string|max:255',
                'phone'     => 'string|max:20',
                'password'  => 'nullable|min:6',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
    
            // Find the existing user by email
            $user = Auth::guard('chauffeur')->user();
    
            if (!$user) {
                return response()->json(['error' => 'User not found!'], 404);
            }
    
            // Update user data
            $user->update([
                'fname'    => $request->fname,
                'lname'    => $request->lname,
                'phone'    => $request->phone,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
            ]);
    
            return response()->json([
                'message'  => 'User updated successfully!',
                'user'     => $user
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!', 'details' => $e->getMessage()], 500);
        }
    }


    public function storeVehicle(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'vehicle_model'  => 'required|string|max:255',
                'vehicle_year'   => 'required|numeric|min:1900|max:'.(date('Y')+1),
                'vehicle_color'  => 'required|string|max:255',
                'vehicle_type'   => 'required|string|in:SUV,Sedan,Stretch,Sprinter',
                'plate' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }

            $chauffeur = Auth::guard('chauffeur')->user();

            $vehicle = $chauffeur->vehicledetails()->updateOrCreate(
               ['chauffers_id' => $chauffeur->id],
               [
                   'model'  => $request->vehicle_model,
                   'year'   => $request->vehicle_year,
                   'color'  => $request->vehicle_color,
                   'service' => $request->vehicle_type,
                   'plate'   => $request->plate,
               ]
            );

            return response()->json([
                'message' => 'Vehicle details saved successfully!',
                'data' => $vehicle
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error: '.$e->getMessage()
            ], 500);
        }
    }

    public function getsignUpPage($email){
        $user = User::where('id',$email)->first();
        return view('frontend.chauffeur-sign-up',compact('user'));
    }

    
    // public function getsignUpPage(Request $request){
    //     $user = User::where('email',$request->email)->first();
    //     return view('frontend.customer-sign-up',compct('user'));
    // }

    // public function store($user_id)
    // {
    //     // Guard ka check karna
    //     if (Auth::guard('web')->check() && Auth::id() == $user_id) {
    //         $type = 'customer';
    //         $user_id = Auth::id(); // Web guard se user ka ID
    //         $chauffeur_id = null;
    //     } elseif (Auth::guard('chauffeur')->check()) {
    //         $type = 'chauffeur';
    //         $user_id = null;
    //         $chauffeur_id = Auth::id(); // Chauffeur guard se chauffeur ka ID
    //     } else {
    //         return response()->json(['error' => 'Unauthorized request.'], 403);
    //     }
    //     $existingRequest = DeleteRequest::where(function ($query) {
    //         if (Auth::guard('web')->check()) {
    //             $query->where('user_id', Auth::id());
    //         } elseif (Auth::guard('chauffeur')->check()) {
    //             $query->where('chauffeur_id', Auth::guard('chauffeur')->id());
    //         }
    //     })->first();

    //     if ($existingRequest) {
    //         return response()->json(['message' => 'Your Request is already in process.'], 400);
    //     }
    
    
    //     // Delete request logic
    //     DeleteRequest::create([
    //             // $test = 'name' => Auth::user()->name,
    //             // dd($test),
    //         'name' => Auth::guard('chauffeur')->user()->fname, 
    //         'email' => Auth::guard('chauffeur')->user()->email, 
    //         'type' => $type, 
    //         'user_id' => $user_id, 
    //         'chauffeur_id' => $chauffeur_id,
    //     ]);
    
    //     return response()->json(['message' => 'Delete request submitted successfully.']);
    // }

    public function store()
    {
        if (Auth::guard('chauffeur')->check()) {
            $chauffeur = Auth::guard('chauffeur')->user(); 
            $type = 'chauffeur';
            $user_id = null;
            $chauffeur_id = $chauffeur->id; 
    
            
            $name = Auth::guard('chauffeur')->user()->fname ?? 'Unknown Chauffeur';  
            $email = $chauffeur->email ?? 'unknown@example.com';
    
        } else {
            return response()->json(['error' => 'Unauthorized request.'], 403);
        }
    
        
        $existingRequest = DeleteRequest::where('chauffeur_id', $chauffeur_id)->first();
        if ($existingRequest) {
            return response()->json(['message' => 'Your request is already in process.'], 400);
        }
    
        
        DeleteRequest::create([
            'name' => $name, 
            'email' => $email,
            'user_id' => $user_id,
            'chauffeur_id' => $chauffeur_id,
            'type' => $type
        ]);
    
        return response()->json(['message' => 'Your deletion request is forwarded to admin. We will contact you shortly.'], 201);
    }


    public function logoutChauffeur(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('chauffeur.login')->with('success', 'Logout successfully.');
    
    }

}
