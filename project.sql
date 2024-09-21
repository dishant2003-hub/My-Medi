-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2024 at 07:15 AM
-- Server version: 5.7.40
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_latest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcountries`
--

DROP TABLE IF EXISTS `tblcountries`;
CREATE TABLE IF NOT EXISTS `tblcountries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phonecode` int(11) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbllanguage`
--

DROP TABLE IF EXISTS `tbllanguage`;
CREATE TABLE IF NOT EXISTS `tbllanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `key` varchar(10) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllanguage`
--

INSERT INTO `tbllanguage` (`id`, `title`, `key`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'English', 'en', 1, 0, '2022-09-02 11:46:56', '2022-09-02 11:46:56'),
(2, 'Turkey', 'tr', 1, 0, '2022-09-02 11:46:56', '2022-09-02 11:46:56'),
(3, 'Arabic', 'ar', 1, 1, '2022-09-06 14:40:57', '2022-09-06 14:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbllanguage_key`
--

DROP TABLE IF EXISTS `tbllanguage_key`;
CREATE TABLE IF NOT EXISTS `tbllanguage_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value_en` text,
  `value_tr` text,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllanguage_key`
--

INSERT INTO `tbllanguage_key` (`id`, `key`, `value_en`, `value_tr`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'invalidLogin', 'Invalid Email or Password!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(2, 'pwdChangeSuc', 'Password has been changed successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(3, 'recAddSuc', 'Record is Added Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(4, 'recUpSuc', 'Record is Updated Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(5, 'recDelSuc', 'Record is Deleted Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(6, 'recNotFound', 'Record not found', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(7, 'passMissingParam', 'Please enter Missing parameter.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(8, 'passEmail', 'Please enter Email.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(9, 'passFname', 'Please enter Name.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(10, 'passFamilyName', 'Please enter Family Name.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(12, 'passLangType', 'Please pass Language type.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(13, 'passMobile', 'Please enter Mobile Number.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(14, 'passPwd', 'Please enter password.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(16, 'passDeviceType', 'Please pass device type.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(17, 'passDeviceToken', 'Please pass device token.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(19, 'emailExist', 'This Email Already Exist', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(20, 'regSuccess', 'User register Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(22, 'regFail', 'Fail to register User.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(23, 'userNotFound', 'User not found', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(24, 'loginSuccess', 'Member Login Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(25, 'passUserId', 'Please pass User ID.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(26, 'passToken', 'Please pass Access Token.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(27, 'passUsername', 'Please enter Username.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(28, 'usernameExist', 'Username already exist.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(29, 'profileUpdateSuccess', 'Profile update Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(30, 'profileUpdateFail', 'Fail to update Profile.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(31, 'passwordNotMatch', 'Password not match, please enter Correct password.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(32, 'passOldPwd', 'Please enter old password.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(33, 'passNewPwd', 'Please enter new password.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(34, 'pwdChangeSuccess', 'Change Password Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(35, 'logoutSuccess', 'Logout Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(39, 'fullname', 'Please Pass full name', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(40, 'address_1', 'Please Fill address line 1', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(42, 'city', 'Please fill city name', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(45, 'country', 'Select Country', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(46, 'mobileExist', 'Mobile already exist.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(47, 'correctReferralCode', 'Please enter Correct Referral Code.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(48, 'passVerifyCode', 'Please enter Verification Code.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(49, 'passotp', 'Please enter OTP.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(50, 'userVerifySuccess', 'User Verify Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(51, 'codeNotMatch', 'Code not match, please enter Correct Code.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(52, 'tokenExpire', 'token expired, Please login.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(57, 'verifyAccount', 'Please verify Account.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(60, 'codeVerifySuccess', 'Code Verify Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(61, 'codeSendSuccess', 'Verification Code send Successfully. Please check.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(62, 'somethingWrong', 'something went wrong!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(63, 'loginFirst', 'Please login first!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(64, 'passNick', 'Please enter Nick Name.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(65, 'emailSendSuccess', 'Email send Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(71, 'countryListSuccess', 'Country list successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(72, 'countryNotFound', 'Country not found', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(73, 'passGender', 'Please Select your gender.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(74, 'passDob', 'Please enter Date of birth .', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(75, 'passIDtype', 'Select ID Type', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(76, 'passAmount', 'Please enter Amount.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(77, 'passPageKey', 'Please enter Page Key.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(78, 'recListSuc', 'Record List Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(79, 'passFriendID', 'Please pass Friend User ID.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(80, 'alreadyFriend', 'Already friend.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(81, 'passKeyword', 'Please enter keyword.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(82, 'selectPlatform', 'Please select Platform.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(83, 'selectGame', 'Please select Game.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(84, 'passBetID', 'Please pass Bet ID.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(85, 'resultExist', 'Result already Declare.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(86, 'recordExist', 'Record Already Exist.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(87, 'betComplete', 'The bet already Completed.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(88, 'betAccept', 'The bet already Accepted.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(89, 'passResult', 'Please select Result.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(90, 'passReqField', 'Please enter required fields.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(91, 'lowBalance', 'You have insufficient balance, kindly recharge account.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(92, 'makePay', 'Payment done Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(93, 'Credited', 'Amount Credited successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(94, 'Debited', 'Amount Debited successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(95, 'emailNotSend', 'mail sending fail.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(96, 'pwdNotChange', 'Password not Change.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(97, 'otpVerifySuccess', 'OTP Verify Successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(98, 'passScheduleDate', 'Please Select Schedule Date.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(99, 'passScheduleTime', 'Please Select Schedule Time.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(100, 'passAddress', 'Please enter address.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(101, 'appBookSuc', 'Appointment booked Successfully', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(102, 'passOrderID', 'Please pass Order ID.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(103, 'passOrderSum', 'Please enter Order Summary.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(104, 'passRating', 'Please select rating.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(105, 'reviewSaveSuc', 'Review saved Successfully', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(106, 'passComment', 'Please enter comments.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(107, 'passSubject', 'Please enter Subject.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(109, 'passEmployeeID', 'Please pass employee ID.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(110, 'passStatus', 'Please pass status.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(111, 'pinTransferSuccess', 'Pin Transfer successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(112, 'fundTransSuccess', 'fund transfer successfully.', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34'),
(113, 'requestSuc', 'Withdraw request send Successfully!', NULL, 1, 0, '2022-09-02 11:46:34', '2022-09-02 11:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotifications`
--

DROP TABLE IF EXISTS `tblnotifications`;
CREATE TABLE IF NOT EXISTS `tblnotifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `user_roles` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `other_id` int(11) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblpermissions`
--

DROP TABLE IF EXISTS `tblpermissions`;
CREATE TABLE IF NOT EXISTS `tblpermissions` (
  `permissionid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`permissionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

DROP TABLE IF EXISTS `tblsetting`;
CREATE TABLE IF NOT EXISTS `tblsetting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(250) DEFAULT NULL,
  `site_logo` varchar(250) DEFAULT NULL,
  `favicon` varchar(250) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wa_number` varchar(20) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `from_email` text,
  `sendmail_type` int(11) NOT NULL DEFAULT '1' COMMENT '1=>Send mail, 2=>SMTP',
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_username` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `smtp_secure` varchar(10) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`setting_id`, `site_name`, `site_logo`, `favicon`, `header`, `footer`, `email`, `wa_number`, `fb_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `phone`, `address`, `from_email`, `sendmail_type`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_secure`, `smtp_port`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'Demo Panel', 'tray_img3480056491708150223.png', 'tray_img6440289911708150223.png', 'Event', 'Footer', 'info@demopanel.com', ' 1234567890', 'https://www.facebook.com', 'https://twitter.com', 'https://www.linkedin.com', 'https://www.instagram.com', 'https://youtube.com', NULL, 'Address', 'info@demopanel.com', 2, 'host', 'username', '123456', 'SSL', '436', 1, 0, '2019-07-12 00:30:28', '2024-02-17 07:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblstates`
--

DROP TABLE IF EXISTS `tblstates`;
CREATE TABLE IF NOT EXISTS `tblstates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` text,
  `pincode` varchar(50) DEFAULT NULL,
  `picture` text,
  `password` varchar(255) DEFAULT NULL,
  `visible_pass` varchar(255) DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT '3',
  `otp` varchar(10) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `reset_slug` varchar(255) DEFAULT NULL,
  `device_type` tinyint(2) DEFAULT NULL COMMENT '1=>Android, 2=>IOS',
  `device_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `name`, `last_name`, `email`, `mobile`, `gender`, `dob`, `address`, `pincode`, `picture`, `password`, `visible_pass`, `user_role`, `otp`, `country_id`, `city`, `access_token`, `reset_slug`, `device_type`, `device_token`, `is_active`, `is_delete`, `created_time`, `updated_time`, `last_login`) VALUES
(1, 'admin', 'Admin', NULL, 'admin@admin.com', '1234567890', 'Male', NULL, 'Address', NULL, '', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-13 13:16:55', '2022-12-01 23:35:23', '2024-02-17 07:10:38'),
(32, NULL, 'mark', 'user', 'markuser@gmail.com', '+911234567890', NULL, '', '', '', 'default.png', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 0, '2023-05-19 07:33:23', '2023-05-19 07:41:12', '2024-01-04 09:47:51'),
(33, NULL, 'davi', 'user', 'david@mail.com', '+911234567890', NULL, NULL, NULL, NULL, 'default.png', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-05-19 07:40:15', '2023-05-19 07:40:15', '2023-05-19 07:40:15'),
(27, NULL, 'client', 'test', 'client@gmail.com', '9998993630', NULL, '', '', '', 'default.png', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 0, '2023-01-02 09:35:48', '2024-01-29 10:32:43', '2024-02-02 13:35:51'),
(28, NULL, 'test', 'user', 'test@gmail.com', '7819912184', NULL, '', '', '', 'default.png', 'e10adc3949ba59abbe56e057f20f883e', NULL, 2, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 0, '2023-01-02 09:39:43', '2023-01-02 09:39:43', '2024-01-29 10:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_permissions`
--

DROP TABLE IF EXISTS `tbluser_permissions`;
CREATE TABLE IF NOT EXISTS `tbluser_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `can_view` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `can_edit` tinyint(2) NOT NULL DEFAULT '0',
  `can_create` tinyint(2) NOT NULL DEFAULT '0',
  `can_delete` tinyint(2) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_role`
--

DROP TABLE IF EXISTS `tbluser_role`;
CREATE TABLE IF NOT EXISTS `tbluser_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `role_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>Frontend, 1=>Backend',
  `is_admin` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser_role`
--

INSERT INTO `tbluser_role` (`id`, `name`, `role_type`, `is_admin`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1, 'Admin', 1, 1, 1, 0, '2024-02-17 12:27:56', '2024-02-17 12:27:56'),
(2, 'Employee', 0, 0, 1, 0, '2024-02-17 12:27:56', '2024-02-17 12:27:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
