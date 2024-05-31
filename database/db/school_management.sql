-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 mai 2024 à 16:32
-- Version du serveur : 8.2.0
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED DEFAULT NULL,
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classe_grade_id_foreign` (`grade_id`),
  KEY `classe_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`name`, `grade_id`, `teacher_id`, `id`, `created_at`, `updated_at`) VALUES
('7B1', 1, 1, 1, NULL, NULL),
('7B2', 1, 1, 2, '2024-05-21 14:09:16', '2024-05-23 11:00:23'),
('8B1', 2, 2, 3, '2024-05-23 10:36:38', '2024-05-23 10:36:38'),
('8B2', 1, 2, 4, '2024-05-23 11:00:33', '2024-05-23 11:00:33'),
('9B1', 3, 4, 5, '2024-05-24 18:02:48', '2024-05-24 18:02:48');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `classe_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grade_classe_id_foreign` (`classe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `name`, `created_at`, `updated_at`, `classe_id`) VALUES
(1, 'seven', NULL, '2024-05-23 10:36:05', 1),
(2, 'eight', '2024-05-23 10:36:21', '2024-05-23 10:36:52', 3),
(3, 'nine', '2024-05-24 18:02:37', '2024-05-24 18:02:37', 4);

-- --------------------------------------------------------

--
-- Structure de la table `homework`
--

DROP TABLE IF EXISTS `homework`;
CREATE TABLE IF NOT EXISTS `homework` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `homework`
--

INSERT INTO `homework` (`id`, `title`, `description`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 'homework', 'desc', '2024-05-30', '2024-05-23 09:09:37', '2024-05-23 09:09:37'),
(2, 'testtt', 'esfd', '2024-05-29', '2024-05-23 09:19:54', '2024-05-23 09:23:17');

-- --------------------------------------------------------

--
-- Structure de la table `homework_classe`
--

DROP TABLE IF EXISTS `homework_classe`;
CREATE TABLE IF NOT EXISTS `homework_classe` (
  `homework_id` bigint UNSIGNED NOT NULL,
  `classe_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`homework_id`,`classe_id`),
  KEY `homework_classe_classe_id_foreign` (`classe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `homework_classe`
--

INSERT INTO `homework_classe` (`homework_id`, `classe_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(3, 2, NULL, NULL),
(1, 2, NULL, NULL),
(4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 15),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(33, '2024_03_20_121809_create_student_parent_table', 13),
(34, '2024_03_25_230115_create_student_table', 14),
(6, '2024_04_18_160002_create_marks_table', 1),
(7, '2024_04_18_160015_create_teachersnotes_table', 1),
(32, '2024_04_18_160404_create_teacher_table', 12),
(9, '2024_04_18_161852_create_module_table', 1),
(10, '2024_04_18_161927_create_subject_table', 1),
(11, '2024_04_18_161952_create_grade_table', 1),
(12, '2024_04_18_162016_create_classe_table', 1),
(13, '2024_05_05_182452_remove_classe_id_from_grade', 1),
(14, '2024_05_05_200930_add_teachers_column_to_subject_table', 1),
(15, '2024_05_13_151436_add_teacher_id_to_classe_table', 1),
(16, '2024_05_13_155150_add_classe_id_to_grade_table', 1),
(17, '2024_05_13_162721_add_subject_id_to_module_table', 1),
(24, '2024_05_16_121520_create_homework_table', 5),
(19, '2024_05_20_154907_create_homework_classe_table', 1),
(20, '2024_05_20_173851_remove_classe_id_from_homework_table', 2),
(22, '2024_05_20_224212_add_status_to_teacher_table', 4),
(25, '2024_05_24_192907_add_deleted_at_to_teachers_table', 6),
(26, '2024_05_24_193700_add_deleted_at_to_student_table', 7),
(27, '2024_05_24_193749_add_deleted_at_to_student_parent_table', 7),
(31, '2024_05_28_143452_create_admins_table', 11);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coefficient` double(8,2) NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `module_grade_id_foreign` (`grade_id`),
  KEY `module_subject_id_foreign` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `name`, `coefficient`, `grade_id`, `created_at`, `updated_at`, `subject_id`) VALUES
(1, 'mathematique', 4.00, 1, NULL, '2024-05-23 09:41:56', 1),
(2, 'scientifique', 3.00, 1, '2024-05-23 09:42:20', '2024-05-23 09:42:20', 1),
(3, 'litéraire', 2.00, 2, '2024-05-24 18:01:54', '2024-05-24 18:02:24', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_phone` int DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_parent_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_student_parent_id_foreign` (`student_parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `student_parent`
--

DROP TABLE IF EXISTS `student_parent`;
CREATE TABLE IF NOT EXISTS `student_parent` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_phone` int DEFAULT NULL,
  `parent_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` int DEFAULT NULL,
  `mother_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_parent_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_module_id_foreign` (`module_id`),
  KEY `subject_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id`, `name`, `module_id`, `created_at`, `updated_at`, `teacher_id`) VALUES
(1, 'analyse', 1, NULL, '2024-05-23 10:05:31', 1),
(2, 'physique', 2, '2024-05-23 09:42:44', '2024-05-23 09:42:44', 2),
(3, 'sciences naturelles', 2, '2024-05-23 10:05:50', '2024-05-23 10:05:50', 3),
(4, 'arabe', 3, '2024-05-24 18:02:05', '2024-05-24 18:02:05', 2);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_birthdate` date NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `classe_id` bigint UNSIGNED NOT NULL,
  `teacher_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_user_id_foreign` (`user_id`),
  KEY `teacher_subject_id_foreign` (`subject_id`),
  KEY `teacher_classe_id_foreign` (`classe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teachersnotes`
--

DROP TABLE IF EXISTS `teachersnotes`;
CREATE TABLE IF NOT EXISTS `teachersnotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('teacher','parent','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parent',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', NULL, '$2y$10$g2RffebYki8yHoKPyXlsIu3MpgV9TatCuStQE7wnkH3oVAFbP80xu', 'admin', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
