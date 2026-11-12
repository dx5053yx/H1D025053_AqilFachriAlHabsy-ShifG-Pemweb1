<?php
session_start();
if (isset($_SESSION['username'])) { header('Location: index.php'); exit; }
$akun = ['admin' => '12345'];
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (isset($akun[$username]) && hash_equals($akun[$username], $password)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    }
    $pesan = 'Username atau password salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Login Tugas</title></head>
<body>
    <h1>Login</h1>
    <p><?= htmlspecialchars($pesan) ?></p>
    <form method="post">
        Username: <input name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <button>Login</button>
    </form>
</body>
</html>
