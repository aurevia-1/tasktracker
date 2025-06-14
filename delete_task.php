<?php
include 'connect.php';
$id = $_GET['id'];
$con->query("DELETE FROM tasks WHERE id=$id");
header("Location: index.php");
?>
