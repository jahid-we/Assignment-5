<div class="modal animated zoomIn" id="update-modal-customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Customer Role As Admin</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label  class="form-label mb-1">User Role</label>
                                <input disabled type="text" class="form-control text-center" id="customerRoll" >

                                <select class="form-select my-3" >
                                    <option id="customerRoleUpdate" value="admin">Admin</option>
                                  </select>

                                <input type="text" class="d-none" id="updateID-c">
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
        let res=await axios.post("/adminListByIdCustomer",{id:id});
        if(res.status===200 && res.data["status"]==="success"){
            $("#customerRoll").val(res.data['data']['role']);
        }
    }


    async function Update() {
    let id=$("#updateID-c").val();
    let role=$(("#customerRoleUpdate")).val();

    $("#update-modal-close").click();
    showLoader();
    let res = await axios.post("/adminUpdateCustomer", {
        id:id,
        role:role
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
