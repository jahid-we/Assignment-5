<!-- Modal for Booking the Car -->
<div class="modal animated zoomIn" id="car-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">
            <div class="modal-header bg-gradient-primary text-white rounded-top">
                <h5 class="modal-title" id="exampleModalLabel">🚗 Book Your Ride</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light p-4">
                <form id="update-form">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-2">
                                <!-- Start Date -->
                                <label class="form-label mb-2"><strong>📅 Start Date</strong></label>
                                <input type="date" class="form-control text-center border-primary rounded-pill mb-3" id="startDate">

                                <!-- End Date -->
                                <label class="form-label mb-2"><strong>📅 End Date</strong></label>
                                <input type="date" class="form-control text-center border-primary rounded-pill mb-3" id="endDate">
                                <input type="text" class="d-none" id="carId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-around">
                <button onclick="Book()" id="carRental-modal-book" class="btn bg-gradient-success text-white rounded-pill px-4 py-2">📘 Book</button>
                <button id="carRental-modal-close" class="btn bg-gradient-danger text-white rounded-pill px-4 py-2" data-bs-dismiss="modal" aria-label="Close">❌ Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
async function Book() {
    const id = $("#carId").val();
    const startDate = $("#startDate").val();
    const endDate = $("#endDate").val();

    if (!startDate) {
        errorToast("Start date required");
        return;
    }
    if (!endDate) {
        errorToast("End date required");
        return;
    }
    if (startDate > endDate) {
        errorToast("Start date should be before end date");
        return;
    }

    $("#carRental-modal-close").click();
    showLoader();

    try {
        const res = await axios.post("/create-rental", {
            car_id: id,
            start_date: startDate,
            end_date: endDate
        });
        hideLoader();

        if (res.status === 200 && res.data.status === "success") {
            successToast(res.data.message);
            await getList();
        } else {
            errorToast(res.data.message);
        }
    } catch (error) {
        hideLoader();
        errorToast((error.response ? error.response.data.message : "An unexpected error occurred."));
    }
}
</script>

<style>
    /* Modal Content Styling */
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }

    .modal-header {
        border-radius: 15px 15px 0 0;
        padding: 15px;
    }

    .modal-body {
        padding: 20px;
        background-color: #f8f9fa;
    }

    /* Input Field Styling */
    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0px 0px 10px 0px rgba(0, 123, 255, 0.5);
    }

    /* Button Styling */
    .btn {
        transition: transform 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .rounded-pill {
        border-radius: 50px;
    }

    /* Loader Spinner */
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }

    /* Modern look for the form inputs */
    input[type="date"] {
        background: #f1f3f5;
        border: none;
        box-shadow: inset 0px 3px 5px rgba(0, 0, 0, 0.1);
    }

    /* Animation on modal open */
    .modal.fade .modal-dialog {
        transition: transform 0.3s ease-out;
    }

    .modal-dialog {
        transform: scale(0.9);
    }

    .modal.show .modal-dialog {
        transform: scale(1);
    }
</style>
