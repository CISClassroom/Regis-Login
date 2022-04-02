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
                <a href="favorite.php">
                    <i class="material-icons">favorite</i>
                    <span class="link-name">Favorite</span>
                </a>
                <span class="tooltip">Favorite</span>
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
        <div class="box">
            <h2>Title</h2><br>
            <p>content</p><br>
            <a href="#" class="comment"><i class="material-icons">forum</i> Comment</a>
        </div>
        <div class="box">
            <h2>Title</h2><br>
            <p>content</p><br>
            <a href="#" class="comment"><i class="material-icons">forum</i> Comment</a>
        </div>
        <div class="box">
            <h2>Title</h2><br>
            <p>content</p><br>
            <a href="#" class="comment"><i class="material-icons">forum</i> Comment</a>
        </div>
    </div>
</body>
</html>