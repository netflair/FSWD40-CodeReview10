-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 23, 2018 at 04:51 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.18-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_patrick_klostermann_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `creator_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `type` enum('author','singer','ressigeur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`creator_id`, `first_name`, `last_name`, `type`) VALUES
(1, 'Stephen', 'King', 'author'),
(2, 'Kristin', 'Hannah', 'author'),
(3, 'Danielle', 'Steel', 'author'),
(4, 'Aurora', 'Aksnes', 'singer'),
(5, 'Metallica', NULL, 'singer'),
(6, 'David', 'Fincher', 'ressigeur'),
(7, 'Bryan', 'Konietzko', 'ressigeur'),
(8, 'Steven', 'Soderbergh', 'ressigeur');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `fk_type` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fk_creator` int(11) DEFAULT NULL,
  `description` text,
  `fk_publisher` int(11) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `reserved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `isbn`, `fk_type`, `title`, `image`, `fk_creator`, `description`, `fk_publisher`, `publish_date`, `reserved`) VALUES
(1, '99-7279-474-1', 1, 'The Outsider', 'https://prodimage.images-bn.com/pimages/9781501180989_p0_v4_s550x406.jpg', 1, 'An unspeakable crime. A confounding investigation. At a time when the King brand has never been stronger, he has delivered one of his most unsettling and compulsively readable stories.', 1, '2018-05-22', 0),
(4, '99-7213-177-7', 1, 'The Great Alone', 'https://images-na.ssl-images-amazon.com/images/I/511Dl74cE9L._SX328_BO1,204,203,200_.jpg', 2, 'Thirteen-year-old Leni, a girl coming of age in a tumultuous time, caught in the riptide of her parents’ passionate, stormy relationship, dares to hope that a new land will lead to a better future for her family.', 2, '2018-02-06', 1),
(5, '99-7267-455-10', 1, 'The Cast', 'https://images-na.ssl-images-amazon.com/images/I/51O-4Am9YOL._SX327_BO1,204,203,200_.jpg', 3, 'Thirteen-year-old Leni, a girl coming of age in a tumultuous time, caught in the riptide of her parents passionate, stormy relationship, dares to hope that a new land will lead to a better future for her family. ', 3, '2018-05-15', 0),
(6, '99-7288-263-2', 2, 'All My Demons Greeting Me', 'https://images-na.ssl-images-amazon.com/images/I/51t59y4mutL._SS500.jpg', 4, 'All My Demons Greeting Me as a Friend is the debut studio album by Norwegian singer Aurora.It was preceded as the follow up project to the Running with the Wolves extended play, which was released in May 2015.', 4, '2016-03-11', 0),
(7, '99-7280-261-2', 2, 'Master of Puppets', 'https://images-na.ssl-images-amazon.com/images/I/513OAf2edPL._SS500.jpg', 5, 'Master of Puppets is the third studio album by American heavy metal band Metallica.', 5, '1986-03-03', 1),
(8, '99-7241-268-7', 2, 'The Black Album', 'https://images-na.ssl-images-amazon.com/images/I/31ySfXa33dL._SS500.jpg', 5, 'The Black Album is the self-titled fifth studio album by American heavy metal band Metallica.', 5, '1991-08-12', 0),
(9, '99-7229-946-5', 3, 'Seven', 'https://upload.wikimedia.org/wikipedia/en/6/68/Seven_%28movie%29_poster.jpg', 6, 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', 6, '1995-09-15', 1),
(10, '99-7247-576-10', 3, 'The Social Network', 'https://upload.wikimedia.org/wikipedia/en/7/7a/Social_network_film_poster.jpg', 6, 'Harvard student Mark Zuckerberg creates the social networking site that would become known as Facebook, but is later sued by two brothers who claimed he stole their idea, and the co-founder who was later squeezed out of the business.', 7, '2010-09-24', 1),
(11, '99-7267-853-9', 3, 'Avatar - The Last Airbender', 'https://www.codefactory.academy/patrick-klostermann/avatar.jpg', 7, 'Only the Avatar has the ability to bend all four elements. The Avatar, who may be male or female, is an international arbiter whose duty is to maintain harmony among the four nations, and act as a mediator between humans and spirits.', 8, '2018-06-05', 1),
(12, '99-7283-541-3', 3, 'Ocean\'s Eleven', 'https://upload.wikimedia.org/wikipedia/en/6/68/Ocean%27s_Eleven_2001_Poster.jpg', 8, 'Following release from prison, Danny Ocean violates his parole by traveling to California to meet his partner-in-crime and friend Rusty Ryan to propose a heist.', 9, '2001-12-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media_type`
--

CREATE TABLE `media_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_type`
--

INSERT INTO `media_type` (`type_id`, `type`) VALUES
(1, 'book'),
(2, 'cd'),
(3, 'dvd');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`) VALUES
(1, 'Scribner'),
(2, 'Holtzbrinck Publishers'),
(3, 'Delacorte Press'),
(4, 'Glassnote Entertainment Group LLC'),
(5, 'Blackened Recordings'),
(6, 'New Line Cinema'),
(7, 'Columbia Pictures'),
(8, 'Paramount'),
(9, 'Warner Bros.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `username`, `user_pass`, `first_name`, `last_name`, `user_role`) VALUES
(3, 'dev@netflair.at', 'webmaster', '75cca8d87d648c1cb2f1b10e4fd36f74ffb6a3884b72faa21728bc88c8b28a97', 'Patrick', 'Klostermann', 'admin'),
(4, 'july@dooley.com', 'july', 'bd3dae5fb91f88a4f0978222dfd58f59a124257cb081486387cbae9df11fb879', 'July', 'Dooley', 'user'),
(7, 'lpion@lpion.com', 'asdf', 'f4e12c43e94497871684dc9e78922348642d4f9b75034e9715cb4e6c3bd653ac', 'asdfs', 'asdfasdf', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`creator_id`),
  ADD KEY `fk_type` (`type`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_type` (`fk_type`),
  ADD KEY `fk_creator` (`fk_creator`),
  ADD KEY `fk_publisher` (`fk_publisher`);

--
-- Indexes for table `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `creator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media_type`
--
ALTER TABLE `media_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_type`) REFERENCES `media_type` (`type_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_creator`) REFERENCES `creator` (`creator_id`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_publisher`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
