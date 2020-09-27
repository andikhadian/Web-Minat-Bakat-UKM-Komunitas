-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:33067
-- Generation Time: Aug 21, 2020 at 11:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minat_bakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `gambar`, `status`, `date_created`) VALUES
(2, '6cc29401c3255506e57b49b0210b7c9d.jpg', 'AKTIF', '1597903889'),
(3, '7c87df9fa75e99453115b02deca25244.jpg', 'AKTIF', '1597903914'),
(4, '23b159575801bd6818123679b1ef2cef.jpg', 'AKTIF', '1597904001'),
(5, 'fc637cc65990d80d10ee0e18b5aefb60.jpg', 'AKTIF', '1597904009'),
(6, 'ffb20ec5dc7cef79735cb877af557326.jpg', 'AKTIF', '1597904043');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_organisasi`
--

CREATE TABLE `kegiatan_organisasi` (
  `kegiatan_organisasi_id` int(11) NOT NULL,
  `organisasi_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kegiatan_organisasi`
--

INSERT INTO `kegiatan_organisasi` (`kegiatan_organisasi_id`, `organisasi_id`, `nama_kegiatan`, `gambar`, `date_created`) VALUES
(1, 9, 'Wawancara Nasional', 'f5576b4c2fd920cfa9dbbb7ce4961fd4.jpg', '1597657765'),
(2, 9, 'Pelantikan Ketua Umum', 'ff673b2d500ed1a606fda81cae31726f.jpg', '1597657814'),
(3, 9, 'Makrab', '54189bf54470a7c32e535e3484fcd01f.jpg', '1597657842'),
(5, 9, 'Basic Training of Jurnalistic', 'b91f7d3d29b5d2f321ad8be8172baa07.jpg', '1597660419'),
(6, 9, 'Wawancara 1', 'f6b67c023485f8c4722e30861ee80abb.jpg', '1597660498'),
(7, 9, 'Wawancara 2', 'f895cb93895108b3e9c7fb093211af5a.jpg', '1597660511'),
(8, 9, 'Candid', '125ef855bb7abbc9076b7097c975fbec.jpg', '1597662128'),
(9, 9, 'Kumpul Nasional', '0385dc6ce158dc2a50df4888264bc856.jpg', '1597662160'),
(10, 9, 'Foto Bareng', '272a3114c3a4d00e4c567647e7725ba2.jpg', '1597662224'),
(11, 9, 'Hari PERS Nasional', '4a93d3fbd6ef1e56106bf0a6dfc55c7e.jpg', '1597662247'),
(13, 4, 'Latihan', '943df068237ba055ed5755def9946435.jpg', '1597668452'),
(14, 4, 'Latihan 2', '36a3272637ff1e3acc59b8b2cf5f1573.jpg', '1597668483'),
(15, 4, 'Latihan 3', '298d17b878a35430c83d6cc09e41b3b4.jpg', '1597668508'),
(16, 4, 'Latihan 4', 'e8b76a80f7934cd3cf2056e9a73e6907.jpg', '1597668535'),
(17, 4, 'Latihan 5', '1c34ce1111eafe4ac528c98c6500acb8.jpg', '1597668559');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `organisasi_id` int(11) NOT NULL,
  `pengurus_id` int(11) NOT NULL,
  `jenis_organisasi` varchar(20) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `singkatan_organisasi` varchar(10) NOT NULL,
  `deskripsi_organisasi` text NOT NULL,
  `gambar_organisasi` varchar(200) NOT NULL,
  `status_pendaftaran` varchar(50) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`organisasi_id`, `pengurus_id`, `jenis_organisasi`, `nama_organisasi`, `singkatan_organisasi`, `deskripsi_organisasi`, `gambar_organisasi`, `status_pendaftaran`, `date_created`) VALUES
(4, 2, 'UKM', 'Taekwondo', 'Taekwondo', 'Taekwodo adalah seni bela diri asal korea yang juga sebagai olahraga nasional korea, ini adalah salah satu seni bela diri populer didunia yang dipertandingkan di olimpiade. Taekwodo juga merupakan gabungan dari teknik perkelahian, bela diri, olahraga, olah tubuh, hiburan dan filsafat, taekwondo juga mengajarkan teman-teman untuk menahan emosi dan juga dapat membantu teman-teman untuk selalu melindungi diri dari serangan musuh. jadi jika teman-teman memiliki bakat dibagian taekwondo dan juga minat, taekwondo urindo sangat tepat untuk teman-teman bergabung dan selalu mengasah bakat yang teman-teman miliki maupun ingin menambah pengalaman baru.', '0938b0acbc630ea858fed21ff141202b.jpg', 'TUTUP PENDAFTARAN', '1597631108'),
(5, 6, 'UKM', 'Lembaga Dakwah Mahasiswa', 'LDM', '', 'a5684b387558c935c0d0c8807c79b533.jpg', 'BUKA PENDAFTARAN', '1597631319'),
(6, 7, 'UKM', 'Persukutan Mahasiswa Kristen', 'PMK', '', '790df6aedebcee277cf724262bbea7cc.jpg', 'BUKA PENDAFTARAN', '1597631445'),
(9, 8, 'UKM', 'Lembaga Pers Mahasiswa URINDO', 'LPMU', 'Lembaga Pers Mahasiswa Urindo atau biasa disebut LPMU adalah organisasi mahasiswa yang menaungi mahasiswa yang mempunyai minat menulis dan menaungi bakat mahasiswa dibagian fotografer.', '98428f4d1d4caa085506fcdd044f1251.jpg', 'BUKA PENDAFTARAN', '1597656811'),
(10, 9, 'UKM', 'Mahasiswa Pencinta Alam Respati', 'MAPARES', '', '5fc29f4029b9acd91cfc8179898b55a8.jpg', 'BUKA PENDAFTARAN', '1597634488'),
(11, 10, 'Komunitas', 'Urindo Music Club', 'UMC', '', '44c11e218270adfdb1393ff7300d05c6.jpg', 'BUKA PENDAFTARAN', '1597638290'),
(14, 11, 'UKM', 'Futsal', 'Futsal', '', 'e78ff3cb44d653b5ecbfe7c3993906e0.jpg', 'BUKA PENDAFTARAN', '1597666984');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `pendaftaran_id` int(11) NOT NULL,
  `organisasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `npm` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `tgl_data_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`pendaftaran_id`, `organisasi_id`, `user_id`, `nama`, `npm`, `tgl_lahir`, `prodi`, `alasan`, `tgl_data_masuk`) VALUES
(2, 9, 13, 'Andikha Dian Nugraha', '201643502227', '1997-08-16', 'Ilmu Komputer', 'Kerenn bisa tanya tanya ke orang yang gadikenal', '1597883541'),
(3, 5, 14, 'Linda Ramadhani', '201643502227', '1998-06-17', 'Ilmu Komputer', 'Ingin memperdalam ilmu religi saya', '1597884279'),
(4, 9, 15, 'Bianco Akbar', '201643502228', '1997-10-14', 'Ilmu Komputer', 'Saya mau belajar jadi jurnalis yang profesional', '1598047960');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `struktur_organisasi_id` int(11) NOT NULL,
  `organisasi_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`struktur_organisasi_id`, `organisasi_id`, `nama`, `jabatan`, `gambar`, `date_created`) VALUES
(1, 9, 'Noviana Rahmawati', 'Ketua', 'be9dbb28d39bf2ddaa0f05de55b205b6.jpg', '1597651245'),
(2, 9, 'Rahmat Surya Gunarso', 'Wakil', '91e4df147c4b6fb504dbb617aa7c3c83.jpg', '1597651990'),
(4, 9, 'Jesi Nurulnatasa', 'Sekretaris', '8d0b608a10d90f1d6ce60341e63fe18b.jpg', '1597656942'),
(5, 4, 'Yubelium Hendra Wilil', 'Ketua', '3a83d55dc1ec6de333c566290d5a854e.jpg', '1597668322'),
(6, 4, 'Anggri Prihatin', 'Wakil', 'ee4d83cb79065cb4ef0a69d2fff76fe5.jpg', '1597668345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama_user`, `username`, `password`, `role`, `status`, `date_created`) VALUES
(1, 'Admin ', '2020080001', '$2y$10$I0F68dhuSqiaBtk5dw.cy.JnSRHnEtP1Fq/6Zhhtzn.yHB.NrLlXK', 'ADMIN', 'AKTIF', '1569549542'),
(2, 'Yubelium Hendra Wilil', '2020080002', '$2y$10$6CZ7y2/FgMOZANIezHPmzu4SpFY0B.5Zzru6nBH761O2jH.rO9z5.', 'PENGURUS', 'AKTIF', '1569549542'),
(6, 'Ahmad Tuakil', '2020080003', '$2y$10$v1iFTB8Vet.BVn9viGZlx.u3zv5l5AE2z1Mk.WuiGmNoB9E81hEUa', 'PENGURUS', 'AKTIF', '1597630796'),
(7, 'Maria Victoria Lango', '2020080004', '$2y$10$0rAotfScp0g.LNoJ11vlhOLOlD8y.yYYoXF6hAllYq/P13aRy0lFm', 'PENGURUS', 'AKTIF', '1597630842'),
(8, 'Noviana Rahmawati', '2020080005', '$2y$10$FvVll5EXUFK97QdWFUQQ4.9XoGQEWow3qDs36qdKRe2rlNobivLCG', 'PENGURUS', 'AKTIF', '1597632888'),
(9, 'Muhammad Bayu', '2020080006', '$2y$10$E5WamJrWzjsLMYtZJjG8q.WuJfoVXL3Qs9EZIdoHFbRfQ/QzbTE6e', 'PENGURUS', 'AKTIF', '1597634461'),
(10, 'Exel', '2020080007', '$2y$10$d4ZrJTgco9N5xZXY0Q25eOtUcMZk6ZtVceQ1J.eDDsPeRfrs4jQTa', 'PENGURUS', 'AKTIF', '1597638222'),
(11, 'Faishal Zamzami', '2020080008', '$2y$10$Lm4oPcFp3omBHhcByXbjUeMEsDv810uNk.UvEVqbuEGYYa0ntNXcG', 'PENGURUS', 'AKTIF', '1597666927'),
(13, 'Andikha Dian Nugraha', '201643502297', '$2y$10$SH7eOvVY8HaKYrzxBWsZ4.rmkPrEp7NpSyDhhZmTdSIpAGrV6uFbu', 'USER', 'AKTIF', '1597879871'),
(14, 'Linda Ramadhani', '201643502227', '$2y$10$hI/v3hvcF806Wk2wiZhfcO7raV1FhO.Umd8y2u6pdlWxPQ4fHfu2a', 'USER', 'AKTIF', '1597883925'),
(15, 'Bianco Akbar', '201643502228', '$2y$10$Zq7AAgttlARzOycA07Kf8.nSSaPsROjxxUnpy9Y8.u4pwPZe3KgT.', 'USER', 'AKTIF', '1598046943'),
(16, 'Dhimas Islah', '201643502224', '$2y$10$2e/mwhI596r0s4wkW4vADOKj6ACe47CYaEeRIKq9QJMiW3kbTfJFW', 'USER', 'MENUNGGU PERSETUJUAN', '1598046967');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `kegiatan_organisasi`
--
ALTER TABLE `kegiatan_organisasi`
  ADD PRIMARY KEY (`kegiatan_organisasi_id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`organisasi_id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`pendaftaran_id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`struktur_organisasi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kegiatan_organisasi`
--
ALTER TABLE `kegiatan_organisasi`
  MODIFY `kegiatan_organisasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `organisasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `pendaftaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `struktur_organisasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
