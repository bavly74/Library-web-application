-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 12:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maharatech`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `submission date` date NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `edition`, `number`, `submission date`, `imgpath`, `price`) VALUES
(13, 'the book thief', 'markus zusak', 6, 0, '2022-05-09', 'the-book-thief.jpg', 25),
(17, 'it ends with us', 'kelly clarekson', 1, 0, '2001-08-12', 'it-ends-with-us.webp', 30),
(18, 'the book thief 2', 'markus zusak', 3, 4, '2021-06-03', 'markus.webp', 50),
(19, 'the black girl', 'Zakya Dalila', 3, 6, '2022-02-27', 'black-girl.jpg', 35),
(20, 'george orwell', 'george orwell', 1, 3, '2022-02-08', 'george-orwell.jpg', 60),
(21, 'Jameela Green', 'Zarqa Nawaz', 5, 5, '2001-01-01', 'jameela.jpg', 20),
(22, 'Red White and Royal blue', 'Casy', 1, 6, '2001-05-05', 'red-white.webp', 65),
(23, 'the lamplightness', 'kelly clarekson', 1, 6, '2001-02-01', 'the-lamp.webp', 45),
(24, 'the color purble', 'Alice walker', 5, 6, '2001-01-01', 'purple.webp', 55),
(25, 'read people like a book', 'markus zusak', 5, 6, '2001-02-03', 'red-ppl.jpg', 70);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `bookID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `userID`) VALUES
(159, 22),
(160, 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `bookID` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(11) NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `invoiceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `bookID`, `quantity`, `price`, `orderDate`, `invoiceID`) VALUES
(66, 13, 1, 25, '2022-09-26 23:41:36', 160),
(67, 17, 1, 30, '2022-09-26 23:41:36', 160);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `start Date` date NOT NULL DEFAULT current_timestamp(),
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `city`, `phone`, `start Date`, `admin`) VALUES
(1, 'bavly', 'Bavly.eskander74@gmail.com', 111, 'giza', 125955854, '2022-09-13', 1),
(8, 'adel', 'adel7@gmail.com', 123123, 'cairo', 1236589712, '2022-09-13', 0),
(9, 'ahmed', 'a@gmail.com', 321, 'cairo', 111222333, '2022-09-15', 0),
(17, 'mona', 'mm@gmail', 123, 'cairo', 121212, '2022-09-20', 1),
(18, 'adel2', 'ff@gmail', 123123, 's', 88888, '2022-09-22', 1),
(19, 'adel3', 'd@gmail', 11, 's', 7777, '2022-09-22', 0),
(20, 'ahmed20', 'h@gmail.com', 123, 'giza', 121212122, '2022-09-26', 0),
(21, 'ahmed5', 'h@gmail.com', 123, 'giza', 12455646, '2022-09-26', 0),
(22, 'ahmed5', 'h@gmail', 123, 'giza', 12486375, '2022-09-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemID` (`bookID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `invoiceID` (`invoiceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
