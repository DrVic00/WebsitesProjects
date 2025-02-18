-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 12, 2024 at 11:42 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strzelnica`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `goscie`
--

CREATE TABLE `goscie` (
  `id_goscia` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `wiek` int(3) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `byles` varchar(3) NOT NULL,
  `newsletter` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goscie`
--

INSERT INTO `goscie` (`id_goscia`, `imie`, `nazwisko`, `wiek`, `mail`, `byles`, `newsletter`) VALUES
(1, 'Sebastian', 'Kowalski', 33, 'seba@gmail.com', 'Tak', 'Tak'),
(7, 'wikr', 'Wrzecion', 19, 'krzy_oplimo@gmail.com', 'Tak', 'Nie'),
(10, 'Krzysztof', 'Kowalski', 26, 'krzy_oplimo@gmail.com', 'Tak', 'Nie'),
(11, 'Krzysztof', 'Kowalski', 26, 'krzy_oplimo@gmail.com', 'Tak', 'Nie'),
(12, 'Krzysztof', 'Kowalski', 26, 'krzy_oplimo@gmail.com', 'Tak', 'Nie'),
(13, 'Krzysztof', 'Kowalski', 26, 'krzy_oplimo@gmail.com', 'Tak', 'Nie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opisy`
--

CREATE TABLE `opisy` (
  `id_zdjecia` int(11) NOT NULL,
  `opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opisy`
--

INSERT INTO `opisy` (`id_zdjecia`, `opis`) VALUES
(1, 'Jest to lekka, wszechstronna broń strzelecka, zaprojektowana do użytku przez piechotę. Charakteryzuje się możliwością strzelania ogniem pojedynczym lub seriami, zazwyczaj z magazynkiem o dużej pojemności. Przykłady to AK-47 (Kalasznikow).'),
(2, 'To rodzaj broni krótkiej, który może strzelać seriami bez konieczności przeładowywania po każdym strzale. Jest popularny wśród sił policyjnych i wojska. Przykłady to Glock 17.'),
(3, 'Strzelba to broń palna, która wystrzeliwuje wiele pocisków jednocześnie z lufy, zazwyczaj w kształcie cylindra. Jest popularna w polowaniach oraz w zastosowaniach wojskowych i policyjnych. Przykłady to Mossberg 500.'),
(4, 'Jest to długa, celna broń strzelecka, zaprojektowana do precyzyjnego rażenia celów na duże odległości. Jest wykorzystywany przez snajperów wojskowych i policyjnych. Przykłady to M24.'),
(5, 'To kompaktowa broń krótka, zdolna do szybkiego strzelania seriami. Jest często używany przez jednostki specjalne i siły policyjne, Przykłady to MP5.'),
(6, 'Jest to rodzaj broni krótkiej, w którym komora na amunicję obraca się wokół osi lufy. Rewolwery są znane ze swojej niezawodności i prostoty obsługi. Przykłady to Colt Python i Smith.'),
(7, 'To długi, celny karabin zaprojektowany do oddawania pojedynczych celnych strzałów na duże odległości. Jest wykorzystywany przez snajperów w celach taktycznych i precyzyjnego strzelania. Przykłady to M14 EBR.'),
(8, 'Jest to broń krótka, która zwykle trzyma się w ręce jedną ręką i jest przeznaczona do strzelania z bliskich odległości. Pistolety są szeroko stosowane przez wojsko, policję i cywilów. Przykłady to Glock 19.'),
(9, 'Jest to długa broń palna zdolna do strzelania ogniem pojedynczym lub seriami. Jest popularny wśród wojskowych i paramilitarnych jednostek bojowych. Przykłady to M249 SAW.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE `zdjecia` (
  `id_zdjecia` int(11) NOT NULL,
  `NazwaPliku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zdjecia`
--

INSERT INTO `zdjecia` (`id_zdjecia`, `NazwaPliku`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg'),
(9, '9.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `goscie`
--
ALTER TABLE `goscie`
  ADD PRIMARY KEY (`id_goscia`);

--
-- Indeksy dla tabeli `opisy`
--
ALTER TABLE `opisy`
  ADD KEY `fk_id_zdjecia` (`id_zdjecia`);

--
-- Indeksy dla tabeli `zdjecia`
--
ALTER TABLE `zdjecia`
  ADD PRIMARY KEY (`id_zdjecia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goscie`
--
ALTER TABLE `goscie`
  MODIFY `id_goscia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `zdjecia`
--
ALTER TABLE `zdjecia`
  MODIFY `id_zdjecia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `opisy`
--
ALTER TABLE `opisy`
  ADD CONSTRAINT `fk_id_zdjecia` FOREIGN KEY (`id_zdjecia`) REFERENCES `zdjecia` (`id_zdjecia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
