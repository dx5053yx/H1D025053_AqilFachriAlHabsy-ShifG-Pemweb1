<!DOCTYPE html>
<html>
    <head>
        <title>percobaan 3 - Include</title>
    </head>
    <body>
        <div class="menu">
            <?php
                include "menu.php";
            ?>
        </div>
        <h1> ini adalah judul</h1>
        <p> ini adalah pembuka</p>
        <p> ini adalah isi</p>
        <?php
            include "footer.php";
        ?>
    </body>
</html>