<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card border-0 shadow-lg rounded-4" style="background-color: #f8f9fa;">
                <div class="row justify-content-between p-4">
                    <div class="align-items-center col">
                        <h4 class="text-primary">Cars</h4>
                    </div>
                    <div class="align-items-right col">
                        <button data-bs-toggle="modal" data-bs-target="#car-create-modal" class="btn btn-gradient-primary rounded-pill">Insert New Car</button>
                    </div>
                </div>
                <hr class="bg-light" />
                <div class="table-responsive">
                    <table class="table table-hover" id="tableData">
                        <thead>
                            <tr class="bg-light text-center">
                                <th>No</th>
                                <th>Car's Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Car Type</th>
                                <th>Daily Rent Price</th>
                                <th>Availability</th>
                                <th>Image</th>
                                <th class="text-center">Action</th>
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

        let res = await axios.get("/carlist");
        hideLoader();
        let tableData = $("#tableData");
        let tableList = $("#tableList");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data["data"].forEach(function (item, index) {
            let row = `<tr>
                <td>${index + 1}</td>
                <td>${item["name"]}</td>
                <td>${item["brand"]}</td>
                <td>${item["model"]}</td>
                <td>${item["year"]}</td>
                <td>${item["car_type"]}</td>
                <td>$${parseFloat(item["daily_rent_price"]).toFixed(2)}</td>
                <td>${item["availability"]}</td>
                <td><img src="${item["image"]}" alt="${item["name"]}" style="width: 50px; height: auto;" /></td>
                <td class="text-center">
                    <button data-id="${item['id']}" class="btn editBtn btn-success rounded-pill"><i class="fas fa-edit" style="color: #fff;"></i></button>
                    <button data-id="${item['id']}" class="btn deleteBtn btn-danger rounded-pill"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;

            tableList.append(row);
        });

        $(".deleteBtn").on("click", function() {
            let id = $(this).data("id");
            $("#car-delete-modal").modal("show");
            $("#carDeleteID").val(id);
        });

        $(".editBtn").on("click", function() {
            let id = $(this).data("id");
            $("#update-modal-car").modal("show");
            FillUpUpdateForm(id);
            $("#updateID-car").val(id);
        });

        tableData.DataTable({
            order: [[0, "asc"]],
            lengthMenu: [10, 15, 20, 25, 50],
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
