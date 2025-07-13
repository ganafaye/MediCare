-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 juil. 2025 à 11:00
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medicare`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `niveau_acces` varchar(255) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `prenom`, `email`, `password`, `remember_token`, `telephone`, `niveau_acces`, `created_at`, `updated_at`) VALUES
(1, '', 'Admin', 'admin@medicare.com', '$2y$12$205A3ZBEjiryi87XO2QHKOx.7KESEs8P4M/Ww/kZGW0cEYq2Gd782', 'XetZwzFVhCXbnOkeF5ZpfFk9aQPT3JlR9eIa1gJMjuyBDBmk3227vuGfu0OL', '775960169', 'superadmin', '2025-06-11 19:02:32', '2025-07-03 23:57:43');

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED NOT NULL,
  `date_consultation` date NOT NULL,
  `heure_consultation` time NOT NULL,
  `motif` text DEFAULT NULL,
  `diagnostic` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `poids` decimal(5,2) DEFAULT NULL,
  `tension` decimal(5,2) DEFAULT NULL,
  `nombre_grossesses` int(11) DEFAULT NULL,
  `antecedents` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `consultations`
--

INSERT INTO `consultations` (`id`, `medecin_id`, `patiente_id`, `date_consultation`, `heure_consultation`, `motif`, `diagnostic`, `prescription`, `poids`, `tension`, `nombre_grossesses`, `antecedents`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 8, 10, '2025-06-17', '13:10:00', 'consultation prenatale', 'douleurs', 'paracetamole', 12.00, 12.00, 2, '0', '2025-06-17 13:11:28', '2025-06-17 13:11:28', NULL),
(5, 8, 10, '2025-06-17', '14:45:00', 'douleurs au ventre', 'diarré', 'hubuprofene', 12.00, 12.00, 2, '0', '2025-06-17 13:41:30', '2025-06-17 15:23:26', NULL),
(6, 8, 10, '2025-06-17', '17:45:00', 'teste', 'teste', 'teste', 12.00, 12.00, 1, 'non', '2025-06-17 15:45:58', '2025-06-17 15:46:19', '2025-06-17 15:46:19'),
(7, 8, 27, '2025-07-04', '00:58:00', 'Consultation normale', 'fatiguement', 'Arcalion 200 mg comprimé Posologie d\'Arcalion 200 mg Ce médicament contre la fatigue passagère est réservé à l\'adulte (à partir de 18 ans). La dose quotidienne recommandée est de 2 à 3 comprimés répartis sur les prises du matin et du midi. Le traitement par Arcalion est limité à 4 semaines.', 60.00, 12.40, 0, 'Grippe', '2025-07-04 01:00:37', '2025-07-04 01:00:37', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dossiers_medicaux`
--

CREATE TABLE `dossiers_medicaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED NOT NULL,
  `diagnostic` text NOT NULL,
  `traitement` text DEFAULT NULL,
  `observations` text DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`documents`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grossesse` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `dossiers_medicaux`
--

INSERT INTO `dossiers_medicaux` (`id`, `patiente_id`, `medecin_id`, `diagnostic`, `traitement`, `observations`, `documents`, `created_at`, `updated_at`, `grossesse`) VALUES
(1, 10, 8, 'Fatigue', 'Fer+Vitamine', 'Repos 10 jour', NULL, '2025-06-16 18:16:49', '2025-07-03 01:35:32', 0),
(3, 3, 10, 'ashme', 'Fer+Vitamine', 'surveiller pendant 10 jours', NULL, '2025-07-03 01:33:09', '2025-07-03 01:33:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `echographies`
--

CREATE TABLE `echographies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grossesse_id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `date_examen` date DEFAULT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `observations` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `echographies`
--

INSERT INTO `echographies` (`id`, `grossesse_id`, `titre`, `date_examen`, `fichier`, `observations`, `created_at`, `updated_at`) VALUES
(2, 4, 'Echo 1ere semestre', '2025-07-01', 'echographies/NHOCwzCU0NR4k74s8oxjz2eWan5JEB6puqyC0LQx.jpg', NULL, '2025-07-02 00:43:02', '2025-07-02 00:43:02'),
(3, 4, '2eme echo', '2025-07-02', 'echographies/ytGrUBVv0ydSBAqDCjTGtbwie8td0TkFIfLF5Mis.jpg', NULL, '2025-07-02 14:06:42', '2025-07-02 14:06:42');

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rendezvous_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patiente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `medecin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `montant` decimal(10,2) NOT NULL,
  `type_facture` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'En attente',
  `methode_paiement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `rendezvous_id`, `patiente_id`, `medecin_id`, `montant`, `type_facture`, `statut`, `methode_paiement`, `created_at`, `updated_at`) VALUES
(3, NULL, 10, NULL, 12000.00, 'Consultation', 'Payée', NULL, '2025-06-17 21:27:52', '2025-06-17 21:27:52'),
(4, NULL, 8, NULL, 20000.00, 'Consultation', 'Payée', NULL, '2025-06-18 09:32:31', '2025-06-18 09:32:31'),
(5, NULL, 10, NULL, 50000.00, 'Échographie', 'Payée', NULL, '2025-07-02 19:28:15', '2025-07-02 19:28:15'),
(6, NULL, 27, NULL, 25000.00, 'Consultation', 'Payée', NULL, '2025-07-03 18:35:56', '2025-07-03 18:35:56');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `grossesses`
--

CREATE TABLE `grossesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_terme` date DEFAULT NULL,
  `nombre_bebes` int(11) NOT NULL DEFAULT 1,
  `notes_initiales` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grossesses`
--

INSERT INTO `grossesses` (`id`, `patiente_id`, `medecin_id`, `date_debut`, `date_terme`, `nombre_bebes`, `notes_initiales`, `created_at`, `updated_at`) VALUES
(4, 10, NULL, '2025-01-01', '2025-12-01', 1, 'en cours', '2025-07-01 13:52:32', '2025-07-02 13:39:05');

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE `medecins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `specialite` varchar(255) NOT NULL,
  `numero_professionnel` varchar(255) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `medecins`
--

INSERT INTO `medecins` (`id`, `admin_id`, `nom`, `prenom`, `email`, `password`, `remember_token`, `telephone`, `specialite`, `numero_professionnel`, `experience`, `created_at`, `updated_at`) VALUES
(8, NULL, 'Faye', 'Gana', 'ganafaye88@gmail.com', '$2y$12$ZvJsjtakPPugLnH2cz9uZ.kxRn/1HMgQ5bXKpzOBIfxNfStxyl2Lm', 'jUv9B7G1kD8p9LBblGSSUlHUclrVqwIr51LWiPvGtB2TEFGIkz63zjnyeutr', '770000001', 'Obstétricien', '123456', NULL, '2025-06-11 17:42:37', '2025-07-04 10:37:37'),
(10, NULL, 'tall', 'khar', 'khartall@gmail.com', '$2y$12$3BOepwCAukHGB2AmzNcTz.ZBE7eb0ITo08iMxQJNbAPtVl0CM4fHK', 'yOohwDEptS86S8YwFGK9yaxmjbmwqgwxpHT9wiTXWRuufo3AeUrukbXTSNT8', '770000000', 'gynéco', NULL, NULL, '2025-06-12 10:54:17', '2025-06-12 10:54:17');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `temoignage` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `nom`, `email`, `message`, `created_at`, `updated_at`, `temoignage`) VALUES
(3, 'Gana Faye', 'ganafaye88@gmail.com', 'Merci MediCare pour votre professionnalisme !\"', '2025-07-04 23:23:20', '2025-07-04 23:23:20', 0),
(4, 'khartall', 'khartall13@gmail.com', 'J\'ai été très bien suivie tout au long de ma grossesse\r\nMerci MediCare pour votre professionnalisme !\"', '2025-07-04 23:24:48', '2025-07-04 23:24:48', 0),
(7, 'fatou faye', 'fatoufaye@gmail.com', 'Merci MediCare pour votre professionnalisme !\"', '2025-07-05 01:08:34', '2025-07-05 09:19:17', 1);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_04_133947_create_administrateurs_table', 1),
(6, '2025_06_04_133947_create_medecins_table', 1),
(7, '2025_06_04_133947_create_secretaires_table', 1),
(8, '2025_06_04_133953_create_patientes_table', 1),
(9, '2025_06_14_095925_create_rendezvous_table', 2),
(10, '2025_06_16_104314_create_notifications_table', 3),
(11, '2025_06_16_161859_create_dossiers_medicaux_table', 4),
(12, '2025_06_16_215039_create_ordonnances_table', 5),
(13, '2025_06_17_102301_create_consultations_table', 6),
(14, '2025_06_29_120404_create_grossesses_table', 7),
(15, '2025_06_29_120405_create_suivis_grossesse_table', 8),
(16, '2025_06_29_120406_create_echographies_table', 9),
(17, '2025_07_04_222644_create_messages_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `medecin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `secretaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ordonnances`
--

CREATE TABLE `ordonnances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED NOT NULL,
  `contenu` text NOT NULL,
  `date_prescription` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ordonnances`
--

INSERT INTO `ordonnances` (`id`, `medecin_id`, `patiente_id`, `contenu`, `date_prescription`, `created_at`, `updated_at`) VALUES
(1, 8, 10, 'amoxiline', '2025-06-16', '2025-06-16 22:38:34', '2025-06-16 22:45:17'),
(2, 8, 10, 'paracétamol  2/jour (1 matin , 1 soir )  \r\naspirine  2/jour (1 matin , 1 soir )', '2025-06-17', '2025-06-17 13:57:31', '2025-06-17 13:57:31'),
(5, 8, 27, 'Arcalion 200 mg comprimé\r\n Posologie d\'Arcalion 200 mg\r\nCe médicament contre la fatigue passagère est réservé à l\'adulte (à partir de 18 ans). La dose quotidienne recommandée est de 2 à 3 comprimés répartis sur les prises du matin et du midi.\r\nLe traitement par Arcalion est limité à 4 semaines.', '2025-07-03', '2025-07-03 21:12:56', '2025-07-03 21:12:56'),
(6, 8, 27, 'paracétamol 2/jour (1 matin , 1 soir ) aspirine 2/jour (1 matin , 1 soir )', '2025-07-04', '2025-07-04 01:14:44', '2025-07-04 01:14:44'),
(7, 8, 27, 'paracétamol 2/jour (1 matin , 1 soir ) aspirine 2/jour (1 matin , 1 soir )', '2025-07-04', '2025-07-04 01:16:12', '2025-07-04 01:16:12'),
(8, 8, 27, 'paracétamol 2/jour (1 matin , 1 soir ) aspirine 2/jour (1 matin , 1 soir )', '2025-07-04', '2025-07-04 01:18:43', '2025-07-04 01:18:43'),
(9, 8, 27, 'paracétamol 2/jour (1 matin , 1 soir ) aspirine 2/jour (1 matin , 1 soir )', '2025-07-04', '2025-07-04 01:21:02', '2025-07-04 01:21:02');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patientes`
--

CREATE TABLE `patientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `groupe_sanguin` varchar(255) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `patientes`
--

INSERT INTO `patientes` (`id`, `medecin_id`, `admin_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `date_naissance`, `groupe_sanguin`, `adresse`, `profession`, `date_creation`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, 'sarr', 'aby', 'abysarr88@gmail.com', '$2y$12$GPEaRR8z8/T6jr7/ktnohuRmhoRjDqqqBpB66FJIv.MaZBQw4dCNO', '770000000', '1996-07-11', 'A+', NULL, 'etudiants', NULL, '2025-06-11 19:56:00', '2025-06-11 21:03:46'),
(10, NULL, NULL, 'tall', 'khar', 'khartall@gmail.com', '$2y$12$RBp/.jV9sE/XTPgKb35/8eMjc.xfTGxf7IdTLB0ng9tqsysPwqRPu', '770000000', '1980-03-12', 'A-', NULL, 'etudiants', NULL, '2025-06-12 18:58:00', '2025-06-12 18:58:00'),
(11, NULL, NULL, 'faye', 'fatou', 'fayegana88@gmail.com', '$2y$12$x4kzzKLJl5ecSTAjJ4F.q.LIUluvAFClB9FKFOjphjQkmnDqgC3Rq', '770000000', '2003-01-13', 'B-', NULL, 'etudiants', NULL, '2025-06-13 19:41:08', '2025-06-13 19:41:08'),
(14, NULL, NULL, 'faye', 'gana', 'patienteZ_1750195102@medicare.com', '$2y$12$xp6zaAKk5GZNpbNF1mspWulu.coSboFbJdgeC6eVn7QqiMI7Fz/s.', '777207531', '2025-07-03', 'B-', NULL, 'eleve', NULL, '2025-06-17 21:18:23', '2025-07-03 21:16:23'),
(27, NULL, NULL, 'Faye', 'Gana', 'ganafaye88@gmail.com', '$2y$12$jx8H1SPE4HMVqBWJy7457.Z7gb8vDMe7wVIIsER./3XQwTJhtTqYq', '775960169', '2012-01-03', 'O+', NULL, 'etudiants', NULL, '2025-07-03 18:11:55', '2025-07-03 18:11:55'),
(28, NULL, NULL, 'Khar2', 'Tall', 'khartall13@gmail.com', '$2y$12$s.q2UPx1DKNzHmPXIfJ.ze/BLsCRbEASC83dO8Y4TQw8vq6vpo8ua', '77 368 60 06', '2008-01-03', 'O+', NULL, 'etudiante', NULL, '2025-07-03 22:04:50', '2025-07-03 22:18:20'),
(30, NULL, NULL, 'mbissine', 'ndiaye', 'boundaw316@gmail.com', '$2y$12$nlfH1NYyJCVFya.KYCsoM.DZ/H/bBlp7rzmt1a3hW.7BdvXYd2tjC', '775960168', '2014-02-04', 'B-', NULL, 'eleve', NULL, '2025-07-04 18:42:36', '2025-07-04 18:42:36');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patiente_id` bigint(20) UNSIGNED NOT NULL,
  `medecin_id` bigint(20) UNSIGNED NOT NULL,
  `secretaire_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_heure` datetime NOT NULL,
  `statut` enum('en_attente','confirmé','annulé') NOT NULL DEFAULT 'en_attente',
  `motif` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `patiente_id`, `medecin_id`, `secretaire_id`, `admin_id`, `date_heure`, `statut`, `motif`, `created_at`, `updated_at`) VALUES
(2, 10, 8, NULL, NULL, '2025-07-06 20:41:00', 'confirmé', 'mots de tète', '2025-06-14 15:36:01', '2025-06-14 18:28:23'),
(10, 10, 10, NULL, NULL, '2025-06-16 13:00:00', 'annulé', 'douleurs au ventre', '2025-06-16 13:12:17', '2025-07-03 00:59:18'),
(11, 10, 10, NULL, NULL, '2025-06-16 13:00:00', 'annulé', 'douleurs au ventre', '2025-06-16 13:16:12', '2025-07-03 09:38:53'),
(15, 10, 8, NULL, NULL, '2025-06-18 18:00:00', 'annulé', 'mots de tête intense', '2025-06-18 17:00:14', '2025-06-18 17:00:58'),
(16, 10, 8, NULL, NULL, '2025-06-18 22:25:00', 'confirmé', 'fatiguement', '2025-06-18 17:22:03', '2025-07-01 11:55:45'),
(17, 10, 8, NULL, NULL, '2025-07-02 18:10:00', 'confirmé', 'douleurs au ventre', '2025-07-02 21:11:11', '2025-07-02 21:13:13'),
(19, 27, 8, NULL, NULL, '2025-07-03 20:05:00', 'confirmé', 'douleurs au ventre', '2025-07-03 20:05:56', '2025-07-03 20:06:16'),
(20, 27, 8, NULL, NULL, '2025-07-03 23:30:00', 'confirmé', 'douleurs au ventre 2b', '2025-07-03 20:27:02', '2025-07-03 21:02:32'),
(21, 27, 8, NULL, NULL, '2025-07-03 23:30:00', 'annulé', 'douleurs au ventre 2b', '2025-07-03 20:30:03', '2025-07-03 20:37:04'),
(23, 27, 10, NULL, NULL, '2025-07-03 20:37:00', 'annulé', 'douleurs au ventre teste', '2025-07-03 20:38:30', '2025-07-03 20:39:21'),
(24, 27, 10, NULL, NULL, '2025-07-03 20:45:00', 'annulé', 'douleurs au ventre teste2', '2025-07-03 20:45:39', '2025-07-03 20:47:48'),
(25, 27, 8, NULL, NULL, '2025-08-03 20:48:00', 'annulé', 'douleurs au ventre teste3', '2025-07-03 20:48:28', '2025-07-03 20:50:18'),
(28, 27, 8, NULL, NULL, '2025-07-04 10:38:00', 'annulé', 'douleurs au ventre', '2025-07-04 10:38:52', '2025-07-04 15:27:08'),
(29, 27, 8, NULL, NULL, '2025-07-04 10:38:00', 'annulé', 'douleurs au ventre', '2025-07-04 10:42:56', '2025-07-05 13:18:24'),
(30, 27, 8, NULL, NULL, '2025-07-04 10:38:00', 'en_attente', 'douleurs au ventre', '2025-07-04 10:44:19', '2025-07-04 10:44:19'),
(31, 27, 8, NULL, NULL, '2025-07-04 10:38:00', 'annulé', 'douleurs au ventre', '2025-07-04 10:48:47', '2025-07-04 15:12:22'),
(32, 27, 8, NULL, NULL, '2025-07-20 15:27:00', 'annulé', 'fatiguement', '2025-07-04 15:28:00', '2025-07-04 17:20:41'),
(33, 27, 8, NULL, NULL, '2025-07-20 15:27:00', 'en_attente', 'fatiguement', '2025-07-04 15:28:31', '2025-07-04 15:28:31'),
(34, 27, 8, NULL, NULL, '2025-07-20 15:27:00', 'en_attente', 'fatiguement', '2025-07-04 15:29:05', '2025-07-04 15:29:05'),
(35, 27, 8, NULL, NULL, '2025-07-04 15:48:00', 'annulé', 'fatiguement teste dup', '2025-07-04 15:48:42', '2025-07-04 16:29:54'),
(37, 27, 8, NULL, NULL, '2025-07-04 16:03:00', 'confirmé', 'fatiguement teste dup2', '2025-07-04 16:03:50', '2025-07-04 16:16:54'),
(38, 27, 8, NULL, NULL, '2025-07-04 16:30:00', 'confirmé', 'TESTE3', '2025-07-04 16:30:36', '2025-07-04 16:31:34'),
(39, 27, 10, NULL, NULL, '2025-07-04 16:52:00', 'en_attente', 'TESTE4', '2025-07-04 16:53:12', '2025-07-04 16:53:12'),
(40, 27, 8, NULL, NULL, '2025-07-04 17:00:00', 'annulé', 'TESTE5', '2025-07-04 16:59:38', '2025-07-04 17:51:25'),
(41, 27, 8, NULL, NULL, '2025-07-04 17:00:00', 'annulé', 'TESTE5', '2025-07-04 17:00:54', '2025-07-04 17:27:43'),
(42, 27, 8, NULL, NULL, '2025-07-04 18:30:00', 'confirmé', 'TESTE6', '2025-07-04 17:52:41', '2025-07-04 17:53:59'),
(44, 27, 10, NULL, NULL, '2025-07-05 12:15:00', 'annulé', 'TESTE7', '2025-07-04 18:15:38', '2025-07-05 11:01:22'),
(45, 27, 10, NULL, NULL, '2025-07-05 12:15:00', 'en_attente', 'TESTE7', '2025-07-04 18:17:14', '2025-07-04 18:17:14'),
(46, 27, 10, NULL, NULL, '2025-07-05 12:15:00', 'en_attente', 'TESTE7', '2025-07-04 18:19:46', '2025-07-04 18:19:46'),
(47, 30, 10, NULL, NULL, '2025-07-04 18:44:00', 'en_attente', 'TESTE reelle', '2025-07-04 18:44:48', '2025-07-04 18:44:48'),
(48, 27, 8, NULL, NULL, '2025-07-05 12:00:00', 'confirmé', 'teste duplication aujourd\'hui', '2025-07-05 11:02:55', '2025-07-05 11:03:53');

-- --------------------------------------------------------

--
-- Structure de la table `secretaires`
--

CREATE TABLE `secretaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `date_affectation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `secretaires`
--

INSERT INTO `secretaires` (`id`, `admin_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `date_affectation`, `created_at`, `updated_at`) VALUES
(2, NULL, 'faye', 'gana', 'fayegana@gmail.com', '$2y$12$tIDMmQpWrLXyubpB0i7X9ubkZkNJ//BdkFJ4v.hAqDEaFKt49mhQG', '777207531', NULL, '2025-06-13 00:30:38', '2025-06-13 00:30:38'),
(3, NULL, 'Tall', 'khar', 'khartall@gmail.com', '$2y$12$16siZHU5AP9s5tu8szH7DeOsBVuc/MU7LATBa3OLYpJ42RrMVL3Cu', '775960169', NULL, '2025-07-03 09:54:06', '2025-07-03 09:54:06');

-- --------------------------------------------------------

--
-- Structure de la table `suivis_grossesse`
--

CREATE TABLE `suivis_grossesse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grossesse_id` bigint(20) UNSIGNED NOT NULL,
  `date_visite` date NOT NULL,
  `poids` double(8,2) DEFAULT NULL,
  `tension` double(8,2) DEFAULT NULL,
  `age_gestationnel` int(11) DEFAULT NULL,
  `notes_medecin` text DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrateurs_email_unique` (`email`);

--
-- Index pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_medecin_id_foreign` (`medecin_id`),
  ADD KEY `consultations_patiente_id_foreign` (`patiente_id`);

--
-- Index pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dossiers_medicaux_patiente_id_foreign` (`patiente_id`),
  ADD KEY `dossiers_medicaux_medecin_id_foreign` (`medecin_id`);

--
-- Index pour la table `echographies`
--
ALTER TABLE `echographies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `echographies_grossesse_id_foreign` (`grossesse_id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `grossesses`
--
ALTER TABLE `grossesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grossesses_patiente_id_foreign` (`patiente_id`),
  ADD KEY `grossesses_medecin_id_foreign` (`medecin_id`);

--
-- Index pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medecins_email_unique` (`email`),
  ADD KEY `medecins_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_patiente_id_foreign` (`patiente_id`),
  ADD KEY `notifications_medecin_id_foreign` (`medecin_id`),
  ADD KEY `notifications_secretaire_id_foreign` (`secretaire_id`);

--
-- Index pour la table `ordonnances`
--
ALTER TABLE `ordonnances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordonnances_medecin_id_foreign` (`medecin_id`),
  ADD KEY `ordonnances_patiente_id_foreign` (`patiente_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `patientes`
--
ALTER TABLE `patientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patientes_email_unique` (`email`),
  ADD KEY `patientes_admin_id_foreign` (`admin_id`),
  ADD KEY `fk_medecin` (`medecin_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rendez_vous_patiente_id_foreign` (`patiente_id`),
  ADD KEY `rendez_vous_medecin_id_foreign` (`medecin_id`),
  ADD KEY `rendez_vous_secretaire_id_foreign` (`secretaire_id`),
  ADD KEY `rendez_vous_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `secretaires`
--
ALTER TABLE `secretaires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secretaires_email_unique` (`email`),
  ADD KEY `secretaires_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `suivis_grossesse`
--
ALTER TABLE `suivis_grossesse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suivis_grossesse_grossesse_id_foreign` (`grossesse_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `echographies`
--
ALTER TABLE `echographies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `grossesses`
--
ALTER TABLE `grossesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `medecins`
--
ALTER TABLE `medecins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ordonnances`
--
ALTER TABLE `ordonnances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `patientes`
--
ALTER TABLE `patientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `secretaires`
--
ALTER TABLE `secretaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `suivis_grossesse`
--
ALTER TABLE `suivis_grossesse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consultations_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  ADD CONSTRAINT `dossiers_medicaux_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dossiers_medicaux_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `echographies`
--
ALTER TABLE `echographies`
  ADD CONSTRAINT `echographies_grossesse_id_foreign` FOREIGN KEY (`grossesse_id`) REFERENCES `grossesses` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `grossesses`
--
ALTER TABLE `grossesses`
  ADD CONSTRAINT `grossesses_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `grossesses_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `medecins`
--
ALTER TABLE `medecins`
  ADD CONSTRAINT `medecins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `administrateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_secretaire_id_foreign` FOREIGN KEY (`secretaire_id`) REFERENCES `secretaires` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ordonnances`
--
ALTER TABLE `ordonnances`
  ADD CONSTRAINT `ordonnances_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ordonnances_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `patientes`
--
ALTER TABLE `patientes`
  ADD CONSTRAINT `fk_medecin` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patientes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `administrateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `administrateurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `rendez_vous_medecin_id_foreign` FOREIGN KEY (`medecin_id`) REFERENCES `medecins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rendez_vous_patiente_id_foreign` FOREIGN KEY (`patiente_id`) REFERENCES `patientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rendez_vous_secretaire_id_foreign` FOREIGN KEY (`secretaire_id`) REFERENCES `secretaires` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `secretaires`
--
ALTER TABLE `secretaires`
  ADD CONSTRAINT `secretaires_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `administrateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `suivis_grossesse`
--
ALTER TABLE `suivis_grossesse`
  ADD CONSTRAINT `suivis_grossesse_grossesse_id_foreign` FOREIGN KEY (`grossesse_id`) REFERENCES `grossesses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;