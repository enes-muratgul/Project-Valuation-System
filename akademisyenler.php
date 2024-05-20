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

$sql = "SELECT * FROM akademisyenler";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akademisyenler</title>
    <link rel="stylesheet" href="css/akademisyenler.css">
</head>
<body>
<div class="top-bar">   
    Akademisyenler
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a> 
</div>

<div class="container">  <br><br><br>
    <table>
        <tr>
            <th>Akademik ID</th>
            <th>Ünvan</th>
            <th>Ad Soyad</th>
            <th>Bölüm</th>
            <th>Telefon Numarası</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["akademik_id"] . "</td>";
                echo "<td>" . $row["unvan"] . "</td>";
                echo "<td>" . $row["ad_soyad"] . "</td>";
                echo "<td>" . $row["bolum"] . "</td>";
                echo "<td>" . $row["tel_numara"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Veri bulunamadı</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
