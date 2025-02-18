-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Wrz 2023, 23:33
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `characters`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `wiek` int(11) NOT NULL,
  `plec` text NOT NULL,
  `rola` text NOT NULL,
  `wystepowanie` text NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `characters`
--

INSERT INTO `characters` (`id`, `imie`, `nazwisko`, `wiek`, `plec`, `rola`, `wystepowanie`, `opis`) VALUES
(1, 'Arthur ', 'Morgan', 30, 'Mężczyzna', 'Kowboj', 'W dupie', 'Lata chodzi biega szczela'),
(2, 'John', 'Marston', 30, 'Mężczyzna', 'Kowboj later', 'as well', 'opis okolicznosci popis'),
(3, 'Dutch', 'van der Linde', 56, 'Mężczyzna', 'Przywódca gangu', 'W obozie, w trakcje poszczególnych misji', 'He always have a plan, gites ale potem coś ma nie równo pod sufitem.'),
(4, 'Abigail', 'Marston(wcześniej Roberts)', 34, 'Kobieta', 'Żona i matka jedna z lepiej odznaczających się kobiet w gangu', 'W obozie, na farmie, w cutscenkach i misjach', 'Gites babka'),
(5, 'Sadie', 'Adler', 37, 'Kobieta', 'Żona, później kowbojka', 'Obóz, cutscenki, misje', 'Po śmierci męża stała się kowbojką'),
(6, 'Sean', 'MacGuire', 19, 'Mężczyzna', 'Pomocnik gangu', 'W obozie gangu, misjach, cutscenkach', 'Jeden z najmłodszych dorosłych gangu'),
(7, 'Simon', 'Pearson', 48, 'Mężczyzna', 'Kucharz', 'W obozie, cutscenkach', 'Karmi wszystkich, dziko pyszny gularz'),
(8, 'Uncle, Old Man', '---', 62, 'Mężczyzna', 'Jest wujem zawsze wie lepiej', 'Wszędzie tam gdzie alkohol', '\"They call me lazy, i\'m not lazy i just don\'t like working, it\'s difference\"'),
(9, 'Susan', 'Grimshaw', 55, 'Kobieta', 'Wdowa, wsparcie moralne ', 'W obozie gangu, cutscenkach, misjach', 'Bardzo żywiołowa, lepiej z nią nie zadzierać'),
(10, 'Micah', 'Bell', 47, 'Mężczyzna', 'Impostor', 'Tam gdzie nie powinien', 'Zdrajca, krętacz, bezbożnik, brak sumienia');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
