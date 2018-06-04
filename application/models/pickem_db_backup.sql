-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2018 at 03:14 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id`         VARCHAR(128)     NOT NULL,
  `ip_address` VARCHAR(45)      NOT NULL,
  `timestamp`  INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `data`       BLOB             NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `email_template_key`   VARCHAR(255) NOT NULL,
  `email_template_title` VARCHAR(255) NOT NULL,
  `default_subject`      VARCHAR(255) DEFAULT NULL,
  `default_message`      TEXT,
  `subject`              VARCHAR(255) DEFAULT NULL,
  `message`              TEXT,
  PRIMARY KEY (`email_template_key`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8
  ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`email_template_key`, `email_template_title`, `default_subject`, `default_message`, `subject`, `message`)
VALUES
  ('WEEKLY_PICKS_REMINDER', 'Weekly Picks Reminder', 'NFL Pick \'Em Week {week} Reminder',
   'Hello {player},<br /><br />You are receiving this email because you do not yet have all of your picks in for week {week}.&nbsp; This is your reminder.&nbsp; The first game is {first_game} (Eastern), so to receive credit for that game, you\'ll have to make your pick before then.<br /><br />Links:<br />&nbsp;- NFL Pick \'Em URL: {site_url}<br />&nbsp;- Help/Rules: {rules_url}<br /><br />Good Luck!<br />',
   'NFL Pick \'Em Week {week} Reminder',
   'Hello {player},<br /><br />You are receiving this email because you do not yet have all of your picks in for week {week}.&nbsp; This is your reminder.&nbsp; The first game is {first_game} (Eastern), so to receive credit for that game, you\'ll have to make your pick before then.<br /><br />Links:<br />&nbsp;- NFL Pick \'Em URL: {site_url}<br />&nbsp;- Help/Rules: {rules_url}<br /><br />Good Luck!<br />'),
  ('WEEKLY_RESULTS_REMINDER', 'Last Week Results/Reminder', 'NFL Pick \'Em Week {previousWeek} Standings/Reminder',
   'Congratulations this week go to {winners} for winning week {previousWeek}.  The winner(s) had {winningScore} out of {possibleScore} picks correct.<br /><br />The current leaders are:<br />{currentLeaders}<br /><br />The most accurate players are:<br />{bestPickRatios}<br /><br />*Reminder* - Please make your picks for week {week} before {first_game} (Eastern).<br /><br />Links:<br />&nbsp;- NFL Pick \'Em URL: {site_url}<br />&nbsp;- Help/Rules: {rules_url}<br /><br />Good Luck!<br />',
   'NFL Pick \'Em Week {previousWeek} Standings/Reminder',
   'Congratulations this week go to {winners} for winning week {previousWeek}.  The winner(s) had {winningScore} out of {possibleScore} picks correct.<br /><br />The current leaders are:<br />{currentLeaders}<br /><br />The most accurate players are:<br />{bestPickRatios}<br /><br />*Reminder* - Please make your picks for week {week} before {first_game} (Eastern).<br /><br />Links:<br />&nbsp;- NFL Pick \'Em URL: {site_url}<br />&nbsp;- Help/Rules: {rules_url}<br /><br />Good Luck!<br />'),
  ('FINAL_RESULTS', 'Final Results', 'NFL Pick \'Em 2016 Final Results',
   'Congratulations this week go to {winners} for winning week\r\n{previousWeek}. The winner(s) had {winningScore} out of {possibleScore}\r\npicks correct.<br /><br /><span style=\"font-weight: bold;\">Congratulations to {final_winner}</span> for winning NFL Pick \'Em 2016!&nbsp; {final_winner} had {final_winningScore} wins and had a pick ratio of {picks}/{possible} ({pickpercent}%).<br /><br />Top Wins:<br />{currentLeaders}<br /><br />The most accurate players are:<br />{bestPickRatios}<br /><br />Thanks for playing, and I hope to see you all again for NFL Pick \'Em 2017!',
   'NFL Pick \'Em 2016 Final Results',
   'Congratulations this week go to {winners} for winning week\r\n{previousWeek}. The winner(s) had {winningScore} out of {possibleScore}\r\npicks correct.<br /><br /><span style=\"font-weight: bold;\">Congratulations to {final_winner}</span> for winning NFL Pick \'Em 2016!&nbsp; {final_winner} had {final_winningScore} wins and had a pick ratio of {picks}/{possible} ({pickpercent}%).<br /><br />Top Wins:<br />{currentLeaders}<br /><br />The most accurate players are:<br />{bestPickRatios}<br /><br />Thanks for playing, and I hope to see you all again for NFL Pick \'Em 2017!');

-- --------------------------------------------------------

--
-- Table structure for table `picks`
--

DROP TABLE IF EXISTS `picks`;
CREATE TABLE IF NOT EXISTS `picks` (
  `userID`     INT(11)     NOT NULL,
  `gameID`     INT(11)     NOT NULL,
  `pickID`     INT(10)     NOT NULL AUTO_INCREMENT,
  `points`     INT(11)     NOT NULL DEFAULT '1',
  `sport`      VARCHAR(15) NOT NULL,
  `tournament` VARCHAR(25) NOT NULL,
  `pickDate`   TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weekNum`    INT(11)              DEFAULT NULL,
  `pick`       VARCHAR(60)          DEFAULT NULL,
  PRIMARY KEY (`pickID`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 94
  DEFAULT CHARSET = utf8
  ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `picks`
--

INSERT INTO `picks` (`userID`, `gameID`, `pickID`, `points`, `sport`, `tournament`, `pickDate`, `weekNum`, `pick`)
VALUES
  (1, 94, 93, 30, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Lions'),
  (1, 93, 92, 16, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Brumbies'),
  (1, 92, 91, 9, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Reds'),
  (1, 91, 90, 16, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Waratahs'),
  (1, 88, 87, 17, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Crusaders'),
  (1, 89, 88, 14, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Sunwolves'),
  (1, 90, 89, 18, 'rugby', 'Super Rugby', '2018-05-20 09:54:44', 15, 'Jaguares');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `gameID`          INT(11)     NOT NULL AUTO_INCREMENT,
  `weekNum`         INT(11)              DEFAULT NULL,
  `gameTimeEastern` DATETIME             DEFAULT NULL,
  `homeID`          VARCHAR(10) NOT NULL,
  `homeScore`       INT(11)              DEFAULT NULL,
  `visitorID`       VARCHAR(20) NOT NULL,
  `visitorScore`    INT(11)              DEFAULT NULL,
  `overtime`        VARCHAR(5)           DEFAULT NULL,
  `tournament`      VARCHAR(50) NOT NULL,
  `sport`           VARCHAR(50) NOT NULL,
  `location`        VARCHAR(50) NOT NULL,
  PRIMARY KEY (`gameID`),
  KEY `GameID` (`gameID`),
  KEY `HomeID` (`homeID`),
  KEY `VisitorID` (`visitorID`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 444
  DEFAULT CHARSET = utf8
  ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`gameID`, `weekNum`, `gameTimeEastern`, `homeID`, `homeScore`, `visitorID`, `visitorScore`, `overtime`, `tournament`, `sport`, `location`)
VALUES
  (1, 1, '2018-02-18 00:00:00', 'Stormers', 28, 'Jaguares', 20, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (2, 1, '2018-02-18 00:00:00', 'Lions', 26, 'Sharks', 19, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (3, 2, '2018-02-23 00:00:00', 'Highlander', 41, 'Blues', 34, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (4, 2, '2018-02-23 00:00:00', 'Rebels', 45, 'Reds', 19, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (5, 2, '2018-02-24 00:00:00', 'Sunwolves', 25, 'Brumbies', 32, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (6, 2, '2018-02-24 00:00:00', 'Crusaders', 45, 'Chiefs', 23, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (7, 2, '2018-02-24 00:00:00', 'Waratahs', 34, 'Stormers', 27, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (8, 2, '2018-02-25 00:00:00', 'Lions', 47, 'Jaguares', 27, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (9, 2, '2018-02-25 00:00:00', 'Bulls', 21, 'Hurricanes', 19, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (10, 3, '2018-03-02 00:00:00', 'Blues', 21, 'Chiefs', 27, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (11, 3, '2018-03-02 00:00:00', 'Reds', 18, 'Brumbies', 25, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (12, 3, '2018-03-03 00:00:00', 'Sunwolves', 17, 'Rebels', 37, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (13, 3, '2018-03-03 00:00:00', 'Crusaders', 45, 'Stormers', 28, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (14, 3, '2018-03-04 00:00:00', 'Sharks', 24, 'Waratahs', 24, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (15, 3, '2018-03-04 00:00:00', 'Bulls', 35, 'Lions', 49, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (16, 3, '2018-03-04 00:00:00', 'Jaguares', 5, 'Hurricanes', 5, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (17, 4, '2018-03-09 00:00:00', 'Highlander', 33, 'Stormers', 19, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (18, 4, '2018-03-09 00:00:00', 'Rebels', 33, 'Brumbies', 10, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (19, 4, '2018-03-10 00:00:00', 'Hurricanes', 29, 'Crusaders', 19, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (20, 4, '2018-03-10 00:00:00', 'Reds', 20, 'Bulls', 14, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (21, 4, '2018-03-11 00:00:00', 'Sharks', 50, 'Sunwolves', 22, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (22, 4, '2018-03-11 00:00:00', 'Lions', 35, 'Blues', 38, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (23, 4, '2018-03-11 00:00:00', 'Jaguares', 38, 'Waratahs', 28, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (24, 5, '2018-03-16 00:00:00', 'Chiefs', 41, 'Bulls', 28, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (25, 5, '2018-03-17 00:00:00', 'Highlander', 25, 'Crusaders', 17, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (26, 5, '2018-03-17 00:00:00', 'Brumbies', 24, 'Sharks', 17, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (27, 5, '2018-03-18 00:00:00', 'Stormers', 37, 'Blues', 20, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (28, 5, '2018-03-18 00:00:00', 'Lions', 40, 'Sunwolves', 38, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (29, 5, '2018-03-18 00:00:00', 'Jaguares', 43, 'Reds', 15, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (30, 5, '2018-03-18 00:00:00', 'Waratahs', 51, 'Rebels', 27, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (31, 6, '2018-03-23 00:00:00', 'Crusaders', 33, 'Bulls', 14, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (32, 6, '2018-03-23 00:00:00', 'Rebels', 46, 'Sharks', 14, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (33, 6, '2018-03-24 00:00:00', 'Sunwolves', 22, 'Chiefs', 15, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (34, 6, '2018-03-24 00:00:00', 'Hurricanes', 43, 'Highlanders', 50, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (35, 6, '2018-03-25 00:00:00', 'Stormers', 25, 'Reds', 19, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (36, 6, '2018-03-25 00:00:00', 'Jaguares', 49, 'Lions', 35, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (37, 7, '2018-03-30 00:00:00', 'Chiefs', 27, 'Highlanders', 22, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (38, 7, '2018-03-30 00:00:00', 'Rebels', 19, 'Hurricanes', 50, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (39, 7, '2018-03-31 00:00:00', 'Blues', 40, 'Sharks', 63, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (40, 7, '2018-03-31 00:00:00', 'Brumbies', 17, 'Waratahs', 24, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (41, 7, '2018-04-01 00:00:00', 'Bulls', 33, 'Stormers', 23, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (42, 7, '2018-04-01 00:00:00', 'Lions', 35, 'Crusaders', 30, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (43, 8, '2018-04-06 00:00:00', 'Hurricanes', 38, 'Sharks', 37, NULL, 'Super Rugby', 'rugby', 'McLean Park'),
  (44, 8, '2018-04-07 00:00:00', 'Sunwolves', 29, 'Waratahs', 50, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (45, 8, '2018-04-07 00:00:00', 'Chiefs', 21, 'Blues', 19, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (46, 8, '2018-04-07 00:00:00', 'Brumbies', 45, 'Reds', 21, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (47, 8, '2018-04-08 00:00:00', 'Lions', 52, 'Stormers', 31, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (48, 8, '2018-04-08 00:00:00', 'Jaguares', 14, 'Crusaders', 40, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (49, 9, '2018-04-13 00:00:00', 'Hurricanes', 25, 'Chiefs', 13, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (50, 9, '2018-04-14 00:00:00', 'Sunwolves', 25, 'Blues', 15, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (51, 9, '2018-04-14 00:00:00', 'Rebels', 22, 'Jaguares', 25, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (52, 9, '2018-04-14 00:00:00', 'Highlander', 43, 'Brumbies', 17, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (53, 9, '2018-04-14 00:00:00', 'Waratahs', 37, 'Reds', 16, NULL, 'Super Rugby', 'rugby', 'Sydney Cricket Ground'),
  (54, 9, '2018-04-15 00:00:00', 'Sharks', 14, 'Bulls', 7, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (55, 10, '2018-04-20 00:00:00', 'Blues', 16, 'Highlanders', 34, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (56, 10, '2018-04-20 00:00:00', 'Waratahs', 0, 'Lions', 29, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (57, 10, '2018-04-21 00:00:00', 'Crusaders', 33, 'Sunwolves', 11, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (58, 10, '2018-04-21 00:00:00', 'Reds', 45, 'Chiefs', 15, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (59, 10, '2018-04-21 00:00:00', 'Bulls', 10, 'Rebels', 15, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (60, 10, '2018-04-22 00:00:00', 'Sharks', 24, 'Stormers', 17, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (61, 10, '2018-04-22 00:00:00', 'Brumbies', 20, 'Jaguares', 25, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (62, 11, '2018-04-27 00:00:00', 'Hurricanes', 43, 'Sunwolves', 15, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (63, 11, '2018-04-27 00:00:00', 'Stormers', 34, 'Rebels', 18, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (64, 11, '2018-04-28 00:00:00', 'Reds', 27, 'Lions', 22, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (65, 11, '2018-04-28 00:00:00', 'Blues', 13, 'Jaguares', 20, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (66, 11, '2018-04-28 00:00:00', 'Brumbies', 45, 'Crusaders', 20, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (67, 11, '2018-04-29 00:00:00', 'Bulls', 28, 'Highlanders', 29, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (68, 12, '2018-05-04 00:00:00', 'Chiefs', 0, 'Jaguares', 0, NULL, 'Super Rugby', 'rugby', 'Rotorua International Stadium'),
  (69, 12, '2018-05-04 00:00:00', 'Rebels', 0, 'Crusaders', 0, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (70, 12, '2018-05-05 00:00:00', 'Hurricanes', 0, 'Lions', 0, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (71, 12, '2018-05-05 00:00:00', 'Waratahs', 0, 'Blues', 0, NULL, 'Super Rugby', 'rugby', 'Brookvale Oval'),
  (72, 12, '2018-05-05 00:00:00', 'Stormers', 0, 'Bulls', 0, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (73, 12, '2018-05-06 00:00:00', 'Sharks', 0, 'Highlanders', 0, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (74, 13, '2018-05-11 00:00:00', 'Blues', 0, 'Hurricanes', 0, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (75, 13, '2018-05-12 00:00:00', 'Sunwolves', 0, 'Reds', 0, NULL, 'Super Rugby', 'rugby', 'Prince Chichibu Memorial Stadium'),
  (76, 13, '2018-05-12 00:00:00', 'Crusaders', 0, 'Waratahs', 0, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (77, 13, '2018-05-12 00:00:00', 'Highlander', 0, 'Lions', 0, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (78, 13, '2018-05-12 00:00:00', 'Brumbies', 0, 'Rebels', 0, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (79, 13, '2018-05-12 00:00:00', 'Stormers', 0, 'Chiefs', 0, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (80, 13, '2018-05-13 00:00:00', 'Bulls', 0, 'Sharks', 0, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (81, 14, '2018-05-18 00:00:00', 'Hurricanes', 0, 'Reds', 0, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (82, 14, '2018-05-19 00:00:00', 'Sunwolves', 0, 'Stormers', 0, NULL, 'Super Rugby', 'rugby', 'Mong Kok Stadium'),
  (83, 14, '2018-05-19 00:00:00', 'Blues', 0, 'Crusaders', 0, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (84, 14, '2018-05-19 00:00:00', 'Waratahs', 0, 'Highlanders', 0, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (85, 14, '2018-05-19 00:00:00', 'Sharks', 0, 'Chiefs', 0, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (86, 14, '2018-05-20 00:00:00', 'Lions', 0, 'Brumbies', 0, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (87, 14, '2018-05-20 00:00:00', 'Jaguares', 0, 'Bulls', 0, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (88, 15, '2018-05-25 00:00:00', 'Crusaders', 0, 'Hurricanes', 0, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (89, 15, '2018-05-25 00:00:00', 'Rebels', 0, 'Sunwolves', 0, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (90, 15, '2018-05-26 00:00:00', 'Jaguares', 0, 'Sharks', 0, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (91, 15, '2018-05-26 00:00:00', 'Chiefs', 0, 'Waratahs', 0, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (92, 15, '2018-05-26 00:00:00', 'Reds', 0, 'Highlanders', 0, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (93, 15, '2018-05-26 00:00:00', 'Bulls', 0, 'Brumbies', 0, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (94, 15, '2018-05-27 00:00:00', 'Stormers', 0, 'Lions', 0, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (95, 16, '2018-06-01 00:00:00', 'Highlander', 0, 'Hurricanes', 0, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (96, 16, '2018-06-02 00:00:00', 'Blues', 0, 'Rebels', 0, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (97, 16, '2018-06-02 00:00:00', 'Chiefs', 0, 'Crusaders', 0, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (98, 16, '2018-06-02 00:00:00', 'Reds', 0, 'Waratahs', 0, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (99, 16, '2018-06-03 00:00:00', 'Brumbies', 0, 'Sunwolves', 0, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (100, 17, '2018-06-29 00:00:00', 'Blues', 0, 'Reds', 0, NULL, 'Super Rugby', 'rugby', 'Eden Park'),
  (101, 17, '2018-06-29 00:00:00', 'Rebels', 0, 'Waratahs', 0, NULL, 'Super Rugby', 'rugby', 'AAMI Park'),
  (102, 17, '2018-06-30 00:00:00', 'Highlander', 0, 'Chiefs', 0, NULL, 'Super Rugby', 'rugby', 'ANZ National Stadium, Suva'),
  (103, 17, '2018-06-30 00:00:00', 'Brumbies', 0, 'Hurricanes', 0, NULL, 'Super Rugby', 'rugby', 'GIO Stadium'),
  (104, 17, '2018-06-30 00:00:00', 'Sunwolves', 0, 'Bulls', 0, NULL, 'Super Rugby', 'rugby', 'Singapore National Stadium'),
  (105, 17, '2018-07-01 00:00:00', 'Sharks', 0, 'Lions', 0, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (106, 17, '2018-07-01 00:00:00', 'Jaguares', 0, 'Stormers', 0, NULL, 'Super Rugby', 'rugby', 'Estadio Jose Amalfitani'),
  (107, 18, '2018-07-06 00:00:00', 'Crusaders', 0, 'Highlanders', 0, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (108, 18, '2018-07-06 00:00:00', 'Reds', 0, 'Rebels', 0, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (109, 18, '2018-07-07 00:00:00', 'Chiefs', 0, 'Brumbies', 0, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (110, 18, '2018-07-07 00:00:00', 'Hurricanes', 0, 'Blues', 0, NULL, 'Super Rugby', 'rugby', 'Westpac Stadium'),
  (111, 18, '2018-07-07 00:00:00', 'Waratahs', 0, 'Sunwolves', 0, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (112, 18, '2018-07-07 00:00:00', 'Bulls', 0, 'Jaguares', 0, NULL, 'Super Rugby', 'rugby', 'Loftus Versfeld'),
  (113, 18, '2018-07-08 00:00:00', 'Stormers', 0, 'Sharks', 0, NULL, 'Super Rugby', 'rugby', 'DHL Newlands'),
  (114, 19, '2018-07-13 00:00:00', 'Chiefs', 0, 'Hurricanes', 0, NULL, 'Super Rugby', 'rugby', 'FMG Stadium Waikato'),
  (115, 19, '2018-07-13 00:00:00', 'Reds', 0, 'Sunwolves', 0, NULL, 'Super Rugby', 'rugby', 'Suncorp Stadium'),
  (116, 19, '2018-07-14 00:00:00', 'Highlander', 0, 'Rebels', 0, NULL, 'Super Rugby', 'rugby', 'Forsyth Barr Stadium'),
  (117, 19, '2018-07-14 00:00:00', 'Crusaders', 0, 'Blues', 0, NULL, 'Super Rugby', 'rugby', 'AMI Stadium'),
  (118, 19, '2018-07-14 00:00:00', 'Waratahs', 0, 'Brumbies', 0, NULL, 'Super Rugby', 'rugby', 'Allianz Stadium'),
  (119, 19, '2018-07-14 00:00:00', 'Lions', 0, 'Bulls', 0, NULL, 'Super Rugby', 'rugby', 'Emirates Airlines Park'),
  (120, 19, '2018-07-15 00:00:00', 'Sharks', 0, 'Jaguares', 0, NULL, 'Super Rugby', 'rugby', 'Kings Park Stadium'),
  (122, 0, '0000-00-00 00:00:00', 'homeID', 0, 'visitorID', 0, 'overt', 'tournament', 'sport', 'Location'),
  (123, 1, '2018-09-06 20:20:00', 'Philadelph', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (124, 1, '2018-09-09 13:00:00', 'Cleveland ', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (125, 1, '2018-09-09 13:00:00', 'Indianapol', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (126, 1, '2018-09-09 13:00:00', 'Miami Dolp', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (127, 1, '2018-09-09 13:00:00', 'Minnesota ', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (128, 1, '2018-09-09 13:00:00', 'New Englan', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (129, 1, '2018-09-09 13:00:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (130, 1, '2018-09-09 13:00:00', 'New York G', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (131, 1, '2018-09-09 13:00:00', 'Baltimore ', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (132, 1, '2018-09-09 16:05:00', 'Los Angele', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (133, 1, '2018-09-09 16:25:00', 'Denver Bro', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (134, 1, '2018-09-09 16:25:00', 'Arizona Ca', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (135, 1, '2018-09-09 16:25:00', 'Carolina P', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (136, 1, '2018-09-09 20:20:00', 'Green Bay ', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (137, 1, '2018-09-10 19:10:00', 'Detroit Li', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (138, 1, '2018-09-10 22:20:00', 'Oakland Ra', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (139, 2, '2018-09-13 20:20:00', 'Cincinnati', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (140, 2, '2018-09-16 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (141, 2, '2018-09-16 13:00:00', 'Buffalo Bi', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (142, 2, '2018-09-16 13:00:00', 'Green Bay ', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (143, 2, '2018-09-16 13:00:00', 'Tennessee ', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (144, 2, '2018-09-16 13:00:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (145, 2, '2018-09-16 13:00:00', 'New York J', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (146, 2, '2018-09-16 13:00:00', 'Pittsburgh', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (147, 2, '2018-09-16 13:00:00', 'Tampa Bay ', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (148, 2, '2018-09-16 13:00:00', 'Washington', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (149, 2, '2018-09-16 16:05:00', 'Los Angele', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (150, 2, '2018-09-16 16:05:00', 'San Franci', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (151, 2, '2018-09-16 16:25:00', 'Denver Bro', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (152, 2, '2018-09-16 16:25:00', 'Jacksonvil', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (153, 2, '2018-09-16 20:20:00', 'Dallas Cow', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (154, 2, '2018-09-17 20:15:00', 'Chicago Be', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (155, 3, '2018-09-20 20:20:00', 'Cleveland ', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (156, 3, '2018-09-23 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (157, 3, '2018-09-23 13:00:00', 'Kansas Cit', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (158, 3, '2018-09-23 13:00:00', 'Miami Dolp', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (159, 3, '2018-09-23 13:00:00', 'Minnesota ', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (160, 3, '2018-09-23 13:00:00', 'Philadelph', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (161, 3, '2018-09-23 13:00:00', 'Washington', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (162, 3, '2018-09-23 13:00:00', 'Carolina P', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (163, 3, '2018-09-23 13:00:00', 'Jacksonvil', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (164, 3, '2018-09-23 13:00:00', 'Baltimore ', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (165, 3, '2018-09-23 13:00:00', 'Houston Te', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (166, 3, '2018-09-23 16:05:00', 'Los Angele', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (167, 3, '2018-09-23 16:25:00', 'Arizona Ca', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (168, 3, '2018-09-23 16:25:00', 'Seattle Se', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (169, 3, '2018-09-23 20:20:00', 'Detroit Li', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (170, 3, '2018-09-24 20:15:00', 'Tampa Bay ', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (171, 4, '2018-09-27 20:20:00', 'Los Angele', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (172, 4, '2018-09-30 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (173, 4, '2018-09-30 13:00:00', 'Chicago Be', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (174, 4, '2018-09-30 13:00:00', 'Dallas Cow', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (175, 4, '2018-09-30 13:00:00', 'Green Bay ', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (176, 4, '2018-09-30 13:00:00', 'Tennessee ', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (177, 4, '2018-09-30 13:00:00', 'Indianapol', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (178, 4, '2018-09-30 13:00:00', 'New Englan', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (179, 4, '2018-09-30 13:00:00', 'Jacksonvil', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (180, 4, '2018-09-30 16:05:00', 'Oakland Ra', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (181, 4, '2018-09-30 16:05:00', 'Arizona Ca', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (182, 4, '2018-09-30 16:25:00', 'New York G', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (183, 4, '2018-09-30 16:25:00', 'Los Angele', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (184, 4, '2018-09-30 20:20:00', 'Pittsburgh', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (185, 4, '2018-10-01 20:15:00', 'Denver Bro', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (186, 5, '2018-10-04 20:20:00', 'New Englan', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (187, 5, '2018-10-07 13:00:00', 'Buffalo Bi', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (188, 5, '2018-10-07 13:00:00', 'Cincinnati', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (189, 5, '2018-10-07 13:00:00', 'Cleveland ', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (190, 5, '2018-10-07 13:00:00', 'Detroit Li', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (191, 5, '2018-10-07 13:00:00', 'Kansas Cit', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (192, 5, '2018-10-07 13:00:00', 'New York J', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (193, 5, '2018-10-07 13:00:00', 'Pittsburgh', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (194, 5, '2018-10-07 13:00:00', 'Carolina P', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (195, 5, '2018-10-07 16:05:00', 'Los Angele', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (196, 5, '2018-10-07 16:25:00', 'Philadelph', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (197, 5, '2018-10-07 16:25:00', 'San Franci', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (198, 5, '2018-10-07 16:25:00', 'Seattle Se', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (199, 5, '2018-10-07 20:20:00', 'Houston Te', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (200, 5, '2018-10-08 20:15:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (201, 6, '2018-10-11 20:20:00', 'New York G', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (202, 6, '2018-10-14 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (203, 6, '2018-10-14 13:00:00', 'Cincinnati', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (204, 6, '2018-10-14 13:00:00', 'Cleveland ', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (205, 6, '2018-10-14 13:00:00', 'Oakland Ra', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Tottenham Stadium, London'),
  (206, 6, '2018-10-14 13:00:00', 'Miami Dolp', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (207, 6, '2018-10-14 13:00:00', 'Minnesota ', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (208, 6, '2018-10-14 13:00:00', 'New York J', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (209, 6, '2018-10-14 13:00:00', 'Washington', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (210, 6, '2018-10-14 13:00:00', 'Houston Te', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (211, 6, '2018-10-14 16:05:00', 'Denver Bro', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (212, 6, '2018-10-14 16:25:00', 'Dallas Cow', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (213, 6, '2018-10-14 16:25:00', 'Tennessee ', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (214, 6, '2018-10-14 20:20:00', 'New Englan', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (215, 6, '2018-10-15 20:15:00', 'Green Bay ', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (216, 7, '2018-10-18 20:20:00', 'Arizona Ca', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (217, 7, '2018-10-21 09:30:00', 'Los Angele', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'Wembley Stadium, London'),
  (218, 7, '2018-10-21 13:00:00', 'Chicago Be', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (219, 7, '2018-10-21 13:00:00', 'Indianapol', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (220, 7, '2018-10-21 13:00:00', 'Kansas Cit', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (221, 7, '2018-10-21 13:00:00', 'Miami Dolp', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (222, 7, '2018-10-21 13:00:00', 'New York J', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (223, 7, '2018-10-21 13:00:00', 'Philadelph', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (224, 7, '2018-10-21 13:00:00', 'Tampa Bay ', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (225, 7, '2018-10-21 13:00:00', 'Jacksonvil', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (226, 7, '2018-10-21 16:05:00', 'Baltimore ', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (227, 7, '2018-10-21 16:25:00', 'Washington', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (228, 7, '2018-10-21 20:20:00', 'San Franci', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (229, 7, '2018-10-22 20:15:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (230, 8, '2018-10-25 20:20:00', 'Houston Te', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (231, 8, '2018-10-28 09:30:00', 'Jacksonvil', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'Wembley Stadium, London'),
  (232, 8, '2018-10-28 13:00:00', 'Chicago Be', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (233, 8, '2018-10-28 13:00:00', 'Cincinnati', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (234, 8, '2018-10-28 13:00:00', 'Detroit Li', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (235, 8, '2018-10-28 13:00:00', 'Kansas Cit', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (236, 8, '2018-10-28 13:00:00', 'New York G', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (237, 8, '2018-10-28 13:00:00', 'Pittsburgh', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (238, 8, '2018-10-28 13:00:00', 'Carolina P', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (239, 8, '2018-10-28 16:05:00', 'Oakland Ra', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (240, 8, '2018-10-28 16:25:00', 'Los Angele', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (241, 8, '2018-10-28 16:25:00', 'Arizona Ca', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (242, 8, '2018-10-28 20:20:00', 'Minnesota ', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (243, 8, '2018-10-29 20:15:00', 'Buffalo Bi', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (244, 9, '2018-11-01 20:20:00', 'San Franci', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (245, 9, '2018-11-04 13:00:00', 'Buffalo Bi', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (246, 9, '2018-11-04 13:00:00', 'Cleveland ', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (247, 9, '2018-11-04 13:00:00', 'Miami Dolp', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (248, 9, '2018-11-04 13:00:00', 'Minnesota ', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (249, 9, '2018-11-04 13:00:00', 'Washington', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (250, 9, '2018-11-04 13:00:00', 'Carolina P', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (251, 9, '2018-11-04 13:00:00', 'Baltimore ', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (252, 9, '2018-11-04 16:05:00', 'Denver Bro', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (253, 9, '2018-11-04 16:05:00', 'Seattle Se', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (254, 9, '2018-11-04 16:25:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (255, 9, '2018-11-04 20:20:00', 'New Englan', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (256, 9, '2018-11-05 20:15:00', 'Dallas Cow', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (257, 10, '2018-11-08 20:20:00', 'Pittsburgh', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (258, 10, '2018-11-11 13:00:00', 'Chicago Be', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (259, 10, '2018-11-11 13:00:00', 'Cincinnati', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (260, 10, '2018-11-11 13:00:00', 'Cleveland ', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (261, 10, '2018-11-11 13:00:00', 'Green Bay ', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (262, 10, '2018-11-11 13:00:00', 'Tennessee ', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (263, 10, '2018-11-11 13:00:00', 'Indianapol', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (264, 10, '2018-11-11 13:00:00', 'Kansas Cit', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (265, 10, '2018-11-11 13:00:00', 'New York J', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (266, 10, '2018-11-11 13:00:00', 'Tampa Bay ', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (267, 10, '2018-11-11 16:05:00', 'Oakland Ra', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (268, 10, '2018-11-11 16:25:00', 'Los Angele', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (269, 10, '2018-11-11 20:20:00', 'Philadelph', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (270, 10, '2018-11-12 20:15:00', 'San Franci', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (271, 11, '2018-11-15 20:20:00', 'Seattle Se', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (272, 11, '2018-11-18 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (273, 11, '2018-11-18 13:00:00', 'Chicago Be', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (274, 11, '2018-11-18 13:00:00', 'Detroit Li', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (275, 11, '2018-11-18 13:00:00', 'Indianapol', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (276, 11, '2018-11-18 13:00:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (277, 11, '2018-11-18 13:00:00', 'New York G', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (278, 11, '2018-11-18 13:00:00', 'Washington', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (279, 11, '2018-11-18 13:00:00', 'Baltimore ', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (280, 11, '2018-11-18 16:05:00', 'Arizona Ca', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (281, 11, '2018-11-18 16:05:00', 'Los Angele', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (282, 11, '2018-11-18 20:20:00', 'Jacksonvil', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (283, 11, '2018-11-19 20:15:00', 'Los Angele', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'Estadio Azteca, Mexico City'),
  (284, 12, '2018-11-22 12:30:00', 'Detroit Li', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (285, 12, '2018-11-22 16:30:00', 'Dallas Cow', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (286, 12, '2018-11-22 20:20:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (287, 12, '2018-11-25 13:00:00', 'Buffalo Bi', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (288, 12, '2018-11-25 13:00:00', 'Cincinnati', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (289, 12, '2018-11-25 13:00:00', 'Indianapol', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (290, 12, '2018-11-25 13:00:00', 'New York J', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (291, 12, '2018-11-25 13:00:00', 'Philadelph', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (292, 12, '2018-11-25 13:00:00', 'Tampa Bay ', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (293, 12, '2018-11-25 13:00:00', 'Carolina P', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (294, 12, '2018-11-25 13:00:00', 'Baltimore ', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (295, 12, '2018-11-25 16:05:00', 'Los Angele', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (296, 12, '2018-11-25 16:25:00', 'Denver Bro', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (297, 12, '2018-11-25 20:20:00', 'Minnesota ', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (298, 12, '2018-11-26 20:15:00', 'Houston Te', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (299, 13, '2018-11-29 20:20:00', 'Dallas Cow', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (300, 13, '2018-12-02 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (301, 13, '2018-12-02 13:00:00', 'Cincinnati', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (302, 13, '2018-12-02 13:00:00', 'Detroit Li', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (303, 13, '2018-12-02 13:00:00', 'Green Bay ', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (304, 13, '2018-12-02 13:00:00', 'Miami Dolp', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (305, 13, '2018-12-02 13:00:00', 'New York G', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (306, 13, '2018-12-02 13:00:00', 'Pittsburgh', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (307, 13, '2018-12-02 13:00:00', 'Tampa Bay ', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (308, 13, '2018-12-02 13:00:00', 'Jacksonvil', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (309, 13, '2018-12-02 13:00:00', 'Houston Te', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (310, 13, '2018-12-02 16:05:00', 'Tennessee ', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (311, 13, '2018-12-02 16:05:00', 'Oakland Ra', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (312, 13, '2018-12-02 16:25:00', 'New Englan', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (313, 13, '2018-12-02 20:20:00', 'Seattle Se', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (314, 13, '2018-12-03 20:15:00', 'Philadelph', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (315, 14, '2018-12-06 20:20:00', 'Tennessee ', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (316, 14, '2018-12-09 13:00:00', 'Buffalo Bi', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (317, 14, '2018-12-09 13:00:00', 'Chicago Be', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (318, 14, '2018-12-09 13:00:00', 'Cleveland ', NULL, 'Carolina Panthers', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (319, 14, '2018-12-09 13:00:00', 'Green Bay ', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (320, 14, '2018-12-09 13:00:00', 'Kansas Cit', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (321, 14, '2018-12-09 13:00:00', 'Miami Dolp', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (322, 14, '2018-12-09 13:00:00', 'Tampa Bay ', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (323, 14, '2018-12-09 13:00:00', 'Washington', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (324, 14, '2018-12-09 13:00:00', 'Houston Te', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (325, 14, '2018-12-09 16:05:00', 'Los Angele', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (326, 14, '2018-12-09 16:05:00', 'San Franci', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (327, 14, '2018-12-09 16:25:00', 'Dallas Cow', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (328, 14, '2018-12-09 16:25:00', 'Arizona Ca', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (329, 14, '2018-12-09 20:20:00', 'Oakland Ra', NULL, 'Pittsburgh Steelers', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (330, 14, '2018-12-10 20:15:00', 'Seattle Se', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (331, 15, '2018-12-13 20:20:00', 'Kansas Cit', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (332, 15, '2018-12-15 16:30:00', 'Denver Bro', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (333, 15, '2018-12-15 16:30:00', 'New York J', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (334, 15, '2018-12-16 13:00:00', 'Benz Stadi', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (335, 15, '2018-12-16 13:00:00', 'Buffalo Bi', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (336, 15, '2018-12-16 13:00:00', 'Chicago Be', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'Soldier Field'),
  (337, 15, '2018-12-16 13:00:00', 'Cincinnati', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'Paul Brown Stadium'),
  (338, 15, '2018-12-16 13:00:00', 'Indianapol', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (339, 15, '2018-12-16 13:00:00', 'Minnesota ', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (340, 15, '2018-12-16 13:00:00', 'New York G', NULL, 'Tennessee Titans', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (341, 15, '2018-12-16 13:00:00', 'Jacksonvil', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'EverBank Field'),
  (342, 15, '2018-12-16 13:00:00', 'Baltimore ', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (343, 15, '2018-12-16 16:05:00', 'San Franci', NULL, 'Seattle Seahawks', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (344, 15, '2018-12-16 16:25:00', 'Pittsburgh', NULL, 'New England Patriots', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (345, 15, '2018-12-16 20:20:00', 'Los Angele', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (346, 15, '2018-12-17 20:15:00', 'Carolina P', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (347, 16, '2018-12-23 13:00:00', 'Cleveland ', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'FirstEnergy Stadium'),
  (348, 16, '2018-12-23 13:00:00', 'Dallas Cow', NULL, 'Tampa Bay Buccaneers', NULL, NULL, 'NFL', 'AmFootball', 'AT&T Stadium'),
  (349, 16, '2018-12-23 13:00:00', 'Detroit Li', NULL, 'Minnesota Vikings', NULL, NULL, 'NFL', 'AmFootball', 'Ford Field'),
  (350, 16, '2018-12-23 13:00:00', 'Tennessee ', NULL, 'Washington Redskins', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (351, 16, '2018-12-23 13:00:00', 'Indianapol', NULL, 'New York Giants', NULL, NULL, 'NFL', 'AmFootball', 'Lucas Oil Stadium'),
  (352, 16, '2018-12-23 13:00:00', 'Miami Dolp', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'Hard Rock Stadium'),
  (353, 16, '2018-12-23 13:00:00', 'New Englan', NULL, 'Buffalo Bills', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (354, 16, '2018-12-23 13:00:00', 'New York J', NULL, 'Green Bay Packers', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (355, 16, '2018-12-23 13:00:00', 'Philadelph', NULL, 'Houston Texans', NULL, NULL, 'NFL', 'AmFootball', 'Lincoln Financial Field'),
  (356, 16, '2018-12-23 13:00:00', 'Carolina P', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Bank of America Stadium'),
  (357, 16, '2018-12-23 16:05:00', 'Arizona Ca', NULL, 'Los Angeles Rams', NULL, NULL, 'NFL', 'AmFootball', 'U of Phoenix Stadium'),
  (358, 16, '2018-12-23 16:05:00', 'Los Angele', NULL, 'Baltimore Ravens', NULL, NULL, 'NFL', 'AmFootball', 'StubHub Center'),
  (359, 16, '2018-12-23 16:05:00', 'San Franci', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'Levi\'s Stadium'),
  (360, 16, '2018-12-23 16:25:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (361, 16, '2018-12-23 20:20:00', 'Seattle Se', NULL, 'Kansas City Chiefs', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (362, 16, '2018-12-24 20:15:00', 'Oakland Ra', NULL, 'Denver Broncos', NULL, NULL, 'NFL', 'AmFootball', 'Oakland Coliseum'),
  (363, 17, '2018-12-30 13:00:00', 'Buffalo Bi', NULL, 'Miami Dolphins', NULL, NULL, 'NFL', 'AmFootball', 'New Era Field'),
  (364, 17, '2018-12-30 13:00:00', 'Green Bay ', NULL, 'Detroit Lions', NULL, NULL, 'NFL', 'AmFootball', 'Lambeau Field'),
  (365, 17, '2018-12-30 13:00:00', 'Tennessee ', NULL, 'Indianapolis Colts', NULL, NULL, 'NFL', 'AmFootball', 'Nissan Stadium'),
  (366, 17, '2018-12-30 13:00:00', 'Kansas Cit', NULL, 'Oakland Raiders', NULL, NULL, 'NFL', 'AmFootball', 'Arrowhead Stadium'),
  (367, 17, '2018-12-30 13:00:00', 'Minnesota ', NULL, 'Chicago Bears', NULL, NULL, 'NFL', 'AmFootball', 'U.S. Bank Stadium'),
  (368, 17, '2018-12-30 13:00:00', 'New Englan', NULL, 'New York Jets', NULL, NULL, 'NFL', 'AmFootball', 'Gillette Stadium'),
  (369, 17, '2018-12-30 13:00:00', 'Benz Super', NULL, 'New Orleans Saints', NULL, NULL, 'NFL', 'AmFootball', 'Mercedes'),
  (370, 17, '2018-12-30 13:00:00', 'New York G', NULL, 'Dallas Cowboys', NULL, NULL, 'NFL', 'AmFootball', 'MetLife Stadium'),
  (371, 17, '2018-12-30 13:00:00', 'Pittsburgh', NULL, 'Cincinnati Bengals', NULL, NULL, 'NFL', 'AmFootball', 'Heinz Field'),
  (372, 17, '2018-12-30 13:00:00', 'Tampa Bay ', NULL, 'Atlanta Falcons', NULL, NULL, 'NFL', 'AmFootball', 'Raymond James Stadium'),
  (373, 17, '2018-12-30 13:00:00', 'Washington', NULL, 'Philadelphia Eagles', NULL, NULL, 'NFL', 'AmFootball', 'FedEx Field'),
  (374, 17, '2018-12-30 13:00:00', 'Baltimore ', NULL, 'Cleveland Browns', NULL, NULL, 'NFL', 'AmFootball', 'M&T Bank Stadium'),
  (375, 17, '2018-12-30 13:00:00', 'Houston Te', NULL, 'Jacksonville Jaguars', NULL, NULL, 'NFL', 'AmFootball', 'NRG Stadium'),
  (376, 17, '2018-12-30 16:25:00', 'Denver Bro', NULL, 'Los Angeles Chargers', NULL, NULL, 'NFL', 'AmFootball', 'Sports Authority Field at Mile High'),
  (377, 17, '2018-12-30 16:25:00', 'Los Angele', NULL, 'San Francisco 49ers', NULL, NULL, 'NFL', 'AmFootball', 'Los Angeles Memorial Coliseum'),
  (378, 17, '2018-12-30 16:25:00', 'Seattle Se', NULL, 'Arizona Cardinals', NULL, NULL, 'NFL', 'AmFootball', 'CenturyLink Field'),
  (379, 0, '0000-00-00 00:00:00', 'homeID', 0, 'visitorID', 0, 'overt', 'tournament', 'sport', 'Location'),
  (380, 1, '2018-06-14 18:00:00', 'Russia', NULL, 'Saudi Arabia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Luzhniki Stadium, Moscow'),
  (381, 1, '2018-06-15 15:00:00', 'Egypt', NULL, 'Uruguay', NULL, NULL, 'Fifa World Cup', 'soccer', 'Ekaterinburg Stadium'),
  (382, 1, '2018-06-15 18:00:00', 'Morocco', NULL, 'Iran', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saint Petersburg Stadium'),
  (383, 1, '2018-06-15 21:00:00', 'Portugal', NULL, 'Spain', NULL, NULL, 'Fifa World Cup', 'soccer', 'Fisht Stadium, Sochi'),
  (384, 1, '2018-06-16 13:00:00', 'France', NULL, 'Australia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kazan Arena'),
  (385, 1, '2018-06-16 16:00:00', 'Argentina', NULL, 'Iceland', NULL, NULL, 'Fifa World Cup', 'soccer', 'Otkrytiye Arena, Moscow'),
  (386, 1, '2018-06-16 19:00:00', 'Peru', NULL, 'Denmark', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saransk Stadium'),
  (387, 1, '2018-06-16 22:00:00', 'Croatia', NULL, 'Nigeria', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kaliningrad Stadium'),
  (388, 1, '2018-06-17 15:00:00', 'Costa Rica', NULL, 'Serbia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Samara Stadium'),
  (389, 1, '2018-06-17 18:00:00', 'Germany', NULL, 'Mexico', NULL, NULL, 'Fifa World Cup', 'soccer', 'Luzhniki Stadium, Moscow'),
  (390, 1, '2018-06-17 21:00:00', 'Brazil', NULL, 'Switzerland', NULL, NULL, 'Fifa World Cup', 'soccer', 'Rostov-on-Don Stadium'),
  (391, 1, '2018-06-18 15:00:00', 'Sweden', NULL, 'Korea Republic', NULL, NULL, 'Fifa World Cup', 'soccer', 'Nizhny Novgorod Stadium'),
  (392, 1, '2018-06-18 18:00:00', 'Belgium', NULL, 'Panama', NULL, NULL, 'Fifa World Cup', 'soccer', 'Fisht Stadium, Sochi'),
  (393, 1, '2018-06-18 21:00:00', 'Tunisia', NULL, 'England', NULL, NULL, 'Fifa World Cup', 'soccer', 'Volgograd Stadium'),
  (394, 1, '2018-06-19 15:00:00', 'Colombia', NULL, 'Japan', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saransk Stadium'),
  (395, 1, '2018-06-19 18:00:00', 'Poland', NULL, 'Senegal', NULL, NULL, 'Fifa World Cup', 'soccer', 'Otkrytiye Arena, Moscow'),
  (396, 2, '2018-06-19 21:00:00', 'Russia', NULL, 'Egypt', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saint Petersburg Stadium'),
  (397, 2, '2018-06-20 15:00:00', 'Portugal', NULL, 'Morocco', NULL, NULL, 'Fifa World Cup', 'soccer', 'Luzhniki Stadium, Moscow'),
  (398, 2, '2018-06-20 18:00:00', 'Uruguay', NULL, 'Saudi Arabia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Rostov-on-Don Stadium'),
  (399, 2, '2018-06-20 21:00:00', 'Iran', NULL, 'Spain', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kazan Arena'),
  (400, 2, '2018-06-21 15:00:00', 'Denmark', NULL, 'Australia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Samara Stadium'),
  (401, 2, '2018-06-21 18:00:00', 'France', NULL, 'Peru', NULL, NULL, 'Fifa World Cup', 'soccer', 'Ekaterinburg Stadium'),
  (402, 2, '2018-06-21 21:00:00', 'Argentina', NULL, 'Croatia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Nizhny Novgorod Stadium'),
  (403, 2, '2018-06-22 15:00:00', 'Brazil', NULL, 'Costa Rica', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saint Petersburg Stadium'),
  (404, 2, '2018-06-22 18:00:00', 'Nigeria', NULL, 'Iceland', NULL, NULL, 'Fifa World Cup', 'soccer', 'Volgograd Stadium'),
  (405, 2, '2018-06-22 21:00:00', 'Serbia', NULL, 'Switzerland', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kaliningrad Stadium'),
  (406, 2, '2018-06-23 15:00:00', 'Belgium', NULL, 'Tunisia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Otkrytiye Arena, Moscow'),
  (407, 2, '2018-06-23 18:00:00', 'Korea Repu', NULL, 'Mexico', NULL, NULL, 'Fifa World Cup', 'soccer', 'Rostov-on-Don Stadium'),
  (408, 2, '2018-06-23 21:00:00', 'Germany', NULL, 'Sweden', NULL, NULL, 'Fifa World Cup', 'soccer', 'Fisht Stadium, Sochi'),
  (409, 2, '2018-06-24 15:00:00', 'England', NULL, 'Panama', NULL, NULL, 'Fifa World Cup', 'soccer', 'Nizhny Novgorod Stadium'),
  (410, 2, '2018-06-24 18:00:00', 'Japan', NULL, 'Senegal', NULL, NULL, 'Fifa World Cup', 'soccer', 'Ekaterinburg Stadium'),
  (411, 2, '2018-06-24 21:00:00', 'Poland', NULL, 'Colombia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kazan Arena'),
  (412, 3, '2018-06-25 17:00:00', 'Uruguay', NULL, 'Russia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Samara Stadium'),
  (413, 3, '2018-06-25 17:00:00', 'Saudi Arab', NULL, 'Egypt', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Volgograd Stadium'),
  (414, 3, '2018-06-25 21:00:00', 'Iran', NULL, 'Portugal', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saransk Stadium');
INSERT INTO `schedule` (`gameID`, `weekNum`, `gameTimeEastern`, `homeID`, `homeScore`, `visitorID`, `visitorScore`, `overtime`, `tournament`, `sport`, `location`)
VALUES
  (415, 3, '2018-06-25 21:00:00', 'Spain', NULL, 'Morocco', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Kaliningrad Stadium'),
  (416, 3, '2018-06-26 17:00:00', 'Denmark', NULL, 'France', NULL, NULL, 'Fifa World Cup', 'soccer', 'Luzhniki Stadium, Moscow'),
  (417, 3, '2018-06-26 17:00:00', 'Australia', NULL, 'Peru', NULL, NULL, 'Fifa World Cup', 'soccer', 'Fisht Stadium, Sochi'),
  (418, 3, '2018-06-26 21:00:00', 'Nigeria', NULL, 'Argentina', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saint Petersburg Stadium'),
  (419, 3, '2018-06-26 21:00:00', 'Iceland', NULL, 'Croatia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Rostov-on-Don Stadium'),
  (420, 3, '2018-06-27 17:00:00', 'Mexico', NULL, 'Sweden', NULL, NULL, 'Fifa World Cup', 'soccer', 'Ekaterinburg Stadium'),
  (421, 3, '2018-06-27 17:00:00', 'Korea Repu', NULL, 'Germany', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kazan Arena'),
  (422, 3, '2018-06-27 21:00:00', 'Serbia', NULL, 'Brazil', NULL, NULL, 'Fifa World Cup', 'soccer', 'Otkrytiye Arena, Moscow'),
  (423, 3, '2018-06-27 21:00:00', 'Switzerlan', NULL, 'Costa Rica', NULL, NULL, 'Fifa World Cup', 'soccer', 'Nizhny Novgorod Stadium'),
  (424, 3, '2018-06-28 17:00:00', 'Japan', NULL, 'Poland', NULL, NULL, 'Fifa World Cup', 'soccer', 'Volgograd Stadium'),
  (425, 3, '2018-06-28 17:00:00', 'Senegal', NULL, 'Colombia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Samara Stadium'),
  (426, 3, '2018-06-28 21:00:00', 'Panama', NULL, 'Tunisia', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saransk Stadium'),
  (427, 3, '2018-06-28 21:00:00', 'England', NULL, 'Belgium', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kaliningrad Stadium'),
  (428, 4, '2018-06-30 21:00:00', 'Winner Gro', NULL, 'Runner-up Group B	', NULL, NULL, 'Fifa World Cup', 'soccer', 'Fisht Stadium, Sochi'),
  (429, 4, '2018-06-30 21:00:00', 'Winner Gro', NULL, 'Runner-up Group D', NULL, NULL, 'Fifa World Cup', 'soccer', 'Kazan Arena'),
  (430, 4, '2018-07-01 17:00:00', 'Winner Gro', NULL, 'Runner-up Group A	', NULL, NULL, 'Fifa World Cup', 'soccer', 'Luzhniki Stadium, Moscow'),
  (431, 4, '2018-07-01 21:00:00', 'Winner Gro', NULL, 'Runner-up Group C', NULL, NULL, 'Fifa World Cup', 'soccer', 'Nizhny Novgorod Stadium'),
  (432, 4, '2018-07-02 17:00:00', 'Winner Gro', NULL, 'Runner-up Group F', NULL, NULL, 'Fifa World Cup', 'soccer', 'Samara Stadium'),
  (433, 4, '2018-07-02 21:00:00', 'Winner Gro', NULL, 'Runner-up Group H', NULL, NULL, 'Fifa World Cup', 'soccer', 'Rostov-on-Don Stadium'),
  (434, 4, '2018-07-03 17:00:00', 'Winner Gro', NULL, 'Runner-up Group E', NULL, NULL, 'Fifa World Cup', 'soccer', 'Saint Petersburg Stadium'),
  (435, 4, '2018-07-03 21:00:00', 'Winner Gro', NULL, 'Runner-up Group G', NULL, NULL, 'Fifa World Cup', 'soccer', 'Otkrytiye Arena, Moscow'),
  (436, 5, '2018-07-06 17:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Nizhny Novgorod Stadium'),
  (437, 5, '2018-07-06 21:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Kazan Arena'),
  (438, 5, '2018-07-07 17:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Samara Stadium'),
  (439, 5, '2018-07-07 21:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Fisht Stadium, Sochi'),
  (440, 5, '2018-07-10 21:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Saint Petersburg Stadium'),
  (441, 5, '2018-07-11 21:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Luzhniki Stadium, Moscow'),
  (442, 6, '2018-07-14 17:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Saint Petersburg Stadium'),
  (443, 6, '2018-07-15 18:00:00', 'To be anno', NULL, 'To be announced', NULL, NULL, 'Fifa World Cup', 'soccer',
        'Luzhniki Stadium, Moscow');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `sportID` INT(11)     NOT NULL AUTO_INCREMENT,
  `sport`   VARCHAR(20) NOT NULL,
  PRIMARY KEY (`sportID`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `teamID`   INT(11)     NOT NULL AUTO_INCREMENT,
  `teamName` VARCHAR(50) NOT NULL,
  `sport`    VARCHAR(25) NOT NULL,
  PRIMARY KEY (`teamID`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `tournamentID`   INT(11)     NOT NULL AUTO_INCREMENT,
  `tournamentName` VARCHAR(50) NOT NULL,
  `sport`          VARCHAR(50) NOT NULL,
  PRIMARY KEY (`tournamentID`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID`          INT(11)     NOT NULL AUTO_INCREMENT,
  `firstname`       VARCHAR(35) NOT NULL,
  `lastname`        VARCHAR(35) NOT NULL,
  `pword`           VARCHAR(30) NOT NULL,
  `email`           VARCHAR(40) NOT NULL,
  `phone`           VARCHAR(15) NOT NULL,
  `join_date`       TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date`     TIMESTAMP   NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance`         INT(11)     NOT NULL DEFAULT '0',
  `country`         VARCHAR(10) NOT NULL,
  `ip`              VARCHAR(15)          DEFAULT NULL,
  `is_admin`        VARCHAR(1)  NOT NULL DEFAULT 'n',
  `relatedAccounts` VARCHAR(50)          DEFAULT NULL,
  `username`        VARCHAR(30)          DEFAULT NULL,
  PRIMARY KEY (`userID`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `pword`, `email`, `phone`, `join_date`, `modify_date`, `balance`, `country`, `ip`, `is_admin`, `relatedAccounts`, `username`)
VALUES
  (1, 'Tim', 'Coetzee', 'root', 'lmg89is@gmail.com', '0956284050', '2018-05-04 11:19:06', '2018-05-04 11:19:06', 0,
      'TH', '127.0.0.1', 'y', NULL, 'timthetank'),
  (2, 'Lee', 'Germishuys', 'Lee', 'lee@pickem.com', '0956285400', '2018-05-04 11:26:15', '2018-05-04 11:26:15', 100,
      'ZA', '127', 'n', NULL, NULL),
  (3, 'Admin', 'Boss', 'admin', 'admin@gmail.com', '0956328555', '2018-05-11 05:00:37', '2018-05-11 05:00:37', 100000,
      'UK', '184.054.123', 'y', NULL, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
