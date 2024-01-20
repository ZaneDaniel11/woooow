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
                    <form action="07-Announcement/Code.php" method="post">
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Conductor's Name -->
                        <div class="mb-3">
                            <label for="busNo" class="form-label">Content</label>
                            <input type="text" class="form-control" name="content" required>
                        </div>
                        <!-- Item -->
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
                    <form class="row g-3" action="07-Announcement/Code.php" method="post">

                        <!-- Hidden input for ID -->
                        <input type="text" class="form-control" id="update_id" name="update_id" readonly>

                        <!-- Title Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                        </div>

                        <!-- Content Container -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Content</label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="Enter Content">
                        </div>

                        <!-- Date Time -->
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter Date">
                        </div>

                        <!-- Submit Button Container -->
                        <div class="modal-footer">
                            <div><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>
                            <div><button type="submit" name="update_btn" class="btn btn-primary">Update Data</button></div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="container mt-4" style="margin-left: 200px; width:1080px;">

    <h2 class="text-center mt-4 mb-4">ANNOUNCEMENT</h2>
        <!-- Add Item button with modal trigger -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addItemModal" style="margin-bottom: 20px;">Add Item</button>


        <table class="table table-success table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Date</th>
                    <th scope="col">Operation</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM announce_tb";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $date = date("Y-m-d", strtotime($row['date']));


                        echo '
                        <tr>
                    <th scope="row" class="bus_id">' . $id . '</th>
                    <td>' . $title . '</td>
                    <td>' . $content . '</td>
                    <td>' . $date . '</td>
                    <td><a href="#" class="btn btn-primary update_data">Update</a>
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



    <script>
        $(document).on('click', '.update_data', function(e) {
            e.preventDefault();

            var user_id = $(this).closest('tr').find('.bus_id').text();

            $.ajax({
                method: "post",
                url: "07-Announcement/Code.php",
                data: {
                    'click_update_btn': true,
                    'user_id': user_id,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.length > 0) {
                        var data = response[0];
                        $('#update_id').val(data['id']);
                        $('#title').val(data['title']);
                        $('#content').val(data['content']);

                        // Ensure the date is properly formatted (adjust this line if needed)
                        var formattedDate = new Date(data['date']).toISOString().split('T')[0];
                        $('#date').val(formattedDate);

                        $('#update_modal').modal('show');
                    }
                }
            });
        });

        function confirmDelete(id) {
            var isConfirmed = confirm('Are you sure you want to delete this record?');

            if (isConfirmed) {
                // Redirect to delete script with the record ID
                window.location.href = '07-Announcement/Code.php?delete_id=' + id;
            }
        }
    </script>

</body>

</html>