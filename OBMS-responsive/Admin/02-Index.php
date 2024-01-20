<?php
include("sidevar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Font.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">

    <style>
        .h1 {

            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>


    <!-- Add Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD BUS AT TERMINAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="02-Admin-Bus-At-Terminal/Code.php" method="post">
                        <!-- Bus Number Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Bus Number</label>
                            <input type="text" class="form-control" name="bus_no" placeholder="Enter Bus Number">
                        </div>
                        <!-- Route Destination Container -->
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Route Destination</label>
                            <input type="text" class="form-control" name="route" placeholder="Route Destination">
                        </div>
                        <!-- Unit Container -->
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Unit</label>
                            <select name="unit" class="form-select">
                                <option selected>Unit</option>
                                <option>Air Conditioning</option>
                                <option>Not Air Conditioning</option>
                            </select>
                        </div>
                        <!-- Time Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Time Departured</label>
                            <input type="time" class="form-control" name="time" placeholder="Time Departured">
                        </div>
                        <!-- Submit Button Container -->
                        <div class="modal-footer">
                            <div><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                            <div><button type="submit" name="add_btn" class="btn btn-primary">Add Buss</button></div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal End -->


    <!-- Update Modal -->
    <div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update_modalLabel">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="02-Admin-Bus-At-Terminal/Code.php" method="post">

                        <!-- ID -->

                        <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Bus Number">
                        <!-- Bus Number Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Bus Number</label>
                            <input type="text" class="form-control" id="bus_no" name="bus_no" placeholder="Enter Bus Number">
                        </div>
                        <!-- Route Destination Container -->
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Route Destination</label>
                            <input type="text" class="form-control" id="route" name="route" placeholder="Route Destination">
                        </div>
                        <!-- Unit Container -->
                        <label for="inputAddress2" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" placeholder="Route Destination">

                        <!-- Time Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Time Departured</label>
                            <input type="time" class="form-control" id="time" name="time" placeholder="Time Departured">
                        </div>
                        <!-- Submit Button Container -->
                        <div class="modal-footer">
                            <div><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                            <div><button type="submit" name="   " class="btn btn-primary">Update Data</button></div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    

    <!-- Add this modal HTML code after your existing modal HTML code -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="Table_Container" style="margin-left:220px;">

        <h1 class="text-center">Bus at Terminal</h1>
        <button type="button" class="btn btn-primary addBtn" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px ;">
            Add Bus Stamby
        </button>

        <table class="table table-success table-striped table-sm">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">BUS NO.</th>
                    <th scope="col">DESTINATION</th>
                    <th scope="col">SERVICE</th>
                    <th scope="col">Departured</th>
                    <th scope="col" colspan="3">Operation</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include 'Connection.php';
                $query = "SELECT * FROM bus_stamby";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $bus_no = $row['bus_no'];
                        $route = $row['route_destination'];
                        $unit = $row['unit'];
                        $departure_time = $row['departure_time'];

                        echo '
                    <tr>
                        <th class="bus_id">' . $id . '</th>
                        <td>' . $bus_no . '</td>
                        <td>' . $route . '</td>
                        <td>' . $unit . '</td>
                        <td>' . $departure_time . '</td>
                        <td><a href="#" class="btn btn-primary update_data">Update</a></td>
                        <td><a href="02-Admin-Bus-At-Terminal/02-Bus-At-Terminal-Save.php?saveid=' . $id . '" class="btn btn-success">Save</a></td>
                        <td><button class="btn btn-danger" role="button" onclick="confirmDelete(' . $id . ')">Delete</button></td>
                    </tr>
                    ';
                    }
                } else {
                    // Handle the case where the query fails
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Add this script after your modal HTML code -->
    <script>
      
        $(document).ready(function() {
            // Check if the success message is set in the session
            var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>";

            // If success message is set, show the modal and reset the session variable
            if (successMessage !== "") {
                $('#successModal').modal('show');
            }
        });

        $(document).on('click', '.update_data', function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.bus_id').text();

            // console.log(user_id);

            $.ajax({
                method: "post",
                url: "02-Admin-Bus-At-Terminal/Code.php",
                data: {
                    'click_update_btn': true,
                    'user_id': user_id,
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(key, value) {
                        // console.log(value['bus_no'])
                        $('#id').val(value['id']);
                        $('#bus_no').val(value['bus_no']);
                        $('#route').val(value['route_destination']);
                        $('#unit').val(value['unit']);
                        $('#cor').val(value['cor_number']);
                        $('#dName').val(value['drivers_name']);
                        $('#cName').val(value['conductors_name']);
                        $('#time').val(value['departure_time']);



                    });
                    $('#update_modal').modal('show');
                }
            });
        });



        $(document).ready(function() {
            // Your existing scripts

            // Confirm delete button click event
            $(document).on('click', '#confirmDelete', function() {
                // Add your delete logic here
                $('#confirmationModal').modal('hide'); // Hide the confirmation modal
            });

            // Delete button click event
            $(document).on('click', '.delete_data', function(e) {
                e.preventDefault();
                var user_id = $(this).closest('tr').find('.bus_id').text();
                $('#confirmationModal').modal('show');
            });
        });


        function confirmDelete(id) {
            var isConfirmed = confirm('Are you sure you want to delete this record?');

            if (isConfirmed) {
                // Redirect to delete script with the record ID
                window.location.href = '02-Admin-Bus-At-Terminal/Code.php?delete_id=' + id;
            }
        }
    </script>
</body>

</html>