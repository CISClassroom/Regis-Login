<?php
    session_start();
    $link = mysqli_connect('localhost', 'root', '87654321', 'roitip_db') or die ('Ewwwwwwwww.');
    $id_user = $_SESSION['id'];
    $id_post = $_GET['id_post'];
    //get parameters
    $title = $_POST['title'];
    $content = $_POST['content'];

    if(isset($_REQUEST['change'])){
        $sql = "UPDATE post SET title='$title', content='$content' WHERE id_user='$id_user' AND id_post='$id_post'";
        mysqli_query($link, $sql);
        header('Location:myposts.php');
    }
?>