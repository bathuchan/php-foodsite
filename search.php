<?php
// Veritabanına bağlantı işlemleri

if(isset($_POST['search']) && !empty(trim($_POST['search']))) {
    $search = trim($_POST['search']);
    $searchTerms = explode(',', $search);
    $conditions = array();

    foreach($searchTerms as $term) {
        $term = trim($term);
        $conditions[] = "(ad LIKE '%$term%' OR malzemeler LIKE '%$term%')";
    }

    $sql = "SELECT * FROM yemekler WHERE " . implode(' AND ', $conditions);
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'><tr><th>Seç</th><th>Yemek Adı</th><th>Tarif</th><th>Malzemeler</th></tr>";
        while($row = $result->fetch_assoc()) {
            $ad = $row["ad"];
            $tarif = $row["tarif"];
            $malzemeler = $row["malzemeler"];
            $id = $row["id"];

            echo "<tr><td><input type='checkbox' name='delete[]' value='$id'></td><td>$ad</td><td>$tarif</td><td>$malzemeler</td></tr>";
        }
        echo "</table>";
        echo "<button type='submit' class='btn btn-danger'>Seçilenleri Sil</button>";
    } else {
        echo "Hiç sonuç bulunamadı.";
    }
} else {
    echo "Arama terimi girilmedi.";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>