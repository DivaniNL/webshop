-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 09 mrt 2020 om 07:54
-- Serverversie: 5.7.26
-- PHP-versie: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(3, '$ingevuldem@em', '$ingevuldun', '$ingevuldpw'),
(4, 'test@test', 'hoi', 'testhoiwessel'),
(5, '', 'martijnkunstman', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `active`) VALUES
(1, 'tafellamp', 'Tafellampen zijn binnenlampen voor op tafel.', 1),
(2, 'buitenlamp', 'Buitenlampen zijn lampen voor buiten.', 1),
(3, 'designlamp', 'Designlampen zijn lampen die ieder huis uniek maken.', 1),
(4, 'bureaulamp', 'Bureaulampen zijn binnenlampen voor op uw bureau of nachtkastje.', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `houseNumber` int(5) NOT NULL,
  `houseNumber_addon` varchar(5) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `city` varchar(85) NOT NULL,
  `phone` int(25) NOT NULL,
  `e-mailadres` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `newsletter_subscription` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`id`, `gender`, `firstName`, `middleName`, `lastName`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `phone`, `e-mailadres`, `password`, `newsletter_subscription`) VALUES
(1, 'F', 'Annerieke', '', 'Beldman', 'Deken Boexstraat', 193, '', '5531 EZ', 'Bladel', 678535460, 'AnneriekeBeldman@dayrep.com', 'poh7Uwuu1G', 1),
(2, 'M', 'Gerardus', 'van der', 'Brug', 'Peschweg', 20, '', '5864 CZ', 'Meerlo', 675167633, 'gerardusvanderbrug@jourrapide.com ', 'oChohwo1Ueb', 0),
(3, 'M', 'Raoel', '', 'Beldman', 'Tweede Lindendwarsstraat', 6, '', '1015 MT', 'Amsterdam', 669108577, 'raoelbeldman@dayrep.com', 'phioNg7t', 0),
(4, 'F', 'Isa', '', 'Ringelberg', 'Hunze', 167, '', '2911 EG', 'Nieuwerkerk aan den IJssel', 676649965, 'isaringelberg@rhyta.com', 'eeGie2EeY', 1),
(5, 'M', 'Jan', 'van', 'Os', 'Kerkweg', 110, '', '3011 AD', 'Den Bosch', 612345678, 'info@janvanos.nl', '12345', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` double NOT NULL,
  `color` varchar(100) NOT NULL,
  `weight` int(10) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES
(1, 'Arstid', 'De lampenkap van textiel geeft een zacht en decoratief licht.\r\n<br><br>\r\nLichtbron wordt apart verkocht. IKEA adviseert de led-lamp E27 globevorm opaalwit.\r\n<br><b>\r\nGebruik een opalen lichtbron als je een gewone lampenkap of lamp hebt en je een gelijkmatig, gespreid licht wilt.\r\n<br><br>\r\nVoorzien van trekschakelaar.\r\n<br><br>\r\nDit product is CE-gecertificeerd.\r\n\r\nGoed te completeren met andere lampen uit dezelfde serie.', 1, 39.95, 'wit', 300, 1),
(2, 'buitenlamp', 'Dit is een buitenlamp die explodeert zodra hij binnen geplaatst wordt. Let goed op waar u dit item plaatst.', 2, 34.99, 'grijs', 500, 1),
(3, 'gans-lamp', 'Dit is een lamp in de vorm van een ganzenhoofd. Dit item geeft een fijne sfeer.', 3, 105.45, 'wit', 2500, 1),
(4, 'giraf-lamp', 'Deze lamp heeft vlekken en een hele lange nek.', 3, 99.99, 'multi-color', 3000, 1),
(5, 'hectar', 'Dit is een bureaulamp die lange avonden achter je bureau mogelijk maakt.', 4, 14.99, 'zilver', 300, 1),
(6, 'jesse', 'Dit is een tafellamp die jesse heet. Jesse wordt graag met Jesse aangesproken.', 2, 54.5, 'goud', 500, 1),
(7, 'lampje', 'Het enige echte Lampje van Donald Duck. Leuk voor de kleintjes, maar ook voor de echte verzamelaars.', 4, 21.99, 'grijs', 300, 1),
(8, 'llahra', 'Dit is een tafellamp die past in ieder interieur.', 1, 29.99, 'zwart', 750, 1),
(9, 'struisvogel-lamp', 'Deze designlamp ziet eruit als een  struisvogel. Steek je kop in het zand voor deze lamp.', 3, 69.95, 'multi-color', 1550, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(50) NOT NULL,
  `image` varchar(300) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `active`) VALUES
(1, 1, 'arstid.jpg', 1),
(2, 2, 'buitenlamp.jpg', 1),
(3, 2, 'buitenlamp2.jpg', 1),
(4, 3, 'gans.jpg', 1),
(5, 4, 'giraf.jpg', 1),
(6, 4, 'giraf2.jpg', 1),
(7, 5, 'hektar.jpg', 1),
(8, 6, 'jesse.png', 1),
(9, 7, 'lampje.jpg', 1),
(10, 8, 'llahra.png', 1),
(11, 9, 'struisvogel.jpg', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `birthDate` date NOT NULL,
  `e-mailadress` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstName`, `middleName`, `lastName`, `birthDate`, `e-mailadress`, `password`) VALUES
(1, 'Dylan', 'van', 'Nierop', '2000-10-17', 'dylanvannierop@gmail.com', 'Dylanglu2000'),
(2, 'Jan', 'van', 'Os', '1982-04-17', 'jos@glu.com', '12345');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e-mailadress` (`e-mailadress`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
