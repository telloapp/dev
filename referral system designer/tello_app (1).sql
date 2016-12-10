-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 02:29 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tello_app`
--
CREATE DATABASE IF NOT EXISTS `tello_app` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tello_app`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(23, 'tello_app', 'tello_app');

-- --------------------------------------------------------

--
-- Table structure for table `biz_profile`
--

CREATE TABLE IF NOT EXISTS `biz_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `biz_name` varchar(300) NOT NULL,
  `marketing` varchar(300) NOT NULL,
  `sales` varchar(300) NOT NULL,
  `product` varchar(300) NOT NULL,
  `total_emp` varchar(300) NOT NULL,
  `problem` varchar(300) NOT NULL,
  `solution` varchar(300) NOT NULL,
  `uniquesp` varchar(300) NOT NULL,
  `biz_summary` varchar(300) NOT NULL,
  `monatization` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_profile`
--

CREATE TABLE IF NOT EXISTS `business_profile` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL,
  `size` int(50) NOT NULL,
  `type` varchar(200) NOT NULL,
  `site_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `business_profile`
--

INSERT INTO `business_profile` (`id`, `file`, `size`, `type`, `site_id`) VALUES
(15, '548807-idc-report.docx', 160, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 12);

-- --------------------------------------------------------

--
-- Table structure for table `cancelled_site`
--

CREATE TABLE IF NOT EXISTS `cancelled_site` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `d_q_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat_forum`
--

CREATE TABLE IF NOT EXISTS `chat_forum` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `designer_id` int(20) NOT NULL,
  `message` longtext NOT NULL,
  `category` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chat_forum`
--

INSERT INTO `chat_forum` (`id`, `designer_id`, `message`, `category`) VALUES
(2, 5, 'sweswe', 'Design');

-- --------------------------------------------------------

--
-- Table structure for table `client_complaints`
--

CREATE TABLE IF NOT EXISTS `client_complaints` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(20) NOT NULL,
  `designer_id` int(20) NOT NULL,
  `complaint` varchar(300) NOT NULL,
  `site_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client_payment`
--

CREATE TABLE IF NOT EXISTS `client_payment` (
  `c_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `d_q_id` int(20) NOT NULL,
  `site_id` int(10) NOT NULL,
  `payment_type` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `client_status` varchar(20) NOT NULL,
  `payment_method` varchar(300) NOT NULL,
  `amount` decimal(60,2) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `client_payment`
--

INSERT INTO `client_payment` (`c_id`, `user_id`, `d_q_id`, `site_id`, `payment_type`, `date`, `client_status`, `payment_method`, `amount`) VALUES
(35, 3, 14, 12, 'Deposit', '2016-12-10', 'Pending', 'Direct Payment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `reply` longtext NOT NULL,
  `likes` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `m_id`, `designer_id`, `admin_id`, `reply`, `likes`, `status`) VALUES
(51, 2, 5, 0, 'sdrftgyhuj', 1, 'read'),
(52, 2, 5, 0, 'ke master mind wa diski', 1, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE IF NOT EXISTS `criteria` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `criteria` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `criteria`) VALUES
(1, 'communication\r\n'),
(2, 'speed'),
(3, 'attention to details'),
(4, 'Honesty');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE IF NOT EXISTS `designer` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contacts` varchar(300) NOT NULL,
  `website` varchar(255) NOT NULL,
  `d_origin` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `username`, `password`, `email`, `contacts`, `website`, `d_origin`) VALUES
(5, 'law', 'Ml2#mlaw', 'ml@yahoo.com', '0721372785', 'morongwalawrence.co.za', 'music'),
(6, 'khutso', '123456', 'khutso@tello.com', '0843677757', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `designer_checklist`
--

CREATE TABLE IF NOT EXISTS `designer_checklist` (
  `id` int(20) NOT NULL,
  `designer_id` int(20) NOT NULL,
  `site_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designer_payment`
--

CREATE TABLE IF NOT EXISTS `designer_payment` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `d_q_id` int(20) NOT NULL,
  `amt_paid` decimal(60,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designer_quote`
--

CREATE TABLE IF NOT EXISTS `designer_quote` (
  `q_id` int(20) NOT NULL AUTO_INCREMENT,
  `designe_id` int(20) NOT NULL,
  `site_id` int(20) NOT NULL,
  `quote_price` decimal(60,2) NOT NULL,
  `finish_date` date NOT NULL,
  `date_accepted` date DEFAULT NULL,
  `quote_num` int(20) NOT NULL,
  `own_maintenance` varchar(200) NOT NULL,
  `basic_m_amt` decimal(60,2) NOT NULL,
  `advanced_m_amt` decimal(60,2) NOT NULL,
  `basic_m_period` varchar(300) NOT NULL,
  `advanced_m_period` varchar(300) NOT NULL,
  `request_report` varchar(300) NOT NULL,
  `quote_accepted` varchar(300) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `designer_quote`
--

INSERT INTO `designer_quote` (`q_id`, `designe_id`, `site_id`, `quote_price`, `finish_date`, `date_accepted`, `quote_num`, `own_maintenance`, `basic_m_amt`, `advanced_m_amt`, `basic_m_period`, `advanced_m_period`, `request_report`, `quote_accepted`) VALUES
(14, 6, 12, '1000.00', '2016-12-12', '2016-12-10', 364, 'yes', '200.00', '500.00', '3', '5', 'sent', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pages` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `pages`) VALUES
(1, 'Home page'),
(2, 'About page'),
(3, 'Contact page'),
(4, 'Services page'),
(5, 'Team page');

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE IF NOT EXISTS `penalties` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `site_id` int(20) NOT NULL,
  `designer_id` int(20) NOT NULL,
  `days_missed` int(20) NOT NULL,
  `fixed_amt` decimal(60,2) NOT NULL,
  `final_amt_deducted` decimal(60,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `designer_id` int(20) NOT NULL,
  `site_id` int(20) NOT NULL,
  `ratings` int(20) NOT NULL,
  `comments` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE IF NOT EXISTS `revision` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(20) NOT NULL,
  `site_id` int(20) NOT NULL,
  `designer_id` int(20) NOT NULL,
  `status` varchar(300) NOT NULL,
  `revision_num` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `revision_data` varchar(300) NOT NULL,
  `site_link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `client_id`, `site_id`, `designer_id`, `status`, `revision_num`, `start_date`, `end_date`, `revision_data`, `site_link`) VALUES
(2, 3, 12, 5, 'Not Done', 'Complete', '2016-12-10', '2016-12-13', 'im not happy at all', ''),
(3, 3, 12, 6, 'Not Done', 'Complete', '2016-12-10', '2016-12-13', 'im not happy', '');

-- --------------------------------------------------------

--
-- Table structure for table `selected_features`
--

CREATE TABLE IF NOT EXISTS `selected_features` (
  `selected_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `feature_id` int(20) NOT NULL,
  `id` int(20) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `c_status` varchar(255) NOT NULL DEFAULT 'Not Done',
  `value` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`selected_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `selected_features`
--

INSERT INTO `selected_features` (`selected_id`, `user_id`, `feature_id`, `id`, `status`, `c_status`, `value`) VALUES
(45, 3, 1, 12, 'sent', 'Done', 20),
(46, 3, 2, 12, 'sent', 'Done', 20),
(47, 3, 3, 12, 'sent', 'Done', 20),
(48, 3, 4, 12, 'sent', 'Done', 20),
(49, 3, 5, 12, 'sent', 'Done', 20);

-- --------------------------------------------------------

--
-- Table structure for table `site_data`
--

CREATE TABLE IF NOT EXISTS `site_data` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `website_type` varchar(200) NOT NULL,
  `due_date` date NOT NULL,
  `no_of_pages` int(20) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `site_name` varchar(200) NOT NULL,
  `business_profile` varchar(200) DEFAULT NULL,
  `template_id` int(50) DEFAULT NULL,
  `request_report` varchar(300) NOT NULL,
  `origin` varchar(200) NOT NULL,
  `home` varchar(200) DEFAULT NULL,
  `progress_status` varchar(200) DEFAULT 'Inprogress',
  `cancel_status` varchar(200) NOT NULL DEFAULT 'Not Cancelled',
  `cancell_date` date NOT NULL,
  `aprove_date` date NOT NULL,
  `site_date_completed` date NOT NULL,
  `designer_id` int(20) NOT NULL,
  `seen` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `site_data`
--

INSERT INTO `site_data` (`id`, `user_id`, `website_type`, `due_date`, `no_of_pages`, `facebook`, `twitter`, `instagram`, `site_name`, `business_profile`, `template_id`, `request_report`, `origin`, `home`, `progress_status`, `cancel_status`, `cancell_date`, `aprove_date`, `site_date_completed`, `designer_id`, `seen`) VALUES
(12, 3, 'Automotive', '2016-12-12', 5, 'morongwalawrence', '', '', 'we drvie', NULL, NULL, 'sent', 'tello', NULL, 'Inprogress', 'Not cancelled', '0000-00-00', '0000-00-00', '2016-12-10', 6, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `super_tello_admin`
--

CREATE TABLE IF NOT EXISTS `super_tello_admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`u_id`, `file`, `type`, `size`, `user_id`, `c_id`) VALUES
(111, '854738-rw-carbon-fiber-v-style-fornt-lip-bmw-f80-m3-4.jpg', 'image/jpeg', 534, 3, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tello_admin`
--

CREATE TABLE IF NOT EXISTS `tello_admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contact` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contacts` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `contacts`) VALUES
(3, 'law', '$2y$12$581617982584bf2f0a7feu3jZgNFCiayJCiPcOf/cmQvMpEbb3TjW', 'morongwalawrence@gmail.com', '0721372785');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `construction` varchar(200) NOT NULL,
  `ecommerce` varchar(200) NOT NULL,
  `entertainment and media` varchar(200) NOT NULL,
  `travel and tour` varchar(200) NOT NULL,
  `hotel and accomodation` varchar(200) NOT NULL,
  `food retail and services` varchar(200) NOT NULL,
  `community and society` varchar(200) NOT NULL,
  `colleges and university` varchar(200) NOT NULL,
  `writers and authors` varchar(200) NOT NULL,
  `information and communication` varchar(200) NOT NULL,
  `automotive` varchar(200) NOT NULL,
  `education` varchar(200) NOT NULL,
  `health and medicine` varchar(200) NOT NULL,
  `personal care and services` varchar(200) NOT NULL,
  `logistics and transport` varchar(200) NOT NULL,
  `computers and electronics` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
