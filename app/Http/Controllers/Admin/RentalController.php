<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Jobs\DeleteRentalJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMailForAdmin;
use App\Mail\ConfirmationMailForCustomer;

class RentalController extends Controller
{
    // CREATE a new rental record
    public function createRental(Request $request)
    {
        try {
            $userId = $request->header("id");
            $userEmail = $request->header("email");
            $admin = User::where("role", "admin")->first();
            $adminEmail = $admin->email;
            $customer = User::find($userId);

            // Check car availability
            $car = Car::find($request->input('car_id'));
            if (!$car || $car->availability != 1) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Car is not available',
                ], 400);
            }

            // Parse dates and calculate rental cost
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'));
            $days = $startDate->diffInDays($endDate);

            if ($days <= 0) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'End date must be after the start date',
                ], 400);
            }

            $totalCost = $car->daily_rent_price * $days;

            // Create or update the rental
            $rental = Rental::wherein('status', ['completed', 'ongoing'])->updateOrCreate(
                [
                    'user_id' => $userId,
                    'car_id' => $request->input('car_id'),
                ],
                [
                    'start_date' => $request->input('start_date'),
                    'end_date' => $request->input('end_date'),
                    'total_cost' => $totalCost,
                ]
            );

            // Send confirmation emails
            Mail::to($adminEmail)->send(new ConfirmationMailForAdmin($rental, $car, $customer));
            Mail::to($userEmail)->send(new ConfirmationMailForCustomer($rental, $car));

            return response()->json([
                'status' => 'success',
                'message' => 'Rental created or updated successfully',
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Rental creation or update failed: ' . $e->getMessage(),
            ], 500);
        }
    }



    // READ all rentals (Admin only)
    public function getAllRentals(Request $request)
    {
        try {
            $rentals = Rental::with(['car', 'user'])->get();
            return response()->json([
                'status' => 'success',
                'data' => $rentals
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to fetch rentals'
            ], 500);
        }
    }

    // READ a specific rental by ID
    public function getRentalById(Request $request)
    {
        try {
            $user_id=$request->header("id");
            $rental = Rental::where("status", "ongoing")->where('user_id',$user_id)->with(['car', 'user'])->get();
            return response()->json([
                'status' => 'success',
                'data' => $rental
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to fetch rental'
            ], 500);
        }
    }
    public function getRentalByIdAdmin(Request $request)
    {
        try {
            $rental_id=$request->input("id");
            $rental = Rental::where('id',$rental_id)->with(['car','user'])->first();
            return response()->json([
                'status' => 'success',
                'data' => $rental
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to fetch rental'
            ], 500);
        }
    }

    // UPDATE an existing rental record
    public function updateRental(Request $request)
    {
        try {
            $rentalId = $request->input('id');
            Rental::where("id", $rentalId)->update([
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'status' => $request->input('status'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Rental Info Updated Successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Rental Info Update Failed'
            ], 500);
        }



    }

    // DELETE a rental record
    public function deleteRental(Request $request)
    {
        try {
            $rentalId = $request->input('id');
            Rental::where("id", $rentalId)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Rental Deleted Successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Rental Delete Failed'
            ], 500);
        }
    }


    public function cancelRental(Request $request)
    {
        try {
            $rentalId = $request->input('id');
            Rental::where("id", $rentalId)->update([
                'status' => 'cancelled',
            ]);

            // php artisan make:job DeleteRentalJob
            // QUEUE_CONNECTION=database
            // php artisan queue:work

            // Dispatch job to delete after 48 hours (2 days)
            DeleteRentalJob::dispatch($rentalId)->delay(now()->addHours(48));



            return response()->json([
                'status' => 'success',
                'message' => 'Rental Cancelled Successfully, will be deleted after 48 hours'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Rental Cancellation Failed'
            ], 500);
        }
    }

}




