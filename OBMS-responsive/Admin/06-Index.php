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
            color: green;
        }

        .text-danger {
            color: red;
        }

        .text-Not {
            color: orange;
        }
    </style>
</head>

<body>

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
                    <form action="06-Admin-Arrival/Code.php" method="post">
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Bus Number</label>
                            <input type="text" name="bus_no" class="form-control" required>
                        </div>
                        <!-- Driver's Name -->
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Service</label>
                            <select name="unit" class="form-select">
                                <option selected>Unit</option>
                                <option>Air Conditioning</option>
                                <option>Not Air Conditioning</option>
                            </select>
                        </div>
                        <!-- Conductor's Name -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Departured</label>
                            <input type="time" class="form-control" name="departured" required>
                        </div>
                        <!-- Item -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Route</label>
                            <input type="text" class="form-control" name="route" required>
                        </div>

                        <button type="submit" name="add_Item" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Add item Modal -->


    <!--  Update Modal -->
    <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_modalLabel">Update Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form for updating items goes here -->
                    <form action="06-Admin-Arrival/Code.php" method="post">
                        <input type="hidden" id="update_id" name="update_id" value="">
                        <div class="mb-3">
                            <label for="updateBusNo" class="form-label">Bus Number</label>
                            <input type="text" id="updateBusNo" name="update_bus_no" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="updateUnit" class="form-label">Service</label>
                            <select id="updateUnit" name="update_unit" class="form-select">
                                <option selected>Unit</option>
                                <option>Air Conditioning</option>
                                <option>Not Air Conditioning</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updateDepartured" class="form-label">Departured</label>
                            <input type="time" id="updateDepartured" name="update_departured" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="updateRoute" class="form-label">Route Destination</label>
                            <input type="text" id="updateRoute" name="update_route" class="form-control" required>
                        </div>
                        <button type="submit" name="update_Item" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-left: 200px; width:1080px;">
        <h2 class="text-center mt-4 mb-4">ARRIVALS</h2>
        <!-- Add Item button with modal trigger -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal" style="margin-bottom: 20px;">Add Item</button>

        <table class="table table-success table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">BUS NO.</th>
                    <th scope="col">SERVICE</th>
                    <th scope="col">DEPARTURED</th>
                    <th scope="col">Route Destination</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM arrival_tb";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $bus_no = $row['bus_no'];
                    $unit = $row['unit'];
                    $departure_time = $row['departured_time'];
                    $route = $row['route_destination'];

                    echo '
                        <tr>
                            <th scope="row" class="bus_id">' . $id . '</th>
                            <td>' . $bus_no . '</td>
                            <td>' . $unit . '</td>
                            <td>' . $departure_time . '</td>
                            <td>' . $route . '</td>
                            <td>
                                <a href="#" class="btn btn-primary update_data" data-toggle="modal" data-target="#update_modal" data-id="' . $id . '">Update</a>
                                <button class="btn btn-danger" role="button" onclick="confirmDelete(' . $id . ')">Delete</button>
                            </td>
                        </tr>';
                }

                ?>
            </tbody>
        </table>
    </div>

    <!-- Your existing scripts -->
    <script>
        $(document).on('click', '.update_data', function(e) {
            e.preventDefault();

            var user_id = $(this).data('id');

            $.ajax({
                method: "post",
                url: "06-Admin-Arrival/Code.php",
                data: {
                    'click_update_btn': true,
                    'user_id': user_id,
                },
                dataType: 'json',
                success: function(response) {
                    $('#update_id').val(response[0]['id']);
                    $('#updateBusNo').val(response[0]['bus_no']);
                    $('#updateUnit').val(response[0]['unit']);
                    $('#updateDepartured').val(response[0]['departured_time']);
                    $('#updateRoute').val(response[0]['route_destination']);

                    $('#update_modal').modal('show');
                }
            });
        });


        
        // Delete
        function confirmDelete(id) {
            var confirmDelete = confirm("Are you sure you want to delete this item?");

            if (confirmDelete) {
                // Perform the delete operation using AJAX
                $.ajax({
                    method: "post",
                    url: "06-Admin-Arrival/Code.php",
                    data: {
                        'delete_id': id,
                        'delete_Item': true, // Add this parameter to indicate a delete operation
                    },
                    success: function(response) {
                        // Refresh the page or update the table as needed
                        location.reload();
                    }
                });
            }
        }
    </script>

</body>

</html>