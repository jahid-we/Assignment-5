<div class="modal animated zoomIn" id="delete-modal-customer">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Cancel Your Booking !</h3>
                <p class="mb-3">Once Cancel, You Will Not Able To See This Rental Reqest Or You Can't Change It Again.</p>
                <input class="d-none" id="rentalID-r"/>

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="cancel-modal-close" class="btn mx-2 bg-gradient-warning" data-bs-dismiss="modal">Close</button>
                    <button onclick="cancel()" type="button" id="confirmcancel" class="btn  bg-gradient-danger" >Cancel Your Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     async  function  cancel(){
         let id=$("#rentalID-r").val();
         $("#cancel-modal-close").click();
         showLoader();
         let res=await axios.post("/user-rentalCancel",{id:id});
         hideLoader();
         if(res.status===200 && res.data["status"]==="success"){
             successToast(res.data['message']);
             await getList();
         }else{
             errorToast(res.data['message']);
         }
     }
</script>
