<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password_Update</title>
</head>
<body>
    <?php
    $getID = $_GET['id'];
    $getPassword = $_POST['Password'];
    $NewPassword = md5($getPassword);
    $link = mysqli_connect("localhost", "root", "", "roitip_db");

     $sql = "UPDATE user SET password='$NewPassword' where id='$getID'";
     if ($res = mysqli_query($link, $sql)){
        echo "Password Changed";
        echo "<form><input type='submit' formaction='forgotpassword.html' value='Login'></form>";
     }
?>
</body>
</html>