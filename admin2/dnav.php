<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="Dashboard.php">
        <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Admin
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">






        </ul>


    </div>



    <div>
        <ul class="navbar-nav ">
            <li class="nav-item mx-2">
                <h4 class="nav-link active ">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h4>
            </li>
            <li class="nav-item ">
                <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            </li>
            <li class="nav-item mx-2">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </ul>
    </div>

</nav>