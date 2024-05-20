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

$sql = "SELECT * FROM gliste";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genel Liste</title>
    <link rel="stylesheet" href="css/gliste.css">
</head>
<body>
<div class="top-bar">
    Genel Liste
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a> 
</div>
<div class="container"><br><br><br>
   <table>
   <tr>
       <th>Proje ID</th>
       <th>Öğrenci No</th>
       <th>Proje Adı</th>
       <th>Proje Danışmanı</th>
       <th>Ara Notu</th>
       <th>Final Notu</th>
       <th>Proje Süresi Yarı Yıl</th>
       <th>Proje Kaçıncı Yarı Yıl</th>
   </tr>
   
   <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Proje_ID"] . "</td>";
                echo "<td>" . $row["ogrenci_no"] . "</td>";
                echo "<td>" . $row["proje_adi"] . "</td>";
                echo "<td>" . $row["proje_danismani"] . "</td>";
                echo "<td>" . $row["ara_notu"] . "</td>";
                echo "<td>" . $row["final_notu"] . "</td>";
                echo "<td>" . $row["Proje_Süresi_YarıYıl"] . "</td>";
                echo "<td>" . $row["Proje_Kaçıncı_YarıYıl"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Veri bulunamadı</td></tr>";
        }
    ?>
    </table>
</body>
</html>
