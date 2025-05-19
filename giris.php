<?php
$email = trim($_POST['email'] ?? '');
$sifre = trim($_POST['sifre'] ?? '');

echo "E-posta: $email<br>";
echo "Girilen Şifre: $sifre<br>";

if (str_ends_with($email, '@sakarya.edu.tr')) {
    $kullanici_no = substr($email, 0, strpos($email, '@'));
    echo "Beklenen Şifre: $kullanici_no<br>";

    if ($sifre === $kullanici_no) {
        echo "Giriş başarılı, yönlendiriliyor...";
        header("Refresh: 2; url=anasayfa.html");
        exit;
    } else {
        echo "<script>alert('Şifre yanlış!'); window.location.href='giris.html';</script>";
        exit;
    }
} else {
    echo "<script>alert('Lütfen sakarya.edu.tr mail adresi girin.'); window.location.href='giris.html';</script>";
    exit;
}
?>
