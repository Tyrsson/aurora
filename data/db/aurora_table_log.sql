CREATE TABLE IF NOT EXISTS `log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `extra_userId` int(11) DEFAULT NULL,
  `extra_userName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_role` tinytext COLLATE utf8mb4_unicode_ci,
  `extra_privilege` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_firstName` tinytext COLLATE utf8mb4_unicode_ci,
  `extra_lastName` tinytext COLLATE utf8mb4_unicode_ci,
  `extra_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_profileImage` mediumtext COLLATE utf8mb4_unicode_ci,
  `priorityName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_resourceId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_textdomain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeStamp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(1) NOT NULL,
  `extra_referenceId` tinytext COLLATE utf8mb4_unicode_ci,
  `extra_errno` tinytext COLLATE utf8mb4_unicode_ci,
  `extra_file` text COLLATE utf8mb4_unicode_ci,
  `extra_line` text COLLATE utf8mb4_unicode_ci,
  `extra_trace` text COLLATE utf8mb4_unicode_ci,
  `fileId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`logId`),
  KEY `userId` (`extra_userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
