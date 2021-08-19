-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 05:36:04
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pruebaalumnos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_Alumnos_Grado_Activos` (IN `pGrado` BIGINT)  BEGIN
    SELECT
        `alumno`.`Matricula` AS `Matricula`,
        `alumno`.`Nombre` AS `Nombre`,
        `alumno`.`fechaNacimiento` AS `FNacimiento`,
        `genero`.`Descripcion` AS `Genero`,
        `gradoescolar`.`Descripcion` AS `GradoEscolar`,
        `estatusalumno`.`Descripcion` AS `Estatus_Alumno`
    FROM
        `Alumno`
    INNER JOIN `genero` ON `alumno`.`SexoID` = `genero`.`Id`
    INNER JOIN `gradoescolar` ON `alumno`.`GradoEscolarID` = `gradoescolar`.`Id`
    INNER JOIN `estatusalumno` ON `alumno`.`EstatusID` = `estatusalumno`.`Id`
    WHERE
        `Alumno`.`GRADOESCOLARID` = pGrado 
        AND `Alumno`.`EstatusID` = 1 ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_CargaAlumno` (IN `Matricula` BIGINT)  BEGIN
    SELECT
        `alumno`.`Matricula` AS `Matricula`,
        `alumno`.`Nombre` AS `Nombre`,
        `alumno`.`fechaNacimiento` AS `FNacimiento`,
        `alumno`.`SexoID` AS `SexoID`,
        `alumno`.`GradoEscolarID` AS `GradoEscolarID`,
        `alumno`.`EstatusID` AS `EstatusID`,
        `genero`.`Descripcion` AS `Genero`,
        `gradoescolar`.`Descripcion` AS `GradoEscolar`,
        `estatusalumno`.`Descripcion` AS `Estatus_Alumno`
    FROM
        `Alumno`
    INNER JOIN `genero` ON `alumno`.`SexoID` = `genero`.`Id`
    INNER JOIN `gradoescolar` ON `alumno`.`GradoEscolarID` = `gradoescolar`.`Id`
    INNER JOIN `estatusalumno` ON `alumno`.`EstatusID` = `estatusalumno`.`Id`
    WHERE
        `Alumno`.`Matricula` = Matricula;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_CargaAlumnos` (IN `pGrado` BIGINT)  BEGIN
    SELECT
        `alumno`.`Matricula` AS `Matricula`, `alumno`.`Nombre` AS `Nombre`, `alumno`.`fechaNacimiento` AS `FNacimiento`, `genero`.`Descripcion` AS `Genero`, `gradoescolar`.`Descripcion` AS `GradoEscolar`, `estatusalumno`.`Descripcion` AS `Estatus_Alumno`
    FROM
        `Alumno`
    INNER JOIN `genero` ON `alumno`.`SexoID` = `genero`.`Id`
    INNER JOIN `gradoescolar` ON `alumno`.`GradoEscolarID` = `gradoescolar`.`Id`
    INNER JOIN `estatusalumno` ON `alumno`.`EstatusID` = `estatusalumno`.`Id`
    WHERE `Alumno`.`GradoEscolarID` = pGrado
    ORDER BY
        `alumno`.`Matricula` ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_CargaEstatus` ()  BEGIN
    SELECT
        *
    FROM
        `estatusalumno` ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_CargaGenero` ()  BEGIN
    SELECT
        *
    FROM
        `genero` ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_CargaGradoEscolar` ()  BEGIN
    SELECT
        *
    FROM
        `gradoescolar` ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_Eliminar_Alumno` (IN `pMATRICULA` BIGINT)  BEGIN
    DELETE
FROM
    `Alumno`
WHERE
    MATRICULA = pMATRICULA ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_INS_ALUMNO` (IN `pESTATUSID` BIGINT, IN `pFECHANACIMIENTO` DATE, IN `pFECHA_CREACION` DATE, IN `pGRADOESCOLARID` BIGINT, IN `pNOMBRE` VARCHAR(200), IN `pSEXOID` BIGINT)  BEGIN
    INSERT INTO `alumno`(
        ESTATUSID,
        FECHANACIMIENTO,
        FECHA_CREACION,
        GRADOESCOLARID,
        NOMBRE,
        SEXOID
    )
VALUES(
    pESTATUSID,
    pFECHANACIMIENTO,
    pFECHA_CREACION,
    pGRADOESCOLARID,
    pNOMBRE,
    pSEXOID
) ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_UpdAlumno` (IN `pESTATUSID` BIGINT, IN `pFECHANACIMIENTO` DATE, IN `pFECHA_MODIFICACIÓN` DATE, IN `pGRADOESCOLARID` BIGINT, IN `pMATRICULA` BIGINT, IN `pNOMBRE` VARCHAR(200), IN `pSEXOID` BIGINT)  BEGIN
    UPDATE
        `alumno`
    SET
        ESTATUSID = pESTATUSID,
        FECHANACIMIENTO = pFECHANACIMIENTO,
        FECHA_MODIFICACIÓN = pFECHA_MODIFICACIÓN,
        GRADOESCOLARID = pGRADOESCOLARID,
        NOMBRE = pNOMBRE,
        SEXOID = pSEXOID
    WHERE
        MATRICULA = pMATRICULA ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `Matricula` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `SexoID` bigint(20) UNSIGNED NOT NULL,
  `GradoEscolarID` bigint(20) UNSIGNED NOT NULL,
  `EstatusID` bigint(20) UNSIGNED NOT NULL,
  `Fecha_Creacion` datetime NOT NULL,
  `Fecha_Modificación` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`Matricula`, `Nombre`, `FechaNacimiento`, `SexoID`, `GradoEscolarID`, `EstatusID`, `Fecha_Creacion`, `Fecha_Modificación`) VALUES
(2, 'Enrique Rodriguez Martinez', '2001-09-03', 1, 3, 2, '2021-08-18 00:00:00', NULL),
(3, 'Alberto Gomez Palacios', '0000-00-00', 2, 3, 1, '0000-00-00 00:00:00', '2021-08-19 00:00:00'),
(25, 'Omar Leal Martinez', '2019-08-21', 2, 3, 1, '2021-08-19 00:00:00', NULL),
(27, 'Omar Leal Martinez', '2019-08-21', 2, 3, 1, '2021-08-19 00:00:00', NULL),
(28, 'Omar Leal Martinez', '2019-08-21', 2, 3, 1, '2021-08-19 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatusalumno`
--

CREATE TABLE `estatusalumno` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estatusalumno`
--

INSERT INTO `estatusalumno` (`Id`, `Descripcion`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`Id`, `Descripcion`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gradoescolar`
--

CREATE TABLE `gradoescolar` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gradoescolar`
--

INSERT INTO `gradoescolar` (`Id`, `Descripcion`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto');

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
(1, '2021_08_18_014755_alumno', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`Matricula`),
  ADD KEY `alumno_sexoid_foreign` (`SexoID`),
  ADD KEY `alumno_gradoescolarid_foreign` (`GradoEscolarID`),
  ADD KEY `alumno_estatusid_foreign` (`EstatusID`);

--
-- Indices de la tabla `estatusalumno`
--
ALTER TABLE `estatusalumno`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `gradoescolar`
--
ALTER TABLE `gradoescolar`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `Matricula` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `estatusalumno`
--
ALTER TABLE `estatusalumno`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `gradoescolar`
--
ALTER TABLE `gradoescolar`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_estatusid_foreign` FOREIGN KEY (`EstatusID`) REFERENCES `estatusalumno` (`Id`),
  ADD CONSTRAINT `alumno_gradoescolarid_foreign` FOREIGN KEY (`GradoEscolarID`) REFERENCES `gradoescolar` (`Id`),
  ADD CONSTRAINT `alumno_sexoid_foreign` FOREIGN KEY (`SexoID`) REFERENCES `genero` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
