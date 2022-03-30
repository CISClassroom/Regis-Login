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
        $getusername = $_POST['Username'];
        $link = mysqli_connect("localhost", "root", "", "roitip_db");
        $sql = "SELECT * FROM user Where username='$getusername'";
        $res = mysqli_query($link, $sql);
        echo "<div class='container'>";

    while ($data = mysqli_fetch_array($res)) {
        echo "<div class='logo'><img src='img\Vector.png' width='70px' height='auto'></div>";

        echo "<form class='form-sender' method='post' action='checkans.php?id={$data['id']}'>";
        echo "<div class='Branding'>Roitip | Q&A </div>";
        echo "<div class='Tag'>Question: {$data['question']}</div><br>";
        echo "<input class='button-text' type='text' name='Ans' placeholder='Answer'>";
        echo "<input type='submit' value='Next'>";
        echo "</form>";
    }

    echo "</div>";

    ?>
</body>
</html>