<?php

include('../Connection.php');


if (isset($_POST['add_Item'])) {
  $bus_no = $_POST['bus_no'];
  $departure_time = $_POST['departured'];
  $destination = $_POST['route'];
  $unit = $_POST['unit'];

  $sql = "INSERT INTO arrival_tb (bus_no,unit,departured_time,route_destination) VALUES ('$bus_no','$unit','$departure_time','$destination')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header('location:../06-Index.php');
  }
}

// Fetch Data to Modal 


if (isset($_POST['click_update_btn'])) {
  $id = $_POST['user_id'];

  $array_result = [];

  $sql = "SELECT *FROM arrival_tb WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

      array_push($array_result, $row);
      header('content-type: application/json');
      echo json_encode($array_result);
    }
  } else {
  }
}


// Update data
if (isset($_POST['update_Item'])) {

  $id = $_POST['update_id']; // Corrected to use 'update_id'
  $bus_no = $_POST['update_bus_no'];
  $departure_time = $_POST['update_departured'];
  $route = $_POST['update_route'];
  $unit = $_POST['update_unit'];

  $sql = "UPDATE `arrival_tb` 
          SET `bus_no` = '$bus_no', 
              `unit` = '$unit', 
              `departured_time` = '$departure_time', 
              `route_destination` = '$route' 
          WHERE `id` = $id";

  echo "Debug: SQL Query: $sql<br>";  // Output the SQL query for debugging

  $result = mysqli_query($conn, $sql);

  if (!$result) {
    // Print detailed error information
    echo "Error description: " . mysqli_error($conn);
  } else {
    header('location:../06-Index.php');
  }
}

// Delete
if(isset($_POST['delete_Item'])) {
  $id = $_POST['delete_id'];

  $sql = "DELETE FROM `arrival_tb` WHERE `id` = $id";
  $result = mysqli_query($conn, $sql);

  if(!$result) {
      // Print detailed error information
      echo "Error description: " . mysqli_error($conn);
  }
  // No need to redirect here, as it's an AJAX call and you're handling the result on the client side
}

