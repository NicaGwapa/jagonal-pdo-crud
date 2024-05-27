-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 03:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Geek Vape', ' Known for excellent build quality and innovation, including the popular Aegis series.', 2000, 2000, 100, 'https://www.copvape.com/wp-content/uploads/2023/12/geek-vape-aegis-max-2-kit-main.jpg', '2024-05-08 00:00:00'),
(2, 'Voopoo', 'VooPoo is responsible for making some of our best selling vape kits.', 1500, 1500, 100, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS22LstprAbEw_HiTCDVBF5WiPpIXnR3BxzpQ&usqp=CAU', '2024-05-08 00:00:00'),
(4, 'MCM Vape', 'Authentic & innovative Philippine-made vaping products, such as full-mechanical box and tube mods, RDAs, RDTAs.', 2500, 2500, 100, 'https://www.vaping-delights.com/cdn/shop/products/image_2d032e5e-64a8-49c7-b1c8-f7da4de27ee6.jpg?v=1646851415', '2024-05-08 00:00:00'),
(6, 'Kalasag Full Mech', 'A beautiful Filipino box mod in the stacked version. The box is a mech box, so it has no electronics! With 4 batteries', 1200, 1200, 100, 'https://i.pinimg.com/originals/b9/34/ef/b934ef87c4a90c504ec3755859b292cd.jpg', '2024-05-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
