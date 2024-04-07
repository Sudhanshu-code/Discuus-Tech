<?php
include 'dbconn.php';

if (isset($_POST['update_user'])) {

  $categories_id = $_POST['update_id'];
  $categories_name = $_POST['update_name'];
  $categories_description = $_POST['update_sname'];

  mysqli_query($connection, "UPDATE `categories` SET `categories_name`='$categories_name',`categories_description`='$categories_description' WHERE categories_id = '$categories_id'") or die('query failed');

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
  <title>Update</title>

</head>

<body style=" background-color:white;">
  <?php include('snavbar.php') ?>
  <div class="wrapper" style="border-style: inset">
    <section class="edit_user-form">
      <div class="edit-product-form">
        <?php
        if (isset($_GET['insert_categories'])) {
          $update_id = $_GET['insert_categories'];
          $update_query = mysqli_query($connection, "SELECT * FROM `categories` WHERE categories_id = '$update_id'") or die('pawan failed');
          if (mysqli_num_rows($update_query) > 0) {
            while ($fetch_update = mysqli_fetch_assoc($update_query)) {

        ?>
              <form action="" method="POST" enctype="multipart/form-data">

                <h1>Update Categorie
                </h1> <br>

                <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">
                <!-- <input  type="text" value="<?php echo $fetch_update['categories_name'] ?>" name="update_name" placeholder="Enter  Name" required class="box "> -->
                <div class="form-group">
                  <label>Categorie Name</label>
                  <input type="text" value="<?php echo $fetch_update['categories_name'] ?>" name="update_name" required class="box ">

                </div>

                <div class="form-group">
                  <label>Categorie Description</label>
                  <input type="text" value="<?php echo $fetch_update['categories_description'] ?>" name="update_sname" required class="box">

                </div>


                <div class="form-group">
                  <input href="categories.php" class="btn btn-primary" type="submit" value="Update" name="update_user" class="delete_btn">
                  <input class="btn btn-danger" type="reset" value="cancel" id="close-update_user" class="update_btn">
                  <a href="categories.php" id="close-update_user" class="update_btn btn btn-warning">Back</a>

                </div>
              </form>




        <?php
            }
          }
        } else {
          echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>

      </div>
    </section>
</body>