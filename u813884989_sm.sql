
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2016 at 05:24 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u813884989_sm`
--

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE IF NOT EXISTS `coach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_id` int(11) NOT NULL COMMENT 'รหัสห้องเรียน',
  `firstname` varchar(128) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(128) NOT NULL COMMENT 'นามสกุล',
  `description` text NOT NULL COMMENT 'คำอธิบาย',
  `facebook` varchar(45) DEFAULT NULL COMMENT 'facebook',
  `email` varchar(45) DEFAULT NULL COMMENT 'email',
  `pic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coach_courses1_idx` (`courses_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`id`, `courses_id`, `firstname`, `lastname`, `description`, `facebook`, `email`, `pic`) VALUES
(1, 1, 'ครูสายัณห์', 'อินทมาตย์', '<p>ครูประจำวิชา</p>\r\n', 'https://www.facebook.com/sayan.intamart', 'sayan@schoolptk.ac.th', 'sayan.jpg'),
(4, 1, 'ครูจิราวัฒน์', 'นางาม', '<p>ครูประจำวิชา</p>\r\n', 'http://www.facebook.com/chirawat.not', 'chirawat@schoolptk.ac.th', 'chirawat.png');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) NOT NULL COMMENT 'ชื่อห้องเรียน',
  `created_date` date NOT NULL COMMENT 'วันที่สร้างห้องเรียน',
  `created_by` int(11) NOT NULL COMMENT 'สร้างโดย',
  `course_description` text COMMENT 'คำอธิบายรายวิชา',
  `icon` varchar(128) DEFAULT 'default_icon.png' COMMENT 'ไอคอน',
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_courses_user1_idx` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `created_date`, `created_by`, `course_description`, `icon`, `status`) VALUES
(1, 'เทคโนโลยีสารสนเทศ 9 (ง33102)', '2016-05-27', 1, '<p>ศึกษาแนวคิดและองค์ประกอบพื้นฐานของภาษาเชิงวัตถุ การนําข้อมูลเข้าและส่งออกแบบมาตรฐาน การใช้โครงสร้างควบคุมแบบมีทางเลือกและแบบวนซ้ำ สายอักขระ ตัวแปรชุด โครงสร้างโปรแกรมในภาษาเชิงวัตถุ ความหมาย ของวัตถุและกลุ่มของวัตถุ คุณลักษณะและพฤติกรรมของวัตถุ กลุ่มของวัตถุพื้นฐาน&nbsp; หลักการห่อหุ้ม การสืบทอด การ พ้องรูป</p>\r\n\r\n<p>เพื่อให้ผู้เรียนสามารถใช้เทคโนโลยีสารสนเทศได้อย่างมีคุณธรรมและจริยธรรม&nbsp; มีความรับผิดชอบ&nbsp; มีความสามารถในการใช้เทคโนโลยีได้อย่างเหมาะสม&nbsp; มีเจตคติที่ดีต่อการทำงาน</p>\r\n', 'cabin.png', 'active'),
(2, 'คอมพิวเตอร์', '2016-02-05', 63, '', 'default_icon.png', NULL),
(3, 'ห้องเรียนทดสอบ 1 (แก้ไข)', '2016-04-15', 1, '<p>รายละเอียด 1</p>\r\n', 'cabin.png', 'deleted'),
(4, 'ห้องเรียนทดสอบ 2', '2016-04-15', 1, '<p>รายละเอียด 2</p>\r\n', 'cake.png', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE IF NOT EXISTS `enrolment` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `dated` date DEFAULT NULL,
  PRIMARY KEY (`user_id`,`course_id`),
  KEY `fk_user_has_courses_courses1_idx` (`course_id`),
  KEY `fk_user_has_courses_user_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`user_id`, `course_id`, `dated`) VALUES
(6, 1, '2016-05-21'),
(75, 1, '2016-04-16'),
(76, 1, '2016-04-16'),
(77, 1, '2016-04-16'),
(78, 1, '2016-04-16'),
(79, 1, '2016-04-16'),
(80, 1, '2016-04-16'),
(81, 1, '2016-04-16'),
(82, 1, '2016-04-16'),
(83, 1, '2016-04-16'),
(84, 1, '2016-04-16'),
(85, 1, '2016-04-16'),
(86, 1, '2016-04-16'),
(87, 1, '2016-04-16'),
(88, 1, '2016-04-16'),
(89, 1, '2016-04-16'),
(90, 1, '2016-04-16'),
(91, 1, '2016-04-16'),
(92, 1, '2016-04-16'),
(93, 1, '2016-04-16'),
(94, 1, '2016-04-16'),
(95, 1, '2016-04-16'),
(96, 1, '2016-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `knowledgebank`
--

CREATE TABLE IF NOT EXISTS `knowledgebank` (
  `courses_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`courses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `knowledgebank`
--

INSERT INTO `knowledgebank` (`courses_id`, `content`) VALUES
(1, '<p><strong>เนื้อหา</strong></p>\r\n\r\n<p>1.&nbsp;<a href="https://drive.google.com/open?id=0B6IoU0-9WQCCbUZuM3JGX2hoSVk">รู้จักกับภาษาจาวา</a><br />\r\n2.&nbsp;<a href="https://drive.google.com/open?id=0B6IoU0-9WQCCNDhvbHYyNXdQRnc">การแสดงผลและการรับข้อมูล</a><br />\r\n3.&nbsp;<a href="https://drive.google.com/open?id=0B6IoU0-9WQCCUWhxSmFZTG1JMGM">ตัวแปรและตัวดำเนินการ</a><br />\r\n4.&nbsp;<a href="https://drive.google.com/open?id=0B6IoU0-9WQCCZ3htbTRyYW1QSDQ">คำสั่งควบคุมแบบมีทางเลือก</a><br />\r\n5.&nbsp;<a href="https://drive.google.com/open?id=0B6IoU0-9WQCCT0RoNFZpMWxuLWc">คำสั่งควบคุมแบบวนซ้ำ</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL COMMENT 'หัวข้อสถานการณ์ปัญหา',
  `description` text NOT NULL COMMENT 'คำอธิบาย',
  `created_date` date NOT NULL COMMENT 'วันที่สร้างรายการ',
  `duedate` date NOT NULL COMMENT 'วันกำหนดส่ง',
  `files` varchar(1024) DEFAULT NULL COMMENT 'ไฟล์แนบ',
  `courses_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_problems_courses1_idx` (`courses_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `title`, `description`, `created_date`, `duedate`, `files`, `courses_id`) VALUES
(1, 'สถานการณ์ปัญหาที่ 4-1', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nที่บริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมคิดเงินร้านค้า ปัญหาที่พบบ่อยๆ คือคิดเงินผิดจึงอยากจะได้โปรแกรมที่จะช่วยให้การคิดเงินถูกต้องและรวดเร็วขึ้น &nbsp;ถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-01-06', '2016-02-29', '', 1),
(3, 'สถานการณ์ปัญหาที่ 4-2', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nที่บริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมตรวจสอบโรคอ้วน โดยค่าดรรชนีมวลกาย ตั้งแต่ 30 ขึ้นไปเรียกว่าเป็นโรคอ้วน โดยความต้องการของผู้ใช้ต้องการให้มีการป้อนค่าน้ำหนักและส่วนสูงเข้าสู่โปรแกรม จากนั้นโปรแกรมจะทำการคำนวณและบอกว่าเป็นโรคอ้วนหรือไม่ ถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n', '2016-02-11', '2016-02-29', '', 1),
(4, 'สถานการณ์ปัญหาที่ 4-3', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nที่บริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมตรวจสอบสุขภาพของนักเรียน ซึ่งปัญหาของนักเรียนในโรงเรียนส่วนใหญ่ก็คือโรคอ้วน หากนักเรียนในโรงเรียนได้รับข้อมูลการตรวจสุขภาพของตัวเองตั้งแต่เนิ่นๆ ก็จะเป็นผลดีต่อการกำหนดวิธีการดำเนินชีวิตประจำวัน เช่น การควบคุมอาหาร แต่เนื่องจากนักเรียนในโรเรียนมีมากทำให้การดำเนินการล่าช้า โดยความต้องการของผู้ใช้คือโปรแกรมสามารถรายงานผลออกมา 4 ระดับ คือ&nbsp;</p>\r\n\r\n<p>BMI &lt;18.5 &nbsp;หมายถึง น้ำหนักต่ำกว่ามาตรฐาน (Underweight)&nbsp;<br />\r\nBMI 18.5&ndash;24.9 &nbsp;หมายถึง ปกติ (Normal weight)&nbsp;<br />\r\nBMI 25&ndash;29.9 หมายถึง น้ำหนักเกิน (Overweight)&nbsp;<br />\r\nBMI &gt;30 &nbsp;หมายถึง อ้วน (Obesity)&nbsp;</p>\r\n\r\n<p>ถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n', '2016-02-11', '2016-02-29', '', 1),
(5, 'สถานการณ์ปัญหาที่ 5-1', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nที่บริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมจำลองการเคลื่อนที่ในแนวเส้นตรง ลูกค้าให้เงื่อนไขมาว่าระยะทางที่เคลื่อนที่ไปได้จะเท่ากับความเร็วคูณกับเวลา ความต้องการของลูกค้าจะป้อนความเร็ว กับเวลาเข้าไปในโปรแกรม จากนั้นโปรแกรมจะคำนวณระยะทางที่เคลื่อนที่ไปได้ของแต่ละวินาที ถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n', '2016-02-11', '2016-02-29', '', 1),
(6, 'สถานการณ์ปัญหาที่ 5-2', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nที่บริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมเรียนรู้ภาษาอาเซียน โดยโปรแกรมรับจะชื่อประเทศสมาชิก AEC (กำหนดให้ชื่อประเทศจำต้องขึ้นต้นด้วยตัวพิมพ์ใหญ่ เช่น Thailand หรือ Loa เป็นต้น) แล้วแสดงคำทักทายของประเทศนั้นๆ ออกทางจอภาพ (สะกดด้วยภาษาไทยหรือภาษาอังกฤษก็ได้) หากไม่ใช่ประเทศสมาชิก AEC ให้ขึ้นข้อความว่า &ldquo;ประเทศนี้ไม่ได้เป็นสมาชิกอาเซียน&rdquo; โดยโปรแกรมจะวนซ้ำเพื่อรับคำสั่ง จนกว่าจะกด q เพื่อจบการทำงาน ถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n', '2016-02-11', '2016-02-29', '', 1),
(7, 'สถานการณ์ปัญหาที่ 5-3', '<p><strong>สถานการณ์ปัญหา</strong><br />\r\nบริษัทผลิตซอฟต์แวร์แห่งหนึ่ง วันหนึ่งมีลูกค้ามาปรึกษาเกี่ยวกับการสร้างโปรแกรมโปรแกรมเพื่อคำนวณค่าบริการโทรศัพท์รายเดือน โดยให้ผู้ใช้ป้อนระยะเวลาที่ใช้งานไป และจำนวนของอินเทอร์เน็ตที่ใช้ไป เพื่อคำนวณออกมาเป็นค่าโทรศัพท์ โดยรายละเอียดโปรโมชั่นเป็นดังนี้</p>\r\n\r\n<p>ค่าบริการรายเดือน 349 บาท<br />\r\nโทรฟรีทุกเครือข่าย &nbsp;&nbsp; &nbsp;200 นาที<br />\r\nและใช้อินเทอร์เน็ตได้ 500 MB<br />\r\nค่าโทรและจำนวนอินเทอร์เน็ตส่วนเกินคิดเป็น<br />\r\nค่าโทร&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;1.27 บาท/นาที<br />\r\nอินเทอร์เน็ต&nbsp;&nbsp; &nbsp;1.27 บาท/MB</p>\r\n\r\n<p>เมื่อคำนวณเสร็จแล้วโปรแกรมจะวนซ้ำกลับไปรับค่าจากผู้ใช้ใหม่ จนกว่าผู้ใช้จะกดปุ่ม q เพื่อออกจากการทำงานถ้านักเรียนเป็นคนพัฒนาโปรแกรม นักเรียนจะวิเคราะห์ปัญหา และเสนอแนวทางแก้ไขอย่างไร</p>\r\n\r\n<p><strong>ภารกิจการเรียนรู้</strong><br />\r\n1. นักเรียนวิเคราะห์ว่าจะใช้คำสั่งอะไรบ้างในการเขียนโปรแกรม<br />\r\n2. นักเรียนวิเคราะห์ว่าจะแก้ปัญหาดังกล่าวอย่างไร อธิบายเป็น Flow Chart อธิบายว่าปัญหาใหม่มีความเหมือนหรือแตกต่างกับปัญหาที่นักเรียนเคยแก้ได้อย่างไร<br />\r\n3. นักเรียนออกแบบและพัฒนาโปรแกรมเพื่อแก้ปัญหาดังกล่าว</p>\r\n', '2016-02-11', '2016-02-24', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL COMMENT 'คำนำหน้า',
  `firstname` varchar(45) DEFAULT NULL COMMENT 'ชื่อ',
  `lastname` varchar(45) DEFAULT NULL COMMENT 'นามสกุล',
  `status` varchar(45) DEFAULT NULL COMMENT 'สถานะ',
  `avatar` varchar(128) DEFAULT 'default_avatar.png' COMMENT 'ภาพโปรไฟล์',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `prefix`, `firstname`, `lastname`, `status`, `avatar`) VALUES
(1, 'นาย', 'teacher', 'teacher', 'teacher', '5_16.gif'),
(6, 'นาย', 'student', 'student', 'student', 'default_avatar.png'),
(7, 'นาย', 'ณธีนนท์  ', 'วราหุล', 'student', 'default_avatar.png'),
(8, 'นาย', 'พัฒนวงศ์   ', 'ขันเงิน', 'student', 'default_avatar.png'),
(9, 'นาย', 'ภัทรพงษ์ ', 'ตุ้มมี', 'student', 'default_avatar.png'),
(10, 'นาย', 'สุทัศน์   ', 'พุทธิเสน', 'student', 'default_avatar.png'),
(11, 'นาย', 'ศาสตรา   ', 'บุญตาทิพย์', 'student', 'default_avatar.png'),
(12, 'นาย', 'ชิณนกร', 'ราชบุญเรือง', 'student', 'default_avatar.png'),
(13, 'นาย', 'วงศธร', 'ราชูธร', 'student', '5_14.gif'),
(14, 'นาย', 'ชนินทร์    ', 'สิมเสน', 'student', '5_12.gif'),
(15, 'นาย', 'บรรจง   ', 'บรรจง   ', 'student', '5_13.gif'),
(16, 'นาย', 'จักรพันธ์', 'จันทะดี', 'student', '5_3.gif'),
(17, 'นาย', 'ชาคริต', 'ศรีพล', 'student', '5_6.gif'),
(18, 'นาย', 'ณัฐจักร์', 'ฐิรศิริชวเลิศ', 'student', '5_4.gif'),
(19, 'นาย', 'ธีระเดช', 'มีเพียร', 'student', '5_3.gif'),
(20, 'นาย', 'บูรณศักดิ์', 'ศักดิ์สิทธิพิทักษ์', 'student', '5_10.gif'),
(21, 'นาย', 'ปฏิภาณ', 'ภาโนชิต', 'student', '5_9.gif'),
(22, 'นาย', 'พีร์', 'นามลาบุตร', 'student', '5_1.gif'),
(23, 'นาย', 'พีระวัฒน์', 'วิสุทธิ์วัฒนศักดิ์', 'student', '5_1.gif'),
(24, 'นาย', 'ภควุฒิ', 'พุทธามาตย์', 'student', '5_16.gif'),
(25, 'นาย', 'ภาณุชา', 'นิยะนุช', 'student', '5_7.gif'),
(26, 'นาย', 'วีรภัทร', 'เครือเถาว์', 'student', '5_10.gif'),
(27, 'นาย', 'ศรัณ', 'ทุมนันท์', 'student', '5_6.gif'),
(28, '  นาย', 'ศุภกิตติ์', 'พรมรักษา', 'student', '5_11.gif'),
(29, 'นาย', 'อนวัศ', 'คชเถื่อน', 'student', '5_14.gif'),
(30, 'นาย', 'อนุพงษ์', 'ทิพยสุทธิ์', 'student', '5_9.gif'),
(31, 'นาย', 'อภิสิทธิ์', 'สุขสวัสดิ์', 'student', '5_6.gif'),
(32, 'นางสาว', 'กัญญาณัฐ', 'สุวรพันธ์', 'student', '5_2.gif'),
(33, 'นางสาว', 'กัลยา', 'พิมเคณา', 'student', '5_14.gif'),
(34, 'นางสาว', 'กุศลิน', 'พรหมศิริ', 'student', '5_8.gif'),
(35, 'นางสาว', 'จารุวรรณ', 'บุบผาสังข์', 'student', '5_7.gif'),
(36, 'นางสาว', 'จินตกานท์', 'อินทร์ธิกูด', 'student', '5_10.gif'),
(37, 'นางสาว', 'ชนัฏดา', 'รัตนวงศ์', 'student', '5_3.gif'),
(38, 'นางสาว', 'ณัฐชุดา', 'ศรีอวน', 'student', '5_14.gif'),
(39, 'นางสาว', 'ธัญชนก', 'โกวิทศิริกุล', 'student', '5_7.gif'),
(40, 'นางสาว', 'ธารวิมล', 'ศรีหาบุตร', 'student', '5_11.gif'),
(41, 'นางสาว', 'บัว', 'อุตมสร', 'student', '5_11.gif'),
(42, 'นางสาว', 'ประภัสสร', 'บุญเปีย', 'student', '5_15.gif'),
(43, 'นางสาว', 'ปาริชาติ', 'มาลาวิทยา', 'student', '5_14.gif'),
(44, 'นางสาว', 'พัชริน', 'ฮามวงษ์', 'student', '5_11.gif'),
(45, 'นางสาว', 'พิชญา', 'ดรเขื่อนสม', 'student', '5_5.gif'),
(46, 'นางสาว', 'แพรพลอย', 'กล่ำผัก', 'student', '5_7.gif'),
(47, 'นางสาว', 'ภัทรวดี', 'หนูบุญมี', 'student', '5_5.gif'),
(48, 'นางสาว', 'รัชดาพร', 'ดองโพธิ', 'student', '5_8.gif'),
(49, 'นางสาว', 'วรัญญา', 'โคตรชมภู', 'student', '5_6.gif'),
(50, 'นางสาว', 'ศุภิสรา', 'พานุรักษ์', 'student', '5_9.gif'),
(51, 'นางสาว', 'สโรชา', 'สาริมาตย์', 'student', '5_6.gif'),
(52, 'นางสาว', 'เขมจิรา', 'บั้งจันอัด', 'student', '5_10.gif'),
(53, 'นางสาว', 'สุนิตา', 'ฝ่ายแสนยอ', 'student', '5_15.gif'),
(54, 'นางสาว', 'สุตาภัทร', 'แคภูเขียว', 'student', '5_7.gif'),
(55, 'นางสาว', 'สุทธิพร', 'นาพิน', 'student', '5_4.gif'),
(56, 'นางสาว', 'สุพัตรา', 'คงทวี', 'student', '5_16.gif'),
(57, 'นางสาว', 'หทัยภัทร', 'ศรีสวัสดิ์', 'student', '5_14.gif'),
(58, 'นางสาว', 'อนันตญา', 'ศรีนวล', 'student', '5_15.gif'),
(59, 'นางสาว', 'อนิสา', 'สายสี', 'student', '5_1.gif'),
(60, 'นางสาว', 'อทิตยา', 'พาติกบุตร', 'student', '5_10.gif'),
(61, 'นางสาว', 'เอื้ออาทร', 'ขันเงิน', 'student', '5_11.gif'),
(62, 'นางสาว', 'พีรดา', 'จันทนา', 'student', '5_6.gif'),
(63, 'ผศ.ดร.', 'อิศรา ', 'ก้านจักร', 'teacher', '5_1.gif'),
(64, 'นางสาว', 'วิภาวี', 'ตากกระโทก', 'student', '5_11.gif'),
(65, 'นางสาว', 'วิภาดา', 'สมรรถศรีบุตร', 'student', '5_5.gif'),
(66, 'นางสาว', 'จรรยพร', 'คนไว', 'student', '5_6.gif'),
(67, 'นางสาว', 'พัชริดา', 'ชินโน', 'student', '5_9.gif'),
(68, 'นาย', 'อนิรุธ', 'สุขขัง', 'student', '5_2.gif'),
(69, 'นางสาว', 'พิชญา', 'ดรเขื่อนสม', 'student', '5_11.gif'),
(70, 'นาย', 'ศรัณ', 'ทุมนันท์', 'student', '5_1.gif'),
(71, 'นาย', 'ณัฐพิสุทธิ์', 'สว่างไทยดี', 'teacher', '5_13.gif'),
(72, 'นาย', 'ณัฐพิสุทธิ์', 'สว่างไทยดี', 'student', '5_16.gif'),
(73, 'นางสาว', 'สมถวิล', 'อั้งกี่', 'student', '5_11.gif'),
(74, 'mr', 'std_test_f', 'std_test_l', 'student', '5_13.gif'),
(75, 'นาย', 'จิตรกร', 'แก้วกิ้ง', 'student', '5_6.gif'),
(76, 'นาย', 'จีรวัฒน์ ', 'โกนากัน', 'student', '5_5.gif'),
(77, 'นาย', 'ศรัณ ', 'ทุมนันท์', 'student', '5_3.gif'),
(78, 'นาย', 'ณฐรัช ', 'ณ หนองคาย', 'student', '5_1.gif'),
(79, 'นาย', 'ณัชพล ', 'พิมศร', 'student', '5_12.gif'),
(80, 'นาย', 'ณัฐพิสุทธิ์ ', 'สว่างไทยดี', 'student', '5_14.gif'),
(81, 'นาย', 'ณัฐวัฒน์ ', 'รวิวรรณ', 'student', '5_4.gif'),
(82, 'นาย', 'ณัฐวุฒิ ', 'วิเศษรัตน์', 'student', '5_9.gif'),
(83, 'นาย', 'รัชชัย ', 'ภัทรมนทกานติ', 'student', '5_13.gif'),
(84, 'นาย', 'ธณัฐพันธ์ ', 'โพธิ์ชัยเลิศ', 'student', '5_2.gif'),
(85, 'นางสาว', 'กิจรัตน์ ', 'ศุภศิริบวร', 'student', '5_4.gif'),
(86, 'นางสาว', 'วิภาวี', 'ตากกระโทก', 'student', '5_9.gif'),
(87, 'นางสาว', 'จารวี ', 'กิจธนสาร', 'student', '5_1.gif'),
(88, 'นางสาว', 'จิตรลดา ', 'เทศศรีเมือง', 'student', '5_11.gif'),
(89, 'นางสาว', 'จินดาพร ', 'ยาวาปี', 'student', '5_16.gif'),
(90, 'นางสาว', 'จิราภรณ์ ', 'อินทะชัย', 'student', '5_6.gif'),
(91, 'นางสาว', 'จุฑารัตน์ ', 'คุธินาคุณ', 'student', '5_7.gif'),
(92, 'นางสาว', 'ฉัตรทิพย์', 'เงินอุดมรักษ์', 'student', '5_8.gif'),
(93, 'นางสาว', 'ชญาณี ', 'นามวงษ์', 'student', '5_10.gif'),
(94, 'นางสาว', 'ชยุตรา ', 'คุนานิล', 'student', '5_9.gif'),
(95, 'นางสาว', 'จรรยพร ', 'คนไว', 'student', '5_2.gif'),
(96, 'นางสาว', 'วิภาดา ', 'สมรรถศรีบุตร', 'student', '5_11.gif');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topics_id` int(11) NOT NULL COMMENT 'รหัสหัวข้อโพส',
  `content` text NOT NULL COMMENT 'เนื้อหา',
  `date` date NOT NULL COMMENT 'วันที่โพส',
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  `file` text COMMENT 'อัพโหลดไฟล์',
  PRIMARY KEY (`id`,`topics_id`),
  KEY `fk_replies_topics1_idx` (`topics_id`),
  KEY `fk_replies_user1_idx` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topics_id`, `content`, `date`, `user_id`, `file`) VALUES
(7, 2, '  นายจิตรกร แก้วกิ้ง\r\n', '2016-02-04', 75, '1.png'),
(8, 2, '  นายจีรวัฒน์ โกนากัน\r\n', '2016-02-04', 76, '2.png'),
(9, 2, '  นายศรัณ ทุมนันท์\r\n', '2016-02-04', 77, '3.png'),
(10, 2, '  นายณฐรัช ณ หนองคาย\r\n', '2016-02-04', 78, '4.png'),
(11, 2, '  นายณัชพล พิมศร', '2016-02-04', 79, '5.png'),
(12, 2, '  นายณัฐพิสุทธิ์ สว่างไทยดี', '2016-02-04', 80, '6.png'),
(13, 2, '  นายณัฐวัฒน์ รวิวรรณ', '2016-02-04', 81, '7.png'),
(14, 2, '  นายณัฐวุฒิ วิเศษรัตน์', '2016-02-04', 82, '8.png'),
(15, 2, '  นายรัชชัย ภัทรมนทกานติ', '2016-02-04', 83, '9.png'),
(16, 2, '  นายธณัฐพันธ์ โพธิ์ชัยเลิศ', '2016-02-04', 84, '10.png'),
(17, 2, '  น.ส.กิจรัตน์ ศุภศิริบวร', '2016-02-04', 85, '11.png'),
(18, 2, '  น.ส.วิภาวี ตากกระโทก', '2016-02-04', 86, '12.png'),
(19, 2, '  น.ส.จารวี กิจธนสาร', '2016-02-04', 87, '13.png'),
(20, 2, '  น.ส.จิตรลดา เทศศรีเมือง', '2016-02-04', 88, '14.png'),
(21, 2, '  น.ส.จินดาพร ยาวาปี', '2016-02-04', 89, '15.png'),
(22, 2, '  น.ส.จิราภรณ์ อินทะชัย', '2016-02-04', 90, '16.png'),
(23, 2, '  น.ส.จุฑารัตน์ คุธินาคุณ', '2016-02-04', 91, '17.png'),
(24, 2, '  น.ส.ฉัตรทิพย์ เงินอุดมรักษ์', '2016-02-04', 92, '18.png'),
(25, 2, '  น.ส.ชญาณี นามวงษ์', '2016-02-04', 93, '19.png'),
(26, 2, '  น.ส.ชยุตรา คุนานิล', '2016-02-04', 94, '20.png'),
(27, 2, '  น.ส.จรรยพร คนไว', '2016-02-04', 95, '21.png'),
(28, 2, '  น.ส.วิภาดา สมรรถศรีบุตร', '2016-02-04', 96, '22.png');

-- --------------------------------------------------------

--
-- Table structure for table `scaffolding`
--

CREATE TABLE IF NOT EXISTS `scaffolding` (
  `problems_id` int(11) NOT NULL,
  `scaff1` varchar(128) DEFAULT NULL COMMENT 'ตัวช่วยเหลือด้านความคิดรวบยอด',
  `scaff2` varchar(128) DEFAULT NULL COMMENT 'ตัวช่วยเหลือด้านการคิด',
  `scaff3` varchar(128) DEFAULT NULL COMMENT 'ตัวช่วยเหลือด้านกระบวนการ',
  `scaff4` varchar(128) DEFAULT NULL COMMENT 'ตัวช่วยเหลือด้านกลยุทธ์',
  PRIMARY KEY (`problems_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scaffolding`
--

INSERT INTO `scaffolding` (`problems_id`, `scaff1`, `scaff2`, `scaff3`, `scaff4`) VALUES
(1, '', '', '', ''),
(3, 'conceptual.png', 'metacognition.png', 'procedual.png', 'strategic.png'),
(4, 'conceptual.png', 'metacognition.png', 'procedual.png', 'strategic.png'),
(5, 'conceptual.png', 'metacognition.png', 'procedual.png', 'strategic.png'),
(6, 'conceptual.png', 'metacognition.png', 'procedual.png', 'strategic.png'),
(7, 'conceptual.png', 'metacognition.png', 'procedual.png', 'strategic.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_replies`
--

CREATE TABLE IF NOT EXISTS `sub_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `replies_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `content` text,
  `file` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_replies_replies1_idx` (`replies_id`),
  KEY `fk_sub_replies_user1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courses_id` int(11) NOT NULL COMMENT 'รหัสห้องเรียน',
  `topic` varchar(512) NOT NULL COMMENT 'หัวข้อ',
  `content` text NOT NULL COMMENT 'รายละเอียด',
  `date` date NOT NULL COMMENT 'วันที่โพส',
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้',
  PRIMARY KEY (`id`,`courses_id`),
  KEY `fk_topics_courses1_idx` (`courses_id`),
  KEY `fk_topics_user1_idx` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `courses_id`, `topic`, `content`, `date`, `user_id`) VALUES
(2, 1, 'สถานการณ์ปัญหาที่ 4-1', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1),
(3, 1, 'สถานการณ์ปัญหาที่ 4-2', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1),
(4, 1, 'สถานการณ์ปัญหาที่ 4-3', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1),
(5, 1, 'สถานการณ์ปัญหาที่ 5-1', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1),
(6, 1, 'สถานการณ์ปัญหาที่ 5-2', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1),
(7, 1, 'สถานการณ์ปัญหาที่ 5-3', 'ให้นักเรียนโพส Flow chart ของตัวเองลงโพสด้านล่าง', '2016-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `turnins`
--

CREATE TABLE IF NOT EXISTS `turnins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problems_id` int(11) NOT NULL COMMENT 'สถานการณ์ปัญหา',
  `user_id` int(11) NOT NULL COMMENT 'ผู้ใช้',
  `answer` text NOT NULL COMMENT 'คำตอบ',
  `files` varchar(1024) DEFAULT NULL COMMENT 'ไฟล์แนบ',
  `date` date NOT NULL COMMENT 'วันที่ส่ง',
  `score` int(11) DEFAULT NULL COMMENT 'คะแนน',
  PRIMARY KEY (`id`,`problems_id`,`user_id`),
  KEY `fk_turnins_problems1_idx` (`problems_id`),
  KEY `fk_turnins_user1_idx` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `turnins`
--

INSERT INTO `turnins` (`id`, `problems_id`, `user_id`, `answer`, `files`, `date`, `score`) VALUES
(1, 1, 7, '<p>ทดสอบอัพโหลด</p>\r\n', 'test42.rar', '2016-02-12', 12),
(2, 1, 6, '<p>ทดสอบ</p>\r\n', '', '2016-02-19', NULL),
(4, 1, 64, '<p>นางสาววิภาวี &nbsp;ตากกระโทก &nbsp;ชั้น ม.6/6 เลขที่ &nbsp;44</p>\r\n', 'problem4_1_606_44.rar', '2016-02-24', NULL),
(5, 1, 70, '<p>นายศรัณ ทุมนันท์ เลขที่ 12 ม.6/4</p>\r\n', 'Problem4_1_4_12.rar', '2016-02-24', NULL),
(6, 1, 67, '<p>นางสาวพัชริดา &nbsp;ชินโน เลขที่ 37 ชั้น ม.6/6</p>\r\n', 'Problem_4_1_606_37.rar', '2016-02-24', 5),
(7, 1, 65, '<p>วิภาดา สมรรถศรีบุตร เลขที่41 ม.6/10</p>\r\n', 'Problem4_1_604_100.rar', '2016-02-24', NULL),
(8, 1, 66, '<p>จรรยพร คนไว ม.6/10 เลขที่19</p>\r\n', 'Problem4_1_610_19.rar', '2016-02-24', 5),
(9, 1, 68, '<p>อนิรุธ สุขขัง ม.6/6 เลขที่ 16 PTK</p>\r\n', 'problem_4_1_606_16.rar', '2016-02-24', NULL),
(10, 1, 69, '<p>พิชญา ดรเขื่อนสม ม.6/4 เลขที่30</p>\r\n', 'Problem_4_1_604_30.ZIP', '2016-02-24', NULL),
(11, 1, 72, '<p>นาย ณัฐพิสุทธิ์ สว่างไทยดี ม.6/6 เลขที่6</p>\r\n', 'problem_4_1_606_6.rar', '2016-02-24', NULL),
(12, 3, 66, '<p>จรรยพร คนไว ม.6/10 เลขที่19</p>\r\n', 'janyaporn19.rar', '2016-02-26', NULL),
(13, 5, 70, '<p>นายศรัณ ทุมนันท์ เลขที่ 12 ชั้น ม.6/4</p>\r\n', 'Prmblem_5_1_604_12.rar', '2016-03-02', NULL),
(14, 5, 66, '<p>จรรยพร คนไว ม.6/10 เลขที่19</p>\r\n', '', '2016-03-02', NULL),
(15, 5, 64, '<p>นางสาววิภาวี &nbsp;ตากกระโทก &nbsp;ชั้น ม.6/6 เลขที่ 44</p>\r\n', 'problem_5_1_606_44.rar', '2016-03-03', NULL),
(16, 1, 6, '<p>ทดสอบส่งงาน</p>\r\n', '-lab4_2_606_18.rar', '2016-04-15', NULL),
(17, 1, 74, '<p>ส่งงาน 1</p>\r\n', 'ssss.png', '2016-04-15', NULL),
(18, 1, 6, '<p>ส่งงาน 3</p>\r\n', 'oral-presentation-606.pdf', '2016-04-15', NULL),
(20, 1, 75, '<p>นายจิตรกร แก้วกิ้ง</p>', 'Problem_4_1_604_02.java', '2016-02-03', 10),
(21, 1, 76, '<p>นายจีรวัฒน์ โกนากัน</p>', 'Problem_4_1_604_03.java', '2016-02-03', 10),
(22, 1, 77, '<p>นายศรัณ ทุมนันท์</p>', 'Problem_4_1_604_04.java', '2016-02-03', 10),
(23, 1, 78, '<p>นายณฐรัช ณ หนองคาย</p>', 'Problem_4_1_604_05.java', '2016-02-03', 10),
(24, 1, 79, '<p>นายณัชพล พิมศร</p>', 'Problem_4_1_604_07.java', '2016-02-03', 10),
(25, 1, 80, '<p>นายณัฐพิสุทธิ์ สว่างไทยดี</p>', 'Problem_4_1_604_08.java', '2016-02-03', 10),
(26, 1, 81, '<p>นายณัฐวัฒน์ รวิวรรณ</p>', 'Problem_4_1_604_11.java', '2016-02-03', 10),
(27, 1, 82, '<p>นายณัฐวุฒิ วิเศษรัตน์</p>', 'Problem_4_1_604_12.java', '2016-02-03', 10),
(28, 1, 83, '<p>นายรัชชัย ภัทรมนทกานติ</p>', 'Problem_4_1_604_20.java', '2016-02-03', 10),
(29, 1, 84, '<p>นายธณัฐพันธ์ โพธิ์ชัยเลิศ</p>', 'Problem_4_1_604_21.java', '2016-02-03', 10),
(30, 1, 85, '<p>น.ส.กิจรัตน์ ศุภศิริบวร</p>', 'Problem_4_1_604_23.java', '2016-02-03', 10),
(31, 1, 86, '<p>น.ส.วิภาวี ตากกระโทก</p>', 'Problem_4_1_604_27.java', '2016-02-03', 10),
(32, 1, 87, '<p>น.ส.จารวี กิจธนสาร</p>', 'Problem_4_1_604_30.java', '2016-02-03', 10),
(33, 1, 88, '<p>น.ส.จิตรลดา เทศศรีเมือง</p>', 'Problem_4_1_604_35.java', '2016-02-03', 10),
(34, 1, 89, '<p>น.ส.จินดาพร ยาวาปี</p>', 'Problem_4_1_604_37.java', '2016-02-03', 10),
(35, 1, 90, '<p>น.ส.จิราภรณ์ อินทะชัย</p>', 'Problem_4_1_604_40.java', '2016-02-03', 10),
(36, 1, 91, '<p>น.ส.จุฑารัตน์ คุธินาคุณ</p>', 'Problem_4_1_604_41.java', '2016-02-03', 10),
(37, 1, 92, '<p>น.ส.ฉัตรทิพย์ เงินอุดมรักษ์</p>', 'Problem_4_1_604_42.java', '2016-02-03', 10),
(38, 1, 93, '<p>น.ส.ชญาณี นามวงษ์</p>', 'Problem_4_1_604_43.java', '2016-02-03', 10),
(39, 1, 94, '<p>น.ส.ชยุตรา คุนานิล</p>', 'Problem_4_1_604_44.java', '2016-02-03', 10),
(40, 1, 95, '<p>น.ส.จรรยพร คนไว</p>', 'Problem_4_1_604_45.java', '2016-02-03', 10),
(41, 1, 96, '<p>น.ส.วิภาดา สมรรถศรีบุตร</p>', 'Problem_4_1_604_46.java', '2016-02-03', 10),
(42, 5, 75, '<p>นายจิตรกร แก้วกิ้ง</p>', 'Problem_5_1_604_02.java', '2016-02-09', 10),
(43, 5, 76, '<p>นายจีรวัฒน์ โกนากัน</p>', 'Problem_5_1_604_09.java', '2016-02-09', 10),
(44, 5, 77, '<p>นายศรัณ ทุมนันท์</p>', 'Problem_5_1_604_04.java', '2016-02-09', 10),
(45, 5, 78, '<p>นายณฐรัช ณ หนองคาย</p>', 'Problem_5_1_604_05.java', '2016-02-09', 10),
(46, 5, 79, '<p>นายณัชพล พิมศร</p>', 'Problem_5_1_604_07.java', '2016-02-09', 10),
(47, 5, 80, '<p>นายณัฐพิสุทธิ์ สว่างไทยดี</p>', 'Problem_5_1_604_08.java', '2016-02-09', 10),
(48, 5, 81, '<p>นายณัฐวัฒน์ รวิวรรณ</p>', 'Problem_5_1_604_11.java', '2016-02-09', 10),
(49, 5, 82, '<p>นายณัฐวุฒิ วิเศษรัตน์</p>', 'Problem_5_1_604_12.java', '2016-02-09', 10),
(50, 5, 83, '<p>นายรัชชัย ภัทรมนทกานติ</p>', 'Problem_5_1_604_20.java', '2016-02-09', 10),
(51, 5, 84, '<p>นายธณัฐพันธ์ โพธิ์ชัยเลิศ</p>', 'Problem_5_1_604_21.java', '2016-02-09', 10),
(52, 5, 85, '<p>น.ส.กิจรัตน์ ศุภศิริบวร</p>', 'Problem_5_1_604_23.java', '2016-02-09', 10),
(53, 5, 86, '<p>น.ส.วิภาวี ตากกระโทก</p>', 'Problem_5_1_604_27.java', '2016-02-09', 10),
(54, 5, 87, '<p>น.ส.จารวี กิจธนสาร</p>', 'Problem_5_1_604_30.java', '2016-02-09', 10),
(55, 5, 88, '<p>น.ส.จิตรลดา เทศศรีเมือง</p>', 'Problem_5_1_604_35.java', '2016-02-09', 10),
(56, 5, 89, '<p>น.ส.จินดาพร ยาวาปี</p>', 'Problem_5_1_604_37.java', '2016-02-09', 10),
(57, 5, 90, '<p>น.ส.จิราภรณ์ อินทะชัย</p>', 'Problem_5_1_604_40.java', '2016-02-09', 10),
(58, 5, 91, '<p>น.ส.จุฑารัตน์ คุธินาคุณ</p>', 'Problem_5_1_604_41.java', '2016-02-09', 10),
(59, 5, 92, '<p>น.ส.ฉัตรทิพย์ เงินอุดมรักษ์</p>', 'Problem_5_1_604_42.java', '2016-02-09', 10),
(60, 5, 93, '<p>น.ส.ชญาณี นามวงษ์</p>', 'Problem_5_1_604_43.java', '2016-02-09', 10),
(61, 5, 94, '<p>น.ส.ชยุตรา คุนานิล</p>', 'Problem_5_1_604_44.java', '2016-02-09', 10),
(62, 5, 95, '<p>น.ส.จรรยพร คนไว</p>', 'Problem_5_1_604_45.java', '2016-02-09', 10),
(63, 5, 96, '<p>น.ส.วิภาดา สมรรถศรีบุตร</p>', 'Problem_5_1_604_46.java', '2016-02-09', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=97 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'LpZVDZ407fXDzdrV-wawKdF7sm2QUe0F', '$2y$13$AS3mU7xXkzOTlHL.ZPcCc.Cx/x.hNYSmlHh8.cjb6x.Q1j9GeEpLq', NULL, 'teacher@localhost.com', 10, 1448113851, 1448113851),
(6, 'student', '02PXLKxEmQs_VwWT8a_EVyUJ_n3dBuvy', '$2y$13$MuD5K981zZ3C041HgSiBZu1BbTZ2Yt4JyAn74TVkO5/y8g/O7bE4C', NULL, 'student@localhost.com', 10, 1448287933, 1448287933),
(7, 'natheenon', 'J7PuXsLoGJekgWnDwjuI576O6cx2ITab', '$2y$13$Y7PWgE66gpvhTvkYDgDH1uWjDjJhFzMgVAJvc0fHYwf063brtLbaG', NULL, 'natheenon@localhost.com', 10, 1448723179, 1448723179),
(8, 'pattanawong', 'LxpjsUe9QkTBGB5Qq5hG9pnxGHhgCyTK', '$2y$13$s/agWGz0jPYGnb1hTsT3OOTf9FwP5bOhYlYjtazrItBefZ0rzMtSe', NULL, 'pattanawong@localhost.com', 10, 1448781717, 1448781717),
(9, 'phattarapong', '-p_XzJY7omHs0ha_jMUZDnKSLXLWDVcB', '$2y$13$o1YRu2TfhmRxIyuyUZYZ7euup41M/A13X76bEe0I1yiN9Yt8Q71ZW', NULL, 'phattarapong@localhost.com', 10, 1448781750, 1448781750),
(10, 'suthad', 'j1sbJ9a-b5XRe-OW2GPwhigwbeJdemvC', '$2y$13$SlzQn6UZYTm108qlUfjANef/gBp.6meK574xhMLBVNnBszPP0PWj6', NULL, 'suthad@localhost.com', 10, 1448781785, 1448781785),
(11, 'sastra', 'sdMllho68d4PXbhpnSt0n8vdd6Pw7G0m', '$2y$13$G.y7i/iPQDx4XxXmmb6p9OynM.iBySTDCZKY7UPLmd96haEYtdu4m', NULL, 'sastra@localhost.com', 10, 1448783910, 1448783910),
(12, 'chinnakon', 'vkGECAJhGJkNSMqfL5VyKnerSIQkuH08', '$2y$13$StcE/YYNovm50LaFEqonEOyOqv0pM91tykw7vHT5r4UuKsuy8sVc6', NULL, 'chinnakon@localhost.com', 10, 1448891716, 1448891716),
(13, 'wongsathorn', '9fY80-eQAinDKObYWzhwCjCRduPqWdnK', '$2y$13$sUOlwYVTikBBHvjzKfAm5e7A22TRP928ltDM9ZiRKd14DrkC9EZeG', NULL, 'wongsathorn@localhost.com', 10, 1449214054, 1449214054),
(14, 'chanin', 'ENdpgKdEmjoTHzbnCYah_cXbJdGR48ST', '$2y$13$96spWmfkYDY5dv7YesxEau/XPCiijgwiZ5nlvg7dcpbiVwr77LAGe', NULL, 'chanin@localhost.com', 10, 1449214550, 1449214550),
(15, 'banjong', 'vkvMFOHscWkLcWYK9RylVWg-7e4bpu13', '$2y$13$agL4f4d3dMC4FCNEJrdwieXsS9t3f5KVrpCHTg8gAE6gmkq2RcM8.', NULL, 'banjong@localhost.com', 10, 1449214621, 1449214621),
(16, '35737', 'wIoA_zix9DM_VNxvKvxHADBvL2wFVM0r', '$2y$13$Ikti4vU6zabxUxtUs6LlDu.cqJR00USyUWtEZmSFvA70j3jtzeBu6', NULL, '35737@schoolptk.ac.th', 10, 1452573293, 1452573293),
(17, '32928', 'kFqfZQCow2JkdsJxKdDDUobkjC5waYge', '$2y$13$asCcaGYpu9un3r1sgRT0ceKj0PsWicoQmJd0IbuOnrI0TVwzK6z9.', NULL, '32928@schoolptk.ac.th', 10, 1452574112, 1452574112),
(18, '35738', 'OvcuJUM35BePGhy9Ir5ye6KFu-49Htim', '$2y$13$neDxNmuFuPUsZ7FOKqVAWukOmp86SyKs42Y/dpF1DpZ.Ql3XjBCeG', NULL, '35738@schoolptk.ac.th', 10, 1452574185, 1452574185),
(19, '35739', 'u7Ax39B5tlQcnKXSMgbGw-G3W-UIi8JX', '$2y$13$SA40Mqdg9A.11K.doy1nlebgn5HLQ3OfkBpnrxoV7dATOtuRhazt6', NULL, '35739@schoolptk.ac.th', 10, 1452574298, 1452574298),
(20, '32469', 'w0xQ8Nmhk0GysL1ikuc37LDf-1VgmA2t', '$2y$13$8lJ2GSf/7kxxhrXujGXla.KW3nK17mvIUPXZaWpJdc4hsQ4E/e40S', NULL, '32469@schoolptk.ac.th', 10, 1452574356, 1452574356),
(21, '33288', 'D9LlNGJPrtlW36xaCC5Uh-2FFl_Q1ILj', '$2y$13$8WR/Et3aairlsCXPCv/TQuXXYGSAqmkz0s2e1mil6YaLZ/QzIJw96', NULL, '33288@schoolptk.ac.th', 10, 1452574398, 1452574398),
(22, '32988', '76PmUtSVEQ6Tp37NHjSHVY6t56oKei5E', '$2y$13$58XPeFo5qeSuBALu97vpiuI/hx7kWsMaHNOX2pcfM2U9JySfZaEwe', NULL, '32988@schoolptk.ac.th', 10, 1452574442, 1452574442),
(23, '32882', 'kLw2pSKFadQwI0bmUq6H6u3uaDFUwAZ6', '$2y$13$w.D5T9EkQwkJ/bQmC8dp1eMVmAVQtL2tXCKeV2EwBYTMSOC/v/Phq', NULL, '32882@schoolptk.ac.th', 10, 1452574484, 1452574484),
(24, '35740', '9xNI_-D5T44bHoL9scoPJPkVT1HRGWq5', '$2y$13$OtWoyyUXE8SclqpSpSSpKutQC81eOhVROoMdQ62Zz3K93tnXlmgjS', NULL, '35740@schoolptk.ac.th', 10, 1452574553, 1452574553),
(25, '32781', 'Lhx6yBVPzkeXaaeK_Su1ip5M-fU3F3rA', '$2y$13$slPgJ1GD2LEAHPnH9yI/G.n5/R/A475Bq335rGl83lkbGHze18b0q', NULL, '32781@schoolptk.ac.th', 10, 1452574593, 1452574593),
(26, '32474', '_DKd5pTZTc46H4j2zm0n0-nIRePYYZiK', '$2y$13$VTmjALeDCMHZsihDy/pGF.DWBc6aWL/vah.8H8r19ZlyUYAE/OF.W', NULL, '32474@schoolptk.ac.th', 10, 1452574626, 1452574626),
(27, '35742', 'jxkfJdZhwKAefk7uuH7TtBQNpQs6ktrL', '$2y$13$gqzFG9k2nm3KD0zbtSB47O2BL9UfW5xqWDX0SMF3zeJXffAr7jQyG', NULL, '35742@schoolptk.ac.th', 10, 1452574675, 1452574675),
(28, '33298', '_x88OOJbWvCl-q6Y1z_T2DlILGaGX7gj', '$2y$13$potFUrbEmOFolf43mfsF5O5JJUVGFFU58rmFW8Suelbb5jkD9E1Y6', NULL, '33298@schoolptk.ac.th', 10, 1452574728, 1452574728),
(29, '32889', 'rgkw1TzLwsJG8_P3cwIKpwGy12pUzRyo', '$2y$13$6aOSwLWRHoJYTHUjWGrY4.vLILdXSVF3/KxzcTg.2vfe74p71f7rO', NULL, '32889@schoolptk.ac.th', 10, 1452574764, 1452574764),
(30, '32890', 'PeKv5W75Phaku7ShB_6uDatJk_O0s31V', '$2y$13$1gBJOTPcLd.zV5fVVqo6r.9OpOn.ExQhS6d.20wcM1.QUqDZMqx82', NULL, '32890@schoolptk.ac.th', 10, 1452574800, 1452574800),
(31, '35743', 'ZQFuESZL0onTEMu5WzC7Hdle9c29mTMT', '$2y$13$/j0vs1qhCUxAZd7wBYD5FOmn3k7RSW79E5KNgoikp4tm9c9vVSC2S', NULL, '35743@schoolptk.ac.th', 10, 1452574836, 1452574836),
(32, '32583', 'mjsLZV16wwZWqjj0i2p1r-tnHP1q47Iu', '$2y$13$m78QPCtCDPfX17SSFRrnKOOqhsbP20GhuvRdL2WNsiLypB5Ymufeq', NULL, '32583@schoolptk.ac.th', 10, 1452574897, 1452574897),
(33, '32895', 'XqItUy46W1lYTQhZcLU46vBF3jR8sQFZ', '$2y$13$/oWu4bs9Q.tmUb1np44CzOJ0c/W5dtmkJ93RSvtznq1qybXUywVDe', NULL, '32895@schoolptk.ac.th', 10, 1452582467, 1452582467),
(34, '33311', 'UfngSss18_cwGgcsPF8MnKXWL9M5QDdh', '$2y$13$UV3rHRJQ1RI1HDjyc3kpc.sqgYBlZm.IPj6g.OmwzdjHw7QGXO2lW', NULL, '33311@schoolptk.ac.th', 10, 1452582505, 1452582505),
(35, '32795', '1kdlDYR8EDfno0gypbfBRNF5CSGeGvkT', '$2y$13$8LhsdpuUoSzRq4KFmbGzQOwkyt9IPF86sKpBlVHqyd4lEset77tq2', NULL, '32795@schoolptk.ac.th', 10, 1452582542, 1452582542),
(36, '32796', 'P1E1q4jSkymobWGX_TQh2eAPcmsKJs2d', '$2y$13$uh1fdpHMJHX2n10W6PL/VeNUiN8eWr.g6HI4s5aMm9JgRtYogyZoq', NULL, '32796@schoolptk.ac.th', 10, 1452582580, 1452582580),
(37, '35745', 'm_vQkFJEUs4DSDTSZNSP992O5mxYCdLj', '$2y$13$6D6zU9fjjix/qh3G1ktBpehXk3oamlIOQeNhPK.2sufg26Tcc97Vq', NULL, '35745@schoolptk.ac.th', 10, 1452582615, 1452582615),
(38, '32590', 'APHVirSfWXcKx_F_Oo0MWF40e17mHj50', '$2y$13$Rj12Th6k2PN6qgxABPl0r.raGeDGxCIE7jv2qnY.H9LZpp60Ah4.S', NULL, '32590@schoolptk.ac.th', 10, 1452582648, 1452582648),
(39, '32692', '1XdxtFXZPWT8D_7ZRv28j7fMGXDbpjjr', '$2y$13$QNZ2QyfjROSwHkyc3bwiZ.4E6Nzh33Y6hAQV0h2pxGvj0pWctqZva', NULL, '32692@schoolptk.ac.th', 10, 1452582677, 1452582677),
(40, '35746', 'XPI-MFaR6w1f1JBcDkn-QDVIFppLd5ib', '$2y$13$KD5sD/xVxakckynUxF4hV.Sn0r./Nczcv2Sn25iwuFPH5eZquVnCe', NULL, '35746@schoolptk.ac.th', 10, 1452582713, 1452582713),
(41, '35747', 'iCKQVHnxpKoWaK2MXG4Bx5gnd7Vtl4BY', '$2y$13$4pYyyM4SWPgfiG/Q0KgF0.gUne7hf1Y79MGCygxM9cR3.BNqy0Q8C', NULL, '35747@schoolptk.ac.th', 10, 1452582744, 1452582744),
(42, '32905', 'lkH8_T79PwZes57QKtgXfOmtkMmOm90z', '$2y$13$jptCkh26Rx46hmJAwu5.qexGpSDMaSoGyMak82cfjnSSnNvaRrFuG', NULL, '32905@schoolptk.ac.th', 10, 1452582783, 1452582783),
(43, '32641', 'hSLjLCCMDetFCZnYIEhAAm5SpeDSEGjt', '$2y$13$pW/86hTqAffIZ/r5ICOtWOJ1HB1joW1Mv5fm/Mls7vpVA59lymhMy', NULL, '32641@schoolptk.ac.th', 10, 1452582827, 1452582827),
(44, '32700', '3VjOKYpr8tjw1yFTUo0WdC3cpUswOzjA', '$2y$13$uQLDGwu/7hJUiX7f3NvRMOKFd5HWWcIG7urGJ3ROMBO94kZVcbgGu', NULL, '32700@schoolptk.ac.th', 10, 1452582862, 1452582862),
(45, '35748', 'oLFnJBUFMSyON3WnmyF78vT1eUvfirXz', '$2y$13$mq/zJ.AzY46Z7HbYBw1RbuZyoKzDlas0IPfXXAjPpw2XQr4V64BUS', NULL, '35748@schoolptk.ac.th', 10, 1452582893, 1452582893),
(46, '32860', 'oQn_Q-8PYZD8v9M7iioK-AGrDCzB5cA0', '$2y$13$b5OkoXk2AxApE1MNA6wSQO./E4sgi/ufUK1lSn.UldLXqU0rRq.F6', NULL, '32860@schoolptk.ac.th', 10, 1452582946, 1452582946),
(47, '32861', 'Pdu1M1nCW9gylOoocW1VrHuL9YMPh37U', '$2y$13$ks7QjeRUjnQEYCBLT75HVu77LUXtLF5H99pQc4cURo9aRireIo5pO', NULL, '32861@schoolptk.ac.th', 10, 1452583301, 1452583301),
(48, '33069', 'tdh44gm7SzjKytWLenRdHRb5E8j87dm5', '$2y$13$/1tnUE9LUng3e15qihe6Z.bpQwqg6H3Jcq8aNZCzxIZOohbaQFnjy', NULL, '33069@schoolptk.ac.th', 10, 1452583336, 1452583336),
(49, '35749', 'K7Sl9-zkHaqx_KqT8SgFJtFr31ZT-ov4', '$2y$13$QnIZwjboMcnV05jsX2BED.rAXzJhPko4SgMOtxrdolQIejVWSkCti', NULL, '35749@schoolptk.ac.th', 10, 1452583372, 1452583372),
(50, '32867', 'hxxz64OpKBencqp190d0AbbpCTqHGpiR', '$2y$13$aH1ikk6220FSrYIYzVStI.PC5.tn0apNIQ57T3dper94KJ/bJwbuG', NULL, '32867@schoolptk.ac.th', 10, 1452583432, 1452583432),
(51, '32970', 'wx__gJpV6EdMSsTQLyL4esMYnrn7L8HD', '$2y$13$Sr9u6cOx140UU23U7L4I1emZK.sXx7Fk7p6GDdNSZk/rAs5HSUuMq', NULL, '32970@schoolptk.ac.th', 10, 1452583463, 1452583463),
(52, '32656', 'JlPnXaILPAI9mzwYA2N-huQV3vKZKNtj', '$2y$13$OWTPUz8LT5Xi1OFcFPMYHOemLnH7OHSHJSCC1PdnJeq6Zk1KK4JEe', NULL, '32656@schoolptk.ac.th', 10, 1452583502, 1452583502),
(53, '34148', 'vwXBJHwX8ssBXBc6FWiow80Z5BsImzL7', '$2y$13$yIxqCTBaKmL9iVHUGEpfEuYkyXwPQ2MID62mTiq51Wkh2/t7Rn1vi', NULL, '34148@schoolptk.ac.th', 10, 1452583533, 1452583533),
(54, '35751', 'FcO8h9I50fz9EaU5WBe78RdLJq8qWbhl', '$2y$13$Ya/cEuWL0i7WEkiV5BaUSeaT.vklo6ZJPmsTWw4KFCXzenqm6c8/y', NULL, '35751@schoolptk.ac.th', 10, 1452583567, 1452583567),
(55, '32658', 'RB_pBQeWjB4rM-D9W-NaVjAafHQ_JWge', '$2y$13$m6KIuHkvg0ntMrEFHamckOh8b6ORg968Tj517BavIuxX03VJco26q', NULL, '32658@schoolptk.ac.th', 10, 1452583613, 1452583613),
(56, '32710', 'Zo-gshGvjCWINfalCyiMcn9jf0aPwBsn', '$2y$13$Tgj.g90c4thom004Zcy68.kMbGUkFAfGn0OJxzuBoUKPyPo.0S0pS', NULL, '32710@schoolptk.ac.th', 10, 1452583673, 1452583673),
(57, '32659', 'GCPiKR_EvOr7R2P8x1Gl3gWEWlIfFe52', '$2y$13$RRaUSLmn0Xm5SsuyLt0ezuvkmzVrh354gZ7uD3dqPG1bPmGzys4WW', NULL, '32659@schoolptk.ac.th', 10, 1452583713, 1452583713),
(58, '35752', 'k-9i_eE5WE8jKwdjjheVd51N2ZxdBdwN', '$2y$13$K1AIp3rc2.A.J3Wec1QhR.jlLnzZB2KSub81Vt7sYfCDTib0438cO', NULL, '35752@schoolptk.ac.th', 10, 1452583743, 1452583743),
(59, '35753', 'uq_3c2GhKFhCxHs8X7tC_2FIvG08nla7', '$2y$13$KLjsriWvWOY.hxGZ/kDU5O2d2XK5jRYB/9idkC6d5caECrJXiEA4i', NULL, '35753@schoolptk.ac.th', 10, 1452583773, 1452583773),
(60, '35754', 'odGtmhUUTIewwwRwIurSTqarp1wvbPAJ', '$2y$13$G.6gAxTnDucPEAm/Og3iQ.DU/FJ.MMqvQaSp4iQdrvdnkKpi.hy5u', NULL, '35754@schoolptk.ac.th', 10, 1452583808, 1452583808),
(61, '33333', 'ErTSXjcbDxnQqA4sKBCsjzeqFYWd01C0', '$2y$13$kzcXWhdMHSJUGoUso7wmd.sp7OoqVV88zAmpRmlpiFbBLMScfnpry', NULL, '33333@schoolptk.ac.th', 10, 1452583863, 1452583863),
(62, '36840', 'tYpDwX9n0UP44s2OzO9CAKUloMb2KZKH', '$2y$13$ipTNRPdh/5WbQT5eU3s3se729Zp6sLMzXlFUHu/38WAwY/.fu1tLa', NULL, '36840@schoolptk.ac.th', 10, 1452583901, 1452583901),
(63, 'Dr.tar', 'aeIsq7wvlSnHdXYQEb3wTN1P6DFzlOkM', '$2y$13$kBdpi8djjVZhNUTuw90beeYX0VfZ099OyAm4q3322WAb92iVDHk6C', NULL, 'issaraka@kku.ac.th', 10, 1454641739, 1454641739),
(64, '_wipawee', 'pqmGcJXWgac56Iwjjum3mjHUxw_tCjwE', '$2y$13$9JMifIJykNZKJje79J2CMeOmNVaau8vAIv2JNIM9XjpzUzgiyMx.m', NULL, 'wee_104_202@hotmail.com', 10, 1456306593, 1456306593),
(65, '_wipada samutthasributh', 'QRGi6F35lPIWyBeqczS81z2-xnLUViIi', '$2y$13$DUs6JrruCIIPcpTCtO20wuqP8dKvbSZNMpEGEGB3Nr9CF7lcRpyBm', NULL, 'wipeye-0.0@hotmail.com', 10, 1456306605, 1456306605),
(66, '_janyaporn khonwai', 'zLsdFplySsWZbj6I18itlNU_v_1YDbN3', '$2y$13$kHt8aj7dwOW4dekrnA9g3ufD4y/wflci3ko9X.raNcZ4r06BtlAye', NULL, 'tubtim.za_za@hotmail.com', 10, 1456306616, 1456306616),
(67, '_Patcharida Chinno', 'fMymJOZCL7v4uxwZQo7DP5mvLeOFWFnV', '$2y$13$V54oQIJto9o13C5249o1yerbCnMFAGLrr15e6sjVBMIrQ88n/Shgq', NULL, 'patcharidachinno@gmail.com', 10, 1456306642, 1456306642),
(68, '_Anirut', 'YHf7dSAMFikpQD44kzElqk44BY8YAtaf', '$2y$13$ofy4P0v6Cdf/fEWIDDW9ouCRg.xpRlo.XLxAuy9IaAoIHkTlQkazK', NULL, 'ohani301406@gmail.com', 10, 1456306650, 1456306650),
(69, '_Jupiter0411', 'OCf2NNnYJhwUls0_HHTH-xqy6HQ8WFGV', '$2y$13$Laaj5s0XMg9ElucG8JJEgujiw/18DivP3jOKGv1/dSnwmfdWDHjY2', NULL, 'jublove2540@hotmail.com', 10, 1456306653, 1456306653),
(70, '_Sarun Thumnan', '63fE_b5YPord7sa4AELhUGyr1E4YKcs9', '$2y$13$grhprqR0waBNMVJTofZga.ArZ3W1LJ/hR..G62LL.7UWoX8b1qgP6', NULL, 'possible2013_modle@hotmail.com', 10, 1456306661, 1456306661),
(71, '_Nadpisud', 'RK57sE0xJfLgT8cqzP9qXR4v_M9It5tF', '$2y$13$J/1/akVJgK55jJm9.30Foea43dgWbCezRk/UwDn8Guxx7toUcueIK', NULL, 'nnjamesnn@hotmail.com', 10, 1456306666, 1456306666),
(72, '__Nadpisud', 'Y7psXzL6pnQin-QE-5DynF_uJuElx_Rv', '$2y$13$kMTHNJ7o6sDANA9UMtWlG.4vRprImVst4qcsnQ2a.dYZG7OkfGe/2', NULL, 'nnjmesnn@hotmail.com', 10, 1456306784, 1456306784),
(73, '_pocky', '-LXSmOutSXhqvbDjZYNTv4VpfeHjl1XJ', '$2y$13$8hTV5JDksiEa/Mh8eB4bWudyPIzzABt4hNu/YZ4CBZBSgkL/9Gpd2', NULL, 'pocky1915@gmail.com', 10, 1457481782, 1457481782),
(74, 'std_test', 'kkuxvA4PkjDQBNLwe7oxBDk-FRdrBEVt', '$2y$13$f2o6hDxFwK8Whb3Rp/JdWendeooydemKshBXMcESt6HDV2EOk8kjW', NULL, 'std_test@localhost.com', 10, 1460714499, 1460714499),
(75, 'Chittrakon', 'ub3_rr2zHCJQNmp1BAzfRdtXVivyE2cJ', '$2y$13$hxhldSYUJdiKGsWyLS6Da.q2yI0BTffE88rMhUrfM4inAPoUla6Wi', NULL, 'Chittrakon@schoolptk.ac.th', 10, 1460781672, 1460781672),
(76, 'Chirawat', 'sw8gY2S8w9HvV9FQ58g_VKhSt93fr7eU', '$2y$13$2nGX4NSvuVlssoSnAFhS2O41NENezuUre7IelqUL9kxoxZtyXQtoa', NULL, 'Chirawat@schoolptk.ac.th', 10, 1460781725, 1460781725),
(77, 'Saran', 'm0tzERHxhIw90hpMK8zVCXMosRTU1r0j', '$2y$13$DLk70ZpwJ1JcCDhM4YKUhuY39QiBqyxz2NzdsgfX/9GXS7v64wq7y', NULL, 'Saran@schoolptk.ac.th', 10, 1460782954, 1460782954),
(78, 'Natarach', 'tACg44hFw38k-K6TqslQgWVQuf5hQsJb', '$2y$13$OaZ6JX1Xu9PzS7ZJO0PPNeO/1yQLeVv9Mxo1hD3VpOiEjjzfPQdfC', NULL, 'Natarach@schoolptk.ac.th', 10, 1460782991, 1460782991),
(79, 'Natphon', 'IS_Qoi3k5C5xtFsDooCp2XjcFxvpLK4B', '$2y$13$aY8x1WVhSHmc3VhkUz9mKuF9YAqYrbX7NxxO2es4aXUEl7Jme502S', NULL, 'Natphon@schoolptk.ac.th', 10, 1460783027, 1460783027),
(80, 'Natthaphisut', 'KCrE2HU6lAQ9ooTeav1CgWv6gelko1Q_', '$2y$13$u6wn0BRiYeZRkUQfkCqeyeDvtZ0I7WKdQEmSZQdR/g9BOqAAFCuXS', NULL, 'Natthaphisut@schoolptk.ac.th', 10, 1460783071, 1460783071),
(81, 'Natthawat', 'Oj0ae6oMI3wdk3WFc6aW5x-TeU8NrOWm', '$2y$13$kjWYvUVrF1GdhpTjCPCMtekW2Z8vIVizDuhQM55la.uR/U1kELyhq', NULL, 'Natthawat@schoolptk.ac.th', 10, 1460783123, 1460783123),
(82, 'Natthawu', '7bSJdYNr5HaZnbr0N3KJZyBj_OO45pP8', '$2y$13$x3yMOk4PbSGXWj4Bkq1CCuMHmSXNjaYAOYchWp2SGnZZC5bbWU57i', NULL, 'Natthawu@schoolptk.ac.th', 10, 1460783154, 1460783154),
(83, 'Ratchai', 'M9TRddFOJTdSD96fVpR64plIKQkZeowG', '$2y$13$lfeePahDLG5M2qTrECcti.tGrvZAOmqQvpcGCSzo1aZJ4YzHnBWHy', NULL, 'Ratchai@schoolptk.ac.th', 10, 1460783193, 1460783193),
(84, 'Tanatphan', 'jqxs90k3kzQccU9NS-utxNPUZN3f6O--', '$2y$13$MmYreBJ28Dh929KuvhwnSO0aLT/36Anj/c9tLiwvu0aTUTTdqZYtC', NULL, 'Tanatphan@schoolptk.ac.th', 10, 1460783227, 1460783227),
(85, 'Kitrat', 'HLzLKNy_sVeB98g31juNLJXeDj4ePCIN', '$2y$13$.zOvQlWDG9dl2Gf/zliSjOniq0rlopHPL9TDNj2LUWIBne4SwIBg2', NULL, 'Kitrat@schoolptk.ac.th', 10, 1460783448, 1460783448),
(86, 'Wiphawi', '_WwbpdWu3DNg7hxCZopTgtTvB8tNY7Jy', '$2y$13$2Rv8kbKf8e7QosID7YPWuea5Shnrr9OaF8wk6uOliuY3qYQyHQGme', NULL, 'Wiphawi@schoolptk.ac.th', 10, 1460783484, 1460783484),
(87, 'Charawi', 'BWAc8u98Zs3C58xrY_sdkvCYCaed4x-0', '$2y$13$rcgZczIkIupsrX1lPV4JpeW81EB2Jzd0bkYT7rqITLqqcFW0aN8Ca', NULL, 'Charawi@schoolptk.ac.th', 10, 1460783526, 1460783526),
(88, 'Chitlada', 'Y4vHZPAg88f9P8-2jSKk0gaeh2VpJkuz', '$2y$13$tebflZ.dx3ciGp/qG0m0LOtkiDj9ne6emIM4gQX8rWBgi3F1jncza', NULL, 'Chitlada@schoolptk.ac.th', 10, 1460783559, 1460783559),
(89, 'Chindaphon', 'NzBw2jVpnsucFbG4c_WJOUnFDWwhTnnZ', '$2y$13$Cr22M4s/yXYOyakgdQDWueeipGE6xCLK8d3NomHtNU9S7v561VOaK', NULL, 'Chindaphon@schoolptk.ac.th', 10, 1460783598, 1460783598),
(90, 'Chiraphon', 'O1FKGFtn1d0U5aMyzStcr8u1sQOVa2Du', '$2y$13$jqQP/ob.yq1vUqtaFp7BSeBwmKHabhGTLZHkeqQ6NVgTkGJaaotPC', NULL, 'Chiraphon@schoolptk.ac.th', 10, 1460783631, 1460783631),
(91, 'Chutharat', 'gqUviTJvomPG4EuHwbvYTE_n2R3NxihR', '$2y$13$oFgYgzMy8FY2fXPmoioBNe5a9UDEJY7LHLtYt.PAeaCXhgbcDU4au', NULL, 'Chutharat@schoolptk.ac.th', 10, 1460783672, 1460783672),
(92, 'Chatthip', 'Iz1QvmNYufsbjGeNdUrIUiyXpwLavUcM', '$2y$13$C.SZz7gqbKGsOFs8YtqpGuRzCZ8B.WlYRQ1GepLHxGwbvr07EDH/m', NULL, 'Chatthip@schoolptk.ac.th', 10, 1460783702, 1460783702),
(93, 'Chayani', '36__BLN3ECkdfOqClbJmTT5UkqWeLA4Q', '$2y$13$SBw5YvSudY7NqgIiZhfcoe1zWeuD.hEAsNizMApA3rC2qAXzJKnmG', NULL, 'Chayani@schoolptk.ac.th', 10, 1460784139, 1460784139),
(94, 'Chayutra', 'GHCYgOrOYiw5mAskcp9pxnuVVWX1rfmc', '$2y$13$p/Xryf.PgLyiqlcougBNe.Z.KFYR9W4FCI0bqA2RZTjkesiPsn49S', NULL, 'Chayutra@schoolptk.ac.th', 10, 1460784167, 1460784167),
(95, 'Chanyaphon', '1iH1t3aIGP_ivdYAxp7qkZLCPs30LklA', '$2y$13$p8t6aeiFr81Ay/hJmQiebuMG5QKwJ4cyt9l3eMtHB/gGyknhZ9GdO', NULL, 'Chanyaphon@schoolptk.ac.th', 10, 1460784202, 1460784202),
(96, 'Wiphada', 'EGFkIfCWV_zkr7zFuNjDyVMlGOs_V9y-', '$2y$13$wAaNAQVdG5UcqLPxjeKTte8/iZ6s2q/AM4iMLMcqgGmZJpIdaaDA2', NULL, 'Wiphada@schoolptk.ac.th', 10, 1460784239, 1460784239);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
