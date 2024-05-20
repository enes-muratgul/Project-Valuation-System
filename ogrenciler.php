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

$sql = "SELECT * FROM ogrenciler";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Öğrenciler</title>
    <link rel="stylesheet" href="css/ogrenciler.css">
</head>
<body>
<header>
    <div class="top-bar">
        Öğrenciler
        <div class="en-ust-sag"> 
            <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
        </div>
    </div>
    <br><br><br>
</header>
<main>
    <div class="container">
        <section>
            <table>
                <thead>
                <tr>
                    <th>Eğitim Öğretim Dönemi</th>
                    <th>Öğrenci ID</th>
                    <th>Öğrenci No</th>
                    <th>Öğrenci Adı Soyadı</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["egitim_ogretim_donemi"] . "</td>";
                        echo "<td>" . $row["ogrenci_id"] . "</td>";
                        echo "<td>" . $row["ogrenci_no"] . "</td>";
                        echo "<td>" . $row["ogrenci_ad_soyad"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Veri bulunamadı</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </section>
    </div>
</main>
</body>
</html>
