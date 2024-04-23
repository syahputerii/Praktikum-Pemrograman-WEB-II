<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 2 Soal 4</title>
</head>

<body>
    <form action="" method="POST">      
        Nilai : <input type="number" name="nilai" value="<?php if(isset($_POST['nilai'])) { echo $_POST['nilai']; } ?>"></input></br>
        <input type="submit" name="submit" value="Konversi"></input>
    </form> 

<?php
    if (isset($_POST["submit"])) {     
        $nilai = $_POST["nilai"]; 
        if ($nilai == 0){
            echo "<h2>Hasil : Nol</h2>";
        } elseif ($nilai > 0 && $nilai < 10){
            echo "<h2>Hasil : Satuan</h2>";
        } elseif ($nilai >= 11 && $nilai < 20){
            echo "<h2>Hasil : Belasan</h2>";
        } elseif ($nilai >= 10 && $nilai < 100){
            echo "<h2>Hasil : Puluhan</h2>";
        } elseif ($nilai >= 100 && $nilai < 1000){
            echo "<h2>Hasil : Ratusan</h2>";
        } else{
            echo "<h2>Hasil : Anda Menginput Melebihi Limit Bilangan</h2>";
        }
    }
?>
</body>
</html>