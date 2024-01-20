<?php
include("sidevar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Admin-CSS/style-busInformation.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="Font.css">


    <style>
        .text-success {
            color: green;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container mt-4" style="margin-left: 200px">
        <h2 class="text-center mt-4 mb-4">DEPARTURE</h2>
        <table class="table table-success table-striped" id="departureTable table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">BUS NO.</th>
                    <th scope="col">DEPARTURED</th>
                    <th scope="col">DESTINATION</th>
                    <th scope="col">SERVICE</th>
                    <th scope="col">PASSENGER</th>
                    <th scope="col">DRIVER</th>
                    <th scope="col">CONDUCTOR</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('Connection.php');
                $sql = "SELECT * FROM departure_tb";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $bus_no = $row['bus_no'];
                        $time_dept = $row['time_dept'];
                        $route = $row['route_destination'];
                        $unit = $row['unit'];
                        $passenger = $row['passenger'];
                        $dName = $row['drivers_name'];
                        $cName = $row['conductors_name'];
                        $status = $row['status'];

                        echo '
                            <tr>
                                <th scope="row" class="bus_id">' . $id . '</th>
                                <td>' . $bus_no . '</td>
                                <td>' . $time_dept . '</td>
                                <td>' . $route . '</td>
                                <td>' . $unit . '</td>
                                <td>' . $passenger . '</td>
                                <td>' . $dName . '</td>
                                <td>' . $cName . '</td>
                                <td class="status-cell">' . $status . '</td>
                                <td>
                                    <button type="button" class="btn btn-primary update_data" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Update
                                    </button>
                                </td>
                                <td><button class="btn btn-danger" role="button" onclick="confirmDelete(' . $id . ')">Delete</button></td>
                            </tr>
                        ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="04-Admin-Departure/Code.php" method="post">
                        <input type="hidden" id="id" name="id">

                        <label for="">Status</label> <br>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Departured">Departured</option>
                            <option value="Arrived">Arrived</option>
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

    <script>
        function confirmDelete(id) {
            var isConfirmed = confirm('Are you sure you want to delete this record?');

            if (isConfirmed) {
                // Redirect to delete script with the record ID
                window.location.href = '04-Admin-Departure/Code.php?delete_id=' + id;
            }
        }

        // Update
        $(document).on('click', '.update_data', function (e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.bus_id').text();

            $.ajax({
                method: "post",
                url: "04-Admin-Departure/Code.php",
                data: {
                    'click_update_btn': true,
                    'user_id': user_id,
                },
                success: function (response) {
                    $.each(response, function (key, value) {
                        $('#id').val(value['id']);
                    });
                    $('#staticBackdrop').modal('show');
                }
            });
        });

        // Add dynamic color to status cells
        document.addEventListener('DOMContentLoaded', function () {
            var statusCells = document.querySelectorAll('.status-cell');
            statusCells.forEach(function (cell) {
                var status = cell.textContent.trim().toLowerCase();

                if (status === 'arrived') {
                    cell.classList.add('text-success');
                } else if (status === 'departured') {
                    cell.classList.add('text-danger');
                }
            });
        });
    </script>
</body>

</html>
