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
-- Database: `portfolio_ums`
--

-- --------------------------------------------------------

--
-- Table structure for table `port_question`
--

CREATE TABLE IF NOT EXISTS `port_question` (
  `que_id` int(11) NOT NULL,
  `que_question` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_user_authen`
--

CREATE TABLE IF NOT EXISTS `port_user_authen` (
  `uaut_id` int(11) NOT NULL,
  `uaut_username` varchar(45) NOT NULL,
  `uaut_password` varchar(255) NOT NULL,
  `uaut_tfname` varchar(45) DEFAULT NULL,
  `uaut_tlname` varchar(45) DEFAULT NULL,
  `uaut_efname` varchar(45) DEFAULT NULL,
  `uaut_elname` varchar(45) DEFAULT NULL,
  `uaut_answer` varchar(45) DEFAULT NULL,
  `que_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_user_authen`
--

INSERT INTO `port_user_authen` (`uaut_id`, `uaut_username`, `uaut_password`, `uaut_tfname`, `uaut_tlname`, `uaut_efname`, `uaut_elname`, `uaut_answer`, `que_id`) VALUES
(1, 'khulchal', '$2y$10$w4bJRlqLQKj5g6TPkxO1WuWWOFSLY5E5zflSgfFbCmNIQ7fHgApNa', 'กุลชลี', 'รัตนคร', 'Khulchalee', 'Ratnakorn', NULL, NULL),
(2, 'nuansri', '$2y$10$zqmpwZcTf3osPO7FmtqJOeulx1irihMfHoZj/s6X0oOTn/yT6pv.W', 'นวลศรี', 'เด่นวัฒนา', 'Nuansri', 'Denwattana', NULL, NULL),
(3, 'athitha', '$2y$10$8U9AFI7JnF8BCKsIqNcn6e1TUTrYhwfpUW.Mvw1iEqL/pf6jTI.7y', 'อธิตา', 'อ่อนเอื้อน', 'Athitha', 'On-uean', NULL, NULL),
(4, 'peerasak', '$2y$10$sARdrwVAM9U3YyXXAp0jF./Os6vVn2aCcr3K1O0iVZkBoZq3ZFRDS', 'พีระศักดิ์', 'เพียรประสิทธิ์', 'Peerasak', 'Pianprasit', NULL, NULL),
(5, 'john', '$2y$10$3o12sVcMchkBepkObtNOEub3qX3Bf8a5dUnSegm7XXT4sLCscjviu', 'จอห์น', 'เกตวูต แฮม', 'John', 'Gatewood Ham', NULL, NULL),
(6, 'thatsanee', '$2y$10$HTOQ8K5k5GOvDaxCaW03.O0xMG7u7IWB25inodVKDcXo8XP0yKm1W', 'ทัศนีย์', 'เจริญพร', 'Thatsanee', 'Charoenporn', NULL, NULL),
(7, 'thanets', '$2y$10$Cs7y0oZCwIglOQ2siJs4auGnDxe0RmlU0SuYGLQzgeme8wUpemXE6', 'ธเนศร์', 'สุขสุวรรณ', 'Thanet', 'Suksuwan', NULL, NULL),
(8, 'aekapop', '$2y$10$diqleRHkSkEogGFSe/JbkOVST7K/lAq8UJbKj3YLDF5uSHorQMmoO', 'เอกภพ', 'บุญเพ็ง', 'Aekapop', 'Bunpeng', NULL, NULL),
(9, 'raveenun', '$2y$10$ge37ymt2rRtHl/SsSdYvy.s791V9/zdPLQ2Ny6HV0mCg0vbpA4TEW', 'ระวีนันท์', 'ชูสินชินภัทร', 'Raveenun', 'Chusinchinnapat', NULL, NULL),
(10, 'krisana', '$2y$10$DkLHYH.CTDsWYvaoFPcAdOKgZIzNTMEQDCs2LtOTC/.1KC.I8KiC.', 'กฤษณะ', 'ชินสาร', 'Krisana', 'Chinnasarn', NULL, NULL),
(11, 'nittayat', '$2y$10$ZpWgg0c8I/hRyImDrw/k9OVHHHd14tVvURd2GVtsFmBQLntfzl9FS', 'นิตยา', 'ติรพงษ์พัฒน์', 'Nittaya', 'Tirapongpat', NULL, NULL),
(12, 'kubola', '$2y$10$w3NKtNtOgxdIoqRbwW7w1.3bGzDjiQjsKC7q21vafEN6mxsJIvifq', 'คนึงนิจ', 'กุโบลา', 'Kanuengnij', 'Kubola', NULL, NULL),
(13, 'jakkarin', '$2y$10$yzR4l87FWYGK..r8TMR1FOWPCiiMnWY..UGNm3PBWpWVqWwD1E0Oa', 'จักริน', 'สุขสวัสดิ์ชน', 'Jakkarin', 'Suksawatchon', NULL, NULL),
(14, 'pusit', '$2y$10$avr1oPBw61KCPQG1iVVVIO0dLpX2d40kRey0h.cxwRsB/1pvMtyyy', 'ภูสิต', 'กุลเกษม', 'Pusit', 'Kulkasem', NULL, NULL),
(15, 'onanongr', '$2y$10$d95c8vDYKq36uh0ut2vkTu1dMrASam8PmScCp2/S6JAR3jnKFEqwe', 'อรอนงค์', 'ร้อยทา', 'Onanong', 'Royta', NULL, NULL),
(16, 'benchapo', '$2y$10$Lz1avwWccFA6j0ZCy9QrpOxohRko2kS2Lwb0WiSFS9g5sT9NYydL6', 'เบญจภรณ์', 'จันทรกองกุล', 'Benchaporn', 'antarakongkul', NULL, NULL),
(17, 'rsunisa', '$2y$10$3R6SRJIx98qN5caneDpfJOQVQy6aT4RjSAkttldhWchlZf0B7YJym', 'สุนิสา', 'ริมเจริญ', 'Sunisa', 'Rimcharoen', NULL, NULL),
(18, 'isdat', '$2y$10$nLAfGhpLvSUiYZkHrpn3NuZYImKKFHoM6hZByC/soZ5BEuAF0oXEu', 'เกรียงศักดิ์', 'ปานโพธิ์ทอง', 'Kriengsak', 'Panpothong', NULL, NULL),
(19, 'komate', '$2y$10$zJVj0i9Qy1U1yQmB8V0ve.7uIIoaJZ7DUw0orEwJ9VA5u1i.Vqbye', 'โกเมศ', 'อัมพวัน', 'Komate', 'Amphawan', NULL, NULL),
(20, 'janya', '$2y$10$92NfmXP5DTRhtT4yyAwrkuVkT9Z8qW3yg9XnemyrFnqa3DFDEsA5O', 'จรรยา', 'อ้นปันส์', 'Janya', 'Onpans', NULL, NULL),
(21, 'sithipong', '$2y$10$pqyDI1e2S4.nKktyfH1xnODBhxK/NdCnB9w2H7d6LiGziyDE.8cH.', 'สิทธิพงษ์', 'ฉิมไทย', 'Sitthipong', 'Chimthai', NULL, NULL),
(22, 'sitthichai', '$2y$10$c4a/BOlWOVcaK8bsj71zwuL1sR5RcNGhFCEKjkACiLPvOMOz5J8ly', 'สิทธิชัย', 'สมพันธุ์', 'sitthichai', 'sompun', NULL, NULL),
(23, 'manotej', '$2y$10$h5SCEDBe.fVaGvgesSiCp.blgMZh2LEzcC86W43a.KMSNK5/na1TW', 'มาโนชญ์', 'ใจกว้าง', 'Manoch', 'Chaikwang', NULL, NULL),
(24, 'sakda', '$2y$10$BA4F7UwY6qVr0Xu4o8j9aulaOs.Bm7CCcvWsNUhwfeGSD5uEfPKHC', 'ศักดิ์ดา', 'บุญภา', 'Sakda', 'Boonpa', NULL, NULL),
(25, 'kornsahanan', '$2y$10$U9hq1wHmb9gLPIyRU//yA.5iX16pEwZuFcG.xoeitne634Cz4e.zK', 'กรสหนันท์', 'ต่อพงษ์พันธุ์', 'Kornsahana', 'Torpongpan', NULL, NULL),
(26, 'kamonwans', '$2y$10$QziyLs6X7l0RhM2jkRGz.O7p.xK5nGLK1TLpFgBK2j6fsEWOWlF4u', 'กมลวรรณ', 'แสงระวี', 'Kamonwan', 'Sangrawee', NULL, NULL),
(27, 'hansa', '$2y$10$ug0QKrUcVxTrGz9SkBfOOuVd80YjJttDw5L5FkW.ObvcK.h1Q3mZS', 'หรรษา', 'รอดเงิน', 'Hansa', 'Rodngern', NULL, NULL),
(28, 'pattamawa', '$2y$10$qetIQKph/mKoDCFOiLYRYOtBG06mMmcOBTjymyD9wfxI94D6h73uS', 'ปัทมา', 'วชิรพันธุ์', 'Pattama', 'Wachirapan', NULL, NULL),
(29, 'sirijan', '$2y$10$NeuJDLFyjDvtUqKdncCouudF52KZVD07HoCbsXx3IG2WoWT48I8k.', 'ศิริจันทร์', 'แซ่ลี้', 'Sirichan', 'Saelee', NULL, NULL),
(30, 'suthathip', '$2y$10$3ltpqmEVcSuzm2BO9R5v/eOHxg3j1HTXKXU48CT6nNBX87ydxSa72', 'สุธาทิพย์', 'ทรัพย์ประเสริฐ', 'Suthathip', 'Sapprasert', NULL, NULL),
(31, 'suthon', '$2y$10$.0DzKkUYCrGB.yGlLTSPOOlu4My9G4ScjuP3mZnRywSCzziGmwdcu', 'สุธน', 'ทองปาน', 'Suthon', 'Thongpan', NULL, NULL),
(32, 'prempreeda', '$2y$10$7/Vd1OXPUYISPxxE3RykjeUf6x4OutReLPgN6VVSz.SNZTfAINJC.', 'เปรมปรีดา', 'สลับสี', 'Prempreeda', 'Salubsee', NULL, NULL),
(33, 'rsuwanna', '$2y$10$GxyfThZInvYgzaBEBrs3b.NR2S2wnIIPSM4rWkKjgJLsJS50LjY4W', 'สุวรรณา', 'รัศมีขวัญ', 'SUWANNA', 'RASMEQUAN', NULL, NULL),
(34, 'admin', '$2y$10$LpsfBFXaiSIpio0Ru2Fgh.Wnjo.KxovlNVjZNU.b2Uc42U6hWEU42', 'สาริน', 'เกสพานิช', 'Sarin', 'Kesphanich', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_usre_authority`
--

CREATE TABLE IF NOT EXISTS `port_usre_authority` (
  `aut_id` int(11) NOT NULL,
  `aut_admin` enum('Y','N') NOT NULL,
  `aut_user` enum('Y','N') NOT NULL,
  `uaut_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_usre_authority`
--

INSERT INTO `port_usre_authority` (`aut_id`, `aut_admin`, `aut_user`, `uaut_id`) VALUES
(1, 'Y', 'Y', 1),
(2, 'N', 'Y', 2),
(3, 'N', 'Y', 3),
(4, 'N', 'Y', 4),
(5, 'N', 'Y', 5),
(6, 'N', 'Y', 6),
(7, 'N', 'Y', 7),
(8, 'Y', 'Y', 8),
(9, 'N', 'Y', 9),
(10, 'N', 'Y', 10),
(11, 'N', 'Y', 11),
(12, 'N', 'Y', 12),
(13, 'N', 'Y', 13),
(14, 'N', 'Y', 14),
(15, 'N', 'Y', 15),
(16, 'N', 'Y', 16),
(17, 'N', 'Y', 17),
(18, 'N', 'Y', 18),
(19, 'N', 'Y', 19),
(20, 'N', 'Y', 20),
(21, 'N', 'Y', 21),
(22, 'N', 'Y', 22),
(23, 'N', 'Y', 23),
(24, 'N', 'Y', 24),
(25, 'N', 'Y', 25),
(26, 'N', 'Y', 26),
(27, 'N', 'Y', 27),
(28, 'N', 'Y', 28),
(29, 'N', 'Y', 29),
(30, 'N', 'Y', 30),
(31, 'N', 'Y', 31),
(32, 'N', 'Y', 32),
(33, 'N', 'Y', 33),
(34, 'Y', 'Y', 34);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `port_question`
--
ALTER TABLE `port_question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `port_user_authen`
--
ALTER TABLE `port_user_authen`
  ADD PRIMARY KEY (`uaut_id`), ADD KEY `fk_port_user_authen_port_question1_idx` (`que_id`);

--
-- Indexes for table `port_usre_authority`
--
ALTER TABLE `port_usre_authority`
  ADD PRIMARY KEY (`aut_id`), ADD KEY `fk_port_usre_authority_port_user_authen_idx` (`uaut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `port_question`
--
ALTER TABLE `port_question`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `port_user_authen`
--
ALTER TABLE `port_user_authen`
  MODIFY `uaut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `port_usre_authority`
--
ALTER TABLE `port_usre_authority`
  MODIFY `aut_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `port_user_authen`
--
ALTER TABLE `port_user_authen`
ADD CONSTRAINT `fk_port_user_authen_port_question1` FOREIGN KEY (`que_id`) REFERENCES `port_question` (`que_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `port_usre_authority`
--
ALTER TABLE `port_usre_authority`
ADD CONSTRAINT `fk_port_usre_authority_port_user_authen` FOREIGN KEY (`uaut_id`) REFERENCES `port_user_authen` (`uaut_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
