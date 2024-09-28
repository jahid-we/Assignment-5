<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    <h4>SIGN IN</h4>
                    <br/>
                    <input id="email" placeholder="User Email" class="form-control" type="email"/>
                    <br/>
                    <input id="password" placeholder="User Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Next</button>
                    <hr/>
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{url('/userRegistration')}}">Sign Up </a>
                            <span class="ms-1">|</span>
                            <a class="text-center ms-3 h6" href="{{url('/sendOtp')}}">Forget Password</a>
                        </span>

                    </div>
                    <a class="text-center" href="{{url('/')}}"><button class="btn  bg-gradient-secondary">Back</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

  <script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            try {

                let res = await axios.post("/user-login", { email: email, password: password });


                if (res.status === 200 && res.data['status'] === 'success') {
                    successToast(res.data['message']);
                    setTimeout(() => {
                        window.location.href = "/user-dashboard";
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
