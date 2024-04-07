<?php
include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact</title>
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


    <h1 style="color:black; text-align:center;">Users contacted</h1>
    <a class="btn btn-primary ml-3 " href="contact-pdf.php" style="margin-bottom :5px; margin-left:5px ">Print</a>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Timestamp</th>

        </thead>
        <tbody>
            <?php
            $select_users = $connection->query("SELECT name,email,subject,message, timestamp FROM contact");
            if ($select_users->num_rows  > 0) {

                while ($row = $select_users->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>

                    </tr>
            <?php
                }
            } else {
                echo '<p class="empty">There is no user contacted yet!</p>';
            }
            ?>
        </tbody>
    </table>


    <?php include('footer_admin.php') ?>
</body>

</html>