<?php
    SESSION_START();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    include 'db.php';
    $userid=$_SESSION['userid'];
    $result="";
    $taskno=$_GET['tasknum'];
    
    $fetch_relative_task=mysqli_query($con,"SELECT task FROM tasks WHERE taskno=$taskno");
    $fetched_task=mysqli_fetch_assoc($fetch_relative_task);
    
    if(isset($_POST['submit'])){
        $task=$_POST["task"];
        
        if(!isset($_POST['status'])){
            $status="incomplete";
        }
        else{
            $status="completed";
        }
        
        
        $update_task="UPDATE tasks SET task='$task' , status='$status' WHERE taskno=$taskno";
        $update=mysqli_query($con,$update_task);
        ?>
        <script>
            alert('Task Updated Successfully :)');
        </script>
        <?php
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOIT | edit</title>
    <?php include 'links/links.php' ?>
</head>
<body>
    <div class="navbar">
        <nav>
            <p>DOIT | <small> todo list app</small></p>
            <a href="tasks.php">
                <button>view tasks</button>
            </a>
        </nav>
    </div>
    <div class="container home-container">
        <div class="left-side">
            <p>Edit Your Task</p>
            <h1><?php echo $_SESSION['username']; ?></h1>
        </div>
        <div class="right-side">
            <form action="" method="post">
                <input name="task" required type="text" placeholder="lets add some tasks..." value="<?php echo $fetched_task['task']; ?>"><br>
                <label>Status : <input name="status" type="checkbox" value="completed" > Completed</label> <br>
                <input name="submit" required type="submit" value="update">
            </form>
        </div>
    </div>
</body>
</html>