<div class="modal animated zoomIn" id="car-delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input readonly class="form-control d-none " id="carDeleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn bg-gradient-success mx-2" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="carDelete()" type="button" id="confirmDelete" class="btn bg-gradient-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

     async  function  carDelete(){

        let id=$("#carDeleteID").val();
        $("#delete-modal-close").click();
        showLoader();
        let res=await axios.post("/admin-car-delete",{id:id});
        hideLoader();
        if(res.status===200 && res.data["status"]==="success"){
            successToast(res.data['message']);
            await getList();
        }else{
            errorToast(res.data['message']);
        }

     }

</script>
