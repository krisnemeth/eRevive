-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2024 at 12:10 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20406629_erevive`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `prod_condition` varchar(50) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(80) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `brand`, `prod_condition`, `age`, `description`, `image`, `price`, `user_id`) VALUES
(55, 'Microwave', 'Samsung', 'Ususal wear', 'More than 2 years', 'My old microwave, got a new one would like to sell. 900W.', 'uploads/63ff7fc2459047.51203884.jpg', 50.00, 13),
(56, 'MPK Mini keyboard', 'Akai', 'Good', 'Less than 1 year', 'Music production keyboard with programmable MIDI pads. USB cable included.', 'uploads/63ff8078cf7a73.54369593.jpg', 90.00, 13),
(57, '3310 mobile phone', 'Nokia', 'Poor', 'More than 2 years', 'A true relic of a bygone era. Barely working, but working nonetheless. Good amount of scratches on the casing after having dropped it a million times. Still working though. Priceless find if you ask me. ', 'uploads/63ff81680bbc32.18848412.jpg', 20.00, 13),
(58, 'Razr mobile phone', 'Motorola', 'Poor', 'More than 2 years', 'Another timeless classic.', 'uploads/63ff82ff169b36.50611179.jpg', 25.00, 13),
(59, 'Major III Headphones', 'Marshall', 'Good', 'Less than 1 year', 'Wireless or wired headphones. Sound amazing, bit too small for my ears.', 'uploads/63ff8346631d95.97340940.jpg', 75.00, 13),
(60, 'Microtubes 900 Bass Amp (Limited Edition)', 'Darkglass', 'Good', 'More than 2 years', 'Tube bass amplifier with a small footprint, but great power. Kept it in a case, its in brilliant condition.', 'uploads/63ff85397073c2.80847494.jpg', 800.00, 13),
(61, 'Alpha & Omega Bass pre-amp', 'Darkglass', 'Ususal wear', 'More than 2 years', 'Bass pre-amp, with beefy sound. Good condition, minor scratching.', 'uploads/63ff85987a4c53.32811627.jpg', 70.00, 13),
(62, 'HS5 Active Speaker (pair)', 'Yamaha', 'Ususal wear', 'Less than 1 year', 'Great sounding studio monitor pair. No stand, no cables. Just the speakers.', 'uploads/63ff8608e1a774.98356858.jpg', 250.00, 13),
(63, 'Airpods headphones', 'Apple', 'Like new', 'New', 'Bought it for myself, but my boyfriend got me better ones.', 'uploads/63ff865a0a64a4.63571938.jpeg', 80.00, 14),
(64, 'Switch game console', 'Nintendo', 'Good', '2 years', 'Nintendo game console, handheld or docked. Including the HDMI and charging cables.', 'uploads/63ff86bbe5e2b0.37051711.jpg', 200.00, 14),
(65, 'Watch series 2', 'Apple', 'Ususal wear', 'More than 2 years', 'My old smartwatch. Still works fine.', 'uploads/63ff86ef0096d7.10307678.jpg', 70.00, 14),
(66, 'iPad Mini tablet', 'Apple', 'Poor', 'More than 2 years', 'Old iPad mini. Lot of scratches, only 16 GB storage. Good for on-the-go reading though.', 'uploads/63ff877c1835d5.56729162.jpeg', 50.00, 14),
(67, 'Pixel 6', 'Google', 'Good', 'Less than 1 year', 'Google pixel 6 android phone. Minor scratching, some on the screen.', 'uploads/63ff87c7055501.26670047.jpg', 450.00, 14),
(68, '24\" monitor', 'HP', 'Good', 'More than 2 years', 'My old PC monitor, 24@, 60Hz. Nothing too fancy.', 'uploads/63ff88229cfc50.30147599.jpg', 50.00, 14),
(69, 'Galaxy S22 Ultra', 'Samsung', 'Ususal wear', 'Less than 1 year', 'Samsung s22 Ultra phone. Some scratches, but otherwise works.', 'uploads/63ff88abaaf6b5.85868643.jpg', 750.00, 14),
(70, 'VHS Player', 'Panasonic', 'Poor', 'More than 2 years', 'Old VHS player found in the attic. Dusty, but works. Could probably include all the tapes with it.', 'uploads/63ff89188c7988.05907187.jpg', 30.00, 14),
(71, 'Keyboard', 'IBM', 'Poor', 'More than 2 years', 'My Dads first keyboard. Would probably need an USB adaptor for it. Sentimental value it holds.', 'uploads/63ff8a8e328416.99043013.jpg', 5.00, 15),
(72, 'Portable SSD Drive', 'Sandisk', 'Like new', 'Less than 6 months', 'External SSD, 500GB. Mint condition.', 'uploads/63ff8adc824d58.24558717.jpg', 99.00, 15),
(73, 'Blade 15\"', 'Razer', 'Good', '2 years', 'The MacBook of all gaming laptops. i7, 32GB RAM, 1TB SSD, GTX2080Ti. Need I say more.', 'uploads/63ff8b44562f35.13049671.jpeg', 1900.00, 15),
(74, 'XPS 13\"', 'Dell', 'Good', '2 years', 'Dell XPS laptop. Lightweight, portable coding machine. i7, 16GB RAM, 500GB SSD. ', 'uploads/63ff8c0f15a987.32908992.jpg', 700.00, 15),
(75, 'Airpods Pro headphones', 'Apple', 'Good', 'Less than 1 year', 'Pro headphones, great sound, in-ear design.', 'uploads/63ff8c5234ad00.07772375.jpg', 120.00, 15),
(76, 'K70 TKL Mechanical Gaming Keyboard', 'Corsair', 'Like new', 'New', 'RGB mechanical gaming keyboard, with no numpad. More space for your mouse!', 'uploads/63ff8c9c1a2366.48823849.jpg', 90.00, 15),
(77, 'Gameboy Color', 'Nintendo', 'Poor', 'More than 2 years', 'An ancient relic of gaming. Including Pokemon Fire edition game.', 'uploads/63ff8cd2433ec2.18447971.jpg', 35.00, 15),
(78, 'Scarlett 2i4 Audio Interface', 'Focusrite', 'Good', 'More than 2 years', 'Excellent external audio interface for all your home-studio needs.', 'uploads/63ff8d19240cc7.39424262.jpeg', 60.00, 15),
(79, '5D Mark II Digital Camera', 'Canon', 'Ususal wear', 'More than 2 years', 'Canon 5D Mark II camera with stock lens.', 'uploads/63ff8da4e2caf8.98704706.jpg', 250.00, 15),
(80, 'Xbox Elite Controller', 'Microsoft', 'Like new', 'New', 'Never used it. I use mouse and keyboard on my console to have an advantage over other console players.', 'uploads/63ff8e229d7e19.70364955.jpg', 130.00, 15),
(81, 'Chromebook 11', 'Acer', 'Ususal wear', 'More than 2 years', '11 inch laptop. i5, 8GB RAM, 128GB SSD. Small form factor, small performance, small price.', 'uploads/63ff8e83038015.16290261.jpeg', 200.00, 15),
(82, 'iPhone 11', 'Apple', 'Ususal wear', 'More than 2 years', 'Major scratching on the back glass. 64GB storage, both cameras still work. Black.', 'uploads/63ff8ec6d6b860.49238555.jpg', 250.00, 15),
(83, 'iPhone 14 Pro', 'Apple', 'Like new', 'New', '128GB storage, three amazing cameras. No scratches, perfect condition. Case, charging cable included.', 'uploads/63ff90c4803538.85994153.jpg', 1100.00, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(13, 'Kris', 'krsnmth@gmail.com', '5ef8a77c3ae9d708a40d17c75fe8d036'),
(14, 'Lizz', 'lizzwayt14@gmail.com', '0679ac1581611294c955f71cc1c87925'),
(15, 'Admin', 'admin@erevive.com', '3639a227124d84ca8ab1bf59828a949b'),
(16, 'Test', 'test@test.com', 'd75945512f9dd141d65527080aefcce8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
