<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Mail\AdminMail;
use App\Models\Booking;
use App\Models\Chauffer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Mail\userCancellationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingConfirmationEmail;
use App\Mail\bookingCancellationToAdmin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validation based on trip type
            if ($request->trip_type === 'one_way') {
                $request->validate([
                    'vehicle_id' => 'required',
                    'pickup_date' => 'required',
                    'pickup_time' => 'required',
                    'pickup_location' => 'required',
                    'dropOff_location' => 'required',
                    'airport_pickup' => 'required'
                ], [
                    'vehicle_id.required' => 'Vehicle is required'
                ]);
            } else if ($request->trip_type === 'by_hour') {
                $request->validate([
                    'vehicle_id' => 'required',
                    'pickup_date' => 'required',
                    'pickup_time' => 'required',
                    'pickup_location' => 'required',
                    'duration_hours' => 'required|integer|min:1',
                    'airport_pickup' => 'required'
                ], [
                    'vehicle_id.required' => 'Vehicle is required'
                ]);
            }

            $vehicle = Vehicle::find($request->vehicle_id);
            if (!$vehicle) {
                return redirect()->back()->with(['status' => false, 'error' => 'Invalid vehicle selected']);
            }
            $basePrice = $vehicle->base_price;
            $airportSurcharge = 0;
            $gratuityAmount = 0;
            $taxAmount = 0;
            $totalAmount = 0;
            if ($request->airport_pickup === 'yes') {
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
            if ($request->trip_type === 'one_way') {
                $pickupLatitude = $request->pickup_latitude;
                $pickupLongitude = $request->pickup_longitude;
                $dropoffLatitude = $request->dropoff_latitude;
                $dropoffLongitude = $request->dropoff_longitude;

                $apiKey = env('GOOGLE_MAP_KEY');
                $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins={$pickupLatitude},{$pickupLongitude}&destinations={$dropoffLatitude},{$dropoffLongitude}&key={$apiKey}";

                $response = file_get_contents($url);

                if ($response === false) {
                    // throw new \Exception('Error fetching data from Google API');
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
                    $bookingData = $request->all();
                    $bookingData['flight_number'] = $request->flight_number;
                    $bookingData['distance'] = $distance;
                    $bookingData['vehicle_id'] = $vehicle->id;
                    $bookingData['base_price'] = $basePrice;
                    $bookingData['subtotal'] = $subTotal;
                    $bookingData['gratuityAmount'] = $gratuityAmount;
                    $bookingData['taxAmount'] = $taxAmount;
                    $bookingData['trip_type'] = $request->trip_type;
                    $bookingData['air_port_charges'] = $airportSurcharge;
                    $bookingData['totalAmount'] = $totalAmount;
                    $request->session()->put('bookingData', $bookingData);
                    // return $bookingData;

                    return redirect()->route('creditCard');
                } else {
                    // throw new \Exception('Error processing distance data');
                    return redirect()->back()->with(['status' => false, 'message' => 'Error processing distance data']);
                }
            } else if ($request->trip_type === 'by_hour') {
                $duration = $request->duration_hours;
                if ($vehicle->id === 3) {
                    // $basePrice = number_format(150, 2, '.', '');
                    $basePrice = number_format(140, 2, '.', '');
                } else if ($vehicle->id === 2) {
                    // $basePrice = number_format(120, 2, '.', '');
                    $basePrice = number_format(110, 2, '.', '');
                }
                else if($vehicle->id === 4){
                    $basePrice = number_format(175, 2, '.', '');
                    // return $request;
                }
                else if($vehicle->id === 5){
                    $basePrice = number_format(250, 2, '.', '');
                    // return $request;
                }
                $subTotal = number_format($basePrice * $duration + $airportSurcharge, 2, '.', '');
                $gratuityAmount =  number_format($subTotal * 0.15, 2, '.', '');
                $taxAmount = number_format($subTotal * 0.05, 2, '.', '');
                $totalAmount = number_format($subTotal + $gratuityAmount + $taxAmount, 2, '.', '');
                // return $totalAmount;
                $bookingData = $request->all();
                $bookingData['flight_number'] = $request->flight_number;
                $bookingData['vehicle_id'] = $vehicle->id;
                $bookingData['destination'] = $request->destination;
                $bookingData['duration_hours'] = $duration;
                $bookingData['subtotal'] = $subTotal;
                $bookingData['gratuityAmount'] = $gratuityAmount;
                $bookingData['taxAmount'] = $taxAmount;
                $bookingData['trip_type'] = $request->trip_type;
                $bookingData['air_port_charges'] = $airportSurcharge;
                $bookingData['totalAmount'] = $totalAmount;
                $bookingData['base_price'] = $basePrice;
                $request->session()->put('bookingData', $bookingData);
                // return $bookingData;
                return redirect()->route('creditCard');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => false, 'error' => $e->getMessage()]);
        }
    }


    public function storeCreditcard(Request $request)
    {
        try {
            $paymentOption = $request->input('payment_option');
            return view('frontend.contact_us')->with('paymentOption', $paymentOption);
        } catch (\Exception $e) {
            return redirect()->back()->with(['status' => false, 'error' => $e->getMessage()]);
        }
    }

    public function confirmBooking(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'instruction' => 'required',
            ]);

            $bookingData = session('bookingData');
            if (!$bookingData) {
                throw new \Exception('No booking data found in session');
            }
            $pickupTime = Carbon::createFromFormat('H:i', $bookingData['pickup_time'])->format('h:i A');
            $customer_id = null;
            if(Auth::check()){
                $customer_id = Auth::user()->id;
            }
            $booking = Booking::create([
                'customer_id' => $customer_id,
                'vehicle_id' => $bookingData['vehicle_id'],
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'instruction' => $request->instruction,
                'pickup_date' => $bookingData['pickup_date'],
                'pickup_time' => $pickupTime,
                'pickup_location' => $bookingData['pickup_location'],
                'pickup_latitude' => $bookingData['pickup_latitude'],
                'pickup_longitude' => $bookingData['pickup_longitude'],
                'dropOff_location' => $bookingData['dropOff_location'] ?? null,
                'dropoff_latitude' => $bookingData['dropoff_latitude'] ?? null,
                'dropoff_longitude' => $bookingData['dropoff_longitude'] ?? null,
                'trip_type' => $bookingData['trip_type'],
                'airport_pickup' => $bookingData['airport_pickup'],
                'air_port_charges' => $bookingData['air_port_charges'],
                'destination' => $bookingData['destination'] ?? null,
                'duration_hours' => $bookingData['duration_hours'] ?? null,
                'distance' => $bookingData['distance'] ?? null,
                'total_amount' => $bookingData['totalAmount'],
                'card_type' => $request->card_type, 
                'card_holder_number' => $request->card_holder_number,
                'card_number' => $request->card_number,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvv' => $request->cvv,
                'flight_number' => $bookingData['flight_number'] ?? null,
                'status' => 'Booked',
                'subtotal' => $bookingData['subtotal'],
                'tax' => $bookingData['taxAmount'],
                'gratuity' => $bookingData['gratuityAmount'] ?? 0,
                'base_price' => $bookingData['base_price']
            ]);
            // Mail::to($request->email)->send(new BookingConfirmationEmail($booking));
            $recipients = ['booking@blacksedans.ca'];
            // $recipients = ['farhan.ranglerz@gmail.com'];
            // Mail::to($recipients)->send(new AdminMail($booking));
            return response()->json(['status' => true, 'message' => 'Ride booking successfully completed']);
        } catch (\Exception $e) {
            // Return JSON response with error
            return response()->json(['status' => false, 'error' => $e->getMessage()]);
        }
    }


    public function cancelRideIndex(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            if ($booking->status == 'cancelled') {
                return redirect()->route('getBlackSeedan')->with(['status' => false, 'message' => 'You have already cancelled your booking.']);
            }
            $createdAt = Carbon::parse($booking->created_at);
            $currentTime = Carbon::now();
            $hoursDifference = $createdAt->diffInHours($currentTime);
            if ($hoursDifference >= 24) {
                return redirect()->route('getBlackSeedan')->with(['status' => false, 'message' => 'We apologize, but you cannot cancel the booking 24 hours after it was made.']);
            }
            return view('frontend.cancel_reason', compact('booking'));
        } catch (\Exception $e) {
            return redirect()->route('getBlackSeedan')->with(['status' => false, 'message' => 'Failed to cancel the ride, Please try again. ' . $e->getMessage()]);
        }
    }

    public function cancelReason(Request $request, $id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->reason = $request->input('reason');
            $booking->status = 'cancelled';
            $booking->save();
            if ($booking) {
                Mail::to($booking->email)->send(new userCancellationMail($booking));
                $user = Chauffer::find($booking->chauffer_id);
                if($user){
                    $recipients = ['booking@blacksedans.ca',$user->email];
                }else{
                    $recipients = ['booking@blacksedans.ca'];
                }
                // $recipients = ['farhan.ranglerz@gmail.com'];
                Mail::to($recipients)->send(new bookingCancellationToAdmin($booking));
            }
            return redirect()->route('getBlackSeedan')->with(['status' => true, 'message' => 'Booking has been successfully cancelled.']);
        } catch (\Exception $e) {
            return redirect()->route('getBlackSeedan')->with(['status' => false, 'message' => 'Failed to cancel the ride. Please try again. ' . $e->getMessage()]);
        }
    }
}
