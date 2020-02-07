-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 07:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nightlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'kristian.kz', 'kristi');

-- --------------------------------------------------------

--
-- Table structure for table `biznes`
--

CREATE TABLE `biznes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` tinytext NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biznes`
--

INSERT INTO `biznes` (`id`, `name`, `username`, `password`, `email`, `phone`, `image`) VALUES
(4, 'Diesis', 'diesis.kz', 'diesis', 'Kzarka30@gmail.com', '0686687483', 'diesis.jpg'),
(5, 'Lollipop', 'loli.kz', 'loli', 'valentino.zarka@gmail.com', '056747737', 'lolli.jpg'),
(6, 'Folie Tarace', 'foli.kz', 'foli', 'kristjanzarka@gmail.com', '089463737', 'foli.jpg'),
(8, 'Magic 4', 'magic.kz', 'magic', 'kristjanzarka@gmail.com', '04393873722', 'magic.jpg'),
(26, 'Tema', 'tema.kz', 'tema', 'kzarka30@gmail.com', '09887653', 'tema.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) UNSIGNED NOT NULL,
  `name1` varchar(30) NOT NULL,
  `nrpersons` varchar(50) NOT NULL,
  `phone` tinytext NOT NULL,
  `emri_eventit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name1`, `nrpersons`, `phone`, `emri_eventit`) VALUES
(51, 'Kristjan', '4', '0694846374', 'Diesis Night'),
(53, 'Kristjan', '4', '06845637864', 'Chill night');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(9, 'Live Music'),
(10, 'Club'),
(11, 'Bar Restorant'),
(12, 'Lounge '),
(13, 'Resto Club'),
(15, 'Resto Lounge'),
(16, 'Street Party'),
(17, 'Bistro'),
(20, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) UNSIGNED NOT NULL,
  `day_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_title`) VALUES
(8, 'E Hene'),
(9, 'E Marte'),
(10, 'E Merkure'),
(11, 'E Enjte'),
(12, 'E Premte'),
(13, 'E Shtune'),
(14, 'E Diele');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `event_category` varchar(30) NOT NULL,
  `event_day` varchar(50) NOT NULL,
  `emri_lokalit` varchar(50) NOT NULL,
  `event_name` text NOT NULL,
  `event_price` int(50) NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(50) NOT NULL,
  `event_keywords` text NOT NULL,
  `username_lokalit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_category`, `event_day`, `emri_lokalit`, `event_name`, `event_price`, `event_description`, `event_image`, `event_keywords`, `username_lokalit`) VALUES
(6, '10', '12', 'Lollipop', 'Vitet 98', 5, 'I ftuar: Ledri Vula<br />Open bar : Coctails and Drinks<br />Ora: 23:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233 <br /> Data: 20/01/2020', 'lolli.jpg', ' club', 'loli.kz'),
(7, '10', '13', 'Folie Tarace', 'Electro beats', 6, 'I ftuar: Dj. Sardi<br />Open bar : Coctails and Drinks<br />Ora: 23:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 12/01/2020', 'foli.jpg', ' club', 'foli.kz'),
(8, '11', '10', 'Padam', 'Christmas night', 0, 'Te ftuar: Aleksander Gjoka, Elton Deda<br />Menu: E perzgjedhur<br />Ora: 11:00-23:00<br />Nr. cel: 0685762233<br />Data: 11/02/2020', 'padam.jpg', ' restorant', 'padam.kz'),
(9, '13', '13', 'Lost', 'Lost ship', 5, 'I ftuar: Dj Sardi<br />Menu: Coctails and fingerfood<br />Ora: 21:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 16/01/2020', 'lost.jpg', ' club', 'lost.kz'),
(10, '9', '11', 'Magic 4', 'Crazy people', 5, 'I ftuar: Ermal Fejzullahu<br />Menu: Coctails and Drinks<br />Ora: 23:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 16/03/2020', 'magic.jpg', ' live', 'magic.kz'),
(11, '12', '9', 'Tema', 'Chill night', 0, 'I ftuar: Dj Micky<br />Menu: Coctails and fingerfood<br />Ora: 21:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 25/01/2020', 'tema.jpg', ' cool', 'tema.kz'),
(12, '15', '14', 'Codi', 'Nata e bardhe', 0, 'I ftuar: Dj Sardi<br />Menu: Coctails and fingerfood<br />Ora: 21:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 29/01/2020', 'codi.jpg', ' chill', 'codi.kz'),
(13, '12', '12', 'Capricco', 'Crazy night', 0, 'Te ftuar: Dj. Dori, Positive Cuts<br />Menu: Coctails , beers and fingerfood<br />Ora: 21:00<br />Hyrja: Shoqeruar<br />Nr. cel: 0685762233<br />Data: 08/01/2020', 'cap.jpg', ' fancy', 'capi.kz'),
(26, '9', '13', 'Diesis', 'Diesis Night', 10, 'Te ftuar: Eugent Bushpepa, Renis Gjoka<br />Menu: Coctails and Beer<br />Ora: 23:00<br />Hyrja: Shoqeruar<br />Nr. Cel: 0696317900', 'diesis.jpg', ' rock. live', 'diesis.kz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biznes`
--
ALTER TABLE `biznes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biznes`
--
ALTER TABLE `biznes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
