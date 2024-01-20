<?php
include '../Connection.php';
$id = $_GET['saveid'];
$sql = "SELECT *FROM bus_stamby WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$bus_no = $row['bus_no'];
$route = $row['route_destination'];
$unit = $row['unit'];
$cor = $row['cor_number'];
$dName = $row['drivers_name'];
$cName = $row['conductors_name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .back-btn {
            text-decoration: none;
            color: #ffffff;
        }

        .back-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="Code.php?saveid='.$id.'" class="row g-3" method="post">
            <!-- Bus Number Container -->
            <input type="text" name="id" value="<?php echo $id; ?>">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Bus Number</label>
                <input type="text" class="form-control" name="bus_no" placeholder="Enter Bus Number" value=<?php echo $bus_no; ?>>
            </div>
            <!-- Departure Time Container -->
            <div class="col-12">
                <label for="inputAddress" class="form-label">Departure Time</label>
                <input type="time" class="form-control" name="departure" placeholder="Enter Bus Number">
            </div>
            <!-- Route Destination Container -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Route Destination</label>
                <input type="text" class="form-control" name="route" placeholder="Route Destination" value=<?php echo $route; ?>>
            </div>
            <!-- Unit Container -->
            <div class="col-md-4">
                <label for="inputState" class="form-label">Unit</label>
                <select name="unit" class="form-select">
                    <option selected><?php echo $unit; ?></option>
                    <option>Air Conditioning</option>
                    <option>Not Air Conditioning</option>
                </select>
            </div>
            <!-- Cor Number Container -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">COR Number</label>
                <input type="text" class="form-control" name="cor" placeholder="Enter Bus Number" value=<?php echo $cor; ?>>
            </div>
            <!-- Pass Ticket Container -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Pass Ticket</label>
                <input type="text" class="form-control" name="pass" placeholder="Enter Bus Number">
            </div>
            <!-- Bagg Ticket Container -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Bagg Ticket</label>
                <input type="text" class="form-control" name="bagg" placeholder="Enter Bus Number">
            </div>
            <!-- Number Of Passenger Container -->
            <div class="col-12">
                <label for="inputAddress" class="form-label">Passenger</label>
                <input type="number" class="form-control" name="noOfPassenger" placeholder="Enter Driver's Name">
            </div>
            <!-- Driver's Name Container -->
            <div class="col-12">
                <label for="inputAddress" class="form-label">Driver's Name</label>
                <input type="text" class="form-control" name="dName" placeholder="Enter Driver's Name" value=<?php echo $dName; ?>>
            </div>
            <!-- Conductor's Name Container -->
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Conductor's Name</label>
                <input type="text" class="form-control" name="cName" placeholder="Enter Conductor's Name" value=<?php echo $cName; ?>>
            </div>
            <!-- Submit Button Container -->
            <div class="col-12">
                <button type="submit" name="add_submit" class="btn btn-primary">Save</button>
                <button type="submit" name="submit" class="btn btn-primary">
                    <a href="../03-Admin-Management/03-Index.php" class="back-btn">Back</a>
                </button>
            </div>
        </form>
    </div>
</body>

</html>