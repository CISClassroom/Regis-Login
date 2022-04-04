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

    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
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
    $sql = "INSERT INTO user VALUES (null, '$username', '$passmd', '$email', '$question', '$answer', '')";
    $result = mysqli_query($link, $sql);

    if(!$result)
    {
        echo '<script type="text/javascript">';
        echo "alert('Sign up Error!, Please check your data');";
        echo "document.location = 'Login.php'";
        echo '</script>';
    } else{
        echo '<script type="text/javascript">';
        echo "alert('Sign up Complete!');";
        echo "document.location = 'Login.php'";
        echo '</script>';
    }
}
?>