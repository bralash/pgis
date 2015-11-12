-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 at 11:25 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `conflicts`
--

CREATE TABLE IF NOT EXISTS `conflicts` (
`id` int(11) NOT NULL,
  `conf_name` varchar(255) DEFAULT NULL,
  `conf_description` varchar(255) DEFAULT NULL,
  `name_pln` varchar(255) DEFAULT NULL,
  `age_pln` varchar(255) DEFAULT NULL,
  `edu_pln` varchar(255) DEFAULT NULL,
  `name_def` varchar(255) DEFAULT NULL,
  `age_def` varchar(255) DEFAULT NULL,
  `edu_def` varchar(255) DEFAULT NULL,
  `name_pln_sec` varchar(255) DEFAULT NULL,
  `age_pln_sec` varchar(255) DEFAULT NULL,
  `edu_pln_sec` varchar(255) DEFAULT NULL,
  `name_def_sec` varchar(255) DEFAULT NULL,
  `age_def_sec` varchar(255) DEFAULT NULL,
  `edu_def_sec` varchar(255) DEFAULT NULL,
  `pos_pln` varchar(255) DEFAULT NULL,
  `pos_def` varchar(255) DEFAULT NULL,
  `interest_pln` varchar(255) DEFAULT NULL,
  `interest_def` varchar(255) DEFAULT NULL,
  `needs_pln` varchar(255) DEFAULT NULL,
  `needs_def` varchar(255) DEFAULT NULL,
  `df_pln` varchar(255) DEFAULT NULL,
  `df_def` varchar(255) DEFAULT NULL,
  `causes` varchar(255) DEFAULT NULL,
  `conf_manifest` varchar(255) DEFAULT NULL,
  `tit_pln` varchar(255) DEFAULT NULL,
  `tit_def` varchar(255) DEFAULT NULL,
  `stake_id` varchar(255) DEFAULT NULL,
  `pot` varchar(255) DEFAULT NULL,
  `risk` varchar(255) DEFAULT NULL,
  `conf_id` varchar(255) DEFAULT NULL,
  `eco_attn` varchar(255) DEFAULT NULL,
  `wish_pln` varchar(255) DEFAULT NULL,
  `wish_def` varchar(255) DEFAULT NULL,
  `land_type_pln` varchar(255) DEFAULT NULL,
  `land_type_def` varchar(255) DEFAULT NULL,
  `land_size` varchar(255) DEFAULT NULL,
  `doc_type_pln` varchar(255) DEFAULT NULL,
  `site_plan_pln` varchar(255) DEFAULT NULL,
  `doc_type_def` varchar(255) DEFAULT NULL,
  `site_plan_def` varchar(255) DEFAULT NULL,
  `acq_day_pln` varchar(255) DEFAULT NULL,
  `acq_month_pln` varchar(255) DEFAULT NULL,
  `acq_year_pln` varchar(255) DEFAULT NULL,
  `acq_day_def` varchar(255) DEFAULT NULL,
  `acq_month_def` varchar(255) DEFAULT NULL,
  `acq_year_def` varchar(255) DEFAULT NULL,
  `sett_day_pln` varchar(255) DEFAULT NULL,
  `sett_month_pln` varchar(255) DEFAULT NULL,
  `sett_year_pln` varchar(255) DEFAULT NULL,
  `sett_day_def` varchar(255) DEFAULT NULL,
  `sett_month_def` varchar(255) DEFAULT NULL,
  `sett_year_def` varchar(255) DEFAULT NULL,
  `owner_pln` varchar(255) DEFAULT NULL,
  `owner_def` varchar(255) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `intermediaries` varchar(255) DEFAULT NULL,
  `termination_method_pln` varchar(255) DEFAULT NULL,
  `termination_method_def` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `conflicts`
--

INSERT INTO `conflicts` (`id`, `conf_name`, `conf_description`, `name_pln`, `age_pln`, `edu_pln`, `name_def`, `age_def`, `edu_def`, `name_pln_sec`, `age_pln_sec`, `edu_pln_sec`, `name_def_sec`, `age_def_sec`, `edu_def_sec`, `pos_pln`, `pos_def`, `interest_pln`, `interest_def`, `needs_pln`, `needs_def`, `df_pln`, `df_def`, `causes`, `conf_manifest`, `tit_pln`, `tit_def`, `stake_id`, `pot`, `risk`, `conf_id`, `eco_attn`, `wish_pln`, `wish_def`, `land_type_pln`, `land_type_def`, `land_size`, `doc_type_pln`, `site_plan_pln`, `doc_type_def`, `site_plan_def`, `acq_day_pln`, `acq_month_pln`, `acq_year_pln`, `acq_day_def`, `acq_month_def`, `acq_year_def`, `sett_day_pln`, `sett_month_pln`, `sett_year_pln`, `sett_day_def`, `sett_month_def`, `sett_year_def`, `owner_pln`, `owner_def`, `town`, `district`, `region`, `intermediaries`, `termination_method_pln`, `termination_method_def`) VALUES
(1, 'kfje', 'jfiejfw', 'ffjoejfo', 'oejopq', 'ofjwoj', 'pjogwwjqojwfoj', 'jfpojpoqj', 'pojfpojq', 'jpiqj', 'ojopjgop', 'ojfojoqw', 'jpojq', 'oj2foo1', 'j', '1foj', 'rfoj', 'jo', 'n', 'kqij', 'ne', 'knek', 'kknek', 'knw', '1', 'kjei', 'kknf', 'feioj', 'kfj', 'knskq', '1', '1', 'wiwj', 'nvw', '1', '1', '1', '1', '1', '2', '2', '09', '10', '2014', '02', '12', '2015', '01', '10', '2014', '14', '09', '2014', NULL, 'Freehold', 'jjnwkj', 'nvwoh', 'kqi', 'knsff', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `graph_images`
--

CREATE TABLE IF NOT EXISTS `graph_images` (
`id` int(11) NOT NULL,
  `conflict_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `graph_images`
--

INSERT INTO `graph_images` (`id`, `conflict_id`, `image`) VALUES
(1, 6, '../img/graph6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'kwasi', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conflicts`
--
ALTER TABLE `conflicts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graph_images`
--
ALTER TABLE `graph_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conflicts`
--
ALTER TABLE `conflicts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `graph_images`
--
ALTER TABLE `graph_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
