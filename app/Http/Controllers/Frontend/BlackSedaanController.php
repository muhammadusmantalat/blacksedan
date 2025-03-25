<?php

namespace App\Http\Controllers\Frontend;

use Geocoder\Geocoder;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Geocoder\Provider\GoogleMaps\GoogleMaps;

class BlackSedaanController extends Controller
{
    public function index()
    {
        // return "ok";
        $vehicles = Vehicle::all();
        return view('frontend.index', compact('vehicles'));
    }
    public function getContact()
    {
        $bookingData = session('bookingData', []);

        $hoursDuration = $bookingData['duration_hours'] ?? null;
        $flightNumber = $bookingData['flight_number'] ?? null;
        $distance = $bookingData['distance'] ?? 0;
        $pickupLocation = $bookingData['pickup_location'] ?? null;
        $dropoffLocation = $bookingData['dropOff_location'] ?? null;
        $tripType = $bookingData['trip_type'] ?? null;
        $airPortpickup = $bookingData['airport_pickup'] ?? null;
        $airPortCharges = $bookingData['air_port_charges'] ?? null;
        $destination = $bookingData['destination'] ?? null;
        $totalAmount = $bookingData['totalAmount'] ?? 0;
        $subTotal =  $bookingData['subtotal'] ?? 0;
        $gratuityAmount =  $bookingData['gratuityAmount'] ?? 0;
        $taxAmount = $bookingData['taxAmount'] ?? 0;
        $basePrice = $bookingData['base_price'] ?? 0;
        $subTotal = $bookingData['subtotal'] ?? 0;
        return view('frontend.contact_us', compact('flightNumber','subTotal', 'basePrice', 'distance', 'pickupLocation', 'dropoffLocation', 'totalAmount', 'tripType', 'airPortCharges', 'airPortpickup', 'hoursDuration'));
    }

    public function creditCard()
    {
        $bookingData = session('bookingData', []);
        // return  $bookingData;
        $hoursDuration = $bookingData['duration_hours'] ?? null;
        $flightNumber = $bookingData['flight_number'] ?? null;
        $distance = $bookingData['distance'] ?? 0;
        $pickupLocation = $bookingData['pickup_location'] ?? null;
        $dropoffLocation = $bookingData['dropOff_location'] ?? null;
        $tripType = $bookingData['trip_type'] ?? null;
        $airPortpickup = $bookingData['airport_pickup'] ?? null;
        $airPortCharges = $bookingData['air_port_charges'] ?? null;
        $destination = $bookingData['destination'] ?? null;
        $totalAmount = $bookingData['totalAmount'] ?? 0;
        $subTotal =  $bookingData['subtotal'] ?? 0;
        $gratuityAmount =  $bookingData['gratuityAmount'] ?? 0;
        $taxAmount = $bookingData['taxAmount'] ?? 0;
        $basePrice = $bookingData['base_price'] ?? 0;
        $subTotal = $bookingData['subtotal'] ?? 0;
        // return $airPortCharges;
        return view('frontend.creditCard', compact('flightNumber','subTotal', 'basePrice', 'distance', 'pickupLocation', 'dropoffLocation', 'totalAmount', 'tripType', 'airPortCharges', 'airPortpickup', 'hoursDuration'));
    }
    public function complete()
    {

        return view('frontend.complete');
    }
}
