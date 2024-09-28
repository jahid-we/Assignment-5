<div class="container-fluid py-4">
    <div class="row">

        <!-- Card 1: Customers -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="Users" class="display-5 mb-0">0</h4>
                            <p class="text-muted">Customers</p>
                        </div>
                        <div class="icon icon-shape bg-pink-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Cars -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="Cars" class="display-5 mb-0">0</h4>
                            <p class="text-muted">Cars</p>
                        </div>
                        <div class="icon icon-shape bg-green-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Available Cars -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="AvailableCars" class="display-5 mb-0">0</h4>
                            <p class="text-muted">Available Cars</p>
                        </div>
                        <div class="icon icon-shape bg-yellow-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Unavailable Cars -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="UnavailableCars" class="display-5 mb-0">0</h4>
                            <p class="text-muted">Unavailable Cars</p>
                        </div>
                        <div class="icon icon-shape bg-red-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 5: Total Rentals -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="TotalRental" class="display-5 mb-0">0</h4>
                            <p class="text-muted">Total Rentals</p>
                        </div>
                        <div class="icon icon-shape bg-blue-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 6: Total Earn -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 p-2 animated fadeIn">
            <div class="card bg-light shadow-sm rounded-4 text-center h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 id="TotalEarn" class="display-5 mb-0">$ 0</h4>
                            <p class="text-muted">Total Earn</p>
                        </div>
                        <div class="icon icon-shape bg-purple-500 rounded-circle shadow-sm p-3">
                            <img src="{{ asset('images/icon.svg') }}" alt="Icon" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    getList();
    async function getList() {
        showLoader();
        let res = await axios.get("/adminSummary");

        document.getElementById('Users').innerText = res.data['Users'];
        document.getElementById('Cars').innerText = res.data['Cars'];
        document.getElementById('AvailableCars').innerText = res.data['AvailableCars'];
        document.getElementById('UnavailableCars').innerText = res.data['UnavailableCars'];
        document.getElementById('TotalRental').innerText = res.data['TotalRental'];
        document.getElementById('TotalEarn').innerText = res.data['TotalEarn'];

        hideLoader();
    }
</script>

<style>
    .bg-pink-500 { background-color: #FF6B6B; }
    .bg-green-500 { background-color: #6BCB77; }
    .bg-yellow-500 { background-color: #FFD93D; }
    .bg-red-500 { background-color: #FF4C4C; }
    .bg-blue-500 { background-color: #4ECDC4; }
    .bg-purple-500 { background-color: #9B59B6; }

    .rounded-4 { border-radius: 1.5rem; }
    .shadow-sm { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
    .icon-shape { width: 60px; height: 60px; }
</style>
