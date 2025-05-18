<?php
// Formdan gelen verileri al
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Kullanıcı adı boş mu kontrol et
if (empty($username) || empty($password)) {
    echo "Kullanıcı adı ve şifre boş geçilemez.";
    exit;
}

// Mail formatı kontrolü
if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    echo "Kullanıcı adı geçerli bir mail adresi olmalıdır.";
    exit;
}

// Kullanıcı bilgilerini çözümle (örn: b1812100001@sakarya.edu.tr -> b1812100001)
$domain = "@sakarya.edu.tr";
if (str_ends_with($username, $domain)) {
    $user_no = substr($username, 0, strpos($username, '@'));

    // Şifre kontrolü (şifre = 'b' + kullanıcı numarası)
    if ($password === 'b' . $user_no) {
        echo "<h3>Hoşgeldiniz \"$password\"</h3>";
    } else {
        header("Location: giris-yap.html");
        exit;
    }
} else {
    echo "E-posta adresi sakarya.edu.tr domainine ait olmalıdır.";
}
?>
