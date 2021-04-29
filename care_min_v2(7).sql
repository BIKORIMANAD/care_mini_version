-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 10:52 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care_min_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_consumable`
--

CREATE TABLE `ac_consumable` (
  `actConsumableID` int(11) NOT NULL,
  `ActNameID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `MedecineNameID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ac_name`
--

CREATE TABLE `ac_name` (
  `ActNameID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_name`
--

INSERT INTO `ac_name` (`ActNameID`, `Name`) VALUES
(32, 'Injection IM'),
(33, 'Injection IV'),
(34, 'Actes de perfusion'),
(35, 'Pansement Simple'),
(36, 'Pansement compliquÃ©'),
(37, 'Frein linguale'),
(38, 'SÃ©ringuage'),
(39, 'Suture simple'),
(40, 'Suture compliquÃ©'),
(41, 'Ablation des fils'),
(42, 'Incision d\'abcÃ¨s superficiel'),
(43, 'Extraction simple d\'un corps Ã©tranger'),
(44, 'Extraction d\'une dent de lait'),
(45, 'Extraction d\'une dent dÃ©finitive'),
(46, 'Obturation provisoire'),
(47, 'Obturation definitive'),
(48, 'Detartrage'),
(49, 'Devitarisation'),
(50, 'Reduction de l\'ATM'),
(51, 'Circoncision Therapeutique'),
(52, 'Curage'),
(53, 'Injection Depo Provera'),
(54, 'Insertion DIU'),
(55, 'Ablation DIU'),
(56, 'Insertion Norplan ou Jadelle'),
(57, 'Ablation Norplan ou Jadelle'),
(58, 'Insertion Implant'),
(59, 'Ablation Implant'),
(60, 'Curetage'),
(61, 'Acc. Apres 4 CPN (Acte)'),
(62, 'Acc.eutocique sans Ã©pisiotomie'),
(63, 'Acc.eutocique avec Ã©pisiotomie'),
(64, 'Acc. Dystocique'),
(65, 'AMIU');

-- --------------------------------------------------------

--
-- Table structure for table `ac_price`
--

CREATE TABLE `ac_price` (
  `ActPriceID` int(11) NOT NULL,
  `ActNameID` int(11) NOT NULL,
  `InsuranceCategoryID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_price`
--

INSERT INTO `ac_price` (`ActPriceID`, `ActNameID`, `InsuranceCategoryID`, `Amount`, `Date`, `Status`) VALUES
(171, 32, 2, 60, '2018-07-01', 1),
(172, 32, 3, 138, '2018-07-01', 1),
(173, 32, 5, 207, '2018-07-01', 1),
(174, 32, 4, 150, '2018-07-01', 1),
(175, 32, 1, 173, '2018-07-01', 1),
(176, 33, 2, 90, '2018-07-01', 1),
(177, 33, 3, 207, '2018-07-01', 1),
(178, 33, 5, 311, '2018-07-01', 1),
(179, 33, 4, 225, '2018-07-01', 1),
(180, 33, 1, 259, '2018-07-01', 1),
(181, 34, 2, 90, '2018-07-01', 1),
(182, 34, 3, 207, '2018-07-01', 1),
(183, 34, 5, 311, '2018-07-01', 1),
(184, 34, 4, 225, '2018-07-01', 1),
(185, 34, 1, 259, '2018-07-01', 1),
(186, 35, 2, 300, '2018-07-01', 1),
(187, 35, 3, 690, '2018-07-01', 1),
(188, 35, 5, 1035, '2018-07-01', 1),
(189, 35, 4, 750, '2018-07-01', 1),
(190, 35, 1, 863, '2018-07-01', 1),
(191, 36, 2, 600, '2018-07-01', 1),
(192, 36, 3, 1380, '2018-07-01', 1),
(193, 36, 5, 2070, '2018-07-01', 1),
(194, 36, 4, 1500, '2018-07-01', 1),
(195, 36, 1, 1725, '2018-07-01', 1),
(196, 37, 2, 120, '2018-07-01', 1),
(197, 37, 3, 276, '2018-07-01', 1),
(198, 37, 5, 414, '2018-07-01', 1),
(199, 37, 4, 300, '2018-07-01', 1),
(200, 37, 1, 345, '2018-07-01', 1),
(201, 38, 2, 150, '2018-07-01', 1),
(202, 38, 3, 345, '2018-07-01', 1),
(203, 38, 5, 518, '2018-07-01', 1),
(204, 38, 4, 375, '2018-07-01', 1),
(205, 38, 1, 431, '2018-07-01', 1),
(206, 39, 2, 600, '2018-07-01', 1),
(207, 39, 3, 1380, '2018-07-01', 1),
(208, 39, 5, 2070, '2018-07-01', 1),
(209, 39, 4, 1500, '2018-07-01', 1),
(210, 39, 1, 1725, '2018-07-01', 1),
(211, 40, 2, 900, '2018-07-01', 1),
(212, 40, 3, 2070, '2018-07-01', 1),
(213, 40, 5, 3105, '2018-07-01', 1),
(214, 40, 4, 2250, '2018-07-01', 1),
(215, 40, 1, 2588, '2018-07-01', 1),
(216, 41, 2, 240, '2018-07-01', 1),
(217, 41, 3, 552, '2018-07-01', 1),
(218, 41, 5, 828, '2018-07-01', 1),
(219, 41, 4, 600, '2018-07-01', 1),
(220, 41, 1, 690, '2018-07-01', 1),
(221, 42, 2, 600, '2018-07-01', 1),
(222, 42, 3, 1380, '2018-07-01', 1),
(223, 42, 5, 2070, '2018-07-01', 1),
(224, 42, 4, 1500, '2018-07-01', 1),
(225, 42, 1, 1725, '2018-07-01', 1),
(226, 43, 2, 360, '2018-07-01', 1),
(227, 43, 3, 828, '2018-07-01', 1),
(228, 43, 5, 1242, '2018-07-01', 1),
(229, 43, 4, 900, '2018-07-01', 1),
(230, 43, 1, 1035, '2018-07-01', 1),
(231, 44, 2, 300, '2018-07-01', 1),
(232, 44, 3, 690, '2018-07-01', 1),
(233, 44, 5, 1035, '2018-07-01', 1),
(234, 44, 4, 750, '2018-07-01', 1),
(235, 44, 1, 863, '2018-07-01', 1),
(236, 45, 2, 600, '2018-07-01', 1),
(237, 45, 3, 1380, '2018-07-01', 1),
(238, 45, 5, 2070, '2018-07-01', 1),
(239, 45, 4, 1500, '2018-07-01', 1),
(240, 45, 1, 1725, '2018-07-01', 1),
(241, 46, 2, 1500, '2018-07-01', 1),
(242, 46, 3, 3450, '2018-07-01', 1),
(243, 46, 5, 5175, '2018-07-01', 1),
(244, 46, 4, 3750, '2018-07-01', 1),
(245, 46, 1, 4313, '2018-07-01', 1),
(246, 47, 2, 1800, '2018-07-01', 1),
(247, 47, 3, 4140, '2018-07-01', 1),
(248, 47, 5, 6210, '2018-07-01', 1),
(249, 47, 4, 4500, '2018-07-01', 1),
(250, 47, 1, 5175, '2018-07-01', 1),
(251, 48, 2, 900, '2018-07-01', 1),
(252, 48, 3, 2070, '2018-07-01', 1),
(253, 48, 5, 3105, '2018-07-01', 1),
(254, 48, 4, 2250, '2018-07-01', 1),
(255, 48, 1, 2588, '2018-07-01', 1),
(256, 49, 2, 900, '2018-07-01', 1),
(257, 49, 3, 2070, '2018-07-01', 1),
(258, 49, 5, 3105, '2018-07-01', 1),
(259, 49, 4, 2250, '2018-07-01', 1),
(260, 49, 1, 2588, '2018-07-01', 1),
(261, 50, 2, 1200, '2018-07-01', 1),
(262, 50, 3, 2760, '2018-07-01', 1),
(263, 50, 5, 4140, '2018-07-01', 1),
(264, 50, 4, 3000, '2018-07-01', 1),
(265, 50, 1, 3450, '2018-07-01', 1),
(266, 51, 2, 2500, '2018-07-01', 1),
(267, 51, 3, 3450, '2018-07-01', 1),
(268, 51, 5, 5175, '2018-07-01', 1),
(269, 51, 4, 3750, '2018-07-01', 1),
(270, 51, 1, 4313, '2018-07-01', 1),
(271, 52, 2, 300, '2018-07-01', 1),
(272, 52, 3, 633, '2018-07-01', 1),
(273, 52, 5, 1035, '2018-07-01', 1),
(274, 52, 4, 688, '2018-07-01', 1),
(275, 52, 1, 863, '2018-07-01', 1),
(276, 53, 2, 500, '2018-07-01', 1),
(277, 53, 3, 575, '2018-07-01', 1),
(278, 53, 5, 827, '2018-07-01', 1),
(279, 53, 4, 625, '2018-07-01', 1),
(280, 53, 1, 719, '2018-07-01', 1),
(281, 54, 2, 1500, '2018-07-01', 1),
(282, 54, 3, 2588, '2018-07-01', 1),
(283, 54, 5, 5520, '2018-07-01', 1),
(284, 54, 4, 2813, '2018-07-01', 1),
(285, 54, 1, 3234, '2018-07-01', 1),
(286, 55, 2, 1500, '2018-07-01', 1),
(287, 55, 3, 2588, '2018-07-01', 1),
(288, 55, 5, 5520, '2018-07-01', 1),
(289, 55, 4, 2813, '2018-07-01', 1),
(290, 55, 1, 3234, '2018-07-01', 1),
(291, 56, 2, 1000, '2018-07-01', 1),
(292, 56, 3, 1725, '2018-07-01', 1),
(293, 56, 5, 5520, '2018-07-01', 1),
(294, 56, 4, 1875, '2018-07-01', 1),
(295, 56, 1, 2156, '2018-07-01', 1),
(296, 57, 2, 1000, '2018-07-01', 1),
(297, 57, 3, 1725, '2018-07-01', 1),
(298, 57, 5, 5520, '2018-07-01', 1),
(299, 57, 4, 1875, '2018-07-01', 1),
(300, 57, 1, 2156, '2018-07-01', 1),
(301, 58, 2, 1000, '2018-07-01', 1),
(302, 58, 3, 1725, '2018-07-01', 1),
(303, 58, 5, 5520, '2018-07-01', 1),
(304, 58, 4, 1875, '2018-07-01', 1),
(305, 58, 1, 2156, '2018-07-01', 1),
(306, 59, 2, 1000, '2018-07-01', 1),
(307, 59, 3, 1725, '2018-07-01', 1),
(308, 59, 5, 5520, '2018-07-01', 1),
(309, 59, 4, 1875, '2018-07-01', 1),
(310, 59, 1, 2156, '2018-07-01', 1),
(311, 60, 2, 720, '2018-07-01', 1),
(312, 60, 3, 1518, '2018-07-01', 1),
(313, 60, 5, 2484, '2018-07-01', 1),
(314, 60, 4, 1650, '2018-07-01', 1),
(315, 60, 1, 2070, '2018-07-01', 1),
(316, 61, 2, 1200, '2018-07-01', 1),
(317, 61, 3, 2700, '2018-07-01', 1),
(318, 61, 5, 4140, '2018-07-01', 1),
(319, 61, 4, 3000, '2018-07-01', 1),
(320, 61, 1, 3450, '2018-07-01', 1),
(321, 62, 2, 900, '2018-07-01', 1),
(322, 62, 3, 1898, '2018-07-01', 1),
(323, 62, 5, 3105, '2018-07-01', 1),
(324, 62, 4, 2063, '2018-07-01', 1),
(325, 62, 1, 2588, '2018-07-01', 1),
(326, 63, 2, 1200, '2018-07-01', 1),
(327, 63, 3, 2530, '2018-07-01', 1),
(328, 63, 5, 4140, '2018-07-01', 1),
(329, 63, 4, 2750, '2018-07-01', 1),
(330, 63, 1, 3450, '2018-07-01', 1),
(331, 64, 2, 1500, '2018-07-01', 1),
(332, 64, 3, 3163, '2018-07-01', 1),
(333, 64, 5, 5175, '2018-07-01', 1),
(334, 64, 4, 3438, '2018-07-01', 1),
(335, 64, 1, 4313, '2018-07-01', 1),
(336, 65, 2, 420, '2018-07-01', 1),
(337, 65, 3, 690, '2018-07-01', 1),
(338, 65, 5, 1035, '2018-07-01', 1),
(339, 65, 4, 750, '2018-07-01', 1),
(340, 65, 1, 863, '2018-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ac_records`
--

CREATE TABLE `ac_records` (
  `ActRecordID` int(11) NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `ActPriceID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '1',
  `Date` date NOT NULL,
  `NurseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_cell`
--

CREATE TABLE `ad_cell` (
  `CellID` int(11) NOT NULL,
  `CellName` varchar(255) NOT NULL,
  `SectorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_district`
--

CREATE TABLE `ad_district` (
  `DistrictID` int(11) NOT NULL,
  `DistrictName` varchar(255) NOT NULL,
  `ProvinceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_sector`
--

CREATE TABLE `ad_sector` (
  `SectorID` int(11) NOT NULL,
  `SectorName` varchar(255) NOT NULL,
  `DistrictID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ad_village`
--

CREATE TABLE `ad_village` (
  `ViillageID` int(11) NOT NULL,
  `VillageName` varchar(255) NOT NULL,
  `CellID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `am_records`
--

CREATE TABLE `am_records` (
  `AmbulanceRecordID` int(11) NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `Length` double NOT NULL,
  `MedicalDocument` varchar(255) NOT NULL,
  `ConsultationDocument` varchar(255) NOT NULL,
  `Ordonance` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_acts`
--

CREATE TABLE `auto_acts` (
  `AutoActID` int(11) NOT NULL,
  `ActNameID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_diagnostic`
--

CREATE TABLE `auto_diagnostic` (
  `AutoActID` int(11) NOT NULL,
  `DiagnosticID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_exams`
--

CREATE TABLE `auto_exams` (
  `AutoActID` int(11) NOT NULL,
  `ResultID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_medicines`
--

CREATE TABLE `auto_medicines` (
  `AutoActID` int(11) NOT NULL,
  `MedecineNameID` int(11) NOT NULL,
  `PrescriptionID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auto_nedicines_condition`
--

CREATE TABLE `auto_nedicines_condition` (
  `AutoActID` int(11) NOT NULL,
  `MedecineNameID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `ConditionValue` varchar(255) NOT NULL,
  `ConditionSign` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cn_name`
--

CREATE TABLE `cn_name` (
  `MedecineNameID` int(11) NOT NULL,
  `MedecineName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cn_name`
--

INSERT INTO `cn_name` (`MedecineNameID`, `MedecineName`) VALUES
(1, 'abaisse langue'),
(2, 'alcool denature'),
(3, 'bande de crepe avec attaches'),
(4, 'bande de gaze'),
(5, 'bande Ã©lastique'),
(6, 'catgut'),
(7, 'catheter g18'),
(8, 'catheter g20'),
(9, 'catheter g22'),
(10, 'catheter g24'),
(11, 'cetrimide 15%   chlorhexidine 1.5%'),
(12, 'compresse'),
(13, 'chloramine - dakin'),
(14, 'eau de javel'),
(15, 'ficelle ombilicale'),
(16, 'fil de suture non resorbable'),
(17, 'gant non sterile - paire'),
(18, 'gant sterile - paire'),
(19, 'gaze hydrophile - rlx'),
(20, 'giemsa 0.5l'),
(21, 'huile a immersion 100ml'),
(22, 'lamelle d\'examen'),
(23, 'lancette'),
(24, 'lame bistouri'),
(25, 'lamelles d\'examen'),
(26, 'lames d\'examen'),
(27, 'lancettes'),
(28, 'ouate - coton hydrophile'),
(29, 'povidone 10% - 200 ml'),
(30, 'povidone - prescription'),
(31, 'sachets'),
(32, 'seringue 2 ml et 23g'),
(33, 'seringue 5 ml et 21g'),
(34, 'seringue 10 ml et 20.5g'),
(35, 'seringue 50 ml pour seringage'),
(36, 'sonde d\'aspiration'),
(37, 'sonde vesicale de foley'),
(38, 'sparadrap'),
(39, 'tests de grossesse'),
(40, 'tests glucose et albumine'),
(41, 'thermometre'),
(42, 'trousse de perfusion'),
(43, 'tulle gras'),
(44, 'thermometre digital'),
(45, 'Glucometer test strips for sd cc');

-- --------------------------------------------------------

--
-- Table structure for table `cn_price`
--

CREATE TABLE `cn_price` (
  `MedecinePriceID` int(11) NOT NULL,
  `MedecineNameID` int(11) NOT NULL,
  `BuyingPrice` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Emballage` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cn_price`
--

INSERT INTO `cn_price` (`MedecinePriceID`, `MedecineNameID`, `BuyingPrice`, `Amount`, `Date`, `Status`, `Emballage`) VALUES
(579, 45, 312, 374.4, '2018-07-01', 1, 0),
(580, 1, 7.7, 9.2, '2018-07-01', 1, 0),
(581, 2, 3932.4, 4718.9, '2018-07-01', 1, 0),
(582, 3, 2837, 3404.4, '2018-07-01', 1, 0),
(583, 4, 107.7, 129.2, '2018-07-01', 1, 0),
(584, 5, 336, 403.2, '2018-07-01', 1, 0),
(585, 6, 320, 384, '2018-07-01', 1, 0),
(586, 7, 156.3, 187.6, '2018-07-01', 1, 0),
(587, 8, 106.8, 128.2, '2018-07-01', 1, 0),
(588, 9, 154.2, 185, '2018-07-01', 1, 0),
(589, 10, 125.3, 150.4, '2018-07-01', 1, 0),
(590, 11, 3227, 3872.4, '2018-07-01', 1, 0),
(591, 12, 71.6, 85.9, '2018-07-01', 1, 0),
(592, 13, 6.2, 7.4, '2018-07-01', 1, 0),
(593, 14, 111.67, 133.97, '2018-07-01', 1, 0),
(594, 15, 89, 106.8, '2018-07-01', 1, 0),
(595, 16, 975, 1170, '2018-07-01', 1, 0),
(596, 17, 57.6, 69.1, '2018-07-01', 1, 0),
(597, 18, 161.02, 193.22, '2018-07-01', 1, 0),
(598, 19, 13986.89, 16784.29, '2018-07-01', 1, 0),
(599, 20, 14400, 17280, '2018-07-01', 1, 0),
(600, 21, 13800, 16560, '2018-07-01', 1, 0),
(601, 22, 9.36, 11.26, '2018-07-01', 1, 0),
(602, 23, 18, 21.6, '2018-07-01', 1, 0),
(603, 24, 45.5, 54.6, '2018-07-01', 1, 0),
(604, 25, 14.4, 17.3, '2018-07-01', 1, 0),
(605, 26, 87.6, 105.1, '2018-07-01', 1, 0),
(606, 27, 10.8, 13, '2018-07-01', 1, 0),
(607, 28, 2378, 2853.6, '2018-07-01', 1, 0),
(608, 29, 1963, 2355.6, '2018-07-01', 1, 0),
(609, 30, 0, 0, '2018-07-01', 1, 0),
(610, 31, 9.3, 11.2, '2018-07-01', 1, 0),
(611, 32, 34.1, 40.9, '2018-07-01', 1, 0),
(612, 33, 30.2, 36.2, '2018-07-01', 1, 0),
(613, 34, 46.6, 55.9, '2018-07-01', 1, 0),
(614, 35, 240, 288, '2018-07-01', 1, 0),
(615, 36, 192, 230.4, '2018-07-01', 1, 0),
(616, 37, 431.9, 518.3, '2018-07-01', 1, 0),
(617, 38, 34356, 41227.2, '2018-07-01', 1, 0),
(618, 39, 44.4, 53.3, '2018-07-01', 1, 0),
(619, 40, 90, 108, '2018-07-01', 1, 0),
(620, 41, 282, 338.4, '2018-07-01', 1, 0),
(621, 42, 105.4, 126.5, '2018-07-01', 1, 0),
(622, 43, 102, 122.4, '2018-07-01', 1, 0),
(623, 44, 1800, 2160, '2018-07-01', 1, 0),
(624, 45, 312, 374.4, '2018-08-08', 1, 0),
(625, 1, 50, 60, '2018-08-08', 1, 0),
(626, 2, 3932.4, 4718.9, '2018-08-08', 1, 0),
(627, 3, 2837, 3404.4, '2018-08-08', 1, 0),
(628, 4, 107.7, 129.2, '2018-08-08', 1, 0),
(629, 5, 336, 403.2, '2018-08-08', 1, 0),
(630, 6, 320, 384, '2018-08-08', 1, 0),
(631, 7, 156.3, 187.6, '2018-08-08', 1, 0),
(632, 8, 106.8, 128.2, '2018-08-08', 1, 0),
(633, 9, 154.2, 185, '2018-08-08', 1, 0),
(634, 10, 125.3, 150.4, '2018-08-08', 1, 0),
(635, 11, 5940, 7128, '2018-08-08', 1, 0),
(636, 12, 71.6, 85.9, '2018-08-08', 1, 0),
(637, 13, 25.2, 30.2, '2018-08-08', 1, 0),
(638, 14, 111.67, 133.97, '2018-08-08', 1, 0),
(639, 15, 89, 106.8, '2018-08-08', 1, 0),
(640, 16, 975, 1170, '2018-08-08', 1, 0),
(641, 17, 57.6, 69.1, '2018-08-08', 1, 0),
(642, 18, 161.02, 193.22, '2018-08-08', 1, 0),
(643, 19, 13986.89, 16784.29, '2018-08-08', 1, 0),
(644, 20, 14400, 17280, '2018-08-08', 1, 0),
(645, 21, 13800, 16560, '2018-08-08', 1, 0),
(646, 22, 9.36, 11.26, '2018-08-08', 1, 0),
(647, 23, 18, 21.6, '2018-08-08', 1, 0),
(648, 24, 45.5, 54.6, '2018-08-08', 1, 0),
(649, 25, 14.4, 17.3, '2018-08-08', 1, 0),
(650, 26, 87.6, 105.1, '2018-08-08', 1, 0),
(651, 27, 10.8, 13, '2018-08-08', 1, 0),
(652, 28, 2378, 2853.6, '2018-08-08', 1, 0),
(653, 29, 1963, 2355.6, '2018-08-08', 1, 0),
(654, 30, 0, 0, '2018-08-08', 1, 0),
(655, 31, 9.3, 11.2, '2018-08-08', 1, 0),
(656, 32, 34.1, 40.9, '2018-08-08', 1, 0),
(657, 33, 50.2, 60.2, '2018-08-08', 1, 0),
(658, 34, 50.6, 60.7, '2018-08-08', 1, 0),
(659, 35, 240, 288, '2018-08-08', 1, 0),
(660, 36, 192, 230.4, '2018-08-08', 1, 0),
(661, 37, 431.9, 518.3, '2018-08-08', 1, 0),
(662, 38, 34356, 41227.2, '2018-08-08', 1, 0),
(663, 39, 44.4, 53.3, '2018-08-08', 1, 0),
(664, 40, 90, 108, '2018-08-08', 1, 0),
(665, 41, 282, 338.4, '2018-08-08', 1, 0),
(666, 42, 105.4, 126.5, '2018-08-08', 1, 0),
(667, 43, 102, 122.4, '2018-08-08', 1, 0),
(668, 44, 1800, 2160, '2018-08-08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cn_records`
--

CREATE TABLE `cn_records` (
  `ConsumableRecordID` int(11) NOT NULL,
  `MedecinePriceID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Facture` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_category`
--

CREATE TABLE `co_category` (
  `ConsultationCategoryID` int(11) NOT NULL,
  `ConsultationCategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_category`
--

INSERT INTO `co_category` (`ConsultationCategoryID`, `ConsultationCategoryName`) VALUES
(10, 'CPC Jour'),
(11, 'CPC Nuit/WE'),
(12, 'CPN'),
(13, 'PF'),
(14, 'Nutrition'),
(15, 'invisible'),
(16, 'CPC Jour Ferier');

-- --------------------------------------------------------

--
-- Table structure for table `co_diagnostic`
--

CREATE TABLE `co_diagnostic` (
  `DiagnosticID` int(11) NOT NULL,
  `DiagnosticName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `English` varchar(255) NOT NULL,
  `DiagnosticCode` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `PECIME` int(11) NOT NULL DEFAULT '0',
  `DiagnosticCategoryID` int(11) NOT NULL DEFAULT '1',
  `Reported` int(11) NOT NULL DEFAULT '1' COMMENT '1. for reported and 0. for unreported',
  `SISCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_diagnostic`
--

INSERT INTO `co_diagnostic` (`DiagnosticID`, `DiagnosticName`, `English`, `DiagnosticCode`, `Code`, `PECIME`, `DiagnosticCategoryID`, `Reported`, `SISCode`) VALUES
(1, 'FiÃ¨vres â‰¥ 37,5oC', '', '', '', 0, 1, 1, 'fv'),
(2, 'DiarrhÃ©e non sanglante avec dÃ©shydratation', '', '', 'A09.1', 0, 1, 1, 'I14'),
(3, 'DiarrhÃ©e non sanglante sans dÃ©shydratation', '', '', 'A09.2', 0, 1, 1, 'I13'),
(4, 'DiarrhÃ©e sanglante (dysenterie)', '', '', 'A09.3', 0, 1, 1, 'I18'),
(5, 'Intoxication alimentaire', '', '', 'A05', 0, 1, 1, 'I7'),
(6, 'Infection de lâ€™oreille', '', '', 'H65', 0, 1, 1, 'O1'),
(7, 'Schistosomiase', '', '', 'B65', 0, 1, 1, 'la'),
(8, 'Ascaris lumbricoides', '', '', 'B77', 0, 1, 1, 'la'),
(9, 'Trichuristrichiura', '', '', 'B79', 0, 1, 1, 'la'),
(10, 'Ankylostome', '', '', 'B76', 0, 1, 1, 'la'),
(11, 'Entamoeba', '', '', 'A06', 0, 1, 1, 'la'),
(12, 'Giardia', '', '', 'A07', 0, 1, 1, 'la'),
(13, 'TÃ©nia', '', '', 'B68', 0, 1, 1, 'la'),
(14, 'Elephantiasis (imidido/ibitimbo)', '', '', 'B74 B89', 0, 1, 1, ''),
(15, 'Tungiasis (Chiques)', '', '', 'B88.1', 0, 1, 1, ''),
(16, 'Paludisme simple confirmÃ© (pas femme enceinte)', '', '', 'B53.8', 0, 1, 1, 'M1'),
(17, 'Paludisme simple confirmÃ© avec troubles digestifs mineurs (pas femme enceinte)', '', '', 'B53.8.0', 0, 1, 1, 'M2'),
(18, 'Paludisme prÃ©sumÃ©', '', '', 'B54', 0, 1, 1, ''),
(19, 'Herpes simplex infections', '', '', 'B00.9', 0, 1, 1, 'D6'),
(20, 'MÃ©ningite Suspect', '', '', 'G03.9', 0, 1, 1, 'I26'),
(21, 'Pneumonie', '', '', 'J18.9', 0, 1, 1, 'R5'),
(22, 'Infection aigues des voies respiratoires (IRA) autres', '', '', 'J22 J06.9', 0, 1, 1, 'R2;R3;R4'),
(23, 'Gastrite et DuodÃ©nite', '', '', 'K29.9', 0, 1, 1, 'I11'),
(24, 'AbcÃ¨s', '', '', 'L02.9', 0, 1, 1, 'E4'),
(25, 'UlcÃ¨res cutanÃ©s', '', '', 'L89', 0, 1, 1, 'D5'),
(26, 'Infection CutanÃ©e - Gale', '', '', 'B86', 0, 1, 1, 'D2'),
(27, 'Infection CutanÃ©e - Mycoses Superficielles', '', '', 'B36.9', 0, 1, 1, 'D1'),
(28, 'Infection CutanÃ©es - Autres', '', '', 'L00 L08', 0, 1, 1, 'D3'),
(29, 'Infection des voies urinaires', '', '', 'N39.0', 0, 1, 1, 'I24'),
(30, 'AnÃ©mie (confirmÃ©e)', '', '', 'D64.9', 0, 1, 1, 'I4;I5;G5'),
(31, 'Paralysie flasque aigÃ¼e (polio suspect)', '', '', 'A80', 0, 1, 1, 'E12'),
(32, 'ProblÃ¨mes gynÃ©cologiques', '', '', 'N94.9', 0, 2, 1, ''),
(33, 'Tuberculoses pulmonaire Ã  microscopie positive', '', '', 'A15.0', 0, 2, 1, ''),
(34, 'Toux Chronique (>15 jours)', '', '', 'B23.8', 0, 2, 1, ''),
(35, 'SIDA clinique', '', '', 'B24', 0, 2, 1, ''),
(36, 'Dermatose gÃ©nÃ©ralisÃ©e due au Sida', '', '', 'B23.0', 0, 2, 1, ''),
(37, 'Herpes Zoster (Zona / shingles)', '', '', 'B23.8', 0, 2, 1, ''),
(38, 'Candidoses oral', '', '', 'B20.4', 0, 2, 1, ''),
(39, 'FiÃ¨vre Chronique (> 1 mois)', '', '', 'B23.8', 0, 2, 1, ''),
(40, 'DiarrhÃ©e Chronique due au Sida', '', '', 'K52.9', 0, 2, 1, ''),
(41, 'Blessures dues aux aiguilles (et autres exposition professionnelle aux VIH)', '', '', 'W46', 0, 2, 1, ''),
(42, 'CÃ©citÃ© Nocturne â€“ carence en Vitamine A', '', '', 'E50.4', 0, 2, 1, ''),
(43, 'Affection oculaire - Erreur de rÃ©fraction', '', '', 'H52.7', 0, 3, 1, 'O4'),
(44, 'Affection oculaire - Conjonctivite', '', '', 'H10.9', 0, 3, 1, 'O3'),
(45, 'Affection oculaire - Autre', '', '', 'H57.9', 0, 3, 1, 'O5'),
(46, 'Carie dentaire', '', '', 'K02', 0, 3, 1, 'B1'),
(47, 'Maladies pÃ©riodontales', '', '', 'K05', 0, 3, 1, ''),
(48, 'Autres Infections des dents et de gencives', '', '', 'K29.9', 0, 3, 1, 'B3'),
(49, 'Infection BactÃ©rienne, sÃ©vÃ¨re ou grave (septicÃ©mie)', '', '', '', 1, 4, 1, 'I23'),
(50, 'Infection BactÃ©rienne locale', '', '', '', 1, 4, 1, 'I22'),
(51, 'Hypothermie modÃ©rÃ©e', '', '', '', 1, 4, 1, 'P1'),
(52, 'PrÃ©maturitÃ©', '', '', '', 1, 4, 1, 'P2'),
(53, 'Insuffisance pondÃ©rale sÃ©vÃ¨re Ã  la naissance (< 1,5 kg)', '', '', '', 1, 4, 1, 'P3'),
(54, 'Insuffisance pondÃ©rale modÃ©rÃ©e Ã  la naissance (1,5 - 2,5 kg)', '', '', '', 1, 4, 1, 'P4'),
(55, 'ProblÃ¨mes dâ€™alimentation', '', '', '', 1, 4, 1, 'I2'),
(56, 'Conjonctivite purulente du nouveau nÃ© ou autre', '', '', '', 1, 4, 1, 'P5'),
(57, 'Gonococcie oculaire (probable)', '', '', '', 1, 4, 1, 'P7'),
(58, 'ProblÃ¨mes oculaires, autres', '', '', '', 1, 4, 1, 'O5'),
(59, 'DiarrhÃ©e avec dÃ©shydratation sÃ©vÃ¨re', '', '', '', 1, 4, 1, 'I15'),
(60, 'DiarrhÃ©e avec des signes Ã©vidents de dÃ©shydratation', '', '', '', 1, 4, 1, 'I14'),
(61, 'DiarrhÃ©e sans dÃ©shydratation', '', '', '', 1, 4, 1, 'I13'),
(62, 'DiarrhÃ©e sanglante (dysenterie)', '', '', '', 1, 4, 1, 'I18'),
(63, 'DiarrhÃ©e persistante', '', '', '', 1, 4, 1, 'I16'),
(64, 'DiarrhÃ©e persistante sÃ©vÃ¨re', '', '', '', 1, 4, 1, 'I17'),
(65, 'Infection VIH confirmÃ©e', '', '', '', 1, 4, 1, ''),
(66, 'Infection VIH probable ou suspect', '', '', '', 1, 4, 1, ''),
(67, 'Infection VIH possible', '', '', '', 1, 4, 1, ''),
(68, 'Pneumonie sÃ©vÃ¨re ou maladie respiratoire grave', '', '', '', 1, 4, 1, 'R6'),
(69, 'Pneumonie', '', '', '', 1, 4, 1, 'R5'),
(70, 'Toux ou rhume, autres infections respiratoires (IRA) sans pneumonie', '', '', '', 1, 4, 1, 'R2;R3;R4'),
(71, 'Paludisme grave (confirmÃ©e)', '', '', '', 1, 4, 1, 'M3'),
(72, 'FiÃ¨vre grave (plasmodium nÃ©gative)', '', '', '', 1, 4, 1, 'la'),
(73, 'Paludisme simple (confirmÃ©e)', '', '', '', 1, 4, 1, 'M1'),
(74, 'MastoÃ¯dite', '', '', '', 1, 4, 1, 'P6'),
(75, 'Infection aigue de lâ€™oreille', '', '', '', 1, 4, 1, 'O1'),
(76, 'Infection chronique de lâ€™oreille', '', '', '', 1, 4, 1, 'O2'),
(77, 'AnÃ©mie sÃ©vÃ¨re', '', '', '', 1, 4, 1, 'I5'),
(78, 'AnÃ©mie simple', '', '', '', 1, 4, 1, 'I4'),
(79, 'Rougeole sÃ©vÃ¨re compliquÃ©e (prÃ©sumÃ©e)', '', '', '', 1, 5, 1, 'I31'),
(80, 'Rougeole avec complications aux yeux et/ou bouche (prÃ©sumÃ©e)', '', '', '', 1, 5, 1, 'I30'),
(81, 'Rougeole sans complications (prÃ©sumÃ©e)', '', '', '', 1, 5, 1, 'I29'),
(82, 'Rougeole confirmÃ©e', '', '', '', 1, 5, 1, 'I28'),
(83, 'RubÃ©ole confirmÃ©e', '', '', '', 1, 5, 1, 'I32'),
(84, 'Infection CutanÃ©e - Gale', '', '', '', 1, 5, 1, 'D2'),
(85, 'Infection CutanÃ©e - Mycose Superficielle', '', '', '', 1, 5, 1, 'D1'),
(86, 'Infection CutanÃ©e - Autre', '', '', '', 1, 5, 1, 'D3'),
(87, 'Parasitose Intestinale', '', '', '', 1, 5, 1, 'I10'),
(88, 'Infection des dents et de gencives', '', '', '', 1, 5, 1, 'B3'),
(89, 'Infection des voies urinaires', '', '', '', 1, 5, 1, 'I24'),
(90, 'Intoxication alimentaire', '', '', '', 1, 5, 1, 'I7'),
(91, 'Fracture', '', '', '', 1, 5, 1, 'E6'),
(92, 'Traumatisme Physique, autre que Fracture', '', '', '', 1, 5, 1, 'E1'),
(93, 'CÃ©citÃ© Nocturne â€“ carence en Vitamine A', '', '', '', 1, 5, 1, 'O6'),
(94, 'Paralysie flasque aigÃ¼e (polio suspect)', '', '', '', 1, 5, 1, 'E12'),
(95, 'Troubles Psychologiques/mentaux', '', '', 'FXX.9', 0, 6, 1, 'S1'),
(96, 'Epilepsie', '', '', 'G40.9', 0, 6, 1, 'S2'),
(97, 'Suicide (Tentative ou RÃ©ussie)', '', '', 'X84', 0, 6, 1, 'S3'),
(98, 'Hypertension', '', '', 'I10 I15', 0, 7, 1, 'C1'),
(99, 'Asthme', '', '', 'J45 J46', 0, 7, 1, 'C2'),
(100, 'Broncho-pneumopathie chronique', '', '', 'J44 J47', 0, 7, 1, 'C3'),
(101, 'DiabÃ¨te - Type 1', '', '', 'E10', 0, 7, 1, 'C4'),
(102, 'DiabÃ¨te - Type 2', '', '', 'E11', 0, 7, 1, 'C5'),
(103, 'DiabÃ¨te gestationnaire', '', '', 'O24', 0, 7, 1, 'C6'),
(104, 'Cardiomyopathie', '', '', 'I42', 0, 8, 1, 'C7'),
(105, 'Infarctus ou hÃ©morragie cÃ©rÃ©brale', '', '', 'G45, I60-I64', 0, 8, 1, 'C8'),
(106, 'Cardiopathie rhumatismale', '', '', 'I05-I09', 0, 8, 1, 'C9'),
(107, 'Cardiopathie congÃ©nitale', '', '', 'Q20-Q28', 0, 8, 1, 'C10'),
(108, 'Maladie de l\'artÃ¨re coronaire', '', '', 'I25.1', 0, 8, 1, 'C11'),
(109, 'Maladie pÃ©ricardique', '', '', 'I30-I31', 0, 8, 1, 'C12'),
(110, 'Insuffisance cardiaque globale', '', '', 'I50, I11.0, I97.1, P29.0', 0, 8, 1, 'C13'),
(111, 'Autre maladie cardiovasculaire', '', '', 'I51.6', 0, 8, 1, 'C14'),
(112, 'Maladie post-chirurgie', '', '', 'NA', 0, 8, 1, 'C15'),
(113, 'Insuffisance rÃ©nale', '', '', 'N17-N19', 0, 8, 1, 'C16'),
(114, 'Autres Maladies Cardiovasculaires et RÃ©nale', '', '', 'N00-N08, N10-N16, N20-N23, N25-N29', 0, 8, 1, 'C17'),
(115, 'Blessures cause par la circulation routiÃ¨re (dont vÃ©lo)', '', '', 'S00-T98', 0, 9, 1, ''),
(116, 'Auto-mutilation', '', '', 'S00-T98', 0, 9, 1, ''),
(117, 'Violence interpersonnelle', '', '', 'S00-T98', 0, 9, 1, ''),
(118, 'Autre blessure intentionnelle', '', '', 'S00-T98', 0, 9, 1, ''),
(119, 'Chute', '', '', 'S00-T98', 0, 9, 1, ''),
(120, 'Noyade', '', '', 'S00-T98', 0, 9, 1, ''),
(121, 'Incendie/brÃ»lure  (thermique, Ã©lectrique, chimique)', '', '', 'T20-T32', 0, 9, 1, ''),
(122, 'Contact avec Animal', '', '', 'S00-T98', 0, 9, 1, ''),
(123, 'Intoxication', '', '', 'T35-T50', 0, 9, 1, ''),
(124, 'CalamitÃ© (Catastrophe naturelle)', '', '', 'S00-T98', 0, 9, 1, ''),
(125, 'Cephalee', '', '', '', 0, 10, 1, ''),
(126, 'Paludisme simple confirme sur la glossesse', '', '', '', 0, 10, 1, ''),
(127, 'infection Intestinale', '', '', '', 0, 10, 1, ''),
(128, 'parasitose intestinale', '', '', '', 0, 10, 1, ''),
(129, 'RAA', '', '', '', 0, 10, 1, ''),
(130, 'Plaie', '', '', '', 0, 10, 1, ''),
(131, 'IRA', '', '', '', 0, 10, 1, ''),
(132, 'URTI', '', '', '', 0, 10, 1, ''),
(133, 'Reutalyie', '', '', '', 0, 10, 1, ''),
(134, 'Ecoulant Noginal', '', '', '', 0, 10, 1, ''),
(135, 'otite', '', '', '', 0, 10, 1, ''),
(136, 'headache', '', '', '', 0, 10, 1, ''),
(137, 'Tromatisme Physique', '', '', '', 0, 10, 1, ''),
(138, 'IVRI', '', '', '', 0, 10, 1, ''),
(139, 'TRAUMATISME PHYSIQUE', '', '', '', 0, 10, 1, ''),
(140, 'Gastrite, Otite', '', '', '', 0, 10, 1, ''),
(141, 'ivri', '', '', '', 1, 10, 1, ''),
(142, 'GASTRITE', '', '', '', 0, 10, 1, ''),
(143, '1ER PANSEMENT', '', '', '', 0, 10, 1, ''),
(144, 'URM', '', '', '', 0, 10, 1, ''),
(145, 'LOMBALGIE', '', '', '', 0, 10, 1, ''),
(146, 'Dermatose', '', '', '', 0, 10, 1, ''),
(147, 'ABA', '', '', '', 0, 10, 1, ''),
(148, 'ANGINE', '', '', '', 0, 10, 1, ''),
(149, 'ABCES', '', '', '', 1, 10, 1, ''),
(150, 'ALLERGIE', '', '', '', 0, 10, 1, ''),
(151, 'douleur articulaire', '', '', '', 0, 10, 1, ''),
(152, 'PSC', '', '', '', 0, 10, 1, ''),
(153, 'E.U', '', '', '', 0, 10, 1, ''),
(154, 'P.I & IVRI', '', '', '', 0, 10, 1, ''),
(155, 'P.I', '', '', '', 0, 10, 1, ''),
(156, 'Syndrome paludisme', '', '', '', 0, 10, 1, ''),
(157, 'ERUPTION CUTANE', '', '', '', 0, 10, 1, ''),
(158, 'SD POLUDEEM', '', '', '', 0, 10, 1, ''),
(159, 'SD POLIDEEM', '', '', '', 0, 10, 1, ''),
(160, 'SDRAA', '', '', '', 0, 10, 1, ''),
(161, 'syndrome gastrite', '', '', '', 0, 10, 1, ''),
(162, 'SD GASTRITE', '', '', '', 0, 10, 1, ''),
(163, 'DLR ART', '', '', '', 0, 10, 1, ''),
(164, 'INF.INTESTIN', '', '', '', 0, 10, 1, ''),
(165, 'DLR ABD BASE', '', '', '', 0, 10, 1, ''),
(166, 'TROUBLE HORMONAL', '', '', '', 0, 10, 1, ''),
(167, 'NAI', '', '', '', 0, 10, 1, ''),
(168, 'grossesse debutante', '', '', '', 0, 10, 1, ''),
(169, 'Ecoulement Uretrale', '', '', '', 0, 10, 1, ''),
(170, 'CRISE D\'ASTHMA', '', '', '', 0, 10, 1, ''),
(171, 'HEMATURIE', '', '', '', 0, 10, 1, ''),
(172, 'douleur abdominale basse', '', '', '', 0, 10, 1, ''),
(173, 'brulure', '', '', '', 0, 10, 1, ''),
(174, 'PSC', '', '', '', 1, 10, 1, ''),
(175, 'Candidoses Intestinale;  IVRI', '', '', '', 0, 10, 1, ''),
(176, 'mictaligie', '', '', '', 0, 10, 1, ''),
(177, 'AFF.INTEST', '', '', '', 0, 10, 1, ''),
(178, 'DNS', '', '', '', 0, 10, 1, ''),
(179, 'DNS', '', '', '', 1, 10, 1, ''),
(180, 'cephalee', '', '', '', 1, 10, 1, ''),
(181, 'DMS', '', '', '', 1, 10, 1, ''),
(182, 'CPN', '', '', '', 0, 10, 1, ''),
(183, 'thoracoligie', '', '', '', 0, 10, 1, ''),
(184, 'PI', '', '', '', 0, 10, 1, ''),
(185, 'trouble de la grossesse', '', '', '', 0, 10, 1, ''),
(186, 'DC', '', '', '', 0, 10, 1, ''),
(187, 'OEDEM', '', '', '', 0, 10, 1, ''),
(188, 'wound', '', '', '', 0, 10, 1, ''),
(189, 'pi', '', '', '', 1, 10, 1, ''),
(190, 'SAA', '', '', '', 0, 10, 1, ''),
(191, 'Anemie', '', '', '', 1, 10, 1, ''),
(192, 'affection intestinale', '', '', '', 0, 10, 1, ''),
(193, 'PARALYSIUM DU M.I', '', '', '', 0, 10, 1, ''),
(194, 'Fracture', '', '', '', 0, 10, 1, ''),
(195, 'TROUMATISME', '', '', '', 0, 10, 1, ''),
(196, 'AFF.INTEST', '', '', '', 1, 10, 1, ''),
(197, 'INFECTION INTESTINALE', '', '', '', 1, 10, 1, ''),
(198, 'AFFECTION CUTANEE', '', '', '', 0, 10, 1, ''),
(199, 'Eruption Cutane', '', '', '', 1, 10, 1, ''),
(200, 'complication sur la glossesse', '', '', '', 0, 10, 1, ''),
(201, 'affection urunaire', '', '', '', 0, 10, 1, ''),
(202, 'IRA', '', '', '', 1, 10, 1, ''),
(203, 'dermatose', '', '', '', 1, 10, 1, ''),
(204, 'VERMINOSE', '', '', '', 0, 10, 1, ''),
(205, 'IVRI; VERMINOSE', '', '', '', 0, 10, 1, ''),
(206, 'PI; IVRI', '', '', '', 0, 10, 1, ''),
(207, 'congoctivite Areligique', '', '', '', 0, 10, 1, ''),
(208, '4eme pansement', '', '', '', 0, 10, 1, ''),
(209, '3eme pansement', '', '', '', 0, 10, 1, ''),
(210, 'infection de dents', '', '', '', 1, 10, 1, ''),
(211, 'genecote', '', '', '', 1, 10, 1, ''),
(212, 'pscx', '', '', '', 0, 10, 1, ''),
(213, '2eme pansement', '', '', '', 0, 10, 1, ''),
(214, 'inappetance', '', '', '', 0, 10, 1, ''),
(215, 'syndrme paludisme', '', '', '', 0, 10, 1, ''),
(216, 'infection bacteriue locale', '', '', '', 1, 10, 1, ''),
(217, 'Affection bico dentaire', '', '', '', 0, 10, 1, ''),
(218, 'proteinurie', '', '', '', 0, 10, 1, ''),
(219, 'proteinie', '', '', '', 0, 10, 1, ''),
(220, 'Toux ou rhume, autres infections respiratoires (IRA) sans pneumonie', '', '', '', 0, 10, 1, ''),
(221, 'ANNEMIE', '', '', '', 0, 10, 1, ''),
(222, 'ABCES', '', '', '', 0, 10, 1, ''),
(223, 'Syndrome Grippale', '', '', '', 0, 10, 1, ''),
(224, 'ABCES FROID', '', '', '', 0, 10, 1, ''),
(225, 'trouble nearologique', '', '', '', 0, 10, 1, ''),
(226, 'trouble neorologique', '', '', '', 0, 10, 1, ''),
(227, 'infection urinaire', '', '', '', 0, 10, 1, ''),
(228, '', '', '', '', 0, 10, 1, ''),
(229, 'infection du post-partum', '', '', '', 0, 10, 1, ''),
(230, 'DSEHYDRATATION', '', '', '', 1, 10, 1, ''),
(231, 'Ecoulant Vaginal', '', '', '', 0, 10, 1, ''),
(232, 'affection cutanne', '', '', '', 1, 10, 1, ''),
(233, 'psc`', '', '', '', 0, 10, 1, ''),
(234, 'Affection bucco-dentaire', '', '', '', 0, 10, 1, ''),
(235, 'costalgie', '', '', '', 0, 10, 1, ''),
(236, 'plaie ombilicale', '', '', '', 1, 10, 1, ''),
(237, 'affection cutanee', '', '', '', 1, 10, 1, ''),
(238, 'FIEVRE', '', '', '', 1, 10, 1, ''),
(239, 'PSC SUR LA GROSSESSE', '', '', '', 0, 10, 1, ''),
(240, 'RAA\\', '', '', '', 0, 10, 1, ''),
(241, 'AFF.OCCULAIRE', '', '', '', 0, 10, 1, ''),
(242, 'Hyperglicemie', '', '', '', 0, 10, 1, ''),
(243, 'SD GRIPPAL', '', '', '', 0, 10, 1, ''),
(244, 'gastrtis', '', '', '', 0, 10, 1, ''),
(245, 'microbe intestinale', '', '', '', 1, 10, 1, ''),
(246, 'URI', '', '', '', 0, 10, 1, ''),
(247, 'MI', '', '', '', 0, 10, 1, ''),
(248, 'SD POLUDISM', '', '', '', 1, 10, 1, ''),
(249, 'ARA', '', '', '', 0, 10, 1, ''),
(250, 'pi,ist,', '', '', '', 0, 10, 1, ''),
(251, 'uvri', '', '', '', 0, 10, 1, ''),
(252, 'oreillon', '', '', '', 0, 10, 1, ''),
(253, 'ECOULEMENT VAGINAL', '', '', '', 0, 10, 1, ''),
(254, '2', '', '', '', 0, 10, 1, ''),
(255, 'MI', '', '', '', 1, 10, 1, ''),
(256, 'DYSMENORHEE', '', '', '', 0, 10, 1, ''),
(257, 'Affection Gyneco', '', '', '', 0, 10, 1, ''),
(258, 'TP', '', '', '', 0, 10, 1, ''),
(259, 'pvaf', '', '', '', 0, 10, 1, ''),
(260, 'deshydratation', '', '', '', 1, 10, 1, ''),
(261, 'anemie', '', '', '', 0, 10, 1, ''),
(262, 'conjoctivite arreligique', '', '', '', 0, 10, 1, ''),
(263, 'Morsure de chien', '', '', '', 0, 10, 1, ''),
(264, 'Travail d\'accouchement', '', '', '', 0, 10, 1, ''),
(265, 'plaie infectee', '', '', '', 0, 10, 1, ''),
(266, 'CONJOC', '', '', '', 0, 10, 1, ''),
(267, 'Travail d', '', '', '', 0, 10, 1, ''),
(268, 'trouble mensuel', '', '', '', 0, 10, 1, ''),
(269, 'syndrome Gypalle', '', '', '', 1, 10, 1, ''),
(270, 'Aff. cuttanee', '', '', '', 0, 10, 1, ''),
(271, 'epigastralgie', '', '', '', 0, 10, 1, ''),
(272, 'ceph', '', '', '', 0, 10, 1, ''),
(273, 'CARRIE DENTAIRE', '', '', '', 0, 10, 1, ''),
(274, 'diarrhee sanglante', '', '', '', 0, 10, 1, ''),
(275, 'Infection digestif', '', '', '', 0, 10, 1, ''),
(276, 'SD PALYSTRE', '', '', '', 0, 10, 1, ''),
(277, 'SDRAA/PLAIE', '', '', '', 0, 10, 1, ''),
(278, 'S', '', '', '', 0, 10, 1, ''),
(279, 'MENASSE D\'AVORTEMENT', '', '', '', 0, 10, 1, ''),
(280, 'MENASSE D', '', '', '', 0, 10, 1, ''),
(281, 'ivrs', '', '', '', 1, 10, 1, ''),
(282, 'allergie', '', '', '', 1, 10, 1, ''),
(283, 'syndrome paludeen', '', '', '', 1, 10, 1, ''),
(284, 'pi, ira', '', '', '', 1, 10, 1, ''),
(285, 'affection dents et gencives', '', '', '', 1, 10, 1, ''),
(286, 'FATIGUE', '', '', '', 0, 10, 1, ''),
(287, 'syndrme palustre', '', '', '', 0, 10, 1, ''),
(288, 'AUTALGIE', '', '', '', 0, 10, 1, ''),
(289, 'IRAA', '', '', '', 0, 10, 1, ''),
(290, 'Infection Urinaire', '', '', '', 1, 10, 1, ''),
(291, 'Affection oculaire', '', '', '', 0, 10, 1, ''),
(292, 'Diarrhe non sanglante', '', '', '', 1, 10, 1, ''),
(293, 'URTI/RAA', '', '', '', 0, 10, 1, ''),
(294, 'Candidoses Intestinale', '', '', '', 0, 10, 1, ''),
(295, 'TROUBLE NEWOLOGIQUE', '', '', '', 0, 10, 1, ''),
(296, 'ALLERY', '', '', '', 0, 10, 1, ''),
(297, 'Antoligie', '', '', '', 0, 10, 1, ''),
(298, 'Metrorragie', '', '', '', 0, 10, 1, ''),
(299, 'AFF.OCC', '', '', '', 1, 10, 1, ''),
(300, '18', '', '', '', 0, 10, 1, ''),
(301, 'Hyperthemie', '', '', '', 1, 10, 1, ''),
(302, 'INF.INTEST', '', '', '', 1, 10, 1, ''),
(303, 'PSC SUR LA GLOSSESSE', '', '', '', 0, 10, 1, ''),
(304, 'RAA/PI', '', '', '', 0, 10, 1, ''),
(305, 'T.P', '', '', '', 0, 10, 1, ''),
(306, 'ACCOUCHEMENT', '', '', '', 0, 10, 1, ''),
(307, 'DENTARIE CARIES', '', '', '', 0, 10, 1, ''),
(308, 'CONJOCTIVITE ALLERGIQUE', '', '', '', 0, 10, 1, ''),
(309, 'DENTAL CARRIES', '', '', '', 0, 10, 1, ''),
(310, 'AFF.OCCULAIRE; PI', '', '', '', 0, 10, 1, ''),
(311, 'UTI', '', '', '', 0, 10, 1, ''),
(312, 'ALLERGIE OCCULAIRE', '', '', '', 0, 10, 1, ''),
(313, 'AUTIQUE', '', '', '', 0, 10, 1, ''),
(314, 'paludisme grave', '', '', '', 0, 10, 1, ''),
(315, '8355', '', '', '', 0, 10, 1, ''),
(316, 'Diarrhe non sanglante', '', '', '', 0, 10, 1, ''),
(317, 'ANGINE,URTI', '', '', '', 0, 10, 1, ''),
(318, 'PI,DERMATOSE', '', '', '', 0, 10, 1, ''),
(319, 'INF.URINAIRE', '', '', '', 0, 10, 1, ''),
(320, 'HEMORROIDE', '', '', '', 0, 10, 1, ''),
(321, 'FLEIN LINGUAL', '', '', '', 1, 10, 1, ''),
(322, '`', '', '', '', 1, 10, 1, ''),
(323, 'infection bacterienne peu probable', '', '', '', 1, 10, 1, ''),
(324, 'IRAA', '', '', '', 1, 10, 1, ''),
(325, 'SD PALUSTRE', '', '', '', 0, 10, 1, ''),
(326, 'ivri, pi', '', '', '', 0, 10, 1, ''),
(327, 'EURUPTION CUTANNE', '', '', '', 0, 10, 1, ''),
(328, '59', '', '', '', 0, 10, 1, ''),
(329, 'IVI', '', '', '', 0, 10, 1, ''),
(330, 'PCS', '', '', '', 0, 10, 1, ''),
(331, 'algie', '', '', '', 0, 10, 1, ''),
(332, 'syndrome rhumatismal', '', '', '', 0, 10, 1, ''),
(333, 'tromatisme oculaire', '', '', '', 0, 10, 1, ''),
(334, 'AFF.GYNECO', '', '', '', 0, 10, 1, ''),
(335, 'SD POLUSTRE', '', '', '', 0, 10, 1, ''),
(336, 'INF. URINAIRE', '', '', '', 1, 10, 1, ''),
(337, 'CAND.INTEST', '', '', '', 0, 10, 1, ''),
(338, 'T.PSYCHIQUE', '', '', '', 0, 10, 1, ''),
(339, 'PSP', '', '', '', 0, 10, 1, ''),
(340, 'TP,EPILEPSE', '', '', '', 0, 10, 1, ''),
(341, 'SD RAA', '', '', '', 0, 10, 1, ''),
(342, 'STI', '', '', '', 0, 10, 1, ''),
(343, 'PF', '', '', '', 0, 10, 1, ''),
(344, 'DELMATOSE', '', '', '', 0, 10, 1, ''),
(345, 'AbcÃ¨s/RAA', '', '', '', 0, 10, 1, ''),
(346, 'FIEVRE', '', '', '', 0, 10, 1, ''),
(347, 'RAA,CUTANE.AFF', '', '', '', 0, 10, 1, ''),
(348, 'Plaie tromatisme', '', '', '', 0, 10, 1, ''),
(349, 'ablation du corps etranger', '', '', '', 0, 10, 1, ''),
(350, 'DS', '', '', '', 0, 10, 1, ''),
(351, 'SD GRIPPAL', '', '', '', 1, 10, 1, ''),
(352, 'OPHT', '', '', '', 0, 10, 1, ''),
(353, 'CONJONTIVITE,IRA', '', '', '', 0, 10, 1, ''),
(354, 'RAA,AFF.INT', '', '', '', 0, 10, 1, ''),
(355, 'comli', '', '', '', 0, 10, 1, ''),
(356, 'plaie trantique', '', '', '', 0, 10, 1, ''),
(357, 'IRA/PI/ANEMIE', '', '', '', 0, 10, 1, ''),
(358, '9052', '', '', '', 0, 10, 1, ''),
(359, 'BRULLURE DU 2E DEGRE', '', '', '', 0, 10, 1, ''),
(360, 'plaie', '', '', '', 1, 10, 1, ''),
(361, 'AVORTEMENT INCOMPLETE', '', '', '', 0, 10, 1, ''),
(362, 'AVORTEMENT COMPLETE', '', '', '', 0, 10, 1, ''),
(363, 'Plaie tromatique complique', '', '', '', 0, 10, 1, ''),
(364, 'loss of vision', '', '', '', 0, 10, 1, ''),
(365, '1', '', '', '', 0, 10, 1, ''),
(366, 'PI,IRAA', '', '', '', 1, 10, 1, ''),
(367, 'constipation', '', '', '', 0, 10, 1, ''),
(368, 'E.V', '', '', '', 0, 10, 1, ''),
(369, 'affection intestinale/IRA', '', '', '', 0, 10, 1, ''),
(370, 'PI,IRAA', '', '', '', 0, 10, 1, ''),
(371, 'AbcÃ¨s mur', '', '', '', 0, 10, 1, ''),
(372, 'RA', '', '', '', 0, 10, 1, ''),
(373, 'TAUX AU RHUME', '', '', '', 0, 10, 1, ''),
(374, 'AFF.ARRELIGIQUE', '', '', '', 0, 10, 1, ''),
(375, 'MALADIE FAIBLURE', '', '', '', 0, 10, 1, ''),
(376, 'ABD', '', '', '', 0, 10, 1, ''),
(377, 'GASTRITE,RAA', '', '', '', 0, 10, 1, ''),
(378, 'TAUX SECHE', '', '', '', 0, 10, 1, ''),
(379, 'INTEST.INT', '', '', '', 0, 10, 1, ''),
(380, '58', '', '', '', 0, 10, 1, ''),
(381, 'INF.DIGESTIF', '', '', '', 0, 10, 1, ''),
(382, 'URTI', '', '', '', 1, 10, 1, ''),
(383, 'FLEIN LINGUAL', '', '', '', 0, 10, 1, ''),
(384, 'AC Cesarienne', '', '', '', 0, 10, 1, ''),
(385, 'Acc dyst. avec episiotomie', '', '', '', 0, 10, 1, ''),
(386, 'Caries dentaires', '', '', '', 1, 10, 1, ''),
(387, 'AFF.cutanee', '', '', '', 0, 10, 1, ''),
(388, 'Paludisme simple (confirmÃ©e)', '', '', '', 0, 10, 1, ''),
(389, 'PLAIE(T.P AVEC EMPITATION', '', '', '', 0, 10, 1, ''),
(390, 'FESION CUTANE', '', '', '', 0, 10, 1, ''),
(391, 'Menace d\'avortement', '', '', '', 0, 10, 1, ''),
(392, 'CONJONTIVITE,', '', '', '', 0, 10, 1, ''),
(393, 'REFRECTIVE', '', '', '', 0, 10, 1, ''),
(394, 'CONJOCTIVITY ERROR', '', '', '', 0, 10, 1, ''),
(395, 'LRTI', '', '', '', 0, 10, 1, ''),
(396, 'AFF.CUTANE', '', '', '', 1, 10, 1, ''),
(397, 'RAA,PSC', '', '', '', 0, 10, 1, ''),
(398, 'T,P', '', '', '', 0, 10, 1, ''),
(399, 'IRA,RAA', '', '', '', 0, 10, 1, ''),
(400, 'MAL FORMATION CEL. GENITAL', '', '', '', 0, 10, 1, ''),
(401, 'CANDIDOSE BUCCAL', '', '', '', 0, 10, 1, ''),
(402, 'CARIE', '', '', '', 0, 10, 1, ''),
(403, 'PSC,IVRS', '', '', '', 0, 10, 1, ''),
(404, 'DNS,PI', '', '', '', 0, 10, 1, ''),
(405, 'AFF.URINAIRE', '', '', '', 0, 10, 1, ''),
(406, 'AFF.BUCCO-DENTAIRE', '', '', '', 0, 10, 1, ''),
(407, 'SYINDROME GRIPPALE', '', '', '', 0, 10, 1, ''),
(408, 'CONVULSION', '', '', '', 0, 10, 1, ''),
(409, 'Plaie troumatisme', '', '', '', 0, 10, 1, ''),
(410, 'Plaie troumatique', '', '', '', 0, 10, 1, ''),
(411, 'Aff. cutanee', '', '', '', 0, 10, 1, ''),
(412, 'SD NEUVRALGIQUE', '', '', '', 0, 10, 1, ''),
(413, '3em', '', '', '', 0, 10, 1, ''),
(414, 'PLAIE (T.P AVEC AMPUTATION', '', '', '', 0, 10, 1, ''),
(415, 'OTITIS', '', '', '', 0, 10, 1, ''),
(416, 'TOLITICOLIS', '', '', '', 0, 10, 1, ''),
(417, 'PI;UTI', '', '', '', 0, 10, 1, ''),
(418, 'PSC,PI', '', '', '', 0, 10, 1, ''),
(419, 'PI;TP', '', '', '', 0, 10, 1, ''),
(420, 'RAA,URTI', '', '', '', 0, 10, 1, ''),
(421, 'DS', '', '', '', 1, 10, 1, ''),
(422, 'PI/DENTALGIE', '', '', '', 0, 10, 1, ''),
(423, 'DYSENTERIE AMIBIASE', '', '', '', 0, 10, 1, ''),
(424, 'DENTALGIE', '', '', '', 0, 10, 1, ''),
(425, 'PLAIE DE BRULURE', '', '', '', 0, 10, 1, ''),
(426, 'PLAIE DE CESARIENNE', '', '', '', 0, 10, 1, ''),
(427, 'CRISE D', '', '', '', 0, 10, 1, ''),
(428, 'HEMORRAGY', '', '', '', 0, 10, 1, ''),
(429, 'CONJONTIVITE', '', '', '', 0, 10, 1, ''),
(430, 'TRAUMATISME', '', '', '', 0, 10, 1, ''),
(431, 'TUMEFACTION', '', '', '', 0, 10, 1, ''),
(432, 'SCROTUM,IRAA', '', '', '', 0, 10, 1, ''),
(433, 'CONJONCTIVITE', '', '', '', 0, 10, 1, ''),
(434, 'PI, AFF.URINAIRE', '', '', '', 0, 10, 1, ''),
(435, 'VERTIGE', '', '', '', 0, 10, 1, ''),
(436, 'AFF,CUTTANE', '', '', '', 1, 10, 1, ''),
(437, 'DERMAT', '', '', '', 1, 10, 1, ''),
(438, 'BURN', '', '', '', 0, 10, 1, ''),
(439, 'PI/IVRI', '', '', '', 0, 10, 1, ''),
(440, 'HTA', '', '', '', 0, 10, 1, ''),
(441, 'CONJONTIVITE PURULENTE', '', '', '', 0, 10, 1, ''),
(442, 'astenie', '', '', '', 0, 10, 1, ''),
(443, 'PNEMONIE', '', '', '', 0, 10, 1, ''),
(444, 'TROUMATISME PHYSIQUE', '', '', '', 0, 10, 1, ''),
(445, 'BACKAM', '', '', '', 0, 10, 1, ''),
(446, 'IST', '', '', '', 0, 10, 1, ''),
(447, 'BACKACHE', '', '', '', 0, 10, 1, ''),
(448, 'CORP ETRANGE', '', '', '', 0, 10, 1, ''),
(449, 'CONJONCTIVITE', '', '', '', 1, 10, 1, ''),
(450, 'CANDIDOSE BUCCAL', '', '', '', 1, 10, 1, ''),
(451, 'SKIN ALLERGY', '', '', '', 0, 10, 1, ''),
(452, 'ascarietose', '', '', '', 0, 10, 1, ''),
(453, 'GASTRITE/RAA', '', '', '', 0, 10, 1, ''),
(454, 'TUMEUR', '', '', '', 0, 10, 1, ''),
(455, 'URIT', '', '', '', 0, 10, 1, ''),
(456, 'wound/RAA', '', '', '', 0, 10, 1, ''),
(457, 'RS', '', '', '', 0, 10, 1, ''),
(458, 'VARICELLE', '', '', '', 0, 10, 1, ''),
(459, 'IRAA, DNS', '', '', '', 1, 10, 1, ''),
(460, 'allergie aux aliment', '', '', '', 0, 10, 1, ''),
(461, 'TLOCORALGIE', '', '', '', 0, 10, 1, ''),
(462, '61', '', '', '', 0, 10, 1, ''),
(463, 'PSC,THORACALGIE', '', '', '', 0, 10, 1, ''),
(464, 'Plaie tromatique', '', '', '', 0, 10, 1, ''),
(465, 'otite, Carie dentaire', '', '', '', 0, 10, 1, ''),
(466, 'PI/URTI', '', '', '', 0, 10, 1, ''),
(467, 'INFECTION BACTERIENNE', '', '', '', 0, 10, 1, ''),
(468, 'PSC;ASTHMA', '', '', '', 0, 10, 1, ''),
(469, 'RAS', '', '', '', 0, 10, 1, ''),
(470, 'GASTRITE', '', '', '', 1, 10, 1, ''),
(471, 'MAL FORMATION', '', '', '', 0, 10, 1, ''),
(472, 'PLAIE POST-OPERATOIRE', '', '', '', 0, 10, 1, ''),
(473, 'RHUME', '', '', '', 1, 10, 1, ''),
(474, 'PSC\'', '', '', '', 0, 10, 1, ''),
(475, '[PSC', '', '', '', 0, 10, 1, ''),
(476, 'NDS', '', '', '', 0, 10, 1, ''),
(477, 'IVRI, gastrite', '', '', '', 0, 10, 1, ''),
(478, 'PSC/PI', '', '', '', 0, 10, 1, ''),
(479, 'TROUMATISME/HEMOROIDE', '', '', '', 0, 10, 1, ''),
(480, 'otite', '', '', '', 1, 10, 1, ''),
(481, 'aff. intestinale', '', '', '', 1, 10, 1, ''),
(482, '14', '', '', '', 0, 10, 1, ''),
(483, 'IRAA, DNS', '', '', '', 0, 10, 1, ''),
(484, 'TROUBLE GESTRO ENTERITE', '', '', '', 0, 10, 1, ''),
(485, 'aff cutanee', '', '', '', 0, 10, 1, ''),
(486, 'corps etranger', '', '', '', 1, 10, 1, ''),
(487, 'spleenomegaly', '', '', '', 0, 10, 1, ''),
(488, 'TORSION MUSCULAIRE', '', '', '', 0, 10, 1, ''),
(489, 'URTI,   RAA', '', '', '', 0, 10, 1, ''),
(490, 'ASCARIS', '', '', '', 0, 10, 1, ''),
(491, 'URTI,   RAA', '', '', '', 1, 10, 1, ''),
(492, 'LOMBARGIE', '', '', '', 0, 10, 1, ''),
(493, 'IVRS', '', '', '', 0, 10, 1, ''),
(494, 'Affection cuir chevelu', '', '', '', 0, 10, 1, ''),
(495, 'AFF OCCULAIRE', '', '', '', 0, 10, 1, ''),
(496, 'INFECT. INTESTINAL', '', '', '', 0, 10, 1, ''),
(497, 'IMFECTION URINAIRE', '', '', '', 0, 10, 1, ''),
(498, 'MYOSE', '', '', '', 0, 10, 1, ''),
(499, 'acite', '', '', '', 0, 10, 1, ''),
(500, 'SEL.PALUSTRE', '', '', '', 0, 10, 1, ''),
(501, 'TROUBLE PHYSICOLOGY', '', '', '', 0, 10, 1, ''),
(502, 'neuralgie', '', '', '', 0, 10, 1, ''),
(503, 'PI+gastrite', '', '', '', 0, 10, 1, ''),
(504, 'psc sur grossesse', '', '', '', 0, 10, 1, ''),
(505, 'Aff. intestinal', '', '', '', 0, 10, 1, ''),
(506, 'ECBU', '', '', '', 0, 10, 1, ''),
(507, 's gripal', '', '', '', 0, 10, 1, ''),
(508, 'IRRA', '', '', '', 0, 10, 1, ''),
(509, 'pi;plaie', '', '', '', 0, 10, 1, ''),
(510, 's rhumatismal', '', '', '', 0, 10, 1, ''),
(511, 'Menace d', '', '', '', 0, 10, 1, ''),
(512, 'ABCES MUR', '', '', '', 0, 10, 1, ''),
(513, 'TROUBLE PSYCHOLOGIQUE', '', '', '', 0, 10, 1, ''),
(514, 'BRULLURE', '', '', '', 0, 10, 1, ''),
(515, 'PI,URTI', '', '', '', 0, 10, 1, ''),
(516, 'ELUPTIO CUTANE', '', '', '', 0, 10, 1, ''),
(517, 'PLAIE, IVRI', '', '', '', 1, 10, 1, ''),
(518, 'MAT', '', '', '', 0, 10, 1, ''),
(519, 'ENTAMOEBER', '', '', '', 0, 10, 1, ''),
(520, 'inconscience', '', '', '', 0, 10, 1, ''),
(521, '62', '', '', '', 0, 10, 1, ''),
(522, 'headeche', '', '', '', 0, 10, 1, ''),
(523, 'R3/R1', '', '', '', 0, 10, 1, ''),
(524, 'B3', '', '', '', 0, 10, 1, ''),
(525, 'R4', '', '', '', 0, 10, 1, ''),
(526, 'E2', '', '', '', 0, 10, 1, ''),
(527, 'B1', '', '', '', 0, 10, 1, ''),
(528, 'M1', '', '', '', 0, 10, 1, ''),
(529, 'I11', '', '', '', 0, 10, 1, ''),
(530, 'R4/PI', '', '', '', 0, 10, 1, ''),
(531, 'M4', '', '', '', 0, 10, 1, ''),
(532, 'E9', '', '', '', 0, 10, 1, ''),
(533, 'R3', '', '', '', 0, 10, 1, ''),
(534, 'R2', '', '', '', 0, 10, 1, ''),
(535, 'I1', '', '', '', 0, 10, 1, ''),
(536, '22', '', '', '', 0, 10, 1, ''),
(537, 'I8', '', '', '', 0, 10, 1, ''),
(538, 'i10', '', '', '', 0, 10, 1, ''),
(539, 'R9', '', '', '', 0, 10, 1, ''),
(540, 'R3', '', '', '', 1, 10, 1, ''),
(541, 'I9', '', '', '', 0, 10, 1, ''),
(542, 'I10', '', '', '', 1, 10, 1, ''),
(543, 'e4', '', '', '', 0, 10, 1, ''),
(544, 'm1', '', '', '', 1, 10, 1, ''),
(545, 'I1(cephale)', '', '', '', 0, 10, 1, ''),
(546, 'R1', '', '', '', 0, 10, 1, ''),
(547, 'TN', '', '', '', 0, 10, 1, ''),
(548, 'suspection d\'une troumatismecraniere', '', '', '', 0, 10, 1, ''),
(549, 'I24', '', '', '', 0, 10, 1, ''),
(550, 'ceph\\', '', '', '', 0, 10, 1, ''),
(551, 'e3', '', '', '', 0, 10, 1, ''),
(552, 'SYNDROME NEUVRALGIQUE', '', '', '', 0, 10, 1, ''),
(553, 'CONJONCTIVITE ARRELIQUE', '', '', '', 0, 10, 1, ''),
(554, 'C2', '', '', '', 0, 10, 1, ''),
(555, 'E9 RAA', '', '', '', 0, 10, 1, ''),
(556, 'DORSALGIE', '', '', '', 0, 10, 1, ''),
(557, 'DYNDROME GRIPPAL', '', '', '', 0, 10, 1, ''),
(558, 'INF INTEST', '', '', '', 0, 10, 1, ''),
(559, 'AGO', '', '', '', 0, 10, 1, ''),
(560, 'ASCARDIOSE', '', '', '', 0, 10, 1, ''),
(561, 'MAL DU DOS', '', '', '', 0, 10, 1, ''),
(562, 'EG/RAA', '', '', '', 0, 10, 1, ''),
(563, 'EPISTAXIS', '', '', '', 0, 10, 1, ''),
(564, 'SD RHUUMATISMALE', '', '', '', 0, 10, 1, ''),
(565, 'VOMISSEMENT', '', '', '', 0, 10, 1, ''),
(566, 'TAUMATISME PHYSIQUE', '', '', '', 0, 10, 1, ''),
(567, 'MALADIE RESPIRATOIRE', '', '', '', 0, 10, 1, ''),
(568, 'AFF D.OREILLE', '', '', '', 0, 10, 1, ''),
(569, 'Candidoses Intestinale;', '', '', '', 0, 10, 1, ''),
(570, 'PI, IRA', '', '', '', 0, 10, 1, ''),
(571, '3605', '', '', '', 0, 10, 1, ''),
(572, 'HERMIE INGNINAL', '', '', '', 0, 10, 1, ''),
(573, 'CAND.INTEST', '', '', '', 1, 10, 1, ''),
(574, 'otite CHRONIQUE', '', '', '', 0, 10, 1, ''),
(575, 'NEUVRALGIE', '', '', '', 0, 10, 1, ''),
(576, 'INF.URINAIRE/IRA', '', '', '', 0, 10, 1, ''),
(577, 'NIGR', '', '', '', 0, 10, 1, ''),
(578, 'TRAUMATISME oculaire', '', '', '', 0, 10, 1, ''),
(579, 'HTALT', '', '', '', 0, 10, 1, ''),
(580, 'GASTRITIS', '', '', '', 0, 10, 1, ''),
(581, 'URETHA DISCHARGE', '', '', '', 0, 10, 1, ''),
(582, 'ARTHR0SE', '', '', '', 0, 10, 1, ''),
(583, 'CEPHALE', '', '', '', 0, 10, 1, ''),
(584, 'ARTHOSE', '', '', '', 0, 10, 1, ''),
(585, 'bartholinite', '', '', '', 0, 10, 1, ''),
(586, 'corps etranger oreille', '', '', '', 0, 10, 1, ''),
(587, 'deshydratation', '', '', '', 0, 10, 1, ''),
(588, 'Mal de dos', '', '', '', 0, 10, 1, ''),
(589, 'Complications sur la grossesse', '', '', '', 0, 10, 1, ''),
(590, 'CONJONCTIVITE BACTERIENNE', '', '', '', 0, 10, 1, ''),
(591, 'mal de tete', '', '', '', 0, 10, 1, ''),
(592, 'candidose intestinale, ira', '', '', '', 0, 10, 1, ''),
(593, 'pf, ira', '', '', '', 1, 10, 1, ''),
(594, 'raa, psc', '', '', '', 0, 10, 1, ''),
(595, 'raa, angine', '', '', '', 0, 10, 1, ''),
(596, 'AMIBIASE', '', '', '', 0, 10, 1, ''),
(597, 'Candidoses Intestinale', '', '', '', 1, 10, 1, ''),
(598, 'ALLERGY', '', '', '', 0, 10, 1, ''),
(599, 'constipation', '', '', '', 1, 10, 1, ''),
(600, 'VALLICELLE', '', '', '', 0, 10, 1, ''),
(601, 'PI/IRA', '', '', '', 0, 10, 1, ''),
(602, 'neurologique', '', '', '', 0, 10, 1, ''),
(603, 'PI, CONJONCTIVITE  ALLERIGIQUE', '', '', '', 0, 10, 1, ''),
(604, 'CANDIDOSE', '', '', '', 0, 10, 1, ''),
(605, 'IP', '', '', '', 0, 10, 1, ''),
(606, '4281', '', '', '', 0, 10, 1, ''),
(607, '64', '', '', '', 0, 10, 1, ''),
(608, '4291', '', '', '', 0, 10, 1, ''),
(609, 'PSC - Paludisme simple confirme', 'Paludism without pregnancy', 'M1', 'B53.8', 0, 11, 1, ''),
(610, 'Palud + troubles digest.', 'Paludism with minor digestion troubles, without pregnancy', 'M2', 'O98.6.1', 0, 11, 1, ''),
(611, 'PGC - Paludisme grave confirme', 'Severe paludism', 'M3', '', 0, 11, 1, ''),
(612, 'PSCgrossesse - Paludisme simple pendant grossesse', 'Paludism with pregnancy', 'M4', 'O98.6', 0, 11, 1, ''),
(613, 'Palud + troubles digest.-Grossesse', 'Paludism with minor digestion troubles, with pregnancy', 'M5', 'O98.6.1', 0, 11, 1, ''),
(614, 'TP - Traumatisme Physique, tumefaction', 'Physical traumatism', 'E1', '', 0, 12, 1, ''),
(615, 'Plaie', 'Wound', 'E2', '', 0, 12, 1, ''),
(616, 'Plaie causee par un animal', 'Wound caused by animal', 'E3', '', 0, 12, 1, ''),
(617, 'Abces', 'Abcess', 'E4', 'L02.9', 0, 12, 1, ''),
(618, 'Brulure', 'Burn', 'E5', '', 0, 12, 1, ''),
(619, 'Fracture', 'Break', 'E6', '', 0, 12, 1, ''),
(620, 'Mal de dos/Dorsalgie/Lombalgie', 'Backache', 'E7', '', 0, 12, 1, ''),
(621, 'Torticolis', 'Stiff neck', 'E8', '', 0, 12, 1, ''),
(622, 'RAA - Rhumatisme articulaire aigu, douleur musculaire', 'Accute rhumatism, muscle pain', 'E9', '', 0, 12, 1, ''),
(623, 'Thoracalgie, costalgie', 'Chest / ribs pain', 'E10', '', 0, 12, 1, ''),
(624, 'Paralysie', 'Paralysie', 'E11', '', 0, 12, 1, ''),
(625, 'Paralysie flasque aigue, polio suspect', 'Accute paralysie, polio suspected', 'E12', 'A80', 0, 12, 1, ''),
(626, 'Malformation de naissance, frein lingual', 'Birth malformation', 'E13', '', 0, 12, 1, ''),
(627, 'Mal de tete, cephalee', 'Headache', 'I1', '', 0, 13, 1, ''),
(628, 'Problemes dâ€™alimentation, inappetance', 'Loss of apetite', 'I2', '', 0, 13, 1, ''),
(629, 'Allergie', 'Allergy', 'I3', '', 0, 13, 1, ''),
(630, 'Anemie simple', 'Simple anemia', 'I4', '', 0, 13, 1, ''),
(631, 'Anemie severe', 'Severe anemia', 'I5', '', 0, 13, 1, ''),
(632, 'Deshydratation', 'Dehydration', 'I6', '', 0, 13, 1, ''),
(633, 'Intoxication alimentaire', 'Food intoxication', 'I7', 'A05', 0, 13, 1, ''),
(634, 'Candidose Intestinale', 'Intestinal candidose', 'I8', '', 0, 13, 1, ''),
(635, 'Infection Intestinale, digestive', 'Intestinal infection', 'I9', '', 0, 13, 1, ''),
(636, 'PI - Parasitose Intestinale', 'Intestinal parasitosis', 'I10', '', 0, 13, 1, ''),
(637, 'Gastrite et Duodenite', 'Gastrite and Duodenite', 'I11', 'K29.9', 0, 13, 1, ''),
(638, 'Verminose', 'Verminose', 'I12', '', 0, 13, 1, ''),
(639, 'DNS - Diarrhee SANS deshydratation', 'Diarrhea without dehydration', 'I13', '', 0, 13, 1, ''),
(640, 'Diarrhee AVEC deshydratation', 'Diarrhea with dehydration', 'I14', '', 0, 13, 1, ''),
(641, 'Diarrhee avec deshydratation severe', 'Diarrhea with severe dehydration', 'I15', '', 0, 13, 1, ''),
(642, 'Diarrhee persistante', 'Persistant diarrhea', 'I16', '', 0, 13, 1, ''),
(643, 'Diarrhee persistante severe', 'Severe persistant diarrhea', 'I17', '', 0, 13, 1, ''),
(644, 'DS - Diarrhee sanglante, dysenterie', 'Blood diarrhea', 'I18', 'A09.3', 0, 13, 1, ''),
(645, 'Dysenterie amibiase', 'Amibiase dysentery', 'I19', '', 0, 13, 1, ''),
(646, 'Constipation', 'Constipation', 'I20', '', 0, 13, 1, ''),
(647, 'Douleur abdominale basse', 'Low abdominal pain', 'I21', '', 0, 13, 1, ''),
(648, 'Infection Bacterienne, locale', 'Local bacterian infection', 'I22', '', 0, 13, 1, ''),
(649, 'Infection Bacterienne, severe ou grave, septicemie', 'Bacterial infection, severe (septicemie)', 'I23', '', 0, 13, 1, ''),
(650, 'Infection urinaire', 'UTI - Urinary track infection', 'I24', 'N39.0', 0, 13, 1, ''),
(651, 'Proteinurie', 'Proteinurie', 'I25', '', 0, 13, 1, ''),
(652, 'Meningite presumee', 'Meningitis suspected', 'I26', 'G03.9', 0, 13, 1, ''),
(653, 'Varicelle', 'Varicelle', 'I27', '', 0, 13, 1, ''),
(654, 'Rougeole confirmee', 'Meascle, confirmed', 'I28', '', 0, 13, 1, ''),
(655, 'Rougeole presumee, sans complications', 'Meascle, suspected', 'I29', '', 0, 13, 1, ''),
(656, 'Rougeole presumee, avec complications yeux/bouche', 'Meascle, suspected with eye/mouth complications', 'I30', '', 0, 13, 1, ''),
(657, 'Rougeole presumee, severe compliquee', 'Meascle, severe suspected with complications', 'I31', '', 0, 13, 1, ''),
(658, 'Rubeole confirmee', 'Rubeola suspected', 'I32', '', 0, 13, 1, ''),
(659, 'Trouble hormonal', 'Hormonal trouble', 'I33', '', 0, 13, 1, ''),
(660, 'Trouble neurologique, syndrome nevralgique', 'Neurological trouble', 'I34', '', 0, 13, 1, ''),
(661, 'Rhinite, Syndrome grippal', 'Rhinoria', 'R1', '', 0, 14, 1, ''),
(662, 'IRA - Infection aigues des voies respiratoires', 'ARTI - Accute respiratory track infection', 'R2', 'J22 J06.9', 0, 14, 1, ''),
(663, 'IVRI - Infection des voies respiratoires inferieures', 'LRTI', 'R3', '', 0, 14, 1, ''),
(664, 'IVRS - Infection des voies respiratoires superieures, Angine', 'URTI', 'R4', '', 0, 14, 1, ''),
(665, 'Pneumonie', 'Pneumonia', 'R5', 'J18.9', 0, 14, 1, ''),
(666, 'Pneumonie severe ou maladie respiratoire grave', 'Severe pneumonia or severe respiratory disease', 'R6', '', 0, 14, 1, ''),
(667, 'Mycoses Superficielles', 'Superficial mycositis', 'D1', 'B36.9', 0, 15, 1, ''),
(668, 'Gale', 'Pitches', 'D2', 'B86', 0, 15, 1, ''),
(669, 'Autre affection cutanee, Dermatose', 'Other skin affection', 'D3', 'L00 L08', 0, 15, 1, ''),
(670, 'Oedeme', 'Oedema', 'D4', '', 0, 15, 1, ''),
(671, 'Ulcere cutane', 'Skin ulcere', 'D5', 'L89', 0, 15, 1, ''),
(672, 'Herpes simplex', 'Herpes simplex', 'D6', 'B00.9', 0, 15, 1, ''),
(673, 'Hemorroides', 'Hemorroides', 'D7', '', 0, 15, 1, ''),
(674, 'Otite', 'Otitis', 'O1', 'H65', 0, 16, 1, ''),
(675, 'Infection chronique de lâ€™oreille', 'Chronical ear infection', 'O2', '', 0, 16, 1, ''),
(676, 'Conjonctivite', 'Conjonctivitis', 'O3', 'H10.9', 0, 16, 1, ''),
(677, 'Perte de vue, erreur de refraction', 'Loss of vision', 'O4', 'H52.7', 0, 16, 1, ''),
(678, 'Affection oculaire, autre', 'Other eye affection', 'O5', 'H57.9', 0, 16, 1, ''),
(679, 'Cecite Nocturne â€“ carence en Vitamine A', 'Night cecity - lack of vitamin A', 'O6', '', 0, 16, 1, ''),
(680, 'Gonococcie oculaire probable', '', 'O7', '', 0, 16, 1, ''),
(681, 'Carie dentaire', 'Dental carie', 'B1', 'K02', 0, 17, 1, ''),
(682, 'Candidose buccale', 'Mouth candidose', 'B2', '', 0, 17, 1, ''),
(683, 'Autres infection des dents et gencives', 'Other tooth / gum infection', 'B3', 'K29.9', 0, 17, 1, ''),
(684, 'Hypothermie moderee', 'Moderate hypothermia', 'P1', '', 0, 18, 1, ''),
(685, 'Prematurite', 'Premature child', 'P2', '', 0, 18, 1, ''),
(686, 'Insuffisance ponderale severe Ã  la naissance - < 1,5 kg', 'Low birth weight - severe', 'P3', '', 0, 18, 1, ''),
(687, 'Insuffisance ponderale moderee Ã  la naissance - 1,5 a 2,5 kg', 'Low birth weight - moderate', 'P4', '', 0, 18, 1, ''),
(688, 'Conjonctivite purulente du nouveau ne ou autre', 'Eye pus discharge', 'P5', '', 0, 18, 1, ''),
(689, 'Mastoidite', 'Mastoidite', 'P6', '', 0, 18, 1, ''),
(690, 'Troubles Psychologiques/mentaux', 'Mental/Psychological troubles', 'S1', '', 0, 19, 1, ''),
(691, 'Epilepsie', 'Epilepsy', 'S2', '', 0, 19, 1, ''),
(692, 'Suicide, tentative ou reussi', 'Suicide, attempted or successful', 'S3', '', 0, 19, 1, ''),
(693, 'Hypertension - HTA', 'Hypertension', 'C1', 'I10 I15', 0, 20, 1, ''),
(694, 'Asthme', 'Asthma', 'C2', 'J45 J46', 0, 20, 1, ''),
(695, 'Broncho-pneumopathie chronique', 'Chronical Broncho-pneumonia', 'C3', 'J44 J47', 0, 20, 1, ''),
(696, 'Diabete - Type 1', 'Diabete - Type 1', 'C4', 'E10', 0, 20, 1, ''),
(697, 'Diabete - Type 2', 'Diabete - Type 2', 'C5', 'E11', 0, 20, 1, ''),
(698, 'Diabete gestationnaire', 'Diabete during pregnancy', 'C6', 'O24', 0, 20, 1, ''),
(699, 'Cardiomyopathie', 'Cardiomyopathy', 'C7', 'I42', 0, 20, 1, ''),
(700, 'Infarctus ou hemorragie cerebrale', 'Infarctus or brain hemorragy', 'C8', 'G45, I60-I64', 0, 20, 1, ''),
(701, 'Cardiopathie rhumatismale', 'Rhumatismal cardiopathy', 'C9', 'I05-I09', 0, 20, 1, ''),
(702, 'Cardiopathie congenitale', 'Congenital cardiopathy', 'C10', 'Q20-Q28', 0, 20, 1, ''),
(703, 'Maladie de l\'artere coronaire', '', 'C11', 'I25.1', 0, 20, 1, ''),
(704, 'Maladie pericardique', '', 'C12', 'I30-I31', 0, 20, 1, ''),
(705, 'Insuffisance cardiaque globale', '', 'C13', 'I50, I11.0, I97.1, P29.0', 0, 20, 1, ''),
(706, 'Autres maladies cardiovasculaire', '', 'C14', 'I51.6', 0, 20, 1, ''),
(707, 'Maladie post-chirurgie', '', 'C15', 'NA', 0, 20, 1, ''),
(708, 'Insuffisance renale', 'Kidney disease', 'C16', 'N17-N19', 0, 20, 1, ''),
(709, 'Autres Maladies Cardiovasculaires et Renale', '', 'C17', 'N00-N08, N10-N16, N20-N23, N25-N29', 0, 20, 1, ''),
(710, 'Grossesse debutante', 'Starting pregnancy', 'G1', '', 0, 21, 1, ''),
(711, 'Menace dâ€™avortement', 'Abortion menace', 'G2', 'O47.9', 0, 21, 1, ''),
(712, 'Avortement spontane', 'Spontaneous abortion', 'G3', 'O03', 0, 21, 1, ''),
(713, 'Anemie severe (<7gm/dl) pendant grossesse', 'Severe anemia during pregnancy', 'G5', 'O99.0', 0, 21, 1, ''),
(714, 'Autres complications obstetriques', 'Other obstetrical complications', 'G6', 'O75.4', 0, 21, 1, ''),
(715, 'Regles douloureuses, dysmenorrhee', 'Dysmenorrhea', 'G7', 'O75.4', 0, 21, 1, ''),
(716, 'ECOULANT URINAIRE', '', '', '', 0, 10, 1, ''),
(717, 'CANDIDOSE VAGINAL', '', '', '', 0, 10, 1, ''),
(718, 'CANDIDOSE VAGINALE', '', '', '', 0, 10, 1, ''),
(719, 'suspection traumatisme cranien', '', '', '', 0, 10, 1, ''),
(720, 'PI,IVRI', '', '', '', 0, 10, 1, ''),
(721, 'RRA', '', '', '', 0, 10, 1, ''),
(722, 'SPLENOMEGARIE', '', '', '', 0, 10, 1, ''),
(723, 'Paludisme simple confirme hors grossesse - PS', '', '', '', 0, 10, 1, ''),
(724, 'CEOHALEE', '', '', '', 0, 10, 1, ''),
(725, 'AFF. CUTANE', '', '', '', 0, 10, 1, ''),
(726, 'Hyperglycemie', '', '', '', 0, 10, 1, ''),
(727, 'Rupture prematuree de la membrane', '', '', '', 0, 10, 1, ''),
(728, 'ACCOUCHEMENT INCOMPLET', '', '', '', 0, 10, 1, ''),
(729, 'Infection des voies respiratoires superieures - RAA', '', '', '', 0, 10, 1, ''),
(730, 'HEADECH', '', '', '', 0, 10, 1, ''),
(731, 'AGATHE', '', '', '', 0, 10, 1, ''),
(732, 'HEADACH', '', '', '', 0, 10, 1, ''),
(733, 'RAA - Rhumatisme articulaire aigu,', '', '', '', 0, 10, 1, ''),
(734, 'Affection buccal', '', '', '', 0, 10, 1, ''),
(735, 'AFFECTION DENTAIRE', '', '', '', 0, 10, 1, ''),
(736, 'Syndrome nevralgique', '', '', '', 0, 10, 1, ''),
(737, 'Syndrome grippal', '', '', '', 0, 10, 1, ''),
(738, 'ABSCE', '', '', '', 0, 10, 1, ''),
(739, 'Diarrhee non  sanglante,', '', '', '', 0, 10, 1, ''),
(740, 'INTEST AFF', '', '', '', 0, 10, 1, ''),
(741, 'INFECTION DIGESTION', '', '', '', 0, 10, 1, ''),
(742, 'Affection intestinales', '', '', '', 0, 10, 1, ''),
(743, 'piqures d\'insectes', '', '', '', 0, 10, 1, ''),
(744, 'E,V', '', '', '', 0, 10, 1, ''),
(745, 'rupture prematuree', '', '', '', 0, 10, 1, ''),
(746, 'SAUFLANCE FOETAL', '', '', '', 0, 10, 1, ''),
(747, 'Conjonctivite Allergic', '', '', '', 0, 10, 1, ''),
(748, 'Conjonctivite Allergique', '', '', '', 0, 10, 1, ''),
(749, 'Paludisme simple confirme hors grossesse - PSC', '', '', '', 1, 10, 1, ''),
(750, 'Infection des voies respiratoires inferieures - IVRI', '', '', '', 1, 10, 1, ''),
(751, 'SD GRIPPALE', '', '', '', 0, 10, 1, ''),
(752, 'Grossesse AVOLUTIVE', '', '', '', 0, 10, 1, ''),
(753, 'ECOULEMENT VAGINAL SUR LA GROSSESSE', '', '', '', 0, 10, 1, ''),
(754, 'EPISTOXIS', '', '', '', 0, 10, 1, ''),
(755, 'IVRI RAA', '', '', '', 0, 10, 1, ''),
(756, 'R9 E9', '', '', '', 0, 10, 1, ''),
(757, 'dysmenorrhee', '', '', '', 0, 10, 1, ''),
(758, 'INFECTION', '', '', '', 0, 10, 1, ''),
(759, 'ACOUCHEMENT', '', '', '', 0, 10, 1, ''),
(760, 'ANGI', '', '', '', 0, 10, 1, ''),
(761, 'Paludisme simple confirme sur grossesse - PSC', '', '', '', 0, 10, 1, ''),
(762, 'EV', '', '', '', 0, 10, 1, ''),
(763, 'Paludisme simple confirme SUR LA grossesse - PSC', '', '', '', 0, 10, 1, ''),
(764, 'Allergie,CONJOCTIVITE', '', '', '', 0, 10, 1, ''),
(765, 'ALLEGIE', '', '', '', 0, 10, 1, ''),
(766, '5310', '', '', '', 0, 10, 1, ''),
(767, 'ASTH', '', '', '', 0, 10, 1, ''),
(768, 'Parasitose Intestinale - PI/URTI', '', '', '', 0, 10, 1, ''),
(769, 'TROUBLE DELA GROSSESSE', '', '', '', 0, 10, 1, ''),
(770, 'TROUBLE DE GROSSECE', '', '', '', 0, 10, 1, ''),
(771, 'Conjonctivite, IVRI', '', '', '', 1, 10, 1, ''),
(772, 'ANG', '', '', '', 0, 10, 1, ''),
(773, 'Parasitose Intestinale - PI/RAA', '', '', '', 0, 10, 1, ''),
(774, 'INFECTION DE L\'OREILLE', '', '', '', 0, 10, 1, ''),
(775, 'INFECTION DE L', '', '', '', 0, 10, 1, ''),
(776, 'Affection DE L\'OREILLE', '', '', '', 0, 10, 1, ''),
(777, 'GASTRICT', '', '', '', 0, 10, 1, ''),
(778, 'PSC+', '', '', '', 0, 10, 1, ''),
(779, 'SD PALU', '', '', '', 0, 10, 1, ''),
(780, 'Plaie Traumatique', '', '', '', 0, 10, 1, ''),
(781, 'Autres infection des dents', '', '', '', 0, 10, 1, ''),
(782, 'Affection DE L', '', '', '', 0, 10, 1, ''),
(783, 'RAA - Rhumatisme articulaire aigu, GASTRITE. INTEST.AFF', '', '', '', 0, 10, 1, ''),
(784, 'ERUPTION CUTANEE', '', '', '', 0, 10, 1, ''),
(785, 'Thoracalgie', '', '', '', 0, 10, 1, ''),
(786, 'CEPHALEE, GASTRITE', '', '', '', 0, 10, 1, ''),
(787, 'PI, URTI', '', '', '', 0, 10, 1, ''),
(788, 'Parasitose Intestinale - PI', '', '', '', 1, 10, 1, ''),
(789, 'Paludisme simple confirme SUR LA grossesse - PSC', '', '', '', 1, 10, 1, ''),
(790, 'Candidose buccale', '', '', '', 1, 10, 1, ''),
(791, 'Mal de tete', '', '', '', 1, 10, 1, ''),
(792, 'SKIN AFF', '', '', '', 0, 10, 1, ''),
(793, 'ABD', '', '', '', 1, 10, 1, ''),
(794, 'Parasitose Intestinale - PI, INTEST AFF', '', '', '', 0, 10, 1, ''),
(795, 'FIEVRE PERISISTANTE', '', '', '', 0, 10, 1, ''),
(796, 'ANGINE, URTI', '', '', '', 0, 10, 1, ''),
(797, 'Infection aigues des voies respiratoires (IRA) autres', '', '', '', 1, 10, 1, ''),
(798, 'PlaieP', '', '', '', 0, 10, 1, ''),
(799, 'Parasitose Intestinale - PI, URTI', '', '', '', 0, 10, 1, ''),
(800, 'INGUINAL', '', '', '', 1, 10, 1, ''),
(801, 'CONJOCTIVITE', '', '', '', 0, 10, 1, ''),
(802, 'URTI/ INFECTION INTESTINALE', '', '', '', 0, 10, 1, ''),
(803, 'URTI, PI', '', '', '', 0, 10, 1, ''),
(804, 'Infection des voies respiratoires superieures - IVRS, PI', '', '', '', 0, 10, 1, ''),
(805, 'CEEPHALEE', '', '', '', 0, 10, 1, ''),
(806, 'AFF. INTEST', '', '', '', 0, 10, 1, ''),
(807, 'Parasitose Intestinale - PI , URTI', '', '', '', 0, 10, 1, ''),
(808, 'Affection intestinal', '', '', '', 0, 10, 1, ''),
(809, 'EPILEPCE', '', '', '', 0, 10, 1, ''),
(810, 'Paludisme simple confirme SUR grossesse', '', '', '', 0, 10, 1, ''),
(811, 'SD GRIPALE', '', '', '', 0, 10, 1, ''),
(812, 'ABCES TRAUMATIQUE', '', '', '', 0, 10, 1, ''),
(813, 'PSC SUR GROSSESSSE', '', '', '', 0, 10, 1, ''),
(814, 'ZONA', '', '', '', 0, 10, 1, ''),
(815, 'AFFECTION CUTANE', '', '', '', 0, 10, 1, ''),
(816, 'INF URIN', '', '', '', 0, 10, 1, ''),
(817, 'VALICELE', '', '', '', 0, 10, 1, ''),
(818, 'AFF.OCCULAIRE', '', '', '', 1, 10, 1, ''),
(819, 'Candidose Intestinale', '', '', '', 1, 10, 1, ''),
(820, 'SD RA', '', '', '', 0, 10, 1, ''),
(821, 'SD POLUSTRE SUR LA GROSSESSE', '', '', '', 0, 10, 1, ''),
(822, 'AFF .GYNECOLOGIQUE', '', '', '', 0, 10, 1, ''),
(823, 'SD INFECTION', '', '', '', 0, 10, 1, ''),
(824, 'ALIE', '', '', '', 0, 10, 1, ''),
(825, 'CAND.INTESTINAL', '', '', '', 0, 10, 1, ''),
(826, 'INF.INTESTINAL', '', '', '', 0, 10, 1, ''),
(827, 'LOMBALIGIE', '', '', '', 0, 10, 1, ''),
(828, 'ECOULEMENTVAGINALE', '', '', '', 0, 10, 1, ''),
(829, 'INF INT', '', '', '', 0, 10, 1, ''),
(830, 'HYPERTHEMIE', '', '', '', 0, 10, 1, ''),
(831, 'CONJOCTIVITE,DORSALGIE', '', '', '', 0, 10, 1, ''),
(832, 'FANTIOSIS', '', '', '', 0, 10, 1, ''),
(833, 'MIGRAINE', '', '', '', 0, 10, 1, ''),
(834, 'DR ART', '', '', '', 0, 10, 1, ''),
(835, 'CAND INT', '', '', '', 0, 10, 1, ''),
(836, 'AFF.CUTANE', '', '', '', 0, 10, 1, ''),
(837, 'URT', '', '', '', 0, 10, 1, ''),
(838, 'TROUBRE DE LA GROSSESSE', '', '', '', 0, 10, 1, ''),
(839, 'TROUBRE DE GROSSESSE', '', '', '', 0, 10, 1, ''),
(840, 'Parasitose Intestinale - PI/CONJOCTIVITE', '', '', '', 0, 10, 1, ''),
(841, 'CONJOCTIVITE ANELIGIQUE', '', '', '', 0, 10, 1, ''),
(842, 'TROUBLE DIGESTIF', '', '', '', 0, 10, 1, ''),
(843, 'RETENSION VERSICAL', '', '', '', 0, 10, 1, ''),
(844, 'ATITE Aigne', '', '', '', 0, 10, 1, ''),
(845, 'ALLAGIQUE', '', '', '', 0, 10, 1, ''),
(846, 'Troubles de la grossesse', '', '', '', 0, 10, 1, ''),
(847, 'PALARYSE', '', '', '', 0, 10, 1, ''),
(848, 'TRAUM', '', '', '', 0, 10, 1, ''),
(849, 'Parasitose Intestinale - PI+TP', '', '', '', 0, 10, 1, ''),
(850, 'PIRAA', '', '', '', 0, 10, 1, ''),
(851, 'URA', '', '', '', 0, 10, 1, ''),
(852, 'Parasitose Intestinale - PI/GASTRITE', '', '', '', 0, 10, 1, ''),
(853, 'RAA - Rhumatisme articulaire aigu', '', '', '', 0, 10, 1, ''),
(854, 'URTI/GASTRITE', '', '', '', 0, 10, 1, ''),
(855, 'NEVR', '', '', '', 0, 10, 1, ''),
(856, 'INF.INTEST', '', '', '', 0, 10, 1, ''),
(857, 'Parasitose Intestinale - PI, IVRI', '', '', '', 0, 10, 1, ''),
(858, 'Allergie CONJOCTIVITE', '', '', '', 0, 10, 1, ''),
(859, 'Infection aigues des voies respiratoires (IRA) autresPSC', '', '', '', 0, 10, 1, ''),
(860, 'Affection CUTANE autre', '', '', '', 0, 10, 1, ''),
(861, 'T.PHYSIQUE', '', '', '', 0, 10, 1, ''),
(862, 'HYPOCINESIE', '', '', '', 0, 10, 1, ''),
(863, 'RUPTURE PREMATURE DE LA MEMBRANE', '', '', '', 0, 10, 1, ''),
(864, 'TROUBLE DE LA GROSSESSSE', '', '', '', 0, 10, 1, ''),
(865, 'CONJONCTIVITE ALLEGIQUE', '', '', '', 0, 10, 1, ''),
(866, 'Parasitose Intestinale - PI, INF.URINAIRE', '', '', '', 0, 10, 1, ''),
(867, 'Parasitose Intestinale - PI , INFECTION URINAIRE', '', '', '', 0, 10, 1, ''),
(868, 'PSC,IVRI', '', '', '', 0, 10, 1, ''),
(869, 'UTILS', '', '', '', 0, 10, 1, ''),
(870, 'EXZEMA', '', '', '', 0, 10, 1, ''),
(871, 'trauble metal', '', '', '', 0, 10, 1, ''),
(872, 'CURATIVE', '', '', '', 0, 10, 1, ''),
(873, 'RAAA', '', '', '', 0, 10, 1, ''),
(874, 'Parasitose Intestinale -', '', '', '', 0, 10, 1, ''),
(875, 'CANDODOSE INTESTINAL', '', '', '', 0, 10, 1, ''),
(876, '822', '', '', '', 0, 10, 1, ''),
(877, 'TROUBLE DE LA GLOSSESSE', '', '', '', 0, 10, 1, ''),
(878, 'Paludisme avec troubles digestifs mineurs hors grossesse', '', '', '', 1, 10, 1, ''),
(879, 'DOULEUR ART', '', '', '', 0, 10, 1, ''),
(880, 'phynosis', '', '', '', 0, 10, 1, ''),
(881, 'neuvrargie', '', '', '', 0, 10, 1, ''),
(882, 'injonctivite allergic', '', '', '', 0, 10, 1, ''),
(883, 'dysemenorrhie', '', '', '', 0, 10, 1, ''),
(884, 'INF.BACTERIEN', '', '', '', 0, 10, 1, ''),
(885, 'Infection aigues des voies respiratoires (IRA) autres, DNS', '', '', '', 0, 10, 1, ''),
(886, 'INF.URIN', '', '', '', 0, 10, 1, ''),
(888, 'BRONCHITEAIGUE', '', '', '', 0, 10, 1, ''),
(889, 'ECAULEMENT VAGINAL', '', '', '', 0, 10, 1, ''),
(890, 'GASTRITE,INFECTION DIGESTIF', '', '', '', 0, 10, 1, ''),
(891, 'PSC. T PHYSIQUE', '', '', '', 0, 10, 1, ''),
(892, 'TEANIA', '', '', '', 0, 10, 1, ''),
(893, 'SYNDROME INF', '', '', '', 0, 10, 1, ''),
(894, 'HYPERTHENIIE', '', '', '', 0, 10, 1, ''),
(895, 'Mycoses CUTANE', '', '', '', 0, 10, 1, ''),
(896, 'PIIRA', '', '', '', 0, 10, 1, ''),
(897, 'Paludisme simple confirme hors grossesse - PSC', '', '', '', 0, 10, 1, ''),
(898, 'PSC-Paludisme simple confirme hors grossesse', '', '', '', 1, 10, 1, ''),
(899, 'PI-Parasitose Intestinale', '', '', '', 1, 10, 1, ''),
(900, 'Mal de tete, cephalee', '', '', '', 1, 10, 1, ''),
(901, 'utri', '', '', '', 0, 10, 1, ''),
(902, 'IVRI-Infection des voies respiratoires inferieures', '', '', '', 1, 10, 1, ''),
(903, 'Diarrhee sanglante (dysenterie)', '', '', '', 1, 10, 1, ''),
(904, 'IVRI-Infection des voies respiratoires inferieures, Otite', '', '', '', 1, 10, 1, ''),
(905, 'PI-Parasitose Intestinale, IVRI', '', '', '', 1, 10, 1, ''),
(906, 'AFF.OCC', '', '', '', 0, 10, 1, ''),
(907, 'wund', '', '', '', 0, 10, 1, '');
INSERT INTO `co_diagnostic` (`DiagnosticID`, `DiagnosticName`, `English`, `DiagnosticCode`, `Code`, `PECIME`, `DiagnosticCategoryID`, `Reported`, `SISCode`) VALUES
(908, 'cataracte', '', '', '', 0, 10, 1, ''),
(909, 'PSC-Paludisme simple confirme hors grossesse', '', '', '', 0, 10, 1, ''),
(910, 'URT RAA', '', '', '', 0, 10, 1, ''),
(911, 'PSC - Paludisme simple confirme', '', '', '', 1, 10, 1, ''),
(912, 'MALAISE SUR GROSS', '', '', '', 0, 10, 1, ''),
(913, 'Ulcere VENETAL', '', '', '', 0, 10, 1, ''),
(914, 'SD', '', '', '', 0, 10, 1, ''),
(915, 'Mal de dos/Dorsalgie/Lombalgie,GASTRITE', '', '', '', 0, 10, 1, ''),
(916, '72', '', '', '', 0, 10, 1, ''),
(917, 'AFF CUT', '', '', '', 0, 10, 1, ''),
(918, 'ECOULEMENT VAG,', '', '', '', 0, 10, 1, ''),
(919, 'IST', 'STI', 'I35', '', 0, 13, 0, ''),
(920, 'PSCS', '', '', '', 0, 10, 1, ''),
(921, 'Trouble de la grossesse', '', 'G8', '', 0, 21, 0, ''),
(922, 'GAUTE', '', '', '', 0, 10, 1, ''),
(923, 'D', '', '', '', 0, 10, 1, ''),
(924, 'SD INFECT', '', '', '', 0, 10, 1, ''),
(925, 'AFF OC', '', '', '', 0, 10, 1, ''),
(926, 'AFF.DENTAIRE', '', '', '', 0, 10, 1, ''),
(927, 'MALAISE SUR GROSSESSE', '', '', '', 0, 10, 1, ''),
(928, 'Acite', '', 'I36', '', 0, 13, 0, ''),
(929, 'Paludisme avec troubles digestifs mineurs hors grossesse', '', '', '', 0, 10, 1, ''),
(930, 'PSCOSE', '', '', '', 0, 10, 1, ''),
(931, 'IVRS-Infection des voies respiratoires superieures, Angine', '', '', '', 1, 10, 1, ''),
(932, 'Affection oculaire, autre', '', '', '', 1, 10, 1, ''),
(933, 'MORSURE DU CHIEN', '', '', '', 0, 10, 1, ''),
(934, 'IVRS-Infection des voies respiratoires superieures, Angine,', '', '', '', 0, 10, 1, ''),
(935, 'PI-Parasitose Intestinale, GASTRITE', '', '', '', 0, 10, 1, ''),
(936, 'PL', '', '', '', 0, 10, 1, ''),
(937, 'GASTRICTE', '', '', '', 0, 10, 1, ''),
(938, 'IVRI-Infection des voies respiratoires inferieuresCO-', '', '', '', 0, 10, 1, ''),
(939, 'DR', '', '', '', 0, 10, 1, ''),
(940, 'PSC SUR GROSS', '', '', '', 0, 10, 1, ''),
(941, 'AFFECTION DU SEIN', '', '', '', 0, 10, 1, ''),
(942, 'PI,PSC', '', '', '', 0, 10, 1, ''),
(943, 'PALPUTATION', '', '', '', 0, 10, 1, ''),
(944, 'EPISTASIE', '', '', '', 0, 10, 1, ''),
(945, 'AFFECTION INTEST', '', '', '', 0, 10, 1, ''),
(946, 'BACTERIOL', '', '', '', 0, 10, 1, ''),
(947, 'ALLERGIC', '', '', '', 0, 10, 1, ''),
(948, 'IRA - Infection aigues des voies respiratoires', '', '', '', 1, 10, 1, ''),
(949, 'PI - Parasitose Intestinale', '', '', '', 1, 10, 1, ''),
(950, 'AMIBIOSE', '', '', '', 0, 10, 1, ''),
(951, 'DYMINOLEE', '', '', '', 0, 10, 1, ''),
(952, 'PAA', '', '', '', 0, 10, 1, ''),
(953, 'ECOULEMENT URETRAL', '', '', '', 0, 10, 1, ''),
(954, '74', '', '', '', 0, 10, 1, ''),
(955, 'AFECTION CUTANE', '', '', '', 0, 10, 1, ''),
(956, 'DOULLEUR ARTICULAIRE', '', '', '', 0, 10, 1, ''),
(957, 'PARAPHIMOSIS', '', '', '', 0, 10, 1, ''),
(958, 'AFF INTEST', '', '', '', 0, 10, 1, ''),
(959, 'LUXACTION', '', '', '', 0, 10, 1, ''),
(960, 'COMPLICATION SUR LA GROSSESSE', '', '', '', 0, 10, 1, ''),
(961, 'CRISE D\'ASTHME', '', '', '', 0, 10, 1, ''),
(962, 'SR GRIPPAL', '', '', '', 0, 10, 1, ''),
(963, 'SGRIPPAL', '', '', '', 0, 10, 1, ''),
(964, 'SD INFECT.', '', '', '', 0, 10, 1, ''),
(965, 'rupture premature des membrane', '', '', '', 0, 10, 1, ''),
(966, '76', '', '', '', 0, 10, 1, ''),
(967, 'picure d\'insecte', '', '', '', 0, 10, 1, ''),
(968, 'SD AA', '', '', '', 0, 10, 1, ''),
(969, 'Paludisme simple confirme hors grossesse - PSC', 'Paludism without pregnancy', 'M1', 'B53.8', 0, 22, 1, ''),
(970, 'Paludisme avec troubles digestifs mineurs hors grossesse', 'Paludism with minor digestion troubles, without pregnancy', 'M2', 'O98.6.1', 0, 22, 1, ''),
(971, 'Paludisme grave confirme - PGC', 'Severe paludism', 'M3', '', 0, 22, 1, ''),
(972, 'Paludisme simple pendant grossesse', 'Paludism with pregnancy', 'M4', 'O98.6', 0, 22, 1, ''),
(973, 'Paludisme avec troubles digestifs mineurs pendant grossesse', 'Paludism with minor digestion troubles, with pregnancy', 'M5', 'O98.6.1', 0, 22, 1, ''),
(974, 'Traumatisme Physique, tumefaction', 'Physical traumatism', 'E1', '', 0, 23, 1, ''),
(975, 'Plaie', 'Wound', 'E2', '', 0, 23, 1, ''),
(976, 'Plaie causee par un animal', 'Wound caused by animal', 'E3', '', 0, 23, 1, ''),
(977, 'Abces', 'Abcess', 'E4', 'L02.9', 0, 23, 1, ''),
(978, 'Brulure', 'Burn', 'E5', '', 0, 23, 1, ''),
(979, 'Fracture', 'Break', 'E6', '', 0, 23, 1, ''),
(980, 'Mal de dos', 'Backache', 'E7', '', 0, 23, 1, ''),
(981, 'Torticolis', 'Stiff neck', 'E8', '', 0, 23, 1, ''),
(982, 'RAA - Rhumatisme articulaire aigu, douleur musculaire', 'Accute rhumatism, muscle pain', 'E9', '', 0, 23, 1, ''),
(983, 'Thoracalgie, costalgie', 'Chest / ribs pain', 'E10', '', 0, 23, 1, ''),
(984, 'Paralysie', 'Paralysie', 'E11', '', 0, 23, 1, ''),
(985, 'Paralysie flasque aigue (polio suspect)', 'Accute paralysie, polio suspected', 'E12', 'A80', 0, 23, 1, ''),
(986, 'Malformation de naissance, frein lingual', 'Birth malformation', 'E13', '', 0, 23, 1, ''),
(987, 'Mal de tete', 'Headache', 'I1', '', 0, 24, 1, ''),
(988, 'Problemes dâ€™alimentation, inappetance', 'Loss of apetite', 'I2', '', 0, 24, 1, ''),
(989, 'Allergie', 'Allergy', 'I3', '', 0, 24, 1, ''),
(990, 'Anemie simple', 'Simple anemia', 'I4', '', 0, 24, 1, ''),
(991, 'Anemie severe', 'Severe anemia', 'I5', '', 0, 24, 1, ''),
(992, 'Deshydratation', 'Dehydration', 'I6', '', 0, 24, 1, ''),
(993, 'Intoxication alimentaire', 'Food intoxication', 'I7', 'A05', 0, 24, 1, ''),
(994, 'Candidose Intestinale', 'Intestinal candidose', 'I8', '', 0, 24, 1, ''),
(995, 'Infection Intestinale', 'Intestinal infection', 'I9', '', 0, 24, 1, ''),
(996, 'Parasitose Intestinale - PI', 'Intestinal parasitosis', 'I10', '', 0, 24, 1, ''),
(997, 'Gastrite et Duodenite', 'Gastrite and Duodenite', 'I11', 'K29.9', 0, 24, 1, ''),
(998, 'Verminose', 'Verminose', 'I12', '', 0, 24, 1, ''),
(999, 'Diarrhee sans deshydratation', 'Diarrhea without dehydration', 'I13', '', 0, 24, 1, ''),
(1000, 'Diarrhee avec deshydratation', 'Diarrhea with dehydration', 'I14', '', 0, 24, 1, ''),
(1001, 'Diarrhee avec deshydratation severe', 'Diarrhea with severe dehydration', 'I15', '', 0, 24, 1, ''),
(1002, 'Diarrhee persistante', 'Persistant diarrhea', 'I16', '', 0, 24, 1, ''),
(1003, 'Diarrhee persistante severe', 'Severe persistant diarrhea', 'I17', '', 0, 24, 1, ''),
(1004, 'Diarrhee sanglante (dysenterie)', 'Blood diarrhea', 'I18', 'A09.3', 0, 24, 1, ''),
(1005, 'Dysenterie amibiase', 'Amibiase dysentery', 'I19', '', 0, 24, 1, ''),
(1006, 'Constipation', 'Constipation', 'I20', '', 0, 24, 1, ''),
(1007, 'Douleur abdominale basse', 'Low abdominal pain', 'I21', '', 0, 24, 1, ''),
(1008, 'Infection Bacterienne, locale', 'Local bacterian infection', 'I22', '', 0, 24, 1, ''),
(1009, 'Infection Bacterienne, severe ou grave (septicemie)', 'Bacterial infection, severe (septicemie)', 'I23', '', 0, 24, 1, ''),
(1010, 'Infection des voies urinaires', 'Urinary track infection', 'I24', 'N39.0', 0, 24, 1, ''),
(1011, 'Proteinurie', 'Proteinurie', 'I25', '', 0, 24, 1, ''),
(1012, 'Meningite presumee', 'Meningitis suspected', 'I26', 'G03.9', 0, 24, 1, ''),
(1013, 'Varicelle', 'Varicelle', 'I27', '', 0, 24, 1, ''),
(1014, 'Rougeole confirmee', 'Meascle, confirmed', 'I28', '', 0, 24, 1, ''),
(1015, 'Rougeole presumee, sans complications', 'Meascle, suspected', 'I29', '', 0, 24, 1, ''),
(1016, 'Rougeole presumee, avec complications yeux/bouche', 'Meascle, suspected with eye/mouth complications', 'I30', '', 0, 24, 1, ''),
(1017, 'Rougeole presumee, severe compliquee', 'Meascle, severe suspected with complications', 'I31', '', 0, 24, 1, ''),
(1018, 'Rubeole confirmee', 'Rubeola suspected', 'I32', '', 0, 24, 1, ''),
(1019, 'Trouble hormonal', 'Hormonal trouble', 'I33', '', 0, 24, 1, ''),
(1020, 'Trouble neurologique, syndrome nevralgique', 'Neurological trouble', 'I34', '', 0, 24, 1, ''),
(1021, 'Rhinite, Syndrome grippal', 'Rhinoria', 'R1', '', 0, 25, 1, ''),
(1022, 'Infection aigues des voies respiratoires (IRA) autres', 'ARTI - Accute respiratory track infection', 'R2', 'J22 J06.9', 0, 25, 1, ''),
(1023, 'Infection des voies respiratoires inferieures - IVRI', 'LRTI', 'R3', '', 0, 25, 1, ''),
(1024, 'Infection des voies respiratoires superieures - IVRS', 'URTI', 'R4', '', 0, 25, 1, ''),
(1025, 'Pneumonie', 'Pneumonia', 'R5', 'J18.9', 0, 25, 1, ''),
(1026, 'Pneumonie severe ou maladie respiratoire grave', 'Severe pneumonia or severe respiratory disease', 'R6', '', 0, 25, 1, ''),
(1027, 'Mycoses Superficielles', 'Superficial mycositis', 'D1', 'B36.9', 0, 26, 1, ''),
(1028, 'Gale', 'Pitches', 'D2', 'B86', 0, 26, 1, ''),
(1029, 'Autre affection cutanee', 'Other skin affection', 'D3', 'L00 L08', 0, 26, 1, ''),
(1030, 'Oedeme', 'Oedema', 'D4', '', 0, 26, 1, ''),
(1031, 'Ulcere cutane', 'Skin ulcere', 'D5', 'L89', 0, 26, 1, ''),
(1032, 'Herpes simplex', 'Herpes simplex', 'D6', 'B00.9', 0, 26, 1, ''),
(1033, 'Hemorroides', 'Hemorroides', 'D7', '', 0, 26, 1, ''),
(1034, 'Otite', 'Otitis', 'O1', 'H65', 0, 27, 1, ''),
(1035, 'Infection chronique de lâ€™oreille', 'Chronical ear infection', 'O2', '', 0, 27, 1, ''),
(1036, 'Conjonctivite', 'Conjonctivitis', 'O3', 'H10.9', 0, 27, 1, ''),
(1037, 'Perte de vue', 'Loss of vision', 'O4', 'H52.7', 0, 27, 1, ''),
(1038, 'Affection oculaire, autre', 'Other eye affection', 'O5', 'H57.9', 0, 27, 1, ''),
(1039, 'Cecite Nocturne â€“ carence en Vitamine A', 'Night cecity - lack of vitamin A', 'O6', '', 0, 27, 1, ''),
(1040, 'Gonococcie oculaire (probable)', '', 'O7', '', 0, 27, 1, ''),
(1041, 'Carie dentaire', 'Dental carie', 'B1', 'K02', 0, 28, 1, ''),
(1042, 'Candidose buccale', 'Mouth candidose', 'B2', '', 0, 28, 1, ''),
(1043, 'Autres infection des dents et de gencives', 'Other tooth / gum infection', 'B3', 'K29.9', 0, 28, 1, ''),
(1044, 'Hypothermie moderee', 'Moderate hypothermia', 'P1', '', 0, 29, 1, ''),
(1045, 'Prematurite', 'Premature child', 'P2', '', 0, 29, 1, ''),
(1046, 'Insuffisance ponderale severe Ã  la naissance (< 1,5 kg)', 'Low birth weight - severe', 'P3', '', 0, 29, 1, ''),
(1047, 'Insuffisance ponderale moderee Ã  la naissance (1,5 - 2,5 kg)', 'Low birth weight - moderate', 'P4', '', 0, 29, 1, ''),
(1048, 'Conjonctivite purulente du nouveau ne ou autre', 'Eye pus discharge', 'P5', '', 0, 29, 1, ''),
(1049, 'Mastoidite', 'Mastoidite', 'P6', '', 0, 29, 1, ''),
(1050, 'Troubles Psychologiques/mentaux', 'Mental/Psychological troubles', 'S1', '', 0, 30, 1, ''),
(1051, 'Epilepsie', 'Epilepsy', 'S2', '', 0, 30, 1, ''),
(1052, 'Suicide (Tentative ou Reussie)', 'Suicide (attempted or successful)', 'S3', '', 0, 30, 1, ''),
(1053, 'Hypertension - HTA', 'Hypertension', 'C1', 'I10 I15', 0, 31, 1, ''),
(1054, 'Asthme', 'Asthma', 'C2', 'J45 J46', 0, 31, 1, ''),
(1055, 'Broncho-pneumopathie chronique', 'Chronical Broncho-pneumonia', 'C3', 'J44 J47', 0, 31, 1, ''),
(1056, 'Diabete - Type 1', 'Diabete - Type 1', 'C4', 'E10', 0, 31, 1, ''),
(1057, 'Diabete - Type 2', 'Diabete - Type 2', 'C5', 'E11', 0, 31, 1, ''),
(1058, 'Diabete gestationnaire', 'Diabete during pregnancy', 'C6', 'O24', 0, 31, 1, ''),
(1059, 'Cardiomyopathie', 'Cardiomyopathy', 'C7', 'I42', 0, 31, 1, ''),
(1060, 'Infarctus ou hemorragie cerebrale', 'Infarctus or brain hemorragy', 'C8', 'G45, I60-I64', 0, 31, 1, ''),
(1061, 'Cardiopathie rhumatismale', 'Rhumatismal cardiopathy', 'C9', 'I05-I09', 0, 31, 1, ''),
(1062, 'Cardiopathie congenitale', 'Congenital cardiopathy', 'C10', 'Q20-Q28', 0, 31, 1, ''),
(1063, 'Maladie de l\'artere coronaire', '', 'C11', 'I25.1', 0, 31, 1, ''),
(1064, 'Maladie pericardique', '', 'C12', 'I30-I31', 0, 31, 1, ''),
(1065, 'Insuffisance cardiaque globale', '', 'C13', 'I50, I11.0, I97.1, P29.0', 0, 31, 1, ''),
(1066, 'Autres maladies cardiovasculaire', '', 'C14', 'I51.6', 0, 31, 1, ''),
(1067, 'Maladie post-chirurgie', '', 'C15', 'NA', 0, 31, 1, ''),
(1068, 'Insuffisance renale', 'Kidney disease', 'C16', 'N17-N19', 0, 31, 1, ''),
(1069, 'Autres Maladies Cardiovasculaires et Renale', '', 'C17', 'N00-N08, N10-N16, N20-N23, N25-N29', 0, 31, 1, ''),
(1070, 'Grossesse debutante', 'Starting pregnancy', 'G1', '', 0, 32, 1, ''),
(1071, 'Menace dâ€™avortement', 'Abortion menace', 'G2', 'O47.9', 0, 32, 1, ''),
(1072, 'Avortement spontane', 'Spontaneous abortion', 'G3', 'O03', 0, 32, 1, ''),
(1073, 'Anemie severe (<7gm/dl) pendant grossesse', 'Severe anemia during pregnancy', 'G5', 'O99.0', 0, 32, 1, ''),
(1074, 'Autres complications obstetriques', 'Other obstetrical complications', 'G6', 'O75.4', 0, 32, 1, ''),
(1075, 'Regles douloureuses, dysmenorrhee', 'Dysmenorrhea', 'G7', 'O75.4', 0, 32, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `co_diagnostic_category`
--

CREATE TABLE `co_diagnostic_category` (
  `DiagnosticCategoryID` int(11) NOT NULL,
  `CategoryCode` varchar(255) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_diagnostic_category`
--

INSERT INTO `co_diagnostic_category` (`DiagnosticCategoryID`, `CategoryCode`, `CategoryName`) VALUES
(1, '', 'Nouveaux cas de maladies'),
(2, '', 'Nouveaux cas de VIH/SIDA/TB et maladies non-transmissibles'),
(3, '', 'Les Maladies Oculaires et Orales'),
(4, '', 'Prise en charge intÃ©grÃ©e des maladies de lâ€™enfance'),
(5, '', 'Autres pathologies'),
(6, '', 'SantÃ© Mentale'),
(7, '', 'Maladies chroniques'),
(8, '', 'Autres Maladies Cardiovasculaires et RÃ©nale'),
(9, '', 'Blessures (Injuries)'),
(10, '', 'Autres'),
(11, 'M', 'MALARIA'),
(12, 'E', 'EXTERNE / MOTEUR'),
(13, 'I', 'INTERNE'),
(14, 'R', 'RESPIRATOIRE'),
(15, 'D', 'DERMATO'),
(16, 'O', 'OREILLE/OEIL'),
(17, 'B', 'BOUCHE'),
(18, 'P', 'PECIME'),
(19, 'S', 'SANTE MENTALE'),
(20, 'C', 'Maladies chroniques, Cardiovasculaires et RÃ©nale'),
(21, 'G', 'GYNECO'),
(22, 'M', 'MALARIA'),
(23, 'E', 'EXTERNE / MOTEUR'),
(24, 'I', 'INTERNE'),
(25, 'R', 'RESPIRATOIRE'),
(26, 'D', 'DERMATO'),
(27, 'O', 'OREILLE/OEIL'),
(28, 'B', 'BOUCHE'),
(29, 'P', 'PECIME'),
(30, 'S', 'SANTE MENTALE'),
(31, 'C', 'Maladies chroniques, Cardiovasculaires et RÃ©nale'),
(32, 'G', 'GYNECO');

-- --------------------------------------------------------

--
-- Table structure for table `co_diagnostic_records`
--

CREATE TABLE `co_diagnostic_records` (
  `DiagnosticRecordID` int(11) NOT NULL,
  `ConsulationRecordID` int(11) NOT NULL,
  `DiagnosticID` int(11) NOT NULL,
  `DiagnosticType` int(11) NOT NULL COMMENT '1 for pripal diagnostic and 2 for secondary diagnostic',
  `CaseType` int(11) NOT NULL DEFAULT '0' COMMENT '1 for old cases and 0 for new cases',
  `PECIME` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_price`
--

CREATE TABLE `co_price` (
  `ConsultationPriceID` int(11) NOT NULL,
  `ConsultationCategoryID` int(11) NOT NULL,
  `InsuranceCategoryID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_price`
--

INSERT INTO `co_price` (`ConsultationPriceID`, `ConsultationCategoryID`, `InsuranceCategoryID`, `Amount`, `Date`, `Status`) VALUES
(1, 10, 2, 300, '2017-01-01', 1),
(2, 10, 3, 690, '2017-01-01', 1),
(3, 10, 5, 1035, '2017-01-01', 0),
(4, 10, 4, 750, '2017-01-01', 1),
(5, 10, 1, 863, '2017-01-01', 1),
(6, 11, 2, 360, '2017-01-01', 1),
(7, 11, 3, 828, '2017-01-01', 1),
(8, 11, 5, 1242, '2017-01-01', 1),
(9, 11, 4, 900, '2017-01-01', 1),
(10, 11, 1, 1035, '2017-01-01', 1),
(11, 12, 2, 300, '2017-01-01', 1),
(12, 12, 3, 690, '2017-01-01', 1),
(13, 12, 5, 1035, '2017-01-01', 1),
(14, 12, 4, 750, '2017-01-01', 1),
(15, 12, 1, 863, '2017-01-01', 1),
(16, 13, 2, 300, '2017-01-01', 1),
(17, 13, 3, 690, '2017-01-01', 1),
(18, 13, 5, 1035, '2017-01-01', 1),
(19, 13, 4, 750, '2017-01-01', 1),
(20, 13, 1, 863, '2017-01-01', 1),
(21, 14, 2, 300, '2017-01-01', 1),
(22, 14, 3, 690, '2017-01-01', 1),
(23, 14, 5, 1035, '2017-01-01', 1),
(24, 14, 4, 750, '2017-01-01', 1),
(25, 14, 1, 863, '2017-01-01', 1),
(26, 15, 2, 0, '2017-01-01', 1),
(27, 15, 3, 0, '2017-01-01', 1),
(28, 15, 5, 0, '2017-01-01', 1),
(29, 15, 4, 0, '2017-01-01', 1),
(30, 15, 1, 0, '2017-01-01', 1),
(31, 16, 2, 360, '2017-04-07', 1),
(32, 16, 3, 828, '2017-04-07', 1),
(33, 16, 4, 900, '2017-04-07', 1),
(34, 16, 1, 1242, '2017-04-07', 0),
(35, 10, 5, 1242, '2017-04-07', 0),
(36, 16, 1, 1035, '2017-04-07', 1),
(37, 10, 5, 1035, '2017-04-07', 1),
(38, 16, 5, 1242, '2017-04-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `co_records`
--

CREATE TABLE `co_records` (
  `ConsultationRecordID` int(11) NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `ConsultationPriceID` int(11) NOT NULL,
  `ConsultantID` int(11) NOT NULL,
  `RegisterNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_special_data`
--

CREATE TABLE `co_special_data` (
  `DataID` int(11) NOT NULL,
  `SpecialID` int(11) NOT NULL,
  `DiagnosticID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `co_special_diagnostic`
--

CREATE TABLE `co_special_diagnostic` (
  `SpecialID` int(11) NOT NULL,
  `SpecialName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `co_special_diagnostic`
--

INSERT INTO `co_special_diagnostic` (`SpecialID`, `SpecialName`) VALUES
(1, 'ivrs'),
(2, 'ivri'),
(3, 'ira');

-- --------------------------------------------------------

--
-- Table structure for table `ho_price`
--

CREATE TABLE `ho_price` (
  `HOPriceID` int(11) NOT NULL,
  `HOTypeID` int(11) NOT NULL,
  `InsuranceCategoryID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ho_price`
--

INSERT INTO `ho_price` (`HOPriceID`, `HOTypeID`, `InsuranceCategoryID`, `Amount`, `Date`, `Status`) VALUES
(1, 5, 2, 180, '2017-01-01', 1),
(2, 5, 3, 414, '2017-01-01', 1),
(3, 5, 5, 621, '2017-01-01', 1),
(4, 5, 4, 450, '2017-01-01', 1),
(5, 5, 1, 518, '2017-01-01', 1),
(6, 6, 2, 600, '2017-01-01', 1),
(7, 6, 3, 1380, '2017-01-01', 1),
(8, 6, 5, 2070, '2017-01-01', 1),
(9, 6, 4, 1500, '2017-01-01', 1),
(10, 6, 1, 1725, '2017-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ho_record`
--

CREATE TABLE `ho_record` (
  `HORecordID` int(11) NOT NULL,
  `RecordID` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `HOPriceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ho_record`
--

INSERT INTO `ho_record` (`HORecordID`, `RecordID`, `Days`, `StartDate`, `EndDate`, `HOPriceID`) VALUES
(1, 67, 1, '0000-00-00', '0000-00-00', 1),
(2, 456, 1, '0000-00-00', '0000-00-00', 1),
(3, 470, 3, '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ho_type`
--

CREATE TABLE `ho_type` (
  `TypeID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ho_type`
--

INSERT INTO `ho_type` (`TypeID`, `Name`) VALUES
(5, 'Hospitalisation salle commune/j'),
(6, 'Hospitalisation chambre/j');

-- --------------------------------------------------------

--
-- Table structure for table `in_category`
--

CREATE TABLE `in_category` (
  `InsuranceCategoryID` int(11) NOT NULL,
  `InsuranceCode` varchar(100) NOT NULL,
  `InsuranceCategoryName` varchar(255) NOT NULL,
  `StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_category`
--

INSERT INTO `in_category` (`InsuranceCategoryID`, `InsuranceCode`, `InsuranceCategoryName`, `StartDate`) VALUES
(1, 'D', 'Private Society Insurance', '2017-01-01'),
(2, 'A', 'Community Insurance', '2017-01-01'),
(3, 'B', 'MMI', '2017-01-01'),
(4, 'C', 'RAMA', '2017-01-01'),
(5, 'E', 'No Valuable Insurance ', '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `in_forms`
--

CREATE TABLE `in_forms` (
  `FormID` int(11) NOT NULL,
  `InsuranceNameID` int(11) NOT NULL,
  `FormFile` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_forms`
--

INSERT INTO `in_forms` (`FormID`, `InsuranceNameID`, `FormFile`, `Date`) VALUES
(1, 2, 'frm_1.php', '2017-01-01'),
(2, 1, 'frm_2.3.php', '2017-01-01'),
(3, 3, 'frm_3.php', '2017-01-01'),
(4, 4, 'frm_4.php', '2017-01-01'),
(5, 5, 'frm_5.php', '2017-01-01'),
(6, 6, 'frm_6.php', '2017-01-01'),
(7, 1, 'frm_2.3.php', '2018-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `in_name`
--

CREATE TABLE `in_name` (
  `InsuranceNameID` int(11) NOT NULL,
  `InsuranceName` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_name`
--

INSERT INTO `in_name` (`InsuranceNameID`, `InsuranceName`, `CategoryID`, `Date`, `Status`) VALUES
(1, 'CBHI', 2, '2017-01-01', 1),
(2, 'Private', 5, '2017-01-01', 1),
(3, 'RSSB RAMA', 4, '2017-01-01', 1),
(4, 'MMI', 3, '2017-01-01', 1),
(5, 'MEDIPLAN', 1, '2017-01-01', 1),
(6, 'CORAR', 1, '2017-01-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `in_price`
--

CREATE TABLE `in_price` (
  `InsurancePriceID` int(11) NOT NULL,
  `InsuranceNameID` int(11) NOT NULL,
  `TypeofPayment` int(11) NOT NULL DEFAULT '1',
  `ValuePaid` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_price`
--

INSERT INTO `in_price` (`InsurancePriceID`, `InsuranceNameID`, `TypeofPayment`, `ValuePaid`, `Date`) VALUES
(1, 1, 2, 10, '2017-01-01'),
(2, 2, 1, 100, '2017-01-01'),
(3, 3, 1, 15, '2017-01-01'),
(4, 5, 1, 10, '2017-01-01'),
(5, 4, 1, 15, '2017-01-01'),
(6, 6, 1, 15, '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `la_exam`
--

CREATE TABLE `la_exam` (
  `ExamID` int(11) NOT NULL,
  `ExamName` varchar(255) NOT NULL,
  `ExamCode` varchar(255) NOT NULL,
  `ResultType` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_exam`
--

INSERT INTO `la_exam` (`ExamID`, `ExamName`, `ExamCode`, `ResultType`) VALUES
(32, 'GE', '', 0),
(33, 'Hcte', '', 0),
(34, 'GR', '', 0),
(35, 'GB', '', 0),
(36, 'Plaquettes', '', 0),
(37, 'FL', '', 0),
(38, 'GS+RhÃ©sus', '', 0),
(39, 'Selles', '', 0),
(40, 'Hemogramme Complet (NFS ,Hb, Hte, GR,GB,MGV Plaquettes,CCMH,TCMH)', '', 0),
(41, 'Hb', '', 0),
(42, 'GlycÃ©mie', '', 0),
(43, 'V.S.', '', 0),
(44, 'ECBU', '', 0),
(45, 'Albuminurie', '', 0),
(46, 'Glycosurie', '', 0),
(47, 'SÃ©diment', '', 0),
(48, 'Uree', '', 0),
(49, 'Creatinine', '', 0),
(50, 'Gram', '', 0),
(51, 'Frottis vaginal Ã  frais', '', 0),
(52, 'Frottis vaginal Ã  gram', '', 0),
(53, 'Crachat BK', '', 0),
(54, 'Test de grossesse', '', 0),
(55, 'RPR', '', 0),
(56, 'SGPT', '', 0),
(57, 'SGOT', '', 0),
(58, 'GAMMA GT', '', 0),
(59, 'TB Sputum smear', '', 0),
(60, 'TDR', 'TDR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `la_malaria`
--

CREATE TABLE `la_malaria` (
  `MalariaID` int(11) NOT NULL,
  `LaboData` double NOT NULL,
  `Ge Pos` double NOT NULL,
  `Ge Neg & TDR Pos` double NOT NULL,
  `PharmacyData` double NOT NULL,
  `coartem 6x1` double NOT NULL,
  `coartem 6x2` double NOT NULL,
  `coartem 6x3` double NOT NULL,
  `coartem 6x4` double NOT NULL,
  `quinine` double NOT NULL,
  `artesunate` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_malaria`
--

INSERT INTO `la_malaria` (`MalariaID`, `LaboData`, `Ge Pos`, `Ge Neg & TDR Pos`, `PharmacyData`, `coartem 6x1`, `coartem 6x2`, `coartem 6x3`, `coartem 6x4`, `quinine`, `artesunate`, `Date`) VALUES
(1, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, '2018-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `la_price`
--

CREATE TABLE `la_price` (
  `ExamPriceID` int(11) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `InsuranceTypeID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_price`
--

INSERT INTO `la_price` (`ExamPriceID`, `ExamID`, `Amount`, `Date`, `InsuranceTypeID`, `Status`) VALUES
(141, 32, 270, '2018-07-01', 2, 1),
(142, 32, 621, '2018-07-01', 3, 1),
(143, 32, 932, '2018-07-01', 5, 1),
(144, 32, 675, '2018-07-01', 4, 1),
(145, 32, 776, '2018-07-01', 1, 1),
(146, 33, 168.75, '2018-07-01', 2, 1),
(147, 33, 389, '2018-07-01', 3, 1),
(148, 33, 582, '2018-07-01', 5, 1),
(149, 33, 423, '2018-07-01', 4, 1),
(150, 33, 485, '2018-07-01', 1, 1),
(151, 34, 168.75, '2018-07-01', 2, 1),
(152, 34, 389, '2018-07-01', 3, 1),
(153, 34, 582, '2018-07-01', 5, 1),
(154, 34, 423, '2018-07-01', 4, 1),
(155, 34, 485, '2018-07-01', 1, 1),
(156, 35, 168.75, '2018-07-01', 2, 1),
(157, 35, 389, '2018-07-01', 3, 1),
(158, 35, 582, '2018-07-01', 5, 1),
(159, 35, 423, '2018-07-01', 4, 1),
(160, 35, 485, '2018-07-01', 1, 1),
(161, 36, 168.75, '2018-07-01', 2, 1),
(162, 36, 389, '2018-07-01', 3, 1),
(163, 36, 582, '2018-07-01', 5, 1),
(164, 36, 423, '2018-07-01', 4, 1),
(165, 36, 485, '2018-07-01', 1, 1),
(166, 37, 168.75, '2018-07-01', 2, 1),
(167, 37, 389, '2018-07-01', 3, 1),
(168, 37, 582, '2018-07-01', 5, 1),
(169, 37, 423, '2018-07-01', 4, 1),
(170, 37, 485, '2018-07-01', 1, 1),
(171, 38, 168.75, '2018-07-01', 2, 1),
(172, 38, 389, '2018-07-01', 3, 1),
(173, 38, 582, '2018-07-01', 5, 1),
(174, 38, 423, '2018-07-01', 4, 1),
(175, 38, 485, '2018-07-01', 1, 1),
(176, 39, 202.5, '2018-07-01', 2, 1),
(177, 39, 466, '2018-07-01', 3, 1),
(178, 39, 699, '2018-07-01', 5, 1),
(179, 39, 506, '2018-07-01', 4, 1),
(180, 39, 582, '2018-07-01', 1, 1),
(181, 40, 1500, '2018-07-01', 2, 1),
(182, 40, 3450, '2018-07-01', 3, 1),
(183, 40, 6555, '2018-07-01', 5, 1),
(184, 40, 3750, '2018-07-01', 4, 1),
(185, 40, 5463, '2018-07-01', 1, 1),
(186, 41, 236.25, '2018-07-01', 2, 1),
(187, 41, 544, '2018-07-01', 3, 1),
(188, 41, 815, '2018-07-01', 5, 1),
(189, 41, 591, '2018-07-01', 4, 1),
(190, 41, 680, '2018-07-01', 1, 1),
(191, 42, 438.75, '2018-07-01', 2, 1),
(192, 42, 1010, '2018-07-01', 3, 1),
(193, 42, 1513, '2018-07-01', 5, 1),
(194, 42, 1098, '2018-07-01', 4, 1),
(195, 42, 1262, '2018-07-01', 1, 1),
(196, 43, 438.75, '2018-07-01', 2, 1),
(197, 43, 1010, '2018-07-01', 3, 1),
(198, 43, 1513, '2018-07-01', 5, 1),
(199, 43, 1098, '2018-07-01', 4, 1),
(200, 43, 1262, '2018-07-01', 1, 1),
(201, 44, 236.25, '2018-07-01', 2, 1),
(202, 44, 544, '2018-07-01', 3, 1),
(203, 44, 815, '2018-07-01', 5, 1),
(204, 44, 591, '2018-07-01', 4, 1),
(205, 44, 680, '2018-07-01', 1, 1),
(206, 45, 236.25, '2018-07-01', 2, 1),
(207, 45, 544, '2018-07-01', 3, 1),
(208, 45, 815, '2018-07-01', 5, 1),
(209, 45, 591, '2018-07-01', 4, 1),
(210, 45, 680, '2018-07-01', 1, 1),
(211, 46, 236.25, '2018-07-01', 2, 1),
(212, 46, 544, '2018-07-01', 3, 1),
(213, 46, 815, '2018-07-01', 5, 1),
(214, 46, 591, '2018-07-01', 4, 1),
(215, 46, 680, '2018-07-01', 1, 1),
(216, 47, 168.75, '2018-07-01', 2, 1),
(217, 47, 389, '2018-07-01', 3, 1),
(218, 47, 582, '2018-07-01', 5, 1),
(219, 47, 423, '2018-07-01', 4, 1),
(220, 47, 485, '2018-07-01', 1, 1),
(221, 48, 675, '2018-07-01', 2, 1),
(222, 48, 1553, '2018-07-01', 3, 1),
(223, 48, 2329.2, '2018-07-01', 5, 1),
(224, 48, 1688, '2018-07-01', 4, 1),
(225, 48, 1941, '2018-07-01', 1, 1),
(226, 49, 675, '2018-07-01', 2, 1),
(227, 49, 1553, '2018-07-01', 3, 1),
(228, 49, 2329.2, '2018-07-01', 5, 1),
(229, 49, 1688, '2018-07-01', 4, 1),
(230, 49, 1941, '2018-07-01', 1, 1),
(231, 50, 168.75, '2018-07-01', 2, 1),
(232, 50, 389, '2018-07-01', 3, 1),
(233, 50, 582, '2018-07-01', 5, 1),
(234, 50, 423, '2018-07-01', 4, 1),
(235, 50, 485, '2018-07-01', 1, 1),
(236, 51, 202.5, '2018-07-01', 2, 1),
(237, 51, 466, '2018-07-01', 3, 1),
(238, 51, 699, '2018-07-01', 5, 1),
(239, 51, 506, '2018-07-01', 4, 1),
(240, 51, 582, '2018-07-01', 1, 1),
(241, 52, 303.75, '2018-07-01', 2, 1),
(242, 52, 699, '2018-07-01', 3, 1),
(243, 52, 1047.6, '2018-07-01', 5, 1),
(244, 52, 760, '2018-07-01', 4, 1),
(245, 52, 873, '2018-07-01', 1, 1),
(246, 53, 1000, '2018-07-01', 2, 1),
(247, 53, 2300, '2018-07-01', 3, 1),
(248, 53, 3450, '2018-07-01', 5, 1),
(249, 53, 2500, '2018-07-01', 4, 1),
(250, 53, 2875, '2018-07-01', 1, 1),
(251, 54, 1012.5, '2018-07-01', 2, 1),
(252, 54, 2329, '2018-07-01', 3, 1),
(253, 54, 3105, '2018-07-01', 5, 1),
(254, 54, 2531, '2018-07-01', 4, 1),
(255, 54, 2588, '2018-07-01', 1, 1),
(256, 55, 202.5, '2018-07-01', 2, 1),
(257, 55, 414, '2018-07-01', 3, 1),
(258, 55, 699, '2018-07-01', 5, 1),
(259, 55, 450, '2018-07-01', 4, 1),
(260, 55, 582, '2018-07-01', 1, 1),
(261, 56, 823, '2018-07-01', 2, 1),
(262, 56, 1892, '2018-07-01', 3, 1),
(263, 56, 2836.8, '2018-07-01', 5, 1),
(264, 56, 2056, '2018-07-01', 4, 1),
(265, 56, 2364, '2018-07-01', 1, 1),
(266, 57, 823, '2018-07-01', 2, 1),
(267, 57, 1892, '2018-07-01', 3, 1),
(268, 57, 2836.8, '2018-07-01', 5, 1),
(269, 57, 2056, '2018-07-01', 4, 1),
(270, 57, 2364, '2018-07-01', 1, 1),
(271, 58, 823, '2018-07-01', 2, 1),
(272, 58, 1892, '2018-07-01', 3, 1),
(273, 58, 2467.2, '2018-07-01', 5, 1),
(274, 58, 2056, '2018-07-01', 4, 1),
(275, 58, 2364, '2018-07-01', 1, 1),
(276, 59, 1000, '2018-07-01', 2, 1),
(277, 59, 1000, '2018-07-01', 3, 1),
(278, 59, 1000, '2018-07-01', 5, 1),
(279, 59, 1000, '2018-07-01', 4, 1),
(280, 59, 1000, '2018-07-01', 1, 1),
(281, 60, 0, '2018-07-01', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `la_quarters`
--

CREATE TABLE `la_quarters` (
  `QuarterID` int(11) NOT NULL,
  `QuarterName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_quarters`
--

INSERT INTO `la_quarters` (`QuarterID`, `QuarterName`) VALUES
(8, '2017Q1'),
(9, '2017Q2'),
(10, '2017Q3'),
(11, '2017Q4'),
(12, '2018Q1'),
(13, '2018Q2'),
(14, '2018Q3');

-- --------------------------------------------------------

--
-- Table structure for table `la_records`
--

CREATE TABLE `la_records` (
  `ExamRecordID` int(11) NOT NULL,
  `ExamNumber` varchar(255) NOT NULL,
  `ExamPriceID` int(11) NOT NULL,
  `ConsultationRecordID` int(11) NOT NULL,
  `ConsultantID` int(11) NOT NULL,
  `ResultDate` date NOT NULL,
  `LabAgent` int(11) NOT NULL,
  `ResultNumber` int(11) NOT NULL,
  `QuarterID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `la_result`
--

CREATE TABLE `la_result` (
  `ResultID` int(11) NOT NULL,
  `ResultName` varchar(255) NOT NULL,
  `ExamID` int(11) NOT NULL,
  `Appear` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `la_result`
--

INSERT INTO `la_result` (`ResultID`, `ResultName`, `ExamID`, `Appear`) VALUES
(1509, 'Tropho+', 32, 1),
(1510, 'Tropho++', 32, 1),
(1511, 'Neg', 32, 0),
(1512, 'Negatif', 32, 0),
(1513, 'FV D\'ENT COLI', 39, 0),
(1514, 'Negatif', 39, 0),
(1515, 'Ankylostome;', 39, 0),
(1516, 'Tropho+++', 32, 0),
(1517, 'Negatif', 44, 0),
(1518, 'Negatif', 54, 0),
(1519, 'K Entamoeba Coli;', 39, 0),
(1520, 'GB++++', 39, 0),
(1521, 'GB+', 39, 0),
(1522, 'NegatifP', 32, 0),
(1523, 'Negatif;', 32, 0),
(1524, 'Ascaris;', 39, 0),
(1525, 'Tropho++++', 32, 0),
(1526, 'Negatif;', 39, 0),
(1527, '--------', 55, 0),
(1528, '-----', 44, 0),
(1529, 'GB', 39, 0),
(1530, 'Ascaris lumbricoides;KEntamoeba Hist;', 39, 0),
(1531, 'GB++', 39, 0),
(1532, 'POSITIF', 54, 0),
(1533, 'GB', 44, 0),
(1534, 'Negatif', 55, 0),
(1535, 'Oxyures;', 39, 0),
(1536, 'KEntamoeba Hist;', 39, 0),
(1537, 'GB+++', 39, 0),
(1538, 'Levure;', 39, 0),
(1539, 'CELLULE EP', 44, 0),
(1540, '-', 53, 0),
(1541, 'Ascaris lumbricoides;', 39, 0),
(1542, 'Cell Epith;', 44, 0),
(1543, 'KEHist;', 39, 0),
(1544, '--------', 32, 0),
(1545, '-----', 39, 0),
(1546, 'ANKILOSTIOME', 39, 0),
(1547, 'K EHIST', 39, 0),
(1548, 'CEL EPITH', 44, 0),
(1549, '-------', 53, 0),
(1550, 'K.GIARDIA', 39, 0),
(1551, 'N', 32, 0),
(1552, 'GR+++,GB++, K-ENT HIST++', 39, 0),
(1553, '-----', 53, 0),
(1554, 'Negatif', 45, 0),
(1555, 'K E Hist;', 39, 0),
(1556, 'K-HIST', 39, 0),
(1557, 'POSITIF', 45, 0),
(1558, 'CELL EPITH', 44, 0),
(1559, 'GB++', 44, 0),
(1560, 'Tropho+++++', 32, 0),
(1561, 'KEHist', 39, 0),
(1562, 'ASCARIS', 39, 0),
(1563, 'KEHist;ASCARIS', 39, 0),
(1564, 'GB++,CELILL EPI', 44, 0),
(1565, 'LEVURE', 39, 0),
(1566, 'NEGATIF', 42, 0),
(1567, 'CEL EPI', 44, 0),
(1568, 'ASCARIS,GB++', 39, 0),
(1569, 'KEntamoeba Hist;Giardia lamblia;', 39, 0),
(1570, 'ASC', 39, 0),
(1571, 'Entamoeba Hist FV;Trichomnas;', 39, 0),
(1572, 'E Hist FV;', 39, 0),
(1573, 'Ascaris;GB', 39, 0),
(1574, '----', 53, 0),
(1575, 'K ENTEntamoeba Hist FV;', 39, 0),
(1576, 'KEntamoeba Hist;', 32, 0),
(1577, 'Entamoeba Hist FV;GR;', 39, 0),
(1578, 'KEntamoeba Hist;Ascaris lumbricoides;', 39, 0),
(1579, 'CRISTAUX', 44, 0),
(1580, '78mg/dl', 42, 0),
(1581, 'GB++', 51, 0),
(1582, 'FV d\'ent Coli;', 39, 0),
(1583, 'FVD\'ENT COLIE;', 39, 0),
(1584, 'K-E-HIST', 39, 0),
(1585, 'Negatif', 46, 0),
(1586, 'GR', 44, 0),
(1587, 'GB++,K EHIST', 39, 0),
(1588, '81MG/DL', 42, 0),
(1589, 'Tropho+', 54, 0),
(1590, 'GB+++,GR++', 39, 0),
(1591, 'TRICHOMONAS', 39, 0),
(1592, 'Trichomnas;', 39, 0),
(1593, 'OXYRES', 39, 0),
(1594, 'GB,TRIOMONANCE', 39, 0),
(1595, 'LEVURES', 39, 0),
(1596, 'NegatifPARA', 32, 0),
(1597, '--', 53, 0),
(1598, 'Giardia lamblia;', 39, 0),
(1599, 'GB++++;', 39, 0),
(1600, '373', 39, 0),
(1601, 'Negatif', 41, 0),
(1602, 'GB++++', 44, 0),
(1603, '12.4G/DL', 41, 0),
(1604, '+', 45, 0),
(1605, '9/dl', 41, 0),
(1606, '8.4MG/DL', 41, 0),
(1607, 'G++', 39, 0),
(1608, 'Ascaris;KEHIST', 39, 0),
(1609, 'GB+++ASCARIS', 39, 0),
(1610, 'GB++;', 39, 0),
(1611, 'KEntamoeba Hist;ASCARIS', 39, 0),
(1612, '96MG/DL', 42, 0),
(1613, 'K E Hist;Ascaris lumbricoides;', 39, 0),
(1614, '10.3G/DL', 41, 0),
(1615, '128MG/DL', 42, 0),
(1616, '14.3G/DL', 41, 0),
(1617, '14.4G/DCL', 45, 0),
(1618, '11;G/DL', 41, 0),
(1619, '13.3g/dl', 41, 0),
(1620, '12G/DL', 41, 0),
(1621, '7.6G/DL', 41, 0),
(1622, 'Negatif', 53, 0),
(1623, 'Entamoeba Coli FV;K Entamoeba Coli;', 39, 0),
(1624, '12gr/dl', 41, 0),
(1625, 'BALANTIDIUM', 39, 0),
(1626, '13G/DL', 41, 0),
(1627, 'AASC', 39, 0),
(1628, 'GR', 39, 0),
(1629, 'GB;', 39, 0),
(1630, 'LEUVURE', 39, 0),
(1631, 'OXYLE', 39, 0),
(1632, 'K EHIST', 32, 0),
(1633, 'K E Hist;GR++', 39, 0),
(1634, '+++', 53, 0),
(1635, 'GB+++', 44, 0),
(1636, 'GR++,GB++', 39, 0),
(1637, 'TRACE', 45, 0),
(1638, 'GR++', 39, 0),
(1639, 'K E Hist', 39, 0),
(1640, '689', 54, 0),
(1641, '13.1G/DL', 41, 0),
(1642, '--', 32, 0),
(1643, '81.MG/dl', 42, 0),
(1644, 'Entamoeba Coli FV;', 39, 0),
(1645, 'K E Hist;colis', 39, 0),
(1646, '153', 41, 0),
(1647, 'Negatif;', 54, 0),
(1648, 'Entamoeba Hist FV;', 39, 0),
(1649, 'TRIMOTrichomnas;', 39, 0),
(1650, '77mg/dl', 42, 0),
(1651, '71g/dl', 42, 0),
(1652, 'GB+++,K HIST', 39, 0),
(1653, 'TRICHMONAS INT', 39, 0),
(1654, 'GIARDIA', 39, 0),
(1655, 'CEL EPITH', 39, 0),
(1656, '-----', 41, 0),
(1657, '9.3G/DL', 41, 0),
(1658, 'GB+ASCARIS', 39, 0),
(1659, 'LEUVURE+EHIST', 39, 0),
(1660, 'CEL EPITH+GB', 44, 0),
(1661, 'LEVURE+KEHIST', 39, 0),
(1662, 'GB+EHIST', 39, 0),
(1663, 'NegatifCO-', 32, 0),
(1664, 'NegatifINDO', 32, 0),
(1665, 'Trichomnas;GB++GR++', 39, 0),
(1666, 'Trichomnas', 39, 0),
(1667, 'GB++GR++', 39, 0),
(1668, 'Ascaris lumbricoides', 39, 0),
(1669, 'KEntamoeba Hist', 39, 0),
(1670, 'Entamoeba Hist FV', 39, 0),
(1671, '+ASCARIS', 39, 0),
(1672, '11.6G/DL', 41, 0),
(1673, '+KEHIST', 39, 0),
(1674, 'ASCARIS+KEHIST', 39, 0),
(1675, 'GB;GR', 39, 0),
(1676, 'Entamoeba Hist FV;+ASCARIS', 39, 0),
(1677, '122MG/DL', 42, 0),
(1678, 'FU', 39, 0),
(1679, 'ASCARIS+KESTFV', 39, 0),
(1680, 'LEVURE;+KEHIST', 39, 0),
(1681, 'Cel Epith gb+++', 44, 0),
(1682, 'KEntamoeba Hist;FU', 39, 0),
(1683, 'Tropho+++', 32, 1),
(1684, 'Negative', 32, 1),
(1685, 'Schizonte', 32, 1),
(1686, 'Gametocyte', 32, 1),
(1687, 'KEntamoeba Hist+ascaris', 39, 0),
(1688, 'OXYURES', 32, 0),
(1689, 'GB;Ascaris lumbricoides', 39, 0),
(1690, 'OXYURES', 39, 0),
(1691, 'KEntamoeba COLI', 39, 0),
(1692, 'Entamoeba Hist FCRIS', 39, 0),
(1693, 'Negative', 45, 0),
(1694, 'Negative', 39, 0),
(1695, 'TRICHOMUNAS', 39, 0),
(1696, 'COLI', 39, 0),
(1697, 'Negative', 44, 0),
(1698, 'Entamoeba Hist FV;COLI', 39, 0),
(1699, 'KEntamoeba COLI,GB', 39, 0),
(1700, 'GB', 39, 1),
(1701, 'Negative', 39, 1),
(1702, 'ENT HIST', 39, 1),
(1703, 'ENT COLI', 39, 1),
(1704, 'ASCARIS', 39, 1),
(1705, 'GIARDIA', 39, 1),
(1706, '---', 53, 0),
(1707, 'ASCARIS;K E Hist', 39, 0),
(1708, 'Negative', 54, 0),
(1709, 'Negative', 46, 0),
(1710, 'GB+CEL EPITH', 44, 0),
(1711, '71MG/DL', 42, 0),
(1712, 'GB+GR+', 39, 0),
(1713, 'Negative', 41, 0),
(1714, '74MG/DL', 46, 0),
(1715, 'POSITIVE', 54, 0),
(1716, 'TRICHOMONAS;GIARDIA;ENT COLI', 39, 0),
(1717, 'ENT HIST+anklylostome', 39, 0),
(1718, '105G/DL', 42, 0),
(1719, 'ASCARIS+ENTHIST', 39, 0),
(1720, 'ENT HIST+TRICHOM', 39, 0),
(1721, 'ENT HIST+GB++', 39, 0),
(1722, '107mg/dl', 42, 0),
(1723, 'ASCARIS;Trichomnas', 39, 0),
(1724, 'Trichomnas+KEHIST', 39, 0),
(1725, 'GB+++CEL EPITH', 44, 0),
(1726, 'GB+CEL EPITH+gr', 44, 0),
(1727, '11g/dl', 41, 0),
(1728, '15.4G/DL', 41, 0),
(1729, 'Negative', 55, 0),
(1730, '10.5G/DL', 41, 0),
(1731, '9G/DL', 41, 0),
(1732, 'Negative', 53, 0),
(1733, 'ASCARIS+GIARDIA', 39, 0),
(1734, '94MG/DL', 42, 0),
(1735, 'ASCARIS+entamoeba  hist', 39, 0),
(1736, 'ENT HIST+ASCARIS', 39, 0),
(1737, '9.6G/DL', 41, 0),
(1738, 'ASCARIS+KEHIST+anguillule', 39, 0),
(1739, '9.2G/DL', 41, 0),
(1740, '11.1G/DL', 41, 0),
(1741, '114MG/DL', 42, 0),
(1742, 'KEHist;', 32, 0),
(1743, '113MG/DL', 42, 0),
(1744, '10G/DL', 41, 0),
(1745, '14 MG/DL', 42, 0),
(1746, '12.3G/DL', 41, 0),
(1747, '8.3G/DL', 41, 0),
(1748, 'GB.CEL EPITH', 39, 0),
(1749, '14.5G/DL', 41, 0),
(1750, 'CELL EPITH', 39, 0),
(1751, 'K-E-HIST', 44, 0),
(1752, 'ANKILOSTIOME, K HIST', 39, 0),
(1753, 'ASCARIS+KEHIST+', 39, 0),
(1754, '12.1g/dl', 41, 0),
(1755, '12.9', 41, 0),
(1756, '11.6GDL', 41, 0),
(1757, '113MG/DL', 41, 0),
(1758, '13g/dl', 45, 0),
(1759, '13.9G/DL', 41, 0),
(1760, '12G/DL', 45, 0),
(1761, 'GE', 45, 1),
(1762, 'cel epith, GB++;', 44, 0),
(1763, 'GB++,CELILL EPI', 39, 0),
(1764, 'ASCARIS+KEST', 39, 0),
(1765, '11,5G/DL', 41, 0),
(1766, '75MG/DL', 42, 0),
(1767, 'ASCARIS+LEVURE', 39, 0),
(1768, '13.5G/DL', 41, 0),
(1769, '15GR/DL', 41, 0),
(1770, 'P', 54, 0),
(1771, 'GB,HIST', 39, 0),
(1772, '10.7G/DL', 41, 0),
(1773, 'ASCARIS,K EHIST', 39, 0),
(1774, 'GB+++,GR++', 44, 0),
(1775, '10gl/dl', 41, 0),
(1776, 'C EPITH', 44, 0),
(1777, 'GB++GR++', 44, 0),
(1778, 'ASCARIS;ENT HIST', 39, 0),
(1779, 'ENT HIST,ASCARIS', 39, 0),
(1780, 'GB+++;', 39, 0),
(1781, 'B+', 38, 0),
(1782, 'TROPH+++', 32, 0),
(1783, 'O', 38, 0),
(1784, 'A+', 38, 0),
(1785, 'O+', 38, 0),
(1786, '9,2G/DL', 41, 0),
(1787, 'GB+OXYURES', 39, 0),
(1788, '10.8G/DL', 41, 0),
(1789, 'GB+++;', 44, 0),
(1790, 'gb++gr+++', 39, 0),
(1791, '9.8G/DL', 41, 0),
(1792, '550MHG', 42, 0),
(1793, 'Cell Epith;', 51, 0),
(1794, 'ab+++', 38, 0),
(1795, '12.2G/DL', 41, 0),
(1796, 'GB+', 38, 0),
(1797, '13.8G/DL', 41, 0),
(1798, '13.9G/DCL', 41, 0),
(1799, 'ENT HIST,GB++', 39, 0),
(1800, 'POS', 54, 0),
(1801, 'GB+GR', 39, 0),
(1802, 'GR K ENT HIST', 39, 0),
(1803, '0+', 38, 0),
(1804, '-', 55, 0),
(1805, '68', 41, 0),
(1806, 'TRICHOCEPHAL', 39, 0),
(1807, 'GB++, CEL EPITH', 44, 0),
(1808, 'AB+', 38, 0),
(1809, '11.6G/DCL', 41, 0),
(1810, '145', 41, 0),
(1811, '13.7G/DL', 41, 0),
(1812, 'Negative', 38, 0),
(1813, 'tricomonas intestinalis;K E Hist;', 39, 0),
(1814, 'GR+++', 39, 0),
(1815, 'Ankylostome', 39, 0),
(1816, '12.7G/DL', 41, 0),
(1817, '88MG/DL', 42, 0),
(1818, 'negatif-------', 53, 0),
(1819, 'O-', 38, 0),
(1820, '91MG/DL', 42, 0),
(1821, 'B-', 38, 0),
(1822, 'ASCARIS+GB', 39, 0),
(1823, '72MG/DL', 42, 0),
(1824, '90MG/DL', 42, 0),
(1825, '101', 46, 0),
(1826, 'ENT HIST+GIARDIA', 39, 0),
(1827, '11.9G/DL', 41, 0),
(1828, 'ASCARIS+TRICHOMUNAS+BALANTIDIUM', 39, 0),
(1829, 'A-', 38, 0),
(1830, '12.5G/DL', 41, 0),
(1831, 'Negatif', 38, 0),
(1832, '5,4', 41, 0),
(1833, 'CELL EPITH, GB+', 44, 0),
(1834, 'ENT COLI, LEVULE', 39, 0),
(1835, 'GR++', 44, 0),
(1836, '11.2G/DL', 41, 0),
(1837, '----negatif', 53, 0),
(1838, 'ASCARISk.e.hist', 39, 0),
(1839, 'ASCARIS.e.hist', 39, 0),
(1840, 'GB.levures', 39, 0),
(1841, 'ENT HIST.gb', 39, 0),
(1842, 'ENT HIST.ascaris', 39, 0),
(1843, 'ASCARIS.k.e.hist', 39, 0),
(1844, 'ASCARISe.hist', 39, 0),
(1845, 'ENT COLI, GR++', 39, 0),
(1846, '13.8G/DL', 45, 0),
(1847, 'ENT HIST, GB++', 39, 0),
(1848, '11.2G/DCL', 41, 0),
(1849, 'ASCARIS, K HIST', 39, 0),
(1850, 'Cell Epith;', 39, 0),
(1851, 'PASITIF', 54, 0),
(1852, 'TRICHOMUNAS', 44, 0),
(1853, 'GB++, LEVURE', 39, 0),
(1854, 'ENT COLI, ASCARIS', 39, 0),
(1855, 'Ascaris;GB++', 39, 0),
(1856, '79mg', 42, 0),
(1857, '94MG/DL', 41, 0),
(1858, '10.1g/dcl', 41, 0),
(1859, '10.6GL', 45, 0),
(1860, '8.4g/dl', 41, 0),
(1861, 'Negatif', 40, 0),
(1862, 'tricomonas intestinalis;GB', 39, 0),
(1863, 'Levures;', 39, 0),
(1864, 'POSITIF', 55, 0),
(1865, 'GB+CEL EPITH', 39, 0),
(1866, 'ENT HIST', 44, 0),
(1867, 'ASCARIS,ANKYLOSOSTOM', 39, 0),
(1868, 'ENT HIST\'ANKYLO', 39, 0),
(1869, 'ASCARIS,LEVURE', 39, 0),
(1870, 'ASCARIS,LEVURES', 39, 0),
(1871, '+++', 45, 0),
(1872, 'CELL EPITH,', 44, 0),
(1873, '12', 41, 0),
(1874, '13', 41, 0),
(1875, 'POSITIF6', 54, 0),
(1876, '15.6G/DL', 41, 0),
(1877, '4.7*10', 40, 0),
(1878, 'TRACE++', 45, 0),
(1879, 'CELL EPITH', 51, 0),
(1880, '14.6G/DL', 41, 0),
(1881, '-----', 40, 0),
(1882, '----', 40, 0),
(1883, '---', 40, 0),
(1884, '-------', 40, 0),
(1885, '-', 40, 0),
(1886, 'KEntamoeba Hist', 44, 0),
(1887, 'Negative', 40, 0),
(1888, '----', 44, 0),
(1889, 'GB+', 44, 0),
(1890, '131G/DL', 42, 0),
(1891, 'OXUYURES', 39, 0),
(1892, '.', 40, 0),
(1893, '.--', 40, 0),
(1894, 'Trichomnas+k ent coli', 39, 0),
(1895, 'GIARDIA.K.E.COLI', 39, 0),
(1896, 'GB.GR', 39, 0),
(1897, '..', 40, 0),
(1898, '++', 45, 0),
(1899, '14G', 41, 0),
(1900, '1035', 38, 0),
(1901, '14', 41, 0),
(1902, 'ENT HIST+GR', 39, 0),
(1903, 'KEntamoeba Hist;GR++', 39, 0),
(1904, 'ENT HIST.OXYURE', 39, 0),
(1905, 'OXUYURE', 39, 0),
(1906, 'GIARDIA+ASCARIS', 39, 0),
(1907, 'Trichomnas;GIARDIA+ASCARIS', 39, 0),
(1908, '.', 53, 0),
(1909, '.', 44, 0),
(1910, '--', 40, 0),
(1911, 'GB.GR', 44, 0),
(1912, 'TRACE+', 45, 0),
(1913, '6.6G/DL', 41, 0),
(1914, '-', 44, 0),
(1915, 'C EPITH+GB', 44, 0),
(1916, 'TAENIA', 39, 0),
(1917, 'ASCARIS+TRICHOMUNAs', 39, 0),
(1918, 'posi', 39, 0),
(1919, 'positif', 39, 0),
(1920, '76mg/dl', 42, 0),
(1921, '99mg/dl', 42, 0),
(1922, 'CELL EPITH+levure', 44, 0),
(1923, 'TRICHOMUNAS+GIARDIA', 39, 0),
(1924, 'Cell Epith+GB', 44, 0),
(1925, 'ASCARIS+KENT COLI', 39, 0),
(1926, 'GIARDIA.ascaris', 39, 0),
(1927, 'ASCARIS.gb', 39, 0),
(1928, 'oxuyure.levures', 39, 0),
(1929, 'CELL EPITH.gb', 44, 0),
(1930, 'ENT HIST.GIARDIE', 39, 0),
(1931, 'POSITIVE', 45, 0),
(1932, 'GBH', 44, 0),
(1933, '18.7g/dl', 41, 0),
(1934, '13 g/dl', 41, 0),
(1935, '12.5', 41, 0),
(1936, 'Trichomnas+k ent coli+ascaris', 39, 0),
(1937, 'LEVURES', 44, 0),
(1938, '----', 38, 0),
(1939, '5.5G/DL', 41, 0),
(1940, '13.6', 41, 0),
(1941, 'ENT HIST+GR+kent coli', 39, 0),
(1942, 'ENT HIST.gb.gr', 39, 0),
(1943, 'trichomnas intestinal', 39, 0),
(1944, 'ENT COLI+gr', 39, 0),
(1945, 'LEVURE', 45, 0),
(1946, 'ENT COLI,GB++', 39, 0),
(1947, '16G', 41, 0),
(1948, 'tricomonas intestinalis', 39, 0),
(1949, 'Negative', 42, 0),
(1950, '107mg/dl', 41, 0),
(1951, '+GR', 39, 0),
(1952, 'KEHist;+GR', 39, 0),
(1953, 'ENT COLI+ascaris', 39, 0),
(1954, 'GIARDIA+EHIS', 39, 0),
(1955, '12.5/dl', 41, 0),
(1956, 'toenie-solium', 39, 0),
(1957, 'ENT HIST+oxyure+levure', 39, 0),
(1958, '83MG/DL', 42, 0),
(1959, 'TRICHOMONAS+GIARDIA', 39, 0),
(1960, 'trichomonas+GB', 39, 0),
(1961, 'LEVURE', 44, 0),
(1962, '+30', 45, 0),
(1963, 'GB', 32, 0),
(1964, '15g/dl', 41, 0),
(1965, '14g/dl', 41, 0),
(1966, 'ENT HIST+GR+gb', 39, 0),
(1967, '122MG/DL', 41, 0),
(1968, 'ENT COLI+gb', 39, 0),
(1969, 'TRICHOCEPHALE', 39, 0),
(1970, 'GIARDIA;Trichomnas', 39, 0),
(1971, 'CELI EPITH', 44, 0),
(1972, 'KENT COLI', 39, 0),
(1973, '10', 41, 0),
(1974, '11', 41, 0),
(1975, '742', 41, 0),
(1976, 'K EHIST', 54, 0),
(1977, '17', 41, 0),
(1978, 'CE EPITH', 44, 0),
(1979, 'ENT HIST+GB+GR', 39, 0),
(1980, 'TRICOMUNAS', 39, 0),
(1981, '93', 42, 0),
(1982, 'OEUF DE TAENIA', 39, 0),
(1983, '13.2g/dl', 41, 0),
(1984, '9', 41, 0),
(1985, 'GB++,gr++', 39, 0),
(1986, '13.2g/dl', 45, 0),
(1987, '8.5g/dl', 41, 0),
(1988, 'GB++,gr++', 44, 0),
(1989, '15', 41, 0),
(1990, '85MG/DL', 42, 0),
(1991, 'ANKYLO', 39, 0),
(1992, '6.5G/DL', 41, 0),
(1993, 'ANKYLOS', 39, 0),
(1994, '13.4G/DL', 41, 0),
(1995, '13.5', 41, 0),
(1996, 'OEUF D\'ANKYLOSTOME', 39, 0),
(1997, 'CE EPITH', 39, 0),
(1998, 'K ENT COLI', 39, 0),
(1999, '100MG/DL', 42, 0),
(2000, 'E. HIST', 39, 0),
(2001, 'N', 54, 0),
(2002, '10.9G/DL', 41, 0),
(2003, '9.9G/DL', 41, 0),
(2004, '12.9G/DL', 41, 0),
(2005, '216MG/DL', 42, 0),
(2006, '204MG/DL', 42, 0),
(2007, '..', 53, 0),
(2008, 'K E', 39, 0),
(2009, '87MG/DL', 42, 0),
(2010, '101MG/DL', 42, 0),
(2011, '11.5G/DL', 41, 0),
(2012, '84MG/DL', 42, 0),
(2013, '95MG/DL', 42, 0),
(2014, '97MG/DL', 42, 0),
(2015, '12.8G/DL', 41, 0),
(2016, '87 MG/DL', 42, 0),
(2017, '11.4g/dl', 41, 0),
(2018, '--', 54, 0),
(2019, '224MG/DL', 42, 0),
(2020, 'n', 55, 0),
(2021, 'GB+++/CEL EPITH', 44, 0),
(2022, 'ENT HIST+TRICOMUNAS', 39, 0),
(2023, '12.8g/dl', 45, 0),
(2024, '13.6G/DL', 41, 0),
(2025, '12.6G/DL', 41, 0),
(2026, 'GR++++, ENT HIST', 39, 0),
(2027, 'OEUFS D\'ANK', 39, 0),
(2028, 'FV', 39, 0),
(2029, '89MG/DL', 42, 0),
(2030, 'K ENT COLI', 32, 0),
(2031, 'TRICOMUNAS+ASCARIS+GIARDIA', 39, 0),
(2032, '6.1G/DL', 41, 0),
(2033, 'RARES GB', 44, 0),
(2034, 'ENT HIST/TRICHOCE', 39, 0),
(2035, 'TRICOMUNAS+GB', 39, 0),
(2036, 'CEL/EPITH', 44, 0),
(2037, '8.5g/dl', 42, 0),
(2038, 'GB++/celepith', 44, 0),
(2039, 'ENT HIST/asccaris', 39, 0),
(2040, 'ENT HIST/ankylo', 39, 0),
(2041, 'ENT COLI/ascaris', 39, 0),
(2042, '109', 42, 0),
(2043, '0+', 55, 0),
(2044, '0+', 41, 0),
(2045, '++++++', 40, 0),
(2046, '136mg/dl', 42, 0),
(2047, 'ASCARIS+GIARDIA+FV DENT COLI', 39, 0),
(2048, 'B', 38, 0),
(2049, 'GB++,CEL EP', 44, 0),
(2050, 'GIA', 39, 0),
(2051, 'GB+GR', 44, 0),
(2052, 'ENT HIST+TAENIE', 39, 0),
(2053, '93', 46, 0),
(2054, 'TRICHOMONAS+KENT COLI', 39, 0),
(2055, '92MG/DL', 42, 0),
(2056, '10.6G/DL', 41, 0),
(2057, 'ASCARIS, LEVULE', 39, 0),
(2058, '7.', 41, 0),
(2059, 'GB+GB', 44, 0),
(2060, 'ENT HIST+ LEVURE', 39, 0),
(2061, '10.1 G/DL', 41, 0),
(2062, 'ENT HIST+ASCARIS+TRICOMUNAS', 39, 0),
(2063, 'ENT HIST+TRICHOM+GIARDIA', 39, 0),
(2064, 'OEUFS DE TAENIA', 39, 0),
(2065, '8.2G/DL', 41, 0),
(2066, '11.8g/dl', 41, 0),
(2067, '10.2 g/dl', 41, 0),
(2068, '15.2G/DL', 41, 0),
(2069, '92MG/DL', 46, 0),
(2070, '...', 53, 0),
(2071, 'ANKLO', 39, 0),
(2072, '98MG/DL', 42, 0),
(2073, '82MG/DL', 42, 0),
(2074, 'LAMBLIA', 39, 0),
(2075, '4.9G/DL', 41, 0),
(2076, 'GB++', 54, 0),
(2077, '11.8', 41, 0),
(2078, '341MG/DL', 42, 0),
(2079, 'LEVURE+GIARDIA+E-HIST', 39, 0),
(2080, 'TRICH', 39, 0),
(2081, 'NegatifCO-', 54, 0),
(2082, '107G/DL', 42, 0),
(2083, '11G/DL', 42, 0),
(2084, 'GB+LEVURES', 39, 0),
(2085, 'ENT HIST+TRICHOM+ASCARIS', 39, 0),
(2086, '93MG/DL', 42, 0),
(2087, 'N', 46, 0),
(2088, '106', 42, 0),
(2089, 'G+', 44, 0),
(2090, '1095', 54, 0),
(2091, 'ASCARIS, LEVURE', 39, 0),
(2092, 'ASCARIS,K HIST', 39, 0),
(2093, 'OXYRE', 39, 0),
(2094, 'ASCARIS, K HIST,GIARDIA', 39, 0),
(2095, '102MG', 42, 0),
(2096, 'ASCARIS, OXYLE', 39, 0),
(2097, 'TRICHOMONAS, GB++, CEL EP', 44, 0),
(2098, '124', 42, 0),
(2099, '8', 41, 0),
(2100, 'gb++gr+++', 44, 0),
(2101, '117', 42, 0),
(2102, '1076', 42, 0),
(2103, '86MG/DL', 42, 0),
(2104, '102MG/DL', 42, 0),
(2105, 'TOENIESOL', 39, 0),
(2106, 'ENT HIST+LEVURES', 39, 0),
(2107, 'TRICMONAS , K HEST', 39, 0),
(2108, 'CEL EPITH, GB++', 44, 0),
(2109, '15G/DL', 45, 0),
(2110, '10.9G/DL', 42, 0),
(2111, '2052', 41, 0),
(2112, '2052', 46, 0),
(2113, '8G/DL', 41, 0),
(2114, '17.3G/DL', 41, 0),
(2115, '14,6G/DL', 41, 0),
(2116, 'ENT COLI+TRICOMUNAS', 39, 0),
(2117, '108', 42, 0),
(2118, 'Tropho+', 39, 0),
(2119, '14.2G/DL', 41, 0),
(2120, 'GB++', 32, 0),
(2121, '120MG/DL', 44, 0),
(2122, 'KENT COLI', 32, 0),
(2123, 'ENT COLI,GB+', 39, 0),
(2124, 'ASCARIS,K ENT', 39, 0),
(2125, '104', 41, 0),
(2126, 'ENT HIST+GB+LEVURES', 39, 0),
(2127, 'TRICOMUNAS+ascaris', 39, 0),
(2128, 'GB++,ASCARIS', 39, 0),
(2129, '7', 41, 0),
(2130, 'GB++,CE EPI', 44, 0),
(2131, '11.5G/DL', 42, 0),
(2132, '13.1G/DL', 39, 0),
(2133, '120MG/DL', 42, 0),
(2134, 'ENT HIST+GB', 39, 0),
(2135, '97g/dl', 42, 0),
(2136, 'negati', 44, 0),
(2137, '11.3', 41, 0),
(2138, 'negati', 45, 0),
(2139, '9.7', 41, 0),
(2140, 'negati', 55, 0),
(2141, 'Trichomnas;GIARDIA', 39, 0),
(2142, 'GB+GIARDIA', 39, 0),
(2143, '17G/DL', 41, 0),
(2144, '318MG/DL', 42, 0),
(2145, '--------------', 40, 0),
(2146, '115MG/DL', 42, 0),
(2147, 'TRICHOMONAS', 32, 0),
(2148, '111G/DL', 42, 0),
(2149, '311MG/DL', 42, 0),
(2150, 'TRICHOMONAS+ASCARIS', 39, 0),
(2151, '97', 42, 0),
(2152, '00', 40, 0),
(2153, '12.1', 41, 0),
(2154, '----', 55, 0),
(2155, 'GB+KENT COLI', 39, 0),
(2156, '120MG/DL', 41, 0),
(2157, '19.7G/DL', 41, 0),
(2158, '106MG/DL', 42, 0),
(2159, '11.7', 41, 0),
(2160, 'GB+++CEL EPITH', 39, 0),
(2161, 'K E Hist;PAR', 39, 0),
(2162, '106MG/DL', 41, 0),
(2163, 'EHIST', 39, 0),
(2164, '7,5GR/DL', 41, 0),
(2165, '11.2G/DL', 55, 0),
(2166, '11.5', 41, 0),
(2167, '11,3G/GL', 41, 0),
(2168, 'CE EPITH+++', 44, 0),
(2169, 'OXYURES+GIARDIA', 39, 0),
(2170, 'Negatif', 51, 0),
(2171, 'POSIF', 54, 0),
(2172, '0+', 54, 0),
(2173, 'GB++', 52, 0),
(2174, 'GB++', 35, 0),
(2175, '14.1G/DL', 41, 0),
(2176, '14.8G/DL', 41, 0),
(2177, '14.2', 41, 0),
(2178, 'KENT COLI+ASCARIS', 39, 0),
(2179, 'GB+TRICHOM', 44, 0),
(2180, '92MG', 42, 0),
(2181, 'ASCARIS+KEHIST+TRICOM', 39, 0),
(2182, 'POSITIF', 38, 0),
(2183, '142MG/DL', 42, 0),
(2184, 'ASCARIS+ANKYLOSTOME', 39, 0),
(2185, '172MG/DL', 42, 0),
(2186, '262MG/DL', 42, 0),
(2187, '142MG/DL', 45, 0),
(2188, '8.5 G/DL', 41, 0),
(2189, 'K E Hist;', 32, 0),
(2190, '13.4 g/dl', 41, 0),
(2191, '161MG/DL', 42, 0),
(2192, 'CELL EPITH', 54, 0),
(2193, '79G/DL', 42, 0),
(2194, 'GIARDIA+GB', 39, 0),
(2195, 'ASCARIS+KET COLI', 39, 0),
(2196, '8.4g/gl', 41, 0),
(2197, 'ENT HIST+GB', 44, 0),
(2198, '96', 42, 0),
(2199, '91', 42, 0),
(2200, '10.5G/DL', 42, 0),
(2201, '92', 42, 0),
(2202, '---', 44, 0),
(2203, '1343', 45, 0),
(2204, '115MG/DL', 41, 0),
(2205, '8.8G/DL', 41, 0),
(2206, '80mg/dl', 42, 0),
(2207, '1403', 41, 0),
(2208, 'LEU', 39, 0),
(2209, '25', 41, 0),
(2210, '8.5 G/DL', 42, 0),
(2211, 'GIARDIA FV', 39, 0),
(2212, 'FV D\'ENT COLI', 44, 0),
(2213, '118MG/DL', 42, 0),
(2214, 'TRICOMUNAS+ascaris+GB', 39, 0),
(2215, 'O+', 35, 0),
(2216, 'O+', 55, 0),
(2217, 'ASCARIS,TRICMONAS', 39, 0),
(2218, '6.5', 41, 0),
(2219, '9,5G/DL', 41, 0),
(2220, 'GB+GR++LEVURES', 39, 0),
(2221, 'Negative', 60, 0),
(2222, 'Negative', 60, 1),
(2223, 'Negative;', 60, 0),
(2224, 'Negative', 54, 1),
(2225, 'Positif', 54, 1),
(2226, 'NEGATVE', 55, 0),
(2227, 'Tropho++++', 32, 1),
(2228, 'negagatif', 44, 0),
(2229, 'negagatif', 54, 0),
(2230, 'cellule', 44, 0),
(2231, 'cellule epitheliale', 44, 0),
(2232, 'oeuf d ascaris', 39, 0),
(2233, 'negagatif', 45, 0),
(2234, 'Tricho.intestinalis', 39, 0),
(2235, 'cellule epithelial', 44, 0),
(2236, '2000  mg/dl', 45, 0),
(2237, 'TRICHOMONAS INTESTINALS', 39, 0),
(2238, 'epith cell', 44, 0),
(2239, 'negagatif', 39, 0);

-- --------------------------------------------------------

--
-- Table structure for table `la_result_record`
--

CREATE TABLE `la_result_record` (
  `ResultRecordID` int(11) NOT NULL,
  `ExamRecordID` int(11) NOT NULL,
  `ResultID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `md_category`
--

CREATE TABLE `md_category` (
  `MedecineCategoryID` int(11) NOT NULL,
  `MedecineCategoryName` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `CategoryCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_category`
--

INSERT INTO `md_category` (`MedecineCategoryID`, `MedecineCategoryName`, `Date`, `CategoryCode`) VALUES
(1, 'I. MEDICAMENTS ORAUX', '2015-10-22', ''),
(2, 'VI. Materials', '2015-10-22', ''),
(3, 'II. Pommades', '2015-10-31', ''),
(4, 'III. MEDICAMENTS O.R.L / OPHT.', '2015-10-31', ''),
(5, 'IV. MEDICAMENTS SIROP', '2015-10-31', ''),
(6, 'V. MEDICAMENTS INJECTABLES', '2015-10-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `md_name`
--

CREATE TABLE `md_name` (
  `MedecineNameID` int(11) NOT NULL,
  `MedecineName` varchar(255) NOT NULL,
  `MedecineCategorID` int(11) NOT NULL,
  `Emballage` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `CategoryCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_name`
--

INSERT INTO `md_name` (`MedecineNameID`, `MedecineName`, `MedecineCategorID`, `Emballage`, `Status`, `CategoryCode`) VALUES
(878, 'aas 100 mg', 1, 1, 1, 'MO1'),
(1026, 'aas 500 mg', 1, 1, 1, 'MO2'),
(1027, 'ac.nalidixique 500 mg - Negram', 1, 1, 1, 'MO3'),
(1028, 'albendazole 500 mg', 1, 1, 1, 'MO4'),
(1029, 'aminophylline 100 mg', 1, 1, 1, 'MO5'),
(1030, 'amoxycilline 125 mg', 1, 1, 1, 'MO6'),
(1031, 'amoxycilline 250 mg', 1, 1, 1, 'MO7'),
(1032, 'amoxycilline 500 mg', 1, 1, 1, 'MO8'),
(1033, 'bisacodyl 5 mg', 1, 1, 1, 'MO9'),
(1034, 'charbon', 1, 1, 1, 'MO10'),
(1035, 'chlorpheniramine 4 mg', 1, 1, 1, 'MO11'),
(1036, 'cimetidine 200 mg', 1, 1, 1, 'MO12'),
(1037, 'cimetidine 400 mg', 1, 1, 1, 'MO13'),
(1038, 'ciprofloxacine 250 mg', 1, 0, 1, 'MO14'),
(1039, 'ciprofloxacine 500 mg', 1, 0, 1, 'MO15'),
(1040, 'cloxacilline 250 mg', 1, 1, 1, 'MO16'),
(1041, 'coartem 6x1 - 5-15 kg', 1, 0, 1, 'MO19'),
(1042, 'coartem 6x2 - 15-25 kg', 1, 0, 1, 'MO20'),
(1043, 'coartem 6x3 - 25-35 kg', 1, 0, 1, 'MO21'),
(1044, 'coartem 6x4 - >35 kg', 1, 0, 1, 'MO22'),
(1045, 'co-trimoxazole 120 mg', 1, 1, 1, 'MO17'),
(1046, 'co-trimoxazole 480 mg', 1, 0, 1, 'MO18'),
(1047, 'diazepam 5 mg', 1, 1, 1, 'MO23'),
(1048, 'diclofenac 50 mg', 1, 1, 1, 'MO24'),
(1049, 'doxycycline 100 mg', 1, 1, 1, 'MO25'),
(1050, 'erythromycine 250 mg', 1, 1, 1, 'MO26'),
(1051, 'fer-folic-acid', 1, 1, 1, 'MO27'),
(1052, 'furosemide 40 mg', 1, 1, 1, 'MO28'),
(1053, 'griseofulvine 500 mg', 1, 1, 1, 'MO29'),
(1054, 'hydroxyde d\'aluminium', 1, 1, 1, 'MO30'),
(1055, 'hyoscine 10 mg - buscopan', 1, 1, 1, 'MO31'),
(1056, 'ibuprofene 200 mg', 1, 1, 1, 'MO32'),
(1057, 'ibuprofene 400 mg', 1, 1, 1, 'MO33'),
(1058, 'indomethacine 25 mg', 1, 1, 1, 'MO34'),
(1059, 'mebendazole 100 mg', 1, 1, 1, 'MO35'),
(1060, 'metoclopramide 10 mg', 1, 1, 1, 'MO36'),
(1061, 'metronidazole 250 mg', 1, 1, 1, 'MO37'),
(1062, 'multivit 100mg', 1, 1, 1, 'MO38'),
(1063, 'niclosamide 500 mg', 1, 1, 1, 'MO39'),
(1064, 'nitrofurantoine 100 mg', 1, 1, 1, 'MO40'),
(1065, 'nystatine orale 500000 ui', 1, 1, 1, 'MO41'),
(1066, 'nystatine ovule 100000 ui', 1, 1, 1, 'MO42'),
(1067, 'paracetamol 100 mg', 1, 1, 1, 'MO43'),
(1068, 'paracetamol 500 mg', 1, 1, 1, 'MO44'),
(1069, 'paracetamol suppo 125mg', 1, 0, 1, 'MO45'),
(1070, 'phenoxymethylpenicilline 250 mg', 1, 1, 1, 'MO48'),
(1071, 'phenobarbital 30 mg', 1, 1, 1, 'MO47'),
(1072, 'phenobarbital 100 mg', 1, 1, 1, 'MO46'),
(1073, 'prednisolone 5 mg', 1, 1, 1, 'MO49'),
(1074, 'promethazine 25 mg', 1, 1, 1, 'MO50'),
(1075, 'quinine 300 mg', 1, 1, 1, 'MO51'),
(1076, 'salbutamol 4 mg', 1, 1, 1, 'MO52'),
(1077, 'SRO sels de rÃ©hydratation orale', 1, 0, 1, 'MO53'),
(1078, 'vit a - retinol', 1, 1, 1, 'MO54'),
(1079, 'vit b complexe', 1, 1, 1, 'MO55'),
(1080, 'vit b1 100 mg - thiamine', 1, 1, 1, 'MO56'),
(1081, 'vit c 500 mg - acide ascorbique', 1, 1, 1, 'MO57'),
(1082, 'zinc 20 mg', 1, 1, 0, 'MO58'),
(1083, 'ac. benzoique - whitfield 50g', 3, 0, 1, 'PO1'),
(1084, 'anti hemorroidaire', 3, 0, 1, 'PO2'),
(1085, 'pommade camphree', 3, 0, 1, 'PO3'),
(1086, 'pommade ichtyolee', 3, 0, 1, 'PO4'),
(1087, 'pommade oxyde de zinc', 3, 0, 1, 'PO5'),
(1088, 'cromosol collyre', 4, 0, 1, 'OP4'),
(1089, 'chloramphenicol - CAF collyre', 4, 0, 1, 'OP2'),
(1090, 'chloramphenicol - CAF otique', 4, 0, 1, 'OP3'),
(1091, 'tetracycline 1% pommade opht.', 4, 0, 1, 'OP6'),
(1092, 'salbutamol spray', 4, 0, 1, 'OP5'),
(1093, 'beclomethasone spray', 4, 0, 1, 'OP1'),
(1094, 'amoxycilline sirop', 5, 0, 1, 'MS1'),
(1095, 'cloxacilline sirop', 5, 0, 1, 'MS2'),
(1096, 'co-trimoxazole sirop', 5, 0, 1, 'MS3'),
(1097, 'erythromycine sirop', 5, 0, 1, 'MS4'),
(1098, 'ibuprofene sirop', 5, 0, 1, 'MS5'),
(1099, 'mebendazole sirop', 5, 0, 1, 'MS6'),
(1100, 'metronidazole sirop', 5, 0, 1, 'MS7'),
(1101, 'multivit sirop', 5, 0, 1, 'MS8'),
(1102, 'nystatine sirop', 5, 0, 1, 'MS9'),
(1103, 'paracetamol sirop', 5, 0, 1, 'MS10'),
(1106, 'adrenaline inj.', 6, 0, 1, 'MI2'),
(1107, 'aminophylline inj. 10 ml', 6, 0, 1, 'MI3'),
(1108, 'ampicilline inj.', 6, 0, 1, 'MI4'),
(1109, 'artesunate inj. 60 mg', 6, 0, 1, 'MI5'),
(1110, 'benzathine inj. 2.4 mui mega', 6, 0, 1, 'MI6'),
(1111, 'benzyl inj. peni.procaine', 6, 0, 1, 'MI7'),
(1112, 'diazepam inj. 2 ml', 6, 0, 1, 'MI10'),
(1113, 'diclofenac inj.', 6, 0, 1, 'MI11'),
(1114, 'eau pour injection/physiologique', 6, 0, 1, 'MI12'),
(1115, 'gentamycine inj. 2ml', 6, 0, 1, 'MI13'),
(1116, 'glucose isotonique 500 ml 10%', 6, 0, 1, 'MI14'),
(1117, 'hydrocortisone inj. 100 mg', 6, 0, 1, 'MI15'),
(1118, 'hyoscine inj. 2ml', 6, 0, 1, 'MI16'),
(1119, 'lidocaine 2% 30 ml', 6, 0, 1, 'MI17'),
(1120, 'methyergometrine inj.', 6, 0, 1, 'MI19'),
(1121, 'chlorure de sodium normal saline 500 ml', 6, 0, 1, 'MI9'),
(1122, 'ocytocine inj. 1ml, 10 ui', 6, 0, 1, 'MI20'),
(1123, 'promethazine inj.', 6, 0, 1, 'MI21'),
(1124, 'quinine inj.', 6, 0, 1, 'MI22'),
(1125, 'ringer lactate 500 ml', 6, 0, 1, 'MI23'),
(1126, 'cetrimide 15% et chlorhexidine 1.5%', 6, 0, 1, 'MI8'),
(1127, 'lidocaine 2% 50 ml', 6, 0, 1, 'MI18'),
(1128, 'vit k inj.', 6, 0, 1, 'MI24'),
(1174, 'aas inj. 900 mg', 6, 0, 1, 'MI1'),
(1232, 'promethazine sirop', 5, 0, 1, 'MS11'),
(1233, 'acide folique 5 mg', 1, 1, 1, 'MO59'),
(1235, 'fer sulfate 200mg', 1, 1, 1, 'MO61'),
(1236, 'ac. folique 5 mg', 1, 1, 1, 'MO62'),
(1237, 'nifedipine 10mg', 1, 1, 1, 'MO63'),
(1238, 'Captopril', 1, 1, 1, 'MO63'),
(1239, 'Captopril 25mg', 1, 1, 1, 'MO64'),
(1240, 'Chlorpromazine 25 mg', 1, 1, 1, 'MO65'),
(1241, 'Glibenclamide 5 mg', 1, 1, 1, 'MO66'),
(1242, 'Hydrochlorothiazide 50 mg', 1, 1, 1, 'MO67'),
(1243, 'Methyldopa 250 mg', 1, 1, 1, 'MO68'),
(1244, 'Nifedipine 20 mg', 1, 1, 1, 'MO69'),
(1245, 'Chlorpromazine inject 2 ml,25 mg', 6, 0, 1, 'MI25'),
(1246, 'diclofenac spositoire', 1, 1, 1, 'MO70'),
(1247, 'Levomepromazine 125 mg', 6, 0, 1, 'MI26'),
(1248, 'Haloperidol inj.5mg/ml', 6, 0, 1, 'MI27'),
(1249, 'VitamineB1(thiamine) 50 mg', 1, 1, 1, 'MO71'),
(1250, 'Acyclovir 200 mg', 1, 1, 1, 'MO72'),
(1251, 'Acide valproique (depakine) 200 mg', 1, 1, 1, 'MO73'),
(1252, 'Acide valproique (depakine) 300mg', 1, 1, 1, 'MO74'),
(1253, 'Acide valproique (depakine) 500 mg', 1, 1, 1, 'MO75'),
(1254, 'Aldactone/ spironolactone 5 mg', 1, 1, 1, 'MO76'),
(1255, 'Amitriptylline 25 mg', 1, 1, 1, 'MO77'),
(1256, 'Amoxycilline+ acide clavulanique 625 mg', 1, 1, 1, 'MO78'),
(1257, 'Amoxycilline+ acide clavulanique sirop', 5, 0, 1, 'MS12'),
(1258, 'Hydrochlorothiazide 25 mg', 1, 1, 1, 'MO79'),
(1259, 'CARBAMAZEPINE(TEGRETOL) 200 MG', 1, 0, 1, 'MO80'),
(1260, 'Haloperidol 50 mg', 1, 1, 1, 'MO81'),
(1261, 'Omeprazole 20 mg', 1, 0, 1, 'MO82'),
(1262, 'pommade ictyolee', 3, 0, 1, 'PO6'),
(1263, 'glucose isotonique 500 ml 50%', 6, 0, 1, 'MI28'),
(1264, 'Betamethazone 0.1% Creme 15G', 3, 0, 1, 'PO7'),
(1265, 'Miconazole nitrate creme 2% 15G', 3, 0, 1, 'PO8'),
(1266, 'Vit A 200 MUI', 1, 1, 1, 'MO83'),
(1267, 'glucose isotonique 500 ml 5%', 1, 0, 1, 'MO84'),
(1268, 'DICLOFENAC SUPPO', 2, 0, 1, '1'),
(1269, 'SERINGUES 10ML+AIG', 1, 0, 1, 'MO85'),
(1270, 'SERINGUES 5ML+AIG', 1, 0, 1, 'MO86'),
(1271, 'THERMOMETRE DIGITAL', 2, 0, 1, '12');

-- --------------------------------------------------------

--
-- Table structure for table `md_prescription`
--

CREATE TABLE `md_prescription` (
  `PrescriptionID` int(11) NOT NULL,
  `MedecineRecordID` int(11) NOT NULL,
  `Morning` varchar(100) NOT NULL,
  `Noon` varchar(100) NOT NULL,
  `Evening` varchar(100) NOT NULL,
  `Midnight` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `md_price`
--

CREATE TABLE `md_price` (
  `MedecinePriceID` int(11) NOT NULL,
  `MedecineNameID` int(11) NOT NULL,
  `BuyingPrice` double NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Emballage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_price`
--

INSERT INTO `md_price` (`MedecinePriceID`, `MedecineNameID`, `BuyingPrice`, `Amount`, `Date`, `Status`, `Emballage`) VALUES
(5688, 1259, 17.3, 20.8, '2018-04-01', 1, 0),
(5689, 1247, 147.4, 176.9, '2018-04-01', 1, 0),
(5690, 1238, 12.68, 15.18, '2018-04-01', 1, 1),
(5691, 1233, 1.9, 2.3, '2018-04-01', 1, 1),
(5692, 1026, 5.5, 6.6, '2018-04-01', 1, 1),
(5693, 878, 4.5, 5.4, '2018-04-01', 1, 1),
(5694, 1027, 35.2, 42.2, '2018-04-01', 1, 1),
(5695, 1028, 0, 0, '2018-04-01', 1, 1),
(5696, 1029, 3.7, 4.4, '2018-04-01', 1, 1),
(5697, 1030, 8.4, 10.1, '2018-04-01', 1, 1),
(5698, 1031, 14.6, 17.5, '2018-04-01', 1, 1),
(5699, 1032, 25.8, 31, '2018-04-01', 1, 1),
(5700, 1033, 11, 13.2, '2018-04-01', 1, 0),
(5701, 1034, 78, 93.6, '2018-04-01', 1, 1),
(5702, 1035, 0.92, 1.12, '2018-04-01', 1, 1),
(5703, 1036, 6.8, 8.2, '2018-04-01', 1, 1),
(5704, 1037, 14.4, 17.3, '2018-04-01', 1, 0),
(5705, 1038, 19.1, 22.9, '2018-04-01', 1, 0),
(5706, 1039, 22.3, 26.8, '2018-04-01', 1, 1),
(5707, 1040, 14.2, 17, '2018-04-01', 1, 1),
(5708, 1045, 3, 3.6, '2018-04-01', 1, 1),
(5709, 1046, 10.4, 12.5, '2018-04-01', 1, 1),
(5710, 1041, 180, 216, '2018-04-01', 1, 0),
(5711, 1042, 180, 216, '2018-04-01', 1, 0),
(5712, 1043, 270, 324, '2018-04-01', 1, 0),
(5713, 1044, 270, 324, '2018-04-01', 1, 0),
(5714, 1047, 4, 4.8, '2018-04-01', 1, 1),
(5715, 1048, 2.5, 3, '2018-04-01', 1, 1),
(5716, 1049, 12.3, 14.8, '2018-04-01', 1, 1),
(5717, 1050, 27.5, 33, '2018-04-01', 1, 1),
(5718, 1051, 3.2, 3.8, '2018-04-01', 1, 1),
(5719, 1052, 3.4, 4.1, '2018-04-01', 1, 1),
(5720, 1053, 37.2, 44.6, '2018-04-01', 1, 1),
(5721, 1054, 3.1, 3.7, '2018-04-01', 1, 1),
(5722, 1055, 67.6, 81.1, '2018-04-01', 1, 1),
(5723, 1056, 4.22, 5.02, '2018-04-01', 1, 1),
(5724, 1057, 6.4, 7.7, '2018-04-01', 1, 1),
(5725, 1058, 5.5, 6.6, '2018-04-01', 1, 1),
(5726, 1059, 4.2, 5, '2018-04-01', 1, 1),
(5727, 1060, 3.2, 3.8, '2018-04-01', 1, 1),
(5728, 1061, 4.2, 5, '2018-04-01', 1, 1),
(5729, 1062, 2.5, 3, '2018-04-01', 1, 1),
(5730, 1063, 28.8, 34.6, '2018-04-01', 1, 1),
(5731, 1064, 6.6, 7.9, '2018-04-01', 1, 1),
(5732, 1065, 35.8, 43, '2018-04-01', 1, 1),
(5733, 1066, 21, 25.2, '2018-04-01', 1, 1),
(5734, 1067, 1.3, 1.6, '2018-04-01', 1, 1),
(5735, 1068, 3.5, 4.2, '2018-04-01', 1, 1),
(5736, 1069, 75.6, 90.7, '2018-04-01', 1, 0),
(5737, 1072, 24.2, 29, '2018-04-01', 1, 1),
(5738, 1071, 6.9, 8.3, '2018-04-01', 1, 1),
(5739, 1070, 16.4, 19.7, '2018-04-01', 1, 1),
(5740, 1073, 7.1, 8.5, '2018-04-01', 1, 1),
(5741, 1074, 3.2, 3.8, '2018-04-01', 1, 1),
(5742, 1075, 10.1, 12.1, '2018-04-01', 1, 0),
(5743, 1076, 1.3, 1.6, '2018-04-01', 1, 1),
(5744, 1077, 70.8, 85, '2018-04-01', 1, 0),
(5745, 1078, 0, 0, '2018-04-01', 1, 1),
(5746, 1079, 2, 2.4, '2018-04-01', 1, 1),
(5747, 1080, 9.6, 11.5, '2018-04-01', 1, 1),
(5748, 1081, 9.6, 11.5, '2018-04-01', 1, 1),
(5749, 1082, 12.2, 14.6, '2018-04-01', 1, 0),
(5750, 1083, 824.4, 989.3, '2018-04-01', 1, 0),
(5751, 1084, 707.23, 848.63, '2018-04-01', 1, 0),
(5752, 1085, 600.62, 720.72, '2018-04-01', 1, 0),
(5753, 1086, 1036.8, 1244.2, '2018-04-01', 1, 0),
(5754, 1087, 696, 835.2, '2018-04-01', 1, 0),
(5755, 1093, 1780, 2136, '2018-04-01', 1, 0),
(5756, 1089, 654, 784.8, '2018-04-01', 1, 0),
(5757, 1090, 396, 475.2, '2018-04-01', 1, 0),
(5758, 1088, 960, 1152, '2018-04-01', 1, 0),
(5759, 1092, 1779.7, 2135.6, '2018-04-01', 1, 0),
(5760, 1091, 144, 172.8, '2018-04-01', 1, 0),
(5761, 1094, 408.1, 489.7, '2018-04-01', 1, 0),
(5762, 1095, 395.6, 474.7, '2018-04-01', 1, 0),
(5763, 1096, 360.1, 432.1, '2018-04-01', 1, 0),
(5764, 1097, 528, 633.6, '2018-04-01', 1, 0),
(5765, 1098, 288, 345.6, '2018-04-01', 1, 0),
(5766, 1099, 304.8, 365.8, '2018-04-01', 1, 0),
(5767, 1100, 352.2, 422.6, '2018-04-01', 1, 0),
(5768, 1101, 180, 216, '2018-04-01', 1, 0),
(5769, 1102, 511.2, 613.4, '2018-04-01', 1, 0),
(5770, 1103, 265.4, 318.5, '2018-04-01', 1, 0),
(5771, 1174, 334.81, 401.81, '2018-04-01', 1, 0),
(5772, 1106, 143.8, 172.6, '2018-04-01', 1, 0),
(5773, 1107, 132, 158.4, '2018-04-01', 1, 0),
(5774, 1108, 132.5, 159, '2018-04-01', 1, 0),
(5775, 1109, 37.2, 44.6, '2018-04-01', 1, 0),
(5776, 1110, 240, 288, '2018-04-01', 1, 0),
(5777, 1111, 282, 338.4, '2018-04-01', 1, 0),
(5778, 1126, 2760, 3312, '2018-04-01', 1, 0),
(5779, 1121, 455.4, 546.5, '2018-04-01', 1, 0),
(5780, 1112, 664.8, 797.8, '2018-04-01', 1, 0),
(5781, 1113, 43.67, 52.37, '2018-04-01', 1, 0),
(5782, 1114, 37.68, 45.18, '2018-04-01', 1, 0),
(5783, 1115, 44.8, 53.8, '2018-04-01', 1, 0),
(5784, 1116, 455.4, 546.5, '2018-04-01', 1, 0),
(5785, 1117, 318.16, 381.76, '2018-04-01', 1, 0),
(5786, 1118, 238.2, 285.8, '2018-04-01', 1, 0),
(5787, 1119, 345, 414, '2018-04-01', 1, 0),
(5788, 1127, 565.3, 678.4, '2018-04-01', 1, 0),
(5789, 1120, 265.7, 318.8, '2018-04-01', 1, 0),
(5790, 1122, 150, 180, '2018-04-01', 1, 0),
(5791, 1123, 116.8, 140.2, '2018-04-01', 1, 0),
(5792, 1124, 37.2, 44.6, '2018-04-01', 1, 0),
(5793, 1125, 455.4, 546.5, '2018-04-01', 1, 0),
(5794, 1128, 181.2, 217.4, '2018-04-01', 1, 0),
(5795, 1232, 246, 295.2, '2018-04-01', 1, 0),
(5796, 1235, 2.3, 2.8, '2018-04-01', 1, 1),
(5797, 1236, 1.9, 2.3, '2018-04-01', 1, 1),
(5798, 1237, 12, 14.4, '2018-04-01', 1, 0),
(5799, 1239, 12.7, 15.2, '2018-04-01', 1, 0),
(5800, 1240, 3.3, 4, '2018-04-01', 1, 1),
(5801, 1241, 2.3, 2.8, '2018-04-01', 1, 1),
(5802, 1242, 10.1, 12.1, '2018-04-01', 1, 1),
(5803, 1243, 24.2, 29, '2018-04-01', 1, 1),
(5804, 1244, 13.2, 15.8, '2018-04-01', 1, 0),
(5805, 1245, 133.9, 160.7, '2018-04-01', 1, 0),
(5806, 1246, 55.9, 67.1, '2018-04-01', 1, 1),
(5807, 1248, 334.2, 401, '2018-04-01', 1, 0),
(5808, 1249, 6, 7.2, '2018-04-01', 1, 1),
(5809, 1250, 20.1, 24.1, '2018-04-01', 1, 1),
(5810, 1251, 27.1, 32.5, '2018-04-01', 1, 0),
(5811, 1252, 33, 39.6, '2018-04-01', 1, 0),
(5812, 1253, 96, 115.2, '2018-04-01', 1, 0),
(5813, 1254, 38.4, 46.1, '2018-04-01', 1, 1),
(5814, 1255, 3.4, 4.1, '2018-04-01', 1, 1),
(5815, 1256, 115.8, 139, '2018-04-01', 1, 1),
(5816, 1257, 2400, 2880, '2018-04-01', 1, 0),
(5817, 1258, 9.4, 11.3, '2018-04-01', 1, 1),
(5818, 1260, 8.97, 10.77, '2018-04-01', 1, 1),
(5819, 1261, 9, 10.8, '2018-04-01', 1, 0),
(5820, 1080, 12, 14.4, '2018-04-01', 1, 1),
(5821, 1259, 14.4, 17.28, '2018-07-01', 1, 0),
(5822, 1247, 147.4, 176.9, '2018-07-01', 1, 0),
(5823, 1238, 13.4, 16.08, '2018-07-01', 1, 1),
(5824, 1233, 4, 4.8, '2018-07-01', 1, 1),
(5825, 1026, 3, 3.6, '2018-07-01', 1, 1),
(5826, 878, 3, 3.6, '2018-07-01', 1, 1),
(5827, 1027, 40.26, 48.312, '2018-07-01', 1, 1),
(5828, 1028, 0, 0, '2018-07-01', 1, 1),
(5829, 1029, 3.6, 4.32, '2018-07-01', 1, 1),
(5830, 1030, 8.4, 10.08, '2018-07-01', 1, 1),
(5831, 1031, 8.5, 10.2, '2018-07-01', 1, 1),
(5832, 1032, 17.5, 21, '2018-07-01', 1, 1),
(5833, 1033, 6, 7.2, '2018-07-01', 1, 0),
(5834, 1034, 78, 93.6, '2018-07-01', 1, 1),
(5835, 1035, 0.917, 1.1, '2018-07-01', 1, 1),
(5836, 1036, 11, 13.2, '2018-07-01', 1, 1),
(5837, 1037, 12.517, 15.02, '2018-07-01', 1, 0),
(5838, 1038, 17.5, 21, '2018-07-01', 1, 0),
(5839, 1039, 25, 30, '2018-07-01', 1, 1),
(5840, 1040, 13, 15.6, '2018-07-01', 1, 1),
(5841, 1045, 3, 3.6, '2018-07-01', 1, 1),
(5842, 1046, 10.4, 12.5, '2018-07-01', 1, 1),
(5843, 1041, 150, 180, '2018-07-01', 1, 0),
(5844, 1042, 150, 180, '2018-07-01', 1, 0),
(5845, 1043, 250, 300, '2018-07-01', 1, 0),
(5846, 1044, 250, 300, '2018-07-01', 1, 0),
(5847, 1047, 7, 8.4, '2018-07-01', 1, 1),
(5848, 1048, 3, 3.6, '2018-07-01', 1, 1),
(5849, 1049, 10.26, 12.312, '2018-07-01', 1, 1),
(5850, 1050, 22.885, 27.462, '2018-07-01', 1, 1),
(5851, 1051, 3.91, 4.692, '2018-07-01', 1, 1),
(5852, 1052, 2.95, 3.54, '2018-07-01', 1, 1),
(5853, 1053, 51.13, 61.356, '2018-07-01', 1, 1),
(5854, 1054, 2.6, 3.12, '2018-07-01', 1, 1),
(5855, 1055, 67.6, 81.1, '2018-07-01', 1, 1),
(5856, 1056, 4.51, 5.412, '2018-07-01', 1, 1),
(5857, 1057, 8.05, 9.66, '2018-07-01', 1, 1),
(5858, 1058, 5.155, 6.186, '2018-07-01', 1, 1),
(5859, 1059, 3.8, 4.56, '2018-07-01', 1, 1),
(5860, 1060, 3.2, 3.84, '2018-07-01', 1, 1),
(5861, 1061, 4.485, 5.382, '2018-07-01', 1, 1),
(5862, 1062, 2.439, 2.927, '2018-07-01', 1, 1),
(5863, 1063, 280, 336, '2018-07-01', 1, 1),
(5864, 1064, 6.47, 7.764, '2018-07-01', 1, 1),
(5865, 1065, 34.01, 40.812, '2018-07-01', 1, 1),
(5866, 1066, 30.667, 36.8, '2018-07-01', 1, 1),
(5867, 1067, 1.32, 1.584, '2018-07-01', 1, 1),
(5868, 1068, 3.52, 4.224, '2018-07-01', 1, 1),
(5869, 1069, 160, 192, '2018-07-01', 1, 0),
(5870, 1072, 27.6, 33.12, '2018-07-01', 1, 1),
(5871, 1071, 8, 9.6, '2018-07-01', 1, 1),
(5872, 1070, 12.5, 15, '2018-07-01', 1, 1),
(5873, 1073, 7, 8.4, '2018-07-01', 1, 1),
(5874, 1074, 37.95, 45.54, '2018-07-01', 1, 1),
(5875, 1075, 8.4, 10.08, '2018-07-01', 1, 0),
(5876, 1076, 1.333, 1.6, '2018-07-01', 1, 1),
(5877, 1077, 70.8, 85, '2018-07-01', 1, 0),
(5878, 1078, 0, 0, '2018-07-01', 1, 1),
(5879, 1079, 1.634, 1.961, '2018-07-01', 1, 1),
(5880, 1080, 12, 14.4, '2018-07-01', 1, 1),
(5881, 1081, 10.85, 13.02, '2018-07-01', 1, 1),
(5882, 1082, 18.35, 22.02, '2018-07-01', 1, 0),
(5883, 1083, 1100, 1320, '2018-07-01', 1, 0),
(5884, 1084, 1599, 1918.8, '2018-07-01', 1, 0),
(5885, 1085, 420, 504, '2018-07-01', 1, 0),
(5886, 1086, 1800, 2160, '2018-07-01', 1, 0),
(5887, 1087, 580, 696, '2018-07-01', 1, 0),
(5888, 1093, 1780, 2136, '2018-07-01', 1, 0),
(5889, 1089, 545, 654, '2018-07-01', 1, 0),
(5890, 1090, 220, 264, '2018-07-01', 1, 0),
(5891, 1088, 780, 936, '2018-07-01', 1, 0),
(5892, 1092, 1380, 1656, '2018-07-01', 1, 0),
(5893, 1091, 147.3, 176.76, '2018-07-01', 1, 0),
(5894, 1094, 362, 434.4, '2018-07-01', 1, 0),
(5895, 1095, 363, 435.6, '2018-07-01', 1, 0),
(5896, 1096, 253, 303.6, '2018-07-01', 1, 0),
(5897, 1097, 445, 534, '2018-07-01', 1, 0),
(5898, 1098, 251.669, 302.003, '2018-07-01', 1, 0),
(5899, 1099, 200, 240, '2018-07-01', 1, 0),
(5900, 1100, 270, 324, '2018-07-01', 1, 0),
(5901, 1101, 305, 366, '2018-07-01', 1, 0),
(5902, 1102, 480, 576, '2018-07-01', 1, 0),
(5903, 1103, 268, 321.6, '2018-07-01', 1, 0),
(5904, 1174, 334.81, 401.81, '2018-07-01', 1, 0),
(5905, 1106, 92, 110.4, '2018-07-01', 1, 0),
(5906, 1107, 110, 132, '2018-07-01', 1, 0),
(5907, 1108, 110.5, 132.6, '2018-07-01', 1, 0),
(5908, 1109, 31.67, 38.004, '2018-07-01', 1, 0),
(5909, 1110, 194, 232.8, '2018-07-01', 1, 0),
(5910, 1111, 3000, 3600, '2018-07-01', 1, 0),
(5911, 1126, 2700, 3240, '2018-07-01', 1, 0),
(5912, 1121, 365, 438, '2018-07-01', 1, 0),
(5913, 1112, 400, 480, '2018-07-01', 1, 0),
(5914, 1113, 34.8, 41.76, '2018-07-01', 1, 0),
(5915, 1114, 39.36, 47.232, '2018-07-01', 1, 0),
(5916, 1115, 45, 54, '2018-07-01', 1, 0),
(5917, 1116, 700, 840, '2018-07-01', 1, 0),
(5918, 1117, 280, 336, '2018-07-01', 1, 0),
(5919, 1118, 238.2, 285.8, '2018-07-01', 1, 0),
(5920, 1119, 287.5, 345, '2018-07-01', 1, 0),
(5921, 1127, 205, 246, '2018-07-01', 1, 0),
(5922, 1120, 265.7, 318.8, '2018-07-01', 1, 0),
(5923, 1122, 150, 180, '2018-07-01', 1, 0),
(5924, 1123, 125.88, 151.056, '2018-07-01', 1, 0),
(5925, 1124, 37.2, 44.6, '2018-07-01', 1, 0),
(5926, 1125, 365, 438, '2018-07-01', 1, 0),
(5927, 1128, 224, 268.8, '2018-07-01', 1, 0),
(5928, 1232, 205, 246, '2018-07-01', 1, 0),
(5929, 1235, 3.91, 4.692, '2018-07-01', 1, 1),
(5930, 1236, 4, 4.8, '2018-07-01', 1, 1),
(5931, 1237, 10, 12, '2018-07-01', 1, 0),
(5932, 1239, 13.4, 16.08, '2018-07-01', 1, 0),
(5933, 1240, 4.583, 5.5, '2018-07-01', 1, 1),
(5934, 1241, 3.5, 4.2, '2018-07-01', 1, 1),
(5935, 1242, 5, 6, '2018-07-01', 1, 1),
(5936, 1243, 28.103, 33.724, '2018-07-01', 1, 1),
(5937, 1244, 13.5, 16.2, '2018-07-01', 1, 0),
(5938, 1245, 87.75, 105.3, '2018-07-01', 1, 0),
(5939, 1246, 80, 96, '2018-07-01', 1, 1),
(5940, 1248, 330, 396, '2018-07-01', 1, 0),
(5941, 1249, 8, 9.6, '2018-07-01', 1, 1),
(5942, 1250, 20.1, 24.1, '2018-07-01', 1, 1),
(5943, 1251, 27.1, 32.5, '2018-07-01', 1, 0),
(5944, 1252, 33, 39.6, '2018-07-01', 1, 0),
(5945, 1253, 96, 115.2, '2018-07-01', 1, 0),
(5946, 1254, 38.4, 46.1, '2018-07-01', 1, 1),
(5947, 1255, 3.6, 4.32, '2018-07-01', 1, 1),
(5948, 1256, 138.5, 166.2, '2018-07-01', 1, 1),
(5949, 1257, 1980, 2376, '2018-07-01', 1, 0),
(5950, 1258, 9.4, 11.3, '2018-07-01', 1, 1),
(5951, 1260, 2, 2.4, '2018-07-01', 1, 1),
(5952, 1261, 10.2, 12.24, '2018-07-01', 1, 0),
(5953, 1028, 16.4, 19.7, '2018-07-01', 1, 1),
(5954, 1262, 1800, 2160, '2018-07-01', 1, 0),
(5956, 1263, 700, 840, '2018-07-01', 1, 0),
(5957, 1259, 14.4, 17.28, '2018-08-08', 1, 0),
(5958, 1247, 147.4, 176.9, '2018-08-08', 1, 0),
(5959, 1238, 13.4, 16.08, '2018-08-08', 1, 1),
(5960, 1233, 5.8, 6.96, '2018-08-08', 1, 1),
(5961, 1026, 5.5, 6.6, '2018-08-08', 1, 1),
(5962, 878, 5, 6, '2018-08-08', 1, 1),
(5963, 1027, 67.26, 80.712, '2018-08-08', 1, 1),
(5964, 1028, 25.4, 30.48, '2018-08-08', 1, 1),
(5965, 1029, 8.2, 9.84, '2018-08-08', 1, 1),
(5966, 1030, 12.4, 14.88, '2018-08-08', 1, 1),
(5967, 1031, 30.2, 36.24, '2018-08-08', 1, 1),
(5968, 1032, 21.5, 25.8, '2018-08-08', 1, 1),
(5969, 1033, 8, 9.6, '2018-08-08', 1, 0),
(5970, 1034, 78, 93.6, '2018-08-08', 1, 1),
(5971, 1035, 3.917, 4.7, '2018-08-08', 1, 1),
(5972, 1036, 16, 19.2, '2018-08-08', 1, 1),
(5973, 1037, 12.517, 15.02, '2018-08-08', 1, 0),
(5974, 1038, 17.5, 21, '2018-08-08', 1, 0),
(5975, 1039, 25, 30, '2018-08-08', 1, 1),
(5976, 1040, 18.8, 22.56, '2018-08-08', 1, 1),
(5977, 1045, 12, 14.4, '2018-08-08', 1, 1),
(5978, 1046, 15.4, 18.48, '2018-08-08', 1, 1),
(5979, 1041, 150, 180, '2018-08-08', 1, 0),
(5980, 1042, 150, 180, '2018-08-08', 1, 0),
(5981, 1043, 250, 300, '2018-08-08', 1, 0),
(5982, 1044, 250, 300, '2018-08-08', 1, 0),
(5983, 1047, 11, 13.2, '2018-08-08', 1, 1),
(5984, 1048, 12, 14.4, '2018-08-08', 1, 1),
(5985, 1049, 14.6, 17.52, '2018-08-08', 1, 1),
(5986, 1050, 22.885, 27.462, '2018-08-08', 1, 1),
(5987, 1051, 3.91, 4.692, '2018-08-08', 1, 1),
(5988, 1052, 3.95, 4.74, '2018-08-08', 1, 1),
(5989, 1053, 51.13, 61.356, '2018-08-08', 1, 1),
(5990, 1054, 6.6, 7.92, '2018-08-08', 1, 1),
(5991, 1055, 67.6, 81.1, '2018-08-08', 1, 1),
(5992, 1056, 4.51, 5.412, '2018-08-08', 1, 1),
(5993, 1057, 8.05, 9.66, '2018-08-08', 1, 1),
(5994, 1058, 5.155, 6.186, '2018-08-08', 1, 1),
(5995, 1059, 4.9, 5.88, '2018-08-08', 1, 1),
(5996, 1060, 3.2, 3.84, '2018-08-08', 1, 1),
(5997, 1061, 4.485, 5.382, '2018-08-08', 1, 1),
(5998, 1062, 2.439, 2.927, '2018-08-08', 1, 1),
(5999, 1063, 280, 336, '2018-08-08', 1, 1),
(6000, 1064, 7.77, 9.324, '2018-08-08', 1, 1),
(6001, 1065, 40.8, 48.96, '2018-08-08', 1, 1),
(6002, 1066, 30.667, 36.8, '2018-08-08', 1, 1),
(6003, 1067, 1.32, 1.584, '2018-08-08', 1, 1),
(6004, 1068, 3.52, 4.224, '2018-08-08', 1, 1),
(6005, 1069, 160, 192, '2018-08-08', 1, 0),
(6006, 1072, 33.12, 39.744, '2018-08-08', 1, 1),
(6007, 1071, 8, 9.6, '2018-08-08', 1, 1),
(6008, 1070, 15.6, 18.72, '2018-08-08', 1, 1),
(6009, 1073, 7, 8.4, '2018-08-08', 1, 1),
(6010, 1074, 45.95, 55.14, '2018-08-08', 1, 1),
(6011, 1075, 8.4, 10.08, '2018-08-08', 1, 0),
(6012, 1076, 1.333, 1.6, '2018-08-08', 1, 1),
(6013, 1077, 70.8, 85, '2018-08-08', 1, 0),
(6014, 1078, 0, 0, '2018-08-08', 1, 1),
(6015, 1079, 1.634, 1.961, '2018-08-08', 1, 1),
(6016, 1080, 12, 14.4, '2018-08-08', 1, 1),
(6017, 1081, 10.85, 13.02, '2018-08-08', 1, 1),
(6018, 1082, 18.35, 22.02, '2018-08-08', 1, 0),
(6019, 1083, 1100, 1320, '2018-08-08', 1, 0),
(6020, 1084, 1599, 1918.8, '2018-08-08', 1, 0),
(6021, 1085, 504, 604.8, '2018-08-08', 1, 0),
(6022, 1086, 1800, 2160, '2018-08-08', 1, 0),
(6023, 1087, 580, 696, '2018-08-08', 1, 0),
(6024, 1093, 1780, 2136, '2018-08-08', 1, 0),
(6025, 1089, 545, 654, '2018-08-08', 1, 0),
(6026, 1090, 220, 264, '2018-08-08', 1, 0),
(6027, 1088, 780, 936, '2018-08-08', 1, 0),
(6028, 1092, 1380, 1656, '2018-08-08', 1, 0),
(6029, 1091, 147.3, 176.76, '2018-08-08', 1, 0),
(6030, 1094, 362, 434.4, '2018-08-08', 1, 0),
(6031, 1095, 363, 435.6, '2018-08-08', 1, 0),
(6032, 1096, 253, 303.6, '2018-08-08', 1, 0),
(6033, 1097, 445, 534, '2018-08-08', 1, 0),
(6034, 1098, 251.669, 302.003, '2018-08-08', 1, 0),
(6035, 1099, 200, 240, '2018-08-08', 1, 0),
(6036, 1100, 270, 324, '2018-08-08', 1, 0),
(6037, 1101, 305, 366, '2018-08-08', 1, 0),
(6038, 1102, 480, 576, '2018-08-08', 1, 0),
(6039, 1103, 268, 321.6, '2018-08-08', 1, 0),
(6040, 1174, 334.81, 401.81, '2018-08-08', 1, 0),
(6041, 1106, 92, 110.4, '2018-08-08', 1, 0),
(6042, 1107, 132, 158.4, '2018-08-08', 1, 0),
(6043, 1108, 110.5, 132.6, '2018-08-08', 1, 0),
(6044, 1109, 31.67, 38.004, '2018-08-08', 1, 0),
(6045, 1110, 233, 279.6, '2018-08-08', 1, 0),
(6046, 1111, 3000, 3600, '2018-08-08', 1, 0),
(6047, 1126, 2700, 3240, '2018-08-08', 1, 0),
(6048, 1121, 365, 438, '2018-08-08', 1, 0),
(6049, 1112, 539, 646.8, '2018-08-08', 1, 0),
(6050, 1113, 34.8, 41.76, '2018-08-08', 1, 0),
(6051, 1114, 39.36, 47.232, '2018-08-08', 1, 0),
(6052, 1115, 45, 54, '2018-08-08', 1, 0),
(6053, 1116, 700, 840, '2018-08-08', 1, 0),
(6054, 1117, 280, 336, '2018-08-08', 1, 0),
(6055, 1118, 238.2, 285.8, '2018-08-08', 1, 0),
(6056, 1119, 287.5, 345, '2018-08-08', 1, 0),
(6057, 1127, 205, 246, '2018-08-08', 1, 0),
(6058, 1120, 265.7, 318.8, '2018-08-08', 1, 0),
(6059, 1122, 150, 180, '2018-08-08', 1, 0),
(6060, 1123, 125.88, 151.056, '2018-08-08', 1, 0),
(6061, 1124, 37.2, 44.6, '2018-08-08', 1, 0),
(6062, 1125, 365, 438, '2018-08-08', 1, 0),
(6063, 1128, 224, 268.8, '2018-08-08', 1, 0),
(6064, 1232, 205, 246, '2018-08-08', 1, 0),
(6065, 1235, 13.91, 16.692, '2018-08-08', 1, 1),
(6066, 1236, 6.2, 7.44, '2018-08-08', 1, 1),
(6067, 1237, 15.6, 18.72, '2018-08-08', 1, 0),
(6068, 1239, 13.4, 16.08, '2018-08-08', 1, 0),
(6069, 1240, 4.583, 5.5, '2018-08-08', 1, 1),
(6070, 1241, 13.5, 16.2, '2018-08-08', 1, 1),
(6071, 1242, 11, 13.2, '2018-08-08', 1, 1),
(6072, 1243, 28.103, 33.724, '2018-08-08', 1, 1),
(6073, 1244, 13.5, 16.2, '2018-08-08', 1, 0),
(6074, 1245, 105, 126, '2018-08-08', 1, 0),
(6075, 1246, 96, 115.2, '2018-08-08', 1, 1),
(6076, 1248, 330, 396, '2018-08-08', 1, 0),
(6077, 1249, 8, 9.6, '2018-08-08', 1, 1),
(6078, 1250, 20.1, 24.1, '2018-08-08', 1, 1),
(6079, 1251, 35.1, 42.12, '2018-08-08', 1, 0),
(6080, 1252, 33, 39.6, '2018-08-08', 1, 0),
(6081, 1253, 96, 115.2, '2018-08-08', 1, 0),
(6082, 1254, 38.4, 46.08, '2018-08-08', 1, 1),
(6083, 1255, 10.6, 12.72, '2018-08-08', 1, 1),
(6084, 1256, 138.5, 166.2, '2018-08-08', 1, 1),
(6085, 1257, 1980, 2376, '2018-08-08', 1, 0),
(6086, 1258, 9.4, 11.3, '2018-08-08', 1, 1),
(6087, 1260, 5.3, 6.36, '2018-08-08', 1, 1),
(6088, 1261, 12.2, 14.64, '2018-08-08', 1, 0),
(6089, 1262, 1800, 2160, '2018-08-08', 1, 0),
(6090, 1263, 700, 840, '2018-08-08', 1, 0),
(6091, 1264, 252, 302.4, '2018-07-01', 1, 0),
(6092, 1265, 212, 254.4, '2018-07-01', 1, 0),
(6093, 1259, 14.4, 17.28, '2018-08-09', 1, 0),
(6094, 1247, 147.4, 176.9, '2018-08-09', 1, 0),
(6095, 1238, 13.4, 16.08, '2018-08-09', 1, 1),
(6096, 1233, 4, 4.8, '2018-08-09', 1, 1),
(6097, 1026, 4.3, 5.16, '2018-08-09', 1, 1),
(6098, 878, 3, 3.6, '2018-08-09', 1, 1),
(6099, 1027, 40.26, 48.312, '2018-08-09', 1, 1),
(6100, 1028, 16.4, 19.7, '2018-08-09', 1, 1),
(6101, 1029, 3.6, 4.32, '2018-08-09', 1, 1),
(6102, 1030, 16.4, 19.68, '2018-08-09', 1, 1),
(6103, 1031, 20.5, 24.6, '2018-08-09', 1, 1),
(6104, 1032, 35.5, 42.6, '2018-08-09', 1, 1),
(6105, 1033, 6, 7.2, '2018-08-09', 1, 0),
(6106, 1034, 78, 93.6, '2018-08-09', 1, 1),
(6107, 1035, 5.917, 7.1, '2018-08-09', 1, 1),
(6108, 1036, 11, 13.2, '2018-08-09', 1, 1),
(6109, 1037, 12.517, 15.02, '2018-08-09', 1, 0),
(6110, 1038, 17.5, 21, '2018-08-09', 1, 0),
(6111, 1039, 25, 30, '2018-08-09', 1, 1),
(6112, 1040, 13, 15.6, '2018-08-09', 1, 1),
(6113, 1045, 10, 12, '2018-08-09', 1, 1),
(6114, 1046, 15.4, 18.48, '2018-08-09', 1, 1),
(6115, 1041, 150, 180, '2018-08-09', 1, 0),
(6116, 1042, 150, 180, '2018-08-09', 1, 0),
(6117, 1043, 270, 324, '2018-08-09', 1, 0),
(6118, 1044, 270, 324, '2018-08-09', 1, 0),
(6119, 1047, 7, 8.4, '2018-08-09', 1, 1),
(6120, 1048, 3, 3.6, '2018-08-09', 1, 1),
(6121, 1049, 10.26, 12.312, '2018-08-09', 1, 1),
(6122, 1050, 22.885, 27.462, '2018-08-09', 1, 1),
(6123, 1051, 3.91, 4.692, '2018-08-09', 1, 1),
(6124, 1052, 2.95, 3.54, '2018-08-09', 1, 1),
(6125, 1053, 51.13, 61.356, '2018-08-09', 1, 1),
(6126, 1054, 2.6, 3.12, '2018-08-09', 1, 1),
(6127, 1055, 67.6, 81.1, '2018-08-09', 1, 1),
(6128, 1056, 4.51, 5.412, '2018-08-09', 1, 1),
(6129, 1057, 8.05, 9.66, '2018-08-09', 1, 1),
(6130, 1058, 5.155, 6.186, '2018-08-09', 1, 1),
(6131, 1059, 3.8, 4.56, '2018-08-09', 1, 1),
(6132, 1060, 3.2, 3.84, '2018-08-09', 1, 1),
(6133, 1061, 4.485, 5.382, '2018-08-09', 1, 1),
(6134, 1062, 2.439, 2.927, '2018-08-09', 1, 1),
(6135, 1063, 280, 336, '2018-08-09', 1, 1),
(6136, 1064, 6.47, 7.764, '2018-08-09', 1, 1),
(6137, 1065, 34.01, 40.812, '2018-08-09', 1, 1),
(6138, 1066, 30.667, 36.8, '2018-08-09', 1, 1),
(6139, 1067, 2.32, 2.784, '2018-08-09', 1, 1),
(6140, 1068, 3.52, 4.224, '2018-08-09', 1, 1),
(6141, 1069, 160, 192, '2018-08-09', 1, 0),
(6142, 1072, 27.6, 33.12, '2018-08-09', 1, 1),
(6143, 1071, 8, 9.6, '2018-08-09', 1, 1),
(6144, 1070, 12.5, 15, '2018-08-09', 1, 1),
(6145, 1073, 7, 8.4, '2018-08-09', 1, 1),
(6146, 1074, 37.95, 45.54, '2018-08-09', 1, 1),
(6147, 1075, 8.4, 10.08, '2018-08-09', 1, 0),
(6148, 1076, 1.333, 1.6, '2018-08-09', 1, 1),
(6149, 1077, 70.8, 85, '2018-08-09', 1, 0),
(6150, 1078, 0, 0, '2018-08-09', 1, 1),
(6151, 1079, 1.634, 1.961, '2018-08-09', 1, 1),
(6152, 1080, 12, 14.4, '2018-08-09', 1, 1),
(6153, 1081, 10.85, 13.02, '2018-08-09', 1, 1),
(6154, 1082, 18.35, 22.02, '2018-08-09', 1, 0),
(6155, 1083, 1100, 1320, '2018-08-09', 1, 0),
(6156, 1084, 1599, 1918.8, '2018-08-09', 1, 0),
(6157, 1085, 420, 504, '2018-08-09', 1, 0),
(6158, 1086, 1800, 2160, '2018-08-09', 1, 0),
(6159, 1087, 580, 696, '2018-08-09', 1, 0),
(6160, 1093, 1780, 2136, '2018-08-09', 1, 0),
(6161, 1089, 545, 654, '2018-08-09', 1, 0),
(6162, 1090, 220, 264, '2018-08-09', 1, 0),
(6163, 1088, 780, 936, '2018-08-09', 1, 0),
(6164, 1092, 1380, 1656, '2018-08-09', 1, 0),
(6165, 1091, 147.3, 176.76, '2018-08-09', 1, 0),
(6166, 1094, 362, 434.4, '2018-08-09', 1, 0),
(6167, 1095, 363, 435.6, '2018-08-09', 1, 0),
(6168, 1096, 253, 303.6, '2018-08-09', 1, 0),
(6169, 1097, 445, 534, '2018-08-09', 1, 0),
(6170, 1098, 251.669, 302.003, '2018-08-09', 1, 0),
(6171, 1099, 200, 240, '2018-08-09', 1, 0),
(6172, 1100, 270, 324, '2018-08-09', 1, 0),
(6173, 1101, 305, 366, '2018-08-09', 1, 0),
(6174, 1102, 480, 576, '2018-08-09', 1, 0),
(6175, 1103, 268, 321.6, '2018-08-09', 1, 0),
(6176, 1174, 334.81, 401.81, '2018-08-09', 1, 0),
(6177, 1106, 92, 110.4, '2018-08-09', 1, 0),
(6178, 1107, 110, 132, '2018-08-09', 1, 0),
(6179, 1108, 110.5, 132.6, '2018-08-09', 1, 0),
(6180, 1109, 31.67, 38.004, '2018-08-09', 1, 0),
(6181, 1110, 194, 232.8, '2018-08-09', 1, 0),
(6182, 1111, 3000, 3600, '2018-08-09', 1, 0),
(6183, 1126, 2700, 3240, '2018-08-09', 1, 0),
(6184, 1121, 365, 438, '2018-08-09', 1, 0),
(6185, 1112, 400, 480, '2018-08-09', 1, 0),
(6186, 1113, 34.8, 41.76, '2018-08-09', 1, 0),
(6187, 1114, 39.36, 47.232, '2018-08-09', 1, 0),
(6188, 1115, 45, 54, '2018-08-09', 1, 0),
(6189, 1116, 700, 840, '2018-08-09', 1, 0),
(6190, 1117, 280, 336, '2018-08-09', 1, 0),
(6191, 1118, 238.2, 285.8, '2018-08-09', 1, 0),
(6192, 1119, 287.5, 345, '2018-08-09', 1, 0),
(6193, 1127, 205, 246, '2018-08-09', 1, 0),
(6194, 1120, 265.7, 318.8, '2018-08-09', 1, 0),
(6195, 1122, 150, 180, '2018-08-09', 1, 0),
(6196, 1123, 125.88, 151.056, '2018-08-09', 1, 0),
(6197, 1124, 37.2, 44.6, '2018-08-09', 1, 0),
(6198, 1125, 365, 438, '2018-08-09', 1, 0),
(6199, 1128, 224, 268.8, '2018-08-09', 1, 0),
(6200, 1232, 205, 246, '2018-08-09', 1, 0),
(6201, 1235, 3.91, 4.692, '2018-08-09', 1, 1),
(6202, 1236, 4, 4.8, '2018-08-09', 1, 1),
(6203, 1237, 10, 12, '2018-08-09', 1, 0),
(6204, 1239, 13.4, 16.08, '2018-08-09', 1, 0),
(6205, 1240, 4.583, 5.5, '2018-08-09', 1, 1),
(6206, 1241, 3.5, 4.2, '2018-08-09', 1, 1),
(6207, 1242, 5, 6, '2018-08-09', 1, 1),
(6208, 1243, 28.103, 33.724, '2018-08-09', 1, 1),
(6209, 1244, 13.5, 16.2, '2018-08-09', 1, 0),
(6210, 1245, 87.75, 105.3, '2018-08-09', 1, 0),
(6211, 1246, 80, 96, '2018-08-09', 1, 1),
(6212, 1248, 330, 396, '2018-08-09', 1, 0),
(6213, 1249, 8, 9.6, '2018-08-09', 1, 1),
(6214, 1250, 20.1, 24.1, '2018-08-09', 1, 1),
(6215, 1251, 27.1, 32.5, '2018-08-09', 1, 0),
(6216, 1252, 33, 39.6, '2018-08-09', 1, 0),
(6217, 1253, 96, 115.2, '2018-08-09', 1, 0),
(6218, 1254, 38.4, 46.1, '2018-08-09', 1, 1),
(6219, 1255, 3.6, 4.32, '2018-08-09', 1, 1),
(6220, 1256, 138.5, 166.2, '2018-08-09', 1, 1),
(6221, 1257, 1980, 2376, '2018-08-09', 1, 0),
(6222, 1258, 9.4, 11.3, '2018-08-09', 1, 1),
(6223, 1260, 2, 2.4, '2018-08-09', 1, 1),
(6224, 1261, 10.2, 12.24, '2018-08-09', 1, 0),
(6225, 1262, 1800, 2160, '2018-08-09', 1, 0),
(6226, 1263, 700, 840, '2018-08-09', 1, 0),
(6227, 1264, 252, 302.4, '2018-08-09', 1, 0),
(6228, 1265, 212, 254.4, '2018-08-09', 1, 0),
(6229, 1266, 89, 106.8, '2018-07-01', 1, 1),
(6230, 1259, 14.4, 17.28, '2018-08-10', 1, 0),
(6231, 1247, 147.4, 176.9, '2018-08-10', 1, 0),
(6232, 1238, 13.4, 16.08, '2018-08-10', 1, 1),
(6233, 1233, 4, 4.8, '2018-08-10', 1, 1),
(6234, 1026, 4.3, 5.16, '2018-08-10', 1, 1),
(6235, 878, 3, 3.6, '2018-08-10', 1, 1),
(6236, 1027, 40.26, 48.312, '2018-08-10', 1, 1),
(6237, 1028, 16.4, 19.7, '2018-08-10', 1, 1),
(6238, 1029, 3.6, 4.32, '2018-08-10', 1, 1),
(6239, 1030, 16.4, 19.68, '2018-08-10', 1, 1),
(6240, 1031, 21, 25.2, '2018-08-10', 1, 1),
(6241, 1032, 35.5, 42.6, '2018-08-10', 1, 1),
(6242, 1033, 6, 7.2, '2018-08-10', 1, 0),
(6243, 1034, 78, 93.6, '2018-08-10', 1, 1),
(6244, 1035, 5.917, 7.1, '2018-08-10', 1, 1),
(6245, 1036, 11, 13.2, '2018-08-10', 1, 1),
(6246, 1037, 12.517, 15.02, '2018-08-10', 1, 0),
(6247, 1038, 17.5, 21, '2018-08-10', 1, 0),
(6248, 1039, 25, 30, '2018-08-10', 1, 1),
(6249, 1040, 18, 21.6, '2018-08-10', 1, 1),
(6250, 1045, 10, 12, '2018-08-10', 1, 1),
(6251, 1046, 15.4, 18.48, '2018-08-10', 1, 1),
(6252, 1041, 150, 180, '2018-08-10', 1, 0),
(6253, 1042, 150, 180, '2018-08-10', 1, 0),
(6254, 1043, 270, 324, '2018-08-10', 1, 0),
(6255, 1044, 270, 324, '2018-08-10', 1, 0),
(6256, 1047, 7, 8.4, '2018-08-10', 1, 1),
(6257, 1048, 3, 3.6, '2018-08-10', 1, 1),
(6258, 1049, 14.646, 17.575, '2018-08-10', 1, 1),
(6259, 1050, 22.885, 27.462, '2018-08-10', 1, 1),
(6260, 1051, 3.91, 4.692, '2018-08-10', 1, 1),
(6261, 1052, 2.95, 3.54, '2018-08-10', 1, 1),
(6262, 1053, 51.13, 61.356, '2018-08-10', 1, 1),
(6263, 1054, 2.6, 3.12, '2018-08-10', 1, 1),
(6264, 1055, 67.6, 81.1, '2018-08-10', 1, 1),
(6265, 1056, 4.51, 5.412, '2018-08-10', 1, 1),
(6266, 1057, 8.05, 9.66, '2018-08-10', 1, 1),
(6267, 1058, 5.155, 6.186, '2018-08-10', 1, 1),
(6268, 1059, 3.8, 4.56, '2018-08-10', 1, 1),
(6269, 1060, 3.2, 3.84, '2018-08-10', 1, 1),
(6270, 1061, 4.485, 5.382, '2018-08-10', 1, 1),
(6271, 1062, 2.439, 2.927, '2018-08-10', 1, 1),
(6272, 1063, 280, 336, '2018-08-10', 1, 1),
(6273, 1064, 7.764, 9.317, '2018-08-10', 1, 1),
(6274, 1065, 40.812, 48.974, '2018-08-10', 1, 1),
(6275, 1066, 30.667, 36.8, '2018-08-10', 1, 1),
(6276, 1067, 2.32, 2.784, '2018-08-10', 1, 1),
(6277, 1068, 3.52, 4.224, '2018-08-10', 1, 1),
(6278, 1069, 160, 192, '2018-08-10', 1, 0),
(6279, 1072, 33.12, 39.744, '2018-08-10', 1, 1),
(6280, 1071, 8, 9.6, '2018-08-10', 1, 1),
(6281, 1070, 16.768, 20.122, '2018-08-10', 1, 1),
(6282, 1073, 9.4, 11.28, '2018-08-10', 1, 1),
(6283, 1074, 45.54, 54.648, '2018-08-10', 1, 1),
(6284, 1075, 8.4, 10.08, '2018-08-10', 1, 0),
(6285, 1076, 1.333, 1.6, '2018-08-10', 1, 1),
(6286, 1077, 70.8, 85, '2018-08-10', 1, 0),
(6287, 1078, 0, 0, '2018-08-10', 1, 1),
(6288, 1079, 1.961, 2.353, '2018-08-10', 1, 1),
(6289, 1080, 12, 14.4, '2018-08-10', 1, 1),
(6290, 1081, 10.85, 13.02, '2018-08-10', 1, 1),
(6291, 1082, 18.35, 22.02, '2018-08-10', 1, 0),
(6292, 1083, 1100, 1320, '2018-08-10', 1, 0),
(6293, 1084, 1599, 1918.8, '2018-08-10', 1, 0),
(6294, 1085, 510, 612, '2018-08-10', 1, 0),
(6295, 1086, 1800, 2160, '2018-08-10', 1, 0),
(6296, 1087, 580, 696, '2018-08-10', 1, 0),
(6297, 1093, 1780, 2136, '2018-08-10', 1, 0),
(6298, 1089, 545, 654, '2018-08-10', 1, 0),
(6299, 1090, 220, 264, '2018-08-10', 1, 0),
(6300, 1088, 780, 936, '2018-08-10', 1, 0),
(6301, 1092, 1380, 1656, '2018-08-10', 1, 0),
(6302, 1091, 147.3, 176.76, '2018-08-10', 1, 0),
(6303, 1094, 362, 434.4, '2018-08-10', 1, 0),
(6304, 1095, 363, 435.6, '2018-08-10', 1, 0),
(6305, 1096, 253, 303.6, '2018-08-10', 1, 0),
(6306, 1097, 445, 534, '2018-08-10', 1, 0),
(6307, 1098, 251.669, 302.003, '2018-08-10', 1, 0),
(6308, 1099, 200, 240, '2018-08-10', 1, 0),
(6309, 1100, 270, 324, '2018-08-10', 1, 0),
(6310, 1101, 305, 366, '2018-08-10', 1, 0),
(6311, 1102, 480, 576, '2018-08-10', 1, 0),
(6312, 1103, 268, 321.6, '2018-08-10', 1, 0),
(6313, 1174, 334.81, 401.81, '2018-08-10', 1, 0),
(6314, 1106, 92, 110.4, '2018-08-10', 1, 0),
(6315, 1107, 132, 158.4, '2018-08-10', 1, 0),
(6316, 1108, 110.5, 132.6, '2018-08-10', 1, 0),
(6317, 1109, 31.67, 38.004, '2018-08-10', 1, 0),
(6318, 1110, 233, 279.6, '2018-08-10', 1, 0),
(6319, 1111, 3000, 3600, '2018-08-10', 1, 0),
(6320, 1126, 2700, 3240, '2018-08-10', 1, 0),
(6321, 1121, 365, 438, '2018-08-10', 1, 0),
(6322, 1112, 539, 646.8, '2018-08-10', 1, 0),
(6323, 1113, 34.8, 41.76, '2018-08-10', 1, 0),
(6324, 1114, 39.36, 47.232, '2018-08-10', 1, 0),
(6325, 1115, 45, 54, '2018-08-10', 1, 0),
(6326, 1116, 840, 1008, '2018-08-10', 1, 0),
(6327, 1117, 280, 336, '2018-08-10', 1, 0),
(6328, 1118, 238.2, 285.8, '2018-08-10', 1, 0),
(6329, 1119, 287.5, 345, '2018-08-10', 1, 0),
(6330, 1127, 205, 246, '2018-08-10', 1, 0),
(6331, 1120, 265.7, 318.8, '2018-08-10', 1, 0),
(6332, 1122, 150, 180, '2018-08-10', 1, 0),
(6333, 1123, 125.88, 151.056, '2018-08-10', 1, 0),
(6334, 1124, 37.2, 44.6, '2018-08-10', 1, 0),
(6335, 1125, 365, 438, '2018-08-10', 1, 0),
(6336, 1128, 224, 268.8, '2018-08-10', 1, 0),
(6337, 1232, 205, 246, '2018-08-10', 1, 0),
(6338, 1235, 3.91, 4.692, '2018-08-10', 1, 1),
(6339, 1236, 4, 4.8, '2018-08-10', 1, 1),
(6340, 1237, 10, 12, '2018-08-10', 1, 0),
(6341, 1239, 13.4, 16.08, '2018-08-10', 1, 0),
(6342, 1240, 4.583, 5.5, '2018-08-10', 1, 1),
(6343, 1241, 3.5, 4.2, '2018-08-10', 1, 1),
(6344, 1242, 5, 6, '2018-08-10', 1, 1),
(6345, 1243, 28.103, 33.724, '2018-08-10', 1, 1),
(6346, 1244, 15.6, 18.72, '2018-08-10', 1, 0),
(6347, 1245, 105, 126, '2018-08-10', 1, 0),
(6348, 1246, 80, 96, '2018-08-10', 1, 1),
(6349, 1248, 330, 396, '2018-08-10', 1, 0),
(6350, 1249, 8, 9.6, '2018-08-10', 1, 1),
(6351, 1250, 20.1, 24.1, '2018-08-10', 1, 1),
(6352, 1251, 27.1, 32.5, '2018-08-10', 1, 0),
(6353, 1252, 33, 39.6, '2018-08-10', 1, 0),
(6354, 1253, 96, 115.2, '2018-08-10', 1, 0),
(6355, 1254, 38.4, 46.1, '2018-08-10', 1, 1),
(6356, 1255, 4.32, 5.184, '2018-08-10', 1, 1),
(6357, 1256, 138.5, 166.2, '2018-08-10', 1, 1),
(6358, 1257, 1980, 2376, '2018-08-10', 1, 0),
(6359, 1258, 9.4, 11.3, '2018-08-10', 1, 1),
(6360, 1260, 2, 2.4, '2018-08-10', 1, 1),
(6361, 1261, 12.24, 14.688, '2018-08-10', 1, 0),
(6362, 1262, 1800, 2160, '2018-08-10', 1, 0),
(6363, 1263, 700, 840, '2018-08-10', 1, 0),
(6364, 1264, 252, 302.4, '2018-08-10', 1, 0),
(6365, 1265, 212, 254.4, '2018-08-10', 1, 0),
(6366, 1266, 96, 115.2, '2018-08-09', 1, 1),
(6367, 1267, 470, 564, '2018-08-13', 1, 0),
(6368, 1268, 96, 115.2, '2018-08-13', 1, 0),
(6369, 1269, 50.4, 60.5, '2018-08-13', 1, 0),
(6370, 1270, 50.4, 60.5, '2018-08-13', 1, 0),
(6371, 1271, 5.04, 6.04, '2018-08-13', 1, 0),
(6372, 1259, 14.4, 17.28, '2018-08-13', 1, 0),
(6373, 1247, 147.4, 176.9, '2018-08-13', 1, 0),
(6374, 1238, 13.4, 16.08, '2018-08-13', 1, 1),
(6375, 1233, 4, 4.8, '2018-08-13', 1, 1),
(6376, 1026, 4.3, 5.16, '2018-08-13', 1, 1),
(6377, 878, 3, 3.6, '2018-08-13', 1, 1),
(6378, 1027, 40.26, 48.312, '2018-08-13', 1, 1),
(6379, 1028, 16.4, 19.7, '2018-08-13', 1, 1),
(6380, 1029, 3.6, 4.32, '2018-08-13', 1, 1),
(6381, 1030, 16.4, 19.68, '2018-08-13', 1, 1),
(6382, 1031, 21, 25.2, '2018-08-13', 1, 1),
(6383, 1032, 35.5, 42.6, '2018-08-13', 1, 1),
(6384, 1033, 6, 7.2, '2018-08-13', 1, 0),
(6385, 1034, 78, 93.6, '2018-08-13', 1, 1),
(6386, 1035, 5.917, 7.1, '2018-08-13', 1, 1),
(6387, 1036, 11, 13.2, '2018-08-13', 1, 1),
(6388, 1037, 12.517, 15.02, '2018-08-13', 1, 0),
(6389, 1038, 17.5, 21, '2018-08-13', 1, 0),
(6390, 1039, 25, 30, '2018-08-13', 1, 1),
(6391, 1040, 18, 21.6, '2018-08-13', 1, 1),
(6392, 1045, 10, 12, '2018-08-13', 1, 1),
(6393, 1046, 15.4, 18.48, '2018-08-13', 1, 1),
(6394, 1041, 150, 180, '2018-08-13', 1, 0),
(6395, 1042, 150, 180, '2018-08-13', 1, 0),
(6396, 1043, 270, 324, '2018-08-13', 1, 0),
(6397, 1044, 270, 324, '2018-08-13', 1, 0),
(6398, 1047, 7, 8.4, '2018-08-13', 1, 1),
(6399, 1048, 3, 3.6, '2018-08-13', 1, 1),
(6400, 1049, 14.646, 17.575, '2018-08-13', 1, 1),
(6401, 1050, 22.885, 27.462, '2018-08-13', 1, 1),
(6402, 1051, 3.91, 4.692, '2018-08-13', 1, 1),
(6403, 1052, 2.95, 3.54, '2018-08-13', 1, 1),
(6404, 1053, 51.13, 61.356, '2018-08-13', 1, 1),
(6405, 1054, 2.6, 3.12, '2018-08-13', 1, 1),
(6406, 1055, 67.6, 81.1, '2018-08-13', 1, 1),
(6407, 1056, 4.51, 5.412, '2018-08-13', 1, 1),
(6408, 1057, 8.05, 9.66, '2018-08-13', 1, 1),
(6409, 1058, 5.155, 6.186, '2018-08-13', 1, 1),
(6410, 1059, 3.8, 4.56, '2018-08-13', 1, 1),
(6411, 1060, 3.2, 3.84, '2018-08-13', 1, 1),
(6412, 1061, 4.485, 5.382, '2018-08-13', 1, 1),
(6413, 1062, 2.439, 2.927, '2018-08-13', 1, 1),
(6414, 1063, 280, 336, '2018-08-13', 1, 1),
(6415, 1064, 7.764, 9.317, '2018-08-13', 1, 1),
(6416, 1065, 40.812, 48.974, '2018-08-13', 1, 1),
(6417, 1066, 30.667, 36.8, '2018-08-13', 1, 1),
(6418, 1067, 2.32, 2.784, '2018-08-13', 1, 1),
(6419, 1068, 3.52, 4.224, '2018-08-13', 1, 1),
(6420, 1069, 160, 192, '2018-08-13', 1, 0),
(6421, 1072, 33.12, 39.744, '2018-08-13', 1, 1),
(6422, 1071, 8, 9.6, '2018-08-13', 1, 1),
(6423, 1070, 16.768, 20.122, '2018-08-13', 1, 1),
(6424, 1073, 9.4, 11.28, '2018-08-13', 1, 1),
(6425, 1074, 45.54, 54.648, '2018-08-13', 1, 1),
(6426, 1075, 8.4, 10.08, '2018-08-13', 1, 0),
(6427, 1076, 1.333, 1.6, '2018-08-13', 1, 1),
(6428, 1077, 70.8, 85, '2018-08-13', 1, 0),
(6429, 1078, 0, 0, '2018-08-13', 1, 1),
(6430, 1079, 1.961, 2.353, '2018-08-13', 1, 1),
(6431, 1080, 12, 14.4, '2018-08-13', 1, 1),
(6432, 1081, 10.85, 13.02, '2018-08-13', 1, 1),
(6433, 1082, 18.35, 22.02, '2018-08-13', 1, 0),
(6434, 1083, 1100, 1320, '2018-08-13', 1, 0),
(6435, 1084, 1599, 1918.8, '2018-08-13', 1, 0),
(6436, 1085, 510, 612, '2018-08-13', 1, 0),
(6437, 1086, 1800, 2160, '2018-08-13', 1, 0),
(6438, 1087, 580, 696, '2018-08-13', 1, 0),
(6439, 1093, 1780, 2136, '2018-08-13', 1, 0),
(6440, 1089, 545, 654, '2018-08-13', 1, 0),
(6441, 1090, 220, 264, '2018-08-13', 1, 0),
(6442, 1088, 780, 936, '2018-08-13', 1, 0),
(6443, 1092, 1380, 1656, '2018-08-13', 1, 0),
(6444, 1091, 147.3, 176.76, '2018-08-13', 1, 0),
(6445, 1094, 362, 434.4, '2018-08-13', 1, 0),
(6446, 1095, 363, 435.6, '2018-08-13', 1, 0),
(6447, 1096, 253, 303.6, '2018-08-13', 1, 0),
(6448, 1097, 445, 534, '2018-08-13', 1, 0),
(6449, 1098, 251.669, 302.003, '2018-08-13', 1, 0),
(6450, 1099, 200, 240, '2018-08-13', 1, 0),
(6451, 1100, 270, 324, '2018-08-13', 1, 0),
(6452, 1101, 305, 366, '2018-08-13', 1, 0),
(6453, 1102, 480, 576, '2018-08-13', 1, 0),
(6454, 1103, 268, 321.6, '2018-08-13', 1, 0),
(6455, 1174, 334.81, 401.81, '2018-08-13', 1, 0),
(6456, 1106, 92, 110.4, '2018-08-13', 1, 0),
(6457, 1107, 132, 158.4, '2018-08-13', 1, 0),
(6458, 1108, 110.5, 132.6, '2018-08-13', 1, 0),
(6459, 1109, 31.67, 38.004, '2018-08-13', 1, 0),
(6460, 1110, 233, 279.6, '2018-08-13', 1, 0),
(6461, 1111, 3000, 3600, '2018-08-13', 1, 0),
(6462, 1126, 2700, 3240, '2018-08-13', 1, 0),
(6463, 1121, 365, 438, '2018-08-13', 1, 0),
(6464, 1112, 539, 646.8, '2018-08-13', 1, 0),
(6465, 1113, 34.8, 41.76, '2018-08-13', 1, 0),
(6466, 1114, 39.36, 47.232, '2018-08-13', 1, 0),
(6467, 1115, 45, 54, '2018-08-13', 1, 0),
(6468, 1116, 840, 1008, '2018-08-13', 1, 0),
(6469, 1117, 280, 336, '2018-08-13', 1, 0),
(6470, 1118, 238.2, 285.8, '2018-08-13', 1, 0),
(6471, 1119, 287.5, 345, '2018-08-13', 1, 0),
(6472, 1127, 205, 246, '2018-08-13', 1, 0),
(6473, 1120, 265.7, 318.8, '2018-08-13', 1, 0),
(6474, 1122, 150, 180, '2018-08-13', 1, 0),
(6475, 1123, 125.88, 151.056, '2018-08-13', 1, 0),
(6476, 1124, 37.2, 44.6, '2018-08-13', 1, 0),
(6477, 1125, 365, 438, '2018-08-13', 1, 0),
(6478, 1128, 224, 268.8, '2018-08-13', 1, 0),
(6479, 1232, 205, 246, '2018-08-13', 1, 0),
(6480, 1235, 3.91, 4.692, '2018-08-13', 1, 1),
(6481, 1236, 4, 4.8, '2018-08-13', 1, 1),
(6482, 1237, 10, 12, '2018-08-13', 1, 0),
(6483, 1239, 13.4, 16.08, '2018-08-13', 1, 0),
(6484, 1240, 4.583, 5.5, '2018-08-13', 1, 1),
(6485, 1241, 3.5, 4.2, '2018-08-13', 1, 1),
(6486, 1242, 5, 6, '2018-08-13', 1, 1),
(6487, 1243, 28.103, 33.724, '2018-08-13', 1, 1),
(6488, 1244, 15.6, 18.72, '2018-08-13', 1, 0),
(6489, 1245, 105, 126, '2018-08-13', 1, 0),
(6490, 1246, 80, 96, '2018-08-13', 1, 1),
(6491, 1248, 330, 396, '2018-08-13', 1, 0),
(6492, 1249, 8, 9.6, '2018-08-13', 1, 1),
(6493, 1250, 20.1, 24.1, '2018-08-13', 1, 1),
(6494, 1251, 27.1, 32.5, '2018-08-13', 1, 0),
(6495, 1252, 33, 39.6, '2018-08-13', 1, 0),
(6496, 1253, 96, 115.2, '2018-08-13', 1, 0),
(6497, 1254, 38.4, 46.1, '2018-08-13', 1, 1),
(6498, 1255, 4.32, 5.184, '2018-08-13', 1, 1),
(6499, 1256, 138.5, 166.2, '2018-08-13', 1, 1),
(6500, 1257, 1980, 2376, '2018-08-13', 1, 0),
(6501, 1258, 9.4, 11.3, '2018-08-13', 1, 1),
(6502, 1260, 2, 2.4, '2018-08-13', 1, 1),
(6503, 1261, 12.24, 14.688, '2018-08-13', 1, 0),
(6504, 1262, 1800, 2160, '2018-08-13', 1, 0),
(6505, 1263, 700, 840, '2018-08-13', 1, 0),
(6506, 1264, 252, 302.4, '2018-08-13', 1, 0),
(6507, 1265, 212, 254.4, '2018-08-13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `md_records`
--

CREATE TABLE `md_records` (
  `MedecineRecordID` int(11) NOT NULL,
  `ConsultationRecordID` int(11) NOT NULL,
  `MedecinePriceID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `SpecialPrescription` text NOT NULL,
  `Date` date NOT NULL,
  `ConsulatantID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `md_stock`
--

CREATE TABLE `md_stock` (
  `MedicineStockID` int(11) NOT NULL,
  `MedicineNameID` int(11) NOT NULL,
  `Quantity` double NOT NULL,
  `Date` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_stock`
--

INSERT INTO `md_stock` (`MedicineStockID`, `MedicineNameID`, `Quantity`, `Date`) VALUES
(105, 1044, -2970, 1488649092),
(106, 1068, -116269, 1488649092),
(107, 1057, -73490, 1490448138),
(108, 1032, -53988, 1490448138),
(109, 1079, -34639, 1490449208),
(110, 1046, -73169, 1490449208),
(111, 1042, -829, 1490450479),
(112, 1232, -17, 1491033055),
(113, 1103, -608, 1491033055),
(114, 1100, -364, 1491033056),
(115, 1026, -18305, 1491033521),
(116, 1070, -53183.75, 1491033521),
(117, 1043, -593, 1491033636),
(118, 1059, -25371, 1491033953),
(119, 1051, -73731, 1491034193),
(120, 1040, -73755, 1491034585),
(121, 1054, -9225, 1491034851),
(122, 1061, -98543, 1491036843),
(123, 1096, -724, 1491037558),
(124, 1067, -42094, 1491037558),
(125, 1077, -2178, 1491038723),
(126, 1045, -30997, 1491038723),
(127, 1041, -769, 1491039301),
(128, 1080, -42442, 1491040289),
(129, 1088, -546, 1491040289),
(130, 1031, -41655, 1491041091),
(131, 1050, -19121, 1491042252),
(132, 1069, -850, 1491045066),
(133, 1035, -29966.5, 1491046440),
(134, 1030, -2980, 1491047599),
(135, 1094, -734, 1491052086),
(136, 1060, -2248.5, 1491052386),
(137, 1039, -6671, 1491052854),
(138, 1113, -409.6, 1491053125),
(139, 1097, -157, 1491053607),
(140, 1053, -14094, 1491056611),
(141, 1085, -724.2, 1491117023),
(142, 1073, -5899, 1491117529),
(143, 1029, -7521, 1491117955),
(144, 1095, -260, 1491120737),
(145, 878, -6781, 1491120737),
(146, 1076, -13249, 1491120802),
(147, 1062, -8393, 1491126412),
(148, 1081, -7892, 1491126544),
(149, 1075, -3150, 1491144569),
(150, 1048, -42332, 1491207969),
(151, 1110, -81, 1491211835),
(152, 1101, -22, 1491213076),
(153, 1089, -205, 1491216576),
(154, 1074, -798.5, 1491216921),
(155, 1083, -282, 1491216921),
(156, 1066, -2802, 1491217723),
(157, 1037, -5278, 1491217805),
(158, 1055, -5407, 1491217805),
(159, 1049, -13467, 1491218819),
(160, 1065, -10409, 1491218820),
(161, 1082, -8481, 1491218964),
(162, 1102, -139, 1491218964),
(163, 1091, -1156, 1491220244),
(164, 1084, -16, 1491222171),
(165, 1072, -1869, 1491222555),
(166, 1058, -20890, 1491293213),
(167, 1064, -959, 1491298386),
(168, 1033, -416, 1491302694),
(169, 1114, -780, 1491307954),
(170, 1122, -404, 1491309723),
(171, 1128, -387, 1491309723),
(172, 1125, -376, 1491309724),
(173, 1119, -178.55000000000027, 1491309724),
(174, 1239, -9622, 1491383577),
(175, 1109, -39, 1491386913),
(176, 1052, -1001, 1491474044),
(177, 1056, -145, 1491485554),
(178, 1047, -169, 1491549680),
(179, 1090, -107, 1491644257),
(180, 1123, -7, 1491644432),
(181, 1098, -85, 1491726659),
(182, 1242, -5637.5, 1491823545),
(183, 1244, -14624, 1491826656),
(184, 1127, -16.799999999999976, 1491897879),
(185, 1108, -189, 1491922158),
(186, 1115, -73, 1491922158),
(187, 1107, -32, 1491980497),
(188, 1121, -198, 1491988443),
(189, 1116, -203, 1491988855),
(190, 1027, -3537, 1491995956),
(191, 1174, -94, 1492175415),
(192, 1243, -715, 1492247125),
(193, 1112, -22, 1492346205),
(194, 1028, -86, 1492418886),
(195, 1235, -377, 1492509563),
(196, 1240, -33, 1492584356),
(197, 1117, -4, 1492696975),
(198, 1245, -3, 1493125300),
(199, 1238, -330, 1493219726),
(200, 1071, -272, 1493376573),
(201, 1086, -19, 1493549318),
(202, 1099, -24, 1493641434),
(203, 1246, -411, 1493731763),
(204, 1106, -19, 1494340702),
(205, 1249, -1181, 1494412254),
(206, 1087, -27, 1494671541),
(207, 1034, -271, 1494844089),
(208, 1124, -10, 1494846127),
(209, 1118, -19, 1494846885),
(210, 1038, -2735, 1496309530),
(211, 1092, -19, 1496660428),
(212, 1258, -801, 1496845202),
(213, 1111, -85, 1499328551),
(214, 1250, -24, 1500889709),
(215, 1254, -61, 1504101642),
(216, 1063, -92, 1505470958),
(217, 1078, -40, 1507801195),
(218, 1252, -2205, 1515417143),
(219, 1237, -180, 1515586103),
(220, 1259, -4080, 1515672965),
(221, 1251, -3016, 1515938109),
(222, 1036, -214, 1517658196),
(223, 1253, -447, 1518092574),
(224, 1261, -265, 1527685534),
(225, 1255, -15, 1528633492),
(226, 1256, -1, 1533549503),
(227, 1264, -7, 1533815779);

-- --------------------------------------------------------

--
-- Table structure for table `md_stock_records`
--

CREATE TABLE `md_stock_records` (
  `StockRecordsID` int(11) NOT NULL,
  `MedicineStockID` int(11) NOT NULL,
  `Operation` varchar(255) NOT NULL,
  `StockLevel` double NOT NULL,
  `Quantity` double NOT NULL,
  `Date` double NOT NULL,
  `UserID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_stock_records`
--

INSERT INTO `md_stock_records` (`StockRecordsID`, `MedicineStockID`, `Operation`, `StockLevel`, `Quantity`, `Date`, `UserID`, `Status`) VALUES
(1, 117, 'DISTRIBUTION', -591, 1, 1532800661, 19, 1),
(2, 115, 'DISTRIBUTION', -17856, 12, 1532800661, 19, 1),
(3, 115, 'RESTORE', -17868, 12, 1532800703, 19, 1),
(4, 115, 'DISTRIBUTION', -17856, 12, 1532800703, 19, 1),
(5, 117, 'RESTORE', -592, 1, 1532800704, 19, 1),
(6, 117, 'DISTRIBUTION', -591, 1, 1532800704, 19, 1),
(7, 115, 'RESTORE', -17868, 12, 1532800742, 19, 1),
(8, 115, 'DISTRIBUTION', -17856, 12, 1532800743, 19, 1),
(9, 117, 'RESTORE', -592, 1, 1532800743, 19, 1),
(10, 117, 'DISTRIBUTION', -591, 1, 1532800743, 19, 1),
(11, 115, 'RESTORE', -17868, 12, 1532800822, 19, 1),
(12, 115, 'DISTRIBUTION', -17856, 12, 1532800822, 19, 1),
(13, 117, 'RESTORE', -592, 1, 1532800822, 19, 1),
(14, 117, 'DISTRIBUTION', -591, 1, 1532800822, 19, 1),
(15, 124, 'DISTRIBUTION', -42038, 20, 1533028170, 1, 1),
(16, 114, 'DISTRIBUTION', -361, 1, 1533028170, 1, 1),
(17, 161, 'DISTRIBUTION', -8390, 20, 1533028170, 1, 1),
(18, 130, 'DISTRIBUTION', -41212, 36, 1533028635, 1, 1),
(19, 106, 'DISTRIBUTION', -115278, 9, 1533028635, 1, 1),
(20, 166, 'DISTRIBUTION', -19827, 21, 1533029011, 1, 1),
(21, 128, 'DISTRIBUTION', -41154, 30, 1533029011, 1, 1),
(22, 124, 'RESTORE', -42058, 20, 1533029185, 1, 1),
(23, 124, 'DISTRIBUTION', -42038, 20, 1533029186, 1, 1),
(24, 161, 'RESTORE', -8410, 20, 1533029186, 1, 1),
(25, 161, 'DISTRIBUTION', -8390, 20, 1533029186, 1, 1),
(26, 114, 'RESTORE', -362, 1, 1533029186, 1, 1),
(27, 114, 'DISTRIBUTION', -361, 1, 1533029186, 1, 1),
(28, 119, 'DISTRIBUTION', -73681, 30, 1533030235, 1, 1),
(29, 118, 'DISTRIBUTION', -25155, 1, 1533030235, 1, 1),
(30, 119, 'RESTORE', -73711, 30, 1533030349, 1, 1),
(31, 119, 'DISTRIBUTION', -73681, 30, 1533030350, 1, 1),
(32, 118, 'RESTORE', -25156, 1, 1533030350, 1, 1),
(33, 118, 'DISTRIBUTION', -25155, 1, 1533030350, 1, 1),
(34, 119, 'RESTORE', -73711, 30, 1533030375, 1, 1),
(35, 119, 'DISTRIBUTION', -73681, 30, 1533030376, 1, 1),
(36, 118, 'RESTORE', -25156, 1, 1533030376, 1, 1),
(37, 118, 'DISTRIBUTION', -25155, 1, 1533030376, 1, 1),
(38, 130, 'RESTORE', -41248, 36, 1533030606, 1, 1),
(39, 130, 'DISTRIBUTION', -41212, 36, 1533030606, 1, 1),
(40, 106, 'RESTORE', -115287, 9, 1533030606, 1, 1),
(41, 106, 'DISTRIBUTION', -115278, 9, 1533030606, 1, 1),
(42, 166, 'DISTRIBUTION', -19848, 30, 1533044955, 1, 1),
(43, 130, 'DISTRIBUTION', -41248, 30, 1533044955, 1, 1),
(44, 167, 'DISTRIBUTION', -902, 21, 1533044955, 1, 1),
(45, 117, 'DISTRIBUTION', -592, 1, 1533046210, 1, 1),
(46, 130, 'RESTORE', -41278, 30, 1533046210, 1, 1),
(47, 130, 'DISTRIBUTION', -41248, 30, 1533046210, 1, 1),
(48, 166, 'RESTORE', -19878, 30, 1533046210, 1, 1),
(49, 166, 'DISTRIBUTION', -19848, 30, 1533046210, 1, 1),
(50, 167, 'RESTORE', -923, 21, 1533046210, 1, 1),
(51, 167, 'DISTRIBUTION', -902, 21, 1533046210, 1, 1),
(52, 161, 'RESTORE', -8410, 30, 1533056383, 1, 1),
(53, 161, 'DISTRIBUTION', -8380, 1, 1533056383, 1, 1),
(54, 117, 'RESTORE', -593, 1, 1533056383, 1, 1),
(55, 117, 'DISTRIBUTION', -592, 1, 1533056383, 1, 1),
(56, 166, 'RESTORE', -19878, 30, 1533056384, 1, 1),
(57, 166, 'DISTRIBUTION', -19848, 30, 1533056384, 1, 1),
(58, 167, 'RESTORE', -923, 21, 1533056384, 1, 1),
(59, 167, 'DISTRIBUTION', -902, 21, 1533056384, 1, 1),
(60, 166, 'DISTRIBUTION', -19878, 30, 1533110981, 30, 1),
(61, 178, 'DISTRIBUTION', -154, 10, 1533111418, 30, 1),
(62, 106, 'DISTRIBUTION', -115287, 9, 1533111418, 30, 1),
(63, 142, 'DISTRIBUTION', -5681, 10, 1533111792, 1, 1),
(64, 106, 'DISTRIBUTION', -115296, 9, 1533111792, 1, 1),
(65, 131, 'DISTRIBUTION', -18208, 30, 1533111878, 30, 1),
(66, 115, 'DISTRIBUTION', -17868, 9, 1533111878, 30, 1),
(67, 142, 'DISTRIBUTION', -5691, 10, 1533112028, 30, 1),
(68, 142, 'DISTRIBUTION', -5701, 15, 1533112174, 1, 1),
(69, 166, 'DISTRIBUTION', -19908, 30, 1533112174, 1, 1),
(70, 163, 'DISTRIBUTION', -1138, 1, 1533112175, 1, 1),
(71, 166, 'DISTRIBUTION', -19938, 30, 1533113338, 30, 1),
(72, 110, 'DISTRIBUTION', -72329, 20, 1533116089, 30, 1),
(73, 106, 'DISTRIBUTION', -115305, 9, 1533116089, 30, 1),
(74, 142, 'DISTRIBUTION', -5716, 15, 1533116089, 30, 1),
(75, 110, 'RESTORE', -72349, 20, 1533116150, 30, 1),
(76, 110, 'DISTRIBUTION', -72329, 20, 1533116151, 30, 1),
(77, 106, 'RESTORE', -115314, 9, 1533116151, 30, 1),
(78, 106, 'DISTRIBUTION', -115305, 9, 1533116151, 30, 1),
(79, 142, 'RESTORE', -5731, 15, 1533116151, 30, 1),
(80, 142, 'DISTRIBUTION', -5716, 15, 1533116151, 30, 1),
(81, 132, 'DISTRIBUTION', -812, 4, 1533116846, 30, 1),
(82, 135, 'DISTRIBUTION', -710, 1, 1533116846, 30, 1),
(83, 169, 'DISTRIBUTION', -766, 1, 1533116846, 30, 1),
(84, 178, 'RESTORE', -164, 10, 1533117451, 1, 1),
(85, 178, 'DISTRIBUTION', -154, 10, 1533117451, 1, 1),
(86, 106, 'RESTORE', -115314, 9, 1533117452, 1, 1),
(87, 106, 'DISTRIBUTION', -115305, 9, 1533117452, 1, 1),
(88, 131, 'DISTRIBUTION', -18238, 15, 1533120205, 30, 1),
(89, 106, 'DISTRIBUTION', -115314, 9, 1533120205, 30, 1),
(90, 135, 'DISTRIBUTION', -711, 1, 1533120961, 30, 1),
(91, 124, 'DISTRIBUTION', -42058, 18, 1533120961, 30, 1),
(92, 118, 'DISTRIBUTION', -25156, 6, 1533120961, 30, 1),
(93, 126, 'DISTRIBUTION', -30917, 20, 1533121368, 30, 1),
(94, 106, 'DISTRIBUTION', -115323, 9, 1533121368, 30, 1),
(95, 118, 'DISTRIBUTION', -25162, 6, 1533121368, 30, 1),
(96, 114, 'DISTRIBUTION', -362, 1, 1533121368, 30, 1),
(97, 110, 'DISTRIBUTION', -72349, 20, 1533121515, 30, 1),
(98, 115, 'DISTRIBUTION', -17877, 9, 1533121515, 30, 1),
(99, 161, 'DISTRIBUTION', -8381, 20, 1533127904, 30, 1),
(100, 118, 'DISTRIBUTION', -25168, 6, 1533127904, 30, 1),
(101, 125, 'DISTRIBUTION', -2168, 4, 1533127904, 30, 1),
(102, 118, 'RESTORE', -25174, 6, 1533128044, 30, 1),
(103, 118, 'DISTRIBUTION', -25168, 6, 1533128044, 30, 1),
(104, 125, 'RESTORE', -2172, 4, 1533128044, 30, 1),
(105, 125, 'DISTRIBUTION', -2168, 4, 1533128044, 30, 1),
(106, 161, 'RESTORE', -8401, 20, 1533128044, 30, 1),
(107, 161, 'DISTRIBUTION', -8381, 20, 1533128045, 30, 1),
(108, 150, 'DISTRIBUTION', -41881, 30, 1533127593, 1, 1),
(109, 166, 'DISTRIBUTION', -19968, 30, 1533128016, 1, 1),
(110, 128, 'DISTRIBUTION', -41184, 30, 1533128016, 1, 1),
(111, 137, 'DISTRIBUTION', -6543, 10, 1533128017, 1, 1),
(112, 166, 'DISTRIBUTION', -19998, 30, 1533128034, 1, 1),
(113, 128, 'DISTRIBUTION', -41214, 30, 1533128034, 1, 1),
(114, 137, 'DISTRIBUTION', -6553, 10, 1533128035, 1, 1),
(115, 114, 'DISTRIBUTION', -363, 1, 1533129776, 30, 1),
(116, 135, 'DISTRIBUTION', -712, 1, 1533129776, 30, 1),
(117, 181, 'DISTRIBUTION', -71, 1, 1533129777, 30, 1),
(118, 181, 'DISTRIBUTION', -72, 1, 1533130088, 30, 1),
(119, 135, 'DISTRIBUTION', -713, 1, 1533130088, 30, 1),
(120, 110, 'DISTRIBUTION', -72369, 30, 1533131894, 30, 1),
(121, 157, 'DISTRIBUTION', -5228, 30, 1533131895, 30, 1),
(122, 158, 'DISTRIBUTION', -5143, 6, 1533131895, 30, 1),
(123, 166, 'DISTRIBUTION', -20028, 30, 1533132226, 30, 1),
(124, 106, 'DISTRIBUTION', -115332, 9, 1533132227, 30, 1),
(125, 166, 'DISTRIBUTION', -20058, 30, 1533132797, 30, 1),
(126, 205, 'DISTRIBUTION', -1131, 30, 1533132797, 30, 1),
(127, 194, 'DISTRIBUTION', -47, 3, 1533132797, 30, 1),
(128, 222, 'DISTRIBUTION', -80, 30, 1533133318, 30, 1),
(129, 158, 'DISTRIBUTION', -5149, 3, 1533133318, 30, 1),
(130, 131, 'DISTRIBUTION', -18253, 30, 1533189403, 1, 1),
(131, 106, 'DISTRIBUTION', -115341, 12, 1533189404, 1, 1),
(132, 158, 'DISTRIBUTION', -5152, 15, 1533191826, 1, 1),
(133, 166, 'DISTRIBUTION', -20088, 15, 1533191827, 1, 1),
(134, 128, 'DISTRIBUTION', -41244, 30, 1533192222, 1, 1),
(135, 115, 'DISTRIBUTION', -17886, 15, 1533192222, 1, 1),
(136, 128, 'DISTRIBUTION', -41274, 21, 1533192606, 1, 1),
(137, 131, 'DISTRIBUTION', -18283, 30, 1533192606, 1, 1),
(138, 106, 'DISTRIBUTION', -115353, 30, 1533192606, 1, 1),
(139, 131, 'DISTRIBUTION', -18313, 15, 1533194929, 1, 1),
(140, 106, 'DISTRIBUTION', -115383, 8, 1533194929, 1, 1),
(141, 118, 'DISTRIBUTION', -25174, 6, 1533195134, 1, 1),
(142, 106, 'DISTRIBUTION', -115391, 6, 1533195134, 1, 1),
(143, 126, 'DISTRIBUTION', -30937, 20, 1533195135, 1, 1),
(144, 118, 'DISTRIBUTION', -25180, 6, 1533195973, 1, 1),
(145, 126, 'DISTRIBUTION', -30957, 20, 1533195974, 1, 1),
(146, 136, 'DISTRIBUTION', -2217.5, 3, 1533195974, 1, 1),
(147, 106, 'DISTRIBUTION', -115397, 9, 1533195974, 1, 1),
(148, 131, 'DISTRIBUTION', -18328, 30, 1533196417, 1, 1),
(149, 106, 'DISTRIBUTION', -115406, 12, 1533196418, 1, 1),
(150, 118, 'DISTRIBUTION', -25186, 6, 1533196418, 1, 1),
(151, 222, 'DISTRIBUTION', -110, 28, 1533196790, 1, 1),
(152, 158, 'DISTRIBUTION', -5167, 15, 1533196790, 1, 1),
(153, 146, 'DISTRIBUTION', -13099, 90, 1533196790, 1, 1),
(154, 142, 'DISTRIBUTION', -5731, 15, 1533196791, 1, 1),
(155, 106, 'DISTRIBUTION', -115418, 9, 1533197459, 1, 1),
(156, 122, 'DISTRIBUTION', -98353, 30, 1533199124, 1, 1),
(157, 125, 'DISTRIBUTION', -2172, 3, 1533199124, 1, 1),
(158, 131, 'DISTRIBUTION', -18358, 15, 1533200290, 1, 1),
(159, 115, 'DISTRIBUTION', -17901, 8, 1533200290, 1, 1),
(160, 131, 'DISTRIBUTION', -18373, 30, 1533202607, 1, 1),
(161, 150, 'DISTRIBUTION', -41911, 15, 1533202607, 1, 1),
(162, 106, 'DISTRIBUTION', -115427, 30, 1533202607, 1, 1),
(163, 118, 'DISTRIBUTION', -25192, 6, 1533203839, 1, 1),
(164, 181, 'DISTRIBUTION', -73, 1, 1533203839, 1, 1),
(165, 135, 'DISTRIBUTION', -714, 1, 1533203839, 1, 1),
(166, 202, 'DISTRIBUTION', -18, 1, 1533205287, 1, 1),
(167, 106, 'DISTRIBUTION', -115457, 5, 1533205287, 1, 1),
(168, 128, 'DISTRIBUTION', -41295, 21, 1533205576, 1, 1),
(169, 106, 'DISTRIBUTION', -115462, 15, 1533205576, 1, 1),
(170, 194, 'DISTRIBUTION', -50, 3, 1533205577, 1, 1),
(171, 110, 'DISTRIBUTION', -72399, 20, 1533205745, 1, 1),
(172, 167, 'DISTRIBUTION', -923, 21, 1533205745, 1, 1),
(173, 106, 'DISTRIBUTION', -115477, 9, 1533205745, 1, 1),
(174, 118, 'DISTRIBUTION', -25198, 6, 1533205889, 1, 1),
(175, 131, 'DISTRIBUTION', -18403, 15, 1533205889, 1, 1),
(176, 106, 'DISTRIBUTION', -115486, 6, 1533205889, 1, 1),
(177, 166, 'DISTRIBUTION', -20103, 30, 1533210174, 1, 1),
(178, 142, 'DISTRIBUTION', -5746, 15, 1533210174, 1, 1),
(179, 178, 'DISTRIBUTION', -164, 5, 1533210175, 1, 1),
(180, 178, 'RESTORE', -169, 5, 1533210941, 1, 1),
(181, 178, 'DISTRIBUTION', -164, 5, 1533210941, 1, 1),
(182, 166, 'RESTORE', -20133, 30, 1533210941, 1, 1),
(183, 166, 'DISTRIBUTION', -20103, 30, 1533210941, 1, 1),
(184, 142, 'RESTORE', -5761, 15, 1533210942, 1, 1),
(185, 142, 'DISTRIBUTION', -5746, 15, 1533210942, 1, 1),
(186, 178, 'RESTORE', -169, 5, 1533210994, 1, 1),
(187, 178, 'DISTRIBUTION', -164, 5, 1533210994, 1, 1),
(188, 166, 'RESTORE', -20133, 30, 1533210995, 1, 1),
(189, 166, 'DISTRIBUTION', -20103, 30, 1533210995, 1, 1),
(190, 142, 'RESTORE', -5761, 15, 1533210995, 1, 1),
(191, 142, 'DISTRIBUTION', -5746, 15, 1533210995, 1, 1),
(192, 110, 'DISTRIBUTION', -72419, 20, 1533211439, 1, 1),
(193, 194, 'DISTRIBUTION', -53, 1, 1533211439, 1, 1),
(194, 106, 'DISTRIBUTION', -115492, 9, 1533211439, 1, 1),
(195, 136, 'DISTRIBUTION', -2220.5, 6, 1533211713, 1, 1),
(196, 106, 'DISTRIBUTION', -115501, 9, 1533211713, 1, 1),
(197, 110, 'DISTRIBUTION', -72439, 30, 1533211714, 1, 1),
(198, 110, 'DISTRIBUTION', -72469, 10, 1533213297, 1, 1),
(199, 106, 'DISTRIBUTION', -115510, 6, 1533213297, 1, 1),
(200, 118, 'DISTRIBUTION', -25204, 6, 1533213297, 1, 1),
(201, 158, 'DISTRIBUTION', -5182, 15, 1533213575, 1, 1),
(202, 222, 'DISTRIBUTION', -138, 28, 1533213575, 1, 1),
(203, 121, 'DISTRIBUTION', -8970, 21, 1533213576, 1, 1),
(204, 131, 'DISTRIBUTION', -18418, 30, 1533213591, 1, 1),
(205, 106, 'DISTRIBUTION', -115516, 9, 1533213592, 1, 1),
(206, 158, 'DISTRIBUTION', -5197, 15, 1533213594, 1, 1),
(207, 222, 'DISTRIBUTION', -166, 28, 1533213594, 1, 1),
(208, 121, 'DISTRIBUTION', -8991, 21, 1533213595, 1, 1),
(209, 166, 'DISTRIBUTION', -20133, 30, 1533214225, 1, 1),
(210, 128, 'DISTRIBUTION', -41316, 15, 1533214225, 1, 1),
(211, 131, 'DISTRIBUTION', -18448, 10, 1533214681, 1, 1),
(212, 106, 'DISTRIBUTION', -115525, 6, 1533214681, 1, 1),
(213, 142, 'DISTRIBUTION', -5761, 3, 1533214681, 1, 1),
(214, 110, 'DISTRIBUTION', -72479, 10, 1533214758, 1, 1),
(215, 106, 'DISTRIBUTION', -115531, 9, 1533214759, 1, 1),
(216, 110, 'DISTRIBUTION', -72489, 20, 1533216471, 1, 1),
(217, 106, 'DISTRIBUTION', -115540, 9, 1533216472, 1, 1),
(218, 142, 'DISTRIBUTION', -5764, 30, 1533216472, 1, 1),
(219, 131, 'DISTRIBUTION', -18458, 30, 1533217954, 1, 1),
(220, 106, 'DISTRIBUTION', -115549, 9, 1533217954, 1, 1),
(221, 202, 'DISTRIBUTION', -19, 1, 1533217954, 1, 1),
(222, 138, 'DISTRIBUTION', -395.6, 1, 1533218609, 1, 1),
(223, 150, 'DISTRIBUTION', -41926, 30, 1533218609, 1, 1),
(224, 128, 'DISTRIBUTION', -41331, 30, 1533218610, 1, 1),
(225, 115, 'DISTRIBUTION', -17909, 15, 1533530725, 1, 1),
(226, 128, 'DISTRIBUTION', -41361, 30, 1533530725, 1, 1),
(227, 143, 'DISTRIBUTION', -7383, 30, 1533530725, 1, 1),
(228, 120, 'DISTRIBUTION', -73323, 30, 1533531223, 1, 1),
(229, 106, 'DISTRIBUTION', -115558, 24, 1533531223, 1, 1),
(230, 126, 'DISTRIBUTION', -30977, 20, 1533532153, 1, 1),
(231, 106, 'DISTRIBUTION', -115582, 6, 1533532153, 1, 1),
(232, 202, 'DISTRIBUTION', -20, 1, 1533532153, 1, 1),
(233, 128, 'DISTRIBUTION', -41391, 30, 1533536968, 1, 1),
(234, 166, 'DISTRIBUTION', -20163, 21, 1533536968, 1, 1),
(235, 194, 'DISTRIBUTION', -54, 1, 1533536969, 1, 1),
(236, 138, 'DISTRIBUTION', -396.6, 3, 1533537356, 1, 1),
(237, 142, 'DISTRIBUTION', -5794, 45, 1533537356, 1, 1),
(238, 118, 'DISTRIBUTION', -25210, 6, 1533545415, 1, 1),
(239, 150, 'DISTRIBUTION', -41956, 15, 1533545415, 1, 1),
(240, 128, 'DISTRIBUTION', -41421, 30, 1533545415, 1, 1),
(241, 118, 'DISTRIBUTION', -25216, 6, 1533545641, 1, 1),
(242, 210, 'DISTRIBUTION', -2679, 10, 1533545641, 1, 1),
(243, 106, 'DISTRIBUTION', -115588, 15, 1533545641, 1, 1),
(244, 118, 'DISTRIBUTION', -25222, 6, 1533545906, 1, 1),
(245, 115, 'DISTRIBUTION', -17924, 15, 1533545906, 1, 1),
(246, 128, 'DISTRIBUTION', -41451, 30, 1533545906, 1, 1),
(247, 159, 'DISTRIBUTION', -13411, 14, 1533545906, 1, 1),
(248, 131, 'DISTRIBUTION', -18488, 30, 1533546010, 1, 1),
(249, 115, 'DISTRIBUTION', -17939, 12, 1533546011, 1, 1),
(250, 131, 'DISTRIBUTION', -18518, 30, 1533546150, 1, 1),
(251, 115, 'DISTRIBUTION', -17951, 9, 1533546150, 1, 1),
(252, 120, 'DISTRIBUTION', -73353, 42, 1533548529, 1, 1),
(253, 107, 'DISTRIBUTION', -73206, 24, 1533548529, 1, 1),
(254, 166, 'DISTRIBUTION', -20184, 15, 1533548703, 1, 1),
(255, 194, 'DISTRIBUTION', -55, 3, 1533548704, 1, 1),
(256, 136, 'DISTRIBUTION', -2226.5, 9, 1533548704, 1, 1),
(257, 118, 'DISTRIBUTION', -25228, 6, 1533548861, 1, 1),
(258, 110, 'DISTRIBUTION', -72509, 20, 1533549033, 1, 1),
(259, 195, 'DISTRIBUTION', -85, 10, 1533549223, 1, 1),
(260, 110, 'DISTRIBUTION', -72529, 20, 1533549223, 1, 1),
(261, 118, 'DISTRIBUTION', -25234, 6, 1533549403, 1, 1),
(262, 128, 'DISTRIBUTION', -41481, 21, 1533549403, 1, 1),
(263, 166, 'DISTRIBUTION', -20199, 15, 1533549403, 1, 1),
(264, 226, 'DISTRIBUTION', 0, 1, 1533549503, 1, 1),
(265, 106, 'DISTRIBUTION', -115603, 15, 1533549503, 1, 1),
(266, 118, 'DISTRIBUTION', -25240, 6, 1533550117, 1, 1),
(267, 128, 'DISTRIBUTION', -41502, 30, 1533550118, 1, 1),
(268, 158, 'DISTRIBUTION', -5212, 15, 1533550275, 1, 1),
(269, 159, 'DISTRIBUTION', -13425, 14, 1533550275, 1, 1),
(270, 166, 'RESTORE', -20214, 15, 1533550423, 1, 1),
(271, 166, 'DISTRIBUTION', -20199, 15, 1533550423, 1, 1),
(272, 118, 'RESTORE', -25246, 6, 1533550423, 1, 1),
(273, 118, 'DISTRIBUTION', -25240, 6, 1533550423, 1, 1),
(274, 128, 'RESTORE', -41532, 21, 1533550423, 1, 1),
(275, 128, 'DISTRIBUTION', -41511, 21, 1533550423, 1, 1),
(276, 150, 'DISTRIBUTION', -41971, 30, 1533550431, 1, 1),
(277, 128, 'DISTRIBUTION', -41532, 30, 1533550431, 1, 1),
(278, 138, 'DISTRIBUTION', -399.6, 1, 1533550432, 1, 1),
(279, 150, 'RESTORE', -42001, 30, 1533550526, 1, 1),
(280, 150, 'DISTRIBUTION', -41971, 30, 1533550526, 1, 1),
(281, 128, 'RESTORE', -41562, 30, 1533550526, 1, 1),
(282, 128, 'DISTRIBUTION', -41532, 30, 1533550526, 1, 1),
(283, 138, 'RESTORE', -400.6, 1, 1533550526, 1, 1),
(284, 138, 'DISTRIBUTION', -399.6, 1, 1533550526, 1, 1),
(285, 150, 'RESTORE', -42001, 30, 1533550649, 1, 1),
(286, 150, 'DISTRIBUTION', -41971, 30, 1533550649, 1, 1),
(287, 128, 'RESTORE', -41562, 30, 1533550649, 1, 1),
(288, 128, 'DISTRIBUTION', -41532, 30, 1533550649, 1, 1),
(289, 138, 'RESTORE', -400.6, 1, 1533550649, 1, 1),
(290, 138, 'DISTRIBUTION', -399.6, 1, 1533550649, 1, 1),
(291, 123, 'DISTRIBUTION', -715, 1, 1533560884, 1, 1),
(292, 118, 'DISTRIBUTION', -25246, 6, 1533560884, 1, 1),
(293, 163, 'DISTRIBUTION', -1139, 1, 1533560885, 1, 1),
(294, 138, 'DISTRIBUTION', -400.6, 3, 1533616845, 1, 1),
(295, 131, 'DISTRIBUTION', -18548, 30, 1533616845, 1, 1),
(296, 144, 'DISTRIBUTION', -256, 2, 1533617114, 1, 1),
(297, 181, 'DISTRIBUTION', -74, 2, 1533617114, 1, 1),
(298, 131, 'DISTRIBUTION', -18578, 24, 1533617705, 1, 1),
(299, 106, 'DISTRIBUTION', -115618, 12, 1533617705, 1, 1),
(300, 195, 'DISTRIBUTION', -95, 30, 1533618115, 1, 1),
(301, 106, 'DISTRIBUTION', -115630, 12, 1533618116, 1, 1),
(302, 106, 'DISTRIBUTION', -115642, 15, 1533623998, 1, 1),
(303, 128, 'DISTRIBUTION', -41562, 30, 1533623998, 1, 1),
(304, 131, 'DISTRIBUTION', -18602, 30, 1533624647, 1, 1),
(305, 136, 'DISTRIBUTION', -2235.5, 1, 1533624647, 1, 1),
(306, 118, 'DISTRIBUTION', -25252, 6, 1533624648, 1, 1),
(307, 110, 'DISTRIBUTION', -72549, 20, 1533626016, 1, 1),
(308, 115, 'DISTRIBUTION', -17960, 9, 1533626016, 1, 1),
(309, 163, 'DISTRIBUTION', -1140, 1, 1533626755, 1, 1),
(310, 135, 'DISTRIBUTION', -715, 1, 1533626980, 1, 1),
(311, 113, 'DISTRIBUTION', -593, 1, 1533626980, 1, 1),
(312, 163, 'DISTRIBUTION', -1141, 1, 1533626980, 1, 1),
(313, 110, 'DISTRIBUTION', -72569, 20, 1533629694, 1, 1),
(314, 115, 'DISTRIBUTION', -17969, 9, 1533629695, 1, 1),
(315, 118, 'DISTRIBUTION', -25258, 6, 1533629695, 1, 1),
(316, 131, 'DISTRIBUTION', -18632, 30, 1533629908, 1, 1),
(317, 107, 'DISTRIBUTION', -73230, 20, 1533629908, 1, 1),
(318, 106, 'DISTRIBUTION', -115657, 9, 1533632510, 1, 1),
(319, 110, 'DISTRIBUTION', -72589, 40, 1533632678, 1, 1),
(320, 106, 'DISTRIBUTION', -115666, 9, 1533632678, 1, 1),
(321, 131, 'DISTRIBUTION', -18662, 42, 1533632690, 1, 1),
(322, 115, 'DISTRIBUTION', -17978, 9, 1533632690, 1, 1),
(323, 115, 'RESTORE', -17987, 9, 1533633168, 1, 1),
(324, 115, 'DISTRIBUTION', -17978, 9, 1533633169, 1, 1),
(325, 131, 'RESTORE', -18704, 42, 1533633169, 1, 1),
(326, 131, 'DISTRIBUTION', -18662, 42, 1533633169, 1, 1),
(327, 166, 'DISTRIBUTION', -20214, 15, 1533633779, 1, 1),
(328, 121, 'DISTRIBUTION', -9012, 15, 1533633779, 1, 1),
(329, 106, 'DISTRIBUTION', -115675, 9, 1533633779, 1, 1),
(330, 110, 'DISTRIBUTION', -72629, 20, 1533634886, 30, 1),
(331, 115, 'DISTRIBUTION', -17987, 3, 1533634886, 30, 1),
(332, 110, 'DISTRIBUTION', -72649, 40, 1533635120, 1, 1),
(333, 194, 'DISTRIBUTION', -58, 4, 1533635120, 1, 1),
(334, 106, 'DISTRIBUTION', -115684, 9, 1533635121, 1, 1),
(335, 150, 'DISTRIBUTION', -42001, 30, 1533636741, 1, 1),
(336, 128, 'DISTRIBUTION', -41592, 30, 1533636741, 1, 1),
(337, 143, 'DISTRIBUTION', -7413, 30, 1533637190, 1, 1),
(338, 146, 'DISTRIBUTION', -13189, 30, 1533637190, 1, 1),
(339, 142, 'DISTRIBUTION', -5839, 30, 1533637190, 1, 1),
(340, 223, 'DISTRIBUTION', -435, 12, 1533637595, 1, 1),
(341, 131, 'DISTRIBUTION', -18704, 30, 1533637595, 1, 1),
(342, 115, 'DISTRIBUTION', -17990, 9, 1533637919, 1, 1),
(343, 131, 'DISTRIBUTION', -18734, 12, 1533639340, 30, 1),
(344, 210, 'DISTRIBUTION', -2689, 6, 1533639340, 30, 1),
(345, 181, 'DISTRIBUTION', -76, 1, 1533639491, 1, 1),
(346, 135, 'DISTRIBUTION', -716, 2, 1533639491, 1, 1),
(347, 108, 'DISTRIBUTION', -52954, 36, 1533639656, 30, 1),
(348, 107, 'DISTRIBUTION', -73250, 20, 1533639656, 30, 1),
(349, 128, 'DISTRIBUTION', -41622, 20, 1533639656, 30, 1),
(350, 131, 'DISTRIBUTION', -18746, 30, 1533642077, 1, 1),
(351, 135, 'DISTRIBUTION', -718, 1, 1533644103, 1, 1),
(352, 113, 'DISTRIBUTION', -594, 1, 1533644104, 1, 1),
(353, 138, 'DISTRIBUTION', -403.6, 3, 1533645378, 1, 1),
(354, 150, 'DISTRIBUTION', -42031, 30, 1533645378, 1, 1),
(355, 128, 'DISTRIBUTION', -41642, 30, 1533645378, 1, 1),
(356, 224, 'DISTRIBUTION', -165, 20, 1533645785, 30, 1),
(357, 121, 'DISTRIBUTION', -9027, 18, 1533645785, 30, 1),
(358, 130, 'DISTRIBUTION', -41278, 30, 1533645972, 30, 1),
(359, 115, 'DISTRIBUTION', -17999, 9, 1533645972, 30, 1),
(360, 121, 'DISTRIBUTION', -9045, 15, 1533646191, 1, 1),
(361, 106, 'DISTRIBUTION', -115693, 9, 1533646191, 1, 1),
(362, 158, 'DISTRIBUTION', -5227, 15, 1533646191, 1, 1),
(363, 108, 'DISTRIBUTION', -52990, 21, 1533647584, 30, 1),
(364, 195, 'DISTRIBUTION', -125, 30, 1533647584, 30, 1),
(365, 118, 'DISTRIBUTION', -25264, 5, 1533647584, 30, 1),
(366, 166, 'DISTRIBUTION', -20229, 15, 1533647777, 1, 1),
(367, 128, 'DISTRIBUTION', -41672, 30, 1533647777, 1, 1),
(368, 122, 'DISTRIBUTION', -98383, 30, 1533647777, 1, 1),
(369, 108, 'DISTRIBUTION', -53011, 36, 1533647933, 30, 1),
(370, 107, 'DISTRIBUTION', -73270, 20, 1533647934, 30, 1),
(371, 128, 'DISTRIBUTION', -41702, 15, 1533648086, 1, 1),
(372, 113, 'DISTRIBUTION', -595, 1, 1533648453, 1, 1),
(373, 123, 'DISTRIBUTION', -716, 1, 1533648453, 1, 1),
(374, 161, 'DISTRIBUTION', -8401, 20, 1533648453, 1, 1),
(375, 113, 'DISTRIBUTION', -596, 1, 1533648456, 1, 1),
(376, 123, 'DISTRIBUTION', -717, 1, 1533648456, 1, 1),
(377, 161, 'DISTRIBUTION', -8421, 20, 1533648456, 1, 1),
(378, 166, 'DISTRIBUTION', -20244, 20, 1533648526, 30, 1),
(379, 210, 'DISTRIBUTION', -2695, 20, 1533648526, 30, 1),
(380, 128, 'DISTRIBUTION', -41717, 20, 1533648526, 30, 1),
(381, 106, 'DISTRIBUTION', -115702, 15, 1533648717, 1, 1),
(382, 128, 'DISTRIBUTION', -41737, 15, 1533648717, 1, 1),
(383, 131, 'DISTRIBUTION', -18776, 30, 1533648717, 1, 1),
(384, 166, 'DISTRIBUTION', -20264, 15, 1533649171, 1, 1),
(385, 128, 'DISTRIBUTION', -41752, 15, 1533649172, 1, 1),
(386, 118, 'DISTRIBUTION', -25269, 6, 1533649172, 1, 1),
(387, 128, 'DISTRIBUTION', -41767, 20, 1533649397, 30, 1),
(388, 121, 'DISTRIBUTION', -9060, 18, 1533649397, 30, 1),
(389, 106, 'DISTRIBUTION', -115717, 9, 1533649397, 30, 1),
(390, 195, 'DISTRIBUTION', -155, 20, 1533649397, 30, 1),
(391, 106, 'DISTRIBUTION', -115726, 18, 1533649629, 1, 1),
(392, 163, 'DISTRIBUTION', -1142, 1, 1533649629, 1, 1),
(393, 115, 'DISTRIBUTION', -18008, 18, 1533649879, 1, 1),
(394, 131, 'DISTRIBUTION', -18806, 30, 1533649879, 1, 1),
(395, 151, 'DISTRIBUTION', -77, 4, 1533650508, 30, 1),
(396, 169, 'DISTRIBUTION', -767, 4, 1533650508, 30, 1),
(397, 131, 'DISTRIBUTION', -18836, 30, 1533650558, 1, 1),
(398, 106, 'DISTRIBUTION', -115744, 12, 1533650558, 1, 1),
(399, 106, 'DISTRIBUTION', -115756, 9, 1533650996, 1, 1),
(400, 110, 'DISTRIBUTION', -72689, 10, 1533650997, 1, 1),
(401, 146, 'DISTRIBUTION', -13219, 10, 1533650997, 1, 1),
(402, 106, 'DISTRIBUTION', -115765, 9, 1533712306, 1, 1),
(403, 150, 'DISTRIBUTION', -42061, 30, 1533712800, 1, 1),
(404, 131, 'DISTRIBUTION', -18866, 36, 1533712800, 1, 1),
(405, 131, 'DISTRIBUTION', -18902, 30, 1533712876, 1, 1),
(406, 150, 'DISTRIBUTION', -42091, 30, 1533712876, 1, 1),
(407, 131, 'DISTRIBUTION', -18932, 30, 1533713290, 1, 1),
(408, 150, 'DISTRIBUTION', -42121, 20, 1533713290, 1, 1),
(409, 150, 'DISTRIBUTION', -42141, 30, 1533713337, 1, 1),
(410, 128, 'DISTRIBUTION', -41787, 30, 1533713337, 1, 1),
(411, 110, 'DISTRIBUTION', -72699, 40, 1533713723, 1, 1),
(412, 106, 'DISTRIBUTION', -115774, 9, 1533713723, 1, 1),
(413, 115, 'DISTRIBUTION', -18026, 9, 1533713801, 1, 1),
(414, 115, 'DISTRIBUTION', -18035, 9, 1533713813, 1, 1),
(415, 115, 'DISTRIBUTION', -18044, 9, 1533713849, 1, 1),
(416, 115, 'DISTRIBUTION', -18053, 9, 1533713891, 1, 1),
(417, 115, 'DISTRIBUTION', -18062, 9, 1533713898, 1, 1),
(418, 115, 'DISTRIBUTION', -18071, 9, 1533713909, 1, 1),
(419, 115, 'DISTRIBUTION', -18080, 9, 1533713936, 1, 1),
(420, 115, 'RESTORE', -18089, 9, 1533714024, 1, 1),
(421, 115, 'DISTRIBUTION', -18080, 9, 1533714024, 1, 1),
(422, 120, 'RESTORE', -73395, 3, 1533714025, 1, 1),
(423, 120, 'DISTRIBUTION', -73392, 3, 1533714025, 1, 1),
(424, 222, 'DISTRIBUTION', -194, 20, 1533714622, 1, 1),
(425, 158, 'DISTRIBUTION', -5242, 15, 1533714622, 1, 1),
(426, 121, 'DISTRIBUTION', -9078, 15, 1533714623, 1, 1),
(427, 222, 'RESTORE', -214, 20, 1533714653, 1, 1),
(428, 222, 'DISTRIBUTION', -194, 20, 1533714653, 1, 1),
(429, 121, 'RESTORE', -9093, 15, 1533714653, 1, 1),
(430, 121, 'DISTRIBUTION', -9078, 15, 1533714654, 1, 1),
(431, 158, 'RESTORE', -5257, 15, 1533714654, 1, 1),
(432, 158, 'DISTRIBUTION', -5242, 15, 1533714654, 1, 1),
(433, 123, 'DISTRIBUTION', -718, 1, 1533714892, 1, 1),
(434, 163, 'DISTRIBUTION', -1143, 1, 1533714892, 1, 1),
(435, 131, 'DISTRIBUTION', -18962, 15, 1533714966, 1, 1),
(436, 106, 'DISTRIBUTION', -115783, 9, 1533714967, 1, 1),
(437, 167, 'DISTRIBUTION', -944, 15, 1533715674, 1, 1),
(438, 166, 'DISTRIBUTION', -20279, 30, 1533715674, 1, 1),
(439, 130, 'DISTRIBUTION', -41308, 36, 1533715706, 1, 1),
(440, 195, 'DISTRIBUTION', -175, 30, 1533715706, 1, 1),
(441, 171, 'DISTRIBUTION', -386, 1, 1533715707, 1, 1),
(442, 106, 'DISTRIBUTION', -115792, 9, 1533715707, 1, 1),
(443, 110, 'DISTRIBUTION', -72739, 40, 1533715942, 1, 1),
(444, 106, 'DISTRIBUTION', -115801, 9, 1533715943, 1, 1),
(445, 106, 'DISTRIBUTION', -115810, 9, 1533715964, 1, 1),
(446, 128, 'DISTRIBUTION', -41817, 15, 1533715964, 1, 1),
(447, 163, 'DISTRIBUTION', -1144, 1, 1533715964, 1, 1),
(448, 110, 'DISTRIBUTION', -72779, 40, 1533715969, 1, 1),
(449, 106, 'DISTRIBUTION', -115819, 9, 1533715969, 1, 1),
(450, 110, 'DISTRIBUTION', -72819, 30, 1533716137, 1, 1),
(451, 132, 'DISTRIBUTION', -816, 6, 1533716138, 1, 1),
(452, 124, 'DISTRIBUTION', -42076, 18, 1533716138, 1, 1),
(453, 169, 'DISTRIBUTION', -771, 1, 1533716237, 1, 1),
(454, 135, 'DISTRIBUTION', -719, 1, 1533716237, 1, 1),
(455, 113, 'DISTRIBUTION', -597, 1, 1533716237, 1, 1),
(456, 110, 'DISTRIBUTION', -72849, 40, 1533716254, 1, 1),
(457, 106, 'DISTRIBUTION', -115828, 9, 1533716254, 1, 1),
(458, 135, 'DISTRIBUTION', -720, 1, 1533716333, 1, 1),
(459, 115, 'DISTRIBUTION', -18089, 9, 1533716333, 1, 1),
(460, 107, 'DISTRIBUTION', -73290, 30, 1533716706, 1, 1),
(461, 135, 'DISTRIBUTION', -721, 1, 1533716770, 1, 1),
(462, 113, 'DISTRIBUTION', -598, 1, 1533716770, 1, 1),
(463, 169, 'DISTRIBUTION', -772, 1, 1533716770, 1, 1),
(464, 135, 'DISTRIBUTION', -722, 1, 1533716773, 1, 1),
(465, 113, 'DISTRIBUTION', -599, 1, 1533716773, 1, 1),
(466, 169, 'DISTRIBUTION', -773, 1, 1533716774, 1, 1),
(467, 135, 'DISTRIBUTION', -723, 1, 1533716777, 1, 1),
(468, 113, 'DISTRIBUTION', -600, 1, 1533716777, 1, 1),
(469, 169, 'DISTRIBUTION', -774, 1, 1533716777, 1, 1),
(470, 135, 'DISTRIBUTION', -724, 1, 1533717136, 1, 1),
(471, 169, 'DISTRIBUTION', -775, 1, 1533717136, 1, 1),
(472, 113, 'DISTRIBUTION', -601, 1, 1533717372, 1, 1),
(473, 169, 'DISTRIBUTION', -776, 1, 1533717372, 1, 1),
(474, 193, 'DISTRIBUTION', -12, 10, 1533717808, 1, 1),
(475, 106, 'DISTRIBUTION', -115837, 9, 1533717809, 1, 1),
(476, 158, 'DISTRIBUTION', -5257, 15, 1533717809, 1, 1),
(477, 106, 'DISTRIBUTION', -115846, 10, 1533717837, 1, 1),
(478, 166, 'DISTRIBUTION', -20309, 15, 1533718072, 1, 1),
(479, 128, 'DISTRIBUTION', -41832, 15, 1533718072, 1, 1),
(480, 159, 'DISTRIBUTION', -13439, 14, 1533718371, 1, 1),
(481, 177, 'DISTRIBUTION', -95, 30, 1533718371, 1, 1),
(482, 137, 'DISTRIBUTION', -6563, 10, 1533718372, 1, 1),
(483, 122, 'DISTRIBUTION', -98413, 8, 1533718372, 1, 1),
(484, 158, 'DISTRIBUTION', -5272, 15, 1533718372, 1, 1),
(485, 194, 'DISTRIBUTION', -62, 3, 1533718463, 1, 1),
(486, 106, 'DISTRIBUTION', -115856, 15, 1533718463, 1, 1),
(487, 128, 'DISTRIBUTION', -41847, 20, 1533719308, 1, 1),
(488, 166, 'DISTRIBUTION', -20324, 20, 1533719308, 1, 1),
(489, 138, 'DISTRIBUTION', -406.6, 1, 1533719308, 1, 1),
(490, 118, 'DISTRIBUTION', -25275, 6, 1533721223, 1, 1),
(491, 130, 'DISTRIBUTION', -41344, 30, 1533721223, 1, 1),
(492, 106, 'DISTRIBUTION', -115871, 9, 1533721223, 1, 1),
(493, 166, 'DISTRIBUTION', -20344, 30, 1533721450, 1, 1),
(494, 128, 'DISTRIBUTION', -41867, 15, 1533721450, 1, 1),
(495, 118, 'DISTRIBUTION', -25281, 6, 1533721556, 1, 1),
(496, 106, 'DISTRIBUTION', -115880, 9, 1533721556, 1, 1),
(497, 110, 'DISTRIBUTION', -72889, 10, 1533721815, 1, 1),
(498, 106, 'DISTRIBUTION', -115889, 9, 1533721816, 1, 1),
(499, 130, 'DISTRIBUTION', -41374, 15, 1533721931, 1, 1),
(500, 106, 'DISTRIBUTION', -115898, 6, 1533721931, 1, 1),
(501, 110, 'RESTORE', -72899, 30, 1533722301, 1, 1),
(502, 110, 'DISTRIBUTION', -72869, 30, 1533722301, 1, 1),
(503, 124, 'RESTORE', -42094, 18, 1533722301, 1, 1),
(504, 124, 'DISTRIBUTION', -42076, 18, 1533722301, 1, 1),
(505, 132, 'RESTORE', -822, 6, 1533722301, 1, 1),
(506, 132, 'DISTRIBUTION', -816, 6, 1533722301, 1, 1),
(507, 224, 'DISTRIBUTION', -185, 10, 1533723350, 1, 1),
(508, 130, 'DISTRIBUTION', -41389, 30, 1533723351, 1, 1),
(509, 106, 'DISTRIBUTION', -115904, 9, 1533723351, 1, 1),
(510, 130, 'DISTRIBUTION', -41419, 30, 1533732644, 30, 1),
(511, 106, 'DISTRIBUTION', -115913, 9, 1533732645, 30, 1),
(512, 156, 'DISTRIBUTION', -2774, 14, 1533732776, 1, 1),
(513, 122, 'DISTRIBUTION', -98421, 30, 1533732777, 1, 1),
(514, 166, 'DISTRIBUTION', -20374, 20, 1533733053, 1, 1),
(515, 128, 'DISTRIBUTION', -41882, 20, 1533733053, 1, 1),
(516, 195, 'DISTRIBUTION', -205, 20, 1533733054, 1, 1),
(517, 130, 'DISTRIBUTION', -41449, 30, 1533733280, 1, 1),
(518, 106, 'DISTRIBUTION', -115922, 9, 1533733280, 1, 1),
(519, 212, 'DISTRIBUTION', -786, 15, 1533733280, 1, 1),
(520, 166, 'DISTRIBUTION', -20394, 30, 1533734122, 1, 1),
(521, 128, 'DISTRIBUTION', -41902, 20, 1533734122, 1, 1),
(522, 106, 'DISTRIBUTION', -115931, 9, 1533734122, 1, 1),
(523, 166, 'DISTRIBUTION', -20424, 30, 1533734212, 1, 1),
(524, 106, 'DISTRIBUTION', -115940, 9, 1533734213, 1, 1),
(525, 120, 'DISTRIBUTION', -73395, 30, 1533734468, 1, 1),
(526, 115, 'DISTRIBUTION', -18098, 9, 1533734469, 1, 1),
(527, 166, 'DISTRIBUTION', -20454, 30, 1533734726, 1, 1),
(528, 131, 'DISTRIBUTION', -18977, 30, 1533734726, 1, 1),
(529, 166, 'DISTRIBUTION', -20484, 15, 1533734974, 1, 1),
(530, 106, 'DISTRIBUTION', -115949, 10, 1533734974, 1, 1),
(531, 143, 'DISTRIBUTION', -7443, 30, 1533793711, 30, 1),
(532, 131, 'DISTRIBUTION', -19007, 30, 1533793711, 30, 1),
(533, 106, 'DISTRIBUTION', -115959, 9, 1533793711, 30, 1),
(534, 108, 'DISTRIBUTION', -53047, 30, 1533795364, 30, 1),
(535, 106, 'DISTRIBUTION', -115968, 9, 1533795365, 30, 1),
(536, 108, 'DISTRIBUTION', -53077, 30, 1533795585, 30, 1),
(537, 115, 'DISTRIBUTION', -18107, 9, 1533795585, 30, 1),
(538, 138, 'DISTRIBUTION', -407.6, 1, 1533795793, 30, 1),
(539, 128, 'DISTRIBUTION', -41922, 20, 1533795793, 30, 1),
(540, 130, 'DISTRIBUTION', -41479, 30, 1533795793, 30, 1),
(541, 137, 'DISTRIBUTION', -6573, 10, 1533796816, 30, 1),
(542, 128, 'DISTRIBUTION', -41942, 20, 1533796816, 30, 1),
(543, 115, 'DISTRIBUTION', -18116, 9, 1533796816, 30, 1),
(544, 106, 'DISTRIBUTION', -115977, 9, 1533798363, 30, 1),
(545, 128, 'DISTRIBUTION', -41962, 20, 1533798363, 30, 1),
(546, 195, 'DISTRIBUTION', -225, 20, 1533798364, 30, 1),
(547, 128, 'DISTRIBUTION', -41982, 20, 1533801332, 30, 1),
(548, 210, 'DISTRIBUTION', -2715, 20, 1533801332, 30, 1),
(549, 166, 'DISTRIBUTION', -20499, 18, 1533801332, 30, 1),
(550, 105, 'DISTRIBUTION', -2966, 1, 1533803468, 1, 1),
(551, 106, 'DISTRIBUTION', -115986, 9, 1533803468, 1, 1),
(552, 194, 'DISTRIBUTION', -65, 1, 1533803468, 1, 1),
(553, 105, 'DISTRIBUTION', -2967, 1, 1533804814, 1, 1),
(554, 115, 'DISTRIBUTION', -18125, 9, 1533804814, 1, 1),
(555, 121, 'DISTRIBUTION', -9093, 18, 1533805107, 1, 1),
(556, 157, 'DISTRIBUTION', -5258, 20, 1533805107, 1, 1),
(557, 154, 'DISTRIBUTION', -767.5, 20, 1533805107, 1, 1),
(558, 137, 'DISTRIBUTION', -6583, 20, 1533805267, 1, 1),
(559, 163, 'DISTRIBUTION', -1145, 1, 1533805267, 1, 1),
(560, 202, 'DISTRIBUTION', -21, 1, 1533806373, 30, 1),
(561, 115, 'DISTRIBUTION', -18134, 9, 1533806373, 30, 1),
(562, 116, 'DISTRIBUTION', -52926.75, 30, 1533806501, 30, 1),
(563, 106, 'DISTRIBUTION', -115995, 6, 1533806502, 30, 1),
(564, 130, 'DISTRIBUTION', -41509, 20, 1533806698, 30, 1),
(565, 215, 'DISTRIBUTION', -60, 1, 1533806698, 30, 1),
(566, 110, 'DISTRIBUTION', -72899, 30, 1533807022, 30, 1),
(567, 181, 'DISTRIBUTION', -77, 1, 1533808975, 1, 1),
(568, 161, 'DISTRIBUTION', -8441, 10, 1533808975, 1, 1),
(569, 140, 'DISTRIBUTION', -14079, 15, 1533815779, 1, 1),
(570, 227, 'DISTRIBUTION', 0, 2, 1533815779, 1, 1),
(571, 227, 'DISTRIBUTION', -2, 2, 1533820154, 1, 1),
(572, 154, 'DISTRIBUTION', -787.5, 4, 1533820154, 1, 1),
(573, 106, 'DISTRIBUTION', -116001, 9, 1533820155, 1, 1),
(574, 122, 'DISTRIBUTION', -98451, 36, 1533820528, 1, 1),
(575, 118, 'DISTRIBUTION', -25287, 6, 1533820529, 1, 1),
(576, 154, 'DISTRIBUTION', -791.5, 4, 1533820529, 1, 1),
(577, 146, 'DISTRIBUTION', -13229, 10, 1533820771, 1, 1),
(578, 116, 'DISTRIBUTION', -52956.75, 42, 1533820771, 1, 1),
(579, 122, 'DISTRIBUTION', -98487, 36, 1533820771, 1, 1),
(580, 166, 'DISTRIBUTION', -20517, 30, 1533820771, 1, 1),
(581, 137, 'DISTRIBUTION', -6603, 28, 1533821267, 1, 1),
(582, 159, 'DISTRIBUTION', -13453, 14, 1533821267, 1, 1),
(583, 122, 'DISTRIBUTION', -98523, 8, 1533821267, 1, 1),
(584, 166, 'DISTRIBUTION', -20547, 30, 1533821565, 1, 1),
(585, 128, 'DISTRIBUTION', -42002, 20, 1533821566, 1, 1),
(586, 118, 'DISTRIBUTION', -25293, 6, 1533821566, 1, 1),
(587, 130, 'DISTRIBUTION', -41529, 15, 1533822610, 1, 1),
(588, 115, 'DISTRIBUTION', -18143, 9, 1533822610, 1, 1),
(589, 130, 'DISTRIBUTION', -41544, 15, 1533822627, 1, 1),
(590, 115, 'DISTRIBUTION', -18152, 9, 1533822627, 1, 1),
(591, 115, 'RESTORE', -18161, 9, 1533822773, 1, 1),
(592, 115, 'DISTRIBUTION', -18152, 9, 1533822773, 1, 1),
(593, 130, 'RESTORE', -41559, 15, 1533822774, 1, 1),
(594, 130, 'DISTRIBUTION', -41544, 15, 1533822774, 1, 1),
(595, 217, 'DISTRIBUTION', -31, 3, 1533887830, 1, 1),
(596, 129, 'DISTRIBUTION', -545, 1, 1533887830, 1, 1),
(597, 116, 'DISTRIBUTION', -52998.75, 42, 1533888079, 1, 1),
(598, 106, 'DISTRIBUTION', -116010, 9, 1533888079, 1, 1),
(599, 108, 'DISTRIBUTION', -53107, 42, 1533888314, 1, 1),
(600, 107, 'DISTRIBUTION', -73320, 30, 1533888314, 1, 1),
(601, 166, 'DISTRIBUTION', -20577, 20, 1533888431, 1, 1),
(602, 205, 'DISTRIBUTION', -1161, 20, 1533888431, 1, 1),
(603, 194, 'DISTRIBUTION', -66, 3, 1533888432, 1, 1),
(604, 107, 'DISTRIBUTION', -73350, 20, 1533888655, 1, 1),
(605, 128, 'DISTRIBUTION', -42022, 30, 1533888656, 1, 1),
(606, 119, 'DISTRIBUTION', -73711, 20, 1533888656, 1, 1),
(607, 121, 'DISTRIBUTION', -9111, 30, 1533888656, 1, 1),
(608, 108, 'DISTRIBUTION', -53149, 20, 1533888865, 1, 1),
(609, 181, 'DISTRIBUTION', -78, 1, 1533888865, 1, 1),
(610, 108, 'RESTORE', -53169, 42, 1533888978, 1, 1),
(611, 108, 'DISTRIBUTION', -53127, 42, 1533888978, 1, 1),
(612, 107, 'RESTORE', -73370, 30, 1533888978, 1, 1),
(613, 107, 'DISTRIBUTION', -73340, 30, 1533888979, 1, 1),
(614, 108, 'DISTRIBUTION', -53169, 36, 1533890881, 1, 1),
(615, 166, 'DISTRIBUTION', -20597, 30, 1533890881, 1, 1),
(616, 120, 'DISTRIBUTION', -73425, 42, 1533891462, 30, 1),
(617, 166, 'DISTRIBUTION', -20627, 30, 1533891462, 30, 1),
(618, 121, 'DISTRIBUTION', -9141, 30, 1533891622, 30, 1),
(619, 158, 'DISTRIBUTION', -5287, 30, 1533891622, 30, 1),
(620, 108, 'DISTRIBUTION', -53205, 30, 1533891623, 30, 1),
(621, 108, 'DISTRIBUTION', -53235, 30, 1533891754, 30, 1),
(622, 106, 'DISTRIBUTION', -116019, 9, 1533891754, 30, 1),
(623, 135, 'DISTRIBUTION', -725, 1, 1533891887, 30, 1),
(624, 181, 'DISTRIBUTION', -79, 1, 1533891887, 30, 1),
(625, 108, 'DISTRIBUTION', -53265, 30, 1533892016, 30, 1),
(626, 106, 'DISTRIBUTION', -116028, 9, 1533892016, 30, 1),
(627, 194, 'DISTRIBUTION', -69, 1, 1533893083, 30, 1),
(628, 166, 'DISTRIBUTION', -20657, 30, 1533893083, 30, 1),
(629, 128, 'DISTRIBUTION', -42052, 30, 1533893083, 30, 1),
(630, 118, 'DISTRIBUTION', -25299, 6, 1533897226, 30, 1),
(631, 106, 'DISTRIBUTION', -116037, 9, 1533897226, 30, 1),
(632, 108, 'DISTRIBUTION', -53295, 30, 1533897226, 30, 1),
(633, 163, 'DISTRIBUTION', -1146, 1, 1533904699, 30, 1),
(634, 166, 'DISTRIBUTION', -20687, 15, 1533904955, 30, 1),
(635, 156, 'DISTRIBUTION', -2788, 14, 1533905273, 1, 1),
(636, 131, 'DISTRIBUTION', -19037, 36, 1533905273, 1, 1),
(637, 125, 'DISTRIBUTION', -2175, 3, 1533905457, 1, 1),
(638, 161, 'DISTRIBUTION', -8451, 10, 1533905457, 1, 1),
(639, 202, 'DISTRIBUTION', -22, 1, 1533905457, 1, 1),
(640, 135, 'DISTRIBUTION', -726, 1, 1533906184, 1, 1),
(641, 163, 'DISTRIBUTION', -1147, 1, 1533906185, 1, 1),
(642, 113, 'DISTRIBUTION', -602, 1, 1533906185, 1, 1),
(643, 120, 'DISTRIBUTION', -73467, 42, 1533906620, 1, 1),
(644, 166, 'DISTRIBUTION', -20702, 30, 1533906620, 1, 1),
(645, 108, 'DISTRIBUTION', -53325, 30, 1533907601, 1, 1),
(646, 150, 'DISTRIBUTION', -42171, 30, 1533907601, 1, 1),
(647, 108, 'RESTORE', -53355, 30, 1533907861, 1, 1),
(648, 108, 'DISTRIBUTION', -53325, 30, 1533907861, 1, 1),
(649, 118, 'RESTORE', -25305, 6, 1533907861, 1, 1),
(650, 118, 'DISTRIBUTION', -25299, 6, 1533907862, 1, 1),
(651, 106, 'RESTORE', -116046, 9, 1533907862, 1, 1),
(652, 106, 'DISTRIBUTION', -116037, 9, 1533907862, 1, 1),
(653, 150, 'DISTRIBUTION', -42201, 1, 1533908040, 1, 1),
(654, 128, 'DISTRIBUTION', -42082, 30, 1533908041, 1, 1),
(655, 108, 'DISTRIBUTION', -53355, 30, 1533908041, 1, 1),
(656, 108, 'DISTRIBUTION', -53385, 30, 1533909896, 1, 1),
(657, 150, 'DISTRIBUTION', -42202, 30, 1533909896, 1, 1),
(658, 217, 'DISTRIBUTION', -34, 3, 1534137483, 1, 1),
(659, 128, 'DISTRIBUTION', -42112, 20, 1534137483, 1, 1),
(660, 115, 'DISTRIBUTION', -18161, 9, 1534137483, 1, 1),
(661, 163, 'DISTRIBUTION', -1148, 1, 1534137484, 1, 1),
(662, 181, 'DISTRIBUTION', -80, 1, 1534138205, 1, 1),
(663, 213, 'DISTRIBUTION', -9, 18, 1534138205, 1, 1),
(664, 118, 'DISTRIBUTION', -25305, 6, 1534138675, 1, 1),
(665, 213, 'DISTRIBUTION', -27, 28, 1534138675, 1, 1),
(666, 154, 'DISTRIBUTION', -795.5, 3, 1534138675, 1, 1),
(667, 181, 'DISTRIBUTION', -81, 1, 1534139132, 1, 1),
(668, 169, 'DISTRIBUTION', -777, 1, 1534139132, 1, 1),
(669, 135, 'DISTRIBUTION', -727, 1, 1534139132, 1, 1),
(670, 135, 'DISTRIBUTION', -728, 1, 1534139501, 1, 1),
(671, 132, 'DISTRIBUTION', -822, 10, 1534139502, 1, 1),
(672, 195, 'DISTRIBUTION', -245, 10, 1534140010, 1, 1),
(673, 106, 'DISTRIBUTION', -116046, 9, 1534140010, 1, 1),
(674, 158, 'DISTRIBUTION', -5317, 10, 1534140481, 1, 1),
(675, 107, 'DISTRIBUTION', -73370, 20, 1534140481, 1, 1),
(676, 154, 'DISTRIBUTION', -798.5, 10, 1534141073, 1, 1),
(677, 213, 'DISTRIBUTION', -55, 30, 1534141073, 1, 1),
(678, 154, 'RESTORE', -808.5, 10, 1534141269, 1, 1),
(679, 154, 'DISTRIBUTION', -798.5, 10, 1534141269, 1, 1),
(680, 116, 'RESTORE', -53040.75, 30, 1534141269, 1, 1),
(681, 116, 'DISTRIBUTION', -53010.75, 30, 1534141269, 1, 1),
(682, 113, 'DISTRIBUTION', -603, 1, 1534146316, 1, 1),
(683, 113, 'RESTORE', -604, 1, 1534146680, 1, 1),
(684, 113, 'DISTRIBUTION', -603, 1, 1534146680, 1, 1),
(685, 106, 'DISTRIBUTION', -116055, 15, 1534148481, 1, 1),
(686, 108, 'DISTRIBUTION', -53415, 30, 1534151664, 1, 1),
(687, 115, 'DISTRIBUTION', -18170, 9, 1534151665, 1, 1),
(688, 166, 'DISTRIBUTION', -20732, 30, 1534151752, 30, 1),
(689, 128, 'DISTRIBUTION', -42132, 30, 1534151752, 30, 1),
(690, 108, 'DISTRIBUTION', -53445, 30, 1534151753, 30, 1),
(691, 118, 'DISTRIBUTION', -25311, 6, 1534152447, 1, 1),
(692, 137, 'DISTRIBUTION', -6631, 10, 1534152447, 1, 1),
(693, 128, 'DISTRIBUTION', -42162, 20, 1534152447, 1, 1),
(694, 113, 'RESTORE', -604, 1, 1534152481, 30, 1),
(695, 113, 'DISTRIBUTION', -603, 1, 1534152481, 30, 1),
(696, 110, 'DISTRIBUTION', -72929, 30, 1534152649, 30, 1),
(697, 115, 'DISTRIBUTION', -18179, 9, 1534152649, 30, 1),
(698, 110, 'DISTRIBUTION', -72959, 40, 1534152665, 1, 1),
(699, 166, 'DISTRIBUTION', -20762, 18, 1534152665, 1, 1),
(700, 135, 'DISTRIBUTION', -729, 1, 1534152850, 30, 1),
(701, 113, 'DISTRIBUTION', -604, 1, 1534152850, 30, 1),
(702, 163, 'DISTRIBUTION', -1149, 1, 1534152850, 30, 1),
(703, 143, 'DISTRIBUTION', -7473, 18, 1534152970, 1, 1),
(704, 131, 'DISTRIBUTION', -19073, 18, 1534152971, 1, 1),
(705, 122, 'DISTRIBUTION', -98531, 6, 1534152971, 1, 1),
(706, 106, 'RESTORE', -116070, 15, 1534153200, 1, 1),
(707, 106, 'DISTRIBUTION', -116055, 15, 1534153200, 1, 1),
(708, 106, 'RESTORE', -116070, 15, 1534153296, 1, 1),
(709, 106, 'DISTRIBUTION', -116055, 15, 1534153296, 1, 1),
(710, 154, 'RESTORE', -808.5, 30, 1534153451, 1, 1),
(711, 154, 'DISTRIBUTION', -778.5, 10, 1534153452, 1, 1),
(712, 116, 'RESTORE', -53040.75, 10, 1534153452, 1, 1),
(713, 116, 'DISTRIBUTION', -53030.75, 30, 1534153452, 1, 1),
(714, 154, 'RESTORE', -788.5, 10, 1534153482, 1, 1),
(715, 154, 'DISTRIBUTION', -778.5, 10, 1534153482, 1, 1),
(716, 116, 'RESTORE', -53060.75, 30, 1534153482, 1, 1),
(717, 116, 'DISTRIBUTION', -53030.75, 30, 1534153482, 1, 1),
(718, 108, 'DISTRIBUTION', -53475, 30, 1534154042, 1, 1),
(719, 106, 'DISTRIBUTION', -116070, 9, 1534154042, 1, 1),
(720, 108, 'RESTORE', -53505, 30, 1534154372, 1, 1),
(721, 108, 'DISTRIBUTION', -53475, 30, 1534154372, 1, 1),
(722, 106, 'RESTORE', -116079, 9, 1534154373, 1, 1),
(723, 106, 'DISTRIBUTION', -116070, 9, 1534154373, 1, 1),
(724, 150, 'DISTRIBUTION', -42232, 20, 1534154677, 1, 1),
(725, 106, 'DISTRIBUTION', -116079, 3, 1534155233, 1, 1),
(726, 135, 'DISTRIBUTION', -730, 1, 1534155233, 1, 1),
(727, 181, 'DISTRIBUTION', -82, 1, 1534155686, 1, 1),
(728, 139, 'DISTRIBUTION', -156, 1, 1534155686, 1, 1),
(729, 106, 'DISTRIBUTION', -116082, 12, 1534162052, 1, 1),
(730, 108, 'DISTRIBUTION', -53505, 21, 1534162052, 1, 1),
(731, 224, 'DISTRIBUTION', -195, 30, 1534162557, 30, 1),
(732, 158, 'DISTRIBUTION', -5327, 30, 1534162557, 30, 1),
(733, 108, 'DISTRIBUTION', -53526, 30, 1534162557, 30, 1),
(734, 108, 'DISTRIBUTION', -53556, 30, 1534162827, 30, 1),
(735, 136, 'DISTRIBUTION', -2236.5, 12, 1534163675, 1, 1),
(736, 123, 'DISTRIBUTION', -719, 1, 1534163675, 1, 1),
(737, 181, 'DISTRIBUTION', -83, 1, 1534163936, 1, 1),
(738, 144, 'DISTRIBUTION', -258, 1, 1534163936, 1, 1),
(739, 131, 'DISTRIBUTION', -19091, 30, 1534164218, 1, 1),
(740, 143, 'DISTRIBUTION', -7491, 30, 1534164218, 1, 1),
(741, 106, 'DISTRIBUTION', -116094, 9, 1534164218, 1, 1),
(742, 110, 'DISTRIBUTION', -72999, 40, 1534164485, 1, 1),
(743, 106, 'DISTRIBUTION', -116103, 9, 1534164485, 1, 1),
(744, 122, 'DISTRIBUTION', -98537, 6, 1534164876, 1, 1),
(745, 120, 'DISTRIBUTION', -73509, 30, 1534164952, 30, 1),
(746, 106, 'DISTRIBUTION', -116112, 9, 1534164953, 30, 1),
(747, 118, 'RESTORE', -25317, 6, 1534165350, 1, 1),
(748, 118, 'DISTRIBUTION', -25311, 6, 1534165350, 1, 1),
(749, 118, 'DISTRIBUTION', -25317, 6, 1534165715, 1, 1),
(750, 113, 'DISTRIBUTION', -605, 1, 1534165715, 1, 1),
(751, 123, 'DISTRIBUTION', -720, 1, 1534165844, 1, 1),
(752, 118, 'RESTORE', -25323, 6, 1534165844, 1, 1),
(753, 118, 'DISTRIBUTION', -25317, 6, 1534165844, 1, 1),
(754, 161, 'DISTRIBUTION', -8461, 10, 1534165909, 1, 1),
(755, 118, 'RESTORE', -25323, 6, 1534165909, 1, 1),
(756, 118, 'DISTRIBUTION', -25317, 6, 1534165909, 1, 1),
(757, 118, 'DISTRIBUTION', -25323, 6, 1534166283, 1, 1),
(758, 194, 'DISTRIBUTION', -70, 3, 1534166283, 1, 1),
(759, 137, 'DISTRIBUTION', -6641, 20, 1534166283, 1, 1),
(760, 227, 'DISTRIBUTION', -4, 1, 1534166284, 1, 1),
(761, 120, 'DISTRIBUTION', -73539, 42, 1534166547, 1, 1),
(762, 150, 'DISTRIBUTION', -42252, 30, 1534166760, 30, 1),
(763, 128, 'DISTRIBUTION', -42182, 30, 1534166760, 30, 1),
(764, 108, 'DISTRIBUTION', -53586, 30, 1534166760, 30, 1),
(765, 130, 'DISTRIBUTION', -41559, 36, 1534166858, 1, 1),
(766, 115, 'DISTRIBUTION', -18188, 9, 1534166858, 1, 1),
(767, 118, 'DISTRIBUTION', -25329, 6, 1534166858, 1, 1),
(768, 115, 'RESTORE', -18197, 9, 1534166987, 1, 1),
(769, 115, 'DISTRIBUTION', -18188, 9, 1534166988, 1, 1),
(770, 130, 'RESTORE', -41595, 36, 1534166988, 1, 1),
(771, 130, 'DISTRIBUTION', -41559, 36, 1534166988, 1, 1),
(772, 118, 'RESTORE', -25335, 6, 1534166988, 1, 1),
(773, 118, 'DISTRIBUTION', -25329, 6, 1534166988, 1, 1),
(774, 177, 'DISTRIBUTION', -125, 20, 1534167084, 30, 1),
(775, 130, 'DISTRIBUTION', -41595, 30, 1534167084, 30, 1),
(776, 142, 'DISTRIBUTION', -5869, 30, 1534167237, 30, 1),
(777, 106, 'DISTRIBUTION', -116121, 15, 1534167238, 30, 1),
(778, 118, 'DISTRIBUTION', -25335, 6, 1534167880, 1, 1),
(779, 115, 'DISTRIBUTION', -18197, 9, 1534167880, 1, 1),
(780, 116, 'DISTRIBUTION', -53060.75, 15, 1534167881, 1, 1),
(781, 138, 'DISTRIBUTION', -408.6, 1, 1534167971, 30, 1),
(782, 203, 'DISTRIBUTION', -281, 30, 1534167971, 30, 1),
(783, 128, 'DISTRIBUTION', -42212, 30, 1534167971, 30, 1),
(784, 108, 'DISTRIBUTION', -53616, 30, 1534168466, 1, 1),
(785, 115, 'DISTRIBUTION', -18206, 9, 1534168466, 1, 1),
(786, 110, 'DISTRIBUTION', -73039, 40, 1534168736, 1, 1),
(787, 194, 'DISTRIBUTION', -73, 1, 1534168736, 1, 1),
(788, 106, 'DISTRIBUTION', -116136, 9, 1534168737, 1, 1),
(789, 108, 'DISTRIBUTION', -53646, 30, 1534168976, 30, 1),
(790, 106, 'DISTRIBUTION', -116145, 9, 1534168976, 30, 1),
(791, 121, 'DISTRIBUTION', -9171, 18, 1534169022, 1, 1),
(792, 224, 'DISTRIBUTION', -225, 20, 1534169022, 1, 1),
(793, 106, 'DISTRIBUTION', -116154, 9, 1534169022, 1, 1),
(794, 105, 'DISTRIBUTION', -2968, 1, 1534169057, 28, 1),
(795, 202, 'DISTRIBUTION', -23, 1, 1534169101, 30, 1),
(796, 123, 'DISTRIBUTION', -721, 1, 1534169101, 30, 1),
(797, 113, 'DISTRIBUTION', -606, 1, 1534169101, 30, 1),
(798, 118, 'DISTRIBUTION', -25341, 6, 1534222900, 1, 1),
(799, 115, 'DISTRIBUTION', -18215, 9, 1534222900, 1, 1),
(800, 146, 'DISTRIBUTION', -13239, 10, 1534222900, 1, 1),
(801, 227, 'DISTRIBUTION', -5, 2, 1534223330, 1, 1),
(802, 160, 'DISTRIBUTION', -10347, 20, 1534223330, 1, 1),
(803, 154, 'DISTRIBUTION', -788.5, 10, 1534223330, 1, 1),
(804, 135, 'DISTRIBUTION', -731, 1, 1534224036, 1, 1),
(805, 132, 'DISTRIBUTION', -832, 6, 1534224036, 1, 1),
(806, 120, 'DISTRIBUTION', -73581, 42, 1534224500, 1, 1),
(807, 150, 'DISTRIBUTION', -42282, 20, 1534224501, 1, 1),
(808, 108, 'DISTRIBUTION', -53676, 30, 1534224823, 1, 1),
(809, 115, 'DISTRIBUTION', -18224, 9, 1534224823, 1, 1),
(810, 195, 'DISTRIBUTION', -255, 10, 1534225226, 1, 1),
(811, 106, 'DISTRIBUTION', -116163, 9, 1534225227, 1, 1),
(812, 224, 'DISTRIBUTION', -245, 20, 1534225227, 1, 1),
(813, 121, 'DISTRIBUTION', -9189, 18, 1534225227, 1, 1),
(814, 163, 'DISTRIBUTION', -1150, 1, 1534225681, 1, 1),
(815, 169, 'DISTRIBUTION', -778, 1, 1534225681, 1, 1),
(816, 132, 'DISTRIBUTION', -838, 6, 1534225681, 1, 1),
(817, 116, 'DISTRIBUTION', -53075.75, 36, 1534226238, 1, 1),
(818, 194, 'DISTRIBUTION', -74, 1, 1534226238, 1, 1),
(819, 106, 'DISTRIBUTION', -116172, 9, 1534226238, 1, 1),
(820, 121, 'DISTRIBUTION', -9207, 18, 1534226238, 1, 1),
(821, 107, 'DISTRIBUTION', -73390, 40, 1534226541, 1, 1),
(822, 195, 'DISTRIBUTION', -265, 20, 1534226541, 1, 1),
(823, 194, 'DISTRIBUTION', -75, 1, 1534226541, 1, 1),
(824, 161, 'DISTRIBUTION', -8471, 10, 1534226963, 1, 1),
(825, 118, 'DISTRIBUTION', -25347, 6, 1534226963, 1, 1),
(826, 123, 'DISTRIBUTION', -722, 1, 1534226963, 1, 1),
(827, 145, 'DISTRIBUTION', -6723, 40, 1534226963, 1, 1),
(828, 163, 'DISTRIBUTION', -1151, 1, 1534227604, 1, 1),
(829, 217, 'DISTRIBUTION', -37, 3, 1534227605, 1, 1),
(830, 115, 'DISTRIBUTION', -18233, 9, 1534227605, 1, 1),
(831, 120, 'DISTRIBUTION', -73623, 42, 1534229164, 1, 1),
(832, 116, 'DISTRIBUTION', -53111.75, 42, 1534229483, 1, 1),
(833, 106, 'DISTRIBUTION', -116181, 18, 1534229484, 1, 1),
(834, 118, 'DISTRIBUTION', -25353, 6, 1534229484, 1, 1),
(835, 160, 'DISTRIBUTION', -10367, 42, 1534229484, 1, 1),
(836, 105, 'DISTRIBUTION', -2969, 1, 1534241508, 1, 1),
(837, 115, 'DISTRIBUTION', -18242, 9, 1534241508, 1, 1),
(838, 120, 'DISTRIBUTION', -73665, 30, 1534245533, 1, 1),
(839, 115, 'DISTRIBUTION', -18251, 9, 1534245533, 1, 1),
(840, 135, 'DISTRIBUTION', -732, 1, 1534245762, 1, 1),
(841, 133, 'DISTRIBUTION', -29931.5, 20, 1534245762, 1, 1),
(842, 169, 'DISTRIBUTION', -779, 1, 1534245762, 1, 1),
(843, 108, 'DISTRIBUTION', -53706, 30, 1534245877, 1, 1),
(844, 128, 'DISTRIBUTION', -42242, 30, 1534245877, 1, 1),
(845, 166, 'DISTRIBUTION', -20780, 30, 1534245877, 1, 1),
(846, 108, 'DISTRIBUTION', -53736, 30, 1534246134, 1, 1),
(847, 166, 'DISTRIBUTION', -20810, 30, 1534246134, 1, 1),
(848, 128, 'DISTRIBUTION', -42272, 30, 1534246135, 1, 1),
(849, 203, 'DISTRIBUTION', -311, 30, 1534246978, 1, 1),
(850, 128, 'DISTRIBUTION', -42302, 30, 1534246978, 1, 1),
(851, 108, 'DISTRIBUTION', -53766, 30, 1534247152, 1, 1),
(852, 107, 'DISTRIBUTION', -73430, 30, 1534247152, 1, 1),
(853, 135, 'DISTRIBUTION', -733, 1, 1534247268, 1, 1),
(854, 113, 'DISTRIBUTION', -607, 1, 1534247268, 1, 1),
(855, 132, 'DISTRIBUTION', -844, 6, 1534247268, 1, 1),
(856, 108, 'DISTRIBUTION', -53796, 30, 1534247479, 1, 1),
(857, 107, 'DISTRIBUTION', -73460, 30, 1534247479, 1, 1),
(858, 108, 'DISTRIBUTION', -53826, 30, 1534247980, 1, 1),
(859, 106, 'DISTRIBUTION', -116199, 9, 1534247980, 1, 1),
(860, 195, 'DISTRIBUTION', -285, 36, 1534247980, 1, 1),
(861, 172, 'DISTRIBUTION', -334, 21, 1534247980, 1, 1),
(862, 163, 'DISTRIBUTION', -1152, 1, 1534247981, 1, 1),
(863, 108, 'DISTRIBUTION', -53856, 30, 1534247984, 1, 1),
(864, 106, 'DISTRIBUTION', -116208, 9, 1534247984, 1, 1),
(865, 195, 'DISTRIBUTION', -321, 36, 1534247984, 1, 1),
(866, 172, 'DISTRIBUTION', -355, 21, 1534247985, 1, 1),
(867, 163, 'DISTRIBUTION', -1153, 1, 1534247985, 1, 1),
(868, 110, 'DISTRIBUTION', -73079, 30, 1534248398, 1, 1),
(869, 115, 'DISTRIBUTION', -18260, 9, 1534248398, 1, 1),
(870, 120, 'DISTRIBUTION', -73695, 30, 1534248909, 1, 1),
(871, 115, 'DISTRIBUTION', -18269, 9, 1534248910, 1, 1),
(872, 120, 'DISTRIBUTION', -73725, 30, 1534249027, 1, 1),
(873, 115, 'DISTRIBUTION', -18278, 9, 1534249027, 1, 1),
(874, 163, 'DISTRIBUTION', -1154, 1, 1534249091, 1, 1),
(875, 133, 'DISTRIBUTION', -29951.5, 15, 1534249190, 1, 1),
(876, 163, 'DISTRIBUTION', -1155, 1, 1534249190, 1, 1),
(877, 108, 'DISTRIBUTION', -53886, 42, 1534249426, 1, 1),
(878, 195, 'DISTRIBUTION', -357, 20, 1534249891, 1, 1),
(879, 128, 'DISTRIBUTION', -42332, 20, 1534250003, 1, 1),
(880, 137, 'DISTRIBUTION', -6661, 10, 1534250003, 1, 1),
(881, 166, 'DISTRIBUTION', -20840, 20, 1534250004, 1, 1),
(882, 108, 'DISTRIBUTION', -53928, 30, 1534250249, 1, 1),
(883, 194, 'DISTRIBUTION', -76, 3, 1534250249, 1, 1),
(884, 106, 'DISTRIBUTION', -116217, 9, 1534250249, 1, 1),
(885, 108, 'DISTRIBUTION', -53958, 30, 1534250367, 1, 1),
(886, 166, 'DISTRIBUTION', -20860, 30, 1534250367, 1, 1),
(887, 158, 'DISTRIBUTION', -5357, 20, 1534250368, 1, 1),
(888, 150, 'DISTRIBUTION', -42302, 30, 1534250473, 1, 1),
(889, 128, 'DISTRIBUTION', -42352, 30, 1534250473, 1, 1),
(890, 106, 'DISTRIBUTION', -116226, 9, 1534250473, 1, 1),
(891, 110, 'DISTRIBUTION', -73109, 20, 1534250745, 1, 1),
(892, 106, 'DISTRIBUTION', -116235, 9, 1534250745, 1, 1),
(893, 116, 'DISTRIBUTION', -53153.75, 30, 1534250877, 1, 1),
(894, 115, 'DISTRIBUTION', -18287, 9, 1534250877, 1, 1),
(895, 194, 'DISTRIBUTION', -79, 1, 1534250877, 1, 1),
(896, 203, 'DISTRIBUTION', -341, 30, 1534251010, 1, 1),
(897, 128, 'DISTRIBUTION', -42382, 30, 1534251010, 1, 1),
(898, 141, 'DISTRIBUTION', -723.2, 1, 1534251010, 1, 1),
(899, 158, 'DISTRIBUTION', -5377, 30, 1534252692, 1, 1),
(900, 194, 'DISTRIBUTION', -80, 3, 1534252692, 1, 1),
(901, 182, 'DISTRIBUTION', -5617.5, 20, 1534252693, 1, 1),
(902, 203, 'DISTRIBUTION', -371, 20, 1534252996, 1, 1),
(903, 128, 'DISTRIBUTION', -42412, 30, 1534252996, 1, 1),
(904, 194, 'DISTRIBUTION', -83, 3, 1534252996, 1, 1),
(905, 203, 'DISTRIBUTION', -391, 20, 1534409905, 1, 1),
(906, 110, 'DISTRIBUTION', -73129, 40, 1534410657, 1, 1),
(907, 115, 'DISTRIBUTION', -18296, 9, 1534410657, 1, 1),
(908, 123, 'DISTRIBUTION', -723, 1, 1534411054, 1, 1),
(909, 145, 'DISTRIBUTION', -6763, 18, 1534411054, 1, 1),
(910, 118, 'DISTRIBUTION', -25359, 6, 1534411054, 1, 1);
INSERT INTO `md_stock_records` (`StockRecordsID`, `MedicineStockID`, `Operation`, `StockLevel`, `Quantity`, `Date`, `UserID`, `Status`) VALUES
(911, 106, 'DISTRIBUTION', -116244, 15, 1534412406, 1, 1),
(912, 130, 'DISTRIBUTION', -41625, 30, 1534412407, 1, 1),
(913, 144, 'DISTRIBUTION', -259, 1, 1534412819, 1, 1),
(914, 181, 'DISTRIBUTION', -84, 1, 1534412820, 1, 1),
(915, 106, 'DISTRIBUTION', -116259, 10, 1534413114, 1, 1),
(916, 118, 'DISTRIBUTION', -25365, 6, 1534413115, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mu_tm`
--

CREATE TABLE `mu_tm` (
  `TicketID` int(11) NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `TicketPaid` int(11) NOT NULL,
  `ReceiptNumber` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL DEFAULT 'OK',
  `Date` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mu_tm`
--

INSERT INTO `mu_tm` (`TicketID`, `PatientRecordID`, `TicketPaid`, `ReceiptNumber`, `Type`, `Date`, `UserID`) VALUES
(7, 7, 1220, '14523', 'OK', '2018-07-31', 1),
(10, 10, 215, '', 'OK', '2018-08-01', 1),
(11, 11, 0, '', 'INDIGENT', '2018-08-01', 1),
(12, 12, 0, '', 'INDIGENT', '2018-08-01', 30),
(13, 13, 0, '', 'INDIGENT', '2018-08-01', 1),
(14, 14, 0, '', 'INDIGENT', '2018-08-01', 1),
(15, 15, 0, '', 'INDIGENT', '2018-08-01', 1),
(16, 16, 0, '', 'INDIGENT', '2018-08-01', 30),
(17, 17, 0, '', 'INDIGENT', '2018-08-01', 1),
(18, 18, 0, '', 'INDIGENT', '2018-08-01', 30),
(19, 19, 200, '42802', 'OK', '2018-08-01', 1),
(20, 20, 200, '42803', 'OK', '2018-08-01', 1),
(21, 21, 0, '', 'INDIGENT', '2018-08-01', 30),
(22, 22, 190, '', 'OK', '2018-08-01', 30),
(23, 23, 160, '', 'OK', '2018-08-01', 30),
(24, 24, 0, '', 'INDIGENT', '2018-08-01', 30),
(25, 25, 0, '', 'INDIGENT', '2018-08-01', 30),
(26, 26, 1911, '42808', 'OK', '2018-08-01', 30),
(27, 27, 0, '', 'INDIGENT', '2018-08-01', 30),
(28, 28, 200, '42810', 'OK', '2018-08-01', 1),
(29, 29, 200, '42811', 'OK', '2018-08-01', 1),
(30, 30, 0, '', 'INDIGENT', '2018-08-01', 30),
(31, 31, 0, '', 'INDIGENT', '2018-08-01', 30),
(32, 32, 0, '', 'INDIGENT', '2018-08-01', 30),
(33, 33, 0, '', 'INDIGENT', '2018-08-01', 30),
(34, 34, 200, '42815', 'OK', '2018-08-02', 1),
(35, 35, 0, '', 'INDIGENT', '2018-08-02', 1),
(36, 36, 200, '42813', 'OK', '2018-08-02', 30),
(37, 37, 0, '', 'INDIGENT', '2018-08-02', 30),
(38, 38, 200, '42816', 'OK', '2018-08-02', 1),
(39, 39, 200, '42818', 'OK', '2018-08-02', 30),
(40, 40, 200, '42819', 'OK', '2018-08-02', 1),
(41, 41, 0, '', 'INDIGENT', '2018-08-02', 1),
(42, 42, 0, '', 'INDIGENT', '2018-08-02', 1),
(43, 43, 0, '', 'INDIGENT', '2018-08-02', 1),
(44, 44, 0, '', 'INDIGENT', '2018-08-02', 1),
(45, 45, 0, '', 'INDIGENT', '2018-08-02', 1),
(46, 46, 0, '', 'INDIGENT', '2018-08-02', 1),
(47, 47, 0, '', 'INDIGENT', '2018-08-02', 1),
(48, 48, 185, '', 'OK', '2018-08-02', 1),
(49, 49, 200, '42827', 'OK', '2018-08-02', 1),
(50, 50, 200, '42828', 'OK', '2018-08-02', 1),
(51, 51, 200, '42829', 'OK', '2018-08-02', 1),
(52, 52, 200, '42830', 'OK', '2018-08-02', 1),
(53, 53, 200, '42831', 'OK', '2018-08-02', 1),
(54, 54, 0, '', 'INDIGENT', '2018-08-02', 1),
(55, 55, 0, '', 'INDIGENT', '2018-08-02', 1),
(56, 56, 200, '42834', 'OK', '2018-08-02', 1),
(57, 57, 0, '', 'INDIGENT', '2018-08-02', 1),
(58, 58, 200, '42835', 'OK', '2018-08-02', 1),
(59, 59, 0, '', 'INDIGENT', '2018-08-02', 1),
(60, 60, 0, '', 'INDIGENT', '2018-08-02', 1),
(61, 61, 0, '', 'INDIGENT', '2018-08-02', 1),
(62, 62, 0, '', 'INDIGENT', '2018-08-02', 1),
(63, 63, 2213, '42840', 'OK', '2018-08-02', 1),
(64, 64, 0, '', 'INDIGENT', '2018-08-02', 1),
(65, 65, 0, '', 'INDIGENT', '2018-08-02', 1),
(66, 66, 300, '', 'OK', '2018-08-02', 30),
(67, 67, 200, '42844', 'OK', '2018-08-02', 1),
(68, 68, 0, '', 'INDIGENT', '2018-08-02', 1),
(69, 69, 200, '42847', 'OK', '2018-08-02', 1),
(70, 70, 0, '', 'INDIGENT', '2018-08-02', 1),
(71, 71, 0, '', 'INDIGENT', '2018-08-02', 1),
(72, 72, 0, '', 'INDIGENT', '2018-08-02', 1),
(73, 73, 0, '', 'INDIGENT', '2018-08-02', 1),
(74, 74, 200, '42851', 'OK', '2018-08-02', 1),
(75, 75, 200, '42852', 'OK', '2018-08-02', 1),
(76, 76, 0, '', 'INDIGENT', '2018-08-02', 1),
(77, 77, 0, '', 'INDIGENT', '2018-08-02', 1),
(78, 78, 0, '', 'INDIGENT', '2018-08-02', 1),
(79, 79, 0, '', 'INDIGENT', '2018-08-02', 1),
(80, 80, 0, '', 'INDIGENT', '2018-08-02', 1),
(81, 81, 0, '', 'INDIGENT', '2018-08-02', 1),
(82, 82, 200, '200', 'OK', '2018-08-03', 1),
(83, 83, 0, '', 'INDIGENT', '2018-08-03', 1),
(84, 84, 200, '2546', 'OK', '2018-08-03', 1),
(85, 85, 0, '', 'INDIGENT', '2018-08-06', 1),
(86, 86, 0, '', 'INDIGENT', '2018-08-06', 1),
(87, 87, 200, '42896', 'OK', '2018-08-06', 1),
(88, 88, 0, '', 'INDIGENT', '2018-08-06', 1),
(89, 89, 0, '', 'INDIGENT', '2018-08-06', 1),
(90, 90, 200, '42899', 'OK', '2018-08-06', 1),
(91, 91, 200, '42900', 'OK', '2018-08-06', 1),
(92, 92, 200, '42901', 'OK', '2018-08-06', 1),
(93, 93, 0, '', 'INDIGENT', '2018-08-06', 1),
(94, 94, 0, '', 'INDIGENT', '2018-08-06', 1),
(95, 95, 200, '42904', 'OK', '2018-08-06', 1),
(96, 96, 200, '42906', 'OK', '2018-08-06', 1),
(97, 97, 0, '', 'INDIGENT', '2018-08-06', 1),
(98, 98, 0, '', 'INDIGENT', '2018-08-06', 1),
(99, 99, 0, '', 'INDIGENT', '2018-08-06', 1),
(100, 100, 0, '', 'INDIGENT', '2018-08-06', 1),
(101, 101, 695, '', 'OK', '2018-08-06', 1),
(102, 102, 0, '', 'INDIGENT', '2018-08-06', 1),
(103, 103, 0, '', 'INDIGENT', '2018-08-06', 1),
(104, 104, 0, '', 'INDIGENT', '2018-08-06', 1),
(105, 105, 0, '', 'INDIGENT', '2018-08-06', 1),
(106, 106, 0, '', 'INDIGENT', '2018-08-06', 1),
(107, 107, 200, '429117', 'OK', '2018-08-06', 1),
(108, 108, 0, '', 'OK', '2018-08-06', 1),
(109, 109, 200, '300', 'OK', '2018-08-05', 1),
(110, 110, 0, '', 'CATEGORY', '2018-08-05', 1),
(111, 111, 200, '200', 'OK', '2018-08-06', 1),
(112, 112, 0, '', 'INDIGENT', '2018-08-06', 1),
(113, 113, 0, '', 'INDIGENT', '2018-08-06', 1),
(114, 114, 200, '42919', 'OK', '2018-08-06', 1),
(115, 115, 0, '', 'INDIGENT', '2018-08-06', 1),
(116, 116, 200, '42923', 'OK', '2018-08-06', 1),
(117, 117, 200, '42924', 'OK', '2018-08-06', 1),
(118, 118, 0, '', 'INDIGENT', '2018-08-06', 1),
(119, 119, 200, '42927', 'OK', '2018-08-06', 1),
(120, 120, 200, '42930', 'OK', '2018-08-06', 1),
(121, 121, 0, '', 'INDIGENT', '2018-08-05', 1),
(122, 122, 200, '42929', 'OK', '2018-08-06', 1),
(123, 123, 0, '', 'INDIGENT', '2018-08-06', 1),
(124, 124, 0, '', 'INDIGENT', '2018-08-06', 1),
(125, 125, 0, '', 'INDIGENT', '2018-08-07', 1),
(126, 126, 0, '', 'INDIGENT', '2018-08-06', 1),
(127, 127, 160, '', 'OK', '2018-08-07', 1),
(128, 128, 0, '', 'INDIGENT', '2018-08-07', 1),
(129, 129, 0, '', 'INDIGENT', '2018-08-07', 1),
(130, 130, 0, '', 'INDIGENT', '2018-08-07', 1),
(131, 131, 0, '', 'INDIGENT', '2018-08-07', 1),
(132, 132, 0, '', 'INDIGENT', '2018-08-07', 1),
(133, 133, 200, '42940', 'OK', '2018-08-07', 1),
(134, 134, 200, '42941', 'OK', '2018-08-07', 1),
(135, 135, 0, '', 'INDIGENT', '2018-08-07', 1),
(136, 136, 360, '', 'OK', '2018-08-07', 1),
(137, 137, 200, '42943', 'OK', '2018-08-07', 1),
(138, 138, 200, '42944', 'OK', '2018-08-07', 1),
(139, 139, 0, '', 'INDIGENT', '2018-08-07', 1),
(140, 140, 180, '', 'OK', '2018-08-07', 1),
(141, 141, 200, '42948', 'OK', '2018-08-07', 1),
(142, 142, 200, '42947', 'OK', '2018-08-07', 1),
(143, 143, 200, '42951', 'OK', '2018-08-07', 1),
(144, 144, 200, '42950', 'OK', '2018-08-07', 1),
(145, 145, 200, '42949', 'OK', '2018-08-07', 1),
(146, 146, 200, '42954', 'OK', '2018-08-07', 1),
(147, 147, 200, '42953', 'OK', '2018-08-07', 1),
(148, 148, 200, '42952', 'OK', '2018-08-07', 1),
(149, 149, 0, '', 'INDIGENT', '2018-08-07', 1),
(150, 150, 1040, '42956', 'OK', '2018-08-07', 1),
(151, 151, 3504, '42956', 'OK', '2018-08-07', 1),
(152, 152, 0, '', 'INDIGENT', '2018-08-07', 1),
(153, 153, 0, '', 'INDIGENT', '2018-08-07', 1),
(154, 154, 0, '', 'INDIGENT', '2018-08-07', 1),
(155, 155, 180, '', 'OK', '2018-08-07', 1),
(156, 156, 360, '', 'OK', '2018-08-07', 1),
(157, 157, 3202, '42962', 'OK', '2018-08-07', 1),
(158, 158, 0, '', 'INDIGENT', '2018-08-07', 1),
(159, 159, 0, '', 'INDIGENT', '2018-08-07', 1),
(160, 160, 210, '', 'OK', '2018-08-07', 1),
(161, 161, 200, '200', 'OK', '2018-08-05', 1),
(162, 162, 0, '', 'INDIGENT', '2018-08-07', 1),
(163, 163, 0, '', 'OK', '2018-08-07', 1),
(164, 164, 0, '', 'INDIGENT', '2018-08-05', 1),
(165, 165, 0, '', 'INDIGENT', '2018-08-05', 1),
(166, 166, 200, '202', 'OK', '2018-08-03', 1),
(167, 167, 0, '', 'INDIGENT', '2018-08-07', 30),
(168, 168, 200, '2025', 'OK', '2018-08-03', 1),
(169, 169, 200, '2054', 'OK', '2018-08-05', 1),
(170, 170, 0, '', 'INDIGENT', '2018-08-06', 30),
(171, 171, 0, '', 'INDIGENT', '2018-08-07', 30),
(172, 172, 0, '', 'INDIGENT', '2018-08-07', 30),
(173, 173, 0, '', 'INDIGENT', '2018-08-00', 30),
(174, 174, 0, '', 'INDIGENT', '2018-08-06', 30),
(175, 175, 0, '', 'INDIGENT', '2018-08-06', 30),
(176, 176, 0, '', 'INDIGENT', '2018-08-06', 30),
(177, 177, 0, '', 'INDIGENT', '2018-08-06', 30),
(178, 178, 0, '', 'INDIGENT', '2018-08-06', 30),
(179, 179, 0, '', 'INDIGENT', '2018-08-03', 1),
(180, 180, 200, '42968', 'OK', '2018-08-07', 30),
(181, 181, 700, '', 'OK', '2018-08-05', 1),
(182, 182, 200, '42969', 'OK', '2018-08-07', 30),
(183, 183, 200, '2013', 'OK', '2018-08-07', 1),
(184, 184, 200, '4040', 'OK', '2018-08-05', 1),
(185, 185, 200, '4125', 'OK', '2018-08-07', 1),
(186, 186, 0, '', 'INDIGENT', '2018-08-03', 1),
(187, 187, 0, '', 'INDIGENT', '2018-08-07', 1),
(188, 188, 200, '2036', 'OK', '2018-08-03', 1),
(189, 189, 0, '', 'INDIGENT', '2018-08-07', 1),
(190, 190, 0, '', 'INDIGENT', '2018-08-03', 1),
(191, 191, 1005, '', 'OK', '2018-08-07', 30),
(192, 192, 0, '', 'INDIGENT', '2018-08-07', 1),
(193, 193, 0, '', 'INDIGENT', '2018-08-05', 1),
(194, 194, 200, '1256', 'OK', '2018-08-03', 1),
(195, 195, 200, '231', 'OK', '2018-08-07', 1),
(196, 196, 0, '', 'INDIGENT', '2018-08-07', 1),
(197, 197, 0, '', 'INDIGENT', '2018-08-08', 1),
(198, 198, 200, '42973', 'OK', '2018-08-08', 1),
(199, 199, 200, '42974', 'OK', '2018-08-08', 1),
(200, 200, 0, '', 'INDIGENT', '2018-08-08', 1),
(201, 201, 0, '', 'INDIGENT', '2018-08-08', 1),
(202, 202, 0, '', 'INDIGENT', '2018-08-08', 1),
(203, 203, 200, '42977', 'OK', '2018-08-08', 1),
(204, 204, 200, '42978', 'OK', '2018-08-08', 1),
(205, 205, 0, '', 'INDIGENT', '2018-08-08', 1),
(206, 206, 0, '', 'INDIGENT', '2018-08-08', 1),
(207, 207, 200, '42980', 'OK', '2018-08-08', 1),
(208, 208, 0, '', 'INDIGENT', '2018-08-08', 1),
(209, 209, 200, '42981', 'OK', '2018-08-08', 1),
(210, 210, 0, '', 'INDIGENT', '2018-08-04', 1),
(211, 211, 0, '', 'INDIGENT', '2018-08-04', 1),
(212, 212, 0, '', 'INDIGENT', '2018-08-04', 1),
(213, 213, 0, '', 'INDIGENT', '2018-08-04', 1),
(214, 214, 0, '', 'INDIGENT', '2018-08-04', 1),
(215, 215, 200, '30', 'OK', '2018-08-04', 1),
(216, 216, 0, '', 'INDIGENT', '2018-08-08', 1),
(217, 217, 200, '1254', 'OK', '2018-08-04', 1),
(218, 218, 200, '2365', 'OK', '2018-08-08', 1),
(219, 219, 200, '2569', 'OK', '2018-08-08', 1),
(220, 220, 0, '', 'INDIGENT', '2018-08-08', 1),
(221, 221, 0, '', 'INDIGENT', '2018-08-04', 1),
(222, 222, 0, '', 'INDIGENT', '2018-08-07', 1),
(223, 223, 200, '5698', 'OK', '2018-08-04', 1),
(224, 224, 495, '', 'OK', '2018-08-08', 1),
(225, 225, 0, '', 'INDIGENT', '2018-08-05', 1),
(226, 226, 200, '200', 'OK', '2018-08-07', 1),
(227, 227, 200, '1236', 'OK', '2018-08-08', 1),
(228, 228, 200, '200', 'OK', '2018-08-08', 1),
(229, 229, 0, '', 'INDIGENT', '2018-08-03', 1),
(230, 230, 0, '', 'INDIGENT', '2018-08-07', 1),
(231, 231, 0, '', 'INDIGENT', '2018-08-07', 1),
(232, 232, 200, '42984', 'OK', '2018-08-08', 1),
(233, 233, 0, '', 'INDIGENT', '2018-08-08', 1),
(234, 234, 0, '', 'OK', '2018-08-08', 1),
(235, 235, 200, '42987', 'OK', '2018-08-08', 1),
(236, 236, 0, '', 'INDIGENT', '2018-08-08', 1),
(237, 237, 200, '42990', 'OK', '2018-08-08', 1),
(238, 238, 0, '', 'INDIGENT', '2018-08-08', 1),
(239, 239, 0, '', 'INDIGENT', '2018-08-08', 30),
(240, 240, 200, '200', 'OK', '2018-08-08', 30),
(241, 241, 200, '42990', 'OK', '2018-08-08', 1),
(242, 242, 200, '200', 'OK', '2018-08-08', 1),
(243, 243, 200, '200', 'OK', '2018-08-08', 1),
(244, 244, 0, '', 'INDIGENT', '2018-08-08', 1),
(245, 245, 200, '42962', 'OK', '2018-08-09', 1),
(246, 246, 0, '', 'INDIGENT', '2018-08-09', 30),
(247, 247, 200, '42992', 'OK', '2018-08-09', 30),
(248, 248, 290, '', 'OK', '2018-08-09', 30),
(249, 249, 0, '', 'INDIGENT', '2018-08-09', 30),
(250, 250, 0, '', 'INDIGENT', '2018-08-09', 30),
(251, 251, 0, '', 'INDIGENT', '2018-08-09', 30),
(252, 252, 200, '42996', 'OK', '2018-08-09', 1),
(253, 253, 0, '', 'INDIGENT', '2018-08-09', 30),
(254, 254, 200, '42998', 'OK', '2018-08-09', 1),
(255, 255, 200, '42999', 'OK', '2018-08-09', 30),
(256, 256, 0, '', 'INDIGENT', '2018-08-09', 30),
(257, 257, 0, '', 'INDIGENT', '2018-08-09', 30),
(258, 258, 0, '', 'INDIGENT', '2018-08-09', 30),
(259, 259, 0, '', 'INDIGENT', '2018-08-09', 1),
(260, 260, 200, '43004', 'OK', '2018-08-09', 30),
(261, 261, 200, '43005', 'OK', '2018-08-09', 1),
(262, 262, 0, '', 'INDIGENT', '2018-08-09', 1),
(263, 263, 0, '', 'INDIGENT', '2018-08-09', 30),
(264, 264, 0, '', 'OK', '2018-08-09', 30),
(265, 265, 200, '43008', 'OK', '2018-08-09', 1),
(266, 266, 200, '43011', 'OK', '2018-08-09', 1),
(267, 267, 200, '43010', 'OK', '2018-08-09', 30),
(268, 268, 200, '43009', 'OK', '2018-08-09', 1),
(269, 269, 200, '43012', 'OK', '2018-08-09', 30),
(270, 270, 0, '', 'INDIGENT', '2018-08-09', 1),
(271, 271, 200, '43014', 'OK', '2018-08-09', 30),
(272, 272, 200, '43015', 'OK', '2018-08-09', 30),
(273, 273, 200, '43017', 'OK', '2018-08-09', 1),
(274, 274, 200, '43016', 'OK', '2018-08-09', 30),
(275, 275, 0, '', 'INDIGENT', '2018-08-09', 30),
(276, 276, 200, '43020', 'OK', '2018-08-09', 1),
(277, 277, 200, '43019', 'OK', '2018-08-09', 30),
(278, 278, 0, '', 'INDIGENT', '2018-08-09', 30),
(279, 279, 0, '', 'INDIGENT', '2018-08-09', 30),
(280, 280, 200, '43023', 'OK', '2018-08-09', 30),
(281, 281, 0, '', 'INDIGENT', '2018-08-09', 30),
(282, 282, 0, '', 'INDIGENT', '2018-08-09', 1),
(283, 283, 0, '', 'INDIGENT', '2018-08-09', 30),
(284, 284, 200, '43028', 'OK', '2018-08-09', 1),
(285, 285, 195, '', 'OK', '2018-08-09', 1),
(286, 286, 0, '', 'INDIGENT', '2018-08-09', 30),
(287, 287, 0, '', 'INDIGENT', '2018-08-09', 1),
(288, 288, 200, '43031', 'OK', '2018-08-09', 30),
(289, 289, 200, '43028', 'OK', '2018-08-09', 1),
(290, 290, 200, '43034', 'OK', '2018-08-09', 1),
(291, 291, 0, '', 'INDIGENT', '2018-08-09', 1),
(292, 292, 200, '43038', 'OK', '2018-08-09', 1),
(293, 293, 200, '43037', 'OK', '2018-08-09', 1),
(294, 294, 200, '43036', 'OK', '2018-08-09', 1),
(295, 295, 0, '', 'OK', '2018-08-09', 1),
(296, 296, 0, '', 'INDIGENT', '2018-08-09', 1),
(297, 297, 0, '', 'INDIGENT', '2018-08-09', 1),
(298, 298, 0, '', 'INDIGENT', '2018-08-10', 1),
(299, 299, 0, '', 'INDIGENT', '2018-08-10', 1),
(300, 300, 200, '43039', 'OK', '2018-08-10', 1),
(301, 301, 200, '43042', 'OK', '2018-08-10', 1),
(302, 302, 200, '43043', 'OK', '2018-08-10', 1),
(303, 303, 200, '43044', 'OK', '2018-08-10', 1),
(304, 304, 0, '', 'INDIGENT', '2018-08-10', 1),
(305, 305, 200, '43048', 'OK', '2018-08-10', 30),
(306, 306, 200, '43045', 'OK', '2018-08-10', 30),
(307, 307, 200, '43050', 'OK', '2018-08-10', 1),
(308, 308, 200, '43049', 'OK', '2018-08-10', 30),
(309, 309, 200, '4308', 'OK', '2018-08-10', 1),
(310, 310, 200, '43052', 'OK', '2018-08-10', 1),
(311, 311, 0, '', 'INDIGENT', '2018-08-10', 30),
(312, 312, 0, '', 'INDIGENT', '2018-08-10', 1),
(313, 313, 0, '', 'INDIGENT', '2018-08-10', 30),
(314, 314, 200, '43055', 'OK', '2018-08-10', 30),
(315, 315, 200, '43056', 'OK', '2018-08-10', 30),
(316, 316, 0, '', 'INDIGENT', '2018-08-10', 30),
(317, 317, 200, '43058', 'OK', '2018-08-10', 30),
(318, 318, 200, '43059', 'OK', '2018-08-10', 30),
(319, 319, 0, '', 'INDIGENT', '2018-08-10', 1),
(320, 320, 200, '43064', 'OK', '2018-08-10', 30),
(321, 321, 0, '', 'INDIGENT', '2018-08-10', 30),
(322, 322, 200, '43067', 'OK', '2018-08-10', 1),
(323, 323, 0, '', 'OK', '2018-08-10', 1),
(324, 324, 200, '43068', 'OK', '2018-08-10', 30),
(325, 325, 200, '43069', 'OK', '2018-08-10', 1),
(326, 326, 0, '', 'INDIGENT', '2018-08-10', 1),
(327, 327, 200, '43069', 'OK', '2018-08-10', 1),
(328, 328, 200, '43071', 'OK', '2018-08-10', 1),
(329, 329, 0, '', 'INDIGENT', '2018-08-10', 30),
(330, 330, 200, '43073', 'OK', '2018-08-10', 1),
(331, 331, 200, '43074', 'OK', '2018-08-10', 1),
(332, 332, 0, '', 'INDIGENT', '2018-08-10', 30),
(333, 333, 0, '', 'INDIGENT', '2018-08-10', 30),
(334, 334, 200, '43076', 'OK', '2018-08-10', 1),
(335, 335, 200, '43077', 'OK', '2018-08-10', 1),
(336, 336, 0, '', 'INDIGENT', '2018-08-10', 1),
(337, 337, 200, '43078', 'OK', '2018-08-10', 1),
(338, 338, 200, '443118', 'OK', '2018-08-13', 1),
(339, 339, 200, '43119', 'OK', '2018-08-13', 1),
(340, 340, 200, '43120', 'OK', '2018-08-13', 1),
(341, 341, 200, '43121', 'OK', '2018-08-13', 1),
(342, 342, 200, '43122', 'OK', '2018-08-13', 1),
(343, 343, 200, '42563', 'OK', '2018-08-11', 1),
(344, 344, 200, '43124', 'OK', '2018-08-13', 1),
(345, 345, 0, '', 'INDIGENT', '2018-08-13', 30),
(346, 346, 200, '43125', 'OK', '2018-08-13', 1),
(347, 347, 9900, '', 'OK', '2018-08-11', 1),
(348, 348, 200, '43126', 'OK', '2018-08-13', 30),
(349, 349, 0, '', 'INDIGENT', '2018-08-13', 1),
(350, 350, 15285, '', 'OK', '2018-08-11', 1),
(351, 351, 200, '43128', 'OK', '2018-08-13', 30),
(352, 352, 0, '', 'INDIGENT', '2018-08-13', 30),
(353, 353, 0, '', 'INDIGENT', '2018-08-13', 1),
(354, 354, 200, '42536', 'OK', '2018-08-11', 1),
(355, 355, 0, '', 'INDIGENT', '2018-08-13', 30),
(356, 356, 0, '', 'INDIGENT', '2018-08-13', 1),
(357, 357, 0, '', 'INDIGENT', '2018-08-13', 30),
(358, 358, 0, '', 'INDIGENT', '2018-08-13', 1),
(359, 359, 0, '', 'INDIGENT', '2018-08-13', 1),
(360, 360, 0, '', 'INDIGENT', '2018-08-13', 1),
(361, 361, 0, '', 'INDIGENT', '2018-08-13', 1),
(362, 362, 0, '', 'INDIGENT', '2018-08-11', 1),
(363, 363, 0, '', 'INDIGENT', '2018-08-13', 1),
(364, 364, 0, '', 'INDIGENT', '2018-08-13', 1),
(365, 365, 0, '', 'INDIGENT', '2018-08-13', 1),
(366, 366, 0, '', 'INDIGENT', '2018-08-13', 1),
(367, 367, 200, '43138', 'OK', '2018-08-13', 1),
(368, 368, 200, '43139', 'OK', '2018-08-13', 1),
(369, 369, 200, '43141', 'OK', '2018-08-13', 30),
(370, 370, 0, '', 'INDIGENT', '2018-08-13', 1),
(371, 371, 0, '', 'INDIGENT', '2018-08-13', 30),
(372, 372, 200, '43144', 'OK', '2018-08-13', 1),
(373, 373, 200, '43145', 'OK', '2018-08-13', 1),
(374, 374, 0, '', 'INDIGENT', '2018-08-13', 30),
(375, 375, 0, '', 'INDIGENT', '2018-08-13', 1),
(376, 376, 0, '', 'INDIGENT', '2018-08-13', 1),
(377, 377, 200, '43149', 'OK', '2018-08-13', 30),
(378, 378, 0, '', 'INDIGENT', '2018-08-13', 1),
(379, 379, 0, '', 'INDIGENT', '2018-08-13', 30),
(380, 380, 0, '', 'INDIGENT', '2018-08-13', 30),
(381, 381, 200, '43153', 'OK', '2018-08-13', 1),
(382, 382, 200, '43154', 'OK', '2018-08-13', 1),
(383, 383, 200, '43155', 'OK', '2018-08-13', 30),
(384, 384, 200, '43156', 'OK', '2018-08-13', 1),
(385, 385, 200, '43156', 'OK', '2018-08-13', 1),
(386, 386, 200, '43157', 'OK', '2018-08-13', 1),
(387, 387, 0, '', 'INDIGENT', '2018-08-13', 30),
(388, 388, 200, '43160', 'OK', '2018-08-13', 1),
(389, 389, 200, '45698', 'OK', '2018-08-13', 1),
(390, 390, 0, '', 'INDIGENT', '2018-08-13', 30),
(391, 391, 0, '', 'INDIGENT', '2018-08-13', 1),
(392, 392, 200, '43163', 'OK', '2018-08-13', 1),
(393, 393, 200, '43258', 'OK', '2018-08-13', 1),
(394, 394, 0, '', 'INDIGENT', '2018-08-13', 30),
(395, 395, 0, '', 'INDIGENT', '2018-08-13', 1),
(396, 396, 200, '42569', 'OK', '2018-08-13', 1),
(397, 397, 0, '', 'INDIGENT', '2018-08-13', 1),
(398, 398, 0, '', 'INDIGENT', '2018-08-13', 1),
(399, 399, 200, '45212', 'OK', '2018-08-13', 1),
(400, 400, 0, '', 'INDIGENT', '2018-08-13', 1),
(401, 401, 200, '43166', 'OK', '2018-08-13', 30),
(402, 402, 200, '43167', 'OK', '2018-08-13', 30),
(403, 403, 0, '', 'INDIGENT', '2018-08-11', 1),
(404, 404, 0, '', 'INDIGENT', '2018-08-13', 30),
(405, 405, 200, '45213', 'OK', '2018-08-10', 1),
(406, 406, 200, '23561', 'OK', '2018-08-11', 1),
(407, 407, 200, '43168', 'OK', '2018-08-13', 1),
(408, 408, 200, '23651', 'OK', '2018-08-10', 1),
(409, 409, 0, '', 'INDIGENT', '2018-08-13', 1),
(410, 410, 0, '', 'INDIGENT', '2018-08-13', 1),
(411, 411, 0, '', 'INDIGENT', '2018-08-13', 1),
(412, 412, 0, '', 'INDIGENT', '2018-08-12', 1),
(413, 413, 200, '43170', 'OK', '2018-08-13', 30),
(414, 414, 0, '', 'INDIGENT', '2018-08-06', 1),
(415, 415, 200, '23652', 'OK', '2018-08-12', 1),
(416, 416, 250, '', 'OK', '2018-08-12', 1),
(417, 417, 200, '43171', 'OK', '2018-08-13', 30),
(418, 418, 200, '2563', 'OK', '2018-08-12', 1),
(419, 419, 255, '', 'OK', '2018-08-12', 1),
(420, 420, 200, '43172', 'OK', '2018-08-13', 30),
(421, 421, 200, '2542', 'OK', '2018-08-13', 1),
(422, 422, 200, '4521', 'OK', '2018-08-12', 1),
(423, 423, 200, '2365', 'OK', '2018-08-12', 1),
(424, 424, 275, '', 'OK', '2018-08-12', 1),
(425, 425, 200, '2031', 'OK', '2018-08-13', 1),
(426, 426, 200, '2031', 'OK', '2018-08-12', 1),
(427, 427, 0, '', 'INDIGENT', '2018-08-12', 1),
(428, 428, 200, '4525', 'OK', '2018-08-13', 1),
(429, 429, 200, '2356', 'OK', '2018-08-13', 1),
(430, 430, 0, '', 'INDIGENT', '2018-08-13', 30),
(431, 431, 0, '', 'INDIGENT', '2018-08-12', 1),
(432, 432, 0, '', 'INDIGENT', '2018-08-12', 1),
(433, 433, 200, '2015', 'OK', '2018-08-12', 1),
(434, 434, 200, '43178', 'OK', '2018-08-14', 30),
(435, 435, 200, '4356', 'OK', '2018-08-14', 1),
(436, 436, 200, '1254', 'OK', '2018-08-11', 1),
(437, 437, 200, '43177', 'OK', '2018-08-14', 30),
(438, 438, 200, '1254', 'OK', '2018-08-14', 1),
(439, 439, 200, '1254', 'OK', '2018-08-12', 1),
(440, 440, 200, '5823', 'OK', '2018-08-11', 1),
(441, 441, 200, '43178', 'OK', '2018-08-14', 30),
(442, 442, 200, '1254', 'OK', '2018-08-11', 1),
(443, 443, 0, '', 'INDIGENT', '2018-08-14', 30),
(444, 444, 200, '1235', 'OK', '2018-08-11', 1),
(445, 445, 0, '', 'INDIGENT', '2018-08-14', 30),
(446, 446, 200, '200', 'OK', '2018-08-14', 30),
(447, 447, 0, '', 'INDIGENT', '2018-08-11', 1),
(448, 448, 200, '43180', 'OK', '2018-08-14', 30),
(449, 449, 200, '43181', 'OK', '2018-08-14', 30),
(450, 450, 200, '1254', 'OK', '2018-08-11', 1),
(451, 451, 200, '1235', 'OK', '2018-08-11', 1),
(452, 452, 0, '', 'INDIGENT', '2018-08-14', 30),
(453, 453, 200, '1236', 'OK', '2018-08-11', 1),
(454, 454, 200, '43183', 'OK', '2018-08-14', 30),
(455, 455, 200, '43184', 'OK', '2018-08-14', 30),
(456, 456, 200, '2056', 'OK', '2018-08-11', 1),
(457, 457, 200, '43185', 'OK', '2018-08-14', 30),
(458, 458, 200, '43186', 'OK', '2018-08-14', 30),
(459, 459, 0, '', 'INDIGENT', '2018-08-14', 30),
(460, 460, 200, '2365', 'OK', '2018-08-13', 1),
(461, 461, 200, '43188', 'OK', '2018-08-14', 30),
(462, 462, 0, '', 'INDIGENT', '2018-08-12', 1),
(463, 463, 200, '43189', 'OK', '2018-08-14', 30),
(464, 464, 200, '43190', 'OK', '2018-08-14', 30),
(465, 465, 0, '', 'INDIGENT', '2018-08-14', 30),
(466, 466, 0, '', 'INDIGENT', '2018-08-14', 30),
(467, 467, 200, '43192', 'OK', '2018-08-14', 30),
(468, 468, 200, '43193', 'OK', '2018-08-14', 30),
(469, 469, 200, '43194', 'OK', '2018-08-14', 30),
(470, 470, 200, '43195', 'OK', '2018-08-14', 30),
(471, 471, 0, '', 'INDIGENT', '2018-08-14', 1),
(472, 472, 200, '43195', 'OK', '2018-08-14', 1),
(473, 473, 200, '43196', 'OK', '2018-08-14', 1),
(474, 474, 0, '', 'INDIGENT', '2018-08-14', 1),
(475, 475, 0, '', 'INDIGENT', '2018-08-14', 1),
(476, 476, 0, '', 'INDIGENT', '2018-08-14', 1),
(477, 477, 200, '43200', 'OK', '2018-08-14', 30),
(478, 478, 200, '43201', 'OK', '2018-08-14', 30),
(479, 479, 200, '43202', 'OK', '2018-08-14', 30),
(480, 480, 275, '', 'OK', '2018-08-14', 30),
(481, 481, 200, '38253', 'OK', '2018-08-14', 30),
(482, 482, 200, '38254', 'OK', '2018-08-14', 30),
(483, 483, 200, '38255', 'OK', '2018-08-14', 30),
(484, 484, 0, '', 'INDIGENT', '2018-08-14', 30),
(485, 485, 0, '', 'INDIGENT', '2018-08-14', 30),
(486, 486, 200, '38257', 'OK', '2018-08-14', 30),
(487, 487, 200, '38258', 'OK', '2018-08-14', 30),
(488, 488, 200, '38259', 'OK', '2018-08-14', 30),
(489, 489, 200, '38260', 'OK', '2018-08-14', 30),
(490, 490, 0, '', 'INDIGENT', '2018-08-14', 30),
(491, 491, 0, '38262', 'OK', '2018-08-14', 30),
(492, 492, 225, '', 'OK', '2018-08-14', 1),
(493, 493, 200, '38264', 'OK', '2018-08-14', 1),
(494, 494, 200, '38265', 'OK', '2018-08-14', 1),
(495, 495, 200, '38266', 'OK', '2018-08-14', 1),
(496, 496, 200, '38287', 'OK', '2018-08-16', 1),
(497, 497, 0, '', 'INDIGENT', '2018-08-16', 1),
(498, 498, 200, '38289', 'OK', '2018-08-16', 1),
(499, 499, 0, '', 'INDIGENT', '2018-08-16', 1),
(500, 500, 0, '', 'INDIGENT', '2018-08-16', 1),
(501, 501, 200, '38292', 'OK', '2018-08-16', 1),
(502, 502, 200, '38292', 'OK', '2018-08-16', 1),
(503, 503, 200, '38295', 'OK', '2018-08-16', 1),
(504, 504, 200, '38298', 'OK', '2018-08-16', 1),
(505, 505, 0, '', 'INDIGENT', '2018-08-16', 30),
(506, 506, 0, '', 'INDIGENT', '2018-08-16', 30),
(507, 507, 200, '38294', 'OK', '2018-08-16', 1),
(508, 508, 200, '38297', 'OK', '2018-08-16', 30),
(509, 509, 200, '38296', 'OK', '2018-08-16', 1),
(510, 510, 200, '38301', 'OK', '2018-08-16', 30),
(511, 511, 0, '', 'INDIGENT', '2018-08-16', 1),
(512, 512, 200, '38307', 'OK', '2018-08-16', 30),
(513, 513, 200, '38306', 'OK', '2018-08-16', 1),
(514, 514, 200, '38305', 'OK', '2018-08-16', 30),
(515, 515, 0, '', 'INDIGENT', '2018-08-16', 30),
(516, 516, 200, '38310', 'OK', '2018-08-16', 1),
(517, 517, 0, '', 'INDIGENT', '2018-08-16', 1),
(518, 518, 0, '', 'INDIGENT', '2018-08-16', 30),
(519, 519, 200, '38311', 'OK', '2018-08-16', 30),
(520, 520, 1040, '38312', 'OK', '2018-08-16', 30),
(521, 521, 4758, '38312', 'OK', '2018-08-16', 30),
(522, 522, 0, '', 'INDIGENT', '2018-08-16', 30),
(523, 523, 0, '', 'INDIGENT', '2018-08-16', 1),
(524, 524, 0, '', 'INDIGENT', '2018-08-16', 30),
(525, 525, 0, '', 'INDIGENT', '2018-08-16', 1),
(526, 526, 200, '38316', 'OK', '2018-08-16', 30),
(527, 527, 200, '38317', 'OK', '2018-08-16', 30),
(528, 528, 200, '2563', 'OK', '2018-08-16', 1),
(529, 529, 200, '1235', 'OK', '2018-08-15', 1),
(530, 530, 200, '38329', 'OK', '2018-08-16', 30),
(531, 531, 200, '2568', 'OK', '2018-08-15', 1),
(532, 532, 200, '45120', 'OK', '2018-08-16', 1),
(533, 533, 200, '2356', 'OK', '2018-08-15', 1),
(534, 534, 200, '38321', 'OK', '2018-08-16', 30),
(535, 535, 200, '2365', 'OK', '2018-08-15', 1),
(536, 536, 250, '', 'OK', '2018-08-15', 1),
(537, 537, 200, '4523', 'OK', '2018-08-15', 1),
(538, 538, 200, '38321', 'OK', '2018-08-16', 30),
(539, 539, 200, '38320', 'OK', '2018-08-16', 30);

-- --------------------------------------------------------

--
-- Table structure for table `pa_info`
--

CREATE TABLE `pa_info` (
  `PatientID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DateofBirth` date NOT NULL,
  `Sex` varchar(255) NOT NULL,
  `FamilyCode` varchar(255) NOT NULL,
  `VillageID` int(11) NOT NULL,
  `AffiliateName` varchar(255) NOT NULL DEFAULT ' ',
  `Affectation` varchar(255) NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pa_insurance_cards`
--

CREATE TABLE `pa_insurance_cards` (
  `PatientInsuranceCardsID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `InsuranceCardsID` varchar(255) NOT NULL,
  `InsuranceNameID` int(11) NOT NULL,
  `AffiliateNumber` varchar(255) NOT NULL,
  `AffiliateName` varchar(255) NOT NULL,
  `Affectation` varchar(255) NOT NULL,
  `Relation` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pa_records`
--

CREATE TABLE `pa_records` (
  `PatientRecordID` int(11) NOT NULL,
  `DocID` varchar(100) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `InsuranceNameID` int(11) NOT NULL,
  `InsuranceCardID` varchar(100) NOT NULL,
  `NationalID` varchar(255) DEFAULT NULL,
  `FamilyCategory` int(11) NOT NULL DEFAULT '3',
  `Weight` varchar(255) NOT NULL,
  `Temperature` double DEFAULT NULL,
  `DateIn` date NOT NULL,
  `Status` int(11) NOT NULL COMMENT '0. In Service 1. No Transfer 2. With Transfert 3. Transfert and Ambulance',
  `ReceptionistID` int(11) NOT NULL,
  `VillageID` int(11) NOT NULL DEFAULT '1',
  `DocStatus` varchar(255) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pa_summary`
--

CREATE TABLE `pa_summary` (
  `PatientSummaryID` int(11) NOT NULL,
  `InsuranceName` varchar(255) NOT NULL,
  `CPC` double NOT NULL,
  `CPN` double NOT NULL,
  `PST` double NOT NULL,
  `MAT` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pa_summary`
--

INSERT INTO `pa_summary` (`PatientSummaryID`, `InsuranceName`, `CPC`, `CPN`, `PST`, `MAT`, `Date`) VALUES
(1, 'CBHI', 4, 1, 0, 0, '2018-07-31'),
(2, 'RSSB RAMA', 1, 0, 0, 0, '2018-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `pst_records`
--

CREATE TABLE `pst_records` (
  `PSTRecordID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `DocIDs` varchar(255) NOT NULL,
  `Frequency` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `se_consultation`
--

CREATE TABLE `se_consultation` (
  `ServiceConsultationID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `ConsulationID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se_consultation`
--

INSERT INTO `se_consultation` (`ServiceConsultationID`, `ServiceID`, `ConsulationID`, `Date`, `Status`) VALUES
(1, 1, 10, '2018-07-28 00:00:00', 1),
(2, 1, 11, '2018-07-28 00:00:00', 1),
(3, 1, 15, '2018-07-28 00:00:00', 1),
(4, 1, 16, '2018-07-28 00:00:00', 1),
(5, 2, 10, '2018-07-28 00:00:00', 1),
(6, 2, 11, '2018-07-28 00:00:00', 1),
(7, 2, 15, '2018-07-28 00:00:00', 1),
(8, 2, 16, '2018-07-28 00:00:00', 1),
(9, 3, 10, '2018-07-28 00:00:00', 1),
(10, 3, 15, '2018-07-28 00:00:00', 1),
(11, 6, 12, '2018-07-28 00:00:00', 1),
(12, 6, 14, '2018-07-28 00:00:00', 1),
(13, 6, 10, '2018-07-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `se_name`
--

CREATE TABLE `se_name` (
  `ServiceNameID` int(11) NOT NULL,
  `ServiceName` varchar(255) NOT NULL,
  `ServiceCode` varchar(100) NOT NULL DEFAULT 'SE',
  `DirectorID` int(11) NOT NULL DEFAULT '1',
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `se_name`
--

INSERT INTO `se_name` (`ServiceNameID`, `ServiceName`, `ServiceCode`, `DirectorID`, `Status`) VALUES
(1, 'Consultation', 'CPC', 11, 1),
(2, 'Maternity', 'MAT', 12, 1),
(3, 'Pansement', 'PST', 13, 1),
(4, 'TB', 'TB', 1, 0),
(5, 'ARV', 'ARV', 1, 0),
(6, 'Consultation Prenatale', 'CPN', 8, 1),
(7, 'Stomatology', 'STO', 23, 0),
(8, 'Family Planning', 'PF', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `se_records`
--

CREATE TABLE `se_records` (
  `ServiceRecordID` int(11) NOT NULL,
  `PatientRecordID` int(11) NOT NULL,
  `ServiceNameID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sy_center`
--

CREATE TABLE `sy_center` (
  `CenterID` int(11) NOT NULL,
  `CenterName` varchar(255) NOT NULL,
  `Level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_center`
--

INSERT INTO `sy_center` (`CenterID`, `CenterName`, `Level`) VALUES
(1, 'Nyarure', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sy_conge`
--

CREATE TABLE `sy_conge` (
  `DateID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Frequency` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_conge`
--

INSERT INTO `sy_conge` (`DateID`, `Date`, `Frequency`, `UserID`) VALUES
(22, '2018-08-03', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sy_ids`
--

CREATE TABLE `sy_ids` (
  `ID` int(11) NOT NULL,
  `InsuranceCategoryID` int(11) NOT NULL,
  `LastID` int(11) NOT NULL,
  `Day` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_ids`
--

INSERT INTO `sy_ids` (`ID`, `InsuranceCategoryID`, `LastID`, `Day`) VALUES
(1, 2, 1, '20180728'),
(2, 2, 1, '20180720'),
(3, 2, 1, '20180731'),
(4, 2, 2, '20180731'),
(5, 4, 1, '20180731'),
(6, 2, 3, '20180731'),
(7, 5, 1, '20180731'),
(8, 2, 4, '20180731'),
(9, 2, 5, '20180731'),
(10, 3, 1, '20180801'),
(11, 2, 1, '20180801'),
(12, 2, 2, '20180801'),
(13, 2, 3, '20180801'),
(14, 2, 4, '20180801'),
(15, 2, 5, '20180801'),
(16, 2, 6, '20180801'),
(17, 2, 7, '20180801'),
(18, 2, 8, '20180801'),
(19, 2, 9, '20180801'),
(20, 2, 10, '20180801'),
(21, 2, 11, '20180801'),
(22, 4, 1, '20180801'),
(23, 4, 2, '20180801'),
(24, 2, 12, '20180801'),
(25, 2, 13, '20180801'),
(26, 5, 1, '20180801'),
(27, 2, 14, '20180801'),
(28, 2, 15, '20180801'),
(29, 2, 16, '20180801'),
(30, 2, 17, '20180801'),
(31, 2, 18, '20180801'),
(32, 2, 19, '20180801'),
(33, 2, 20, '20180801'),
(34, 2, 1, '20180802'),
(35, 2, 2, '20180802'),
(36, 2, 3, '20180802'),
(37, 2, 4, '20180802'),
(38, 2, 5, '20180802'),
(39, 2, 6, '20180802'),
(40, 2, 7, '20180802'),
(41, 2, 8, '20180802'),
(42, 2, 9, '20180802'),
(43, 2, 10, '20180802'),
(44, 2, 11, '20180802'),
(45, 2, 12, '20180802'),
(46, 2, 13, '20180802'),
(47, 2, 14, '20180802'),
(48, 4, 1, '20180802'),
(49, 2, 15, '20180802'),
(50, 2, 16, '20180802'),
(51, 2, 17, '20180802'),
(52, 2, 18, '20180802'),
(53, 2, 19, '20180802'),
(54, 2, 20, '20180802'),
(55, 2, 21, '20180802'),
(56, 2, 22, '20180802'),
(57, 2, 23, '20180802'),
(58, 2, 24, '20180802'),
(59, 2, 25, '20180802'),
(60, 2, 26, '20180802'),
(61, 2, 27, '20180802'),
(62, 2, 28, '20180802'),
(63, 5, 1, '20180802'),
(64, 2, 29, '20180802'),
(65, 2, 30, '20180802'),
(66, 4, 2, '20180802'),
(67, 2, 31, '20180802'),
(68, 2, 32, '20180802'),
(69, 2, 33, '20180802'),
(70, 2, 34, '20180802'),
(71, 2, 35, '20180802'),
(72, 2, 36, '20180802'),
(73, 2, 37, '20180802'),
(74, 2, 38, '20180802'),
(75, 2, 39, '20180802'),
(76, 2, 40, '20180802'),
(77, 2, 41, '20180802'),
(78, 2, 42, '20180802'),
(79, 2, 43, '20180802'),
(80, 2, 44, '20180802'),
(81, 2, 45, '20180802'),
(82, 2, 1, '20180803'),
(83, 2, 2, '20180803'),
(84, 2, 3, '20180803'),
(85, 2, 1, '20180806'),
(86, 2, 2, '20180806'),
(87, 2, 3, '20180806'),
(88, 2, 4, '20180806'),
(89, 2, 5, '20180806'),
(90, 2, 6, '20180806'),
(91, 2, 7, '20180806'),
(92, 2, 8, '20180806'),
(93, 2, 9, '20180806'),
(94, 2, 10, '20180806'),
(95, 2, 11, '20180806'),
(96, 2, 12, '20180806'),
(97, 2, 13, '20180806'),
(98, 2, 14, '20180806'),
(99, 2, 15, '20180806'),
(100, 2, 16, '20180806'),
(101, 4, 1, '20180806'),
(102, 2, 17, '20180806'),
(103, 2, 18, '20180806'),
(104, 2, 19, '20180806'),
(105, 2, 20, '20180806'),
(106, 2, 21, '20180806'),
(107, 2, 22, '20180806'),
(108, 4, 2, '20180806'),
(109, 2, 1, '20180805'),
(110, 2, 2, '20180805'),
(111, 2, 23, '20180806'),
(112, 2, 24, '20180806'),
(113, 2, 25, '20180806'),
(114, 2, 26, '20180806'),
(115, 2, 27, '20180806'),
(116, 2, 28, '20180806'),
(117, 2, 29, '20180806'),
(118, 2, 30, '20180806'),
(119, 2, 31, '20180806'),
(120, 2, 32, '20180806'),
(121, 2, 3, '20180805'),
(122, 2, 33, '20180806'),
(123, 2, 34, '20180806'),
(124, 2, 35, '20180806'),
(125, 2, 1, '20180807'),
(126, 2, 36, '20180806'),
(127, 4, 1, '20180807'),
(128, 2, 2, '20180807'),
(129, 2, 3, '20180807'),
(130, 2, 4, '20180807'),
(131, 2, 5, '20180807'),
(132, 2, 6, '20180807'),
(133, 2, 7, '20180807'),
(134, 2, 8, '20180807'),
(135, 2, 9, '20180807'),
(136, 4, 2, '20180807'),
(137, 2, 10, '20180807'),
(138, 2, 11, '20180807'),
(139, 2, 12, '20180807'),
(140, 4, 3, '20180807'),
(141, 2, 13, '20180807'),
(142, 2, 14, '20180807'),
(143, 2, 15, '20180807'),
(144, 2, 16, '20180807'),
(145, 2, 17, '20180807'),
(146, 2, 18, '20180807'),
(147, 2, 19, '20180807'),
(148, 2, 20, '20180807'),
(149, 2, 21, '20180807'),
(150, 5, 1, '20180807'),
(151, 5, 2, '20180807'),
(152, 2, 22, '20180807'),
(153, 2, 23, '20180807'),
(154, 2, 24, '20180807'),
(155, 4, 4, '20180807'),
(156, 4, 5, '20180807'),
(157, 5, 3, '20180807'),
(158, 2, 25, '20180807'),
(159, 2, 26, '20180807'),
(160, 4, 6, '20180807'),
(161, 2, 4, '20180805'),
(162, 2, 27, '20180807'),
(163, 4, 7, '20180807'),
(164, 2, 5, '20180805'),
(165, 2, 6, '20180805'),
(166, 2, 4, '20180803'),
(167, 2, 28, '20180807'),
(168, 2, 5, '20180803'),
(169, 2, 7, '20180805'),
(170, 2, 37, '20180806'),
(171, 2, 29, '20180807'),
(172, 2, 30, '20180807'),
(173, 2, 38, '20180806'),
(174, 2, 39, '20180806'),
(175, 2, 40, '20180806'),
(176, 2, 41, '20180806'),
(177, 2, 42, '20180806'),
(178, 2, 43, '20180806'),
(179, 2, 6, '20180803'),
(180, 2, 31, '20180807'),
(181, 4, 1, '20180805'),
(182, 2, 32, '20180807'),
(183, 2, 33, '20180807'),
(184, 2, 8, '20180805'),
(185, 2, 34, '20180807'),
(186, 2, 7, '20180803'),
(187, 2, 35, '20180807'),
(188, 2, 8, '20180803'),
(189, 2, 36, '20180807'),
(190, 2, 9, '20180803'),
(191, 4, 8, '20180807'),
(192, 2, 37, '20180807'),
(193, 2, 9, '20180805'),
(194, 2, 10, '20180803'),
(195, 2, 38, '20180807'),
(196, 2, 39, '20180807'),
(197, 2, 1, '20180808'),
(198, 2, 2, '20180808'),
(199, 2, 3, '20180808'),
(200, 2, 4, '20180808'),
(201, 2, 5, '20180808'),
(202, 2, 6, '20180808'),
(203, 2, 7, '20180808'),
(204, 2, 8, '20180808'),
(205, 2, 9, '20180808'),
(206, 2, 10, '20180808'),
(207, 2, 11, '20180808'),
(208, 2, 12, '20180808'),
(209, 2, 13, '20180808'),
(210, 2, 1, '20180804'),
(211, 2, 2, '20180804'),
(212, 2, 3, '20180804'),
(213, 2, 4, '20180804'),
(214, 2, 5, '20180804'),
(215, 2, 6, '20180804'),
(216, 2, 14, '20180808'),
(217, 2, 7, '20180804'),
(218, 2, 15, '20180808'),
(219, 2, 16, '20180808'),
(220, 2, 17, '20180808'),
(221, 2, 8, '20180804'),
(222, 2, 40, '20180807'),
(223, 2, 9, '20180804'),
(224, 4, 1, '20180808'),
(225, 2, 10, '20180805'),
(226, 2, 41, '20180807'),
(227, 2, 18, '20180808'),
(228, 2, 19, '20180808'),
(229, 2, 11, '20180803'),
(230, 2, 42, '20180807'),
(231, 2, 43, '20180807'),
(232, 2, 20, '20180808'),
(233, 2, 21, '20180808'),
(234, 4, 2, '20180808'),
(235, 2, 22, '20180808'),
(236, 2, 23, '20180808'),
(237, 2, 24, '20180808'),
(238, 2, 25, '20180808'),
(239, 2, 26, '20180808'),
(240, 2, 27, '20180808'),
(241, 2, 28, '20180808'),
(242, 2, 29, '20180808'),
(243, 2, 30, '20180808'),
(244, 2, 31, '20180808'),
(245, 2, 1, '20180809'),
(246, 2, 2, '20180809'),
(247, 2, 3, '20180809'),
(248, 4, 1, '20180809'),
(249, 2, 4, '20180809'),
(250, 2, 5, '20180809'),
(251, 2, 6, '20180809'),
(252, 2, 7, '20180809'),
(253, 2, 8, '20180809'),
(254, 2, 9, '20180809'),
(255, 2, 10, '20180809'),
(256, 2, 11, '20180809'),
(257, 2, 12, '20180809'),
(258, 2, 13, '20180809'),
(259, 2, 14, '20180809'),
(260, 2, 15, '20180809'),
(261, 2, 16, '20180809'),
(262, 2, 17, '20180809'),
(263, 2, 18, '20180809'),
(264, 4, 2, '20180809'),
(265, 2, 19, '20180809'),
(266, 2, 20, '20180809'),
(267, 2, 21, '20180809'),
(268, 2, 22, '20180809'),
(269, 2, 23, '20180809'),
(270, 2, 24, '20180809'),
(271, 2, 25, '20180809'),
(272, 2, 26, '20180809'),
(273, 2, 27, '20180809'),
(274, 2, 28, '20180809'),
(275, 2, 29, '20180809'),
(276, 2, 30, '20180809'),
(277, 2, 31, '20180809'),
(278, 2, 32, '20180809'),
(279, 2, 33, '20180809'),
(280, 2, 34, '20180809'),
(281, 2, 35, '20180809'),
(282, 2, 36, '20180809'),
(283, 2, 37, '20180809'),
(284, 2, 38, '20180809'),
(285, 4, 3, '20180809'),
(286, 2, 39, '20180809'),
(287, 2, 40, '20180809'),
(288, 2, 41, '20180809'),
(289, 2, 42, '20180809'),
(290, 2, 43, '20180809'),
(291, 2, 44, '20180809'),
(292, 2, 45, '20180809'),
(293, 2, 46, '20180809'),
(294, 2, 47, '20180809'),
(295, 4, 4, '20180809'),
(296, 2, 48, '20180809'),
(297, 2, 49, '20180809'),
(298, 2, 1, '20180810'),
(299, 2, 2, '20180810'),
(300, 2, 3, '20180810'),
(301, 2, 4, '20180810'),
(302, 2, 5, '20180810'),
(303, 2, 6, '20180810'),
(304, 2, 7, '20180810'),
(305, 2, 8, '20180810'),
(306, 2, 9, '20180810'),
(307, 2, 10, '20180810'),
(308, 2, 11, '20180810'),
(309, 2, 12, '20180810'),
(310, 2, 13, '20180810'),
(311, 2, 14, '20180810'),
(312, 2, 15, '20180810'),
(313, 2, 16, '20180810'),
(314, 2, 17, '20180810'),
(315, 2, 18, '20180810'),
(316, 2, 19, '20180810'),
(317, 2, 20, '20180810'),
(318, 2, 21, '20180810'),
(319, 2, 22, '20180810'),
(320, 2, 23, '20180810'),
(321, 2, 24, '20180810'),
(322, 2, 25, '20180810'),
(323, 4, 1, '20180810'),
(324, 2, 26, '20180810'),
(325, 2, 27, '20180810'),
(326, 2, 28, '20180810'),
(327, 2, 29, '20180810'),
(328, 2, 30, '20180810'),
(329, 2, 31, '20180810'),
(330, 2, 32, '20180810'),
(331, 2, 33, '20180810'),
(332, 2, 34, '20180810'),
(333, 2, 35, '20180810'),
(334, 2, 36, '20180810'),
(335, 2, 37, '20180810'),
(336, 2, 38, '20180810'),
(337, 2, 39, '20180810'),
(338, 2, 1, '20180813'),
(339, 2, 2, '20180813'),
(340, 2, 3, '20180813'),
(341, 2, 4, '20180813'),
(342, 2, 5, '20180813'),
(343, 2, 1, '20180811'),
(344, 2, 6, '20180813'),
(345, 2, 7, '20180813'),
(346, 2, 8, '20180813'),
(347, 4, 1, '20180811'),
(348, 2, 9, '20180813'),
(349, 2, 10, '20180813'),
(350, 4, 2, '20180811'),
(351, 2, 11, '20180813'),
(352, 2, 12, '20180813'),
(353, 2, 13, '20180813'),
(354, 2, 2, '20180811'),
(355, 2, 14, '20180813'),
(356, 2, 15, '20180813'),
(357, 2, 16, '20180813'),
(358, 2, 17, '20180813'),
(359, 2, 18, '20180813'),
(360, 2, 19, '20180813'),
(361, 2, 20, '20180813'),
(362, 2, 3, '20180811'),
(363, 2, 21, '20180813'),
(364, 2, 22, '20180813'),
(365, 2, 23, '20180813'),
(366, 2, 24, '20180813'),
(367, 2, 25, '20180813'),
(368, 2, 26, '20180813'),
(369, 2, 27, '20180813'),
(370, 2, 28, '20180813'),
(371, 2, 29, '20180813'),
(372, 2, 30, '20180813'),
(373, 2, 31, '20180813'),
(374, 2, 32, '20180813'),
(375, 2, 33, '20180813'),
(376, 2, 34, '20180813'),
(377, 2, 35, '20180813'),
(378, 2, 36, '20180813'),
(379, 2, 37, '20180813'),
(380, 2, 38, '20180813'),
(381, 2, 39, '20180813'),
(382, 2, 40, '20180813'),
(383, 2, 41, '20180813'),
(384, 2, 42, '20180813'),
(385, 2, 43, '20180813'),
(386, 2, 44, '20180813'),
(387, 2, 45, '20180813'),
(388, 2, 46, '20180813'),
(389, 2, 47, '20180813'),
(390, 2, 48, '20180813'),
(391, 2, 49, '20180813'),
(392, 2, 50, '20180813'),
(393, 2, 51, '20180813'),
(394, 2, 52, '20180813'),
(395, 2, 53, '20180813'),
(396, 2, 54, '20180813'),
(397, 2, 55, '20180813'),
(398, 2, 56, '20180813'),
(399, 2, 57, '20180813'),
(400, 2, 58, '20180813'),
(401, 2, 59, '20180813'),
(402, 2, 60, '20180813'),
(403, 2, 4, '20180811'),
(404, 2, 61, '20180813'),
(405, 2, 40, '20180810'),
(406, 2, 5, '20180811'),
(407, 2, 62, '20180813'),
(408, 2, 41, '20180810'),
(409, 2, 63, '20180813'),
(410, 2, 64, '20180813'),
(411, 2, 65, '20180813'),
(412, 2, 1, '20180812'),
(413, 2, 66, '20180813'),
(414, 2, 44, '20180806'),
(415, 2, 2, '20180812'),
(416, 4, 1, '20180812'),
(417, 2, 67, '20180813'),
(418, 2, 3, '20180812'),
(419, 4, 2, '20180812'),
(420, 2, 68, '20180813'),
(421, 2, 69, '20180813'),
(422, 2, 4, '20180812'),
(423, 2, 5, '20180812'),
(424, 4, 3, '20180812'),
(425, 2, 70, '20180813'),
(426, 2, 6, '20180812'),
(427, 2, 7, '20180812'),
(428, 2, 71, '20180813'),
(429, 2, 72, '20180813'),
(430, 2, 73, '20180813'),
(431, 2, 8, '20180812'),
(432, 2, 9, '20180812'),
(433, 2, 10, '20180812'),
(434, 2, 1, '20180814'),
(435, 2, 2, '20180814'),
(436, 2, 6, '20180811'),
(437, 2, 3, '20180814'),
(438, 2, 4, '20180814'),
(439, 2, 11, '20180812'),
(440, 2, 7, '20180811'),
(441, 2, 5, '20180814'),
(442, 2, 8, '20180811'),
(443, 2, 6, '20180814'),
(444, 2, 9, '20180811'),
(445, 2, 7, '20180814'),
(446, 2, 8, '20180814'),
(447, 2, 10, '20180811'),
(448, 2, 9, '20180814'),
(449, 2, 10, '20180814'),
(450, 2, 11, '20180811'),
(451, 2, 12, '20180811'),
(452, 2, 11, '20180814'),
(453, 2, 13, '20180811'),
(454, 2, 12, '20180814'),
(455, 2, 13, '20180814'),
(456, 2, 14, '20180811'),
(457, 2, 14, '20180814'),
(458, 2, 15, '20180814'),
(459, 2, 16, '20180814'),
(460, 2, 74, '20180813'),
(461, 2, 17, '20180814'),
(462, 2, 12, '20180812'),
(463, 2, 18, '20180814'),
(464, 2, 19, '20180814'),
(465, 2, 20, '20180814'),
(466, 2, 21, '20180814'),
(467, 2, 22, '20180814'),
(468, 2, 23, '20180814'),
(469, 2, 24, '20180814'),
(470, 2, 25, '20180814'),
(471, 2, 26, '20180814'),
(472, 2, 27, '20180814'),
(473, 2, 28, '20180814'),
(474, 2, 29, '20180814'),
(475, 2, 30, '20180814'),
(476, 2, 31, '20180814'),
(477, 2, 32, '20180814'),
(478, 2, 33, '20180814'),
(479, 2, 34, '20180814'),
(480, 4, 1, '20180814'),
(481, 2, 35, '20180814'),
(482, 2, 36, '20180814'),
(483, 2, 37, '20180814'),
(484, 2, 38, '20180814'),
(485, 2, 39, '20180814'),
(486, 2, 40, '20180814'),
(487, 2, 41, '20180814'),
(488, 2, 42, '20180814'),
(489, 2, 43, '20180814'),
(490, 2, 44, '20180814'),
(491, 2, 45, '20180814'),
(492, 4, 2, '20180814'),
(493, 2, 46, '20180814'),
(494, 2, 47, '20180814'),
(495, 2, 48, '20180814'),
(496, 2, 1, '20180816'),
(497, 2, 2, '20180816'),
(498, 2, 3, '20180816'),
(499, 2, 4, '20180816'),
(500, 2, 5, '20180816'),
(501, 2, 6, '20180816'),
(502, 2, 7, '20180816'),
(503, 2, 8, '20180816'),
(504, 2, 9, '20180816'),
(505, 2, 10, '20180816'),
(506, 2, 11, '20180816'),
(507, 2, 12, '20180816'),
(508, 2, 13, '20180816'),
(509, 2, 14, '20180816'),
(510, 2, 15, '20180816'),
(511, 2, 16, '20180816'),
(512, 2, 17, '20180816'),
(513, 2, 18, '20180816'),
(514, 2, 19, '20180816'),
(515, 2, 20, '20180816'),
(516, 2, 21, '20180816'),
(517, 2, 22, '20180816'),
(518, 2, 23, '20180816'),
(519, 2, 24, '20180816'),
(520, 5, 1, '20180816'),
(521, 5, 2, '20180816'),
(522, 2, 25, '20180816'),
(523, 2, 26, '20180816'),
(524, 2, 27, '20180816'),
(525, 2, 28, '20180816'),
(526, 2, 29, '20180816'),
(527, 2, 30, '20180816'),
(528, 2, 31, '20180816'),
(529, 2, 1, '20180815'),
(530, 2, 32, '20180816'),
(531, 2, 2, '20180815'),
(532, 2, 33, '20180816'),
(533, 2, 3, '20180815'),
(534, 2, 34, '20180816'),
(535, 2, 4, '20180815'),
(536, 4, 1, '20180815'),
(537, 2, 5, '20180815'),
(538, 2, 35, '20180816'),
(539, 2, 36, '20180816');

-- --------------------------------------------------------

--
-- Table structure for table `sy_post`
--

CREATE TABLE `sy_post` (
  `PostID` int(11) NOT NULL,
  `PostName` varchar(255) NOT NULL,
  `PostCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_post`
--

INSERT INTO `sy_post` (`PostID`, `PostName`, `PostCode`) VALUES
(1, 'Reception', 'rcp'),
(2, 'Caissier', 'cs'),
(3, 'Administration', 'adm'),
(4, 'Pharmacy', 'ph'),
(5, 'Laboratory', 'lab'),
(6, 'Consultation', 'cst'),
(7, 'Titulor', 'ttl'),
(8, 'Mutuelle', 'mut');

-- --------------------------------------------------------

--
-- Table structure for table `sy_product`
--

CREATE TABLE `sy_product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_product`
--

INSERT INTO `sy_product` (`ProductID`, `ProductName`) VALUES
(4, 'Fiche de Hospitalization');

-- --------------------------------------------------------

--
-- Table structure for table `sy_tarif`
--

CREATE TABLE `sy_tarif` (
  `TarifID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `InsuranceNameID` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_tarif`
--

INSERT INTO `sy_tarif` (`TarifID`, `ProductID`, `InsuranceNameID`, `Amount`, `Date`) VALUES
(16, 4, 1, 100, '2017-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `sy_users`
--

CREATE TABLE `sy_users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CenterID` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy_users`
--

INSERT INTO `sy_users` (`UserID`, `Name`, `Phone`, `Password`, `PostID`, `CenterID`, `Status`) VALUES
(1, 'Reception CS Nyarure', 'reception', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 1),
(2, 'Administrator', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 1),
(8, 'other user', '0783404758', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 6, 1, 0),
(11, 'Consultant 1', '0783000001', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 6, 1, 0),
(12, 'Consultant 2', '0783000002', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 6, 1, 0),
(13, 'Consultant 3', '0783000003', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 6, 1, 0),
(19, 'Ruberandinda Patience', 'patieru12', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 1),
(20, 'Mutuelle', '0788743859', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 1),
(21, 'Reception Nyarure', '0785798402', 'bc9800b9d52a24cce72a73dd528afed53f10e5fc', 1, 1, 0),
(22, 'Rece', '0783150040', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 1, 1),
(23, 'Stomatology', '0783172867', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 6, 1, 1),
(24, 'Reception', '0781060875', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 1, 1),
(25, 'Planification', '0788977829', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 6, 1, 1),
(26, 'Mutuell', 'mutuelle', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 8, 1, 1),
(27, 'Andre', '0785798402', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0),
(28, 'Laboratory Nyarure', 'Labo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 5, 1, 1),
(29, 'pharmacy', 'pharmacy', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_consumable`
--
ALTER TABLE `ac_consumable`
  ADD PRIMARY KEY (`actConsumableID`),
  ADD KEY `ActPriceID` (`ActNameID`,`MedecineNameID`),
  ADD KEY `MedecineNameID` (`MedecineNameID`);

--
-- Indexes for table `ac_name`
--
ALTER TABLE `ac_name`
  ADD PRIMARY KEY (`ActNameID`);

--
-- Indexes for table `ac_price`
--
ALTER TABLE `ac_price`
  ADD PRIMARY KEY (`ActPriceID`),
  ADD KEY `ActNameID` (`ActNameID`,`InsuranceCategoryID`),
  ADD KEY `InsuranceCategoryID` (`InsuranceCategoryID`);

--
-- Indexes for table `ac_records`
--
ALTER TABLE `ac_records`
  ADD PRIMARY KEY (`ActRecordID`),
  ADD KEY `PatientRecordID` (`PatientRecordID`,`ActPriceID`,`NurseID`),
  ADD KEY `ActPriceID` (`ActPriceID`);

--
-- Indexes for table `ad_cell`
--
ALTER TABLE `ad_cell`
  ADD PRIMARY KEY (`CellID`),
  ADD KEY `SectorID` (`SectorID`),
  ADD KEY `SectorID_2` (`SectorID`);

--
-- Indexes for table `ad_district`
--
ALTER TABLE `ad_district`
  ADD PRIMARY KEY (`DistrictID`),
  ADD KEY `ProvinceID` (`ProvinceID`),
  ADD KEY `ProvinceID_2` (`ProvinceID`),
  ADD KEY `ProvinceID_3` (`ProvinceID`);

--
-- Indexes for table `ad_sector`
--
ALTER TABLE `ad_sector`
  ADD PRIMARY KEY (`SectorID`),
  ADD KEY `DistrictID` (`DistrictID`),
  ADD KEY `DistrictID_2` (`DistrictID`);

--
-- Indexes for table `ad_village`
--
ALTER TABLE `ad_village`
  ADD PRIMARY KEY (`ViillageID`),
  ADD KEY `CellID` (`CellID`),
  ADD KEY `CellID_2` (`CellID`);

--
-- Indexes for table `am_records`
--
ALTER TABLE `am_records`
  ADD PRIMARY KEY (`AmbulanceRecordID`),
  ADD KEY `PatientRecordID` (`PatientRecordID`);

--
-- Indexes for table `auto_acts`
--
ALTER TABLE `auto_acts`
  ADD PRIMARY KEY (`AutoActID`),
  ADD KEY `ActNameID` (`ActNameID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`);

--
-- Indexes for table `auto_diagnostic`
--
ALTER TABLE `auto_diagnostic`
  ADD PRIMARY KEY (`AutoActID`),
  ADD KEY `ActNameID` (`DiagnosticID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `DiagnosticID` (`DiagnosticID`);

--
-- Indexes for table `auto_exams`
--
ALTER TABLE `auto_exams`
  ADD PRIMARY KEY (`AutoActID`);

--
-- Indexes for table `auto_medicines`
--
ALTER TABLE `auto_medicines`
  ADD PRIMARY KEY (`AutoActID`),
  ADD KEY `ActNameID` (`MedecineNameID`),
  ADD KEY `PrescriptionID` (`PrescriptionID`),
  ADD KEY `DiagnosticID` (`MedecineNameID`);

--
-- Indexes for table `auto_nedicines_condition`
--
ALTER TABLE `auto_nedicines_condition`
  ADD PRIMARY KEY (`AutoActID`);

--
-- Indexes for table `cn_name`
--
ALTER TABLE `cn_name`
  ADD PRIMARY KEY (`MedecineNameID`);

--
-- Indexes for table `cn_price`
--
ALTER TABLE `cn_price`
  ADD PRIMARY KEY (`MedecinePriceID`),
  ADD KEY `MedecineNameID` (`MedecineNameID`);

--
-- Indexes for table `cn_records`
--
ALTER TABLE `cn_records`
  ADD PRIMARY KEY (`ConsumableRecordID`),
  ADD KEY `MedecinePriceID` (`MedecinePriceID`,`PatientRecordID`),
  ADD KEY `PatientRecordID` (`PatientRecordID`);

--
-- Indexes for table `co_category`
--
ALTER TABLE `co_category`
  ADD PRIMARY KEY (`ConsultationCategoryID`);

--
-- Indexes for table `co_diagnostic`
--
ALTER TABLE `co_diagnostic`
  ADD PRIMARY KEY (`DiagnosticID`),
  ADD KEY `DiagnosticCategoryID` (`DiagnosticCategoryID`);

--
-- Indexes for table `co_diagnostic_category`
--
ALTER TABLE `co_diagnostic_category`
  ADD PRIMARY KEY (`DiagnosticCategoryID`);

--
-- Indexes for table `co_diagnostic_records`
--
ALTER TABLE `co_diagnostic_records`
  ADD PRIMARY KEY (`DiagnosticRecordID`),
  ADD KEY `ConsulationRecordID` (`ConsulationRecordID`,`DiagnosticID`),
  ADD KEY `DiagnosticID` (`DiagnosticID`);

--
-- Indexes for table `co_price`
--
ALTER TABLE `co_price`
  ADD PRIMARY KEY (`ConsultationPriceID`),
  ADD KEY `ConsultationCategoryID` (`ConsultationCategoryID`,`InsuranceCategoryID`),
  ADD KEY `InsuranceCategoryID` (`InsuranceCategoryID`);

--
-- Indexes for table `co_records`
--
ALTER TABLE `co_records`
  ADD PRIMARY KEY (`ConsultationRecordID`),
  ADD KEY `CurrentReocrdID` (`PatientRecordID`,`ConsultationPriceID`,`ConsultantID`),
  ADD KEY `ConsultantID` (`ConsultantID`),
  ADD KEY `ConsultationPriceID` (`ConsultationPriceID`);

--
-- Indexes for table `co_special_data`
--
ALTER TABLE `co_special_data`
  ADD PRIMARY KEY (`DataID`),
  ADD KEY `SpecialID` (`SpecialID`,`DiagnosticID`),
  ADD KEY `DiagnosticID` (`DiagnosticID`);

--
-- Indexes for table `co_special_diagnostic`
--
ALTER TABLE `co_special_diagnostic`
  ADD PRIMARY KEY (`SpecialID`);

--
-- Indexes for table `ho_price`
--
ALTER TABLE `ho_price`
  ADD PRIMARY KEY (`HOPriceID`),
  ADD KEY `HOTypeID` (`HOTypeID`,`InsuranceCategoryID`),
  ADD KEY `InsuranceCategoryID` (`InsuranceCategoryID`);

--
-- Indexes for table `ho_record`
--
ALTER TABLE `ho_record`
  ADD PRIMARY KEY (`HORecordID`),
  ADD KEY `RecordID` (`RecordID`,`HOPriceID`),
  ADD KEY `HOTypeID` (`HOPriceID`);

--
-- Indexes for table `ho_type`
--
ALTER TABLE `ho_type`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `in_category`
--
ALTER TABLE `in_category`
  ADD PRIMARY KEY (`InsuranceCategoryID`),
  ADD UNIQUE KEY `InsuranceCategoryName` (`InsuranceCategoryName`);

--
-- Indexes for table `in_forms`
--
ALTER TABLE `in_forms`
  ADD PRIMARY KEY (`FormID`),
  ADD KEY `FormFile` (`FormFile`),
  ADD KEY `InsuranceNameID` (`InsuranceNameID`);

--
-- Indexes for table `in_name`
--
ALTER TABLE `in_name`
  ADD PRIMARY KEY (`InsuranceNameID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `in_price`
--
ALTER TABLE `in_price`
  ADD PRIMARY KEY (`InsurancePriceID`),
  ADD KEY `InsuranceNameID` (`InsuranceNameID`);

--
-- Indexes for table `la_exam`
--
ALTER TABLE `la_exam`
  ADD PRIMARY KEY (`ExamID`);

--
-- Indexes for table `la_malaria`
--
ALTER TABLE `la_malaria`
  ADD PRIMARY KEY (`MalariaID`);

--
-- Indexes for table `la_price`
--
ALTER TABLE `la_price`
  ADD PRIMARY KEY (`ExamPriceID`),
  ADD KEY `ExamID` (`ExamID`,`InsuranceTypeID`),
  ADD KEY `InsuranceTypeID` (`InsuranceTypeID`);

--
-- Indexes for table `la_quarters`
--
ALTER TABLE `la_quarters`
  ADD PRIMARY KEY (`QuarterID`);

--
-- Indexes for table `la_records`
--
ALTER TABLE `la_records`
  ADD PRIMARY KEY (`ExamRecordID`),
  ADD KEY `ConsultationRecordID` (`ConsultationRecordID`,`ExamPriceID`,`ConsultantID`,`LabAgent`),
  ADD KEY `ExamPriceID` (`ExamPriceID`),
  ADD KEY `QuarterID` (`QuarterID`);

--
-- Indexes for table `la_result`
--
ALTER TABLE `la_result`
  ADD PRIMARY KEY (`ResultID`),
  ADD KEY `ExamID` (`ExamID`);

--
-- Indexes for table `la_result_record`
--
ALTER TABLE `la_result_record`
  ADD PRIMARY KEY (`ResultRecordID`),
  ADD KEY `ExamRecordID` (`ExamRecordID`,`ResultID`),
  ADD KEY `ResultID` (`ResultID`);

--
-- Indexes for table `md_category`
--
ALTER TABLE `md_category`
  ADD PRIMARY KEY (`MedecineCategoryID`);

--
-- Indexes for table `md_name`
--
ALTER TABLE `md_name`
  ADD PRIMARY KEY (`MedecineNameID`),
  ADD KEY `MedecineCategorID` (`MedecineCategorID`);

--
-- Indexes for table `md_prescription`
--
ALTER TABLE `md_prescription`
  ADD PRIMARY KEY (`PrescriptionID`),
  ADD KEY `MedecineRecordID` (`MedecineRecordID`);

--
-- Indexes for table `md_price`
--
ALTER TABLE `md_price`
  ADD PRIMARY KEY (`MedecinePriceID`),
  ADD KEY `MedecineNameID` (`MedecineNameID`);

--
-- Indexes for table `md_records`
--
ALTER TABLE `md_records`
  ADD PRIMARY KEY (`MedecineRecordID`),
  ADD KEY `ConsultationRecordID` (`ConsultationRecordID`,`MedecinePriceID`,`ConsulatantID`),
  ADD KEY `MedecinePriceID` (`MedecinePriceID`);

--
-- Indexes for table `md_stock`
--
ALTER TABLE `md_stock`
  ADD PRIMARY KEY (`MedicineStockID`),
  ADD KEY `MedicineNameID` (`MedicineNameID`);

--
-- Indexes for table `md_stock_records`
--
ALTER TABLE `md_stock_records`
  ADD PRIMARY KEY (`StockRecordsID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `MedicineStockID` (`MedicineStockID`);

--
-- Indexes for table `mu_tm`
--
ALTER TABLE `mu_tm`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `PatientRecordID` (`PatientRecordID`,`UserID`);

--
-- Indexes for table `pa_info`
--
ALTER TABLE `pa_info`
  ADD PRIMARY KEY (`PatientID`),
  ADD KEY `VillageID` (`VillageID`);

--
-- Indexes for table `pa_insurance_cards`
--
ALTER TABLE `pa_insurance_cards`
  ADD PRIMARY KEY (`PatientInsuranceCardsID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `InsuranceNameID` (`InsuranceNameID`),
  ADD KEY `InsuranceNameID_2` (`InsuranceNameID`),
  ADD KEY `InsuranceNameID_3` (`InsuranceNameID`);

--
-- Indexes for table `pa_records`
--
ALTER TABLE `pa_records`
  ADD PRIMARY KEY (`PatientRecordID`),
  ADD UNIQUE KEY `PatientRecordID` (`PatientRecordID`),
  ADD KEY `PatientID` (`PatientID`,`InsuranceNameID`,`ReceptionistID`),
  ADD KEY `InsuranceNameID` (`InsuranceNameID`),
  ADD KEY `VillageID` (`VillageID`);

--
-- Indexes for table `pa_summary`
--
ALTER TABLE `pa_summary`
  ADD PRIMARY KEY (`PatientSummaryID`),
  ADD KEY `InsuranceNameID` (`InsuranceName`);

--
-- Indexes for table `pst_records`
--
ALTER TABLE `pst_records`
  ADD PRIMARY KEY (`PSTRecordID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `se_consultation`
--
ALTER TABLE `se_consultation`
  ADD PRIMARY KEY (`ServiceConsultationID`),
  ADD KEY `ServiceID` (`ServiceID`,`ConsulationID`),
  ADD KEY `ConsulationID` (`ConsulationID`);

--
-- Indexes for table `se_name`
--
ALTER TABLE `se_name`
  ADD PRIMARY KEY (`ServiceNameID`),
  ADD UNIQUE KEY `ServiceName` (`ServiceName`),
  ADD KEY `DirectorID` (`DirectorID`);

--
-- Indexes for table `se_records`
--
ALTER TABLE `se_records`
  ADD PRIMARY KEY (`ServiceRecordID`),
  ADD KEY `PatientRecordID` (`PatientRecordID`,`ServiceNameID`),
  ADD KEY `ServiceNameID` (`ServiceNameID`);

--
-- Indexes for table `sy_center`
--
ALTER TABLE `sy_center`
  ADD PRIMARY KEY (`CenterID`);

--
-- Indexes for table `sy_conge`
--
ALTER TABLE `sy_conge`
  ADD PRIMARY KEY (`DateID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `sy_ids`
--
ALTER TABLE `sy_ids`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InsuranceCategoryID` (`InsuranceCategoryID`);

--
-- Indexes for table `sy_post`
--
ALTER TABLE `sy_post`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `sy_product`
--
ALTER TABLE `sy_product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `sy_tarif`
--
ALTER TABLE `sy_tarif`
  ADD PRIMARY KEY (`TarifID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `InsuranceNameID` (`InsuranceNameID`);

--
-- Indexes for table `sy_users`
--
ALTER TABLE `sy_users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `CenterID` (`CenterID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ac_consumable`
--
ALTER TABLE `ac_consumable`
  MODIFY `actConsumableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ac_name`
--
ALTER TABLE `ac_name`
  MODIFY `ActNameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `ac_price`
--
ALTER TABLE `ac_price`
  MODIFY `ActPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT for table `ac_records`
--
ALTER TABLE `ac_records`
  MODIFY `ActRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_cell`
--
ALTER TABLE `ad_cell`
  MODIFY `CellID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_district`
--
ALTER TABLE `ad_district`
  MODIFY `DistrictID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_sector`
--
ALTER TABLE `ad_sector`
  MODIFY `SectorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_village`
--
ALTER TABLE `ad_village`
  MODIFY `ViillageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `am_records`
--
ALTER TABLE `am_records`
  MODIFY `AmbulanceRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_acts`
--
ALTER TABLE `auto_acts`
  MODIFY `AutoActID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_diagnostic`
--
ALTER TABLE `auto_diagnostic`
  MODIFY `AutoActID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_exams`
--
ALTER TABLE `auto_exams`
  MODIFY `AutoActID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_medicines`
--
ALTER TABLE `auto_medicines`
  MODIFY `AutoActID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auto_nedicines_condition`
--
ALTER TABLE `auto_nedicines_condition`
  MODIFY `AutoActID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cn_name`
--
ALTER TABLE `cn_name`
  MODIFY `MedecineNameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cn_price`
--
ALTER TABLE `cn_price`
  MODIFY `MedecinePriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=669;

--
-- AUTO_INCREMENT for table `cn_records`
--
ALTER TABLE `cn_records`
  MODIFY `ConsumableRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_category`
--
ALTER TABLE `co_category`
  MODIFY `ConsultationCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `co_diagnostic`
--
ALTER TABLE `co_diagnostic`
  MODIFY `DiagnosticID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1076;

--
-- AUTO_INCREMENT for table `co_diagnostic_category`
--
ALTER TABLE `co_diagnostic_category`
  MODIFY `DiagnosticCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `co_diagnostic_records`
--
ALTER TABLE `co_diagnostic_records`
  MODIFY `DiagnosticRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_price`
--
ALTER TABLE `co_price`
  MODIFY `ConsultationPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `co_records`
--
ALTER TABLE `co_records`
  MODIFY `ConsultationRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_special_data`
--
ALTER TABLE `co_special_data`
  MODIFY `DataID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_special_diagnostic`
--
ALTER TABLE `co_special_diagnostic`
  MODIFY `SpecialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ho_price`
--
ALTER TABLE `ho_price`
  MODIFY `HOPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ho_record`
--
ALTER TABLE `ho_record`
  MODIFY `HORecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ho_type`
--
ALTER TABLE `ho_type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `in_category`
--
ALTER TABLE `in_category`
  MODIFY `InsuranceCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `in_forms`
--
ALTER TABLE `in_forms`
  MODIFY `FormID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `in_name`
--
ALTER TABLE `in_name`
  MODIFY `InsuranceNameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `in_price`
--
ALTER TABLE `in_price`
  MODIFY `InsurancePriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `la_exam`
--
ALTER TABLE `la_exam`
  MODIFY `ExamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `la_malaria`
--
ALTER TABLE `la_malaria`
  MODIFY `MalariaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `la_price`
--
ALTER TABLE `la_price`
  MODIFY `ExamPriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `la_quarters`
--
ALTER TABLE `la_quarters`
  MODIFY `QuarterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `la_records`
--
ALTER TABLE `la_records`
  MODIFY `ExamRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_result`
--
ALTER TABLE `la_result`
  MODIFY `ResultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2240;

--
-- AUTO_INCREMENT for table `la_result_record`
--
ALTER TABLE `la_result_record`
  MODIFY `ResultRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `md_category`
--
ALTER TABLE `md_category`
  MODIFY `MedecineCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `md_name`
--
ALTER TABLE `md_name`
  MODIFY `MedecineNameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1272;

--
-- AUTO_INCREMENT for table `md_prescription`
--
ALTER TABLE `md_prescription`
  MODIFY `PrescriptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `md_price`
--
ALTER TABLE `md_price`
  MODIFY `MedecinePriceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6508;

--
-- AUTO_INCREMENT for table `md_records`
--
ALTER TABLE `md_records`
  MODIFY `MedecineRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `md_stock`
--
ALTER TABLE `md_stock`
  MODIFY `MedicineStockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `md_stock_records`
--
ALTER TABLE `md_stock_records`
  MODIFY `StockRecordsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=917;

--
-- AUTO_INCREMENT for table `mu_tm`
--
ALTER TABLE `mu_tm`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `pa_info`
--
ALTER TABLE `pa_info`
  MODIFY `PatientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pa_insurance_cards`
--
ALTER TABLE `pa_insurance_cards`
  MODIFY `PatientInsuranceCardsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pa_records`
--
ALTER TABLE `pa_records`
  MODIFY `PatientRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pa_summary`
--
ALTER TABLE `pa_summary`
  MODIFY `PatientSummaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pst_records`
--
ALTER TABLE `pst_records`
  MODIFY `PSTRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `se_consultation`
--
ALTER TABLE `se_consultation`
  MODIFY `ServiceConsultationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `se_name`
--
ALTER TABLE `se_name`
  MODIFY `ServiceNameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `se_records`
--
ALTER TABLE `se_records`
  MODIFY `ServiceRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sy_center`
--
ALTER TABLE `sy_center`
  MODIFY `CenterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sy_conge`
--
ALTER TABLE `sy_conge`
  MODIFY `DateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sy_ids`
--
ALTER TABLE `sy_ids`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `sy_post`
--
ALTER TABLE `sy_post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sy_product`
--
ALTER TABLE `sy_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sy_tarif`
--
ALTER TABLE `sy_tarif`
  MODIFY `TarifID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sy_users`
--
ALTER TABLE `sy_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ac_consumable`
--
ALTER TABLE `ac_consumable`
  ADD CONSTRAINT `ac_consumable_ibfk_2` FOREIGN KEY (`MedecineNameID`) REFERENCES `md_name` (`MedecineNameID`),
  ADD CONSTRAINT `ac_consumable_ibfk_3` FOREIGN KEY (`ActNameID`) REFERENCES `ac_name` (`ActNameID`);

--
-- Constraints for table `ac_price`
--
ALTER TABLE `ac_price`
  ADD CONSTRAINT `ac_price_ibfk_1` FOREIGN KEY (`ActNameID`) REFERENCES `ac_name` (`ActNameID`),
  ADD CONSTRAINT `ac_price_ibfk_2` FOREIGN KEY (`InsuranceCategoryID`) REFERENCES `in_category` (`InsuranceCategoryID`);

--
-- Constraints for table `ac_records`
--
ALTER TABLE `ac_records`
  ADD CONSTRAINT `ac_records_ibfk_1` FOREIGN KEY (`ActPriceID`) REFERENCES `ac_price` (`ActPriceID`),
  ADD CONSTRAINT `ac_records_ibfk_2` FOREIGN KEY (`PatientRecordID`) REFERENCES `pa_records` (`PatientRecordID`);

--
-- Constraints for table `ad_cell`
--
ALTER TABLE `ad_cell`
  ADD CONSTRAINT `ad_cell_ibfk_1` FOREIGN KEY (`SectorID`) REFERENCES `ad_sector` (`SectorID`);

--
-- Constraints for table `ad_sector`
--
ALTER TABLE `ad_sector`
  ADD CONSTRAINT `ad_sector_ibfk_1` FOREIGN KEY (`DistrictID`) REFERENCES `ad_district` (`DistrictID`);

--
-- Constraints for table `ad_village`
--
ALTER TABLE `ad_village`
  ADD CONSTRAINT `ad_village_ibfk_1` FOREIGN KEY (`CellID`) REFERENCES `ad_cell` (`CellID`);

--
-- Constraints for table `am_records`
--
ALTER TABLE `am_records`
  ADD CONSTRAINT `am_records_ibfk_1` FOREIGN KEY (`PatientRecordID`) REFERENCES `pa_records` (`PatientRecordID`);

--
-- Constraints for table `cn_price`
--
ALTER TABLE `cn_price`
  ADD CONSTRAINT `cn_price_ibfk_1` FOREIGN KEY (`MedecineNameID`) REFERENCES `cn_name` (`MedecineNameID`);

--
-- Constraints for table `cn_records`
--
ALTER TABLE `cn_records`
  ADD CONSTRAINT `cn_records_ibfk_1` FOREIGN KEY (`PatientRecordID`) REFERENCES `pa_records` (`PatientRecordID`);

--
-- Constraints for table `co_diagnostic`
--
ALTER TABLE `co_diagnostic`
  ADD CONSTRAINT `co_diagnostic_ibfk_1` FOREIGN KEY (`DiagnosticCategoryID`) REFERENCES `co_diagnostic_category` (`DiagnosticCategoryID`);

--
-- Constraints for table `co_diagnostic_records`
--
ALTER TABLE `co_diagnostic_records`
  ADD CONSTRAINT `co_diagnostic_records_ibfk_1` FOREIGN KEY (`DiagnosticID`) REFERENCES `co_diagnostic` (`DiagnosticID`),
  ADD CONSTRAINT `co_diagnostic_records_ibfk_2` FOREIGN KEY (`ConsulationRecordID`) REFERENCES `co_records` (`ConsultationRecordID`);

--
-- Constraints for table `co_price`
--
ALTER TABLE `co_price`
  ADD CONSTRAINT `co_price_ibfk_2` FOREIGN KEY (`InsuranceCategoryID`) REFERENCES `in_category` (`InsuranceCategoryID`),
  ADD CONSTRAINT `co_price_ibfk_3` FOREIGN KEY (`ConsultationCategoryID`) REFERENCES `co_category` (`ConsultationCategoryID`);

--
-- Constraints for table `co_records`
--
ALTER TABLE `co_records`
  ADD CONSTRAINT `co_records_ibfk_2` FOREIGN KEY (`PatientRecordID`) REFERENCES `pa_records` (`PatientRecordID`),
  ADD CONSTRAINT `co_records_ibfk_3` FOREIGN KEY (`ConsultationPriceID`) REFERENCES `co_price` (`ConsultationPriceID`);

--
-- Constraints for table `co_special_data`
--
ALTER TABLE `co_special_data`
  ADD CONSTRAINT `co_special_data_ibfk_1` FOREIGN KEY (`DiagnosticID`) REFERENCES `co_diagnostic` (`DiagnosticID`),
  ADD CONSTRAINT `co_special_data_ibfk_2` FOREIGN KEY (`SpecialID`) REFERENCES `co_special_diagnostic` (`SpecialID`);

--
-- Constraints for table `ho_price`
--
ALTER TABLE `ho_price`
  ADD CONSTRAINT `ho_price_ibfk_1` FOREIGN KEY (`InsuranceCategoryID`) REFERENCES `in_category` (`InsuranceCategoryID`),
  ADD CONSTRAINT `ho_price_ibfk_2` FOREIGN KEY (`HOTypeID`) REFERENCES `ho_type` (`TypeID`);

--
-- Constraints for table `ho_record`
--
ALTER TABLE `ho_record`
  ADD CONSTRAINT `ho_record_ibfk_1` FOREIGN KEY (`HOPriceID`) REFERENCES `ho_price` (`HOPriceID`),
  ADD CONSTRAINT `ho_record_ibfk_2` FOREIGN KEY (`RecordID`) REFERENCES `pa_records` (`PatientRecordID`);

--
-- Constraints for table `in_forms`
--
ALTER TABLE `in_forms`
  ADD CONSTRAINT `in_forms_ibfk_1` FOREIGN KEY (`InsuranceNameID`) REFERENCES `in_name` (`InsuranceNameID`);

--
-- Constraints for table `in_name`
--
ALTER TABLE `in_name`
  ADD CONSTRAINT `in_name_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `in_category` (`InsuranceCategoryID`);

--
-- Constraints for table `in_price`
--
ALTER TABLE `in_price`
  ADD CONSTRAINT `in_price_ibfk_1` FOREIGN KEY (`InsuranceNameID`) REFERENCES `in_name` (`InsuranceNameID`);

--
-- Constraints for table `la_price`
--
ALTER TABLE `la_price`
  ADD CONSTRAINT `la_price_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `la_exam` (`ExamID`),
  ADD CONSTRAINT `la_price_ibfk_2` FOREIGN KEY (`InsuranceTypeID`) REFERENCES `in_category` (`InsuranceCategoryID`);

--
-- Constraints for table `la_records`
--
ALTER TABLE `la_records`
  ADD CONSTRAINT `la_records_ibfk_1` FOREIGN KEY (`ExamPriceID`) REFERENCES `la_price` (`ExamPriceID`),
  ADD CONSTRAINT `la_records_ibfk_2` FOREIGN KEY (`ConsultationRecordID`) REFERENCES `co_records` (`ConsultationRecordID`);

--
-- Constraints for table `la_result`
--
ALTER TABLE `la_result`
  ADD CONSTRAINT `la_result_ibfk_1` FOREIGN KEY (`ExamID`) REFERENCES `la_exam` (`ExamID`);

--
-- Constraints for table `la_result_record`
--
ALTER TABLE `la_result_record`
  ADD CONSTRAINT `la_result_record_ibfk_1` FOREIGN KEY (`ExamRecordID`) REFERENCES `la_records` (`ExamRecordID`),
  ADD CONSTRAINT `la_result_record_ibfk_2` FOREIGN KEY (`ResultID`) REFERENCES `la_result` (`ResultID`);

--
-- Constraints for table `md_name`
--
ALTER TABLE `md_name`
  ADD CONSTRAINT `md_name_ibfk_1` FOREIGN KEY (`MedecineCategorID`) REFERENCES `md_category` (`MedecineCategoryID`);

--
-- Constraints for table `md_prescription`
--
ALTER TABLE `md_prescription`
  ADD CONSTRAINT `md_prescription_ibfk_1` FOREIGN KEY (`MedecineRecordID`) REFERENCES `md_records` (`MedecineRecordID`);

--
-- Constraints for table `md_price`
--
ALTER TABLE `md_price`
  ADD CONSTRAINT `md_price_ibfk_1` FOREIGN KEY (`MedecineNameID`) REFERENCES `md_name` (`MedecineNameID`);

--
-- Constraints for table `md_records`
--
ALTER TABLE `md_records`
  ADD CONSTRAINT `md_records_ibfk_1` FOREIGN KEY (`ConsultationRecordID`) REFERENCES `co_records` (`ConsultationRecordID`),
  ADD CONSTRAINT `md_records_ibfk_2` FOREIGN KEY (`MedecinePriceID`) REFERENCES `md_price` (`MedecinePriceID`);

--
-- Constraints for table `md_stock`
--
ALTER TABLE `md_stock`
  ADD CONSTRAINT `md_stock_ibfk_1` FOREIGN KEY (`MedicineNameID`) REFERENCES `md_name` (`MedecineNameID`);

--
-- Constraints for table `md_stock_records`
--
ALTER TABLE `md_stock_records`
  ADD CONSTRAINT `md_stock_records_ibfk_1` FOREIGN KEY (`MedicineStockID`) REFERENCES `md_stock` (`MedicineStockID`),
  ADD CONSTRAINT `md_stock_records_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `sy_users` (`UserID`);

--
-- Constraints for table `mu_tm`
--
ALTER TABLE `mu_tm`
  ADD CONSTRAINT `mu_tm_ibfk_1` FOREIGN KEY (`PatientRecordID`) REFERENCES `pa_records` (`PatientRecordID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
