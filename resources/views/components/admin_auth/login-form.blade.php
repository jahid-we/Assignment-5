<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-md-7 col-lg-6 animated fadeIn center-screen">
            <div class="card w-100 p-4">
                <div class="card-body">
                    <h4 class="text-center">Login As Admin</h4>
                    <br/>
                    <input id="email" placeholder="User Email" class="form-control mb-3" type="email"/>
                    <input id="password" placeholder="User Password" class="form-control mb-3" type="password"/>
                    <button onclick="SubmitAdminLogin()" class="btn btn-primary w-100">Next</button>
                    <hr/>
                    <div class="d-flex justify-content-between mt-3">
                        <a class="h6" href="{{url('/')}}">Back</a>
                        <a class="h6" href="{{url('/sendOtp')}}">Forget Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function SubmitAdminLogin() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if (email.length === 0) {
        errorToast("Email is required");
    } else if (password.length === 0) {
        errorToast("Password is required");
    } else {
        try {

            let res = await axios.post("/adminLogin", { email: email, password: password });


            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(() => {
                    window.location.href = "/adminDashboard";
                }, 1000);
            }
        } catch (error) {
            
            if (error.response && error.response.status === 401) {
                errorToast("Incorrect email or password");
            } else {
                errorToast("Something went wrong. Please try again...");
            }
        }
    }
}
</script>
