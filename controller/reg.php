<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/config.php';

$surname = addslashes($_POST['user_secname']);
$name = addslashes($_POST['user_name']);
$email = addslashes($_POST['user_email']);
$role = addslashes($_POST['user_role']);
$roleNum = '';
if ($role == 'teacher') {
     $roleNum = '2';
} else if ($role == 'student') {
     $roleNum = '3';
     $studentGroup = addslashes($_POST['user_group']);
} else {
     echo "Выберите свою роль!";
     exit;
}

$passwd = addslashes($_POST['user_password']);
if (!$email || !$passwd || !$name) {
     echo "<p>Вы задали не все параметры</p>";
     exit;
}
if ($_POST['user_password2'] <> $passwd) {
     echo "<p>Пароли не совпадают!</p>";
     exit;
}
$passwd = SHA1(md5($passwd));
$query = "Insert into users values
('', '$name','$surname','$email','$passwd','$roleNum', '$studentGroup', CURRENT_DATE())";
$conn->exec($query);

$_SESSION['login'] = $email;
header('Location: ../lk.php');
exit;
?>