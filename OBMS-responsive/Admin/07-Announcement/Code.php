<?php

include('../Connection.php');


if (isset($_POST['add_Item']))
{
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];
  

  $sql = "INSERT INTO announce_tb (title,content,date) VALUES ('$title','$content','$date')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header('location:../07-Index.php');
  }
}

// Fetch Data to Modal 


if (isset($_POST['click_update_btn']))
 {
  $id = $_POST['user_id'];

  $array_result = [];

  $sql = "SELECT *FROM announce_tb WHERE id='$id'";
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
if(isset($_POST['update_btn'])) {

  $id = $_POST['update_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $date = $_POST['date'];

  $sql = "UPDATE `announce_tb` 
        SET `title` = '$title', 
            `content` = '$content', 
            `date` = '$date'
        WHERE `id` = $id";

  echo "Debug: SQL Query: $sql<br>";  // Output the SQL query for debugging

  $result = mysqli_query($conn, $sql);

  if(!$result) {
      // Print detailed error information
      echo "Error description: " . mysqli_error($conn);
  } else {
      header('location:../07-Index.php');
  }
}

// Delete

if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM announce_tb WHERE id = $id";
    
    $result = mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../07-Index.php');
    }
}
?>
