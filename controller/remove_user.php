<?php
require_once("includes/config.php");
$id = addslashes($_GET['email']);
$query = "SELECT photo FROM user where email = '$id'";
$conn->exec("DELETE FROM user WHERE email = '$id'");
?>