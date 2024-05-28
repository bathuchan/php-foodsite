<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    </style>

</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color:white; background-color: #8CD74D">Yeşili'M</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Yemek Ara</a></li>
                <li><a href="food.php">Ekle/Sil/Düzenle</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
            session_start();
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
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label for="search">Yemek Ara:</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Yemek adı veya malzemeler(çoklu aramada , ile ayırınız)...">
            </div>
            <button type="submit" style="width:100%" class="btn btn-primary">Ara</button>
        </form>
        <br>

        <?php
        // Oturumu başlat
        

        // Oturum başlatılmış mı kontrol et
        if (isset($_SESSION['loggedin'])) { //ÜNLEMİ KALDIRACAKSIN LOGİNİ YAPTIKTAN SONRA BATUU!!!!!!
            // Veritabanına bağlan
            $servername = "localhost";
            $username = "dbusr20360859008";
            $password = "PMkW0c3KZgTh";
            $dbname = "dbstorage20360859008";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Veritabanı bağlantısını kontrol et
            if ($conn->connect_error) {
                die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
            }

            // Yemek verilerini veritabanından al
            $sql = "SELECT * FROM yemekler";

            // Eğer arama kutusu doldurulmuşsa, arama sorgusunu güncelle
            if (isset($_POST['search']) && !empty(trim($_POST['search']))) {
                $search = trim($_POST['search']);
                $searchTerms = explode(',', $search);
                $conditions = array();

                foreach ($searchTerms as $term) {
                    $term = trim($term);
                    $conditions[] = "(ad LIKE '%$term%' OR malzemeler LIKE '%$term%')";
                }

                $sql .= " WHERE " . implode(' AND ', $conditions);
            }

            $result = $conn->query($sql);

            // Eğer yemek verisi varsa, tabloyu oluştur ve verileri yazdır
            if ($result->num_rows > 0) {
                echo "<table class='table table-striped'><tr><th>Yemek Adı</th><th>Tarif</th><th>Malzemeler</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $ad = $row["ad"];
                    $tarif = $row["tarif"];
                    $malzemeler = $row["malzemeler"];

                    // Aranan kelimeleri vurgula, eğer arama yapılmışsa
                    if (isset($search) && !empty($search)) {
                        foreach ($searchTerms as $term) {
                            $term = trim($term);
                            $ad = preg_replace('/(' . preg_quote($term, '/') . ')/i', '<span style="background-color: #ffcccc;">\1</span>', $ad);
                            $tarif = preg_replace('/(' . preg_quote($term, '/') . ')/i', '<span style="background-color: #ffcccc;">\1</span>', $tarif);
                            $malzemeler = preg_replace('/(' . preg_quote($term, '/') . ')/i', '<span style="background-color: #ffcccc;">\1</span>', $malzemeler);
                        }
                    }

                    echo "<tr><td>" . $ad . "</td><td>" . $tarif . "</td><td>" . $malzemeler . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "Yemek verisi bulunamadı.";
            }

            // Veritabanı bağlantısını kapat
            $conn->close();
        } else {
            echo "Oturum başlatılmamış.";
        }
        ?>
    </div>




</body>

</html>