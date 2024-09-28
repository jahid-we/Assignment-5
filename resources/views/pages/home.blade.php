@extends('layout.app')
@section('content')

<!-- Header (Navigation) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">CarRental</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#car">Cars</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <form class="d-flex ms-auto" style="width: 200px; height: 45px">
                    <input id="searchInput" class="form-control form-control-search me-2" type="search" placeholder="Search cars..." aria-label="Search" onkeyup="searchCars()">
                </form>
                <li class="nav-item">
                    <button class="btn btn-outline-primary ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#dashboardCanvas" aria-controls="dashboardCanvas">
                        Dashboard
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="Login()" class="btn btn-outline-success ms-3" >
                        <a href="{{url('/userLogin')}}" style="text-decoration: none;">Login</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Slider -->
<div id="carRentalSlider" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-inner" id="carouselItems">
        <!-- Dynamic carousel items will be injected here -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carRentalSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carRentalSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Available Cars Section -->
<div id="car" class="container">
    <div class="row justify-content-center mb-5">
        <h2 class="text-center">Available Cars for Rent</h2>
    </div>
    <div id="carList" class="row justify-content-center">
        <!-- Dynamic car cards will be injected here -->
    </div>
</div>

<!-- Admin/User Dashboard Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="dashboardCanvas" aria-labelledby="dashboardCanvasLabel">
    <div class="offcanvas-header">
        <h5 id="dashboardCanvasLabel">Dashboard</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h5>Login Options</h5>
        <button onclick="AdminLogin()" class="btn btn-primary"><a href="{{url('/adminDashboard')}}" style="text-decoration: none; color: white">Admin Dashboard</a></button>
        <button onclick="UserLogin()" class="btn btn-secondary"><a href="{{url('/user-dashboard')}}" style="text-decoration: none; color: white">Customer Dashboard</a></button>
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p>&copy; 2024 | All Rights Reserved By Jahid Hasan</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
</footer>

<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script>
    // Function to fetch cars from the /carlist API
    async function fetchCars() {
        try {
            const response = await axios.get('/carlist'); // Ensure this API is working
            const carData = response.data.data; // Adjust based on your actual API response structure
            displayCars(carData);
            displayCarousel(carData);
        } catch (error) {
            console.error("Error fetching car data:", error);
        }
    }

    // Function to display cars dynamically
    function displayCars(carData) {
        const carList = document.getElementById("carList");
        carList.innerHTML = ''; // Clear existing cards
        carData.forEach(car => {
            const card = `
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="${car.image}" class="card-img-top" alt="${car.brand} ${car.model}">
                        <div class="card-body">
                            <h5 class="card-title">${car.name} </h5>
                            <p class="card-text">Brand: ${car.brand}</p>
                            <p class="card-text">Model: ${car.model}</p>
                            <p class="card-text">Type: ${car.car_type}</p>
                            <p class="card-text">Price: $${car.daily_rent_price} per day</p>
                            <button onclick="UserRental()" class="btn btn-primary"><a href="{{url('/UserRentalPage')}}" style="text-decoration: none;">Rent Now</a></button>
                        </div>
                    </div>
                </div>`;
            carList.innerHTML += card;
        });
    }

    // Function to display images in the carousel slider
    function displayCarousel(carData) {
        const carouselItems = document.getElementById("carouselItems");
        carouselItems.innerHTML = ''; // Clear existing carousel items
        carData.forEach((car, index) => {
            const activeClass = index === 0 ? 'active' : ''; // Set the first item as active
            const item = `
                <div class="carousel-item ${activeClass}">
                    <img src="${car.image}" class="d-block w-100" alt="${car.brand} ${car.model}">
                </div>`;
            carouselItems.innerHTML += item;
        });
    }

    // Function to search cars dynamically
    function searchCars() {
        const searchValue = document.getElementById("searchInput").value.toLowerCase();
        const carItems = document.querySelectorAll("#carList .card");
        carItems.forEach(card => {
            const title = card.querySelector(".card-title").textContent.toLowerCase();
            if (title.includes(searchValue)) {
                card.parentElement.style.display = "block";
            } else {
                card.parentElement.style.display = "none";
            }
        });
    }

    // Initial call to fetch cars on page load
    fetchCars();



    function Login() {
        window.location.href="/userLogin"
    }
    function AdminLogin() {
        window.location.href="/adminDashboard"
    }
    function UserLogin() {
        window.location.href="/user-dashboard"
    }
    function UserRental() {
        window.location.href="/UserCarPage"
    }
</script>

@endsection
