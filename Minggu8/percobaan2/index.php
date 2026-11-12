<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Percobaan 2</title>
</head>
<body>
    <?php
    echo isset($_SESSION['username'])
        ? "Username session: " . htmlspecialchars($_SESSION['username']) . "<br><br>"
        : "Session belum diatur.<br><br>";
    ?>
    <a href="set.php"><button>Set Session</button></a>
    <a href="destroy.php"><button>Destroy Session</button></a>
</body>
</html>
