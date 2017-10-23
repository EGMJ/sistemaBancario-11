-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 20:07:57
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sistema_bancario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backup_restores`
--

CREATE TABLE `backup_restores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `razon_social`, `nit`, `created_at`, `updated_at`) VALUES
(1, 'Banco Nacional de Bolivia', 45625815, '2017-09-25 09:01:16', '2017-09-25 09:01:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_modulos`
--

CREATE TABLE `banco_modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_monedas`
--

CREATE TABLE `banco_monedas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_moneda` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sucursal` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `tipo`, `id_sucursal`, `id_banco`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Caja 1', 1, 1, 10900, '2017-09-26 18:32:18', '2017-09-26 23:10:29'),
(2, 'Caja 2', 1, 1, 5100, '2017-09-26 18:08:42', '2017-09-26 22:23:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `valor` double NOT NULL,
  `id_moneda` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`id`, `fecha`, `valor`, `id_moneda`, `created_at`, `updated_at`) VALUES
(1, '2017-10-20', 7, 1, '2017-10-20 10:15:19', '2017-10-20 10:15:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso_usos`
--

CREATE TABLE `caso_usos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caso_usos`
--

INSERT INTO `caso_usos` (`id`, `cod`, `nombre`, `descripcion`, `id_menu`, `created_at`, `updated_at`) VALUES
(1, '123', 'Banco-crear', 'ver añadir banco', 1, '2017-10-23 17:53:37', '2017-10-23 17:53:37'),
(2, '1234', 'Banco-ver', 'ver el o los bancos', 1, '2017-10-23 17:54:22', '2017-10-23 17:54:22'),
(3, '12345', 'Banco-editar', 'modificar los datos de un banco', 1, '2017-10-23 17:55:02', '2017-10-23 17:55:02'),
(4, '12346', 'Banco-eliminar', 'eliminar un banco del sistema', 1, '2017-10-23 17:55:35', '2017-10-23 17:55:35'),
(5, '124', 'Crear cuenta', 'añadir una nueva cuenta bancaria', 1, '2017-10-23 17:56:15', '2017-10-23 17:56:15'),
(6, '12347', 'Cuenta Administrar', 'hacer movimientos y transaccionse ademas de ver los datos de la cuenta', 1, '2017-10-23 17:57:11', '2017-10-23 17:57:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `paterno`, `materno`, `ci`, `fecha_nacimiento`, `genero`, `correo`, `telefono`, `id_banco`, `created_at`, `updated_at`) VALUES
(1, 'Andres', 'Contreras', 'Ojeda', '8873316', '2010-06-16', 'MASCULINO', 'andresito.2011.4@gmail.com', 70863702, 1, '2017-09-25 09:20:35', '2017-09-25 09:20:35'),
(2, 'Marchelo', 'Lolo', 'LAL', '7412582', '1991-11-30', '0', 'aaa@aaa.aa', 7521456, 1, '2017-09-26 21:48:30', '2017-09-26 21:48:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `saldo` double NOT NULL,
  `moneda` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `id_cliente`, `saldo`, `moneda`, `id_banco`, `id_tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 5400, 'Bs', 1, 1, '2017-09-25 19:38:18', '2017-09-26 23:10:29'),
(2, 2, 1600, 'Bs', 1, 1, '2017-09-26 21:48:57', '2017-09-26 22:54:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id_caja` int(10) UNSIGNED NOT NULL,
  `monto` double NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `fecha`, `id_caja`, `monto`, `id_banco`, `detalle`, `created_at`, `updated_at`) VALUES
(1, '2017-09-26 13:56:59', 1, -500, 1, '', '2017-09-26 17:56:59', '2017-09-26 17:56:59'),
(2, '2017-09-26 13:57:53', 1, 1000, 1, '', '2017-09-26 17:57:53', '2017-09-26 17:57:53'),
(3, '2017-09-26 14:05:08', 1, 1000, 1, 'Deposito en la cuenta 1', '2017-09-26 18:05:08', '2017-09-26 18:05:08'),
(4, '2017-09-26 14:51:58', 1, 500, 1, 'Deposito en la cuenta 1', '2017-09-26 18:51:58', '2017-09-26 18:51:58'),
(5, '2017-09-26 18:06:37', 1, -1000, 1, 'Retiro de la cuenta 1', '2017-09-26 22:06:37', '2017-09-26 22:06:37'),
(6, '2017-09-26 18:23:49', 2, 100, 1, 'Deposito en la cuenta 2', '2017-09-26 22:23:49', '2017-09-26 22:23:49'),
(7, '2017-09-26 18:58:31', 1, 5000, 1, 'Deposito en la cuenta 1', '2017-09-26 22:58:31', '2017-09-26 22:58:31'),
(8, '2017-09-26 19:10:29', 1, -100, 1, 'Retiro de la cuenta 1', '2017-09-26 23:10:29', '2017-09-26 23:10:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicos`
--

CREATE TABLE `historicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cuenta` int(10) UNSIGNED NOT NULL,
  `monto` double NOT NULL,
  `saldo` double NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historicos`
--

INSERT INTO `historicos` (`id`, `fecha`, `tipo`, `id_cuenta`, `monto`, `saldo`, `detalle`, `created_at`, `updated_at`) VALUES
(1, '2017-09-26 18:49:29', '', 2, -1000, 1100, 'A Nro de Cuenta: 1', '2017-09-26 22:49:29', '2017-09-26 22:49:29'),
(2, '2017-09-26 18:49:29', '', 1, 1000, 1000, 'De Nro de Cuenta: 2', '2017-09-26 22:49:29', '2017-09-26 22:49:29'),
(3, '2017-09-26 18:54:18', 'TRANSACCION', 1, -500, 500, 'A Nro de Cuenta: 2', '2017-09-26 22:54:18', '2017-09-26 22:54:18'),
(4, '2017-09-26 18:54:18', 'TRANSACCION', 2, 500, 1600, 'De Nro de Cuenta: 1', '2017-09-26 22:54:18', '2017-09-26 22:54:18'),
(5, '2017-09-26 18:58:31', 'DEPOSITO ', 1, 5000, 5500, '', '2017-09-26 22:58:31', '2017-09-26 22:58:31'),
(6, '2017-09-26 19:10:29', 'RETIRO', 1, -100, 5400, '', '2017-09-26 23:10:29', '2017-09-26 23:10:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_modulo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `cod`, `nombre`, `descripcion`, `id_modulo`, `created_at`, `updated_at`) VALUES
(1, '123', 'Basico', 'contien las funciones de banco, y gesrtion de cuentas.', 1, '2017-10-23 17:49:52', '2017-10-23 17:49:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_25_045856_create_bancos_table', 2),
(5, '2017_09_25_050330_create_sucursals_table', 3),
(6, '2017_09_25_050453_create_cajas_table', 3),
(7, '2017_09_25_050513_create_detalles_table', 3),
(9, '2017_09_25_049900_create_clientes_table', 4),
(11, '2017_09_25_153251_create_tipo_cuentas_table', 5),
(12, '2017_09_25_153309_create_cuentas_table', 5),
(13, '2017_09_25_153907_create_movimientos_table', 6),
(14, '2017_09_26_112051_create_trigger_movimiento', 7),
(15, '2017_09_26_160131_create_transaccions_table', 8),
(16, '2017_09_26_173148_create_trigger_transaccion', 9),
(17, '2017_09_26_183834_create_historicos_table', 10),
(18, '2017_10_20_060017_create_monedas_table', 11),
(19, '2017_10_20_060557_create_cambios_table', 12),
(20, '2017_10_20_061925_create_banco_monedas_table', 13),
(21, '2017_10_20_062141_create_usuarios_table', 14),
(22, '2017_10_20_062455_create_rols_table', 15),
(23, '2017_10_20_063122_create_modulos_table', 16),
(24, '2017_10_20_063425_create_menus_table', 17),
(25, '2017_10_20_063817_create_caso_usos_table', 18),
(26, '2017_10_20_064648_create_usuario_bancos_table', 19),
(27, '2017_10_20_064942_create_rol_cus_table', 20),
(28, '2017_10_20_065915_create_banco_modulos_table', 21),
(32, '2014_10_12_000000_create_users_table', 22),
(33, '2017_10_20_080352_create_backup_restores_table', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `cod`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '123', 'Modulo Basico', 'Modulo que contiene las funciones basicas del sistema', '2017-10-23 17:45:50', '2017-10-23 17:45:50'),
(2, '1234', 'ATM', 'modulo para el manejo y gestion de cajeros automaticos', '2017-10-23 17:46:23', '2017-10-23 17:46:23'),
(3, '12345', 'Prestamos', 'modulo para gestionar prestamos y creditos', '2017-10-23 17:48:06', '2017-10-23 17:48:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE `monedas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id`, `nombre`, `descripcion`, `abreviatura`, `created_at`, `updated_at`) VALUES
(1, 'Boliviano', 'moneda nacional', 'Bs.', '2017-10-20 10:12:34', '2017-10-20 10:12:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id_caja` int(10) UNSIGNED NOT NULL,
  `monto` double NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_cuenta` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `fecha`, `id_caja`, `monto`, `tipo`, `id_banco`, `id_cuenta`, `created_at`, `updated_at`) VALUES
(1, '2017-09-26 11:19:59', 1, 10, '', 1, 1, '2017-09-26 15:20:04', '2017-09-26 15:20:04'),
(2, '2017-09-26 11:26:29', 1, 10, 'DEPOSITO', 1, 1, '2017-09-26 15:27:20', '2017-09-26 15:27:20'),
(6, '2017-09-26 13:27:55', 1, 500, 'RETIRO', 1, 1, '2017-09-26 17:56:59', '2017-09-26 17:56:59'),
(7, '2017-09-26 13:57:45', 1, 1000, 'DEPOSITO', 1, 1, '2017-09-26 17:57:53', '2017-09-26 17:57:53'),
(8, '2017-09-26 14:04:56', 1, 1000, 'DEPOSITO', 1, 1, '2017-09-26 18:05:08', '2017-09-26 18:05:08'),
(9, '2017-09-26 14:51:18', 1, 500, 'DEPOSITO', 1, 1, '2017-09-26 18:51:58', '2017-09-26 18:51:58'),
(10, '2017-09-26 18:06:18', 1, 1000, 'RETIRO', 1, 1, '2017-09-26 22:06:37', '2017-09-26 22:06:37'),
(11, '2017-09-26 18:23:35', 2, 100, 'DEPOSITO', 1, 2, '2017-09-26 22:23:49', '2017-09-26 22:23:49'),
(12, '2017-09-26 18:58:19', 1, 5000, 'DEPOSITO', 1, 1, '2017-09-26 22:58:31', '2017-09-26 22:58:31'),
(13, '2017-09-26 19:10:05', 1, 100, 'RETIRO', 1, 1, '2017-09-26 23:10:29', '2017-09-26 23:10:29');

--
-- Disparadores `movimientos`
--
DELIMITER $$
CREATE TRIGGER `tr_movimiento` AFTER INSERT ON `movimientos` FOR EACH ROW BEGIN
                 if new.tipo="RETIRO" then
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cajas SET total=total-new.monto,updated_at=now() WHERE id=new.id_caja;
                      INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle,created_at, updated_at) 
                VALUES (now(),new.id_caja,-new.monto,new.id_banco,concat('Retiro de la cuenta ',new.id_cuenta),now(),now());
                 select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"RETIRO",-new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 elseif new.tipo="DEPOSITO" then
                         UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta;
                        UPDATE cajas SET total=total+new.monto,updated_at=now() WHERE id=new.id_caja;
                       INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle,created_at, updated_at) 
                VALUES (now(),new.id_caja,new.monto,new.id_banco,concat('Deposito en la cuenta ',new.id_cuenta),now(),now());
                select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"DEPOSITO ",new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 end if;
                
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `cod`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '123', 'Administrador', 'admin del sistema', '2017-10-20 10:31:00', '2017-10-20 10:31:00'),
(2, '1234', 'Cajero', 'cejero', '2017-10-20 19:54:05', '2017-10-20 19:54:05'),
(3, '12345', 'Oficial de credito', 'Funcionario encargado de procesar las solicitudes de credito', '2017-10-23 12:17:49', '2017-10-23 12:17:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_cus`
--

CREATE TABLE `rol_cus` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `id_casouso` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursals`
--

CREATE TABLE `sucursals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sucursals`
--

INSERT INTO `sucursals` (`id`, `nombre`, `id_banco`, `departamento`, `telefono`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'BNB La Ramada', 1, 'Santa Cruz', 70865951, 'La Ramada Nro. 850', '2017-09-26 18:31:34', '2017-09-26 18:31:34'),
(2, 'BNB La Guardia', 1, 'Santa Cruz', 72177485, 'km 21  carretera antiga a CCBB', '2017-09-26 22:17:43', '2017-09-26 22:17:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuentas`
--

CREATE TABLE `tipo_cuentas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interes` double NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_cuentas`
--

INSERT INTO `tipo_cuentas` (`id`, `nombre`, `interes`, `id_banco`, `created_at`, `updated_at`) VALUES
(1, 'Cuenta de Ahorro', 0.33, 1, '2017-09-25 19:37:18', '2017-09-25 19:37:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccions`
--

CREATE TABLE `transaccions` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` double NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_cuenta` int(10) UNSIGNED NOT NULL,
  `id_cuenta_destino` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transaccions`
--

INSERT INTO `transaccions` (`id`, `fecha`, `monto`, `id_banco`, `id_cuenta`, `id_cuenta_destino`, `created_at`, `updated_at`) VALUES
(2, '2017-09-26 00:00:00', 15161, 1, 1, 1, '2017-09-26 20:03:11', '2017-09-26 20:03:11'),
(3, '2017-09-26 00:00:00', 2000, 1, 1, 2, '2017-09-26 21:50:13', '2017-09-26 21:50:13'),
(5, '2017-09-26 00:00:00', 1000, 1, 2, 1, '2017-09-26 22:49:29', '2017-09-26 22:49:29'),
(7, '2017-09-26 00:00:00', 500, 1, 1, 2, '2017-09-26 22:54:18', '2017-09-26 22:54:18');

--
-- Disparadores `transaccions`
--
DELIMITER $$
CREATE TRIGGER `tr_transaccion` AFTER INSERT ON `transaccions` FOR EACH ROW BEGIN
               
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta_destino;
                      select saldo into @cuenta_a from cuentas where id=new.id_cuenta;
                      select saldo into @cuenta_b from cuentas where id=new.id_cuenta_destino;
                      INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",-new.monto,@cuenta_a,concat("A Nro de Cuenta: ",new.id_cuenta_destino),new.id_cuenta,now(),now()); 
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",new.monto,@cuenta_b,concat("De Nro de Cuenta: ",new.id_cuenta),new.id_cuenta_destino,now(),now()); 
                   
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) UNSIGNED DEFAULT NULL,
  `id_rol` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_banco`, `id_rol`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andres Contreras ojeda', 'andresito.2011.4@gmail.com', '$2y$10$i9qoYWmHONygqIhY1TVeLuw0Z72sfhIT0JXpitU4RMMaXySN7jnxe', 1, NULL, 'BgRK2CSdZAdzTcfIw0wi5QTW79CLHoA6VN1TQaOSrc66s1BP26RBnOADDvFd', '2017-09-25 08:54:59', '2017-09-25 08:54:59'),
(2, 'Yimmy Quispe Yujra', 'jin_maxtor@outlook.com', '$2y$10$1MzKoKXfpJRjOeJfnsubyuyEedfwfZDDYpFxYQEhwjXXoJMeX87ru', 1, NULL, 'EZeOw6BrVcTIKI5MoikqbOgON4DLS6rhA4ik4l7FQ36QlHQkQkA3tZv6kZ9t', '2017-10-20 02:47:04', '2017-10-20 02:47:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci`, `nombre`, `paterno`, `materno`, `genero`, `nick`, `correo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'sadfsd', 'marcos', 'pardo', 'ramires', 'masculino', 'carlos12', 'calos@gmail.com', '123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_bancos`
--

CREATE TABLE `usuario_bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_banco` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backup_restores`
--
ALTER TABLE `backup_restores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backup_restores_id_usuario_foreign` (`id_usuario`),
  ADD KEY `backup_restores_id_banco_foreign` (`id_banco`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banco_modulos`
--
ALTER TABLE `banco_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banco_modulos_id_banco_foreign` (`id_banco`),
  ADD KEY `banco_modulos_id_modulo_foreign` (`id_modulo`);

--
-- Indices de la tabla `banco_monedas`
--
ALTER TABLE `banco_monedas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banco_monedas_id_moneda_foreign` (`id_moneda`),
  ADD KEY `banco_monedas_id_banco_foreign` (`id_banco`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cajas_id_sucursal_foreign` (`id_sucursal`);

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cambios_id_moneda_foreign` (`id_moneda`);

--
-- Indices de la tabla `caso_usos`
--
ALTER TABLE `caso_usos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caso_usos_id_menu_foreign` (`id_menu`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_id_banco_foreign` (`id_banco`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuentas_id_tipo_foreign` (`id_tipo`),
  ADD KEY `cuentas_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalles_id_caja_foreign` (`id_caja`);

--
-- Indices de la tabla `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historicos_id_cuenta_foreign` (`id_cuenta`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_id_modulo_foreign` (`id_modulo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_id_cuenta_foreign` (`id_cuenta`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_cus`
--
ALTER TABLE `rol_cus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_cus_id_rol_foreign` (`id_rol`),
  ADD KEY `rol_cus_id_casouso_foreign` (`id_casouso`);

--
-- Indices de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sucursals_id_banco_foreign` (`id_banco`);

--
-- Indices de la tabla `tipo_cuentas`
--
ALTER TABLE `tipo_cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transaccions`
--
ALTER TABLE `transaccions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaccions_id_cuenta_foreign` (`id_cuenta`),
  ADD KEY `transaccions_id_cuenta_destino_foreign` (`id_cuenta_destino`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_banco_foreign` (`id_banco`),
  ADD KEY `users_id_rol_foreign` (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_bancos`
--
ALTER TABLE `usuario_bancos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_bancos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `usuario_bancos_id_banco_foreign` (`id_banco`),
  ADD KEY `usuario_bancos_id_rol_foreign` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backup_restores`
--
ALTER TABLE `backup_restores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `banco_modulos`
--
ALTER TABLE `banco_modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `banco_monedas`
--
ALTER TABLE `banco_monedas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `caso_usos`
--
ALTER TABLE `caso_usos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rol_cus`
--
ALTER TABLE `rol_cus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sucursals`
--
ALTER TABLE `sucursals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_cuentas`
--
ALTER TABLE `tipo_cuentas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `transaccions`
--
ALTER TABLE `transaccions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario_bancos`
--
ALTER TABLE `usuario_bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `backup_restores`
--
ALTER TABLE `backup_restores`
  ADD CONSTRAINT `backup_restores_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `backup_restores_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `banco_modulos`
--
ALTER TABLE `banco_modulos`
  ADD CONSTRAINT `banco_modulos_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banco_modulos_id_modulo_foreign` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `banco_monedas`
--
ALTER TABLE `banco_monedas`
  ADD CONSTRAINT `banco_monedas_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `banco_monedas_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id`);

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `cajas_id_sucursal_foreign` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD CONSTRAINT `cambios_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id`);

--
-- Filtros para la tabla `caso_usos`
--
ALTER TABLE `caso_usos`
  ADD CONSTRAINT `caso_usos_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuentas_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_id_caja_foreign` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historicos`
--
ALTER TABLE `historicos`
  ADD CONSTRAINT `historicos_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_id_modulo_foreign` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_cus`
--
ALTER TABLE `rol_cus`
  ADD CONSTRAINT `rol_cus_id_casouso_foreign` FOREIGN KEY (`id_casouso`) REFERENCES `caso_usos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_cus_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursals`
--
ALTER TABLE `sucursals`
  ADD CONSTRAINT `sucursals_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccions`
--
ALTER TABLE `transaccions`
  ADD CONSTRAINT `transaccions_id_cuenta_destino_foreign` FOREIGN KEY (`id_cuenta_destino`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccions_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`);

--
-- Filtros para la tabla `usuario_bancos`
--
ALTER TABLE `usuario_bancos`
  ADD CONSTRAINT `usuario_bancos_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_bancos_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_bancos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
