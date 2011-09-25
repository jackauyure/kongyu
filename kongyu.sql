-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2011 年 09 月 25 日 17:08
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `chn_category`
--

INSERT INTO `chn_category` (`category_id`, `category_name`, `show_order`, `show_flag`, `lan_type`, `category_type`) VALUES
(2, '企业相册', 0, '1', '1', 0),
(3, '产品相册', 0, '1', '1', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
(7, '社会责任', '<img src="/kongyu/manage/js/editor/attached/image/20110925/20110925160528_15874.gif" alt="" />', 1);

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
(1, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(2, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(3, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(4, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(5, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(6, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(7, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(8, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(9, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(10, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(11, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(12, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(13, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(14, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(15, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(16, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(17, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(18, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(19, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(20, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(21, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(22, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(23, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(24, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(25, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(26, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(27, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(28, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(29, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(30, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(31, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(32, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(33, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(34, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(35, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(36, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(37, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(38, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(39, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(40, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(41, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(42, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(43, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(44, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(45, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(46, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(47, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(48, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(49, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(50, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(51, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(52, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(53, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1),
(54, 2, '', '', '201109250444425767.jpg', 100, 1, 0, 0, 1);

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
