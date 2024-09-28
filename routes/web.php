<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserVerification;
use App\Http\Middleware\AdminVerification;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\RentalPage;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Frontend\CarPageController;
use App\Http\Controllers\Frontend\RentalPageController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Admin Routes
Route::post('/admin-registration', [CustomerController::class, 'AdminRegistration']); //For Future use
Route::post('/adminLogin', [CustomerController::class,'AdminLogin']);
Route::post('/admin-send-otp', [CustomerController::class, 'SendAdminOTPCode']);
Route::post('/admin-verify-otp', [CustomerController::class,'VerifyAdminOTP']);
Route::post('/admin-reset-password', [CustomerController::class, 'ResetAdminPassword'])->middleware([AdminVerification::class]);

// Admin user management

Route::get('/adminCustomer',[CustomerController::class,'listUser'])->middleware([AdminVerification::class]);
Route::get('/adminList',[CustomerController::class,'listAdmin'])->middleware([AdminVerification::class]);
Route::post('/adminListByIdCustomer',[CustomerController::class,'adminListById'])->middleware([AdminVerification::class]);
Route::post('/adminCreateCustomer',[CustomerController::class,'createUser'])->middleware([AdminVerification::class]);
Route::post('/adminUpdateCustomer',[CustomerController::class,'updateUser'])->middleware([AdminVerification::class]);
Route::post('/adminDeleteCustomer',[CustomerController::class,'deleteUser'])->middleware([AdminVerification::class]);

// Admin car management end

Route::post('/admin-car-create',[CarController::class,'carCreate'])->middleware([AdminVerification::class]);
Route::post('/admin-car-update',[CarController::class,'carUpdate'])->middleware([AdminVerification::class]);
Route::post('/admin-car-delete',[CarController::class,'carDelete'])->middleware([AdminVerification::class]);
Route::get('/admin-rentalList',[RentalController::class,'getAllRentals'])->middleware([AdminVerification::class]);
Route::post('/admin-rentalById',[RentalController::class,'getRentalByIdAdmin'])->middleware([AdminVerification::class]);
Route::post('/admin-rentalUpdate',[RentalController::class,'updateRental'])->middleware([AdminVerification::class]);
Route::post('/admin-rentalDelete',[RentalController::class,'deleteRental'])->middleware([AdminVerification::class]);

Route::post('/car-by-id',[CarController::class,'carById']);
Route::get('/carlist',[CarController::class,'carList']);

// Dashboard start

Route::get('/adminDashboard', [DashboardController::class, 'AdminDashboardPage'])->middleware([AdminVerification::class]);
Route::get('/adminSummary', [DashboardController::class, 'Summary'])->middleware([AdminVerification::class]);
Route::get('/userSummary', [DashboardController::class, 'userSummary'])->middleware([UserVerification::class]);
Route::get('/user-dashboard', [DashboardController::class, 'UserDashboardPage'])->middleware([UserVerification::class]);

// Dashboard end

// Logout
Route::get('/logout', [CustomerController::class, 'Logout'])->middleware([UserVerification::class]);
Route::get('/adminLogout', [CustomerController::class, 'AdminLogout'])->middleware([AdminVerification::class]);
// logout end

// User Routes
Route::post('/user-registration', [CustomerController::class,'UserRegistration']);
Route::post('/user-login', [CustomerController::class,'UserLogin']);
Route::post('/user-send-otp', [CustomerController::class, 'SendOTPCode']);
Route::post('/user-verify-otp', [CustomerController::class,'VerifyOTP']);
Route::post('/user-reset-password', [CustomerController::class, 'ResetPassword'])->middleware([UserVerification::class]);
Route::post('/create-rental', [RentalController::class, 'createRental'])->middleware([UserVerification::class]);
Route::get('/user-rentalById',[RentalController::class,'getRentalById'])->middleware([UserVerification::class]);
Route::post('/user-rentalCancel',[RentalController::class,'cancelRental'])->middleware([UserVerification::class]);



// Admin page Route

Route::get('/adminLogin', [PageController::class, 'AdminLoginPage']);
Route::get('/adminRegistration', [PageController::class, 'AdminRegistrationPage']);
Route::get('/adminSendOtp', [PageController::class, 'AdminSendOtpPage']);
Route::get('/adminVerifyOtp', [PageController::class, 'AdminVerifyOTPPage']);
Route::get('/adminResetPassword', [PageController::class, 'AdminResetPasswordPage']);
Route::get('/customerPage', [PageController::class, 'CustomerPage'])->middleware([AdminVerification::class]);
Route::get('/carPage', [CarPageController::class, 'CarPage'])->middleware([AdminVerification::class]);
Route::get('/rentalPage', [RentalPage::class, 'rentalPage'])->middleware([AdminVerification::class]);
Route::get('/adminDashboard', [PageController::class, 'AdminDashboard'])->middleware([AdminVerification::class]);

// User page Routes

Route::get('/', [PageController::class, 'HomePage']);
Route::get('/userLogin', [PageController::class, 'LoginPage']);
Route::get('/userRegistration', [PageController::class, 'RegistrationPage']);
Route::get('/sendOtp', [PageController::class, 'SendOtpPage']);
Route::get('/verifyOtp', [PageController::class, 'VerifyOTPPage']);
Route::get('/resetPassword', [PageController::class, 'ResetPasswordPage']);
Route::get('/UserCarPage', [CarPageController::class, 'allCarPage'])->middleware([UserVerification::class]);
Route::get('/UserRentalPage', [RentalPage::class, 'UserRentalPage'])->middleware([UserVerification::class]);

