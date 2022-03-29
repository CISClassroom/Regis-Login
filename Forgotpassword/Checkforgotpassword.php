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
        $getusername = $_POST['Username'];
        $link = mysqli_connect("localhost", "root", "", "roitip_db");
    $sql = "SELECT * FROM user Where username='$getusername'";
    $res = mysqli_query($link, $sql);

    while ($data = mysqli_fetch_array($res)) {

        echo "<form method='post' action='checkans.php?id={$data['id']}'>";
        echo $data['question'] . "<input type='text' name='Ans' placeholder='Answer'>";
        echo "<input type='submit' value='Next'>";
        echo "</form>";
    }
    ?>
</body>
</html>