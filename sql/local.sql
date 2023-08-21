# WordPress MySQL database migration
#
# Generated: Tuesday 25. April 2023 08:12 UTC
# Hostname: localhost
# Database: `local`
# URL: //tellustek-local-wp-main.local
# Path: /Users/shingo0620/Local Sites/tellustek-local-wp-main/app/public
# Tables: wp_admintools_acl, wp_admintools_adminiplist, wp_admintools_badwords, wp_admintools_cookies, wp_admintools_customperms, wp_admintools_filescache, wp_admintools_ipautoban, wp_admintools_ipautobanhistory, wp_admintools_ipblock, wp_admintools_log, wp_admintools_profiles, wp_admintools_redirects, wp_admintools_scanalerts, wp_admintools_scans, wp_admintools_storage, wp_admintools_tempsuperusers, wp_admintools_wafexceptions, wp_admintools_waftemplates, wp_akeeba_common, wp_commentmeta, wp_comments, wp_ewwwio_images, wp_ewwwio_queue, wp_links, wp_options, wp_postmeta, wp_posts, wp_term_relationships, wp_term_taxonomy, wp_termmeta, wp_terms, wp_usermeta, wp_users
# Table Prefix: wp_
# Post Types: revision, page, post
# Protocol: http
# Multisite: false
# Subsite Export: false
# --------------------------------------------------------

/*!40101 SET NAMES utf8 */;

SET sql_mode='NO_AUTO_VALUE_ON_ZERO';



#
# Delete any existing table `wp_admintools_acl`
#

DROP TABLE IF EXISTS `wp_admintools_acl`;


#
# Table structure of table `wp_admintools_acl`
#

CREATE TABLE `wp_admintools_acl` (
  `user_id` bigint(20) unsigned NOT NULL,
  `permissions` mediumtext,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_acl`
#

#
# End of data contents of table `wp_admintools_acl`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_adminiplist`
#

DROP TABLE IF EXISTS `wp_admintools_adminiplist`;


#
# Table structure of table `wp_admintools_adminiplist`
#

CREATE TABLE `wp_admintools_adminiplist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_adminiplist`
#

#
# End of data contents of table `wp_admintools_adminiplist`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_badwords`
#

DROP TABLE IF EXISTS `wp_admintools_badwords`;


#
# Table structure of table `wp_admintools_badwords`
#

CREATE TABLE `wp_admintools_badwords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_badwords`
#

#
# End of data contents of table `wp_admintools_badwords`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_cookies`
#

DROP TABLE IF EXISTS `wp_admintools_cookies`;


#
# Table structure of table `wp_admintools_cookies`
#

CREATE TABLE `wp_admintools_cookies` (
  `series` varchar(255) NOT NULL,
  `client_hash` varchar(255) NOT NULL,
  `valid_to` datetime DEFAULT NULL,
  PRIMARY KEY (`series`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_cookies`
#

#
# End of data contents of table `wp_admintools_cookies`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_customperms`
#

DROP TABLE IF EXISTS `wp_admintools_customperms`;


#
# Table structure of table `wp_admintools_customperms`
#

CREATE TABLE `wp_admintools_customperms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `perms` varchar(4) DEFAULT '0644',
  PRIMARY KEY (`id`),
  KEY `wp_admintools_customperms_path` (`path`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_customperms`
#

#
# End of data contents of table `wp_admintools_customperms`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_filescache`
#

DROP TABLE IF EXISTS `wp_admintools_filescache`;


#
# Table structure of table `wp_admintools_filescache`
#

CREATE TABLE `wp_admintools_filescache` (
  `admintools_filescache_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `path` varchar(2048) NOT NULL,
  `filedate` int(11) NOT NULL DEFAULT '0',
  `filesize` int(11) NOT NULL DEFAULT '0',
  `data` blob,
  `checksum` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`admintools_filescache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_filescache`
#

#
# End of data contents of table `wp_admintools_filescache`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_ipautoban`
#

DROP TABLE IF EXISTS `wp_admintools_ipautoban`;


#
# Table structure of table `wp_admintools_ipautoban`
#

CREATE TABLE `wp_admintools_ipautoban` (
  `ip` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT 'other',
  `until` datetime DEFAULT NULL,
  PRIMARY KEY (`ip`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_ipautoban`
#

#
# End of data contents of table `wp_admintools_ipautoban`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_ipautobanhistory`
#

DROP TABLE IF EXISTS `wp_admintools_ipautobanhistory`;


#
# Table structure of table `wp_admintools_ipautobanhistory`
#

CREATE TABLE `wp_admintools_ipautobanhistory` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT 'other',
  `until` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_ipautobanhistory`
#

#
# End of data contents of table `wp_admintools_ipautobanhistory`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_ipblock`
#

DROP TABLE IF EXISTS `wp_admintools_ipblock`;


#
# Table structure of table `wp_admintools_ipblock`
#

CREATE TABLE `wp_admintools_ipblock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_ipblock`
#

#
# End of data contents of table `wp_admintools_ipblock`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_log`
#

DROP TABLE IF EXISTS `wp_admintools_log`;


#
# Table structure of table `wp_admintools_log`
#

CREATE TABLE `wp_admintools_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logdate` datetime NOT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `url` varchar(10240) DEFAULT NULL,
  `reason` enum('other','admindir','awayschedule','adminpw','ipwl','ipbl','sqlishield','antispam','tpone','tmpl','template','muashield','csrfshield','badbehaviour','geoblocking','rfishield','dfishield','uploadshield','xssshield','httpbl','loginfailure','securitycode','sessionshield','external','nonewadmins','nonewfrontendadmins','configmonitor','phpshield','404shield') DEFAULT 'other',
  `extradata` mediumtext,
  PRIMARY KEY (`id`),
  KEY `wp_admintools_log_logdate_reason` (`logdate`,`reason`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_log`
#

#
# End of data contents of table `wp_admintools_log`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_profiles`
#

DROP TABLE IF EXISTS `wp_admintools_profiles`;


#
# Table structure of table `wp_admintools_profiles`
#

CREATE TABLE `wp_admintools_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `configuration` longtext,
  `filters` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_profiles`
#
INSERT INTO `wp_admintools_profiles` ( `id`, `description`, `configuration`, `filters`) VALUES
(1, 'Default PHP Change Scanner Profile', '', '') ;

#
# End of data contents of table `wp_admintools_profiles`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_redirects`
#

DROP TABLE IF EXISTS `wp_admintools_redirects`;


#
# Table structure of table `wp_admintools_redirects`
#

CREATE TABLE `wp_admintools_redirects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT NULL,
  `dest` varchar(255) DEFAULT NULL,
  `ordering` bigint(20) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `keepurlparams` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_redirects`
#

#
# End of data contents of table `wp_admintools_redirects`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_scanalerts`
#

DROP TABLE IF EXISTS `wp_admintools_scanalerts`;


#
# Table structure of table `wp_admintools_scanalerts`
#

CREATE TABLE `wp_admintools_scanalerts` (
  `admintools_scanalert_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `path` varchar(2048) NOT NULL,
  `scan_id` bigint(20) NOT NULL DEFAULT '0',
  `diff` mediumtext,
  `threat_score` int(11) NOT NULL DEFAULT '0',
  `acknowledged` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admintools_scanalert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_scanalerts`
#

#
# End of data contents of table `wp_admintools_scanalerts`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_scans`
#

DROP TABLE IF EXISTS `wp_admintools_scans`;


#
# Table structure of table `wp_admintools_scans`
#

CREATE TABLE `wp_admintools_scans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment` longtext,
  `scanstart` timestamp NULL DEFAULT NULL,
  `scanend` timestamp NULL DEFAULT NULL,
  `status` enum('run','fail','complete') NOT NULL DEFAULT 'run',
  `origin` varchar(30) NOT NULL DEFAULT 'backend',
  `totalfiles` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_stale` (`status`,`origin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_scans`
#

#
# End of data contents of table `wp_admintools_scans`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_storage`
#

DROP TABLE IF EXISTS `wp_admintools_storage`;


#
# Table structure of table `wp_admintools_storage`
#

CREATE TABLE `wp_admintools_storage` (
  `at_key` varchar(255) NOT NULL,
  `at_value` longtext NOT NULL,
  PRIMARY KEY (`at_key`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_storage`
#
INSERT INTO `wp_admintools_storage` ( `at_key`, `at_value`) VALUES
('cparams', '{"ipworkarounds":1}'),
('liveupdate', '{"stuck":0,"software":"Admin Tools for WordPress","version":"1.6.0","link":"https:\\/\\/www.akeeba.com\\/download\\/atwp\\/1-6-0\\/admintoolswp-1-6-0-pro-zip.zip","date":"2023-01-17","releasenotes":"","infourl":"https:\\/\\/www.akeeba.com\\/download\\/atwp\\/1-6-0.html","md5":"a6230adca4933ae27b4ad9d71f72b295","sha1":"5eac9339f86e55312e9c888969ad977b7770a091","sha256":"56aed7ec5a2cdfb7849c98cae6b68041de279bdd50cda4e519a0bdf0d8635a81","sha384":"934ac0c202b534a7022d92cf1234cd0f4b380744cd91b10d50f78c2ab1c50f5654d34bd9999d7fe7ed14db12e1a1cd09","sha512":"17541b24368bef9c0d8878bea6a4bc12e9b70fd2e496197a94f235279c49f4be814d718a7979c30fd41dbd560e0674290a3d5dd85b9ee6146f927f388a1675e8","platforms":"wordpress\\/5.2+,wordpress\\/6,php\\/7.4,php\\/8.0,php\\/8.1,php\\/8.2","loadedUpdate":1,"stability":"stable"}'),
('liveupdate_lastcheck', '1682409753') ;

#
# End of data contents of table `wp_admintools_storage`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_tempsuperusers`
#

DROP TABLE IF EXISTS `wp_admintools_tempsuperusers`;


#
# Table structure of table `wp_admintools_tempsuperusers`
#

CREATE TABLE `wp_admintools_tempsuperusers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_tempsuperusers`
#

#
# End of data contents of table `wp_admintools_tempsuperusers`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_wafexceptions`
#

DROP TABLE IF EXISTS `wp_admintools_wafexceptions`;


#
# Table structure of table `wp_admintools_wafexceptions`
#

CREATE TABLE `wp_admintools_wafexceptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `at_url` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `at_type` enum('exact','regex') NOT NULL,
  `at_param` varchar(100) NOT NULL,
  `at_value` varchar(100) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_wafexceptions`
#

#
# End of data contents of table `wp_admintools_wafexceptions`
# --------------------------------------------------------



#
# Delete any existing table `wp_admintools_waftemplates`
#

DROP TABLE IF EXISTS `wp_admintools_waftemplates`;


#
# Table structure of table `wp_admintools_waftemplates`
#

CREATE TABLE `wp_admintools_waftemplates` (
  `admintools_waftemplate_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  `language` varchar(10) NOT NULL DEFAULT '*',
  `subject` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `enabled` tinyint(3) NOT NULL DEFAULT '1',
  `email_num` tinyint(3) unsigned NOT NULL,
  `email_numfreq` tinyint(3) unsigned NOT NULL,
  `email_freq` enum('','second','minute','hour','day') NOT NULL DEFAULT '',
  `created_on` datetime DEFAULT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT '0',
  `modified_on` datetime DEFAULT NULL,
  `modified_by` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admintools_waftemplate_id`),
  UNIQUE KEY `admintools_waftemplate_keylang` (`reason`(100),`language`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_admintools_waftemplates`
#
INSERT INTO `wp_admintools_waftemplates` ( `admintools_waftemplate_id`, `reason`, `language`, `subject`, `template`, `enabled`, `email_num`, `email_numfreq`, `email_freq`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'all', '*', 'Security exception on [SITENAME]', '<div style="background-color: #e0e0e0; padding: 10px 20px;">\r\n<div style="background-color: #f9f9f9; border-radius: 10px; padding: 5px 10px;">\r\n<p>Hello,</p>\r\n<p>We would like to notify you that a security exception was detected on your site, [SITENAME], with the following details:</p>\r\n<p>IP Address: [IP] (IP Lookup: [LOOKUP])<br />Reason: [REASON]</p>\r\n<p>If this kind of security exception repeats itself, please log in to your site\'s back-end and add this IP address to your Admin Tools\'s Web Application Firewall feature in order to completely block the misbehaving user.</p>\r\n<p>Best regards,</p>\r\n<p>The [SITENAME] team</p>\r\n</div>\r\n<p style="font-size: x-small; color: #667;">You are receiving this automatic email message because you are an administrator in <em>[SITENAME]</em>. <span style="line-height: 1.3em;">Do not reply to this email, it\'s sent from an unmonitored email address .</span ></p > \r\n</div >', 1, 5, 1, 'hour', NULL, 0, NULL, 0),
(2, 'adminloginfail', '*', 'Failed administrator login for user [USER] on [SITENAME]', '<div style="background-color: #e0e0e0; padding: 10px 20px;">\r\n<div style="background-color: #f9f9f9; border-radius: 10px; padding: 5px 10px;">\r\n<p>Hello,</p>\r\n<p>We would like to notify you that user <strong>[USER]</strong> did <strong>not</strong> log in successfully to the administrator back-end area of your site, [SITENAME]. <span style="font-size: 12px; line-height: 15px;">Further information:</span></p>\r\n<p style="font-size: 12px; line-height: 15px;">Username: [USER]<br />IP address: [IP] ([LOOKUP])<br />Country*: [COUNTRY]<br />Continent*: [CONTINENT]<br />Browser User Agent string: [UA]</p>\r\n<p style="font-size: 12px; line-height: 15px;">* Country and continent information availability and accuracy depend on the GeoIP database installed on your site.</p>\r\n<p>If this expected you do not need to do anything about it. If you suspect a hacking attempt, please log in to your site\'s back-end immediately and activate Admin Tools\' Emergency Off-Line mode at once.</p>\r\n<p>Best regards,</p>\r\n<p>The [SITENAME] team</p>\r\n</div>\r\n<p style="font-size: x-small; color: #667;">You are receiving this automatic email message because you are an administrator in <em>[SITENAME]</em>. <span style="line-height: 1.3em;">Do not reply to this email, it\'s sent from an unmonitored email address.</span></p>', 1, 5, 1, 'hour', NULL, 0, NULL, 0),
(3, 'adminloginsuccess', '*', 'User [USER] logged in on [SITENAME] administrator area', '<div style="background-color: #e0e0e0; padding: 10px 20px;">\r\n<div style="background-color: #f9f9f9; border-radius: 10px; padding: 5px 10px;">\r\n<p style="font-size: 12px; line-height: 15px;">Hello,</p>\r\n<p>We would like to notify you that user [USER] has just logged in to the administrator back-end area of your site, [SITENAME]. Further information:</p>\r\n<p>Username: [USER]<br />IP address: [IP] ([LOOKUP])<br />Country*: [COUNTRY]<br />Continent*: [CONTINENT]<br />Browser User Agent string: [UA]</p>\r\n<p>* Country and continent information availability and accuracy depend on the GeoIP database installed on your site.</p>\r\n<p>If this expected you do not need to do anything about it. If you suspect a hacking attempt, please log in to your site\'s back-end immediately and activate Admin Tools\' Emergency Off-Line mode at once.</p>\r\n<p style="font-size: 12px; line-height: 15px;">Best regards,</p>\r\n<p style="font-size: 12px; line-height: 15px;">The [SITENAME] team</p>\r\n</div>\r\n<p style="font-size: x-small; color: #667;">You are receiving this automatic email message because you are an administrator in <em>[SITENAME]</em>. <span style="line-height: 1.3em;">Do not reply to this email, it\'s sent from an unmonitored email address.</span></p>', 1, 5, 1, 'hour', NULL, 0, NULL, 0),
(4, 'ipautoban', '*', 'Automatic IP blocking notification for [IP] on [SITENAME]', '<div style="background-color: #e0e0e0; padding: 10px 20px;">\r\n<div style="background-color: #f9f9f9; border-radius: 10px; padding: 5px 10px;">\r\n<p style="font-size: 12px; line-height: 15px;">Hello,</p>\r\n<p>We would like to notify you that the IP address [IP] is now blocked from accessing your site, [SITENAME]<span style="font-size: 12px; line-height: 15px;">, with the following details:</span></p>\r\n<p style="font-size: 12px; line-height: 15px;">IP Address: [IP] (IP Lookup: [LOOKUP])<br />Reason: [REASON]<br />Banned until: [UNTIL]</p>\r\n<p>If this is your own IP address and you can no longer access your site please <a href="http://akee.ba/lockedout">follow our instructions</a> to temporarily disable Admin Tools\' Web Application Firewall and clear the automatic IP ban.</p>\r\n<p style="font-size: 12px; line-height: 15px;">Best regards,</p>\r\n<p style="font-size: 12px; line-height: 15px;">The [SITENAME] team</p>\r\n</div>\r\n<p style="font-size: x-small; color: #667;">You are receiving this automatic email message because you are an administrator in <em>[SITENAME]</em>. <span style="line-height: 1.3em;">Do not reply to this email, it\'s sent from an unmonitored email address.</span></p>', 1, 5, 1, 'hour', NULL, 0, NULL, 0) ;

#
# End of data contents of table `wp_admintools_waftemplates`
# --------------------------------------------------------



#
# Delete any existing table `wp_akeeba_common`
#

DROP TABLE IF EXISTS `wp_akeeba_common`;


#
# Table structure of table `wp_akeeba_common`
#

CREATE TABLE `wp_akeeba_common` (
  `key` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`key`(100))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_akeeba_common`
#
INSERT INTO `wp_akeeba_common` ( `key`, `value`) VALUES
('stats_lastrun', '1682409775'),
('stats_siteid', '23f72c65dfaf698187ab5b6a4ff410e0c0b2182f'),
('stats_siteurl', 'f2845034f985e60982936ba1dea0cc69') ;

#
# End of data contents of table `wp_akeeba_common`
# --------------------------------------------------------



#
# Delete any existing table `wp_commentmeta`
#

DROP TABLE IF EXISTS `wp_commentmeta`;


#
# Table structure of table `wp_commentmeta`
#

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_commentmeta`
#

#
# End of data contents of table `wp_commentmeta`
# --------------------------------------------------------



#
# Delete any existing table `wp_comments`
#

DROP TABLE IF EXISTS `wp_comments`;


#
# Table structure of table `wp_comments`
#

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_comments`
#
INSERT INTO `wp_comments` ( `comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2023-04-24 09:49:27', '2023-04-24 09:49:27', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href="https://en.gravatar.com/">Gravatar</a>.', 0, '1', '', 'comment', 0, 0) ;

#
# End of data contents of table `wp_comments`
# --------------------------------------------------------



#
# Delete any existing table `wp_ewwwio_images`
#

DROP TABLE IF EXISTS `wp_ewwwio_images`;


#
# Table structure of table `wp_ewwwio_images`
#

CREATE TABLE `wp_ewwwio_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_id` bigint(20) unsigned DEFAULT NULL,
  `gallery` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `resize` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `converted` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `results` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image_size` int(10) unsigned DEFAULT NULL,
  `orig_size` int(10) unsigned DEFAULT NULL,
  `backup` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `level` int(10) unsigned DEFAULT NULL,
  `pending` tinyint(4) NOT NULL DEFAULT '0',
  `updates` int(10) unsigned DEFAULT NULL,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trace` blob,
  PRIMARY KEY (`id`),
  KEY `path` (`path`(191)),
  KEY `attachment_info` (`gallery`(3),`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_ewwwio_images`
#

#
# End of data contents of table `wp_ewwwio_images`
# --------------------------------------------------------



#
# Delete any existing table `wp_ewwwio_queue`
#

DROP TABLE IF EXISTS `wp_ewwwio_queue`;


#
# Table structure of table `wp_ewwwio_queue`
#

CREATE TABLE `wp_ewwwio_queue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attachment_id` bigint(20) unsigned DEFAULT NULL,
  `gallery` varchar(20) DEFAULT NULL,
  `scanned` tinyint(4) NOT NULL DEFAULT '0',
  `new` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attachment_info` (`gallery`(3),`attachment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Data contents of table `wp_ewwwio_queue`
#

#
# End of data contents of table `wp_ewwwio_queue`
# --------------------------------------------------------



#
# Delete any existing table `wp_links`
#

DROP TABLE IF EXISTS `wp_links`;


#
# Table structure of table `wp_links`
#

CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_links`
#

#
# End of data contents of table `wp_links`
# --------------------------------------------------------



#
# Delete any existing table `wp_options`
#

DROP TABLE IF EXISTS `wp_options`;


#
# Table structure of table `wp_options`
#

CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`),
  KEY `autoload` (`autoload`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_options`
#
INSERT INTO `wp_options` ( `option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://tellustek-local-wp-main.local', 'yes'),
(2, 'home', 'http://tellustek-local-wp-main.local', 'yes'),
(3, 'blogname', '網站標題', 'yes'),
(4, 'blogdescription', '一個全新的網站', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'service@tellustek.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'Y 年 n 月 j 日', 'yes'),
(24, 'time_format', 'H:i', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:93:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:17:"^wp-sitemap\\.xml$";s:23:"index.php?sitemap=index";s:17:"^wp-sitemap\\.xsl$";s:36:"index.php?sitemap-stylesheet=sitemap";s:23:"^wp-sitemap-index\\.xsl$";s:34:"index.php?sitemap-stylesheet=index";s:48:"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$";s:75:"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]";s:34:"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$";s:47:"index.php?sitemap=$matches[1]&paged=$matches[2]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:12:"robots\\.txt$";s:18:"index.php?robots=1";s:13:"favicon\\.ico$";s:19:"index.php?favicon=1";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:2:{i:1;s:45:"ewww-image-optimizer/ewww-image-optimizer.php";i:2;s:31:"wp-migrate-db/wp-migrate-db.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '8', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'tailpress-master', 'yes'),
(41, 'stylesheet', 'tailpress-master', 'yes'),
(42, 'comment_registration', '0', 'yes'),
(43, 'html_type', 'text/html', 'yes'),
(44, 'use_trackback', '0', 'yes'),
(45, 'default_role', 'subscriber', 'yes'),
(46, 'db_version', '53496', 'yes'),
(47, 'uploads_use_yearmonth_folders', '1', 'yes'),
(48, 'upload_path', '', 'yes'),
(49, 'blog_public', '1', 'yes'),
(50, 'default_link_category', '2', 'yes'),
(51, 'show_on_front', 'posts', 'yes'),
(52, 'tag_base', '', 'yes'),
(53, 'show_avatars', '1', 'yes'),
(54, 'avatar_rating', 'G', 'yes'),
(55, 'upload_url_path', '', 'yes'),
(56, 'thumbnail_size_w', '150', 'yes'),
(57, 'thumbnail_size_h', '150', 'yes'),
(58, 'thumbnail_crop', '1', 'yes'),
(59, 'medium_size_w', '300', 'yes'),
(60, 'medium_size_h', '300', 'yes'),
(61, 'avatar_default', 'mystery', 'yes'),
(62, 'large_size_w', '1024', 'yes'),
(63, 'large_size_h', '1024', 'yes'),
(64, 'image_default_link_type', 'none', 'yes'),
(65, 'image_default_size', '', 'yes'),
(66, 'image_default_align', '', 'yes'),
(67, 'close_comments_for_old_posts', '0', 'yes'),
(68, 'close_comments_days_old', '14', 'yes'),
(69, 'thread_comments', '1', 'yes'),
(70, 'thread_comments_depth', '5', 'yes'),
(71, 'page_comments', '0', 'yes'),
(72, 'comments_per_page', '50', 'yes'),
(73, 'default_comments_page', 'newest', 'yes'),
(74, 'comment_order', 'asc', 'yes'),
(75, 'sticky_posts', 'a:0:{}', 'yes'),
(76, 'widget_categories', 'a:0:{}', 'yes'),
(77, 'widget_text', 'a:0:{}', 'yes'),
(78, 'widget_rss', 'a:0:{}', 'yes'),
(79, 'uninstall_plugins', 'a:1:{s:29:"admintoolswp/admintoolswp.php";a:2:{i:0;s:12:"AdminToolsWP";i:1;s:9:"uninstall";}}', 'no'),
(80, 'timezone_string', '', 'yes'),
(81, 'page_for_posts', '0', 'yes'),
(82, 'page_on_front', '0', 'yes'),
(83, 'default_post_format', '0', 'yes'),
(84, 'link_manager_enabled', '0', 'yes'),
(85, 'finished_splitting_shared_terms', '1', 'yes'),
(86, 'site_icon', '0', 'yes'),
(87, 'medium_large_size_w', '768', 'yes'),
(88, 'medium_large_size_h', '0', 'yes'),
(89, 'wp_page_for_privacy_policy', '3', 'yes'),
(90, 'show_comments_cookies_opt_in', '1', 'yes'),
(91, 'admin_email_lifespan', '1697881767', 'yes'),
(92, 'disallowed_keys', '', 'no'),
(93, 'comment_previously_approved', '1', 'yes'),
(94, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(95, 'auto_update_core_dev', 'enabled', 'yes'),
(96, 'auto_update_core_minor', 'enabled', 'yes'),
(97, 'auto_update_core_major', 'enabled', 'yes'),
(98, 'wp_force_deactivated_plugins', 'a:0:{}', 'yes'),
(99, 'initial_db_version', '53496', 'yes'),
(100, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes') ;
INSERT INTO `wp_options` ( `option_id`, `option_name`, `option_value`, `autoload`) VALUES
(101, 'fresh_site', '1', 'yes'),
(102, 'user_count', '1', 'no'),
(103, 'widget_block', 'a:6:{i:2;a:1:{s:7:"content";s:19:"<!-- wp:search /-->";}i:3;a:1:{s:7:"content";s:154:"<!-- wp:group --><div class="wp-block-group"><!-- wp:heading --><h2>Recent Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->";}i:4;a:1:{s:7:"content";s:227:"<!-- wp:group --><div class="wp-block-group"><!-- wp:heading --><h2>Recent Comments</h2><!-- /wp:heading --><!-- wp:latest-comments {"displayAvatar":false,"displayDate":false,"displayExcerpt":false} /--></div><!-- /wp:group -->";}i:5;a:1:{s:7:"content";s:146:"<!-- wp:group --><div class="wp-block-group"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->";}i:6;a:1:{s:7:"content";s:150:"<!-- wp:group --><div class="wp-block-group"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->";}s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'sidebars_widgets', 'a:2:{s:19:"wp_inactive_widgets";a:5:{i:0;s:7:"block-2";i:1;s:7:"block-3";i:2;s:7:"block-4";i:3;s:7:"block-5";i:4;s:7:"block-6";}s:13:"array_version";i:3;}', 'yes'),
(105, 'cron', 'a:6:{i:1682411090;a:1:{s:24:"admintoolswp_cron_hourly";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1682412568;a:1:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1682416168;a:6:{s:30:"wp_site_health_scheduled_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"weekly";s:4:"args";a:0:{}s:8:"interval";i:604800;}}s:32:"recovery_mode_clean_expired_keys";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:18:"wp_https_detection";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1682418816;a:3:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:21:"wp_update_user_counts";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1682418818;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(106, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(107, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(108, 'widget_archives', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(109, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(110, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(111, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(112, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(113, 'widget_meta', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(114, 'widget_search', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(115, 'nonce_key', '0PIJ/c(7UlpP0jZ-jby$W5SB)wqMCwu2a,5O!IG_C<dA;#O8y3snD?vvfB|t<K{B', 'no'),
(116, 'nonce_salt', 'O]R~_j$6tKQW9t~$P$3:IZoh-j-LihBqP+#!Rf!ijNO,2*:}tPF*[bdkspj]h?D=', 'no'),
(117, 'widget_recent-posts', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(118, 'widget_recent-comments', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(119, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(120, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(121, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(123, 'recovery_keys', 'a:1:{s:22:"y2J33bTgOMbaxsHxDb7Csh";a:2:{s:10:"hashed_key";s:34:"$P$Buuds.9KJOPMBSbfewcp6O9fHKzbsP/";s:10:"created_at";i:1682409124;}}', 'yes'),
(124, 'theme_mods_twentytwentythree', 'a:2:{s:18:"custom_css_post_id";i:-1;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1682406643;s:4:"data";a:3:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:3:{i:0;s:7:"block-2";i:1;s:7:"block-3";i:2;s:7:"block-4";}s:9:"sidebar-2";a:2:{i:0;s:7:"block-5";i:1;s:7:"block-6";}}}}', 'yes'),
(125, 'https_detection_errors', 'a:2:{s:23:"ssl_verification_failed";a:1:{i:0;s:24:"SSL verification failed.";}s:19:"bad_response_source";a:1:{i:0;s:55:"It looks like the response did not come from this site.";}}', 'yes'),
(132, 'auth_key', 'mWzTUqvYY(<HcpM1!42Ey9`^xN=P|DnFg`N{|[|bdr<>/3iUMbygl46:F;ZXv}R,', 'no'),
(133, 'auth_salt', 'A/2.tlZ(TdO>qb_.h*/@WgpYC(~4jRJc=W@J%*on={A5A-L/lBDFV~-s!w]P9(6G', 'no'),
(134, 'logged_in_key', '$)6Ya|Z?:3+zN%oQt)uW]FJrcI!9A:xz9: Vu3x]vV7$5>C4[5HAQ1nM6B9M+[:[', 'no'),
(135, 'logged_in_salt', 'C5hf:-zb{w^A,z|#I`Z#mT Id4CcMB4AM+8YoE#dQ5+!GLq$-Z2US9eA+d8>.IX+', 'no'),
(143, 'can_compress_scripts', '1', 'no'),
(156, 'finished_updating_comment_type', '1', 'yes'),
(172, 'current_theme', 'TailPress', 'yes'),
(173, 'theme_mods_tailpress-master', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:18:"custom_css_post_id";i:-1;}', 'yes'),
(174, 'theme_switched', '', 'yes'),
(175, 'recently_activated', 'a:2:{s:29:"admintoolswp/admintoolswp.php";i:1682409928;s:31:"query-monitor/query-monitor.php";i:1682409808;}', 'yes'),
(176, 'admintoolswp_plugin_dir', 'admintoolswp', 'yes'),
(177, 'ewww_image_optimizer_relative_migration_status', 'done', 'yes'),
(181, 'ewww_image_optimizer_background_optimization', '1', 'yes'),
(182, 'ewww_image_optimizer_noauto', '', 'yes'),
(183, 'ewww_image_optimizer_disable_editor', '', 'yes'),
(184, 'ewww_image_optimizer_debug', '', 'yes'),
(185, 'ewww_image_optimizer_metadata_remove', '1', 'yes'),
(186, 'ewww_image_optimizer_jpg_level', '10', 'yes'),
(187, 'ewww_image_optimizer_png_level', '10', 'yes'),
(188, 'ewww_image_optimizer_gif_level', '10', 'yes'),
(189, 'ewww_image_optimizer_pdf_level', '0', 'yes'),
(190, 'ewww_image_optimizer_svg_level', '0', 'yes'),
(191, 'ewww_image_optimizer_jpg_quality', '', 'yes'),
(192, 'ewww_image_optimizer_webp_quality', '', 'yes'),
(193, 'ewww_image_optimizer_backup_files', '', 'yes'),
(194, 'ewww_image_optimizer_resize_existing', '1', 'yes'),
(195, 'ewww_image_optimizer_exactdn', '', 'yes'),
(196, 'ewww_image_optimizer_exactdn_plan_id', '0', 'yes'),
(197, 'exactdn_all_the_things', '1', 'yes'),
(198, 'exactdn_lossy', '1', 'yes'),
(199, 'exactdn_exclude', '', 'yes'),
(200, 'exactdn_sub_folder', '', 'no'),
(201, 'exactdn_prevent_db_queries', '', 'yes'),
(202, 'ewww_image_optimizer_lazy_load', '', 'yes'),
(203, 'ewww_image_optimizer_use_siip', '', 'yes'),
(204, 'ewww_image_optimizer_use_lqip', '', 'yes'),
(205, 'ewww_image_optimizer_ll_exclude', '', 'yes'),
(206, 'ewww_image_optimizer_ll_all_things', '', 'yes'),
(207, 'ewww_image_optimizer_disable_pngout', '1', 'yes'),
(208, 'ewww_image_optimizer_disable_svgcleaner', '1', 'yes'),
(209, 'ewww_image_optimizer_optipng_level', '2', 'yes'),
(210, 'ewww_image_optimizer_pngout_level', '2', 'yes'),
(211, 'ewww_image_optimizer_webp_for_cdn', '', 'yes'),
(212, 'ewww_image_optimizer_force_gif2webp', '1', 'yes'),
(213, 'ewww_image_optimizer_picture_webp', '', 'yes'),
(214, 'ewww_image_optimizer_webp_rewrite_exclude', '', 'yes'),
(216, 'ewww_image_optimizer_ll_autoscale', '1', 'no'),
(217, 'exactdn_never_been_active', '1', 'no'),
(218, 'ewww_image_optimizer_bulk_resume', '', 'yes'),
(219, 'ewww_image_optimizer_aux_resume', '', 'yes'),
(220, 'ewww_image_optimizer_flag_attachments', '', 'no'),
(221, 'ewww_image_optimizer_ngg_attachments', '', 'no'),
(223, 'ewww_image_optimizer_review_time', '1683012291', 'no'),
(224, 'ewww_image_optimizer_version', '693', 'yes'),
(235, 'recovery_mode_email_last_sent', '1682409124', 'yes'),
(236, 'WPLANG', 'zh_TW', 'yes'),
(257, 'wpmdb_usage', 'a:2:{s:6:"action";s:8:"savefile";s:4:"time";i:1682410334;}', 'no') ;

#
# End of data contents of table `wp_options`
# --------------------------------------------------------



#
# Delete any existing table `wp_postmeta`
#

DROP TABLE IF EXISTS `wp_postmeta`;


#
# Table structure of table `wp_postmeta`
#

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_postmeta`
#
INSERT INTO `wp_postmeta` ( `meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default') ;

#
# End of data contents of table `wp_postmeta`
# --------------------------------------------------------



#
# Delete any existing table `wp_posts`
#

DROP TABLE IF EXISTS `wp_posts`;


#
# Table structure of table `wp_posts`
#

CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_posts`
#
INSERT INTO `wp_posts` ( `ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2023-04-24 09:49:27', '2023-04-24 09:49:27', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2023-04-24 09:49:27', '2023-04-24 09:49:27', '', 0, 'http://tellustek-local-wp-main.local/?p=1', 0, 'post', '', 1),
(2, 1, '2023-04-24 09:49:27', '2023-04-24 09:49:27', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class="wp-block-quote"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href="http://tellustek-local-wp-main.local/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2023-04-24 09:49:27', '2023-04-24 09:49:27', '', 0, 'http://tellustek-local-wp-main.local/?page_id=2', 0, 'page', '', 0),
(3, 1, '2023-04-24 09:49:27', '2023-04-24 09:49:27', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>Our website address is: http://tellustek-local-wp-main.local.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where your data is sent</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class="privacy-policy-tutorial">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2023-04-24 09:49:27', '2023-04-24 09:49:27', '', 0, 'http://tellustek-local-wp-main.local/?page_id=3', 0, 'page', '', 0),
(4, 1, '2023-04-24 10:33:38', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2023-04-24 10:33:38', '0000-00-00 00:00:00', '', 0, 'http://tellustek-local-wp-main.local/?p=4', 0, 'post', '', 0) ;

#
# End of data contents of table `wp_posts`
# --------------------------------------------------------



#
# Delete any existing table `wp_term_relationships`
#

DROP TABLE IF EXISTS `wp_term_relationships`;


#
# Table structure of table `wp_term_relationships`
#

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_term_relationships`
#
INSERT INTO `wp_term_relationships` ( `object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0) ;

#
# End of data contents of table `wp_term_relationships`
# --------------------------------------------------------



#
# Delete any existing table `wp_term_taxonomy`
#

DROP TABLE IF EXISTS `wp_term_taxonomy`;


#
# Table structure of table `wp_term_taxonomy`
#

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_term_taxonomy`
#
INSERT INTO `wp_term_taxonomy` ( `term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1) ;

#
# End of data contents of table `wp_term_taxonomy`
# --------------------------------------------------------



#
# Delete any existing table `wp_termmeta`
#

DROP TABLE IF EXISTS `wp_termmeta`;


#
# Table structure of table `wp_termmeta`
#

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_termmeta`
#

#
# End of data contents of table `wp_termmeta`
# --------------------------------------------------------



#
# Delete any existing table `wp_terms`
#

DROP TABLE IF EXISTS `wp_terms`;


#
# Table structure of table `wp_terms`
#

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_terms`
#
INSERT INTO `wp_terms` ( `term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0) ;

#
# End of data contents of table `wp_terms`
# --------------------------------------------------------



#
# Delete any existing table `wp_usermeta`
#

DROP TABLE IF EXISTS `wp_usermeta`;


#
# Table structure of table `wp_usermeta`
#

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_usermeta`
#
INSERT INTO `wp_usermeta` ( `umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'tellusadmin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:4:{s:64:"f6a603e26fc8668be8c8730a9d73689a87a9bdbe22eb8e696f3e8e3c7b89504f";a:4:{s:10:"expiration";i:1682505216;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:117:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36";s:5:"login";i:1682332416;}s:64:"5411727ebe4704f85440b97df26f591756e8d7b5942a936b26ae819e520c0ee4";a:4:{s:10:"expiration";i:1682577597;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:117:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36";s:5:"login";i:1682404797;}s:64:"b8755c3dd7b8ac1c90c2511061b716757094b3e1ccf5a7f3df3d4f377c39acec";a:4:{s:10:"expiration";i:1682582140;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:117:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36";s:5:"login";i:1682409340;}s:64:"53dcb069d2535469d2e9a65f49bc9a0ccd9daf2e0a80918157606446c80fb156";a:4:{s:10:"expiration";i:1682582187;s:2:"ip";s:9:"127.0.0.1";s:2:"ua";s:117:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36";s:5:"login";i:1682409387;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4'),
(32, 1, '_new_email', 'a:2:{s:4:"hash";s:32:"1f3608a6fb584411f0e3a658eea2ecbc";s:8:"newemail";s:21:"service@tellustek.com";}'),
(33, 1, 'admintoolswp_messages', 'a:0:{}') ;

#
# End of data contents of table `wp_usermeta`
# --------------------------------------------------------



#
# Delete any existing table `wp_users`
#

DROP TABLE IF EXISTS `wp_users`;


#
# Table structure of table `wp_users`
#

CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;


#
# Data contents of table `wp_users`
#
INSERT INTO `wp_users` ( `ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'tellusadmin', '$P$BhxkmLRWyrRI9fqbjDTttWkpP7hjhE.', 'tellusadmin', 'dev-email@wpengine.local', 'https://www.tellustek.com', '2023-04-24 09:49:27', '', 0, 'tellusadmin') ;

#
# End of data contents of table `wp_users`
# --------------------------------------------------------

#
# Add constraints back in and apply any alter data queries.
#

