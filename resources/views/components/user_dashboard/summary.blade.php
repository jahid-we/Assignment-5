<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-6 col-md-8 col-sm-12 animated fadeIn p-3">
            <div class="card h-100 bg-gradient-primary text-white shadow-lg rounded-4" style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);"> <!-- Added shadow -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-4">
                        <!-- Modern Icon -->
                        <div class="icon-container me-3 bg-white rounded-circle p-4 shadow">
                            <i class="bi bi-car-front-fill fs-2 text-primary"></i> <!-- Updated Bootstrap Icon -->
                        </div>

                        <!-- Info -->
                        <div>
                            <h2 id="rental" class="display-3 font-weight-bold mb-0">0</h2>
                            <p class="h6 mb-0">Total Rentals</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <small class="text-white-50">Enjoy Your Ride</small>
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
        let res = await axios.get("/userSummary");
        document.getElementById('rental').innerText = res.data['rental'];
        hideLoader();
    }
</script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff 0%, #00c4ff 100%);
    }

    .icon-container {
        width: 80px; /* Increased width */
        height: 80px; /* Increased height */
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Added shadow to icon container */
    }

    .fs-2 {
        font-size: 2.5rem; /* Larger icon size */
    }

    .display-3 {
        font-size: 3rem; /* Increased text size */
    }
</style>
