<nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2 ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="img-fluid" src="{{asset('/images/rent.png')}}" alt="" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01" aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i> <!-- Custom icon for the toggler -->
        </button>
        <div class="collapse navbar-collapse" id="header01">
            <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                <li class="nav-item me-4"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">Company</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Testimonials</a></li>
            </ul>
            <div><a class="btn mt-3 bg-gradient-primary" href="{{url('/userLogin')}}">Book Now</a></div>
        </div>
    </div>
</nav>
