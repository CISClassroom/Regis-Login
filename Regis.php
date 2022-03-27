<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
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

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

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
            $re = "Success";//Goto Header
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
</body>
</html>