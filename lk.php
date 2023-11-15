<?php
$title = $titlehead = "Личный кабинет";
include "includes/header.php";
include "includes/sidebar.php";
if (!isset($_SESSION["login"])) {
     header("Location: login.php");
}
?>


<?php
include "includes/footer.php";
?>