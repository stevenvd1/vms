--
-- Database: `vms`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikel`
--

CREATE TABLE `artikel` (
  `artikelnr` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locatie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inkoopprijs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minvoorraad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voorraad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bestelserie` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikel`
--

INSERT INTO `artikel` (`artikelnr`, `naam`, `specs`, `locatie`, `inkoopprijs`, `minvoorraad`, `voorraad`, `bestelserie`) VALUES
(1, 'kast', 'hout', '10.22.22', '5', '10', '10', '10'),
(2, '123', '123', '123123', '123', '123', '123', '123'),
(3, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(5, 'asdfas', 'asdfasdf', 'dfas', 'dfas', 'df', 'asdfasdfasdf', 'asdfasdf'),
(6, 'asdfassdf', 'asdfasdf', 'dfasdfasdfasdfas', 'asdfasdf', 'asdfasdfasdfasdfas', 'dfasdfasdfasdfasd', 'fasdfasdfasdfasdf'),
(7, NULL, 'asdfasdfasdf', 'dff', 'sfasdf', 'adasdf', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelopdracht`
--

CREATE TABLE `bestelopdracht` (
  `naamleverancier` int(255) NOT NULL,
  `bestelordernummer` int(255) DEFAULT NULL,
  `artikelnummer` int(255) DEFAULT NULL,
  `hoeveelheidBestelling` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestelopdracht`
--

INSERT INTO `bestelopdracht` (`naamleverancier`, `bestelordernummer`, `artikelnummer`, `hoeveelheidBestelling`) VALUES
(1, 3, 3, 3),
(2, 91027303, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `naamleverancier`
--

CREATE TABLE `naamleverancier` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `naamleverancier`
--

INSERT INTO `naamleverancier` (`id`, `naam`) VALUES
(1, 'Bosch'),
(2, 'Philips');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelnr`);

--
-- Indexen voor tabel `bestelopdracht`
--
ALTER TABLE `bestelopdracht`
  ADD PRIMARY KEY (`naamleverancier`),
  ADD KEY `naamleverancier` (`naamleverancier`,`bestelordernummer`,`artikelnummer`);

--
-- Indexen voor tabel `naamleverancier`
--
ALTER TABLE `naamleverancier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
