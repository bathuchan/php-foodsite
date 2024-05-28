<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "dbusr20360859008";
    $password = "PMkW0c3KZgTh";
    $dbname = "dbstorage20360859008";

    // Veritabanı bağlantısı
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantıyı kontrol et
    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error);
    }

    // Form verilerini al ve boş olup olmadıklarını kontrol et
    $ad = isset($_POST['ad']) ? trim($_POST['ad']) : '';
    $tarif = isset($_POST['tarif']) ? trim($_POST['tarif']) : '';
    $malzemeler = isset($_POST['malzemeler']) ? trim($_POST['malzemeler']) : '';

    if (empty($ad) || empty($tarif) || empty($malzemeler)) {
        echo "Lütfen tüm alanları doldurunuz.";
    } else {
        // SQL enjeksiyonuna karşı verileri koruma
        $ad = $conn->real_escape_string($ad);
        $tarif = $conn->real_escape_string($tarif);
        $malzemeler = $conn->real_escape_string($malzemeler);

        // SQL sorgusu
        $sql = "INSERT INTO yemekler (ad, tarif, malzemeler) VALUES ('$ad', '$tarif', '$malzemeler')";

        if ($conn->query($sql) === TRUE) {
            echo "Yeni yemek başarıyla eklendi.";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "Oturum başlatılmamış.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemek Ekleme</title>

</head>

<body>
    <a href="food.php">Geri dön.</a>

</body>

</html>