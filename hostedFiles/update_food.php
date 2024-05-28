<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "dbusr20360859008";
$password = "PMkW0c3KZgTh";
$dbname = "dbstorage20360859008";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
}

// POST verilerini al
$id = $_POST['edit_food'];
$ad = $_POST['edit_ad'];
$tarif = $_POST['edit_tarif'];
$malzemeler = $_POST['edit_malzemeler'];

// Güncelleme sorgusu
$sql = "UPDATE yemekler SET ad = ?, tarif = ?, malzemeler = ? WHERE id = ?";

// Hazırlanan sorguyu çalıştır
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $ad, $tarif, $malzemeler, $id);

if ($stmt->execute()) {
    echo "Yemek başarıyla güncellendi.";
} else {
    echo "Yemek güncellenirken hata oluştu: " . $conn->error;
}

// Sorgu ve bağlantıyı kapat
$stmt->close();
$conn->close();
?>
