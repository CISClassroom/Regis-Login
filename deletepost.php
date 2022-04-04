<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '', 'roitip_db') or die ('Ewwwwwwwww.');
    $id_user = $_SESSION['id'];
    $id_post = $_POST['id_post'];

    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM post WHERE id_post='$id_post' AND id_user='$id_user'";
        mysqli_query($link, $sql);
        header('Location:myposts.php');
    }
?>