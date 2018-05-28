-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2016 at 04:06 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it57160612`
--

-- --------------------------------------------------------

--
-- Table structure for table `port_academictitle`
--

CREATE TABLE IF NOT EXISTS `port_academictitle` (
  `acr_id` int(11) NOT NULL,
  `acr_tname` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งทางวิชาการภาษาไทย',
  `acr_ename` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งทางวิชาการภาษาอังกฤษ',
  `acr_tacronym` varchar(45) DEFAULT NULL COMMENT 'อักษรย่อตำแหน่งทางวิชาการภาษาไทย',
  `acr_eacronym` varchar(45) DEFAULT NULL COMMENT 'อักษรย่อตำแหน่งทางวิชาการภาษาอังกฤษ'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ตำแหน่งทางวิชาการ\nศาสตราจารย์  ศาสตราจารย์พิเศษ  ศาสตราจารย์เกียรติคุณ ใช้อักษรย่อ ศ.\nรองศาสตราจารย์  รองศาสตราจารย์พิเศษ ใช้อักษรย่อ รศ.\nผู้ช่วยศาสตราจารย์  ผู้ช่วยศาสตราจารย์พิเศษ ใช้อักษรย่อ ผศ.';

--
-- Dumping data for table `port_academictitle`
--

INSERT INTO `port_academictitle` (`acr_id`, `acr_tname`, `acr_ename`, `acr_tacronym`, `acr_eacronym`) VALUES
(1, 'ศาสตราจารย์', 'Professor', 'ศ.', 'Prof.'),
(2, 'รองศาสตราจารย์', 'Associate Professor', 'รศ.', 'Assoc. Prof.'),
(3, 'ผู้ช่วยศาสตราจารย์', 'Assistant Professor', 'ผศ.', 'Asst. Prof.'),
(4, 'อาจารย์', 'Lecturer', 'อ.', 'Lect.');

-- --------------------------------------------------------

--
-- Table structure for table `port_award`
--

CREATE TABLE IF NOT EXISTS `port_award` (
  `awd_id` int(11) NOT NULL,
  `awd_tname` varchar(255) DEFAULT NULL,
  `awd_ename` varchar(255) DEFAULT NULL,
  `awd_tinsitute` varchar(255) DEFAULT NULL,
  `awd_einsitute` varchar(45) DEFAULT NULL,
  `awd_date` varchar(4) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='รางวัลที่ได้ัรับ';

--
-- Dumping data for table `port_award`
--

INSERT INTO `port_award` (`awd_id`, `awd_tname`, `awd_ename`, `awd_tinsitute`, `awd_einsitute`, `awd_date`, `usr_id`) VALUES
(1, 'ยอดมนุษย์', 'Super humen', 'เอ็กเมน', 'X-men', '2013', 34);

-- --------------------------------------------------------

--
-- Table structure for table `port_country`
--

CREATE TABLE IF NOT EXISTS `port_country` (
  `cou_id` int(11) NOT NULL,
  `cou_tname` varchar(255) DEFAULT NULL,
  `cou_ename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='ประเทศของสถาบัน';

--
-- Dumping data for table `port_country`
--

INSERT INTO `port_country` (`cou_id`, `cou_tname`, `cou_ename`) VALUES
(1, 'ไทย', 'Thailand'),
(2, 'สหราชอาณาจักร', 'United Kingdom'),
(3, 'เยอรมนี', 'Germany'),
(4, 'ออสเตรเลีย', 'Australia'),
(5, 'นิวซีแลนด์', 'New Zealand'),
(6, 'จีน', 'Chaina'),
(7, 'ญี่ปุ่น', 'Japan'),
(8, 'สหรัฐอเมริกา', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `port_degree`
--

CREATE TABLE IF NOT EXISTS `port_degree` (
  `deg_id` int(11) NOT NULL,
  `deg_tname` varchar(45) DEFAULT NULL COMMENT 'วท.ม. วท.ด. วท.บ.',
  `deg_ename` varchar(45) DEFAULT NULL,
  `deg_tacronym` varchar(45) DEFAULT NULL,
  `deg_eacronym` varchar(45) DEFAULT NULL,
  `edl_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='วท.ม. วท.ด. วท.บ.';

--
-- Dumping data for table `port_degree`
--

INSERT INTO `port_degree` (`deg_id`, `deg_tname`, `deg_ename`, `deg_tacronym`, `deg_eacronym`, `edl_id`) VALUES
(1, 'วิทยาศาสตรบัณฑิต', 'Bachelor of Science', 'วท.บ.', 'B.Sc.', 1),
(2, 'วิทยาศาสตรมหาบัณฑิต', 'Master of Science', 'วท.ม.', 'M.Sc.', 2),
(3, 'ปรัชญาดุษฎีบัณฑิต', 'Doctor of Philosophy', 'ปร.ด.', 'Ph.D.', 3),
(4, 'บริหารธุรกิจบัณฑิต', 'Bachelor of Business Administration', 'บธ.บ.', 'B.BA.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `port_department`
--

CREATE TABLE IF NOT EXISTS `port_department` (
  `dep_id` int(11) NOT NULL,
  `dep_tname` varchar(45) DEFAULT NULL,
  `dep_ename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='ภาควิชาที่สังกัด';

--
-- Dumping data for table `port_department`
--

INSERT INTO `port_department` (`dep_id`, `dep_tname`, `dep_ename`) VALUES
(1, 'วิทยาการคอมพิวเตอร์', 'Computer Science'),
(2, 'เทคโนโลยีสารสนเทศ', 'Information Technology'),
(3, 'วิศวกรรมซอฟต์แวร์', 'Software Engineering'),
(4, 'สำนักงานคณบดี', 'Supporting Staffs'),
(5, 'เขตอุตสาหกรรมซอฟแวร์ภาคตะวันออก', 'East Software Park');

-- --------------------------------------------------------

--
-- Table structure for table `port_educationalbackground`
--

CREATE TABLE IF NOT EXISTS `port_educationalbackground` (
  `edb_id` int(11) NOT NULL,
  `edb_yeargraduate` year(4) DEFAULT NULL,
  `edb_tthesistopic` varchar(45) DEFAULT NULL COMMENT 'หัวข้อวิทยานิพนธ์ภาษาไทย',
  `edb_ethesistopic` varchar(255) DEFAULT NULL COMMENT 'หัวข้อวิทยานิพนธ์ภาษาอังกฤษ',
  `edb_no` int(11) DEFAULT NULL COMMENT 'ลำดับที่ต้องการแสดง',
  `ins_id` int(11) DEFAULT NULL,
  `deg_id` int(11) DEFAULT NULL,
  `maj_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='ประวัติการศึกษา';

--
-- Dumping data for table `port_educationalbackground`
--

INSERT INTO `port_educationalbackground` (`edb_id`, `edb_yeargraduate`, `edb_tthesistopic`, `edb_ethesistopic`, `edb_no`, `ins_id`, `deg_id`, `maj_id`, `usr_id`) VALUES
(1, 2011, '', '', NULL, 1, 3, 1, 10),
(2, 2009, '', '', NULL, 14, 1, 1, 12),
(3, 2011, '', '', NULL, 139, 2, 1, 12),
(4, 2011, '', '', NULL, 140, 2, 1, 12),
(5, 2013, '', '', NULL, 140, 3, 1, 12),
(6, 2008, '', '', NULL, 10, 1, 1, 13),
(7, 2009, '', '', NULL, 7, 2, 2, 13),
(8, 2010, '', '', NULL, 1, 3, 1, 13),
(9, 2010, '', '', NULL, 141, 2, 3, 14),
(10, 2009, '', '', NULL, 7, 1, 4, 16),
(11, 2011, '', '', NULL, 7, 2, 2, 16),
(12, 2009, '', '', NULL, 10, 1, 1, 17),
(13, 2011, '', '', NULL, 1, 2, 1, 17),
(14, 2012, '', '', NULL, 1, 3, 3, 17),
(16, 2012, 'rtert', 'ertert', NULL, 6, 1, 1, 34),
(17, 2003, '', '', NULL, 10, 1, 2, 8),
(18, 2010, '', '', NULL, 10, 2, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `port_funding`
--

CREATE TABLE IF NOT EXISTS `port_funding` (
  `fud_id` int(11) NOT NULL,
  `fud_institution` varchar(45) NOT NULL,
  `fud_funding` double NOT NULL,
  `fud_startdate` date NOT NULL,
  `fud_enddate` date NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_funding`
--

INSERT INTO `port_funding` (`fud_id`, `fud_institution`, `fud_funding`, `fud_startdate`, `fud_enddate`, `res_id`) VALUES
(1, 'aaa', 222, '2015-07-02', '2015-07-02', 20);

-- --------------------------------------------------------

--
-- Table structure for table `port_institute`
--

CREATE TABLE IF NOT EXISTS `port_institute` (
  `ins_id` int(11) NOT NULL,
  `ins_tname` varchar(255) DEFAULT NULL,
  `ins_ename` varchar(255) DEFAULT NULL,
  `cou_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COMMENT='สถาบันที่จบการศึกษา';

--
-- Dumping data for table `port_institute`
--

INSERT INTO `port_institute` (`ins_id`, `ins_tname`, `ins_ename`, `cou_id`) VALUES
(1, 'จุฬาลงกรณ์มหาวิทยาลัย ', 'Chulalongkorn University', 1),
(2, 'มหาวิทยาลัยเกษตรศาสตร์ ', 'Kasetsart University', 1),
(3, 'มหาวิทยาลัยธรรมศาสตร์ ', 'Thammasat University', 1),
(4, 'มหาวิทยาลัยศรีนครินวิโรฒ ', 'Srinakharinwirot University', 1),
(5, 'สถาบันบัณฑิตพัฒนบริหารศาสตร์ ', 'National Institute of Development Administrat', 1),
(6, 'สถาบันเทคโนโลยีพระจอมเกล้าพระนครเหนือ', 'King Mongkut’s Institute of Technology North ', 1),
(7, 'สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบั', 'King Mongkut’s Institute of Technology Chaoku', 1),
(8, 'มหาวิทยาลัยมหิดล ', 'Mahidol University', 1),
(9, 'มหาวิทยาลัยศิลปากร ', 'Silpakoen University', 1),
(10, 'มหาวิทยาลัยบูรพา ', 'Burapha University', 1),
(11, 'มหาวิทยาลัยนเรศวร ', 'Naresuan University', 1),
(12, 'มหาวิทยาลัยแม่โจ้ ', 'Maejo University', 1),
(13, 'มหาวิทยาลัยเชียงใหม่ ', 'Chiang Mai University', 1),
(14, 'มหาวิทยาลัยขอนแก่น ', 'Khon Kaen University', 1),
(15, 'มหาวิทยาลัยอุบลราชธานี ', 'Ubon Ratchathani University', 1),
(16, 'มหาวิทยาลัยมหาสารคาม', 'Mahasarakham University', 1),
(17, 'มหาวิทยาลัยสงขลานครินทร์ ', 'Prince of Songkls University', 1),
(18, 'มหาวิทยาลัยทักษิณ ', 'Thaksin University', 1),
(19, 'มหาวิทยาลัยนราธิวาสราชนครินทร์ ', 'Princess of Narathiwat University', 1),
(20, 'มหาวิทยาลัยนครพนม ', 'Nakhon Phanom University', 1),
(21, 'มหาวิทยาลัยเทคโนโลยีสุรนารี ', 'Suranaree University of technology', 1),
(22, 'มหาวิทยาลัยวลัยลักษณ์', 'Walailak University', 1),
(23, 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี ', 'King Mongkut’s University of Technology Thonb', 1),
(24, 'มหาวิทยาลัยแม่ฟ้าหลวง', 'Mae Fah Luang University', 1),
(25, 'มหาวิทยาลัยรามคำแหง ', 'Ramkhamhaeng University', 1),
(26, 'มหาวิทยาลัยสุโขทัยธรรมาธิราช', 'Sukhothaihammathirat Open University', 1),
(27, 'มหาวิทยาลัยกรุงเทพ', 'Bangkok University', 1),
(28, 'มหาวิทยาลัยเกษมบัณฑิต', 'Kasem Bundit University', 1),
(29, 'มหาวิทยาลัยธุรกิจบัณฑิตย์', 'Dhurakijpundit University', 1),
(30, 'มหาวิทยาลัยเกริก', 'Kirk University', 1),
(31, 'มหาวิทยาลัยเซนต์จอห์น', 'Saint John’s University', 1),
(32, 'มหาวิทยาลัยเทคโนโลยีมหานคร', 'Mahanakorn University of Technology', 1),
(33, 'มหาวิทยาลัยศรีปทุม', 'Sripatum University', 1),
(34, 'มหาวิทยาลัยหอการค้าไทย', 'The University of the Thai Chamber of Commerc', 1),
(35, 'มหาวิทยาลัยอัสสัมชัญ', 'Assumption University', 1),
(36, 'มหาวิทยาลัยเอเชียอาคเนย์', 'South-East Asia University', 1),
(37, 'มหาวิทยาลัยรัตนบัณฑิต', 'Rattana Bundit University', 1),
(38, 'มหาวิทยาลัยสยาม', 'Saim University', 1),
(39, 'มหาวิทยาลัยอีสเทิร์นเอเชีย', 'Eastern Asia University', 1),
(40, 'มหาวิทยาลัยปทุมธานี', 'Pathumthani University', 1),
(41, 'มหาวิทยาลัยชินวัตร', 'Shinawatra University', 1),
(42, 'มหาวิทยาลัยรังสิต', 'Rangsit University', 1),
(43, 'มหาวิทยาลัยเว็บสเตอร์', 'Webster University', 1),
(44, 'มหาวิทยาลัยนานาชาติ', 'Stamford International University', 1),
(45, 'มหาวิทยาลัยหัวเฉียวเฉลิมพระเกียรติ', 'Hua Chiew Chalermprakiet University', 1),
(46, 'มหาวิทยาลัยคริสเตียน', 'Christian University', 1),
(47, 'มหาวิทยาลัยเวสเทิร์น', 'Western University', 1),
(48, 'มหาวิทยาลัยภาคกลาง', 'Phakklang University', 1),
(49, 'มหาวิทยาลัยพายัพ', 'Payap University', 1),
(50, 'มหาวิทยาลัยเจ้าพระยา', 'Chaopraya University', 1),
(51, 'มหาวิทยาลัยนอร์ท-เชียงใหม่', 'North-Chiang Mai University', 1),
(52, 'มหาวิทยาลัยภาคตะวันออกเฉียงเหนือ', 'North-Eastern University', 1),
(53, 'มหาวิทยาลัยวงษ์ชวลิตกุล', 'Vongchavalikut University', 1),
(54, 'มหาวิทยาลัยราชธานี', 'Ratchatani College of Technology', 1),
(55, 'มหาวิทยาลัยหาดใหญ่', 'Hatyai University', 1),
(56, 'มหาวิทยาลัยวิทยาศาสตร์และเทคโนโลยีแห่งเอเชีย', 'Asian University of Science and Technology', 1),
(57, 'วิทยาลัยดุสิตธานี', 'Dusitthani College', 1),
(58, 'วิทยาลัยทองสุข', 'Thongsuk College', 1),
(59, 'วิทยาลัยเซนต์หลุยส์', 'Saint Louis College', 1),
(60, 'วิทยาลัยมิชชั่น', 'Mission College', 1),
(61, 'วิทยาลัยรัชต์ภาคย์', 'Rajapark College', 1),
(62, 'วิทยาลัยราชพฤกษ์', 'Rajapruk University', 1),
(63, 'วิทยาลัยแสงธรรม', 'Saengtham College', 1),
(64, 'มหาวิทยาลัยธนบุรี', 'Thonburi University', 1),
(65, 'วิทยาลัยเซาธ์อีสบางกอก', 'South-East Bangkok College', 1),
(66, 'วิทยาลัยนอร์ทกรุงเทพ', 'North Bangkok Collage', 1),
(67, 'วิทยาลัยนานาชาติเซนต์เทเรซา', 'St Theresa International college', 1),
(68, 'มหาวิทยาลัยกรุงเทพธนบุรี ', 'Bangkokthonburi University', 1),
(69, 'วิทยาลัยเทคโนโลยีราชธานีอุดร', 'Rachathani Udon College of Technology', 1),
(70, 'วิทยาลัยสันตพล', 'Suntapol College', 1),
(71, 'วิทยาลัยโปลีเทคนิคภาคตะวันออกเฉียงเหนือ', 'North-Eastern Polytechnic College', 1),
(72, 'วิทยาลัยบัณฑิตเอเชีย', 'College of Bhandit Asia', 1),
(73, 'วิทยาลัยบัณฑิตบริหารธุรกิจ', 'Bundit Borihanturakit College', 1),
(74, 'วิทยาลัยนครราชสีมา', 'Nakhonratchasima College', 1),
(75, 'วิทยาลัยเฉลิมกาญจนา', 'Chalermkarnchana College', 1),
(76, 'วิทยาลัยเทคโนโลยีภาคใต้', 'Southern College of Technology', 1),
(77, 'วิทยาลัยศรีโสภณ', 'Srisophon College', 1),
(78, 'วิทยาลัยตาปี', 'Tapee College', 1),
(79, 'มหาวิทยาลัยอิสลามยะลา', 'Yala Islamic University', 1),
(80, 'วิทยาลัยพุทธศาสนานานาชาติ', 'International Buddhist College', 1),
(81, 'วิทยาลัยโยนก', 'Yonok College', 1),
(82, 'วิทยาลัยลุ่มน้ำปิง', 'Lumnamping College', 1),
(83, 'มหวิทยาลัยพิษณุโลก', 'Phitsanulok University', 1),
(84, 'วิทยาลัยฟาร์อีสเทอร์น', 'Far Eastern College', 1),
(85, 'มหาวิทยาลัยเชียงราย', 'ChiangRai University', 1),
(86, 'วิทยาลัยอินเตอร์เทค-ลำปาง', 'Lampang Inter-Tech College', 1),
(87, 'วิทยาลัยเทคโนโลยีสยาม', 'Siam Technology College', 1),
(88, 'มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี', 'Rajamangla University of Technology Thunyabur', 1),
(89, 'มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ', 'Rajamangla University of Technology Krungthep', 1),
(90, 'มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก', 'Rajamangla University of Technology Tawan-ok', 1),
(91, 'มหาวิทยาลัยเทคโนโลยีราชมงคลพระนคร', 'Rajamangla University of Technology Phranakon', 1),
(92, 'มหาวิทยาลัยเทคโนโลยีราชมงคลศรีวิชัย', 'Rajamangla University of Technology Srivijaya', 1),
(93, 'มหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา', 'Rajamangla University of Technology Lanna', 1),
(94, 'มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ', 'Rajamangla University of Technology Suvanabhu', 1),
(95, 'มหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์', 'Rajamangla University of Technology Rattanako', 1),
(96, 'มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน', 'Rajamangla University of Technology Isan', 1),
(97, 'สถาบันเทคโนโลยีปทุมวัน', 'Pathumwan Institute of Technology', 1),
(98, 'มหาวิทยาลัยราชภัฏเชียงราย ', 'Chiangrai Rajabhat University', 1),
(99, 'มหาวิทยาลัยราชภัฏเชียงใหม่ ', 'Chiangmai Rajabhat University', 1),
(100, 'มหาวิทยาลัยราชภัฏลำปาง ', 'Lampang Rajabhat University', 1),
(101, 'มหาวิทยาลัยราชภัฏอุตรดิตถ์ ', 'Uttaradit Rajabhat University', 1),
(102, 'มหาวิทยาลัยราชภัฏกำแพงเพชร ', 'Kamphaengphet Rajabhat university', 1),
(103, 'มหาวิทยาลัยราชภัฏนครสวรรค์ ', 'Nakhon Sawan Rajabhat university', 1),
(104, 'มหาวิทยาลัยราชภัฏพิบูลสงคราม ', 'Pibulsongkram Rajabhat university', 1),
(105, 'มหาวิทยาลัยราชภัฏเพชรบูรณ์ ', 'Phetchaboon Rajabhat University', 1),
(106, 'มหาวิทยาลัยราชภัฏเลย ', 'Loei Rajabhat University', 1),
(107, 'มหาวิทยาลัยราชภัฏสกลนคร ', 'Sakon Nakhon Rajabhat University', 1),
(108, 'มหาวิทยาลัยราชภัฏอุดรธานี ', 'Udon thani Rajabhat University', 1),
(109, 'มหาวิทยาลัยราชภัฎมหาสารคาม ', 'Rajabhat Maha sarakham University', 1),
(110, 'มหาวิทยาลัยราชภัฏนครราชสีมา ', 'Nakhon Ratchasima Rajabhat University', 1),
(111, 'มหาวิทยาลัยราชภัฏบุรีรัมย์ ', 'Buriram Rajabhat University', 1),
(112, 'มหาวิทยาลัยราชภัฏสุรินทร์ ', 'Surindra Rajabhat University', 1),
(113, 'มหาวิทยาลัยราชภัฏอุบลราชธานี ', 'Ubon Ratchathani Rajabhat University', 1),
(114, 'มหาวิทยาลัยราชภัฏศรีสะเกษ ', 'Sisaket Rajabhat University', 1),
(115, 'มหาวิทยาลัยราชภัฏชัยภูมิ ', 'Chaiyaphum Rajabhat University', 1),
(116, 'มหาวิทยาลัยราชภัฏร้อยเอ็ด ', 'Roi-et Rajabhat University', 1),
(117, 'มหาวิทยาลัยราชภัฏราชนครินทร์ ', 'Rajanagarindra Rajabhat University', 1),
(118, 'มหาวิทยาลัยราชภัฏเทพสตรี ', 'Thepsatri Rajabhat University', 1),
(119, 'มหาวิทยาลัยราชภัฏพระนครศรีอยูธยา ', 'Phranakhon Si Ayutthaya Rajabhat University', 1),
(120, 'มหาวิทยาลัยราชภัฏวไลยอลงกรณ', 'Valaylongkorn Rajabhat University', 1),
(121, 'มหาวิทยาลัยราชภัฏรำไพพรรณี ', 'Rambhaibarni Rajabhat University', 1),
(122, 'มหาวิทยาลัยราชภัฏกาญจนบุรี ', 'Kanchanaburi Rajabhat University', 1),
(123, 'มหาวิทยาลัยราชภัฏนครปฐ', 'Nakhon Pathom Rajabhat University', 1),
(124, 'มหาวิทยาลัยราชภัฎเพชรบุรี ', 'PhetchaburiRajabhat University', 1),
(125, 'มหาวิทยาลัยราชภัฏหมู่บ้านจอมบึง ', 'Muban Chom Bung Rajabhat University', 1),
(126, 'มหาวิทยาลัยราชภัฏภูเก็ต', 'Phuket Rajabhat University', 1),
(127, 'มหาวิทยาลัยราชภัฏยะลา ', 'Yala Rajabhat University', 1),
(128, 'มหาวิทยาลัยราชภัฏสงขล', 'Songkhla Rajabhat University', 1),
(129, 'มหาวิทยาลัยราชภัฏนครศรีธรรมราช ', 'Nakhon Si Thammarat Rajabhat University', 1),
(130, 'มหาวิทยาลัยราชภัฏสุราษฏร์ธานี ', 'Surat Thani Rajabhat University', 1),
(131, 'มหาวิทยาลัยราชภัฏจันทรเกษม ', 'Chandrakasem Rajabhat University', 1),
(132, 'มหาวิทยาลัยราชภัฏธนบุรี ', 'Dhonburi Rajabhat University', 1),
(133, 'มหาวิทยาลัยราชภัฏบ้านสมเด็จเจ้าพระยา ', 'Bansomdejchaopraya Rajabhat University', 1),
(134, 'มหาวิทยาลัยราชภัฏพระนคร ', 'Phranakhon Rajabhat University', 1),
(135, 'มหาวิทยาลัยราชภัฏสวนดุสิต ', 'Suan Dusit Rajabhat University', 1),
(136, 'มหาวิทยาลัยราชภัฏสวนสุนันทา ', 'Suan Sunandha Rajabhat University', 1),
(137, 'มหาวิทยาลัยมหามกุฏราชวิทยาลัย ', 'Mahamakut Buddhist University', 1),
(138, 'มหาวิทยาลัยมหาจุฬาลงกรณ์ราชวิทยาลัย', 'Mahachulalongkornrajavidyalaya University', 1),
(139, 'University of Southern California', 'University of Southern California', 8),
(140, 'University of Louisiana at Lafayette', 'University of Louisiana at Lafayette', 8),
(141, 'มหาวิทยาลัยทสึคุบะ', 'University of Tsukuba', 7);

-- --------------------------------------------------------

--
-- Table structure for table `port_integrating`
--

CREATE TABLE IF NOT EXISTS `port_integrating` (
  `int_id` int(11) NOT NULL,
  `int_datestart` date NOT NULL,
  `int_dateend` date NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_integrating`
--

INSERT INTO `port_integrating` (`int_id`, `int_datestart`, `int_dateend`, `res_id`) VALUES
(1, '2015-07-02', '2015-07-02', 20);

-- --------------------------------------------------------

--
-- Table structure for table `port_integratingconnect`
--

CREATE TABLE IF NOT EXISTS `port_integratingconnect` (
  `inc_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `itt_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_integratingconnect`
--

INSERT INTO `port_integratingconnect` (`inc_id`, `int_id`, `itt_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `port_integratingtype`
--

CREATE TABLE IF NOT EXISTS `port_integratingtype` (
  `itt_id` int(11) NOT NULL,
  `itt_etitle` varchar(45) NOT NULL,
  `itt_ttitle` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_integratingtype`
--

INSERT INTO `port_integratingtype` (`itt_id`, `itt_etitle`, `itt_ttitle`) VALUES
(1, 'Instructional', 'การเรียนการสอน'),
(2, 'Academic Service', 'การบริการวิชาการ'),
(3, 'Nurturing', 'การทำนุบำรุง'),
(4, 'Other', 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `port_interest`
--

CREATE TABLE IF NOT EXISTS `port_interest` (
  `int_id` int(11) NOT NULL,
  `int_tname` varchar(255) DEFAULT NULL COMMENT 'ความสนใจภาษาไทย',
  `int_ename` varchar(255) DEFAULT NULL COMMENT 'ความสนใจภาษาอังกฤษ',
  `itt_id` int(11) DEFAULT NULL COMMENT 'ประเภทของเรื่องที่สนใจ\n1.หัวข้อที่สนใจ\n2.สาขาที่เชี่ยวชาญและสนใจ',
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='ความสนใจ';

--
-- Dumping data for table `port_interest`
--

INSERT INTO `port_interest` (`int_id`, `int_tname`, `int_ename`, `itt_id`, `usr_id`) VALUES
(1, 'Internet of Things', 'Internet of Things', 1, 8),
(2, 'Big data', 'Big data', 1, 8),
(4, 'ผู้ดูและระบบ', 'System Adminitrator', 2, 8),
(5, 'การพัฒนาระบบบนอุปกรณ์เคลื่อนที่', 'Mobile Application Development', 1, 8),
(6, 'การทดสอบซอฟต์แวร์', 'Software Testing', 1, 8),
(7, 'ความมั่นคงปลอดภัยในระบบสารสนเทศ', 'Information Security', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `port_interesttype`
--

CREATE TABLE IF NOT EXISTS `port_interesttype` (
  `itt_id` int(11) NOT NULL,
  `itt_tname` varchar(45) DEFAULT NULL COMMENT 'ประเภทของประสบการณ์ภาษาไทย',
  `itt_ename` varchar(45) DEFAULT NULL COMMENT 'ประเภทของประสบการณ์ภาษาอังกฤษ'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_interesttype`
--

INSERT INTO `port_interesttype` (`itt_id`, `itt_tname`, `itt_ename`) VALUES
(1, 'หัวข้อที่สนใจ', 'Topics of interest'),
(2, 'สาขาที่เชี่ยวชาญและสนใจ', 'Areas of Expertise and Interest');

-- --------------------------------------------------------

--
-- Table structure for table `port_jobexperience`
--

CREATE TABLE IF NOT EXISTS `port_jobexperience` (
  `jox_id` int(11) NOT NULL,
  `jox_tname` varchar(45) DEFAULT NULL COMMENT 'ชื่อประสบการณ์การทำงานภาษาไทย',
  `jox_ename` varchar(45) DEFAULT NULL COMMENT 'ชื่อประสบการณ์การทำงานภาษาอังกฤษ',
  `jox_fromdate` varchar(4) DEFAULT NULL,
  `jox_todate` varchar(4) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='ประสบการณ์การทำงาน';

--
-- Dumping data for table `port_jobexperience`
--

INSERT INTO `port_jobexperience` (`jox_id`, `jox_tname`, `jox_ename`, `jox_fromdate`, `jox_todate`, `usr_id`) VALUES
(1, 'สำนักคอมพิวเตอร์', 'Computer Center, Burapha University', '2004', '2012', 8),
(2, 'คณะวิทยาการสารสนเทศ มหาวิทยาลัยบูรพา', 'Informatics Faculty, Burapha University', '2012', '9999', 8);

-- --------------------------------------------------------

--
-- Table structure for table `port_level`
--

CREATE TABLE IF NOT EXISTS `port_level` (
  `edl_id` int(11) NOT NULL,
  `edl_tname` varchar(45) DEFAULT NULL COMMENT 'ปริญญาตรี ปริญญาโท ปริญญาเอก',
  `edl_ename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='ระดับของการศึกษา ตรี โท เอก';

--
-- Dumping data for table `port_level`
--

INSERT INTO `port_level` (`edl_id`, `edl_tname`, `edl_ename`) VALUES
(1, 'ปริญญาตรี', 'Bachelor''s degree'),
(2, 'ปริญญาโท', 'Master''s degree'),
(3, 'ปริญญาเอก', 'Doctorate');

-- --------------------------------------------------------

--
-- Table structure for table `port_mail`
--

CREATE TABLE IF NOT EXISTS `port_mail` (
  `mail_id` int(11) NOT NULL,
  `mail_name` varchar(255) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_mail`
--

INSERT INTO `port_mail` (`mail_id`, `mail_name`, `usr_id`) VALUES
(1, 'athitha.c@gmail.com', 3),
(2, ' nuansri@buu.ac.th', 2),
(3, 'mai.janya@gmail.com', 20),
(4, 'komate@gmail.com', 19),
(5, 'rsunisa@buu.ac.th', 17),
(6, 'benchapornj@yahoo.com', 16),
(7, 'pusit@buu.ac.th', 14),
(8, 'jakkarin@buu.ac.th', 13),
(9, 'kkubola@gmail.com', 12),
(10, 'krisana@buu.ac.th', 10),
(11, 'peerasak@buu.ac.th', 4),
(12, ' buraphalinuxserver@gmail.com', 5),
(13, '', 1),
(14, 'thatsanee@gmail.com', 6),
(15, 'thanets@buu.ac.th', 7),
(16, 'aekapop@buu.ac.th', 8),
(17, 'raveenun@buu.ac.th', 9),
(18, '', 31),
(19, 'prempreeda@buu.ac.th', 32),
(20, 'sirijan@buu.ac.th', 29),
(21, 'pattamawa@buu.ac.th', 28),
(22, '', 30),
(23, 'hansa@buu.ac.th', 27),
(24, 'kamonwans@buu.ac.th', 26),
(25, 'kornsahanan@buu.ac.th', 25),
(26, '', 23),
(27, '', 24),
(28, 'banksompun@gmail.com', 22),
(29, 'sithipong@buu.ac.th', 21),
(30, 'isdat@buu.ac.th', 18),
(31, 'nittayat@buu.ac.th', 11),
(32, 'onanongr@buu.ac.th', 15),
(33, '', 33),
(34, 'stu55160403@gmail.com', 34),
(35, 'aekapop@go.buu.ac.th', 8),
(36, 'thatsanee@buu.ac.th', 6);

-- --------------------------------------------------------

--
-- Table structure for table `port_major`
--

CREATE TABLE IF NOT EXISTS `port_major` (
  `maj_id` int(11) NOT NULL,
  `maj_tname` varchar(45) DEFAULT NULL,
  `maj_ename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='สาขาวิชาที่จบการศึกษา';

--
-- Dumping data for table `port_major`
--

INSERT INTO `port_major` (`maj_id`, `maj_tname`, `maj_ename`) VALUES
(1, 'วิทยาการคอมพิวเตอร์', 'Computer Science'),
(2, 'เทคโนโลยีสารสนเทศ', 'Information Technology'),
(3, 'วิศวกรรมคอมพิวเตอร์', 'Computer Engineering'),
(4, 'คณิตศาสตร์ประยุกต์', 'Applied Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `port_position`
--

CREATE TABLE IF NOT EXISTS `port_position` (
  `rpo_id` int(11) NOT NULL,
  `rpo_etitle` varchar(45) NOT NULL,
  `rpo_ttitle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_prefix`
--

CREATE TABLE IF NOT EXISTS `port_prefix` (
  `pfx_id` int(10) NOT NULL,
  `pfx_tname` varchar(45) NOT NULL,
  `pfx_ename` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_prefix`
--

INSERT INTO `port_prefix` (`pfx_id`, `pfx_tname`, `pfx_ename`) VALUES
(1, 'นาย', 'Mr.'),
(2, 'นาง', 'Mrs.'),
(3, 'นางสาว', 'Miss');

-- --------------------------------------------------------

--
-- Table structure for table `port_research`
--

CREATE TABLE IF NOT EXISTS `port_research` (
  `res_id` int(11) NOT NULL,
  `res_publicationtype` varchar(45) DEFAULT NULL,
  `res_eproject` varchar(45) DEFAULT NULL,
  `res_tproject` varchar(45) DEFAULT NULL,
  `res_etitle` varchar(45) DEFAULT NULL,
  `res_ttitle` varchar(45) DEFAULT NULL,
  `res_edonor` varchar(45) DEFAULT NULL,
  `res_tdonor` varchar(45) DEFAULT NULL,
  `res_journals` varchar(45) DEFAULT NULL,
  `res_conference` varchar(45) DEFAULT NULL,
  `res_place` varchar(45) DEFAULT NULL,
  `res_date` varchar(45) DEFAULT NULL,
  `res_year` varchar(4) NOT NULL,
  `res_month` varchar(45) DEFAULT NULL,
  `res_page` varchar(45) DEFAULT NULL,
  `res_cluster` varchar(100) DEFAULT NULL,
  `res_track` varchar(100) DEFAULT NULL,
  `res_abstract` varchar(254) DEFAULT NULL,
  `res_abstractfile` varchar(45) DEFAULT NULL,
  `res_keyword` varchar(254) DEFAULT NULL,
  `rlv_id` int(11) DEFAULT NULL,
  `rst_id` int(11) DEFAULT NULL,
  `ret_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='													';

--
-- Dumping data for table `port_research`
--

INSERT INTO `port_research` (`res_id`, `res_publicationtype`, `res_eproject`, `res_tproject`, `res_etitle`, `res_ttitle`, `res_edonor`, `res_tdonor`, `res_journals`, `res_conference`, `res_place`, `res_date`, `res_year`, `res_month`, `res_page`, `res_cluster`, `res_track`, `res_abstract`, `res_abstractfile`, `res_keyword`, `rlv_id`, `rst_id`, `ret_id`) VALUES
(17, '1', 'a', 'a', NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, '2222', NULL, NULL, NULL, NULL, '', NULL, 'aasd,asdf,sdf', NULL, 2, 1),
(18, '1', 'a', 'a', NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, '2222', NULL, NULL, NULL, NULL, '', NULL, 'aasd,asdf,sdf', NULL, 2, 1),
(19, '1', 'a', 'a', NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, '2222', NULL, NULL, NULL, NULL, '', NULL, 'aasd,asdf,sdf', NULL, 2, 1),
(20, '1', 'a', 'a', NULL, NULL, 'a', 'a', NULL, NULL, NULL, NULL, '2222', NULL, NULL, NULL, NULL, '', '', 'aasd,asdf,sdf', NULL, 2, 1),
(21, '2', 'ssss', 'เเเ', 'aa', 'เเเ', NULL, NULL, 'B', NULL, NULL, NULL, '2222', '2', '2015/2/5', '2222', '2222', NULL, 'research4.txt', 'aadsfasfsfasdf,sadfasdf,asdf,sdaf,dsafasd,fasf,ads,fa', 1, NULL, NULL),
(22, '3', 'aaaaa', 'ททท', 'aaaa', 'ทท', NULL, NULL, NULL, 'aaaa', '0', '12/06/2015 - 12/06/2015', '2015', '2', '2015/2/5', 'informatics', 'software engineering', NULL, 'research5.txt', '', 2, NULL, NULL),
(23, '2', 'ttt', 'อออออ', 'aaaa', 'ออออ', NULL, NULL, 'aaaa', NULL, NULL, NULL, '2015', '2', '2015/2/5', 'informatics', 'software engineering', NULL, '', 'aaa', 2, NULL, NULL),
(24, '3', 'Integration of the Spatial data in a Business', 'การบูรณาการข้อมูลเชิงพื้นที่กับระบบธุรกิจอัจฉ', 'The 9th National Conference on Computing and ', 'การประชุมวิชาการระดับชาติด้านคอมพิวเตอร์และเท', NULL, NULL, NULL, 'การประชุมวิชาการระดับชาติด้านคอมพิวเตอร์และเท', NULL, '09/05/2013 - 10/05/2013', '2013', '3', '(154-160)', '', '', NULL, NULL, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_researcher`
--

CREATE TABLE IF NOT EXISTS `port_researcher` (
  `rer_id` int(11) NOT NULL,
  `rer_sequence` int(11) DEFAULT NULL,
  `rer_percent` varchar(45) DEFAULT NULL,
  `rsd_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `res_id` int(11) NOT NULL,
  `rpo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_researcher`
--

INSERT INTO `port_researcher` (`rer_id`, `rer_sequence`, `rer_percent`, `rsd_id`, `usr_id`, `res_id`, `rpo_id`) VALUES
(4, NULL, '100', NULL, 34, 20, 2),
(5, 1, NULL, NULL, 34, 21, NULL),
(6, 1, NULL, NULL, 34, 22, NULL),
(7, 2, NULL, 1, NULL, 22, NULL),
(8, 3, NULL, 3, NULL, 22, NULL),
(9, 2, NULL, 1, NULL, 21, NULL),
(10, 1, NULL, NULL, 34, 23, NULL),
(11, 2, NULL, NULL, 33, 23, NULL),
(12, 3, NULL, NULL, 31, 23, NULL),
(13, 1, NULL, NULL, 8, 24, NULL),
(14, 2, NULL, 2, NULL, 24, NULL),
(15, 3, NULL, 1, NULL, 24, NULL),
(16, 4, NULL, NULL, 4, 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_researchertype`
--

CREATE TABLE IF NOT EXISTS `port_researchertype` (
  `rst_id` int(11) NOT NULL,
  `rst_tname` varchar(45) DEFAULT NULL,
  `rst_ename` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ประเภทผู้วิจัย หัวหน้า ผู้ร่วม นิสิต';

--
-- Dumping data for table `port_researchertype`
--

INSERT INTO `port_researchertype` (`rst_id`, `rst_tname`, `rst_ename`) VALUES
(1, 'หัวหน้าโครงการวิจัย', 'Project Leader'),
(2, 'ผู้วิจัย', 'Researcher'),
(3, 'ผู้ร่วมวิจัย', 'Researcher'),
(4, 'นิสิต', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `port_researchlevel`
--

CREATE TABLE IF NOT EXISTS `port_researchlevel` (
  `rlv_id` int(11) NOT NULL,
  `rlv_etitle` varchar(45) NOT NULL,
  `rlv_ttitle` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_researchlevel`
--

INSERT INTO `port_researchlevel` (`rlv_id`, `rlv_etitle`, `rlv_ttitle`) VALUES
(1, 'National', 'ชาติ'),
(2, 'International', 'นานาชาติ');

-- --------------------------------------------------------

--
-- Table structure for table `port_researchstatus`
--

CREATE TABLE IF NOT EXISTS `port_researchstatus` (
  `rst_id` int(11) NOT NULL,
  `rst_etitle` varchar(45) NOT NULL,
  `rst_ttitle` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_researchstatus`
--

INSERT INTO `port_researchstatus` (`rst_id`, `rst_etitle`, `rst_ttitle`) VALUES
(1, 'Published', 'เผยแพร่เรียบร้อยแล้ว'),
(2, 'Operational research', 'เริ่มดำเนินงานวิจัย'),
(3, 'Progress report', 'ส่งรายงานความก้าวหน้า'),
(4, 'Complete report comparable', 'ส่งรายงานเทียบเคียงฉบับสมบูรณ์'),
(5, 'Report', 'ส่งรายงานฉบับสมบูรณ์'),
(6, 'Published / Deployed.', 'ตีพิมพ์/นำไปใช้งาน');

-- --------------------------------------------------------

--
-- Table structure for table `port_researchstudent`
--

CREATE TABLE IF NOT EXISTS `port_researchstudent` (
  `rsd_id` int(11) NOT NULL,
  `rsd_efname` varchar(45) NOT NULL,
  `rsd_tfname` varchar(45) NOT NULL,
  `rsd_elname` varchar(45) NOT NULL,
  `rsd_tlname` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_researchstudent`
--

INSERT INTO `port_researchstudent` (`rsd_id`, `rsd_efname`, `rsd_tfname`, `rsd_elname`, `rsd_tlname`) VALUES
(1, 'Surangkana', 'สุรางคนา', 'Surangkana', 'ธรรมลิขิต'),
(2, 'Anusorn', 'อนุสรณ์', 'Benjatanarat', 'เบญจธนรัตน์'),
(3, 'Sarin', 'สาริน', 'Kesphanich', 'เกสพานิช');

-- --------------------------------------------------------

--
-- Table structure for table `port_researchtype`
--

CREATE TABLE IF NOT EXISTS `port_researchtype` (
  `ret_id` int(11) NOT NULL,
  `ret_tname` varchar(45) DEFAULT NULL COMMENT 'ประเภทผลงานวิจัยภาษาไทย',
  `ret_ename` varchar(45) DEFAULT NULL COMMENT 'ประเภทผลงานวิจัยภาษาอังกฤษ'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='ประเภทผลงานวิจัย';

--
-- Dumping data for table `port_researchtype`
--

INSERT INTO `port_researchtype` (`ret_id`, `ret_tname`, `ret_ename`) VALUES
(1, 'พื้นฐาน', 'Basic research'),
(2, 'ชั้นเรียน', 'Classroom research');

-- --------------------------------------------------------

--
-- Table structure for table `port_subject`
--

CREATE TABLE IF NOT EXISTS `port_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_code` int(6) NOT NULL,
  `sub_tname` varchar(100) NOT NULL,
  `sub_ename` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_subject`
--

INSERT INTO `port_subject` (`sub_id`, `sub_code`, `sub_tname`, `sub_ename`) VALUES
(2, 887370, 'การให้บริการและเทคโนโลยีทางอินเทอร์เน็ต', 'Internet Technology and Services'),
(3, 887493, 'หัวข้อเลือกสรรทางเทคโนโลยีสารสนเทศ 1 (การทดสอบซอฟต์แวร์)', 'Selected Topic in Information Technology I (Software Testing)'),
(4, 887493, 'หัวข้อเลือกสรรทางเทคโนโลยีสารสนเทศ 1', 'Selected Topic in Information Technology I'),
(5, 887373, 'เทคโนโลยีเว็บเซอร์วิส', 'Web Services Technology'),
(6, 886201, 'หลักการโปรแกรม 1', 'Programming Fundamental I'),
(7, 887321, 'การจัดการความมั่นคงของระบบสารสนเทศ', 'Information Security Management'),
(8, 886202, 'หลักการโปรแกรม 2', 'Programming Fundamental II'),
(9, 885101, 'เทคโนโลยีสารสนเทศในชีวิตประจำวัน', 'Information Technology in Daily Life'),
(10, 888363, 'การทดสอบซอฟต์แวร์และการประกันคุณภาพ', 'Software Testing and Quality Assurance'),
(11, 888354, 'วิศวกรรมเว็บและเทคโนโลยีร่วมสมัย', 'Web Engineering and Contemporary Technology'),
(12, 888352, 'ปฏิบัติการกระบวนการพัฒนาซอฟต์แวร์เชิงกลุ่มงาน', 'Team Software Development Process Laboratory'),
(13, 888232, 'ระบบฐานข้อมูลและการออกแบบระบบฐานข้อมูล', 'Database Systems and Design'),
(14, 886433, 'ความมั่นคงในระบบคอมพิวเตอร์', 'Computer Security'),
(16, 888248, 'ปฏิบัติการกระบวนการพัฒนาซอฟต์แวร์เชิงบุคคล', 'Personal Software Development Process Laboratory'),
(17, 888213, 'ปฏิบัติการวิศวกรรมความต้องการและเอกสารโครงการซอฟต์แวร์', 'Software Requirement Engineering and Documentation Laboratory'),
(18, 888417, 'สัมมนาวิศวกรรมซอฟต์แวร์', 'Software Engineering Seminar'),
(19, 887330, 'การพัฒนาโปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่', 'Application Development for Mobile Devices');

-- --------------------------------------------------------

--
-- Table structure for table `port_tech`
--

CREATE TABLE IF NOT EXISTS `port_tech` (
  `tec_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `tec_year` year(4) DEFAULT NULL COMMENT 'ปีการศึกษาที่สอน',
  `tec_semester` enum('1','2','Sum') DEFAULT NULL COMMENT 'เทอมที่สอน'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='รายวิชาที่สอน';

--
-- Dumping data for table `port_tech`
--

INSERT INTO `port_tech` (`tec_id`, `usr_id`, `sub_id`, `tec_year`, `tec_semester`) VALUES
(1, 8, 3, 2016, '1'),
(2, 8, 19, 2016, '1'),
(3, 8, 2, 2016, '1'),
(4, 8, 8, 2015, 'Sum'),
(5, 8, 6, 2015, '2'),
(6, 8, 5, 2015, '2'),
(7, 8, 2, 2015, '1'),
(8, 8, 7, 2015, '1'),
(9, 8, 19, 2015, '1'),
(10, 8, 19, 2014, '2'),
(11, 8, 14, 2014, '2'),
(12, 8, 13, 2014, '2'),
(13, 8, 9, 2014, '2'),
(14, 8, 9, 2014, '1'),
(15, 8, 6, 2014, '1'),
(16, 8, 12, 2014, '1'),
(17, 8, 10, 2014, '1'),
(18, 8, 11, 2014, '1'),
(19, 8, 17, 2013, '2'),
(20, 8, 19, 2013, '2'),
(21, 8, 13, 2013, '2'),
(22, 8, 16, 2013, '1'),
(23, 8, 11, 2013, '1'),
(24, 8, 12, 2013, '1'),
(25, 8, 18, 2014, '2');

-- --------------------------------------------------------

--
-- Table structure for table `port_tel`
--

CREATE TABLE IF NOT EXISTS `port_tel` (
  `tel_id` int(11) NOT NULL,
  `tel_tlabel` varchar(45) DEFAULT NULL COMMENT 'ประเภทของเบอร์โทรศัพท์ภาษาไทย',
  `tel_elabel` varchar(45) DEFAULT NULL COMMENT 'ประเภทของเบอร์โทรศัพท์ภาษาอังกฤษ',
  `tel_number` varchar(20) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_tel`
--

INSERT INTO `port_tel` (`tel_id`, `tel_tlabel`, `tel_elabel`, `tel_number`, `usr_id`) VALUES
(1, 'มือถือ', 'Mobile', '', 3),
(2, 'มือถือ', 'Mobile', '', 2),
(3, 'มือถือ', 'Mobile', '', 20),
(4, 'มือถือ', 'Mobile', '', 19),
(5, 'มือถือ', 'Mobile', '', 17),
(6, 'มือถือ', 'Mobile', '', 16),
(7, 'มือถือ', 'Mobile', '', 14),
(8, 'มือถือ', 'Mobile', '', 13),
(9, 'มือถือ', 'Mobile', '', 12),
(10, 'มือถือ', 'Mobile', '', 10),
(11, 'มือถือ', 'Mobile', '', 4),
(12, 'มือถือ', 'Mobile', '', 5),
(13, 'มือถือ', 'Mobile', '', 1),
(14, 'มือถือ', 'Mobile', '081 657 0599', 6),
(15, 'มือถือ', 'Mobile', '', 7),
(16, 'ที่ทำงาน', 'Work', '3092', 8),
(17, 'ที่ทำงาน', 'Work', '3061', 9),
(18, 'ที่ทำงาน', 'Work', '3060', 31),
(19, 'ที่ทำงาน', 'Work', '2700 ต่อ 412', 32),
(20, 'ที่ทำงาน', 'Work', '2044 ต่อ 25', 29),
(21, 'ที่ทำงาน', 'Work', '2044 ต่อ 25', 28),
(22, 'ที่ทำงาน', 'Work', '3060', 30),
(23, 'ที่ทำงาน', 'Work', '3060', 27),
(24, 'ที่ทำงาน', 'Work', '2044 ต่อ 24', 26),
(25, 'ที่ทำงาน', 'Work', '3096', 25),
(26, 'ที่ทำงาน', 'Work', '2700 ต่อ 404', 23),
(27, 'ที่ทำงาน', 'Work', '2700 ต่อ 404', 24),
(28, 'ที่ทำงาน', 'Work', '2700 ต่อ 404', 22),
(29, 'ที่ทำงาน', 'Work', '3061', 21),
(30, 'ที่ทำงาน', 'Work', '2044 ต่อ 23', 18),
(31, 'ที่ทำงาน', 'Work', '2044 ต่อ 25', 11),
(32, 'ที่ทำงาน', 'Work', '2044 ต่อ 25', 15),
(33, 'มือถือ', 'Mobile', '', 33),
(34, 'มือถือ', 'Mobile', '0818403445', 34);

-- --------------------------------------------------------

--
-- Table structure for table `port_type`
--

CREATE TABLE IF NOT EXISTS `port_type` (
  `rty_id` int(11) NOT NULL,
  `rty_etitle` varchar(45) NOT NULL,
  `rty_ttitle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_user`
--

CREATE TABLE IF NOT EXISTS `port_user` (
  `usr_id` int(11) NOT NULL,
  `usr_tfname` varchar(45) DEFAULT NULL,
  `usr_tlname` varchar(45) DEFAULT NULL,
  `usr_efname` varchar(45) DEFAULT NULL,
  `usr_elname` varchar(45) DEFAULT NULL,
  `usr_tposition` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาไทย',
  `usr_eposition` varchar(45) DEFAULT NULL COMMENT 'ชื่อตำแหน่งภาษาอังกฤษ',
  `usr_istea` enum('0','1') DEFAULT '0',
  `usr_isphd` enum('0','1') DEFAULT '0',
  `usr_picpath` varchar(255) DEFAULT NULL,
  `pfx_id` int(11) DEFAULT NULL,
  `acr_id` int(11) DEFAULT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `uaut_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_user`
--

INSERT INTO `port_user` (`usr_id`, `usr_tfname`, `usr_tlname`, `usr_efname`, `usr_elname`, `usr_tposition`, `usr_eposition`, `usr_istea`, `usr_isphd`, `usr_picpath`, `pfx_id`, `acr_id`, `dep_id`, `uaut_id`) VALUES
(1, 'กุลชลี', 'รัตนคร', 'Khulchalee', 'Ratnakorn', 'งานทะเบียนและสถิติของนิสิต', 'Educational Staffs', '0', '0', 'khulchal.png', 3, 1, 4, 1),
(2, 'นวลศรี', 'เด่นวัฒนา', 'Nuansri', 'Denwattana', NULL, NULL, '1', '0', 'nuansri.png', 3, 3, 3, 2),
(3, 'อธิตา', 'อ่อนเอื้อน', 'Athitha', 'On-uean', NULL, NULL, '1', '0', 'athitha.png', 0, 4, 3, 3),
(4, 'พีระศักดิ์', 'เพียรประสิทธิ์', 'Peerasak', 'Pianprasit', NULL, NULL, '1', '0', 'peerasak.jpg', 0, 4, 3, 4),
(5, 'จอห์น', 'เกตวูต แฮม', 'John', 'Gatewood Ham', NULL, NULL, '1', '0', 'john.png', 0, 4, 3, 5),
(6, 'ทัศนีย์', 'เจริญพร', 'Thatsanee', 'Charoenporn', NULL, NULL, '1', '1', 'thatsanee.jpg', 3, 4, 3, 6),
(7, 'ธเนศร์', 'สุขสุวรรณ', 'Thanet', 'Suksuwan', NULL, NULL, '1', '0', 'thanets.jpg', 0, 4, 3, 7),
(8, 'เอกภพ', 'บุญเพ็ง', 'Aekapop', 'Bunpeng', NULL, NULL, '1', '0', 'aekapop.jpg', 1, 4, 2, 8),
(9, 'ระวีนันท์', 'ชูสินชินภัทร', 'Raveenun', 'Chusinchinnapat', NULL, NULL, '0', '0', 'raveenun.png', 0, 4, 4, 9),
(10, 'กฤษณะ', 'ชินสาร', 'Krisana', 'Chinnasarn', NULL, NULL, '1', '0', 'krisana.jpg', 0, 3, 1, 10),
(11, 'นิตยา', 'ติรพงษ์พัฒน์', 'Nittaya', 'Tirapongpat', NULL, NULL, '0', '0', 'nittayat.png', 0, 1, 4, 11),
(12, 'คนึงนิจ', 'กุโบลา', 'Kanuengnij', 'Kubola', NULL, NULL, '1', '0', 'kubola.png', 0, 4, 1, 12),
(13, 'จักริน', 'สุขสวัสดิ์ชน', 'Jakkarin', 'Suksawatchon', NULL, NULL, '1', '0', 'jakkarin.png', 0, 4, 1, 13),
(14, 'ภูสิต', 'กุลเกษม', 'Pusit', 'Kulkasem', NULL, NULL, '1', '0', 'pusit.png', 0, 1, 1, 14),
(15, 'อรอนงค์', 'ร้อยทา', 'Onanong', 'Royta', NULL, NULL, '0', '0', 'onanongr.png', 0, 1, 4, 15),
(16, 'เบญจภรณ์', 'จันทรกองกุล', 'Benchaporn', 'antarakongkul', NULL, NULL, '1', '0', 'benchapo.png', 0, 4, 1, 16),
(17, 'สุนิสา', 'ริมเจริญ', 'Sunisa', 'Rimcharoen', NULL, NULL, '1', '0', 'rsunisa.png', 0, 3, 1, 17),
(18, 'เกรียงศักดิ์', 'ปานโพธิ์ทอง', 'Kriengsak', 'Panpothong', NULL, NULL, '0', '0', 'isdat.png', 0, 1, 4, 18),
(19, 'โกเมศ', 'อัมพวัน', 'Komate', 'Amphawan', NULL, NULL, '1', '0', 'komate.jpg', 0, 4, 1, 19),
(20, 'จรรยา', 'อ้นปันส์', 'Janya', 'Onpans', NULL, NULL, '1', '0', 'janya.jpg', 0, 4, 1, 20),
(21, 'สิทธิพงษ์', 'ฉิมไทย', 'Sitthipong', 'Chimthai', NULL, NULL, '0', '0', 'sithipong.png', 0, 1, 4, 21),
(22, 'สิทธิชัย', 'สมพันธุ์', 'sitthichai', 'sompun', NULL, NULL, '0', '0', 'sitthichai.png', 0, 1, 4, 22),
(23, 'มาโนชญ์', 'ใจกว้าง', 'Manoch', 'Chaikwang', NULL, NULL, '0', '0', 'manotej.jpg', 0, 1, 4, 23),
(24, 'ศักดิ์ดา', 'บุญภา', 'Sakda', 'Boonpa', NULL, NULL, '0', '0', 'sakda.jpg', 0, 1, 4, 24),
(25, 'กรสหนันท์', 'ต่อพงษ์พันธุ์', 'Kornsahana', 'Torpongpan', NULL, NULL, '0', '0', 'kornsahanan.png', 0, 1, 4, 25),
(26, 'กมลวรรณ', 'แสงระวี', 'Kamonwan', 'Sangrawee', NULL, NULL, '0', '0', 'kamonwans.png', 0, 1, 4, 26),
(27, 'หรรษา', 'รอดเงิน', 'Hansa', 'Rodngern', NULL, NULL, '0', '0', 'hansa.png', 0, 1, 4, 27),
(28, 'ปัทมา', 'วชิรพันธุ์', 'Pattama', 'Wachirapan', NULL, NULL, '0', '0', 'pattamawa.png', 0, 1, 4, 28),
(29, 'ศิริจันทร์', 'แซ่ลี้', 'Sirichan', 'Saelee', NULL, NULL, '0', '0', 'sirijan.png', 0, 1, 4, 29),
(30, 'สุธาทิพย์', 'ทรัพย์ประเสริฐ', 'Suthathip', 'Sapprasert', NULL, NULL, '0', '0', 'suthathip.png', 0, 1, 4, 30),
(31, 'สุธน', 'ทองปาน', 'Suthon', 'Thongpan', NULL, NULL, '0', '0', 'suthon.png', 0, 1, 4, 31),
(32, 'เปรมปรีดา', 'สลับสี', 'Prempreeda', 'Salubsee', NULL, NULL, '0', '0', 'prempreeda.jpg', 0, 1, 5, 32),
(33, 'สุวรรณา', 'รัศมีขวัญ', 'SUWANNA', 'RASMEQUAN', NULL, NULL, '1', '0', 'rsuwanna.png', 0, 3, 1, 33),
(34, 'สาริน', 'เกสพานิช', 'Sarin', 'Kesphanich', NULL, NULL, '1', '1', 'sarin.jpg', 1, 1, 3, 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `port_academictitle`
--
ALTER TABLE `port_academictitle`
  ADD PRIMARY KEY (`acr_id`);

--
-- Indexes for table `port_award`
--
ALTER TABLE `port_award`
  ADD PRIMARY KEY (`awd_id`), ADD KEY `fk_port_award_1_idx` (`usr_id`);

--
-- Indexes for table `port_country`
--
ALTER TABLE `port_country`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `port_degree`
--
ALTER TABLE `port_degree`
  ADD PRIMARY KEY (`deg_id`), ADD KEY `edl_id` (`edl_id`);

--
-- Indexes for table `port_department`
--
ALTER TABLE `port_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `port_educationalbackground`
--
ALTER TABLE `port_educationalbackground`
  ADD PRIMARY KEY (`edb_id`), ADD KEY `fk_port_educationalbackground_1_idx` (`ins_id`), ADD KEY `fk_port_educationalbackground_2_idx` (`deg_id`), ADD KEY `fk_port_educationalbackground_3_idx` (`maj_id`), ADD KEY `fk_port_educationalbackground_4_idx` (`usr_id`);

--
-- Indexes for table `port_funding`
--
ALTER TABLE `port_funding`
  ADD PRIMARY KEY (`fud_id`), ADD KEY `fk_port_funding_port_research1_idx` (`res_id`);

--
-- Indexes for table `port_institute`
--
ALTER TABLE `port_institute`
  ADD PRIMARY KEY (`ins_id`), ADD KEY `fk_port_institute_1_idx` (`cou_id`);

--
-- Indexes for table `port_integrating`
--
ALTER TABLE `port_integrating`
  ADD PRIMARY KEY (`int_id`), ADD KEY `fk_port_integrating_port_research1_idx` (`res_id`);

--
-- Indexes for table `port_integratingconnect`
--
ALTER TABLE `port_integratingconnect`
  ADD PRIMARY KEY (`inc_id`), ADD KEY `fk_port_integrating_connect_port_integrating1_idx` (`int_id`), ADD KEY `fk_port_integrating_connect_port_integrating_type1_idx` (`itt_id`);

--
-- Indexes for table `port_integratingtype`
--
ALTER TABLE `port_integratingtype`
  ADD PRIMARY KEY (`itt_id`);

--
-- Indexes for table `port_interest`
--
ALTER TABLE `port_interest`
  ADD PRIMARY KEY (`int_id`), ADD KEY `fk_port_interest_1_idx` (`usr_id`), ADD KEY `fk_port_interest_2_idx` (`itt_id`);

--
-- Indexes for table `port_interesttype`
--
ALTER TABLE `port_interesttype`
  ADD PRIMARY KEY (`itt_id`);

--
-- Indexes for table `port_jobexperience`
--
ALTER TABLE `port_jobexperience`
  ADD PRIMARY KEY (`jox_id`), ADD KEY `fk_port_jobexperience_1_idx` (`usr_id`);

--
-- Indexes for table `port_level`
--
ALTER TABLE `port_level`
  ADD PRIMARY KEY (`edl_id`);

--
-- Indexes for table `port_mail`
--
ALTER TABLE `port_mail`
  ADD PRIMARY KEY (`mail_id`), ADD KEY `fk_port_mail_1_idx` (`usr_id`);

--
-- Indexes for table `port_major`
--
ALTER TABLE `port_major`
  ADD PRIMARY KEY (`maj_id`);

--
-- Indexes for table `port_position`
--
ALTER TABLE `port_position`
  ADD PRIMARY KEY (`rpo_id`);

--
-- Indexes for table `port_prefix`
--
ALTER TABLE `port_prefix`
  ADD PRIMARY KEY (`pfx_id`);

--
-- Indexes for table `port_research`
--
ALTER TABLE `port_research`
  ADD PRIMARY KEY (`res_id`), ADD KEY `fk_port_research_port_research_level_idx` (`rlv_id`), ADD KEY `fk_port_research_port_research_status1_idx` (`rst_id`), ADD KEY `fk_port_research_port_type1_idx` (`ret_id`);

--
-- Indexes for table `port_researcher`
--
ALTER TABLE `port_researcher`
  ADD PRIMARY KEY (`rer_id`), ADD KEY `fk_port_researcher_port_research1_idx` (`res_id`), ADD KEY `fk_port_researcher_port_position1_idx` (`rpo_id`), ADD KEY `usr_id` (`usr_id`), ADD KEY `rsd_id` (`rsd_id`);

--
-- Indexes for table `port_researchertype`
--
ALTER TABLE `port_researchertype`
  ADD PRIMARY KEY (`rst_id`);

--
-- Indexes for table `port_researchlevel`
--
ALTER TABLE `port_researchlevel`
  ADD PRIMARY KEY (`rlv_id`);

--
-- Indexes for table `port_researchstatus`
--
ALTER TABLE `port_researchstatus`
  ADD PRIMARY KEY (`rst_id`);

--
-- Indexes for table `port_researchstudent`
--
ALTER TABLE `port_researchstudent`
  ADD PRIMARY KEY (`rsd_id`);

--
-- Indexes for table `port_researchtype`
--
ALTER TABLE `port_researchtype`
  ADD PRIMARY KEY (`ret_id`);

--
-- Indexes for table `port_subject`
--
ALTER TABLE `port_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `port_tech`
--
ALTER TABLE `port_tech`
  ADD PRIMARY KEY (`tec_id`), ADD KEY `fk_port_tech_2_idx` (`sub_id`), ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `port_tel`
--
ALTER TABLE `port_tel`
  ADD PRIMARY KEY (`tel_id`), ADD KEY `fk_port_tel_1_idx` (`usr_id`);

--
-- Indexes for table `port_type`
--
ALTER TABLE `port_type`
  ADD PRIMARY KEY (`rty_id`);

--
-- Indexes for table `port_user`
--
ALTER TABLE `port_user`
  ADD PRIMARY KEY (`usr_id`), ADD KEY `fk_port_user_1_idx` (`acr_id`), ADD KEY `fk_port_user_2_idx` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `port_academictitle`
--
ALTER TABLE `port_academictitle`
  MODIFY `acr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_award`
--
ALTER TABLE `port_award`
  MODIFY `awd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `port_country`
--
ALTER TABLE `port_country`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `port_degree`
--
ALTER TABLE `port_degree`
  MODIFY `deg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_department`
--
ALTER TABLE `port_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `port_educationalbackground`
--
ALTER TABLE `port_educationalbackground`
  MODIFY `edb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `port_funding`
--
ALTER TABLE `port_funding`
  MODIFY `fud_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `port_institute`
--
ALTER TABLE `port_institute`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `port_integrating`
--
ALTER TABLE `port_integrating`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `port_integratingconnect`
--
ALTER TABLE `port_integratingconnect`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `port_integratingtype`
--
ALTER TABLE `port_integratingtype`
  MODIFY `itt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_interest`
--
ALTER TABLE `port_interest`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `port_interesttype`
--
ALTER TABLE `port_interesttype`
  MODIFY `itt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `port_jobexperience`
--
ALTER TABLE `port_jobexperience`
  MODIFY `jox_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `port_level`
--
ALTER TABLE `port_level`
  MODIFY `edl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `port_mail`
--
ALTER TABLE `port_mail`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `port_major`
--
ALTER TABLE `port_major`
  MODIFY `maj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_position`
--
ALTER TABLE `port_position`
  MODIFY `rpo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `port_prefix`
--
ALTER TABLE `port_prefix`
  MODIFY `pfx_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `port_research`
--
ALTER TABLE `port_research`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `port_researcher`
--
ALTER TABLE `port_researcher`
  MODIFY `rer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `port_researchertype`
--
ALTER TABLE `port_researchertype`
  MODIFY `rst_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_researchlevel`
--
ALTER TABLE `port_researchlevel`
  MODIFY `rlv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `port_researchstatus`
--
ALTER TABLE `port_researchstatus`
  MODIFY `rst_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `port_researchstudent`
--
ALTER TABLE `port_researchstudent`
  MODIFY `rsd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `port_researchtype`
--
ALTER TABLE `port_researchtype`
  MODIFY `ret_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `port_subject`
--
ALTER TABLE `port_subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `port_tech`
--
ALTER TABLE `port_tech`
  MODIFY `tec_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `port_tel`
--
ALTER TABLE `port_tel`
  MODIFY `tel_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `port_type`
--
ALTER TABLE `port_type`
  MODIFY `rty_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `port_user`
--
ALTER TABLE `port_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `port_award`
--
ALTER TABLE `port_award`
ADD CONSTRAINT `fk_port_award_1` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_degree`
--
ALTER TABLE `port_degree`
ADD CONSTRAINT `port_degree_ibfk_1` FOREIGN KEY (`edl_id`) REFERENCES `port_level` (`edl_id`);

--
-- Constraints for table `port_educationalbackground`
--
ALTER TABLE `port_educationalbackground`
ADD CONSTRAINT `fk_port_educationalbackground_1` FOREIGN KEY (`ins_id`) REFERENCES `port_institute` (`ins_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_educationalbackground_2` FOREIGN KEY (`deg_id`) REFERENCES `port_degree` (`deg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_educationalbackground_3` FOREIGN KEY (`maj_id`) REFERENCES `port_major` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_educationalbackground_4` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_funding`
--
ALTER TABLE `port_funding`
ADD CONSTRAINT `fk_port_funding_port_research1` FOREIGN KEY (`res_id`) REFERENCES `port_research` (`res_id`);

--
-- Constraints for table `port_institute`
--
ALTER TABLE `port_institute`
ADD CONSTRAINT `fk_port_institute_1` FOREIGN KEY (`cou_id`) REFERENCES `port_country` (`cou_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_integrating`
--
ALTER TABLE `port_integrating`
ADD CONSTRAINT `fk_port_integrating_port_research1` FOREIGN KEY (`res_id`) REFERENCES `port_research` (`res_id`);

--
-- Constraints for table `port_integratingconnect`
--
ALTER TABLE `port_integratingconnect`
ADD CONSTRAINT `fk_int_id` FOREIGN KEY (`int_id`) REFERENCES `port_integrating` (`int_id`),
ADD CONSTRAINT `fk_port_integrating_connect_port_integrating2` FOREIGN KEY (`itt_id`) REFERENCES `port_integratingtype` (`itt_id`) ON UPDATE CASCADE;

--
-- Constraints for table `port_interest`
--
ALTER TABLE `port_interest`
ADD CONSTRAINT `fk_port_interest_1` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_interest_2` FOREIGN KEY (`itt_id`) REFERENCES `port_interesttype` (`itt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_jobexperience`
--
ALTER TABLE `port_jobexperience`
ADD CONSTRAINT `fk_port_jobexperience_1` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_mail`
--
ALTER TABLE `port_mail`
ADD CONSTRAINT `fk_port_mail_1` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_research`
--
ALTER TABLE `port_research`
ADD CONSTRAINT `fk_port_research_port_research_level` FOREIGN KEY (`rlv_id`) REFERENCES `port_researchlevel` (`rlv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_research_port_research_status1` FOREIGN KEY (`rst_id`) REFERENCES `port_researchstatus` (`rst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_research_port_research_type` FOREIGN KEY (`ret_id`) REFERENCES `port_researchtype` (`ret_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_researcher`
--
ALTER TABLE `port_researcher`
ADD CONSTRAINT `fk_port_researcher_port_position1` FOREIGN KEY (`rpo_id`) REFERENCES `port_researchertype` (`rst_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_researcher_port_research1` FOREIGN KEY (`res_id`) REFERENCES `port_research` (`res_id`),
ADD CONSTRAINT `fk_port_researcher_port_researchstudent` FOREIGN KEY (`rsd_id`) REFERENCES `port_researchstudent` (`rsd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_researcher_port_user` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_tech`
--
ALTER TABLE `port_tech`
ADD CONSTRAINT `fk_port_tech_ib_2` FOREIGN KEY (`sub_id`) REFERENCES `port_subject` (`sub_id`),
ADD CONSTRAINT `port_tech_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`);

--
-- Constraints for table `port_tel`
--
ALTER TABLE `port_tel`
ADD CONSTRAINT `fk_port_tel_1` FOREIGN KEY (`usr_id`) REFERENCES `port_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_user`
--
ALTER TABLE `port_user`
ADD CONSTRAINT `fk_port_user_1` FOREIGN KEY (`acr_id`) REFERENCES `port_academictitle` (`acr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_port_user_2` FOREIGN KEY (`dep_id`) REFERENCES `port_department` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
