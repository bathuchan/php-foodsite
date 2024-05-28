<?php
session_start();

if(isset($_POST['delete']) && !empty($_POST['delete'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_proje";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Veritabanına bağlanırken hata oluştu: " . $conn->connect_error);
    }

    $delete_ids = $_POST['delete'];
    $delete_ids_str = implode(',', $delete_ids);

    $sql = "DELETE FROM yemekler WHERE id IN ($delete_ids_str)";

    if ($conn->query($sql) === TRUE) {
        echo "Seçilen yemek(ler) başarıyla silindi.";
    } else {
        echo "Yemek(ler) silinirken hata oluştu: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Silinecek yemek(ler) seçilmedi.";
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