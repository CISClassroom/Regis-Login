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
     $link = mysqli_connect("localhost", "root", "", "roitip_db");
     $sql = "SELECT * FROM user where email='$getEmail'";
     $res = mysqli_query($link, $sql);
     
     echo "<div class='container'>";

     if (!$data = mysqli_fetch_array($res)) {
        echo "<a href='login.html'>Login</a>";
     } else {
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