SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Struktur dari tabel `buku`

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(500) NOT NULL,
  `penulis` varchar(500) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `tahun_terbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data untuk tabel `buku`

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(01, 'The Psychology of Money by Morgen Housel', 'Morgen Housel', 'Penerbit Baca', 2021),
(02, 'The Paragon Plan', 'Aranindy', 'Gramedia Pustaka Utama', 2021),
(03, 'Law of Attraction', 'Michael J.Losier', 'Ufuk Publishing House', 2007),
(04, 'It Ends with Us', 'Colleen Hoover', 'Atria Books', 2016),
(05, 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 2005),
(06, 'Gadis Kretek', 'Valerie Patkar', 'Gramedia Pustaka Utama', 2012),
(07, 'Dunia Sophie', 'Jostein Gaarder', 'Mizan', 2013),
(08, 'Renjana', 'El Alicia', 'Huta Publiser', 2021);

-- Struktur dari tabel `member`

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(250) NOT NULL,
  `nomor_member` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_mendaftar` date NOT NULL,
  `tgl_terakhir_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data untuk tabel `member`

INSERT INTO `member` (`id_member`, `nama_member`, `nomor_member`, `alamat`, `tgl_mendaftar`, `tgl_terakhir_bayar`) VALUES
(1, 'Nursyahna Puteri', '2210817120007', ' Banajarmasin', '2024-05-10', '2024-05-14'),
(2, 'Zahra Ayu Luthfiyana', '2210912120020', 'Banjarbaru', '2023-09-01', '2024-05-07'),
(3, 'Siti Nurhaifa', '2210123120014', 'Banjarmasin', '2024-05-14', '2024-04-23'),
(4, 'Aprilia Ananda', '2210512220025', 'Banjarbaru', '2023-03-14', '2023-05-14'),
(5, 'Rini Nor Hidayah', '2210872310001', 'Rantau', '2022-08-14', '2023-05-14'),
(6, 'Najwa Hanifa', '2310857220020', 'Rantau', '2023-12-14', '2023-12-12');

-- Struktur dari tabel `peminjaman`

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data untuk tabel `peminjaman`

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `id_buku`, `id_member`) VALUES
(1, '2024-05-07', '2024-05-14', 2, 1),
(2, '2024-05-01', '2024-05-05', 5, 2),
(3, '2024-05-09', '2024-05-11', 8, 3);

-- Indexes for dumped tables

-- Indeks untuk tabel `buku`
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `judul_buku` (`judul_buku`);

-- Indeks untuk tabel `member`

ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `nama_member` (`nama_member`);

-- Indeks untuk tabel `peminjaman`

ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_member` (`id_member`);

-- AUTO_INCREMENT untuk tabel yang dibuang

-- AUTO_INCREMENT untuk tabel `buku`

ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- AUTO_INCREMENT untuk tabel `member`

ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

-- AUTO_INCREMENT untuk tabel `peminjaman`

ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)

-- Ketidakleluasaan untuk tabel `peminjaman`

ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;