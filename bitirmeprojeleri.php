<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: giris.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>  
    <title>Bitirme Projesi Formu</title>
    <link rel="stylesheet" href="css/bitirmeprojeleri.css">
</head>
<body>
<div class="top-bar">
    Bitirme Proje Formu
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
</div>
<div class="main-block">
<form method="POST" onsubmit="return false;">
   <fieldset>
       <legend><h3>Genel Bilgi</h3></legend> 
       <div class="account-details">
           <div>
               <label for="bitirmeproje">Bitirme Proje ID:</label>
               <input type="text" id="bitirmeproje" name="bitirmeproje" required><br><br>
           </div>
           <div>
               <label for="projeAdi">Proje Adi:</label>
               <input type="text" id="projeAdi" name="projeAdi" required>
           </div>
           <div>
               <label>Proje Danişmani:</label> 
               <select id="danisman" name="danisman">
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

                   $sql = "SELECT * FROM akademisyenler";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                           echo "<option value='" . $row["akademik_id"] . "'>" . $row["ad_soyad"] . "</option>";
                       }
                   } else {
                       echo "<option value=''>Veri bulunamadı</option>";
                   }
                   
                   $conn->close();
                   ?>
               </select>
           </div>
           <div>
               <label >Proje Süresi/Kaçıncı Yarıyılı:</label>
               <input for="proje_suresi"type="text" id="proje_suresi" name="proje_suresi" required placeholder="Proje Süresi (Yarıyıl)"> 
               <input for="proje_yili" type="text" id="proje_yili" name="proje_yili" required placeholder="Proje Kaçıncı (Yarıyıl)">
           </div>
       </div>
   </fieldset>
   <fieldset>
       <legend><h3>Jüri Bilgileri</h3></legend>
       <div class="personal-details">
           <div>
               <div><label>1. Jüri Üyesi:</label> 
               <select id="juri_1" name="juri_1">
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

                   $sql = "SELECT * FROM akademisyenler";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                          echo "<option value='" . $row["akademik_id"] . "'>" . $row["ad_soyad"] . "</option>";
                       }
                   } else {
                       echo "<option value=''>Veri bulunamadı</option>";
                   }

                   $conn->close();
                   ?>
               </select>
           </div>
           <div>
               <label>2. Jüri Üyesi:</label> 
               <select id="juri_2" name="juri_2">
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

                   $sql = "SELECT * FROM akademisyenler";
                   $result = $conn->query($sql);

                   if ($result->num_rows > 0) {
                       while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["akademik_id"] . "'>" . $row["ad_soyad"] . "</option>";
                       }
                   } else {
                       echo "<option value=''>Veri bulunamadı</option>";
                   }

                   $conn->close();
                   ?>
               </select>
            </div>
                </div>
                <div>
                    <div>
                    <label>3. Jüri Üyesi:</label> 
                    <select id="juri_3" name="juri_3">
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

                    $sql = "SELECT * FROM akademisyenler";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["akademik_id"] . "'>" . $row["ad_soyad"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Veri bulunamadı</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div>
            <label>4. Jüri Üyesi:</label> 
            <select id="juri_4" name="juri_4">
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
            
            
            $sql = "SELECT * FROM akademisyenler";
            $result = $conn->query($sql);
            
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["akademik_id"] . "'>" . $row["ad_soyad"] . "</option>";
                }
            } else {
                echo "<option value=''>Veri bulunamadı</option>";
            }
            
            
            $conn->close();
            ?>
        </select>
    </div>
    <div>
<div class="children"></div>
</fieldset><fieldset>
    <legend><h3>Öğrenci Listesi</h3></legend>
    <table>
          <tr>
              <th>Öğrenci Seç</th>
              <th>Eğitim Öğretim Dönemi</th>
              <th>Öğrenci ID</th>
              <th>Öğrenci No</th>
              <th>Öğrenci Adı Soyadı</th>
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
                            echo "<td><input type='radio' name='ogrenci_id' value='" . $row["ogrenci_id"] . "' required></td>";
                            echo "<td>" . $row["egitim_ogretim_donemi"] . "</td>";
                            echo "<td>" . $row["ogrenci_id"] . "</td>";
                            echo "<td>" . $row["ogrenci_no"] . "</td>";
                            echo "<td>" . $row["ogrenci_ad_soyad"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Veri bulunamadı</td></tr>";
                    }
                    ?>
                 
                </table>
                <button onclick="submitForm('aradeg.php')">Ara Değerlendirme Formu Oluştur</button>
                <button onclick="submitForm('finaldeg.php')">Final Değerlendirme Formu Oluştur</button>
                </fieldset>
                </form>
                </div>
    
</body>
</html>
<script src="css/a.js"></script>

