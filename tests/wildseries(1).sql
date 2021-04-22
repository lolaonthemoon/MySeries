-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 21 avr. 2021 à 10:42
-- Version du serveur :  8.0.23-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wildseries`
--

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Horreur');

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210418174044', '2021-04-18 19:46:40', 239),
('DoctrineMigrations\\Version20210418181057', '2021-04-18 20:13:07', 378),
('DoctrineMigrations\\Version20210421081241', '2021-04-21 10:17:56', 380);

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`id`, `season_id`, `title`, `number`, `synopsis`) VALUES
(1, 1, 'Besogne nocturne (Night Work)', 1, 'Synopsis Besogne nocturne (Night Work)'),
(2, 1, 'La Séance (Séance)', 2, 'La Séance (Séance)'),
(3, 1, 'Résurrection (Resurrection)', 3, 'Résurrection (Resurrection)'),
(4, 1, 'Le Demi-Monde (Demimonde)', 4, 'Le Demi-Monde (Demimonde)'),
(5, 2, 'La Fraîcheur de l\'enfer (Fresh Hell)', 1, 'La Fraîcheur de l\'enfer (Fresh Hell)'),
(6, 2, 'Verbis Diablo (Verbis Diablo)', 2, 'Verbis Diablo (Verbis Diablo)'),
(7, 2, 'Les Visiteurs de la nuit (The Nightcomers)', 3, 'Les Visiteurs de la nuit (The Nightcomers)');

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id`, `title`, `summary`, `poster`, `category_id`, `country`, `year`) VALUES
(1, 'Walking Dead', 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le monde, ravagé par une épidémie, est envahi par les morts-vivants.', 'https://m.media-amazon.com/images/M/MV5BZmFlMTA0MmUtNWVmOC00ZmE1LWFmMDYtZTJhYjJhNGVjYTU5XkEyXkFqcGdeQXVyMTAzMDM4MjM0._V1_.jpg', 1, NULL, NULL),
(2, 'The Haunting Of Hill House', 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les fantômes de leur passé.', 'https://m.media-amazon.com/images/M/MV5BMTU4NzA4MDEwNF5BMl5BanBnXkFtZTgwMTQxODYzNjM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 1, NULL, NULL),
(3, 'American Horror Story', 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.', 'https://m.media-amazon.com/images/M/MV5BODZlYzc2ODYtYmQyZS00ZTM4LTk4ZDQtMTMyZDdhMDgzZTU0XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg', 1, NULL, NULL),
(4, 'Love Death And Robots', 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles, des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang : tout ce beau monde est réuni dans 18 courts métrages animés déconseillés aux âmes sensibles.', 'https://m.media-amazon.com/images/M/MV5BMTc1MjIyNDI3Nl5BMl5BanBnXkFtZTgwMjQ1OTI0NzM@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 1, NULL, NULL),
(5, 'Penny Dreadful', 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles d Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables.  Ensemble, ils combattent un ennemi inconnu, presque invisible, qui ne semble pas humain et qui massacre la population.', 'https://m.media-amazon.com/images/M/MV5BNmE5MDE0ZmMtY2I5Mi00Y2RjLWJlYjMtODkxODQ5OWY1ODdkXkEyXkFqcGdeQXVyNjU2NjA5NjM@._V1_SY1000_CR0,0,695,1000_AL_.jpg', 1, NULL, NULL),
(6, 'Fear The Walking Dead', 'La série se déroule au tout début de l épidémie relatée dans la série-mère The Walking Dead et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de Los Angeles. Depuis la mort de son mari, elle élève seule ses deux enfants : Alicia, excellente élève qui découvre les premiers émois amoureux, et son grand frère Nick qui a quitté la fac et a sombré dans la drogue.', 'https://m.media-amazon.com/images/M/MV5BYWNmY2Y1NTgtYTExMS00NGUxLWIxYWQtMjU4MjNkZjZlZjQ3XkEyXkFqcGdeQXVyMzQ2MDI5NjU@._V1_SY1000_CR0,0,666,1000_AL_.jpg', 1, NULL, NULL);

--
-- Déchargement des données de la table `season`
--

INSERT INTO `season` (`id`, `program_id`, `number`, `year`, `description`) VALUES
(1, 5, 1, 2014, 'Composée de huit épisodes, elle a été diffusée du 11 mai 20141 au 29 juin 2014 sur Showtime, aux États-Unis. '),
(2, 5, 2, 2015, 'Composée de dix épisodes, elle a été diffusée du 3 mai 201525 au 5 juillet 2015 sur Showtime, aux États-Unis. '),
(3, 5, 3, 2016, 'Composée de neuf épisodes, elle a été diffusée du 1er mai 201626 au 19 juin 2016 sur Showtime, aux États-Unis. ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
