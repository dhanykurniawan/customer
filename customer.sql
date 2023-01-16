-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220427.b008cca95d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2023 pada 07.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` varchar(256) NOT NULL,
  `nama_cabang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`) VALUES
('1', 'PADANG'),
('2', 'BENGKULU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_cust` int(11) NOT NULL,
  `nama_usaha` varchar(256) NOT NULL,
  `jenis_usaha` varchar(256) NOT NULL,
  `lama_usaha` varchar(256) NOT NULL,
  `tempat_usaha` varchar(256) NOT NULL,
  `npwp` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `omzet` varchar(256) NOT NULL,
  `kompetitor` varchar(256) NOT NULL,
  `alm_usaha` varchar(256) NOT NULL,
  `cabang` varchar(256) NOT NULL,
  `kec` varchar(256) NOT NULL,
  `kel` varchar(256) NOT NULL,
  `rt` varchar(256) NOT NULL,
  `rw` varchar(256) NOT NULL,
  `pemilik` varchar(256) NOT NULL,
  `nik` varchar(256) NOT NULL,
  `hp_pemilik` varchar(256) NOT NULL,
  `pic` varchar(256) NOT NULL,
  `hp_pic` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_cust`, `nama_usaha`, `jenis_usaha`, `lama_usaha`, `tempat_usaha`, `npwp`, `telp`, `omzet`, `kompetitor`, `alm_usaha`, `cabang`, `kec`, `kel`, `rt`, `rw`, `pemilik`, `nik`, `hp_pemilik`, `pic`, `hp_pic`) VALUES
(4, 'TOKO ABC', 'KKSKSKJKDN', '10 TAHUN', 'MILIK PRIBADI', '33989029', '081234567890', '15000000', 'jnassd', 'Jalan Sukadamai', '2', '12', '105', '1', '2', 'ANDI', '13235533099299', '089723416785', 'YUNI', '097644426799'),
(8, 'SNJSNSAS', '12', 'ded', 'ded', 'sdasd', 'asdasd', 'sadsad', '2e34', 'edded', '1', '4', '29', '000', '000', 'asdasd', 'asdasd', '082366238262', 'asdasd', 'asdasd'),
(9, 'KJNNDSSN', 'asdasd', 'asdasd', 'asdasd', 'asdsd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', '2', '14', '117', '000', '000', 'asdsd', 'asdasd', '089237287287', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec`
--

CREATE TABLE `kec` (
  `id_kec` varchar(256) NOT NULL,
  `nama_kec` varchar(256) NOT NULL,
  `id_cabang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kec`
--

INSERT INTO `kec` (`id_kec`, `nama_kec`, `id_cabang`) VALUES
('1', 'BUNGUS TELUK KABUNG', '1'),
('2', 'KOTO TANGAH', '1'),
('3', 'KURANJI', '1'),
('4', 'LUBUK BEGALUNG', '1'),
('5', 'LUBUK KILANGAN', '1'),
('6', 'NANGGALO', '1'),
('7', 'PADANG BARAT', '1'),
('8', 'PADANG SELATAN', '1'),
('9', 'PADANG TIMUR', '1'),
('10', 'PADANG UTARA', '1'),
('11', 'PAUH', '1'),
('12', 'GADING CEMPAKA', '2'),
('13', 'KAMPUNG MELAYU', '2'),
('14', 'MUARA BANGKA HULU', '2'),
('15', 'RATU AGUNG', '2'),
('16', 'RATU SAMBAN', '2'),
('17', 'SELEBAR', '2'),
('18', 'SINGARAN PATI', '2'),
('19', 'SUNGAI SERUT', '2'),
('20', 'TELUK SEGARA', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kel`
--

CREATE TABLE `kel` (
  `id_kel` varchar(256) NOT NULL,
  `nama_kel` varchar(256) NOT NULL,
  `id_kec` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kel`
--

INSERT INTO `kel` (`id_kel`, `nama_kel`, `id_kec`) VALUES
('1', 'BUNGUS BARAT', '1'),
('2', 'BUNGUS SELATAN', '1'),
('3', 'BUNGUS TIMUR', '1'),
('4', 'TELUK KABUNG SELATAN', '1'),
('5', 'TELUK KABUNG TENGAH', '1'),
('6', 'TELUK KABUNG UTARA', '1'),
('7', 'AIA PACAH', '2'),
('8', 'BALAI GADANG', '2'),
('9', 'BATANG KABUNG GANTING', '2'),
('10', 'BATIPUH PANJANG', '2'),
('11', 'BUNGO PASANG', '2'),
('12', 'DADOK TUNGGUL HITAM', '2'),
('13', 'KOTO PANJANG IKUA KOTO', '2'),
('14', 'KOTO PULAI', '2'),
('15', 'LUBUK BUAYA', '2'),
('16', 'LUBUK MINTURUN', '2'),
('17', 'PADANG SARAI', '2'),
('18', 'PARUPUK TABING', '2'),
('19', 'PASIR NAN TIGO', '2'),
('20', 'AMPANG', '3'),
('21', 'ANDURING', '3'),
('22', 'GUNUNG SARIK', '3'),
('23', 'KALUMBUK', '3'),
('24', 'KORONG GADANG', '3'),
('25', 'KURANJI', '3'),
('26', 'LUBUK LINTAH', '3'),
('27', 'PASAR AMBACANG', '3'),
('28', 'SUNGAI SAPIH', '3'),
('29', 'BANUARAN NAN XX', '4'),
('30', 'BATUNG TABA NAN XX', '4'),
('31', 'CENGKEH NAN XX', '4'),
('32', 'GATES NAN XX', '4'),
('33', 'GURUN LAWEH NAN XX', '4'),
('34', 'KAMPUNG BARU NAN XX', '4'),
('35', 'KAMPUNG JUA NAN XX', '4'),
('36', 'KOTO BARU NAN XX', '4'),
('37', 'LUBUK BEGALUNG NAN XX', '4'),
('38', 'PAGGAMBIRAN AMPALU NAN XX', '4'),
('39', 'PAMPANGAN NAN XX', '4'),
('40', 'PARAK LAWEH PULAU AIR NAN XX', '4'),
('41', 'PITAMEH TANJUNG SABA NAN XX', '4'),
('42', 'TANAH SIRAH PIAI NAN XX', '4'),
('43', 'TANJUNG AUR NAN XX', '4'),
('44', 'BANDAR BUAT', '5'),
('45', 'BATU GADANG', '5'),
('46', 'BERINGIN', '5'),
('47', 'INDARUNG', '5'),
('48', 'KOTO LALANG', '5'),
('49', 'PADANG BESI', '5'),
('50', 'TARANTANG', '5'),
('51', 'GURUN LAWEH', '6'),
('52', 'KAMPUNG LAPAI', '6'),
('53', 'KAMPUANG OLO', '6'),
('54', 'KURAO PAGANG', '6'),
('55', 'SURAU GADANG', '6'),
('56', 'TABING BANDA GADANG', '6'),
('57', 'BELAKANG TANGSI', '7'),
('58', 'BEROK NIPAH', '7'),
('59', 'FLAMBOYAN BARU', '7'),
('60', 'KAMPUNG JAO', '7'),
('61', 'KAMPUNG PONDOK', '7'),
('62', 'OLO', '7'),
('63', 'PADANG PASIR', '7'),
('64', 'PURUS', '7'),
('65', 'RIMBO KALUANG', '7'),
('66', 'UJUNG GURUN', '7'),
('67', 'AIR MANIS', '8'),
('68', 'ALANG LAWEH', '8'),
('69', 'BATANG ARAU', '8'),
('70', 'BELAKANG PONDOK', '8'),
('71', 'BUKIT GADO-GADO', '8'),
('72', 'MATO AIE', '8'),
('73', 'PASA GADANG', '8'),
('74', 'RANAH PARAK RUMBIO', '8'),
('75', 'RAWANG', '8'),
('76', 'SEBERANG PADANG', '8'),
('77', 'SEBERANG PALINGGAM', '8'),
('78', 'TELUK BAYUR', '8'),
('79', 'ANDALAS', '9'),
('80', 'GANTING PARAK GADANG', '9'),
('81', 'JATI', '9'),
('82', 'JATI BARU', '9'),
('83', 'KUBU DALAM PARAK KARAKAH', '9'),
('84', 'KUBU MARAPALAM', '9'),
('85', 'PARAK GADANG TIMUR', '9'),
('86', 'SAWAHAN', '9'),
('87', 'SAWAHAN TIMUR', '9'),
('88', 'SIMPANG HARU', '9'),
('89', 'AIR TAWAR BARAT', '10'),
('90', 'AIR TAWAR TIMUR', '10'),
('91', 'ALAI PARAK KOPI', '10'),
('92', 'GUNUNG PANGILUN', '10'),
('93', 'LOLONG BELANTI', '10'),
('94', 'ULAK KARANG SELATAN', '10'),
('95', 'ULAK KARANG UTARA', '10'),
('96', 'BINUANG KAMPUANG DALAM', '11'),
('97', 'CUPAK TANGAH', '11'),
('98', 'KAPALO KOTO', '11'),
('99', 'KOTO LUAR', '11'),
('100', 'LAMBUNG BUKIT', '11'),
('101', 'LIMAU MANIS', '11'),
('102', 'LIMAU MANIS SELATAN', '11'),
('103', 'PIAI TANGAH', '11'),
('104', 'PISANG', '11'),
('105', 'CEMPAKAN PERMAI', '12'),
('106', 'JALAN GEDANG', '12'),
('107', 'LINGKAR BARAT', '12'),
('108', 'PADANG HARAPAN', '12'),
('109', 'SIDO MULYO', '12'),
('110', 'KANDANG', '13'),
('111', 'KANDANG MAS', '13'),
('112', 'MUARA DUA', '13'),
('113', 'PADANG SERAI', '13'),
('114', 'SUMBER JAYA', '13'),
('115', 'TELUK SEPANG', '13'),
('116', 'BENTIRING', '14'),
('117', 'BENTIRING PERMAI', '14'),
('118', 'BERINGIN RAYA', '14'),
('119', 'KANDANG LIMUN', '14'),
('120', 'PEMATANG GUBERNUR', '14'),
('121', 'RAWA MAKMUR', '14'),
('122', 'RAWA MAKMUR PERMAI', '14'),
('123', 'KEBUN BELER', '15'),
('124', 'KEBUN KENANGA', '15'),
('125', 'KEBUN TEBENG', '15'),
('126', 'LEMPUING', '15'),
('127', 'NUSA INDAH', '15'),
('128', 'SAWAH LEBAR', '15'),
('129', 'SAWAH LEBAR BARU', '15'),
('130', 'TANAH PATAH', '15'),
('131', 'ANGGUT ATAS', '16'),
('132', 'ANGGUT BAWAH', '16'),
('133', 'ANGGUT DALAM', '16'),
('134', 'BELAKANG PONDOK', '16'),
('135', 'KEBUN DAHRI', '16'),
('136', 'KEBUN GERAN', '16'),
('137', 'PADANG JATI', '16'),
('138', 'PENGGANTUNGAN', '16'),
('139', 'PENURUNAN', '16'),
('140', 'BETUNGUN', '17'),
('141', 'BUMI AYU', '17'),
('142', 'PAGAR DEWA', '17'),
('143', 'PEKAN SABTU', '17'),
('144', 'SUKARAMI', '17'),
('145', 'SUMUR DEWA', '17'),
('146', 'DUSUN BESAR', '18'),
('147', 'JEMBATAN KECIL', '18'),
('148', 'LINGKAR TIMUR', '18'),
('149', 'PADANG NANGKA', '18'),
('150', 'PANORAMA', '18'),
('151', 'TIMUR INDAH', '18'),
('152', 'KAMPUNG KELAWI', '19'),
('153', 'PASAR BENGKULU', '19'),
('154', 'SEMARANG', '19'),
('155', 'SURABAYA', '19'),
('156', 'SUKA MERINDU', '19'),
('157', 'TANJUNG AGUNG', '19'),
('158', 'TANJUNG JAYA', '19'),
('159', 'BAJAK', '20'),
('160', 'BERKAS', '20'),
('161', 'JITRA', '20'),
('162', 'KAMPUNG BALI', '20'),
('163', 'KEBUN KELING', '20'),
('164', 'KEBUN ROS', '20'),
('165', 'MALABERO', '20'),
('166', 'PASAR BARU', '20'),
('167', 'PASAR MELINTANG', '20'),
('168', 'PINTU BATU', '20'),
('169', 'PONDOK BESI', '20'),
('170', 'SUMUR MELELEH', '20'),
('171', 'TENGAH PADANG', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'pskarya2022', '13d7fbdecb31ea96dd756abc1281180b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



