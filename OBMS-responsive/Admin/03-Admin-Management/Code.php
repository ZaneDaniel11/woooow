<?php
include '../Connection.php';
// Update
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

// 
// Click Modal
if (isset($_POST['click_update_btn'])) {
    $id = $_POST['user_id'];

    $array_result = [];

    $sql = "SELECT *FROM management_tb WHERE id='$id'";
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

// Update 
 
if(isset($_POST['update_btn']))
{   
    $id = $_POST['id'];
    $bus_no = $_POST['bus_no'];
    $route =$_POST['route'];
    $unit =$_POST['unit'];
    $cor=$_POST['cor'];
    $pass = $_POST['pass'];
    $bagg = $_POST['bagg'];
    $passenger = $_POST['passenger'];
   
    $dName =$_POST['dName'];
    $cName =$_POST['cName'];
    $time =$_POST['time'];

    $query = "UPDATE `management_tb` SET `bus_no` = '$bus_no' ,`cor_number` = '$cor', `bagg_ticket` = '$bagg', `passenger` = '$passenger', `time_dept` = '$time', `route_destination` = '$route', `drivers_name` = '$dName', `conductors_name` = '$cName' WHERE `management_tb`.`id` = '$id' ";

    $result = mysqli_query($conn,$query);

    if($result)
    {
        header('location:../03-Index.php');
    }
    else 
    {
        echo 'woow';
    }
            

}


if (isset($_GET['releaseid'])) {
    $id = $_GET['releaseid'];
    $sql = "SELECT * FROM management_tb WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $bus_no = $row['bus_no'];
        $time_dept = $row['time_dept'];
        $route = $row['route_destination'];
        $unit = $row['unit'];
        $cor = $row['cor_number'];
        $passTicket = $row['pass_ticket'];
        $baggTicket = $row['bagg_ticket'];
        $passenger = $row['passenger'];
        $dName = $row['drivers_name'];
        $cName = $row['conductors_name'];

        $save_query = "INSERT INTO main_tb (bus_no, time_dept, route_destination, unit, cor_number, pass_ticket, bagg_ticket, passenger, drivers_name, conductors_name, date) VALUES ('$bus_no', '$time_dept', '$route', '$unit', '$cor', '$passTicket', '$baggTicket', '$passenger', '$dName', '$cName', NOW())";

        $result1 = mysqli_query($conn, $save_query);

        if ($result1) {
            
            $departure = "INSERT INTO departure_tb (bus_no,time_dept,route_destination,unit,passenger,drivers_name,conductors_name,status)VALUES('$bus_no','$time_dept','$route','$unit','$passenger','$dName','$cName','Departured')";
            $result2 = mysqli_query($conn,$departure);
            if($result2)
            {
                $delete = "DELETE FROM management_tb WHERE id = $id";
                $result3 = mysqli_query($conn,$delete);

                if($result3)
                {
                    header('location:../03-Index.php');
                }
                else
                {

                }
             }
        } else {
            
        }
    } else {
        
    }
}

if(isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    
    $sql = "DELETE FROM management_tb WHERE id = $id";
    
    $result = mysqli_query($conn,$sql);
    
    if($result)
    {
        header('location:../03-Index.php');
    }
    
}
?>