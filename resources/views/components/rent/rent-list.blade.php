<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card border-0 shadow-lg rounded-4" style="background-color: #f9f9f9;">
                <div class="row justify-content-between p-4">
                    <div class="align-items-center col">
                        <h4 class="text-primary">Customer</h4>
                    </div>
                    <div class="align-items-center col">
                        <button disabled data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn btn-gradient-primary rounded-pill">Create</button>
                    </div>
                </div>
                <hr class="bg-light" />
                <div class="table-responsive">
                    <table class="table table-hover" id="tableData">
                        <thead>
                            <tr class="text-center bg-light">
                                <th>No</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Mobile</th>
                                <th>Customer Address</th>
                                <th>Car Name</th>
                                <th>Car Brand</th>
                                <th>Car Model</th>
                                <th>Car Type</th>
                                <th>Car Image</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Daily Rent Price</th>
                                <th>Total Cost</th>
                                <th>Rental Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getList();

    async function getList() {
        showLoader();
        let res = await axios.get("/admin-rentalList");
        hideLoader();
        let tableList = $("#tableList");
        let tableData = $("#tableData");
        tableData.DataTable().destroy();
        tableList.empty();

        res.data["data"].forEach(function(item, index) {
            let row = `<tr>
                <td>${index + 1}</td>
                <td>${item["user"]["name"]}</td>
                <td>${item["user"]["email"]}</td>
                <td>${item["user"]["phone"]}</td>
                <td class="text-wrap">${item["user"]["address"]}</td>
                <td>${item["car"]["name"]}</td>
                <td>${item["car"]["brand"]}</td>
                <td>${item["car"]["model"]}</td>
                <td>${item["car"]["car_type"]}</td>
                <td><img src="${item["car"]["image"]}" alt="${item["car"]["name"]}" style="width: 50px; height: auto; border-radius: 8px;" /></td>
                <td>${item["start_date"]}</td>
                <td>${item["end_date"]}</td>
                <td>$${parseFloat(item["car"]["daily_rent_price"]).toFixed(2)}</td>
                <td>$${parseFloat(item["total_cost"]).toFixed(2)}</td>
                <td>${item["status"]}</td>
                <td class="text-center">
                    <button data-id="${item['id']}" class="btn editBtn btn-success rounded-pill"><i class="fas fa-edit" style="color: #fff;"></i></button>
                    <button data-id="${item['id']}" class="btn deleteBtn btn-danger rounded-pill"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;

            tableList.append(row);
        });

        $(".deleteBtn").on("click", function() {
            let id = $(this).data("id");
            $("#delete-modal-customer").modal("show");
            $("#deleteID-r").val(id);
        });

        $(".editBtn").on("click", function() {
            let id = $(this).data("id");
            $("#update-modal-customer").modal("show");
            FillUpUpdateForm(id);
            $("#updateID-r").val(id);
        });

        tableData.DataTable({
            order: [[0, "asc"]],
            lengthMenu: [25, 50],
            responsive: true // Enable responsiveness
        });
    }
</script>

<style>
    /* General Styles */
    body {
        background-color: #e9ecef;
    }

    /* Card Styling */
    .card {
        border-radius: 20px;
        margin-bottom: 20px;
        padding: 30px;
        overflow: hidden;
    }

    /* Header Styling */
    .card-header {
        background: linear-gradient(to right, #007bff, #00c6ff);
        color: #fff;
        border-radius: 20px 20px 0 0;
        padding: 20px;
    }

    /* Table Styling */
    .table {
        border-collapse: separate;
        border-spacing: 0 15px; /* Space between rows */
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1); /* Light blue hover effect */
    }

    /* Button Styling */
    .btn-gradient-primary {
        background: linear-gradient(to right, #007bff, #00c6ff);
        color: white;
        transition: background 0.3s ease;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(to right, #00c6ff, #007bff);
    }

    .rounded-pill {
        border-radius: 50px;
    }

    /* Image Styling */
    img {
        border-radius: 10px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-header h4 {
            margin-bottom: 10px;
        }
    }
</style>
