-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jun 2018 pada 06.13
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `idAnggaran` int(11) NOT NULL,
  `idBidang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`idAnggaran`, `idBidang`, `jumlah`, `tahun`) VALUES
(125, 1, 96469000, 2018),
(126, 2, 0, 2018),
(127, 3, 9004000, 2018),
(128, 4, 0, 2018),
(129, 5, 112692000, 2018),
(130, 6, 14439000, 2018),
(131, 7, 25000000, 2018),
(132, 8, 39761000, 2018),
(133, 9, 37961000, 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kodeBarang` varchar(20) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `hargaSatuan` int(8) NOT NULL,
  `idKategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kodeBarang`, `namaBarang`, `jumlah`, `satuan`, `hargaSatuan`, `idKategori`) VALUES
('000001', 'Box File', 0, 'Pcs', 15000, 53),
('000002', 'Map Odner', 0, 'Pcs', 25000, 53),
('000003', 'Kertas HVS F4 70gr', 0, 'Rim', 50000, 55),
('000005', 'Sunlight', 3, 'Botol', 15000, 49),
('000006', 'Stella Matic', 3, 'Pcs', 74000, 50),
('000007', 'Tisu Nice', 2, 'Pcs', 31000, 51),
('000008', 'Batre Alkaline', 5, 'Pcs', 12500, 56),
('000009', 'Stella Besar', 5, 'Pcs', 32000, 50),
('000010', 'Baygon Semprot 600ml', 8, 'Botol', 25900, 49),
('000011', 'NOSY Antibact Hs Refill 420ml', 9, 'Botol', 20000, 49),
('000012', 'Dettol Sensitive 450ml', 5, 'Botol', 28000, 57),
('000013', 'Pensil 2B Staedler', 20, 'Pack', 38500, 54),
('000014', 'Pensil 2B Faber Castell', 0, 'Pack', 47500, 54),
('000015', 'Pena Standard', 21, 'Pack', 18000, 54),
('000016', 'Pena Faster', 4, 'Pack', 28000, 54),
('000017', 'Spidol Boardmaker Snowman', 47, 'Pack', 76500, 54),
('000018', 'Apalah', 0, 'Dus', 800000, 58);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_beli`
--

CREATE TABLE `tb_beli` (
  `tanggalBeli` date NOT NULL,
  `noBukti` varchar(20) NOT NULL,
  `kodeBarang` varchar(20) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `hargaTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_beli`
--

INSERT INTO `tb_beli` (`tanggalBeli`, `noBukti`, `kodeBarang`, `jumlah`, `hargaTotal`) VALUES
('2018-02-27', '1.06.2018', '000001', 15, 225000),
('2018-03-29', '10.06.2018', '000010', 8, 155400),
('2018-03-29', '11.06.2018', '000011', 9, 135000),
('2018-03-29', '12.06.2018', '000012', 5, 140000),
('2018-04-05', '13.06.2018', '000013', 24, 576),
('2018-04-05', '14.06.2018', '000014', 5, 237500),
('2018-04-05', '15.06.2018', '000015', 21, 378000),
('2018-04-05', '16.06.2018', '000016', 4, 112000),
('2018-06-06', '17.06.2018', '000017', 47, 3595500),
('2018-02-27', '2.06.2018', '000002', 10, 250000),
('2018-02-27', '3.06.2018', '000003', 10, 500000),
('2018-03-20', '5.06.2018', '000005', 5, 60000),
('2018-03-20', '6.06.2018', '000006', 4, 296000),
('2018-03-20', '7.06.2018', '000007', 10, 310000),
('2018-03-20', '8.06.2018', '000008', 5, 62500),
('2018-03-20', '9.06.2018', '000009', 5, 160000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `idBidang` int(11) NOT NULL,
  `namaBidang` varchar(60) NOT NULL,
  `jatah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`idBidang`, `namaBidang`, `jatah`) VALUES
(1, 'Umum dan Informasi', 95339000),
(2, 'Kepegawaian', 0),
(3, 'Perencanaan', 8785000),
(4, 'Keuangan dan BMN', 0),
(5, 'Infrastruktur Pertanahan', 112692000),
(6, 'Hubungan Hukum Pertanahan', 14439000),
(7, 'Penataan Pertanahan', 24608500),
(8, 'Pengadaan Tanah', 39761000),
(9, 'Penanganan Masalah dan Pengendalian Pertanian', 37961000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distribusi`
--

CREATE TABLE `tb_distribusi` (
  `noBukti` varchar(30) NOT NULL,
  `tglKeluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_distribusi`
--

INSERT INTO `tb_distribusi` (`noBukti`, `tglKeluar`) VALUES
('1.TU-Umum.06.2018', '2018-02-27'),
('2.TU-Renc.06.2018', '2018-03-20'),
('3.Bid-3.06.2018', '2018-04-05'),
('4.TU-Umum.06.2018', '2018-06-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`idKategori`, `kategori`) VALUES
(49, 'Bahan Kimia Cair'),
(50, 'Pengharum'),
(51, 'Barang konvenien'),
(52, 'Alat Penunjang Elektronik'),
(53, 'Penyimpan Berkas'),
(54, 'Alat Tulis Kantor'),
(55, 'Kertas'),
(56, 'Baterai'),
(57, 'Bahan Kimia Lainnya'),
(58, 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kwitansi`
--

CREATE TABLE `tb_kwitansi` (
  `idDistribusi` int(11) NOT NULL,
  `noBukti` varchar(30) NOT NULL,
  `kodeBarang` varchar(20) NOT NULL,
  `NIP_pegawai` varchar(18) NOT NULL,
  `username` varchar(12) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaTotal` int(11) NOT NULL,
  `tglDistribusi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kwitansi`
--

INSERT INTO `tb_kwitansi` (`idDistribusi`, `noBukti`, `kodeBarang`, `NIP_pegawai`, `username`, `jumlah`, `hargaTotal`, `tglDistribusi`) VALUES
(67, '1.TU-Umum.06.2018', '000001', '196801281989031010', '432442', 15, 225000, '2018-02-27'),
(68, '1.TU-Umum.06.2018', '000002', '196801281989031010', '432442', 10, 250000, '2018-02-27'),
(69, '1.TU-Umum.06.2018', '000003', '196801281989031010', '432442', 10, 500000, '2018-02-27'),
(71, '2.TU-Renc.06.2018', '000005', '199309302018011001', '432442', 2, 24000, '2018-03-20'),
(72, '2.TU-Renc.06.2018', '000006', '199309302018011001', '432442', 1, 74000, '2018-03-20'),
(73, '2.TU-Renc.06.2018', '000007', '199309302018011001', '432442', 3, 93000, '2018-03-20'),
(74, '3.Bid-3.06.2018', '000013', '198708032011011003', '432442', 4, 154000, '2018-04-05'),
(75, '3.Bid-3.06.2018', '000014', '198708032011011003', '432442', 5, 237500, '2018-04-05'),
(76, '4.TU-Umum.06.2018', '000007', '196801281989031010', '432442', 5, 155000, '2018-06-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `NIP_pegawai` varchar(18) NOT NULL,
  `namaPegawai` varchar(50) NOT NULL,
  `idBidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`NIP_pegawai`, `namaPegawai`, `idBidang`) VALUES
('196201011984032002', 'Masita, S.H., MM', 8),
('196311121986031001', 'Erna Ningsih, S.H', 6),
('196412091986031006', 'Malyono', 3),
('196603071986031002', 'Asmawi, S.H', 8),
('196603111994031002', 'Yuspito, S.H', 9),
('196712281994031002', 'Jamaluddin, S.H.,M.H', 9),
('196801281989031010', 'Suratman', 1),
('196806181991032002', 'Khuzaemah', 6),
('196806221987912991', 'Tarmirani, S.H., M.H', 6),
('197407221996032002', 'Yuliastati, S.E., MM', 9),
('197409291996931991', 'Azman Hadi, S.Si. T', 5),
('197606202008042001', 'Sugiasih, S.Si., MIDS., M.Eng', 7),
('197811271997032001', 'Anis Wulansari, S.SiT', 4),
('197902227199903200', 'Euis Yeni Syarifah, S.H.,M.M', 2),
('197909201999031002', 'Ayanto Basri Hakim, S.H.,M.H', 1),
('198101152003122002', 'Rita, S.T', 5),
('198207192009032003', 'Rifa Diana Yuliyanti, S.Si., M', 7),
('198407192008042003', 'Lestriana Marwassari, S.P', 8),
('198408032008042003', 'Trisnanti Widi Rineksi, S.T., MMG., M.Eng', 7),
('198503142003122003', 'Sri Sunarsih, S.ST', 3),
('198603042011011005', 'Dedy Elwis, A.Md', 4),
('198605272011012013', 'Remi Kristina, A.Md.', 2),
('198705202008042001', 'Nike Gifitriani, S.Kom', 8),
('198708032011011003', 'Mustal Visi, S.Tr', 7),
('198711042009032001', 'Nova Heviliana, S.Str', 5),
('198805042009122002', 'Meylita L Gaol, S.Akt', 4),
('198809182009031001', 'Chorina Tri Wicaksono, S.Str', 5),
('198809232018011001', 'Mekko Antian, S.H., M.H', 9),
('198811192009122001', 'Ridha Mefriza Putri, S.E', 5),
('198812282009032001', 'Deriska Wulanda Putri, S.Kom', 5),
('198901222009122002', 'Fatika Pimoriana Sari, S.H', 4),
('198903082015032002', 'Shinta Anggaraini', 4),
('199003032011011003', 'Boby Kurniawan, S.Tr', 5),
('199012022011012002', 'Witri Lizayati, S.Tr', 3),
('199102242011011001', 'Edinur Laksana, S.Tr', 5),
('199108182014022003', 'Dyah Retno Puji Astuti', 2),
('199202022018011001', 'Kholidah Si\'ah, S.H', 6),
('199309302018011001', 'Lucky Hesliano Winerungan, S.H', 3),
('199406172018011001', 'Erdi Bagus Yuniawan, S.T', 5),
('199406202018011002', 'Rafiq Nur Hidayat. A.P', 8),
('199607252018011001', 'Ratu Audina, S.H', 1),
('199902152018011001', 'Mohammad Prayoga Dwi Nugraha. ', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `namaKantor` varchar(30) NOT NULL,
  `NIP_pegawai` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `namaKantor`, `NIP_pegawai`) VALUES
('432442', '123', 'Kanwil Provinsi Bengkulu', '198901222009122002'),
('admin', 'admin', 'Super Administrator', '198903082015032002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`idAnggaran`),
  ADD KEY `idBidang` (`idBidang`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kodeBarang`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indexes for table `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD PRIMARY KEY (`noBukti`),
  ADD KEY `kdBarang` (`kodeBarang`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`idBidang`);

--
-- Indexes for table `tb_distribusi`
--
ALTER TABLE `tb_distribusi`
  ADD PRIMARY KEY (`noBukti`) USING BTREE;

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `tb_kwitansi`
--
ALTER TABLE `tb_kwitansi`
  ADD PRIMARY KEY (`idDistribusi`),
  ADD KEY `noBukti` (`noBukti`),
  ADD KEY `kodeBarang` (`kodeBarang`),
  ADD KEY `NIP_pegawai` (`NIP_pegawai`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`NIP_pegawai`),
  ADD KEY `idBidang` (`idBidang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `NIP_pegawai` (`NIP_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `idAnggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `idBidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `tb_kwitansi`
--
ALTER TABLE `tb_kwitansi`
  MODIFY `idDistribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD CONSTRAINT `tb_anggaran_ibfk_1` FOREIGN KEY (`idBidang`) REFERENCES `tb_bidang` (`idBidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `tb_kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_beli`
--
ALTER TABLE `tb_beli`
  ADD CONSTRAINT `tb_beli_ibfk_1` FOREIGN KEY (`kodeBarang`) REFERENCES `tb_barang` (`kodeBarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kwitansi`
--
ALTER TABLE `tb_kwitansi`
  ADD CONSTRAINT `tb_kwitansi_ibfk_2` FOREIGN KEY (`kodeBarang`) REFERENCES `tb_barang` (`kodeBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kwitansi_ibfk_5` FOREIGN KEY (`NIP_pegawai`) REFERENCES `tb_pegawai` (`NIP_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kwitansi_ibfk_6` FOREIGN KEY (`noBukti`) REFERENCES `tb_distribusi` (`noBukti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kwitansi_ibfk_7` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`idBidang`) REFERENCES `tb_bidang` (`idBidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`NIP_pegawai`) REFERENCES `tb_pegawai` (`NIP_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
