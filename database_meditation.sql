-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 12:49 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `client_meditation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` text CHARACTER SET macce COLLATE macce_bin NOT NULL,
  `status` enum('ENABLE','DISABLE') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_username`, `admin_password`, `status`, `created_date`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ENABLE', '2019-10-22 14:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `api_list`
--

CREATE TABLE `api_list` (
  `api_id` int(10) UNSIGNED NOT NULL,
  `api_name` text NOT NULL,
  `api_link` text NOT NULL,
  `api_type` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_list`
--

INSERT INTO `api_list` (`api_id`, `api_name`, `api_link`, `api_type`, `created_date`) VALUES
(1, 'Register ', 'API/register', 'POST', '2019-08-06 05:05:38'),
(2, 'Login', 'API/login', 'POST', '2019-08-06 05:05:38'),
(4, 'Home Component List', 'API/getCategory', 'POST', '2019-08-06 05:05:38'),
(5, 'Home', 'API/home', 'POST', '2019-08-06 05:05:38'),
(6, 'View Single Music Screen', 'API/playMusic', 'POST', '2019-08-06 05:05:38'),
(10, 'Like', 'API/like', 'POST', '2019-08-06 05:05:38'),
(11, 'Unlike', 'API/unlike', 'POST', '2019-08-06 05:05:38'),
(12, 'Create new playlist ', 'API/createPlayList', 'POST', '2019-08-06 05:05:38'),
(13, 'Add In Playlist', 'API/addInPlaylist', 'POST', '2019-08-06 05:05:38'),
(14, 'Remove From Playlist', 'API/removeFromPlaylist', 'POST', '2019-08-06 05:05:38'),
(15, 'Get User\'s Playlists ', 'API/getPlaylists', 'POST', '2019-08-06 05:05:38'),
(16, 'Get user playlist\'s music', 'API/getPlaylistMusic', 'POST', '2019-08-06 05:05:38'),
(17, 'Delete Playlist', 'API/deletePlayList', 'POST', '2019-08-06 05:05:38'),
(18, 'Get All Categories', 'API/getAllCategories', 'POST', '2019-08-06 05:05:38'),
(19, 'Get music by category', 'API/getCategoryMusic', 'POST', '2019-08-06 05:05:38'),
(21, 'Search', 'API/search', 'POST', '2019-08-06 05:05:38'),
(22, 'Get All Musics', 'API/getAllMusics', 'POST', '2019-08-06 05:05:38'),
(30, 'Edit Profile', 'API/ediProfile', 'POST', '2019-08-06 05:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `api_list_parameters`
--

CREATE TABLE `api_list_parameters` (
  `api_list_parameters_id` int(11) NOT NULL,
  `api_list_id` int(11) NOT NULL,
  `api_list_parameters_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_list_parameters`
--

INSERT INTO `api_list_parameters` (`api_list_parameters_id`, `api_list_id`, `api_list_parameters_name`) VALUES
(1, 1, 'user_email'),
(2, 1, 'user_password'),
(3, 1, 'user_token'),
(4, 1, 'user_profile_pic'),
(5, 2, 'user_email'),
(6, 2, 'user_password'),
(7, 2, 'user_token  '),
(8, 5, 'home_components_name'),
(9, 5, 'user_id'),
(10, 5, 'is_myProfile'),
(11, 5, 'start (optional)'),
(12, 5, 'end (optional)'),
(13, 6, 'music_id'),
(14, 6, 'user_id'),
(15, 7, 'user_id'),
(16, 7, 'artist_id'),
(17, 8, 'movie_id'),
(18, 8, 'user_id'),
(19, 9, 'album_id'),
(20, 9, 'user_id'),
(21, 10, 'user_id'),
(22, 10, 'like_type'),
(23, 10, 'like_type_id'),
(24, 11, 'user_id'),
(25, 11, 'like_type'),
(26, 11, 'like_type_id'),
(27, 12, 'user_id'),
(28, 12, 'user_playlist_name'),
(29, 13, 'user_id'),
(30, 13, 'user_playlist_id'),
(31, 13, 'music_id'),
(32, 14, 'user_id'),
(33, 14, 'music_id'),
(34, 15, 'user_id'),
(35, 16, 'user_id'),
(36, 16, 'user_playlist_id'),
(37, 17, 'user_id'),
(38, 17, 'user_playlist_id'),
(39, 18, 'user_id'),
(40, 19, 'user_id'),
(41, 19, 'category_id'),
(42, 21, 'search'),
(43, 22, 'user_id'),
(44, 22, 'start'),
(45, 22, 'end'),
(46, 23, 'user_id'),
(47, 23, 'start'),
(48, 23, 'end'),
(49, 24, 'user_id'),
(50, 24, 'start'),
(51, 24, 'end'),
(52, 25, 'user_id'),
(53, 25, 'start'),
(54, 25, 'end'),
(55, 27, 'user_id'),
(56, 27, 'package_id'),
(57, 27, 'total_package_price'),
(58, 28, 'user_id'),
(59, 29, 'user_id'),
(60, 30, 'user_id'),
(61, 30, 'user_name'),
(62, 30, 'user_profile_pic');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_icon` varchar(255) DEFAULT NULL,
  `category_order` int(11) NOT NULL,
  `category_banner` varchar(255) DEFAULT NULL,
  `category_banner_text` text DEFAULT NULL,
  `category_is_in_slider` enum('ENABLE','DISABLE') NOT NULL DEFAULT 'DISABLE',
  `category_banner_order` int(11) NOT NULL,
  `category_status` enum('ENABLE','DISABLE') NOT NULL DEFAULT 'ENABLE',
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_icon`, `category_order`, `category_banner`, `category_banner_text`, `category_is_in_slider`, `category_banner_order`, `category_status`, `created_date`) VALUES
(2, 'Relax', 'relax.png', 2, 'relax_banner.jpg', 'It\'s Time TO Relax', 'ENABLE', 2, 'ENABLE', '2019-09-24 00:04:31'),
(3, 'Nature', 'nature.png', 3, 'nature_banner.jpg', 'Closer to nature', 'ENABLE', 3, 'ENABLE', '2019-09-24 00:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `home_components`
--

CREATE TABLE `home_components` (
  `home_components_id` int(11) NOT NULL,
  `home_components_name` varchar(100) NOT NULL,
  `home_components_description` text NOT NULL,
  `home_components_item_display_count` int(10) DEFAULT 1,
  `home_components_order` int(10) NOT NULL,
  `home_components_status` enum('ENABLE','DISABLE') NOT NULL DEFAULT 'ENABLE',
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_components`
--

INSERT INTO `home_components` (`home_components_id`, `home_components_name`, `home_components_description`, `home_components_item_display_count`, `home_components_order`, `home_components_status`, `created_date`) VALUES
(1, 'Banner Slider', 'This banner slider would be displayed on top of home page.', 4, 1, 'ENABLE', '2019-09-22 23:34:14'),
(6, 'Sleep Stories', 'Sleep Stories', 6, 6, 'ENABLE', '2019-09-22 23:51:37'),
(3, 'Top Sounds', 'Favourite Musics (most favourite)', 6, 3, 'ENABLE', '2019-09-22 23:53:09'),
(4, 'Popular Sounds', 'Popular Musics (most played)', 6, 4, 'ENABLE', '2019-09-22 23:51:37'),
(5, 'Recently Played', 'Recently Played ', 6, 5, 'ENABLE', '2019-09-22 23:53:09'),
(2, 'Category', 'Categories List', 6, 2, 'ENABLE', '2019-09-22 23:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_type` enum('Music','Comment') COLLATE utf8mb4_bin NOT NULL COMMENT 'music / comment',
  `like_type_id` int(11) NOT NULL COMMENT 'music_id / comment_id',
  `like_date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`like_id`, `user_id`, `like_type`, `like_type_id`, `like_date`, `created_date`) VALUES
(1, 1, 'Music', 1, '2020-07-20', '2020-07-20 03:55:50'),
(2, 2, 'Music', 2, '2020-07-20', '2020-07-20 03:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_id` int(10) UNSIGNED NOT NULL,
  `music_title` text NOT NULL,
  `music_file` varchar(100) NOT NULL,
  `music_image` varchar(100) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `music_size` varchar(50) DEFAULT NULL,
  `music_duration` varchar(10) NOT NULL,
  `music_status` enum('ENABLE','DISABLE') NOT NULL DEFAULT 'ENABLE',
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `music_title`, `music_file`, `music_image`, `category_id`, `music_size`, `music_duration`, `music_status`, `created_date`) VALUES
(1, 'Nature Music 1', 'Nature_Music_1_20200723161228.mp3', 'Nature_Music___20200723041235.jpg', 3, '6.36 MB', '02:46', 'ENABLE', '2020-07-23 16:12:35'),
(2, 'Relax Music 1', 'Relax_Music___20200723160841.mp3', 'Relax_Music___20200723040845.jpg', 2, '6.26 MB', '05:27', 'ENABLE', '2020-07-23 16:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `recently_view`
--

CREATE TABLE `recently_view` (
  `recently_view_id` int(10) UNSIGNED NOT NULL,
  `recently_view_type` enum('Music') NOT NULL DEFAULT 'Music' COMMENT 'Music',
  `recently_view_type_id` int(11) NOT NULL COMMENT 'music_id ',
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recently_view`
--

INSERT INTO `recently_view` (`recently_view_id`, `recently_view_type`, `recently_view_type_id`, `user_id`, `created_date`) VALUES
(1, 'Music', 1, 1, '2019-09-26 16:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `saved_music`
--

CREATE TABLE `saved_music` (
  `saved_music_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_playlist_id` int(10) NOT NULL,
  `saved_date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `onesignal_app_id` text NOT NULL,
  `onesignal_rest_key` text NOT NULL,
  `package_name` varchar(150) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_logo` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_version` varchar(255) NOT NULL,
  `app_description` text NOT NULL,
  `app_developed_by` varchar(255) NOT NULL,
  `app_privacy_policy` text NOT NULL,
  `home_latest_limit` int(2) NOT NULL DEFAULT 10,
  `home_most_viewed_limit` int(2) NOT NULL DEFAULT 10,
  `home_most_rated_limit` int(2) NOT NULL DEFAULT 10,
  `home_limit` int(3) NOT NULL DEFAULT 10,
  `api_latest_limit` int(3) NOT NULL DEFAULT 15,
  `api_cat_order_by` varchar(255) NOT NULL DEFAULT 'category_name',
  `api_cat_post_order_by` varchar(255) NOT NULL DEFAULT 'DESC',
  `publisher_id` text NOT NULL,
  `interstital_ad` varchar(255) NOT NULL,
  `interstital_ad_id` varchar(255) NOT NULL,
  `interstital_ad_click` varchar(255) NOT NULL,
  `banner_ad` varchar(255) NOT NULL,
  `banner_ad_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `onesignal_app_id`, `onesignal_rest_key`, `package_name`, `app_name`, `app_logo`, `app_email`, `app_version`, `app_description`, `app_developed_by`, `app_privacy_policy`, `home_latest_limit`, `home_most_viewed_limit`, `home_most_rated_limit`, `home_limit`, `api_latest_limit`, `api_cat_order_by`, `api_cat_post_order_by`, `publisher_id`, `interstital_ad`, `interstital_ad_id`, `interstital_ad_click`, `banner_ad`, `banner_ad_id`) VALUES
(1, '-', '-', 'com.kmitapp.musicapp', 'Meditation', 'logo.png', '', '', '<p>Write here your App description...</p>\r\n', '', '<p>Write here your App Privacy Policy...</p>\r\n', 5, 5, 5, 5, 5, 'category_name', 'DESC', 'pub-3940256099942544', 'true', 'ca-app-pub-3940256099942544/1033173712', '5', 'true', 'ca-app-pub-3940256099942544~3347511713');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `user_profile_pic` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_profile_pic`, `created_date`) VALUES
(1, 'test', 'test@test.test', 'test', 'user_1_2019-09-23-11-16-39.jpg', '2019-09-19 08:40:52'),
(2, 'test2', 'test2@test.com', '1234', 'user_2_2019-09-23-11-14-47.jpg', '2019-09-24 12:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE `user_playlist` (
  `user_playlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_playlist_name` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_playlist`
--

INSERT INTO `user_playlist` (`user_playlist_id`, `user_id`, `user_playlist_name`, `created_date`) VALUES
(1, 1, 'My Favourite', '2019-10-01 12:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist_music`
--

CREATE TABLE `user_playlist_music` (
  `user_playlist_music_id` int(11) NOT NULL,
  `user_playlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_playlist_music`
--

INSERT INTO `user_playlist_music` (`user_playlist_music_id`, `user_playlist_id`, `user_id`, `music_id`, `created_date`) VALUES
(1, 1, 1, 2, '2019-11-01 16:11:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `api_list`
--
ALTER TABLE `api_list`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `api_list_parameters`
--
ALTER TABLE `api_list_parameters`
  ADD PRIMARY KEY (`api_list_parameters_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `home_components`
--
ALTER TABLE `home_components`
  ADD PRIMARY KEY (`home_components_id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Indexes for table `recently_view`
--
ALTER TABLE `recently_view`
  ADD PRIMARY KEY (`recently_view_id`);

--
-- Indexes for table `saved_music`
--
ALTER TABLE `saved_music`
  ADD PRIMARY KEY (`saved_music_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD PRIMARY KEY (`user_playlist_id`);

--
-- Indexes for table `user_playlist_music`
--
ALTER TABLE `user_playlist_music`
  ADD PRIMARY KEY (`user_playlist_music_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_list`
--
ALTER TABLE `api_list`
  MODIFY `api_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `api_list_parameters`
--
ALTER TABLE `api_list_parameters`
  MODIFY `api_list_parameters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_components`
--
ALTER TABLE `home_components`
  MODIFY `home_components_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `liked`
--
ALTER TABLE `liked`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recently_view`
--
ALTER TABLE `recently_view`
  MODIFY `recently_view_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saved_music`
--
ALTER TABLE `saved_music`
  MODIFY `saved_music_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_playlist`
--
ALTER TABLE `user_playlist`
  MODIFY `user_playlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_playlist_music`
--
ALTER TABLE `user_playlist_music`
  MODIFY `user_playlist_music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
