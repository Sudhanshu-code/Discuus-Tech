<?php
include 'dbconn.php';
if (isset($_GET['delete_user'])) {
  $delete_id = $_GET['delete_user'];
  mysqli_query($connection, "DELETE FROM `thread` WHERE thread_id = '$delete_id'") or die('query failed');
  header('location:question_lista.php');
}

?>
<head>
<title>Questions</title>
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

 td,  th {
  border: 1px solid #ddd;
  padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;


}

 tr:hover {background-color: #ddd;}



 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<?php include('header_admin.php') ?>  

<h1 style="color:black; text-align:center;">Users Questions</h1>
<a class="btn btn-primary ml-3 "href="question-pdf.php" style="margin-bottom :5px; margin-left:5px ">Print</a>
        <table>
            <thead>
                <th>ID</th>
                <th>Question Title</th>
                <th>Question Description</th>
                <th>Image</th>
                <th>Categories ID</th>
                <th>User ID</th>
                <th>Timestamp</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $select_users = $connection->query("SELECT   thread_id, thread_title, thread_desc,imgFileName, thread_cat_id, thread_user_id, timestamp FROM thread");
                if ($select_users->num_rows  > 0) {

                    while ($row = $select_users->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['thread_id']; ?></td>
                            <td><?php echo $row['thread_title'];?></td>
                            <td><?php echo $row['thread_desc']; ?></td>
                            <td><?php echo $row['imgFileName']; ?></td>
                            <td><?php echo $row['thread_cat_id']; ?></td>
                            <td><?php echo $row['thread_user_id']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                           
                           
                           
                            <td  ><a class="btn btn-outline-danger" style="text-decoration:none ;" href="question_lista.php?delete_user=<?php echo $row['thread_id']; ?>" onclick="return confirm('delete this product?');">Delete</a></td>
                        </tr>
                <?php
                    }
                } else {
                    echo '<p class="empty">There is no any user registered yet!</p>';
                }
                ?>
            </tbody>
        </table>

    </div>
    <?php include('footer_admin.php') ?>   