-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2014 at 08:20 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `author`, `date_created`) VALUES
(21, 'Fusce tristique at velit at sollicitudin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit leo a euismod malesuada. Donec tellus elit, tincidunt in ipsum eu, mollis mattis massa. Quisque rutrum aliquet est, a accumsan purus fringilla ut. Nam venenatis libero sed facilisis consequat. Nulla varius et sapien non lobortis. Donec porta nulla id tellus fringilla, quis vestibulum ante dictum. Fusce mollis, sapien non imperdiet accumsan, nibh massa tempus est, a varius nisi massa sit amet purus. Proin eu massa malesuada,', 'Matej', '2014-07-07 14:34:23'),
(22, 'Donec tellus elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit leo a euismod malesuada. Donec tellus elit, tincidunt in ipsum eu, mollis mattis massa. Quisque rutrum aliquet est, a accumsan purus fringilla ut. Nam venenatis libero sed facilisis consequat. Nulla varius et sapien non lobortis. Donec porta nulla id tellus fringilla, quis vestibulum ante dictum. Fusce mollis, sapien non imperdiet accumsan, nibh massa tempus est, a varius nisi massa sit amet purus. Proin eu massa malesuada,', 'Matej', '2014-07-07 14:46:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
