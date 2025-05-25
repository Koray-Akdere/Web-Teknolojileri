<?php
session_start();

if (!isset($_SESSION['kullanici_no'])) {
    header("Location: index.php");
    exit;
}

$kullanici_no = $_SESSION['kullanici_no'];
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <title>Ana Sayfa</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Kişisel Web Sitem</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#menu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="anasayfa.html">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hakkimda.html">Hakkımda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ozgecmis.html">Özgeçmiş</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="şehrim sayfası/sehrim.html">Şehrim</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mirasimiz.html">Mirasımız</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="takimimiz.html">Takımımız</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ilgi-alanlarim.html">İlgi Alanlarım</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="iletisim.html">İletişim</a>
            </li>         
          </ul>
        </div>
      </div>
    </nav>

    <div class="container content mt-5 text-center">
      <h1>Hoş Geldiniz, <?php echo htmlspecialchars($kullanici_no); ?>!</h1>
      <p class="aciklama fs-5">
        Kişisel web sitemde benim ve şehrim hakkında bilgiler yer almaktadır.
      </p>
      <h6 class="not">Bana ulaşmak için iletişim sayfasını ziyaret edin.</h6>
      <a href="iletisim.html" class="btn btn-primary mt-3 btn-lg">İletişim</a>
    </div>

    <footer class="bg-dark text-white text-center mt-5 p-3">
      © 2025 Koray Akdere - Ana Sayfa
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

