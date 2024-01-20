<?php
session_start();
include('../Connection.php');

// Add Bus Action
if (isset($_POST['add_btn'])) {
    $bus_no = $_POST['bus_no'];
    $route = $_POST['route'];
    $unit = $_POST['unit'];
    $time = $_POST['time'];

    $query = "INSERT INTO bus_stamby (bus_no,route_destination,unit,departure_time) VALUES ('$bus_no', '$route', '$unit','$time')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success_message'] = 'Bus added successfully!';
        header("Location:../02-Index.php");
        exit();
    } else {
        echo 'Failed to add bus';
    }
}

// Fetch Update Data

if (isset($_POST['click_update_btn'])) {
    $id = $_POST['user_id'];

    $array_result = [];

    $sql = "SELECT *FROM bus_stamby WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
           
            array_push($array_result,$row);
            header('content-type: application/json');
            echo json_encode($array_result);
        }
    }
    else
    {

    }
}



// Check if the update button is clicked
if (isset($_POST['update_btn'])) {
    $busNo = $_POST['bus_no'];
    $route = $_POST['route'];
    $unit = $_POST['unit'];
    $time = $_POST['time'];

   
    $userId = $_POST['id'];

    // Prepare the update query
    $query = "UPDATE bus_stamby SET 
              bus_no = '$busNo',
              route_destination = '$route',
              unit = '$unit',
              departure_time = '$time'
              WHERE id = '$userId'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $_SESSION['success_message'] = 'Data updated successfully!';
    } else {
        $_SESSION['error_message'] = 'Error updating data: ' . mysqli_error($conn);
    }


    header("Location:../02-Index.php");
    exit();
}



if (isset($_POST['add_submit'])) {
    $id = $_POST['id'];
    $bus_no = $_POST['bus_no'];
    $departure = $_POST['departure'];
    $route = $_POST['route'];
    $unit = $_POST['unit'];
    $cor = $_POST['cor'];
    $pass = $_POST['pass'];
    $bagg = $_POST['bagg'];
    $passenger = $_POST['noOfPassenger'];
    $dname = $_POST['dName'];
    $cname = $_POST['cName'];


    $query = "INSERT INTO management_tb (bus_no, time_dept, route_destination, unit, cor_number, pass_ticket, bagg_ticket, passenger, drivers_name, conductors_name) VALUES ('$bus_no', '$departure', '$route', '$unit', '$cor', '$pass', '$bagg', '$passenger', '$dname', '$cname')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $id = $_POST['id'];
    
        $query = "DELETE FROM bus_stamby WHERE id = $id";
    
        $result = mysqli_query($conn, $query);
    
        if ($result) {
           
        header('Location:../03-Index.php');
           
        } else {
            echo 'Deletion failed';
        }
    } else {
        echo 'Insertion failed';
    }
}


// Delete

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM bus_stamby WHERE id = '$id'";
    $delete_result = mysqli_query($conn, $delete_sql);

    if ($delete_result) {
        // Redirect back to the page after successful deletion
        header("Location:../02-Index.php");
        exit();
    } else {
        echo "Delete operation failed.";
    }
}
?>
