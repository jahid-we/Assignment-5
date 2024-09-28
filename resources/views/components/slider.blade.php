<section class="pb-5">
    <div class="container pt-2">
        <div class="row align-items-center mb-5">
            <div class="col-12 col-md-10 col-lg-5 mb-5 mb-lg-0">
                <h2 class="fw-bold mb-3">Elevate Your Sales Game with Our Powerful POS Application!</h2>
                <p class="lead text-muted mb-4">Discover streamlined transactions, real-time inventory management, and actionable insights in one intuitive POS app.</p>
                <div class="d-flex flex-wrap">
                    <!-- Off-canvas trigger for "Start Sale" -->
                    <button class="btn bg-gradient-primary me-2 mb-2 mb-sm-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasStartSale" aria-controls="offcanvasStartSale">
                        Enjoy More
                    </button>
                    <a class="btn bg-gradient-primary mb-2 mb-sm-0" href="{{url('/userLogin')}}">Login</a>
                </div>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1">
                <img class="img-fluid" src="{{asset('/images/bg_1.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Off-canvas Start Sale with Admin and Customer Login options (opens from left) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStartSale" aria-labelledby="offcanvasStartSaleLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasStartSaleLabel">For Enjoy More</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h5 class="fw-bold mb-3">Choose Login Type</h5>
        <div class="d-grid gap-2">
            <!-- Admin Login Button -->
            <a href="{{url('/adminLogin')}}" class="btn btn-outline-primary btn-lg">Admin Login</a>
            <!-- Customer/User Login Button -->
            <a href="{{url('/userLogin')}}" class="btn btn-outline-primary btn-lg">Customer Login</a>
            <!-- Back Button -->
            <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="offcanvas">Back</button>
        </div>
    </div>
</div>
