<?php session_start();

    $link = mysqli_connect('localhost', 'root', '87654321', 'roitip_db');
    
    if (isset($_REQUEST['add_post'])){
        $id_user = $_SESSION['id']; 
        $title = $_POST['title'];
        $content = $_POST['content'];
        /* <-- check by echo --> */
        //echo "tilte: " . $title . "<br> content: " . $content;
        

        $sql = "INSERT INTO post(id_user, title, content) VALUES('$id_user', '$title', '$content')";
        mysqli_query($link, $sql);
        header('Location: index.php');
    } else {
            header('Location:index.php');
        }

?>
