<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalPage extends Controller
{
    function rentalPage():View{
        return view('pages.admin_dashboard.rent-page');
    }
    function UserRentalPage():View{
        return view('pages.user_dashboard.rent-page');
    }
}
