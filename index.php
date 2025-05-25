<?php
// Oturumu başlat
session_start();

// Hata mesajı ve e-posta değişkeni tanımlanıyor
$hata = '';
$email = '';

// Eğer form POST yöntemiyle gönderildiyse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen e-posta ve şifreyi al, boşlukları temizle
    $email = trim($_POST['email'] ?? '');
    $sifre = trim($_POST['sifre'] ?? '');

    // E-posta adresi @sakarya.edu.tr ile bitiyor mu
    if (str_ends_with($email, '@sakarya.edu.tr')) {
        // Kullanıcı numarasını e-posta adresinden al
        $kullanici_no = substr($email, 0, strpos($email, '@'));

        // Şifre kullanıcı numarasına eşit mi
        if ($sifre === $kullanici_no) {
            // Oturuma kullanıcı numarasını kaydet
            $_SESSION['kullanici_no'] = $kullanici_no;

            // Başarılı girişten sonra anasayfa.php'ye yönlendir
            header("Location: anasayfa.php");
            exit;
        } else {
            // Şifre hatalıysa hata mesajı göster
            $hata = 'Şifre yanlış!';
        }
    } else {
        // E-posta geçersizse hata mesajı göster
        $hata = 'Lütfen @sakarya.edu.tr uzantılı bir e-posta adresi girin.';
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <title>Giriş Yap</title>

    <!-- Bootstrap CSS dosyası bağlantısı -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Stil dosyası -->
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
    <!-- Sayfa içeriği -->
    <div class="giris-dis">
      <div class="giris">
        <!-- Başlık -->
        <h1 class="text-center mb-4">Giriş Yap</h1>

        <!-- Eğer hata varsa göster -->
        <?php if (!empty($hata)): ?>
          <div class="alert alert-danger text-center"><?php echo $hata; ?></div>
        <?php endif; ?>

        <!-- Giriş formu -->
        <form action="index.php" method="post">
          <!-- E-posta girişi -->
          <div class="mb-3">
            <label for="email" class="form-label">Kullanıcı Adı:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="Kullanıcı adınızı girin"
              required
            />
          </div>

          <!-- Şifre girişi -->
          <div class="mb-3">
            <label for="sifre" class="form-label">Şifre:</label>
            <input
              type="password"
              id="sifre"
              name="sifre"
              class="form-control"
              placeholder="Şifrenizi girin"
              required
            />
          </div>

          <!-- Giriş butonu -->
          <div class="d-grid">
            <input type="submit" value="Giriş Yap" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JavaScript dosyası bağlantısı -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
