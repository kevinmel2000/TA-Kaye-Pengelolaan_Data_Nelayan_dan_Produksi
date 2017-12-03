-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2015 at 04:26 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_carousel`
--





--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `konten` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `tanggal`, `gambar`, `judul`, `konten`) VALUES
(1, '2015-08-03', 'hapus07.jpg', 'XL Geber 4G di Jakarta November, Bekasi Diminta Bersabar', 'Akhir November 2015, XL Axiata dipastikan bakal melakukan komersialisasi 														layanan 4G LTE di Jakarta. Namun untuk Bekasi dan Depok harus lebih bersabar.\r\n\r\nSaat ini trend kecepatan bandwidth merupakan fitur yang sangat didambakan oleh pengguna jaringan mobile. Hal ini juga sesuai dengan kebutuhan data yang terus meningkat setiap bulannya. Investasi dibidang LTE sangat menjanjikan bagi para Operator GSM di Indonesia.'),
(2, '2015-08-17', 'hapus06.jpg', 'Menteri ESDM Serahkan Jatah Saham 10% Blok Migas ke Jateng dan Jabar', 'Semarang -Menteri Energi Sumber Daya Mineral (ESDM) Sudirman Said menyerahkan jatah saham atau Participating Interest (PI) kepada Pemerintah Daerah (Pemda) Jawa Tengah (Jateng) dan Jawa Barat (Jabar). Selain itu Menteri Sudirman juga menyerahkan Surat Keputusan Penugasan Pengelolaan Jaringan Gas Rumah Tangga kepada PT Perusahaan Gas Negara (Persero) Tbk.\r\n\r\nProvinsi Jawa Tengah melalui Gubernur Jateng Ganjar Pranowo menerima PI 10% wilayah kerja Muria yang dioperasikan Petronas. Sedangkan Jawa Barat yang diwakilkan oleh Asisten Bidang Perekonomian dan Pembangunan Setda Provinsi Jabar, Yerry Yanuar menerima 10% wilayah kerja Offshore North West Java (ONWJ) yang dikelola PT Pertamina Hulu Energi (PHE) ONWJ.\r\n\r\n"Kita sampaikan hak partisipasi ini masing-masing 10% kepada Jawa Tengah dan Jawa Barat," kata Sudirman dalam sambutannya di acara penyerahan PI tersebut dilakukan di kantor Gubernur Jawa Tengah, Jalan Pahlawan, Semarang, Rabu (19/8/2015) malam. \r\n\r\nSudirman menambahkan, nilai hak dan kewajiban dari pemberian PI kepada Pemda Jawa Barat dan Jawa Tengah berbeda, karena Jawa Barat sudah berproduksi sedangkan Blok Muria di Jawa tengah baru produksi pada September mendatang.\r\n\r\n"Jabar masuk sudah terkoneksi. Jateng harus sabar karena September baru produksi," katanya.\r\n\r\nGubernur Jawa Tengah, Ganjar Pranowo mengatakan, pihaknya menyambut positif penyerahan PI tersebut. Meski demikian, ia mengakui memang masih banyak pertanyaan terkait pembagian partisipasi seperti di Blok Cepu, Bojonegoro.\r\n'),
(3, '2015-08-14', 'hapus05.jpg', 'Impian Itu Berupa Rumah Sakit di Arab Saudi', 'Jakarta - Malam di Asrama Pondok Haji Pondok Gede, Jakarta Timur, ketika Menkes Nila A Moeloek mengisi sambutan di acara pelepasan petugas haji. Di hadapan ratusan petugas yang memadati gedung SG-3 Nila mengungkapkan betapa butuhnya Indonesia memiliki sebuah rumah sakit haji di Arab Saudi.\r\n\r\n"Saya ingin sekali punya rumah sakit sendiri," tutur Nila, Rabu (19/8/2015). \r\n\r\nJemaah haji Indonesia adalah yang terbesar dengan jumlahnya mencapai 155.200 orang tahun ini. Keberadaan RS di Arab Saudi sangat sesuai dengan  kondisi demografi jemaah haji Indonesia.\r\n\r\n"Jemaah banyak dari daerah. Banyak pakai bahasa daerah dan beda budaya. Kalau ke RS Arab Saudi bisa terkendala," tuturnya.\r\n\r\nIndonesia bukan tanpa usaha mewujudkan mimpi ini. Sejumlah pejabat setempat sudah didatangi tetapi hasilnya buntu.\r\n\r\n"Kita bertemu menteri haji. Orangnya baik, santun. Beliau minta maaf saat ini sudah ada aturan dari negaranya," kata Nila.\r\n\r\nArab Saudi berpendapat semua orang yang datang ke Tanah Suci adalah tamu Allah. Merupakan kewajibannya untuk melayani tamu-tamu Allah itu.\r\n\r\nSalah satu alasan lain kenapa hanya ada balai pengobatan, bukan RS adalah standardisasi. Bahkan Nila berpesan agar petugas kesehatan haji menggunakan standard internasional dalam memberikan pelayanan  kepada jemaah.\r\n\r\n"Standard internasional tolong diperhatikan. Jangan sampai ditutup balai pengobatannya. Nanti kita nggak punya apa-apa lagi," ujarnya');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
