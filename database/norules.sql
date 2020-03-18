-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2020 a las 16:27:53
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `norules`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nbCategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nbCategoria`) VALUES
(2, 'Calzado Femenino'),
(1, 'Calzado Masculino'),
(4, 'Indumentaria Femenina'),
(3, 'Indumentaria Masculina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `totalCompra` float NOT NULL,
  `fechaCompra` date NOT NULL,
  `horaCompra` time NOT NULL,
  `dtlCompra` varchar(135) NOT NULL,
  `MTDPAGOS_idMtdPago` int(11) NOT NULL,
  `USUARIOS_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_has_productos`
--

CREATE TABLE `compras_has_productos` (
  `COMPRAS_idCompra` int(11) NOT NULL,
  `COMPRAS_MTDPAGOS_idMtdPago` int(11) NOT NULL,
  `COMPRAS_USUARIOS_idUsuario` int(11) NOT NULL,
  `PRODUCTOS_idProducto` int(11) NOT NULL,
  `PRODUCTOS_CATEGORIAS_idCategoria` int(11) NOT NULL,
  `PRODUCTOS_MARCAS_idMarca` int(11) NOT NULL,
  `cantidad` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `nbMarca` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `nbMarca`) VALUES
(2, 'Adidas'),
(10, 'Dunlop'),
(6, 'Fila'),
(9, 'New Balance'),
(1, 'Nike'),
(3, 'Puma'),
(5, 'Reebok'),
(8, 'Salomon'),
(4, 'Topper'),
(7, 'Under Armour');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nbProducto` varchar(90) NOT NULL,
  `precioProducto` float NOT NULL,
  `dtlProducto` varchar(255) DEFAULT NULL,
  `imgProducto` varchar(180) NOT NULL,
  `CATEGORIAS_idCategoria` int(11) NOT NULL,
  `MARCAS_idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nbProducto`, `precioProducto`, `dtlProducto`, `imgProducto`, `CATEGORIAS_idCategoria`, `MARCAS_idMarca`) VALUES
(1, 'Zapatillas Dart 12', 3.989, 'Goma con tecnología Phylon, un material de espuma comprimido para proporcionar una amortiguación ligera.', 'P0001.png', 1, 1),
(2, 'Zapatillas', 4099, 'zapas', '1581777942P0003.png', 2, 10),
(3, 'Remera', 1789, 'detalleeeeee', '1581780869P0006.png', 3, 2),
(4, 'Zapatillas', 1, 'Rojas', '15817810971581777089P0003.png', 1, 1),
(5, 'molestiae', 4632, 'Recusandae quae ut praesentium. Veritatis aut et quae aliquam velit aut. Rerum aperiam optio est possimus fuga esse et.', '327f6f0a16989b08203cc2583988e69f.jpg', 2, 6),
(6, 'laboriosam', 4602, 'Tempore quas accusamus ipsa praesentium natus voluptate. Animi molestiae autem necessitatibus dolor ex possimus natus provident. Qui id dolorem dignissimos voluptatem quia dolorum saepe rem. Doloribus iure eaque cum perspiciatis.', '0', 1, 3),
(7, 'error', 7558, 'Deserunt illo deleniti incidunt necessitatibus. Pariatur dolor et asperiores dolor sunt et minima. Eligendi facere omnis rerum id. Sed alias corporis nostrum eligendi aut asperiores repellendus.', 'a8c7bda30712b64a3dcf7dbd931fffe8.jpg', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `fecha`, `role`, `imgUser`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Federico', 'Spagnuolo', 'f@f.com', '2001-01-29', 'admin', '', NULL, '$2y$10$lbCpyqXHA5pXDeMdJ9/mEuxEgHVX4DzKr3XaPgdyDt92jdh4Qqcq.', NULL, '2020-03-16 02:42:41', '2020-03-17 01:07:55'),
(2, 'Lucia', 'Villalba', 'lu@vi.com', '1994-03-04', 'user', '', NULL, '$2y$10$wsYV.w9kiwDFlLrVynBUAepbRFKW4VJU649g9tE/DUthDqoySb3N.', NULL, '2020-03-13 19:13:41', '2020-03-13 19:13:41'),
(4, 'Cornelius', 'Lebsack', 'boyle.dora@example.org', '1987-01-14', 'user', '5b0565a3893f7db547a33a77e992bc5e.jpg', '2020-03-18 02:29:55', '$2y$10$MY0du3EN/bvHM.T.ZqFiqO/947rUzkgJYVoC8EEXjSx.syvJMyEzO', '3Ah3gQuxtg', '2020-03-18 02:31:01', '2020-03-18 02:31:01'),
(5, 'Juanita', 'Kling', 'zherman@example.net', '1973-01-27', 'user', '5f7a5deb0e09fa834f8b0818c6f5331f.jpg', '2020-03-18 02:30:33', '$2y$10$hEBv7gRBx1LWyQrm4OI7P.tPWxlW8SykiPxi8Etp8yFubB5geYq7u', '5iFa79OLEj', '2020-03-18 02:31:01', '2020-03-18 02:31:01'),
(6, 'Rhea', 'Nitzsche', 'ublick@example.org', '1984-07-28', 'user', '9ba9f871d876bd21c6b3f84ed5e01946.jpg', '2020-03-18 05:19:41', '$2y$10$I.Mj6bHJHmL.djPKMfa06eu0W1KrqIupdhuaHaMnYG6gdBNIRvTKK', 'bal2Fz72S8', '2020-03-18 05:21:20', '2020-03-18 05:21:20'),
(7, 'Mable', 'Hayes', 'richard.kuhn@example.net', '2011-08-10', 'user', 'dc060b706bc673cc7d9e3221a014d4a9.jpg', '2020-03-18 05:20:30', '$2y$10$nfFz1FC5jFYUh5LMdE0vdeGuieBAJCCoslwD8a5uIIgIMw1iUEc5i', 'e80NB5BJat', '2020-03-18 05:21:21', '2020-03-18 05:21:21'),
(8, 'Marjory', 'Glover', 'kayden92@example.net', '1978-11-21', 'user', 'dddf51137a233c545e1ac79edc5a8572.jpg', '2020-03-18 05:25:13', '$2y$10$tJXDT7ni4Ac/GcGxD6oi2eSbflXDdFHjjaNwCNxIgjPIbCpiWqT4a', 'HnUhG7HTTm', '2020-03-18 05:26:28', '2020-03-18 05:26:28'),
(9, 'Pink', 'Orn', 'audreanne.turner@example.net', '1972-02-14', 'user', 'fa64b82ee1d8a0eb4a0ad7c07dd6cf0a.jpg', '2020-03-18 05:25:55', '$2y$10$QjHnXjbCg.PtMjBHuxKKiukh/baY3FSDem1fVpvH7Wfv36MAkRQUK', 'gzoTDCnURW', '2020-03-18 05:26:28', '2020-03-18 05:26:28'),
(10, 'Austin', 'Hayes', 'martine.mclaughlin@example.com', '1999-05-21', 'user', '0', '2020-03-18 05:28:39', '$2y$10$.Kde.QkaGjHZR/CAKVjyF.TIoNBgl5D4XVtYIdlxbZ/D.l3/wJjEe', 'I546bpLmFw', '2020-03-18 05:30:12', '2020-03-18 05:30:12'),
(11, 'Ralph', 'Herzog', 'ppredovic@example.com', '2006-09-25', 'user', '0', '2020-03-18 05:29:00', '$2y$10$mHoA5W2Tb1CChvgPjPTsz./zrxYIFwkgKu2ofwn6UPRKHNxN.u2fu', 'uYLhzAe8Hv', '2020-03-18 05:30:12', '2020-03-18 05:30:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `ctgNombre_UNIQUE` (`nbCategoria`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`,`MTDPAGOS_idMtdPago`,`USUARIOS_idUsuario`),
  ADD UNIQUE KEY `idCompra_UNIQUE` (`idCompra`),
  ADD KEY `fk_Compras_MTDPAGOS1_idx` (`MTDPAGOS_idMtdPago`),
  ADD KEY `fk_Compras_USUARIOS1_idx` (`USUARIOS_idUsuario`);

--
-- Indices de la tabla `compras_has_productos`
--
ALTER TABLE `compras_has_productos`
  ADD PRIMARY KEY (`COMPRAS_idCompra`,`COMPRAS_MTDPAGOS_idMtdPago`,`COMPRAS_USUARIOS_idUsuario`,`PRODUCTOS_idProducto`,`PRODUCTOS_CATEGORIAS_idCategoria`,`PRODUCTOS_MARCAS_idMarca`),
  ADD KEY `fk_COMPRAS_has_PRODUCTOS_PRODUCTOS1_idx` (`PRODUCTOS_idProducto`,`PRODUCTOS_CATEGORIAS_idCategoria`,`PRODUCTOS_MARCAS_idMarca`),
  ADD KEY `fk_COMPRAS_has_PRODUCTOS_COMPRAS1_idx` (`COMPRAS_idCompra`,`COMPRAS_MTDPAGOS_idMtdPago`,`COMPRAS_USUARIOS_idUsuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`),
  ADD UNIQUE KEY `mcNombre_UNIQUE` (`nbMarca`),
  ADD UNIQUE KEY `idMarca_UNIQUE` (`idMarca`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`,`CATEGORIAS_idCategoria`,`MARCAS_idMarca`),
  ADD UNIQUE KEY `idProducto_UNIQUE` (`idProducto`),
  ADD KEY `fk_PRODUCTOS_CATEGORIAS1_idx` (`CATEGORIAS_idCategoria`),
  ADD KEY `fk_PRODUCTOS_MARCAS1_idx` (`MARCAS_idMarca`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
