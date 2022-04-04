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
    <!--use php call database-->
    <?php
        session_start();
        if(isset($_SESSION['id'])){

        } else {
            echo '<script type="text/javascript">';
            echo "alert('Please go to Login!');";
            echo "document.location = 'login.php'";
            echo '</script>';
            // header('Location:Login.php');
        }
            
        $link = mysqli_connect('localhost', 'root', '87654321', 'roitip_db');
        // get data to display                    
        $sql = "SELECT * FROM post as p, user as u where p.id_user=u.id order by p.id_post desc";
        $res = mysqli_query($link, $sql);
        //$id_user = $_GET['id'];

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
                 <a href="myposts.php?id=<?php echo $_SESSION['id'];?>">
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
            </div>
        <?php }?>
        
    </div>
    
    <button id="btn-addpost" class="addpost">
        <i class="material-icons">post_add</i>
    </button>
    
    <div id="addpostmodal" class="modal-addpost">
        <div class="modal-content">
            <div class="modal-header">
                <span class="closeBtn">&times;</span>
                <h2>Add Post</h2>
            </div><br>
            <div class="modal-body">
                <form action="uploadpost.php" method="post">
                    <input type="text" name="title" class="textbox-addpost" placeholder="title"><br>
                    <textarea class="textarea-addpost" name="content" rows="15" placeholder="content"></textarea><br>
                    <button type="submit" name="add_post" class="button-addpost">Add</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>

</body>
</html>
