<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$user = "root";
$password = "";
$db = "bookmarks";
$con = mysqli_connect("localhost", $user, $password, $db);
?>