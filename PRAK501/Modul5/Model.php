<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Model</title>
</head>

<body>
</body>

</html>
<?php
include_once("Koneksi.php");

function readData($nama_tabel)
{
    require "Koneksi.php";
    $stmt = $conn->prepare("SELECT * FROM $nama_tabel");
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (!empty($result)) {
        if ($nama_tabel == "member") {
            foreach ($result as $hasil) {
                echo "<tr>";
                echo "<td  class='text-center'>" . $hasil['id_member'] . "</td>";
                echo "<td>" . $hasil['nama_member'] . "</td>";
                echo "<td>" . $hasil['nomor_member'] . "</td>";
                echo "<td>" . $hasil['alamat'] . "</td>";
                echo "<td>" . $hasil["tgl_mendaftar"] . "</td>";
                echo "<td>" . $hasil["tgl_terakhir_bayar"] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary' href='FormMember.php?id_member=" . $hasil['id_member'] . "'>Edit</a>";
                echo " ";
                echo "<a class='btn btn-danger' href='Member.php?id_member=" . $hasil['id_member'] . "' onclick=\"return confirm('Yakin Ingin Dihapus?')\">Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } elseif ($nama_tabel == "buku") {
            foreach ($result as $hasil) {
                echo "<tr>";
                echo "<td class='text-center'>" . $hasil['id_buku'] . "</td>";
                echo "<td>" . $hasil['judul_buku'] . "</td>";
                echo "<td>" . $hasil['penulis'] . "</td>";
                echo "<td>" . $hasil['penerbit'] . "</td>";
                echo "<td>" . $hasil["tahun_terbit"] . "</td>";
                echo "<td>";
                echo "<a class='btn btn-primary' href='FormBuku.php?id_buku=" . $hasil['id_buku'] . "'>Edit</a>";
                echo "  ";
                echo "<a class='btn btn-danger' href='Buku.php?id_buku=" . $hasil['id_buku'] . "' onclick=\"return confirm('Yakin Ingin Dihapus?')\">Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } elseif ($nama_tabel == "peminjaman") {
            require "Koneksi.php";
            if (isset($_GET['id_peminjaman'])) {
                deletePeminjaman($_GET['id_peminjaman']);
            }
            foreach ($result as $hasil) {
                echo "<tr>";
                echo "<td>" . $hasil["id_peminjaman"] . "</td>";
                echo "<td>" . $hasil["tgl_pinjam"] . "</td>";
                echo "<td>" . $hasil["tgl_kembali"] . "</td>";
                foreach ($dataBuku as $temp) {
                    if ($baris['id_buku'] == $temp['id_buku']) {
                        echo "<td>" . $temp['judul_buku'] . "</td>";
                    }
                }
                foreach ($dataMember as $temp) {
                    if ($baris['id_member'] == $temp['id_member']) {
                        echo "<td>" . $temp['nama_member'] . "</td>";
                    }
                }
                echo "<td>";
                echo "<a class='btn btn-primary' href='FormPeminjaman.php?id_peminjaman=" . $hasil['id_peminjaman'] . "'>Edit</a>";
                echo " ";
                echo "<a class='btn btn-danger' href='Peminjaman.php?id_peminjaman=" . $hasil['id_peminjaman'] . "' onclick=\"return confirm('Yakin Ingin Dihapus?')\">Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }
}

function insertDataMember($nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)
{
    $sql = "INSERT INTO `member` (`nama_member`, `nomor_member`, `alamat`, `tgl_mendaftar`, `tgl_terakhir_bayar`) VALUES (:nama_member,:nomor_member,:alamat,:tgl_mendaftar,:tgl_terakhir_bayar)";
    require "Koneksi.php";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute(array(':nama_member' => $nama_member, ':nomor_member' => $nomor_member, ':alamat' => $alamat, ':tgl_mendaftar' => $tgl_mendaftar, ':tgl_terakhir_bayar' => $tgl_terakhir_bayar));
    if (!empty($result)) {
        header('location:Member.php');
    }
}

function insertDataBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit)
{
    $sql = "INSERT INTO `buku` (`judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (:judul_buku,:penulis,:penerbit,:tahun_terbit)";
    require "Koneksi.php";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute(array(':judul_buku' => $judul_buku, ':penulis' => $penulis, ':penerbit' => $penerbit, ':tahun_terbit' => $tahun_terbit));
    if (!empty($result)) {
        header('location:Buku.php');
    }
}

function insertDataPeminjaman($tgl_pinjam, $tgl_kembali, $id_buku, $id_member)
{
    $sql = "INSERT INTO `peminjaman` (`tgl_pinjam`, `tgl_kembali`, `id_buku`, `id_member`) VALUES (:tgl_pinjam,:tgl_kembali,:id_buku,:id_member)";
    require "Koneksi.php";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute(array(':tgl_pinjam' => $tgl_pinjam, ':tgl_kembali' => $tgl_kembali, ':id_buku' => $id_buku, ':id_member' => $id_member));
    if (!empty($result)) {
        header('location:Peminjaman.php');
    }
}

//Edit
function editMember()
{
    require "Koneksi.php";
    $stmt = $conn->prepare("SELECT * FROM member where id_member=" . $_GET["id_member"]);
    $stmt->execute();
    $GLOBALS['result'] = $stmt->fetchAll();
}

function editBuku()
{
    require "Koneksi.php";
    $stmt = $conn->prepare("SELECT * FROM buku where id_buku=" . $_GET["id_buku"]);
    $stmt->execute();
    $GLOBALS['result'] = $stmt->fetchAll();
}

function editPeminjaman()
{
    require "Koneksi.php";
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman =" . $_GET['id_peminjaman']);
    $stmt->execute();
    $GLOBALS['result'] = $stmt->fetchAll();
}

//Update
function updateMember($id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar)
{
    require "Koneksi.php";
    $pdo_statement = $conn->prepare(
        "UPDATE member SET nama_member='" . $nama_member . "', nomor_member='" . $nomor_member . "', alamat='" . $alamat . "', tgl_mendaftar='" . $tgl_mendaftar . "', tgl_terakhir_bayar='" . $tgl_terakhir_bayar . "' where id_member=" . $id_member
    );
    $result = $pdo_statement->execute();
    if ($result) {
        header('location:Member.php');
    }
}

function updateBuku($id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit)
{
    require "Koneksi.php";
    $pdo_statement = $conn->prepare(
        "UPDATE buku SET judul_buku='" . $judul_buku . "', penulis='" . $penulis . "', penerbit='" . $penerbit . "', tahun_terbit='" . $tahun_terbit . "' where id_buku=" . $id_buku
    );
    $result = $pdo_statement->execute();
    if ($result) {
        header('location:Buku.php');
    }
}

function updatePeminjaman($id_peminjaman, $tgl_pinjam, $tgl_kembali, $id_buku, $id_member)
{
    require "Koneksi.php";
    $pdo_statement = $conn->prepare(
        "UPDATE peminjaman SET tgl_pinjam='" . $tgl_pinjam . "', tgl_kembali='" . $tgl_kembali . "', id_buku='" . $id_buku . "', id_member='" . $id_member . "' WHERE id_peminjaman = " . $id_peminjaman
    );
    $result = $pdo_statement->execute();
    if ($result) {
        header('location:Peminjaman.php');
    }
}

// Hapus
function deleteMember($id_member)
{
    require "Koneksi.php";
    $stmt = $conn->prepare("DELETE FROM member where id_member=" . $id_member);
    $result = $stmt->execute();
    if ($result) {
        header('location:Member.php');
    }

}
function deleteBuku($id_buku)
{
    require "Koneksi.php";
    $stmt = $conn->prepare("DELETE FROM buku where id_buku=" . $id_buku);
    $result = $stmt->execute();
    if ($result) {
        header('location:Buku.php');
    }
}
function deletePeminjaman($id_peminjaman)
{
    require "Koneksi.php";
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman=" . $id_peminjaman);
    $result = $stmt->execute();
    if ($result) {
        header('location:Peminjaman.php');
    }
}

function getMember($conn)
{
    $query = $conn->prepare("SELECT * from member");
    $query->execute();
    $hasil = $query->fetchAll(PDO::FETCH_ASSOC);
    return $hasil;
}

function getBuku($conn)
{
    $query = $conn->prepare("SELECT * from buku");
    $query->execute();
    $hasil = $query->fetchAll(PDO::FETCH_ASSOC);
    return $hasil;
}

function getPeminjaman($conn)
{
    $query = $conn->prepare("SELECT * from peminjaman");
    $query->execute();
    $hasil = $query->fetchAll(PDO::FETCH_ASSOC);
    return $hasil;
}