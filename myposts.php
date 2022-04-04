<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roitip</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        $link = mysqli_connect('localhost', 'root', '87654321', 'roitip_db');
        // get data to display                    
        $id_user = $_SESSION['id'];
        $sql = "SELECT * FROM post as p, user as u where id_user='$id_user' and u.id = '$id_user'";
        $res = mysqli_query($link, $sql);
    ?>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <div class="logo-name">Roitip</div>
            </div>
            <i class="material-icons" id="btn">menu</i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="index.php">
                    <i class="material-icons">home</i>
                    <span class="link-name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="account.php">
                    <i class="material-icons">account_circle</i>
                    <span class="link-name">Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li>
                <a href="myposts.php">
                    <i class="material-icons">article</i>
                    <span class="link-name">My Posts</span>
                </a>
                <span class="tooltip">My Posts</span>
            </li>
            <li>
                <a href="logout.php">
                    <i class="material-icons" id="log_out">logout</i>
                    <span class="link-name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <?php foreach($res as $r){ ?>
            <div class="box">
                <!--display post from database-->
                <h4><?php echo $r['username'];?></h4>
                <h5><?php echo $r['title']; ?></h5>
                <br>
                <p><?php echo $r['content'];?></p>
                <br>
                <div class="edit-del">
                    <button id="btn-editpost<?php echo $r['id_post'] ?>" class="edit"><i class="material-icons">edit</i></button>
                    <button id="btn-deletepost<?php echo $r['id_post'] ?>" class="delete-post"><i class="material-icons">delete</i></button>
                </div>
            </div>
        <?php }?>
    </div>

    <?php foreach($res as $r){ ?>
    <div id="editpostmodal<?php echo $r['id_post'] ?>" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span id="closeBtnpost<?php echo $r['id_post'] ?>" class="closeBtn">&times;</span>
                <h2>Edit Post</h2>
            </div><br>
            <div class="modal-body">
                
                <form action="editpost.php?id_post=<?php echo $r['id_post'];?>" method="post">
                    <input type="text" name="title" class="textbox-addpost" placeholder="title" value="<?php echo $r['title']; ?>"><br>
                    <textarea class="textarea-addpost" name="content" rows="15" placeholder="content"><?php echo $r['content'];?></textarea><br>
                    <button type="submit" name="change" class="button-addpost">Change</button>
                </form>
                
            </div>
        </div>
    </div>
    <?php }?>

    <?php foreach($res as $r){ ?>
    <script>
        var modalEditpost<?php echo $r['id_post'] ?> = document.querySelector('#editpostmodal<?php echo $r['id_post'] ?>')
        var modalBtnpost<?php echo $r['id_post'] ?> = document.querySelector('#btn-editpost<?php echo $r['id_post'] ?>')
        var closeBtnpost<?php echo $r['id_post'] ?> = document.querySelector('#closeBtnpost<?php echo $r['id_post'] ?>')

        modalBtnpost<?php echo $r['id_post'] ?>.addEventListener('click', openmodal<?php echo $r['id_post'] ?>)
        closeBtnpost<?php echo $r['id_post'] ?>.addEventListener('click', closemodal<?php echo $r['id_post'] ?>)
        window.addEventListener('click', clickOutside<?php echo $r['id_post'] ?>)

        function openmodal<?php echo $r['id_post'] ?>(){
            modalEditpost<?php echo $r['id_post'] ?>.style.display = 'block'
        }

        function closemodal<?php echo $r['id_post'] ?>(){
            modalEditpost<?php echo $r['id_post'] ?>.style.display = 'none'
        }

        function clickOutside<?php echo $r['id_post'] ?>(e){
            if(e.target == modalEditpost<?php echo $r['id_post'] ?>){
                modalEditpost<?php echo $r['id_post'] ?>.style.display = 'none'
            }
        }
    </script>
    <?php }?>

    <?php foreach($res as $r){ ?>
    <div id="delpostmodal<?php echo $r['id_post'] ?>" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span id="" class="closeBtndel<?php echo $r['id_post'] ?> closeBtn">&times;</span>
                <h2>Delete Post</h2>
            </div><br>
            <div class="modal-body">
                <h3>Do you want to delete the post?</h3><br>
                <div class="delpost-icon">
                    <form action="deletepost.php" method="post">
                        <input type="hidden" name="id_post" value="<?php echo $r['id_post'];?>">
                        <button class="del-icon" name="delete" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <?php foreach($res as $r){ ?>
    <script>
        var modalEditdel<?php echo $r['id_post'] ?> = document.querySelector('#delpostmodal<?php echo $r['id_post'] ?>')
        var modalBtndel<?php echo $r['id_post'] ?> = document.querySelector('#btn-deletepost<?php echo $r['id_post'] ?>')
        var closeBtndel<?php echo $r['id_post'] ?> = document.querySelector('.closeBtndel<?php echo $r['id_post'] ?>')

        modalBtndel<?php echo $r['id_post'] ?>.addEventListener('click', openmodal<?php echo $r['id_post'] ?>)
        closeBtndel<?php echo $r['id_post'] ?>.addEventListener('click', closemodal<?php echo $r['id_post'] ?>)
        window.addEventListener('click', clickOutside<?php echo $r['id_post'] ?>)

        function openmodal<?php echo $r['id_post'] ?>(){
            modalEditdel<?php echo $r['id_post'] ?>.style.display = 'block'
        }

        function closemodal<?php echo $r['id_post'] ?>(){
            modalEditdel<?php echo $r['id_post'] ?>.style.display = 'none'
        }

        function clickOutside<?php echo $r['id_post'] ?>(e){
            if(e.target == modalEditdel<?php echo $r['id_post'] ?>){
                modalEditdel<?php echo $r['id_post'] ?>.style.display = 'none'
            }
        }
    </script>
    <?php }?>

    <script src="js/index.js"></script>
</body>
</html>