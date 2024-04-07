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

  <title>Query</title>
</head>

<body>
  <?php include('repeatedcode/_header.php') ?>
  <?php include('repeatedcode/_loginmodal.php') ?>
  <?php include('repeatedcode/_signupmodal.php') ?>

  <!-- THIS PAGE IS MADE TO SPECIFICALLY DISPLAY THE QUESTIONS AND ALLOWS TO COMMENT ALSO -->

  <?php
  $id = $_GET['threadid'];
  $sql = "SELECT * FROM thread WHERE thread_id = $id";
  $result = $connection->query($sql);
  while ($categories_row = $result->fetch_assoc()) {
    $thread_name = $categories_row['thread_title'];
    $thread_desc = $categories_row['thread_desc'];
    $posted_by_name = $categories_row['thread_user_id'];

    // This SQL query is for displaying the name of the user who has posted it
    // This query takes the thread_user_id which is taken from the above Query

    $fetchuser = "SELECT username,timestamp FROM users WHERE user_id = $posted_by_name";
    $fetchuser_result = mysqli_query($connection, $fetchuser);
    $fetchuser_row = mysqli_fetch_assoc($fetchuser_result);
    $posted_by_name = $fetchuser_row['username'];
    $posted_time = $fetchuser_row['timestamp'];
  }
  ?>

  <div class="container my-4">
    <div class="bg-black p-5 rounded-lg m-6" style="color:white;">
      <strong>
        <h1 class="display-4"><?php echo $thread_name ?></h1>
      </strong>
      <p class="lead"><?php echo $thread_desc ?></p>
      <hr class="my-4">
      <p>This is a Peer - Peer Connection.No Spam / Advertising / Self-promote in the forums. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Do not PM users asking for help. Remain respectful of other members at all times.</p>
      <p><b>Posted by: <?php echo $posted_by_name; ?></b></p>
      <p><b>Posted at: <?php echo $posted_time; ?></b></p>
      <a class="btn btn-primary btn-lg" href="index.php">Back</a>
    </div>
  </div>

  <?php
  if (isset($_SESSION['loggin']) && $_SESSION['loggin'] == true) {
    echo '<div class="container">
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" id="threadpage">
          <div class="form-group">
            <h1>Post your Comment</h1>
            <label for="commemt">Type your comment</label>
            <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
          </div>
          <input type="hidden" name="user_id" value="' . $_SESSION['userid'] . '">
          <h1></h1>
          <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
      </div>';
  } else {
    echo '<div class="container p-3 my-3 bg-dark text-white">
          <h2>Please Login or SignUp to our Website for posting comments</h2>
        </div>';
  }

  ?>

  <?php
  $show_comment_insertion_Alert = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['threadid'];
    $post_comment = $_POST['comment'];
    $unique_comment_id = $_POST['user_id'];
    $sql = "INSERT INTO `comments` (`comment_desc`, `thread_id`, `commented_by`, `comment_time`) VALUES ('$post_comment', '$id', '$unique_comment_id', current_timestamp())";
    $result = $connection->query($sql);
    $show_comment_insertion_Alert = true;
  }
  ?>

  <div class="container">
    <h1>Discuss Here</h1>
    <?php
    // THis script is to show comments 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM comments WHERE thread_id = $id";
    $result = $connection->query($sql);

    //this variable below is to show if there is thread or question asked on this specific category
    $noquestion = true;
    while ($categories_row = $result->fetch_assoc()) {
      $noquestion = false;
      $display_comment = $categories_row['comment_desc'];
      $comment_time = $categories_row['comment_time'];
      $comment_user_id = $categories_row['commented_by'];

      $sql2 = "SELECT username FROM users WHERE user_id = $comment_user_id";
      $result2 = mysqli_query($connection, $sql2);
      $fetch_commented_user = mysqli_fetch_assoc($result2);

      echo '<div class="media my-3">
                    <img class="mr-3" src="aesthetics/default_user.jpg" width="35px" alt="Generic placeholder image">
                    <div class="media-body">
                      <p class="font-weight-bold my-0"><b> ' . $fetch_commented_user['username'] . ' at ' . $comment_time . ' </b></p>
                      ' . $display_comment . '
                    </div>
                  </div>';
    }
    if ($noquestion) {
      echo '<div class="jumbotron jumbotron-fluid">
                  <div class="container">
                    <h1 class="display-4">No Comments posted.</h1>
                    <p class="lead">Be the first to Comment.</p>
                  </div>
                </div>';
    }

    ?>
  </div>

  <?php include('repeatedcode/_footer.php') ?>

  <script>
    function myFunction() {
      document.getElementById("myForm").reset();
    }
  </script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>