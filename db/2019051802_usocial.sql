-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: usocial
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Current Database: `usocial`
--

CREATE DATABASE /*!32312 IF NOT EXISTS */ `usocial` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `usocial`;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment`
(
    `id`        int(11)  NOT NULL AUTO_INCREMENT,
    `id_user`   int(11)  NOT NULL,
    `id_post`   int(11)  NOT NULL,
    `html_text` text     NOT NULL,
    `created`   datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `comment_id_uindex` (`id`),
    KEY `fk_comment_user` (`id_user`),
    KEY `fk_comment_post` (`id_post`),
    CONSTRAINT `fk_comment_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_comment_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 33
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment`
    DISABLE KEYS */;
INSERT INTO `comment` (`id`, `id_user`, `id_post`, `html_text`, `created`, `modified`)
VALUES (13, 1, 2, 'PHAgc3R5bGU9J2NvbG9yOiByZWQ7Jz5UaGlzIGlzIGEgdGVzdCE8L3A+', '2019-05-13 22:43:24',
        '2019-05-13 22:43:24'),
       (14, 1, 2, 'PHAgc3R5bGU9J2NvbG9yOiByZWQ7Jz5UaGlzIGlzIGEgdGVzdCE8L3A+', '2019-05-13 22:57:47',
        '2019-05-13 22:57:47'),
       (15, 1, 2, 'PHAgc3R5bGU9J2NvbG9yOiBibHVlOyc+VGhpcyBpcyBhIHRlc3QhPC9wPg==', '2019-05-13 22:57:55',
        '2019-05-13 22:57:55'),
       (17, 1, 12, 'PHAgc3R5bGU9J2NvbG9yOiByZWQ7Jz5UaGlzIGlzIGEgdGVzdCE8L3A+', '2019-05-13 22:58:58',
        '2019-05-13 22:58:58'),
       (21, 1, 11, 'VGVzdGUgZGUgY29tZW504XJpby4gQ2FtYedhcmku', '2019-05-14 00:03:20', '2019-05-14 00:03:20'),
       (22, 1, 24, 'VGVzdGUgZGUgY29tZW504XJpby4=', '2019-05-14 00:03:49', '2019-05-14 00:03:49'),
       (23, 1, 25, 'VGVzdGUgZGUgY29tZW504XJpby4=', '2019-05-14 09:52:38', '2019-05-14 09:52:38'),
       (24, 12, 25, 'VGVzdGUu', '2019-05-18 11:57:10', '2019-05-18 11:57:10'),
       (25, 12, 25, 'VGVzdGUu', '2019-05-18 11:57:46', '2019-05-18 11:57:46'),
       (26, 12, 25, 'VGVzdGUu', '2019-05-18 11:57:55', '2019-05-18 11:57:55'),
       (27, 12, 25, 'VGVzdGUu', '2019-05-18 11:59:41', '2019-05-18 11:59:41'),
       (28, 12, 24, 'VGVzdGUu', '2019-05-18 12:00:58', '2019-05-18 12:00:58'),
       (29, 12, 24, 'VGVzdGUu', '2019-05-18 12:06:55', '2019-05-18 12:06:55'),
       (30, 12, 24, 'VGVzdGUuVGVzdGUuVGVzdGUu', '2019-05-18 12:07:08', '2019-05-18 12:07:08'),
       (31, 12, 24, 'VGVzdGUuVGVzdGUuVGVzdGUuVGVzdGUuVGVzdGUuVGVzdGUu', '2019-05-18 12:07:17', '2019-05-18 12:07:17'),
       (32, 12, 11, 'VGVzdGUuVGVzdGUuVGVzdGUu', '2019-05-18 12:07:22', '2019-05-18 12:07:22');
/*!40000 ALTER TABLE `comment`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend`
(
    `id`                int(11)    NOT NULL AUTO_INCREMENT,
    `id_user_requested` int(11)    NOT NULL,
    `id_user_accepted`  int(11)    NOT NULL,
    `accepted`          tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `friend_id_uindex` (`id`),
    KEY `fk_friend_user_01` (`id_user_requested`),
    KEY `fk_friend_user_02` (`id_user_accepted`),
    CONSTRAINT `fk_friend_user_01` FOREIGN KEY (`id_user_requested`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_friend_user_02` FOREIGN KEY (`id_user_accepted`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 60
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend`
--

LOCK TABLES `friend` WRITE;
/*!40000 ALTER TABLE `friend`
    DISABLE KEYS */;
INSERT INTO `friend` (`id`, `id_user_requested`, `id_user_accepted`, `accepted`)
VALUES (17, 2, 11, 1),
       (18, 2, 9, 0),
       (19, 2, 8, 0),
       (20, 2, 10, 0),
       (22, 2, 3, 0),
       (23, 2, 4, 0),
       (24, 2, 5, 0),
       (25, 2, 6, 0),
       (26, 2, 7, 0),
       (28, 1, 2, 1),
       (29, 12, 11, 1),
       (30, 12, 9, 0),
       (31, 12, 8, 0),
       (32, 12, 10, 0),
       (33, 12, 2, 0),
       (34, 12, 1, 1),
       (35, 12, 3, 0),
       (36, 12, 4, 0),
       (37, 12, 5, 0),
       (38, 12, 6, 0),
       (39, 12, 7, 0),
       (40, 11, 9, 0),
       (41, 11, 8, 0),
       (42, 11, 10, 0),
       (43, 11, 1, 1),
       (44, 11, 3, 0),
       (45, 11, 4, 0),
       (46, 11, 5, 0),
       (47, 11, 6, 0),
       (48, 11, 7, 0),
       (49, 1, 9, 0),
       (50, 1, 8, 0),
       (51, 1, 10, 0),
       (52, 1, 3, 0),
       (53, 1, 4, 0),
       (54, 1, 5, 0),
       (55, 1, 6, 0),
       (56, 1, 7, 0),
       (57, 13, 12, 0),
       (58, 13, 11, 0),
       (59, 13, 1, 0);
/*!40000 ALTER TABLE `friend`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like`
(
    `id`      int(11) NOT NULL AUTO_INCREMENT,
    `id_user` int(11) NOT NULL,
    `id_post` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `like_id_uindex` (`id`),
    UNIQUE KEY `like_uindex_id_user_id_post` (`id_user`, `id_post`),
    KEY `fk_like_post` (`id_post`),
    CONSTRAINT `fk_like_post` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `lfk_like_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 255
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like`
    DISABLE KEYS */;
INSERT INTO `like` (`id`, `id_user`, `id_post`)
VALUES (249, 1, 2),
       (254, 1, 11),
       (251, 1, 12);
/*!40000 ALTER TABLE `like`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post`
(
    `id`        int(11)  NOT NULL AUTO_INCREMENT,
    `id_user`   int(11)  NOT NULL,
    `html_text` text     NOT NULL,
    `photo`     text     NOT NULL,
    `created`   datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `post_id_uindex` (`id`),
    KEY `fk_post_user` (`id_user`),
    CONSTRAINT `fk_post_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 27
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post`
    DISABLE KEYS */;
INSERT INTO `post` (`id`, `id_user`, `html_text`, `photo`, `created`, `modified`)
VALUES (2, 2, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (3, 3, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (4, 4, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (5, 5, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (6, 6, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (7, 7, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (8, 8, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (9, 9, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (10, 10, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (11, 11, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (12, 12, '<p style=\'color: red;\'>This is a test!</p>',
        'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png', '2019-05-12 11:22:39',
        '2019-05-12 11:22:39'),
       (24, 1, 'Teste de comentÃ¡rio.', 'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png',
        '2019-05-14 00:03:44', '2019-05-14 10:35:28'),
       (25, 1, 'Teste de post.', 'http://www.liberaldictionary.com/wp-content/uploads/2018/11/test-1.png',
        '2019-05-14 09:52:34', '2019-05-14 10:35:39'),
       (26, 13, 'Alone.', 'Alone.', '2019-05-14 09:54:52', '2019-05-14 09:54:52');
/*!40000 ALTER TABLE `post`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `username` varchar(32)  NOT NULL,
    `password` varchar(16)  NOT NULL,
    `email`    varchar(100) NOT NULL,
    `photo`    text,
    PRIMARY KEY (`id`),
    UNIQUE KEY `login_uindex` (`username`),
    UNIQUE KEY `user_id_uindex` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 15
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user`
    DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `email`, `photo`)
VALUES (1, 'rios0rios0', '123456', 'felipe.rios.silva@outlook.com',
        'https://assets.fireside.fm/file/fireside-images/podcasts/images/b/bc7f1faf-8aad-4135-bb12-83a8af679756/cover_medium.jpg'),
       (2, 'lcordeirosoares', '123456', 'lcordeiro.soares@gmail.com', NULL),
       (3, 'teste01', '123456', 'teste01@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (4, 'teste02', '123456', 'teste02@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (5, 'teste03', '123456', 'teste03@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (6, 'teste04', '123456', 'teste04@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (7, 'teste05', '123456', 'teste05@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (8, 'felipecordeiro5', '123456', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (9, 'felipecordeiro2', '123456', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (10, 'felipecordeiro50', '123456', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (11, 'felipecordeiro19', '12345', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (12, 'felipecordeiro12', '123456', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (13, 'eduardojesus0', '123456789', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg'),
       (14, 'felipecordeiro79', '123456', 'felipe.rios.silva@outlook.com',
        'https://avatars.servers.getgo.com/2205256774854474505_medium.jpg');
/*!40000 ALTER TABLE `user`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2019-05-18 23:29:50
