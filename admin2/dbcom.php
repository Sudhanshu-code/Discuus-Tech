<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include("dbconn.php");
  $username = $_POST['update_name'];
  $password = $_POST['update_sname'];

  $sql = "INSERT INTO `categories` (`categories_name`, `categories_description`) VALUES ('$username', '$password')";

  $result = mysqli_query($connection, $sql);
  header("Location: categories.php");
  exit();
}
?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  body {
    font: 14px sans-serif;
  }

  .wrapper {
    width: 600px;
    height: auto;
    padding: 60px;
    margin: auto;
    margin-top: 8%;
  }
</style>
<title>Insert</title>
</head>


<body  style=" background-color:white;">
<?php include('snavbar.php') ?> 
<div class="wrapper" style="border-style: inset">



  <form action="" method="POST" enctype="multipart/form-data">
    <h1>Insert New Categories
 </h1> <br>
    <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">
    <div class="form-group">
      <label>Categorie Name</label>
      <input type="text" name="update_name"  required class="box ">

    </div>
    <div class="form-group">
      <label>Categorie Description</label>
      <input type="text" name="update_sname"  required class="box">

    </div>
    <div class="form-group">
      <input type="submit" value="Insert" name="Insert_cat" class="delete_btn btn btn-primary">
      <input type="reset" value="reset" id="close-update_user" class="update_btn btn btn-danger">
      <a href="categories.php" id="close-update_user" class="update_btn btn btn-warning">Back</a>
    </div>
</div>
  </form>
</body>