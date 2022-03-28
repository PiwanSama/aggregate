-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 09:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aggregate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alevel_subjects`
--

DROP TABLE IF EXISTS `alevel_subjects`;
CREATE TABLE `alevel_subjects` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(191)  NOT NULL,
  `field` varchar(10)  NOT NULL,
  `category` varchar(191)  NOT NULL,
  `code` varchar(10)  NOT NULL,
  `paper_count` varchar(10)  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `combinations`;
CREATE TABLE `combinations` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `combination` varchar(20)  NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `grade` varchar(1)  NOT NULL,
  `value` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_universities`
--

DROP TABLE IF EXISTS `local_universities`;
CREATE TABLE `local_universities` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `university` varchar(300) NOT NULL,
  `region` varchar(20)  NOT NULL,
  `district` varchar(30)  NOT NULL,
  `award` varchar(100) NULL,
  `type` varchar(20)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alevel_subjects`
--

INSERT INTO `alevel_subjects` (`name`,`field`,`category`,`code`,`paper_count`) VALUES
('Agriculture','Sciences','Science','P515','3'),
('Arabic','Arts','Languages','P370',NULL),
('Art','Arts','Culture','P610','3'),
('Biology','Sciences','Science','P530','3'),
('Chemistry','Sciences','Science','P525','3'),
('Clothing and Textiles','Arts','Culture','P630',NULL),
('Divinity','Arts','Humanities','P245','3'),
('Economics','Arts','Humanities','P220','2'),
('Engineering and Metalwork','Sciences','Technical','P740',NULL),
('Entrepreneurship','Arts','Humanities','P230','2'),
('Foods and Nutrition','Sciences','Culture','P640',NULL),
('French','Arts','Languages','P330',NULL),
('General Paper','Arts','Humanities','S101','1'),
('Geography','Arts','Humanities','P250','3'),
('Geometrical and Building Drawing','Sciences','Technical','P720',NULL),
('Geometrical and Mechanical Drawing','Sciences','Technical','P710',NULL),
('German','Arts','Languages','P340',NULL),
('History','Arts','Humanities','P210','2'),
('Islam','Arts','Humanities','P235','3'),
('Kiswahili','Arts','Languages','P320',NULL),
('Latin','Arts','Languages','P350',NULL),
('Literature in English','Arts','Languages','P310',NULL),
('Luganda','Arts','Languages','P360',NULL),
('Mathematics','Sciences','Maths','P425','2'),
('Music','Arts','Culture','P620',NULL),
('Physics','Sciences','Science','P510','3'),
('Subsidiary ICT','Sciences','Technology','S840','2'),
('Subsidiary Mathematics','Sciences','Maths','S475','1'),
('Woodwork','Sciences','Technical','P730',NULL);

-- --------------------------------------------------------

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade`, `value`) VALUES
('A','6'),
('B','5'),
('C','4'),
('D','3'),
('E','2'),
('O','1'),
('F','0');
-- --------------------------------------------------------

--
-- Dumping data for table `combinations`
--

INSERT INTO `combinations` (`combination`, `category`) VALUES
('BCM/IT','Sciences'),
('PCB/SM','Sciences'),
('PCM/IT','Sciences'),
('MEA/IT','Sciences'),
('MEG/IT','Sciences'),
('MEEnt/IT','Sciences'),
('MEntG/IT','Sciences'),
('PAM/IT','Sciences'),
('PEM/IT','Sciences'),
('PEntM/IT','Sciences'),
('AEEnt/SM','Arts'),
('GEA/SM','Arts'),
('GEEnt/SM','Arts'),
('GEI/SM','Arts'),
('HEA/SM','Arts'),
('HED/SM','Arts'),
('HEEnt/SM','Arts'),
('HEG/SM','Arts'),
('HEI/SM','Arts'),
('GEntD/IT','Arts'),
('GEntA/IT','Arts'),
('DEntA/IT','Arts'),
('HEntI/IT','Arts'),
('HEntG/IT','Arts'),
('HEntD/IT','Arts'),
('GEntI/IT','Arts'),
('HAG/IT','Arts');


-- --------------------------------------------------------

--
-- Dumping data for table `local_universities`
--

INSERT INTO `local_universities` (`university`, `region`, `district`, `award`, `type`) VALUES
('Muni University','North','Arua','University – Act of Parliament','Public'),
('Nile University (NiU)','North','Arua','Provisional License to Operate as University','Private'),
('Valley University of Science & Technology','West','Bushenyi','Provisional License to Operate as University','Private'),
('Busitema University','East','Busia','University – Act of Parliament','Public'),
('Gulu University','North','Gulu','University – Act of Parliament','Public'),
('University of the sacred Heart, Gulu','North','Gulu','Provisional License to Operate as University','Private'),
('Ibanda University','West','Ibanda','Provisional License to Operate as University','Private'),
('Fairland University (Closed)','East','Jinja','Provisional License to Operate as University','Private'),
('Kabale University','West','Kabale','University – Act of Parliament','Public'),
('Fins Medical University (FMU)','West','Kabarole','Provisional License to Operate as University','Private'),
('Mountains of the Moon University','West','Kabarole','Charter to University','Private'),
('Uganda Pentecostal University','West','Kabarole','Provisional License to Operate as University','Private'),
('Aga Khan University','Central','Kampala','Provisional License to Operate as University','Private'),
('Avance International University','Central','Kampala','Provisional License to Operate as University','Private'),
('Cavendish University','Central','Kampala','Provisional License to Operate as University','Private'),
('Clarke International University (Formerly International Health Sciences University)','Central','Kampala','Provisional License to Operate as University','Private'),
('International University of East Africa','Central','Kampala','Provisional License to Operate as University','Private'),
('ISBAT University','Central','Kampala','Charter to University','Private'),
('Islamic Call University College','Central','Kampala','Provisional License to Operate as University','Private'),
('Kampala International University','Central','Kampala','Charter to University','Private'),
('Kampala University','Central','Kampala','Charter to University','Private'),
('King Ceasar University (Formerly St. Augustine International University)','Central','Kampala','Provisional License to Operate as University','Private'),
('Kyambogo University','Central','Kampala','University – Act of Parliament','Public'),
('Makerere University','Central','Kampala','University – Act of Parliament','Public'),
('Nexus International University (Formerly Virtual University of Uganda)','Central','Kampala','Provisional License to Operate as University','Private'),
('St. Lawrence University','Central','Kampala','Provisional License to Operate as University','Private'),
('Stafford University (Closed)','Central','Kampala','Provisional License to Operate as University','Private'),
('Team University','Central','Kampala','Provisional License to Operate as University','Private'),
('Uganda Technology And Management University (UTAMU)','Central','Kampala','Provisional License to Operate as University','Private'),
('Unicaf University','Central','Kampala','Provisional License to Operate as University','Private'),
('Victoria University','Central','Kampala','Provisional License to Operate as University','Private'),
('Great Lakes Regional University','West','Kanungu','Provisional License to Operate as University','Private'),
('African Rural University','West','Kibaale','Provisional License to Operate as University','Private'),
('Metropolitan International University (MIU)','West','Kisoro','Provisional License to Operate as University','Private'),
('Kumi University','East','Kumi','Provisional License to Operate as University','Private'),
('All Saints University, Lango','North','Lira','Provisional License to Operate as University','Private'),
('Lira University','North','Lira','University – Act of Parliament','Public'),
('Bugema University','Central','Luwero','Charter to University','Private'),
('Ndejje University','Central','Luwero','Charter to University','Private'),
('Equator University of Science and Technology (EQUSaT)','Central','Masaka','Provisional License to Operate as University','Private'),
('Muteesa I Royal University','Central','Masaka','Provisional License to Operate as University','Private'),
('Islamic University in Uganda','East','Mbale','University – Act of Parliament','Private'),
('Livingstone International University','East','Mbale','Provisional License to Operate as University','Private'),
('Bishop Stuart University','West','Mbarara','Charter to University','Private'),
('Mbarara University of Science and Technology','West','Mbarara','University – Act of Parliament','Public'),
('University of Saint Joseph Mbarara (USJM)','West','Mbarara','Provisional License to Operate as University','Private'),
('Uganda Martyrs University','Central','Mpigi','Charter to University','Private'),
('Limkokwing University of Creative Technology','Central','Mukono','Provisional License to Operate as University','Private'),
('Uganda Christian University','Central','Mukono','Charter to University','Private'),
('Ankole Western University','West','Sheema','Provisional License to Operate as University','Private'),
('Soroti University','East','Soroti','University – Act of Parliament','Public'),
('Africa Renewal University (Formerly Gaba Bible Institute)','Central','Wakiso','Provisional License to Operate as University','Private'),
('Nkumba University','Central','Wakiso','Charter to University','Private'),
('University of Kisubi','Central','Wakiso','Provisional License to Operate as University','Private');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
