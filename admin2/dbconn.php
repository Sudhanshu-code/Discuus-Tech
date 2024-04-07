<?php
$connection = new mysqli("localhost", "root", "", "discuss_tech");
if($connection -> connect_errno){
    echo "Failed to connect to MYSQL Server" . $connection -> connect_errno;
    exit();
}
?>