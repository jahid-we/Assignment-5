<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto text-center">
                <h2 class="display-4 text-info"><span class="text-muted">Our Featured Cars</span></h2>
                <p class="lead text-muted">Pick your favorite ride with amazing deals!</p>
            </div>
        </div>
        <br />
        <div class="row" id="carL"></div>
    </div>
</section>

<script>
    getList();
    async function getList() {
        try {
            $("button").prop('disabled', true);
            showLoader();
            let res = await axios.get("/carlist");
            $("button").prop('disabled', false);
            hideLoader();
            $("#carL").empty();

            res.data['data'].forEach((item) => {
                let row = `
                    <div class="col-12 col-md-6 col-lg-4 p-3">
                        <div class="card shadow-sm border-0 rounded-4 text-center bg-light">
                            <div class="card-header rounded-top p-0">
                                <img class=" mb-3 img-thumbnail" src="${item['image']}" alt="Car Image" style="width: 130px; height: 130px; object-fit: cover;">
                                <h5 class="text-dark mt-3">${item['name']}</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-2"><span class="badge bg-success">$${item['daily_rent_price']}</span> / Day</p>
                                <div class="d-flex justify-content-center mt-3">
                                    <button data-id="${item['id']}" class="btn modalButton btn-primary rounded-pill px-4 py-2">Book Now</button>
                                    <button data-id="${item['id']}" class="detailsButton btn btn-outline-info rounded-pill px-4 py-2 ms-3">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>`;
                $("#carL").append(row);
            });

            $(".modalButton").on("click", function () {
                let id = $(this).data("id");
                $("#car-model").modal("show");
                $("#carId").val(id);
            });

            $(".detailsButton").on("click", function () {
                let id = $(this).data("id");
                $("#carDetailsModal").modal("show");
                $("#carId").val(id);
            });

        } catch (error) {
            console.error("Error fetching car list:", error);
            $("button").prop('disabled', false);
        }
    }
</script>

<style>
    .display-4 {
        font-family: 'Helvetica Neue', sans-serif;
        font-weight: 700;
        color: #343a40;
    }

    .lead {
        font-size: 1.2rem;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        padding-top: 40px;
        overflow: hidden;
        background-color: #f8f9fa;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .card-header {
        background-color: transparent;
        padding: 1rem 0;
    }

    .rounded-circle {
        border: 3px solid #ddd;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        transition: background-color 0.3s, box-shadow 0.3s;
        font-size: 0.9rem;
    }

    .btn:hover {
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .badge {
        font-size: 1rem;
        padding: 0.4rem 0.8rem;
    }

    .rounded-pill {
        border-radius: 30px;
    }

    @media (max-width: 768px) {
        .display-4 {
            font-size: 1.75rem;
        }

        .lead {
            font-size: 1rem;
        }
    }
</style>
