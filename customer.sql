-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220427.b008cca95d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2023 pada 10.41
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
  `kab` varchar(256) NOT NULL,
  `kec` varchar(256) NOT NULL,
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

INSERT INTO `customer` (`id_cust`, `nama_usaha`, `jenis_usaha`, `lama_usaha`, `tempat_usaha`, `npwp`, `telp`, `omzet`, `kompetitor`, `alm_usaha`, `cabang`, `kab`, `kec`, `rt`, `rw`, `pemilik`, `nik`, `hp_pemilik`, `pic`, `hp_pic`) VALUES
(14, 'TOKO ABC', 'EPC', '3 TAHUN', 'Sewa', '23232', '65767', '10000000', 'GHGHFD', 'DSDSDSDS', '1', '14', '154', '1', '1', 'FGFDF', '564543', '33432', 'VCVDSVDS', '778657'),
(15, 'TOKO TES 2', 'DFDSF', '9 TAHUN', 'SEWA', '09389832', '009379342', '13000000', 'KDMDM', 'efdfdsf', '2', '26', '261', '2', '2', 'KNFVKFD', '0383832', '00384832834', 'MDSMDM', '098373743');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kab`
--

CREATE TABLE `kab` (
  `id_kab` varchar(256) NOT NULL,
  `nama_kab` varchar(256) NOT NULL,
  `id_cabang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kab`
--

INSERT INTO `kab` (`id_kab`, `nama_kab`, `id_cabang`) VALUES
('1', 'KABUPATEN AGAM', '1'),
('2', 'KABUPATEN DHARMASRAYA', '1'),
('3', 'KABUPATEN KEPULAUAN MENTAWAI', '1'),
('4', 'KABUPATEN LIMA PULUH KOTA', '1'),
('5', 'KABUPATEN PADANG PARIAMAN', '1'),
('6', 'KABUPATEN PASAMAN', '1'),
('7', 'KABUPATEN PASAMAN BARAT', '1'),
('8', 'KABUPATEN PESISIR SELATAN', '1'),
('9', 'KABUPATEN SIJUNJUNG', '1'),
('10', 'KABUPATEN SOLOK', '1'),
('11', 'KABUPATEN SOLOK SELATAN', '1'),
('12', 'KABUPATEN TANAH DATAR', '1'),
('13', 'KOTA BUKITTINGGI', '1'),
('14', 'KOTA PADANG', '1'),
('15', 'KOTA PADANG PANJANG', '1'),
('16', 'KOTA PARIAMAN', '1'),
('17', 'KOTA PAYAKUMBUH', '1'),
('18', 'KOTA SAWAHLUNTO', '1'),
('19', 'KOTA SOLOK', '1'),
('20', 'KABUPATEN BENGKULU SELATAN', '2'),
('21', 'KABUPATEN BENGKULU TENGAH', '2'),
('22', 'KABUPATEN BENGKULU UTARA', '2'),
('23', 'KABUPATEN KAUR', '2'),
('24', 'KABUPATEN KEPAHIANG', '2'),
('25', 'KABUPATEN LEBONG', '2'),
('26', 'KABUPATEN MUKOMUKO', '2'),
('27', 'KABUPATEN REJANG LEBONG', '2'),
('28', 'KABUPATEN SELUMA', '2'),
('29', 'KOTA BENGKULU', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec`
--

CREATE TABLE `kec` (
  `id_kec` varchar(256) NOT NULL,
  `nama_kec` varchar(256) NOT NULL,
  `id_kab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kec`
--

INSERT INTO `kec` (`id_kec`, `nama_kec`, `id_kab`) VALUES
('1', 'AMPEK ANGKEK', '1'),
('2', 'AMPEK NAGARI', '1'),
('3', 'BANUHAMPU', '1'),
('4', 'BASO', '1'),
('5', 'CANDUNG', '1'),
('6', 'IV KOTO', '1'),
('7', 'KAMANG MAGEK', '1'),
('8', 'LUBUK BASUNG', '1'),
('9', 'MALALAK', '1'),
('10', 'MATUR', '1'),
('11', 'PALEMBAYAN', '1'),
('12', 'PALUPUH', '1'),
('13', 'SUNGAI PUA', '1'),
('14', 'TANJUNG MUTIARA', '1'),
('15', 'TANJUNG RAYA', '1'),
('16', 'TILATANG KAMANG', '1'),
('17', 'ASAM JUJUHAN', '2'),
('18', 'KOTO BARU', '2'),
('19', 'KOTO BESAR', '2'),
('20', 'KOTA SALAK', '2'),
('21', 'PADANG LAWEH', '2'),
('22', 'PULAU PUNJUNG', '2'),
('23', 'SEMBILAN KOTO', '2'),
('24', 'SITIUNG', '2'),
('25', 'SUNGAI RUMBAI DHARMASRAYA', '2'),
('26', 'TIMPEH', '2'),
('27', 'TIUMANG', '2'),
('28', 'PAGAI SELATAN', '3'),
('29', 'PAGAI UTARA', '3'),
('30', 'SIBERUT BARAT', '3'),
('31', 'SIBERUT BARAT DAYA', '3'),
('32', 'SIBERUT SELATAN', '3'),
('33', 'SIBERUT UTARA', '3'),
('34', 'SIBERUT TENGAH', '3'),
('35', 'SIKAKAP', '3'),
('36', 'SIPORA SELATAN', '3'),
('37', 'SIPORA UTARA', '3'),
('38', 'AKABILURU', '4'),
('39', 'BUKIK BARISAN', '4'),
('40', 'GUGUAK', '4'),
('41', 'GUNUANG OMEH', '4'),
('42', 'HARAU', '4'),
('43', 'KAPUR IX', '4'),
('44', 'LAREH SAGO HALABAN', '4'),
('45', 'LUAK', '4'),
('46', 'MUNGKA', '4'),
('47', 'PANGKALAN KOTO BARU', '4'),
('48', 'PAYAKUMBUH', '4'),
('49', 'SITUJUAH LIMO NAGARI', '4'),
('50', 'SULIKI', '4'),
('51', '2X11 ENAM LINGKUNG', '5'),
('52', '2X11 KAYU TANAM', '5'),
('53', 'IV KOTO AUR MALINTANG', '5'),
('54', 'V KOTO KAMPUNG DALAM', '5'),
('55', 'V KOTO TIMUR', '5'),
('56', 'VII KOTO SUNGAI SARIK', '5'),
('57', 'BATANG ANAI', '5'),
('58', 'BATANG GASAN', '5'),
('59', 'ENAM LINGKUNG', '5'),
('60', 'LUBUK ALUNG', '5'),
('61', 'NAN SABARIS', '5'),
('62', 'PADANG SAGO', '5'),
('63', 'PATAMUAN', '5'),
('64', 'SINTUK TOBOH GADANG', '5'),
('65', 'SUNGAI GERINGGING', '5'),
('66', 'SUNGAI LIMAU', '5'),
('67', 'ULAKAN TAPAKIS', '5'),
('68', 'BONJOL', '6'),
('69', 'DUO KOTO', '6'),
('70', 'LUBUK SIKAPING', '6'),
('71', 'PANTI', '6'),
('72', 'MAPAT TUNGGUL', '6'),
('73', 'MAPAT TUNGGUL SELATAN', '6'),
('74', 'PADANG GELUGUR', '6'),
('75', 'RAO', '6'),
('76', 'RAO SELATAN', '6'),
('77', 'RAO UTARA', '6'),
('78', 'SIMPANG ALAHAN MATI', '6'),
('79', 'TIGO NAGARI', '6'),
('80', 'GUNUNG TULEH', '7'),
('81', 'KINALI', '7'),
('82', 'KOTO BALINGKA', '7'),
('83', 'LEMBAH MELINTANG', '7'),
('84', 'LUHAK NAN DUO', '7'),
('85', 'PASAMAN', '7'),
('86', 'RANAH BATAHAN', '7'),
('87', 'SASAK RANAH PESISIR', '7'),
('88', 'SUNGAI AUR', '7'),
('89', 'SUNGAI BEREMAS', '7'),
('90', 'TALAMAU', '7'),
('91', 'IV JURAI', '8'),
('92', 'IV NAGARI BAYANG UTARA', '8'),
('93', 'AIRPURA', '8'),
('94', 'BASA AMPEK BALAI TAPAN', '8'),
('95', 'BATANG KAPAS', '8'),
('96', 'BAYANG', '8'),
('97', 'KOTO XI TARUSAN', '8'),
('98', 'LINGGO SARI BAGANTI', '8'),
('99', 'LENGAYANG', '8'),
('100', 'LUNANG', '8'),
('101', 'PANCUNG SOAL', '8'),
('102', 'RANAH AMPEK HULU TAPAN', '8'),
('103', 'RANAH PESISIR', '8'),
('104', 'SILAUT', '8'),
('105', 'SUTERA', '8'),
('106', 'IV NAGARI', '9'),
('107', 'KAMANG BARU', '9'),
('108', 'KOTO VII', '9'),
('109', 'KUPITAN', '9'),
('110', 'LUBUK TAROK', '9'),
('111', 'SIJUNJUNG', '9'),
('112', 'SUMPUR KUDUS', '9'),
('113', 'TANJUNG GADANG', '9'),
('114', 'IX KOTO SUNGAI LASI', '10'),
('115', 'X KOTO DIATAS', '10'),
('116', 'X KOTO SINGKARAK', '10'),
('117', 'BUKIT SUNDI', '10'),
('118', 'DANAU KEMBAR', '10'),
('119', 'GUNUNG TALANG', '10'),
('120', 'HILIRAN GUMANTI', '10'),
('121', 'LEMBAH GUMANTI', '10'),
('122', 'LEMBANG JAYA', '10'),
('123', 'KUBUNG', '10'),
('124', 'JUNJUNG SIRIH', '10'),
('125', 'PANTAI CERMIN', '10'),
('126', 'PAYUNG SEKAKI', '10'),
('127', 'TIGO LURAH', '10'),
('128', 'KOTO PARIK GADANG DIATEH', '11'),
('129', 'PAUH DUO', '11'),
('130', 'SANGIR', '11'),
('131', 'SANGIR BALAI JANGGO', '11'),
('132', 'SANGIR BATANG HARI', '11'),
('133', 'SANGIR JUJUAN', '11'),
('134', 'SUNGAI PAGU', '11'),
('135', 'X KOTO', '12'),
('136', 'BATIPUH', '12'),
('137', 'BATIPUH SELATAN', '12'),
('138', 'LIMA KAUM', '12'),
('139', 'LINTAU BUO', '12'),
('140', 'LINTAU BUO UTARA', '12'),
('141', 'PADANG GANTING', '12'),
('142', 'PARIANGAN', '12'),
('143', 'RAMBATAN', '12'),
('144', 'SALIMPAUNG', '12'),
('145', 'SUNGAI TARAB', '12'),
('146', 'SUNGAYANG', '12'),
('147', 'TANJUANG BARU', '12'),
('148', 'TANJUNG EMAS', '12'),
('149', 'AUR BIRUGO TIGO BALEH', '13'),
('150', 'GUGUK PANJANG', '13'),
('151', 'MANDIANGIN KOTO SELAYAN', '13'),
('152', 'BUNGUS TELUK KABUNG', '14'),
('153', 'KOTO TANGAH', '14'),
('154', 'KURANJI', '14'),
('155', 'LUBUK BEGALUNG', '14'),
('156', 'LUBUK KILANGAN', '14'),
('157', 'NANGGALO', '14'),
('158', 'PADANG BARAT', '14'),
('159', 'PADANG SELATAN', '14'),
('160', 'PADANG TIMUR', '14'),
('161', 'PADANG UTARA', '14'),
('162', 'PAUH', '14'),
('163', 'PADANG PANJANG BARAT', '15'),
('164', 'PADANG PANJANG TIMUR', '15'),
('165', 'PARIAMAN SELATAN', '16'),
('166', 'PARIAMAN TENGAH', '16'),
('167', 'PARIAMAN TIMUR', '16'),
('168', 'PARIAMAN UTARA', '16'),
('169', 'LAMPOSI TIGO NAGORI', '17'),
('170', 'PAYAKUMBUH BARAT', '17'),
('171', 'PAYAKUMBUH SELATAN', '17'),
('172', 'PAYAKUMBUH TIMUR', '17'),
('173', 'PAYAKUMBUH UTARA', '17'),
('174', 'BARANGIN', '18'),
('175', 'LEMBAH SEGAR', '18'),
('176', 'SILUNGKANG', '18'),
('177', 'TALAWI', '18'),
('178', 'LUBUK SIKARAH', '19'),
('179', 'TANJUNG HARAPAN', '19'),
('180', 'KEDURANG', '20'),
('181', 'SEGINIM', '20'),
('182', 'PINO', '20'),
('183', 'MANNA', '20'),
('184', 'KOTA MANNA', '20'),
('185', 'PINO RAYA', '20'),
('186', 'KEDURANG ILIR', '20'),
('187', 'AIR NIPIS', '20'),
('188', 'ULU MANNA', '20'),
('189', 'BUNGA MAS', '20'),
('190', 'PASAR MANNA', '20'),
('191', 'BANG HAJI', '21'),
('192', 'KARANG TINGGI', '21'),
('193', 'MERIGI KELINDANG', '21'),
('194', 'MERIGI SAKTI', '21'),
('195', 'PAGAR JATI', '21'),
('196', 'PONDOK KELAPA', '21'),
('197', 'PONDOK KUBANG', '21'),
('198', 'PEMATANG TIGA', '21'),
('199', 'TABA PENANJUNG', '21'),
('200', 'TALANG EMPAT', '21'),
('201', 'AIR BESI', '22'),
('202', 'AIR NAPAL', '22'),
('203', 'AIR PADANG', '22'),
('204', 'ARMA JAYA', '22'),
('205', 'BATIK NAU', '22'),
('206', 'ENGGANO', '22'),
('207', 'GIRI MULYA', '22'),
('208', 'HULU PALIK', '22'),
('209', 'KERKAP', '22'),
('210', 'KETAHUN', '22'),
('211', 'KOTA ARGA MAKMUR', '22'),
('212', 'LAIS', '22'),
('213', 'MARGA SAKTI SEBELAT', '22'),
('214', 'NAPAL PUTIH', '22'),
('215', 'PADANG JAYA', '22'),
('216', 'PINANG RAYA', '22'),
('217', 'PUTRI HIJAU', '22'),
('218', 'TANJUNG AGUNG PALIK', '22'),
('219', 'ULOK KUPAI', '22'),
('220', 'KAUR SELATAN', '23'),
('221', 'KAUR TENGAH', '23'),
('222', 'KAUR UTARA', '23'),
('223', 'KELAM TENGAH', '23'),
('224', 'KINAL', '23'),
('225', 'LUNGKANG KULE', '23'),
('226', 'LUAS', '23'),
('227', 'MAJE', '23'),
('228', 'MUARA SAHUNG', '23'),
('229', 'NASAL', '23'),
('230', 'PADANG GUCI HILIR', '23'),
('231', 'PADANG GUCI HULU', '23'),
('232', 'SEMIDANG GUMAY', '23'),
('233', 'TANJUNG KEMUNING', '23'),
('234', 'TETAP', '23'),
('235', 'BERMANI ILIR', '24'),
('236', 'KEBAWETAN', '24'),
('237', 'KEPAHIANG', '24'),
('238', 'MERIGI', '24'),
('239', 'MUARA KEMUMU', '24'),
('240', 'SEBERANG MUSI', '24'),
('241', 'TEBAT KARAI', '24'),
('242', 'UJAN MAS', '24'),
('243', 'AMEN', '25'),
('244', 'BINGIN KUNING', '25'),
('245', 'LEBONG ATAS', '25'),
('246', 'LEBONG SAKTI', '25'),
('247', 'LEBONG SELATAN', '25'),
('248', 'LEBONG TENGAH', '25'),
('249', 'LEBONG UTARA', '25'),
('250', 'PINANG BELAPIS', '25'),
('251', 'RIMBO PENGADANG', '25'),
('252', 'TOPOS', '25'),
('253', 'TUBEI', '25'),
('254', 'URAM JAYA', '25'),
('255', 'V KOTO', '26'),
('256', 'XIV KOTO', '26'),
('257', 'AIR DIKIT', '26'),
('258', 'AIR MAJUNTO', '26'),
('259', 'AIR RAMI', '26'),
('260', 'IPUH', '26'),
('261', 'KOTA MUKOMUKO', '26'),
('262', 'LUBUK PINANG', '26'),
('263', 'MALIN DEMAN', '26'),
('264', 'PENARIK', '26'),
('265', 'PONDOK SUGUH', '26'),
('266', 'SELAGAN RAYA', '26'),
('267', 'SUNGAI RUMBAI MUKOMUKO', '26'),
('268', 'TERAMANG JAYA', '26'),
('269', 'TERAS TERUNJAM', '26'),
('270', 'BERMANI ULU', '27'),
('271', 'BERMANI ULU RAYA', '27'),
('272', 'BINDURIANG', '27'),
('273', 'CURUP', '27'),
('274', 'CURUP SELATAN', '27'),
('275', 'CURUP TENGAH', '27'),
('276', 'CURUP TIMUR', '27'),
('277', 'CURUP UTARA', '27'),
('278', 'KOTA PADANG REJANG LEBONG', '27'),
('279', 'PADANG ULAK TANDING', '27'),
('280', 'SELUPU REJANG', '27'),
('281', 'SINDANG BELITI ULU', '27'),
('282', 'SINDANG BELITI ILIR', '27'),
('283', 'SINDANG DATARAN', '27'),
('284', 'SINDANG KELINGI', '27'),
('285', 'SUKARAJA', '28'),
('286', 'SELUMA', '28'),
('287', 'TALO', '28'),
('288', 'SEMIDANG ALAS', '28'),
('289', 'SEMIDANG ALAS MARAS', '28'),
('290', 'AIR PERIUKAN', '28'),
('291', 'LUBUK SANDI', '28'),
('292', 'SELUMA BARAT', '28'),
('293', 'SELUMA TIMUR', '28'),
('294', 'SELUMA UTARA', '28'),
('295', 'SELUMA SELATAN', '28'),
('296', 'TALO KECIL', '28'),
('297', 'ULU TALO', '28'),
('298', 'ILIR TALO', '28'),
('299', 'GADING CEMPAKA', '29'),
('300', 'KAMPUNG MELAYU', '29'),
('301', 'MUARA BANGKA HULU', '29'),
('302', 'RATU AGUNG', '29'),
('303', 'RATU SAMBAN', '29'),
('304', 'SELEBAR', '29'),
('305', 'SINGARAN PATI', '29'),
('306', 'SUNGAI SERUT', '29'),
('307', 'TELUK SEGARA', '29');

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
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



