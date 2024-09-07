<?php 
    SESSION_START();
    include 'db.php';
    $result="";
    if(isset($_POST['submit'])){
        
        $login_email=$_POST['email'];
        $login_password=$_POST['password'];
        $check_account_existance="SELECT*FROM users WHERE email='$login_email'";
        $check_existance=mysqli_query($con,$check_account_existance);
        $get_data=mysqli_fetch_assoc($check_existance);
        if($login_email==$get_data['email'] && $login_password==$get_data['password']){
            
            
            $_SESSION['userid']=$get_data['id'];
            $_SESSION['username']=$get_data['username'];
            $_SESSION['email']=$get_data['email'];
            $_SESSION['password']=$get_data['password'];

            header('location: home.php');
        }
        else{
            $result="invalid email or password :(";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOIT | login</title>
    <?php include 'links/links.php' ?>
</head>
<body>
    <div class="body-login">
        <div class="container login-container">
            <fieldset>
                <legend>DOIT | todo list app</legend>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <input name="email" required type="email" placeholder="enter email"><br>
                    <input name="password" required type="password" placeholder="enter password"><br>
                    <input name="submit"  type="submit" value="login">
                    <label><?php echo $result; ?></label>
                </form>
                <a href="register.php"><button class="divert">signup</button></a>
            </fieldset>
        </div>
    </div>
</body>
</html>