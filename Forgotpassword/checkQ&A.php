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
     $getEmail = $_POST['Email'];
     $link = mysqli_connect("localhost", "root", "87654321", "roitip_db");
     $sql = "SELECT * FROM user where email='$getEmail'";
     $res = mysqli_query($link, $sql);
     
     echo "<div class='container'>";

     if (!$data = mysqli_fetch_array($res)) {
        echo "<div class='form-sender'>";
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";

        echo "<div class='Branding'>Roitip | Forgot password </div> <br><br>";
        echo "<font color='red' size='5'>Email Not found</font> <br><br>";
        echo "<font color='white' size='5'>Please fill out the correct information.</font> <br><br>";

        echo "<form action='Forgotusername.html'><input type='submit' value='Try again'></form>";



    echo "</div>";
     } else {
        echo "<div class='back--icon'><a href='Forgotusername.html'><img src='img/Polygon 1.png' width='30px' height='auto'></a></div>";

      echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";

         echo "<div class='form-sender'>";
             echo "<form method='post' action='Getusername.php?id={$data['id']}'>";
                echo "<div class='Branding'>Roitip | Q&A </div>";
                echo "<div class='Tag'>Question: {$data['question']}</div><br>";
                echo "<input class='button--next' type='text' name='answer' placeholder='Answer' required>";
                echo "<input type='submit' value='Next'>";
             echo "</form>";
         echo "</div>";
     }

     echo "</div>";
    ?>
</body>
</html>