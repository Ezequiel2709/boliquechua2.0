-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2026 at 07:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boliviaquechua`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(10) NOT NULL,
  `color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `icono`, `color`) VALUES
(1, 'Animales', '🐾', '#FF6B35'),
(2, 'Saludos', '👋', '#4ECDC4'),
(3, 'Colores', '🎨', '#FFD93D'),
(4, 'Cuerpo', '🧍', '#6C5CE7'),
(5, 'Emociones', '💖', '#FF6B6B'),
(6, 'Profesiones', '👨‍🏫', '#A8E6CF');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_26_083850_create_categorias_table', 1),
(5, '2026_04_26_083906_create_submenus_table', 1),
(6, '2026_04_26_083922_create_palabras_table', 1),
(7, '2026_04_26_083939_create_progresos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `palabras`
--

CREATE TABLE `palabras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `espanol` varchar(100) NOT NULL,
  `quechua` varchar(100) NOT NULL,
  `pronunciacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `palabras`
--

INSERT INTO `palabras` (`id`, `categoria_id`, `espanol`, `quechua`, `pronunciacion`) VALUES
(1, 1, 'Perro', 'Allqu', 'Áll-jo'),
(2, 1, 'Gato', 'Misi', 'Mí-si'),
(3, 1, 'Pájaro', 'Pisqu', 'Pís-jo'),
(4, 1, 'Pez', 'Challwa', 'Cháll-wa'),
(5, 1, 'Llama', 'Llama', 'Llám-ma'),
(6, 1, 'Cóndor', 'Kuntur', 'Kún-tur'),
(7, 2, 'Hola', 'Rimaykullayki', 'Ri-mai-kull-ái-ki'),
(8, 2, 'Buenos días', 'Allin p\'unchay', 'Áll-in pún-chai'),
(9, 2, 'Gracias', 'Sulpayki', 'Sul-pái-ki'),
(10, 2, 'Buenas noches', 'Allin tuta', 'Áll-in tú-ta'),
(11, 2, '¿Cómo estás?', 'Imaynallam kashanki?', 'I-mai-náll-am'),
(12, 2, 'Bien', 'Allillanmi', 'A-lli-llán-mi'),
(13, 3, 'Rojo', 'Puka', 'Pú-ka'),
(14, 3, 'Azul', 'Anqas', 'Án-jas'),
(15, 3, 'Verde', 'Q\'umir', 'Jó-mir'),
(16, 3, 'Amarillo', 'Q\'illu', 'Jíl-lu'),
(17, 3, 'Blanco', 'Yuraq', 'Yú-raj'),
(18, 3, 'Negro', 'Yana', 'Yá-na'),
(19, 4, 'Cabeza', 'Uma', 'Ú-ma'),
(20, 4, 'Ojo', 'Ñawi', 'Ñá-wi'),
(21, 4, 'Mano', 'Maki', 'Má-ki'),
(23, 4, 'Corazón', 'Sunqu', 'Sún-jo'),
(24, 4, 'Boca', 'Simi', 'Sí-mi'),
(25, 5, 'Feliz', 'Kusisqa', 'Ku-sís-ja'),
(26, 5, 'Triste', 'Llakisqa', 'Lla-kís-ja'),
(27, 5, 'Enojado', 'Phiñasqa', 'Pi-ñás-ja'),
(28, 5, 'Asustado', 'Mancharisqa', 'Man-cha-rís-ja'),
(29, 5, 'Amor', 'Munay', 'Mu-nái'),
(30, 5, 'Alegría', 'Kusikuy', 'Ku-si-kúi'),
(31, 6, 'Profesor', 'Yachachiq', 'Ya-cha-chíj'),
(32, 6, 'Médico', 'Hampiq', 'Jam-píj'),
(33, 6, 'Agricultor', 'Chakraruna', 'Chak-ra-rú-na'),
(34, 6, 'Tejedor', 'Awaq', 'Á-waj'),
(35, 6, 'Músico', 'Takiq', 'Ta-kíj'),
(36, 6, 'Cocinero', 'Wayk\'uq', 'Wai-kúj'),
(37, 1, 'Perro', 'Allqu', 'Áll-jo'),
(38, 1, 'Gato', 'Misi', 'Mí-si'),
(39, 1, 'Pájaro', 'Pisqu', 'Pís-jo'),
(40, 1, 'Pez', 'Challwa', 'Cháll-wa'),
(41, 1, 'Llama', 'Llama', 'Llám-ma'),
(42, 1, 'Cóndor', 'Kuntur', 'Kún-tur'),
(43, 1, 'Vaca', 'Waka', 'Wá-ka'),
(44, 1, 'Caballo', 'Kawallu', 'Ka-wáll-lu'),
(45, 1, 'Oveja', 'Uwija', 'U-wí-ja'),
(46, 1, 'Cerdo', 'Khuchi', 'Khú-chi'),
(47, 1, 'Gallina', 'Wallpa', 'Wáll-pa'),
(48, 1, 'Pato', 'Patu', 'Pá-tu'),
(50, 1, 'Zorro', 'Atuq', 'Á-toj'),
(52, 1, 'Serpiente', 'Amaru', 'A-má-ru'),
(53, 1, 'Mariposa', 'Pillpintu', 'Pill-pín-tu'),
(54, 1, 'Abeja', 'Misk\'i sunqu', 'Mís-ki sún-jo'),
(55, 1, 'Puma', 'Puma', 'Pú-ma'),
(56, 1, 'Vizcacha', 'Wisk\'acha', 'Wís-ka-cha'),
(57, 2, 'Hola', 'Rimaykullayki', 'Ri-mai-kull-ái-ki'),
(58, 2, 'Buenos días', 'Allin p\'unchay', 'Áll-in pún-chai'),
(59, 2, 'Gracias', 'Sulpayki', 'Sul-pái-ki'),
(60, 2, 'Buenas noches', 'Allin tuta', 'Áll-in tú-ta'),
(61, 2, '¿Cómo estás?', 'Imaynallam kashanki?', 'I-mai-náll-am'),
(62, 2, 'Bien', 'Allillanmi', 'A-lli-llán-mi'),
(63, 2, 'Adiós', 'Tupananchiskama', 'Tu-pa-nan-chis-ká-ma'),
(64, 2, 'Por favor', 'Ama hina kaspa', 'A-ma hí-na kás-pa'),
(65, 2, 'De nada', 'Manan imapas', 'Má-nan í-ma-pas'),
(66, 2, 'Bienvenido', 'Allin hamunayki', 'Áll-in ha-mu-nái-ki'),
(67, 2, 'Buenas tardes', 'Allin ch\'isi', 'Áll-in chí-si'),
(68, 2, '¿Cómo te llamas?', 'Imataq sutiyki?', 'Í-ma-taj su-tíi-ki'),
(69, 2, 'Me llamo', 'Sutiymi', 'Su-tíi-mi'),
(70, 2, '¿De dónde eres?', 'Maymantataq kanki?', 'Mai-man-tá-taj kán-ki'),
(71, 2, 'Hasta luego', 'Qayna ratokamachu', 'Qái-na rá-to-ka-ma-chu'),
(72, 2, 'Perdón', 'Pampachaway', 'Pam-pa-chá-wai'),
(73, 2, 'Sí', 'Arí', 'A-rí'),
(74, 2, 'No', 'Manan', 'Má-nan'),
(75, 2, '¿Qué tal?', 'Imaynallan?', 'I-mai-náll-an'),
(76, 2, 'Con permiso', 'Pampachaway purisaq', 'Pam-pa-chá-wai pu-rí-saj'),
(77, 3, 'Rojo', 'Puka', 'Pú-ka'),
(78, 3, 'Azul', 'Anqas', 'Án-jas'),
(79, 3, 'Verde', 'Q\'umir', 'Jó-mir'),
(80, 3, 'Amarillo', 'Q\'illu', 'Jíll-lu'),
(81, 3, 'Blanco', 'Yuraq', 'Yú-raj'),
(82, 3, 'Negro', 'Yana', 'Yá-na'),
(83, 3, 'Naranja', 'Killmu', 'Kíll-mu'),
(84, 3, 'Morado', 'Kulli', 'Kúll-li'),
(85, 3, 'Rosado', 'Wayra puka', 'Wái-ra pú-ka'),
(86, 3, 'Celeste', 'Anqas yuraq', 'Án-jas yú-raj'),
(87, 3, 'Marrón', 'Ch\'umpi', 'Chúm-pi'),
(88, 3, 'Gris', 'Oqe', 'Ó-je'),
(89, 3, 'Dorado', 'Qori', 'Jó-ri'),
(90, 3, 'Plateado', 'Qolqe', 'Jól-je'),
(91, 3, 'Turquesa', 'Anqas q\'umir', 'Án-jas jó-mir'),
(92, 3, 'Beige', 'Yuraq ch\'umpi', 'Yú-raj chúm-pi'),
(94, 3, 'Brillante', 'Ch\'aska', 'Chás-ka'),
(95, 3, 'Oscuro', 'Laqha', 'Láj-ha'),
(97, 4, 'Cabeza', 'Uma', 'Ú-ma'),
(98, 4, 'Ojo', 'Ñawi', 'Ñá-wi'),
(99, 4, 'Mano', 'Maki', 'Má-ki'),
(101, 4, 'Corazón', 'Sunqu', 'Sún-jo'),
(102, 4, 'Boca', 'Simi', 'Sí-mi'),
(103, 4, 'Nariz', 'Senqa', 'Sén-ja'),
(104, 4, 'Oreja', 'Rinri', 'Rín-ri'),
(105, 4, 'Diente', 'Kiru', 'Kí-ru'),
(106, 4, 'Lengua', 'Qallu', 'Jáll-lu'),
(107, 4, 'Cuello', 'Kunka', 'Kún-ka'),
(108, 4, 'Hombro', 'Qaqa', 'Já-ja'),
(111, 4, 'Rodilla', 'Qunqur', 'Jún-jur'),
(112, 4, 'Espalda', 'Wasa', 'Wá-sa'),
(113, 4, 'Pecho', 'Ranra', 'Rán-ra'),
(114, 4, 'Estómago', 'Wijsa', 'Wíj-sa'),
(116, 4, 'Cabello', 'Chukcha', 'Chúk-cha'),
(117, 5, 'Feliz', 'Kusisqa', 'Ku-sís-ja'),
(118, 5, 'Triste', 'Llakisqa', 'Lla-kís-ja'),
(119, 5, 'Enojado', 'Phiñasqa', 'Pi-ñás-ja'),
(120, 5, 'Asustado', 'Mancharisqa', 'Man-cha-rís-ja'),
(121, 5, 'Amor', 'Munay', 'Mu-nái'),
(122, 5, 'Alegría', 'Kusikuy', 'Ku-si-kúi'),
(123, 5, 'Miedo', 'Manchay', 'Mán-chai'),
(124, 5, 'Sorpresa', 'Intipacha', 'In-ti-pá-cha'),
(125, 5, 'Vergüenza', 'P\'enqay', 'Pén-jai'),
(126, 5, 'Esperanza', 'Suyay', 'Su-yái'),
(127, 5, 'Celos', 'Qicha sunqu', 'Jí-cha sún-jo'),
(128, 5, 'Orgullo', 'Hatun sunqu', 'Há-tun sún-jo'),
(129, 5, 'Paz', 'Sumaq kawsay', 'Sú-maj kaw-sái'),
(130, 5, 'Asco', 'Millay', 'Míll-lai'),
(131, 5, 'Aburrido', 'Sayk\'usqa', 'Saí-kus-ja'),
(132, 5, 'Emocionado', 'Phukusqa', 'Pu-kús-ja'),
(133, 5, 'Agradecido', 'Sulpayoq', 'Sul-pa-yój'),
(134, 5, 'Confundido', 'Mancharikusqa', 'Man-cha-ri-kús-ja'),
(135, 5, 'Soledad', 'Sapallay', 'Sa-páll-lai'),
(136, 5, 'Cariño', 'Khuyay', 'Khu-yái'),
(137, 6, 'Profesor', 'Yachachiq', 'Ya-cha-chíj'),
(138, 6, 'Médico', 'Hampiq', 'Jam-píj'),
(139, 6, 'Agricultor', 'Chakraruna', 'Chak-ra-rú-na'),
(140, 6, 'Tejedor', 'Awaq', 'Á-waj'),
(141, 6, 'Músico', 'Takiq', 'Ta-kíj'),
(142, 6, 'Cocinero', 'Wayk\'uq', 'Wai-kúj'),
(143, 6, 'Carpintero', 'Qaspi llank\'aq', 'Jás-pi llan-káj'),
(144, 6, 'Pescador', 'Challwakamayuq', 'Chall-wa-ka-ma-yúj'),
(145, 6, 'Pastor', 'Michiq', 'Mí-chij'),
(146, 6, 'Comerciante', 'Qhatukamayuq', 'Jha-tu-ka-ma-yúj'),
(147, 6, 'Curandero', 'Paqo', 'Pá-jo'),
(148, 6, 'Albañil', 'Rumi llank\'aq', 'Rú-mi llan-káj'),
(149, 6, 'Sastre', 'P\'achalliq', 'Pa-cháll-lij'),
(150, 6, 'Herrero', 'Fierru llank\'aq', 'Fiér-ru llan-káj'),
(151, 6, 'Panadero', 'T\'anta ruruq', 'Tán-ta ru-rúj'),
(152, 6, 'Minero', 'Quri qolqe hapiq', 'Jú-ri jól-je há-pij'),
(153, 6, 'Abogado', 'Derecho yachaq', 'De-ré-cho yá-chaj'),
(154, 6, 'Enfermero', 'Onqoq qhawaq', 'On-jój jhá-waj'),
(155, 6, 'Policía', 'Guardia', 'Guár-dia'),
(156, 6, 'Estudiante', 'Yachaqkuna', 'Ya-chaj-kú-na'),
(157, 1, 'Ratón', 'Ukuku', 'U-kú-ku'),
(158, 1, 'Oso', 'Ukumari', 'U-ku-ma-ri'),
(159, 3, 'Transparente', 'Ch\'uya', 'Chú-ya'),
(160, 3, 'Claro', 'Achikyay', 'A-chik-yái'),
(161, 4, 'Pie', 'Chaki', 'Chá-ki'),
(162, 4, 'Brazo', 'Rikra', 'Rí-kra'),
(163, 4, 'Pierna', 'Waqta', 'Wák-ta'),
(164, 4, 'Dedo', 'Ruqana', 'Ru-já-na');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progresos`
--

CREATE TABLE `progresos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `submenu_id` bigint(20) UNSIGNED NOT NULL,
  `puntaje` int(11) NOT NULL DEFAULT 0,
  `racha` int(11) NOT NULL DEFAULT 0,
  `completado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progresos`
--

INSERT INTO `progresos` (`id`, `user_id`, `categoria_id`, `submenu_id`, `puntaje`, `racha`, `completado`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 35, 0, 1, '2026-04-26 13:48:53', '2026-04-28 09:52:51'),
(2, 2, 6, 1, 0, 0, 1, '2026-04-26 13:51:44', '2026-04-26 13:51:44'),
(3, 3, 1, 1, 0, 0, 1, '2026-04-26 14:00:51', '2026-04-26 14:00:51'),
(4, 3, 1, 2, 30, 1, 1, '2026-04-26 14:01:14', '2026-04-26 14:01:14'),
(5, 3, 4, 1, 0, 0, 1, '2026-04-26 14:09:05', '2026-04-26 14:09:05'),
(6, 3, 4, 2, 30, 2, 1, '2026-04-26 14:09:23', '2026-04-26 14:09:23'),
(7, 2, 1, 2, 50, 0, 1, '2026-04-28 07:13:08', '2026-04-28 09:18:22'),
(8, 2, 1, 3, 60, 6, 1, '2026-04-28 09:18:57', '2026-04-28 09:18:57'),
(9, 2, 2, 1, 135, 0, 1, '2026-04-28 18:54:41', '2026-04-28 21:13:36'),
(10, 7, 1, 3, 260, 19, 1, '2026-04-29 22:42:02', '2026-04-29 22:42:02'),
(11, 9, 1, 1, 140, 0, 1, '2026-04-29 22:46:34', '2026-04-29 22:46:34'),
(12, 9, 1, 3, 260, 22, 1, '2026-04-29 22:47:51', '2026-04-29 22:47:51'),
(13, 23, 1, 1, 155, 0, 1, '2026-08-28 22:02:44', '2026-08-28 22:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('G0Zi1xgaDVQkgmIWDLCrpbLrDo0gKbr6ArlB7G0T', 23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.135.0 Chrome/148.0.7778.280 Electron/42.8.1 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHFPWEFpTGJJR3dyZmIzVkFNV0hrd3Q2ekZ4c3I3ZVc0OEhvS0VDUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjM7fQ==', 1787939385),
('msoOWVvzIutHDNzVohwee07u0OPita8NtnKIC0oV', 23, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 15; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYU9yREZ2bzBLa2J2czI3aUpmNkVxaWpJUkVucEVXdUlzeHlzTjdDMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjM7fQ==', 1787946764),
('OSYsbNue5CdK46Hj8Gb3Kp6N5dVsj618ftekoNpB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.135.0 Chrome/148.0.7778.280 Electron/42.8.1 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzVCN0JLaDZqdzBjVWgzTWo0dDFTSHdXRTBwWkc4clBSQXBQSDBQUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1788191876),
('PwbrwkmUXUAqGxZrVa6B1zkGckPAW20FAiwihhVA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36 Edg/152.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzFOZ0JvTXNZbDluRGFqNWRNbWw0THNMNEVpTm1vdFpkOUh3b29IaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1788192529);

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `nombre`, `icono`) VALUES
(1, 'Aprender', '📖'),
(2, 'Quiz', '🎯'),
(3, 'Unir', '🧩'),
(4, 'Escribir', '✍️'),
(5, 'Aprender', '📖'),
(6, 'Quiz', '🎯'),
(7, 'Unir', '🧩'),
(8, 'Escribir', '✍️');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `racha_global` int(11) NOT NULL DEFAULT 0,
  `vidas_globales` int(11) NOT NULL DEFAULT 5,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `racha_global`, `vidas_globales`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Demo', 'demo@quechua.bo', NULL, '$2y$12$WJlzS9DND71SzaDM8L10xeYH0pXSGobNqu1yIhhjJjr14mfc1uJDi', 0, 5, NULL, NULL, NULL),
(2, 'chorezito', 'chorezito@gmail.com', NULL, '$2y$12$Q9ITeeaeuzHxPeEAXPENC.EfQsoVvLMg1NXSSuz6GI.L9jPd2Q11K', 6, 3, NULL, '2026-04-26 13:40:44', '2026-04-28 09:18:57'),
(3, 'Nelson', 'Javi@gmail.com', NULL, '$2y$12$46egYApLhelv88vU.YurRepajGj4VhDfbXve3IYU4/WZliJ1Dv1j.', 2, 2, NULL, '2026-04-26 14:00:18', '2026-04-26 14:09:23'),
(4, 'Riselly', 'rise123@gmail.com', NULL, '$2y$12$uYXli.T7lZ7owaYFW9.eQurk/oTsj6zXY/ubU.I/cuPZ3s/wrWswi', 0, 5, NULL, '2026-04-28 12:05:19', '2026-04-28 12:05:19'),
(6, 'Nelson', 'nelsonpersonal895@gmail.com', NULL, '$2y$12$ZnlJ9JG6adhhHHkdNp4xIOH1NxO6eNPZc3VNluZgymaakQ0Fxnh7m', 0, 5, NULL, '2026-04-29 22:04:04', '2026-04-29 22:04:04'),
(7, 'Camila', 'camila_r_ch_2004@gmail.com', NULL, '$2y$12$31JhXvlDZUSyt5kGLnxpwuqOjjqmsasVupbNX6KclxbOgXXXzaPHi', 19, 2, NULL, '2026-04-29 22:35:55', '2026-04-29 22:42:02'),
(8, 'Nelson Javier Charupá Rosales', 'nelsoncharupa@gmail.com', NULL, '$2y$12$88TEn6Q4z9kD0nEfVjHMV.yTJC7fAUlhu5kfLOhyiEXnoTGknF1x.', 0, 5, NULL, '2026-04-29 22:36:22', '2026-04-29 22:36:22'),
(9, 'rosalia', 'rosalia@gmail.com', NULL, '$2y$12$OuQFRbz79eIIuc2AedjvJ.7ApIpzhIAL4YDV.E9QkwlwBH.huaMGO', 22, 4, NULL, '2026-04-29 22:42:28', '2026-04-29 22:47:51'),
(10, 'eynar', 'eynartr@gmail.com', NULL, '$2y$12$PKlkEW1ZiKpw74hEfDkUY.NAq2C56FsS1ch64a7Iwjwpc/GOXudEa', 0, 5, NULL, '2026-04-29 22:53:35', '2026-04-29 22:53:35'),
(11, 'Eva', 'evamy@gmail.com', NULL, '$2y$12$Wmz023QQIEc1IfYYVOu2det32eHIXtvk3lgBRCimcoI3CjG4TfqUS', 0, 5, NULL, '2026-04-29 23:02:56', '2026-04-29 23:02:56'),
(12, 'brigith', 'brigith@gmail.com', NULL, '$2y$12$0nXKeNi2JHANyTYty5MD.OsmPfHY71X8AXlvPQ6J9tSOUNPTBD/NO', 0, 5, NULL, '2026-04-29 23:10:01', '2026-04-29 23:10:01'),
(13, 'isa', 'isainloayza2002@gmail.com', NULL, '$2y$12$0hERgx0w09l3rSHt13.nluI3dsA8kHJ/Yqm8GE5uAXrIcdCVjLm.2', 0, 5, NULL, '2026-04-29 23:25:41', '2026-04-29 23:25:41'),
(14, 'Nelson', 'nelson@gmail.com', NULL, '$2y$12$xyOY24DoO6vxFepnSCYv2OZnBKDrKg1G2Fk2Ljob0wT4rVwYQQUV6', 0, 5, NULL, '2026-04-29 23:39:52', '2026-04-29 23:39:52'),
(15, 'lizzet', 'lizzet@gmail.com', NULL, '$2y$12$f85GZlwsW7aOktYdBOAQgOfFXqiv8GAgZLCM83G3YUzYSArCESm/O', 0, 5, NULL, '2026-04-29 23:44:11', '2026-04-29 23:44:11'),
(16, 'zequi', 'zequi@gmail.com', NULL, '$2y$12$Jjb5qYpQbnu54E7hTs1a8OAQFkNKMqEqh2Kr/oeER92q.xwqUqMwC', 0, 5, NULL, '2026-04-29 23:45:11', '2026-04-29 23:45:11'),
(17, 'Juan', 'juan@gmail.com', NULL, '$2y$12$34SvAMtd8VHKi9Ic.SVAwO/Siu2qKp8tTWRYT/gu4dIJz5T8B4M3O', 0, 5, NULL, '2026-04-29 23:46:49', '2026-04-29 23:46:49'),
(18, 'edwin', 'edwin123@gmail.com', NULL, '$2y$12$6E3wrjrTrEiSWDTo99q.JeRiOs9JbMPOZfLCcXFyWf4.GcyVeq3ta', 0, 5, NULL, '2026-04-29 23:59:28', '2026-04-29 23:59:28'),
(19, 'misael sejas veizaga', 'misa@gmail.com', NULL, '$2y$12$yFenURRG4uthC.3AGCly/OMCbD824wW1yT/8KepahyDRGrG..YGca', 0, 5, NULL, '2026-04-30 00:34:04', '2026-04-30 00:34:04'),
(20, 'Rise', 'rise@gmail.com', NULL, '$2y$12$0Mb7E0jN8cYIIQ0tCFGo/OPtSou8X7.ezMlJ3S4EYuTX7BXRYkqKu', 0, 5, NULL, '2026-04-30 00:59:40', '2026-04-30 00:59:40'),
(21, 'ezequiel', 'chore@gmail.com', NULL, '$2y$12$cQ6YG6gGTIhfXV/siX.w7erXOWKP/IcLfV/29l.WqiaVULxOYTJ5i', 0, 5, NULL, '2026-08-27 01:54:22', '2026-08-27 01:54:22'),
(22, 'javier', 'javiercharu@gmail.com', NULL, '$2y$12$lcB1cL1Crtk25hTcV.783.g85CV5ZM2jtebsU95NxFlgGRqUo0YkG', 0, 5, NULL, '2026-08-27 18:22:02', '2026-08-27 18:22:02'),
(23, 'sevelindaparada', 'Paradasevelinda@gmail.com', NULL, '$2y$12$HU1Ut9.36wbCwsqWMln72uAg3mvsVujZllV1GUyOAQnw0i12cctMS', 0, 5, NULL, '2026-08-28 21:30:49', '2026-08-28 21:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `palabras`
--
ALTER TABLE `palabras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `palabras_categoria_id_foreign` (`categoria_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `progresos`
--
ALTER TABLE `progresos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `progresos_user_id_categoria_id_submenu_id_unique` (`user_id`,`categoria_id`,`submenu_id`),
  ADD KEY `progresos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `progresos_submenu_id_foreign` (`submenu_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `palabras`
--
ALTER TABLE `palabras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `progresos`
--
ALTER TABLE `progresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `palabras`
--
ALTER TABLE `palabras`
  ADD CONSTRAINT `palabras_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `progresos`
--
ALTER TABLE `progresos`
  ADD CONSTRAINT `progresos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progresos_submenu_id_foreign` FOREIGN KEY (`submenu_id`) REFERENCES `submenus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progresos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
