<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Modul 4 Soal 3</title>
    <style>
        table, tr, td, th {
            border: solid 1px black;
            border-collapse: collapse;
            padding: 5px;
        }
        table{
            width: 700px;
        }

        table tr th{
            background-color: lightgray;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
        $nilai = [
            ["no" => 1, "nama" => "Ridho", 
            "matkul" => [
                ["namamatkul" =>"Pemrograman I", "sks" => 2], 
                ["namamatkul" => "Praktikum Pemrograman I", "sks" => 1],
                ["namamatkul" => "Pengantar Lingkungan Lahan Basah", "sks" => 2], 
                ["namamatkul" => "Arsitektur Komputer", "sks" => 3]
            ]
            ],
            ["no" => 2, "nama" => "Ratna", 
            "matkul" => [
                ["namamatkul" =>"Basis Data I", "sks" => 2], 
                ["namamatkul" => "Praktikum Basis Data I", "sks" => 1],
                ["namamatkul" => "Kalkulus", "sks" => 3]
            ]
            ],
            ["no" => 3, "nama" => "Tono", 
            "matkul" => [
                ["namamatkul" => "Rekayasa Perangkat Lunak", "sks" => 3], 
                ["namamatkul" => "Analisis dan Perancangan Sistem", "sks" => 3],
                ["namamatkul" => "Komputasi Awan", "sks" => 3], 
                ["namamatkul" => "Kecerdasan Bisnis", "sks" => 3]
            ]
            ]
        ];
        for ($i=0; $i < count($nilai); $i++){
            $totalSks = 0;
            for ($j=0; $j < count($nilai[$i]["matkul"]); $j++) {
                $totalSks += $nilai[$i]["matkul"][$j]["sks"];
            }
            $nilai[$i]["totalSks"] = $totalSks;
            if ($nilai[$i]["totalSks"] < 7) {
                $nilai[$i]["keterangan"] = "Revisi KRS";
            } else {
                $nilai[$i]["keterangan"] = "Tidak Revisi";
            }
        }
        ?>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>

        <?php
        for ($i=0; $i < count($nilai); $i++) {
            for ($j=0; $j < count($nilai[$i]["matkul"]); $j++) {
                echo "<tr>";
                if ($j == 0) {
                    echo "<td>".$nilai[$i]["no"]."</td>";
                    echo "<td>".$nilai[$i]["nama"]."</td>";
                    echo "<td>".$nilai[$i]["matkul"][$j]["namamatkul"]."</td>";
                    echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>";
                    echo "<td>".$nilai[$i]["totalSks"]."</td>";
                    if ($nilai[$i]["keterangan"] == "Revisi KRS"){
                        echo '<td style="background-color: red;">'.$nilai[$i]["keterangan"]."</td>";
                    } else {
                        echo '<td style="background-color: green;">'.$nilai[$i]["keterangan"]."</td>"; 
                    }
                } else {
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>".$nilai[$i]["matkul"][$j]["namamatkul"]."</td>";
                    echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>";
                    echo "<td></td>";
                    echo "<td></td>";
                }
                echo "</tr>";
            }
        }
        ?>
        </table>
</body>
</html>