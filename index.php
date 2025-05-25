<?php
session_start();

$hata = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $sifre = trim($_POST['sifre'] ?? '');

    if (str_ends_with($email, '@sakarya.edu.tr')) {
        $kullanici_no = substr($email, 0, strpos($email, '@'));

        if ($sifre === $kullanici_no) {
            $_SESSION['kullanici_no'] = $kullanici_no;
            header("Location: anasayfa.php");
            exit;
        } else {
            $hata = 'Şifre yanlış!';
        }
    } else {
        $hata = 'Lütfen @sakarya.edu.tr uzantılı bir e-posta adresi girin.';
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <title>Giriş Yap</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="giris-dis">
      <div class="giris">
        <h1 class="text-center mb-4">Giriş Yap</h1>

        <?php if (!empty($hata)): ?>
          <div class="alert alert-danger text-center"><?php echo $hata; ?></div>
        <?php endif; ?>

        <form action="index.php" method="post">
          <div class="mb-3">
            <label for="email" class="form-label">Kullanıcı Adı:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="Kullanıcı adınızı girin"
              required
              value="<?php echo htmlspecialchars($email); ?>"
            />
          </div>

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

          <div class="d-grid">
            <input type="submit" value="Giriş Yap" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
