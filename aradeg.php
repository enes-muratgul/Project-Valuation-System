<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: giris.php");
    exit(); 
}
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "internetp";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

$conn = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bitirmeProjeID = $_POST['bitirmeproje'] ?? '';
    $projeAdi = $_POST['projeAdi'] ?? '';
    $projeSuresi = $_POST['proje_suresi'] ?? '';
    $projeYili = $_POST['proje_yili'] ?? '';
    $projeDanismaniID = $_POST['danisman'] ?? '';
    $sql_danisman = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$projeDanismaniID'";
    $result_danisman = $conn->query($sql_danisman);
    if ($result_danisman->num_rows > 0) {    
        $row_danisman = $result_danisman->fetch_assoc();
        $projeDanismani = $row_danisman["ad_soyad"];
    } else {
        $projeDanismani = "Bilinmeyen Danışman";   
    }

    $ogrenciNo = $_POST['ogrenci_id'] ?? '';
    $sql_ogrenci = "SELECT ogrenci_no FROM ogrenciler WHERE ogrenci_id = '$ogrenciNo'";

    $result_ogrenci = $conn->query($sql_ogrenci);
    if ($result_ogrenci->num_rows > 0) {
        $row_ogrenci = $result_ogrenci->fetch_assoc();
        $ogrenciNo = $row_ogrenci["ogrenci_no"];
    } else {
        $ogrenciNo = "Bilinmeyen";

    }
    
    $check_query = "SELECT * FROM gliste WHERE Proje_ID = '$bitirmeProjeID'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "Böyle bir Proje_ID zaten var!";
        exit();
    }
    $sql = "INSERT INTO gliste (Proje_ID, ogrenci_no, proje_adi, proje_danismani, Proje_Süresi_YarıYıl, Proje_Kaçıncı_YarıYıl) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Hata: SQL hazırlanamadı.";
        exit();
    }
    $stmt->bind_param("ssssss", $bitirmeProjeID, $ogrenciNo, $projeAdi, $projeDanismani, $projeSuresi, $projeYili);
    if ($stmt->execute() === TRUE) {
        
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
$bitirmeProjeID = $_POST['bitirmeproje'];
$projeAdi = $_POST['projeAdi'];
$projeDanismani = $_POST['danisman'];
$juri1 = $_POST['juri_1'];
$juri2 = $_POST['juri_2'];
$juri3 = $_POST['juri_3'];
$juri4 = $_POST['juri_4'];
$projeSuresi = $_POST['proje_suresi'];
$projeYili = $_POST['proje_yili'];
$ogrenciID = $_POST['ogrenci_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internetp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$sql_danisman = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$projeDanismani'";
$result_danisman = $conn->query($sql_danisman);
if ($result_danisman->num_rows > 0) {    
    $row_danisman = $result_danisman->fetch_assoc();
    $projeDanismani = $row_danisman["ad_soyad"];
} else {
    $projeDanismani = "Bilinmeyen Danışman";   
}

$sql_juri1 = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$juri1'";
$result_juri1 = $conn->query($sql_juri1);
if ($result_juri1->num_rows > 0) {
    $row_juri1 = $result_juri1->fetch_assoc();
    $juri1AdSoyad = $row_juri1["ad_soyad"];
} else {
    $juri1AdSoyad = "Bilinmeyen Jüri Üyesi";
}

$sql_juri2 = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$juri2'";
$result_juri2 = $conn->query($sql_juri2);
if ($result_juri2->num_rows > 0) {    
    $row_juri2 = $result_juri2->fetch_assoc();
    $juri2AdSoyad = $row_juri2["ad_soyad"];    
} else {          
    $juri2AdSoyad = "Bilinmeyen Jüri Üyesi";
}
$sql_juri3 = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$juri3'";
$result_juri3 = $conn->query($sql_juri3);
if ($result_juri3->num_rows > 0) {
    $row_juri3 = $result_juri3->fetch_assoc();
    $juri3AdSoyad = $row_juri3["ad_soyad"];
} else {
    $juri3AdSoyad = "Bilinmeyen Jüri Üyesi";
}
$sql_juri4 = "SELECT ad_soyad FROM akademisyenler WHERE akademik_id = '$juri4'";
$result_juri4 = $conn->query($sql_juri4);
if ($result_juri4->num_rows > 0) {
    $row_juri4 = $result_juri4->fetch_assoc();
    $juri4AdSoyad = $row_juri4["ad_soyad"];
} else {
    $juri4AdSoyad = "Bilinmeyen Jüri Üyesi";
}
$sql_ogrenci = "SELECT ogrenci_no, ogrenci_ad_soyad FROM ogrenciler WHERE ogrenci_id = '$ogrenciID'";
$result_ogrenci = $conn->query($sql_ogrenci);
if ($result_ogrenci->num_rows > 0) {
    $row_ogrenci = $result_ogrenci->fetch_assoc();
    $ogrenciNo = $row_ogrenci["ogrenci_no"];
    $ogrenciAdSoyad = $row_ogrenci["ogrenci_ad_soyad"];
} else {
    $ogrenciNo = "Bilinmeyen";
    $ogrenciAdSoyad = "Bilinmeyen";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ara Sınav Değerlendirme Formu</title>
    <link rel="stylesheet" href="css/aradege.css">
 
</head>
<body>
    <header>
        <div class="top-bar">
            Ara Değerlendirme Formu
            <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
        </div>
    </header>
    <div class="main-block">
        <form method="POST">
            <fieldset>
                <legend>
                    <h3>Genel Bilgi</h3>
                </legend>
                <div class="account-details">
                    <div>
                        <label for="bitirmeproje">Bitirme Proje ID:</label>
                        <input type="text" id="bitirmeproje" name="bitirmeproje" required value="<?php echo isset($_POST['bitirmeproje']) ? $_POST['bitirmeproje'] : ''; ?>"><br><br>
                    </div>
                    <div>
                        <label for="projeAdi">Proje Adı:</label>
                        <input type="text" id="projeAdi" name="projeAdi" required value="<?php echo isset($_POST['projeAdi']) ? $_POST['projeAdi'] : ''; ?>">
                    </div>
                    <div>
                        <label for="projedanisman">Proje Danışmanı:</label>
                        <input type="text" id="adsoyad" name="adsoyad" readonly value="<?php echo $projeDanismani; ?>">
                    </div>
                    <div>
                        <label for="ogrenci_id">Öğrenci ID:</label>
                        <input type="text" id="ogrenci_id" name="ogrenci_id" readonly value="<?php echo isset($_POST['ogrenci_id']) ? $_POST['ogrenci_id'] : ''; ?>">
                    </div>
                    <div>
                        <label for="1_juri">1. Jüri Üyesi:</label>
                        <input type="text" id="adsoyad" name="adsoyad" readonly value="<?php echo $juri1AdSoyad; ?>">
                    </div>
                    <div>
                        <label for="ogrenci_no">Öğrenci No:</label>
                        <input type="text" id="ogrenci_no" name="ogrenci_no" value="<?php echo $ogrenciNo; ?>">
                    </div>
                    <div>
                        <label for="2_juri">2. Jüri Üyesi:</label>
                        <input type="text" id="adsoyad" name="adsoyad" value="<?php echo $juri2AdSoyad; ?>">
                    </div>
                    <div>
                        <label for="adsoyad">Adı Soyadı:</label>
                        <input type="text" id="adsoyad" name="adsoyad" value="<?php echo $ogrenciAdSoyad; ?>">
                    </div>
                    <div>
                        <label for="3_juri">3. Jüri Üyesi:</label>
                        <input type="text" id="adsoyad" name="adsoyad" value="<?php echo $juri3AdSoyad; ?>">
                    </div>
                    <div>
                        <label for="projesure">Proje Süresi (Yarıyıl):</label>
                        <input type="text" id="projesure" name="projesure" value="<?php echo isset($_POST['proje_suresi']) ? $_POST['proje_suresi'] : ''; ?>">
                    </div>
                    <div>
                        <label for="4_juri">4. Jüri Üyesi:</label>
                        <input type="text" id="adsoyad" name="adsoyad" value="<?php echo $juri4AdSoyad; ?>">
                    </div>
                    <div>
                        <label for="projekacinci">Proje Kaçıncı (Yarıyıl):</label>
                        <input type="text" id="projekacinci" name="projekacinci" value="<?php echo isset($_POST['proje_yili']) ? $_POST['proje_yili'] : ''; ?>">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>
                    <h3>Bilgilendirme</h3>
                </legend>   
                <p>Ara Değerlendirme İçin Üç Kritere Dayalı Puanlama Yapabılacaktır.<br><br></p>
                <p>1.Genel Görünüm, Tavır ve Sunuş: Değerlendirilen kişinin sunum tarzı, kendine güveni, iletişim becerileri ve genel görünümü bu kriter altında değerlendirilir.</p><br>   
                <p>2.Konuya Yaklaşımı ve Yaptığı Çalışmalar: Değerlendirilen kişinin konuya olan ilgisi, derinliği ve bilgi düzeyi bu kriter altında değerlendirilir.<br><br></p>
                <p>3.Gelecek Çalışma Planı ve Hazırlık Düzeyi: Değerlendirilen kişinin gelecek çalışmaları için belirlediği planın tutarlılığı, hedeflerine ulaşma potansiyeli ve hazırlık düzeyi bu kriter altında değerlendirilir. <br></p> 
            </fieldset>
        </form>
    </form>
</div>
    <button onclick="confirmAction()">Onayla</button> 
</body>
</html>
<script src="css/a.js"></script>