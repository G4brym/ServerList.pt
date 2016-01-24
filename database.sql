
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2016 at 01:29 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u421269050_sv`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `logs_userId` int(11) NOT NULL,
  `logs_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logs_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logs_ip` int(11) NOT NULL,
  PRIMARY KEY (`logs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logs_id`, `logs_userId`, `logs_action`, `logs_date`, `logs_ip`) VALUES
(1, 1, 'Login', '2015-04-08 16:37:33', 0),
(2, 1, 'Login', '2015-04-08 17:11:50', 0),
(3, 1, 'Login', '2015-04-09 18:43:21', 0),
(4, 1, 'Login', '2015-04-12 08:27:27', 0),
(5, 1, 'Login', '2015-04-12 15:11:09', 0),
(6, 1, 'New Server', '2015-04-12 15:32:58', 0),
(7, 1, 'Login', '2015-04-13 12:08:39', 0),
(8, 1, 'Login', '2015-04-13 18:14:07', 0),
(9, 1, 'Login', '2015-08-22 19:44:40', 18880);

-- --------------------------------------------------------

--
-- Table structure for table `mcservers`
--

CREATE TABLE IF NOT EXISTS `mcservers` (
  `mcs_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcs_uid` int(11) NOT NULL,
  `mcs_ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mcs_port` int(5) NOT NULL,
  `mcs_aliase` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mcs_premium` tinyint(1) NOT NULL DEFAULT '0',
  `mcs_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 -> old, 1 -> new',
  `mcs_version` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mcs_uptime` int(3) NOT NULL DEFAULT '0',
  `mcs_maxplayers` int(5) NOT NULL,
  `mcs_players` int(11) DEFAULT '0',
  `mcs_motd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mcs_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mcs_favicon` text COLLATE utf8_unicode_ci,
  `mcs_mvotes` int(11) NOT NULL DEFAULT '0' COMMENT 'monthly votes',
  PRIMARY KEY (`mcs_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mcservers`
--

INSERT INTO `mcservers` (`mcs_id`, `mcs_uid`, `mcs_ip`, `mcs_port`, `mcs_aliase`, `mcs_premium`, `mcs_type`, `mcs_version`, `mcs_uptime`, `mcs_maxplayers`, `mcs_players`, `mcs_motd`, `mcs_name`, `mcs_favicon`, `mcs_mvotes`) VALUES
(1, 0, '77.111.254.178', 25565, '', 0, 0, '1.5.2', 0, 128, 0, 'Survival/Ranks/FullEdits/Minigames/Minas/', '1111', 'data:image/png;base64,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', 0),
(2, 1, '75678.78578.857', 456123, '', 1, 0, '', 0, 52, 1, '', '22222', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcserverschecks`
--

CREATE TABLE IF NOT EXISTS `mcserverschecks` (
  `mcsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcsc_sid` int(11) NOT NULL COMMENT 'server id',
  `mcsc_players` int(11) NOT NULL,
  `mcsc_ping` int(11) NOT NULL,
  `mcsc_time` int(11) NOT NULL,
  PRIMARY KEY (`mcsc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mcserverstypes`
--

CREATE TABLE IF NOT EXISTS `mcserverstypes` (
  `mcst_id` int(11) NOT NULL AUTO_INCREMENT,
  `mcst_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mcst_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mcst_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mcserverstypes`
--

INSERT INTO `mcserverstypes` (`mcst_id`, `mcst_name`, `mcst_website`) VALUES
(1, 'Vanilla', 'https://minecraft.net/'),
(2, 'Bukkit', 'http://bukkit.org/'),
(3, 'Spigot', 'http://www.spigotmc.org/'),
(4, 'Forge', 'http://www.minecraftforge.net/'),
(5, 'Cauldron', 'http://cauldron.minecraftforge.net/'),
(6, 'Sponge', 'https://www.spongepowered.org/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_token` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgot_token` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` int(11) NOT NULL DEFAULT '10',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `disabled_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `activated`, `activation_token`, `forgot_token`, `token`, `remember_token`, `rank`, `disabled`, `disabled_reason`, `created_at`, `updated_at`) VALUES
(1, 'g4bryrm98@hotmail.com', 'Gabriel', '$2y$10$ez3O4.AByFsk.AkJ6INfHe3SRMS.CLWu5N0vhqhUWv5S0jMptVQDi', 1, '', '', 'hwTPYJGMF2TPkiy', 'Mudas8FAZePA2fEEfiUAY9h0UY0CdCZPA9XdzGbBmw7Y4pLnAggIBpotrRfS', 10, 0, NULL, '2015-02-13 00:07:37', '2015-02-17 00:19:19'),
(2, 'g4bryrm98@gmail.com', 'Emanuel', '$2y$10$XiTZ7jXUwqedH/TLEceNgu7rwrXhUsRANbswKucm/wdwLV6R7aWWa', 1, NULL, NULL, 'VCQuYAY53efSptK6b1TnlsRRAXFFBO', NULL, 10, 0, NULL, '2015-03-05 01:24:20', '2015-03-05 01:24:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
