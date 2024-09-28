<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Customer Name *</label>
                                <input type="text" class="form-control" id="customerName">
                                <label class="form-label">Customer Email *</label>
                                <input type="email" class="form-control" id="customerEmail">
                                <label class="form-label">Customer Mobile *</label>
                                <input type="text" class="form-control" id="customerMobile">
                                <label class="form-label">Customer Address *</label>
                                <input type="text" class="form-control" id="customerAddress">
                                <label class="form-label">Customer Password *</label>
                                <input type="text" class="form-control" id="customerPassword">
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

    async function Save() {

        let customerName = document.getElementById('customerName').value;
        let customerEmail = document.getElementById('customerEmail').value;
        let customerMobile = document.getElementById('customerMobile').value;
        let customerAddress = document.getElementById('customerAddress').value;
        let customerPassword = document.getElementById('customerPassword').value;
        if (customerName.length === 0) {
            errorToast("Customer Name Required");
        } else if (customerEmail.length === 0) {
            errorToast("Customer Email Required");
        } else if (customerMobile.length === 0) {
            errorToast("Customer Mobile Required");
        } else if (customerAddress.length === 0) {
            errorToast("Customer Address Required");
        } else if (customerPassword.length === 0) {
            errorToast("Customer Password Required");
        } else{
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/adminCreateCustomer", {
                name: customerName,
                email: customerEmail,
                phone: customerMobile,
                address: customerAddress,
                password: customerPassword
            });
            hideLoader();
            if (res.status === 200) {
                successToast(res.data["message"]);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data["message"]);
            }
        }
    }


</script>
