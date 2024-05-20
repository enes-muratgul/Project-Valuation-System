<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "internetp"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if (isset($_POST["login"])) {
    $loginEmail = $_POST["email"];
    $loginPassword = $_POST["password"];
    $query = "SELECT * FROM kullanicilar WHERE Email = ? AND Sifre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $loginEmail, $loginPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["ID"];
        $_SESSION["user_name"] = $row["Email"];
        header("Location: anasayfa.php");
        exit(); 
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Giriş Başarısız. Email veya şifre hatalı.
        </div>';
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/giris.css">
  <title>Giris Yap</title>
  <div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="giris.php" method="POST" class="sign-in-form">
                <h2 class="title">Giriş Yap</h2>
                <?php
                if (isset($_GET['error'])) {
                    echo '<script>alert("Geçersiz kullanıcı adı veya şifre!");</script>';
                }
                ?>
                <div class="input-field">
                    <label for="username"></label>
                    <input type="text" id="username" name="email" placeholder="Mail" required>
                </div>
                <div class="input-field">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" placeholder="Şifre" required>
                </div>
                <input class="btn solid" id="sign-up-btn" type="submit" name="login" value="Giriş">
                <div class="social-media">
                    <img src="fotolar/baskentuni.jpg" height="200" width="500">
                </div>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bitirme Projesi Değerlendirme Sistemi</h3>
                    Bitirme projesi değerlendirme sürecinde, akademisyenler öğrencilerin çalışmalarını inceleyerek akademik performanslarını değerlendirir ve uygun notları verirler. Bu süreç, öğrencilerin mezuniyet öncesi akademik başarılarını belirlemede kritik bir rol oynar.
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>