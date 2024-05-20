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
    $projeID = $_POST["Proje_ID"];
    $ortKriterNotu = $_POST["ortKriler"];

    $sql = "UPDATE gliste SET ara_notu=$ortKriterNotu WHERE Proje_ID=$projeID";

    if ($conn->query($sql) === TRUE) {
        header("Location: gliste.php");
        exit(); 
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ara Değerlendirme Formu</title>
    <link rel="stylesheet" href="css/aradegerlendirme.css">
</head>
<body>
<div class="top-bar">
     Ara Değerlendirme Formu
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
</div>
<div class="main-block">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <fieldset>
       <legend><h3>Genel Bilgi</h3></legend> 
       <div class="account-details">
       <div>
                <label>PROJE ID SEÇ:</label> 
                <select id="Proje_ID" name="Proje_ID">
                    <option value="">Seçiniz</option>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "internetp";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM gliste";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Proje_ID"] . "'>" . " - " .$row["Proje_ID"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Veri bulunamadı</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
       </div>
       <legend><h3>Jüri Bilgileri</h3></legend>
       <div class="personal-details">
       <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <p id="kacinci_juri">1. Jüri</p>
            <div class="account-details">
                <div>
                    <label for="">1.Değerlendirmesi</label>
                    <input type="text" id="1_1Deger" name="1_1Deger">
                    <input type="text" id="2_1Deger" name="2_1Deger">
                    <input type="text" id="3_1Deger" name="3_1Deger">
                    <input type="text" id="4_1Deger" name="4_1Deger">
                </div>
                <div>
                    <label for="">Juri Ortalaması:</label>
                    <input type="text" id="JuriDeger1" name="JuriDeger1" oninput="calculateAverage()">
                    <input type="text" id="JuriDeger2" name="JuriDeger2" oninput="calculateAverage()">
                    <input type="text" id="JuriDeger3" name="JuriDeger3" oninput="calculateAverage()">
                    <input type="text" id="JuriDeger4" name="JuriDeger4" oninput="calculateAverage()"> 
                </div> 
                <div>
                    <label for="">2.Değerlendirmesi</label>
                    <input type="text" id="1_2Deger" name="1_2Deger">
                    <input type="text" id="2_2Deger" name="2_2Deger">
                    <input type="text" id="3_2Deger" name="3_2Deger">
                    <input type="text" id="4_2Deger" name="4_2Deger">
                </div> 
                <div>
                    <label for="">1-2-3-4 Juri Ortalaması:</label>
                    <input type="text" id="juriler_ortalamasi" name="juriler_ortalamasi" readonly>
                </div> 
                <div>
                    <label for="">3.Değerlendirmesi</label>
                    <input type="text" id="1_3Deger" name="1_3Deger">
                    <input type="text" id="2_3Deger" name="2_3Deger">
                    <input type="text" id="3_3Deger" name="3_3Deger">
                    <input type="text" id="4_3Deger" name="4_3Deger">
                </div> 
                <div>
                    <label for="">Ort Kriter Puanı</label>
                    <input type="text" id="ortKriler" name="ortKriler" oninput="calculateAverage1()">
                </div> 
            </div>
       </div>
        <fieldset>
    <input type="button" id="left-button" value="<" class="guncelleButton">
    <input type="button" id="right-button" value=">" class="guncelleButton">
    <span class="boşluklu-span"></span>
    <input type="submit" value="ONAYLA" class="guncelleButton" onclick="confirmAction()">
    
    <div>
    </form>
</body>
</html>
<script src="css/aradeg.js"></script>
