-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 02:38 PM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo_mvc`
--
CREATE DATABASE IF NOT EXISTS `todo_mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `todo_mvc`;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_03_29_072231_create_todo_lists_table', 1),
('2018_03_29_072240_create_todo_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `todo_items`
--

CREATE TABLE IF NOT EXISTS `todo_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_todo_list` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todo_items_id_todo_list_foreign` (`id_todo_list`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `todo_items`
--

INSERT INTO `todo_items` (`id`, `content`, `id_todo_list`, `created_at`, `updated_at`) VALUES
(1, 'Test item 1-latest', 1, '2018-03-30 04:56:49', '2018-04-03 05:19:35'),
(2, 'Test item of todo 2', 4, '2018-03-30 04:57:29', '2018-03-30 04:57:29'),
(3, 'test item 2', 1, '2018-04-02 03:44:36', '2018-04-02 03:44:36'),
(4, 'test item 3', 1, '2018-04-02 03:44:57', '2018-04-02 03:44:57'),
(5, 'test item 4', 1, '2018-04-02 03:45:03', '2018-04-02 03:45:03'),
(7, 'test item 6', 1, '2018-04-02 03:45:15', '2018-04-03 03:06:20'),
(9, 'Test item 1', 5, '2018-04-02 04:11:05', '2018-04-02 04:11:05'),
(12, 'test item 7', 1, '2018-04-03 04:13:22', '2018-04-03 04:13:22'),
(13, 'test item 8', 1, '2018-04-03 04:13:29', '2018-04-03 04:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `todo_lists`
--

CREATE TABLE IF NOT EXISTS `todo_lists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `todo_lists_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Test to-do list 1-new again', 1, '2018-03-29 04:37:58', '2018-04-03 02:20:20'),
(4, 'Test to-do list 2', 0, '2018-03-29 04:41:27', '2018-03-29 04:41:27'),
(5, 'Test to-do list 3-new', 1, '2018-03-29 04:43:20', '2018-03-29 05:51:14'),
(6, 'Test to-do list 4', 0, '2018-03-30 00:44:25', '2018-03-30 00:44:25'),
(7, 'Test to-do list 5', 1, '2018-03-30 00:44:33', '2018-03-30 00:44:33'),
(8, 'Test to-do list 6', 0, '2018-03-30 00:44:40', '2018-03-30 03:42:34'),
(9, 'Test to-do list 7-new', 0, '2018-03-30 00:44:47', '2018-03-30 03:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'richard@gmail.com', '$2y$10$Qx1jnGGzpqSOhp7kAxOr2udYcd7ibKOh6GazZMQWsXoPFHLsrHLl2', 'DP43eLnn92kXap4JLIq8h8naARlGpttsliByhF6L7tWvnoUVlVfnvuuggBPA', '2018-03-29 01:07:21', '2018-04-03 05:34:35'),
(2, 'mark@gmail.com', '$2y$10$E3pHGMhCOpT1NMJC4uzGc.L.uZOxd8zm2mFBguqlmK4frxxz09uX.', '2RzipdPFDmEtOaj7JNxRjtSGfoSiQquXVeGQNRetfjyVQBjNfOQJ3CTEd0gN', '2018-04-02 03:43:49', '2018-04-02 03:44:12');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_items`
--
ALTER TABLE `todo_items`
  ADD CONSTRAINT `todo_items_id_todo_list_foreign` FOREIGN KEY (`id_todo_list`) REFERENCES `todo_lists` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
