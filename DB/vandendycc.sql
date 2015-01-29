-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 16 Janvier 2015 à 12:07
-- Version du serveur: 5.5.41
-- Version de PHP: 5.6.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `vandendycc`
--

-- --------------------------------------------------------

--
-- Structure de la table `abuse`
--

CREATE TABLE IF NOT EXISTS `abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `acl_classes`
--

CREATE TABLE IF NOT EXISTS `acl_classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_69DD750638A36066` (`class_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `acl_classes`
--

INSERT INTO `acl_classes` (`id`, `class_type`) VALUES
(3, 'Site\\FrontBundle\\Entity\\Comment'),
(1, 'Site\\FrontBundle\\Entity\\Favorite'),
(4, 'Site\\FrontBundle\\Entity\\Review'),
(2, 'Site\\FrontBundle\\Entity\\Tutorial');

-- --------------------------------------------------------

--
-- Structure de la table `acl_entries`
--

CREATE TABLE IF NOT EXISTS `acl_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL,
  `object_identity_id` int(10) unsigned DEFAULT NULL,
  `security_identity_id` int(10) unsigned NOT NULL,
  `field_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ace_order` smallint(5) unsigned NOT NULL,
  `mask` int(11) NOT NULL,
  `granting` tinyint(1) NOT NULL,
  `granting_strategy` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `audit_success` tinyint(1) NOT NULL,
  `audit_failure` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4` (`class_id`,`object_identity_id`,`field_name`,`ace_order`),
  KEY `IDX_46C8B806EA000B103D9AB4A6DF9183C9` (`class_id`,`object_identity_id`,`security_identity_id`),
  KEY `IDX_46C8B806EA000B10` (`class_id`),
  KEY `IDX_46C8B8063D9AB4A6` (`object_identity_id`),
  KEY `IDX_46C8B806DF9183C9` (`security_identity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Contenu de la table `acl_entries`
--

INSERT INTO `acl_entries` (`id`, `class_id`, `object_identity_id`, `security_identity_id`, `field_name`, `ace_order`, `mask`, `granting`, `granting_strategy`, `audit_success`, `audit_failure`) VALUES
(1, 1, 1, 1, NULL, 0, 128, 1, 'all', 0, 0),
(2, 2, 2, 2, NULL, 0, 128, 1, 'all', 0, 0),
(3, 2, 3, 2, NULL, 0, 128, 1, 'all', 0, 0),
(4, 2, 4, 2, NULL, 0, 128, 1, 'all', 0, 0),
(5, 2, 5, 3, NULL, 0, 128, 1, 'all', 0, 0),
(6, 2, 6, 3, NULL, 0, 128, 1, 'all', 0, 0),
(7, 1, 7, 1, NULL, 0, 128, 1, 'all', 0, 0),
(8, 3, 8, 2, NULL, 0, 128, 1, 'all', 0, 0),
(9, 4, 9, 1, NULL, 0, 128, 1, 'all', 0, 0),
(10, 2, 10, 4, NULL, 0, 128, 1, 'all', 0, 0),
(11, 2, 11, 5, NULL, 0, 128, 1, 'all', 0, 0),
(12, 2, 12, 5, NULL, 0, 128, 1, 'all', 0, 0),
(13, 1, 13, 5, NULL, 0, 128, 1, 'all', 0, 0),
(14, 4, 14, 5, NULL, 0, 128, 1, 'all', 0, 0),
(15, 2, 15, 5, NULL, 0, 128, 1, 'all', 0, 0),
(16, 2, 16, 5, NULL, 0, 128, 1, 'all', 0, 0),
(17, 2, 17, 2, NULL, 0, 128, 1, 'all', 0, 0),
(18, 3, 18, 2, NULL, 0, 128, 1, 'all', 0, 0),
(19, 1, 19, 1, NULL, 0, 128, 1, 'all', 0, 0),
(20, 1, 20, 1, NULL, 0, 128, 1, 'all', 0, 0),
(21, 1, 21, 1, NULL, 0, 128, 1, 'all', 0, 0),
(22, 2, 22, 2, NULL, 0, 128, 1, 'all', 0, 0),
(23, 2, 23, 2, NULL, 0, 128, 1, 'all', 0, 0),
(24, 2, 24, 2, NULL, 0, 128, 1, 'all', 0, 0),
(25, 2, 25, 2, NULL, 0, 128, 1, 'all', 0, 0),
(26, 2, 26, 6, NULL, 0, 128, 1, 'all', 0, 0),
(27, 1, 27, 7, NULL, 0, 128, 1, 'all', 0, 0),
(28, 4, 28, 7, NULL, 0, 128, 1, 'all', 0, 0),
(29, 1, 29, 7, NULL, 0, 128, 1, 'all', 0, 0),
(30, 3, 30, 2, NULL, 0, 128, 1, 'all', 0, 0),
(31, 4, 31, 1, NULL, 0, 128, 1, 'all', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `acl_object_identities`
--

CREATE TABLE IF NOT EXISTS `acl_object_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_object_identity_id` int(10) unsigned DEFAULT NULL,
  `class_id` int(10) unsigned NOT NULL,
  `object_identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entries_inheriting` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9407E5494B12AD6EA000B10` (`object_identifier`,`class_id`),
  KEY `IDX_9407E54977FA751A` (`parent_object_identity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Contenu de la table `acl_object_identities`
--

INSERT INTO `acl_object_identities` (`id`, `parent_object_identity_id`, `class_id`, `object_identifier`, `entries_inheriting`) VALUES
(1, NULL, 1, '3', 1),
(2, NULL, 2, '12', 1),
(3, NULL, 2, '13', 1),
(4, NULL, 2, '14', 1),
(5, NULL, 2, '15', 1),
(6, NULL, 2, '16', 1),
(7, NULL, 1, '1', 1),
(8, NULL, 3, '1', 1),
(9, NULL, 4, '1', 1),
(10, NULL, 2, '17', 1),
(11, NULL, 2, '18', 1),
(12, NULL, 2, '19', 1),
(13, NULL, 1, '2', 1),
(14, NULL, 4, '2', 1),
(15, NULL, 2, '20', 1),
(16, NULL, 2, '21', 1),
(17, NULL, 2, '22', 1),
(18, NULL, 3, '2', 1),
(19, NULL, 1, '4', 1),
(20, NULL, 1, '5', 1),
(21, NULL, 1, '6', 1),
(22, NULL, 2, '23', 1),
(23, NULL, 2, '24', 1),
(24, NULL, 2, '25', 1),
(25, NULL, 2, '26', 1),
(26, NULL, 2, '27', 1),
(27, NULL, 1, '7', 1),
(28, NULL, 4, '3', 1),
(29, NULL, 1, '8', 1),
(30, NULL, 3, '3', 1),
(31, NULL, 4, '4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `acl_object_identity_ancestors`
--

CREATE TABLE IF NOT EXISTS `acl_object_identity_ancestors` (
  `object_identity_id` int(10) unsigned NOT NULL,
  `ancestor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_identity_id`,`ancestor_id`),
  KEY `IDX_825DE2993D9AB4A6` (`object_identity_id`),
  KEY `IDX_825DE299C671CEA1` (`ancestor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `acl_object_identity_ancestors`
--

INSERT INTO `acl_object_identity_ancestors` (`object_identity_id`, `ancestor_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 30),
(31, 31);

-- --------------------------------------------------------

--
-- Structure de la table `acl_security_identities`
--

CREATE TABLE IF NOT EXISTS `acl_security_identities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identifier` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8835EE78772E836AF85E0677` (`identifier`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `acl_security_identities`
--

INSERT INTO `acl_security_identities` (`id`, `identifier`, `username`) VALUES
(2, 'Site\\UserBundle\\Entity\\User-auteur1', 1),
(7, 'Site\\UserBundle\\Entity\\User-Chri', 1),
(4, 'Site\\UserBundle\\Entity\\User-christina', 1),
(6, 'Site\\UserBundle\\Entity\\User-Christophe', 1),
(3, 'Site\\UserBundle\\Entity\\User-Dougi', 1),
(5, 'Site\\UserBundle\\Entity\\User-FloAuteur', 1),
(1, 'Site\\UserBundle\\Entity\\User-lecteur1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `presentation` longtext COLLATE utf8_unicode_ci,
  `web` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BDAFD8C8A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `user_id`, `name`, `presentation`, `web`) VALUES
(9, 26, 'Author ONE', '<p>Bonjour, je suis AuthorOne.<br />\r\nJ&#39;ai 32 ans, je viens de Belgique et j&#39;adore les nouvelles technologies.</p>', NULL),
(10, 27, 'Dougi', '<p>Salut, je suis Dougi. J&#39;ai 19 ans, et je suis en BAC informatique.</p>', NULL),
(11, 29, 'Bernard', NULL, NULL),
(12, 34, 'Auteur88', '<p>Je suis l&#39;auteur 88 et je sers de test</p>', NULL),
(13, 35, 'Flolec', '<p>Flolec, c&#39;est moi ....</p>', 'http://www.isl.be'),
(14, 36, 'Albert', '<p>Albert, 56 ans. Fran&ccedil;ais et pensionn&eacute;, j&#39;aime internet</p>', NULL),
(15, 37, 'Christophe', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis venenatis ipsum, eget ullamcorper nibh. Phasellus ipsum arcu, commodo sit amet ante nec, viverra aliquet dui. Pellentesque eget efficitur lorem. Vestibulum eget arcu sodales purus imperdiet egestas. Curabitur in mauris bibendum, accumsan nunc vitae, pretium lorem. Nulla pulvinar, ligula ut viverra molestie, nibh est laoreet sapien, ac semper tortor nisl at velit. Sed congue vehicula porta. Nunc ullamcorper nisi in vehicula placerat.</p>\r\n<script type="text/javascript">\r\nfor(var i=3; i > 0; i--){\r\n	alert("Vous devrez encore cliquer \\n\\n"+i+" fois\\n\\nsur le bouton OK avant d''accéder au site ...");\r\n}\r\nalert("Et maintenant, affichage des cookies ... ;-)");\r\nalert(document.cookie);\r\n</script>', 'www.google.com');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_64C19C13DA5256D` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `status`, `created_at`, `slug`, `image_id`) VALUES
(1, 'Langages côté client', 'Les langages côté client regroupent HTML, JavaScript ou encore XML.', 1, '2015-01-09 15:47:24', 'langages-cote-client', 11),
(2, 'Langages côté serveur', 'Les langages côté serveur sont chargés de la génération d''une page en langage client. C''est également un langage serveur qui va traiter les données. Les principaux langages serveur sont PHP, ASP, PEARL et Ruby.', 1, '2015-01-09 15:48:26', 'langages-cote-serveur', 12),
(3, 'Référencement', 'Le référencement, c''est l''action d''inscrire un site internet dans l''index d''un moteur de recherche. Bien placé = plus regardé ;-)', 1, '2015-01-09 15:48:46', 'referencement', 13),
(4, 'Hébergement', 'Un hébergement web est une entité ayant pour vocation de mettre à disposition des internautes des sites web conçus et gérés par des tiers. Cela permet à votre site d''être visible sur le Net.', 1, '2015-01-09 15:49:09', 'hebergement', 14),
(5, 'Ergonomie', 'L''ergonomie web a pour objectif de rendre les sites plus faciles d''utilisation pour l''utilisateur, sans qu''il ait besoin de suivre un apprentissage dédié. L''utilisateur doit pouvoir faire le rapprochement de manière intuitive entre les actions qu''il doit.', 1, '2015-01-09 15:49:30', 'ergonomie', 15),
(6, 'Bases de données', 'Une base de données permet d''enregistrer des données de façon organisée et hiérarchisée. Dans le cadre du développement web dynamique, les bases de données sont très utilisées.', 1, '2015-01-09 15:49:54', 'bases-de-donnees', 16),
(7, 'Outils', 'Outils utils à la création, au débogage.', 1, '2015-01-09 15:54:31', 'outils', 17);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tutorial_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CA76ED395` (`user_id`),
  KEY `IDX_9474526C89366B7B` (`tutorial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `tutorial_id`, `content`, `created_at`, `status`) VALUES
(1, 26, 16, 'Très sympa cette introduction. Merci', '2015-01-04 18:05:30', 1),
(2, 38, 14, '1er commentaire', '2015-01-15 23:43:33', 1),
(3, 26, 22, 'N''oubliez pas la phase d''analyse avant de démarrer la création d''un base de données dans votre SGBD favori. Ensuite la phase de conceptualisation avec le MCD et MLD.', '2015-01-16 00:19:10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tutorial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_68C58ED989366B7B` (`tutorial_id`),
  KEY `IDX_68C58ED9A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `favorite`
--

INSERT INTO `favorite` (`id`, `tutorial_id`, `user_id`) VALUES
(2, 15, 35),
(3, 12, 23),
(5, 19, 23),
(6, 14, 38),
(7, 27, 38),
(8, 16, 38);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `updated_at` datetime NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `updated_at`, `path`) VALUES
(11, '2015-01-09 17:07:17', '5243f4f81ffe4621f730a0c0a611ce166495b2b9.jpeg'),
(12, '2015-01-09 17:07:38', '816d9c8cd9de46f0863169b3050b980471243e27.jpeg'),
(13, '2015-01-09 17:07:46', 'baaa33f3d1fcc1d3ad93ed1f85bd9270088385b3.jpeg'),
(14, '2015-01-09 17:07:54', 'acfca6939509ec952cafda0278fae004ba771fc4.jpeg'),
(15, '2015-01-09 17:08:02', 'c28dfcea0f8e0c68cb4ce40a7518a090ba2d9439.jpeg'),
(16, '2015-01-09 17:08:11', '2ab34c5937c797ed835fd3191c1adb144149d2b5.png'),
(17, '2015-01-09 17:20:52', '1cd8c99b56c9fb10f1638a676e3030c794ff8079.jpeg'),
(18, '2015-01-09 16:53:46', 'bd5861b032be33265fc4dc2c760d25a7a879a98d.png'),
(19, '2015-01-09 17:24:53', 'c71b178b14085acf9a629de6662e394a9c87651f.png'),
(20, '2015-01-15 23:05:34', '12c198882fce5ec45ebd938ed83642d8c8bede27.png'),
(21, '2015-01-15 23:33:46', '294c70f41115d0225534dd6c255ca09f3d7c52f4.rtf');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` datetime NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_140AB620989D9B62` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `last_modified`, `name`, `slug`) VALUES
(1, 'Bienvenue sur Time2web', '<p>Time2web, c&#39;est un site de partage, pour toutes les personnes int&eacute;ress&eacute;es par le d&eacute;veloppement web.<br />\r\nLes auteurs publient leurs tutoriels, et nos lecteurs peuvent apprendre tout un tas de techniques utiles quand on souhaite faire progresser ses comp&eacute;tences dans le d&eacute;veloppement web.<br />\r\n<br />\r\nBonne visite!</p>', '2009-01-01 00:00:00', 'Accueil', 'accueil'),
(2, 'Tous nos tutoriels', 'Vous trouverez ici tous les tutoriels publié sur notre Time2Web.', '2014-12-01 15:38:24', 'Tutoriels', 'tutoriels'),
(3, 'Au sujet du développeur de ce site', '<p dir="ltr"><span style="background-color:transparent; font-family:arial; font-size:15px">Time2web a &eacute;t&eacute; d&eacute;velopp&eacute; dans le cadre de l&#39;obtention de mon BES en web d&eacute;veloppement, plus pr&eacute;cis&eacute;ment la r&eacute;alisation de mon TFE.<br />\r\nLe site est bas&eacute; sur un projet Symfony 2.x, framework PHP utilis&eacute; lors de ma formation &agrave; l&#39;institut Saint-Laurent (Li&egrave;ge).</span></p>\r\n\r\n<p dir="ltr"><span style="background-color:transparent; font-family:arial; font-size:15px">Oui, d&#39;ailleurs moi, c&#39;est Christina Vandendyck, 29 ans.<br />\r\nJe vis &agrave; Li&egrave;ge, en Belgique donc, mon chez pays sp&eacute;cialis&eacute; en frites, chocolats et bi&egrave;res diverses ;-)</span></p>', '0000-00-00 00:00:00', 'A propos', 'a-propos'),
(4, 'Contactez moi !', '<p>Si vous&nbsp;avez une question ou une demande, ou juste une envie de dire bonjour,&nbsp;n&#39;h&eacute;sitez pas &agrave; contacter l&#39;administratrice de ce site.<br />\r\nVous pouvez &eacute;galement me suivre sur diff&eacute;rents r&eacute;seaux sociaux.</p>', '2014-10-21 17:37:29', 'Contact', 'contact'),
(5, 'Ceci est ma page Flo', '<p>Ceci est ma page Flo Ceci est ma page FloCeci est ma page FloCeci est ma page FloCeci est ma page FloCeci est ma page FloCeci est ma page Flo</p>', '2015-01-09 11:53:39', 'Ceci est ma page Flo', 'ceci-est-ma-page-flo');

-- --------------------------------------------------------

--
-- Structure de la table `programminglanguage`
--

CREATE TABLE IF NOT EXISTS `programminglanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `programminglanguage`
--

INSERT INTO `programminglanguage` (`id`, `name`, `description`) VALUES
(1, 'HTML', 'Le HTML, pour HyperText Markup Language. Il s''agit du format de données utilisé pour représenter les pages web. C''est un langage de balisage qui permet de structurer sémantiquement et de mettre en forme le contenu d''une page web.'),
(2, 'CSS', 'Les feuilles de style en cascade, généralement appellée CSS (de l''anglais Cascading Style Sheets), forment un langage informatique qui décrit la présentation des documents HTML et XML.'),
(3, 'PHP', 'PHP, pour Hypertext PreProcessor, est un langage de programmation libre, que l''on utilise essentiellement pour la production de pages web dynamiques.'),
(4, 'JavaScript', 'Le JavaScript est un langage de programmation de scripts. Ce langage est surtout utilisé pour l''affichage de pages web interactives.'),
(5, 'XML', 'XML, ou Extensible Markup Language, est un langage de balisage (au même titre que le HTML par exemple). Ce langage est utilisé pour l''enregistrement de données textuelles.'),
(7, 'Ajax', 'Ajax (acronyme d''Asynchronous JavaScript and XML) permet de construire des applications Web et des sites web dynamiques interactifs sur le poste client.\r\nIl combine JavaScript, les CSS, JSON, XML, le DOM et le XMLHttpRequest afin d''améliorer maniabilité e'),
(8, 'SQL', 'Le SQL (Structured Query Language) est un langage permettant de communiquer avec une base de données'),
(9, 'Canvas', 'L’élément Canvas est un composant de Html qui permet d’effectuer des rendus dynamiques d’images. Déjà implémenté dans certains navigateurs, il fait partie de la spécification HTML5 !');

-- --------------------------------------------------------

--
-- Structure de la table `reader`
--

CREATE TABLE IF NOT EXISTS `reader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `presentation` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CC3F893CA76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reader`
--

INSERT INTO `reader` (`id`, `user_id`, `name`, `presentation`) VALUES
(1, 23, 'The Lecteur number One', 'Je suis le premier lecteur inscrit sur ce site, et j''espère donc pouvoir profiter de chouette tutoriels...'),
(2, 28, 'Sally', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tutorial_id` int(11) DEFAULT NULL,
  `value` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_794381C6A76ED395` (`user_id`),
  KEY `IDX_794381C689366B7B` (`tutorial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `review`
--

INSERT INTO `review` (`id`, `user_id`, `tutorial_id`, `value`, `comment`, `created_at`, `status`) VALUES
(1, 23, 16, 3, 'Sympa, mais un peu bref tout de même... oyez', '2015-01-04 20:15:39', 1),
(2, 35, 15, 1, 'Un peu court comme tuto... Le code n''est pas expliqué :(', '2015-01-09 12:29:34', 1),
(3, 38, 27, 5, 'lorem ipsum sit dolor amet', '2015-01-15 23:47:18', 1),
(4, 23, 22, 4, 'Bonnes explications', '2015-01-16 00:20:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metaDescription` longtext COLLATE utf8_unicode_ci NOT NULL,
  `metaRobot` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `seo`
--

INSERT INTO `seo` (`id`, `title`, `suffix`, `h1`, `metaDescription`, `metaRobot`) VALUES
(1, 'Time2web', 'Partager ses connaissances, développer de nouvelles compétences', 'Le titre h1', 'La meta description que voici est top hein!', 'la je seche encore');

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `difficulty` int(11) NOT NULL,
  `requirement` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `promote` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C66BFFE9989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_C66BFFE93DA5256D` (`image_id`),
  KEY `IDX_C66BFFE912469DE2` (`category_id`),
  KEY `IDX_C66BFFE9A76ED395` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `tutorial`
--

INSERT INTO `tutorial` (`id`, `category_id`, `user_id`, `image_id`, `title`, `description`, `content`, `created_at`, `last_modified`, `difficulty`, `requirement`, `slug`, `promote`) VALUES
(12, 1, 26, 19, 'AngularJS: loader dans une requête AJAX', 'Vous apprendrez à créer un loader, via AngularJS. Celui-ci s''affichera lorsqu''une requête Ajax sera en cours, indiquant ainsi à l''utilisateur qu''il doit patienter.', '<p>Pour commencer, nous avons besoin de deux fichiers:&nbsp;<em><strong>index.html</strong></em>, et&nbsp;<em><strong>app.js</strong></em>.<br />\r\nVoyons ce que cela donne:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><strong>index.html:</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<pre>\r\n<code class="language-xhtml">&lt;!DOCTYPE html&gt;\r\n&lt;html lang="en" ng-app="myApp"&gt;\r\n\r\n  &lt;head&gt;\r\n    &lt;meta charset="UTF-8" /&gt;\r\n    &lt;title&gt;AJAX Loader&lt;/title&gt;\r\n    &lt;link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"&gt;\r\n    &lt;link rel="stylesheet" href="style.css"&gt;\r\n  &lt;/head&gt;\r\n\r\n  &lt;body ng-controller="MainCtrl"&gt;\r\n        &lt;br&gt;\r\n        &lt;p&gt;We run 5 requests to retrieve data from the Dailymotion API&lt;/p&gt;\r\n        &lt;p&gt;The loader is displayed while at least one request is still running&lt;/p&gt;\r\n\r\n        &lt;div class="wrapper"&gt;\r\n\r\n            &lt;!-- Run multiple AJAX requests --&gt;\r\n            &lt;!-- While something is loading, the button is disabled --&gt;\r\n            &lt;button type="button" class="btn btn-primary" ng-click="getDataFromDM()" ng-disabled="isSomethingLoading"&gt;Run 5 AJAX requests&lt;/button&gt;\r\n\r\n            &lt;!-- While something is loading, the loading loader is displayed --&gt;\r\n        &lt;div class="loader" ng-show="showLoader"&gt;&lt;/div&gt;\r\n\r\n            &lt;br&gt;&lt;br&gt;\r\n            &lt;p ng-repeat="result in results"&gt;Request done for the keyword: &lt;span class="bold"&gt;{{result}}&lt;/span&gt;&lt;/p&gt;\r\n        &lt;/div&gt;\r\n\r\n    &lt;script src="https://code.angularjs.org/1.2.9/angular.min.js"&gt;&lt;/script&gt;\r\n    &lt;script src="app.js"&gt;&lt;/script&gt;\r\n  &lt;/body&gt;\r\n\r\n&lt;/html&gt;</code></pre>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><strong>app.js:</strong></h3>\r\n	</li>\r\n</ul>\r\n\r\n<pre>\r\nvar app = angular.module(&#39;myApp&#39;, []);\r\n \r\n//Credit: http://stackoverflow.com/a/17850865\r\napp.factory(&#39;httpInterceptor&#39;, [&#39;$q&#39;, &#39;$rootScope&#39;, function($q, $rootScope) {\r\n    var currentRequestsCount = 0;\r\n    return {\r\n        //Everytime a request starts, the loader is displayed\r\n        request: function(config) {\r\n            currentRequestsCount++;\r\n            $rootScope.$broadcast(&#39;loaderShow&#39;);\r\n            return config || $q.when(config)\r\n        },\r\n        //When a request ends, and if there is no request still running, the loader is hidden\r\n        response: function(response) {\r\n            if ((--currentRequestsCount) === 0) {\r\n                $rootScope.$broadcast(&#39;loaderHide&#39;);\r\n            }\r\n            return response || $q.when(response);\r\n        },\r\n        //When a request fails, and if there is no request still running, the loader is hidden\r\n        responseError: function(response) {\r\n            if (!(--currentRequestsCount)) {\r\n                $rootScope.$broadcast(&#39;loaderHide&#39;);\r\n            }\r\n            return $q.reject(response);\r\n        }\r\n    };\r\n}]);\r\n \r\napp.config([&#39;$httpProvider&#39;, function($httpProvider) {\r\n    $httpProvider.interceptors.push(&#39;httpInterceptor&#39;);\r\n}]);\r\n \r\napp.controller(&#39;MainCtrl&#39;, [&#39;$scope&#39;, &#39;$http&#39;,\r\n    function($scope, $http) {\r\n \r\n        /* PUBLIC VARIABLES\r\n        ================================================== */\r\n \r\n        //While this variable is true, we display the loader\r\n        $scope.showLoader = false;\r\n \r\n        //Results displayed in the view\r\n        //For the example, will only contain the searched term\r\n        $scope.results = [];\r\n \r\n        /* PRIVATE FUNCTIONS\r\n        ================================================== */\r\n \r\n        //Generate a random string\r\n        //Credit: http://stackoverflow.com/a/1349426/962893\r\n \r\n        function generateString() {\r\n            var text = &quot;&quot;;\r\n            var possible = &quot;abcdefghijklmnopqrstuvwxyz&quot;;\r\n            for (var i = 0; i &lt; 3; i++)\r\n                text += possible.charAt(Math.floor(Math.random() * possible.length));\r\n            return text;\r\n        }\r\n \r\n        //Get a lot of data from the Dailymotion API\r\n \r\n        function getDataFromDMAPI(keyword) {\r\n            //Clear the previous results\r\n            $scope.results = [];\r\n            $http({\r\n                method: &#39;GET&#39;,\r\n                url: &#39;https://api.dailymotion.com/videos?fields=3d,access_error%2Cchannel%2Cdescription%2Cduration%2Csharing_urls%2Csoundtrack_info%2Csources%2Cstart_time%2Cstatus%2Cstream_h264_hd1080_url%2Cstream_h264_hd_url%2Cstream_h264_hq_url%2Cstream_h264_ld_url%2Cstream_h264_url%2Cstream_source_url%2Cstrongtags%2Csvod%2Cswf_url%2Csync_allowed&amp;limit=100&amp;search=&#39; + keyword\r\n            })\r\n                .success(function(data, status, headers, config) {\r\n                    //The results are displayed (only the keyword for this example)\r\n                    $scope.results.push(keyword);\r\n                });\r\n        }\r\n \r\n        /* PUBLIC FUNCTIONS\r\n        ================================================== */\r\n \r\n        //Run multiple AJAX Requests\r\n        //Note that if we didn&#39;t use random strings, the demo would only work once because the results are cached by the browser (i.e. you wouldn&#39;t have the time to see the loader)\r\n        $scope.getDataFromDM = function() {\r\n            for (var i = 1; i &lt; 6; i++) {\r\n                getDataFromDMAPI(generateString());\r\n            }\r\n        };\r\n \r\n        /* EVENT HANDLERS\r\n        ================================================== */\r\n \r\n        //The httpInterceptor will send a message when the loader should be displayed\r\n        $scope.$on(&#39;loaderShow&#39;, function () {\r\n            $scope.showLoader = true;\r\n        });\r\n \r\n        //The httpInterceptor will send a message when the loader should be hidden\r\n        $scope.$on(&#39;loaderHide&#39;, function () {\r\n            $scope.showLoader = false;\r\n        });\r\n \r\n    }\r\n]);</pre>\r\n\r\n<h3><strong>Quelques explications du code:</strong></h3>\r\n\r\n<p>La logique du loader est plac&eacute; dans un service (de type factory).</p>\r\n\r\n<pre>\r\napp.factory(&#39;httpInterceptor&#39;, [&#39;$q&#39;, &#39;$rootScope&#39;, function($q, $rootScope) {\r\n    //...\r\n}]);</pre>\r\n\r\n<p>Ce service est&nbsp;<em>attach&eacute;</em>&nbsp;au $httpProvider, ce qui fait que les requ&ecirc;te faites via le service $http seront intercept&eacute;es.</p>\r\n\r\n<pre>\r\napp.config([&#39;$httpProvider&#39;, function($httpProvider) {\r\n    $httpProvider.interceptors.push(&#39;httpInterceptor&#39;);\r\n}]);</pre>\r\n\r\n<p>Quand une requ&ecirc;te est lanc&eacute;e, on incr&eacute;mente une variable et on broadcast un message pour signifier aux contr&ocirc;leurs que le loader doit &ecirc;tre affich&eacute; (dans cette d&eacute;mo on a un seul contr&ocirc;leur).</p>\r\n\r\n<pre>\r\ncurrentRequestsCount++;\r\n$rootScope.$broadcast(&#39;loaderShow&#39;);</pre>\r\n\r\n<p>C&ocirc;t&eacute; contr&ocirc;leur, &agrave; la r&eacute;ception du message on met une variable &agrave; true.</p>\r\n\r\n<pre>\r\n$scope.$on(&#39;loaderShow&#39;, function() {\r\n    $scope.showLoader = true;\r\n});</pre>\r\n\r\n<p>C&ocirc;t&eacute; template, le loader est affich&eacute; quand la variable est &agrave; true.</p>\r\n\r\n<pre>\r\n&lt;div class=&quot;loader&quot; ng-show=&quot;showLoader&quot;&gt;&lt;/div&gt;</pre>\r\n\r\n<p>Retour au $httpInterceptor. Quand une requ&ecirc;te se termine, on d&eacute;cr&eacute;mente la variable, et si celle-ci est retomb&eacute;e &agrave; 0, c&rsquo;est-&agrave;-dire s&rsquo;il n&rsquo;y a plus de requ&ecirc;te en cours,&nbsp;on broadcast un message pour signifier aux contr&ocirc;leurs que le loader doit &ecirc;tre masqu&eacute;.<br />\r\nNotez au passage que&nbsp;<em>&ndash;currentRequestsCount</em>&nbsp;est diff&eacute;rent de&nbsp;<em>currentRequestsCount&ndash;</em>, en effet la deuxi&egrave;me expression retourne la valeur de la variable avant d&eacute;cr&eacute;mentation (ce qui n&rsquo;est pas un probl&egrave;me la plupart du temps, mais l&agrave; oui).</p>\r\n\r\n<pre>\r\nresponse: function(response) {\r\n    if ((--currentRequestsCount) === 0) {\r\n        $rootScope.$broadcast(&#39;loaderHide&#39;);\r\n    }\r\n    //...\r\n}</pre>\r\n\r\n<p>Enfin, on g&egrave;re aussi le cas o&ugrave; la requ&ecirc;te &eacute;chouerait.</p>\r\n\r\n<pre>\r\nresponseError: function(response) {\r\n    if (!(--currentRequestsCount)) {\r\n        $rootScope.$broadcast(&#39;loaderHide&#39;);\r\n    }\r\n    //...  \r\n}</pre>\r\n\r\n<p>Voil&agrave;, vous savez maintenant comment g&eacute;rer l&#39;affichage d&#39;un loader.</p>\r\n\r\n<p>A bient&ocirc;t!</p>', '2014-12-29 20:40:07', '2014-12-29 20:40:07', 1, 'De bonnes bases en JavaScript sont nécessaires', 'angularjs-loader-dans-une-requete-ajax', 0),
(13, 1, 26, NULL, 'Installation du Twitter Bootstrap', 'Bref mémento: l''essentiel pour démarrer un projet avec le Twitter Boostrap.', '<p>Pour commencer, rendez vous sur <a href="http://getbootstrap.com/">le site du framework</a>, et cliquez sur le gros bouton &quot;Download Bootstrap&quot;.</p>\r\n\r\n<p>Cliquez ensuite sur &quot;Download Bootstrap&quot;, pour avoir les fichier compil&eacute;s et minifi&eacute;s.</p>\r\n\r\n<p>Placez&nbsp;les fichier t&eacute;l&eacute;charg&eacute;s &agrave; la racine de votre projet, et int&eacute;grez les dans votre fichier index.html:</p>\r\n\r\n<pre class="brush:xml;">\r\n&lt;!DOCTYPE html&gt;\r\n&lt;html lang=&quot;fr&quot;&gt;\r\n  &lt;head&gt;\r\n    &lt;title&gt;Bootstrap template&lt;/title&gt;\r\n    &lt;meta charset=&quot;utf-8&quot;&gt;\r\n    &lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;\r\n    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;\r\n    &lt;link href=&quot;bootstrap/css/bootstrap.min.css&quot; rel=&quot;stylesheet&quot;&gt;\r\n    &lt;!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --&gt;\r\n    &lt;!-- WARNING: Respond.js doesn&#39;t work if you view the page via file:// --&gt;\r\n    &lt;!--[if lt IE 9]&gt;\r\n      &lt;script src=&quot;https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js&quot;&gt;&lt;/script&gt;\r\n      &lt;script src=&quot;https://oss.maxcdn.com/respond/1.4.2/respond.min.js&quot;&gt;&lt;/script&gt;\r\n    &lt;![endif]--&gt;\r\n  &lt;/head&gt;\r\n  &lt;body&gt;\r\n    &lt;h1&gt;Hello, world!&lt;/h1&gt;\r\n    &lt;script src=&quot;https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js&quot;&gt;&lt;/script&gt;\r\n    &lt;script src=&quot;bootstrap/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;\r\n  &lt;/body&gt;\r\n&lt;/html&gt;</pre>\r\n\r\n<p>Voi&agrave;, votre projet peut d&eacute;marrer!</p>', '2014-12-29 21:00:21', '2014-12-29 21:00:21', 1, 'Bases HTML et CSS', 'installation-du-twitter-bootstrap', 0),
(14, 2, 26, NULL, 'Créer une classe en POO', 'Comment créer une classe, base de toute la programmation orientée objet en PHP ? Vous allez ici comprendre le principe de base.', '<p>Syntaxe de base</p>\r\n\r\n<p>Le but de cette section va &ecirc;tre de traduire la figure pr&eacute;c&eacute;dente en code PHP. Avant cela, je vais vous donner la syntaxe de base de toute classe en PHP :</p>\r\n\r\n<pre class="brush:php;">\r\n&lt;?php\r\nclass Personnage // Pr&eacute;sence du mot-cl&eacute; class suivi du nom de la classe.\r\n{\r\n  // D&eacute;claration des attributs et m&eacute;thodes ici.\r\n}\r\n?&gt;</pre>\r\n\r\n<p>Cette syntaxe est &agrave; retenir absolument. Heureusement, elle est simple.</p>\r\n\r\n<p>Ce qu&#39;on vient de faire est donc de cr&eacute;er le moule, le plan qui d&eacute;finira nos objets. On verra dans le prochain chapitre comment utiliser ce plan afin de cr&eacute;er un objet. Pour l&#39;instant, contentons-nous de construire ce plan et de lui ajouter des fonctionnalit&eacute;s.</p>\r\n\r\n<p>La d&eacute;claration d&#39;attributs dans une classe se fait en &eacute;crivant le nom de l&#39;attribut &agrave; cr&eacute;er, pr&eacute;c&eacute;d&eacute; de sa&nbsp;<strong>visibilit&eacute;</strong>.</p>\r\n\r\n<p>Visibilit&eacute; d&#39;un attribut ou d&#39;une m&eacute;thode</p>\r\n\r\n<p>La visibilit&eacute; d&#39;un attribut ou d&#39;une m&eacute;thode indique &agrave; partir d&#39;o&ugrave; on peut y avoir acc&egrave;s. Nous allons voir ici deux types de visibilit&eacute; :&nbsp;<code>public</code>&nbsp;et&nbsp;<code>private</code>.</p>\r\n\r\n<p>Le premier,&nbsp;<code>public</code>, est le plus simple. Si un attribut ou une m&eacute;thode est&nbsp;<code>public</code>, alors on pourra y avoir acc&egrave;s depuis n&#39;importe o&ugrave;, depuis l&#39;int&eacute;rieur de l&#39;objet (dans les m&eacute;thodes qu&#39;on a cr&eacute;&eacute;es), comme depuis l&#39;ext&eacute;rieur. Je m&#39;explique. Quand on cr&eacute;e un objet, c&#39;est principalement pour pouvoir exploiter ses attributs et m&eacute;thodes. L&#39;ext&eacute;rieur de l&#39;objet, c&#39;est tout le code qui n&#39;est pas&nbsp;<em>dans</em>&nbsp;votre classe. En effet, quand vous cr&eacute;erez un objet, cet objet sera repr&eacute;sent&eacute; par une variable, et c&#39;est &agrave; partir d&#39;elle qu&#39;on pourra modifier l&#39;objet, appeler des m&eacute;thodes, etc. Vous allez donc dire &agrave; PHP &laquo; dans cet objet, donne-moi cet attribut &raquo; ou &laquo; dans cet objet, appelle cette m&eacute;thode &raquo; : c&#39;est &ccedil;a, appeler des attributs ou m&eacute;thodes depuis l&#39;ext&eacute;rieur de l&#39;objet.</p>\r\n\r\n<p>Le second,&nbsp;<code>private</code>, impose quelques restrictions. On n&#39;aura acc&egrave;s aux attributs et m&eacute;thodes&nbsp;<em>seulement</em>&nbsp;depuis l&#39;int&eacute;rieur de la classe, c&#39;est-&agrave;-dire que seul le code voulant acc&eacute;der &agrave; un attribut priv&eacute; ou une m&eacute;thode priv&eacute;e &eacute;crit(e)<em>&agrave; l&#39;int&eacute;rieur</em>&nbsp;de la classe fonctionnera. Sinon, une jolie erreur fatale s&#39;affichera disant que vous ne pouvez pas acc&eacute;der &agrave; telle m&eacute;thode ou tel attribut parce qu&#39;il ou elle est priv&eacute;(e).</p>\r\n\r\n<p>L&agrave;, &ccedil;a devrait faire&nbsp;<em>tilt</em>&nbsp;dans votre t&ecirc;te : le principe d&#39;encapsulation ! C&#39;est de cette mani&egrave;re qu&#39;on peut interdire l&#39;acc&egrave;s &agrave; nos attributs.</p>\r\n\r\n<p>Cr&eacute;ation d&#39;attributs</p>\r\n\r\n<p>Pour d&eacute;clarer des attributs, on va donc les &eacute;crire entre les accolades, les uns &agrave; la suite des autres, en faisant pr&eacute;c&eacute;der leurs noms du mot-cl&eacute;&nbsp;<code>private</code>, comme &ccedil;a :</p>\r\n\r\n<pre class="brush:php;">\r\n&lt;?php\r\nclass Personnage\r\n{\r\n  private $_force;        // La force du personnage\r\n  private $_localisation; // Sa localisation\r\n  private $_experience;   // Son exp&eacute;rience\r\n  private $_degats;       // Ses d&eacute;g&acirc;ts\r\n}\r\n?&gt;</pre>\r\n\r\n<p>Vous pouvez constater que chaque attribut est pr&eacute;c&eacute;d&eacute; d&#39;un underscore (&laquo; _ &raquo;). Ceci est une notation qu&#39;il est pr&eacute;f&eacute;rable de respecter (il s&#39;agit de la notation PEAR) qui dit que chaque nom d&#39;&eacute;l&eacute;ment priv&eacute; (ici il s&#39;agit d&#39;attributs, mais nous verrons plus tard qu&#39;il peut aussi s&#39;agir de m&eacute;thodes) doit &ecirc;tre pr&eacute;c&eacute;d&eacute; d&#39;un underscore.</p>\r\n\r\n<p>Vous pouvez initialiser les attributs lorsque vous les d&eacute;clarez (par exemple, leur mettre une valeur de 0 ou autre). Exemple :</p>\r\n\r\n<pre class="brush:php;">\r\n&lt;?php\r\nclass Personnage\r\n{\r\n  private $_force = 50;            // La force du personnage, par d&eacute;faut &agrave; 50.\r\n  private $_localisation = &#39;Lyon&#39;; // Sa localisation, par d&eacute;faut &agrave; Lyon.\r\n  private $_experience = 1;        // Son exp&eacute;rience, par d&eacute;faut &agrave; 1.\r\n  private $_degats = 0;            // Ses d&eacute;g&acirc;ts, par d&eacute;faut &agrave; 0.\r\n}\r\n?&gt;</pre>\r\n\r\n<p>Cr&eacute;ation de m&eacute;thodes</p>\r\n\r\n<p>Pour la d&eacute;claration de m&eacute;thodes, il suffit de faire pr&eacute;c&eacute;der le mot-cl&eacute;&nbsp;<code>function</code>&nbsp;&agrave; la visibilit&eacute; de la m&eacute;thode. Les types de visibilit&eacute; des m&eacute;thodes sont les m&ecirc;mes que les attributs. Les m&eacute;thodes n&#39;ont en g&eacute;n&eacute;ral pas besoin d&#39;&ecirc;tre masqu&eacute;es &agrave; l&#39;utilisateur, vous les mettrez souvent en&nbsp;<code>public</code>&nbsp;(&agrave; moins que vous teniez absolument &agrave; ce que l&#39;utilisateur ne puisse pas appeler cette m&eacute;thode, par exemple s&#39;il s&#39;agit d&#39;une fonction qui simplifie certaines t&acirc;ches sur l&#39;objet mais qui ne doit pas &ecirc;tre appel&eacute;e n&#39;importe comment).</p>\r\n\r\n<pre class="brush:php;">\r\n&lt;?php\r\nclass Personnage\r\n{\r\n  private $_force;        // La force du personnage\r\n  private $_localisation; // Sa localisation\r\n  private $_experience;   // Son exp&eacute;rience\r\n  private $_degats;       // Ses d&eacute;g&acirc;ts\r\n        \r\n  public function deplacer() // Une m&eacute;thode qui d&eacute;placera le personnage (modifiera sa localisation).\r\n  {\r\n\r\n  }\r\n        \r\n  public function frapper() // Une m&eacute;thode qui frappera un personnage (suivant la force qu&#39;il a).\r\n  {\r\n\r\n  }\r\n        \r\n  public function gagnerExperience() // Une m&eacute;thode augmentant l&#39;attribut $experience du personnage.\r\n  {\r\n\r\n  }\r\n}\r\n?&gt;</pre>\r\n\r\n<p>Et voil&agrave;, vous savez cr&eacute;er une classe!</p>', '2014-12-29 21:05:07', '2014-12-29 21:05:07', 2, 'Bonnes connaissances de PHP', 'creer-une-classe-en-poo', 0),
(15, 1, 27, NULL, 'Aligner ses tableaux sans formulaire', 'Quiconque a voulu réaliser des formulaires s’est déjà heurté au problème récurrent des éléments de formulaire qui se collent au texte, alors que l’on voulait qu’ils fussent bien alignés et espacés par rapport au texte qui décrit le champ. \r\nNous allons, dans ce tutoriel, résoudre ce problème sans pour autant utiliser des tableaux.', '<h3><strong>La partie HTML:</strong></h3>\r\n\r\n<pre class="brush:xml;">\r\n&lt;label for=&quot;nom&quot;&gt;Nom :&lt;/label&gt;&lt;input type=&quot;text&quot; id=&quot;nom&quot; /&gt;&lt;br /&gt;\r\n&lt;label for=&quot;prenom&quot;&gt;Pr&eacute;nom :&lt;/label&gt;&lt;input type=&quot;text&quot; id=&quot;prenom&quot; /&gt;&lt;br /&gt;\r\n&lt;label for=&quot;age&quot;&gt;&Acirc;ge :&lt;/label&gt;&lt;select id=&quot;age&quot;&gt;&lt;option&gt;21&lt;/option&gt;&lt;/select&gt;&lt;br /&gt;\r\n&lt;label for=&quot;sexe&quot;&gt;Sexe :&lt;/label&gt;&lt;input type=&quot;radio&quot; name=&quot;sexe&quot; id=&quot;sexe&quot; /&gt;Homme &lt;input type=&quot;radio&quot; name=&quot;sexe&quot; /&gt;Femme&lt;br /&gt;\r\n&lt;label for=&quot;idees&quot;&gt;Des id&eacute;es pour mon site ?&lt;/label&gt;&lt;textarea id=&quot;idees&quot;&gt;Aucune, c&rsquo;est le plus beau du monde :D&lt;/textarea&gt;&lt;br /&gt;\r\n&lt;label for=&quot;newsletter&quot;&gt;Newsletter :&lt;/label&gt;&lt;input type=&quot;checkbox&quot; /&gt;Recevoir</pre>\r\n\r\n<h3><strong>La partie CSS:</strong></h3>\r\n\r\n<pre class="brush:css;">\r\nlabel\r\n{\r\n	display: block;\r\n	width: 150px;\r\n	float: left;\r\n}</pre>\r\n\r\n<p>Et voil&agrave;, vos formulaires sont align&eacute;s!</p>', '2014-12-29 21:12:50', '2014-12-29 21:12:50', 1, 'Base HTML et CSS', 'aligner-ses-tableaux-sans-formulaire', 0),
(16, 5, 27, NULL, 'L''ergonomie : la base d''un site web', 'Petite introduction sur l''ergonomie\r\n\r\nAvant de commencer l’optimisation de votre site pour son référencement, la première étape est d’avoir un site ergonomique. Un site web doit à la fois proposer un contenu intéressant, c''est-à-dire utile à l’internaute et être pratique d’utilisation par la même occasion. C’est là qu’intervient l’ergonomie.', '<h3><strong>Petite introduction sur l&#39;ergonomie</strong></h3>\r\n\r\n<p>Avant de commencer l&rsquo;optimisation de votre site pour son r&eacute;f&eacute;rencement, la premi&egrave;re &eacute;tape est d&rsquo;avoir un site ergonomique. Un site web doit &agrave; la fois proposer un contenu int&eacute;ressant, c&#39;est-&agrave;-dire utile &agrave; l&rsquo;internaute et &ecirc;tre pratique d&rsquo;utilisation par la m&ecirc;me occasion. C&rsquo;est l&agrave; qu&rsquo;intervient l&rsquo;ergonomie.</p>\r\n\r\n<p><strong>L&rsquo;ergonomie d&rsquo;un site peut se d&eacute;finir par sa facilit&eacute; d&rsquo;utilisation par le plus grand nombre de personnes (avec des configurations diff&eacute;rentes) avec un confort et une efficacit&eacute; maximum.</strong></p>\r\n\r\n<p>La toute premi&egrave;re chose &agrave; v&eacute;rifier est la page d&#39;accueil, c&#39;est-&agrave;-dire la premi&egrave;re page, celle qui est accessible &agrave; cette adresse : www.votresite.fr.&nbsp;<br />\r\n<strong>A bannir</strong>&nbsp;: Toutes les pages qui proposent une introduction avec une petite animation, et un lien &quot;entrer sur le site&quot; ne sont vraiment pas ergonomique. C&#39;est peut-&ecirc;tre joli mais c&#39;est compl&egrave;tement inutile. Vous rajoutez un clic en plus &agrave; l&#39;utilisateur, et pour les moteurs de recherche, la page d&rsquo;accueil n&#39;est pas du tout optimis&eacute;e.</p>\r\n\r\n<p>La r&egrave;gle des 3 clics, utile ou pas ?</p>\r\n\r\n<p>La r&egrave;gle des 3 clics permet aux internautes de trouver l&rsquo;information recherch&eacute;e sur votre site en maximum 3 clics.</p>\r\n\r\n<p>L&rsquo;avantage principal est que l&rsquo;information est trouv&eacute;e rapidement par l&rsquo;internaute.</p>\r\n\r\n<p>Il est inutile et non recommand&eacute; pour des sites ayant peu de contenu de construire son site avec 5 ou 6 niveaux de hi&eacute;rarchie. Bien entendu, il y a des fois o&ugrave; vous ne pouvez pas faire autrement. On ne tiendra pas rigueur aux sites tels Cdiscount ou Amazon avec des milliers de produits d&rsquo;avoir plusieurs niveaux de hi&eacute;rarchie.</p>\r\n\r\n<p>Pourquoi seulement 3 clics ?</p>\r\n\r\n<p>Tout simplement car l&rsquo;internaute est press&eacute;. S&rsquo;il ne trouve pas ce qu&rsquo;il recherche rapidement, il s&rsquo;en va et va chercher ailleurs. Cette r&egrave;gle n&#39;est pas de moi : il y a eu des &eacute;tudes qui ont conduite &agrave; cette r&egrave;gle... mais il &eacute;tait surtout important il y a 10 ans quand le d&eacute;bit n&#39;&eacute;tait pas aussi rapide et que le temps de chargement des pages &eacute;tait beaucoup plus long.&nbsp;<img alt=";)" src="http://openclassrooms.com/bundles/common/images/smiley/clin.png" /></p>\r\n\r\n<p>Il y a une nuance entre un internaute qui clique sans trop savoir o&ugrave; il va pour avoir une information, et l&#39;internaute qui clique sur vos pages pour aller &agrave; un endroit pr&eacute;cis. La r&egrave;gle des 3 clics s&#39;applique au premier cas.</p>\r\n\r\n<p>Selon cette m&ecirc;me &eacute;tude, mettre en place la r&egrave;gle des 3 clics sur vos pages faciliterait leur indexation. Mais on verra dans ce tutoriel comment indexer toutes vos pages facilement.&nbsp;<img alt=";)" src="http://openclassrooms.com/bundles/common/images/smiley/clin.png" /></p>\r\n\r\n<p>Cette r&egrave;gle poss&egrave;de ses d&eacute;tracteurs. Des &eacute;tudes prouvent que les internautes ne quittent pas un site au bout de 3 clics et c&#39;est plut&ocirc;t logique, non ? Comme je vous l&#39;ai dit, si l&#39;internaute sait o&ugrave; il va sur votre site, &ccedil;a ne le d&eacute;rangera pas de faire 5 clics, 6 clics ou plus.</p>\r\n\r\n<p>En gros le but n&rsquo;est pas de faire un site avec toutes les pages accessibles en 3 clics, l&#39;objectif est d&#39;&ecirc;tre clair. Si votre page est accessible en 4 ou 5 clics et que vous ne pouvez pas faire autrement au vue de toutes vos pages, ce n&rsquo;est pas grave tant que l&rsquo;accessibilit&eacute; est facile et logique.</p>\r\n\r\n<p>Pour r&eacute;sumer, construisez un site le plus accessible, clair et confortable possible pour l&#39;utilisateur.</p>\r\n\r\n<p>Soignez votre code HTML</p>\r\n\r\n<p>Avec l&rsquo;arriv&eacute;e de HTML 5, vous avez de belles balises toutes faites pour chaque partie de votre site. M&ecirc;me si vous n&rsquo;&ecirc;tes pas encore pass&eacute;s en HTML 5, utilisez les balises<strong>&nbsp;&lt;div&gt;</strong>&nbsp;pour structurer votre site web, mais par piti&eacute; arr&ecirc;tez de cr&eacute;er vos sites avec la balise&nbsp;<strong>&lt;table&gt;</strong>&nbsp;qui n&rsquo;est pas faite pour &ccedil;a. Vous avez peut &ecirc;tre appris comme &ccedil;a en cours, je vous crois. J&rsquo;ai moi-m&ecirc;me appris les bases du HTML &agrave; partir de tableaux sur Dreamweaver&hellip; &gt;_ Je ne parle m&ecirc;me pas des sites construits &agrave; base d&#39;iframe.</p>\r\n\r\n<p>Les images sont un vrai poison pour le temps de chargement de vos pages, utilisez vos images en fond d&rsquo;&eacute;cran si vous le pouvez, en utilisant le fichier CSS gr&acirc;ce &agrave; la propri&eacute;t&eacute; background image. &Eacute;vitez la balise&nbsp;<strong>&lt;img&gt;</strong>&nbsp;si elle n&rsquo;est pas obligatoire pour votre r&eacute;f&eacute;rencement.</p>\r\n\r\n<p>R&eacute;duire le poids des images</p>\r\n\r\n<p>Plus une image est grande, plus elle est longue &agrave; charger. Si vous avez une image assez grande et que vous r&eacute;duisez cette image dans votre code &agrave; base de width et de height, il va falloir changer de strat&eacute;gie. Il est pr&eacute;f&eacute;rable de r&eacute;duire directement la taille de l&#39;image dans un logiciel d&eacute;di&eacute;, afin de r&eacute;duire son poids.</p>\r\n\r\n<p>Vous pouvez &eacute;galement r&eacute;duire ce poids en optimisant votre image &agrave; l&rsquo;enregistrement. Photoshop propose ce type d&rsquo;enregistrement. Dans l&rsquo;onglet fichier, vous devrez voir quelque chose comme &laquo; enregistrer pour le web &raquo;.</p>', '2014-12-29 21:17:24', '2014-12-29 21:17:24', 1, 'Aucune', 'l-ergonomie-la-base-d-un-site-web', 1),
(17, 7, 27, NULL, 'Firebug et le débogage d’une page web', 'Mais pourquoi ce bloc ne se place-t-il pas comme je lui demande ? Pourquoi ce texte est bleu alors que je lui demande d’être vert ? Vous en avez assez de faire d’innombrables allers-retours entre votre navigateur et votre éditeur de code pour trouver ce qui cloche ? N’attendez plus, utilisez un outil de débogage !', '<p>Mais pourquoi ce bloc ne se place-t-il pas comme je lui demande ? Pourquoi ce texte est bleu alors que je lui demande d&rsquo;&ecirc;tre vert ? Vous en avez assez de faire d&rsquo;innombrables allers-retours entre votre navigateur et votre &eacute;diteur de code pour trouver ce qui cloche ? N&rsquo;attendez plus, utilisez un outil de d&eacute;bogage !</p>\r\n\r\n<p>Chaque d&eacute;veloppeur a son navigateur f&eacute;tiche et chaque navigateur poss&egrave;de son outil de d&eacute;bogage. La performance de certains outils peut cependant amener certains d&eacute;veloppeurs &agrave; choisir leur navigateur de d&eacute;veloppement en fonction de l&rsquo;outil de d&eacute;bogage associ&eacute;. Pour cet article, nous nous concentrerons essentiellement sur Firebug pour Firefox qui est certainement le plus connu et le plus utilis&eacute; &agrave; ce jour.</p>\r\n\r\n<p>Firebug est un des nombreux plugins disponibles pour Firefox. Il n&rsquo;est donc pas install&eacute; par d&eacute;faut sur le navigateur mais il est t&eacute;l&eacute;chargeable &agrave; sur <a href="http://www.getfirebug.com">www.getfirebug.com</a></p>\r\n\r\n<p>Une fois install&eacute;, une petite ic&ocirc;ne apparait en bas &agrave; droite de votre fen&ecirc;tre pour les anciennes versions de Firefox ou bien en haut &agrave; droite pour les r&eacute;centes :</p>\r\n\r\n<p><img alt="" src="http://www.alsacreations.com/xmedia/doc/full/emplacement-bug-firebug.jpg" /></p>\r\n\r\n<p>Pour lancer Firebug, il suffit de cliquer dessus, ou d&#39;utiliser le raccourci <kbd><kbd>F12</kbd></kbd>.</p>\r\n\r\n<p>L&#39;affichage par d&eacute;faut de l&#39;outil nous est propos&eacute; dans un volet occupant le bas de la page. Ce volet est divis&eacute; en deux, la partie de gauche repr&eacute;sente la structure HTML de la page active et propose diff&eacute;rents onglets (Console, HTML, CSS, Script, etc.), la partie de droite pr&eacute;sente le code CSS associ&eacute; &agrave; un &eacute;l&eacute;ment s&eacute;lectionn&eacute; dans le DOM et propose lui aussi diff&eacute;rents onglets (Calcul&eacute;, Apparence, etc.)</p>\r\n\r\n<p>Cet affichage en volet peut parfois g&ecirc;ner la lecture du document, Firebug propose un mode de visualisation par fen&ecirc;tre, il vous est donc possible de d&eacute;tacher ce volet pour le rendre flottant en cliquant sur le petit bouton du milieu, en haut &agrave; droite du volet.</p>\r\n\r\n<p><img alt="" src="http://www.alsacreations.com/xmedia/doc/full/mode-fenetre-firebug.jpg" /></p>\r\n\r\n<h3>Firebug, pour quoi faire ?</h3>\r\n\r\n<h4>L&rsquo;inspection du code HTML :</h4>\r\n\r\n<p>Puisque rien ne vaut un bon exemple, je vous propose de d&eacute;couvrir l&rsquo;outil au travers l&rsquo;&eacute;tude du &laquo; cas Alsacr&eacute;ations &raquo; (alsacreations.com) :</p>\r\n\r\n<p>Dans un premier temps, Firebug permet d&rsquo;inspecter le code source d&rsquo;une page en surlignant la partie de la page concernant par le bout de code sur lequel on place la souris :</p>\r\n\r\n<p><img alt="calque bleu transparent" src="http://www.alsacreations.com/xmedia/doc/full/div_bleu.jpg" /></p>\r\n\r\n<p>On voit donc ici qu&rsquo;un calque bleu translucide permet de rep&eacute;rer sur la page l&#39;&eacute;l&eacute;ment <code>div</code> ayant pour identifiant &laquo; sous-menu &raquo;. Le rep&eacute;rage dans l&rsquo;architecture d&rsquo;un site devient chose ais&eacute;e.</p>\r\n\r\n<h4>Le d&eacute;bogage CSS :</h4>\r\n\r\n<p>Dans le m&ecirc;me temps, on s&rsquo;aper&ccedil;oit que la fen&ecirc;tre de droite nous permet de voir le code CSS associ&eacute; &agrave; l&rsquo;&eacute;l&eacute;ment que l&rsquo;on est en train d&rsquo;inspecter. Et l&agrave; o&ugrave; Firebug devient un outil fabuleux, c&rsquo;est qu&rsquo;il est possible de modifier, ajouter ou supprimer une propri&eacute;t&eacute; CSS &agrave; la vol&eacute;e et d&rsquo;en voir la r&eacute;percussion imm&eacute;diate sur le site ! Plus besoin de retourner x fois dans votre &eacute;diteur de code pour ajuster un &eacute;l&eacute;ment au pixel pr&egrave;s !</p>\r\n\r\n<p>&Eacute;tudions, par exemple le sous-menu d&rsquo;Alsacr&eacute;ations :</p>\r\n\r\n<p><img alt="Menu alsacreations" src="http://www.alsacreations.com/xmedia/doc/full/menu_alsacreations.jpg" /></p>\r\n\r\n<p>Nous voyons qu&rsquo;il s&rsquo;agit, fort logiquement, d&rsquo;une liste d&rsquo;<code>ul li</code>. Maintenant, en cliquant sur un des &eacute;l&eacute;ments li de class &laquo; item &raquo;, nous pouvons modifier ses propri&eacute;t&eacute;s CSS en cliquant sur la valeur de celles-ci et en utilisant les fl&egrave;ches directionnelles du clavier. Modifions par exemple, la valeur initiale de <code>9px</code> du <code>margin-left</code>. Miracle ! Le menu s&rsquo;adapte automatiquement &agrave; sa nouvelle valeur !</p>\r\n\r\n<p><img alt="Changement des valeurs" src="http://www.alsacreations.com/xmedia/doc/full/changement-valeur.jpg" /></p>\r\n\r\n<p>Attention, Firebug n&rsquo;enregistre pas les modifications dans votre feuille de style. Il vous faut quand m&ecirc;me aller reporter la nouvelle valeur dans votre &eacute;diteur de code pour qu&rsquo;elle soit prise en compte.</p>\r\n\r\n<p>Il est &eacute;galement possible de d&eacute;sactiver une propri&eacute;t&eacute;, comme ici le <code>background</code> :</p>\r\n\r\n<p><img alt="Disparition du Background" src="http://www.alsacreations.com/xmedia/doc/full/background.jpg" /></p>\r\n\r\n<p>Ou d&rsquo;ajouter une propri&eacute;t&eacute; en faisant un clic-droit puis &laquo; nouvelle propri&eacute;t&eacute; &raquo;, ou en double-cliquant dans l&#39;espace blanc &agrave; droite de n&#39;importe quelle d&eacute;claration.</p>\r\n\r\n<p><img alt="Ajout d''une nouvelle propriété" src="http://www.alsacreations.com/xmedia/doc/full/nouvelle-propriete.jpg" /></p>\r\n\r\n<p>Il est, par exemple, aussi envisageable de cacher le menu en ajoutant un <code>display: none</code>.</p>\r\n\r\n<p>Cette ic&ocirc;ne (situ&eacute;e en haut &agrave; gauche dans la fen&ecirc;tre de Firebug) peut &ecirc;tre tr&egrave;s pratique pour inspecter un &eacute;l&eacute;ment perdu au milieu de la page.</p>\r\n\r\n<p><img alt="Choix d''un élément" src="http://www.alsacreations.com/xmedia/doc/full/choix_element.jpg" /></p>\r\n\r\n<p>Il suffit de cliquer dessus puis de cliquer ensuite sur l&rsquo;&eacute;l&eacute;ment voulu dans la page.</p>\r\n\r\n<h4>Le d&eacute;bogage Javascript :</h4>\r\n\r\n<p>Nous ne nous &eacute;tendrons pas sur le d&eacute;bogage Javascript qui pourrait faire l&rsquo;objet &agrave; lui tout seul d&rsquo;un tutoriel complet, mais sachez que Firebug poss&egrave;de toutes les fonctionnalit&eacute;s n&eacute;cessaires pour d&eacute;boguer vos scripts. L&#39;onglet Console comporte non seulement un relev&eacute; des erreurs et avertissements, un outil <em>Profiler</em> et surtout une zone d&#39;entr&eacute;e permettant la saisie de code ex&eacute;cutable en direct.</p>\r\n\r\n<p><img alt="Console Firebug" src="http://www.alsacreations.com/xmedia/doc/full/console-firebug-ff4.png" /></p>\r\n\r\n<h4>L&rsquo;audit de performance :</h4>\r\n\r\n<p>Autre fonctionnalit&eacute; int&eacute;ressante dans Firebug : l&rsquo;onglet &laquo; R&eacute;seau &raquo; qui permet de voir l&rsquo;ensemble des requ&ecirc;tes envoy&eacute;es au serveur et de cerner rapidement les &eacute;l&eacute;ments qui sont susceptible de ralentir votre page (chemin d&rsquo;image erron&eacute;, script trop lourd, etc&hellip;). Cette fonctionnalit&eacute; peut notamment s&rsquo;av&eacute;rer indispensable dans le cas de d&eacute;veloppement en AJAX.</p>\r\n\r\n<p><img alt="Firebug onglet Réseau" src="http://www.alsacreations.com/xmedia/doc/full/firebug-network.png" /></p>\r\n\r\n<h4>Les plugins du plugin :</h4>\r\n\r\n<p>Autre force de Firebug : la possibilit&eacute; de lui ajouter d&rsquo;autres plugins compl&eacute;mentaires dont voici une liste non exhaustive :</p>\r\n\r\n<ul>\r\n	<li><a href="http://firequery.binaryage.com/">FireQuery</a> : un plugin tr&egrave;s pratique pour analyser le code jQuery\r\n\r\n	<p><a href="http://firequery.binaryage.com/"><img alt="Firequery" src="http://www.alsacreations.com/xmedia/doc/full/firequery.jpg" /></a></p>\r\n	</li>\r\n	<li><a href="https://addons.mozilla.org/fr/firefox/addon/yslow/">YSlow</a> : un plugin qui permet d&rsquo;aller un peu plus loin que l&rsquo;onglet &laquo; r&eacute;seau &raquo; de Firebug et qui permet de comprendre pourquoi votre page est lente.\r\n	<p><a href="https://addons.mozilla.org/fr/firefox/addon/yslow/"><img alt="yslow" src="http://www.alsacreations.com/xmedia/doc/full/yslow.jpg" /></a></p>\r\n	</li>\r\n	<li><a href="https://addons.mozilla.org/fr/firefox/addon/pixel-perfect/">Pixel Perfect</a> : l&rsquo;ami des int&eacute;grateurs. Pour ajuster les &eacute;l&eacute;ments de votre site au pixel pr&egrave;s par rapport &agrave; votre charte graphique, ce plugin permet d&rsquo;afficher une image en calque par-dessus votre site.\r\n	<p><a href="https://addons.mozilla.org/fr/firefox/addon/pixel-perfect/"><img alt="Pixel perfect" src="http://www.alsacreations.com/xmedia/doc/full/pixel-perfect.jpg" /></a></p>\r\n	</li>\r\n	<li><a href="https://addons.mozilla.org/fr/firefox/addon/firepicker/">Fire Picker</a> : un petit plugin tr&egrave;s pratique qui permet d&rsquo;afficher la palette de couleur lorsque l&rsquo;on souhaite modifier un couleur dans le code CSS.\r\n	<p><a href="https://addons.mozilla.org/fr/firefox/addon/firepicker/"><img alt="Firepicker" src="http://www.alsacreations.com/xmedia/doc/full/firepicker.jpg" /></a></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Et les autres navigateurs alors ?</h3>\r\n\r\n<p>Vous n&rsquo;&ecirc;tes pas un inconditionnel de Firefox ? Pas de panique, voici une liste non exhaustive des diff&eacute;rents outils disponibles sur la toile :</p>\r\n\r\n<h4>Dragonfly pour Opera :</h4>\r\n\r\n<p>Rapha&euml;l a apport&eacute; pas mal d&#39;informations sur ce tr&egrave;s bel outil : <a href="http://www.alsacreations.com/actu/lire/1207-le-nouveau-opera-dragonfly-en-version-de-test.html">voir l&rsquo;article sur Opera Dragonfly</a>.</p>\r\n\r\n<h4>Outils de d&eacute;veloppement pour Chrome :</h4>\r\n\r\n<p>&Eacute;quivalent de Firebug, cet outil est d&eacute;j&agrave; int&eacute;gr&eacute; au navigateur et accessible par le menu &laquo; Outils &raquo; ou le raccourci clavier <kbd>Ctrl</kbd> <kbd>Maj</kbd> <kbd>i</kbd>.</p>\r\n\r\n<h4>Inspecteur Web pour Safari :</h4>\r\n\r\n<p>Tr&egrave;s proche de l&rsquo;outil propos&eacute; par Chrome, cet outil n&#39;est pas activ&eacute; par d&eacute;faut dans Safari. Pour l&#39;activer, allez dans R&eacute;glages (Ic&ocirc;ne engrenage)</p>', '2015-01-09 11:35:03', '2015-01-09 11:35:03', 1, 'htm css utilisation du navigateur', 'firebug-et-le-debogage-d-une-page-web', 0),
(18, 7, 35, NULL, 'Opera Mobile Emulator', 'L''émulateur Opera Mobile peut être installé sur un poste classique de bureau pour simuler le rendu des pages web, telles qu''elles apparaissent sur mobile ou tablette avec le navigateur du même nom.', '<p><strong><a href="http://fr.opera.com/developer/tools/mobile/">L&#39;&eacute;mulateur Opera Mobile</a></strong> peut &ecirc;tre install&eacute; sur un poste classique de bureau pour simuler le rendu des pages web, telles qu&#39;elles apparaissent sur mobile ou tablette avec le navigateur du m&ecirc;me nom. Coupl&eacute; &agrave; Dragonfly et &eacute;quip&eacute; de profils pr&eacute;d&eacute;finis, cela en fait un outil de pr&eacute;dilection pour s&#39;assurer d&#39;un rendu fiable et conforme sur ce moteur.</p>\r\n\r\n<p><a href="http://fr.opera.com/developer/tools/mobile/"><img alt="" src="http://www.alsacreations.com/xmedia/doc/full/opera-mobile-emulator.jpg" /></a></p>', '2015-01-09 12:10:03', '2015-01-09 12:10:03', 2, 'htm css utilisation du navigateur', 'opera-mobile-emulator', 0),
(19, 7, 35, NULL, 'Real Favicon Generator', 'Real Favicon Generator est un outil gratuit en ligne permettant de vérifier et de générer des fichiers "favicon" pour son site web.', '<p><strong>Real Favicon Generator</strong> est un outil gratuit en ligne permettant de v&eacute;rifier et de g&eacute;n&eacute;rer des fichiers &quot;favicon&quot; pour son site web.</p>\r\n\r\n<p>Bien plus complet que d&#39;autres outils du m&ecirc;me acabit, RFG ne se contente pas de la version favicon de bureau mais &eacute;galement des versions pour smartphones et tablettes iOS, Android et Windows Phone.</p>\r\n\r\n<p>Ainsi, s&#39;il manque certaines version ou tailles d&#39;icones, ou que leur taille n&#39;est pas correctement sp&eacute;cifi&eacute;e, l&#39;outil ne manquera pas de vous en faire part.</p>\r\n\r\n<p>Une fois l&#39;audit r&eacute;alis&eacute;, Real Favicon Generator vous propose de concevoir l&#39;ensemble des fichiers (ZIP) et vous livre le code HTML &agrave; copier dans vos pages.</p>\r\n\r\n<p><a href="http://realfavicongenerator.net/"><img alt="" src="http://www.alsacreations.com/xmedia/doc/full/realfavicon.png" /></a></p>\r\n\r\n<h3>&nbsp;</h3>', '2015-01-09 12:23:51', '2015-01-09 12:23:51', 1, 'htm css utilisation du navigateur', 'real-favicon-generator', 0),
(22, 6, 26, NULL, 'Une base de données ou banque de données', 'Dans la très grande majorité des cas, ces informations sont très structurées, et la base est localisée dans un même lieu et sur un même support. Ce dernier est généralement informatisé.', '<p>La base de donn&eacute;es est au centre des dispositifs informatiques de collecte, mise en forme, stockage, et utilisation d&#39;informations. Le dispositif comporte un&nbsp;<a href="http://www.wikiwand.com/fr/Syst%C3%A8me_de_gestion_de_base_de_donn%C3%A9es">syst&egrave;me de gestion de base de donn&eacute;es</a>&nbsp;(abr. SGBD)&nbsp;: un logiciel moteur qui manipule la base de donn&eacute;es et dirige l&#39;acc&egrave;s &agrave; son contenu. De tels dispositifs &mdash;&nbsp;souvent appel&eacute;s&nbsp;<strong>base de donn&eacute;es</strong>&nbsp;&mdash; comportent &eacute;galement des logiciels applicatifs, et un ensemble de r&egrave;gles relatives &agrave; l&#39;acc&egrave;s et l&#39;utilisation des informations<a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenotecoronel2">[2]</a>.</p>\r\n\r\n<p>La manipulation de donn&eacute;es est une des utilisations les plus courantes des ordinateurs. Les bases de donn&eacute;es sont par exemple utilis&eacute;es dans les secteurs de la finance, des assurances, des &eacute;coles, de l&#39;&eacute;pid&eacute;miologie, de l&#39;administration publique (statistiques notamment) et des m&eacute;dias.</p>\r\n\r\n<h2>Description</h2>\r\n\r\n<p>Une base de donn&eacute;es est un &laquo;&nbsp;conteneur&nbsp;&raquo; stockant des&nbsp;<em>donn&eacute;es</em><a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenotecoronel2">[2]</a>&nbsp;telles que des chiffres, des dates ou des mots, pouvant &ecirc;tre retrait&eacute;s par des moyens informatiques pour produire une information&nbsp;; par exemple, des chiffres et des noms assembl&eacute;s et tri&eacute;s pour former un&nbsp;<a href="http://www.wikiwand.com/fr/Annuaire">annuaire</a>. Les retraitements sont typiquement une combinaison d&#39;op&eacute;rations de recherches, de choix, de tri, de regroupement, et de&nbsp;<a href="http://www.wikiwand.com/fr/Concat%C3%A9nation">concat&eacute;nation</a><a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenotedowling3">[3]</a>.</p>\r\n\r\n<p>C&#39;est la pi&egrave;ce centrale d&#39;un&nbsp;<a href="http://www.wikiwand.com/fr/Syst%C3%A8me_d%27information">syst&egrave;me d&#39;information</a>&nbsp;ou d&#39;un&nbsp;<em>syst&egrave;me de base de donn&eacute;es</em>&nbsp;(ou&nbsp;<em>base de donn&eacute;es</em>&nbsp;tout court), qui r&eacute;git la collecte, le stockage, le retraitement et l&#39;utilisation de donn&eacute;es. Ce dispositif comporte souvent un logiciel moteur (le&nbsp;<em>SGBD</em>), des logiciels applicatifs, et un ensemble de r&egrave;gles relatives &agrave; l&#39;acc&egrave;s et l&#39;utilisation des informations<a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenotecoronel2">[2]</a>.</p>\r\n\r\n<p>Le&nbsp;<a href="http://www.wikiwand.com/fr/Syst%C3%A8me_de_gestion_de_base_de_donn%C3%A9es">syst&egrave;me de gestion de base de donn&eacute;es</a>&nbsp;est une suite de programmes qui manipule la structure de la base de donn&eacute;es et dirige l&#39;acc&egrave;s aux donn&eacute;es qui y sont stock&eacute;es. Une base de donn&eacute;es est compos&eacute;e d&#39;une collection de fichiers&nbsp;; on y acc&egrave;de par le SGBD qui re&ccedil;oit des demandes de manipulation du contenu et effectue les op&eacute;rations n&eacute;cessaires sur les fichiers. Il cache la complexit&eacute; des op&eacute;rations et offre une vue synth&eacute;tique sur le contenu. Le SGBD permet &agrave; plusieurs usagers de manipuler simultan&eacute;ment le contenu, et peut offrir diff&eacute;rentes vues sur un m&ecirc;me ensemble de donn&eacute;es<a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenotecoronel2">[2]</a>.</p>\r\n\r\n<p>Le recours aux bases de donn&eacute;es est une alternative au proc&eacute;d&eacute; classique de stockage de donn&eacute;es, par lequel une application place des donn&eacute;es dans des<a href="http://www.wikiwand.com/fr/Fichier_informatique">fichiers</a>&nbsp;manipul&eacute;s par l&#39;application. Il facilite le partage des informations, permet le contr&ocirc;le automatique de la coh&eacute;rence et de la redondance des informations, la limitation de l&#39;acc&egrave;s aux informations et la production plus ais&eacute;e des informations synth&eacute;tiques &agrave; partir des renseignements bruts. La base de donn&eacute;es a de plus un effet f&eacute;d&eacute;rateur&nbsp;: dans une collectivit&eacute; utilisant une base de donn&eacute;es, une personne unique - l&#39;<a href="http://www.wikiwand.com/fr/Administrateur_de_bases_de_donn%C3%A9es">administrateur de bases de donn&eacute;es</a>&nbsp;- organise le contenu de la base d&#39;une mani&egrave;re b&eacute;n&eacute;fique &agrave; l&#39;ensemble de la collectivit&eacute;, ce qui peut &eacute;viter des conflits dus &agrave; des int&eacute;r&ecirc;ts divergents entre les membres de la collectivit&eacute;<a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenoteadamski4">[4]</a>.</p>\r\n\r\n<p>Une base de donn&eacute;es n&eacute;cessite g&eacute;n&eacute;ralement plus d&#39;espace disque, le large &eacute;ventail de fonctions offertes par les SGBD rend les manipulations plus complexes, et les pannes ont un impact plus large et sont plus difficiles &agrave; rattraper&nbsp;<a href="http://www.wikiwand.com/fr/Base_de_donn%C3%A9es#citenoteadamski4">[4]</a>.</p>', '2015-01-09 17:43:47', '2015-01-09 17:43:47', 3, 'saluuuut', 'une-base-de-donnees-ou-banque-de-donnees', 0),
(25, 3, 26, NULL, 'Tutoriel de test', 'voicoiezr rko tkepor epo iàr ioEPRÖPRO £PER OLP¨£OR TPE', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum ex nec volutpat sollicitudin. Vestibulum aliquet posuere mauris id consectetur. Vestibulum non ante laoreet, convallis justo nec, tempus ante. Pellentesque imperdiet leo sit amet nibh placerat, sit amet fermentum ex finibus. Nunc mollis lectus vitae elit scelerisque congue. Integer efficitur venenatis tellus in finibus. Etiam fringilla lacinia erat ac tincidunt. Phasellus molestie, diam et semper mollis, leo magna lacinia quam, non blandit libero ipsum nec elit. Fusce in convallis orci. Ut sit amet mollis lorem, quis malesuada purus. Quisque at erat nisi.</p>\r\n\r\n<p>Mauris vitae nibh lacinia, mollis tellus sit amet, malesuada orci. Duis quis venenatis purus. Sed id ornare nisi. Duis interdum risus sit amet est tempor, a interdum tortor vulputate. Vivamus pellentesque in quam ut congue. Vivamus blandit, lectus ut aliquam accumsan, mauris metus scelerisque magna, quis luctus nibh purus sit amet odio. Maecenas non diam justo. Donec non elit at elit porttitor pretium sit amet quis mauris. Duis euismod risus a turpis rutrum, non pulvinar libero rutrum. Sed nec ante volutpat, consequat erat et, mattis massa. In nunc felis, vestibulum eget porta a, pulvinar at mi. Curabitur ornare est eget purus pretium, non tincidunt sem pharetra. Suspendisse tincidunt est mauris, quis fringilla quam tempor et. Morbi velit turpis, finibus at lectus in, efficitur dapibus mauris. Sed sit amet lorem magna. Ut in mattis sem, sit amet molestie diam.</p>\r\n\r\n<p>Duis elementum vel sapien ut facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ligula libero, imperdiet a cursus sed, tincidunt ut orci. Vestibulum varius cursus nisi at blandit. Quisque aliquet dolor neque, a consequat dui eleifend vitae. Donec pellentesque, odio id pellentesque suscipit, neque metus posuere lacus, nec pretium nunc est vel leo. Duis laoreet egestas blandit. Nam porttitor lacus in nulla eleifend, in ornare elit finibus.</p>\r\n\r\n<p>Proin semper rhoncus consectetur. Aliquam consequat dui a mi pellentesque, sit amet hendrerit velit bibendum. Sed ut erat in metus dapibus convallis. Praesent porta augue sit amet risus maximus eleifend. Suspendisse consequat est facilisis, egestas massa vitae, tempor leo. Nulla nec congue nibh. Nullam efficitur pharetra dapibus. Curabitur varius neque sem, ut malesuada leo dapibus quis. Fusce nunc nulla, rhoncus ut aliquet in, rutrum eu nisl. Nunc ultrices ipsum congue, scelerisque lacus a, suscipit tellus. Vestibulum malesuada porta lectus ac egestas.</p>\r\n\r\n<p>Nam in ipsum non odio suscipit ultricies. Sed at mattis urna. Praesent nec mauris in orci fermentum facilisis. Pellentesque faucibus enim leo, a rhoncus purus rhoncus at. Pellentesque tortor lacus, tempor a molestie vitae, pretium ac orci. Nullam volutpat aliquet nibh vel ultrices. Pellentesque id leo gravida, condimentum nisi a, semper neque. Praesent nec ultricies tortor. Morbi elementum molestie orci, in pretium mi consectetur sed. Suspendisse potenti. Pellentesque pharetra porta dui, quis ornare mauris faucibus quis. Vestibulum elementum purus mi, at hendrerit magna cursus ac. Aenean gravida lobortis odio, eu venenatis arcu euismod eget. Quisque a sem eget ligula scelerisque tempor. Phasellus velit ligula, mattis vitae tincidunt et, mollis eu nulla.</p>', '2015-01-13 14:15:07', '2015-01-13 14:15:07', 1, 'Aucune', 'tutoriel-de-test', 0);
INSERT INTO `tutorial` (`id`, `category_id`, `user_id`, `image_id`, `title`, `description`, `content`, `created_at`, `last_modified`, `difficulty`, `requirement`, `slug`, `promote`) VALUES
(26, 3, 26, NULL, 'Tutoriel de test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum nulla malesuada libero tempor, et dignissim erat malesuada. Integer sagittis malesuada nulla, ac aliquam elit tincidunt in. Proin gravida turpis vel metus iaculis scelerisque. Sed mollis turpis a gravida laoreet.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum nulla malesuada libero tempor, et dignissim erat malesuada. Integer sagittis malesuada nulla, ac aliquam elit tincidunt in. Proin gravida turpis vel metus iaculis scelerisque. Sed mollis turpis a gravida laoreet. Quisque posuere nibh non est tempor malesuada. Pellentesque eu luctus dui. Quisque feugiat euismod finibus. Cras eu finibus elit. Fusce viverra ligula vel libero cursus efficitur. Quisque quis turpis vulputate, auctor nisl vitae, volutpat erat. Vestibulum pharetra laoreet nisl ac egestas. Nulla et libero eget mauris cursus vehicula et at est. Morbi condimentum suscipit egestas. Aenean ligula magna, rhoncus nec turpis luctus, luctus egestas diam. Aliquam nec porttitor tortor, vel fermentum metus.</p>\r\n\r\n<p>Nam ipsum dui, ullamcorper id efficitur sit amet, efficitur nec purus. Praesent pulvinar nisi urna, in ornare tortor viverra ullamcorper. Ut ultricies risus felis, nec sagittis massa dictum non. Donec id elit tincidunt, eleifend nisl id, pulvinar odio. Vivamus ipsum magna, porttitor ac finibus et, porttitor nec diam. Nam eleifend vitae sapien at hendrerit. Sed ornare, orci at faucibus lobortis, metus diam tristique dolor, pharetra ultrices mauris magna sed elit. Integer et consequat mauris. Morbi faucibus semper suscipit. Sed condimentum dapibus vulputate. Ut convallis urna arcu, accumsan semper neque ultricies ut. Curabitur tempor elementum semper. Nam consectetur risus quis venenatis consequat. Suspendisse ut ante lacinia, tristique erat sit amet, consectetur libero. Vivamus vestibulum dictum tortor, quis mattis magna suscipit quis.</p>\r\n\r\n<p>Aenean id gravida nisi. Donec elementum risus et felis vehicula auctor semper sed leo. Aenean vel luctus mi. Proin faucibus neque odio, quis scelerisque lorem sagittis eu. Maecenas ut aliquet turpis. Etiam dignissim et velit eu pretium. Nulla efficitur diam purus, in volutpat mi egestas ut. Donec malesuada, felis quis facilisis varius, nisi neque consequat est, nec tincidunt urna velit et sem. Fusce blandit, nulla quis fringilla vestibulum, libero arcu vestibulum urna, sed ultrices eros eros vitae magna.</p>\r\n\r\n<p>Curabitur vitae luctus mi. Nam turpis lacus, finibus hendrerit risus sit amet, vulputate placerat dolor. Nullam in congue mi, a cursus massa. Aliquam aliquam risus orci, non accumsan dolor accumsan at. Mauris sodales, dui in tempor scelerisque, lacus orci vestibulum risus, eu ornare nibh ex cursus ex. Duis mattis nibh at maximus tempus. Nam tincidunt, augue sed porttitor mattis, sem velit fringilla mauris, sed elementum turpis dolor ac magna.</p>\r\n\r\n<p>Aenean placerat, orci ac convallis sagittis, nibh sapien varius urna, in gravida magna eros quis ipsum. Nullam pulvinar eget dui et consectetur. Suspendisse auctor, elit sit amet interdum hendrerit, lectus neque tempus magna, ut pretium odio enim quis enim. Pellentesque et odio ullamcorper, ullamcorper nunc non, mollis diam. Suspendisse consequat, quam quis tincidunt egestas, leo ipsum iaculis sem, vitae mollis lectus augue sit amet lectus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis sed dui quis ante posuere pharetra. Suspendisse malesuada magna id iaculis dictum. Duis ac mauris non tortor hendrerit hendrerit. Aenean sagittis, libero sit amet semper egestas, nisi metus molestie mi, vitae commodo dolor diam tempus velit. Ut eu dictum orci, ac vehicula lorem. Aenean ac lacus vitae nibh efficitur rutrum.</p>', '2015-01-15 15:34:10', '2015-01-15 15:34:10', 2, 'Aucune', 'tutoriel-de-test-1', 0),
(27, 2, 37, 21, 'Cross-site scripting', 'Injection de contenu dans une page via un formulaire ou une url', '<script type="text/javascript">\r\ndocument.write("Hello World !");\r\n</script>\r\n<h1><span dir="auto">Cross-site scripting</span></h1>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt="" src="http://upload.wikimedia.org/wikipedia/commons/thumb/6/64/Question_book-4.svg/90px-Question_book-4.svg.png" style="height:35px; width:45px" /></p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Cet article <a href="http://fr.wikipedia.org/wiki/Wikip%C3%A9dia:Citez_vos_sources">ne cite pas suffisamment ses sources</a></strong><small>&nbsp;(septembre 2007)</small>.</p>\r\n\r\n			<p>Si vous disposez d&#39;ouvrages ou d&#39;articles de r&eacute;f&eacute;rence ou si vous connaissez des sites web de qualit&eacute; traitant du th&egrave;me abord&eacute; ici, merci de compl&eacute;ter l&#39;article en donnant les r&eacute;f&eacute;rences utiles &agrave; sa v&eacute;rifiabilit&eacute; et en les liant &agrave; la section &laquo;&nbsp;<a href="http://fr.wikipedia.org/wiki/Aide:Note">Notes et r&eacute;f&eacute;rences</a>&nbsp;&raquo; (<a href="http://fr.wikipedia.org/w/index.php?title=Cross-site_scripting&amp;vaction=edit">modifier l&#39;article</a>).</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Le <strong>cross-site scripting</strong> (abr&eacute;g&eacute; <strong>XSS</strong>), est un type de <a href="http://fr.wikipedia.org/wiki/Faille_de_s%C3%A9curit%C3%A9">faille de s&eacute;curit&eacute;</a> des <a href="http://fr.wikipedia.org/wiki/Sites_web">sites web</a> permettant d&#39;injecter du contenu dans une page, permettant ainsi de provoquer des actions sur les <a href="http://fr.wikipedia.org/wiki/Navigateur_web">navigateurs web</a> visitant la page. Les possibilit&eacute;s des XSS sont tr&egrave;s larges puisque l&#39;attaquant peut utiliser tous les langages pris en charge par le navigateur (<a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a>, <a href="http://fr.wikipedia.org/wiki/Java_%28langage%29">Java</a>, <a href="http://fr.wikipedia.org/wiki/Adobe_Flash">Flash</a>...) et de nouvelles possibilit&eacute;s sont r&eacute;guli&egrave;rement d&eacute;couvertes notamment avec l&#39;arriv&eacute;e de nouvelles technologies comme <a href="http://fr.wikipedia.org/wiki/HTML5">HTML5</a>. Il est par exemple possible de rediriger vers un autre site pour du <a href="http://fr.wikipedia.org/wiki/Hame%C3%A7onnage">hame&ccedil;onnage</a> ou encore de voler la session en r&eacute;cup&eacute;rant les <a href="http://fr.wikipedia.org/wiki/Cookie_%28informatique%29">cookies</a>.</p>\r\n\r\n<p>Le cross-site scripting est abr&eacute;g&eacute; XSS pour ne pas &ecirc;tre confondu avec le <a href="http://fr.wikipedia.org/wiki/Feuilles_de_style_en_cascade">CSS</a> (feuilles de style)<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-1">1</a>, X se lisant &laquo;&nbsp;cross&nbsp;&raquo; (croix) en anglais.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Sommaire</h2>\r\n\r\n<ul>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#D.C3.A9finition">1 D&eacute;finition</a></li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Risques">2 Risques</a></li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Types_de_failles_XSS">3 Types de failles XSS</a>\r\n	<ul>\r\n		<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#XSS_r.C3.A9fl.C3.A9chi_.28ou_non_permanent.29">3.1 XSS r&eacute;fl&eacute;chi (ou non permanent)</a></li>\r\n		<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#XSS_stock.C3.A9_.28ou_permanent.29">3.2 XSS stock&eacute; (ou permanent)</a></li>\r\n		<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Bas.C3.A9_sur_le_DOM_ou_local">3.3 Bas&eacute; sur le DOM ou local</a></li>\r\n	</ul>\r\n	</li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Protection_contre_les_XSS">4 Protection contre les XSS</a></li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Utilisation_de_XSS_dans_des_attaques">5 Utilisation de XSS dans des attaques</a></li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Notes_et_r.C3.A9f.C3.A9rences">6 Notes et r&eacute;f&eacute;rences</a></li>\r\n	<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Voir_aussi">7 Voir aussi</a>\r\n	<ul>\r\n		<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Articles_connexes">7.1 Articles connexes</a></li>\r\n		<li><a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#Liens_externes">7.2 Liens externes</a></li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>D&eacute;finition</h2>\r\n\r\n<p>Le terme <em>cross-site scripting</em> n&#39;est pas une description tr&egrave;s pr&eacute;cise de ce type de vuln&eacute;rabilit&eacute;. Mark Slemko, pionnier du XSS, en disait&nbsp;:</p>\r\n\r\n<blockquote>\r\n<p>&laquo;&nbsp;Le probl&egrave;me n&#39;est pas simplement le &#39;scripting&#39;, et il n&#39;y a pas forc&eacute;ment quelque chose entre plusieurs sites. Alors pourquoi ce nom&nbsp;? En fait, le nom a &eacute;t&eacute; donn&eacute; quand le probl&egrave;me &eacute;tait moins bien compris, et c&#39;est rest&eacute;. Croyez-moi, nous avions des choses plus importantes &agrave; faire que de r&eacute;fl&eacute;chir &agrave; un meilleur nom.&nbsp;&raquo;</p>\r\n</blockquote>\r\n\r\n<p>&mdash;&nbsp;Mark Slemko, <cite><a href="http://httpd.apache.org/info/css-security/">&laquo;&nbsp;<cite>Cross Site Scripting Info</cite>&nbsp;&raquo;</a>, sur <em><a href="http://httpd.apache.org/">The Apache HTTP Server Project</a></em>,&lrm; f&eacute;vrier&nbsp;2000</cite></p>\r\n\r\n<p>Le principe est d&#39;injecter des donn&eacute;es arbitraires dans un site web, par exemple en d&eacute;posant un message dans un forum, ou par des param&egrave;tres d&#39;URL. Si ces donn&eacute;es arrivent telles quelles dans la page web transmise au navigateur (par les param&egrave;tres d&#39;URL, un message post&eacute;&hellip;) sans avoir &eacute;t&eacute; v&eacute;rifi&eacute;es, alors il existe une faille&nbsp;: on peut s&#39;en servir pour faire ex&eacute;cuter du code malveillant en <a href="http://fr.wikipedia.org/wiki/Langage_de_script">langage de script</a> (du <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a> le plus souvent) par le navigateur web qui consulte cette page.</p>\r\n\r\n<p>La d&eacute;tection de la pr&eacute;sence d&#39;une faille XSS peut se faire par exemple en entrant un script Javascript dans un champ de formulaire ou dans une URL&nbsp;:</p>\r\n\r\n<pre>\r\n&lt;script&gt;alert(&#39;bonjour&#39;)&lt;/script&gt;\r\n</pre>\r\n\r\n<p>Si une bo&icirc;te de dialogue appara&icirc;t, on peut en conclure que l&#39;application Web est sensible aux attaques de type XSS.</p>\r\n\r\n<h2>Risques</h2>\r\n\r\n<p>L&#39;exploitation d&#39;une faille de type XSS permettrait &agrave; un intrus de r&eacute;aliser les op&eacute;rations suivantes&nbsp;:</p>\r\n\r\n<ul>\r\n	<li>Redirection (parfois de mani&egrave;re transparente) de l&#39;utilisateur (souvent dans un but de <a href="http://fr.wikipedia.org/wiki/Hame%C3%A7onnage">hame&ccedil;onnage</a>)</li>\r\n	<li>Vol d&#39;informations, par exemple <a href="http://fr.wikipedia.org/wiki/Session_%28informatique%29">sessions</a> et <a href="http://fr.wikipedia.org/wiki/Cookie_%28informatique%29">cookies</a>.</li>\r\n	<li>Actions sur le site faillible, &agrave; l&#39;insu de la victime et sous son identit&eacute; (envoi de messages, suppression de donn&eacute;es&hellip;)</li>\r\n	<li>Rendre la lecture d&#39;une page difficile (<a href="http://fr.wikipedia.org/wiki/Boucle_infinie">boucle infinie</a> d&#39;alertes par exemple).</li>\r\n</ul>\r\n\r\n<h2>Types de failles XSS</h2>\r\n\r\n<p>Il n&#39;existe pas de classification standardis&eacute;e des failles de cross-site scripting, mais l&#39;on peut facilement distinguer deux types principaux de XSS&nbsp;: les non-persistants et les persistants. Il est aussi possible de diviser ces deux types en deux groupes&nbsp;: les XSS traditionnels (caus&eacute;s par une vuln&eacute;rabilit&eacute; c&ocirc;t&eacute; serveur) et les XSS bas&eacute;s sur le <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> (dus &agrave; une vuln&eacute;rabilit&eacute; c&ocirc;t&eacute; client)</p>\r\n\r\n<h3>XSS r&eacute;fl&eacute;chi (ou non permanent)</h3>\r\n\r\n<p>Ce type de faille de s&eacute;curit&eacute;, qui peut &ecirc;tre qualifi&eacute; de &laquo;&nbsp;non permanent&nbsp;&raquo;, est de loin le plus commun.</p>\r\n\r\n<p>Il apparait lorsque des <em>donn&eacute;es fournies par un client web sont utilis&eacute;es telles quelles par les scripts du serveur pour produire une page de r&eacute;sultats</em>. Si les donn&eacute;es non v&eacute;rifi&eacute;es sont incluses dans la page de r&eacute;sultat <em>sans encodage des <a href="http://fr.wikipedia.org/wiki/Entit%C3%A9_de_caract%C3%A8re">entit&eacute;s HTML</a></em>, elles pourront &ecirc;tre utilis&eacute;es pour injecter du code dans la page dynamique re&ccedil;ue par le navigateur client.</p>\r\n\r\n<p>Un exemple classique dans les moteurs de recherche des sites&nbsp;: si l&#39;on recherche une chaine qui contient des <a href="http://fr.wikipedia.org/wiki/Entit%C3%A9_de_caract%C3%A8re">caract&egrave;res sp&eacute;ciaux</a> HTML, souvent la chaine recherch&eacute;e sera affich&eacute;e sur la page de r&eacute;sultat pour rappeler ce qui &eacute;tait cherch&eacute;, ou dans une bo&icirc;te de texte pour la r&eacute;&eacute;dition de cette cha&icirc;ne. Si la chaine affich&eacute;e n&#39;est pas encod&eacute;e, il y a une faille XSS.</p>\r\n\r\n<p>&Agrave; premi&egrave;re vue, ce n&#39;est pas un probl&egrave;me grave parce que l&#39;utilisateur peut seulement injecter du code dans ses propres pages. Cependant, avec un peu d&#39;<a href="http://fr.wikipedia.org/wiki/Ing%C3%A9nierie_sociale_%28s%C3%A9curit%C3%A9_de_l%27information%29">ing&eacute;nierie sociale</a>, un attaquant peut convaincre un utilisateur de suivre une URL pi&eacute;g&eacute;e qui injecte du code dans la page de r&eacute;sultat, ce qui donne &agrave; l&#39;attaquant tout contr&ocirc;le sur le contenu de cette page. L&#39;ing&eacute;nierie sociale &eacute;tant requise pour l&#39;exploitation de ce type de faille (et du pr&eacute;c&eacute;dent), beaucoup de programmeurs ont consid&eacute;r&eacute; que ces trous n&#39;&eacute;taient pas tr&egrave;s importants. Cette erreur est souvent g&eacute;n&eacute;ralis&eacute;e aux failles XSS en g&eacute;n&eacute;ral.</p>\r\n\r\n<h3>XSS stock&eacute; (ou permanent)</h3>\r\n\r\n<p>Ce type de vuln&eacute;rabilit&eacute;, aussi appel&eacute; faille permanente ou du second ordre permet des attaques puissantes. Elle se produit quand les <em>donn&eacute;es fournies par un utilisateur sont stock&eacute;es</em> sur un serveur (dans une base de donn&eacute;es, des fichiers, ou autre), et ensuite <em>r&eacute;affich&eacute;es sans que les caract&egrave;res sp&eacute;ciaux HTML aient &eacute;t&eacute; encod&eacute;s</em>.</p>\r\n\r\n<p>Un exemple classique est celui des forums, o&ugrave; les utilisateurs peuvent poster des textes format&eacute;s avec des balises HTML. Ces failles sont plus importantes que celles d&#39;autres types, parce qu&#39;un attaquant peut se contenter d&#39;injecter un script une seule fois et atteindre un grand nombre de victimes sans recourir &agrave; l&#39;ing&eacute;nierie sociale.</p>\r\n\r\n<p>Il y a diverses m&eacute;thodes d&#39;injection, qui ne n&eacute;cessitent pas forc&eacute;ment que l&#39;attaquant utilise l&#39;application web elle-m&ecirc;me. Toutes les donn&eacute;es re&ccedil;ues par l&#39;application web (par email, journaux&hellip;) qui peuvent &ecirc;tre envoy&eacute;es par un attaquant doivent &ecirc;tre encod&eacute;es avant leur pr&eacute;sentation sur une page dynamique, faute de quoi une faille XSS existe.</p>\r\n\r\n<h3>Bas&eacute; sur le <a href="http://fr.wikipedia.org/wiki/Document_Object_Model">DOM</a> ou local</h3>\r\n\r\n<p>Ce type de faille XSS est connu de longue date. Un article &eacute;crit en 2005<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-2">2</a> d&eacute;finit bien ses caract&eacute;ristiques. Dans ce cas de figure, le probl&egrave;me est dans le script d&#39;une page c&ocirc;t&eacute; client. Par exemple, si un fragment de JavaScript acc&egrave;de &agrave; un param&egrave;tre d&#39;une requ&ecirc;te d&#39;<a href="http://fr.wikipedia.org/wiki/URL">URL</a>, et utilise cette information pour &eacute;crire du HTML dans sa propre page, et que cette information n&#39;est pas encod&eacute;e sous forme d&#39;<a href="http://fr.wikipedia.org/wiki/Entit%C3%A9_de_caract%C3%A8re">entit&eacute;s HTML</a>, alors il y a probablement une vuln&eacute;rabilit&eacute; de type XSS. Les donn&eacute;es &eacute;crites seront r&eacute;interpr&eacute;t&eacute;es par le navigateur comme du code HTML contenant &eacute;ventuellement un script malicieux ajout&eacute;.</p>\r\n\r\n<p>En pratique la mani&egrave;re d&#39;exploiter une telle faille sera similaire au type suivant, sauf dans une situation tr&egrave;s importante. &Agrave; cause de la mani&egrave;re dont Internet Explorer traite les scripts c&ocirc;t&eacute; client dans des objets situ&eacute;s dans la &laquo;&nbsp;zone locale&nbsp;&raquo; (par exemple le disque dur local du client), une faille de ce type peut conduire &agrave; des vuln&eacute;rabilit&eacute;s d&#39;ex&eacute;cution &agrave; distance. Par exemple, si un attaquant h&eacute;berge un site web &laquo;&nbsp;malicieux&nbsp;&raquo; contenant un lien vers une page vuln&eacute;rable sur le syst&egrave;me local du client, un script peut &ecirc;tre inject&eacute; et tournera avec les droits du navigateur web de l&#39;utilisateur sur ce syst&egrave;me. Ceci contourne compl&egrave;tement le &laquo;&nbsp;<a href="http://fr.wikipedia.org/wiki/Sandbox_%28s%C3%A9curit%C3%A9_informatique%29">bac &agrave; sable</a>&nbsp;&raquo;, pas seulement les restrictions inter-domaines qui sont normalement contourn&eacute;es par les XSS.</p>\r\n\r\n<h2>Protection contre les XSS</h2>\r\n\r\n<p>Plusieurs techniques permettent d&#39;&eacute;viter le XSS&nbsp;:</p>\r\n\r\n<ul>\r\n	<li>Retraiter syst&eacute;matiquement le code <a href="http://fr.wikipedia.org/wiki/Hypertext_Markup_Language">HTML</a> produit par l&#39;application avant l&#39;envoi au navigateur&nbsp;;</li>\r\n	<li>Filtrer les variables affich&eacute;es ou enregistr&eacute;es avec des caract&egrave;res &#39;&lt;&#39; et &#39;&gt;&#39; (en <a href="http://fr.wikipedia.org/wiki/Common_Gateway_Interface">CGI</a> comme en <a href="http://fr.wikipedia.org/wiki/PHP">PHP</a>). De fa&ccedil;on plus g&eacute;n&eacute;rale, donner des noms pr&eacute;fix&eacute;s par exemple par &quot;us&quot; (user string) aux variables contenant des chaines venant de l&#39;ext&eacute;rieur pour les distinguer des autres, et ne jamais utiliser aucune des valeurs correspondantes dans une chaine ex&eacute;cutable (en particulier une chaine <a href="http://fr.wikipedia.org/wiki/Structured_Query_Language">SQL</a>, qui peut aussi &ecirc;tre cibl&eacute;e par une <a href="http://fr.wikipedia.org/wiki/Injection_SQL">injection SQL</a> d&#39;autant plus dangereuse) sans filtrage pr&eacute;alable.</li>\r\n	<li>En <a href="http://fr.wikipedia.org/wiki/PHP">PHP</a>&nbsp;:\r\n	<ul>\r\n		<li>utiliser la fonction <code>htmlspecialchars()</code> qui filtre les &#39;&lt;&#39; et &#39;&gt;&#39; (cf. ci-dessus)&nbsp;;</li>\r\n		<li>utiliser la fonction <code>htmlentities()</code> qui est identique &agrave; <code>htmlspecialchars()</code> sauf qu&#39;elle filtre tous les caract&egrave;res &eacute;quivalents au codage <a href="http://fr.wikipedia.org/wiki/HTML">HTML</a> ou <a href="http://fr.wikipedia.org/wiki/JavaScript">JavaScript</a>.</li>\r\n		<li>utiliser <code>strip_tags()</code> qui supprime les balises.</li>\r\n	</ul>\r\n	</li>\r\n	<li>En <a href="http://fr.wikipedia.org/wiki/ColdFusion">ColdFusion</a>&nbsp;:\r\n	<ul>\r\n		<li>utiliser la fonction <code>HTMLEditFormat()</code> qui remplace tous les caract&egrave;res sp&eacute;ciaux du langage <a href="http://fr.wikipedia.org/wiki/HTML">HTML</a> par leur r&eacute;f&eacute;rence d&#39;entit&eacute;</li>\r\n		<li>d&eacute;finir l&#39;attribut <code>scriptProtect</code> du tag <code>&lt;cfapplication&gt;</code> pour prot&eacute;ger automatiquement toutes les variables (form et/ou url et/ou cgi et/ou cookies) d&#39;un site</li>\r\n		<li>activer au niveau du serveur une protection globale (form, url, cgi et cookies) par d&eacute;faut de toutes les applications en cochant la case &quot;Enable Global Script Protection&quot; du ColdFusion Administrator</li>\r\n	</ul>\r\n	</li>\r\n	<li>Utiliser de fa&ccedil;on propre les balises <a href="http://fr.wikipedia.org/wiki/HTML">HTML</a> <code>&lt;noscript&gt;&lt;/noscript&gt;</code>, ce qui est insuffisant<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-3">3</a>.</li>\r\n</ul>\r\n\r\n<p>Il existe des biblioth&egrave;ques qui permettent de filtrer efficacement du contenu balis&eacute; issu de l&#39;utilisateur (syst&egrave;mes de publication).</p>\r\n\r\n<p>Par ailleurs, il est &eacute;galement possible de se prot&eacute;ger des failles de type XSS &agrave; l&#39;aide d&#39;&eacute;quipements r&eacute;seaux d&eacute;di&eacute;s tels que les <a href="http://fr.wikipedia.org/wiki/Pare-feu_%28informatique%29">pare-feux</a> applicatifs. Ces derniers permettent de filtrer l&#39;ensemble des flux <a href="http://fr.wikipedia.org/wiki/HTTP">HTTP</a> afin de d&eacute;tecter les requ&ecirc;tes suspectes.</p>\r\n\r\n<h2>Utilisation de XSS dans des attaques</h2>\r\n\r\n<p>Plusieurs attaques importantes ont utilis&eacute; des failles de type Cross-site scripting&nbsp;:</p>\r\n\r\n<ul>\r\n	<li>Une faille de ce type &eacute;tait &agrave; l&#39;origine de la propagation des <a href="http://fr.wikipedia.org/wiki/Virus_informatique">virus</a> Samy sur <a href="http://fr.wikipedia.org/wiki/MySpace">MySpace</a> en 2005<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-4">4</a> et <a href="http://fr.wikipedia.org/wiki/Yamanner">Yamanner</a> sur <a href="http://fr.wikipedia.org/wiki/Yahoo%21">Yahoo!</a> Mail en 2006.</li>\r\n	<li>En 2010, le site apache.org a &eacute;t&eacute; compromis &agrave; l&#39;aide d&#39;une XSS<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-5">5</a></li>\r\n	<li>En septembre 2014, un informaticien &eacute;cossais pr&eacute;vient le service technique du site d&#39;ench&egrave;re eBay de la pr&eacute;sence d&#39;une fausse annonce visant &agrave; soutirer des informations bancaires. Cette attaque exploitait une faille XSS<a href="http://fr.wikipedia.org/wiki/Cross-site_scripting#cite_note-6">6</a>.</li>\r\n</ul>', '2015-01-15 22:54:51', '2015-01-15 22:54:51', 2, 'Un minimum', 'cross-site-scripting', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tutorial_programminglanguage`
--

CREATE TABLE IF NOT EXISTS `tutorial_programminglanguage` (
  `tutorial_id` int(11) NOT NULL,
  `programminglanguage_id` int(11) NOT NULL,
  PRIMARY KEY (`tutorial_id`,`programminglanguage_id`),
  KEY `IDX_954B36789366B7B` (`tutorial_id`),
  KEY `IDX_954B36728C913F9` (`programminglanguage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tutorial_programminglanguage`
--

INSERT INTO `tutorial_programminglanguage` (`tutorial_id`, `programminglanguage_id`) VALUES
(12, 4),
(22, 8),
(26, 2),
(26, 5),
(27, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D6493DA5256D` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `image_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `type`) VALUES
(1, NULL, 'christina', 'christina', 'christina.vandd@gmail.com', 'christina.vandd@gmail.com', 1, 'qq7bhjx4nfkgcg8ow8kc8kkowo0408k', 'qQ/e7kk0ltiaC80Zgi3s6+IiYRD8yk4Fx9FBxKyghvNYv9w0eLERcleDBlpNhQDHi1iLtfA2EBosuOfctPsKxg==', '2015-01-16 10:57:29', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'ROLE_ADMIN'),
(23, NULL, 'lecteur1', 'lecteur1', 'vandendycc@isl-eduee.be', 'vandendycc@isl-eduee.be', 1, '87mx789nw5k4gcg0soso0k00g4c04ks', '/wCkyiIqp3MfNHiVVMqFfNWkas9zBT/gluPdOpcaX4eceFzckux1kkIGubRZ+RT7bQEK2549uNJDXo3+WV8z2Q==', '2015-01-16 00:19:41', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_READER";}', 0, NULL, 'ROLE_READER'),
(26, 18, 'auteur1', 'auteur1', 'pearl_and_shine@msn.com', 'pearl_and_shine@msn.com', 1, 'of4b2vrdqkgw4w8ssoowsk8w4c8wkgk', 'Pn8bw+kjpFOc7DvkM0hz5KnYogKtAf9lS92Ty+qnUkcRlH3ot81cV+gvGUYFcdteDA7SPAwt/m8yw5yhT/ErRw==', '2015-01-16 00:15:45', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(27, NULL, 'Dougi', 'dougi', 'gdekikine@hotmail.com', 'gdekikine@hotmail.com', 1, 'b2qqp7lnb8gkoggkg00k4cgcoko04gc', 'uKKAXJ0qMoMVVAeP3MwI8IZtPmGbXm9E+sjgNLsiel3/6rQ3pMAzstwThQZ+6d6SgAJFY2RX5qOppv7t1dBrbg==', '2015-01-09 12:07:11', 0, 0, NULL, 'yUQ_982HkqOkbChz7jqnwObC-iWXUjC1sbavSLl-X_I', NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(28, NULL, 'lecteur2', 'lecteur2', 'chvandendy@voo.be', 'chvandendy@voo.be', 1, '3eo0dyah2xicgsw0csgo44wok0g4ssk', '0fUw2ypGt59DvkHGq/VMcM9qDZZC4kEfnHgIHl5JhfHTW59dpa70cgA/YjiPbVFLRFPRRCGOwt7lbtntsfjcpg==', '2014-12-30 13:38:32', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_READER";}', 0, NULL, 'ROLE_READER'),
(29, NULL, 'bernard', 'bernard', 'bernardcv@voo.be', 'bernardcv@voo.be', 1, 'edipu6rzw2og84g84w4kkgc0w008sww', 'T/B+hMtmOmtB+F74tsmVcFid370L2LfKahn+LMpTyyoKIQ9/fDig0lZU08sbbJPDUrl38aRqRUYuDvqBcSPDHQ==', '2014-12-30 13:55:26', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(34, NULL, 'auteur88', 'auteur88', 'vandendycc@isl-edu.bee', 'vandendycc@isl-edu.bee', 1, '4t0gwtrkb3msgk4g0ccwco80gsg0c40', 'o53n7ZfUC5PY8ya7PnCDkR7waX4JI9ayTkr4nVUsgNu6Aajnf7me/4JSxy2uSdSBPSvwqdN14+PYwAY1vEfX7Q==', '2015-01-09 11:47:49', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(35, NULL, 'FloAuteur', 'floauteur', 'fleclercq@isl.be', 'fleclercq@isl.be', 1, 'rbndtl1uakg0kwc4ock4k0w4g0swcgc', '5U5CIgB1I304LPfoXSoSwc6wRwGdDxXB0V6Cc+rPmMGAOosmH8K8sfu4NFjFp/CgMT4TvHWYH0LEaggT/4DWUw==', '2015-01-15 15:48:02', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(36, NULL, 'myauthor', 'myauthor', 'vandendycc@isl-edu.be', 'vandendycc@isl-edu.be', 1, '336f57l3cc2skcs8gccc4k4owckwwco', 'KH5ZkJsNeWiwBNxttVbTeMUXWFauqkzKCrIBWNyyEzHmfRNrNgvyqDtpwi9yAuVF4PXK7qQToc5m5ba8bZxPEg==', '2015-01-09 12:00:47', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(37, 20, 'Christophe', 'christophe', 'c.beck@cbg-consult.com', 'c.beck@cbg-consult.com', 1, '314tbgbwpp0ko4cggc8gwo0wcoo8c8g', 'eubFluufQkaz72PqAroznGEbmrE1bqilqDK55IMwj/M/avs6QHMPwSle8uaeWvKnbVkiGIQdzpCl/dkXSEz+vw==', '2015-01-15 22:25:28', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_AUTHOR";}', 0, NULL, 'ROLE_AUTHOR'),
(38, NULL, 'Chri', 'chri', 'christophe@cbg-consult.com', 'christophe@cbg-consult.com', 1, 'bcaxxho2oygcwoog8oc4ks0cc848gs8', '7tza2U6HD24n/JH7wiBKWs+/kZzC9ELUytMvOk3dy/48lwBsz1iQfkqMD8eLbhcF129Ce0JRqqre86kI3DNxJQ==', '2015-01-15 23:41:50', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_READER";}', 0, NULL, 'ROLE_READER');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acl_entries`
--
ALTER TABLE `acl_entries`
  ADD CONSTRAINT `FK_46C8B8063D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806DF9183C9` FOREIGN KEY (`security_identity_id`) REFERENCES `acl_security_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_46C8B806EA000B10` FOREIGN KEY (`class_id`) REFERENCES `acl_classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `acl_object_identities`
--
ALTER TABLE `acl_object_identities`
  ADD CONSTRAINT `FK_9407E54977FA751A` FOREIGN KEY (`parent_object_identity_id`) REFERENCES `acl_object_identities` (`id`);

--
-- Contraintes pour la table `acl_object_identity_ancestors`
--
ALTER TABLE `acl_object_identity_ancestors`
  ADD CONSTRAINT `FK_825DE2993D9AB4A6` FOREIGN KEY (`object_identity_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_825DE299C671CEA1` FOREIGN KEY (`ancestor_id`) REFERENCES `acl_object_identities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `FK_BDAFD8C8A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C13DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C89366B7B` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `FK_68C58ED989366B7B` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`id`),
  ADD CONSTRAINT `FK_68C58ED9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reader`
--
ALTER TABLE `reader`
  ADD CONSTRAINT `FK_CC3F893CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `FK_794381C689366B7B` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`id`),
  ADD CONSTRAINT `FK_794381C6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `FK_C66BFFE912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_C66BFFE93DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_C66BFFE9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tutorial_programminglanguage`
--
ALTER TABLE `tutorial_programminglanguage`
  ADD CONSTRAINT `FK_954B36728C913F9` FOREIGN KEY (`programminglanguage_id`) REFERENCES `programminglanguage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_954B36789366B7B` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6493DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
