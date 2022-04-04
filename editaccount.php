<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'roitip_db');
        // get parameters from update
    $id_user = $_SESSION['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
        // write sql to update profile user
    $sql = "UPDATE user SET username='$username', email='$email', bio='$bio' WHERE id='$id_user'";

    if(isset($_REQUEST['change_data'])){
        mysqli_query($link, $sql);
        header('Location:account.php');
    } else {
        exit();
    }
?>