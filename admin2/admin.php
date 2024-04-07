<!DOCTYPE html>
<html>

<head>
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
      text-align: left;
      background-color: #04AA6D;
      color: white;
    }
  </style>
</head>

<body>
  <?php include('header_admin.php') ?>
  <h1 style="color:black; text-align:center;">Registered Users</h1>


  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "discuss_tech";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT user_id, username, userpass, timestamp FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table ><tr><th>ID</th><th>Name</th><th>password</th><th>Timestamp</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["username"] . "</td><td> " . $row["userpass"] . "</td><td>" . $row["timestamp"] . "</td><td> " . $row["userpass"] . "</td></tr> ";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

  $conn->close();
  ?>


</body>

</html>
<h1> <a href='user.php'>Users Info</h1> -->