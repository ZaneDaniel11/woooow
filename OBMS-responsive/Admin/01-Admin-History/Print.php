<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Page Title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            margin: 20px auto;
            width: 100%;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td:last-child {
            text-align: center;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        /* Print-specific styles */
        @media print {
            body * {
                visibility: hidden;
            }

            #printTable, #printTable * {
                visibility: visible;
            }

            #printTable {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
<div>
            <button class="btn btn-primary" onclick="printTable()">Print</button>
            <a href="../01-Index.php" class="btn btn-primary">Home</a>
</div>
    <div class="container mt-5">
        <form method="post" action="">
            <div class="mb-3">
                <label for="search_date" class="form-label">Search by Date:</label>
                <input type="date" class="form-control" id="search_date" name="search_date">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

      

        <div id="printTable">
            <table class="table table-success table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">BUS NO.</th>
                        <th scope="col">DEPARTURED</th>
                        <th scope="col">DESTINATION</th>
                        <th scope="col">SERVICE</th>
                        <th scope="col">NUMBER</th>
                        <th scope="col">PASS.TICKET</th>
                        <th scope="col">BAGG.TICKET</th>
                        <th scope="col">PASSENGER</th>
                        <th scope="col">DRIVER'S NAME</th>
                        <th scope="col">CONDUCTOR'S NAME</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../Connection.php");

                    // Check if the search form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $search_date = $_POST['search_date'];
                        $sql = "SELECT * FROM main_tb WHERE DATE(`date`) = '$search_date'";
                    } else {
                        // Default query without filtering
                        $sql = "SELECT * FROM main_tb";
                    }

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $bus_no = $row['bus_no'];
                            $time_dept = $row['time_dept'];
                            $route = $row['route_destination'];
                            $unit = $row['unit'];
                            $cor_number = $row['cor_number'];
                            $pass_ticket = $row['pass_ticket'];
                            $bagg_ticket = $row['bagg_ticket'];
                            $passenger = $row['passenger'];
                            $d_name = $row['drivers_name'];
                            $c_name = $row['conductors_name'];
                            $date = $row['date'];

                            echo '
                                <tr>
                                    <td class="bus_id">' . $id . '</td>
                                    <td>' . $bus_no . '</td>
                                    <td>' . $time_dept . '</td>
                                    <td>' . $route . '</td>
                                    <td>' . $unit . '</td>
                                    <td>' . $cor_number . '</td>
                                    <td>' . $pass_ticket . '</td>
                                    <td>' . $bagg_ticket . '</td>
                                    <td>' . $passenger . '</td>
                                    <td>' . $d_name . '</td>
                                    <td>' . $c_name . '</td>
                                    <td>' . $date . '</td>
                                </tr>
                            ';
                        }
                    } else {
                        echo "No result";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function printTable() {
            window.print();
        }
    </script>

</body>

</html>
