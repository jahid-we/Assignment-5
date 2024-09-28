<div class="modal animated zoomIn" id="update-modal-car" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Car List</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Car Name *</label>
                                <input type="text" class="form-control" id="carname">
                                <label class="form-label">Car Brand *</label>
                                <input type="text" class="form-control" id="carbrand">
                                <label class="form-label">Car Model *</label>
                                <input type="text" class="form-control" id="carmodel">
                                <label class="form-label">Year *</label>
                                <input type="number" class="form-control" id="caryear">
                                <label class="form-label">Car Type *</label>
                                <select class="form-control" id="cartype">
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
                                <input type="number" class="form-control" id="carrentprice">
                                <label class="form-label">Car availablity *</label>
                                <select class="form-control" id="caravailablity">
                                    <option value="" disabled selected>Select Car Availability</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                                <label class="form-label">Car Image *</label>
                                <input type="text" class="form-control" id="carimage">
                                <input readonly class="form-control d-none" id="updateID-car">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>


    async function FillUpUpdateForm(id){
        let res=await axios.post("/car-by-id",{id:id});
        if(res.status===200 && res.data["status"]==="success"){
            $("#carname").val(res.data['data']['name']);
            $("#carbrand").val(res.data['data']['brand']);
            $("#carmodel").val(res.data['data']['model']);
            $("#caryear").val(res.data['data']['year']);
            $("#cartype").val(res.data['data']['car_type']);
            $("#carrentprice").val(res.data['data']['daily_rent_price']);
            $("#caravailablity").val(res.data['data']['availability']);
            $("#carimage").val(res.data['data']['image']);
            $("#updateID-car").val(res.data['data']['id']);
        }

    }

    async function Update() {

        let carId = $("#updateID-car").val();
        let name = $("#carname").val();
        let brand = $("#carbrand").val();
        let model = $("#carmodel").val();
        let year = $("#caryear").val();
        let carType = $("#cartype").val();
        let rentPrice = $("#carrentprice").val();
        let availablity = $("#caravailablity").val();
        let image = $("#carimage").val();
        $("#update-modal-close").click();
        showLoader();
        let res = await axios.post("/admin-car-update", {
            id: carId,
            name: name,
            brand: brand,
            model: model,
            year: year,
            car_type: carType,
            daily_rent_price: rentPrice,
            availability: availablity,
            image: image
        });
        hideLoader();
        if (res.data["status"] === "success") {
            successToast(res.data["message"]);
            await getList();
        } else {
            errorToast(res.data["message"]);
        }




    }



</script>
