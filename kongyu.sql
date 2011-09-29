-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 09 月 29 日 17:07
-- 服务器版本: 5.1.41
-- PHP 版本: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kongyu`
--

-- --------------------------------------------------------

--
-- 表的结构 `chn_category`
--

CREATE TABLE IF NOT EXISTS `chn_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(400) NOT NULL,
  `show_order` int(11) NOT NULL,
  `show_flag` enum('0','1') NOT NULL,
  `lan_type` enum('0','1') NOT NULL,
  `category_type` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `chn_category`
--

INSERT INTO `chn_category` (`category_id`, `category_name`, `show_order`, `show_flag`, `lan_type`, `category_type`) VALUES
(2, '企业相册', 0, '1', '1', 0),
(3, '产品相册', 0, '1', '1', 0),
(4, 'company ablum', 0, '1', '1', 0),
(5, 'product ablum', 0, '1', '1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `chn_chncup`
--

CREATE TABLE IF NOT EXISTS `chn_chncup` (
  `chncup_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `lan_type` int(11) NOT NULL,
  PRIMARY KEY (`chncup_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `chn_chncup`
--

INSERT INTO `chn_chncup` (`chncup_id`, `title`, `content`, `lan_type`) VALUES
(1, '关于我们', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925135347_29132.gif" alt="" /><br />', 1),
(2, '设备', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925142635_51934.gif" alt="" /><br />', 1),
(3, '品质', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925144615_36249.gif" alt="" /><br />', 1),
(4, '位置', '位置', 1),
(5, '团队', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925145719_40846.gif" alt="" /><br />', 1),
(6, '信息保护', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925145819_96775.gif" alt="" />', 1),
(7, '社会责任', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925160528_15874.gif" alt="" />', 1),
(8, '人力资源', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925160528_15874.gif" alt="" />', 1),
(9, '联系我们', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929131257_43434.gif" alt="" /><br />', 1),
(10, 'ourcompany', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929160430_61616.gif" alt="" height="364" width="380" /><br />', 2),
(11, 'fac', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929161424_53297.gif" alt="" /><br />', 2),
(12, 'Quality', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929161812_46405.gif" alt="" /><br />', 2),
(13, 'location', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929163233_75080.gif" alt="" /><br />', 2),
(14, 'team', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929162219_88700.gif" alt="" /><br />', 2),
(15, 'IPR', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929164114_10167.gif" alt="" /><br />', 2),
(16, 'CSR', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929164357_40311.gif" alt="" /><br />', 2),
(17, 'Carees', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925160528_15874.gif" alt="" />', 2),
(19, '客户', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929131257_43434.gif" alt="" /><br />', 1),
(18, 'Contact Us', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929131257_43434.gif" alt="" /><br />', 2),
(20, 'ourclient', '<img src="/kongyu/manage/js/editor/attached/image/20110929/20110929131257_43434.gif" alt="" /><br />', 2);

-- --------------------------------------------------------

--
-- 表的结构 `chn_news`
--

CREATE TABLE IF NOT EXISTS `chn_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `team_img` varchar(500) NOT NULL,
  `show_order` int(11) NOT NULL,
  `show_flag` int(11) NOT NULL,
  `focus_flag` int(11) NOT NULL,
  `news_date` int(11) NOT NULL,
  `lan_type` int(11) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- 转存表中的数据 `chn_news`
--

INSERT INTO `chn_news` (`news_id`, `category_id`, `title`, `content`, `team_img`, `show_order`, `show_flag`, `focus_flag`, `news_date`, `lan_type`) VALUES
(1, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(2, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(3, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(4, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(5, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(6, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(7, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(8, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(9, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(10, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(11, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(12, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(13, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(14, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(15, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(16, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(17, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(18, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(19, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(20, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(21, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(22, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(23, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(24, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(25, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(26, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(27, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(28, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(29, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(30, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(31, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(32, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(33, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(34, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(35, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(36, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(37, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(38, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(39, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(40, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(41, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(42, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(43, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(44, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(45, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(46, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(47, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(48, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(49, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(50, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(51, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(52, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(53, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2),
(54, 5, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `chn_users`
--

CREATE TABLE IF NOT EXISTS `chn_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `chn_users`
--

INSERT INTO `chn_users` (`user_id`, `user_name`, `password`, `role`, `state`) VALUES
(1, 'admin', '33284d0f94606de1fd2af172aba15bfc', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
