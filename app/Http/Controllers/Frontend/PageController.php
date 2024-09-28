<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function HomePage(){
        return view('pages.home');
    }
    function LoginPage():View{
        return view('pages.auth.login-page');
    }

    function RegistrationPage():View{
        return view('pages.auth.registration-page');
    }
    function SendOtpPage():View{
        return view('pages.auth.send-otp-page');
    }
    function VerifyOTPPage():View{
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage():View{
        return view('pages.auth.reset-pass-page');
    }

    function ProfilePage():View{
        return view('pages.dashboard.profile-page');
    }



    // Admin Page

    function AdminLoginPage():View{
        return view('pages.admin_auth.login-page');
    }

    function AdminRegistrationPage():View{
        return view('pages.admin_auth.registration-page');
    }
    function AdminSendOtpPage():View{
        return view('pages.admin_auth.send-otp-page');
    }
    function AdminVerifyOTPPage():View{
        return view('pages.admin_auth.verify-otp-page');
    }

    function AdminResetPasswordPage():View{
        return view('pages.admin_auth.reset-pass-page');
    }

    function AdminProfilePage():View{
        return view('pages.admin_dashboard.profile-page');
    }

    function CustomerPage():View{
        return view('pages.admin_dashboard.customer-page');
    }
    function CarPage():View{
        return view('pages.admin_dashboard.car-page');
    }
    function AdminDashboard():View{
        return view('pages.admin_dashboard.dashboard-page');
    }
}
