-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2024 a las 08:13:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gesthorarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientesaprendizaje`
--

CREATE TABLE `ambientesaprendizaje` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `capacidad_estudiantes` int(11) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambientesaprendizaje`
--

INSERT INTO `ambientesaprendizaje` (`id`, `codigo`, `nombre`, `tipo`, `capacidad_estudiantes`, `ubicacion`, `estado`) VALUES
(1, '23432432', 'CLASEEE', 'PRESENCIAL', 3423, '23423', 1),
(3, '323abc', 'Sala 202', 'PRESENCIAL', 34, 'Sede Obando', 1),
(4, '21234', 'sala 102', 'PRESENCIAL', 35, 'sede bicentenario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barangs`
--

CREATE TABLE `barangs` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `stock` varchar(5) NOT NULL,
  `price` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tipo_identificacion` varchar(20) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `tipo_docente` varchar(50) NOT NULL,
  `tipo_contrato` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombres`, `apellidos`, `tipo_identificacion`, `identificacion`, `tipo_docente`, `tipo_contrato`, `area`, `estado`, `user_id`) VALUES
(9, 'sdfsfsd', 'sdfsdfsfs', 'RC', '123123', 'MAGISTER', 'OTC', 'sdfsdfs', 1, 4),
(10, 'Miguel', 'Llanten', 'TI', '12345234', 'ESPECIALISTA', 'PT', 'salud', 1, 2),
(12, 'Justin', 'Ordoñez', 'CC', '12345234', 'PROFESIONAL', 'CAT', 'TIC', 1, 3),
(14, 'Andres', 'Martinez', 'CC', '3242343', 'PROFESIONAL', 'PT', 'TIC', 1, 4),
(20, 'Miguel', 'Llanten', 'CC', '123234234', 'PROFESIONAL', 'OTC', 'TIC', 1, 2),
(23, 'Miguel', 'Llanten', 'CC', '12345234', 'PROFESIONAL', 'PT', 'TIC', 1, 2),
(34, 'camilo', 'ante', 'CC', '123234', 'PROFESIONAL', 'PT', 'todas', 1, 14),
(35, 'Ernesto', 'Verdugo', 'CC', '123445345', 'ESPECIALISTA', 'PT', 'todas', 1, 15),
(37, 'Angie', 'Argote', 'CC', '23243243', 'PROFESIONAL', 'PT', 'todas', 1, 17),
(38, 'juan', 'PARRA', 'CC', '123324234', 'PROFESIONAL', 'PT', 'todas', 1, 18),
(39, 'emily', 'fsdf', 'CC', '345345', 'PROFESIONAL', 'PT', 'egdfg', 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `periodo_academico_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `ambiente_id` int(11) DEFAULT NULL,
  `labor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dia`, `hora_inicio`, `hora_fin`, `periodo_academico_id`, `docente_id`, `ambiente_id`, `labor_id`) VALUES
(6, 'lunes', '07:00:00', '08:00:00', 4, 10, 1, 1),
(8, 'martes', '09:00:00', '11:00:00', 4, 9, 1, 1),
(10, 'lunes', '10:46:00', '12:46:00', 6, 9, 1, 1),
(12, 'lunes', '10:56:00', '12:58:00', 6, 34, 1, 1),
(13, 'lunes', '10:41:00', '14:45:00', 6, 37, 3, 1),
(14, 'lunes', '12:06:00', '15:10:00', 6, 38, 3, 1),
(15, 'jueves', '14:00:00', '16:00:00', 6, 39, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

CREATE TABLE `labores` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_labor` varchar(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`id`, `codigo`, `nombre`, `tipo_labor`) VALUES
(1, '23432432', 'CLASEEE', 'ADMINISTRATIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_31_144147_create_barangs_table', 1),
(6, '2024_05_29_033025_create_permission_tables', 2),
(7, '2024_05_29_033517_create_roles', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodosacademicos`
--

CREATE TABLE `periodosacademicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodosacademicos`
--

INSERT INTO `periodosacademicos` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(1, 'p1', '2024-05-22', '2024-05-31', 0),
(4, '2014 p2', '2024-05-22', '2024-05-23', 0),
(6, '2024 I', '2024-02-13', '2024-05-31', 1),
(7, '2023 p2', '2024-08-01', '2024-11-30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'coordinador', 'web', '2024-05-29 08:42:04', '2024-05-29 08:42:04'),
(2, 'docente', 'web', '2024-05-29 08:42:04', '2024-05-29 08:42:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mateo Cadena', 'mcadena@unimayor.edu.co', NULL, '$2y$10$RreC7AMXkMRCLei9o70by.caG5KItNnJ8xqOGXCfhM8g2A1ENxUzS', NULL, '2024-05-22 05:09:53', '2024-05-22 05:09:53'),
(2, 'Miguel Llanten', 'mllanten@unimayor.edu.co', NULL, '$2y$10$4N7qC9h1Vgqe1CCgLIkAsubBqSMX6nqFRJn86aewrohSeCo4Ll4j2', NULL, '2024-05-22 05:36:01', '2024-05-22 05:36:01'),
(3, 'El profe', 'elprofe@gmail.com', NULL, '$2y$10$fXz2QjlsB8M5BTu5OMNVDeA1wp4ZKKZyDHO1PbtVHx7XTdOSC.Cem', NULL, '2024-05-22 10:54:03', '2024-05-22 10:54:03'),
(4, 'andres martinez', 'andres@example.com', NULL, '$2y$10$E6YOSP0jSOYReQ7spXyk7OVaTQHc53nHXcLdPJZZzWwU6q8u2s.ru', NULL, '2024-05-23 03:24:21', '2024-05-23 03:24:21'),
(5, 'Justin Ordoñez', 'Justin@unimayor.edu.co', NULL, '$2y$10$IboqNilgTF/Abx6Xs9cF0uY72NaG.viZSfzYC3Yb9wohHHWSv.5nG', NULL, '2024-05-31 16:10:28', '2024-05-31 16:10:28'),
(8, 'usuario12', 'martinezmellizo@gmail.com', NULL, '$2y$10$1SkOPDMVaVmFy7xVsDG1aOkj.N7tMnA5JTYei3.Rl3uH3grOlnIw2', NULL, '2024-05-31 17:07:42', '2024-05-31 17:07:42'),
(11, 'Marta Camacho', 'cecamacho@unimayor.edu.co', NULL, '$2y$10$yWrBcsjUWjsucAJ7k2Zw9uaWbpUdZmxqNkF8l8WirNsx/kQmCGehC', NULL, '2024-06-01 02:21:50', '2024-06-01 02:21:50'),
(12, 'JUan Tejeda', 'j.m.tejedalopez3333@gmail.com', NULL, '$2y$10$kS6hfgoSNH85FiS9dsEaQ.cqv6vnJTHsWQsFQMya4UNAWskm3e59i', NULL, '2024-06-01 02:33:44', '2024-06-01 02:33:44'),
(13, 'Valen', 'valentinasulez38@gmail.com', NULL, '$2y$10$MZDVgsxQFAT.xy/S1MwH.OEsjFesDt8Xa3d5boVq.1sQYeaT3w.pm', NULL, '2024-06-01 02:37:09', '2024-06-01 02:37:09'),
(14, 'camilo', 'camiloante@unimayor.edu.co', NULL, '$2y$10$MMiVEWTGSCiIOesOxIABr.BfOegQUyr9UyEuAe.NkHGpL/4bIJZJW', NULL, '2024-06-01 02:54:00', '2024-06-01 02:54:00'),
(15, 'Ernesto Verdugo', 'ernestoverdugo@unimayor.edu.co', NULL, '$2y$10$OJLN6AeWVtg8FTW23yNx8ueyvn/VGrxZq3VQ0PfFrEG4H84jMUN1i', NULL, '2024-06-01 03:08:23', '2024-06-01 03:08:23'),
(17, 'angie', 'aargote@unimayor.edu.co', NULL, '$2y$10$XIC5hgZigK4.Zshu/7SKheedPxyP2cQpDo3jL/DHFQdCzwZnTYmCC', NULL, '2024-06-01 03:40:47', '2024-06-01 03:40:47'),
(18, 'juan', 'jparra@unimayor.edu.co', NULL, '$2y$10$at0uS7JpFk9HhMm22YY.puFwmeW78tWGdJl6TGs2xHGM10avaijmq', NULL, '2024-06-01 04:05:53', '2024-06-01 04:05:53'),
(19, 'emily', 'emilymunoz@unimayor.edu.co', NULL, '$2y$10$cCuZlMFZvd.WCrQfogssBuVUKW0F99MpfTRjj6sabrHjpjtEvH0HK', NULL, '2024-06-01 04:55:55', '2024-06-01 04:55:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientesaprendizaje`
--
ALTER TABLE `ambientesaprendizaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_docentes_users` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodo_academico_id` (`periodo_academico_id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `ambiente_id` (`ambiente_id`),
  ADD KEY `labor_id` (`labor_id`);

--
-- Indices de la tabla `labores`
--
ALTER TABLE `labores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `periodosacademicos`
--
ALTER TABLE `periodosacademicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambientesaprendizaje`
--
ALTER TABLE `ambientesaprendizaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `labores`
--
ALTER TABLE `labores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `periodosacademicos`
--
ALTER TABLE `periodosacademicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `fk_docentes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`periodo_academico_id`) REFERENCES `periodosacademicos` (`id`),
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`),
  ADD CONSTRAINT `horarios_ibfk_3` FOREIGN KEY (`ambiente_id`) REFERENCES `ambientesaprendizaje` (`id`),
  ADD CONSTRAINT `horarios_ibfk_4` FOREIGN KEY (`labor_id`) REFERENCES `labores` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
