<?php
include 'connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$task = $_POST['task'];
$date = $_POST['date'];
$timeIn = $_POST['timeIn'];
$timeOut = $_POST['timeOut'];
$status = $_POST['status'];

if ($id) {

  $sql = "UPDATE tasks SET name='$name', task='$task', date='$date',
          time_in='$timeIn', time_out='$timeOut', status='$status'
          WHERE id=$id";
} else {
 
  $sql = "INSERT INTO tasks (name, task, date, time_in, time_out, status)
          VALUES ('$name', '$task', '$date', '$timeIn', '$timeOut', '$status')";
}

$conn->query($sql); 
header("Location: index.php");
?>
