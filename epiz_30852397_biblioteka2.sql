-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql207.epizy.com
-- Czas generowania: 26 Sty 2022, 06:36
-- Wersja serwera: 10.3.27-MariaDB
-- Wersja PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `epiz_30852397_biblioteka2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `autor_id` int(11) NOT NULL,
  `autor` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`autor_id`, `autor`) VALUES
(2, 'Adam Freeman'),
(3, 'Alfred Szklarski'),
(4, 'Maciej Dudziak'),
(5, 'Michael Bond'),
(6, 'Lisa Bjarbo'),
(7, 'Emma Gothner'),
(8, 'Andy Anderson'),
(9, 'Terry Denton'),
(10, 'Nicolas Digard'),
(11, 'Emily Hawkins'),
(12, 'Lier Horst Jorn'),
(13, 'Rene Goscinny'),
(14, 'Jean-Jacques Sempe'),
(15, 'Maria Hesse'),
(16, 'Rick Riordan'),
(17, 'Lena Kiefer'),
(18, 'Kristin Cast'),
(19, 'P.C Cast'),
(20, 'Tamora Pierce'),
(21, 'Nina Brochmann'),
(22, 'Anniina Mikama'),
(23, 'David Cicurel'),
(24, 'Henryk Tyszka'),
(25, 'Koan Lambert'),
(27, 'Andreas Muller'),
(28, 'Łukasz Sosna'),
(29, 'Susan Weinschenk'),
(30, 'Mark Michaelis'),
(31, 'Ronnie Mitra'),
(32, 'Irakli Nadareishvili'),
(33, 'Roman Kochnowski'),
(34, 'Maria Szustakowska-Chojnacka'),
(35, 'Ewa Mirkowska'),
(36, 'Elżbieta Mańczak-Wohlfeld'),
(37, 'Anna Niżegorodcew'),
(38, 'Roma Rokicka-Milewska'),
(39, 'Aleksandra Tomkiewicz-Bętkowska'),
(40, 'Alicja Krztoń'),
(41, 'Michael Snaith'),
(42, 'Wojciech Drobny'),
(43, 'Marcin Mazuryk'),
(44, 'Piotr Zuzankiewicz'),
(45, 'Katarzyna Mazur-Kulesza'),
(46, 'Dorota Wierzbicka-Próchniak'),
(47, 'Anita Całek'),
(48, 'Andrzej Misiuk'),
(49, 'Jacek Pyżalski'),
(50, 'Agnieszka Żywanowska'),
(51, 'Jolanta Maria Wolińska'),
(52, 'Marek Pieniążek'),
(53, 'Praca zbiorowa'),
(54, 'Anna Brzezińska'),
(55, 'Konrad Piotrowski'),
(56, 'Anna Brzezińska'),
(57, 'Konrad Piotrowski'),
(58, 'Julian Klukowski'),
(59, 'Ireneusz Nabiałek'),
(60, 'Przemysław Kajetanowicz'),
(61, 'Jędrzej Wierzejewski'),
(62, 'Piotr Stańczyk'),
(63, 'Tomasz Dominik Gwiazda'),
(64, 'Yazawa Nao'),
(65, 'Lais Erica'),
(66, 'Child Lee');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupa`
--

CREATE TABLE `grupa` (
  `grupa_id` int(11) NOT NULL,
  `grupa` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `grupa`
--

INSERT INTO `grupa` (`grupa_id`, `grupa`) VALUES
(1, 'dzieci'),
(2, 'dorosli'),
(3, 'mlodziez');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `kategoria_id` int(11) NOT NULL,
  `kategoria` varchar(35) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`kategoria_id`, `kategoria`) VALUES
(1, 'Informatyka'),
(2, 'Nauki humanistyczne'),
(3, 'Medycyna'),
(4, 'Prawo'),
(5, 'Nauki społeczne'),
(6, 'Nauki matematyczno-przyrodnicze'),
(7, 'Biograficzne'),
(8, 'Inne'),
(9, 'Nauki ekonomiczne'),
(10, 'Przygodowe'),
(11, 'Obyczajowe'),
(12, 'Kryminalne'),
(13, 'Poradniki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `klient_id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`klient_id`, `email`, `imie`, `nazwisko`, `login`, `pass`) VALUES
(1, 'jkowalski@poczta.onet.pl', 'Jan', 'Kowalski', 'jkowalski', '$2y$10$a3Es4NJ2kQVyX3VX2imO5.M9wRHWXo4rzHrxWBDqtlttX7cTPSQzK'),
(2, 'anowak99@gmail.com', 'Anna', 'Nowak', 'anowak', '$2y$10$7Bsqx2zrLwItZf5mXTDbsuXCtFMeM3YWhP/MqyC.nHMWuU6rN.c5i'),
(3, 'azielinski00i@poczta.onet.pl', 'Arnold', 'Zielinski', 'azielinski', '$2y$10$UV0ShS2mV09p6KtSbK8Ghe./NolVIh1iXCX2oqICsw4UcJqWKHsxa'),
(4, 'olgamoc00@gmail.com', 'Olga', 'Mocna', 'omocna', '$2y$10$Wm2eY7LEb.bigUqcEAknOuonPngMwBY5c.TYwWsUdPX0lK8Od9CRm'),
(5, 'aklepsik@gmail.com', 'Alicja', 'Kleps', 'AlicjaK', '$2y$10$g4jYNwXPxKV4GmPLw/Q/GeVJwq/DIAgpKHlhjP7Ri14GwkMaApUyi'),
(6, 'izunia36@gmail.com', 'Iza', 'Pawlacz', 'Izunia36', '$2y$10$8wD.Cw9SLQb1OHy7CVfklev2.taS2rGulgirhIMmkIqPadh96Lteq');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kopie`
--

CREATE TABLE `kopie` (
  `kopia_id` int(11) NOT NULL,
  `ksiazka_id` int(11) NOT NULL,
  `czy_dostepna` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kopie`
--

INSERT INTO `kopie` (`kopia_id`, `ksiazka_id`, `czy_dostepna`, `ilosc`) VALUES
(1, 1, 'T', 23),
(2, 31, 'N', 0),
(7, 27, 'N', 0),
(9, 7, 'T', 11),
(10, 8, 'T', 37),
(11, 36, 'T', 0),
(15, 39, 'T', 27),
(16, 40, 'T', 38),
(17, 41, 'T', 91),
(23, 47, 'T', 26),
(24, 48, 'T', 74),
(27, 50, 'T', 51),
(29, 53, 'N', 0),
(30, 49, 'T', 33),
(31, 19, 'T', 48),
(35, 57, 'T', 19),
(36, 43, 'T', 12),
(37, 44, 'N', 0),
(38, 45, 'N', 0),
(39, 58, 'T', 21),
(40, 59, 'T', 30),
(41, 60, 'T', 29),
(42, 61, 'T', 31),
(43, 62, 'T', 41),
(45, 34, 'T', 22),
(46, 35, 'T', 34),
(47, 22, 'N', 0),
(48, 10, 'N', 0),
(49, 28, 'T', 26),
(51, 26, 'N', 0),
(53, 20, 'N', 0),
(55, 23, 'N', 0),
(61, 12, 'T', 23),
(62, 30, 'T', 21),
(70, 2, 'T', 56),
(73, 4, 'T', 100),
(74, 5, 'T', 33),
(75, 6, 'T', 234),
(78, 9, 'T', 45),
(80, 11, 'N', 0),
(82, 13, 'T', 41),
(83, 14, 'T', 67),
(84, 15, 'T', 56),
(85, 16, 'T', 33),
(86, 17, 'T', 89),
(87, 18, 'T', 9),
(88, 32, 'T', 28),
(89, 33, 'N', 0),
(90, 21, 'N', 0),
(91, 24, 'N', 0),
(92, 25, 'T', 42),
(93, 29, 'T', 18),
(94, 37, 'N', 0),
(95, 38, 'T', 23),
(96, 42, 'T', 22),
(97, 46, 'T', 33),
(98, 51, 'N', 0),
(99, 52, 'T', 25),
(100, 54, 'T', 18),
(101, 55, 'T', 30),
(102, 56, 'T', 21),
(103, 63, 'T', 12),
(104, 64, 'T', 5),
(105, 65, 'T', 32),
(106, 66, 'T', 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `ksiazka_id` int(11) NOT NULL,
  `tytul` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `autor_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `grupa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`ksiazka_id`, `tytul`, `autor_id`, `kategoria_id`, `grupa_id`) VALUES
(1, 'Angular. Profesjonalne techniki programowania.', 2, 1, 2),
(2, 'Tomek na Alasce', 3, 10, 1),
(4, 'Miś zwany Paddington', 5, 10, 1),
(5, 'Ivar buduje dom dla pteranodona', 6, 10, 1),
(7, '130 piętrowy domek na drzewie', 8, 10, 1),
(9, 'Frigiel i Fluffy. Bitwa na Równinach Meraim', 10, 8, 1),
(10, 'Atlas oceanicznych przygód ', 11, 8, 1),
(11, 'Operacja. Księga Czarodzieja', 12, 8, 1),
(12, 'Mikołajek. Żeśmy się ubawili', 13, 8, 1),
(14, 'Marilyn, Biografia', 15, 7, 3),
(15, 'Pakiet: Apollo i boskie próby', 16, 8, 3),
(16, 'Don\'t Love Me', 17, 11, 3),
(17, 'Wiedźmi czar', 18, 8, 3),
(19, 'Alanna. Pierwsza przygoda', 20, 10, 3),
(20, 'Dziewczyńskie sprawy', 21, 8, 3),
(21, 'Magik i złodziejka. Tom 1', 22, 10, 3),
(22, 'Arsene Lupin rzuca wyzwanie', 23, 8, 3),
(23, 'Excel Solver w praktyce', 24, 1, 2),
(24, 'Microsoft Word 2019', 25, 1, 2),
(25, 'Machine learning. Phyton i data science', 27, 1, 2),
(26, 'CodeIgniter 4. Zaawansowane tworzenie stron www ', 28, 1, 2),
(27, '100 rzeczy, które każdy projektant powinien znać', 29, 8, 2),
(28, 'C# 8.0. Kompletny przewodnik', 30, 1, 2),
(30, 'Mikrousługi. Budowa i działanie', 32, 8, 2),
(31, '\"Przy Tobie, Najjaśniejszy Panie, stoimy\'', 33, 8, 2),
(32, '100 roślin w Twojej kuchni', 34, 8, 2),
(33, '59 bajek o zwierzętach', 35, 10, 1),
(34, 'A Practical Grammar of English', 36, 2, 2),
(36, 'ABC chorób wieku dziecięcego', 38, 3, 2),
(37, 'ABC pedagoga specjalnego. Poradnik dla nauczyciela', 39, 5, 2),
(39, 'ABC reumatologii', 41, 5, 2),
(40, 'ABC służby cywilnej', 42, 4, 2),
(43, 'ABC tworzenia przypisów i bibliografii załączników', 45, 8, 2),
(45, 'Adam Mickiewicz - Juliusz Słowacki Psychobiografia', 47, 2, 2),
(46, 'Administracja porządku, bezpieczeństwa publicznego', 48, 4, 2),
(47, 'Agresja elektroniczna i cyberbullying', 49, 5, 2),
(48, 'Agresja u osób z lekką niepełnosprawnością ', 50, 5, 2),
(49, 'Agresywność młodzieży. Problem indywidulany', 51, 5, 2),
(50, 'Akt twórczy jako mimesis. \"Dziś są moje urodziny\" ', 52, 5, 2),
(51, 'Aktualne problemy zarządzania - teoria i praktyka ', 53, 2, 2),
(52, 'Aktywność osób z ograniczeniami na rynku', 54, 5, 2),
(55, 'Aktywność zawodowa osób z ograniczeniem sprawności', 57, 5, 2),
(56, 'Algebra dla studentów', 58, 6, 2),
(58, 'Algebra z geometrią analityczną', 60, 6, 2),
(60, 'Algorytmika praktyczna', 62, 1, 2),
(61, 'Algorytmy genetyczne. Kompendium, t. 1', 63, 1, 2),
(62, 'Algorytmy genetyczne. Kompendium, t. 2', 63, 1, 2),
(63, 'MANGA. Kurs rysunku Delux', 64, 13, 3),
(64, 'Eliksiry dla zdrowia i urody', 65, 13, 2),
(65, 'Nocna Runda', 66, 12, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `wypozyczenie_id` int(11) NOT NULL,
  `klient_id` int(11) NOT NULL,
  `kopia_id` int(11) NOT NULL,
  `datawyp` date NOT NULL,
  `datazw` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`wypozyczenie_id`, `klient_id`, `kopia_id`, `datawyp`, `datazw`) VALUES
(4, 1, 1, '2022-01-02', '2022-06-02'),
(5, 1, 9, '2022-01-16', '2022-03-04'),
(18, 4, 1, '2022-01-10', '2022-03-04'),
(23, 1, 74, '2022-01-26', '2022-02-25');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indeksy dla tabeli `grupa`
--
ALTER TABLE `grupa`
  ADD PRIMARY KEY (`grupa_id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`klient_id`);

--
-- Indeksy dla tabeli `kopie`
--
ALTER TABLE `kopie`
  ADD PRIMARY KEY (`kopia_id`),
  ADD KEY `ksiazka_id` (`ksiazka_id`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`ksiazka_id`),
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `grupa_id` (`grupa_id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`wypozyczenie_id`),
  ADD KEY `datawyp_id` (`datawyp`),
  ADD KEY `datazw_id` (`datazw`),
  ADD KEY `klient_id` (`klient_id`),
  ADD KEY `kopia_id` (`kopia_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT dla tabeli `grupa`
--
ALTER TABLE `grupa`
  MODIFY `grupa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `kategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `klient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `kopie`
--
ALTER TABLE `kopie`
  MODIFY `kopia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `ksiazka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `wypozyczenie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `ksiazki_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`kategoria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ksiazki_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `autorzy` (`autor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ksiazki_ibfk_3` FOREIGN KEY (`grupa_id`) REFERENCES `grupa` (`grupa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ksiazki_ibfk_4` FOREIGN KEY (`ksiazka_id`) REFERENCES `kopie` (`ksiazka_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_5` FOREIGN KEY (`klient_id`) REFERENCES `klienci` (`klient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wypozyczenia_ibfk_6` FOREIGN KEY (`kopia_id`) REFERENCES `kopie` (`kopia_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
