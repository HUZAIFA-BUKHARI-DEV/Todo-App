<?php 
    SESSION_START();
    include 'db.php';
    $taskno=$_GET['tasknum'];
    $delete_task="DELETE FROM tasks WHERE taskno=$taskno";
    $delete=mysqli_query($con,$delete_task);
    header('location: tasks.php');
?>