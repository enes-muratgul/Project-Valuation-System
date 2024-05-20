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
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="css/anasayfa.css">
</head>
<body>
    <header class="top-bar">
        <?php
            if(isset($_SESSION['user_name'])) {
                echo  $_SESSION['user_name'] ; 
                echo '<a href="?action=cikis" style="color: white; border-radius: 5px;text-decoration: none; padding: 5px 10px;border: 2px solid white; margin-left: 20px;">Çıkış</a>';
            }
            
            if(isset($_GET['action']) && $_GET['action'] == 'cikis') {
                session_unset();
                session_destroy();
                header("Location: giris.php");
                exit();
            }
        ?>
    </header><br>
    <main class="container">
        <h1>Bitirme Projesi Değerlendirme Sistemi</h1><br>
        <div class="button-group">
            <a href="akademisyenler.php"><button>Akademisyenler</button></a>
            <a href="ogrenciler.php"><button>Öğrenciler</button></a>
            <a href="gliste.php"><button>Proje Değerlendirmesi</button></a>
        </div>
        <br>
        <div class="button-group">
            <a href="bitirmeprojeleri.php"><button>Bitirme Projesi Oluştur</button></a>
            <a href="eklesil.php"><button>Öğrenci Ekle / Sil</button></a>
        </div>
        <br>
        <div class="button-group">
            <a href="projedegerlendir.php"><button>Proje Değerlendir</button></a>    
        </div>
        <img src="fotolar/logo2.jpg" alt="logo" width="1000" height="250">
    </main>
</body>
</html>