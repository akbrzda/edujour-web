<?php
require_once("../db/config.php");
$email = addslashes($_GET['user_email']);
$conn->exec("DELETE FROM users WHERE user_email = '$id'");
$query = "DELETE FROM users WHERE user_email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
?>