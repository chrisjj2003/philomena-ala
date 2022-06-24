-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jun 2022 om 22:26
-- Serverversie: 10.4.20-MariaDB
-- PHP-versie: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `philomena`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `afspraak`
--

CREATE TABLE `afspraak` (
  `id` int(11) NOT NULL,
  `tijd` time NOT NULL,
  `datum` date NOT NULL,
  `status` varchar(14) NOT NULL,
  `klantID` int(11) NOT NULL,
  `medID` int(11) NOT NULL,
  `behandelingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `afspraak`
--

INSERT INTO `afspraak` (`id`, `tijd`, `datum`, `status`, `klantID`, `medID`, `behandelingID`) VALUES
(15, '16:00:00', '2022-06-30', '1', 7, 9, 3),
(17, '11:00:00', '2022-06-27', '1', 8, 9, 24),
(23, '08:30:00', '2022-06-29', '1', 8, 10, 1),
(26, '12:30:00', '2022-06-25', '1', 10, 11, 31),
(27, '09:30:00', '2022-06-25', '1', 10, 9, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `behandeling`
--

CREATE TABLE `behandeling` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `categorie` varchar(144) NOT NULL,
  `type` varchar(10) NOT NULL,
  `prijs` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `behandeling`
--

INSERT INTO `behandeling` (`id`, `naam`, `categorie`, `type`, `prijs`) VALUES
(1, 'Naturel : Gel /powergel / acryl', 'nieuwe set', 'nagels', '50.00'),
(2, 'French manicure : gel / powergel/ acryll', 'nieuwe set', 'nagels', '55.00'),
(3, 'Gelpolish : gel/powergel/acryl', 'nieuwe set', 'nagels', '57.50'),
(4, 'Naturel: gel / powergel/ acryl', 'nabehandeling', 'nagels', '32.50'),
(5, 'French manicure: gel/powergel/acryl ', 'nabehandeling', 'nagels', '35.00'),
(6, 'Gelpolish: gel/powergel/acryl', 'nabehandeling', 'nagels', '37.50'),
(15, 'Kunstnagels verwijderen', 'nabehandeling', 'nagels', '30.00'),
(16, 'Gel op natuurlijke nagels', 'nabehandeling', 'nagels', '25.00'),
(17, 'Manicure 30 min', 'handen', 'nagels', '25.00'),
(18, 'Gelpolish op natuurlijke nagels', 'handen', 'nagels', '17.50'),
(19, 'Manicure incl. gelpolish', 'handen', 'nagels', '25.00'),
(20, 'Wpa pedicure: eelt verwijderen en verzorging 30 min.', 'voeten', 'nagels', '27.00'),
(21, 'Gelpolish op tenen nagels ', 'voeten', 'nagels', '25.00'),
(22, 'Gel met French manicure op teen nagels', 'voeten', 'nagels', '35.00'),
(23, 'Spa pedicure incl. Gelpolish', 'voeten', 'nagels', '40.00'),
(24, 'Knippen', 'Dames', 'haar', '25.00'),
(25, 'Knippen / drogen / zonder product', 'Dames', 'haar', '28.00'),
(26, 'Knippen / modelleren', 'Dames', 'haar', '32.00'),
(27, 'Wassen / knippen', 'Dames', 'haar', '28.00'),
(28, 'Wassen / knippen / drogen / zonder product', 'Dames', 'haar', '31.00'),
(29, 'Wassen / knippen / modelleren', 'Dames', 'haar', '35.00'),
(30, 'Knippen', 'Heren', 'haar', '25.00'),
(31, 'Wassen/Knippen', 'Heren', 'haar', '27.50'),
(32, 'Knippen', 'Kinderen tm 11 jaar', 'haar', '18.50'),
(33, 'Wassen / knippen', 'Kinderen tm 11 jaar', 'haar', '21.50'),
(34, 'Wassen / knippen / drogen', 'Kinderen tm 11 jaar', 'haar', '24.50'),
(35, 'Knippen', 'Kinderen 12 t/m 15 jaar', 'haar', '21.50'),
(36, 'Wassen / knippen', 'Kinderen 12 t/m 15 jaar', 'haar', '23.50'),
(37, 'Wassen / knippen / drogen', 'Kinderen 12 t/m 15 jaar', 'haar', '26.50');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`) VALUES
(7, 'cho', 'cho', 'chostreet', '3920KL', 'cho', 'cho@gmail.com', '$2y$10$.bAEJFm5UVC4S8J6/TPIs./qV0S5d0573/1sPIDssFliq07qXyqXm'),
(8, 'stijn', 'land', 'stijnstraat2', '7373KL', 'stijnland', 'stijnland@gmail.com', '$2y$10$pOYiGsA2lB9NMtI2.x4tguHk0AucprUveKnIsdjjtqCw2QjUPCaH2'),
(9, 'leo', 'leo', 'leolaan', '3920KL', 'leoleo', 'leo@gmail.com', '$2y$10$lmr1dmkBwWHpg5QHIh.5E.V9BZFzokNGhyVD5RgqX2Ejoiy60YC/.'),
(10, 'jamie', 'de leest', 'evenaar', '3067KM', 'rotterdam', 'jamieiscool@gmail.com', '$2y$10$ZlV00zfz85hRbDECzBfNp.fcUvQ449Lg/0eNCcT/eAwof/EmEZC0.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `functie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `functie`) VALUES
(8, 'aapie', 'aap', 'aapieaap@gmail.com', '$2y$10$QVJqDP3QvvDqBkx70Q3aMuyp3F4D34bv.APGCgML/4fPAI/DzD2KS', 'baas'),
(9, 'bernard', 'geld', 'bernardheeftgeld@gmail.com', '$2y$10$S2TBXKd60wo8vQj/VvFa8.t2hcOO0HjnK8OY.V/vX4qHuE7OrwaJO', 'stylist'),
(10, 'jan', 'kooiman', 'jankooiman@gmail.com', '$2y$10$POB4baaJZNx8K4n20AhFceN3wIDwgaIjghifQePAFulIgQ6YGY47K', 'kapper'),
(11, 'calvin', 'van der tak', 'calviniszwart@gmail.com', '$2y$10$JHwuPr7OzZTumihQS2ky1eneNNlj8f07E6AMkO2C892WPGP9oHWam', 'kapper');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afspraak`
--
ALTER TABLE `afspraak`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `behandeling`
--
ALTER TABLE `behandeling`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afspraak`
--
ALTER TABLE `afspraak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT voor een tabel `behandeling`
--
ALTER TABLE `behandeling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
