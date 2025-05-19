-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 10:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `sub_heading` varchar(500) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `monday` varchar(100) NOT NULL,
  `tuesday` varchar(100) NOT NULL,
  `wednesday` varchar(100) NOT NULL,
  `thursday` varchar(100) NOT NULL,
  `friday` varchar(100) NOT NULL,
  `saturday` varchar(100) NOT NULL,
  `sunday` varchar(100) NOT NULL,
  `call_icon` varchar(500) NOT NULL,
  `number` varchar(50) NOT NULL,
  `tt_heading` varchar(100) NOT NULL,
  `tt_contact_color` varchar(100) NOT NULL,
  `director_name` varchar(100) NOT NULL,
  `director_image` varchar(300) NOT NULL,
  `border_color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `heading`, `sub_heading`, `title`, `detail`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `call_icon`, `number`, `tt_heading`, `tt_contact_color`, `director_name`, `director_image`, `border_color`) VALUES
(1, 'Who We Are', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\'s standard dummy text.', 'A hospital is a health care institution providing patient treatment with specialized medical', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt laboret dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc laboris nisi utaliquip.\nCommodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt laboret dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc laboris nisi utaliquip. Commodo consequat. Sed do eiusmod tempor incidid unt labore et dolore magna aliqua.', '8:00am–7:00pm', '9:00am–6:00pm', '9:00am–6:00pm', '8:00am–7:00pm', '8:00am–7:00pm', '9:00am–5:00pm', '9:00am–3:00pm', 'pngwing.com (18).png', '(+01) - 234 567 890', 'Weekly Timetable', 'text-success', 'Ritik Kumar', 'avatar1.png', 'border-success');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `message` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `name`, `email`, `number`, `date`, `department`, `doctor`, `message`) VALUES
(3, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-04', 'Dental Care', 'Dr. Mak Roshi', 'i am very ill please teke care of me'),
(5, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-04', 'Dental Care', 'Dr. Mak Roshi', 'ajdhjsgdhgdshgfsk'),
(6, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-04', 'Dental Care', 'Dr. Mak Roshi', 'ajdhjsgdhgdshgfsk'),
(9, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-18', 'Crutches', 'Dr. Mak Roshi', '																			  hjghgfgfgfhhgfhfhg\r\n																			  '),
(10, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-16', 'Crutches', 'Dr. Mak Roshi', '																			  hjghgfgfgfhhgfhfhg\r\n																			  '),
(12, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-17', 'Crutches', 'Dr. Mak Roshi', '																			  hjghgfgfgfhhgfhfhg\r\n																			  '),
(13, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-08-26', 'Crutches', 'Dr. Mak Roshi', '																			  hjghgfgfgfhhgfhfhg\r\n																			  '),
(14, 'Ritik kumar', 'rk5771829@gmail.com', 2147483647, '2024-09-20', 'Cardiology', 'Dr. Mohoshin Kabir', 'i am the best');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `sub_heading` varchar(500) NOT NULL,
  `link_icon` varchar(100) NOT NULL,
  `card1_img` varchar(100) NOT NULL,
  `card2_img` varchar(100) NOT NULL,
  `card3_img` varchar(100) NOT NULL,
  `card1_title` varchar(200) NOT NULL,
  `card2_title` varchar(200) NOT NULL,
  `card3_title` varchar(200) NOT NULL,
  `card1_date` varchar(100) NOT NULL,
  `card2_date` varchar(100) NOT NULL,
  `card3_date` varchar(100) NOT NULL,
  `card1_psoted_by` varchar(100) NOT NULL,
  `card2_psoted_by` varchar(100) NOT NULL,
  `card3_psoted_by` varchar(100) NOT NULL,
  `card1_detail` varchar(500) NOT NULL,
  `card2_detail` varchar(500) NOT NULL,
  `card3_detail` varchar(500) NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_color` varchar(100) NOT NULL,
  `slider_1` varchar(100) NOT NULL,
  `slider_2` varchar(100) NOT NULL,
  `slider_3` varchar(100) NOT NULL,
  `slider_4` varchar(100) NOT NULL,
  `slider_5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `heading`, `sub_heading`, `link_icon`, `card1_img`, `card2_img`, `card3_img`, `card1_title`, `card2_title`, `card3_title`, `card1_date`, `card2_date`, `card3_date`, `card1_psoted_by`, `card2_psoted_by`, `card3_psoted_by`, `card1_detail`, `card2_detail`, `card3_detail`, `btn_text`, `btn_color`, `slider_1`, `slider_2`, `slider_3`, `slider_4`, `slider_5`) VALUES
(1, 'Latest News', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'pngwing.com (34).png', 'blog1.jpg', 'blog2.jpg', 'blog3.jpg', 'Working in emergency medicine', 'Individual treatment & assistance', 'Child’s first hospital visit', 'Aug 21, 2020', 'Aug 22, 2020', 'Aug 23, 2020', 'James Lewis', 'William Juarez', 'Albert Brian', 'Lorem Ipsum is simply dummy text of the print ing and typesetting industry. lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'Lorem Ipsum is simply dummy text of the print ing and typesetting industry. lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'Lorem Ipsum is simply dummy text of the print ing and typesetting industry. lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'Read more', 'btn-outline-success', 'client1.png', 'client2.png', 'client3.png', 'client4.png', 'client5.png');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `sub_heading` varchar(500) NOT NULL,
  `nav1_item_img` varchar(100) NOT NULL,
  `nav2_item_img` varchar(100) NOT NULL,
  `nav3_item_img` varchar(100) NOT NULL,
  `nav4_item_img` varchar(100) NOT NULL,
  `nav5_item_img` varchar(100) NOT NULL,
  `nav6_item_img` varchar(100) NOT NULL,
  `nav1_item` varchar(100) NOT NULL,
  `nav2_item` varchar(100) NOT NULL,
  `nav3_item` varchar(100) NOT NULL,
  `nav4_item` varchar(100) NOT NULL,
  `nav5_item` varchar(100) NOT NULL,
  `nav6_item` varchar(100) NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_color` varchar(100) NOT NULL,
  `nav1_detail_img` varchar(500) NOT NULL,
  `nav2_detail_img` varchar(500) NOT NULL,
  `nav3_detail_img` varchar(500) NOT NULL,
  `nav4_detail_img` varchar(500) NOT NULL,
  `nav5_detail_img` varchar(500) NOT NULL,
  `nav6_detail_img` varchar(500) NOT NULL,
  `nav1_detail_sub_heading` varchar(500) NOT NULL,
  `nav2_detail_sub_heading` varchar(500) NOT NULL,
  `nav3_detail_sub_heading` varchar(500) NOT NULL,
  `nav4_detail_sub_heading` varchar(500) NOT NULL,
  `nav5_detail_sub_heading` varchar(500) NOT NULL,
  `nav6_detail_sub_heading` varchar(500) NOT NULL,
  `nav1_detail_title` varchar(1000) NOT NULL,
  `nav2_detail_title` varchar(1000) NOT NULL,
  `nav3_detail_title` varchar(1000) NOT NULL,
  `nav4_detail_title` varchar(1000) NOT NULL,
  `nav5_detail_title` varchar(1000) NOT NULL,
  `nav6_detail_title` varchar(1000) NOT NULL,
  `nav_item_detail_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `heading`, `sub_heading`, `nav1_item_img`, `nav2_item_img`, `nav3_item_img`, `nav4_item_img`, `nav5_item_img`, `nav6_item_img`, `nav1_item`, `nav2_item`, `nav3_item`, `nav4_item`, `nav5_item`, `nav6_item`, `btn_text`, `btn_color`, `nav1_detail_img`, `nav2_detail_img`, `nav3_detail_img`, `nav4_detail_img`, `nav5_detail_img`, `nav6_detail_img`, `nav1_detail_sub_heading`, `nav2_detail_sub_heading`, `nav3_detail_sub_heading`, `nav4_detail_sub_heading`, `nav5_detail_sub_heading`, `nav6_detail_sub_heading`, `nav1_detail_title`, `nav2_detail_title`, `nav3_detail_title`, `nav4_detail_title`, `nav5_detail_title`, `nav6_detail_title`, `nav_item_detail_title`) VALUES
(1, 'Our department', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\'s standard dummy text.', 'medical.png', 'x-ray.png', 'lungs.png', 'heart.png', 'incisor.png', 'brainstorm.png', 'Crutches', 'X-Ray', 'Pulmonary', 'Pulmonary', 'Dental care', 'Neurology', 'Read more', 'btn-success', 'crutches.png', 'xray.png', 'pulmonary.png', 'cardiology.png', 'dental-care.png', 'neurology.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni nemo libero debitis vitae sapiente quos.', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Oillum abrem deleniti adipisci suscipit dignissimos. remaining essentially unchanged. It was popularised in the with the . Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem ipsum dolor sit amet consectetur adipisicing elit.\\r\\n', 'Welcome to our');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `sub_heading` varchar(1000) NOT NULL,
  `doctor1_img` varchar(300) NOT NULL,
  `doctor2_img` varchar(300) NOT NULL,
  `doctor3_img` varchar(300) NOT NULL,
  `doctor4_img` varchar(300) NOT NULL,
  `doctor1_name` varchar(100) NOT NULL,
  `doctor2_name` varchar(100) NOT NULL,
  `doctor3_name` varchar(100) NOT NULL,
  `doctor4_name` varchar(100) NOT NULL,
  `doctor1_specs` varchar(100) NOT NULL,
  `doctor2_specs` varchar(100) NOT NULL,
  `doctor3_specs` varchar(100) NOT NULL,
  `doctor4_specs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `heading`, `sub_heading`, `doctor1_img`, `doctor2_img`, `doctor3_img`, `doctor4_img`, `doctor1_name`, `doctor2_name`, `doctor3_name`, `doctor4_name`, `doctor1_specs`, `doctor2_specs`, `doctor3_specs`, `doctor4_specs`) VALUES
(1, 'Meet our specialists', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\'s standard dummy text.', 'member1.jpg', 'member2.jpg', 'member3.jpg', 'member4.jpg', 'Dr. Phillip Bailey', 'Dr. Versa Hasson', 'Dr. Matthew Hill', 'Dr. Jeanette Hoff', 'Urology', 'Cardiology', 'Neurosurgery', 'Surgery');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `map` varchar(1000) NOT NULL,
  `address` varchar(400) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number_1` varchar(100) NOT NULL,
  `number_2` varchar(100) NOT NULL,
  `about` varchar(1000) NOT NULL,
  `logo` varchar(400) NOT NULL,
  `ul_1` varchar(50) NOT NULL,
  `ul_2` varchar(50) NOT NULL,
  `ul_3` varchar(50) NOT NULL,
  `ul_4` varchar(50) NOT NULL,
  `d_1` varchar(50) NOT NULL,
  `d_2` varchar(50) NOT NULL,
  `d_3` varchar(50) NOT NULL,
  `d_4` varchar(50) NOT NULL,
  `item_1` varchar(100) NOT NULL,
  `item_2` varchar(100) NOT NULL,
  `item_3` varchar(100) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `map`, `address`, `email`, `number_1`, `number_2`, `about`, `logo`, `ul_1`, `ul_2`, `ul_3`, `ul_4`, `d_1`, `d_2`, `d_3`, `d_4`, `item_1`, `item_2`, `item_3`, `color`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7008.261945192871!2d77.20641084245335!3d28.565829552804754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce26f903969d7%3A0x8367180c6de2ecc2!2sAll%20India%20Institute%20Of%20Medical%20Sciences!5e0!3m2!1sen!2sin!4v1709052003967!5m2!1sen!2sin', '1223 Fulton Street San Diego CA 941-23 USA', 'nischinto@gmail.com', '(+01) - 234 567 890', '(+01) - 345 678 901', 'Lorem ipsum dolor sit consectet adipisicing sed do eiusmod temp incididunt ut labore. Lorem Ipsum is simply dummy.', 'footer-logo.png', 'FAQS', 'Blog', 'Weekly timetable', 'erms & Condition', 'Rehabilitation', 'Laboratory Analysis', 'Face Lift Surgery', 'Liposuction', '  Useful Links', '  Departments', '  Contacts', 'text-success');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `heading1` varchar(300) NOT NULL,
  `heading2` varchar(300) NOT NULL,
  `heading3` varchar(300) NOT NULL,
  `sub_heading1` varchar(500) NOT NULL,
  `sub_heading2` varchar(500) NOT NULL,
  `sub_heading3` varchar(500) NOT NULL,
  `hospital_img1` varchar(300) NOT NULL,
  `hospital_img2` varchar(300) NOT NULL,
  `hospital_img3` varchar(300) NOT NULL,
  `hospital_img4` varchar(300) NOT NULL,
  `hospital_img5` varchar(300) NOT NULL,
  `hospital_img6` varchar(300) NOT NULL,
  `hospital_img7` varchar(300) NOT NULL,
  `image_icon` varchar(300) NOT NULL,
  `card1_img` varchar(300) NOT NULL,
  `card2_img` varchar(300) NOT NULL,
  `card3_img` varchar(300) NOT NULL,
  `card1_name` varchar(100) NOT NULL,
  `card2_name` varchar(100) NOT NULL,
  `card3_name` varchar(100) NOT NULL,
  `card1_skill` varchar(300) NOT NULL,
  `card2_skill` varchar(300) NOT NULL,
  `card3_skill` varchar(300) NOT NULL,
  `card1_detail` varchar(500) NOT NULL,
  `card2_detail` varchar(500) NOT NULL,
  `card3_detail` varchar(500) NOT NULL,
  `adver_img` varchar(300) NOT NULL,
  `adver_icon` varchar(300) NOT NULL,
  `box1_icon` varchar(300) NOT NULL,
  `box2_icon` varchar(300) NOT NULL,
  `box3_icon` varchar(300) NOT NULL,
  `box4_icon` varchar(300) NOT NULL,
  `box1_count` varchar(100) NOT NULL,
  `box2_count` varchar(100) NOT NULL,
  `box3_count` varchar(100) NOT NULL,
  `box4_count` varchar(100) NOT NULL,
  `box1_name` varchar(100) NOT NULL,
  `box2_name` varchar(100) NOT NULL,
  `box3_name` varchar(100) NOT NULL,
  `box4_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `heading1`, `heading2`, `heading3`, `sub_heading1`, `sub_heading2`, `sub_heading3`, `hospital_img1`, `hospital_img2`, `hospital_img3`, `hospital_img4`, `hospital_img5`, `hospital_img6`, `hospital_img7`, `image_icon`, `card1_img`, `card2_img`, `card3_img`, `card1_name`, `card2_name`, `card3_name`, `card1_skill`, `card2_skill`, `card3_skill`, `card1_detail`, `card2_detail`, `card3_detail`, `adver_img`, `adver_icon`, `box1_icon`, `box2_icon`, `box3_icon`, `box4_icon`, `box1_count`, `box2_count`, `box3_count`, `box4_count`, `box1_name`, `box2_name`, `box3_name`, `box4_name`) VALUES
(1, 'View our gallery', 'Before and after procedures', 'What people say?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\\\\\\\'s standard dummy text.', 'project1.jpg', 'project2.jpg', 'project3.jpg', 'project4.jpg', 'project5.jpg', 'project6.jpg', 'project7.jpg', 'pngwing.com (33).png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'Ralph Jones', 'Francis Jara', 'Ralph Jones', 'UX Designer', 'Biographer', 'Executive', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus porro ratione animi quas modi possimus.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus porro ratione animi quas modi possimus.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus porro ratione animi quas modi possimus.', 'doctorgirl.jpg', 'icons8-video-100.png', 'pngwing.com (32).png', 'pngwing.com (28).png', 'pngwing.com (27).png', 'pngwing.com (31).png', '20', '2354', '99', '125', 'Years of experience', 'Happy Patients', 'Qualified Doctors', 'Hospital Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_color` varchar(200) NOT NULL,
  `nav_item1` varchar(100) NOT NULL,
  `nav_item2` varchar(100) NOT NULL,
  `nav_item3` varchar(100) NOT NULL,
  `nav_item4` varchar(100) NOT NULL,
  `nav_item5` varchar(100) NOT NULL,
  `nav_item6` varchar(100) NOT NULL,
  `nav_item7` varchar(100) NOT NULL,
  `nav_item8` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `email`, `contact`, `logo`, `btn_text`, `btn_color`, `nav_item1`, `nav_item2`, `nav_item3`, `nav_item4`, `nav_item5`, `nav_item6`, `nav_item7`, `nav_item8`) VALUES
(1, 'info@nischinto.com', '+01 - 234 567 890', 'footer-logo.png', 'Appoinment', 'btn-outline-success', 'Home', 'About', 'Department', 'Doctors', 'Gallery', 'Pricing', 'Blog', 'Contact');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `sub_heading` varchar(400) NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_color` varchar(200) NOT NULL,
  `bg_image` varchar(500) NOT NULL,
  `box1_icon` varchar(300) NOT NULL,
  `box2_icon` varchar(300) NOT NULL,
  `box3_icon` varchar(300) NOT NULL,
  `box1_heding` varchar(200) NOT NULL,
  `box2_heding` varchar(200) NOT NULL,
  `box3_heding` varchar(200) NOT NULL,
  `box1_subheding` varchar(500) NOT NULL,
  `box2_subheding` varchar(500) NOT NULL,
  `box3_subheding` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `heading`, `sub_heading`, `btn_text`, `btn_color`, `bg_image`, `box1_icon`, `box2_icon`, `box3_icon`, `box1_heding`, `box2_heding`, `box3_heding`, `box1_subheding`, `box2_subheding`, `box3_subheding`) VALUES
(1, 'Take the best quality Treatment for', 'The art of medicine consists in amusing the patient while nature cures the disease. Treatment without prevention is simply unsustainable.', 'Appoinment', 'btn-warning', 'pexels-mart-production-75658871080ponline-video-cutter.com-ezgif.com-video-to-gif-converter.gif', '—Pngtree—stethoscope_969719.png', 'pngwing.com (18).png', 'kisspng-siren-computer-icons-clip-art-police-siren-5b27ecd2a15ed3.897700681529343186661.png', 'Qualified Doctors', '24 Hours Service', 'Need Emergency', 'Lorem ipsum dolor sit amet consectet adipis sed do eiusmod tempor incididuntutid labore.', 'Lorem ipsum dolor sit amet consectet adipis sed do eiusmod tempor incididuntutid labore.', 'Lorem ipsum dolor sit amet consectet adipis sed do eiusmod tempor incididuntutid labore.');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`id`, `username`, `email`, `password`, `photo`) VALUES
(1, 'Ritik kumar', 'rk1234@gmail.com', 'Ritik@2006', 'WhatsApp Image 2024-06-15 at 09.30.12_650fc9d4.jpg'),
(8, 'neeraj', 'ritik@gmail.com', 'Ritik1234', 'isKnQgv5_thumb.jpg'),
(9, 'kartik', 'kartik1234@gmail.com', 'kartik1234', 'beautiful-view-galaxie-260nw-2269996539.webp');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `number`, `message`) VALUES
(2, 'Ritik kumar', 'rk5771829@gmail.com', 'doctor', '0828738586', 'This hospital is best.');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `sub_heading` varchar(500) NOT NULL,
  `slidder_card1_price` varchar(100) NOT NULL,
  `slidder_card2_price` varchar(100) NOT NULL,
  `slidder_card3_price` varchar(100) NOT NULL,
  `slidder_card1_name` varchar(100) NOT NULL,
  `slidder_card2_name` varchar(100) NOT NULL,
  `slidder_card3_name` varchar(100) NOT NULL,
  `description1` varchar(100) NOT NULL,
  `description2` varchar(100) NOT NULL,
  `description3` varchar(100) NOT NULL,
  `description4` varchar(100) NOT NULL,
  `description5` varchar(100) NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_color` varchar(100) NOT NULL,
  `detail_img` varchar(200) NOT NULL,
  `detail_heading` varchar(300) NOT NULL,
  `deating_question_1` varchar(500) NOT NULL,
  `deating_question_2` varchar(500) NOT NULL,
  `deating_question_3` varchar(500) NOT NULL,
  `deating_question_4` varchar(500) NOT NULL,
  `deating_question_5` varchar(500) NOT NULL,
  `deating_answer_1` varchar(1000) NOT NULL,
  `deating_answer_2` varchar(1000) NOT NULL,
  `deating_answer_3` varchar(1000) NOT NULL,
  `deating_answer_4` varchar(1000) NOT NULL,
  `deating_answer_5` varchar(1000) NOT NULL,
  `right_description_img` varchar(100) NOT NULL,
  `wrong_description_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `heading`, `sub_heading`, `slidder_card1_price`, `slidder_card2_price`, `slidder_card3_price`, `slidder_card1_name`, `slidder_card2_name`, `slidder_card3_name`, `description1`, `description2`, `description3`, `description4`, `description5`, `btn_text`, `btn_color`, `detail_img`, `detail_heading`, `deating_question_1`, `deating_question_2`, `deating_question_3`, `deating_question_4`, `deating_question_5`, `deating_answer_1`, `deating_answer_2`, `deating_answer_3`, `deating_answer_4`, `deating_answer_5`, `right_description_img`, `wrong_description_img`) VALUES
(1, 'Show your pricing plans', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum the industry\'s standard dummy text.', '$39', '$150', '$89', 'Blood Test', 'Hemoglobin Test', 'Hemocysteine', 'First Description', 'Second Description', 'Third Description', 'Fourth Description', 'Fifth Description', 'Contact Now', 'btn-outline-success', 'faq-img.png', 'Just Answer the Questions', 'What is Medi Solution?', 'How do I get refill on my prescription?', 'How competent our total treatment?', 'If I sick what should I do?', 'What is emergency carry to your hospital?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus nobis earum neque quisquam expedita voluptatum eos repellendus rerum, repellat labore, quis, deserunt tempora saepe laudantium adipisci laborum impedit beatae!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus nobis earum neque quisquam expedita voluptatum eos repellendus rerum, repellat labore, quis, deserunt tempora saepe laudantium adipisci laborum impedit beatae!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus nobis earum neque quisquam expedita voluptatum eos repellendus rerum, repellat labore, quis, deserunt tempora saepe laudantium adipisci laborum impedit beatae!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus nobis earum neque quisquam expedita voluptatum eos repellendus rerum, repellat labore, quis, deserunt tempora saepe laudantium adipisci laborum impedit beatae!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim necessitatibus nobis earum neque quisquam expedita voluptatum eos repellendus rerum, repellat labore, quis, deserunt tempora saepe laudantium adipisci laborum impedit beatae!', 'pngwing.com.png', 'pngwing.com (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `Subscribe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `Subscribe`) VALUES
(2, 'rk1234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `post` varchar(300) NOT NULL,
  `edu` varchar(200) NOT NULL,
  `skill` varchar(300) NOT NULL,
  `knowledge` varchar(500) NOT NULL,
  `number` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `portfolio` varchar(300) DEFAULT NULL,
  `linkdin` varchar(300) DEFAULT NULL,
  `git` varchar(300) DEFAULT NULL,
  `insta` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `name`, `photo`, `post`, `edu`, `skill`, `knowledge`, `number`, `email`, `portfolio`, `linkdin`, `git`, `insta`) VALUES
(1, 'Ritik Kumar', 'WhatsApp Image 2024-08-26 at 22.30.10_2ac80ebe.jpg', 'CEO of Nischinto', 'Masters in BCA', 'Senior Full-Stack Web Developer', 'HTML, SASS, AJAX, CSS, PHP, Laravel, Bootstrap, jquery, Wordpress, Js', 1234567895, 'rk1234@gmail.com', '', '', '', ''),
(2, 'Ritik', NULL, 'Manager', 'M.tech', 'Senior Full-stack developer', 'CSS', 2147483647, 'rk5771829@gmail.com', NULL, NULL, NULL, NULL),
(3, 'Ritik', 'jin 2.png', 'Voice President', 'MBA', 'Software developer', 'CSS,PHP,Laravel,Reactjs', 2147483647, 'ritik@gmail.com', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
