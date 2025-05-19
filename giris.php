<?php
// Form verilerini al
$email = $_POST['email'] ?? '';
$sifre = $_POST['sifre'] ?? '';

// Email kontrolü
if (str_ends_with($email, '@sakarya.edu.tr')) {
    // Kullanıcı numarası: @ işaretinden önceki kısım
    $kullanici_no = substr($email, 0, strpos($email, '@'));

    // Şifre kontrolü: şifre, kullanıcı no ile birebir aynı olmalı
    if ($sifre === $kullanici_no) {
        // Başarılı giriş
        header("Location: anasayfa.html");
        exit;
    } else {
        // Hatalı şifre
        echo "<script>alert('Şifre yanlış!'); window.location.href='giris.html';</script>";
        exit;
    }
} else {
    // Geçersiz mail uzantısı
    echo "<script>alert('Lütfen sakarya.edu.tr mail adresi girin.'); window.location.href='giris.html';</script>";
    exit;
}
?>
