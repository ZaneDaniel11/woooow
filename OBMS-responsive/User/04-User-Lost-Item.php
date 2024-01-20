<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Bus Management System</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&family=Inter:wght@500;600;
                700&family=Kaushan+Script&family=Montserrat&family=Roboto+Slab&family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="CSS/STYLE-lost.css">

</head>

<body>
  <?php
  include 'header.html'
  ?>

  <div class="bodypic">
    <img src="imgaes/booking.jpg">
  </div>


  <div class="section2">
    <p class="p1">LOST ITEMS</p>
    <p class="p2">Lost items information</p>
  </div>

  <div class="tableContainer">
    <?php
    include 'Table/Table-lostItem.php';
    ?>
  </div>

  <div class="buttonContainer">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Lost a Item
    </button>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form -->
          <form method="post">
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Ticket No.</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="ticket" placeholder="Please Enter ticket Number">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Bus no.</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="busno" placeholder="Enter bus Number">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Item</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="item" placeholder="Please Enter Item description">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Date Lost</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="date" placeholder="Please Enter Item description">
              </div>
            </div>
            <div class="submit"> <button type="submit" class="btn btn-primary" name="submit">Submit</button></div>
            <?php

            if (isset($_POST['submit'])) {
              include './Table/TABLE-Connection.php';
              $ticket = $_POST['ticket'];
              $busno = $_POST['busno'];
              $item = $_POST['item'];

              $sql = "INSERT INTO lost_tb (bus_no, item, status, ticket_no) VALUES ('$busno', '$item', 'Pending', '$ticket')";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                echo '<script>
                       $(document).ready(function(){
                           $("#submitSuccessModal").modal("show");
                       });
                    </script>';
              }
            }


            ?>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="submitSuccessModal" tabindex="-1" aria-labelledby="submitSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="submitSuccessModalLabel">Submission Successful</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Your item has been submitted successfully.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<style>
  .buttonContainer {
    margin-top: 20px;
    display: flex;
    width: 100%;
    height: 50px;
    justify-content: center;
  }

  .buttonContainer button {
    width: 150px;
    height: 50px;
    flex-shrink: 0;
    border-radius: 10px;
    background: #C72A25;
    border-style: none;
    font-size: 20px;

    color: white;
  }
</style>