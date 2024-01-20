<header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="image-container">
        <img src="admin-pictures/1-admin.png" alt="">
    </div>
    <nav>
        <ul>
            <li><a class="navbar-link" href="02-Index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a class="navbar-link" href="02-Index.php"><i class="fa-regular fa-timeline"></i>Stanby Busses</a></li>
            <li><a class="navbar-link" href="03-Index.php">Management</a></li>
            <li><a class="navbar-link" href="04-Index.php">Departure</a></li>
            <li><a class="navbar-link" href="05-Index.php">Lost and Found</a></li>
            <li><a class="navbar-link" href="06-Index.php">Arrival</a></li>
            <li><a class="navbar-link" href="07-Index.php">Announcement</a></li>
            <li><a class="navbar-link" href="01-Index.php">History</a></li>
        </ul>
    </nav>


</header>

<style>
   body {
    background: #34495E;
    color: #dd5;
    margin: 0;
    padding: 0;
    
}

header {
    position: fixed;
    width: 200px;
    background: #34495E;/* Dark background color */
    left: 0;
    top: 0;
    bottom: 0;
    padding-top: 20px;
    color: #dd5;
}

.image-container {
    position: absolute;
    width: 100px;
    top: 0;
    margin-left: 50px;
    margin-top: 20px;
}

.image-container img {
    width: 100%;
    height: 100%;
}

nav {
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: column;
    margin-top: 100px;
}

.navbar-link {
    text-decoration: none;
    color: #dd5; /* White text color */
    transition: color 0.3s; /* Smooth transition for color change */
}

.navbar-link:hover {
    color: #48B03E; /* Change color on hover */
}

ul {
    display: flex;
    flex-direction: column;
}

ul li {
    margin: 15px;
    list-style-type: none;
}

</style>