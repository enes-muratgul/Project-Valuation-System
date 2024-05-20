<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: giris.php");
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proje Değerlendir</title>
    <link rel="stylesheet" href="css/asd.css">
</head>
<body>
<div class="top-bar">
     Proje Değerlendirme Formu
    <a href="anasayfa.php" class="ana-sayfa-buton">Ana Sayfa</a>
</div>
<div class="main-block">
    <fieldset>    
        <legend><h3>Hatırlatma</h3></legend> 
        <p>Ara Değerlendirme ve Final Değerlendirme İçin Üç Kritere Dayalı Puanlama Yapabılacaktır.<br><br></p>
        <p>1.Genel Görünüm, Tavır ve Sunuş: Değerlendirilen kişinin sunum tarzı, kendine güveni, iletişim becerileri ve genel görünümü bu kriter altında değerlendirilir.</p><br>   
        <p>2.Konuya Yaklaşımı ve Yaptığı Çalışmalar: Değerlendirilen kişinin konuya olan ilgisi, derinliği ve bilgi düzeyi bu kriter altında değerlendirilir.<br><br></p>
        <p>3.Gelecek Çalışma Planı ve Hazırlık Düzeyi: Değerlendirilen kişinin gelecek çalışmaları için belirlediği planın tutarlılığı, hedeflerine ulaşma potansiyeli ve hazırlık düzeyi bu kriter altında değerlendirilir.</p>
    </fieldset>
    </div>
    <div class="account-details">
    <fieldset>
    <legend><h3>Değerlendir</h3></legend>           
   <a href="aradegerlendirme.php"><button>Ara Değerlendirme Formu</button></a>
   <a href="finaldegerlendirme.php"><button>Final Değerlendirme Formu</button></a>
   </div>
    </fieldset>
</body>
</html>







  
       
      

       


