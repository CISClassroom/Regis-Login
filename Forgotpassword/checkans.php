<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php

     $getAns = $_POST['Ans'];
     $getID = $_GET['id'];
     $link = mysqli_connect("localhost", "root", "", "roitip_db");
     $sql = "SELECT * FROM user where id='$getID' and answer='$getAns'";
     $res = mysqli_query($link, $sql);
     
     if (!$data = mysqli_fetch_array($res)) {
            echo "<center>LOGO</center><br>Roitip | Forgot password<br><br>";
            echo "<center><font color='red'>Username Not found</font></center>";
            echo "<center><font color='white'>Please fill out the correction information.</font></center>";
        echo "<form><input type='submit' formaction='forgotpassword.html' value='Tryagain'>";
     } else {
         echo "<form method='post' action='passwordupdate.php?id={$data['id']}'>";
            echo "New Password:<input type='Password' name='Password' placeholder='New password'>";
            echo "<input type='submit' value'Change password'>";
         echo "</form>";
     }

    ?>
</body>
</html>