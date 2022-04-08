<?php 
    include "../logic.php";
?>

<?php
    //start comment section

    //get parameter id_post, id_user to sql command

    $sql = "SELECT * FROM comment WHERE id_post='15' AND id_user='4'";
    $query = mysqli_query($link, $sql);
    foreach ($query as $r){
        echo $r['comment'];
    }

    
?>