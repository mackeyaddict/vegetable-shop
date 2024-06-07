-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20230113.c95b64afeb
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 02.48
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sayur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `hutang_id` int(11) NOT NULL,
  `hutang_pelanggan` int(11) NOT NULL,
  `hutang_tanggal` date NOT NULL,
  `hutang_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`hutang_id`, `hutang_pelanggan`, `hutang_tanggal`, `hutang_jumlah`) VALUES
(5, 1, '2023-06-17', 21000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Sayur Paketan'),
(2, 'Sayur Daun'),
(3, 'Sayur Buah'),
(4, 'Sayur Akar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(255) NOT NULL,
  `pelanggan_hp` varchar(20) NOT NULL,
  `pelanggan_alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES
(1, 'Asep', '081239102312', 'Jl Dermaga II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `penjualan_tanggal` date NOT NULL,
  `penjualan_total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `penjualan_tanggal`, `penjualan_total_harga`) VALUES
(6, '2023-06-09', 15000),
(7, '2023-06-09', 15000),
(8, '2023-06-09', 30000),
(9, '2023-06-09', 12000),
(10, '2023-06-09', 8000),
(11, '2023-06-11', 20000),
(12, '2023-06-11', 20000),
(13, '2023-06-11', 6000),
(15, '2023-06-12', 6000),
(18, '2023-06-17', 9000),
(19, '2023-06-17', 26000),
(20, '2023-06-17', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL,
  `satuan_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`satuan_id`, `satuan_nama`) VALUES
(1, 'Ikat'),
(2, 'Gram'),
(3, 'Kg'),
(4, 'Bungkus'),
(5, 'PCS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sayur`
--

CREATE TABLE `sayur` (
  `sayur_id` int(11) NOT NULL,
  `sayur_nama` varchar(255) NOT NULL,
  `sayur_satuan` int(11) NOT NULL,
  `sayur_harga` int(11) NOT NULL,
  `sayur_stok` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sayur_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sayur`
--

INSERT INTO `sayur` (`sayur_id`, `sayur_nama`, `sayur_satuan`, `sayur_harga`, `sayur_stok`, `kategori_id`, `sayur_img`) VALUES
(34, 'Sayur Sop', 4, 5000, 24, 1, 'sayur_sop.jpg'),
(35, 'Sayur Asem', 4, 5000, 20, 1, 'sayur_asem.jpg'),
(36, 'Sayur Lodeh', 4, 5000, 21, 1, 'sayur_lodeh.jpg'),
(37, 'Bumbu Dapur', 4, 4000, 18, 1, 'bumbu_dapur.jpg'),
(38, 'Bayem', 1, 3000, 18, 2, 'bayem.jpg'),
(39, 'Kangkung', 1, 3000, 14, 2, 'kangkung.jpg'),
(40, 'Sawi Hijau', 1, 3000, 19, 2, 'sawi2.jpg'),
(41, 'Sawi Putih', 1, 5000, 9, 2, 'sawi_putih.jpg'),
(42, 'Kubis/Kol', 5, 4000, 12, 2, 'kol.jpg'),
(43, 'Kemangi', 1, 2000, 9, 2, 'kemangi.jpg'),
(44, 'Daun Melinjo', 4, 4000, 10, 2, 'daun_melinjo.jpg'),
(45, 'Daun Singkong', 1, 5000, 14, 2, 'daun_singkong.jpg'),
(46, 'Pakcoy', 4, 4000, 10, 2, 'pakcoy.jpg'),
(47, 'Selada', 4, 3000, 12, 2, 'selada.jpg'),
(48, 'Brokoli', 5, 4000, 16, 2, 'Brokoli.jpg'),
(49, 'Kembang Kol', 5, 4000, 14, 2, 'kembang_kol.jpg'),
(50, 'Melinjo', 4, 4000, 12, 3, 'melinjo.jpg'),
(51, 'Tomat', 4, 3000, 22, 3, 'tomat.jpg'),
(52, 'Cabe Merah', 4, 3000, 22, 3, 'cabe_merah.jpg'),
(53, 'Cabe Setan', 4, 5000, 24, 3, 'cabe_setan.jpg'),
(54, 'Cabe Rawit', 4, 4000, 18, 3, 'cabe_rawit.jpg'),
(55, 'Cabe Hijau', 4, 4000, 16, 3, 'cabe_ijo.jpg'),
(56, 'Paprika', 5, 10000, 12, 3, 'paprika.jpg'),
(57, 'Timun', 4, 6000, 14, 3, 'timun.jpg'),
(58, 'Terong', 4, 4000, 16, 3, 'terong.jpg'),
(59, 'Pare', 4, 4000, 14, 3, 'pare.jpg'),
(61, 'Labu Siam Kecil', 4, 3000, 18, 3, 'labu_siam_kecil.jpg'),
(62, 'Labu Siam Besar', 5, 4000, 12, 3, 'labu_siam_besar.jpg'),
(63, 'Jagung', 5, 3000, 14, 3, 'jagung.jpg'),
(64, 'Oyong', 5, 3000, 12, 3, 'oyong.jpg'),
(65, 'Buncis', 4, 3000, 10, 3, 'buncis.jpg'),
(66, 'Kacang Panjang', 1, 3000, 10, 3, 'kacang_panjang.jpg'),
(68, 'Tauge', 4, 2000, 14, 3, 'tauge.jpg'),
(69, 'Kentang', 3, 8000, 9, 4, 'kentang.jpg'),
(70, 'Wortel', 4, 3000, 14, 4, 'wortel1.jpg'),
(71, 'Lobak', 5, 6000, 10, 4, 'lobak.jpg'),
(72, 'Talas', 3, 6000, 12, 4, 'talas.jpg'),
(73, 'Singkong', 3, 12000, 13, 4, 'singkong.jpg'),
(74, 'Ubi Jalar', 3, 6000, 10, 4, 'ubi_jalar.jpg'),
(75, 'Gambili', 3, 12000, 14, 4, 'gambili.jpg'),
(76, 'Umbi Bit', 5, 3000, 10, 4, 'umbi_bit.jpg'),
(77, 'Bawang Merah', 4, 5000, 17, 4, 'bawang_merah.jpg'),
(78, 'Bawang Putih', 4, 3000, 22, 4, 'bawang_putih.jpg'),
(79, 'Bawang Bombay', 5, 3000, 18, 4, 'bawang_bombay.jpg'),
(80, 'Daun Bawang', 1, 2000, 24, 4, 'daun_bawang.jpg'),
(90, 'Labu', 5, 10000, 10, 3, 'labu9.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sayur_terjual`
--

CREATE TABLE `sayur_terjual` (
  `sayur_terjual_id` int(11) NOT NULL,
  `sayur_terjual_nama` varchar(25) NOT NULL,
  `sayur_terjual_jumlah` int(11) NOT NULL,
  `sayur_terjual_total_harga` int(11) NOT NULL,
  `sayur_terjual_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sayur_terjual`
--

INSERT INTO `sayur_terjual` (`sayur_terjual_id`, `sayur_terjual_nama`, `sayur_terjual_jumlah`, `sayur_terjual_total_harga`, `sayur_terjual_tanggal`) VALUES
(3, 'Bayem', 1, 3000, '2023-06-17'),
(4, 'Kangkung', 2, 6000, '2023-06-17'),
(5, 'Sawi Putih', 4, 20000, '2023-06-17'),
(6, 'Kemangi', 3, 6000, '2023-06-17'),
(7, 'Wortel', 2, 6000, '2023-06-17'),
(8, 'Bawang Merah', 3, 15000, '2023-06-17'),
(9, 'Sawi Hijau', 3, 9000, '2023-06-17'),
(10, 'Kentang', 2, 16000, '2023-06-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_pengguna`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`hutang_id`),
  ADD KEY `hutang_pelanggan` (`hutang_pelanggan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indeks untuk tabel `sayur`
--
ALTER TABLE `sayur`
  ADD PRIMARY KEY (`sayur_id`),
  ADD UNIQUE KEY `sayur_nama` (`sayur_nama`),
  ADD UNIQUE KEY `sayur_nama_2` (`sayur_nama`),
  ADD KEY `sayur_satuan` (`sayur_satuan`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `sayur_terjual`
--
ALTER TABLE `sayur_terjual`
  ADD PRIMARY KEY (`sayur_terjual_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `hutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `satuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sayur`
--
ALTER TABLE `sayur`
  MODIFY `sayur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `sayur_terjual`
--
ALTER TABLE `sayur_terjual`
  MODIFY `sayur_terjual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`hutang_pelanggan`) REFERENCES `pelanggan` (`pelanggan_id`);

--
-- Ketidakleluasaan untuk tabel `sayur`
--
ALTER TABLE `sayur`
  ADD CONSTRAINT `sayur_ibfk_1` FOREIGN KEY (`sayur_satuan`) REFERENCES `satuan` (`satuan_id`),
  ADD CONSTRAINT `sayur_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
