-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 02:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gardinero`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `total_duration` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observations` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `date`, `time`, `area`, `sum`, `total_duration`, `address`, `observations`, `team_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '2017-04-28', '10:00:00', 80, 6330, 180, 'Strada Pădureni, Bucharest, Romania', NULL, 1, 8, '2017-04-18 18:31:16', '2017-04-18 18:31:16'),
(2, NULL, '2017-07-20', '16:00:00', 40, 6330, 120, 'Strada Pădureni, Bucharest, Romania', NULL, 2, 8, '2017-04-18 18:31:16', '2017-04-18 18:31:16'),
(3, NULL, '2017-07-20', '16:30:00', 250, 8675, 1750, 'Drumul Pădurea Neagră, Bucharest, Romania', NULL, 1, 9, '2017-04-19 18:53:04', '2017-04-19 18:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2015_01_15_105324_create_roles_table', 1),
(18, '2015_01_15_114412_create_role_user_table', 1),
(19, '2015_01_26_115212_create_permissions_table', 1),
(20, '2015_01_26_115523_create_permission_role_table', 1),
(21, '2015_02_09_132439_create_permission_user_table', 1),
(22, '2017_03_01_135405_create_teams_table', 1),
(23, '2017_03_01_140555_create_team_members_table', 1),
(24, '2017_03_05_193919_create_jobs_table', 2),
(25, '2017_03_29_172459_create_pages_table', 2),
(26, '2017_04_13_204928_create_services_table', 3),
(27, '2017_04_13_213928_create_sericeables_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `content`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Servicii', 'servicii', '        <div class=\"row\">\r\n            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center page-info\">\r\n                <h4>Curtea ta se află în cele mai bune mâini</h4>\r\n                <img src=\"frontend/assets/images/separator.png\" alt=\"\" class=\"separator-line\">\r\n                <p>Mai jos puteti gasi lista de preturi standard insa in functie de numarul de comenzi<br>din zona dumneavoastra ne vom asigura ca vom oferi preturi mai mici.</p>\r\n                <img src=\"frontend/assets/images/separator.png\" alt=\"\" class=\"separator-line\">\r\n            </div>\r\n        </div><div class=\"row\">\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Intretinere gazon</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Tundere gazon</a></li>\r\n                    <li><a href=\"\">Aerisire gazon</a></li>\r\n                    <li><a href=\"\">Scarificare</a></li>\r\n                    <li><a href=\"\">Gazonare</a></li>\r\n                    <li><a href=\"\">Revigorare gazon</a></li>\r\n                    <li><a href=\"\">Greblare</a></li>\r\n                    <li><a href=\"\">Suprainsamantare</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Ierbicidare</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Ierbicidare burieni</a></li>\r\n                    <li><a href=\"\">Aplicare ingrasaminte</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Toaletare copaci</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Taiare de formare a coroanei</a></li>\r\n                    <li><a href=\"\">Taiere pentru regenerare a copacilor</a></li>\r\n                </ul>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Insecticide</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Insecticide</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Plantare gazon Seminte</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Pregatire teren</a></li>\r\n                    <li><a href=\"\">Insamantare gazon</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Plantare gazon rulou</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Pregatire teren</a></li>\r\n                    <li><a href=\"\">Plantare gazon*</a></li>\r\n                </ul>\r\n            </div>\r\n        </div>\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Plantare copaci</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Pregatire teren</a></li>\r\n                    <li><a href=\"\">Plantare copaci</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Amenajare curti</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Proiectare peisagistica</a></li>\r\n                    <li><a href=\"\">Elemente decorative - roci, fantani, alei</a></li>\r\n                    <li><a href=\"\">Proiectare si constructie zone legume bio</a></li>\r\n                </ul>\r\n            </div>\r\n            <div class=\"col-lg-1 col-sm-1 col-xs-3 services\">\r\n                <h3>Sisteme de irigatie</h3>\r\n                <ul>\r\n                    <li><a href=\"\">Proiectare sisteme de irigatie</a></li>\r\n                    <li><a href=\"\">Instalare sisteme de irigatie</a></li>\r\n                    <li><a href=\"\">Instalare drenaje</a></li>\r\n                </ul>\r\n            </div>\r\n        </div>', 'Servicii', 'Pagina de servicii', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(2, 'Preturi', 'preturi', '<div class=\"row\">\r\n            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center page-info\">\r\n                <h4>Curtea ta se află în cele mai bune mâini</h4>\r\n                <img src=\"frontend/assets/images/separator.png\" alt=\"\" class=\"separator-line\">\r\n                <p>Mai jos puteti gasi lista de preturi standard insa in functie de numarul de comenzi<br>din zona dumneavoastra ne vom asigura ca vom oferi preturi mai mici.</p>\r\n                <img src=\"frontend/assets/images/separator.png\" alt=\"\" class=\"separator-line\">\r\n            </div>\r\n        </div>\r\n\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-offset-1 col-md-offset-05 col-lg-1 col-md-2 services text-center no-padd\">\r\n                <h3>Intretinere gazon</h3>\r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"prices-table\" align=\"center\">\r\n                    <tr>\r\n                        <td class=\"text-left\">Tundere gazon</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">0,3 lei/mp</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td class=\"text-left\">Aerisire gazon</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">0,1 lei/mp</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td class=\"text-left\">Scarificare</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">0,1 lei/mp</td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n            <div class=\"col-lg-offset-1 col-md-offset-05 col-lg-1 col-md-2 services text-center no-padd\">\r\n                <h3>Ierbicidare</h3>\r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"prices-table\" align=\"center\">\r\n                    <tr>\r\n                        <td class=\"text-left\">Ierbicidare*</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">2 lei/mp</td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n            <div class=\"col-lg-offset-1 col-md-offset-05 col-lg-1 col-md-2 services text-center no-padd\">\r\n                <h3>Insecticide</h3>\r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"prices-table\" align=\"center\">\r\n                    <tr>\r\n                        <td class=\"text-left\">Insecticide*</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">2 lei/mp</td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n            <div class=\"col-lg-offset-1 col-md-offset-05 col-lg-1 col-md-2 services text-center no-padd\">\r\n                <h3>Toaletare copaci</h3>\r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"prices-table\" align=\"center\">\r\n                    <tr>\r\n                        <td class=\"text-left\">Tundere</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">2 lei/mp</td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n            <div class=\"col-lg-offset-1 col-md-offset-05 col-lg-1 col-md-2 services text-center no-padd\">\r\n                <h3>Plantare gazon seminte</h3>\r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"prices-table\" align=\"center\">\r\n                    <tr>\r\n                        <td class=\"text-left\">Pregatire teren</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">0,1 lei/mp</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td class=\"text-left\">Insamantare gazon*</td>\r\n                        <td valign=\"bottom\" class=\"dotted\"><span></span></td>\r\n                        <td class=\"text-right\" style=\"width: 125px;\">2 lei/mp</td>\r\n                    </tr>\r\n                </table>\r\n            </div>\r\n\r\n\r\n        </div>', 'Preturi', 'Preturi', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(3, 'De ce noi', 'de-ce-noi', NULL, 'De ce noi', 'De ce noi', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(4, 'Intrebari', 'intrebari', NULL, 'Intrebari', 'Intrebari', '2017-03-28 21:00:00', '2017-03-28 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`) VALUES
(1, 'Full administration', 'full.administration', 'Administer full website', NULL, '2017-03-01 19:13:56', '2017-03-01 19:13:56'),
(2, 'Administer teams', 'administer.teams', NULL, NULL, '2017-03-01 19:16:52', '2017-03-01 19:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-03-01 19:13:57', '2017-03-01 19:13:57'),
(2, 2, 2, '2017-03-01 19:16:53', '2017-03-01 19:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'Full website administration', 1, '2017-03-01 19:13:56', '2017-03-01 19:13:56'),
(2, 'Team leader', 'leader', 'Team leader', 2, '2017-03-01 19:16:52', '2017-03-01 19:16:52'),
(4, 'Team member', 'member', 'Team member', 3, '2017-03-01 19:20:16', '2017-03-01 19:20:16'),
(5, 'Client', 'client', 'Client', 4, '2017-03-01 19:20:16', '2017-03-01 19:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-03-01 19:13:57', '2017-03-01 19:13:57'),
(2, 2, 3, '2017-03-01 19:16:53', '2017-03-01 19:16:53'),
(3, 2, 4, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(4, 4, 5, '2017-03-01 19:20:17', '2017-03-01 19:20:17'),
(5, 4, 6, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(6, 5, 8, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(7, 5, 9, '2017-02-28 22:00:00', '2017-02-28 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `serviceables`
--

CREATE TABLE `serviceables` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `serviceable_id` int(10) UNSIGNED NOT NULL,
  `serviceable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceables`
--

INSERT INTO `serviceables` (`id`, `service_id`, `serviceable_id`, `serviceable_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'App\\Job', '2017-04-18 18:31:17', '2017-04-18 18:31:17'),
(2, 2, 1, 'App\\Job', '2017-04-18 18:31:17', '2017-04-18 18:31:17'),
(3, 3, 1, 'App\\Job', '2017-04-18 18:31:17', '2017-04-18 18:31:17'),
(4, 5, 1, 'App\\Job', '2017-04-18 18:31:17', '2017-04-18 18:31:17'),
(5, 6, 1, 'App\\Job', '2017-04-18 18:31:17', '2017-04-18 18:31:17'),
(6, 2, 3, 'App\\Job', '2017-04-19 18:53:04', '2017-04-19 18:53:04'),
(7, 3, 3, 'App\\Job', '2017-04-19 18:53:04', '2017-04-19 18:53:04'),
(8, 4, 3, 'App\\Job', '2017-04-19 18:53:04', '2017-04-19 18:53:04'),
(9, 6, 3, 'App\\Job', '2017-04-19 18:53:04', '2017-04-19 18:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `price`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Tuns gazon', 0.7, 3, '2017-03-31 21:00:00', '2017-03-31 21:00:00'),
(2, 'Tratamente', 3, 4, '2017-03-31 21:00:00', '2017-03-31 21:00:00'),
(3, 'Scarificare (aerare)', 0.7, 3, '2017-03-31 21:00:00', '2017-03-31 21:00:00'),
(4, 'Tundere gard viu', 15, 3, '2017-03-31 21:00:00', '2017-03-31 21:00:00'),
(5, 'Aerisire', 0.7, 3, '2017-03-31 21:00:00', '2017-03-31 21:00:00'),
(6, 'Ingrasaminte', 16, 4, '2017-03-31 21:00:00', '2017-03-31 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Team 1', 3, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(2, 'Team 2', 4, '2017-02-28 22:00:00', '2017-02-28 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(2, 1, 6, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(3, 2, 5, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(4, 2, 6, '2017-02-28 22:00:00', '2017-02-28 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible_password` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `visible_password`, `unique_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marius', 'Neacsu', '0737540530', 'nme.edy2006@gmail.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', NULL, NULL, 'pb9RTmQWssJDjW2w79xbrDADerbK7zlMtoHLjX2qNKc8kfTEVZne6B1vGMM0', '2017-03-01 19:13:56', '2017-03-27 15:06:04'),
(3, 'Andrei', 'Ionescu', '0737540530', 'neacsu.george@gmail.com', '$2y$10$b7rNwxgLDjhIsDL2FeDnI.r0L661XqZUOP7EnsXZT43gLywR9F1ie', NULL, NULL, NULL, '2017-03-01 19:16:52', '2017-03-01 19:16:52'),
(4, 'Flavius', 'Grigorescu', '0737540530', 'neacsu.ionut@gmail.com', '$2y$10$OmENsTtVdCWF4KgdWX/bHOObQmyA7GDALBfNl1l/qCwbW2Is2BibK', NULL, NULL, NULL, '2017-03-01 19:17:50', '2017-03-01 19:17:50'),
(5, 'Ion', 'Neacsu', '0737540530', 'neacsu.ion@gmail.com', '$2y$10$10MCAPxzGQg2yKRMiBNTuuzpwFRY4ShcJv9rd8PGWeWp0Sg.zsvei', NULL, NULL, NULL, '2017-03-01 19:20:16', '2017-03-01 19:20:16'),
(6, 'Eduard', 'Neacsu', '0737540530', 'neacsu.eduard@gmail.com', '$2y$10$/MeVDH404zLazawjaD8oJeUmAr3X01q9unpdDB1uta66P9TeXZ/JS', NULL, NULL, NULL, '2017-03-01 19:20:55', '2017-03-01 19:20:55'),
(8, 'Marius', 'Neacsu', NULL, 'nme_edy2002@yahoo.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', '111111', '82d045a767a8f2e1fa516bb5b13e2f51', NULL, '2017-04-17 12:00:48', '2017-04-17 12:00:48'),
(9, 'Neacsu', 'Marius', NULL, 'nme_edy2001@yahoo.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', '111111', 'aef23305ae52254939c5195984768c90', NULL, '2017-04-18 11:33:27', '2017-04-18 11:33:27'),
(10, 'Neacsu', 'Marius', NULL, NULL, '$2y$10$P0lgHZaSPowMmcplV6rWeOMFeFikpUkVaPQeL4g2MSuEERoQ8wHkG', 'TPuTusv9', 'f7518fd58407e59937c11cb5730aae30', NULL, '2017-04-18 16:47:10', '2017-04-18 16:47:10'),
(11, 'Marius', 'Neacsu', NULL, NULL, '$2y$10$II1OJqMxmWfSyYbfj43hyOGaYwcLuEmwCb0CYPLmrb.YE6D2UnHKu', 'RwUcuGnr', 'd69f523cad1a0979201c5657c53c0a0a', NULL, '2017-04-18 18:11:50', '2017-04-18 18:11:50'),
(12, 'Neacsu', 'Marius', NULL, NULL, '$2y$10$lYoPXXGBOOsSyUnONKc2QO4vLkpbXaSF5O8caraRkt9NsFWVkic06', '5hoeSxxz', '78212ca1b241a6e8cd2b4de5da5f6eab', NULL, '2017-04-19 14:00:07', '2017-04-19 14:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_team_id_index` (`team_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `serviceables`
--
ALTER TABLE `serviceables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceables_serviceable_id_serviceable_type_index` (`serviceable_id`,`serviceable_type`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_members_team_id_index` (`team_id`),
  ADD KEY `team_members_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `serviceables`
--
ALTER TABLE `serviceables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
