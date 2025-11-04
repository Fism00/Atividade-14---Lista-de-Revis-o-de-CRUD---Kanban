<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../index.php");

endif

?>

<?php
$id = $_GET['id'];

echo "$id";
?>