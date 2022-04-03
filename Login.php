<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/modalLogin.css">
</head>
<body>
    <?php
    session_start();
    //define variables
    $UnErr = "";
    $PassErr = "";
    $Un = "";
    $passwordLogin = "";
    
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
            $passwordLogin = test_input($_POST["password"]);
            if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/", $passwordLogin)) {
                $PassErr = "<br>The password does not meet the requirements!";
            }
        }
        
        $link = mysqli_connect("localhost", "root", "", "roitip_db") or die("cannot connect to database.");
        $enpass = md5($passwordLogin);

        $sql = "SELECT * FROM user WHERE password='$enpass' AND username='$Un'";
        $res = mysqli_query($link, $sql);
        if (!$data= mysqli_fetch_array($res)){
            $message = "Password/Username Incorrect.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $_SESSION['id'] = $data['id'];
            //echo "<script type='text/javascript'>alert('Hello {$data['username']}');</script>";
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
    <div class="main-login">
        <div class="logo-login">
            <h2>Roitip</h2>
        </div>
        <div class="home-login">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="signUserPass">
                    <span class="text-sign">Username</span>
                    <a href="forgotpassword/Forgotusername.html" class="link-forgot">Forgot Username?</a>
                </div>
                <br><br><br>
                <input type="text" name="Un" class="box-login" required><br><br>
                <div class="signUserPass">
                    <span class="text-sign">Password</span>
                    <a href="forgotpassword/forgotpassword.html" class="link-forgot">Forgot Password?</a>
                </div>
                <br><br><br>
                <input type="password" name="password" class="box-login"><br><br><br>
                <button type="submit" class="btn-signin" name="submit" value="Login">Sign in</button>
            </form>
            <div class="text-signup">
                <span>Don’t have an account? </span>&nbsp;<button id="modalBtn" class="signupBtn">Sign up</button>
            </div>
        </div>
    </div> 
    
    <div id="regismodal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="closeBtn">&times;</span>
                <h2>Sign up</h2>
            </div>
            <?php
                $username = "";
                $password = "";
                $passmd = "";
                $email = "";
                $question = "";
                $answer = "";
                $nameErr = "";
                $passErr = "";
                $emailErr = "";
                $questionErr = "";
                $answerErr = "";

                // function test_input($data){
                //     $data = trim($data);
                //     $data = stripslashes($data);
                //     $data = htmlspecialchars($data);
                //     return $data;
                // }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["username"])) {
                    $nameErr = "* Username is required";
                } else {
                    $username = test_input($_POST["username"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
                    $nameErr = "* Only letters and white space allowed";
                    }
                }

                if (empty($_POST["password"])) {
                    $passErr = "* Password is required";
                } else {
                    $password = test_input($_POST["password"]);
                    $passmd = md5($password);
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $password)) {
                        $passErr = "* Only letters and white space allowed";
                    }
                }
                    
                if (empty($_POST["email"])) {
                    $emailErr = "* Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "* Invalid email format";
                    }
                }

                if (empty($_POST["question"])) {
                    $questionErr = "* Question is required";
                } else {
                    $question = test_input($_POST["question"]);
                }

                if (empty($_POST["answer"])) {
                    $answerErr = "* Answer is required";
                } else {
                    $answer = test_input($_POST["answer"]);
                }

                $link = mysqli_connect("localhost", "root", "87654321", "roitip_db") or die("Unable to connnect");
                $sql = "INSERT INTO user VALUES (null, '$username', '$passmd', '$email', '$question', '$answer')";
                $result = mysqli_query($link, $sql);

                if(!$result)
                {
                    echo "Failed";//goto failed
                } else{
                    header('Location:login.php');
                }

            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <span>Username</span><br>
                <input type="text" name="username" required>
                <span class="error"><?php echo $nameErr;?></span>
                <br><br>
                <span>Password</span><br>
                <input type="password" name="password" id="" required>
                <span class="error"><?php echo $passErr;?></span>
                <br><br>
                <span>Email</span><br>
                <input type="email" name="email" id="" required>
                <span class="error"><?php echo $emailErr;?></span>
                <br><br>
                <span>Question for recovery</span><br>
                <input type="text" name="question" id="" required>
                <span class="error"><?php echo $questionErr;?></span>
                <br><br>
                <span>Answer for recovery</span><br>
                <input type="text" name="answer" id="" required>
                <span class="error"><?php echo $answerErr;?></span>
                <br><br>
                <input type="submit" name="submit" value="Submit"> 
            </form>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
