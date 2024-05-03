<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 4 Soal 1</title>
    <style>
        table, tr, td {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        Panjang: <input type="text" name="panjang" value="<?php if(isset($_POST['cetak'])){echo $_POST['panjang'];}?>"><br/>
        Lebar: <input type="text" name="lebar" value="<?php if(isset($_POST['cetak'])){echo $_POST['lebar'];}?>"><br/>
        Nilai: <input type="text" name="nilai" value="<?php if(isset($_POST['cetak'])){echo $_POST['nilai'];}?>"><br/>
        <input type="submit" value="Cetak" name="cetak">
    </form>

    <?php 
    $panjang = "";
    $lebar = "";
    $nilai = "";
    
    if (isset($_POST["cetak"])) {
        $panjang = $_POST["panjang"];
        $lebar = $_POST["lebar"];
        $nilai = $_POST["nilai"];
        
        $isi = explode(" ", $nilai);
        $panjangNilai = count($isi);
        
        if ($panjang * $lebar == $panjangNilai) {
            $count = 0;
            for ($i = 0; $i < $panjang; $i++) {
                for ($j = 0; $j < $lebar; $j++) {
                     $tampilnilai[$i][$j] = $isi[$count];
                     $count++;
                 }
            }
            
            echo "<table>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . $tampilnilai[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    } 
    ?>
</body>
</html>