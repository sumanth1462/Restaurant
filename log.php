<?php
session_start();
require 'config.php';
session_unset();
session_destroy();
header("Location: sign.php");

mysqli_close($conn);

?>