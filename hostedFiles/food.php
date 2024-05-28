<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Yönetimi</title>
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
    <script>
        function toggleDiv(divId) {
            var div = document.getElementById(divId);
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }

        function disableButton(divId) {
            var div = document.getElementById(divId);
            div.disabled = !div.disabled;
        }
    </script>

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


        echo '
<div class="container-fluid" style="display: flex;align-items: baseline;position: sticky;top: 7%">
    <button type="button" class="btn btn-success" id="addbutton" style="width: 33%;" onclick="toggleDiv(\'fooddiv\');disableButton(\'removebutton\');disableButton(\'editbutton\')">Yemek Ekle</button>
    <button type="button" class="btn btn-danger" id="removebutton" style="width: 33%;" onclick="toggleDiv(\'deletediv\');disableButton(\'addbutton\');disableButton(\'editbutton\')">Yemek Sil</button>
    <button type="button" class="btn btn-primary" id="editbutton" style="width: 33%;" onclick="toggleDiv(\'editdiv\');disableButton(\'addbutton\');disableButton(\'removebutton\')">Yemek Düzenle</button>
</div>
<div class="container-fluid" id="fooddiv" style="display:none;">
    <form action="foodadd.php" method="post">
        <br>
        <div class="form-group">
            <label for="ad">Yemek Adı</label>
            <input type="text" class="form-control" id="ad" name="ad" required>
        </div>
        <div class="form-group">
            <label for="tarif">Tarif</label>
            <textarea class="form-control" id="tarif" name="tarif" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="malzemeler">Malzemeler</label>
            <textarea class="form-control" id="malzemeler" name="malzemeler" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Yemeği Ekle</button>
        <br><br>
    </form>
</div>
<div class="container-fluid" id="deletediv" style="display:none;">
    <form method="post">
        <div id="searchResults">
            <!-- Search results will be displayed here -->
        </div>
    </form>
    <br>
    <form action="fooddelete.php" method="post">
';

        $servername = "localhost";
        $username = "dbusr20360859008";
        $password = "PMkW0c3KZgTh";
        $dbname = "dbstorage20360859008";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM yemekler";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'><tr><th>Seç</th><th>Yemek Adı</th><th>Tarif</th><th>Malzemeler</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $ad = $row["ad"];
                $tarif = $row["tarif"];
                $malzemeler = $row["malzemeler"];
                $id = $row["id"];

                echo "<tr><td><input type='checkbox' name='delete[]' value='$id'></td><td>$ad</td><td>$tarif</td><td>$malzemeler</td></tr>";
            }
            echo "</table>";
            echo "<button type='submit' class='btn btn-danger'>Seçilenleri Sil</button><br><br>";
        } else {
            echo "Yemek verisi bulunamadı.";
        }

        $conn->close();

        echo '
    </form>
</div>
<div class="container-fluid" id="editdiv" style="display:none;">
    <form id="editForm">
        <div class="form-group">
            <label for="edit_food">Yemek Seç:</label>
            <select class="form-control" id="edit_food" name="edit_food">
                <!-- Yemek seçenekleri buraya yüklenecek -->
            </select>
        </div>
        <div class="form-group">
            <label for="edit_ad">Yemek Adı:</label>
            <input type="text" class="form-control" id="edit_ad" name="edit_ad" required>
        </div>
        <div class="form-group">
            <label for="edit_tarif">Tarif:</label>
            <textarea class="form-control" id="edit_tarif" name="edit_tarif" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="edit_malzemeler">Malzemeler:</label>
            <textarea class="form-control" id="edit_malzemeler" name="edit_malzemeler" rows="5" required></textarea>
        </div>
        <button type="button" class="btn btn-primary" id="updateButton">Güncelle</button>
        <br><br>
    </form>
</div>
';


        // Veritabanı bağlantısını kapat

    } else {
        echo "Oturum başlatılmamış.";
    }
    ?>
    </div>

    <script>
        $(document).ready(function() {
            // AJAX isteği göndererek tüm yemekleri al
            $.ajax({
                url: 'get_all_food.php', // Tüm yemekleri alacak olan PHP dosyasının yolu
                method: 'GET',

                success: function(response) {
                    // Gelen verileri seçim listesine ekle
                    var data = JSON.parse(response);
                    var selectOptions = '';
                    for (var i = 0; i < data.length; i++) {
                        selectOptions += '<option value="' + data[i].id + '">' + data[i].ad + '</option>';
                    }
                    $('#edit_food').html(selectOptions);

                    // İlk yemeği otomatik olarak seç ve bilgilerini getir
                    if (data.length > 0) {
                        var firstFoodId = data[0].id;
                        getFoodDetails(firstFoodId);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Hatası:', status, error);
                }
            });

            // Yemek seçildiğinde detaylarını getir ve text inputlarına doldur
            $('#edit_food').change(function() {
                var selectedId = $(this).val();
                getFoodDetails(selectedId);
            });

            function getFoodDetails(foodId) {
                // AJAX isteği göndererek yemeğin detaylarını al
                $.ajax({
                    url: 'get_food_details.php', // Yemeğin detaylarını alacak olan PHP dosyasının yolu
                    method: 'POST',
                    data: {
                        id: foodId // Seçilen yemeğin ID'sini gönder
                    },
                    success: function(response) {
                        // Gelen verileri düzenleme formuna yerleştir
                        var data = JSON.parse(response);
                        $('#edit_ad').val(data.ad);
                        $('#edit_tarif').val(data.tarif);
                        $('#edit_malzemeler').val(data.malzemeler);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Hatası:', status, error);
                    }
                });
            }

            $('#updateButton').click(function() {
                var formData = $('#editForm').serialize(); // Form verilerini al
                // AJAX isteği göndererek yemeği güncelle
                $.ajax({
                    url: 'update_food.php', // Yemeği güncelleyecek olan PHP dosyasının yolu
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        // Başarılı bir şekilde güncellendiğinde kullanıcıya bilgi ver
                        alert('Yemek başarıyla güncellendi.');
                        // Div'i gizlemek yerine sadece popup göster
                        // $('#editdiv').hide();
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Hatası:', status, error);
                    }
                });
            });
        });
    </script>

</body>

</html>