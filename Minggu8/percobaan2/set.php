<?php
session_start();
$_SESSION['username'] = 'john_doe';
header('Location: index.php');
?>