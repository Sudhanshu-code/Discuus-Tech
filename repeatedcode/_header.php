<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<a class="navbar-brand" href="index.php">
    <img src="aesthetics/logo.png" alt="" height="35">
</a>
    <a class="navbar-brand" href="index.php">We DiscussTech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="repeatedcode/about.php">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="repeatedcode/contact.php">Contact</a>
        </li>
       
       
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Top Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql = "SELECT categories_name, categories_id FROM categories LIMIT 3";
$result = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<a class="dropdown-item" href="question_list.php?catid=' . $row['categories_id'] . '">' . $row['categories_name'] . '</a>';
}
echo   '</div>
        </li>
        
       
        
       
        </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
      <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      
    </form>
    ';

if (isset($_SESSION['loggin']) && $_SESSION['loggin'] == true) {
    echo '<p class="text-light my-2 mx-3">Welcome : ' . $_SESSION['username'] . '</p>
    
    <a href="repeatedcode/_handlelogout.php"><button type="button" class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#loginModal">Logout</button><a>
    <a href="repeatedcode/reset-password.php" class="btn btn-warning">Reset Your Password</a>
    ';
} else {
    echo '  <button type="button" class="btn btn-outline-primary mx-3" data-toggle="modal" data-target="#loginModal">Login</button>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#signupModal">Sign Up</button>
           <a class="btn btn-outline-primary"  style="margin-left: 14px;" aria-current="page" href="admin2\register.php">Admin</a>
          
           
        
           
            ';
    include('repeatedcode/_loginmodal.php');
    include('repeatedcode/_signupmodal.php');
   
}

echo '  </div>
       </div>
    </nav>';

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div id="mes" class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> SignedUp Successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    echo '<div id="mes"class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> Password do not match!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}
if (isset($_GET['signup']) && $_GET['signup'] == "false") {
    echo '<div id="mes"   class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> This username is already taken.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}

if (isset($_GET['login']) && $_GET['login'] == "true") {
    echo '<div id="mes"  class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Logged in Successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
}
if (isset($_GET['login']) && $_GET['login'] == "invalidpass") {
    echo '<div  id="mes"  class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> Invalid Credentials.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
if (isset($_GET['login']) && $_GET['login'] == "invaliduser") {
    echo '<div id="mes"   class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>User not Registered!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}
if (isset($_GET['logout']) && $_GET['logout'] == "true") {
    echo '<div id="mes"  class="alert alert-success alert-dismissible fade show my-0" role="alert">
                <strong>Loggedout Successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
}


?>

<script>
    setTimeout(() => {
        const box = document.getElementById('mes');
        box.style.display = 'none';

    }, 2000);
</script>