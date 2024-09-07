<?php
    $result='';
    if(isset($_POST['submit'])){
        include 'db.php';

        $username=mysqli_real_escape_string($con,$_POST['username']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

        $check_if_existing_account="SELECT * FROM users WHERE email='$email'";
        $check_account=mysqli_query($con,$check_if_existing_account);
        $count=mysqli_num_rows($check_account);

        if($count>0){
            $result='email already exists :(';
        }
        else if($password===$cpassword){

            $insert_user_credentials="INSERT INTO users(username,email,password) VAlUES ('$username','$email','$password')";
            $insert_credentials=mysqli_query($con,$insert_user_credentials);
            $result='registeration successful :)';
        ?>
            <script>
            alert('registeration Successful! redirecting to login page');
            location.replace('login.php');
            </script>
        <?php
        }
        else{
            $result="password doesn/'t match :(";
        }
    
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOIT | registerion</title>
    <?php include 'links/links.php' ?>
</head>
<body>
    <div class="body-login">
        <div class="container login-container">
            <fieldset>
                <legend>DOIT | todo list app</legend>
                <form action="" method="post">
                    <input name="username" required type="text" placeholder="enter username"><br>
                    <input name="email" required type="email" placeholder="enter email"><br>
                    <input name="password" required type="password" placeholder="enter password"><br>
                    <input name="cpassword" required type="password" placeholder="confirm password"><br>
                    <input name="submit" required type="submit" value="register">
                    <label><?php echo $result; ?></label>
                </form>
                <a href="login.php"><button class="divert">login</button></a>
            </fieldset>
        </div>
    </div>
</body>
</html>