-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 02:02 AM
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
(3, NULL, '2017-07-20', '16:30:00', 250, 8675, 1750, 'Drumul Pădurea Neagră, Bucharest, Romania', NULL, 1, 9, '2017-04-19 18:53:04', '2017-04-19 18:53:04'),
(4, NULL, '2017-04-25', '08:30:00', 190, 3173, 570, 'Strada Pădureni, Bucharest, Romania', NULL, 1, 16, '2017-04-20 07:10:03', '2017-04-20 07:10:03'),
(5, NULL, '2017-04-27', '15:00:00', 230, 4301, 1610, 'Strada Padeșu, Bucharest, Romania', NULL, 1, 17, '2017-04-20 07:13:23', '2017-04-20 07:13:23'),
(6, NULL, '2017-04-28', '09:00:00', 300, 5610, 1800, 'Strada Pădureni, Bucharest, Romania', NULL, 2, 93, '2017-04-20 12:38:03', '2017-04-20 12:38:03'),
(7, NULL, '2017-04-25', '09:00:00', 230, 1012, 1380, 'Ortacului, Bragadiru, Ilfov County, Romania', NULL, 2, 94, '2017-04-20 17:26:57', '2017-04-20 17:26:57'),
(8, NULL, '2017-04-26', '11:00:00', 320, 1408, 1920, 'Ortacului, Bragadiru, Ilfov County, Romania', NULL, 1, 94, '2017-04-20 18:56:48', '2017-04-20 18:56:48'),
(9, NULL, '2017-04-29', '09:00:00', 120, 528, 720, 'Strada Codrii Neamțului A, Bucharest, Romania', NULL, 1, 95, '2017-04-28 12:08:53', '2017-04-28 12:08:53'),
(10, NULL, '2017-04-30', '09:30:00', 111, 3519, 777, 'Strada Codrii Neamțului A, Bucharest, Romania', NULL, 1, 95, '2017-04-28 12:09:36', '2017-04-28 12:09:36'),
(13, NULL, '2017-05-23', '09:00:00', 50, 835, 150, 'Bulevardul General Vasile Milea, Bucharest, Romania', NULL, 1, 131, '2017-05-20 09:25:41', '2017-05-20 09:25:41');

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
(3, 'De ce noi', 'de-ce-noi', '        <div class=\"row mt50\">\n            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center page-info\">\n                <h3>Valorile noastre</h3>\n                <img src=\"frontend/assets/images/separator.png\" alt=\"\" class=\"separator-line\">\n            </div>\n        </div>\n\n        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>1. Ne mândrim cu munca noastră</h3>\n                <p>Mirosul de iarba proaspata, grija pentru detalii si zambetul de pe fata clientilor nostri sunt motivele pentru care ne mandrim cu aceasta munca</p>\n                <p>Cei mai buni muncitori sunt alesi cu atentie in firma noastra si a c olaboratorilor nostri. Toti muncitorii nostri au experienta desavarsita in aceasta meserie, au cele mai bune echipamente si verifica ca la sfarsitul lucrarii curtea ta sa arate impecabil.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>2. Angajament fata de relatia cu clientii</h3>\n                <p>Micile detalii sunt cele care fac diferenta. O vei simti de fiecare data cand vorbesti cu un membru al echipei noastre. Vei vedea asta in micile reparatii pe care le vom face fara sa-ti cerem bani suplimentar.</p>\n                <p>O vei simti atunci cand echipa asteapta 10 minute in plus daca intarzii de la serviciu.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>3. Integritate</h3>\n                <p>Toti clientii nostri sunt tratati corect, nu cautam scurtaturi, ne tinem de promisiuni si facem intotdeauna ceea ce este corect.</p>\n                <p>Ne asiguram ca avem clienti care sa indrageasca serviciul nostru si sa aiba incredere in echipa noastra.</p>\n            </div>\n        </div>', 'De ce noi', 'De ce noi', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(4, 'Intrebari', 'intrebari', '        <div class=\"row\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd\">\n                <h3>Prima ta comanda</h3>\n                <img src=\"frontend/assets/images/separator2px.png\" alt=\"\" class=\"separator-line\">\n                <ul class=\"faq-list\">\n                    <li>\n                        <small></small>\n                        <h4>Am programat o comanda seara si e posibil sa nu fiu acasa la ora 6, ce pot face?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Pot avea incredere in voi sa va las singuri in curte?</h4>\n                        <p>Bineinteles ca poti, avem cateva sute de clienti care fac asta deja. Toti angajatii nostri sunt supusi unui program de testare si training si avem sisteme de monitorizare ale angajatilor.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Daca am observatii speciale cum vi le comunic?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Trebuie sa pregatesc ceva special inainte de a veni echipa?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                </ul>\n            </div>\n        </div>\n\n        <div class=\"row\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd\">\n                <h3>Serviciile noastre</h3>\n                <img src=\"frontend/assets/images/separator2px.png\" alt=\"\" class=\"separator-line\">\n                <ul class=\"faq-list\">\n                    <li>\n                        <small></small>\n                        <h4>De ce uneori nu primesc acelasi pret la tunderea de gazon?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Ce faceti cu iarba stransa de la mine?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Daca am observatii speciale cum vi le comunic?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Trebuie sa pregatesc ceva special inainte de a veni echipa?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                </ul>\n            </div>\n        </div>\n\n        <div class=\"row\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 faq no-padd\">\n                <h3>Plățile</h3>\n                <img src=\"frontend/assets/images/separator2px.png\" alt=\"\" class=\"separator-line\">\n                <ul class=\"faq-list\">\n                    <li>\n                        <small></small>\n                        <h4>Cum pot beneficia de servicii gratuite?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Este plata serviciului sigura?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Cum functioneaza plata?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Pot plati cu banii jos, cash?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                    <li>\n                        <small></small>\n                        <h4>Voi primi o factura pentru plata efectuata?</h4>\n                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin interdum blandit. Donec et dolor iaculis mi consequat maximus sed et tellus.</p>\n                    </li>\n                </ul>\n            </div>\n        </div>', 'Intrebari', 'Intrebari', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(5, 'Termeni si conditii', 'termeni-si-conditii', '        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>I call it luck</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>Obi-Wan is here. The Force is with him.</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n        </div>', 'Termeni si conditii', 'Termeni si conditii', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(6, 'Privacy', 'privacy', '        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>I call it luck</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>Obi-Wan is here. The Force is with him.</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n        </div>', 'Privacy', 'Privacy', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(7, 'Cariere', 'cariere', '        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>I call it luck</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>Obi-Wan is here. The Force is with him.</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n        </div>', 'Cariere', 'Cariere', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(8, 'Compania noastra', 'compania-noastra', '        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>I call it luck</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>Obi-Wan is here. The Force is with him.</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n        </div>', 'Compania noastra', 'Compania noastra', '2017-03-28 21:00:00', '2017-03-28 21:00:00'),
(9, 'Presa', 'presa', '        <div class=\"row mtb50\">\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>I call it luck</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n            <div class=\"col-lg-offset-05 col-md-offset-05 col-lg-2 col-md-2 terms text-left no-padd\">\n                <h3>Obi-Wan is here. The Force is with him.</h3>\n                <p>What good is a reward if you ain\'t around to use it? Besides, attacking that battle station ain\'t my idea of courage. It\'s more like…suicide. Ye-ha! Red Five standing by. I find your lack of faith disturbing.</p>\n                <p>Obi-Wan is here. The Force is with him. I suggest you try it again, Luke. This time, let go your conscious self and act on instinct. I have traced the Rebel spies to her. Now she is my only link to finding their secret base.</p>\n            </div>\n        </div>', 'Presa', 'Presa', '2017-03-28 21:00:00', '2017-03-28 21:00:00');

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
(7, 5, 9, '2017-02-28 22:00:00', '2017-02-28 22:00:00'),
(86, 5, 93, '2017-04-20 12:36:53', '2017-04-20 12:36:53'),
(87, 5, 94, '2017-04-20 17:25:51', '2017-04-20 17:25:51'),
(88, 5, 95, '2017-04-28 12:05:54', '2017-04-28 12:05:54'),
(89, 5, 96, '2017-05-04 15:19:29', '2017-05-04 15:19:29'),
(90, 5, 97, '2017-05-04 15:48:56', '2017-05-04 15:48:56'),
(91, 5, 98, '2017-05-04 15:56:22', '2017-05-04 15:56:22'),
(92, 5, 99, '2017-05-04 16:02:13', '2017-05-04 16:02:13'),
(93, 5, 100, '2017-05-04 16:02:50', '2017-05-04 16:02:50'),
(118, 5, 125, '2017-05-04 17:19:23', '2017-05-04 17:19:23'),
(120, 5, 127, '2017-05-04 17:23:03', '2017-05-04 17:23:03'),
(121, 5, 128, '2017-05-04 17:27:43', '2017-05-04 17:27:43'),
(122, 5, 129, '2017-05-04 17:28:58', '2017-05-04 17:28:58'),
(123, 5, 130, '2017-05-04 17:29:35', '2017-05-04 17:29:35'),
(124, 5, 131, '2017-05-20 09:24:50', '2017-05-20 09:24:50');

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
(9, 6, 3, 'App\\Job', '2017-04-19 18:53:04', '2017-04-19 18:53:04'),
(10, 1, 4, 'App\\Job', '2017-04-20 07:10:03', '2017-04-20 07:10:03'),
(11, 6, 4, 'App\\Job', '2017-04-20 07:10:03', '2017-04-20 07:10:03'),
(12, 2, 5, 'App\\Job', '2017-04-20 07:13:23', '2017-04-20 07:13:23'),
(13, 3, 5, 'App\\Job', '2017-04-20 07:13:23', '2017-04-20 07:13:23'),
(14, 4, 5, 'App\\Job', '2017-04-20 07:13:23', '2017-04-20 07:13:23'),
(15, 1, 6, 'App\\Job', '2017-04-20 12:38:03', '2017-04-20 12:38:03'),
(16, 2, 6, 'App\\Job', '2017-04-20 12:38:03', '2017-04-20 12:38:03'),
(17, 4, 6, 'App\\Job', '2017-04-20 12:38:03', '2017-04-20 12:38:03'),
(18, 1, 7, 'App\\Job', '2017-04-20 17:26:57', '2017-04-20 17:26:57'),
(19, 2, 7, 'App\\Job', '2017-04-20 17:26:57', '2017-04-20 17:26:57'),
(20, 3, 7, 'App\\Job', '2017-04-20 17:26:57', '2017-04-20 17:26:57'),
(21, 1, 8, 'App\\Job', '2017-04-20 18:56:48', '2017-04-20 18:56:48'),
(22, 2, 8, 'App\\Job', '2017-04-20 18:56:48', '2017-04-20 18:56:48'),
(23, 3, 8, 'App\\Job', '2017-04-20 18:56:48', '2017-04-20 18:56:48'),
(24, 1, 9, 'App\\Job', '2017-04-28 12:08:53', '2017-04-28 12:08:53'),
(25, 2, 9, 'App\\Job', '2017-04-28 12:08:53', '2017-04-28 12:08:53'),
(26, 3, 9, 'App\\Job', '2017-04-28 12:08:53', '2017-04-28 12:08:53'),
(27, 4, 10, 'App\\Job', '2017-04-28 12:09:36', '2017-04-28 12:09:36'),
(28, 5, 10, 'App\\Job', '2017-04-28 12:09:36', '2017-04-28 12:09:36'),
(29, 6, 10, 'App\\Job', '2017-04-28 12:09:36', '2017-04-28 12:09:36'),
(30, 4, 11, 'App\\Job', '2017-05-11 15:53:21', '2017-05-11 15:53:21'),
(31, 5, 11, 'App\\Job', '2017-05-11 15:53:21', '2017-05-11 15:53:21'),
(32, 6, 11, 'App\\Job', '2017-05-11 15:53:21', '2017-05-11 15:53:21'),
(33, 3, 12, 'App\\Job', '2017-05-13 11:32:16', '2017-05-13 11:32:16'),
(34, 4, 12, 'App\\Job', '2017-05-13 11:32:16', '2017-05-13 11:32:16'),
(35, 5, 12, 'App\\Job', '2017-05-13 11:32:16', '2017-05-13 11:32:16'),
(36, 5, 13, 'App\\Job', '2017-05-20 09:25:41', '2017-05-20 09:25:41'),
(37, 6, 13, 'App\\Job', '2017-05-20 09:25:41', '2017-05-20 09:25:41');

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
  `address` text COLLATE utf8mb4_unicode_ci,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `visible_password`, `unique_id`, `remember_token`, `address`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Ion', 'Popescu', '0723150632', 'popescuion@smail.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', NULL, NULL, 'pb9RTmQWssJDjW2w79xbrDADerbK7zlMtoHLjX2qNKc8kfTEVZne6B1vGMM0', NULL, NULL, NULL, '2017-03-01 19:13:56', '2017-04-20 18:01:51'),
(3, 'Andrei', 'Ionescu', '0737540530', 'neacsu.george@gmail.com', '$2y$10$b7rNwxgLDjhIsDL2FeDnI.r0L661XqZUOP7EnsXZT43gLywR9F1ie', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-01 19:16:52', '2017-03-01 19:16:52'),
(4, 'Flavius', 'Grigorescu', '0722105040', 'neacsu.ionut@gmail.com', '$2y$10$OmENsTtVdCWF4KgdWX/bHOObQmyA7GDALBfNl1l/qCwbW2Is2BibK', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-01 19:17:50', '2017-03-01 19:17:50'),
(5, 'Ion', 'Neacsu', '0737540530', 'neacsu.ion@gmail.com', '$2y$10$10MCAPxzGQg2yKRMiBNTuuzpwFRY4ShcJv9rd8PGWeWp0Sg.zsvei', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-01 19:20:16', '2017-03-01 19:20:16'),
(6, 'Eduard', 'Neacsu', '0737540530', 'neacsu.eduard@gmail.com', '$2y$10$/MeVDH404zLazawjaD8oJeUmAr3X01q9unpdDB1uta66P9TeXZ/JS', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-01 19:20:55', '2017-03-01 19:20:55'),
(8, 'Marius', 'Neacsu', NULL, 'nme_edy2002@yahoo.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', '111111', '82d045a767a8f2e1fa516bb5b13e2f51', NULL, NULL, NULL, NULL, '2017-04-17 12:00:48', '2017-04-17 12:00:48'),
(9, 'Neacsu', 'Marius', NULL, 'nme_edy2001@yahoo.com', '$2y$10$RnbrhVMFkhCrMgqvYePeIOgSwgWQbWP72w0GiVYaTz5XBpeq0neCS', '111111', 'aef23305ae52254939c5195984768c90', NULL, NULL, NULL, NULL, '2017-04-18 11:33:27', '2017-04-18 11:33:27'),
(10, 'Neacsu', 'Marius', NULL, NULL, '$2y$10$P0lgHZaSPowMmcplV6rWeOMFeFikpUkVaPQeL4g2MSuEERoQ8wHkG', 'TPuTusv9', 'f7518fd58407e59937c11cb5730aae30', NULL, NULL, NULL, NULL, '2017-04-18 16:47:10', '2017-04-18 16:47:10'),
(93, 'Eduard', 'Marius', '0722333252', 'mariuseduard@gmail.com', '$2y$10$hrMU8FS6U2GrRiGEJ3fg2eh/7IB3QqHhcKyqfuT9kS5Ub78WqSIR2', 'mxkppjN0', 'adb4b70644977fb9a1617c84d5374afc', '6lENCX0h91Vy80M4eaT1EA86yKCIzItj78ps3XdizkL7xda9k054HQodu9Hj', 'Strada Pădureni, Bucharest, Romania', '44.45364080', '26.04741120', '2017-04-20 12:36:53', '2017-04-20 12:36:53'),
(94, 'Ion', 'Popescu', '0723150632', 'popescuion@mail.com', '$2y$10$ClP3bWz4cdmQxu6twvQrIOYhjW72PgDAKB7QhhOtWbLV43gkWQwnO', 'oWZH8Xx9', '9cacdd4e864e0b7a578a1a0dd9ec65ff', 'B7kjYUNAEH53ejDEFA4YR36L99B1gdrkrxfO9ijmL0UX759m3HhQrka9iOlz', 'Ortacului, Bragadiru, Ilfov County, Romania', '44.37993440', '26.00453760', '2017-04-20 17:25:51', '2017-04-20 18:44:33'),
(95, 'asd', 'asd', '1231231231', 'asd@asd.com', '$2y$10$ck3BwtPGBuBtqrHIhpE2oOieP3ZTR.G7lfz6YMxOo.GTTaxXTyhHe', 'gIT5Z5cy', 'fe7664a155e828b9df766facd3855c25', 'Qizugp6Lxl7ljJ6H6RplV5z8Lbrya61oC7TZNL5vHZzl8qfU3hrKHnYs0aL4', 'Strada Codrii Neamțului A, Bucharest, Romania', '44.41958300', '26.17060700', '2017-04-28 12:05:53', '2017-04-28 12:08:43'),
(96, 'Marius', 'Neacsu', '0737540530', 'nme.edy2006@gmail.com', '$2y$10$Eq.qgssf//bYByAxjZntu.r7pS9HqS2cIAk153FkaaB/0/67cKAsC', '111111', NULL, NULL, 'Padureni nr 10 Bucuresti', '44.45396470', '26.04696400', '2017-05-04 15:19:29', '2017-05-13 11:31:55'),
(97, 'Neacsu', 'Marius', '0737540530', NULL, '$2y$10$hOVtS9TXqt/9FHxlqsjrhO/Q4f1tKKs4rdSMBcGOQ07dXPchkjoDq', 'pl76KSFy', '14ce8c85c190adf1a033548f4c10ab63', NULL, 'Strada Pădureni, Bucharest, Romania', '44.45364080', '26.04741120', '2017-05-04 15:48:56', '2017-05-04 15:48:56'),
(98, 'Neacsu', 'Marius', '0737540530', NULL, '$2y$10$nmdR0Pswy1RywkF16lv.oOimqW/Aw/kp70Kr742pPPmgLsResDDMe', 'H7URBsec', '1d836d1172906ab791953107a73d0d5a', NULL, 'Strada Ghiță Pădureanu, Bucharest, Romania', '44.46643570', '26.10274250', '2017-05-04 15:56:22', '2017-05-04 15:56:22'),
(99, 'Marius', 'Neacsu', '0737540530', NULL, '$2y$10$QIpnNfU3mudd6HHPPjp1KOxiTtpipS2Gg4C2cB6l5PhYm4kfagm6.', 'bp801gHA', 'f0e922d7cc223868a36d4b8db33fe700', NULL, 'Strada Parcului, Bucharest, Romania', '44.48163040', '26.06076910', '2017-05-04 16:02:13', '2017-05-04 16:02:13'),
(100, 'Marius', 'Neacsu', '0737540530', 'asd@asd.ads', '$2y$10$1YsWhcKoUM9Ho.9H33n93.biwz00Sw048e5/HR0aGrkvIzgNfR1zm', 'sNlze7Hd', 'f0e922d7cc223868a36d4b8db33fe700', 't5XeiyaGV4EU89qyL4Z5Ror9V6zlRgeYJrTmXUWV0uPGXkywLH8AJKGt3Kyb', 'Strada Parcului, Bucharest, Romania', '44.48163040', '26.06076910', '2017-05-04 16:02:50', '2017-05-04 16:03:17'),
(125, 'Marius', 'Neacsu', '1234567890', 'a3@a.com', '$2y$10$zquQa5V49FSqKClZo5X67e2miMfkn7hvlRFiid/HAhE8FxCADjRMu', '2M7AwIxi', 'f674d899f7fb01a59a68c0af1e94cf62', NULL, 'Strada Vasile Conta A, Bucharest, Romania', '44.44034090', '26.10107600', '2017-05-04 17:19:23', '2017-05-04 17:22:38'),
(127, 'Marius', 'Neacsu', '1234567890', 'a4@a.com', '$2y$10$saRlTVLmOYVwCSwuP5h5beQmsRFHMp3vUXucqOoIVsiuvttDylhgO', 'akDCXwNn', '303f627fd483f8d1754069ded6ad1853', '12DDdXUsO0jXddqVoGZusGtuOxLPNdpjMsXK6DFkXUOg6vF6NyevVvmuOZJ0', 'Padure', NULL, NULL, '2017-05-04 17:23:03', '2017-05-04 17:23:42'),
(128, 'aa', 'aa', '1231231232', 'aaa@aa.ss', '$2y$10$smSJ3Zcsaq5Tm5sAS7XokeHDaqvCjrxYBXexfEfVQfEfyt/ZGcuxW', 'C9cUWFsI', 'ebe8056bbc0768ea3ad3372b34157827', 'kk7F9N3P0c0kMbjMCad5vDDbe097VgpfcYfeaGnY2lTOqtboS9E0gcRu8xMZ', 'aaa', NULL, NULL, '2017-05-04 17:27:42', '2017-05-04 17:27:53'),
(129, 'asd', 'asd', '3434343434', 'sss@sss.sssdd', '$2y$10$ViWBYewhNgUf56BBddG.lOEuPNE4tr5T5tiDSRwCQTWMARPMiZClO', 'c7k1Kl1u', '5508b384305768ead61a3a6b955d40e3', 'Ycs7AJceVRPCnYSNdVlRpXrG3SzLUftK2pB3G46rkoRLQVOUpfgHhYW8ruuE', 'aaa', NULL, NULL, '2017-05-04 17:28:58', '2017-05-04 17:29:08'),
(130, 'asd', 'asd', '232343242343', 'asdasd@asdascc.oow', '$2y$10$na00mukwycgOweBaH7QJBeBQlrKTQN4j6oOV5NAsceMbQwm4QxI/m', 'ZYdUhPZi', '33b1a3d82e5388b15659db6fcfe4eaee', 'fre4KZiHWms7GcqJqPVXZcNCKMVDLFpQFMT55iFz0nS5hFU234RCJIrsfZ5u', 'aasdsa', NULL, NULL, '2017-05-04 17:29:35', '2017-05-04 17:29:42'),
(131, 'Popescu', 'Ion', '0722123005', 'popescuion@somemail.com', '$2y$10$d8AaqygGPnxjhaOSsvREmOuG4UzfPOZLvmvhrNiiFwoRcfV5dK6Gi', '1sOMSO6m', '1c44543796431067f15e34f80bb35add', 'SrAFuaXa1dT3NY1LItPcTFH2eXcGXH7xc5htkSwDzyOMFQYG5aFScXUbdknS', 'Bulevardul General Vasile Milea, Bucharest, Romania', '44.43526890', '26.05427970', '2017-05-20 09:24:50', '2017-05-20 09:34:15');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `serviceables`
--
ALTER TABLE `serviceables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
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
