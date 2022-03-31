<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    session_start();
    //define variables
    $UnErr = "";
    $PassErr = "";
    $Un = "";
    $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //check Username
        if (empty($_POST["Un"])){
            $UnErr = "Username is required";
        } else {
            $Un = test_input($_POST["Un"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $Un)) {
                $nameErr = "Only letters and white space allowed.";
            }
        }
            //check password
        if (empty($_POST["password"])){
            $PassErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $password)) {
                $PassErr = "<br>The password does not meet the requirements!";
            }
        }
        
        $link = mysqli_connect("localhost", "root", "", "roitip_db") or die("cannot connect to database.");
        $enpass = md5($password);

        $sql = "SELECT * FROM user WHERE password='$enpass' AND username='$Un'";
        $res = mysqli_query($link, $sql);
        if (!$data= mysqli_fetch_array($res)){
            $message = "Password/Username Incorrect.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            echo "<script type='text/javascript'>alert('Hello {$data['username']}');</script>";
            header('Location:index.php');
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>
     
     <div class="logo-login">
        <h2>Roitip</h2>
    </div>
    <div class="home-login">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="signUserPass">
                <span class="text-sign">Username</span>
                <a href="Forgotpassword/Forgotusername.html" class="link-forgot">Forgot Username?</a>
            </div>
            <br><br><br>
            <input type="text" name="Un" class="box-login" required><br><br>
            <div class="signUserPass">
                <span class="text-sign">Password</span>
                <a href="Forgotpassword/forgotpassword.html" class="link-forgot">Forgot Password?</a>
            </div>
            <br><br><br>
            <input type="password" name="password" class="box-login"><br><br><br>
            <button type="submit" class="btn-signin" name="submit" value="Login">Sign in</button>
        </form>
        <br><br><br><br><br>
        <div class="text-signup">
            <span>Don’t have an account? </span><a href="Regis.php" class="link-signup">Sign Up</a>
        </div>
    </div>
</body>
</html>
