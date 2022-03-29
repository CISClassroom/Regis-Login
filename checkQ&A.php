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

     $getEmail = $_POST['Email'];
     $link = mysqli_connect("localhost", "root", "", "roitip_db");
     $sql = "SELECT * FROM user where email='$getEmail'";
     $res = mysqli_query($link, $sql);
     
     if (!$data = mysqli_fetch_array($res)) {
        echo "<a href='login.html'>Login</a>";
     } else {
        echo "<center>";
             echo "<form method='post' action='Getusername.php?id={$data['id']}'>";
                echo "Roitip | Q&A";
                echo "Question: {$data['question']}<br>";
                echo "<input type='text' name='answer' placeholder='Answer' required>";
                echo "<input type='submit' value='Next'>";
             echo "</form>";
        echo "</center>";
     }

    ?>
</body>
</html>