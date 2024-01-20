<?php
include '../Connection.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM departure_tb WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:../04-Index.php');
    }
}

// Fetch Data to modal

if (isset($_POST['click_update_btn'])) {
    $id = $_POST['user_id'];

    $array_result = [];

    $sql = "SELECT * FROM departure_tb WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($array_result, $row);
            header('content-type: application/json');
            echo json_encode($array_result);
        }
    }
}

// Update button

if (isset($_POST['update'])) {

    $status = $_POST['status'];
    $departureID = $_POST['id'];

    // Update the status in the database
    $updateStatusSql = "UPDATE departure_tb SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateStatusSql);
    $stmt->bind_param("si", $status, $departureID);

    if ($stmt->execute()) {
        header("Location: ../04-Index.php");
        exit();
    } else {
        echo "Error updating status: " . $stmt->error;
    }

    $stmt->close();
}