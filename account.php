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
        $id_user = $_SESSION['id'];
        $link = mysqli_connect('localhost', 'root', '87654321', 'roitip_db');
// get data to display                    
        $sql = "SELECT * FROM user as u where $id_user=u.id";
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
    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
    </script>
    <div class="main-content">
    <?php foreach($res as $r){ ?>
        <div class="box">
<!--display post from database-->
            <h5>Username: <?php echo $r['username'];?></h5>
            <h5>Email: <?php echo $r['email']; ?></h5>
            <h5>Bio: <br><?php echo $r['bio']; ?></h5>
        </div>
    <?php }?>
    </div>
</body>
</html>