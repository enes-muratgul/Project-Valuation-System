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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ogrenci_id = $_POST['ogrenci_id'];
    $ogrenci_no = $_POST['ogrenci_no'];
    $ad_soyad = $_POST['ad_soyad'];
    $egitim_donemi = $_POST['egitim_donemi'];
    $sql = "INSERT INTO ogrenciler (ogrenci_id, ogrenci_no, ogrenci_ad_soyad, egitim_ogretim_donemi) VALUES ('$ogrenci_id', '$ogrenci_no', '$ad_soyad', '$egitim_donemi')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Öğrenci Ekle/Sil Formu</title>
    <link rel="stylesheet" href="css/eklesil.css">
</head>
<body>
<div class="top-bar">
    Öğrenci Ekle / Sil Formu
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
</div>
<div class="main-block">
<form action="eklesil.php" method="POST">
    <fieldset>
        <legend>
            <h3>Öğrenci Ekle</h3>
        </legend>
        <div class="account-details">
            <form action="ogrenciekle.php" method="post">
                <div>
                    <label for="ogrenci_id">Öğrenci ID:</label>
                    <input type="text" id="ogrenci_id" name="ogrenci_id" required><br><br>
                </div>
                <div>
                    <label for="ogrenci_no">Öğrenci No:</label>
                    <input type="text" id="ogrenci_no" name="ogrenci_no" required>
                </div>
                <div>
                    <label for="ad_soyad">Adı Soyadı:</label>
                    <input type="text" id="ad_soyad" name="ad_soyad" required>
                </div>
                <div>
                    <label for="egitim_donemi">Eğitim Dönemi:</label>
                    <input type="text" id="egitim_donemi" name="egitim_donemi" required>
                </div> 
                <button type="submit" value="submit">Ekle</button>
        </fieldset>

        <fieldset>
            <legend><h3>Öğrenci Sil</h3></legend>
            <table>
                <tr>
                    <th>Eğitim Öğretim Dönemi</th>
                    <th>Öğrenci ID</th>
                    <th>Öğrenci No</th>
                    <th>Öğrenci Adı Soyadı</th>
                    <th>Öğrenci Sil</th>
                </tr>
                
                <?php
                   
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "internetp";
 
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
               
                $sql = "SELECT * FROM ogrenciler";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";                   
                        echo "<td>" . $row["egitim_ogretim_donemi"] . "</td>";
                        echo "<td>" . $row["ogrenci_id"] . "</td>";
                        echo "<td>" . $row["ogrenci_no"] . "</td>";
                        echo "<td>" . $row["ogrenci_ad_soyad"] . "</td>";
                        echo "<td><div class='sil-div'><a href='ogrenci_sil.php?ogrenci_id=" . $row["ogrenci_id"] . "' onclick='return onayla()'>Sil</a></div></td>";
                        echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Veri bulunamadı</td></tr>";
                    }
                    ?>
                 
                </table>
            </fieldset>
        </form>
    </div>
</body>
</html>

<script>
    function onayla(ogrenci_id) {
        return confirm("Silmek istediğinize emin misiniz?");
    }
</script>