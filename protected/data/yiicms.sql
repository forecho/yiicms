-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 11 月 02 日 10:22
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yiicms`
--

-- --------------------------------------------------------

--
-- 表的结构 `fe_posts`
--

CREATE TABLE IF NOT EXISTS `fe_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(10) NOT NULL COMMENT '作者',
  `posts_content` mediumtext NOT NULL,
  `posts_title` varchar(200) NOT NULL,
  `type_id` tinyint(3) NOT NULL,
  `status_id` tinyint(3) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `order_id` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fe_posts`
--

INSERT INTO `fe_posts` (`id`, `author_name`, `posts_content`, `posts_title`, `type_id`, `status_id`, `create_time`, `update_time`, `order_id`) VALUES
(1, 'caicai', '简单易用，快速稳定是又拍给我们的良好体验。随着更多互联网业务的展开，又拍云存储服务将会成为我们业务重要的组成部分。', '又拍云存储', 0, 1, '2012-11-02 00:00:00', '2012-11-02 00:00:00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `fe_user`
--

CREATE TABLE IF NOT EXISTS `fe_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_avatar` varchar(100) NOT NULL COMMENT '用户头像',
  `user_status_id` tinyint(4) NOT NULL COMMENT '用户状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `fe_user`
--

INSERT INTO `fe_user` (`id`, `username`, `email`, `password`, `user_avatar`, `user_status_id`) VALUES
(1, 'admin', '', '5f4dcc3b5aa765d61d8327deb882cf99', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
