<?php
include '../Connection.php';
$id = $_GET['updateid'];
$sql = "SELECT *FROM main_tb WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$bus_no = $row['bus_no'];
$time = $row['time_dept'];
$route = $row['route_destination'];
$unit = $row['unit'];
$cor = $row['cor_number'];
$passTicket = $row['pass_ticket'];
$baggTicket = $row['bagg_ticket'];
$passenger = $row['passenger'];
$dName = $row['drivers_name'];
$cName = $row['conductors_name'];
$date = $row['date'];

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Optional: If you want to use Bootstrap JS features, include the following script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../form.css" />
    
   
  </head>
  <body>
    <section class="container">
      <header>Update Form</header>
      <form action="#" class="form" method="post">
      

        <div class="column">
            <div class="input-box">
            <label>Bus Number</label>
            <input type="text" placeholder="Enter Bus Number" name="bus_no" required  value=<?php echo $bus_no;?>>
            </div>

            <div class="input-box">
            <label>Departure Time</label>
            <input type="text" placeholder="Enter Departure Time" name="time"required value=<?php echo $time;?>>
            </div>
        </div>

    <div class="column">
        <div class="input-box">
            <label>Route Destination</label>
            <input type="text" placeholder="Enter Route Destination" name="route" required value=<?php echo $route;?>>
        </div>

        <div class="input-box">
        <label>Unit</label>
            <div class="select-box">
              <select name="unit">
              <option selected><?php echo $unit;?></option>
                <option>Air Condation</option>
                <option>Not Air Condation</option>
              </select>
            </div>
        </div>
    </div>

    <div class="column">
            <div class="input-box">
            <label>COR Number</label>
            <input type="text" placeholder="Enter COR Number" name="cor" required value=<?php echo $cor;?>>
            </div>

            <div class="input-box">
            <label>Pass Ticket</label>
            <input type="text" placeholder="Enter Pass Ticket" name="passTicket" required value=<?php echo $passTicket;?>>
            </div>
    </div>

    <div class="column">
            <div class="input-box">
            <label>Bagg Ticket</label>
            <input type="text" placeholder="Enter Bagg Ticket" name="baggTicket" required value=<?php echo $baggTicket;?>>
            </div>

            <div class="input-box">
            <label>Number of Passenger</label>
            <input type="text" placeholder="Enter Number Of Passenger" name="noOfPassenger" required value=<?php echo $passenger;?>>
            </div>
    </div>

    <div class="column">
            <div class="input-box">
            <label>Driver's Name</label>
            <input type="text" placeholder="Enter Driver's Name" name="dName" required value=<?php echo $dName;?>>
            </div>

            <div class="input-box">
            <label>Conductor's Name</label>
            <input type="text" placeholder="Enter Conductor's Name" name="cName" required value=<?php echo $cName;?>>
            </div>
    </div>
        </div>
        <button name="submit">Submit</button>
      </form>
    </section>

    <!-- Update Query -->
<?php
 include '../Connection.php';
    if(isset($_POST['submit']))
    {
        $id = $_GET['updateid'];
        $bus_no = $_POST['bus_no'];
        $time = $_POST['time'];
        $route = $_POST['route'];
        $unit = $_POST['unit'];
        $cor = $_POST['cor'];
        $passT = $_POST['passTicket'];
        $baggT = $_POST['baggTicket'];
        $no_passenger = $_POST['noOfPassenger'];
        $drivers_Name = $_POST['dName'];
        $conductors_Name = $_POST['cName'];

        $Update_sql = "UPDATE main_tb SET id = '$id', bus_no = '$bus_no', time_dept = '$time', route_destination = '$route', unit = '$unit', cor_number = '$cor', pass_ticket = '$passT', bagg_ticket = '$baggT', passenger = '$no_passenger', drivers_name = '$drivers_Name', conductors_name = '$conductors_Name' WHERE `id` = '$id' ";

        $update_result = mysqli_query($conn,$Update_sql);

        if ($update_result) {
          echo '<script>
                  $(document).ready(function(){
                      $("#successModal").modal("show");
                  });
                </script>';
      }      
    }
?>
   
<!-- Bootstrap Success Modal -->
<div class="modal" id="successModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Updated successfully!</p>
            </div>
           
            <div class="modal-footer" >
              <button type="button" class="btn btn-primary" name="okBtn" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>


  </body>
</html>
