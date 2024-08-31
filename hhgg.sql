-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Nov 20, 2022 at 03:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhgg`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `notifications` longtext NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notifications`, `time`, `status`) VALUES
(0, 'Temperature is very high. Low down the temperature.', '2022-10-16 20:30:15', 'seen'),
(0, 'aaaa', '2022-11-06 15:43:19', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `plant_description`
--

CREATE TABLE `plant_description` (
  `plant_Id` int(4) NOT NULL,
  `plant_name` varchar(20) NOT NULL,
  `day_temperature` varchar(20) NOT NULL,
  `day_max_temp` float NOT NULL,
  `day_min_temp` float NOT NULL,
  `night_max_temp` float NOT NULL,
  `night_min_temp` float NOT NULL,
  `night_temperature` varchar(33) NOT NULL,
  `germination_temperature` varchar(20) NOT NULL,
  `germination_time` varchar(20) NOT NULL,
  `growth_time` varchar(35) NOT NULL,
  `plant_spacing` varchar(25) NOT NULL,
  `humidity` varchar(15) NOT NULL,
  `max_humidity` float NOT NULL,
  `min_humidity` float NOT NULL,
  `ph` varchar(15) NOT NULL,
  `max_ph` float NOT NULL,
  `min_ph` float NOT NULL,
  `plant_height` varchar(15) NOT NULL,
  `plant_weidth` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant_description`
--

INSERT INTO `plant_description` (`plant_Id`, `plant_name`, `day_temperature`, `day_max_temp`, `day_min_temp`, `night_max_temp`, `night_min_temp`, `night_temperature`, `germination_temperature`, `germination_time`, `growth_time`, `plant_spacing`, `humidity`, `max_humidity`, `min_humidity`, `ph`, `max_ph`, `min_ph`, `plant_height`, `plant_weidth`) VALUES
(1, 'Tomato', '22-26⁰ C (70-79)', 26, 22, 18, 13, '13-18⁰ C (58-65⁰ F)', '13-18⁰ C (58-65⁰ F)', '4-6 days', '65 to 120 days ', '\\40-60cm (3-5 plants/m2)', '40 – 50%', 5, 4, '5.5-6.5', 6.5, 5.5, '60-180cm', ' 60-80cm'),
(2, 'Strawberries', '65-75⁰ F ', 23.8, 18.6, 12.8, 10, '50-55⁰ F', '40-60⁰ F', '7-21 days', '90 to 120 days after planting', '6 inches', '60 – 75%', 7.5, 6, '5.5 – 6.5', 6.5, 5.5, '25.62cm', '26.97cm'),
(3, 'Pepper', '18-26⁰ C (73-80⁰ F)', 26, 18, 17, 13, '13⁰ C above (not less than 70⁰F)', '75-85⁰ F', '7-10 days', '50 to 80 days after planting', '6 to 8 inches', '55 – 65%', 6.5, 5.5, '6-7', 7, 6, '5-10 cm', '25-38mm');

-- --------------------------------------------------------

--
-- Table structure for table `plant_disease_history`
--

CREATE TABLE `plant_disease_history` (
  `id` int(11) NOT NULL,
  `disease_name` varchar(100) NOT NULL,
  `disease_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant_disease_history`
--

INSERT INTO `plant_disease_history` (`id`, `disease_name`, `disease_date`) VALUES
(0, 'Pepper bell : Bacterial Spot', '06-Nov-2022');

-- --------------------------------------------------------

--
-- Table structure for table `plant_info`
--

CREATE TABLE `plant_info` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(30) NOT NULL,
  `plant_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plant_info`
--

INSERT INTO `plant_info` (`plant_id`, `plant_name`, `plant_description`) VALUES
(110, 'Lotus', 'Lotus is a small plant. It is use to do hydrophonic'),
(111, 'tomato', 'Tomato color is red.The tomato is the edible berry of the plant Solanum lycopersicum,[1][2] commonly known as the tomato plant. The species originated in western South America, Mexico, and Central America.[2][3] The Mexican Nahuatl word tomatl gave rise to the Spanish word tomate, from which the English word tomato derived.[3][4] Its domestication and use as a cultivated food may have originated with the indigenous peoples of Mexico.[2][5] The Aztecs used tomatoes in their cooking at the time of the Spanish conquest of the Aztec Empire, and after the Spanish encountered the tomato for the first time after their contact with the Aztecs, they brought the plant to Europe, in a widespread transfer of plants known as the Columbian exchange. From there, the tomato was introduced to other parts of the European-colonized world during the 16th century.[2]\r\n\r\nTomatoes are a significant source of umami flavor.[6] They are consumed in diverse ways: raw or cooked, and in many dishes, sauces, salads, and drinks. While tomatoes are fruits—botanically classified as berries—they are commonly used culinarily as a vegetable ingredient or side dish.[3]\r\n\r\nNumerous varieties of the tomato plant are widely grown in temperate climates across the world, with greenhouses allowing for the production of tomatoes throughout all seasons of the year. Tomato plants typically grow to 1–3 meters (3–10 ft) in height. They are vines that have a weak stem that sprawls and typically needs support.[2] Indeterminate tomato plants are perennials in their native habitat, but are cultivated as annuals. (Determinate, or bush, plants are annuals that stop growing at a certain height and produce a crop all at once.) The size of the tomato varies according to the cultivar, with a range of 1–10 cm (1⁄2–4 in) in width.[2]');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_history`
--

CREATE TABLE `sensor_history` (
  `id` int(11) NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `data_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensor_history`
--

INSERT INTO `sensor_history` (`id`, `temperature`, `humidity`, `data_time`) VALUES
(0, 28.7, 7, '2022-11-19 18:14:22'),
(0, 28.7, 7, '2022-11-19 18:24:48'),
(0, 28.8, 7, '2022-11-19 18:25:49'),
(0, 28.8, 7, '2022-11-19 18:26:49'),
(0, 28.8, 21, '2022-11-19 18:27:49'),
(0, 28.8, 7, '2022-11-19 18:28:49'),
(0, 28.8, 7, '2022-11-19 18:29:49'),
(0, 28.8, 7, '2022-11-19 18:30:49'),
(0, 28.8, 7, '2022-11-19 18:32:27'),
(0, 29.1, 8, '2022-11-19 18:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_bio`
--

CREATE TABLE `user_bio` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `sure_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `wifi_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_bio`
--

INSERT INTO `user_bio` (`id`, `name`, `first_name`, `sure_name`, `email`, `phone`, `address`, `wifi_name`) VALUES
(0, 'Mashuk Adnan', 'Mashuk', 'Adnan', 'aht@gmail.com', '01000000001', 'bd', 'InCursio'),
(1, 'a', 'a', 'a', 'a', '11', 'sa', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_current_plant`
--

CREATE TABLE `user_current_plant` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_current_plant`
--

INSERT INTO `user_current_plant` (`id`, `plant_id`, `plant_name`) VALUES
(0, 110, 'Lotus');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `password`, `type`) VALUES
(1, 'a', 'a', 'a'),
(0, 'aht@gmail.com', '!@#ASD123', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_plant_history`
--

CREATE TABLE `user_plant_history` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(30) NOT NULL,
  `planting_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_plant_history`
--

INSERT INTO `user_plant_history` (`id`, `plant_id`, `plant_name`, `planting_date`) VALUES
(0, 110, 'Lotus', '14-Oct-2022'),
(0, 111, 'tomato', '14-Oct-2022'),
(0, 110, 'Lotus', '14-Oct-2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD KEY `id` (`id`);

--
-- Indexes for table `plant_description`
--
ALTER TABLE `plant_description`
  ADD PRIMARY KEY (`plant_Id`);

--
-- Indexes for table `plant_disease_history`
--
ALTER TABLE `plant_disease_history`
  ADD KEY `id` (`id`);

--
-- Indexes for table `plant_info`
--
ALTER TABLE `plant_info`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `user_bio`
--
ALTER TABLE `user_bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_current_plant`
--
ALTER TABLE `user_current_plant`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plant_info`
--
ALTER TABLE `plant_info`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
