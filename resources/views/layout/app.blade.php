<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Car Rental</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <style>
        /* Custom CSS for Car Rental Page */
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #0056b3;
        }

        .carousel-item img {
            height: 500px;
            object-fit: cover;
            width: 100%;
            border-radius: 0.5rem;
        }

        h2 {
            color: #343a40;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            color: #0056b3;
        }

        .card-text {
            font-size: 15px;
            color: #495057;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
            border-radius: 0.5rem;
        }

        .btn-primary:hover {
            background-color: #004494;
            transform: translateY(-2px);
        }

        /* Model badge at the bottom of the card image */
        .card-model-badge {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .form-control-search {
            max-width: 350px;
        }

        /* Offcanvas styling */
        .offcanvas {
            width: 300px;
        }

        .offcanvas-header {
            background-color: #0056b3;
            color: white;
        }

        .offcanvas-body h5 {
            font-size: 18px;
            font-weight: bold;
        }

        .offcanvas-body p {
            font-size: 14px;
        }

        .offcanvas-body .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div>
        @yield('content')
    </div>

</body>
</html>
