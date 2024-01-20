<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Login Form</title>
  <script src="validate.js"></script>
</head>
<body>
  <div class="container">
    <form action="login.php" method="post" class="login-form" onsubmit="return validateForm()">
      <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required pattern="[a-zA-Z0-9]+" title="Username must contain only letters and numbers." autocomplete="off">
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required pattern="[a-zA-Z0-9]+" title="Password must contain only letters and numbers." autocomplete="off">
      
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-form {
        max-width: 300px;
        margin: auto;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        color: #555;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
    }

  
</style>


<?php
// Assuming a MySQL database connection for demonstration purposes.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM admin_tb WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
        header('Location:01-Index.php');
    } else {
    
        echo "Invalid username or password.";
    }
}


$conn->close();
?>
