<?php
    SESSION_START();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    include 'db.php';
    $userid=$_SESSION['userid'];
    $result="";

    if(isset($_POST['submit'])){
        $task=$_POST["task"];
        $insert_task="INSERT INTO tasks (task,status,userid) VALUES ('$task','incomplete',$userid)";
        $insert=mysqli_query($con,$insert_task);
        ?>
        <script>
            alert('Task added Successfully :)');
        </script>
        <?php
    }
?>

<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOIT | home</title>
    <?php include 'links/links.php' ?>
</head>
<body>
    <div class="navbar">
        <nav>
            <p>DOIT | <small> todo list app</small></p>
            <a href="logout.php">
                <button>logout</button>
            </a>
        </nav>
    </div>
    <div class="container home-container">
        <div class="left-side">
            <p>Welcome</p>
            <h1><?php echo $_SESSION['username']; ?></h1>
            <a href="tasks.php"><button>view tasks</button></a>
        </div>
        <div class="right-side">
            <form action="" method="POST">
                <input name="task" required type="text" placeholder="lets add some tasks..." value="">
                <input name="submit" type="submit" value="add new">
            </form>
        </div>
    </div>
</body>
</html>