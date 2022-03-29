<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
</head>
<body>
    <?php
        $getAnswer = $_POST['answer'];
        $getID = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "", "roitip_db");
    $sql = "SELECT * FROM user Where id='$getID' And answer='$getAnswer'";
    $res = mysqli_query($link, $sql);

    while ($data = mysqli_fetch_array($res)) {
        echo "<center>";
            echo "Your Username is : {$data['username']} <br>";
            echo "<form><input type='submit' formaction='Login.php' value='Back to Login'></form>";
        echo "</center>";
    }
    ?>
</body>
</html>