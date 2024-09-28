<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function AdminDashboardPage():View{
        return view('pages.admin_dashboard.dashboard-page');
    }
    function UserDashboardPage():View{
        return view('pages.user_dashboard.dashboard-page');
    }

    function Summary(Request $request): array {

        $Users = User::where('role', 'customer')->count();
        $Cars = Car::count();
        $AvailableCars = Car::where('availability', '1')->count();
        $UnavailableCars = Car::where('availability', '0')->count();
        $TotalRental = Rental::whereIn('status', ['completed', 'ongoing'])->count(); // Fixed here
        $TotalEarn = Rental::whereIn('status', ['completed', 'ongoing'])->sum('total_cost') ?? 0;  // Fixed here

        return [
            'Users' => $Users,
            'Cars' => $Cars,
            'AvailableCars' => $AvailableCars,
            'UnavailableCars' => $UnavailableCars,
            'TotalRental' => $TotalRental,
            'TotalEarn' => round($TotalEarn, 2),
        ];
    }

    function userSummary(Request $request) {
        $userId = $request->header("id");

        // Assuming 'Rental' is the model for the rentals
        $rentalCount = Rental::where("user_id", $userId)
                             ->where("status", "ongoing")
                             ->count();

        return [
            'rental' => $rentalCount
        ];
    }



}
