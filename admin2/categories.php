<?php
include 'dbconn.php';

if (isset($_POST['update_user'])) {

    $categories_id = $_POST['update_id'];
    $categories_name = $_POST['update_name'];
    $categories_description = $_POST['update_sname'];

    mysqli_query($connection, "UPDATE `categories` SET `categories_name`='$categories_name',`categories_description`='$categories_description' WHERE categories_id = '$categories_id'") or die('query failed');

    header('categories.php');
}




if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    mysqli_query($connection, "DELETE FROM `categories` WHERE categories_id = '$delete_id'") or die('query failed');
    header('location:categories.php');
}


?>

<head>
    <title>Categories</title>

    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>



<?php include('header_admin.php') ?>



<h1 style="color:black; text-align:center;">Availabel Categories</h1>
<a class="btn btn-primary ml-3 " href="categories-pdf.php" style="margin-bottom :5px; margin-left:5px ">Print</a>
<a class="btn btn-warning ml-3 " href="dbcom.php" style="margin-bottom :5px; margin-left:5px ">Insert</a>

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
                        <input type="hidden" name="update_id" value="<?php echo $update_id; ?>">
                        <input type="text" value="<?php echo $fetch_update['categories_name'] ?>" name="update_name" required class="box ">
                        <input type="text" value="<?php echo $fetch_update['categories_description'] ?>" name="update_sname" required class="box">

                        <input class="btn btn-primary" type="submit" value="Update" name="update_user" class="delete_btn">
                        <input class="btn btn-danger" type="reset" value="cancel" id="close-update_user" class="update_btn">
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
<script>
    document.querySelector('#close-update_user').onclick = () => {
        document.querySelector('.edit-product-form').style.display = 'none';
        window.location.href = 'categories.php';
    }
</script>

<table>

    <thead>
        <th>Categorie</th>
        <th>Categorie Name</th>
        <th>Categorie Description</th>
        <th>Created Date</th>
        <th>Update</th>
        <th>Detete</th>
    </thead>
    <tbody>
        <?php
        $select_users = $connection->query("SELECT  categories_id, categories_name, categories_description, created_date  FROM categories");
        if ($select_users->num_rows  > 0) {

            while ($row = $select_users->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['categories_id']; ?></td>
                    <td><?php echo $row['categories_name']; ?></td>
                    <td><?php echo $row['categories_description']; ?></td>
                    <td><?php echo $row['created_date']; ?></td>


                    <td>
                        <a style="text-decoration:none ;" class="btn btn-outline-danger" href="up.php?insert_categories=<?php echo $row['categories_id']; ?>">Update</a>

                    </td>
                    <td><a style="text-decoration:none ;" class="btn btn-outline-danger" href="categories.php?delete_user=<?php echo $row['categories_id']; ?>" onclick="return confirm('delete this categories?');">Delete</a></td>

                </tr>
        <?php
            }
        } else {
            echo '<p class="empty">There is no categories yet!</p>';
        }
        ?>

    </tbody>
</table>

</div>






<?php include('footer_admin.php') ?>