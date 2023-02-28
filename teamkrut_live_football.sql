-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2022 at 12:51 AM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamkrut_live_football`
--

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_lists`
--

CREATE TABLE `favorite_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_codes`
--

CREATE TABLE `forgot_password_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forgot_password_codes`
--

INSERT INTO `forgot_password_codes` (`id`, `email`, `verification_code`, `created_at`, `updated_at`) VALUES
(19, 'rupomehsan55@yahoo.com', 503777, '2022-07-26 11:09:19', '2022-07-26 11:09:19'),
(20, 'rupomehsan55@yahoo.com', 62664, '2022-07-26 11:09:19', '2022-07-26 11:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_requests`
--

CREATE TABLE `forgot_password_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forgot_password_requests`
--

INSERT INTO `forgot_password_requests` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(19, 'rupomehsan55@yahoo.com', 'request', '2022-07-26 11:09:19', '2022-07-26 11:09:19'),
(20, 'rupomehsan55@yahoo.com', 'request', '2022-07-26 11:09:19', '2022-07-26 11:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`team_id`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `tournament_id`, `group_name`, `team_id`, `created_at`, `updated_at`) VALUES
(5, 1, 'GROUP A', NULL, '2022-07-26 15:16:11', '2022-07-26 15:16:11'),
(6, 1, 'GROUP C', NULL, '2022-07-26 15:19:25', '2022-07-26 15:19:25'),
(7, 1, 'GROUP G', NULL, '2022-07-26 15:20:35', '2022-07-26 15:20:35'),
(8, 2, 'GROUP A', NULL, '2022-07-26 15:57:43', '2022-07-26 15:57:43'),
(9, 2, 'GROUP B', NULL, '2022-07-26 15:57:50', '2022-07-26 15:57:50'),
(10, 3, 'GROUP A', NULL, '2022-07-26 16:35:46', '2022-07-26 16:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `group_teams`
--

CREATE TABLE `group_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `tournament_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_teams`
--

INSERT INTO `group_teams` (`id`, `group_id`, `team_id`, `tournament_id`, `created_at`, `updated_at`) VALUES
(13, 6, 2, 1, '2022-07-26 15:19:36', '2022-07-26 15:19:36'),
(14, 6, 3, 1, '2022-07-26 15:19:53', '2022-07-26 15:19:53'),
(15, 7, 1, 1, '2022-07-26 15:20:45', '2022-07-26 15:20:45'),
(16, 7, 20, 1, '2022-07-26 15:21:20', '2022-07-26 15:21:20'),
(17, 5, 32, 1, '2022-07-26 15:23:54', '2022-07-26 15:23:54'),
(18, 5, 33, 1, '2022-07-26 15:24:22', '2022-07-26 15:24:22'),
(19, 5, 34, 1, '2022-07-26 15:32:09', '2022-07-26 15:32:09'),
(20, 6, 35, 1, '2022-07-26 15:48:25', '2022-07-26 15:48:25'),
(21, 7, 36, 1, '2022-07-26 15:52:04', '2022-07-26 15:52:04'),
(22, 8, 2, 2, '2022-07-26 15:58:13', '2022-07-26 15:58:13'),
(23, 8, 24, 2, '2022-07-26 15:58:41', '2022-07-26 15:58:41'),
(24, 8, 29, 2, '2022-07-26 15:59:02', '2022-07-26 15:59:02'),
(25, 9, 1, 2, '2022-07-26 15:59:43', '2022-07-26 15:59:43'),
(26, 9, 30, 2, '2022-07-26 15:59:57', '2022-07-26 15:59:57'),
(27, 9, 31, 2, '2022-07-26 16:00:44', '2022-07-26 16:00:44'),
(28, 10, 1, 3, '2022-07-26 16:36:50', '2022-07-26 16:36:50'),
(29, 10, 35, 3, '2022-07-26 16:37:46', '2022-07-26 16:37:46'),
(30, 10, 22, 3, '2022-07-26 16:38:01', '2022-07-26 16:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `manage_notifications`
--

CREATE TABLE `manage_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'mobile',
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_notifications`
--

INSERT INTO `manage_notifications` (`id`, `notification_type`, `api_key`, `app_id`, `created_at`, `updated_at`) VALUES
(1, 'mobile', 'ZTRhNzEwN2ItMDAwYi00MTU3LWFkMjEtY2Q3ZjlhODM4MDM0', '27cc369f-4903-41eb-8e36-e51cc64638ba', '2022-07-22 17:53:25', '2022-07-23 11:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `match_information`
--

CREATE TABLE `match_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `first_team_id` bigint(20) DEFAULT NULL,
  `second_team_id` bigint(20) DEFAULT NULL,
  `first_team_squad` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`first_team_squad`)),
  `second_team_squad` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`second_team_squad`)),
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_team_captain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_team_captain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_team_keeper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_team_keeper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_team_couch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_team_couch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_information`
--

INSERT INTO `match_information` (`id`, `schedule_id`, `tournament_id`, `first_team_id`, `second_team_id`, `first_team_squad`, `second_team_squad`, `link`, `link_type`, `first_team_captain`, `second_team_captain`, `first_team_keeper`, `second_team_keeper`, `first_team_couch`, `second_team_couch`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 2, 2, 24, '[{\"name\":\"Franco Armani\",\"role\":\"Goalkeeper\"},{\"name\":\"Willy Caballero\",\"role\":\"Goalkeeper\"},{\"name\":\"Cristian Ansaldi\",\"role\":\"Defender\"},{\"name\":\"Federico Fazio\",\"role\":\"Defender\"},{\"name\":\"Gabriel Mercado\",\"role\":\"Defender\"},{\"name\":\"Nicol\\u00e1s Otamendi\",\"role\":\"Defender\"},{\"name\":\"Marcos Acuna\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Brad Jones\",\"role\":\"Goalkeeper\"},{\"name\":\"Mathew Ryan\",\"role\":\"Goalkeeper\"},{\"name\":\"Aziz Behich\",\"role\":\"Defender\"},{\"name\":\"Milo\\u0161 Degenek\",\"role\":\"Defender\"},{\"name\":\"James Meredith\",\"role\":\"Defender\"},{\"name\":\"Mark Milligan\",\"role\":\"Defender\"},{\"name\":\"Tim Cahill\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=hgrldlRO25s', 'youtube', 'Franco Armani', 'Brad Jones', 'Gabriel Mercado', 'James Meredith', 'Jorge Sampaoli', 'Graham Arnold', '0', '2022-07-26 16:09:43', '2022-07-26 16:09:43'),
(2, 15, 2, 2, 29, '[{\"name\":\"Franco Armani\",\"role\":\"Goalkeeper\"},{\"name\":\"Willy Caballero\",\"role\":\"Goalkeeper\"},{\"name\":\"Cristian Ansaldi\",\"role\":\"Defender\"},{\"name\":\"Federico Fazio\",\"role\":\"Defender\"},{\"name\":\"Gabriel Mercado\",\"role\":\"Defender\"},{\"name\":\"Nicol\\u00e1s Otamendi\",\"role\":\"Defender\"},{\"name\":\"Marcos Acuna\",\"role\":\"Midfielder\"},{\"name\":\"Ever Banega\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Martin Campana\",\"role\":\"Defender\"},{\"name\":\"Fernando Muslera\",\"role\":\"Defender\"},{\"name\":\"Martin Caceres\",\"role\":\"Defender\"},{\"name\":\"Sebastian Coates\",\"role\":\"Defender\"},{\"name\":\"Jose Maria Gimenez\",\"role\":\"Defender\"},{\"name\":\"Diego Godin\",\"role\":\"Defender\"},{\"name\":\"Giorgian De Arrascaeta\",\"role\":\"Defender\"},{\"name\":\"Rodrigo Bentancur\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=0pubub1GegY', 'youtube', 'Franco Armani', 'Martin Campana', 'Gabriel Mercado', 'Giorgian De Arrascaeta', 'Jorge Sampaoli', 'Oscar Tabarez', '0', '2022-07-26 16:11:21', '2022-07-26 16:11:21'),
(3, 16, 2, 24, 29, '[{\"name\":\"Brad Jones\",\"role\":\"Goalkeeper\"},{\"name\":\"Mathew Ryan\",\"role\":\"Goalkeeper\"},{\"name\":\"Aziz Behich\",\"role\":\"Defender\"},{\"name\":\"Milo\\u0161 Degenek\",\"role\":\"Defender\"},{\"name\":\"James Meredith\",\"role\":\"Defender\"},{\"name\":\"Mark Milligan\",\"role\":\"Defender\"},{\"name\":\"Tim Cahill\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Martin Campana\",\"role\":\"Defender\"},{\"name\":\"Fernando Muslera\",\"role\":\"Defender\"},{\"name\":\"Martin Caceres\",\"role\":\"Defender\"},{\"name\":\"Sebastian Coates\",\"role\":\"Defender\"},{\"name\":\"Jose Maria Gimenez\",\"role\":\"Defender\"},{\"name\":\"Diego Godin\",\"role\":\"Defender\"},{\"name\":\"Giorgian De Arrascaeta\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=Tm4L40vte7s', 'youtube', 'Brad Jones', 'Martin Campana', 'Robbie Kruse', 'Diego Laxalt', 'Graham Arnold', 'Oscar Tabarez', '0', '2022-07-26 16:12:30', '2022-07-26 16:12:30'),
(4, 17, 2, 1, 30, '[{\"name\":\"Alisson\",\"role\":\"Goalkeeper\"},{\"name\":\"Ederson\",\"role\":\"Goalkeeper\"},{\"name\":\"Thiago Silva\",\"role\":\"Defender\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"}]', '[{\"name\":\"Iv\\u00e1n Arboleda\",\"role\":\"Goalkeeper\"},{\"name\":\"Jos\\u00e9 Luis Chunga\",\"role\":\"Goalkeeper\"},{\"name\":\"Helibelton Palacios\",\"role\":\"Defender\"},{\"name\":\"Carlos Cuesta\",\"role\":\"Defender\"},{\"name\":\"Jhon Lucum\\u00ed\",\"role\":\"Defender\"},{\"name\":\"Davinson S\\u00e1nchez\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=pAUGJpu6FKo', 'youtube', 'Thiago Silva', 'Jhon Lucumí', 'Alisson', 'Iván Arboleda', 'Couch Name', 'Néstor Lorenzo', '0', '2022-07-26 16:13:30', '2022-07-26 16:13:30'),
(5, 18, 2, 30, 31, '[{\"name\":\"Iv\\u00e1n Arboleda\",\"role\":\"Goalkeeper\"},{\"name\":\"Jos\\u00e9 Luis Chunga\",\"role\":\"Goalkeeper\"},{\"name\":\"Helibelton Palacios\",\"role\":\"Defender\"},{\"name\":\"Carlos Cuesta\",\"role\":\"Defender\"},{\"name\":\"Jhon Lucum\\u00ed\",\"role\":\"Defender\"},{\"name\":\"Davinson S\\u00e1nchez\",\"role\":\"Defender\"},{\"name\":\"Eduard Atuesta\",\"role\":\"Midfielder\"},{\"name\":\"Kevin Velasco\",\"role\":\"Midfielder\"},{\"name\":\"Kevin Agudelo\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Pedro Gallese\",\"role\":\"Defender\"},{\"name\":\"Carlos Caceda\",\"role\":\"Defender\"},{\"name\":\"Luis Advincula\",\"role\":\"Defender\"},{\"name\":\"Aldo Corzo\",\"role\":\"Defender\"},{\"name\":\"Christian Ramos\",\"role\":\"Defender\"},{\"name\":\"Miguel Araujo\",\"role\":\"Defender\"},{\"name\":\"Renato Tapia\",\"role\":\"Defender\"},{\"name\":\"Pedro Aquino\",\"role\":\"Defender\"},{\"name\":\"Yoshimar Yotun\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=SZ3e3HfY2GE', 'youtube', 'Iván Arboleda', 'Pedro Gallese', 'Carlos Cuesta', 'Christian Ramos', 'Néstor Lorenzo', 'Ricardo Gareca', '0', '2022-07-26 16:14:30', '2022-07-26 16:14:30'),
(6, 19, 2, 31, 1, '[{\"name\":\"Pedro Gallese\",\"role\":\"Defender\"},{\"name\":\"Carlos Caceda\",\"role\":\"Defender\"},{\"name\":\"Luis Advincula\",\"role\":\"Defender\"},{\"name\":\"Aldo Corzo\",\"role\":\"Defender\"},{\"name\":\"Christian Ramos\",\"role\":\"Defender\"},{\"name\":\"Miguel Araujo\",\"role\":\"Defender\"},{\"name\":\"Renato Tapia\",\"role\":\"Defender\"},{\"name\":\"Pedro Aquino\",\"role\":\"Defender\"}]', '[{\"name\":\"Alisson\",\"role\":\"Goalkeeper\"},{\"name\":\"Ederson\",\"role\":\"Goalkeeper\"},{\"name\":\"Thiago Silva\",\"role\":\"Defender\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"},{\"name\":\"Danilo\",\"role\":\"Defender\"},{\"name\":\"Paulinho\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=4bmbY0IFs3U', 'youtube', 'Pedro Gallese', 'Thiago Silva', 'Paolo Hurtado', 'Alisson', 'Ricardo Gareca', 'Couch Name', '0', '2022-07-26 16:15:50', '2022-07-26 16:15:50'),
(7, 20, 3, 1, 35, '[{\"name\":\"Ederson\",\"role\":\"Goalkeeper\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"},{\"name\":\"Danilo\",\"role\":\"Defender\"},{\"name\":\"Paulinho\",\"role\":\"Midfielder\"},{\"name\":\"Casemiro\",\"role\":\"Midfielder\"},{\"name\":\"Philippe Coutinho\",\"role\":\"Midfielder\"},{\"name\":\"Fernandinho\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Carlos Acevedo\",\"role\":\"Goalkeeper\"},{\"name\":\"Gerardo Arteaga\",\"role\":\"Defender\"},{\"name\":\"Hector Moreno\",\"role\":\"Defender\"},{\"name\":\"Israel Reyes\",\"role\":\"Defender\"},{\"name\":\"Diego Lainez\",\"role\":\"Defender\"},{\"name\":\"Edson Alvarez\",\"role\":\"Defender\"},{\"name\":\"Erick Aguirre\",\"role\":\"Defender\"},{\"name\":\"Erick Gutierrez\",\"role\":\"Defender\"},{\"name\":\"Erick Sanchez\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=B1CQxB6n7Z8', 'youtube', 'Thiago Silva', 'Francisco Guillermo Ochoa', 'Alisson', 'Hector Moreno', 'Couch Name', 'Gerardo Martino', '0', '2022-07-26 16:42:05', '2022-07-26 16:42:05'),
(8, 21, 3, 35, 22, '[{\"name\":\"Francisco Guillermo Ochoa\",\"role\":\"Goalkeeper\"},{\"name\":\"Carlos Acevedo\",\"role\":\"Goalkeeper\"},{\"name\":\"C\\u00e9sar Montes\",\"role\":\"Defender\"},{\"name\":\"Gerardo Arteaga\",\"role\":\"Defender\"},{\"name\":\"Hector Moreno\",\"role\":\"Defender\"},{\"name\":\"Israel Reyes\",\"role\":\"Defender\"},{\"name\":\"Diego Lainez\",\"role\":\"Defender\"},{\"name\":\"Edson Alvarez\",\"role\":\"Defender\"}]', '[{\"name\":\"Daniel Akpeyi\",\"role\":\"Goalkeeper\"},{\"name\":\"Ikechukwu Ezenwa\",\"role\":\"Goalkeeper\"},{\"name\":\"Chidozie Awaziem\",\"role\":\"Defender\"},{\"name\":\"Leon Balogun\",\"role\":\"Defender\"},{\"name\":\"Tyronne Ebuehi\",\"role\":\"Defender\"},{\"name\":\"Elderson Echi\\u00e9jil\\u00e9\",\"role\":\"Defender\"},{\"name\":\"Peter Etebo\",\"role\":\"Midfielder\"},{\"name\":\"Wilfred Ndidi\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=l_Sgf0ZFwFw', 'youtube', 'Gerardo Arteaga', 'Daniel Akpeyi', 'Francisco Guillermo Ochoa', 'Tyronne Ebuehi', 'Gerardo Martino', 'Gernot Rohr', '0', '2022-07-26 16:44:09', '2022-07-26 16:44:09'),
(9, 22, 3, 1, 22, '[{\"name\":\"Alisson\",\"role\":\"Goalkeeper\"},{\"name\":\"Ederson\",\"role\":\"Goalkeeper\"},{\"name\":\"Thiago Silva\",\"role\":\"Defender\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"},{\"name\":\"Danilo\",\"role\":\"Defender\"},{\"name\":\"Paulinho\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Daniel Akpeyi\",\"role\":\"Goalkeeper\"},{\"name\":\"Ikechukwu Ezenwa\",\"role\":\"Goalkeeper\"},{\"name\":\"Chidozie Awaziem\",\"role\":\"Defender\"},{\"name\":\"Leon Balogun\",\"role\":\"Defender\"},{\"name\":\"Tyronne Ebuehi\",\"role\":\"Defender\"},{\"name\":\"Elderson Echi\\u00e9jil\\u00e9\",\"role\":\"Defender\"},{\"name\":\"Peter Etebo\",\"role\":\"Midfielder\"},{\"name\":\"Wilfred Ndidi\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=2CqM6jSJqIY', 'youtube', 'Alisson', 'Daniel Akpeyi', 'Miranda', 'Tyronne Ebuehi', 'Couch Name', 'Gernot Rohr', '0', '2022-07-26 16:46:29', '2022-07-26 16:46:29'),
(10, 6, 1, 32, 33, '[{\"name\":\"Saad Al Sheeb\",\"role\":\"Goalkeeper\"},{\"name\":\"Yousef Hassan\",\"role\":\"Goalkeeper\"},{\"name\":\"Homam Ahmed\",\"role\":\"Defender\"},{\"name\":\"Abdelkarim Hassan\",\"role\":\"Defender\"},{\"name\":\"Salem Al Hajri\",\"role\":\"Defender\"},{\"name\":\"Pedro Miguel Correia\",\"role\":\"Defender\"},{\"name\":\"Boualem Khoukhi\",\"role\":\"Defender\"},{\"name\":\"Mohammed Al Bayatier\",\"role\":\"Midfielder\"},{\"name\":\"Assim Madibo\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Tim Krul\",\"role\":\"Goalkeeper\"},{\"name\":\"Jasper Cillessen\",\"role\":\"Goalkeeper\"},{\"name\":\"Hans Hateboer\",\"role\":\"Defender\"},{\"name\":\"Nathan Ake\",\"role\":\"Defender\"},{\"name\":\"Daley Blind\",\"role\":\"Defender\"},{\"name\":\"Matthijs de Ligt\",\"role\":\"Defender\"},{\"name\":\"Stefan de Vrij\",\"role\":\"Defender\"},{\"name\":\"Davy Klaassen\",\"role\":\"Midfielder\"},{\"name\":\"Teun Koopmeiners\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=W1gZWNfnwDc', 'youtube', 'Abdelkarim Hassan', 'Matthijs de Ligt', 'Saad Al Sheeb', 'Tim Krul', 'Félix Sánchez', 'Louis van Gaal', '0', '2022-08-02 08:23:15', '2022-08-02 08:29:00'),
(11, 7, 1, 2, 3, '[{\"name\":\"Franco Armani\",\"role\":\"Goalkeeper\"},{\"name\":\"Willy Caballero\",\"role\":\"Goalkeeper\"},{\"name\":\"Cristian Ansaldi\",\"role\":\"Defender\"},{\"name\":\"Federico Fazio\",\"role\":\"Defender\"},{\"name\":\"Gabriel Mercado\",\"role\":\"Defender\"},{\"name\":\"Nicol\\u00e1s Otamendi\",\"role\":\"Defender\"},{\"name\":\"Marcos Acuna\",\"role\":\"Midfielder\"},{\"name\":\"Ever Banega\",\"role\":\"Midfielder\"},{\"name\":\"Angel Di Mar\\u00eda\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Abdullah Al Mayoof\",\"role\":\"Goalkeeper\"},{\"name\":\"Yaser Al Mosailem\",\"role\":\"Goalkeeper\"},{\"name\":\"Ali Al Bulayhi\",\"role\":\"Defender\"},{\"name\":\"Mohammed Al Burayk\",\"role\":\"Defender\"},{\"name\":\"Mansour Al Harbi\",\"role\":\"Defender\"},{\"name\":\"Yasir Al Shahrani\",\"role\":\"Defender\"},{\"name\":\"Motaz Hawsawi\",\"role\":\"Defender\"},{\"name\":\"Salem Al Dawsari\",\"role\":\"Midfielder\"},{\"name\":\"Salman Al Faraj\",\"role\":\"Midfielder\"}]', 'https://www.youtube.com/watch?v=_507b7ePt6U', 'youtube', 'Nicolás Otamendi', 'Yasir Al Shahrani', 'Franco Armani', 'Abdullah Al Mayoof', 'Jorge Sampaoli', 'Couch Name', '0', '2022-08-02 08:24:19', '2022-08-02 08:24:19'),
(12, 8, 1, 1, 20, '[{\"name\":\"Thiago Silva\",\"role\":\"Defender\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"},{\"name\":\"Danilo\",\"role\":\"Defender\"},{\"name\":\"Paulinho\",\"role\":\"Midfielder\"},{\"name\":\"Casemiro\",\"role\":\"Midfielder\"},{\"name\":\"Philippe Coutinho\",\"role\":\"Midfielder\"},{\"name\":\"Fernandinho\",\"role\":\"Midfielder\"}]', '[{\"name\":\"Branislav Ivanovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Aleksandar Kolarov\",\"role\":\"Defender\"},{\"name\":\"Nikola Milenkovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Milan Rodi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Antonio Rukavina\",\"role\":\"Defender\"},{\"name\":\"Marko Gruji\\u0107\",\"role\":\"Defender\"},{\"name\":\"Filip Kosti\\u0107\",\"role\":\"Defender\"},{\"name\":\"Nemanja Mati\\u0107\",\"role\":\"Defender\"},{\"name\":\"Luka Milivojevi\\u0107\",\"role\":\"Defender\"}]', 'https://www.youtube.com/watch?v=SrVVSrvTTAk', 'youtube', 'Neymar', 'Antonio Rukavina', 'Alisson', 'Marko Dmitrović', 'Couch Name', 'Mladen Krstajić', '0', '2022-08-02 08:25:28', '2022-08-02 08:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `match_won_infos`
--

CREATE TABLE `match_won_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) DEFAULT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `first_team_id` bigint(20) DEFAULT NULL,
  `second_team_id` bigint(20) DEFAULT NULL,
  `won_team_id` bigint(20) DEFAULT NULL,
  `won_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `match_won_infos`
--

INSERT INTO `match_won_infos` (`id`, `schedule_id`, `tournament_id`, `first_team_id`, `second_team_id`, `won_team_id`, `won_by`, `created_at`, `updated_at`) VALUES
(1, 14, 2, 2, 24, 2, '3 goals', '2022-07-26 16:10:06', '2022-07-26 16:10:06'),
(2, 15, 2, 2, 29, 2, '1 goals', '2022-07-26 16:11:36', '2022-07-26 16:11:36'),
(3, 16, 2, 24, 29, 29, '1 goals', '2022-07-26 16:12:41', '2022-07-26 16:12:41'),
(4, 17, 2, 1, 30, 1, '3 goals', '2022-07-26 16:13:41', '2022-07-26 16:13:41'),
(5, 18, 2, 30, 31, 31, '2 goals', '2022-07-26 16:14:55', '2022-07-26 16:14:55'),
(6, 19, 2, 31, 1, 1, '4 goals', '2022-07-26 16:17:36', '2022-07-26 16:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_04_125117_create_notifications_table', 1),
(6, '2022_02_04_125233_create_smtps_table', 1),
(7, '2022_02_04_125250_create_settings_table', 1),
(8, '2022_02_07_070047_create_apis_table', 1),
(9, '2022_02_08_065401_create_roles_table', 1),
(10, '2022_02_10_061858_create_manage_notifications_table', 1),
(11, '2022_02_10_103251_create_forgot_password_codes_table', 1),
(12, '2022_02_10_103346_create_forgot_password_requests_table', 1),
(13, '2022_03_02_103906_create_favorite_lists_table', 1),
(14, '2022_06_21_042232_create_teams_table', 1),
(15, '2022_06_21_101957_create_tournaments_table', 1),
(16, '2022_06_21_113931_create_point_tables_table', 1),
(17, '2022_06_21_121407_create_groups_table', 1),
(18, '2022_06_22_082723_create_schedules_table', 1),
(19, '2022_06_27_060229_create_group_teams_table', 1),
(20, '2022_06_30_065928_create_match_information_table', 1),
(21, '2022_06_30_113422_create_match_won_infos_table', 1),
(22, '2022_07_05_102206_create_web_advertisements_table', 1),
(23, '2022_07_16_045005_create_web_ads_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `external_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `image`, `blog_id`, `external_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hello', '<p>Test Notification</p>', 'https://livecricket.teamprojectx.xyz/uploads/notification/1658498031.download.jpg', NULL, NULL, 'active', '2022-07-22 17:53:57', '2022-07-22 17:53:57'),
(3, 'Hello', '<p>Test Notification</p>', 'https://livecricket.teamprojectx.xyz/uploads/notification/1658498031.download.jpg', NULL, NULL, 'active', '2022-07-22 17:55:21', '2022-07-22 17:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'authToken', '422068a852d01ec7abe5b0c5233f234f5e585d22a18c050cb8a23cbf33f23dd1', '[\"*\"]', NULL, '2022-07-22 14:47:21', '2022-07-22 14:47:21'),
(2, 'App\\Models\\User', 1, 'authToken', '3a91d2937c45e4d250057e2e06f469cb04b7db6729f297c76c33b9a0c271228c', '[\"*\"]', NULL, '2022-07-22 14:47:42', '2022-07-22 14:47:42'),
(3, 'App\\Models\\User', 1, 'authToken', 'ff83f780fdf19f47c6d40a5bf2766cbbf475303134b1f7610a40c4a98554bc9a', '[\"*\"]', NULL, '2022-07-22 14:47:54', '2022-07-22 14:47:54'),
(4, 'App\\Models\\User', 1, 'authToken', 'b423b26acaabd47fdeea173e8cf6f41f04a70d2dcb3ecff643a17cf8f0060f7a', '[\"*\"]', NULL, '2022-07-22 16:35:42', '2022-07-22 16:35:42'),
(5, 'App\\Models\\User', 1, 'authToken', '0954d42cda4386976257185e222f95fd81c3c58ce0d895a0faa61de97ab47330', '[\"*\"]', NULL, '2022-07-22 16:43:51', '2022-07-22 16:43:51'),
(6, 'App\\Models\\User', 6, 'authToken', '1fda36d5c1319e77e611865b887175ce7d07a035fd2ba573c9cd9f81e44e5060', '[\"*\"]', NULL, '2022-07-22 17:16:12', '2022-07-22 17:16:12'),
(7, 'App\\Models\\User', 6, 'authToken', 'a421e3eb5a918497ac16d9ed88ab08138232c50852a7ba2f0ba9ea1a7e0467d4', '[\"*\"]', NULL, '2022-07-22 17:16:43', '2022-07-22 17:16:43'),
(8, 'App\\Models\\User', 1, 'authToken', '4a3b46e3389487da703262c3af57b397afa7e70511892319131d45a2ee4e3220', '[\"*\"]', NULL, '2022-07-22 17:18:46', '2022-07-22 17:18:46'),
(9, 'App\\Models\\User', 1, 'authToken', '48aae2ca3f07014e133403157a16b4d58dfc9cf3aa27d88bc2af25c46f65b374', '[\"*\"]', NULL, '2022-07-22 18:42:11', '2022-07-22 18:42:11'),
(10, 'App\\Models\\User', 1, 'authToken', '246641bef193983031542299a2c83a02baf36160dc436f9081edc67f0b54fd97', '[\"*\"]', NULL, '2022-07-23 13:19:05', '2022-07-23 13:19:05'),
(11, 'App\\Models\\User', 1, 'authToken', '035fdcc747a4988b81fc1acab05bb4e03cc5a59cd7903e4afc4f842d67cdf872', '[\"*\"]', NULL, '2022-07-23 13:20:00', '2022-07-23 13:20:00'),
(12, 'App\\Models\\User', 1, 'authToken', '7afea71ee63d85f7e5d852c28ea611f830b1583540329ffa29e17edae228d952', '[\"*\"]', NULL, '2022-07-25 11:24:05', '2022-07-25 11:24:05'),
(13, 'App\\Models\\User', 3, 'authToken', '07d945832219298441cf3d561e72b114aa796016e74ab5ec8507cc16d421bd41', '[\"*\"]', NULL, '2022-07-25 15:46:07', '2022-07-25 15:46:07'),
(14, 'App\\Models\\User', 1, 'authToken', '53ffc8c68f9e99d70b4bec2eb343313b2428faa3b63bdd1764cb7593df1e248b', '[\"*\"]', NULL, '2022-07-25 16:33:24', '2022-07-25 16:33:24'),
(15, 'App\\Models\\User', 7, 'authToken', '3ddc5261ee6781ea75acb068b53ec97a5717b885cb0b601f1ddc784035aad768', '[\"*\"]', NULL, '2022-07-25 21:42:34', '2022-07-25 21:42:34'),
(16, 'App\\Models\\User', 7, 'authToken', 'f1cc6919a0832949fb01056e802d3e0d18b0c1dc5c9a1075e72be21651fc58c2', '[\"*\"]', NULL, '2022-07-25 21:49:02', '2022-07-25 21:49:02'),
(17, 'App\\Models\\User', 7, 'authToken', 'c89ad0a319b517c1af8eb5525b2eddaec28616549c6ce5b9271e65532f09a7fa', '[\"*\"]', NULL, '2022-07-26 08:54:31', '2022-07-26 08:54:31'),
(18, 'App\\Models\\User', 1, 'authToken', '8f1eeac95d36b5235e2cf5dced23049f520495298dc1c60e3ac5c520a3d1c146', '[\"*\"]', NULL, '2022-07-26 14:02:51', '2022-07-26 14:02:51'),
(19, 'App\\Models\\User', 2, 'authToken', '0f4a30337fc2d387331265a6856c8077e79f96c1b3efd8d30f2e3025b9790f0e', '[\"*\"]', NULL, '2022-07-26 18:22:18', '2022-07-26 18:22:18'),
(20, 'App\\Models\\User', 2, 'authToken', 'fe50f943b1857071386a9081109995b74c40627c6e0f8c3b73383e5ef3e4d33b', '[\"*\"]', NULL, '2022-07-30 10:53:31', '2022-07-30 10:53:31'),
(21, 'App\\Models\\User', 2, 'authToken', 'c4c7c1fde063da1b07394fda7ba12b55eaf34e0eec620151b457e1aac8ac7f01', '[\"*\"]', NULL, '2022-07-30 15:48:06', '2022-07-30 15:48:06'),
(22, 'App\\Models\\User', 2, 'authToken', 'b5679e800da14b523eb11262be3e8787d554a450f2e91819f1515474d3868af6', '[\"*\"]', NULL, '2022-07-30 16:14:10', '2022-07-30 16:14:10'),
(23, 'App\\Models\\User', 2, 'authToken', 'cf2b0c459925d63bb4ce0d4d44ddb9df510fb3c06f5ac8bf88012649f92c567b', '[\"*\"]', NULL, '2022-07-30 16:27:22', '2022-07-30 16:27:22'),
(24, 'App\\Models\\User', 2, 'authToken', 'ebcbb9ca0b59aca7d52933545ae2777ea8ac69d82bd009d84a3e91ad34fb79e0', '[\"*\"]', NULL, '2022-07-30 18:39:51', '2022-07-30 18:39:51'),
(25, 'App\\Models\\User', 2, 'authToken', 'a93103b0f9fa482aa863dd3fc25b341e78a105faf49ca4d6f3c4d395225687b1', '[\"*\"]', NULL, '2022-07-30 21:18:51', '2022-07-30 21:18:51'),
(26, 'App\\Models\\User', 2, 'authToken', '31525d899a89abf78f016c049286783cb7a9810d59e7f89c246ce4fee94c30fc', '[\"*\"]', NULL, '2022-07-31 00:46:49', '2022-07-31 00:46:49'),
(27, 'App\\Models\\User', 2, 'authToken', '7eaeed6b1cf7f7228685086429c9c23e6a240978a28c194eac1ca9209138208e', '[\"*\"]', NULL, '2022-07-31 15:21:29', '2022-07-31 15:21:29'),
(28, 'App\\Models\\User', 2, 'authToken', 'c141bfe9a533ea28ca18760f9847bfcd0b560f55d1df3a84496460cd65be1e05', '[\"*\"]', NULL, '2022-07-31 16:50:23', '2022-07-31 16:50:23'),
(29, 'App\\Models\\User', 2, 'authToken', '29271367179cc073270dd3110835265acec54924d5659e3fd2514cdb54b76d92', '[\"*\"]', NULL, '2022-08-01 01:05:54', '2022-08-01 01:05:54'),
(30, 'App\\Models\\User', 2, 'authToken', '098e007cfd87c33b0f3d93b19266bd756e1bd83130c69b1fce9e431359d9057a', '[\"*\"]', NULL, '2022-08-01 06:51:55', '2022-08-01 06:51:55'),
(31, 'App\\Models\\User', 2, 'authToken', 'ad0de3457615584a7f05b3fdc83e2f8cd1b0b6662606a06dde521c8bc28f9712', '[\"*\"]', NULL, '2022-08-01 18:07:55', '2022-08-01 18:07:55'),
(32, 'App\\Models\\User', 2, 'authToken', '1200b1996e3eb9b19ea072b19f74c916dfcd2e1e9b74d7c70e5ba5d5f0ef8740', '[\"*\"]', NULL, '2022-08-02 08:51:52', '2022-08-02 08:51:52'),
(33, 'App\\Models\\User', 2, 'authToken', '157d94725a1e25f998cce7c018105da66205a98228aa7636abae173af19ca917', '[\"*\"]', NULL, '2022-08-02 08:52:13', '2022-08-02 08:52:13'),
(34, 'App\\Models\\User', 2, 'authToken', '4b240b702c4c378c9166fdf2a00a6099130faa5a023fecda9f12307ee1a146e3', '[\"*\"]', NULL, '2022-08-02 13:06:20', '2022-08-02 13:06:20'),
(35, 'App\\Models\\User', 2, 'authToken', 'c106e2913f2c5e0c4e35ff7eb0b13a11553e5190476cab779309b9ba521eecff', '[\"*\"]', NULL, '2022-08-03 06:43:18', '2022-08-03 06:43:18'),
(36, 'App\\Models\\User', 2, 'authToken', '06ab42bf92a27baf1b3fa5da12a2f9711b01c683110674d353c6b82d94c86bb2', '[\"*\"]', NULL, '2022-08-03 14:22:37', '2022-08-03 14:22:37'),
(37, 'App\\Models\\User', 2, 'authToken', '1ba15f37884fae6a91f56864c91ec10cdd2631e64352af1a69978c76d20a8b93', '[\"*\"]', NULL, '2022-08-03 16:24:02', '2022-08-03 16:24:02'),
(38, 'App\\Models\\User', 2, 'authToken', 'b75c919ea0cc7873a4c23e036acf53729fc507758b82c3e790561d46bf670ff1', '[\"*\"]', NULL, '2022-08-04 04:11:42', '2022-08-04 04:11:42'),
(39, 'App\\Models\\User', 2, 'authToken', 'a4b3fbb59c1829851933d8f30183cab3bcb37c17cb3687cbd169a60b37b77603', '[\"*\"]', NULL, '2022-08-04 06:25:40', '2022-08-04 06:25:40'),
(40, 'App\\Models\\User', 2, 'authToken', '146fe02853807bbae65ea3fbee57c0466beec6e2f1058720027e696b7e60c262', '[\"*\"]', NULL, '2022-08-04 08:51:27', '2022-08-04 08:51:27'),
(41, 'App\\Models\\User', 2, 'authToken', '9f852d9caad97c899dc6704c4bac85ab14c30482724adcef6997b437cf469f2f', '[\"*\"]', NULL, '2022-08-05 15:59:44', '2022-08-05 15:59:44'),
(42, 'App\\Models\\User', 2, 'authToken', 'd3a8ce5fe3150173c849b6cc5e11139c63946ade253cedc358b7d593be9bb2c3', '[\"*\"]', NULL, '2022-08-05 23:37:01', '2022-08-05 23:37:01'),
(43, 'App\\Models\\User', 2, 'authToken', 'df2f481dd3161ce0dffff0249f297ec3ea0a150cd2bfce0b00d8c4e49c639596', '[\"*\"]', NULL, '2022-08-06 18:04:13', '2022-08-06 18:04:13'),
(44, 'App\\Models\\User', 2, 'authToken', '3a71c7d83548d142cc8c843b5511319d1f667c73264b70cfaeaeea75cb1426b0', '[\"*\"]', NULL, '2022-08-07 06:00:35', '2022-08-07 06:00:35'),
(45, 'App\\Models\\User', 2, 'authToken', 'bce8f6c3be4e2d53c9d79c5492253c5e9bfcf8920a25c6a846b88771c70799c3', '[\"*\"]', NULL, '2022-08-07 13:23:47', '2022-08-07 13:23:47'),
(46, 'App\\Models\\User', 2, 'authToken', '7f200d172649d2654640be9d7fea44ad50de3a05130ff366b37e1ef44024b652', '[\"*\"]', NULL, '2022-08-08 06:46:35', '2022-08-08 06:46:35'),
(47, 'App\\Models\\User', 1, 'authToken', 'e4c87b1354d6f0effee42523697561dc4dc4e2b8386f99b701b6a1c1eb657ad4', '[\"*\"]', NULL, '2022-08-08 11:59:05', '2022-08-08 11:59:05'),
(48, 'App\\Models\\User', 2, 'authToken', '92b5f1a76a7e1eb737dfe809652922d5e911b6ea07314c10c4b64efb32087f34', '[\"*\"]', NULL, '2022-08-09 00:12:55', '2022-08-09 00:12:55'),
(49, 'App\\Models\\User', 2, 'authToken', '632fd875e249675e6c8fc63ca2e8220bb048f6dab413382de022ec3888b74b83', '[\"*\"]', NULL, '2022-08-09 02:54:55', '2022-08-09 02:54:55'),
(50, 'App\\Models\\User', 2, 'authToken', 'b45da720de41c657e1fa9689dd7a24a6a64bd79d78a7e7ed523fb5e98a4dd6d6', '[\"*\"]', NULL, '2022-08-10 15:20:57', '2022-08-10 15:20:57'),
(51, 'App\\Models\\User', 2, 'authToken', '2772baca6c9c091ef05b3dec831876206fc84e7dd7b0f057f84dfe224bb0521b', '[\"*\"]', NULL, '2022-08-10 20:31:38', '2022-08-10 20:31:38'),
(52, 'App\\Models\\User', 2, 'authToken', '0f2de51d6ee4f0df469d45704fb65746e1c5fe1f408594d69027f41b94c64ce0', '[\"*\"]', NULL, '2022-08-11 01:12:07', '2022-08-11 01:12:07'),
(53, 'App\\Models\\User', 2, 'authToken', '4647d7b36c34cbed0c8b6e7595057fe5578d95e5387f2a2cbec15b9bab767c53', '[\"*\"]', NULL, '2022-08-12 13:12:06', '2022-08-12 13:12:06'),
(54, 'App\\Models\\User', 2, 'authToken', 'd182d38e1ebc261ef0c6972e8939e179728cc90f4cfa2fee5a47bd341ab0767e', '[\"*\"]', NULL, '2022-08-13 08:53:33', '2022-08-13 08:53:33'),
(55, 'App\\Models\\User', 2, 'authToken', 'a6a76adeaf4e5393c2c1ce2e0c949aff788cb5d3ec68299a677f13326aa25735', '[\"*\"]', NULL, '2022-08-13 18:20:56', '2022-08-13 18:20:56'),
(56, 'App\\Models\\User', 2, 'authToken', 'be5a276408c974e349ed0d2671c26eff8044c611ecbf3bb0dfe07b6afe3fc092', '[\"*\"]', NULL, '2022-08-14 22:00:46', '2022-08-14 22:00:46'),
(57, 'App\\Models\\User', 2, 'authToken', '693647f57182047d25a3438a712882b1056121a448e1950a76b88c40862eeebc', '[\"*\"]', NULL, '2022-08-14 23:06:03', '2022-08-14 23:06:03'),
(58, 'App\\Models\\User', 2, 'authToken', '28e8b1bdfdb031ff65fc9750a712a1ae7affb8b455f06ee2cde3c33b8774fa60', '[\"*\"]', NULL, '2022-08-15 02:16:36', '2022-08-15 02:16:36'),
(59, 'App\\Models\\User', 2, 'authToken', 'eb7e96afb227b89be790e3691b8e57c5bb306e6ad207b7cd4460e3928d82ada5', '[\"*\"]', NULL, '2022-08-15 19:39:44', '2022-08-15 19:39:44'),
(60, 'App\\Models\\User', 2, 'authToken', '47cf3a833983cae1dfd9807db0f3e0154c3b4b2fa966d73a8cdb06c0e51137c1', '[\"*\"]', NULL, '2022-08-16 12:32:27', '2022-08-16 12:32:27'),
(61, 'App\\Models\\User', 2, 'authToken', 'f1a66804df4c8d229c886a7d4a1e490f70cffa3f18662ffd43202ca449ca1cc4', '[\"*\"]', NULL, '2022-08-16 14:54:44', '2022-08-16 14:54:44'),
(62, 'App\\Models\\User', 2, 'authToken', 'fe3216d0f903c14be6912e1154b36b90572e73a0b4a780cabaf782ca5cd4bb0a', '[\"*\"]', NULL, '2022-08-16 15:41:02', '2022-08-16 15:41:02'),
(63, 'App\\Models\\User', 2, 'authToken', '10f89927779ef5c27ee9f89bbadb8f5bcd6684ec80b92b696844b6ac21e79fbb', '[\"*\"]', NULL, '2022-08-17 20:50:22', '2022-08-17 20:50:22'),
(64, 'App\\Models\\User', 2, 'authToken', '695dea327980b4d7d63ce76bfb86fd76b76cae5133c5d56bae28db7ec56e2fd6', '[\"*\"]', NULL, '2022-08-19 02:29:50', '2022-08-19 02:29:50'),
(65, 'App\\Models\\User', 2, 'authToken', '48cc3aa0be8b5ee02e12d4af27d7dc3e215922fa2c32a7858c4946fb540c7294', '[\"*\"]', NULL, '2022-08-20 15:26:49', '2022-08-20 15:26:49'),
(66, 'App\\Models\\User', 2, 'authToken', '63b110d82a7e73499283582ffb7043e7778262c242674173fc59720e4f7930eb', '[\"*\"]', NULL, '2022-08-21 15:27:19', '2022-08-21 15:27:19'),
(67, 'App\\Models\\User', 2, 'authToken', '8d0528fc221384f6f8e039ea820813bfac3e946b809979dc80bc9190ce3bb892', '[\"*\"]', NULL, '2022-08-21 16:32:03', '2022-08-21 16:32:03'),
(68, 'App\\Models\\User', 2, 'authToken', '93a8d8d8ba3a3acb462a261c80400aadcd3cecf6275cde2366256309009b3fa4', '[\"*\"]', NULL, '2022-08-22 17:11:43', '2022-08-22 17:11:43'),
(69, 'App\\Models\\User', 2, 'authToken', '2eb4258e1ef9bca0dd97bec71d37d15351b455bc0756e7653da493fe32719090', '[\"*\"]', NULL, '2022-08-23 19:52:30', '2022-08-23 19:52:30'),
(70, 'App\\Models\\User', 2, 'authToken', 'd9d5c6bf0fca778dbcb2ec4acbb572acaaf51049f70d8682cce96eb30a8dbbd9', '[\"*\"]', NULL, '2022-08-24 20:13:27', '2022-08-24 20:13:27'),
(71, 'App\\Models\\User', 2, 'authToken', 'd06e6c07d0fd54a8b1d37143c7af56b03285bac72cc2f776783aea516d9aee3c', '[\"*\"]', NULL, '2022-08-24 21:18:01', '2022-08-24 21:18:01'),
(72, 'App\\Models\\User', 2, 'authToken', '5625c8b75752e45002db11f9b83b39e018b622bebec7a224e57f99d82971ae4f', '[\"*\"]', NULL, '2022-08-25 02:50:11', '2022-08-25 02:50:11'),
(73, 'App\\Models\\User', 2, 'authToken', '6e4ae5c3d607355489a365aadec66faeecf9e377e2019c7f52dd73a9065a386a', '[\"*\"]', NULL, '2022-08-25 17:22:54', '2022-08-25 17:22:54'),
(74, 'App\\Models\\User', 2, 'authToken', 'e6e3cb8e9eca34aa05443a963eaf7eb7613c04c9c4f53674f399cfd8fc87e80e', '[\"*\"]', NULL, '2022-08-26 04:03:03', '2022-08-26 04:03:03'),
(75, 'App\\Models\\User', 2, 'authToken', 'ee70699e17da5a9431dc89cac3c4c84183548930cf49bcea8188a527f9204477', '[\"*\"]', NULL, '2022-08-27 18:22:51', '2022-08-27 18:22:51'),
(76, 'App\\Models\\User', 2, 'authToken', '76124029e3733f24e9b8ca42c19cb8ebe04693efd22a48818dfae62c58696ece', '[\"*\"]', NULL, '2022-08-27 22:01:39', '2022-08-27 22:01:39'),
(77, 'App\\Models\\User', 2, 'authToken', 'bab14004734543019ce1989333300ba0b1e8fbe374cb09c96bb81c9666a5e27d', '[\"*\"]', NULL, '2022-08-27 22:03:50', '2022-08-27 22:03:50'),
(78, 'App\\Models\\User', 2, 'authToken', '80de9f2a36a0aeb601b2693fe41b75ccd4d10731fbc8eae0e7d230dce3c0f201', '[\"*\"]', NULL, '2022-08-29 00:55:33', '2022-08-29 00:55:33'),
(79, 'App\\Models\\User', 2, 'authToken', '16c489bf1acc4125e9bf9f89ca29a1003823fa0c56abc79e2fbda744cf70feb0', '[\"*\"]', NULL, '2022-08-29 10:58:57', '2022-08-29 10:58:57'),
(80, 'App\\Models\\User', 2, 'authToken', 'b8f2497facbfd8870dc4eced48f1e2755c663fc9649fe9d42e4240e8d836cabe', '[\"*\"]', NULL, '2022-08-29 14:21:10', '2022-08-29 14:21:10'),
(81, 'App\\Models\\User', 2, 'authToken', '396fcaa1be82ec21b4c8d6624e130441003fe034de4fdd898a442fb1fb1ebb2d', '[\"*\"]', NULL, '2022-08-29 14:23:46', '2022-08-29 14:23:46'),
(82, 'App\\Models\\User', 8, 'authToken', 'b42d810ac82273eab2456c8b593925e674bfc6897e4104872749186909a5d994', '[\"*\"]', NULL, '2022-08-29 14:23:57', '2022-08-29 14:23:57'),
(83, 'App\\Models\\User', 2, 'authToken', '32440798385e4d5bb0ad0cbed88ad3c4670e4506144ac2961c2b189b0306c2fb', '[\"*\"]', NULL, '2022-08-30 02:25:48', '2022-08-30 02:25:48'),
(84, 'App\\Models\\User', 2, 'authToken', '65ebb692b3e36c0697dec7e8099e73bac46831117c98334350fd9258a0df9492', '[\"*\"]', NULL, '2022-08-30 11:29:37', '2022-08-30 11:29:37'),
(85, 'App\\Models\\User', 2, 'authToken', '9ab199e4b8eeb0029734d4808fd89a532869e9b38ffe2822141e395dae2dc4ab', '[\"*\"]', NULL, '2022-08-30 20:27:41', '2022-08-30 20:27:41'),
(86, 'App\\Models\\User', 2, 'authToken', '3d18399d1800c0b400d9efa2bf10416a908b22b9432e1b6e2ab5ed950d7b5e6c', '[\"*\"]', NULL, '2022-08-31 00:24:00', '2022-08-31 00:24:00'),
(87, 'App\\Models\\User', 2, 'authToken', '3f285cb366181e4aad51d154cd47f3fcfa4cbbaffe680c99e888624a5f41a203', '[\"*\"]', NULL, '2022-08-31 09:51:38', '2022-08-31 09:51:38'),
(88, 'App\\Models\\User', 2, 'authToken', '0394033b0e3e48e6c1e2e57d7f728284496864ccbd4745e59180bf241c2598d1', '[\"*\"]', NULL, '2022-08-31 15:04:37', '2022-08-31 15:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `point_tables`
--

CREATE TABLE `point_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) DEFAULT NULL,
  `tournament_id` bigint(20) DEFAULT NULL,
  `match_play` bigint(20) DEFAULT NULL,
  `win` bigint(20) DEFAULT NULL,
  `loss` bigint(20) DEFAULT NULL,
  `net_run` double DEFAULT NULL,
  `tied` bigint(20) DEFAULT NULL,
  `goal` bigint(20) DEFAULT NULL,
  `point` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `point_tables`
--

INSERT INTO `point_tables` (`id`, `team_id`, `tournament_id`, `match_play`, `win`, `loss`, `net_run`, `tied`, `goal`, `point`, `created_at`, `updated_at`) VALUES
(1, 29, 2, 5, 3, 2, 0, 0, 14, 12, '2022-07-26 16:50:23', '2022-07-26 17:20:02'),
(2, 2, 2, 1, 1, 1, NULL, 0, 12, 1, '2022-07-26 17:17:12', '2022-07-26 17:20:30'),
(3, 33, 1, 2, 1, 1, NULL, 0, 3, 3, '2022-07-26 17:21:50', '2022-07-26 17:21:50'),
(4, 32, 1, 2, 2, 0, NULL, 0, 5, 6, '2022-07-26 17:22:08', '2022-07-26 17:22:08'),
(5, 34, 1, 2, 1, 0, NULL, 1, 2, 4, '2022-07-26 17:22:33', '2022-07-26 17:22:33'),
(6, 2, 1, 2, 1, 1, NULL, 0, 2, 3, '2022-07-26 17:25:05', '2022-07-26 17:25:05'),
(7, 3, 1, 2, 2, 0, NULL, 0, 7, 6, '2022-07-26 17:26:48', '2022-07-26 17:26:48'),
(8, 35, 1, 2, 1, 0, NULL, 1, 3, 4, '2022-07-26 17:48:48', '2022-07-26 17:48:48'),
(9, 1, 1, 2, 2, 0, NULL, 0, 5, 6, '2022-07-26 17:49:20', '2022-07-26 17:49:20'),
(10, 20, 1, 2, 1, 1, NULL, 0, 2, 3, '2022-07-26 17:50:12', '2022-07-26 17:50:12'),
(11, 36, 1, 2, 0, 2, NULL, 0, 0, 0, '2022-07-26 17:50:37', '2022-07-26 17:50:37'),
(12, 24, 2, 2, 2, 0, NULL, 0, 6, 2, '2022-07-26 17:51:05', '2022-07-26 17:51:05'),
(13, 1, 2, 2, 2, 0, NULL, 0, 7, 6, '2022-07-26 17:51:25', '2022-07-26 17:51:25'),
(14, 31, 2, 2, 1, 0, NULL, 1, 2, 4, '2022-07-26 17:51:48', '2022-07-26 17:51:48'),
(15, 30, 2, 2, 1, 1, NULL, 0, 2, 3, '2022-07-26 17:52:12', '2022-07-26 17:52:12'),
(16, 35, 3, 2, 1, 1, NULL, 0, 2, 3, '2022-07-26 17:53:37', '2022-07-26 17:53:37'),
(17, 22, 3, 2, 1, 0, NULL, 1, 3, 4, '2022-07-26 17:54:33', '2022-07-26 17:54:33'),
(18, 1, 3, 2, 2, 0, NULL, 0, 4, 6, '2022-07-26 17:54:59', '2022-07-26 17:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'active', '2022-07-19 01:55:40', '2022-07-19 01:55:40'),
(2, 'admin', 'active', '2022-07-19 01:55:40', '2022-07-19 01:55:40'),
(3, 'user', 'active', '2022-07-19 01:55:40', '2022-07-19 01:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `match_no` int(11) DEFAULT NULL,
  `first_team_id` bigint(20) DEFAULT NULL,
  `second_team_id` bigint(20) DEFAULT NULL,
  `stadium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `match_result_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `tournament_id`, `group_id`, `match_no`, `first_team_id`, `second_team_id`, `stadium`, `date`, `time`, `image`, `status`, `match_result_status`, `created_at`, `updated_at`) VALUES
(6, 1, 5, 1, 32, 33, 'Stadium name', '2022-11-21', '22:26:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1661334836.football-world-cup-iran-vs-united-states-football-match-scoreboard-broadcast_412608-1989.jpg', '1', '0', '2022-11-22 03:26:00', '2022-08-24 13:53:58'),
(7, 1, 6, 2, 2, 3, 'Stadium name', '2022-11-22', '22:30:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840077.inline_image_preview (3).jpg', '1', '0', '2022-11-23 03:30:00', '2022-08-02 08:24:19'),
(8, 1, 7, 3, 1, 20, 'Stadium name', '2022-11-23', '22:30:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840277.555.jpg', '1', '0', '2022-11-24 03:30:00', '2022-08-02 08:25:28'),
(9, 1, 5, 4, 32, 34, 'Stadium name', '2022-11-24', '13:30:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658839909.inline_image_preview (1).jpg', '0', '0', '2022-11-24 18:30:00', '2022-07-26 16:51:52'),
(10, 1, 5, 5, 33, 34, 'Stadium name', '2022-11-26', '22:33:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658839981.inline_image_preview (2).jpg', '0', '0', '2022-11-27 03:33:00', '2022-07-26 16:53:05'),
(11, 1, 6, 6, 3, 35, 'Stadium name', '2022-11-27', '13:48:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840133.22.jpg', '0', '0', '2022-11-27 18:48:00', '2022-07-26 16:55:35'),
(12, 1, 6, 7, 2, 35, 'Stadium name', '2022-11-27', '22:50:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840196.inline_image_preview (4).jpg', '0', '0', '2022-11-28 03:50:00', '2022-07-26 16:56:37'),
(13, 1, 7, 8, 1, 36, 'Stadium name', '2022-11-26', '22:52:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840421.maxresdefault (2).jpg', '0', '0', '2022-11-27 03:52:00', '2022-07-26 17:00:23'),
(14, 2, 8, 1, 2, 24, 'Stadium name', '2020-06-26', '19:01:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658844168.Xe_1626864579.jpg', '1', '1', '2020-06-26 23:01:00', '2022-07-26 18:02:51'),
(15, 2, 8, 2, 2, 29, 'Stadium name', '2020-06-26', '20:01:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658843249.maxresdefault (1).jpg', '1', '1', '2020-06-27 00:01:00', '2022-07-26 17:47:31'),
(16, 2, 8, 3, 24, 29, 'Stadium name', '2020-06-24', '21:02:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658844209.102024294.jpeg', '1', '1', '2020-06-25 01:02:00', '2022-07-26 18:03:32'),
(17, 2, 9, 4, 1, 30, 'Stadium name', '2020-06-23', '21:02:00', 'https://livefootball.teamprojectx.xyz/uploads/setting/1659945628.maxresdefault (1).jpg', '1', '1', '2020-06-24 01:02:00', '2022-08-08 12:00:34'),
(18, 2, 9, 5, 30, 31, 'Stadium name', '2020-06-22', '20:03:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658844414.col-per-en-1643403606671.jpg', '1', '1', '2020-06-23 00:03:00', '2022-07-26 18:06:55'),
(19, 2, 9, 6, 31, 1, 'Stadium name', '2020-06-17', '22:03:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658844449.Conmebol_WC_Quali_Peru_Brazil.jpg', '1', '1', '2020-06-18 02:03:00', '2022-07-26 18:07:35'),
(20, 3, 10, 1, 1, 35, 'Stadium name', '2022-07-26', '22:38:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840837.brazil-vs-mexico-1.jpg', '1', '0', '2022-07-27 02:38:00', '2022-07-26 17:07:19'),
(21, 3, 10, 2, 35, 22, 'Stadium name', '2022-07-26', '22:38:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840672.amistosos_nokkta-1.jpg', '1', '0', '2022-07-27 02:38:00', '2022-07-26 17:04:35'),
(22, 3, 10, 3, 1, 22, 'Stadium name', '2022-07-26', '22:39:00', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658840780.Football_2_Brazil_Vs_Nigeria.jpg', '1', '0', '2022-07-27 02:39:00', '2022-07-26 17:06:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookies_policy` date DEFAULT NULL,
  `terms_policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `app_version`, `mail_address`, `update_app`, `developed_by`, `facebook`, `instagram`, `twitter`, `youtube`, `copyright`, `image`, `description`, `privacy_policy`, `cookies_policy`, `terms_policy`, `created_at`, `updated_at`) VALUES
(1, 'Live Football', '1', 'ccnit.envato@gmail.com', '1', 'Team CCN Infotech Ltd.', 'facebook.com', 'instagram.com', 'twitter.com', 'youtube.com', 'V1SOM640IZ1X6xehX2mifGL3mWciHWSXh1Jj8LThvoNuq3pGEmcopyright', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658820180.1658145963.Live Football Code Canyon Web Application.png', '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h2>Where can I get some?</h2><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h2>Where can I get some?</h2><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '0000-00-00', '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h2>Where can I get some?</h2><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2022-07-19 01:55:40', '2022-07-26 11:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `smtps`
--

CREATE TABLE `smtps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtps`
--

INSERT INTO `smtps` (`id`, `name`, `host`, `port`, `encryption`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.mailtrap.io', '2525', 'tls', '70095290a165f2', '70095290a165f2', '85bbb312fc39f2', '2022-07-19 01:55:40', '2022-07-19 01:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tournament_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `players` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`players`)),
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `tournament_id`, `group_id`, `team_name`, `couch_name`, `players`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Brazil', 'Couch Name', '[{\"name\":\"Alisson\",\"role\":\"Goalkeeper\"},{\"name\":\"Ederson\",\"role\":\"Goalkeeper\"},{\"name\":\"Thiago Silva\",\"role\":\"Defender\"},{\"name\":\"Miranda\",\"role\":\"Defender\"},{\"name\":\"Marquinhos\",\"role\":\"Defender\"},{\"name\":\"Marcelo\",\"role\":\"Defender\"},{\"name\":\"Danilo\",\"role\":\"Defender\"},{\"name\":\"Paulinho\",\"role\":\"Midfielder\"},{\"name\":\"Casemiro\",\"role\":\"Midfielder\"},{\"name\":\"Philippe Coutinho\",\"role\":\"Midfielder\"},{\"name\":\"Fernandinho\",\"role\":\"Midfielder\"},{\"name\":\"Neymar\",\"role\":\"Forward\"},{\"name\":\"Douglas Costa\",\"role\":\"Forward\"},{\"name\":\"Gabriel Jesus\",\"role\":\"Forward\"},{\"name\":\"Roberto Firmino\",\"role\":\"Forward\"}]', '<p>The Brazil national football team, nicknamed Seleção Canarinho, represents Brazil in men\'s international football and is administered by the Brazilian Football Confederation, the governing body for football in Brazil. They have been a member of FIFA since 1923 and a member of CONMEBOL since 1916.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658829064.1200px-Flag_of_Brazil.svg.png', 'active', '2022-07-26 13:51:08', '2022-07-26 14:17:01'),
(2, NULL, NULL, 'Argentina', 'Jorge Sampaoli', '[{\"name\":\"Franco Armani\",\"role\":\"Goalkeeper\"},{\"name\":\"Willy Caballero\",\"role\":\"Goalkeeper\"},{\"name\":\"Cristian Ansaldi\",\"role\":\"Defender\"},{\"name\":\"Federico Fazio\",\"role\":\"Defender\"},{\"name\":\"Gabriel Mercado\",\"role\":\"Defender\"},{\"name\":\"Nicol\\u00e1s Otamendi\",\"role\":\"Defender\"},{\"name\":\"Marcos Acuna\",\"role\":\"Midfielder\"},{\"name\":\"Ever Banega\",\"role\":\"Midfielder\"},{\"name\":\"Angel Di Mar\\u00eda\",\"role\":\"Midfielder\"},{\"name\":\"Enzo Perez\",\"role\":\"Midfielder\"},{\"name\":\"Eduardo Salvio\",\"role\":\"Midfielder\"},{\"name\":\"Gonzalo Higuain\",\"role\":\"Forward\"},{\"name\":\"Lionel Messi\",\"role\":\"Forward\"},{\"name\":\"Paulo Dybala\",\"role\":\"Forward\"},{\"name\":\"Sergio Aguero\",\"role\":\"Forward\"}]', '<p>The Argentina national football team represents Argentina in men\'s international football and is administered by the Argentine Football Association, the governing body for football in Argentina. Argentina\'s home stadium is Estadio Monumental Antonio Vespucio Liberti in Buenos Aires.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658829144.Flag_of_Argentina.svg.png', 'active', '2022-07-26 13:52:31', '2022-07-26 17:24:09'),
(3, NULL, NULL, 'Saudi Arabia', 'Couch Name', '[{\"name\":\"Abdullah Al Mayoof\",\"role\":\"Goalkeeper\"},{\"name\":\"Yaser Al Mosailem\",\"role\":\"Goalkeeper\"},{\"name\":\"Ali Al Bulayhi\",\"role\":\"Defender\"},{\"name\":\"Mohammed Al Burayk\",\"role\":\"Defender\"},{\"name\":\"Mansour Al Harbi\",\"role\":\"Defender\"},{\"name\":\"Yasir Al Shahrani\",\"role\":\"Defender\"},{\"name\":\"Motaz Hawsawi\",\"role\":\"Defender\"},{\"name\":\"Salem Al Dawsari\",\"role\":\"Midfielder\"},{\"name\":\"Salman Al Faraj\",\"role\":\"Midfielder\"},{\"name\":\"Abdullah Al Khaibari\",\"role\":\"Midfielder\"},{\"name\":\"Abdulmalek Al Khaibri\",\"role\":\"Midfielder\"},{\"name\":\"Mohammed Al Owais\",\"role\":\"Goalkeeper\"},{\"name\":\"Fahad Al Muwallad\",\"role\":\"Forward\"},{\"name\":\"Mohammed Al Sahlawi\",\"role\":\"Forward\"},{\"name\":\"Muhannad Aseri\",\"role\":\"Forward\"}]', '<p>The Saudi Arabia national football team represents Saudi Arabia in men\'s international football, and the team\'s colours are green and white. Saudi Arabia are known as Al-Suqour and Al-Akhdhar; the team represents both FIFA and Asian Football Confederation.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658830840.Flag_of_Saudi_Arabia.svg.png', 'active', '2022-07-26 13:53:41', '2022-07-26 14:26:07'),
(5, NULL, NULL, 'Portugal', 'Fernando Santos', '[{\"name\":\"Anthony Lopes\",\"role\":\"Goalkeeper\"},{\"name\":\"Beto\",\"role\":\"Goalkeeper\"},{\"name\":\"Bruno Alves\",\"role\":\"Defender\"},{\"name\":\"Cedric Soares\",\"role\":\"Defender\"},{\"name\":\"Raphael Guerreiro\",\"role\":\"Defender\"},{\"name\":\"Jose Fonte\",\"role\":\"Defender\"},{\"name\":\"Adrien Silva\",\"role\":\"Midfielder\"},{\"name\":\"Bernardo Silva\",\"role\":\"Midfielder\"},{\"name\":\"Bruno Fernandes\",\"role\":\"Midfielder\"},{\"name\":\"Manuel Fernandes\",\"role\":\"Midfielder\"},{\"name\":\"William Carvalho\",\"role\":\"Midfielder\"},{\"name\":\"Andre Silva\",\"role\":\"Forward\"},{\"name\":\"Cristiano Ronaldo\",\"role\":\"Forward\"},{\"name\":\"Gelson Martins\",\"role\":\"Forward\"},{\"name\":\"Gon\\u00e7alo Guedes\",\"role\":\"Forward\"}]', '<p>The Portugal national football team has represented Portugal in international men\'s football competition since 1921. The national team is controlled by the Portuguese Football Federation, the governing body for football in Portugal.&nbsp;</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658831640.Flag_of_Portugal.svg.jpg', 'active', '2022-07-26 13:54:38', '2022-07-26 14:34:38'),
(10, NULL, NULL, 'France', 'Didier Deschamps', '[{\"name\":\"Alphonse Areola\",\"role\":\"Goalkeeper\"},{\"name\":\"Hugo Lloris\",\"role\":\"Goalkeeper\"},{\"name\":\"Lucas Hern\\u00e1ndez\",\"role\":\"Defender\"},{\"name\":\"Presnel Kimpembe\",\"role\":\"Defender\"},{\"name\":\"Benjamin Mendy\",\"role\":\"Defender\"},{\"name\":\"Adil Rami\",\"role\":\"Defender\"},{\"name\":\"Nabil Fekir\",\"role\":\"Midfielder\"},{\"name\":\"N\'Golo Kant\\u00e9\",\"role\":\"Midfielder\"},{\"name\":\"Steven N\'Zonzi\",\"role\":\"Midfielder\"},{\"name\":\"Paul Pogba\",\"role\":\"Midfielder\"},{\"name\":\"Ousmane Demb\\u00e9l\\u00e9\",\"role\":\"Forward\"},{\"name\":\"Kylian Mbapp\\u00e9\",\"role\":\"Forward\"},{\"name\":\"Florian Thauvin\",\"role\":\"Forward\"},{\"name\":\"Antoine Griezmann\",\"role\":\"Forward\"},{\"name\":\"Thomas Lemar\",\"role\":\"Forward\"}]', '<p>The France national football team represents France in men\'s international football and is controlled by the French Football Federation, also known as FFF. The team\'s colours are blue, white, and red, and the coq gaulois its symbol. France are colloquially known as Les Bleus.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832009.ezgif-2-24c0bca310.jpg', 'active', '2022-07-26 14:00:55', '2022-07-26 14:40:14'),
(17, NULL, NULL, 'South Korea', 'Shin Tae-yong', '[{\"name\":\"Kim Seung-gyu\",\"role\":\"Goalkeeper\"},{\"name\":\"Kim Jin-hyeon\",\"role\":\"Goalkeeper\"},{\"name\":\"Lee Yong\",\"role\":\"Defender\"},{\"name\":\"Jeong Seung-hyeong\",\"role\":\"Defender\"},{\"name\":\"Oh Ban-suk\",\"role\":\"Defender\"},{\"name\":\"Yun Young-sun\",\"role\":\"Defender\"},{\"name\":\"Park Joo-ho\",\"role\":\"Defender\"},{\"name\":\"Ju Se-jong,\",\"role\":\"Midfielder\"},{\"name\":\"Lee Seung-woo\",\"role\":\"Midfielder\"},{\"name\":\"Koo Ja-cheol\",\"role\":\"Forward\"},{\"name\":\"Jung Woo-young\",\"role\":\"Midfielder\"},{\"name\":\"Son Heung-min\",\"role\":\"Forward\"},{\"name\":\"Kim Shin-wook,\",\"role\":\"Forward\"},{\"name\":\"Hwang Hee-chan\",\"role\":\"Forward\"},{\"name\":\"Jo Hyeon-woo\",\"role\":\"Goalkeeper\"}]', '<p>The South Korea national football team represents South Korea in men\'s international football and is governed by the Korea Football Association.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832059.ezgif-2-e6b4ac3f1c.jpg', 'active', '2022-07-26 14:48:25', '2022-07-26 14:48:25'),
(18, NULL, NULL, 'Sweden', 'Janne Andersson', '[{\"name\":\"SwedenKalle Johnsson\",\"role\":\"Goalkeeper\"},{\"name\":\"Kristoffer Nordfeldt\",\"role\":\"Goalkeeper\"},{\"name\":\"Ludwig Augustinsson\",\"role\":\"Defender\"},{\"name\":\"Andreas Granqvist\",\"role\":\"Defender\"},{\"name\":\"Filip Helander\",\"role\":\"Defender\"},{\"name\":\"Pontus Jansson\",\"role\":\"Defender\"},{\"name\":\"Victor Claesson\",\"role\":\"Midfielder\"},{\"name\":\"Albin Ekdal\",\"role\":\"Midfielder\"},{\"name\":\"Emil Forsberg\",\"role\":\"Midfielder\"},{\"name\":\"Oscar Hiljemark\",\"role\":\"Midfielder\"},{\"name\":\"Marcus Rohd\\u00e9n\",\"role\":\"Midfielder\"},{\"name\":\"Marcus Berg\",\"role\":\"Defender\"},{\"name\":\"Jimmy Durmaz\",\"role\":\"Defender\"},{\"name\":\"John Guidetti\",\"role\":\"Defender\"},{\"name\":\"Ola Toivonen\",\"role\":\"Defender\"}]', '<p>The Sweden national football team represents Sweden in men\'s international football and it is controlled by the Swedish Football Association, the governing body of football in Sweden. Sweden\'s home ground is Friends Arena in Solna and the team is coached by Janne Andersson.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832610.Flag_of_Sweden.svg (1).jpg', 'active', '2022-07-26 14:50:34', '2022-07-26 15:04:31'),
(19, NULL, NULL, 'Costa Rica', 'Óscar Ramírez', '[{\"name\":\"Leonel Moreira\",\"role\":\"Goalkeeper\"},{\"name\":\"Keylor Navas\",\"role\":\"Goalkeeper\"},{\"name\":\"Johnny Acosta\",\"role\":\"Defender\"},{\"name\":\"Francisco Calvo\",\"role\":\"Defender\"},{\"name\":\"\\u00d3scar Duarte\",\"role\":\"Defender\"},{\"name\":\"Cristian Gamboa\",\"role\":\"Defender\"},{\"name\":\"Randall Azofeifa\",\"role\":\"Midfielder\"},{\"name\":\"Christian Bola\\u00f1os\",\"role\":\"Midfielder\"},{\"name\":\"Celso Borges\",\"role\":\"Midfielder\"},{\"name\":\"Daniel Colindres\",\"role\":\"Midfielder\"},{\"name\":\"David Guzm\\u00e1n\",\"role\":\"Midfielder\"},{\"name\":\"Joel Campbell\",\"role\":\"Forward\"},{\"name\":\"Marcos Ure\\u00f1a\",\"role\":\"Forward\"},{\"name\":\"Johan Venegas\",\"role\":\"Forward\"},{\"name\":\"Ian Smith\",\"role\":\"Defender\"}]', '<p>The Costa Rica national football team represents Costa Rica in men\'s international football. The national team is administered by the Costa Rican Football Federation, the governing body for football in Costa Rica.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832786.2560px-Flag_of_Costa_Rica_(state).svg.png', 'active', '2022-07-26 14:53:31', '2022-07-26 15:08:09'),
(20, NULL, NULL, 'Serbia', 'Mladen Krstajić', '[{\"name\":\"Marko Dmitrovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Predrag Rajkovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Branislav Ivanovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Aleksandar Kolarov\",\"role\":\"Defender\"},{\"name\":\"Nikola Milenkovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Milan Rodi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Antonio Rukavina\",\"role\":\"Defender\"},{\"name\":\"Marko Gruji\\u0107\",\"role\":\"Defender\"},{\"name\":\"Filip Kosti\\u0107\",\"role\":\"Defender\"},{\"name\":\"Nemanja Mati\\u0107\",\"role\":\"Defender\"},{\"name\":\"Luka Milivojevi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Luka Jovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Adem Ljaji\\u0107\",\"role\":\"Defender\"},{\"name\":\"Aleksandar Prijovi\\u0107\",\"role\":\"Defender\"},{\"name\":\"Du\\u0161an Tadi\\u0107\",\"role\":\"Defender\"}]', '<p>The Serbia national football team represents Serbia in men\'s international football competition. It is controlled by the Football Association of Serbia, the governing body for football in Serbia.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832837.2560px-Flag_of_Serbia.svg.png', 'active', '2022-07-26 14:54:15', '2022-07-26 15:10:59'),
(21, NULL, NULL, 'Iceland', 'Heimir Hallgrímsson', '[{\"name\":\"Hannes Halldorsson\",\"role\":\"Defender\"},{\"name\":\"Runar Runarsson\",\"role\":\"Defender\"},{\"name\":\"Kari Arnason\",\"role\":\"Defender\"},{\"name\":\"Holmar Eyjolfsson\",\"role\":\"Defender\"},{\"name\":\"Rurik Gislason\",\"role\":\"Defender\"},{\"name\":\"Sverrir Ingason\",\"role\":\"Defender\"},{\"name\":\"Hordur Magnusson\",\"role\":\"Defender\"},{\"name\":\"Birkir Bjarnason\",\"role\":\"Defender\"},{\"name\":\"Samuel Fridjonsson\",\"role\":\"Defender\"},{\"name\":\"Johann Gudmundsson\",\"role\":\"Defender\"},{\"name\":\"Aron Gunnarsson\",\"role\":\"Defender\"},{\"name\":\"Jon Bodvarsson\",\"role\":\"Defender\"},{\"name\":\"Alfred Finnbogason\",\"role\":\"Defender\"},{\"name\":\"Albert Gudmundsson\",\"role\":\"Defender\"},{\"name\":\"Bjorn Sigurdarson\",\"role\":\"Defender\"}]', '<p>The Iceland women\'s national football team represents Iceland in international women\'s football. They are currently ranked as the 17th best women\'s national team in the world by FIFA as of December 2019.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832875.Flag_of_Iceland.svg.png', 'active', '2022-07-26 14:55:05', '2022-07-26 15:15:27'),
(22, NULL, NULL, 'Nigeria', 'Gernot Rohr', '[{\"name\":\"Daniel Akpeyi\",\"role\":\"Goalkeeper\"},{\"name\":\"Ikechukwu Ezenwa\",\"role\":\"Goalkeeper\"},{\"name\":\"Chidozie Awaziem\",\"role\":\"Defender\"},{\"name\":\"Leon Balogun\",\"role\":\"Defender\"},{\"name\":\"Tyronne Ebuehi\",\"role\":\"Defender\"},{\"name\":\"Elderson Echi\\u00e9jil\\u00e9\",\"role\":\"Defender\"},{\"name\":\"Peter Etebo\",\"role\":\"Midfielder\"},{\"name\":\"Wilfred Ndidi\",\"role\":\"Midfielder\"},{\"name\":\"Joel Obi\",\"role\":\"Midfielder\"},{\"name\":\"John Mikel Obi\",\"role\":\"Midfielder\"},{\"name\":\"John Ogu\",\"role\":\"Midfielder\"},{\"name\":\"Odion Ighalo\",\"role\":\"Forward\"},{\"name\":\"Kelechi Iheanacho\",\"role\":\"Forward\"},{\"name\":\"Alex Iwobi\",\"role\":\"Forward\"},{\"name\":\"Victor Moses\",\"role\":\"Forward\"}]', '<p>The Nigeria national football team represents Nigeria in men\'s international football. Governed by the Nigeria Football Federation, they are three-time Africa Cup of Nations winners, with their most recent title in 2013.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832921.Flag_of_Nigeria.svg.png', 'active', '2022-07-26 14:55:47', '2022-07-26 15:19:38'),
(23, NULL, NULL, 'Croatia', 'Zlatko Dalic', '[{\"name\":\"Danijel Subasic\",\"role\":\"Goalkeeper\"},{\"name\":\"Lovre Kalinic\",\"role\":\"Goalkeeper\"},{\"name\":\"Vedran Corluka\",\"role\":\"Defender\"},{\"name\":\"Domagoj Vida\",\"role\":\"Defender\"},{\"name\":\"Ivan Strinic\",\"role\":\"Defender\"},{\"name\":\"Dejan Lovren\",\"role\":\"Defender\"},{\"name\":\"Sime Vrsaljko\",\"role\":\"Midfielder\"},{\"name\":\"Luka Modric\",\"role\":\"Midfielder\"},{\"name\":\"Ivan Rakitic\",\"role\":\"Midfielder\"},{\"name\":\"Mateo Kovacic\",\"role\":\"Midfielder\"},{\"name\":\"Milan Badelj\",\"role\":\"Midfielder\"},{\"name\":\"Vedran Corluka\",\"role\":\"Forward\"},{\"name\":\"Domagoj Vida\",\"role\":\"Forward\"},{\"name\":\"Domagoj Vida\",\"role\":\"Forward\"},{\"name\":\"Dejan Lovren\",\"role\":\"Forward\"}]', '<p>The Croatia national football team represents Croatia in men\'s international football matches and is controlled by the Croatian Football Federation. The team was recognised by both FIFA and UEFA following the dissolution of Yugoslavia.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832963.Flag_of_Croatia.svg.png', 'active', '2022-07-26 14:56:25', '2022-07-26 15:29:20'),
(24, NULL, NULL, 'Australia', 'Graham Arnold', '[{\"name\":\"Brad Jones\",\"role\":\"Goalkeeper\"},{\"name\":\"Mathew Ryan\",\"role\":\"Goalkeeper\"},{\"name\":\"Aziz Behich\",\"role\":\"Defender\"},{\"name\":\"Milo\\u0161 Degenek\",\"role\":\"Defender\"},{\"name\":\"James Meredith\",\"role\":\"Defender\"},{\"name\":\"Mark Milligan\",\"role\":\"Defender\"},{\"name\":\"Tim Cahill\",\"role\":\"Midfielder\"},{\"name\":\"Jackson Irvine\",\"role\":\"Midfielder\"},{\"name\":\"Mile Jedinak\",\"role\":\"Midfielder\"},{\"name\":\"Robbie Kruse\",\"role\":\"Midfielder\"},{\"name\":\"Massimo Luongo\",\"role\":\"Midfielder\"},{\"name\":\"Tomi Juri\\u0107\",\"role\":\"Forward\"},{\"name\":\"Mathew Leckie\",\"role\":\"Forward\"},{\"name\":\"Tomi Juri\\u0107\",\"role\":\"Forward\"},{\"name\":\"Daniel Arzani\",\"role\":\"Forward\"}]', '<p>The Australia men\'s national soccer team represents Australia in international men\'s soccer. Officially nicknamed the Socceroos, the team is controlled by the governing body for soccer in Australia</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658832999.Flag_of_Australia.svg.png', 'active', '2022-07-26 14:57:07', '2022-07-26 15:33:21'),
(25, NULL, NULL, 'Denmark', 'Hareide', '[{\"name\":\"Kasper Schmeichel\",\"role\":\"Goalkeeper\"},{\"name\":\"Jonas L\\u00f6ssl\",\"role\":\"Goalkeeper\"},{\"name\":\"Simon Kj\\u00e6r\",\"role\":\"Defender\"},{\"name\":\"Andreas Christensen\",\"role\":\"Defender\"},{\"name\":\"Mathias \\u2018Zanka\",\"role\":\"Defender\"},{\"name\":\"Jannik Vestergaard\",\"role\":\"Defender\"},{\"name\":\"Henrik Dalsgaard\",\"role\":\"Midfielder\"},{\"name\":\"William Kvist\",\"role\":\"Midfielder\"},{\"name\":\"Thomas Delaney\",\"role\":\"Midfielder\"},{\"name\":\"Lukas Lerager\",\"role\":\"Midfielder\"},{\"name\":\"Christian Eriksen\",\"role\":\"Midfielder\"},{\"name\":\"Pione Sisto\",\"role\":\"Forward\"},{\"name\":\"Martin Braithwaite\",\"role\":\"Forward\"},{\"name\":\"Andreas Cornelius\",\"role\":\"Forward\"},{\"name\":\"Viktor Fischer\",\"role\":\"Forward\"}]', '<p>The Denmark national football team represents Denmark in men\'s international football competition. It is controlled by the Danish Football Association, the governing body for the football clubs which are organised under DBU.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833040.Flag_of_Denmark.svg.png', 'active', '2022-07-26 14:57:43', '2022-07-26 15:41:23'),
(26, NULL, NULL, 'Egypt', 'Ehab Galal', '[{\"name\":\"Essam El-Hadary\",\"role\":\"Goalkeeper\"},{\"name\":\"Mohamed El-Shennawy\",\"role\":\"Goalkeeper\"},{\"name\":\"Ahmed Fathi\",\"role\":\"Defender\"},{\"name\":\"Saad Samir\",\"role\":\"Defender\"},{\"name\":\"Ayman Ashraf\",\"role\":\"Defender\"},{\"name\":\"Mohamed AbdelShafy\",\"role\":\"Defender\"},{\"name\":\"Ahmed Hegazi\",\"role\":\"Defender\"},{\"name\":\"Tarek Hamed\",\"role\":\"Midfielder\"},{\"name\":\"Mahmoud Abdel-Razik Shikabala\",\"role\":\"Midfielder\"},{\"name\":\"Abdallah El-Said\",\"role\":\"Midfielder\"},{\"name\":\"Sam Morsy\",\"role\":\"Midfielder\"},{\"name\":\"Mohamed Salah\",\"role\":\"Midfielder\"},{\"name\":\"Sherif Ekramy\",\"role\":\"Goalkeeper\"},{\"name\":\"Marwan Mohsen\",\"role\":\"Forward\"},{\"name\":\"Mahmoud Kahraba\",\"role\":\"Forward\"}]', '<p>The Egypt national football team, known colloquially as \"the Pharaohs\", represents Egypt in men\'s international football, and is governed by the Egyptian Football Association, the governing body of football in Egypt.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833092.Flag_of_Egypt.svg.png', 'active', '2022-07-26 14:58:37', '2022-07-26 15:40:40'),
(27, NULL, NULL, 'Russia', 'Valeri Karpin', '[{\"name\":\"Anton Shunin\",\"role\":\"Goalkeeper\"},{\"name\":\"Yury Dyupin\",\"role\":\"Goalkeeper\"},{\"name\":\"M\\u00e1rio Fernandes\",\"role\":\"Defender\"},{\"name\":\"Igor Diveyev\",\"role\":\"Defender\"},{\"name\":\"Vyacheslav Karavayev\",\"role\":\"Defender\"},{\"name\":\"Andrei Semyonov\",\"role\":\"Defender\"},{\"name\":\"Fyodor Kudryashov\",\"role\":\"Defender\"},{\"name\":\"Denis Cheryshev\",\"role\":\"Midfielder\"},{\"name\":\"Magomed Ozdoyev\",\"role\":\"Midfielder\"},{\"name\":\"Dmitri Barinov\",\"role\":\"Midfielder\"},{\"name\":\"Roman Zobnin\",\"role\":\"Midfielder\"},{\"name\":\"Aleksei Miranchuk\",\"role\":\"Midfielder\"},{\"name\":\"Aleksandr Sobolev\",\"role\":\"Forward\"},{\"name\":\"Anton Zabolotny\",\"role\":\"Forward\"},{\"name\":\"Artem Dzyuba\",\"role\":\"Forward\"}]', '<p>The Russia national football team represents the Russian Federation in men\'s international football. It is controlled by the Russian Football Union, the governing body for football in Russia. Russia\'s home ground is the Luzhniki Stadium in Moscow and their head coach is Valery Karpin.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833133.Flag_of_Russia.svg.png', 'active', '2022-07-26 14:59:19', '2022-07-26 15:45:25'),
(29, NULL, NULL, 'Uruguay', 'Oscar Tabarez', '[{\"name\":\"Martin Campana\",\"role\":\"Defender\"},{\"name\":\"Fernando Muslera\",\"role\":\"Defender\"},{\"name\":\"Martin Caceres\",\"role\":\"Defender\"},{\"name\":\"Sebastian Coates\",\"role\":\"Defender\"},{\"name\":\"Jose Maria Gimenez\",\"role\":\"Defender\"},{\"name\":\"Diego Godin\",\"role\":\"Defender\"},{\"name\":\"Giorgian De Arrascaeta\",\"role\":\"Defender\"},{\"name\":\"Rodrigo Bentancur\",\"role\":\"Defender\"},{\"name\":\"Diego Laxalt\",\"role\":\"Defender\"},{\"name\":\"Nahitan Nandez\",\"role\":\"Defender\"},{\"name\":\"Cristian Rodriguez\",\"role\":\"Defender\"},{\"name\":\"Edinson Cavani\",\"role\":\"Defender\"},{\"name\":\"Maximiliano Gomez\",\"role\":\"Defender\"},{\"name\":\"Luis Suarez\",\"role\":\"Defender\"},{\"name\":\"Cristhian Stuani\",\"role\":\"Defender\"}]', '<p>The Uruguay national football team represents Uruguay in international football, and is controlled by the Uruguayan Football Association, the governing body for football in Uruguay. The Uruguayan team is commonly referred to as La Celeste. Uruguay has won the Copa América 15 times.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833233.800px-Flag_of_Uruguay_(1828-1830).svg.png', 'active', '2022-07-26 15:01:00', '2022-07-26 15:52:43'),
(30, NULL, NULL, 'Colombia', 'Néstor Lorenzo', '[{\"name\":\"Iv\\u00e1n Arboleda\",\"role\":\"Goalkeeper\"},{\"name\":\"Jos\\u00e9 Luis Chunga\",\"role\":\"Goalkeeper\"},{\"name\":\"Helibelton Palacios\",\"role\":\"Defender\"},{\"name\":\"Carlos Cuesta\",\"role\":\"Defender\"},{\"name\":\"Jhon Lucum\\u00ed\",\"role\":\"Defender\"},{\"name\":\"Davinson S\\u00e1nchez\",\"role\":\"Defender\"},{\"name\":\"Eduard Atuesta\",\"role\":\"Midfielder\"},{\"name\":\"Kevin Velasco\",\"role\":\"Midfielder\"},{\"name\":\"Kevin Agudelo\",\"role\":\"Midfielder\"},{\"name\":\"Jhon Arias\",\"role\":\"Midfielder\"},{\"name\":\"Jaminton Campaz\",\"role\":\"Midfielder\"},{\"name\":\"Rafael Borr\\u00e9\",\"role\":\"Forward\"},{\"name\":\"\\u00d3scar Estupi\\u00f1\\u00e1n\",\"role\":\"Forward\"},{\"name\":\"Cucho Hern\\u00e1ndez\",\"role\":\"Forward\"},{\"name\":\"Luis Su\\u00e1rez\",\"role\":\"Forward\"}]', '<p>The Colombia national football team represents Colombia in men\'s international football and is managed by the Colombian Football Federation, the governing body for football in Colombia. They are a member of CONMEBOL and are currently ranked 17th in the FIFA World Rankings.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833281.Flag_of_Colombia.svg.jpg', 'active', '2022-07-26 15:01:53', '2022-07-26 15:59:29'),
(31, NULL, NULL, 'Peru', 'Ricardo Gareca', '[{\"name\":\"Pedro Gallese\",\"role\":\"Defender\"},{\"name\":\"Carlos Caceda\",\"role\":\"Defender\"},{\"name\":\"Luis Advincula\",\"role\":\"Defender\"},{\"name\":\"Aldo Corzo\",\"role\":\"Defender\"},{\"name\":\"Christian Ramos\",\"role\":\"Defender\"},{\"name\":\"Miguel Araujo\",\"role\":\"Defender\"},{\"name\":\"Renato Tapia\",\"role\":\"Defender\"},{\"name\":\"Pedro Aquino\",\"role\":\"Defender\"},{\"name\":\"Yoshimar Yotun\",\"role\":\"Defender\"},{\"name\":\"Paolo Hurtado\",\"role\":\"Defender\"},{\"name\":\"Christian Cueva\",\"role\":\"Defender\"},{\"name\":\"Andre Carrillo\",\"role\":\"Defender\"},{\"name\":\"Raul Ruidiaz\",\"role\":\"Defender\"},{\"name\":\"Jefferson Farfan\",\"role\":\"Defender\"},{\"name\":\"Paolo Guerrero\",\"role\":\"Defender\"}]', '<p>The Peru national football team represents Peru in men\'s international football. The national team has been organised, since 1927, by the Peruvian Football Federation. The FPF constitutes one of the ten members of FIFA\'s South American Football Confederation.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658833329.1024px-Flag_of_Peru_(state).svg.jpg', 'active', '2022-07-26 15:02:31', '2022-07-26 16:03:20'),
(32, NULL, NULL, 'Qatar', 'Félix Sánchez', '[{\"name\":\"Saad Al Sheeb\",\"role\":\"Goalkeeper\"},{\"name\":\"Yousef Hassan\",\"role\":\"Goalkeeper\"},{\"name\":\"Homam Ahmed\",\"role\":\"Defender\"},{\"name\":\"Abdelkarim Hassan\",\"role\":\"Defender\"},{\"name\":\"Salem Al Hajri\",\"role\":\"Defender\"},{\"name\":\"Pedro Miguel Correia\",\"role\":\"Defender\"},{\"name\":\"Boualem Khoukhi\",\"role\":\"Defender\"},{\"name\":\"Mohammed Al Bayatier\",\"role\":\"Midfielder\"},{\"name\":\"Assim Madibo\",\"role\":\"Midfielder\"},{\"name\":\"Abdullah Abdulsalam\",\"role\":\"Midfielder\"},{\"name\":\"Abdulrahman Fahmi Moustafa\",\"role\":\"Midfielder\"},{\"name\":\"Ahmed Alaa Eldin\",\"role\":\"Forward\"},{\"name\":\"Almoez Ali\",\"role\":\"Forward\"},{\"name\":\"Akram Afif\",\"role\":\"Forward\"},{\"name\":\"Khalid Muneer Mazeed\",\"role\":\"Forward\"}]', '<p>The Qatar national football team represents Qatar in international football, and is controlled by the Qatar Football Association and AFC. The team has appeared in ten Asian Cup tournaments and won it once in 2019. They play their home games at Khalifa International Stadium and Jassim Bin Hamad Stadium.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658834526.istockphoto-1063898358-612x612.jpg', 'active', '2022-07-26 15:22:17', '2022-07-26 16:06:40'),
(33, NULL, NULL, 'Netherlands', 'Louis van Gaal', '[{\"name\":\"Tim Krul\",\"role\":\"Goalkeeper\"},{\"name\":\"Jasper Cillessen\",\"role\":\"Goalkeeper\"},{\"name\":\"Hans Hateboer\",\"role\":\"Defender\"},{\"name\":\"Nathan Ake\",\"role\":\"Defender\"},{\"name\":\"Daley Blind\",\"role\":\"Defender\"},{\"name\":\"Matthijs de Ligt\",\"role\":\"Defender\"},{\"name\":\"Stefan de Vrij\",\"role\":\"Defender\"},{\"name\":\"Davy Klaassen\",\"role\":\"Midfielder\"},{\"name\":\"Teun Koopmeiners\",\"role\":\"Midfielder\"},{\"name\":\"Guus Til\",\"role\":\"Midfielder\"},{\"name\":\"Jerdy Schouten\",\"role\":\"Midfielder\"},{\"name\":\"Memphis Depay\",\"role\":\"Forward\"},{\"name\":\"Noa Lang\",\"role\":\"Forward\"},{\"name\":\"Wout Weghorst\",\"role\":\"Forward\"},{\"name\":\"Cody Gakpo\",\"role\":\"Forward\"}]', '<p>The Netherlands women\'s national football team is directed by the Royal Dutch Football Association, which is a member of UEFA and FIFA. In 1971, the team played the first women\'s international football match recognized by FIFA against France.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658834638.1200px-Flag_of_the_Netherlands.svg.jpg', 'active', '2022-07-26 15:24:01', '2022-07-26 16:11:24'),
(34, NULL, NULL, 'Equador', 'Enner Valencia', '[{\"name\":\"Alexander Dom\\u00ednguez\",\"role\":\"Goalkeeper\"},{\"name\":\"Hernan Galindez\",\"role\":\"Goalkeeper\"},{\"name\":\"Robert Arboleda\",\"role\":\"Defender\"},{\"name\":\"Xavier Arreaga\",\"role\":\"Defender\"},{\"name\":\"Pervis Estupi\\u00f1\\u00e1n\",\"role\":\"Defender\"},{\"name\":\"Byron Castillo\",\"role\":\"Defender\"},{\"name\":\"Dixon Arroyo\",\"role\":\"Midfielder\"},{\"name\":\"Carlos Gruezo\",\"role\":\"Midfielder\"},{\"name\":\"Sebasti\\u00e1n M\\u00e9ndez\",\"role\":\"Midfielder\"},{\"name\":\"Jos\\u00e9 Cifuentes\",\"role\":\"Midfielder\"},{\"name\":\"Enner Valencia\",\"role\":\"Forward\"},{\"name\":\"Romario Ibarra\",\"role\":\"Forward\"},{\"name\":\"\\u00c1ngel Mena\",\"role\":\"Forward\"},{\"name\":\"Jordy Caicedo\",\"role\":\"Forward\"},{\"name\":\"Michael Estrada\",\"role\":\"Forward\"}]', '<p>The Ecuador national football team represents Ecuador in men\'s international football and is controlled by the Ecuadorian Football Federation. They joined FIFA in 1926 and CONMEBOL a year later.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658837642.001.jpg', 'active', '2022-07-26 15:31:11', '2022-07-26 16:17:44'),
(35, NULL, NULL, 'Mexico', 'Gerardo Martino', '[{\"name\":\"Francisco Guillermo Ochoa\",\"role\":\"Goalkeeper\"},{\"name\":\"Carlos Acevedo\",\"role\":\"Goalkeeper\"},{\"name\":\"C\\u00e9sar Montes\",\"role\":\"Defender\"},{\"name\":\"Gerardo Arteaga\",\"role\":\"Defender\"},{\"name\":\"Hector Moreno\",\"role\":\"Defender\"},{\"name\":\"Israel Reyes\",\"role\":\"Defender\"},{\"name\":\"Diego Lainez\",\"role\":\"Defender\"},{\"name\":\"Edson Alvarez\",\"role\":\"Defender\"},{\"name\":\"Erick Aguirre\",\"role\":\"Defender\"},{\"name\":\"Erick Gutierrez\",\"role\":\"Defender\"},{\"name\":\"Erick Sanchez\",\"role\":\"Defender\"},{\"name\":\"Rodolfo Pizarro\",\"role\":\"Defender\"},{\"name\":\"Santiago Gimenez\",\"role\":\"Defender\"},{\"name\":\"Uriel Antuna\",\"role\":\"Defender\"},{\"name\":\"Jesus Manuel Corona\",\"role\":\"Defender\"}]', '<p>The Mexico national football team represents Mexico in international football and is governed by the Mexican Football Federation. It competes as a member of CONCACAF. Mexico has qualified to seventeen World Cups and has qualified consecutively since 1994, making it one of six countries to do so.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658837972.002.jpg', 'active', '2022-07-26 15:48:08', '2022-07-26 16:40:28'),
(36, NULL, NULL, 'Switzerland', 'Murat Yakin', '[{\"name\":\"Yann Sommer\",\"role\":\"Goalkeeper\"},{\"name\":\"Yvon Mvogo\",\"role\":\"Goalkeeper\"},{\"name\":\"Eray Coemertr\",\"role\":\"Defender\"},{\"name\":\"Fabian Schaer\",\"role\":\"Defender\"},{\"name\":\"Jordan Lotomba\",\"role\":\"Defender\"},{\"name\":\"Kevin Mbabu\",\"role\":\"Defender\"},{\"name\":\"Leonidas Stergiou\",\"role\":\"Midfielder\"},{\"name\":\"Granit Xhaka\",\"role\":\"Midfielder\"},{\"name\":\"Michel Aebischer\",\"role\":\"Midfielder\"},{\"name\":\"Noah Okafor\",\"role\":\"Midfielder\"},{\"name\":\"Remo Freuler\",\"role\":\"Midfielder\"},{\"name\":\"Breel Embolo\",\"role\":\"Forward\"},{\"name\":\"Haris Seferovic\",\"role\":\"Forward\"},{\"name\":\"Mario Gavranovic\",\"role\":\"Forward\"},{\"name\":\"Mattia Bottan\",\"role\":\"Forward\"}]', '<p>The Switzerland national football team represents Switzerland in international football. The national team is controlled by the Swiss Football Association. Switzerland\'s best performances at the FIFA World Cup were three quarter-final appearances, in 1934, 1938 and 1954.</p>', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658836307.Flag_of_Switzerland.svg.png', 'active', '2022-07-26 15:51:49', '2022-07-26 16:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'FIFA World Cup 2022', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658830301.2022-fifa-world-cup-logo.jpg', '2022-07-26 14:11:43', '2022-07-26 14:11:43'),
(2, 'Copa Ameirca 2020', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658836647.07c13597c301a929beb21fc5f828ed198aaac2a2.jpg', '2022-07-26 15:57:28', '2022-07-26 15:57:28'),
(3, 'Summer Olimpic', 'http://livefootball.teamprojectx.xyz/uploads/setting/1658838931.logo_color.svg', '2022-07-26 16:35:32', '2022-07-26 16:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role_id`, `name`, `email`, `phone`, `access`, `image`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'superadmin@livefootball.com', '00000021421', NULL, 'https://livecricket.teamprojectx.xyz/uploads/admin/1658501117.51f6fb256629fc755b8870c801092942.png', NULL, '$2y$10$ti2e3KS8m0ZnBXFjS9RFQOHLrI2wNdKAbE6WHA/cYikVupIavxvDS', 'active', NULL, '2022-07-19 01:55:40', '2022-07-23 13:19:48'),
(2, 1, 'demo', 'admin@livefootball.com', '00000000000', NULL, NULL, NULL, '$2y$10$vDIGowdeU/xWfOXjx4GmiO8E5kRdKQduvG.sivNKPJoEPwgq5ksJ6', 'active', NULL, '2022-07-19 01:55:40', '2022-07-19 01:55:40'),
(7, 3, 'rupomehsan', 'rupomehsan55@yahoo.com', NULL, NULL, NULL, NULL, '$2y$10$qf06elyPCWs60Anu1Bh2Mepn.yKipcENtQqY4QUYumWAkBO0KtFyC', 'active', NULL, '2022-07-25 21:42:07', '2022-07-25 21:42:07'),
(8, 3, 'EMMANUEL RUVURAJABO', 'ruvurajabo@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$akFdhX9j/Ea52/ofBgaBcezfh91D8ltkYYfhkzNd6PjGdwHAcTA6i', 'active', NULL, '2022-08-29 14:23:22', '2022-08-29 14:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `web_ads`
--

CREATE TABLE `web_ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_per_video_category` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_desktop` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desktop_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_tablet_landscape` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tablet_landscape_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_tablet_portrait` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tablet_portrait_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_phone` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_ads`
--

INSERT INTO `web_ads` (`id`, `ad_type`, `status`, `ad_link`, `ad_title`, `show_per_video_category`, `image`, `disable_desktop`, `desktop_adsense`, `disable_tablet_landscape`, `tablet_landscape_adsense`, `disable_tablet_portrait`, `tablet_portrait_adsense`, `disable_phone`, `phone_adsense`, `created_at`, `updated_at`) VALUES
(1, 'header', 'off', NULL, NULL, NULL, NULL, 'off', '0', 'off', '0', 'off', '0', 'off', '0', '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(2, 'site_banner', 'off', NULL, NULL, NULL, NULL, 'off', '0', 'off', '0', 'off', '0', 'off', '0', '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(3, 'upcoming_matches', 'off', NULL, NULL, NULL, NULL, 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(4, 'native_series', 'off', NULL, NULL, NULL, NULL, 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(5, 'popup', 'off', NULL, NULL, NULL, NULL, 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(6, 'custom_header', 'on', NULL, NULL, NULL, '1658561571.3102621906092104107.gif', 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(7, 'custom_site_banner', 'on', NULL, NULL, NULL, '1658561591.8248504646546887930.gif', 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(8, 'custom_upcoming_matches', 'on', NULL, NULL, 2, '1658561698.Capgfdfgdture.PNG', 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28'),
(9, 'custom_popup', 'on', NULL, NULL, 5, '1658562028.Cadfghdfghpture.PNG', 'off', NULL, 'off', NULL, 'off', NULL, 'off', NULL, '2022-07-23 11:40:28', '2022-07-23 11:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `web_advertisements`
--

CREATE TABLE `web_advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_adds` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`web_adds`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_lists`
--
ALTER TABLE `favorite_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_codes`
--
ALTER TABLE `forgot_password_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_requests`
--
ALTER TABLE `forgot_password_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_teams`
--
ALTER TABLE `group_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_notifications`
--
ALTER TABLE `manage_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_information`
--
ALTER TABLE `match_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `match_won_infos`
--
ALTER TABLE `match_won_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `point_tables`
--
ALTER TABLE `point_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtps`
--
ALTER TABLE `smtps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_ads`
--
ALTER TABLE `web_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_advertisements`
--
ALTER TABLE `web_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_lists`
--
ALTER TABLE `favorite_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgot_password_codes`
--
ALTER TABLE `forgot_password_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `forgot_password_requests`
--
ALTER TABLE `forgot_password_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `group_teams`
--
ALTER TABLE `group_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `manage_notifications`
--
ALTER TABLE `manage_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `match_information`
--
ALTER TABLE `match_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `match_won_infos`
--
ALTER TABLE `match_won_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `point_tables`
--
ALTER TABLE `point_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smtps`
--
ALTER TABLE `smtps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_ads`
--
ALTER TABLE `web_ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_advertisements`
--
ALTER TABLE `web_advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
