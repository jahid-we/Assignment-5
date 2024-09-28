<div class="modal animated zoomIn" id="car-create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Insert New Car Info</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Car Name *</label>
                                <input type="text" class="form-control" id="carName">
                                <label class="form-label">Car Brand *</label>
                                <input type="text" class="form-control" id="carBrand">
                                <label class="form-label">Car Model *</label>
                                <input type="text" class="form-control" id="carModel">
                                <label class="form-label">Year *</label>
                                <input type="number" class="form-control" id="carYear">
                                <label class="form-label">Car Type *</label>
                                <select class="form-control" id="carType">
                                    <option value="" disabled selected>Select Car Type</option>
                                    <option value="sedan">Sedan</option>
                                    <option value="suv">SUV</option>
                                    <option value="hatchback">Hatchback</option>
                                    <option value="convertible">Convertible</option>
                                    <option value="coupe">Coupe</option>
                                    <option value="pickup">Pickup Truck</option>
                                    <option value="minivan">Minivan</option>
                                    <option value="station-wagon">Station Wagon</option>
                                    <option value="sports-car">Sports Car</option>
                                </select>
                                <label class="form-label">Daily Rent price *</label>
                                <input type="number" class="form-control" id="carRentPrice">
                                <label class="form-label">Car Image *</label>
                                <input type="text" class="form-control" id="carImage">
                                <input readonly  type="text" class="form-control d-none" id="UserId">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    userId();
    async function userId(){
        let res=await axios.get("/adminList");
        let user_id=res.data["data"][0]["id"];
        document.getElementById('UserId').value=user_id;

     }


     async function Save() {
    let UserId = $("#UserId").val(); // Use .val() for jQuery
    let carName = $("#carName").val();
    let carBrand = $("#carBrand").val();
    let carModel = $("#carModel").val();
    let carYear = $("#carYear").val();
    let carType = $("#carType").val();
    let carRentPrice = $("#carRentPrice").val();
    let carImage = $("#carImage").val();

    if (carName.length === 0) {
        errorToast("Car Name Required ");
    } else if (carBrand.length === 0) {
        errorToast("Car Brand Required ");
    } else if (carModel.length === 0) {
        errorToast("Car Model Required ");
    } else if (carYear.length === 0) {
        errorToast("Car Year Required ");
    } else if (carType.length === 0) {
        errorToast("Car Type Required ");
    } else if (carRentPrice.length === 0) {
        errorToast("Car Rent Price Required ");
    } else if (carImage.length === 0) {
        errorToast("Car Image Required ");
    } else {
        $("#modal-close").click(); // Close modal
        showLoader();

        let res = await axios.post("/admin-car-create", {
            name: carName,
            brand: carBrand,
            model: carModel,
            year: carYear,
            car_type: carType,
            daily_rent_price: carRentPrice,
            image: carImage,
            user_id: UserId
        });

        hideLoader();

        if (res.data["status"] === "success") {
            successToast(res.data["message"]);
            $("#save-form")[0].reset(); // Reset form fields
            await getList(); // Refresh the car list
        } else {
            errorToast(res.data["message"]);
        }
    }
}

</script>
