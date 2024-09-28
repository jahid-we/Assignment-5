<div class="modal animated zoomIn" id="update-modal-customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Car Rental Date</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label  class="form-label mb-1">Start date</label>
                                <input type="date" class="form-control text-center" id="startDate" >

                                <label  class="form-label mb-1">End date</label>
                                <input type="date" class="form-control text-center" id="endDate" >

                                <label  class="form-label mb-1">Selet Rent Status</label>
                                <select class="form-select my-3" id="rentStatus">
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                                <input disabled type="text" class="form-control text-center d-none" id="updateID-r" >
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
        let res=await axios.post("/admin-rentalById",{id:id});
        if(res.status===200 && res.data["status"]==="success"){
            $("#startDate").val(res.data['data']['start_date']);
            $("#endDate").val(res.data['data']['end_date']);
            $("#rentStatus").val(res.data['data']['status']);
        }
    }


    async function Update() {
    let id=$("#updateID-r").val();
    let startDate=$("#startDate").val();
    let endDate=$("#endDate").val();
    let status=$("#rentStatus").val();

    $("#update-modal-close").click();
    showLoader();
    let res = await axios.post("/admin-rentalUpdate", {
        id:id,
        start_date:startDate,
        end_date:endDate,
        status:status
    });
    hideLoader();
    if(res.status===200 && res.data["status"]==="success"){
        successToast(res.data['message']);
        await getList();
    }else{
        errorToast(res.data['message']);
    }


    }

</script>
