<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 2 Soal 3</title>
</head>

<body>
    <form action="" method="post">
        Nilai <input type="number" step="any" name="suhu"></input></br>         
        Dari : </br>         
        <input type="radio" name="suhuawal" value="Celcius">Celcius</br>         
        <input type="radio" name="suhuawal" value="Fahrenheit">Fahrenheit</br>         
        <input type="radio" name="suhuawal" value="Reamur">Reamur</br>         
        <input type="radio" name="suhuawal" value="Kelvin">Kelvin</br>

        Ke : </br>         
        <input type="radio" name="konversisuhu" value="Celcius">Celcius</br>         
        <input type="radio" name="konversisuhu" value="Fahrenheit">Fahrenheit</br>         
        <input type="radio" name="konversisuhu" value="Reamur">Reamur</br>         
        <input type="radio" name="konversisuhu" value="Kelvin">Kelvin</br>

        <input type="submit" name="submit" value="Konversi"></input>
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit"])) {     
        $suhu = $_POST['suhu'];     
        $suhuawal = $_POST['suhuawal'];     
        $konversisuhu = $_POST['konversisuhu'];     

        switch ($suhuawal) {
            case "Celcius":
                switch ($konversisuhu) {
                    case "Celcius":
                        echo "<h2>Hasil Konversi : $suhu &deg;C</h2>";
                        break;
                    case "Fahrenheit":
                        echo "<h2>Hasil Konversi : " . ($suhu * 1.8 + 32) . " &deg;F</h2>";
                        break;
                    case "Reamur":
                        echo "<h2>Hasil Konversi : " . ($suhu * 0.8) . " &deg;R</h2>";
                        break;
                    case "Kelvin":
                        echo "<h2>Hasil Konversi : " . ($suhu + 273.15) . " &deg;K</h2>";
                        break;
                }
                break;
            case "Fahrenheit":
                switch ($konversisuhu) {
                    case "Celcius":
                        echo "<h2>Hasil Konversi : " . ($suhu - 32) / 1.8 . " &deg;C</h2>";
                        break;
                    case "Fahrenheit":
                        echo "<h2>Hasil Konversi : $suhu &deg;F</h2>";
                        break;
                    case "Reamur":
                        echo "<h2>Hasil Konversi : " . ($suhu - 32) / 2.25 . " &deg;R</h2>";
                        break;
                    case "Kelvin":
                        echo "<h2>Hasil Konversi : " . ($suhu + 459.67) / 1.8 . " &deg;K</h2>";
                        break;
                }
                break;
            case "Reamur":
                switch ($konversisuhu) {
                    case "Celcius":
                        echo "<h2>Hasil Konversi : " . ($suhu * 1.25) . " &deg;C</h2>";
                        break;
                    case "Fahrenheit":
                        echo "<h2>Hasil Konversi : " . ($suhu * 2.25 + 32) . " &deg;F</h2>";
                        break;
                    case "Reamur":
                        echo "<h2>Hasil Konversi : $suhu &deg;R</h2>";
                        break;
                    case "Kelvin":
                        echo "<h2>Hasil Konversi : " . ($suhu + 273.15) / 0.8 . " &deg;K</h2>";
                        break;
                }
                break;
            case "Kelvin":
                switch ($konversisuhu) {
                    case "Celcius":
                        echo "<h2>Hasil Konversi : " . ($suhu - 273.15) . " &deg;C</h2>";
                        break;
                    case "Fahrenheit":
                        echo "<h2>Hasil Konversi : " . ($suhu * 1.8 - 459.67) . " &deg;F</h2>";
                        break;
                    case "Reamur":
                        echo "<h2>Hasil Konversi : " . ($suhu - 273.15) * 0.8 . " &deg;R</h2>";
                    case "Kelvin":
                        echo "<h2>Hasil Konversi : $suhu &deg;R</h2>";
                }
        }
    }
?>