<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="styleforgot\forgot.css">
    </head>
<body>
    <?php

     $getAns = $_POST['Ans'];
     $getID = $_GET['id'];
     $link = mysqli_connect("localhost", "root", "87654321", "roitip_db");
     $sql = "SELECT * FROM user where id='$getID' and answer='$getAns'";
     $res = mysqli_query($link, $sql);
     echo "<div class='container'>";

     if (!$data = mysqli_fetch_array($res)) {
        echo "<div class='form-sender'>";
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";

        echo "<div class='Branding'>Roitip | Forgot password </div> <br><br>";
        echo "<font color='red' size='5'>Answer incorrect.</font> <br><br>";
        echo "<font color='white' size='5'>Please fill out the correct Answer.</font> <br><br>";

        echo "<form action='forgotpassword.html'><input type='submit' value='Try again'></form>";
     } else {
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";
        echo "<form class='form-sender' method='post' action='passwordupdate.php?id={$data['id']}'>";
        echo "<div class='Branding'>Roitip | Q&A </div>";
        echo "<div class='Tag'>New Password</div>";
        echo "<input type='password' name='Password' placeholder='New password'><br>";
        echo "<input type='submit' value'Change password'>";
        echo "</form>";
     }

     echo "</div>";

    ?>
</body>
</html>