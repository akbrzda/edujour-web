<?php
session_start();

require_once "db/config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>EduJour -
          <?= $title ?>
     </title>
     <script src="./assets/js/menu-highlight.js"></script>
     <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>