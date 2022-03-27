<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            $_SESSION['username'] = $data['username'];
            header('Location:Forgot.php');
            echo "<script type='text/javascript'>alert('Hello {$data['username']}');</script>";
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    ?>
    <center><h2>LOGO</h2></center>
    <center>Roitip Login</center>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"><center>
        Username &nbsp;&nbsp;<a href="##">Forgot Username?</a> <br><input placeholder="Username" type="text" name="Un" value="<?php echo $UnErr;?>" required>
        <span>* <?php echo "$UnErr";?></span>
        <br><br>
        Password &nbsp;&nbsp;<a href="##">Forgot Username?</a> <br><input placeholder="Please write letter, number and symbol." type="password" name="password" value="<?php echo $PassErr;?>" required>
        <span>* <?php echo "$PassErr";?></span>
        <br><br>
        <input type="submit" name="submit" value="Login">

       <br> Don't have an account? <a href="##">Sign up</a>

        </center></form>
</body>
</html>