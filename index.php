<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}else{
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff;
        }

        .navbar {
            background-color: #ADE57F;
            border-style: hidden;
            position: sticky;
            top: 0%
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #fff;
            position: sticky;
            top: 0%
        }

        .navbar-inverse .navbar-nav>.active>a,
        .navbar-inverse .navbar-nav>.active>a:focus,
        .navbar-inverse .navbar-nav>.active>a:hover {
            background-color: #a6fc5d;
            color: #fff;
            position: sticky;
            top: 0%
        }

        .navbar-inverse .navbar-nav>li>a:hover {
            background-color: #a6fc5d;
            color: #fff;
            position: sticky;
            top: 0%
        }

        .dropdown-menu>li>a {
            color: #8CD74D;
            position: sticky;
            top: 0%
        }

        .dropdown-menu>li>a:hover {
            background-color: #dff0d8;
            color: #333;
            position: sticky;
            top: 0%
        }

        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            /* Butonları dikey olarak hizalar */
            gap: 20px;
            /* Butonlar arasında boşluk bırakır */
        }

        .btn {
            width: 200px;
            height: 10%;

        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:white; background-color: #8CD74D">Yeşili'M</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="admin.php">Yemek Ara</a></li>
                <li class="active"><a href="food.php">Ekle/Sil/Düzenle</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
            
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> ' . $_SESSION['username'] . '</a></li>';
                    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
                
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Hoşgeldiniz, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Buraya erişimin olmaması lazım aferim sana.</p>
    </div>
</body>
</html>
