-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 02:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demoStoreNew`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `name`, `price`, `description`, `img_path`, `category_id`) VALUES
(1, 'Product 1', '600', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 1),
(2, 'Product 2', '850', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 1),
(3, 'Product 3', '456', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 2),
(4, 'Product 4', '898', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 2),
(5, 'Product 5', '543', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 3),
(6, 'Product 6', '228', 'Lorem ipsum is simply dummy text of the printing a..', 'https://via.placeholder.com/350x250', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `uname`, `email`, `address`, `pw`) VALUES
(1, '', 'gdf@rmail.dom', 'fdgd', '38fc6751c055a7edc420679c1fef24c18ef5606a'),
(2, '', 'mail@rmail.com', 'address', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(3, 'trytry', 'tytr@rmail.com', 'trytr', '0fbc9f8a865c5ddc2e8b74b4b01e931caf31f764'),
(4, 'gfd', 'gdf@rmail.dom', 'gdf', '30e0c510958c33b6a29f8b7ec2b640fe022f80ad'),
(5, 'gdfgf', 'fgdfgdf@email.dfd', 'f', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(6, 'fgdf', 'dfgdf@fsdf.ghf', 'fggf', '72f77e84ba0149b2af1051f1318128dccf60ab60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD CONSTRAINT `tbl_items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
