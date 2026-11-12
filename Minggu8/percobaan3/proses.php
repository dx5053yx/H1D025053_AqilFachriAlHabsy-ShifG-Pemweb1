<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
$_SESSION['nama'] = trim($_POST['nama'] ?? '');
$_SESSION['umur'] = (int) ($_POST['umur'] ?? 0);
$_SESSION['email'] = trim($_POST['email'] ?? '');
header('Location: home.php');
exit;
?>
