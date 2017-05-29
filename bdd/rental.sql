-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2017 a las 07:17:41
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(11) NOT NULL,
  `customer_RentersName` varchar(300) NOT NULL,
  `customer_DOB` varchar(300) NOT NULL,
  `customer_Address` varchar(300) NOT NULL,
  `customer_Phone` varchar(300) NOT NULL,
  `customer_City` varchar(300) NOT NULL,
  `customer_State` varchar(300) NOT NULL,
  `customer_ZipCode` varchar(300) NOT NULL,
  `customer_DriverLicense` varchar(300) NOT NULL,
  `customer_DLState` varchar(300) NOT NULL,
  `customer_ExpirationDate` varchar(300) NOT NULL,
  `customer_InsuranceCompany` varchar(300) NOT NULL,
  `customer_Policy` varchar(300) NOT NULL,
  `customer_AdditionalDriver` varchar(300) NOT NULL,
  `customer_DriverLicenseAdditional` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`customer_Id`, `customer_RentersName`, `customer_DOB`, `customer_Address`, `customer_Phone`, `customer_City`, `customer_State`, `customer_ZipCode`, `customer_DriverLicense`, `customer_DLState`, `customer_ExpirationDate`, `customer_InsuranceCompany`, `customer_Policy`, `customer_AdditionalDriver`, `customer_DriverLicenseAdditional`) VALUES
(1, 'Jose Arteaga', 'BOD', 'direccion', '(111) 111-1111', 'city', 'state', '44444', '123456789', '876543217', '', 'company', 'policy', 'driver', 'licencese'),
(2, 'Jose Antonio Arteaga Ceron', 'BOD JOSE', 'Direccion Jose', '(432) 849-1070', 'Dickinson', 'Texas', '77559', '123456781', 'Tx', '06/16/2017', 'Security Company', 'P555', 'Mario Melendez', '555444112'),
(4, 'Jose Arteaga', 'bod Arteaga', 'Casa', '(123) 123-1232', 'Sa', 'stado casa', '123123', '888888888', 'tx', '06/15/2017', 'nsurrance Company', '5545121', 'Mario Melendez', '77787878'),
(5, 'Carlos arteaga', 'bod arteaga', 'adress Arteaga', '(111) 111-1111', 'city Arteaga', 'State Arteaga', '7777', '44444444', 'DlArteaga', '06/08/2017', 'Insurrance Company', 'Policy # 4', 'Jose Arteaga', '44444'),
(6, 'Carlos arteaga', 'bod arteaga', 'adress Arteaga', '(111) 111-1111', 'city Arteaga', 'State Arteaga', '7777', '777777', 'DlArteaga', '06/08/2017', 'Insurrance Company', 'Policy # 4', 'Jose Arteaga', '44444'),
(7, 'Carlos arteaga', 'bod arteaga', 'adress Arteaga', '(111) 111-1111', 'city Arteaga', 'State Arteaga', '7777', '6666611', 'DlArteaga', '06/08/2017', 'Insurrance Company', 'Policy # 4', 'Jose Arteaga', '44444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rental`
--

CREATE TABLE `rental` (
  `rental_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `Rental_Out` varchar(15) NOT NULL,
  `Rental_IN` varchar(15) NOT NULL,
  `Rental_VechicleClass` varchar(300) NOT NULL,
  `Rental_VechicleLicense` varchar(300) NOT NULL,
  `Rental_VechicleYear` varchar(300) NOT NULL,
  `Rental_VehicleMake` varchar(300) NOT NULL,
  `Rental_VechicleModel` varchar(300) NOT NULL,
  `Rental_VehicleMileageOut` int(11) NOT NULL,
  `Rental_VechicleMileageIn` int(11) NOT NULL,
  `Rental_FuelOut` varchar(30) NOT NULL,
  `Rental_FuelIn` varchar(30) NOT NULL,
  `Note_OriginalVehicle` varchar(300) NOT NULL,
  `Notes_DOL` varchar(300) NOT NULL,
  `Notes_Notes` varchar(200) NOT NULL,
  `Charges_Days` int(11) NOT NULL,
  `Charges_weeklyrate` double NOT NULL,
  `Charges_DailyRate` double NOT NULL,
  `Charges_Excess` double NOT NULL DEFAULT '0',
  `Charges_ExcessRate` double NOT NULL,
  `Charges_Repairs` double NOT NULL,
  `Charges_FuelService` double NOT NULL,
  `Charges_Cleaning` double NOT NULL,
  `Charges_Tax` double NOT NULL DEFAULT '0',
  `Charges_PDC` double NOT NULL,
  `Charges_Deposit` double NOT NULL,
  `Charges_Payment` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rental`
--

INSERT INTO `rental` (`rental_id`, `customer_id`, `Rental_Out`, `Rental_IN`, `Rental_VechicleClass`, `Rental_VechicleLicense`, `Rental_VechicleYear`, `Rental_VehicleMake`, `Rental_VechicleModel`, `Rental_VehicleMileageOut`, `Rental_VechicleMileageIn`, `Rental_FuelOut`, `Rental_FuelIn`, `Note_OriginalVehicle`, `Notes_DOL`, `Notes_Notes`, `Charges_Days`, `Charges_weeklyrate`, `Charges_DailyRate`, `Charges_Excess`, `Charges_ExcessRate`, `Charges_Repairs`, `Charges_FuelService`, `Charges_Cleaning`, `Charges_Tax`, `Charges_PDC`, `Charges_Deposit`, `Charges_Payment`) VALUES
(1, 1, '2017-05-10', '2017-05-24', 'vehicle class', 'Vehicle License', 'year', 'make', 'model', 1111, 2222, '1/4', '1/4', 'noteOriginal', 'NoteDOL', 'NoteNotes', 10, 14, 5, 5, 10, 10, 10, 10, 9.54, 44, 7, 4),
(2, 4, '0000-00-00', '0000-00-00', 'Hatachback', 'p33978', '2010', 'kia', 'picanto', 320445, 320500, 'on', 'on', 'dont have 1', 'dol dont have 2', 'notes 3', 14, 0, 10, 1, 35, 10, 10, 10, 18.45, 139.3, 100, 100),
(3, 5, '0000-00-00', '0000-00-00', 'Sedan', 'p33978', '2010', 'Kia', 'picanto', 55555, 66666, '3/4', 'Full', 'dont have', 'dol22', 'noteas notes notes notes', 14, 0, 10, 1, 35, 5, 0, 0, 16.2, 139.3, 250, 10),
(4, 6, '0000-00-00', '0000-00-00', 'Sedan', 'p33978', '2010', 'Kia', 'picanto', 55555, 66666, '3/4', 'Full', 'dont have', 'dol22', 'noteas notes notes notes', 14, 0, 10, 1, 35, 5, 0, 0, 16.2, 139.3, 250, 10),
(5, 7, '0000-00-00', '0000-00-00', 'Sedan', 'p33978', '2010', 'Kia', 'picanto', 55555, 66666, '3/4', 'Full', 'dont have', 'dol22', 'noteas notes notes notes', 14, 0, 10, 1, 35, 5, 0, 0, 16.2, 139.3, 251, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_user` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_user`, `user_password`) VALUES
(1, 'Root', 'root', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indices de la tabla `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `rental`
--
ALTER TABLE `rental`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `rental_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
