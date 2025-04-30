-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 30 avr. 2025 à 17:12
-- Version du serveur : 8.0.30
-- Version de PHP : 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sageconstruction`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:9:\"module_id\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:28:{i:0;a:5:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"creer-slide\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:17452543311;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:1;a:5:{s:1:\"a\";i:14;s:1:\"b\";s:10:\"voir-slide\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:17452543311;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:2;a:5:{s:1:\"a\";i:15;s:1:\"b\";s:14:\"modifier-slide\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:17452543311;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:3;a:5:{s:1:\"a\";i:16;s:1:\"b\";s:15:\"supprimer-slide\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:17452543311;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:4;a:5:{s:1:\"a\";i:17;s:1:\"b\";s:21:\"creer-tableau de bord\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:11736939261;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:5;a:5:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"voir-tableau de bord\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:11736939261;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:6;a:5:{s:1:\"a\";i:19;s:1:\"b\";s:24:\"modifier-tableau de bord\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:11736939261;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:7;a:5:{s:1:\"a\";i:20;s:1:\"b\";s:25:\"supprimer-tableau de bord\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:11736939261;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:8;a:5:{s:1:\"a\";i:21;s:1:\"b\";s:18:\"creer-presentation\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:21261895861;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:9;a:5:{s:1:\"a\";i:22;s:1:\"b\";s:17:\"voir-presentation\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:21261895861;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:10;a:5:{s:1:\"a\";i:23;s:1:\"b\";s:21:\"modifier-presentation\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:21261895861;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:11;a:5:{s:1:\"a\";i:24;s:1:\"b\";s:22:\"supprimer-presentation\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:21261895861;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:12;a:5:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"creer-service\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:6300954477;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:13;a:5:{s:1:\"a\";i:26;s:1:\"b\";s:12:\"voir-service\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:6300954477;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:14;a:5:{s:1:\"a\";i:27;s:1:\"b\";s:16:\"modifier-service\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:6300954477;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:15;a:5:{s:1:\"a\";i:28;s:1:\"b\";s:17:\"supprimer-service\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:6300954477;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:16;a:5:{s:1:\"a\";i:29;s:1:\"b\";s:15:\"creer-reference\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10940444331;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:17;a:5:{s:1:\"a\";i:30;s:1:\"b\";s:14:\"voir-reference\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10940444331;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:18;a:5:{s:1:\"a\";i:31;s:1:\"b\";s:18:\"modifier-reference\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10940444331;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:19;a:5:{s:1:\"a\";i:32;s:1:\"b\";s:19:\"supprimer-reference\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10940444331;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:20;a:5:{s:1:\"a\";i:33;s:1:\"b\";s:22:\"creer-mot du directeur\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10530732541;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:21;a:5:{s:1:\"a\";i:34;s:1:\"b\";s:21:\"voir-mot du directeur\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10530732541;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:22;a:5:{s:1:\"a\";i:35;s:1:\"b\";s:25:\"modifier-mot du directeur\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10530732541;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:23;a:5:{s:1:\"a\";i:36;s:1:\"b\";s:26:\"supprimer-mot du directeur\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:10530732541;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:24;a:5:{s:1:\"a\";i:37;s:1:\"b\";s:12:\"creer-equipe\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:12193994621;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:25;a:5:{s:1:\"a\";i:38;s:1:\"b\";s:11:\"voir-equipe\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:12193994621;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:26;a:5:{s:1:\"a\";i:39;s:1:\"b\";s:15:\"modifier-equipe\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:12193994621;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:27;a:5:{s:1:\"a\";i:40;s:1:\"b\";s:16:\"supprimer-equipe\";s:1:\"c\";s:3:\"web\";s:1:\"d\";i:12193994621;s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"developpeur\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"superadmin\";s:1:\"c\";s:3:\"web\";}}}', 1746117925);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` bigint UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `jobs`
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
-- Structure de la table `job_batches`
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
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\Slide', 5809813711, 'bc048777-9960-4244-99f2-2a3f3e746706', 'image', 'hero-carousel-1', 'hero-carousel-1.jpg', 'image/jpeg', 'public', 'public', 277154, '[]', '[]', '[]', '[]', 1, '2025-04-30 11:26:42', '2025-04-30 11:26:42'),
(4, 'App\\Models\\Service', 4562224781, '12b12897-c154-41da-8d5b-985d16a3f401', 'image', 'black-businessman-happy-expression-e1666775162776', 'black-businessman-happy-expression-e1666775162776.jpg', 'image/jpeg', 'public', 'public', 172906, '[]', '[]', '[]', '[]', 1, '2025-04-30 14:44:33', '2025-04-30 14:44:33'),
(5, 'App\\Models\\Service', 5008113102, 'c51cf870-a5a9-4a4a-b35d-6ab643e7ab69', 'image', 'photo-1429497419816-9ca5cfb4571a', 'photo-1429497419816-9ca5cfb4571a.jpg', 'image/jpeg', 'public', 'public', 970444, '[]', '[]', '[]', '[]', 1, '2025-04-30 15:18:26', '2025-04-30 15:18:26'),
(6, 'App\\Models\\Service', 7975081053, '92cff601-705d-4167-b090-bf80ce915bb5', 'image', 'renovation-energetique-batiment_y4sg2b', 'renovation-energetique-batiment_y4sg2b.jpg', 'image/jpeg', 'public', 'public', 234060, '[]', '[]', '[]', '[]', 1, '2025-04-30 15:21:01', '2025-04-30 15:21:01'),
(7, 'App\\Models\\Service', 13714024411, '7037065b-6953-4cad-9f62-c42b7b465397', 'image', 'non-a-linstallation-de-2-pylones-pour-antennes-de-relais-telephonique_1581970420_desktop', 'non-a-linstallation-de-2-pylones-pour-antennes-de-relais-telephonique_1581970420_desktop.jpg', 'image/jpeg', 'public', 'public', 46113, '[]', '[]', '[]', '[]', 1, '2025-04-30 15:26:16', '2025-04-30 15:26:16'),
(8, 'App\\Models\\Reference', 1, '4a4a20c6-f9f6-4380-837c-0873b1394aa6', 'image', 'CREA-04-e1676114375845', 'CREA-04-e1676114375845.png', 'image/png', 'public', 'public', 21253, '[]', '[]', '[]', '[]', 1, '2025-04-30 16:05:32', '2025-04-30 16:05:32'),
(9, 'App\\Models\\Reference', 2, '54cbc3bf-e8b1-4bc8-a152-f8502db52685', 'image', 'CREA-04-e1676114375845', 'CREA-04-e1676114375845.png', 'image/png', 'public', 'public', 21253, '[]', '[]', '[]', '[]', 1, '2025-04-30 16:05:54', '2025-04-30 16:05:54'),
(10, 'App\\Models\\Reference', 3, '657595f4-137f-43ab-a0f5-aa7fce117b13', 'image', 'CREA-04-e1676114375845', 'CREA-04-e1676114375845.png', 'image/png', 'public', 'public', 21253, '[]', '[]', '[]', '[]', 1, '2025-04-30 16:06:50', '2025-04-30 16:06:50'),
(11, 'App\\Models\\Presentation', 3989116161, 'b368a2c2-6449-4b3b-b71e-5acdcc56912a', 'image', 'black-businessman-happy-expression-e1666775162776', 'black-businessman-happy-expression-e1666775162776.jpg', 'image/jpeg', 'public', 'public', 172906, '[]', '[]', '[]', '[]', 1, '2025-04-30 16:17:27', '2025-04-30 16:17:27');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_14_114341_create_modules_table', 1),
(5, '2025_04_15_113500_create_media_table', 1),
(6, '2025_04_15_113620_create_permission_tables', 1),
(7, '2025_04_15_120105_create_parametres_table', 1),
(8, '2025_04_24_152619_create_slides_table', 1),
(9, '2025_04_24_152633_create_services_table', 1),
(10, '2025_04_24_152648_create_references_table', 1),
(11, '2025_04_24_152706_create_mot_directeurs_table', 1),
(12, '2025_04_28_104233_create_presentations_table', 1),
(13, '2025_04_30_163203_create_equipes_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 13029781151);

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6300954477, 'service', 'service', NULL, '2025-04-30 10:36:35', '2025-04-30 10:36:35'),
(10530732541, 'mot du directeur', 'mot-du-directeur', NULL, '2025-04-30 10:39:39', '2025-04-30 10:39:39'),
(10940444331, 'reference', 'reference', NULL, '2025-04-30 10:36:49', '2025-04-30 10:36:49'),
(11736939261, 'tableau de bord', 'tableau-de-bord', NULL, '2025-04-30 10:36:00', '2025-04-30 10:36:00'),
(12193994621, 'equipe', 'equipe', NULL, '2025-04-30 16:45:25', '2025-04-30 16:45:25'),
(17452543311, 'slide', 'slide', NULL, '2025-04-30 10:35:42', '2025-04-30 10:35:42'),
(21261895861, 'presentation', 'presentation', NULL, '2025-04-30 10:36:13', '2025-04-30 10:39:10');

-- --------------------------------------------------------

--
-- Structure de la table `mot_directeurs`
--

CREATE TABLE `mot_directeurs` (
  `id` bigint UNSIGNED NOT NULL,
  `nom_directeur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','desactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` bigint UNSIGNED NOT NULL,
  `lien_facebook` longtext COLLATE utf8mb4_unicode_ci,
  `lien_instagram` longtext COLLATE utf8mb4_unicode_ci,
  `lien_twitter` longtext COLLATE utf8mb4_unicode_ci,
  `lien_linkedin` longtext COLLATE utf8mb4_unicode_ci,
  `lien_tiktok` longtext COLLATE utf8mb4_unicode_ci,
  `nom_projet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_projet` longtext COLLATE utf8mb4_unicode_ci,
  `contact1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localisation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_maps` longtext COLLATE utf8mb4_unicode_ci,
  `siege_social` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_maintenance` enum('up','down') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'up',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `module_id`, `created_at`, `updated_at`) VALUES
(13, 'creer-slide', 'web', 17452543311, '2025-04-30 10:35:42', '2025-04-30 10:35:42'),
(14, 'voir-slide', 'web', 17452543311, '2025-04-30 10:35:43', '2025-04-30 10:35:43'),
(15, 'modifier-slide', 'web', 17452543311, '2025-04-30 10:35:43', '2025-04-30 10:35:43'),
(16, 'supprimer-slide', 'web', 17452543311, '2025-04-30 10:35:43', '2025-04-30 10:35:43'),
(17, 'creer-tableau de bord', 'web', 11736939261, '2025-04-30 10:36:00', '2025-04-30 10:36:00'),
(18, 'voir-tableau de bord', 'web', 11736939261, '2025-04-30 10:36:00', '2025-04-30 10:36:00'),
(19, 'modifier-tableau de bord', 'web', 11736939261, '2025-04-30 10:36:00', '2025-04-30 10:36:00'),
(20, 'supprimer-tableau de bord', 'web', 11736939261, '2025-04-30 10:36:00', '2025-04-30 10:36:00'),
(21, 'creer-presentation', 'web', 21261895861, '2025-04-30 10:36:13', '2025-04-30 10:39:10'),
(22, 'voir-presentation', 'web', 21261895861, '2025-04-30 10:36:13', '2025-04-30 10:39:10'),
(23, 'modifier-presentation', 'web', 21261895861, '2025-04-30 10:36:13', '2025-04-30 10:39:10'),
(24, 'supprimer-presentation', 'web', 21261895861, '2025-04-30 10:36:13', '2025-04-30 10:39:10'),
(25, 'creer-service', 'web', 6300954477, '2025-04-30 10:36:35', '2025-04-30 10:36:35'),
(26, 'voir-service', 'web', 6300954477, '2025-04-30 10:36:35', '2025-04-30 10:36:35'),
(27, 'modifier-service', 'web', 6300954477, '2025-04-30 10:36:35', '2025-04-30 10:36:35'),
(28, 'supprimer-service', 'web', 6300954477, '2025-04-30 10:36:35', '2025-04-30 10:36:35'),
(29, 'creer-reference', 'web', 10940444331, '2025-04-30 10:36:49', '2025-04-30 10:36:49'),
(30, 'voir-reference', 'web', 10940444331, '2025-04-30 10:36:49', '2025-04-30 10:36:49'),
(31, 'modifier-reference', 'web', 10940444331, '2025-04-30 10:36:49', '2025-04-30 10:36:49'),
(32, 'supprimer-reference', 'web', 10940444331, '2025-04-30 10:36:49', '2025-04-30 10:36:49'),
(33, 'creer-mot du directeur', 'web', 10530732541, '2025-04-30 10:39:39', '2025-04-30 10:39:39'),
(34, 'voir-mot du directeur', 'web', 10530732541, '2025-04-30 10:39:39', '2025-04-30 10:39:39'),
(35, 'modifier-mot du directeur', 'web', 10530732541, '2025-04-30 10:39:39', '2025-04-30 10:39:39'),
(36, 'supprimer-mot du directeur', 'web', 10530732541, '2025-04-30 10:39:39', '2025-04-30 10:39:39'),
(37, 'creer-equipe', 'web', 12193994621, '2025-04-30 16:45:25', '2025-04-30 16:45:25'),
(38, 'voir-equipe', 'web', 12193994621, '2025-04-30 16:45:25', '2025-04-30 16:45:25'),
(39, 'modifier-equipe', 'web', 12193994621, '2025-04-30 16:45:25', '2025-04-30 16:45:25'),
(40, 'supprimer-equipe', 'web', 12193994621, '2025-04-30 16:45:25', '2025-04-30 16:45:25');

-- --------------------------------------------------------

--
-- Structure de la table `presentations`
--

CREATE TABLE `presentations` (
  `id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','desactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presentations`
--

INSERT INTO `presentations` (`id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3989116161, '<div class=\"elementor-element elementor-element-5804ad92 exad-sticky-section-no exad-glass-effect-no elementor-widget elementor-widget-text-editor animated fadeInRight\" data-id=\"5804ad92\" data-element_type=\"widget\" data-settings=\"{&quot;_animation&quot;:&quot;fadeInRight&quot;}\" data-widget_type=\"text-editor.default\">\r\n<div class=\"elementor-widget-container\">\r\n<p>SCI SAGES est un promoteur et une agence immobili&egrave;re bas&eacute;e &agrave; Abidjan, en C&ocirc;te d&rsquo;Ivoire, pr&eacute;cis&eacute;ment dans la commune de Cocody. Il propose et vous conseille dans vos projets de construction, d&rsquo;achats, de ventes, de location d&rsquo;un appartement, d&rsquo;une maison, d&rsquo;un terrain, etc. &agrave; Abidjan.</p>\r\n<p>D&rsquo;;un bout &agrave; l&rsquo;autre du processus, SCI SAGES &eacute;tudie le march&eacute;, trouve un site qui correspond aux attentes, l&rsquo;acqui&egrave;re, obtient les autorisations et suit les travaux en ma&icirc;tre d&rsquo;&oelig;uvre afin de proposer &agrave; sa client&egrave;le en vente ou en location, des b&acirc;timents (villa, duplex, appartements etc.) &eacute;labor&eacute;s.</p>\r\n<p>En plus, SCI SAGES s&rsquo;occupe de transaction, de recherche de logement et de recrutement d&rsquo;un locataire pour un bailleur.</p>\r\n<p>Vous pouvez nous faire confiance pour la r&eacute;alisation de tous vos projets immobiliers, &agrave; Abidjan.</p>\r\n</div>\r\n</div>', 'active', '2025-04-30 16:17:27', '2025-04-30 16:17:27');

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

CREATE TABLE `references` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `lien` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','desactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `references`
--

INSERT INTO `references` (`id`, `titre`, `description`, `lien`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'active', '2025-04-30 16:05:32', '2025-04-30 16:05:32'),
(2, NULL, NULL, NULL, 'active', '2025-04-30 16:05:54', '2025-04-30 16:05:54'),
(3, NULL, NULL, NULL, 'active', '2025-04-30 16:06:50', '2025-04-30 16:06:50');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', 'web', '2025-04-22 08:40:37', '2025-04-22 08:57:57'),
(2, 'developpeur', 'web', '2025-04-22 08:40:46', '2025-04-22 08:40:46'),
(3, 'superadmin', 'web', '2025-04-23 08:47:08', '2025-04-23 08:47:08');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `lien` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','desactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `titre`, `description`, `lien`, `status`, `created_at`, `updated_at`) VALUES
(4562224781, 'Conception de plans et devis', '<p>Portez-vous un projet, contactez-nous pour la r&eacute;alisation de votre projet selon votre budget et en respectant vos id&eacute;es. Nos experts vous accompagnent pour &eacute;laborer des plans, maquette et devis satisfaisant pour vos ambitions.</p>', NULL, 'active', '2025-04-30 14:44:33', '2025-04-30 14:44:33'),
(5008113102, 'Travaux publics', '<div id=\"wpc_68123f1e4d719\" class=\"vc_row wpb_row vc_row-fluid  \">\r\n<div class=\"row_inner_wrapper  clearfix\" style=\"padding-top: 0px;\">\r\n<div class=\"row_inner container clearfix\">\r\n<div class=\"row_full_center_content clearfix\">\r\n<div class=\"wpb_column vc_column_container vc_col-sm-12\">\r\n<div class=\"vc_column-inner\">\r\n<div class=\"wpb_wrapper\">\r\n<div class=\"wpb_text_column wpb_content_element  vc_custom_1505733268353\">\r\n<div class=\"wpb_wrapper\">\r\n<p>Le secteur &eacute;conomique du b&acirc;timent et des travaux publics, ou BTP, regroupe toutes les activit&eacute;s de conception et de construction des b&acirc;timents, industriels ou non, et des infrastructures telles que les routes ou les canalisations.<strong>&nbsp;BETHEL CONSTRUCTION&nbsp;</strong>met &agrave; votre disposition des experts des travaux publics pour mener &agrave; bien tous vos projets de :</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, 'active', '2025-04-30 15:18:26', '2025-04-30 15:18:26'),
(7975081053, 'En savoir plus Construction et rénovation de bâtiment', '<div class=\"wpb_text_column wpb_content_element \">\r\n<div class=\"wpb_wrapper\">\r\n<p>Bethel Construction r&eacute;alise des travaux d&rsquo;installation et de mise en service des &eacute;quipements &eacute;lectriques dans des b&acirc;timents &agrave; usage domestique, tertiaire et industriel selon les r&egrave;gles de s&eacute;curit&eacute; :</p>\r\n<ul>\r\n<li>Pose de tube orange pour raccordement</li>\r\n<li>Alimentation principale</li>\r\n<li>Branchement CIE</li>\r\n<li>Raccordement &eacute;lectrique</li>\r\n<li>Mise &agrave; la terre et liaison &eacute;quipotentielle</li>\r\n<li>Tableaux de distribution</li>\r\n<li>Distribution secondaire</li>\r\n<li>C&acirc;blage &eacute;lectrique</li>\r\n<li>Points lumineux</li>\r\n<li>Eclairage ext&eacute;rieur</li>\r\n</ul>\r\n<p>Pour des travaux de d&eacute;pannage et de maintenance, fa&icirc;tes nous appel.</p>\r\n</div>\r\n</div>', NULL, 'active', '2025-04-30 15:21:01', '2025-04-30 15:21:01'),
(13714024411, 'Construction de sites GSM', '<p>Portez-vous un projet, contactez-nous pour la r&eacute;alisation de votre projet selon votre budget et en respectant vos id&eacute;es. Nos experts vous accompagnent pour &eacute;laborer des plans, maquette et devis satisfaisant pour vos ambitions.</p>', NULL, 'active', '2025-04-30 15:26:16', '2025-04-30 15:26:16');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
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
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lbOySEqcasjrbrPGLoIt4o0zLnQxyLFau5AvEMxi', 13029781151, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:137.0) Gecko/20100101 Firefox/137.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV2pGWGp0encwd0RSUE9vbDNXSkFYV1ZlOHViZUFzNDRPemZjZnRyaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzMDI5NzgxMTUxO3M6NToiYWxlcnQiO2E6MDp7fX0=', 1746032723);

-- --------------------------------------------------------

--
-- Structure de la table `slides`
--

CREATE TABLE `slides` (
  `id` bigint UNSIGNED NOT NULL,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','desactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slides`
--

INSERT INTO `slides` (`id`, `titre`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5809813711, 'Bienvenue chez SageConstruction', NULL, 'active', '2025-04-30 11:24:11', '2025-04-30 11:45:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13029781151, 'developpeur', '0142855584', 'developpeur@gmail.com', NULL, '$2y$12$no.XDNkLCKha/1ZSDv0bhu3pJScaf5m727/wLa1VQS/XRcAp7En8.', NULL, 'developpeur', NULL, '2025-04-22 11:16:21', '2025-04-22 18:00:33', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mot_directeurs`
--
ALTER TABLE `mot_directeurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Index pour la table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5896842612;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55056804311;

--
-- AUTO_INCREMENT pour la table `mot_directeurs`
--
ALTER TABLE `mot_directeurs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3989116162;

--
-- AUTO_INCREMENT pour la table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13714024412;

--
-- AUTO_INCREMENT pour la table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11989558342;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13029781152;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
