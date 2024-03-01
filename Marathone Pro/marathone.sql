-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 12:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marathone`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `dossard` int(10) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `pays` varchar(128) NOT NULL,
  `meilleurChrono` int(10) NOT NULL,
  `chrono` float DEFAULT NULL,
  `login` varchar(128) NOT NULL,
  `passWord` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`dossard`, `nom`, `prenom`, `sexe`, `age`, `pays`, `meilleurChrono`, `chrono`, `login`, `passWord`) VALUES
(28, 'Kim', 'Min-Jae', 'M', 27, 'South Korea', 185, 111, 'mkim', 'fastfeet78'),
(29, 'Williams', 'Olivia', 'F', 30, 'UK', 200, 11, 'owilliams', 'quickpace5'),
(30, 'Martinez', 'Javier', 'M', 34, 'Mexico', 210, 0, 'jmartinez', 'runmexico7'),
(31, 'Wang', 'Yun', 'F', 31, 'China', 240, 11, 'ywang', 'faststride'),
(32, 'Lee', 'Seong-Ho', 'M', 29, 'South Korea', 195, 12, 'slee', 'swiftsteps'),
(33, 'Brown', 'Sophia', 'F', 33, 'USA', 215, 2, 'sbrown', 'dashingspr'),
(34, 'Gomez', 'Ana', 'F', 28, 'Spain', 205, 333, 'agomez', 'speedyana4'),
(35, 'Yamamoto', 'Hiroshi', 'M', 30, 'Japan', 200, 12, 'hyamamoto', 'runhiro123'),
(37, 'Abbas', 'Karim', 'M', 35, 'Morocco', 180, 12, 'kabbas', 'runmorocco'),
(38, 'Fuentes', 'Elena', 'F', 31, 'Mexico', 235, 22, 'efuentes', 'swiftelena'),
(39, 'Park', 'Ji-Yeon', 'F', 28, 'South Korea', 220, 0, 'jypark', 'rapidrun22'),
(40, 'Nguyen', 'Tuan', 'M', 32, 'Vietnam', 210, 0, 'tnguyen', 'vietrun789'),
(41, 'Kumar', 'Arun', 'M', 30, 'India', 225, 12, 'akumar', 'runindia12'),
(42, 'Gomes', 'Isabella', 'F', 29, 'Brazil', 230, 0, 'igomes', 'brazilianr'),
(43, 'Ito', 'Yuki', 'F', 33, 'Japan', 190, 0, 'yito', 'quickyuki4'),
(44, 'Mendoza', 'Ricardo', 'M', 34, 'Argentina', 200, 0, 'rmendoza', 'runargenti'),
(45, 'Zhang', 'Wei', 'M', 31, 'China', 205, 0, 'wzhang', 'fastwei789'),
(46, 'Santos', 'Luana', 'F', 28, 'Brazil', 220, 0, 'lsantos', 'brazilians'),
(47, 'Tanaka', 'Keiko', 'F', 32, 'Japan', 215, 0, 'ktanaka', 'quickkeiko'),
(49, 'Ng', 'Hui-Min', 'F', 30, 'Singapore', 230, 0, 'hmng', 'sgswiftstr'),
(50, 'Araujo', 'Mateus', 'M', 31, 'Portugal', 200, 0, 'mearaujo', 'portuguese'),
(51, 'Choi', 'Min-Ji', 'F', 28, 'South Korea', 210, 0, 'mjchoi', 'sprintminj'),
(52, 'Silva', 'Pedro', 'M', 33, 'Brazil', 190, 0, 'psilva', 'brazilianp'),
(53, 'Singh', 'Aisha', 'F', 29, 'India', 225, 0, 'asingh', 'fastaisha1'),
(61, 'salma', 'blhrda', 'F', 20, 'Pakistan', 1, 0, 'bksalma', 'plk'),
(62, 'yassin', 'bahadi', 'M', 19, 'Morocco', 11, 0, 'bahadiyassin', 'bh'),
(69, 'Mohammed', 'Kich', 'M', 19, 'morocco', 11, 0, 'medkich', 'kich'),
(71, 'ahmed', 'kich', 'M', 22, 'morocco', 11, 199, 'ahmed', 'kich'),
(72, 'Rachel Hendricks', 'Galvin Sanders', 'F', 13, 'Voluptatibus excepte', 0, 12, 'xubox', 'Pa$$w0rd!'),
(73, 'Charde Sanford', 'Herman Porter', 'M', 32, 'Corrupti aut quasi ', 0, 13, 'jozefu', 'Pa$$w0rd!'),
(74, 'Ronan Glover', 'Lucas Randolph', 'M', 55, 'Ut iste veritatis do', 0, 23, 'zonyt', 'Pa$$w0rd!'),
(75, 'Robin Curry', 'Lucius Lopez', 'F', 12, 'Molestiae sunt occae', 0, 23, 'qifar', 'Pa$$w0rd!'),
(76, 'Kameko Alvarado', 'Damon Pacheco', 'F', 91, 'Esse atque inventore', 0, 0, 'ditucudu', 'Pa$$w0rd!'),
(77, 'Kieran Pickett', 'Daniel Haley', 'F', 84, 'Beatae minus nisi se', 0, 12, 'kykejivu', 'Pa$$w0rd!'),
(78, 'Nina Pitts', 'Bruce Garcia', 'M', 16, 'Eum consequatur Eve', 0, 211, 'lujug', 'Pa$$w0rd!'),
(79, 'Maia Bowen', 'Fiona Buckner', 'F', 54, 'Tempora reprehenderi', 0, 21, 'pefid', 'Pa$$w0rd!'),
(80, 'Valentine Chaney', 'Xerxes Spears', 'F', 62, 'Atque sunt aliquid ', 59, 12, 'tunyjy', 'Pa$$w0rd!'),
(81, 'Lucas Morin', 'Ivy Ingram', 'F', 92, 'Hic voluptas neque r', 50, 32, 'hyluti', 'Pa$$w0rd!'),
(82, 'Quintessa Hill', 'Barbara Bishop', 'F', 78, 'Duis laboris ex sunt', 19, 12, 'wenojutux', 'Pa$$w0rd!'),
(84, 'hanae', 'errajy', 'F', 19, 'maroc', 5, 12, 'hanae65', '1234'),
(85, 'yassin', 'kich', 'M', 16, 'Morocco', 11, 12, 'kishyassin', 'kich'),
(86, 'fatima', 'Lbziwiya', 'F', 19, 'cANADA', 21, 11, 'fad=oma', 'MLKJ'),
(87, 'Blossom Kane', 'Addison Olsen', 'F', 92, 'Molestiae molestiae ', 14, 0, 'jisopelyt', 'Pa$$w0rd!'),
(88, 'Quinn Black', 'Keegan Lloyd', 'F', 55, 'Sint exercitationem ', 97, 12, 'dipujede', 'Pa$$w0rd!'),
(89, 'Bo Mccray', 'Chaney Lynch', 'M', 71, 'Et ut iure deleniti ', 19, 10, 'pibotoky', 'Pa$$w0rd!'),
(90, 'Rama Wilkins', 'Hedwig Estes', 'F', 67, 'Eos ratione aut quis', 94, 20, 'cecawumo', 'Pa$$w0rd!'),
(91, 'Colton Gallagher', 'Risa Whitehead', 'M', 63, 'Sit deserunt sint au', 47, 12, 'finovyb', 'Pa$$w0rd!'),
(92, 'Remedios Mccarthy', 'Logan Drake', 'M', 3, 'Sed harum molestiae ', 55, 41, 'cyvixazu', 'Pa$$w0rd!'),
(93, 'Deborah Bond', 'Tanisha Adams', 'F', 2, 'Blanditiis tempora o', 26, NULL, 'byrys', 'Pa$$w0rd!'),
(94, 'Brock Riddle', 'Basil Barber', 'M', 16, 'Harum in dolor ipsum', 24, NULL, 'sukoneqile', 'Pa$$w0rd!'),
(95, 'Otto Kennedy', 'Veda Perkins', 'M', 82, 'In ut alias eum ad a', 92, NULL, 'wolilot', 'Pa$$w0rd!'),
(96, 'Stacey Cain', 'Jenna Knowles', 'M', 32, 'Quisquam amet moles', 69, NULL, 'nygohuryz', 'Pa$$w0rd!'),
(97, 'Naida Moon', 'Kimberley Mullen', 'F', 2, 'Do ipsum ut veniam ', 82, NULL, 'felaki', 'Pa$$w0rd!'),
(98, 'Amelia Lott', 'Macon Hewitt', 'M', 80, 'Tempor quia distinct', 1, NULL, 'tagucupebe', 'Pa$$w0rd!'),
(99, 'Iris Bullock', 'Aladdin Brown', 'M', 40, 'Quis et laboriosam ', 68, NULL, 'jyqetixon', 'Pa$$w0rd!'),
(100, 'Sierra Garrison', 'Chaim Irwin', 'F', 32, 'Fugiat ad voluptate', 91, NULL, 'liziqumuro', 'Pa$$w0rd!'),
(101, 'Amir Mack', 'Aurelia Ortiz', 'M', 37, 'Adipisci sunt exerci', 99, NULL, 'romivikoc', 'Pa$$w0rd!'),
(102, 'yassine ', 'kish', 'M', 19, 'Morocco', 10, NULL, 'kishyassine', 'kich');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`dossard`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `dossard` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
