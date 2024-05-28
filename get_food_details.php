<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_proje";

// POST isteği ile gönderilen yemeğin ID'sini alın
$id = $_POST['id'];

// Veritabanı bağlantısını oluşturun
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol edin
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// Yemek verisini almak için sorgu
$sql = "SELECT * FROM yemekler WHERE id = $id";

// Sorguyu çalıştırın
$result = $conn->query($sql);

// Sorgu sonucunu kontrol edin
if ($result->num_rows > 0) {
    // Yemek bulundu, verileri döndürün
    $row = $result->fetch_assoc();
    echo json_encode($row); // Yemek verilerini JSON formatında döndürün
} else {
    // Yemek bulunamadı
    echo "Yemek bulunamadı.";
}

// Veritabanı bağlantısını kapatın
$conn->close();
?>
