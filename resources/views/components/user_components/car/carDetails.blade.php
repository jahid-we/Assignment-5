<!-- Modal Section for Car Details -->
<div class="modal animated zoomIn" id="carDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-gradient-info text-white">
                <h5 class="modal-title" id="exampleModalLabel">🚗 Car Details</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light p-4">
                <form id="update-form">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-1">
                                <!-- Loading Spinner -->
                                <div id="loadingSpinner" class="text-center d-none">
                                    <div class="spinner-border text-info" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>

                                <!-- Hidden Car ID -->
                                <input type="text" class="d-none" id="carId">

                                <!-- Car Name -->
                                <div class="mb-3">
                                    <strong>Car Name: </strong><span id="carName" class="text-primary"></span>
                                </div>

                                <!-- Brand -->
                                <div class="mb-3">
                                    <strong>Brand: </strong><span id="brand" class="text-dark"></span>
                                </div>

                                <!-- Model -->
                                <div class="mb-3">
                                    <strong>Model: </strong><span id="model" class="text-dark"></span>
                                </div>

                                <!-- Year -->
                                <div class="mb-3">
                                    <strong>Year: </strong><span id="year" class="text-dark"></span>
                                </div>

                                <!-- Car Type -->
                                <div class="mb-3">
                                    <strong>Car Type: </strong><span id="carType" class="text-dark"></span>
                                </div>

                                <!-- Daily Rent Price -->
                                <div class="mb-3">
                                    <strong>Daily Rent Price: </strong><span id="rentPrice" class="text-success"></span> $
                                </div>

                                <!-- Availability -->
                                <div class="mb-3">
                                    <strong>Availability: </strong><span id="availability" class="badge bg-success"></span>
                                </div>

                                <!-- Car Image -->
                                <div class="mb-3 text-center">
                                    <img id="carImage" src="" alt="Car Image" class="img-fluid rounded shadow-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button onclick="details()" type="button" id="details" class="btn bg-gradient-success text-white rounded-pill px-4 py-2">More Details</button>
                <button id="carDetails-modal-close" class="btn bg-gradient-danger text-white rounded-pill px-4 py-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to fetch car details
    async function details() {
        let id = $("#carId").val(); // Get the car ID from hidden input
        if (!id) return; // Exit if no ID is provided

        // Show the loading spinner
        $('#loadingSpinner').removeClass('d-none');

        try {
            let res = await axios.post("/car-by-id", { id: id });

            if (res.data.status === "success") {
                let car = res.data.data;  // Correct data path

                // Set data in text spans
                $('#carName').text(car.name);
                $('#brand').text(car.brand);
                $('#model').text(car.model);
                $('#year').text(car.year);
                $('#carType').text(car.car_type);
                $('#rentPrice').text(car.daily_rent_price);
                $('#availability').text(car.availability === 1 ? "Available" : "Not Available");
                $('#carImage').attr('src', car.image);  // Set image source
            }
        } catch (error) {
            console.error("Error fetching car details:", error);
        } finally {
            // Hide the loading spinner
            $('#loadingSpinner').addClass('d-none');
        }
    }

    // Clear modal data when closed
    $('#carDetailsModal').on('hidden.bs.modal', function () {
        // Clear text fields
        $('#carId').val('');
        $('#carName').text('');
        $('#brand').text('');
        $('#model').text('');
        $('#year').text('');
        $('#carType').text('');
        $('#rentPrice').text('');
        $('#availability').text('');

        // Reset the car image
        $('#carImage').attr('src', '');

        // Hide the loading spinner if it was visible
        $('#loadingSpinner').addClass('d-none');
    });
</script>

<style>
    /* Custom Modal Styles */
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        padding: 15px;
        border-bottom: none;
        border-radius: 15px 15px 0 0;
    }

    .modal-body {
        padding: 20px;
    }

    .btn {
        transition: background-color 0.3s ease, transform 0.3s;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .rounded-pill {
        border-radius: 50px;
    }

    .badge {
        font-size: 0.9rem;
        padding: 0.4rem 0.7rem;
        font-weight: bold;
    }

    /* Spinner */
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    .img-fluid {
        max-width: 300px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }
</style>
