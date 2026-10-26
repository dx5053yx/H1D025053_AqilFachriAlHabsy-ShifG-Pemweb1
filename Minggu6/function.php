<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Percobaan 4 - Function</title>
</head>
<body>
    <?php
        function text(){
            echo "Hello World! <br><br>";
        }
        text();
        function olahraga($sport){
            echo "Saya suka olahraga $sport <br>";
        }
        olahraga("Basket");
        olahraga("Sepak Bola");
        olahraga("Renang");
        olahraga("Badminton");
        olahraga("Tenis Meja <br>");

        function penjumlahan(int $num1, int $num2){
            return $num1 + $num2;
        }
        echo "Hasil penjumlahan 5 + 10 = " . penjumlahan(5, 10) . "<br>";
        function tambah_dua(&$velue){
            $velue += 2;
        }
        $num = 5;
        tambah_dua($num);
        echo "Hasil penjumlahan 5 + 2 = $num <br>";

        function lahir(&$bulankelahiran){
            switch($bulankelahiran){
                case 1:
                    echo "Bulan kelahiran anda adalah Januari <br>";
                    break;
                case 2:
                    echo "Bulan kelahiran anda adalah Februari <br>";
                    break;
                case 3:
                    echo "Bulan kelahiran anda adalah Maret <br>";
                    break;
                case 4:
                    echo "Bulan kelahiran anda adalah April <br>";
                    break;
                case 5:
                    echo "Bulan kelahiran anda adalah Mei <br>";
                    break;
                case 6:
                    echo "Bulan kelahiran anda adalah Juni <br>";
                    break;
                case 7:
                    echo "Bulan kelahiran anda adalah Juli <br>";
                    break;
                case 8:
                    echo "Bulan kelahiran anda adalah Agustus <br>";
                    break;
                case 9:
                    echo "Bulan kelahiran anda adalah September <br>";
                    break;
                case 10:
                    echo "Bulan kelahiran anda adalah Oktober <br>";
                    break;
                case 11:
                    echo "Bulan kelahiran anda adalah November <br>";
                    break;
                case 12:
                    echo "Bulan kelahiran anda adalah Desember <br>";
                    break;
                default:
                    echo "Bulan kelahiran anda tidak valid <br>";
            }
        }
        $bulan = 10;
        echo lahir($bulan);
    ?>
</body>
</html>