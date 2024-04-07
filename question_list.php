<?php
include("repeatedcode/_dbconnection.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <title>Questions</title>
</head>

<body>
  <?php include('repeatedcode/_header.php') ?>
  <?php include('repeatedcode/_loginmodal.php') ?>
  <?php include('repeatedcode/_signupmodal.php') ?>


  <?php
  $id = $_GET['catid'];
  $insertion_done = false;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_thread_title = $_POST["threadtitle"];
    $new_thread_desc = $_POST["threaddesc"];
    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./upimage/" . $image;
    $loggedin_userid = $_POST["user_id"];

    $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `imgFileName`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$new_thread_title', '$new_thread_desc','$image', '$id', '$loggedin_userid', current_timestamp())";
    $result = $connection->query($sql);
    $insertion_done = true;
    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $folder);
  }

  if ($insertion_done) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="mes">
                <strong>Success!</strong> Your Question is has been added!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
  }

  ?>


  <!-- THIS CODE BELOW IS TO DISPLAY THE DETAILS FOR THE CATEGORIES -->
  <?php
  $id = $_GET['catid'];
  $sql = "SELECT * FROM categories WHERE categories_id = $id";
  $result = $connection->query($sql);
  while ($categories_row = $result->fetch_assoc()) {
    $cat_name = $categories_row['categories_name'];
    $cat_description = $categories_row['categories_description'];
  }
  ?>

  <div class="container my-4">
    <div class="bg-black p-5 rounded-lg m-6" style="color:white;">
      <strong>
        <h1 class="display-4">Welcome to the <?php echo $cat_name ?> Forum</h1>
      </strong>
      <p class="lead"><?php echo $cat_description ?></p>
      <hr class="my-4">
      <p>This is a Peer - Peer Connection.No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Do not PM users asking for help. Remain respectful of other members at all times.
      </p>
      <a class="btn btn-primary btn-lg" href="https://www.google.com/" role="button">Learn more</a>
      <a class="btn btn-primary btn-lg" href="index.php">Back</a>
    </div>
  </div>



  <!-- THIS BELOW IS THE FORM FROM WHICH THE USER WILL BE ABLE TO ASK THE QUESTIONS IF NONE ASKED -->

  <?php
  if (isset($_SESSION['loggin']) && $_SESSION['loggin'] == true) {
    echo '<div class="container">
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="threadtitle">Problem Title</label>
            <input type="text" name="threadtitle" class="form-control" id="title" required>
            <small class="form-text text-muted">Dont Ask unvalid Questions</small>
          </div>
          <div class="form-group">
            <label for="threaddesc">Ellaborate your Question</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="threaddesc" required></textarea>
          </div>
          <div class="form-group">
            <input class="form-control" type="file" name="uploadfile" value="" />
          </div>
  
          <input type="hidden" name="user_id" value="' . $_SESSION['userid'] . '">
          <h1></h1>
          <div class="form-group">
				    <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            
			    </div>
          
        </form>
        
      </div>
      
      ';
  } else {
    echo '<div class="container">
        <h3>Please Signup to our website in order to Ask a Question</h3>
      </div>';
  }
  ?>



  <!-- THIS BLOCK OF CODE IS TO LIST THE QUESTIONS OR THE THREAD ASKED FOR THE SPECIFIC CATEGORY -->

  <div class="container my-4">
    <h1>Browse Questions</h1>
    <?php
    // THis script is to show threads or question asked for the specific category
    $id = $_GET['catid'];
    $sql = "SELECT * FROM thread WHERE thread_cat_id = $id";
    $result = $connection->query($sql);
    //this variable below is to show if there is thread or question asked on this specific category
    $noquestion = true;
    while ($categories_row = $result->fetch_assoc()) {
      $noquestion = false;
      $id_for_thread = $categories_row['thread_id'];
      $thread_name = $categories_row['thread_title'];
      $thread_desc = $categories_row['thread_desc'];

      $thread_img = $categories_row['imgFileName'];

      //This below variable is to provide thread table user_id to the query 
      $thread_cat_user_id = $categories_row['thread_user_id'];
      $creation_time = $categories_row['timestamp'];

      //This sql query will fetch username who is registered and show their name on the questions along with their name

      $fetchuser = "SELECT username FROM users WHERE user_id = $thread_cat_user_id";
      $fetchuser_result = mysqli_query($connection, $fetchuser);
      $fetchuser_row = mysqli_fetch_assoc($fetchuser_result);

      echo '<div class="media my-3">
                    <img class="mr-3" src="aesthetics/default_user.jpg" width="35px" alt="Generic placeholder image">
                    <div class="media-body">
                      <h4><b>' . $fetchuser_row['username']  . ' at ' . $creation_time . '</b></h4>
                      <a href="threads.php?threadid=' . $id_for_thread . '"><h5 class="mt-0">' . $thread_name . '</h5></a>
                      <p>' . $thread_desc . '</p>
                      
                     
                    </div>
                  </div>';
      if ($thread_img != null) {
        echo ' <img src="' . './upimage/' . $thread_img . '" style="margin: 5px;width: 350px;height: 250px;"/>';
      }
    }
    if ($noquestion) {
      echo '<div class="jumbotron jumbotron-fluid"> 
                  <div class="container">
                    <h1 class="display-4">No Result Found</h1>
                    <p class="lead">Be the first to ask the Question.</p>
                  </div>
                </div>';
    }

    ?>

  </div>




  <?php include('repeatedcode/_footer.php') ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>