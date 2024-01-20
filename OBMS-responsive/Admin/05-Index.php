<?php
include("sidevar.php");
include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Font.css">

    <style>
        .btn a {
            text-decoration: none;
            /* Remove underline from anchor tags within buttons */
        }

        .text-success {
            color: #198754;
            /* Bootstrap 5 success color */
        }

        .text-danger {
            color: #dc3545;
            /* Bootstrap 5 danger color */
        }

        .text-Not {
            color: yellow;
            /* Bootstrap 5 warning color */
        }
    </style>

    </style>
</head>

<body>
    <!-- Update Status -->
    <div class="modal fade" id="status_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="05-Admin-Lost&Found/Code.php" method="post">
                        <input type="hidden" id="id" name="id">

                        <label for="">Status</label> <br>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Pending">Pending</option>
                            <option value="Not-Found">Not Found</option>
                            <option value="Found">Found</option>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-primary">Update Status</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form for adding items goes here -->
                    <form action="05-Admin-Lost&Found/Code.php" method="post">
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Bus Number</label>
                            <input type="text" name="bus_no" class="form-control" required>
                        </div>
                        <!-- Driver's Name -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Driver's Name</label>
                            <input type="text" class="form-control" name="dName" required>
                        </div>
                        <!-- Conductor's Name -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Conductor's Name</label>
                            <input type="text" class="form-control" name="cName" required>
                        </div>
                        <!-- Item -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Item</label>
                            <input type="text" class="form-control" name="item" required>
                        </div>
                        <!-- Date -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>


                        <button type="submit" name="add_Item" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_modalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <form class="row g-3" action="05-Admin-Lost&Found/Code.php" method="post">
                        <!-- ID -->
                        <input type="hidden" class="form-control" id="update_id" name="update_id">
                        <!-- Bus Number Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Bus Number</label>
                            <input type="text" class="form-control" id="bus_no" name="bus_no" placeholder="Enter Bus Number">
                        </div>

                        <!-- Driver's Name Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Driver's Name</label>
                            <input type="text" class="form-control" id="dName" name="dName" placeholder="Enter Driver's Name">
                        </div>
                        <!-- Conductor's Name Container -->

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Conductor's Name</label>
                            <input type="text" class="form-control" id="cName" name="cName" placeholder="Enter Conductor's Name">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item" name="item" placeholder="Enter Conductor's Name">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter Conductor's Name">
                        </div>


                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Ticket</label>
                            <input type="text" class="form-control" id="ticket" name="ticket" placeholder="Enter Ticket">
                        </div>
                        <!-- Submit Button Container -->
                        <div class="modal-footer">
                            <div><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                            <div><button type="submit" name="update_btn" class="btn btn-primary">Update Data</button></div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="container mt-4" style="margin-left: 200px">
        <h2 class="text-center mt-4 mb-4">LOST AND FOUND</h2>
        <!-- Add Item button with modal trigger -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>



        <table class="table table-success table-striped mt-3 table-sm">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buss Number</th>
                    <th scope="col">Drivers Name</th>
                    <th scope="col">Conductor's Name</th>
                    <th scope="col">Ticket Number</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM lost_tb";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $bus_no = $row['bus_no'];
                        $dname = $row['drivers_name'];
                        $cname = $row['conductors_name'];
                        $ticket = $row['ticket_no'];
                        $item = $row['item'];
                        $status = $row['status'];
                        $date = date("Y-m-d", strtotime($row['date'])); // Format date without time

                        echo
                        '
                            <tr>
                             <td class="bus_id">' . $id . '</td>
                                <td>' . $bus_no . '</td>
                                <td>' . $dname . '</td>
                                <td>' . $cname . '</td>
                                <td>' . $ticket . '</td>
                                <td>' . $item . '</td>
                                <td>' . $date . '</td>
                                <td class="status-cell">' . $status . '</td>
                                <td>
                                <a href="#" class="btn btn-info update_stat" style="color:white;">Status</a>
                                <a href="#" class="btn btn-primary update_data">Update</a>
                                <button class="btn btn-danger" role="button" onclick="confirmDelete(' . $id . ')">Delete</button>
                            </td>
                            
                            </tr>
                            ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
<script>
    // Status Update

    $(document).on('click', '.update_stat', function(e) {
        e.preventDefault();

        var user_id = $(this).closest('tr').find('.bus_id').text();

        $.ajax({
            method: "post",
            url: "05-Admin-Lost&Found/Code.php",
            data: {
                'click_stat_update': true,
                'user_id': user_id,
            },
            success: function(response) {
                $.each(response, function(key, value) {
                    $('#id').val(value['id']);
                });
                $('#status_modal').modal('show');
            }
        });
    });


    // Delete
    function confirmDelete(id) {
        var isConfirmed = confirm('Are you sure you want to delete this record?');

        if (isConfirmed) {
            // Redirect to delete script with the record ID
            window.location.href = '05-Admin-Lost&Found/Code.php?delete_id=' + id;
        }
    }

    // Fetch data to update_modal 

    // Fetch data to update_modal 
    // Fetch data to update_modal 
$(document).on('click', '.update_data', function (e) {
    e.preventDefault();

    var user_id = $(this).closest('tr').find('.bus_id').text();

    $.ajax({
        method: "post",
        url: "05-Admin-Lost&Found/Code.php",
        data: {
            'click_update_btn': true,
            'user_id': user_id,
        },
        dataType: 'json',
        success: function (response) {
            if (response && response.length > 0) {
                var value = response[0];

                // Convert the date to 'YYYY-MM-DD' format
                var formattedDate = new Date(value['date']).toISOString().split('T')[0];

                $('#update_id').val(value['id']);
                $('#bus_no').val(value['bus_no']);
                $('#dName').val(value['drivers_name']);
                $('#cName').val(value['conductors_name']);
                $('#item').val(value['item']);
                $('#date').val(formattedDate); // Set the value of the date input
                $('#ticket').val(value['ticket_no']);

                $('#date_in_update_modal').text(value['date']);
                $('#update_modal').modal('show');
            } else {
                console.error('Invalid response format');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX request failed with status:', status, 'error:', error);
        }
    });
});



    $(document).on('click', '.update_stat', function(e) {
        e.preventDefault();

        var user_id = $(this).closest('tr').find('.bus_id').text();

        $.ajax({
            method: "post",
            url: "05-Admin-Lost&Found/Code.php",
            data: {
                'click_stat_update': true,
                'user_id': user_id,
            },
            success: function(response) {
                $.each(response, function(key, value) {
                    $('#id').val(value['id']);

                });
                $('#status_modal').modal('show');
            }
        });
    });


    document.addEventListener('DOMContentLoaded', function() {
        var statusCells = document.querySelectorAll('.status-cell');
        statusCells.forEach(function(cell) {
            var status = cell.textContent.trim().toLowerCase();

            if (status === 'found') {
                cell.classList.add('text-success');
            } else if (status === 'pending') {
                cell.classList.add('text-danger');
            } else if (status === 'Not-Found') {
                cell.classList.add('text-Not');
            }
        });
    });
</script>

</html>