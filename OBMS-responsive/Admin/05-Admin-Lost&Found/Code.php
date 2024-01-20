<?php
include '../Connection.php';

// Add Item
if (isset($_POST['add_Item'])) {
    $bus_no = $_POST['bus_no'];
    $dname = $_POST['dName'];
    $cname = $_POST['cName'];
    $item = $_POST['item'];
    $date = $_POST['date'];

    $insert = "INSERT INTO lost_tb (bus_no, drivers_name, conductors_name, item, date,status) VALUES ('$bus_no','$dname','$cname','$item','$date','pending')";

    $result = mysqli_query($conn, $insert);

    if ($result) {
        header('location:../05-Index.php');
        echo 'showSuccessModal();';
        exit();
    } else {
        echo 'Failed';
        exit();
    }
}

// Delete
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $deleteSql = "DELETE FROM lost_tb WHERE id = $id";

    $result = mysqli_query($conn, $deleteSql);

    if ($result) {
        header('location:../05-Index.php');
        exit();
    } else {
        echo 'Delete Unsuccessful';
        exit();
    }
}


// Fetch Update Data
if (isset($_POST['click_update_btn'])) {
    $id = $_POST['user_id'];

    $array_result = [];

    $sql = "SELECT * FROM lost_tb WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $array_result[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($array_result);
        exit();
    } else {
        // Handle fetch failure
        exit();
    }
}

// Fetch Status Data 

if (isset($_POST['click_stat_update'])) {
    $id = $_POST['user_id'];

    $array_result = [];

    $sql = "SELECT * FROM lost_tb WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array_result, $row);
            header('content-type: application/json');
            echo json_encode($array_result);
            exit();
        }
    } else {
        // Handle fetch failure
        exit();
    }
}

// Update
if (isset($_POST['update_btn'])) {
    // Make sure to sanitize your inputs to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $bus_no = mysqli_real_escape_string($conn, $_POST['bus_no']);
    $dName = mysqli_real_escape_string($conn, $_POST['dName']);
    $cName = mysqli_real_escape_string($conn, $_POST['cName']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $ticket = mysqli_real_escape_string($conn, $_POST['ticket']);

    // Check if id is not empty
    if (!empty($id)) {
        $update_query = "UPDATE lost_tb SET 
            bus_no = '$bus_no', 
            drivers_name = '$dName', 
            conductors_name = '$cName', 
            item = '$item', 
            date = '$date', 
            ticket_no = '$ticket' 
            WHERE id = $id";

        echo $update_query; // Output the query for debugging purposes

        $update_result = mysqli_query($conn, $update_query);

        if ($update_result) {
            header('Location: ../05-Index.php');
            exit();
        } else {
            echo "Update failed: " . mysqli_error($conn);
            exit();
        }
    } else {
        echo "ID is empty or not set.";
        exit();
    }
}


// Status Update
if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $departureID = $_POST['id'];

    $updateStatusSql = "UPDATE lost_tb SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateStatusSql);
    $stmt->bind_param("si", $status, $departureID);

    if ($stmt->execute()) {
        header("Location: ../05-Index.php");
        exit();
    } else {
        echo "Error updating status: " . $stmt->error;
        exit();
    }

    $stmt->close();
}

$sql = "SELECT * FROM lost_tb";
$result20 = mysqli_query($conn, $sql);

if ($result20) {
    $data = array(); // Initialize an array to store fetched data

    while ($row = mysqli_fetch_assoc($result)) {
        // Format the date to 'Y-m-d' format
        $row['date'] = date("Y-m-d", strtotime($row['date']));
        $data[] = $row;
    }

    // Return the data as JSON
    echo json_encode($data);
}

