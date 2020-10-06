-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2020 pada 07.50
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `tipe` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `level`, `tipe`) VALUES
(2, 'bayu@gmail.com', '1f0138450007d51e6317174f3100599f', 'user', 'siswa'),
(6, 'bukalapak@gmail.com', '3980309a0d6b307de4a5689a998b77cd', 'user', 'perusahaan'),
(9, 'Google@gmail.com', '7dba5dce8fd0029e11d603f4ec65029d', 'user', 'perusahan'),
(17, 'ubay@gmail.com', 'b1a4102578c4674ecfd6e2caa9766d12', 'user', 'siswa'),
(19, 'smkn4malang@sch.id', 'b6c4941b49a0d65c6bf5cc5684c4362e', 'user', 'perusahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karya_siswa`
--

CREATE TABLE `karya_siswa` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `judul` varchar(22) NOT NULL,
  `link` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karya_siswa`
--

INSERT INTO `karya_siswa` (`no`, `id`, `judul`, `link`, `foto`, `waktu`) VALUES
(5, 17, 'from zero to hero', 'https://bayufirmansyah2800.github.io', '5f714a1f4947f.jpeg', '28-09-2020'),
(8, 2, 'My First ', 'bayufirmansyah2800.github.io', '5f720f0273b26.jpg', '28-09-2020'),
(9, 2, 'test', 'bayufirmansyah2800.github.io', '5f74302a9c691.jpg', '30-09-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE `lowongan` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `kebutuhan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`no`, `id`, `nama_perusahaan`, `kebutuhan`, `lokasi`, `kota`, `jurusan`, `gaji`, `waktu`, `foto`) VALUES
(6, 9, 'Google', 'Full-Stack ', 'jl. jendral sudirman no 53 ', 'Jakarta', 'Rekayasa Perangkat Lunak', '2000000', '27-09-2020', '5f709a1c4de36.png'),
(7, 9, 'Google', 'Desainer Logo', 'jl. jendral sudirman no 53 ', 'Jakarta', 'Desain', '1000000', '27-09-2020', '5f709a1c4de36.png'),
(8, 19, 'SMKN 4 MALANAG', 'Editor Adobe Premiere', 'Jl.Tanimbar no 22 ', 'Malang', 'Multimedia', '1000000', '27-09-2020', '5f70b9ac3189d.jpg'),
(11, 6, 'PT.Bukalapak id', 'Editor', 'JL.Mangga Dua no 17 ', 'Depok', 'Rekayasa Perangkat Lunak', '3000000', '30-09-2020', '5f68b64fbe880.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_perusahaan`
--

CREATE TABLE `profil_perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`id`, `nama`, `alamat`, `telp`, `email`, `foto`) VALUES
(6, 'PT.Bukalapak id', 'JL.Mangga Dua no 17 Depok', '0347979208', 'bukalapak@gmail.com', '5f68b64fbe880.png'),
(9, 'Google', 'jl. jendral sudirman no 53 Jakarta', '0341 600913', 'Google@gmail.com', '5f709a1c4de36.png'),
(19, 'SMKN 4 MALANAG', 'Jl.Tanimbar no 22 Malang', '0341 600913', 'smkn4malang@sch.id', '5f70b9ac3189d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `sekolah` varchar(60) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_siswa`
--

INSERT INTO `profil_siswa` (`id`, `nama`, `kota`, `sekolah`, `jurusan`, `foto`) VALUES
(2, 'Bayu FIrmansyah', 'Kota Malang', 'SMKN 4 MALANG', 'Rekayasa Perangkat Lunak', '5f6725c61549a.png'),
(3, 'Wildan Fajar Maulana', 'Jakarta', 'SMK Telkom Jakarta', 'Rekayasa Perangkat Lunak', '5f675feb97e93.jpg'),
(5, 'ubaay gans', 'jakartans', 'SMK Telkom Jaktim', 'Rekayasa Perangkat Lunak', '5f68369ab00c0.png'),
(17, 'Bayu Firmansyah', 'Bandung', 'SMK Telkom Bandung', 'Rekayasa Perangkat Lunak', '5f70b81f3bb6c.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karya_siswa`
--
ALTER TABLE `karya_siswa`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `karya_siswa`
--
ALTER TABLE `karya_siswa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
