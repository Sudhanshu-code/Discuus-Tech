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

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Print</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
 </head>
 <body>
 <h1>Report Genreated</h1>

<table id="customers">
  <tr>
    <th>Tables</th>
    <th>Total</th>
   
  </tr>
  <tr>
    <td>Total Number of Users</td>
    <td><?php echo $data['total'] ?> </td>
  </tr>
  <tr>
    <td>Total Number of Categories</td>
    <td><?php echo $data2['total'] ?></td>
   
  </tr>
  <tr>
    <td>Total Number of Comments </td>
    <td><?php echo $data3['total'] ?> </td>
    
  </tr>
  <tr>
    <td>Total Number of Contacted Users</td>
    <td><?php echo $data4['total'] ?> </td>
    
  </tr>
 
  <tr>
    <td>Total Number of Threds</td>
    <td><?php echo $data5['total'] ?> </td>
   
  </tr>
  
</table>
 </body>

 </html>