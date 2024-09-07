<?php 

    SESSION_START();
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    include 'db.php';
    $userid=$_SESSION['userid'];
    $retrieve_user_tasks="SELECT * FROM tasks WHERE userid=$userid ORDER BY taskno DESC";
    $retrieve_tasks=mysqli_query($con,$retrieve_user_tasks);
    $count_tasks=mysqli_num_rows($retrieve_tasks);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOIT | tasks</title>
    <?php include 'links/links.php' ?>
</head>
<body>
    <div class="navbar">
        <nav>
            <p>DOIT | <small>todo list app</small></p>
            <a href="home.php">
                <button>Add Task</button>
            </a>
        </nav>
    </div>
    <div class="container task-container">
        <div class="heading">
            <h3>Total Tasks : <?php echo $count_tasks; ?></small> </h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th  colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $task_number=1;
                    while($fetch_tasks=mysqli_fetch_assoc($retrieve_tasks)){

                        if($fetch_tasks['status']!="completed"){
                            $fetch_tasks['status']="incomplete";
                        }
                ?>
                    <tr>
                        <td class="id" ><?php echo $task_number; ?></td>
                        <td class="task" ><?php echo $fetch_tasks['task']; ?></td>
                        <td class="time" ><?php echo $fetch_tasks['time']; ?></td>
                        <td class="date" ><?php echo $fetch_tasks['date']; ?></td>
                        <td class="status"><?php echo $fetch_tasks['status']; ?></td>
                        <td class="edit"  ><a href="edit.php?tasknum=<?php echo $fetch_tasks['taskno']; ?>"><img style="height:20;" src="images/edit.png" alt="edit"></a></td>
                        <td class="delete" ><a href="delete.php?tasknum=<?php echo $fetch_tasks['taskno']; ?>"><img style="height:20;" src="images/delete.png" alt="delete"></a></td>
                    </tr>
                <?php
                        $task_number++;
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>