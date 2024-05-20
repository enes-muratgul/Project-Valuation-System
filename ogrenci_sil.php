<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: giris.php");
    exit(); 
}
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "internetp"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if(isset($_GET['ogrenci_id'])) {
    $ogrenci_id = $_GET['ogrenci_id'];
} else {
    echo "Öğrenci ID belirtilmemiş.";
    exit;
}

$ogrenci_id = mysqli_real_escape_string($conn, $ogrenci_id);
$sql = "DELETE FROM ogrenciler WHERE ogrenci_id='$ogrenci_id'";

if ($conn->query($sql) === TRUE) {
    echo "Öğrenci başarıyla silindi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: eklesil.php");
exit;
