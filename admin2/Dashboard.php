<?php
include 'dbconn.php';

$sql = "SELECT COUNT(*) AS total from users";
$result = $connection->query($sql);
$data =  $result->fetch_assoc();

$sql = "SELECT COUNT(*) AS total from categories";
$result = $connection->query($sql);
$data2 =  $result->fetch_assoc();


$sql = "SELECT COUNT(*) AS total from comments";
$result = $connection->query($sql);
$data3 =  $result->fetch_assoc();


$sql = "SELECT COUNT(*) AS total from contact";
$result = $connection->query($sql);
$data4 =  $result->fetch_assoc();


$sql = "SELECT COUNT(*) AS total from thread";
$result = $connection->query($sql);
$data5 =  $result->fetch_assoc();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php include('dnav.php') ?>

<head>
  <title>Dashboard</title>
</head>
<body>





  <br>
  <div class="container my-3 text-center">
    <h2 class="text-center">Admin Control Panel</h2>
    <div class="row">
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="users.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Number of Users Registered</h5>
            <a href="user.php" class="btn btn-primary"><?php echo $data['total'] ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="menu.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Availabel Categories</h5>
            <a href="categories.php" class="btn btn-primary"><?php echo $data2['total'] ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="quotes.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Users Comments</h5>
            <a href="comments.php" class="btn btn-primary"><?php echo $data3['total'] ?></a>
          </div>
        </div>
      </div>

      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="contact-us.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Users contacted</h5>
            <a href="contact.php" class="btn btn-primary"><?php echo $data4['total'] ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="what.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Questions Asked</h5>
            <a href="question_lista.php" class="btn btn-primary"><?php echo $data5['total'] ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="printer.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Print Report</h5>
            <a href="dashprint.php" class="btn btn-primary">print</a>
          </div>
        </div>
      </div>

</body>