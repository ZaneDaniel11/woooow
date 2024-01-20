<?php
include '../Connection.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM main_tb WHERE id = ?";
    $stmt = mysqli_prepare($conn, $delete_sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $delete_result = mysqli_stmt_execute($stmt);

    if ($delete_result) {
        // Redirect back to the page after successful deletion
        header('Location:../01-Index.php');
        exit();
    } else {
        echo "Delete operation failed.";
    }
}

