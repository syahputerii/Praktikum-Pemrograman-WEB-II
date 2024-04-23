<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 2 Soal 1</title>
</head>

<body>
    <form method="POST">
        Nama: 1 <input type="text" name="masukannama1" value="<?php if(isset($_POST['masukannama1'])) { echo $_POST['masukannama1']; } ?>"></br>
        Nama: 2 <input type="text" name="masukannama2" value="<?php if(isset($_POST['masukannama2'])) { echo $_POST['masukannama2']; } ?>"></br>
        Nama: 3 <input type="text" name="masukannama3" value="<?php if(isset($_POST['masukannama3'])) { echo $_POST['masukannama3']; } ?>"></br>
        <input type="submit" name="submit" value="Urutkan">
    </form></br>

<?php
    if (isset($_POST['submit'])) {
        $masukannama1 = $_POST['masukannama1'];
        $masukannama2 = $_POST['masukannama2'];
        $masukannama3 = $_POST['masukannama3'];

        if ($masukannama1 < $masukannama2 && $masukannama1 < $masukannama3) {
            if ($masukannama2 < $masukannama3) {
                echo "$masukannama1 <br> $masukannama2 <br> $masukannama3";
            } else {
                echo "$masukannama1 <br> $masukannama3 <br> $masukannama2";
            }
        } elseif ($masukannama2 < $masukannama1 && $masukannama2 < $masukannama3) {
            if ($masukannama1 < $masukannama3) {
                echo "$masukannama2 <br> $masukannama1 <br> $masukannama3";
            } else {
                echo "$masukannama2 <br> $masukannama3 <br> $masukannama1";
            }
        } else {
            if ($masukannama1 < $masukannama2) {
                echo "$masukannama3 <br> $masukannama1 <br> $masukannama3";
            } else {
                echo "$masukannama3 <br> $masukannama2 <br> $masukannama1";
            }
        }
    }
?>
</body>
</html>