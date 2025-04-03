<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\TermConditionController;
use App\Http\Controllers\Admin\BokingManagemantController;
use App\Http\Controllers\Admin\AdminChaufferController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\HeaderPagesController;
use App\Http\Controllers\Frontend\ChaufferController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\BlackSedaanController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
Route::get('/store-session-db', function () {
    DB::table('sessions')->insert([
        'id' => session()->getId(),
        'user_id' => 1,
        'ip_address' => request()->ip(),
        'user_agent' => request()->header('User-Agent'),
        'payload' => base64_encode(serialize(['key' => 'value'])),
        'last_activity' => now()->timestamp,
    ]);
    return 'Session stored manually!';
});
/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
/*
Admin routes
 * */

Route::get('/', function () {
    return redirect()->route('/');
});


Route::get('/admin', [AuthController::class, 'getLoginPage']);
Route::post('admin/login', [AuthController::class, 'Login']);
Route::get('/admin-forgot-password', [AdminController::class, 'forgetPassword']);
Route::post('/admin-reset-password-link', [AdminController::class, 'adminResetPasswordLink']);
Route::get('/change_password/{id}', [AdminController::class, 'change_password']);
Route::post('/admin-reset-password', [AdminController::class, 'ResetPassword']);

Route::get('/chauffeur-sign-up/{}', function () {
    return view('frontend.chauffeur-sign-up');
});
// Route::get('/chauffeur-sign-in', function () {
//     return view('frontend.chauffeur-sign-in');
// });
// Route::get('/customer-sign-up', function () {
//     return view('frontend.customer-sign-up');
// });
Route::get('/customer-sign-in', function () {
    return view('frontend.customer-sign-in');
})->name('customer-sign-in');
Route::get('/chauffeur-rides', function () {
    return view('frontend.chauffeur-rides');
});
Route::get('/chauffeur-account', function () {
    return view('frontend.chauffeur-account');
});
Route::get('/customer-account', function () {
    return view('frontend.customer-account');
});
Route::get('/customer-rides', function () {
    return view('frontend.customer-rides');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'getdashboard']);
    Route::get('profile', [AdminController::class, 'getProfile']);
    Route::post('update-profile', [AdminController::class, 'update_profile']);
    Route::get('logout', [AdminController::class, 'logout']);

    /** resource controller */
    Route::resource('vehicle', VehicleController::class);
    Route::resource('about', AboutusController::class);
    Route::resource('policy', PolicyController::class);
    Route::resource('terms', TermConditionController::class);
    Route::resource('faq', FaqController::class);
    Route::get('getBooking', [AdminBookingController::class, 'index'])->name('getBooking');
    Route::get('viewBooking', [AdminBookingController::class, 'show'])->name('viewBooking');
    Route::delete('destroy/{id}', [AdminBookingController::class, 'destroy'])->name('destroy');

    Route::get('getOffers', [BokingManagemantController::class, 'offersIndex'])->name('getOffers');
    Route::get('getUpcomingRides', [BokingManagemantController::class, 'upComingRidesIndex'])->name('getUpcomingRides');
    Route::get('getPastRides', [BokingManagemantController::class,'pastRidesIndex'])->name('getPastRides');
    Route::get('/offer/counter', [BokingManagemantController::class,'getOfferCount'])->name('offers.count');
    Route::get('/up-coming/counter', [BokingManagemantController::class,'getUpComingCount'])->name('up-coming.count');
    Route::get('/past-rides/counter', [BokingManagemantController::class,'getPastRideCount'])->name('past-rides.count');
    Route::get('/order/counter', [BokingManagemantController::class,'getOrderCount'])->name('orders.count');
    Route::get('/notification/counter', [BokingManagemantController::class,'notificationCounter'])->name('notification.counter');
    Route::get('/delete/account/requests', [BokingManagemantController::class,'deleteAccountRequests'])->name('delete.account.requests');
    Route::get('/delete/requests/index', [BokingManagemantController::class,'deleteAccountRequestsIndex'])->name('delete.requests.index');
    Route::delete('/delete/account/{id}', [BokingManagemantController::class,'deleteAccount'])->name('delete.account');

    Route::get('/notifications/index/', [BokingManagemantController::class,'notificationIndex'])->name('notification.index');

    // Admin Chauffer Controller
    Route::get('requests/count', [AdminChaufferController::class, 'requestCount'])->name('chauffer.requests.count');
    Route::get('requests', [AdminChaufferController::class, 'requestIndex'])->name('chauffer.requests');
    Route::post('requests/status/{id}', [AdminChaufferController::class, 'requestStatus'])->name('chauffer-requests.status');
    Route::get('chauffer/index', [AdminChaufferController::class, 'index'])->name('chauffer.index');
    Route::get('chauffer/edit/{id}', [AdminChaufferController::class, 'edit'])->name('chauffer.edit');
    Route::post('chauffer/status/{id}', [AdminChaufferController::class, 'chaufferStatus'])->name('chauffer.status');
    Route::post('chauffer/update/{id}', [AdminChaufferController::class, 'update'])->name('chauffer.update');
    Route::post('chauffer/assign/{id}', [BokingManagemantController::class, 'assign'])->name('chauffer.assign');
    Route::delete('chauffer/delete/{id}', [AdminChaufferController::class, 'destroy'])->name('chauffer.destroy');

    // Admin Customer Controller
    Route::get('customer/index', [AdminCustomerController::class, 'index'])->name('customer.index');
    Route::get('customer/edit/{id}', [AdminCustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customer/status/{id}', [AdminCustomerController::class, 'customerStatus'])->name('customer.status');
    Route::post('customer/update/{id}', [AdminCustomerController::class, 'update'])->name('customer.update');
    Route::delete('customer/delete/{id}', [AdminCustomerController::class, 'destroy'])->name('customer.destroy');
    
});

// BLACK SEDAN ROUTES 
Route::get('/', [BlackSedaanController::class, 'index'])->name('getBlackSeedan');
Route::get('bookingDetail', [BlackSedaanController::class, 'creditCard'])->name('creditCard');
Route::get('bookingComplete', [BlackSedaanController::class, 'complete'])->name('bookingComplete');
Route::post('booking', [BookingController::class, 'store'])->name('booking');
Route::post('confirmBooking', [BookingController::class, 'storeCreditcard'])->name('confirmBooking');

//header pages
Route::get('/home', [HeaderPagesController::class, 'home'])->name('home');
Route::get('/about-us', [HeaderPagesController::class, 'about'])->name('aboutus');
Route::get('/our-services', [HeaderPagesController::class, 'services'])->name('our-services');
Route::get('/fleet', [HeaderPagesController::class, 'fleet'])->name('fleet');
Route::get('/contact-us', [HeaderPagesController::class, 'contact'])->name('contact-us');

// Contact us
Route::get('getContact', [BlackSedaanController::class, 'getContact'])->name('getContact');
Route::post('confrim-booking', [BookingController::class, 'confirmBooking'])->name('contactUs');
// In routes/web.php
Route::get('/cancel-ride/{id}', [BookingController::class, 'cancelRide'])->name('cancelRide');
Route::get('/cancel-index/{id}', [BookingController::class, 'cancelRideIndex'])->name('cancelRideIndex');
Route::post('/cancel-reason/{id}', [BookingController::class, 'cancelReason'])->name('booking.reason');
// chauffer routes
Route::get('chauffeur-sign-in',[ChaufferController::class,'getLoginPage'])->name('chauffeur.login');
Route::get('chauffeur-sign-up/{email}',[ChaufferController::class,'getsignUpPage'])->name('chauffeur.signUp');
Route::get('chauffeur-logout',[ChaufferController::class,'logoutChauffeur'])->name('chauffeur.logout');
Route::post('chauffeur-store',[ChaufferController::class,'chaufferData'])->name('chauffeur.data');
Route::post('Chauffersigup',[ChaufferController::class,'Chauffersigup'])->name('Chauffersigup');
Route::post('chauffeurLogin',[ChaufferController::class,'chauffeurLogin'])->name('chauffeur.sign-in');
Route::post('/chauffeur-email-check', [ChaufferController::class, 'chaufferEmail'])->name('checkEmail.chauffer');
Route::middleware(['chauffeur.auth'])->group(function () {
    Route::get('/chauffeur-rides', [ChaufferController::class, 'chauffeurRides'])->name('chauffeur.rides');
    Route::post('/chauffeur-rides/accept', [ChaufferController::class, 'chauffeurRidesAccept'])->name('chauffer.rides.accept');
    Route::post('/chauffeur-rides/status', [ChaufferController::class, 'chauffeurRidesStatus'])->name('chauffer.rides.status');
    // Route::get('/chauffeur-account', function () {
    //     return view('frontend.chauffeur-account');
    // })->name('chauffeur-account');
    Route::post('/chauffeur-update', [ChaufferController::class, 'updateChauffeur'])->name('chauffeur.update');

    Route::post('/vehicles/update', [ChaufferController::class, 'storeVehicle'])
     ->name('vehicles.update');
     Route::post('/deleting-request', [ChaufferController::class, 'store']);
    Route::get('/chauffeur-account', [ChaufferController::class, 'getChaufferAccount'])->name('chauffeur-account');
     Route::post('/update-credit-card', [CustomerController::class, 'updateCreditCard'])
     ->name('update.credit.card');
    Route::delete('/delete-request/chauffer/{user}', [ChaufferController::class, 'store']);

   
});



// Customer routes

Route::post('/add-credit-card', [CustomerController::class, 'addCreditCard'])->name('addCreditCard'); // credit details add krny ka route

Route::post('/update-credit-card', [CustomerController::class, 'updateCreditCard'])
->name('update.credit.card');// credit details update krny ka route
Route::get('customer-sign-in',[CustomerController::class,'getLoginPage'])->name('customer.login');
Route::get('customer-sign-up',[CustomerController::class,'getRegisterPage'])->name('customer.register');
Route::post('/customer/register', [CustomerController::class, 'registerCustomer'])->name('registerCustomer');
Route::post('/customer-login', [CustomerController::class, 'loginCustomer'])->name('login');
Route::post('/check-email', [CustomerController::class, 'checkEmail'])->name('checkEmail');
Route::middleware(['customer.auth'])->group(function () {
    Route::get('/customer-rides', [CustomerController::class, 'customerRides'])->name('customer.rides');
    Route::post('/customer-update', [CustomerController::class, 'updateRide'])->name('customer.rides.edit');
    Route::post('/cancel-ride', [CustomerController::class, 'cancleRide'])->name('customer.rides.cancle');
    Route::get('/customer-account', [CustomerController::class, 'getaccountPage'])->name('customer-account');
    Route::post('/customer/account/update/{id}', [CustomerController::class, 'updateCustomer'])->name('customer.account.update');
    // Change the route to DELETE
   

    Route::get('/customer-logout', [CustomerController::class, 'logoutCustomer'])->name('customer.logout');
    Route::post('/delete-request/{user}', [CustomerController::class, 'store']);
});