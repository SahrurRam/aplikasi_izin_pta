-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Agu 2024 pada 15.10
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_adm` int NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `no_cuti` varchar(30) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi` int NOT NULL,
  `keterangan` text NOT NULL,
  `leader` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `manager` varchar(30) NOT NULL,
  `spv` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stt_cuti` varchar(50) NOT NULL,
  `ket_reject` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `hrd_app` int NOT NULL DEFAULT '0',
  `lead_app` int NOT NULL DEFAULT '0',
  `spv_app` int NOT NULL DEFAULT '0',
  `mng_app` int NOT NULL DEFAULT '0',
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`no_cuti`, `npp`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `durasi`, `keterangan`, `leader`, `manager`, `spv`, `stt_cuti`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`, `waktu`) VALUES
('11052019221922', '12345', '2019-05-11', '2019-05-12', '2019-05-13', 2, 'asda', '11111', '', '', 'Menunggu Approval Leader', '', 0, 0, 0, 0, '00:00:00'),
('12052019121722', '11111', '2019-05-12', '2019-05-14', '2019-05-14', 1, 'Menengok orang tua', '', '33333', '22222', 'Menunggu Approval HRD', '', 0, 0, 0, 0, '00:00:00'),
('12052019143232', '22222', '2019-05-12', '2019-05-16', '2019-05-16', 1, 'Jalan jalan', '', '33333', '', 'Menunggu Approval HRD', '', 0, 0, 0, 0, '00:00:00'),
('13052019195049', '33333', '2019-05-13', '2019-05-14', '2019-05-14', 1, 'asdakjd', '', '', '', 'Approved', '', 1, 0, 0, 0, '00:00:00'),
('14052019105620', '12345', '2019-05-14', '2019-05-16', '2019-05-17', 2, 'kjfsk', '11111', '33333', '22222', 'Approved', '', 1, 1, 1, 1, '00:00:00'),
('17082024215813', '11111', '2024-08-17', '2024-08-17', '2024-08-17', 1, 'test', NULL, '33333', NULL, 'Menunggu Approval Pejabat', NULL, 0, 0, 0, 0, '22:58:00'),
('17082024220108', '11111', '2024-08-17', '2024-08-23', '2024-08-23', 1, 'sakit', NULL, '33333', NULL, 'Menunggu Approval Pejabat', NULL, 0, 0, 0, 0, '22:00:00'),
('17082024220342', '11111', '2024-08-17', '2024-08-22', '2024-08-23', 2, 'sakit', NULL, '33333', NULL, 'Menunggu Approval Pejabat', NULL, 0, 0, 0, 0, '10:03:00'),
('17082024220542', '11111', '2024-08-17', '2024-08-19', '2024-08-20', 2, 'sakit', NULL, '33333', NULL, 'Menunggu Approval Pejabat', NULL, 0, 0, 0, 0, '00:00:00'),
('17082024221000', '11111', '2024-08-17', '2024-08-19', '2024-08-20', 2, 'Sakit', NULL, '33333', NULL, 'Menunggu Approval Pejabat', NULL, 0, 0, 0, 0, '23:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `npp` varchar(20) NOT NULL,
  `nama_emp` varchar(100) NOT NULL,
  `jk_emp` varchar(20) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `divisi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `jml_cuti` int NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_emp` text NOT NULL,
  `active` varchar(20) NOT NULL,
  `id_adm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`npp`, `nama_emp`, `jk_emp`, `telp_emp`, `divisi`, `jabatan`, `alamat`, `hak_akses`, `jml_cuti`, `password`, `foto_emp`, `active`, `id_adm`) VALUES
('02914019248', 'Aut magni delectus ', 'Perempuan', '38', NULL, 'Molestias ea sed hic', 'Unde cupiditate sunt', 'Supervisor', 17, '02914019248', 'foto02914019248a.jpg', 'Aktif', 1),
('11111', 'Test Leader', 'Laki-Laki', '012381238', 'IT', 'Leader IT', 'Jakarta', 'Staff', 5, '11111', 'foto111112.jpg', 'Aktif', 1),
('12345', 'Test Pegawai', 'Laki-Laki', '0812983198', 'IT', 'Staff IT', 'Jakarta', 'Pegawai', 2, '12345', 'foto12345o.jpg', 'Aktif', 1),
('22222', 'Test Supervisor', 'Laki-Laki', '08129181998', 'IT', 'Spv IT', 'Jakarta', 'Supervisor', 1, '22222', 'foto22222y.jpg', 'Aktif', 1),
('33333', 'Test Manager', 'Laki-Laki', '081287189898', 'IT', 'Manager IT', 'Jakarta', 'Pejabat', 1, '33333', 'foto33333r.jpg', 'Aktif', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no_cuti`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`npp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
