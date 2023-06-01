<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "kullanici_adi";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Öğrenci listesini sorgula
$sql = "SELECT * FROM ogrenciler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Öğrenci Listesi</h1>";
    echo "<table><tr><th>ID</th><th>Tam Ad</th><th>E-posta</th><th>Cinsiyet</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kimlik"] . "</td><td>" . $row["tam_ad"] . "</td><td>" . $row["eposta"] . "</td><td>" . $row["cinsiyet"] . "</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "Öğrenci bulunamadı.";
}

$conn->close();
?>
