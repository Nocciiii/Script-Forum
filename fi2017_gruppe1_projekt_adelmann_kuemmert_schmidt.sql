-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mai 2019 um 10:48
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fi2017_gruppe1_projekt_adelmann_kuemmert_schmidt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild`
--

CREATE TABLE `bild` (
  `ID` int(5) NOT NULL,
  `Bild` varchar(50) COLLATE latin1_german1_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild_kommentar`
--

CREATE TABLE `bild_kommentar` (
  `BildID` int(5) DEFAULT NULL,
  `KommentarID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bild_post`
--

CREATE TABLE `bild_post` (
  `BildID` int(5) DEFAULT NULL,
  `PostID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kommentar`
--

CREATE TABLE `kommentar` (
  `ID` int(11) NOT NULL,
  `Text` varchar(2000) COLLATE latin1_german1_ci NOT NULL,
  `Veroeffentlichung` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `ID` int(5) NOT NULL,
  `Nutzername` varchar(25) COLLATE latin1_german1_ci DEFAULT NULL,
  `Passwort` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE latin1_german1_ci DEFAULT NULL,
  `Admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`ID`, `Nutzername`, `Passwort`, `Email`, `Admin`) VALUES
(1, 'Padoru', '$2y$10$IFk0eA4Ax3iYJRRpDrMmK.I/T.dbe49Ki6o0h3ior/9J/NZH0PDlq', 'Umu@Nero.com', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer_kommentar`
--

CREATE TABLE `nutzer_kommentar` (
  `NutzerID` int(5) DEFAULT NULL,
  `KommentarID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer_post`
--

CREATE TABLE `nutzer_post` (
  `NutzerID` int(5) DEFAULT NULL,
  `PostID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Ueberschrift` varchar(150) COLLATE latin1_german1_ci DEFAULT NULL,
  `Inhalt` varchar(2000) COLLATE latin1_german1_ci DEFAULT NULL,
  `Veroeffentlichung` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_kommentar`
--

CREATE TABLE `post_kommentar` (
  `PostID` int(5) DEFAULT NULL,
  `KommentarID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bild`
--
ALTER TABLE `bild`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nutzername` (`Nutzername`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bild`
--
ALTER TABLE `bild`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kommentar`
--
ALTER TABLE `kommentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
