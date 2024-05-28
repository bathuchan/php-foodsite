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

// Tüm yemekleri seç
$sql = "SELECT id, ad FROM yemekler";
$result = $conn->query($sql);

// Yemeklerin listesini oluştur
$foods = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Her bir yemeği listeye ekle
        $foods[] = array(
            'id' => $row['id'],
            'ad' => $row['ad']
        );
    }
}

// Sonuçları JSON formatında döndür
echo json_encode($foods);

// Veritabanı bağlantısını kapat
$conn->close();
?>
