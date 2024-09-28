<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card shadow border-0 rounded-4" style="background-color: #ffffff; padding: 2rem;">
                <div class="row justify-content-between">
                    <div class="align-items-center col">
                        <h4 class="text-primary">Customer</h4>
                    </div>
                    <div class="align-items-center col text-end">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="btn btn-gradient-primary rounded-pill">Create</button>
                    </div>
                </div>
                <hr class="bg-light" />
                <div class="table-responsive">
                    <table class="table table-hover" id="tableData">
                        <thead>
                            <tr class="bg-light text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>
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
        let res = await axios.get("/adminCustomer");
        hideLoader();
        let tableList = $("#tableList");
        let tableData = $("#tableData");
        tableData.DataTable().destroy();
        tableList.empty();

        res.data["data"].forEach(function(item, index) {
            let row = `<tr>
                <td class="text-center">${index + 1}</td>
                <td>${item["name"]}</td>
                <td>${item["email"]}</td>
                <td>${item["phone"]}</td>
                <td class="text-wrap">${item["address"]}</td>
                <td class="text-center">
                    <button data-id="${item['id']}" class="btn editBtn btn-success rounded-pill"><i class="fas fa-edit" style="color: #fff;"></i> Change Role</button>
                    <button data-id="${item['id']}" class="btn deleteBtn btn-danger rounded-pill"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>`;

            tableList.append(row);
        });

        $(".deleteBtn").on("click", function() {
            let id = $(this).data("id");
            $("#delete-modal-customer").modal("show");
            $("#deleteID-c").val(id);
        });

        $(".editBtn").on("click", function() {
            let id = $(this).data("id");
            $("#update-modal-customer").modal("show");
            FillUpUpdateForm(id);
            $("#updateID-c").val(id);
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
        background-color: #f7f9fc;
    }

    /* Card Styling */
    .card {
        border-radius: 20px;
        margin-bottom: 20px;
        overflow: hidden;
        background: #ffffff;
    }

    /* Header Styling */
    h4 {
        margin-bottom: 0;
        font-weight: bold;
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

    /* Responsive Styles */
    @media (max-width: 768px) {
        .card {
            padding: 1rem; /* Adjust padding for smaller screens */
        }
    }
</style>
