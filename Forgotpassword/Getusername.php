<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
    <link rel="stylesheet" href="styleforgot\forgot.css">
</head>
<body>
    <?php
        $getAnswer = $_POST['answer'];
        $getID = $_GET['id'];
        $link = mysqli_connect("localhost", "root", "87654321", "roitip_db");
        $sql = "SELECT * FROM user Where id='$getID' And answer='$getAnswer'";
        $res = mysqli_query($link, $sql);

        echo "<div class='container'>";

    if ($data = mysqli_fetch_array($res)) {
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";
        echo "<form class='form-sender'>";
        echo "<div class='Branding'>Roitip | Q&A </div>";

        echo "Your Username is : {$data['username']} <br><br>";
        echo "<input type='submit' formaction='../Login.php' value='Back to Login'>";
        echo "</form>";
    } else {
        echo "<div class='form-sender'>";
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";

        echo "<div class='Branding'>Roitip | Forgot password </div> <br><br>";
        echo "<font color='red' size='5'>Answer incorrect.</font> <br><br>";
        echo "<font color='white' size='5'>Please fill out the correct Answer.</font> <br><br>";
        echo "<form action='Forgotusername.html'><input type='submit' value='Try again'></form>";

    }

    
    echo "</div>";
    ?>
</body>
</html>