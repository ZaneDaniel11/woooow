<?php
include '../Connection.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM main_tb WHERE id = '$id'";
    $delete_result = mysqli_query($conn, $delete_sql);

    if ($delete_result) {
        // Redirect back to the page after successful deletion
        header('Location: 01-Index.php');
        exit();
    } else {
        echo "Delete operation failed.";
    }
}
?>
