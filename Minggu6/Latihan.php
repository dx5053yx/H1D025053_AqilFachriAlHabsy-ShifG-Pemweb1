<!DOCTYPE html>
<html lang="en">
<head>
    <title>latihan</title>
</head>
<body>
    <?php
        $data = array(
            array("Aqil Fachri Al Habsy", "Bekasi", 20),
            array("zaki", "Jakarta", 21),
            array("Fahmi", "Bandung", 22)
        );

        foreach ($data as $mahasiswa) {
            echo "<br><br>Nama: " . $mahasiswa[0] . "<br> Asal: " . $mahasiswa[1] . "<br> Umur: " . $mahasiswa[2] . "<br>";

        }
    ?>
</body>
</html>