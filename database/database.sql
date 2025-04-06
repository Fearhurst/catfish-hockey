-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 06, 2025 at 04:27 AM
-- Server version: 5.7.44
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `catfish_hockey`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(10) UNSIGNED NOT NULL,
  `game_time` datetime NOT NULL,
  `game_opponent` varchar(100) DEFAULT NULL,
  `game_location` varchar(100) DEFAULT NULL,
  `game_home` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `game_beer_player_id` int(10) UNSIGNED DEFAULT NULL,
  `catfish_score` tinyint(3) UNSIGNED NOT NULL,
  `opponent_score` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_time`, `game_opponent`, `game_location`, `game_home`, `game_beer_player_id`, `catfish_score`, `opponent_score`) VALUES
(1, '2025-03-18 22:30:00', 'Healthy Scratches', 'Ford PC 2', 1, 1, 6, 5),
(2, '2025-04-01 22:15:00', 'Penguins', 'Rinx 3', 0, NULL, 0, 3),
(3, '2025-04-08 19:30:00', 'Cerebral Czars', 'Rinx 2', 0, 4, 0, 0),
(4, '2025-04-15 21:30:00', 'Winner G8', 'Rinx 2', 1, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `player_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `player_firstname` varchar(50) NOT NULL,
  `player_lastname` varchar(100) NOT NULL,
  `player_position` varchar(3) DEFAULT NULL,
  `player_number` tinyint(3) UNSIGNED NOT NULL,
  `player_nickname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `user_id`, `player_firstname`, `player_lastname`, `player_position`, `player_number`, `player_nickname`) VALUES
(1, 1, 'Chris', 'Fairhurst', 'RW', 5, NULL),
(2, 3, 'Mitch', 'Marner', 'FWD', 16, NULL),
(3, 4, 'Auston', 'Matthews', 'C', 34, NULL),
(4, 5, 'John', 'Tavares', 'C', 91, NULL),
(5, 6, 'Max', 'Domi', 'LW', 11, NULL),
(6, 7, 'Willy', 'Nylander', 'RW', 88, NULL),
(7, 8, 'Joseph', 'Woll', 'G', 60, NULL),
(8, 9, 'Morgan', 'Rielly', 'D', 44, NULL),
(9, 10, 'Jake', 'McCabe', 'D', 22, NULL),
(10, 11, 'Matthew', 'Knies', 'FWD', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player_game`
--

CREATE TABLE `player_game` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `attendance` enum('in','out') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_game`
--

INSERT INTO `player_game` (`id`, `player_id`, `game_id`, `attendance`) VALUES
(1, 2, 3, 'in'),
(2, 1, 3, 'in'),
(3, 9, 3, 'out'),
(4, 3, 3, 'in'),
(5, 4, 3, 'in'),
(6, 7, 3, 'in'),
(7, 10, 3, 'in'),
(8, 1, 4, 'in'),
(9, 5, 4, 'in'),
(10, 10, 4, 'out'),
(11, 2, 4, 'out'),
(12, 9, 4, 'in'),
(14, 5, 3, 'in');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'cfairhurst@gmail.com', '$2y$10$SM9oo3tm0..DURRRvadNi.IwkV0f.5LJUbrO6NBaSfZXXEiOlPtmC', NULL, 0, 1, 1, 1, 1741552966, 1743905190, 5),
(3, 'cf@wmkr.ca', '$2y$10$Di0qA94544SaFtEsBMIqnOKatBMM6MbIvHNu94nBzfhgIWL/9cHV2', NULL, 0, 1, 1, 0, 1743744147, 1743744286, 0),
(4, 'cfairhurst+1@gmail.com', '$2y$10$XxTs4ZNVAIaU2bkV8kHzoOM4COGaaEbhsR.gTglFqYjz8f8mgwDfy', NULL, 0, 1, 1, 0, 1743819870, NULL, 0),
(5, 'cfairhurst+2@gmail.com', '$2y$10$1Oux7qtb6pI2sR2d3FghP.bUXZZ4SY/btmAVw6FU68X7NNy5jn39.', NULL, 0, 1, 1, 0, 1743819915, NULL, 0),
(6, 'cfairhurst+3@gmail.com', '$2y$10$Z1wAkvjbRo.YmLYbWnlMZuoUHPAYxyxPAoaRqTRSFUtL/8TZjLHSC', NULL, 0, 1, 1, 0, 1743820012, 1743904666, 0),
(7, 'cfairhurst+4@gmail.com', '$2y$10$qd9FBK8M7I3MnXhzaThaAO9GjEwFnUVbyjwha9EKqtbDTKQBI.7Ha', NULL, 0, 1, 1, 0, 1743820043, NULL, 0),
(8, 'cfairhurst+5@gmail.com', '$2y$10$0igNeE6Yk61AW0sb/SJH1OO9yWoOKTZqnPquhskShXiPypns1Ar1u', NULL, 0, 1, 1, 0, 1743821514, NULL, 0),
(9, 'cfairhurst+6@gmail.com', '$2y$10$OmUkxQwXFX4WP3NBlN5O5.Gh8sNrNPNq3Mgai8NeSZLInYskjBpQq', NULL, 0, 1, 1, 0, 1743821605, NULL, 0),
(10, 'cfairhurst+7@gmail.com', '$2y$10$TrjpFnkYKxO8hhfwDj7.BOG.6QoCi6bCkx4VzCvd8Zq3FEpIKVkau', NULL, 0, 1, 1, 0, 1743821641, 1743901046, 0),
(11, 'cfairhurst+8@gmail.com', '$2y$10$gIsZYymqHKaGJ.CqXmtJM.B5FiS2o/ohJ358gVBhzR7lWPxuOGEVa', NULL, 0, 1, 1, 0, 1743821682, 1743825822, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_2fa`
--

CREATE TABLE `users_2fa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mechanism` tinyint(2) UNSIGNED NOT NULL,
  `seed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_otps`
--

CREATE TABLE `users_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mechanism` tinyint(2) UNSIGNED NOT NULL,
  `single_factor` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_remembered`
--

INSERT INTO `users_remembered` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(34, 1, 'PmSouluofWPqlBCJurQJkcFu', '$2y$10$IEvJ.nrb9Nq/b3.FCpOCleWZ9JbApfS69uDS6Uhp6b4r16gNwU2xC', 1775296830),
(32, 1, 'U6Q0sqEzrdHjepxgiK9ClANb', '$2y$10$gdRm4snIoFEgqq8dz71PI.SzXftCROP6AcjguJJI8WfnUEwK7nnZi', 1775296726),
(33, 1, 'e7wOWnngnsO6_HCpH5lD88CS', '$2y$10$c1OTY0p9ppLGKl4DNBQUp.MwwVKPULwksQJZeAk3c1NEas.MMRrMK', 1775296813),
(29, 1, '_smP_ak6g_aT2WWJblUVGN3v', '$2y$10$fkZT3ZYwWBjo2ulBJEHVVOrm8XW0Hl5KJ2rFTYyCH4PxleJibPV56', 1775296368),
(27, 1, '2CT6j2JyplsLXDqYKNCdgEVE', '$2y$10$zwo0tzk4GYCF0OLgbmKNaeeQrXN5SO9JxRduZ3Z7IJHE3l0FqsaDW', 1775296326),
(25, 1, 'vkItGi6dASC6BKmdDfJ82v01', '$2y$10$QYHgArd4o3jTC1GpzSWV.esPXG1Zcr8Rm9BwMn.YeTnw96fzYb8m2', 1774175013),
(28, 1, 'iuGi84g5asCGk34pPpJHvRB6', '$2y$10$ZdALw6S.l4BOTe/FKJceuOq/8CaQPSXRXKiin7zGUXBx0Y/tKH3Ie', 1775296344),
(35, 1, '2Ip92Cp3XTitnhpS4rRB3YjN', '$2y$10$Ny4xOPe6B19.Cf3QIzjjA.l9p.BfRj3C1MqsorV9ICKyZcIrmDYIC', 1775296846),
(36, 1, 'J4LSgo6LnMVPnmZsnaUA7jiH', '$2y$10$A8oKPjw8t3/XrZd2KAPiWeOve36wLb7T47yKfgHilGWl4CYPKg9K.', 1775296929),
(44, 1, 'JYo2JCeRajFPbkR_SphezsnK', '$2y$10$RzcbmoTMBKDgYy/n4TurVeofRMR0HqUSsl7e9zm9WuKZaP2aB.Iri', 1775302017),
(52, 1, 'uzXx3b5jfvmVOXJI5plzpp7i', '$2y$10$IeoNfumMg5OafCVPZodal.xFATPjO8944ZkfpbhieLXZzSEMX1TTy', 1775462790),
(46, 10, 'rugUepERHWu2rCIlNAkulBlG', '$2y$10$Tkl5MQbNP0So8oGDIyGyj.pJSZ8A2m1KE/nmn6SCEZt2bO3JsnA5W', 1775380992),
(50, 1, 'RJ2EhYAuLD6inbKKK0j7muBt', '$2y$10$w318M622EYE2X5aJ2Nh8q.jKQLppB0DhuAHJUV2Ac.d/Wvvsw4aK2', 1775458716);

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_resets`
--

INSERT INTO `users_resets` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(1, 1, 'tcsUVHAgqf-SzH2vd4rZ', '$2y$10$xM8dGJfRR1G4G3Ayeyju3O0eX.uGFmGo40zbmKtlduBXBgot0Hjhu', 1742453877),
(2, 1, 'BW3mjLQlVzhGDLCS6oxi', '$2y$10$WIaArpbbkAIoVD3ZUq6XEOjeUo9ypDt3hp9Qy6/za6GWpeddEyXTm', 1742453910),
(3, 1, 't4RwAlyF3iMv9W1uxZXC', '$2y$10$UmcE/LhlzvlRGMceFhcFh.pzT09vqB4rY6CwPX8WEvpPUWYYOVvpW', 1742455266),
(4, 1, '7wkx1GOJKdktfXXsFCon', '$2y$10$hVgbFaMBa4VIlR.gQCTimerLpTiP9UkrUZU9ESKJzkNKX8c0C5Ova', 1742455312),
(5, 1, 'dAjFxIafyd2nbZ9QbGyx', '$2y$10$bFoFLXq/rnE7n1Y5okFVsOBkzhm.a7VujBdISXPvI3vTj97.s36HW', 1742455361),
(6, 1, 'mq2hndtoD71HlkvFk_EF', '$2y$10$OnvnQaXzTtND8xBFvzEe9.Y2qNGRQJu2KiQOAEeN2ahaOLd.srPkG', 1742455454),
(7, 1, 'SifW17ai7QvopyCgDjfM', '$2y$10$PFzEKd6JmwT/CIOCM2inI.RkN3CyxtwNFbvK8G2X/8APWoVl0rddW', 1742455606),
(8, 1, 'l_uqETCvN2knDBN_qtW8', '$2y$10$djEYjh3hB4gnGnXrsDyx5uJEmJMJuNtzv4eJS5tzgTHcHzA8n7o3G', 1742455620),
(9, 1, 'IuOyhd22pc1YsQlJg5aU', '$2y$10$6zzqfoAA6fFDVIp9DbF2u.Lp0zvmlvh/I.vsSUIHVP29a.lSiGMhK', 1742456811),
(10, 1, 'kjxR1e4O-lFXDd65WUKM', '$2y$10$PZDCGsG.EGzk9Fo5LkDJ4uKlt2UwcIxxxxsTKdaq6O5adcnyQJq7e', 1742460278),
(11, 1, 'cI-mSSBTjXV-lW4hjThE', '$2y$10$4VAMcrqWRxGCytXg9qlvkeKt.9yaxIi/bjBDpxckuwsoPbKoPMbgK', 1742460374),
(12, 1, 'dFdBpmeznaFaNNJSZuZ3', '$2y$10$BBlGONCe1XKbnX/BrLySPOhUrW1nlSaiOQd5/OarZfdyHitYiCvXu', 1742460461),
(13, 1, 'c9eOrxDwtetPRd231XD4', '$2y$10$VWfKdKA2IgIlH.IhlK2zaef5NfnnVevtuq27GUwUw6Bxtq73Qf9fC', 1742460555),
(14, 1, 'PH-u7fdgMdC-aKjTnwzx', '$2y$10$ew90EWKGlFS3Ey58ckmkvenP9whjH43/5ugAH8H1kgc9EtZTxwtsS', 1742460674),
(15, 1, 'cyTwUazVmLH8PC8P5F27', '$2y$10$cOdBB.MpswjBrGFcSgGmL.wF33aR3t9Oeqsf2bbLroa3k3rZvI8Fm', 1742460933),
(16, 1, '5lyDKYCesU1nv6VNbQe_', '$2y$10$rjlRd3jnsLjQ.T.NCj7E5.q1nOj8WWtyAYp/TLTHh2xxiYU9.6EbS', 1742461207),
(17, 1, 'aRV4OjeI2Qe_faFma9St', '$2y$10$gbMSGYWEu0wd.r19dqDZO.vOYdO6AxrgrWFzLqVHiSgrrXY58wV3.', 1742461288),
(18, 1, 'Q6DdGM-3dSKOO4I8M_5E', '$2y$10$L7afIVVoixBRWoJIwWnz4OEzrLnG04q988EJsfLJA9dwYC3xiYIvC', 1742461442),
(19, 1, 'fisMTyVImdERIjN_2Joy', '$2y$10$uJ3UWTTYi8vfdt2niSNe9u95kZJWWozLV4n3ti48K2A5RFL2c2Jq6', 1742461562),
(20, 1, 'geUCtTSEgYrrJfmCfCjr', '$2y$10$rJ29jZvm.0swyfftDGQSQeMi6M.I3HhsRXEjHyIP8Ybbr6ZdPa58q', 1742461575),
(21, 1, 'pO4SRzxCgBLp-O6x2oX1', '$2y$10$doOS4x/aM/HdlcaQDsb3HO0KWrIrjTaTJeu7qEHtjFQCXQL11x8OO', 1742461799),
(22, 1, 'MZlNoQRy9J3Y7JFrvYG1', '$2y$10$mJqZSs2Ir.v6hVjoBcqQTO7F244tNTzXtf7XiwxC03WAsC1rShOga', 1742461810),
(23, 1, 'm8sTmk2m5pKYpcmGNEzK', '$2y$10$OMm/UP64fuugvWTFzfRn4udCX4ExZ6YeF.ocJNwgIb66izavFPYRK', 1742461829),
(24, 1, 'BnBZ_O4LXb9YDZ97X2EK', '$2y$10$FrhkP8Zbi1TSpfHJL7Y6fOEsOBufigvpKKqzx4k4w5eLcs3FgthuS', 1742461843),
(25, 1, 'WdvX7sL-VszP0dH8SBTE', '$2y$10$RSO.pyPn2EI7MixeZRI/Aut2gdItZe5D7PJ/9mIoi7UgomUYWkSqi', 1742463911),
(26, 1, 'd5LKSqBnfO3OB492HqRp', '$2y$10$9QfFQsCvNyXGHy4brZ0hLOumJswXXU5vivuBuBSgUThGy2HED9N0W', 1742463952),
(27, 1, '1FGMU58954idSh61Fg3V', '$2y$10$VrQY0jlXKvenXyis6hLn0euFcbSdP8BV4L57kSUFpNMFvvP4VHx6y', 1742464238),
(28, 1, 'v7Tg9D3wvuoxpgidmtSH', '$2y$10$QTYeXJCTKf6Gc7Ra5UFXQ.xyGimWxBZbBzwbaMhls5nY202XwUBri', 1742464284),
(31, 1, 'Ueh9evoT99Y8LdbxtpUp', '$2y$10$hqAX4A1vLagVC.c/38lUt.kcZVzgOjOS2UbOQKwjUkJRh/yfJstrK', 1742465601),
(32, 1, 'ZXzMXR3u5hXT2haPji8Y', '$2y$10$vNOTifvrJLJ6ONWGpa/AE.4NI4PWByuoclap1bSJDiUwcDCqU99YG', 1742465606),
(33, 1, 'LT1OBDDaUy_niGGLRb2a', '$2y$10$P73YwA5X.3OCd6hMdBy6NuCZOKarKQGArfQMOJqgzZi6aTboBcweu', 1742465645),
(34, 1, 'wlVCYqhnOeHmynEK2axq', '$2y$10$QF/eAyQP.k8hBP3Ypo1iLOJSxlmxoPGqHmIw.SKHoMDMYmYllfFAW', 1742465680),
(35, 1, 'ejO3vQnqzF64uEjHK7mf', '$2y$10$0CJuRboUQgf/KHGRul1HM.7XBYzyKqPNfpaFSPYCe56lqTtwKAUnS', 1742465698),
(36, 1, '5kBckW32BlyWJe8D41Kp', '$2y$10$ZMJEjsyn0.zJNWWJNSvVV.Hvgq33pU/WUMCdmTPpdTx5oIfdQ8OTu', 1742465727),
(37, 1, 'fEn9MJRQln6vjRmVquxs', '$2y$10$m7Je9703NisAg4khN/4cv.S31F3cabkeUDs3ttTXu1Fa16g/n92Ta', 1742468231),
(38, 1, 'ORLsWkEt-pwhsX2ECWbp', '$2y$10$CnW/.gph6mzHB0UrZ7CMh.XrW.tS0ulWUSYiwI1KpH4YLHTPG1IEW', 1742468323),
(39, 1, 'tebNTVbYrkNQObGkR2yi', '$2y$10$CeOmj5nLUbEomkZ5zPE87.qwteBQgyOuK7dXvTdf1CwLbx43nwbUC', 1742468399),
(40, 1, 'mANH0dT2pPmvhOY_kg7B', '$2y$10$hdHReQeOB.YufQ02/7jpVe8zCcCAEviIP8wOdNBB.Z79LnkG0LbpS', 1742468457),
(41, 1, '1zynjAUjEfYRZIfVTTut', '$2y$10$CVDbldg1L6/4yd8.yD0T.ec7KLM/s7oT6KwdJ5jcC5AlBwzn1ihtG', 1742468534);

-- --------------------------------------------------------

--
-- Table structure for table `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk', 66.4767, 1742433353, 1742973353),
('CUeQSH1MUnRpuE3Wqv_fI3nADvMpK_cg6VpYK37vgIw', 4, 1741552966, 1741984966),
('Jjl8HEbTSJpZBWoyXOajJXqciuUdngUbah061jwhliE', 19, 1741553134, 1741589134),
('aIAy-OK3K2AGwC-58Jxr8f4z7JJGD7KQmwDBoORNQdA', 499, 1741553134, 1741725934),
('kEbykVeYjXzlwRMRyViUTXh8oub9hQ3h6OrrDXV-IeY', 74, 1741670625, 1742210625),
('rLATZfaJDZw7SVWxt-1hI19daCVBXEsE61dIUH_QEy4', 6.00022, 1742432310, 1744851510),
('ch_sJnjaY4eRJE6khGJMTmd4i_cvc21dFkdNj1I1G2I', 6.00022, 1742432310, 1744851510);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `player_game`
--
ALTER TABLE `player_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_2fa`
--
ALTER TABLE `users_2fa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_mechanism` (`user_id`,`mechanism`);

--
-- Indexes for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_otps`
--
ALTER TABLE `users_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_mechanism` (`user_id`,`mechanism`),
  ADD KEY `selector_user_id` (`selector`,`user_id`);

--
-- Indexes for table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indexes for table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `player_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `player_game`
--
ALTER TABLE `player_game`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_2fa`
--
ALTER TABLE `users_2fa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_otps`
--
ALTER TABLE `users_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;
