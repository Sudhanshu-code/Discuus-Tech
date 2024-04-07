<?php
include 'dbconn.php';
if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];
    mysqli_query($connection, "DELETE FROM `comments` WHERE comment_id = '$delete_id'") or die('query failed');
    header('location:comments.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Comments</title>
    <style>
        body {
            background-color: powderblue;
        }

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
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <?php include('header_admin.php') ?>

    <h1 style="color:black; text-align:center;">Users Comments</h1>
    <a class="btn btn-primary ml-3 " href="comment-pdf.php" style="margin-bottom :5px; margin-left:5px ">Print</a>
    <table>
        <thead>
            <th>ID</th>
            <th>Comments </th>
            <th>Thread ID</th>
            <th>Commented By</th>
            <th>Commented Time</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $select_users = $connection->query("SELECT comment_id,comment_desc,thread_id, commented_by,comment_time FROM comments");
            if ($select_users->num_rows  > 0) {

                while ($row = $select_users->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['comment_id']; ?></td>
                        <td><?php echo $row['comment_desc']; ?></td>
                        <td><?php echo $row['thread_id']; ?></td>
                        <td><?php echo $row['commented_by']; ?></td>
                        <td><?php echo $row['comment_time']; ?></td>
                        <td><a class="btn btn-outline-danger" style="text-decoration:none ;" href="comments.php?delete_user=<?php echo $row['comment_id']; ?>" onclick="return confirm('Delete This Comment?');">Delete</a></td>

                    </tr>
            <?php
                }
            } else {
                echo '<p class="empty">There is no any user registered yet!</p>';
            }
            ?>
        </tbody>
    </table>


    <?php include('footer_admin.php') ?>
</body>

</html>