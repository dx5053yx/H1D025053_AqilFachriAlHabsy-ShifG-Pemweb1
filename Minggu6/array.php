<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Percobaan 2 - Array</title>
</head>
<body>
    <?php
        $color = array("Merah", "Biru", "Hijau");
        echo "I like " . $color[0] . ", " . $color[1] . " and " . $color[2] . ".<br>";
        echo count($color) . "<br>";
        echo "<br>";
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        echo "Peter is " . $age['Peter'] . " years old.<br>";
        $mahasiswa = array(
            array("Aqil Fachri Al Habsy", "Bekasi", 20),
            array("zaki", "Jakarta", 21),
            array("Fahmi", "Bandung", 22)
        );

        echo $mahasiswa[0][0].": Asal ".$mahasiswa[0][1]." Umur ".$mahasiswa[0][2]."<br>";
        echo $mahasiswa[1][0].": Asal ".$mahasiswa[1][1]." Umur ".$mahasiswa[1][2]."<br>";
        echo $mahasiswa[2][0].": Asal ".$mahasiswa[2][1]." Umur ".$mahasiswa[2][2]."<br>";
        echo $mahasiswa[3][0].": Asal ".$mahasiswa[3][1]." Umur ".$mahasiswa[3][2]."<br>";
    ?>
</body>
</html>