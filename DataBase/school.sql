-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2024 at 12:48 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_naiss` date NOT NULL,
  `Adresse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Tél` int NOT NULL,
  `Password` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `pfp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Nom`, `Date_naiss`, `Adresse`, `Email`, `Tél`, `Password`, `pfp`) VALUES
(1, 'Manel Nafissa', '1985-04-02', '458 Rue 3, Annaba', 'Admin23@gmail.com', 514893654, '123456', 'C:/wamp64/www/hassan_el_annabi/images/user_pfp_black');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Article_id` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_création` date NOT NULL,
  `Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `Prof_id` int NOT NULL,
  `Id_cat` int NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Article_id`),
  KEY `Prof_id` (`Prof_id`,`Id_cat`),
  KEY `fk_Idcatart` (`Id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_id`, `Titre`, `Date_création`, `Description`, `Prof_id`, `Id_cat`, `contenu`, `image`) VALUES
(15, 'first announcement ', '2024-05-09', 'first announcement content', 101, 1, '', ''),
(25, '2 piano2344', '2024-05-20', 'azertyhgvvhj', 101, 2, 'pdf/pdf_664bccbca6d8c6.39041549.pdf', ''),
(26, '2 trfh', '2024-05-21', 'sdfn,', 101, 2, 'pdf/pdf_664c7f545fb8f6.56236397.pdf', ''),
(27, '4 violon livre1', '2024-05-23', 'uehizrh', 113, 2, 'pdf/pdf_664f5141e7e300.59347296.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_cat` int NOT NULL,
  `Nom_cat` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`Id_cat`, `Nom_cat`) VALUES
(1, 'annonce'),
(2, 'livre');

-- --------------------------------------------------------

--
-- Table structure for table `cat_artistique`
--

DROP TABLE IF EXISTS `cat_artistique`;
CREATE TABLE IF NOT EXISTS `cat_artistique` (
  `Id_cat_art` int NOT NULL,
  `Désignation` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `Image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id_cat_art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_artistique`
--

INSERT INTO `cat_artistique` (`Id_cat_art`, `Désignation`, `Description`, `Image`) VALUES
(1, 'Solfège', 'Développer votre compréhension avec nos instructeurs qualifiés qui vous guideront pour enrichir votre expérience musicale à travers les bases de la théorie musicale.', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\solfège.png'),
(2, 'Piano', 'Découvrez notre programme de cours de piano captivants, conçus pour les débutants, les intermédiaires et les avancés.', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\piano.png'),
(3, 'Guitare', 'Explorez la joie de jouer de la guitare à travers nos cours sur mesure, adaptés à tous les niveaux et tous les styles musicaux.', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\guitar.png'),
(4, 'Violon', 'Découvrez l\'art du violon avec nos cours personnalisés ! Notre école de musique propose des leçons adaptées à tous les niveaux.', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\violon.png'),
(5, 'Danse Classique', 'Explorez la grâce de la danse classique avec nos cours pour tous niveaux, enseignés par des professionnels pour développer votre art et votre musicalité.', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\ballet.png'),
(6, 'Art Dramatique', 'Explorez les personnages, l\'improvisation et la maîtrise de la scène avec nos instructeurs passionnés pour libérer votre potentiel artistique sur scène dans le monde dynamique de l\'art dramatique !', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\art_dramatique.png');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `Cours_id` int NOT NULL,
  `Prof_id` int NOT NULL,
  `Id_cat_art` int NOT NULL,
  `Horaire` time NOT NULL,
  `Salle` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Période` time NOT NULL,
  PRIMARY KEY (`Cours_id`),
  KEY `Prof_id` (`Prof_id`,`Id_cat_art`),
  KEY `fk_catartId` (`Id_cat_art`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`Cours_id`, `Prof_id`, `Id_cat_art`, `Horaire`, `Salle`, `Période`) VALUES
(1, 101, 2, '09:00:00', 'salle 1', '01:00:00'),
(2, 103, 2, '10:00:00', 'salle 2', '01:00:00'),
(3, 111, 4, '11:00:00', 'salle 3', '01:00:00'),
(4, 113, 4, '13:00:00', 'salle 4', '01:00:00'),
(5, 116, 5, '14:00:00', 'salle 5', '01:00:00'),
(6, 117, 6, '15:00:00', 'salle 6', '01:00:00'),
(7, 115, 5, '16:00:00', 'salle 7', '01:00:00'),
(8, 114, 5, '09:00:00', 'salle 2', '01:00:00'),
(9, 115, 5, '10:00:00', 'salle 3', '01:00:00'),
(10, 116, 5, '11:00:00', 'salle 4', '01:00:00'),
(11, 103, 2, '13:00:00', 'salle 5', '01:00:00'),
(12, 113, 4, '14:00:00', 'salle 6', '01:00:00'),
(13, 107, 1, '15:00:00', 'salle 7', '01:00:00'),
(14, 119, 6, '16:00:00', 'salle 8', '01:00:00'),
(15, 105, 1, '09:00:00', 'salle 3', '01:00:00'),
(16, 106, 1, '10:00:00', 'salle 4', '01:00:00'),
(17, 102, 2, '11:00:00', 'salle 5', '01:00:00'),
(18, 115, 5, '13:00:00', 'salle 6', '01:00:00'),
(19, 119, 6, '14:00:00', 'salle 7', '01:00:00'),
(20, 111, 4, '15:00:00', 'salle 8', '01:00:00'),
(21, 116, 5, '16:00:00', 'salle 9', '01:00:00'),
(22, 102, 2, '09:00:00', 'salle 4', '01:00:00'),
(23, 104, 2, '10:00:00', 'salle 5', '01:00:00'),
(24, 107, 1, '11:00:00', 'salle 6', '01:00:00'),
(25, 108, 3, '13:00:00', 'salle 7', '01:00:00'),
(26, 111, 4, '14:00:00', 'salle 8', '01:00:00'),
(27, 114, 5, '15:00:00', 'salle 9', '01:00:00'),
(28, 113, 4, '16:00:00', 'salle 10', '01:00:00'),
(29, 108, 3, '09:00:00', 'salle 5', '01:00:00'),
(30, 109, 3, '10:00:00', 'salle 6', '01:00:00'),
(31, 110, 3, '11:00:00', 'salle 7', '01:00:00'),
(32, 105, 1, '13:00:00', 'salle 8', '01:00:00'),
(33, 104, 2, '14:00:00', 'salle 9', '01:00:00'),
(34, 118, 6, '15:00:00', 'salle 10', '01:00:00'),
(35, 104, 2, '16:00:00', 'salle 1', '01:00:00'),
(36, 117, 6, '09:00:00', 'salle 6', '01:00:00'),
(37, 118, 6, '10:00:00', 'salle 7', '01:00:00'),
(38, 112, 4, '11:00:00', 'salle 8', '01:00:00'),
(39, 112, 4, '13:00:00', 'salle 9', '01:00:00'),
(40, 106, 1, '14:00:00', 'salle 10', '01:00:00'),
(41, 101, 2, '15:00:00', 'salle 1', '01:00:00'),
(42, 109, 3, '16:00:00', 'salle 2', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `Elève_id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_naiss` date NOT NULL,
  `Adresse` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Tél` int NOT NULL,
  `Niveau` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `pfp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Elève_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve`
--

INSERT INTO `eleve` (`Elève_id`, `Nom`, `Date_naiss`, `Adresse`, `Email`, `Tél`, `Niveau`, `Password`, `pfp`) VALUES
(1, 'Amel Amari', '2007-04-15', '23 Rue des oliviers, Annaba', 'amel.amari@gmail.com', 555121450, 'Débutant', 'sarah.2005', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_orange'),
(2, 'Karim Badji', '2006-08-22', '32 Boulevard , Annaba', 'karim.badji@gmail.com', 559045468, 'Débutant', 'karim.2006', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_lavender'),
(22, 'Ahmed Ben Ammar', '2000-03-15', '1 Rue des Oliviers', 'ahmed.benammar@example.com', 555123456, 'Intermédiaire', 'ahmed2000', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_blue'),
(23, 'Fatima Zahra Meziani', '1998-09-20', '2 Boulevard des Roses', 'fatimazahra.meziani@example.com', 555987654, 'Avancé', 'fzahra98', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_pink'),
(24, 'Younes Mohamed Ali', '2002-05-10', '3 Avenue des Palmiers', 'younes.mohamedali@example.com', 555765432, 'Débutant', 'younes02', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_red'),
(25, 'Karim Bouchaib', '1997-11-25', '4 Rue des Jasmins', 'karim.bouchaib@example.com', 555456789, 'Intermédiaire', 'kbouchaib97', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_black'),
(26, 'Sofiane Khaledi', '2001-07-18', '5 Boulevard des Iris', 'sofiane.khaledi@example.com', 555567890, 'Avancé', 'sofiane01', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_green'),
(27, 'Nour El Houda Mansouri', '2003-04-05', '6 Rue des Tulipes', 'nour.mansouri@example.com', 555234567, 'Débutant', 'nour03', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_lavender'),
(28, 'Lamia Oussama', '1999-01-12', '7 Avenue des Marguerites', 'lamia.oussama@example.com', 555765432, 'Intermédiaire', 'lamia99', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_yellow'),
(29, 'Ali Amel', '2004-08-30', '8 Boulevard des Orchidées', 'ali.amel@example.com', 555987654, 'Avancé', 'ali04', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_orange'),
(30, 'Hichem Dalila', '1996-06-22', '9 Rue des Mimosas', 'hichem.dalila@example.com', 555123456, 'Débutant', 'hichem96', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_purple'),
(31, 'Salim Fatma', '2000-02-14', '10 Avenue des Lys', 'salim.fatma@example.com', 555765432, 'Intermédiaire', 'salim00', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_orange'),
(32, 'Amina Karim', '1998-10-03', '11 Rue des Violettes', 'amina.karim@example.com', 555456789, 'Avancé', 'amina98', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_lavender'),
(33, 'Nabil Nassima', '2003-07-17', '12 Boulevard des Lilas', 'nabil.nassima@example.com', 555987654, 'Débutant', 'nabil03', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_blue'),
(34, 'Fatiha Samir', '1997-05-01', '13 Rue des Coquelicots', 'fatiha.samir@example.com', 555123456, 'Intermédiaire', 'fatiha97', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_pink'),
(35, 'Karima Yacine', '2002-12-25', '14 Avenue des Pivoines', 'karima.yacine@example.com', 555765432, 'Avancé', 'karima02', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_green'),
(36, 'Nadia Zinedine', '1995-08-09', '15 Boulevard des Chrysanthèmes', 'nadia.zinedine@example.com', 555987654, 'Débutant', 'nadia95', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_red'),
(39, 'amine', '2007-05-03', '23 jgkfldvs', 'aminegh@gmail.com', 0, 'Débutant', '123456', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_yellow\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `eleve_cours`
--

DROP TABLE IF EXISTS `eleve_cours`;
CREATE TABLE IF NOT EXISTS `eleve_cours` (
  `Cours_id` int NOT NULL,
  `Elève_id` int NOT NULL,
  `Note` float NOT NULL,
  KEY `Cours_id` (`Cours_id`),
  KEY `Elève_id` (`Elève_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eleve_cours`
--

INSERT INTO `eleve_cours` (`Cours_id`, `Elève_id`, `Note`) VALUES
(1, 1, 10),
(1, 2, 11),
(2, 22, 13),
(2, 23, 10),
(3, 24, 14),
(3, 25, 10),
(4, 26, 11),
(4, 27, 12),
(5, 28, 13),
(5, 29, 15),
(6, 30, 10),
(6, 31, 12),
(4, 1, 10),
(1, 39, 0),
(2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evènement`
--

DROP TABLE IF EXISTS `evènement`;
CREATE TABLE IF NOT EXISTS `evènement` (
  `Event_id` int NOT NULL AUTO_INCREMENT,
  `Nom_Event` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_Event` date NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `Id_cat_art` int NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Event_id`),
  KEY `Id_cat_art` (`Id_cat_art`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evènement`
--

INSERT INTO `evènement` (`Event_id`, `Nom_Event`, `Date_Event`, `description`, `Id_cat_art`, `image`) VALUES
(2, 'Festival de TIimgad', '2024-07-12', 'Un festival annuel de musique et d’art qui célèbre l’histoire et la culture algériennes.', 6, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\timgadevent'),
(3, 'Hommage à l’Emir Abdelkader', '2024-09-15', 'Pièce de théâtre retraçant la vie et le combat de l’Emir Abdelkader, figure emblématique de la résistance algérienne.', 6, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\eventabdelkader'),
(4, 'Gala de Danse Classique d’Annaba', '2024-03-15', 'Une célébration annuelle de la danse classique, avec des performances des meilleures troupes nationales.', 5, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\balletevent2(3mai)'),
(5, 'Les Étoiles du Ballet', '2024-05-20', 'Un concours de danse pour découvrir les talents de demain et rendre hommage aux grands ballets classiques.', 5, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\balletevent1(20mai)'),
(6, 'Festival des Virtuoses', '2024-06-09', 'Un événement dédié aux performances solo de piano par des musiciens.', 2, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\pianoevent'),
(7, 'Nuits Musicales d’Annaba', '2024-08-14', 'Une série de concerts en plein air mettant en vedette des compositions de violon, allant du classique au contemporain.', 4, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\vilolinevent1(14 juin)'),
(8, 'Symphonie des Jeunes Talents', '2024-10-03', 'Un concours national pour jeunes musiciens excellant en guitare, combiné à des ateliers de solfège.', 3, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\guitarevent'),
(9, 'La Mélodie des Cordes', '2024-12-05', 'Un concert célébrant les instruments à cordes, avec des pièces classiques et modernes pour violon.', 4, 'C:\\wamp64\\www\\hassan_el_annabi\\images\\events\\violinevent2');

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `Prof_id` int NOT NULL,
  `Nom` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `Date_naiss` date NOT NULL,
  `Adresse` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Tél` int NOT NULL,
  `Spécialité` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `pfp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`Prof_id`, `Nom`, `Date_naiss`, `Adresse`, `Email`, `Tél`, `Spécialité`, `pfp`, `Password`) VALUES
(101, 'Benali Karim', '1980-03-15', '123 Rue de l\'Ecole,Annaba', 'Karim.benali@gmail.com', 555123456, 'Piano', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_black', 'BenaliKarim'),
(102, 'Khalfawi Sophia', '1985-07-21', '456 Avenue des Professeurs,Annaba', 'Sophia.khalfawi@gmail.com', 555987654, 'Piano', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_pink', 'KhalfawiSophia'),
(103, 'Bouzidi Youssef', '1990-12-10', '789 Boulevard,Annaba', 'Youssef.bouzidi@gmail.com', 555234567, 'Piano', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_blue', 'BouzidiYoussef'),
(104, 'Ait Ouali Amina', '1988-05-05', '321 Avenue des profs,Annaba', 'Amina.aitouali@gmail.com', 555345678, 'Piano', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_purple', 'AitOualiAmina'),
(105, 'Mekki Ahmed', '1995-08-28', '567 Rue bijoux,Annaba', 'Ahmed.mekki@gmail.com', 555456789, 'Solfège', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_green', 'MekkiAhmed'),
(106, 'Belkacem Samira', '1983-02-12', '890 Beauséjour,Annaba', 'Samira.belkacem@gmail.com', 555567890, 'Solfège', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_yellow', 'BelkacemSamira'),
(107, 'Kaci Adel', '1992-09-07', '234 Les allemands,Annaba', 'Adel.kaci@gmail.com', 555789012, 'Solfège', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_red', 'KaciAdel'),
(108, 'Zeroukki Nadia', '1986-04-03', '234 Avenue de l\'instruction,Annaba', 'Nadia.zeroukki@gmail.com', 555891234, 'Guitare', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_lavender', 'ZerroukiNadia'),
(109, 'Boujema Fatima', '1982-02-12', '678 Rue de L\'enseignant,Annaba', 'Fatima.boujema@gmail.com', 555901239, 'Guitare', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_orange', 'BoujemaFatima'),
(110, 'Djellouli Hakim', '1987-06-14', '345 Boulevard de scolarité,Annaba', 'Hakim.djellouli@gmail.com', 555123161, 'Guitare', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_blue', 'DjellouliHakim'),
(111, 'Toumi Lila', '1995-07-18', '901 Avenue d\'Apprentissage,Annaba', 'Lila.toumi@gmail.com', 555112233, 'Violon', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_pink', 'ToumiLila'),
(112, 'Merouani Rachid', '1984-10-26', '678 Rue Educateurs,Annaba', 'Rachid.merouani@gamil.com', 555445566, 'Violon', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_black', 'MerouaniRachid'),
(113, 'Azzedine Nawel', '1994-03-01', '226 la colone,Annaba', 'Nawel.azzedine@gmail.com', 555778899, 'Violon', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_green', 'AzzedineNawel'),
(114, 'Bensalem Houda', '1994-12-18', '567 immeuble de france,Annaba', 'Houda.bensalem@gmail.com', 555983214, 'Danse Classique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_purple', 'BensalemHouda'),
(115, 'Khaldi Lamia', '1991-06-07', '758 cour de Révolution,Annaba', 'Lamia.khaldi@gmail.com', 551122334, 'Danse Classique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_yellow', 'KhaldiLamia'),
(116, 'Wahabi Zahra', '1996-09-30', '561 L\'orange Rue,Annaba', 'Zahra.wahabi@gmail.com', 672311450, 'Danse Classique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_red', 'WahabiZahra'),
(117, 'Bouziane Farid', '1972-04-15', '857 Djenan El Bey,Annaba', 'Farid.bouziane@gmail.com', 689754124, 'Art Dramatique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_black', 'BouzianeFarid'),
(118, 'Amara Mohammed', '1982-04-15', '785 Majestic,Annaba', 'Mohammed.amara@gmail.com', 769584732, 'Art Dramatique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_orange', 'AmaraMohammed'),
(119, 'Benyahya Hakima', '1986-07-05', '457 Place d\'arme,Annaba', 'Hakima.benyahya@gmail.com', 711223344, 'Art Dramatique', 'C:\\wamp64\\www\\hassan_el_annabi\\images\\user_pfp_lavender', 'BenyahyaHakima');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_Idcatart` FOREIGN KEY (`Id_cat`) REFERENCES `cat_artistique` (`Id_cat_art`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_Idprof` FOREIGN KEY (`Prof_id`) REFERENCES `professeur` (`Prof_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_catartId` FOREIGN KEY (`Id_cat_art`) REFERENCES `cat_artistique` (`Id_cat_art`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_profId` FOREIGN KEY (`Prof_id`) REFERENCES `professeur` (`Prof_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `eleve_cours`
--
ALTER TABLE `eleve_cours`
  ADD CONSTRAINT `fk_coursId` FOREIGN KEY (`Cours_id`) REFERENCES `cours` (`Cours_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_eleveId` FOREIGN KEY (`Elève_id`) REFERENCES `eleve` (`Elève_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `evènement`
--
ALTER TABLE `evènement`
  ADD CONSTRAINT `fk_idcatartEvent` FOREIGN KEY (`Id_cat_art`) REFERENCES `cat_artistique` (`Id_cat_art`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
