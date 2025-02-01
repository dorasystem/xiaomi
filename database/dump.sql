-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2025 at 09:35 AM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xiaomi`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `title_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `about_or_company_uz` text COLLATE utf8mb4_unicode_ci,
  `about_or_company_ru` text COLLATE utf8mb4_unicode_ci,
  `about_or_company_en` text COLLATE utf8mb4_unicode_ci,
  `content_uz` text COLLATE utf8mb4_unicode_ci,
  `content_ru` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title_uz`, `title_ru`, `title_en`, `description_uz`, `description_ru`, `description_en`, `image`, `created_at`, `updated_at`, `photo`, `about_or_company_uz`, `about_or_company_ru`, `about_or_company_en`, `content_uz`, `content_ru`, `content_en`) VALUES
(1, 'Biz haqimizda', 'О нас', 'About Us', '<h2>Мы ценим наших клиентов, ведь они не просто покупатели</h2><p>Они наши близкие друзья, а мы больше, чем продавцы смартфонов, ноутбуков и планшетов. Для них мы – красочные и всегда четкие воспоминания, захватывающие игры на максимальной производительности, любимая музыка доступная на каждом шагу, уют и свежесть в доме.</p><p>Вы можете делиться вашими эмоциями во всех соц. сетях используя хэштег&nbsp;#xiaomifamily&nbsp;или отмечайте нас. Каждая публикация по настоящему греет наше сердце.</p>', '<p>Non tempora voluptat.</p>', '<p>Mollit lorem maxime .</p>', 'abouts/images/8ehBDlwPAxKWXD5mBNepJCg166qGQ16eC1uLyb1h.webp', '2024-12-23 07:17:35', '2025-01-03 01:11:37', 'abouts/photos/olE28yBbccVPPl42jyXN0JzrDUj7YKvy2FGjnjqZ.webp', '<h3>”MI в нашем логотипе означает «Мобильный Интернет», но также для нас это звучит как&nbsp;<span style=\"color: rgb(255, 103, 0);\">«Миссия Невыполнима»&nbsp;</span>На английском –&nbsp;Mission&nbsp;Impossible&nbsp;Xiaomi часто сталкивался с вызовами, многие из которых по началу казались невыполнимыми в наши ранние годы.”</h3><p><br></p>', '<p>Consectetur, at magn.</p>', '<p>Enim nulla quis et a.</p>', '<h2>Мы помогаем им становиться лучше в цифровом формате</h2><p>Наша цель – помочь нашим клиентам следить за актуальными тенденциями в девайсах и аксессуарах. Мы считаем, что это самый правильный путь и мы никогда не останавливаемся, поэтому постоянно повышаем качество и разнообразие наших услуг. Приходите в любой магазин Xiaomi и убедитесь в этом. Создайте свой стиль и используйте новейшие технологии чтобы подчеркнуть свою индивидуальность. Развивайтесь в цифровом формате и будьте в моде!</p>', '<p>Error qui nemo nemo .</p>', '<p>Aliquid quia volupta.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `content_uz` text COLLATE utf8mb4_unicode_ci,
  `content_ru` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title_uz`, `title_ru`, `title_en`, `slug`, `description_uz`, `description_ru`, `description_en`, `content_uz`, `content_ru`, `content_en`, `date`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '2023-12-04', NULL, 'articles_photo/1735114762_blog1.webp', '2024-12-25 03:19:22', '2024-12-25 03:19:22'),
(2, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '2023-05-05', NULL, 'articles_photo/1735114870_blog2.webp', '2024-12-25 03:21:10', '2024-12-25 03:21:10'),
(3, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p><p><br></p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p><p><br></p>', '2022-02-22', NULL, 'articles_photo/1735115083_blog3.webp', '2024-12-25 03:24:43', '2024-12-25 03:24:43'),
(4, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '2023-08-08', NULL, 'articles_photo/1735115210_blog4.webp', '2024-12-25 03:26:50', '2024-12-25 03:26:50'),
(5, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '2022-08-08', NULL, 'articles_photo/1735115299_blog5.webp', '2024-12-25 03:28:19', '2024-12-25 03:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `title_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `content_uz` text COLLATE utf8mb4_unicode_ci,
  `content_ru` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `general_uz` text COLLATE utf8mb4_unicode_ci,
  `general_ru` text COLLATE utf8mb4_unicode_ci,
  `general_en` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_uz`, `title_ru`, `title_en`, `description_uz`, `description_ru`, `description_en`, `content_uz`, `content_ru`, `content_en`, `general_uz`, `general_ru`, `general_en`, `date`, `status`, `image`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqarilish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p><p><br></p><p><br></p>', '<h4>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</h4><p><br></p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', NULL, NULL, NULL, NULL, NULL, 'glogs_photo/1735115729_blog1.webp', '2024-12-25 03:35:29', '2024-12-25 03:35:29', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched'),
(2, 'Optio qui qui facil', 'Dolore nulla sequi l lqdhoxcnhqodnh', 'Exercitation ipsum', '<p>Recusandae. Aut dese.</p>', '<p>Et ipsum dolor quo d.</p>', '<p>Do et iste nulla con.</p>', '<p>Aute modi laborum au.</p>', '<p>Nostrud sit vel ut p.</p>', '<p>Qui quia quo ut repe.</p>', '<p>Velit, sit, vel nemo.</p>', '<p>Qui et cumque assume.</p>', '<p>Ex delectus, cupidat.</p>', '1981-09-14', NULL, 'glogs_photo/1735389834_aboutbanner1.webp', '2024-12-28 07:43:54', '2025-01-11 03:35:20', 'exercitation-ipsum-2'),
(3, 'Kutilayotgan chiqish: Xiaomi 15 flagman liniyasi qachon chiqariladi?', 'Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15', 'Expected release: When will the flagship Xiaomi 15 lineup be launched?', '<p>Kutilayotgan chiqish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p>', '<p>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p>', '<p>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '<p>Kutilayotgan chiqish: Xiaomi 15 flagman liniyasi qachon chiqariladi?</p>', '<p>Ожидаемый релиз: когда выйдет флагманская линейка Xiaomi 15</p>', '<p>Expected release: When will the flagship Xiaomi 15 lineup be launched?</p>', '2025-01-16', NULL, 'blogs_photo/juyATsMtoufQdJ39Rd2gWGchbawCJhbnj9JCDVqs.webp', '2025-01-11 02:14:22', '2025-01-11 02:14:22', 'expected-release-when-will-the-flagship-xiaomi-15-lineup-be-launched-3');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidants`
--

CREATE TABLE `candidants` (
  `id` bigint UNSIGNED NOT NULL,
  `vacancy_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `brith_date` text COLLATE utf8mb4_unicode_ci,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `resume_file` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_uz`, `name_ru`, `name_en`, `slug`, `description_uz`, `description_ru`, `description_en`, `image`, `created_at`, `updated_at`, `parent_id`, `icon`) VALUES
(1, 'Televizor', 'Телевизоры', 'TV', '{\"uz\":\"televizor\",\"ru\":\"televizory\",\"en\":\"tv\"}', 'Televizorlar', 'Телевизоры Xiaomi', 'TV Xiaomi', 'images/categories/Nev2UVdCjsDaVMkVGPCjYwz03fkIvkVb8zLnAvoe.webp', '2024-12-23 07:18:31', '2024-12-26 02:42:44', NULL, NULL),
(2, 'Telefon', 'Телефон', 'Phone', '{\"uz\":\"telefon\",\"ru\":\"telefon\",\"en\":\"phone\"}', 'Telefon Xiaomi', 'Телефоны Xiaomi', 'Phone Xiaomi', 'images/categories/3q6zB3lTSc1AvGvt1qlEyooyYVHJTvMsYmFhbHcy.png', '2024-12-25 01:00:48', '2024-12-26 02:43:29', NULL, NULL),
(3, 'Aqlli soatlar', 'Умные часы', 'smartwatch', '{\"uz\":\"aqlli-soatlar\",\"ru\":\"umnye-casy\",\"en\":\"smartwatch\"}', 'Aqlli soatlar', 'Умные часы', 'smartwatch', 'images/categories/gyFIuXSkoEU3LZqDrDIFFsnJDDBvWZmsgIRDYeda.webp', '2024-12-26 04:04:42', '2024-12-26 04:04:42', NULL, NULL),
(4, 'Transport', 'транспорт', 'Transport', '{\"uz\":\"transport\",\"ru\":\"transport\",\"en\":\"transport\"}', 'Transport', 'транспорт', 'Transport', 'images/categories/lARgXoYiCvUrCL8JmRJs88V4mRCYFzXQJyhDTxAy.jpg', '2024-12-26 04:06:34', '2024-12-26 04:06:34', NULL, NULL),
(5, 'Quloqchin', 'Наушники', 'Headphones', '{\"uz\":\"quloqchin\",\"ru\":\"nausniki\",\"en\":\"headphones\"}', 'Quloqchin', 'Наушники', 'Headphones', 'images/categories/YC86PvW3BVmBgGnZvEsdtOxCFjFzZNT13e1aWPDp.webp', '2024-12-26 04:09:18', '2024-12-26 04:09:18', NULL, NULL),
(6, 'Kameralar', 'регистраторы', 'Registrars', '{\"uz\":\"kameralar\",\"ru\":\"registratory\",\"en\":\"registrars\"}', 'Kameralar', 'регистраторы', 'Registrars', 'images/categories/UlsR5qZ0bg463gGvDjkDaSv4hnTitU2UHPfFu3Cv.webp', '2024-12-26 04:11:16', '2024-12-26 04:11:16', NULL, NULL),
(7, 'Changyutgichlar', 'пылесосы', 'Vacuum cleaners', '{\"uz\":\"changyutgichlar\",\"ru\":\"pylesosy\",\"en\":\"vacuum-cleaners\"}', 'Changyutgichlar', 'пылесосы', 'Vacuum cleaners', 'images/categories/L9RZrQUYA3ZGoDVlsYq1mWYe1Sm5RlJkpdxBLvCD.jpg', '2024-12-26 04:12:40', '2025-01-30 01:28:09', 4, 'images/categories/lW8bdtZWVDCk583GhV7InBThbyNqSbMcoOHxYw8W.jpg'),
(8, 'Mariam Wyatt', 'Baxter Leach', 'Malik Austin', '{\"uz\":\"mariam-wyatt\",\"ru\":\"baxter-leach\",\"en\":\"malik-austin\"}', 'Dolor quaerat veniam', 'Impedit sunt disti', 'Suscipit quis laboru', 'images/categories/2fLhPXoS20xDGRGQDnWqAWE3p5Xa6cfcBXLBI4p5.jpg', '2025-01-30 01:28:36', '2025-01-30 01:28:36', 3, NULL),
(37, 'Knox Callahan', 'Amaya Stewart', 'Fatima Puckett', '{\"uz\":\"knox-callahan\",\"ru\":\"amaya-stewart\",\"en\":\"fatima-puckett\"}', 'Minima et debitis re', 'Est a sed provident', 'Ratione eum recusand', 'images/categories/4yEmUiwWlHoiHtCqYOPFFSDGQ6K2UoecanUEjQEw.jpg', '2025-01-30 01:30:25', '2025-01-30 01:30:25', 6, 'images/categories/bzytqQE77nlaiJzdjOJqd4YgXUs1rO7R34aDa1uE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `name`, `lastname`, `message`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nazarbek', 'Test', 'Приобрел смартфон около месяца назад. До этого пользовался телефоном от другого бренда, но не пожалел, что сменил. Особенно поразила камера: фотографии получаются четкими и яркими. Дисплей с хорошей видимостью на солнце. Заряд держится долго. По соотношению «цена–качество» для меня лучшая модель.', 5, '2024-12-24 00:36:22', '2024-12-24 00:36:22'),
(2, 1, 'Nazarbek', 'Rashidov', 'Приобрел смартфон около месяца назад. До этого пользовался телефоном от другого бренда, но не пожалел, что сменил. Особенно поразила камера: фотографии получаются четкими и яркими. Дисплей с хорошей видимостью на солнце. Заряд держится долго. По соотношению «цена–качество» для меня лучшая модель.', 2, '2024-12-24 00:39:40', '2024-12-24 00:39:40'),
(3, 1, 'Orla Stephens', 'Frederick', 'Culpa aut cupidatat', 5, '2024-12-26 05:40:28', '2024-12-26 05:40:28'),
(4, 10, 'Chastity Peters', 'Klein', 'Et voluptatibus dolo', 4, '2025-01-06 05:00:32', '2025-01-06 05:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`, `address`, `facebook`, `instagram`, `telegram`, `youtube`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'example@example.com', '+998901234567', 'Tashkent, Uzbekistan', 'https://facebook.com/example', 'https://instagram.com/example', 'https://t.me/example', 'https://youtube.com/example', 'https://linkedin.com/in/example', '2024-12-23 07:17:35', '2024-12-23 07:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `desc_images`
--

CREATE TABLE `desc_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description_uz` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description_ru` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description_en` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `desc_images`
--

INSERT INTO `desc_images` (`id`, `product_id`, `image`, `description_uz`, `description_ru`, `description_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'products/KdON5QgIRJn2er6uihcpsmP1EckECSIKd2Ro7rf7.png', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '2024-12-26 06:56:03', '2024-12-26 06:56:03'),
(2, 1, 'products/g6tLGmf7pY38ru3Gav5g1HfGMWpQJjZCeWsJZbDg.png', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '\"\\u041a\\u043e\\u0440\\u043f\\u0443\\u0441 \\u0441\\u043c\\u0430\\u0440\\u0442\\u0444\\u043e\\u043d\\u0430 \\u0438\\u0437\\u0433\\u043e\\u0442\\u043e\\u0432\\u043b\\u0435\\u043d \\u0438\\u0437 \\u0432\\u044b\\u0441\\u043e\\u043a\\u043e\\u043f\\u0440\\u043e\\u0447\\u043d\\u043e\\u0433\\u043e \\u0430\\u043b\\u044e\\u043c\\u0438\\u043d\\u0438\\u0435\\u0432\\u043e\\u0433\\u043e \\u0441\\u043f\\u043b\\u0430\\u0432\\u0430 6M13, \\u0447\\u0442\\u043e \\u0434\\u0435\\u043b\\u0430\\u0435\\u0442 \\u0435\\u0433\\u043e \\u043d\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043f\\u0440\\u0430\\u043a\\u0442\\u0438\\u0447\\u043d\\u044b\\u043c, \\u043d\\u043e \\u0438 \\u0441\\u0442\\u0438\\u043b\\u044c\\u043d\\u044b\\u043c.\"', '2024-12-26 06:56:03', '2024-12-26 06:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question_uz` text COLLATE utf8mb4_unicode_ci,
  `question_ru` text COLLATE utf8mb4_unicode_ci,
  `question_en` text COLLATE utf8mb4_unicode_ci,
  `answer_uz` text COLLATE utf8mb4_unicode_ci,
  `answer_ru` text COLLATE utf8mb4_unicode_ci,
  `answer_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_banners`
--

CREATE TABLE `main_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_banners`
--

INSERT INTO `main_banners` (`id`, `images`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(4, '[\"main_banners\\/4AIsM1CP4cxmXcMZfjhk6v4RPUd3bfZuqIkd6ZDr.png\",\"main_banners\\/ugxQqrbb7m93rHPde4sVuHqIFllOZCrV43JC89H0.png\"]', 'main_banners/yZbYzxVes3nOn6CsJl8KHUsHPKkkuBYzELAqNIEq.png', 'main_banners/a3ygPB7mYcp0k9ooptSjP8NT4bQMzw14zeZP6ovZ.webp', NULL, '2025-01-29 03:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_19_061700_create_categories_table', 1),
(5, '2024_11_08_192622_create_news_table', 1),
(6, '2024_11_08_192630_create_services_table', 1),
(7, '2024_11_13_070341_create_abouts_table', 1),
(8, '2024_11_13_070400_create_contacts_table', 1),
(9, '2024_11_13_081118_create_faqs_table', 1),
(10, '2024_11_20_083836_create_histories_table', 1),
(11, '2024_11_21_071212_create_products_table', 1),
(12, '2024_11_21_071215_create_orders_table', 1),
(13, '2024_11_22_054941_create_testimonials_table', 1),
(14, '2024_11_23_051859_create_personal_access_tokens_table', 1),
(15, '2024_12_16_103133_create_blogs_table', 1),
(16, '2024_12_19_061717_create_variants_table', 1),
(17, '2024_12_23_103227_create_desc_images_table', 1),
(18, '2024_12_24_103227_create_desc_images_table', 2),
(19, '2024_12_18_115505_create_vacancies_table', 3),
(20, '2024_12_18_115521_create_candidants_table', 3),
(21, '2024_12_19_061433_create_articles_table', 3),
(22, '2024_12_24_050750_create_comments_table', 4),
(23, '2024_12_24_073949_create_stores_table', 5),
(24, '2024_12_25_134421_create_main_banners_table', 6),
(25, '2024_11_21_072215_create_orders_table', 7),
(26, '2024_12_26_102759_create_order_items_table', 7),
(27, '2024_12_26_114654_add_status_to_orders_table', 7),
(28, '2024_12_26_141511_add_message_to_orders_table', 8),
(29, '2024_12_26_160505_create_static_keywords_table', 9),
(30, '2024_12_26_102750_create_order_items_table', 10),
(31, '2025_01_30_061641_add_icon_to_categories_table', 11),
(32, '2024_12_26_102752_create_order_items_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_uz` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `content_uz` text COLLATE utf8mb4_unicode_ci,
  `content_ru` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title_uz`, `title_ru`, `title_en`, `description_uz`, `description_ru`, `description_en`, `content_uz`, `content_ru`, `content_en`, `date`, `status`, `image`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Xiaomi 13 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 13 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 13 Ultra: Power and Performance in Your Pocket 📱🚀', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 13 и 13 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 13 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 13 и 13 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 13 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 13 и 13 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 13 ожидается&nbsp;10 октября.</span></p>', '<h4>Какие будут характеристики Xiaomi 13</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 13 и 13 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 13 ожидается&nbsp;10 октября.</span></p>', '<h4>Какие будут характеристики Xiaomi 13</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '2024-12-24', NULL, 'news_photo/1735110976_news1.jpg', '2024-12-24 07:12:03', '2025-01-11 04:28:25', '{xiaomi-13-ultra-power-and-performance-in-your-pocket'),
(2, 'Xiaomi 12 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 12 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 12 Ultra: Power and Performance in Your Pocket 📱🚀', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 12 и 12 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 12 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 12 и 12 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 12 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 12 и 12 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 12 ожидается&nbsp;10 октября.</span></p>', '<h4>Какие будут характеристики Xiaomi 12</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 12</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 12</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '2024-05-01', NULL, 'news_photo/1735891575_newbanner.png', '2024-12-25 02:44:19', '2025-01-11 04:26:09', 'xiaomi-12-ultra-power-and-performance-in-your-pocket'),
(3, 'Xiaomi 11 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 11 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 11 Ultra: Power and Performance in Your Pocket 📱🚀', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 11 и 11 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 11 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 11 и 11 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 11 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 11 и 11 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 11 ожидается&nbsp;10 октября.</span></p>', '<h4>Какие будут характеристики Xiaomi 11</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 11</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 11</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '2024-05-05', NULL, 'news_photo/1735113293_news1.jpg', '2024-12-25 02:54:53', '2025-01-11 04:26:51', 'xiaomi-11-ultra-power-and-performance-in-your-pocket'),
(4, 'Xiaomi 10 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 10 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 10 Ultra: Power and Performance in Your Pocket 📱🚀', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 10 и 10 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 10 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 10 и 10 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 10 ожидается&nbsp;10 октября.</span></p>', '<p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Китайская компания готовит к выпуску свои новейшие флагманы –Xiaomi 10 и 10 Pro. Анонс состоится на специальном мероприятии: дата выхода Xiaomi 10 ожидается&nbsp;10 октября.</span></p>', '<h4>Какие будут характеристики Xiaomi 10</h4><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"background-color: rgb(250, 250, 250); color: rgb(33, 37, 41);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 10</h4><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '<h4>Какие будут характеристики Xiaomi 10</h4><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">Каждое из устройств будет оснащено впечатляющими дисплеями: стандартная модель получит FHD-экран 6.36 дюймов. А Pro-версия – FHD-дисплей 6.73 дюймов, у которой частота обновления достигает 120 Гц. Оба телефона предложат различные конфигурации памяти, включая варианты до 16 ГБ / 1 ТБ или до 12 / 256 ГБ. Кроме того, они будут защищены от воды и пыли согласно стандарту IP68.</span></p><p><br></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">Стандартная модель не отстает в технологическом прогрессе, будучи оснащенной аккумулятором примерно на 4900 мАч с возможностями быстрой проводной зарядки на 100 Вт и беспроводной на 50 Вт.</span></p><p><br></p><p><span style=\"color: rgb(33, 37, 41); background-color: rgb(250, 250, 250);\">В сравнении с предшественниками версия Pro демонстрирует улучшения в системе питания и зарядных возможностях. Этот флагман оснащен аккумулятором на 5400 мАч. Предлагает опции зарядки через кабель на 120 Вт, беспроводную на 80 Вт. В качестве новшества в устройстве появится ультразвуковой метод идентификации по отпечаткам пальцев, внедренный в экран.</span></p>', '2024-04-04', NULL, 'news_photo/1735891553_newbanner.png', '2024-12-25 02:56:32', '2025-01-11 04:30:19', 'xiaomi-10-ultra-power-and-performance-in-your-pock'),
(5, 'Xiaomi 8 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 8 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 8 Ultra: Power and Performance in Your Pocket 📱🚀', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '2024-09-01', NULL, 'news_photo/1735114064_news_image.jpg', '2024-12-25 03:07:44', '2025-01-11 06:06:22', 'xiaomi-8-ultra-power-and-performance-in-your-pocket'),
(6, 'Xiaomi 9 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 9 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 9 Ultra: Power and Performance in Your Pocket 📱🚀', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '2024-05-05', NULL, 'news_photo/1735891627_newbanner.png', '2024-12-25 03:09:27', '2025-01-11 06:05:52', 'xiaomi-9-ultra-power-and-performance-in-your-pocket'),
(7, 'Xiaomi 7 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 7 Ultra: мощь и производительность в вашем кармане📱🚀', 'Xiaomi 7 Ultra: Power and Performance in Your Pocket 📱🚀', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '2024-02-26', NULL, 'news_photo/1735114239_news1.jpg', '2024-12-25 03:10:25', '2025-01-11 06:06:49', 'xiaomi-7-ultra-power-and-performance-in-your-pocket'),
(8, 'Xiaomi 15 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 15 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀', 'Xiaomi 15 Ultra: Power and Performance in Your Pocket 📱🚀', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda 📱🚀</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket 📱🚀</p>', '2024-09-05', NULL, 'news_photo/1735891566_newbanner.png', '2024-12-25 03:11:40', '2025-01-11 06:09:51', 'xiaomi-15-ultra-power-and-performance-in-your-pocket-8'),
(9, 'Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda', 'Xiaomi 14 Ultra: мощь и производительность в вашем кармане', 'Xiaomi 14 Ultra: Power and Performance in Your Pocket', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda </p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket </p>', '<p>Xiaomi 14 Ultra: Kuch va Ishlash quvvati sizning cho\'ntagingizda </p>', '<p>Xiaomi 14 Ultra: мощь и производительность в вашем кармане</p>', '<p>Xiaomi 14 Ultra: Power and Performance in Your Pocket </p>', '2025-01-01', NULL, 'news_photo/1735891305_news_image.jpg', '2025-01-03 03:01:45', '2025-01-03 03:01:45', 'xiaomi-14-ultra-power-and-performance-in-your-pocket');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`, `status`, `message`) VALUES
(1, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 09:12:01', '2024-12-26 09:43:41', 'new', NULL),
(2, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 09:12:07', '2024-12-26 09:12:07', 'new', NULL),
(3, NULL, NULL, NULL, NULL, '2024-12-26 09:17:50', '2024-12-26 09:43:43', 'completed', 'saddsa'),
(4, 'Kevin', NULL, NULL, '+998 91 073 93 73', '2024-12-26 09:20:29', '2024-12-26 09:20:29', 'new', 'sdasdsa'),
(5, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:51:52', '2024-12-26 10:51:52', 'new', NULL),
(6, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:51:53', '2024-12-26 10:51:53', 'new', NULL),
(7, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:52:07', '2024-12-26 10:52:07', 'new', NULL),
(8, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:53:14', '2024-12-26 10:53:14', 'new', NULL),
(9, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:53:39', '2024-12-26 10:53:39', 'new', NULL),
(10, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:54:20', '2024-12-26 10:54:46', 'processing', NULL),
(11, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:55:30', '2024-12-26 10:55:52', 'processing', NULL),
(12, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:55:39', '2024-12-26 10:55:39', 'new', NULL),
(13, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:56:37', '2024-12-26 10:56:37', 'new', NULL),
(14, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-26 10:57:23', '2024-12-26 10:58:40', 'new', NULL),
(16, 'Nazarbek', NULL, NULL, '+998910739373', '2024-12-27 01:23:14', '2024-12-27 01:23:14', 'new', NULL),
(17, 'Умар', NULL, NULL, '+998933018587', '2024-12-27 01:25:54', '2024-12-27 01:25:54', 'new', NULL),
(18, 'Умар', NULL, NULL, '+998933018587', '2024-12-27 01:28:16', '2024-12-27 01:28:16', 'new', NULL),
(19, 'Умар', NULL, NULL, '+998933018587', '2024-12-27 01:42:40', '2024-12-27 01:42:40', 'new', NULL),
(20, 'Levi', NULL, NULL, 'fyrabi@mailinator.com', '2024-12-27 01:43:03', '2024-12-27 01:43:03', 'new', NULL),
(21, 'Levi', NULL, NULL, 'fyrabi@mailinator.com', '2024-12-27 01:46:41', '2024-12-27 01:46:41', 'new', NULL),
(22, 'Данияр', NULL, NULL, '+998933018587', '2024-12-27 01:47:33', '2024-12-27 01:47:46', 'new', 'Ipsa doloribus aper'),
(23, NULL, NULL, NULL, NULL, '2024-12-27 01:48:19', '2024-12-27 01:48:19', 'new', 'gfdgdf'),
(24, 'user', NULL, NULL, '+998935125324', '2025-01-03 04:47:24', '2025-01-03 04:47:24', 'new', 'Ipsa doloribus aper'),
(25, 'Адхамжон', NULL, NULL, '+998933018587', '2025-01-03 04:47:53', '2025-01-03 04:47:53', 'new', 'Ipsa doloribus aper'),
(26, NULL, NULL, NULL, NULL, '2025-01-03 04:49:03', '2025-01-03 04:49:03', 'new', 'test message'),
(27, 'Айгул', NULL, NULL, '+998 (93) 301-85-87', '2025-01-03 04:59:54', '2025-01-03 04:59:54', 'new', NULL),
(28, NULL, NULL, NULL, NULL, '2025-01-03 07:03:54', '2025-01-03 07:03:54', 'new', 'sdfghj'),
(29, NULL, NULL, NULL, NULL, '2025-01-03 07:04:09', '2025-01-03 07:04:09', 'new', 'sdfghjk'),
(30, NULL, NULL, NULL, NULL, '2025-01-03 07:04:22', '2025-01-03 07:04:22', 'new', 'sdfghjk'),
(31, NULL, NULL, NULL, NULL, '2025-01-05 23:36:11', '2025-01-05 23:36:11', 'new', 'test'),
(32, NULL, NULL, NULL, NULL, '2025-01-05 23:54:31', '2025-01-05 23:54:31', 'new', 'test'),
(33, NULL, NULL, NULL, NULL, '2025-01-06 05:24:45', '2025-01-06 05:24:45', 'new', 'sdfgh'),
(34, 'Cathleen', NULL, NULL, '+1 (545) 896-6423', '2025-01-06 05:26:53', '2025-01-06 05:26:53', 'new', 'Voluptatem nostrud v'),
(35, 'Nazarbek', NULL, NULL, '+998 (91) 073-93-73', '2025-01-31 00:28:20', '2025-01-31 00:28:20', 'new', NULL),
(36, 'Nazarbek', NULL, NULL, '+998 (91) 073-93-73', '2025-01-31 00:28:53', '2025-01-31 00:28:53', 'new', NULL),
(37, 'Nazarbek', NULL, NULL, '+998 (91) 073-93-73', '2025-01-31 00:38:44', '2025-01-31 00:38:44', 'new', NULL),
(38, 'Nazarbek', NULL, NULL, '+998 (91) 073-93-73', '2025-01-31 00:39:26', '2025-01-31 00:39:26', 'new', NULL),
(39, 'Nazarbek', NULL, NULL, '+998 (91) 073-93-73', '2025-01-31 00:40:23', '2025-01-31 00:40:23', 'new', NULL),
(40, 'Nazarbek', NULL, NULL, '20', '2025-01-31 00:58:32', '2025-01-31 00:58:32', 'new', 'sdasdsa'),
(41, 'Nazarbek', NULL, NULL, '+998910739373', '2025-01-31 01:24:59', '2025-01-31 01:24:59', 'new', 'sdasdsa'),
(42, 'test', NULL, NULL, '+998910739373', '2025-01-31 01:35:17', '2025-01-31 01:35:17', 'new', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` text COLLATE utf8mb4_unicode_ci,
  `total` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 36, 1, 1, '281', '281.00', '2025-01-31 00:28:53', '2025-01-31 00:28:53'),
(2, 36, 3, 1, '300000', '300000.00', '2025-01-31 00:28:53', '2025-01-31 00:28:53'),
(3, 37, 1, 1, '103', '103.00', '2025-01-31 00:38:44', '2025-01-31 00:38:44'),
(4, 38, 10, 1, '1500', '1500.00', '2025-01-31 00:39:26', '2025-01-31 00:39:26'),
(5, 39, 10, 1, '1500', '1500', '2025-01-31 00:40:23', '2025-01-31 00:40:23'),
(6, 39, 7, 1, '4125000', '4125000', '2025-01-31 00:40:23', '2025-01-31 00:40:23'),
(7, 39, 6, 1, '5250000', '5250000', '2025-01-31 00:40:23', '2025-01-31 00:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_uz` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_uz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `gift_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_uz` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_ru` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_en` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content_uz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `content_ru` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `slug`, `name_uz`, `name_ru`, `name_en`, `description_uz`, `description_ru`, `description_en`, `gift_name`, `gift_image`, `color_uz`, `color_ru`, `color_en`, `image`, `images`, `created_at`, `updated_at`, `content_uz`, `content_en`, `content_ru`) VALUES
(1, 2, 'telefon-1', 'Telefon', 'Смартфон Xiaomi 12T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', 'Смартфон Xiaomi 12T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi.</p><p><br></p>', '<p><em style=\"background-color: rgb(255, 255, 255); color: rgb(31, 31, 31);\">﻿</em>&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.</p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm.</p><p><br></p><p><br></p>', 'Maxine Fields', 'gift_images/PxnaeQBLqE7vy1YpGFGmTvLEwhMAWJPkHBSkc1DQ.png', NULL, 'brown', NULL, 'products/xB7kONqBvm1bnI7KDM5VypAPaNdw53fIQM142mEM.webp', '\"[\\\"products\\\\\\/zN3NUWBQxpgYSjh6TTiS4LbJx4ZRn3s1Z27cD5BZ.webp\\\",\\\"products\\\\\\/BqAfatsYBA9LK1pI21n0Y40fghvT5Vu09unwfBTn.webp\\\",\\\"products\\\\\\/ytmKNJysCPCMibCJwpOYiQImOz2KcFb9L90oWYYF.webp\\\",\\\"products\\\\\\/F1g5iGy9ehE63frtRXACG6XxJUTeUIzUP3xKxCpF.webp\\\"]\"', '2024-12-23 07:36:25', '2025-01-05 23:40:24', '<p><strong>Maksimal quvvat:</strong> 18 Vt</p><p><strong>Tez zaryadlashni qo\'llab-quvvatlash:</strong> ha</p><p><strong>Bir vaqtning o\'zida bir nechta qurilmalarni zaryadlash:</strong> ha</p><p><strong>Ulagich turi:</strong> USB type-C/microUSB/USB type-A</p><p><strong>BAtareya quvvati:</strong> 10000 мА/ч</p><p><strong>Korpus materiali</strong>: metal Sunt amet, perspicia.</p>', '<p><strong>Maximum power:</strong> 18 W</p><p><strong>Fast charging support:</strong> Yes</p><p><strong>Support for charging multiple devices at once:</strong> Yes</p><p><strong>Connector type:</strong> USB Type-C/microUSB/USB Type-A</p><p><strong>Battery capacity:</strong> 10,000 mAh</p><p><strong>Case material:</strong> Metal Sunt amet, perspicia.</p>', '<p><strong>Максимальной мощностью:</strong> 18 Вт</p><p><strong>Поддержка быстрой зарядки:</strong> Есть</p><p><strong>Подержка зарядки сразу нескольких устройств:</strong> Есть</p><p><strong>Вид разъема:</strong> USB type-C/microUSB/USB type-A</p><p><strong>Емкость аккумулятора:</strong> 10000 мА/ч</p><p><strong>Материал корпуса:</strong> металл Sunt amet, perspicia.</p><p><br></p>'),
(3, 2, 'smartfon-xiaomi-14t-12512gb-titan-black-v-komplekte-s-xiaomi-watch-s1-active-gl-blue-3', 'Смартфон Xiaomi 14T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', 'Смартфон Xiaomi 14T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', 'Смартфон Xiaomi 14T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi.</p>', '<p>&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.<em style=\"background-color: rgb(255, 255, 255); color: rgb(31, 31, 31);\">﻿</em></p><p><br></p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm</p>', 'Reed Houston', 'gift_images/KQWogn0a4aB3fdaFtQFTcK3qjASv276MtmEmcOcC.png', NULL, 'black', NULL, 'products/lax1boDgp15W2HgzfGg9DQ3k5Eeia51V0MqtJyCZ.webp', '\"[\\\"products\\\\\\/bgelKTgR0uKXZ4TcoNAfZ76LTcL2QGera0SCDJ80.webp\\\",\\\"products\\\\\\/WoOPiF14sty50PauVNX4hpBQZCYWhapyFQE9iEpS.webp\\\",\\\"products\\\\\\/x1qj8so6KYYAZ6gnaO8gCchjLg35rvyArzRoHYUU.webp\\\",\\\"products\\\\\\/uoRTrkIosNbVTypa408ognjJWPDjq1XBdbYn74ph.webp\\\"]\"', '2024-12-24 01:39:22', '2025-01-05 23:40:42', '<p><strong style=\"color: rgb(142, 147, 155);\">Диагональ экрана </strong>6,67\" (16,94 см)</p><p><strong style=\"color: rgb(142, 147, 155);\">Разрешение</strong><span style=\"color: rgb(142, 147, 155);\"> </span>2712 x 1220</p><p><strong style=\"color: rgb(142, 147, 155);\">Тип дисплея </strong>AMOLED</p><p><strong style=\"color: rgb(142, 147, 155);\">Частота смены кадров, Гц </strong>144 Гц</p>', '<p><strong>Maximum power:</strong> 18 W</p><p><strong>Fast charging support:</strong> Yes</p><p><strong>Support for charging multiple devices at once:</strong> Yes</p><p><strong>Connector type:</strong> USB Type-C/microUSB/USB Type-A</p><p><strong>Battery capacity:</strong> 10,000 mAh</p><p><strong>Case material:</strong> Metal Sunt amet, perspicia.</p>', '<p><span style=\"color: rgb(142, 147, 155);\">Диагональ экрана </span>6,67\" (16,94 см)</p><p><span style=\"color: rgb(142, 147, 155);\">Разрешение </span>2712 x 1220</p><p><span style=\"color: rgb(142, 147, 155);\">Тип дисплея </span>AMOLED</p><p><span style=\"color: rgb(142, 147, 155);\">Частота смены кадров, Гц </span>144 Гц</p>'),
(4, 2, 'telefon-xiaomi-4', 'Telefon Xiaomi', 'Телефон Xiaomi', 'Phone Xiaomi', '<p>4K Ultra HD Ko‘ngilochar Televizor</p>', '<p>4K Ultra HD Развлечение</p>', '<p>4K Ultra HD Entertainment</p>', 'new year', 'gift_images/oAoOYNIE2xuM4olmQlVf9fLDJFUjA5oMLqkicOJe.jpg', NULL, 'blue', NULL, 'products/2FtbpqAG5FJKsgYynUywq8bw9Ul88Pf3ZvM4Bt0k.webp', '\"[\\\"products\\\\\\/VKkkQu6b8yk48BFUwniY2hizkwTS5ipNjufWfB16.webp\\\",\\\"products\\\\\\/m09QulcXpQRQPoZTgQoBJPcDHn7rYhb5W8Slw7di.webp\\\"]\"', '2024-12-25 00:46:37', '2024-12-27 23:40:56', '<p>\"CrystalVision Smart TV bilan uyda ko‘ngilochar olamga sho‘ng‘ing. Ajoyib 4K Ultra HD ekran, yorqin ranglar va aqlli ulanish imkoniyatlari bilan bu televizor sizning sevimli filmlar, ko‘rsatuvlar va o‘yinlaringizni jonlantiradi. Ichki ilovalar va ovozli boshqaruv yordamida sevimli kontentingizni topish osonroq bo‘ldi.\"</p>', '<p>\"Experience the ultimate in home entertainment with the CrystalVision Smart TV. Featuring a stunning 4K Ultra HD display, vibrant colors, and smart connectivity, this TV brings your favorite movies, shows, and games to life. With built-in apps and voice control, it’s never been easier to access the content you love.\"</p>', '<p>\"Окунитесь в мир развлечений с CrystalVision Smart TV. Этот телевизор оснащен великолепным 4K Ultra HD дисплеем, яркими цветами и умной связью, оживляя ваши любимые фильмы, шоу и игры. С встроенными приложениями и голосовым управлением доступ к любимому контенту стал проще, чем когда-либо.\"</p>'),
(5, 1, 'tv-5', 'TV', 'TV', 'TV', '<p>4K Ultra HD Ko‘ngilochar Televizor</p>', '<p>4K Ultra HD Развлечение</p>', '<p>4K Ultra HD Entertainment</p>', NULL, NULL, NULL, 'null', NULL, 'products/hlhPkLAiTgOjXg9kRBNxFl5lPkYFgBAQ7jZH8Jb2.webp', '\"[\\\"products\\\\\\/z0ssnFhPUjvQlLBEBeIgg4kaHwPe5XsMB7N09U6a.webp\\\"]\"', '2024-12-25 00:55:23', '2024-12-28 05:20:56', '<p>\"CrystalVision Smart TV bilan uyda ko‘ngilochar olamga sho‘ng‘ing. Ajoyib 4K Ultra HD ekran, yorqin ranglar va aqlli ulanish imkoniyatlari bilan bu televizor sizning sevimli filmlar, ko‘rsatuvlar va o‘yinlaringizni jonlantiradi. Ichki ilovalar va ovozli boshqaruv yordamida sevimli kontentingizni topish osonroq bo‘ldi.\"</p>', '<p>\"Experience the ultimate in home entertainment with the CrystalVision Smart TV. Featuring a stunning 4K Ultra HD display, vibrant colors, and smart connectivity, this TV brings your favorite movies, shows, and games to life. With built-in apps and voice control, it’s never been easier to access the content you love.\"</p>', '<p>\"Окунитесь в мир развлечений с CrystalVision Smart TV. Этот телевизор оснащен великолепным 4K Ultra HD дисплеем, яркими цветами и умной связью, оживляя ваши любимые фильмы, шоу и игры. С встроенными приложениями и голосовым управлением доступ к любимому контенту стал проще, чем когда-либо.\"</p>'),
(6, 1, 'televizor-6', 'Televizor', 'Телевизоры', 'TV', '<p>4K Ultra HD Ko‘ngilochar Televizor</p>', '<p>4K Ultra HD Развлечение</p>', '<p>4K Ultra HD Entertainment</p>', 'Phone gift', 'products/eP31H01lx9wIOdLDHj32Si5894KNaxb8fUuDzN9K.png', NULL, 'black', NULL, 'products/tzvNOREY3GXdWtxj9Mey9MwNRyCSi03ksZp48XU5.webp', '\"[\\\"products\\\\\\/suvY6lpE5lkfrcPBePU4ni8mVqqSlFnwMr1Kj2Wq.webp\\\",\\\"products\\\\\\/Uvhf1Pkn73lbcgPMU4dN1TsFYiLwPqNWA09D3WIZ.webp\\\",\\\"products\\\\\\/afssyjhg3cIe18DSVgCZJWdrRWPbHUSukloRS2Ol.webp\\\"]\"', '2024-12-25 01:11:10', '2024-12-28 05:20:03', '<p>\"CrystalVision Smart TV bilan uyda ko‘ngilochar olamga sho‘ng‘ing. Ajoyib 4K Ultra HD ekran, yorqin ranglar va aqlli ulanish imkoniyatlari bilan bu televizor sizning sevimli filmlar, ko‘rsatuvlar va o‘yinlaringizni jonlantiradi. Ichki ilovalar va ovozli boshqaruv yordamida sevimli kontentingizni topish osonroq bo‘ldi.\"</p>', '<p>\"Experience the ultimate in home entertainment with the CrystalVision Smart TV. Featuring a stunning 4K Ultra HD display, vibrant colors, and smart connectivity, this TV brings your favorite movies, shows, and games to life. With built-in apps and voice control, it’s never been easier to access the content you love.\"</p>', '<p>\"Окунитесь в мир развлечений с CrystalVision Smart TV. Этот телевизор оснащен великолепным 4K Ultra HD дисплеем, яркими цветами и умной связью, оживляя ваши любимые фильмы, шоу и игры. С встроенными приложениями и голосовым управлением доступ к любимому контенту стал проще, чем когда-либо.\"</p>'),
(7, 3, 'aqlli-soat-7', 'Aqlli soat', 'Умные час', 'smartwatch', '<p>Hayotingiz uchun aqlli soat</p>', '<p>Смарт-часы для вашей жизни</p>', '<p>Smartwatch for Your Lifestyle</p>', NULL, NULL, NULL, 'black', NULL, 'products/c4gAxGNLsOJCVG7CoRVoVSlFY25Bqp9SIGaRKGqP.webp', '\"[\\\"products\\\\\\/Ji85SrvBah3NOUVGgA1wefBPEyTr9y16Dgp6Eb1P.webp\\\"]\"', '2024-12-28 00:25:50', '2025-01-13 00:22:00', '<p>Bizning aqlli soatimiz bilan uslub va texnologiyaning mukammal uyg‘unligini kashf eting. Bog‘lanishda qoling, salomatligingizni kuzating va kundalik hayotingizni osonlashtiring.</p>', '<p>Discover the perfect blend of style and technology with our smartwatch. Stay connected, track your health, and enhance your daily routine effortlessly</p>', '<p>Откройте для себя идеальное сочетание стиля и технологий с нашими смарт-часами. Оставайтесь на связи, следите за здоровьем и улучшайте свою повседневную жизнь без усилий</p>'),
(8, 4, 'xiaomi-electric-scooter-4-ultra-black-8', 'Xiaomi Electric Scooter 4 Ultra Black', 'Xiaomi Electric Scooter 4 Ultra Black', 'Xiaomi Electric Scooter 4 Ultra Black', '<p>Xiaomi Electric Scooter 4 Ultra Qora – Yuqori samaradorlik va zamonaviy uslub</p>', '<p>Электросамокат Xiaomi 4 Ultra Черный – Высокая производительность и стиль\"</p>', '<p>Xiaomi Electric Scooter 4 Ultra Black - Ultimate Performance and Style</p>', NULL, NULL, NULL, 'black', NULL, 'products/lcENY6QRt32iHT2p8mxb2dbQdapafgpjey91TZbe.webp', '\"[]\"', '2024-12-28 00:46:02', '2025-01-03 00:28:00', '<p>Xiaomi Electric Scooter 4 Ultra Qora – quvvat va dizaynning mukammal uygʻunligi. Yaxshilangan ishlash ko‘rsatkichlari, zamonaviy qora dizayn va ilg‘or xavfsizlik funksiyalari bilan u shahar sayohatlari yoki dam olish kunlari sarguzashtlari uchun ideal tanlov</p>', '<p>Discover the Xiaomi Electric Scooter 4 Ultra Black – a perfect blend of power and design. With enhanced performance, a sleek black finish, and advanced safety features, it’s ideal for urban commuting or weekend adventures.</p>', '<p>Откройте для себя Xiaomi Electric Scooter 4 Ultra Черный – идеальное сочетание мощности и дизайна. Улучшенные характеристики, элегантный черный дизайн и современные системы безопасности делают его идеальным для городской езды или прогулок в выходные.</p>'),
(9, 6, 'camera-9', 'camera', 'camera', 'camera', '<p>Yuqori xavfsizlik uchun ilg\'or kuzatuv kamerasi</p>', '<p>Продвинутая камера наблюдения для повышенной безопасности\"</p>', '<p>Advanced Surveillance Camera for Enhanced Security</p>', NULL, NULL, NULL, 'null', NULL, 'products/TsTfaoyW0Ao1R8LXLaMdTNxpIPDQ2WQKvhulk77y.jpg', '\"[]\"', '2024-12-28 00:51:26', '2025-01-03 00:28:22', '<p>Mulkingiz xavfsizligini ta\'minlash uchun ilg\'or kuzatuv kamerasidan foydalaning. Yuqori aniqlikdagi tasvir, tungi ko\'rish va harakatni aniqlash funksiyalari bilan 24/7 monitoring taqdim etadi.</p>', '<p>Ensure your property\'s safety with our advanced surveillance camera. Equipped with high-resolution imaging, night vision, and motion detection, it offers 24/7 monitoring for peace of mind.</p>', '<p>Обеспечьте безопасность вашего имущества с помощью нашей продвинутой камеры наблюдения. Оснащена высокоразрешающим изображением, ночным видением и детектором движения, она обеспечивает круглосуточный мониторинг для вашего спокойствия.</p>'),
(10, 7, 'pilesosi-10', 'Pilesosi', 'Пылесос', 'Vacuum Cleaner - Makes Cleaning Easy', '<p>Pilesos - Tozalashni osonlashtiradi</p>', '<p>Пылесос - Упрощает уборку</p>', '<p>Vacuum Cleaner</p>', NULL, NULL, NULL, 'brown', NULL, 'products/ygMgzzm2ul0ogYn3lqcfGeLw6g7c4vkqcC5Icb80.webp', '\"[]\"', '2024-12-28 02:49:51', '2025-01-11 04:31:30', '<p>Pilesos, uy tozalashni oson va samarali qiladi. Kuchli yutilish quvvati va turli yuzalar uchun maxsus o\'zgartirishlar bilan, bu qurilma chang va axlatni tez va samarali tarzda yig\'ib oladi. Kompakt va qulay dizayni bilan, uni foydalanish juda oson.</p><p><br></p>', '<p>The vacuum cleaner makes home cleaning simple and efficient. With strong suction power and special attachments for different surfaces, it quickly and effectively collects dust and debris. Its compact and convenient design makes it easy to use.</p><p><br></p>', '<ul><li>Пылесос упрощает уборку дома, обеспечивая высокую эффективность. С мощным всасыванием и специальными насадками для различных поверхностей, он быстро и эффективно собирает пыль и мусор. Компактный и удобный дизайн делает его использование простым и комфортным.</li></ul><p><br></p><p><br></p><p><br></p>'),
(11, 7, 'pilesos-11', 'Pilesos', 'Пылесос', 'Vacuum Cleaner', '<p>Pilesos - Tozalashni osonlashtiradi</p>', '<p>Пылесос - Упрощает уборку</p>', '<p>Vacuum Cleaner - Makes Cleaning Easy</p>', NULL, NULL, NULL, 'black', NULL, 'products/PcFoeKN5pSXdH4B98g2U1M1Hv5asSTB9ASwNjrY8.webp', '\"[]\"', '2024-12-28 02:51:46', '2025-01-03 00:28:52', '<p>Pilesos, uy tozalashni oson va samarali qiladi. Kuchli yutilish quvvati va turli yuzalar uchun maxsus o\'zgartirishlar bilan, bu qurilma chang va axlatni tez va samarali tarzda yig\'ib oladi. Kompakt va qulay dizayni bilan, uni foydalanish juda oson.</p><p><br></p>', '<p>The vacuum cleaner makes home cleaning simple and efficient. With strong suction power and special attachments for different surfaces, it quickly and effectively collects dust and debris. Its compact and convenient design makes it easy to use.</p><p><br></p>', '<ul><li>Пылесос упрощает уборку дома, обеспечивая высокую эффективность. С мощным всасыванием и специальными насадками для различных поверхностей, он быстро и эффективно собирает пыль и мусор. Компактный и удобный дизайн делает его использование простым и комфортным.</li></ul><p><br></p><p><br></p><p><br></p>'),
(12, 2, 'laptop-12', 'laptop', 'ноутбук', 'laptop', '<p>Yuqori samarali va tezkor laptop</p>', '<p>Высокопроизводительный и быстрый ноутбук</p>', '<p>High-performance and fast laptop</p>', NULL, NULL, NULL, 'black', NULL, 'products/xl1xgQ03di46x9THXKQHSbqolfU2UPXVp9XCCn3h.webp', '\"[]\"', '2024-12-28 02:55:00', '2025-01-03 00:29:13', '<p>Ushbu laptop sizning kundalik ishlarga moslashgan, yuqori tezlikda ishlaydigan va ko\'p vazifalarni osonlik bilan bajarish imkonini beradi. Eng so\'nggi texnologiyalar va kuchli protsessorlar bilan jihozlangan, uni har qanday vazifani bajarishda foydalanishingiz mumkin.</p><p><br></p>', '<p>This laptop is designed to handle your daily tasks with high speed and efficiency. Equipped with the latest technology and powerful processors, it can easily manage any task you throw at it.</p><p><br></p>', '<ul><li>Этот ноутбук идеально подходит для повседневных задач, обеспечивая высокую скорость и эффективность. Оборудован новейшими технологиями и мощными процессорами, он легко справляется с любыми задачами.</li></ul><p><br></p><p><br></p><p><br></p>'),
(13, 2, 'telefon-13', 'Telefon', 'Смартфон Xiaomi 12T 12+512GB Titan Black в комплекте с Xiaomi Watch S1 Active GL Blue', 'phone', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi.</p><p><br></p>', '<p><em style=\"color: rgb(31, 31, 31);\">﻿</em><span style=\"color: rgb(100, 116, 138);\">&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.</span></p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm.</p>', NULL, NULL, NULL, 'black', NULL, 'products/bZPHJRJTB2iTHjBtM3WITbpIUglmxy02GLZxjG6S.webp', '\"[]\"', '2024-12-28 05:02:57', '2025-01-03 00:29:23', '<p>Maksimal quvvat: 18 Vt</p><p>Tez zaryadlashni qo\'llab-quvvatlash: ha</p><p>Bir vaqtning o\'zida bir nechta qurilmalarni zaryadlash: ha</p><p>Ulagich turi: USB type-C/microUSB/USB type-A</p><p>BAtareya quvvati: 10000 мА/ч</p><p>Korpus materiali: metal Sunt amet, perspicia.</p>', '<p>Maximum power: 18 W</p><p>Fast charging support: Yes</p><p>Support for charging multiple devices at once: Yes</p><p>Connector type: USB Type-C/microUSB/USB Type-A</p><p>Battery capacity: 10,000 mAh</p><p>Case material: Metal Sunt amet, perspicia.</p>', '<p>Максимальной мощностью: 18 Вт</p><p>Поддержка быстрой зарядки: Есть</p><p>Подержка зарядки сразу нескольких устройств: Есть</p><p>Вид разъема: USB type-C/microUSB/USB type-A</p><p>Емкость аккумулятора: 10000 мА/ч</p><p>Материал корпуса: металл Sunt amet, perspicia</p>'),
(14, 2, 'telefon-14', 'Telefon', 'Телефон', 'Phone', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi.</p>', '<p><em style=\"color: rgb(31, 31, 31);\">﻿</em><span style=\"color: rgb(100, 116, 138);\">&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.</span></p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm.</p>', NULL, NULL, NULL, 'red', NULL, 'products/lHDTbxRoKvNYWP1tmFgE1qQ8xTuSyioBZXeoS8qV.webp', '\"[]\"', '2024-12-28 05:06:30', '2025-01-03 00:29:41', '<p>Maksimal quvvat: 18 Vt</p><p>Tez zaryadlashni qo\'llab-quvvatlash: ha</p><p>Bir vaqtning o\'zida bir nechta qurilmalarni zaryadlash: ha</p><p>Ulagich turi: USB type-C/microUSB/USB type-A</p><p>BAtareya quvvati: 10000 мА/ч</p><p>Korpus materiali: metal Sunt amet, perspicia.</p>', '<p>Maximum power: 18 W</p><p>Fast charging support: Yes</p><p>Support for charging multiple devices at once: Yes</p><p>Connector type: USB Type-C/microUSB/USB Type-A</p><p>Battery capacity: 10,000 mAh</p><p>Case material: Metal Sunt amet, perspicia.</p>', '<p>Максимальной мощностью: 18 Вт</p><p>Поддержка быстрой зарядки: Есть</p><p>Подержка зарядки сразу нескольких устройств: Есть</p><p>Вид разъема: USB type-C/microUSB/USB type-A</p><p>Емкость аккумулятора: 10000 мА/ч</p><p>Материал корпуса: металл Sunt amet, perspicia.</p><p><br></p>'),
(15, 2, 'telefon-15', 'Telefon', 'Телефон', 'Phone', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi</p>', '<p><em style=\"color: rgb(31, 31, 31);\">﻿</em><span style=\"color: rgb(100, 116, 138);\">&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.</span></p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm</p>', NULL, NULL, NULL, 'brown', NULL, 'products/rYGZXVN29CazycEwsyHoLRmVJVe7uoTdLzm3WwGQ.webp', '\"[]\"', '2024-12-28 05:10:08', '2025-01-03 05:53:13', '<p>Maksimal quvvat: 18 Vt</p><p>Tez zaryadlashni qo\'llab-quvvatlash: ha</p><p>Bir vaqtning o\'zida bir nechta qurilmalarni zaryadlash: ha</p><p>Ulagich turi: USB type-C/microUSB/USB type-A</p><p>BAtareya quvvati: 10000 мА/ч</p><p>Korpus materiali: metal Sunt amet, perspicia</p>', '<p>Maximum power: 18 W</p><p>Fast charging support: Yes</p><p>Support for charging multiple devices at once: Yes</p><p>Connector type: USB Type-C/microUSB/USB Type-A</p><p>Battery capacity: 10,000 mAh</p><p>Case material: Metal Sunt amet, perspicia</p>', '<p>Максимальной мощностью: 18 Вт</p><p>Поддержка быстрой зарядки: Есть</p><p>Подержка зарядки сразу нескольких устройств: Есть</p><p>Вид разъема: USB type-C/microUSB/USB type-A</p><p>Емкость аккумулятора: 10000 мА/ч</p><p>Материал корпуса: металл Sunt amet, perspicia.</p>'),
(16, 2, 'telefon-16', 'Telefon', 'Телефон', 'Phone', '<p>Professional linzalar to‘plami</p><p>Uchlik linza, to‘rtta fokus masofasi</p><p>Ajoyib suratlarni yaqin va uzoq masofalarda osonlik bilan oling.</p><p>Xiaomi 14T uchlik tasvir tizimi 15 mm dan 100 mm gacha bo‘lgan fokus masofalarini qamrab oladi.</p>', '<p><em style=\"color: rgb(31, 31, 31);\">﻿</em><span style=\"color: rgb(100, 116, 138);\">&nbsp;Профессиональный набор линзТройная линза, четыре фокусных расстоянияДелайте потрясающие снимки вблизи и издалека без усилий. Тройная система формирования изображений Xiaomi 14T охватывает фокусные расстояния от 15 мм до 100 мм.</span></p>', '<p>Professional lens set</p><p>Triple lens, four focal lengths</p><p>Capture stunning photos up close and from a distance with ease.</p><p>The Xiaomi 14T triple imaging system covers focal lengths from 15 mm to 100 mm.</p>', NULL, NULL, NULL, 'brown', NULL, 'products/kVbUrLBOlOsNruqIa98bMfXpblrkQEPwePFRjl5W.webp', '\"[]\"', '2024-12-28 05:15:47', '2025-01-03 00:30:42', '<p>Maksimal quvvat: 18 Vt</p><p>Tez zaryadlashni qo\'llab-quvvatlash: ha</p><p>Bir vaqtning o\'zida bir nechta qurilmalarni zaryadlash: ha</p><p>Ulagich turi: USB type-C/microUSB/USB type-A</p><p>BAtareya quvvati: 10000 мА/ч</p><p>Korpus materiali: metal Sunt amet, perspicia</p>', '<p>Maximum power: 18 W</p><p>Fast charging support: Yes</p><p>Support for charging multiple devices at once: Yes</p><p>Connector type: USB Type-C/microUSB/USB Type-A</p><p>Battery capacity: 10,000 mAh</p><p>Case material: Metal Sunt amet, perspicia.</p>', '<p>Максимальной мощностью: 18 Вт</p><p>Поддержка быстрой зарядки: Есть</p><p>Подержка зарядки сразу нескольких устройств: Есть</p><p>Вид разъема: USB type-C/microUSB/USB type-A</p><p>Емкость аккумулятора: 10000 мА/ч</p><p>Материал корпуса: металл Sunt amet, perspicia.</p>'),
(17, 7, 'maryam-ballard-17', 'Bevis Cannon', 'Karyn Thompson', 'Maryam Ballard', '<p>Iure aliquip aut vol.</p>', '<p>Nobis qui eligendi a.</p>', '<p>Voluptatum quasi qui.</p>', 'Sigourney Cotton', NULL, NULL, 'brown', NULL, NULL, '[]', '2025-01-30 00:44:54', '2025-01-30 00:44:54', '<p>Qui quo consectetur.</p>', '<p>Sit quo quia dolorum.</p>', '<p>Magnam ex cupidatat .</p>');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('I6dYk2Rgly4Dbcj77kdHwSe3VQUMGG0ZAevnoy7A', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibFBaVWd3TWFWczl4TE9EU3RGSTVQU3BpRE1YVm56V0w0MDdiUmZFdSI7czo2OiJsb2NhbGUiO3M6MjoicnUiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvNDA0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e2k6OTthOjc6e3M6MjoiaWQiO2k6OTtzOjQ6Im5hbWUiO3M6NjoiY2FtZXJhIjtzOjEwOiJ2YXJpYW50X2lkIjtpOjEyNDtzOjc6InN0b3JhZ2UiO3M6MToiMSI7czo1OiJwcmljZSI7czo2OiIxMjUwMDAiO3M6NToiaW1hZ2UiO3M6NTM6InByb2R1Y3RzL1RzVGZhb3lXMEFvMVI4TFhMYU1kVE54cElQRFEyV1FLdmh1bGs3N3kuanBnIjtzOjg6InF1YW50aXR5IjtpOjE7fX1zOjk6ImZhdm9yaXRlcyI7YToyOntpOjA7czoyOiIxMiI7aToxO3M6MjoiMTAiO319', 1738305464);

-- --------------------------------------------------------

--
-- Table structure for table `static_keywords`
--

CREATE TABLE `static_keywords` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ru` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uz` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_keywords`
--

INSERT INTO `static_keywords` (`id`, `key`, `en`, `ru`, `uz`, `created_at`, `updated_at`) VALUES
(2, 'work_time', '10:00 - 20:00', '10:00 - 20:00', '10:00 - 20:00', '2024-12-27 01:49:20', '2024-12-27 04:24:53'),
(3, 'video_reviews', 'https://www.youtube.com/embed/kyGDngkTCXQ', 'https://www.youtube.com/embed/kyGDngkTCXQ', 'https://www.youtube.com/embed/kyGDngkTCXQ', '2024-12-27 04:36:51', '2024-12-27 04:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `address_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_uz` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `address_uz`, `address_ru`, `address_en`, `title_uz`, `title_ru`, `title_en`, `phone_1`, `phone_2`, `email`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Tashkent', 'Ташкент', 'Tashkent', 'Tashkent', 'Ташкент', 'Tashkent', '8910739373', '8910739373', 'admin@gmail.com', '71.2820000', '69.2198000', '2024-12-24 05:52:12', '2025-01-02 02:21:55'),
(2, 'Tashkent', 'Tashkent', 'Tashkent', 'Tashkent', 'Ташкент', 'Tashkent', '8910739373', '8910739373', 'info@dora.uz', '41.2820000', '69.2192000', '2024-12-24 05:59:49', '2024-12-25 06:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `status`, `last_login`, `region`, `remember_token`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'DORA', 'info@dora.uz', NULL, '$2y$12$ykksezwE23Pvy3xzKimkreY.Y9SCsKZJMTviubePi2JP.vGPa0k2O', 2, '+998945135324', 1, '2024-12-23 07:17:35', 'Tashkent', NULL, NULL, '2024-12-23 07:17:35', '2024-12-23 07:17:35'),
(2, 'Usmonov Ismoil', 'ismoil_007u@gmail.com', NULL, '$2y$12$AIjNgQKJsvWSq/OQ.H6Jlebq9uy4jXkieUdZw3v6P1yfDI/ajctOC', 2, '+998919579717', 1, '2024-12-23 07:17:35', 'Tashkent', NULL, NULL, '2024-12-23 07:17:35', '2024-12-23 07:17:35'),
(3, 'Admin', 'info@mi.com', NULL, '$2y$12$pW2ivROWf2QUnPd7ZcKv7.MMkpAVQH1jFj2XhZONkokCHzYpTYBAW', 1, '987654321', 1, '2024-12-23 07:17:35', 'Tashkent', NULL, NULL, '2024-12-23 07:17:35', '2024-12-23 07:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `id` bigint UNSIGNED NOT NULL,
  `name_uz` text COLLATE utf8mb4_unicode_ci,
  `name_ru` text COLLATE utf8mb4_unicode_ci,
  `name_en` text COLLATE utf8mb4_unicode_ci,
  `title_uz` text COLLATE utf8mb4_unicode_ci,
  `title_ru` text COLLATE utf8mb4_unicode_ci,
  `title_en` text COLLATE utf8mb4_unicode_ci,
  `content_uz` text COLLATE utf8mb4_unicode_ci,
  `content_ru` text COLLATE utf8mb4_unicode_ci,
  `content_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `date` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`id`, `name_uz`, `name_ru`, `name_en`, `title_uz`, `title_ru`, `title_en`, `content_uz`, `content_ru`, `content_en`, `image`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Addison Hicks', 'Hayley Bass', 'Myra Hanson', 'Ut accusamus aute ad', 'Officia facere quae', 'Exercitation dolor e', '<p>Eveniet, aut soluta .</p>', '<p>Voluptatibus rerum f.</p>', '<p>Duis incididunt nisi.</p>', 'vacancies/b1RLFaeGeUFKh13byud5BiCxCJfGKYMCNMwpr8ap.webp', '1985-06-29', 'active', '2024-12-28 07:49:20', '2024-12-28 07:49:20'),
(2, 'Cara Madden', 'Fitzgerald Rowe', 'Odysseus Martinez', 'Incididunt atque har', 'Officia cumque vel v', 'Aut voluptatem quis', '<p>Laudantium, culpa, d.</p>', '<p>Anim ab reprehenderi.</p>', '<p>Qui ut voluptate ips.</p>', 'vacancies/VJ46b2XHDOC2VbCdc0UHYj7fb0jZLRfpldjTtJPQ.webp', '2004-06-27', 'active', '2024-12-28 07:49:55', '2024-12-28 07:49:55'),
(3, 'Kareem Hall', 'Jescie Pratt', 'Michelle Jordan', 'Aut amet qui cum vi', 'Distinctio Et disti', 'Lorem eu labore quo', '<p>Architecto eaque dol.</p>', '<p>Est quo dolor porro .</p>', '<p>Qui veniam, irure au.</p>', 'vacancies/PNnbDr2IoywiD8sYHzYvfHRvxAT8Ie0xdQ53CYJm.webp', '1971-01-18', 'active', '2024-12-28 07:50:14', '2024-12-28 07:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `storage` text COLLATE utf8mb4_unicode_ci,
  `price` text COLLATE utf8mb4_unicode_ci,
  `discount_price` text COLLATE utf8mb4_unicode_ci,
  `price_3` text COLLATE utf8mb4_unicode_ci,
  `price_6` text COLLATE utf8mb4_unicode_ci,
  `price_12` text COLLATE utf8mb4_unicode_ci,
  `price_24` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `storage`, `price`, `discount_price`, `price_3`, `price_6`, `price_12`, `price_24`, `created_at`, `updated_at`) VALUES
(98, 5, '2/32GB', '5125630', NULL, NULL, NULL, NULL, NULL, '2024-12-28 05:20:56', '2024-12-28 05:20:56'),
(99, 4, '6/128GB', '4125000', NULL, '1375000', '687500', '343750', '171875', '2025-01-03 00:26:25', '2025-01-03 00:26:25'),
(100, 4, '6/128GB', '4125000', NULL, '1375000', '687500', '343750', '171875', '2025-01-03 00:26:25', '2025-01-03 00:26:25'),
(101, 6, '2/32GB', '5250000', NULL, '1750000', '875000', '437000', '218750', '2025-01-03 00:26:52', '2025-01-03 00:26:52'),
(103, 8, 'null', '4125000', NULL, '1750000', '875000', '437000', '218750', '2025-01-03 00:28:00', '2025-01-03 00:28:00'),
(107, 12, 'null', '4125000', NULL, '1375000', '687500', '343750', '171875', '2025-01-03 00:29:13', '2025-01-03 00:29:13'),
(109, 13, 'null', '4125000', NULL, '1750000', '687500', '343750', '171875', '2025-01-03 00:29:31', '2025-01-03 00:29:31'),
(111, 14, '6/128GB', '4125000', NULL, '1750000', '687500', '343750', '171875', '2025-01-03 00:29:50', '2025-01-03 00:29:50'),
(113, 16, '8/256GB', '4125000', NULL, '1750000', '687500', '343750', '171875', '2025-01-03 00:30:42', '2025-01-03 00:30:42'),
(115, 15, '6/128GB', '4125000', NULL, '1375000', '687500', '343750', '171875', '2025-01-03 05:53:13', '2025-01-03 05:53:13'),
(116, 1, '6/128GB', '375', '400', '302', '139', '910', '518', '2025-01-05 23:40:24', '2025-01-05 23:40:24'),
(117, 1, '12/512GB', '719', '838', '570', '996', '453', '903', '2025-01-05 23:40:24', '2025-01-05 23:40:24'),
(118, 1, '12/512GB', '281', '103', '248', '678', '971', '795', '2025-01-05 23:40:24', '2025-01-05 23:40:24'),
(119, 3, '4/64GB', '300000', NULL, '100000', '70000', '40000', '25000', '2025-01-05 23:40:42', '2025-01-05 23:40:42'),
(122, 11, 'null', '4125000', '125000', '1375000', '687500', '343750', '171875', '2025-01-06 03:24:15', '2025-01-06 03:24:15'),
(124, 9, '8/256GB', '4125000', '125000', '1375000', '687500', '343750', '171875', '2025-01-06 04:54:50', '2025-01-06 04:54:50'),
(125, 10, 'null', '4125000', '1500', '1375000', '687500', '343750', '171875', '2025-01-11 04:31:30', '2025-01-11 04:31:30'),
(127, 7, '4/64GB', '4125000', NULL, '1750000', '875000', '437000', '218750', '2025-01-13 00:22:00', '2025-01-13 00:22:00'),
(128, 17, '12/512GB', '667', '160', NULL, '184', '561', '585', '2025-01-30 00:44:54', '2025-01-30 00:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `candidants`
--
ALTER TABLE `candidants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidants_vacancy_id_foreign` (`vacancy_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `desc_images`
--
ALTER TABLE `desc_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desc_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_banners`
--
ALTER TABLE `main_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `static_keywords`
--
ALTER TABLE `static_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_user_id_foreign` (`user_id`),
  ADD KEY `testimonials_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`);

--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidants`
--
ALTER TABLE `candidants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `desc_images`
--
ALTER TABLE `desc_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_banners`
--
ALTER TABLE `main_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `static_keywords`
--
ALTER TABLE `static_keywords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidants`
--
ALTER TABLE `candidants`
  ADD CONSTRAINT `candidants_vacancy_id_foreign` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancies` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `desc_images`
--
ALTER TABLE `desc_images`
  ADD CONSTRAINT `desc_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
