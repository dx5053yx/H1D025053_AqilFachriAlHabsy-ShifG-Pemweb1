<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
    <form method="post">
        <input type="number" name="a" required>
        <select name="op">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="b" required>
        <button name="hitung">Hitung</button>
    </form>
    <?php
        function hitung($a, $b, $op) {
            switch ($op) {
                case '+': return $a + $b;
                case '-': return $a - $b;
                case '*': return $a * $b;
                case '/': return $b == 0 ? 'Tidak bisa dibagi 0' : $a / $b;
            }
        }
        function tampilkanHasil($hasil) {
            if (isset($hasil)) {
                echo "Hasil: $hasil";
            }
        }
        if (isset($_POST['hitung'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            tampilkanHasil(hitung($a, $b, $_POST['op']));
        }
    ?>
</body>
</html>