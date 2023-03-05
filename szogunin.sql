-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 18 Gru 2017, 20:39
-- Wersja serwera: 10.1.24-MariaDB-cll-lve
-- Wersja PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `szogunin_updkkz`
--
CREATE DATABASE IF NOT EXISTS `szogunin_updkkz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `szogunin_updkkz`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kata`
--

CREATE TABLE `kata` (
  `id` int(11) NOT NULL,
  `gpz` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `plik` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kata`
--

INSERT INTO `kata` (`id`, `gpz`, `miasto`, `plik`, `data`) VALUES
(1, '44', '444', '/updkkz/pliki/', '2016-06-03 13:10:11'),
(2, 'ss', 'sss', '/updkkz/pliki/', '2016-06-03 13:11:03');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `katalog` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `tlumaczenie` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `plik` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `katalog`
--

INSERT INTO `katalog` (`id`, `katalog`, `tlumaczenie`, `plik`, `data`) VALUES
(1, '123222', 'Test', '/intranet/katalogi/Test/123222/20160604_163240/7587604500_1391893848.jpg', '2016-06-04 16:32:40'),
(2, 'katalog przekładniki', 'PL', '/intranet/katalogi/PL/katalog przekladniki/20160604_163412/20151116_110912.jpg', '2016-06-04 16:34:12'),
(3, '1', '1', '/intranet/katalogi/1/1/20160604_163526/like.png', '2016-06-04 16:35:26'),
(4, '1', '1', '/intranet/katalogi/1/1/20160604_163607/like.png', '2016-06-04 16:36:07'),
(5, '2', '2', '/intranet/katalogi/2/2/20160604_163622/asp.net.txt', '2016-06-04 16:36:22'),
(6, '2', '2', '/intranet/katalogi/2/2/20160604_164528/asp.net.txt', '2016-06-04 16:45:28'),
(7, '2', '2', '/intranet/katalogi/2/2/20160604_164805/asp.net.txt', '2016-06-04 16:48:05'),
(8, 'rt', 'rt', '/intranet/katalogi/rt/rt/20160604_164815/asp.net.txt', '2016-06-04 16:48:15'),
(9, 'ere', 'ere', '/intranet/katalogi/ere/ere/20160604_194151/asp.net.txt', '2016-06-04 19:41:51'),
(10, 'ere', 'ere', '/intranet/katalogi/ere/ere/20160604_194332/asp.net.txt', '2016-06-04 19:43:32'),
(11, 'retr', 'retr', '/intranet/katalogi/retr/retr/20160604_194400/asp.net.txt', '2016-06-04 19:44:00'),
(12, '1', '1', '/intranet/katalogi/1/1/20161203_101500/test.pdf', '2016-12-03 10:15:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kkz`
--

CREATE TABLE `kkz` (
  `ID` int(11) NOT NULL,
  `gpz` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `miasto` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `plik` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kkz`
--

INSERT INTO `kkz` (`ID`, `gpz`, `miasto`, `plik`, `data`) VALUES
(2, '3333', 'Zawiercie', '/updkkz/pliki/Zawiercie/3333/20160522_112207/updkkz.rar', '2016-05-22 11:22:07'),
(3, '3333', 'Zawiercie', '/updkkz/pliki/Zawiercie/3333/20160522_112404/kkz.sql', '2016-05-22 11:24:04'),
(4, 'sdf', 'Wyszków', '/updkkz/pliki/Wyszkow/sdf/20160601_191936/ZPI_Instrukcja_3.pdf', '2016-06-01 19:19:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenie`
--

CREATE TABLE `ogloszenie` (
  `id` int(11) NOT NULL,
  `temat` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `data_utw` datetime NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ogloszenie`
--

INSERT INTO `ogloszenie` (`id`, `temat`, `tresc`, `data_utw`, `autor`) VALUES
(1, 'Spotkanie w sprawie przekładników.', 'Proszę o spotkanie w sprawie przekładników.', '2016-06-01 22:46:29', 2),
(2, 'Sprzedam motorower', 'Mam do sprzedania używany motorower \"motorynka\"', '2016-06-01 23:04:38', 2),
(3, 'Następne ogłoszenie', 'Treść ogłoszenia\r\nDrugi wiersz', '2016-06-03 10:00:11', 4),
(4, 'W wielu wierszach', 'Łukasz możesz zastosować funkcje  - nl2br()\r\nżeby wiadomość wyświetlała się w wielu wierszach tak jak ktoś ją napisał.\r\nfunkcja ta zmienia znak nowej linii na znaczniki html', '2016-06-03 10:03:38', 4),
(5, 'Testing', 'Treść testing...', '2016-06-03 17:18:21', 4),
(8, 'header -> javasctipt test', 'zobaczymy', '2016-06-04 18:57:15', 5),
(10, 'Jeszcze jedna.', 'wiersz1\r\nwiersz2\r\nwiersz3 ', '2016-06-05 11:57:36', 5),
(11, 'podróż za jeden uśmiech', 'Częstochowa - Jaworzno', '2016-06-05 12:49:21', 1),
(12, 'Nowe ogłoszenie', 'TEST < TEST>>>', '2016-06-05 16:40:05', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poczta`
--

CREATE TABLE `poczta` (
  `wiadomosc` int(11) NOT NULL,
  `odbiorcy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `poczta`
--

INSERT INTO `poczta` (`wiadomosc`, `odbiorcy`) VALUES
(1, 2),
(2, 5),
(3, 0),
(4, 2),
(5, 6),
(6, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `user_email` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `user_pass` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `user_status` enum('Y','N') COLLATE utf8_polish_ci NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `dzial` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_status`, `tokenCode`, `imie`, `nazwisko`, `telefon`, `dzial`) VALUES
(1, 'tester', 'H_C_L@interia.pl', '$2y$10$An3LIHhxdP2WgPRSUwPpD.ny6tS0kFubr6tf/CUY3K8BZRkGJnAsG', 'N', '', 'tester', 'tester', 'tester', 'tester'),
(2, 'lukasz', 'lukasz.hacas@bezpol.pl', '$2y$10$dDR2p0v4.Akqdk4/N0uO4emCvuX4H2lzqombXeFBNkEeTzUc1ysfO', 'N', '468d439ff62912d87098708c05d6b3b8', 'Łukasz', 'Hacaś', '506', 'ititit'),
(3, 'adminek', 'lukaszhacas@gmail.com', '$2y$10$n.rPMSS5D1SQ2EuMBN8j9ugkb.ISCWeAfyHyh6V9EwSWI.ll6jlxK', 'N', '123c66a7eac69722296c535255b30083', 'lukas_test', 'hacas', '5675678888', 'ha'),
(5, 'gregor', 'grzegorz.motloch@gmail.com', '$2y$10$VvY8gtd95uMH89GAU4B67OF79pFfxSH4o6EGUBmsxcWB05H/XtDGm', 'N', 'e6f0666de85af9c81e1fbdb9ec77359b', 'Grzegorz', 'Motłoch', '570637333', 'IT'),
(6, 'Dawid', 'dawidkmiec91@gmail.com', '$2y$10$u9xwokDt.gDV92CV.meZ/OhLqrqynHNCgStuWMueh/WuHv85OCpG.', 'N', '', 'Dawid', 'Kmieć', '558464889', 'it'),
(7, 'grzegorz', 'gregor@gmail.com', '$2y$10$MUPkO/cEolWBysyTAoTA/eJ5.qlDRCWAFEIrvUawle5vPjUu5gSoC', 'N', '', '', '', '', ''),
(8, 'kotowice', 'sylwiahacas@gmail.com', '$2y$10$041rUb5AFIrcpd87D0C78eGrmhzFhXBMI.1KqpCrx.RyWmG3eldA6', 'N', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosc`
--

CREATE TABLE `wiadomosc` (
  `id` int(11) NOT NULL,
  `temat` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `tresc` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `data_utw` datetime NOT NULL,
  `autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wiadomosc`
--

INSERT INTO `wiadomosc` (`id`, `temat`, `tresc`, `data_utw`, `autor`) VALUES
(1, 'Wiadomość testowa.', 'wiersz1\r\nwiersz2\r\nwiersz3', '2016-06-05 11:36:55', 5),
(2, 'Wszystkiego najlepszego', 'Wszystkiego najlepsze z okazji urodzin', '2016-06-05 11:37:25', 2),
(3, 'Oferta', 'Mam do sprzedania...', '2016-06-05 11:37:47', 2),
(4, 'Zbiórka o 14:00', 'Pozdrawiam', '2016-06-05 11:38:23', 5),
(5, 'Test 123', 'testing w toku...', '2016-06-05 11:45:17', 5),
(6, 'abc', 'abc', '2016-06-05 12:50:32', 5);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkz`
--
ALTER TABLE `kkz`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ogloszenie`
--
ALTER TABLE `ogloszenie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `kkz`
--
ALTER TABLE `kkz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ogloszenie`
--
ALTER TABLE `ogloszenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `wiadomosc`
--
ALTER TABLE `wiadomosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
