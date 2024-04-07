<?php
session_start();
session_unset();
session_destroy();
header("location: /prc/index.php?logout=true");
?>