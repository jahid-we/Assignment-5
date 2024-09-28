<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarPageController extends Controller
{
    function CarPage():View{
        return view('pages.admin_dashboard.car-page');
    }
    function allCarPage():View{
        return view('pages.user_dashboard.car-page');
    }
}
