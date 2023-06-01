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

// Form verilerini alma ve doğrulama
$tam_ad = $_POST["tam_ad"];
$eposta = $_POST["eposta"];
$cinsiyet = $_POST["cinsiyet"];

// Veritabanına ekleme
$sql = "INSERT INTO ogrenciler (tam_ad, eposta, cinsiyet) VALUES ('$tam_ad', '$eposta', '$cinsiyet')";

if ($conn->query($sql) === TRUE) {
    echo "Kayıt başarıyla eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>