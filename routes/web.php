<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TrackingController;


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

// 1. Home Route (Isay sab se upar rakhein)
Route::get('/', function () {
    return view('Website.index');
})->name('home');
// Admin Dashboard
Route::view('/dashboard', 'Admin.master');

Route::get('/about', function () {
    return view('Website.about');
})->name('about');

Route::get('/services', function () {
    return view('Website.services');
})->name('services');

Route::get('/contact', function () {
    return view('Website.contact');
})->name('contact'); // Is name par tawajjo dein

Route::get('/get-quote', function () {
    return view('Website.quote');
})->name('quote');

// Pricing Page ka route
Route::get('/pricing', function () {
    return view('Website.pricing');
})->name('pricing');

// Service Details ka route (taki agla error na aaye)
Route::get('/service-details', function () {
    return view('Website.service-details');
})->name('service.details');

// Website se booking ke liye route
Route::post('/website-booking', [CourierController::class, 'webStore'])->name('web.courier.store');

// 1. Dashboard ke liye (Jahan boxes nazar ayenge)
Route::get('/dashboard', [CourierController::class, 'dashboard'])->name('admin.dashboard');

// New Courier ka Form kholne ke liye (GET)
Route::get('/courier/create', [CourierController::class, 'create'])->name('courier.create');

// Form ka data submit karne ke liye (POST)
Route::post('/courier/store', [CourierController::class, 'store'])->name('courier.store');

// 2. Saara data dekhne ke liye (Index page)
Route::get('/courier/list', [CourierController::class, 'index'])->name('courier.index');

// 3. Kisi khas courier ko Edit karne ke liye
Route::get('/courier/edit/{id}', [CourierController::class, 'edit'])->name('courier.edit');

// 4. Edit kiya hua data update karne ke liye (PUT ya PATCH use hota hai)
Route::put('/courier/update/{id}', [CourierController::class, 'update'])->name('courier.update');

// web.php mein ise aise badal dein
Route::get('/courier/delete/{id}', [CourierController::class, 'destroy'])->name('courier.delete');


// SMS Route
// SMS Route - Do raste bana dein taake purani aur nayi dono files chal jayein
Route::get('/courier/send-sms/{id}', [CourierController::class, 'sendSMS'])->name('agent.send_sms');
Route::get('/courier/sms-legacy/{id}', [CourierController::class, 'sendSMS'])->name('courier.sms');

// Report Download Route / CourierController ke downloadReport function ko name('report.download') dena hai
Route::get('/report/download', [CourierController::class, 'downloadReport'])->name('report.download');




//agents panel

Route::get('/agent/create', [AgentController::class, 'create'])->name('agent.create');

Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');

Route::get('/agents', [AgentController::class, 'index'])->name('agent.index');

Route::get('/agent/edit/{id}', [AgentController::class, 'edit'])->name('agent.edit');

Route::post('/agent/update/{id}', [AgentController::class, 'update'])->name('agent.update');

Route::get('/agent/delete/{id}', [AgentController::class, 'destroy'])->name('agent.delete');

Route::get('/admin/customers', [CustomerController::class, 'index'])->name('customer.index');

Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');

// --- Agent Specific Tasks ---
Route::prefix('agent')->group(function () {
    
// Sahi URL ab ye hoga: /agent/view-work/{id}
Route::get('/view-work/{id}', [AgentController::class, 'showAgentWork'])->name('admin.agent.work');
    
// New Courier (Agent side)
Route::get('/new-courier', [AgentController::class, 'createCourier'])->name('agent.new_courier');
    
// Status of Branch (Statistics)
Route::get('/branch-status', [AgentController::class, 'branchStatus'])->name('agent.branch_status');
    
// Branch Report Download
Route::get('/branch-report', [AgentController::class, 'downloadBranchReport'])->name('agent.report_download');

Route::get('/admin/view-agent-work/{id}', [AgentController::class, 'showAgentWork'])->name('agent.view_work');





// --- User/Ajwa Authentication & Customer Portal ---

// Login Routes
Route::get('/user/login', [UserAuthController::class, 'showLogin'])->name('user.login');
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login'); // Default login name
Route::post('/login', [UserAuthController::class, 'login']);

// Register Routes
Route::get('/user/register', [UserAuthController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserAuthController::class, 'register']);

// Middleware group taake sirf login users hi access kar saken
Route::middleware(['auth'])->group(function () {

    // DASHBOARD REDIRECT: Jab Ajwa login karegi toh dashboard ki jagah seedha Customer List khulegi
    Route::get('/user/dashboard', function() {
        return redirect()->route('user.customer.list');
    })->name('user.dashboard');
 
    Route::post('/admin/add-user', [UserAuthController::class, 'storeUserByAdmin'])->name('admin.user.store');
    // MAIN CUSTOMER LIST: Ye wo page hai jo Ajwa ko dikhana hai
    Route::get('/user/customers', [UserAuthController::class, 'customerList'])->name('user.customer.list');

    // web.php check karein
Route::group(['prefix' => 'agent', 'middleware' => ['auth']], function() {
    
    // Tracking Routes
    Route::get('/track-consignment', [TrackingController::class, 'index'])->name('user.track');
    Route::post('/track-status', [TrackingController::class, 'viewStatus'])->name('user.status');
    Route::get('/track-details/{tracking_no}', [TrackingController::class, 'viewStatusByNumber'])->name('user.track.details');

});

    // Logout
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});
});