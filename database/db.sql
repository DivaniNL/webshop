-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 03 apr 2020 om 15:26
-- Serverversie: 5.7.26
-- PHP-versie: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`) VALUES
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
(1, 'racecars', 'Alle raceauto\'s op schaal! 3, 2, 1, GO!', 1),
(2, 'classic_cars', 'Voor de echte liefhebbers en verzamelaars: oude en klassieke auto\'s op schaal', 1),
(3, 'kids', 'Auto\'s voor de allerkleinsten', 1),
(4, 'politie/brandweer/ambulance', 'Hulp is onderweg!', 1),
(5, 'vrachtwagens en trucks', 'alle vrachtwagens en trucks, op schaalmodel.', 1),
(6, 'bussen, limo\'s en taxi\'s', 'van lijnbussen tot britse dubbeldekkers en van limo\'s tot yellow cabs', 1),
(7, 'army', 'alle legervoertuigen', 1),
(8, 'mini', 'alle minuscule voertuigen.', 1);

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
(2, 'M', 'Gerardus', 'van der', 'Brug', 'Peschweg', 20, '', '5864 CZ', 'Meerlo', 675167633, 'gerardusvanderbrug@jourrapide.com ', 'oChohwo1Ueb', 0),
(3, 'M', 'Raoel', '', 'Beldman', 'Tweede Lindendwarsstraat', 6, '', '1015 MT', 'Amsterdam', 669108577, 'raoelbeldman@dayrep.com', 'phioNg7t', 0),
(4, 'F', 'Isa', '', 'Ringelberg', 'Hunze', 167, '', '2911 EG', 'Nieuwerkerk aan den IJssel', 676649965, 'isaringelberg@rhyta.com', 'eeGie2EeY', 1),
(5, 'M', 'Jan', 'van', 'Os', 'Kerkweg', 110, '', '3011 AD', 'Den Bosch', 612345678, 'info@janvanos.nl', '12345', 1),
(6, 'M', 'Dylan', 'van', 'Nierop', 'Traverse', 7, 'a', '2861HC', 'Bergambacht', 653816212, 'dylan_user@kakzooi.com', 'iets', 0),
(7, 'O', 'Is', 'een', 'Testaccount', 'Traverse', 7, 'NONE', '2861HC', 'Bergambacht', 5353535, 'iets@oets.nl', 'iets', 1),
(8, 'M', 'kees', 'van', 'bacon', 'Traverse', 7, 'a', '2861HC', 'Bergambacht', 5353444, 'keesbacon@baconei.nl', 'bacon', 0),
(9, 'F', 'defe', 'few', 'few', 'few', 4, 'few', 'few', 'wef', 3432423, 'fewf@fadfw', 'fwef', 1),
(10, 'M', 'Gebruiker', 'op', 'Site', 'Gebruiker', 1, 'a', '1010AB', 'Server', 0, 'gebruiker@webshop.nl', 'gebruiker', 1),
(11, 'M', 'Gebruiker', 'op', 'Site', 'Gebruiker', 1, 'a', '1010AB', 'Server', 0, 'gebruiker@webshop.nl', 'gebruiker', 1),
(12, 'M', 'Gebruiker', 'op', 'Site', 'Gebruiker', 1, 'a', '1010AB', 'Server', 0, 'gebruiker@webshop.nl', 'gebruiker', 1),
(13, 'M', 'Robot', 'die', 'roboteert', 'r', 1, 'NONE', 'rrr11', 'robot', 0, 'robot@robot', 'robot', 1),
(14, 'M', 'Martijn', '', 'Kunstman', 'straatnaam', 1, 'a', '020code', 'plaats', 0, 'martijn@webshop.nl', 'martijn', 0),
(15, 'M', 'Test', '', 'Account', 'Teststrraat', 10, 'a', '2019 te', 'bergambacht', 77777, 'testacc@test', 'test', 0),
(16, 'M', 'Mario', 'van', 'Nierop', 'Traverse', 7, 'NONE', '2861HC', 'Bergambacht', 1234, 'mario@nierop.com', 'mario', 0);

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
(55, 'Panzer II Tank', 'Mooie tank', 7, 10.99, 'other', 400, 1),
(56, 'Barbie auto', 'De auto van barbie', 3, 4.99, 'pink', 100, 1),
(57, 'Arriva Bus', 'Bus', 6, 6.99, 'multi-color', 450, 1),
(58, 'Max Verstappen Auto', 'De aston martin van Max, op schaal nagemaakt', 1, 22.99, 'multi-color', 300, 1),
(59, 'Citroën 2CV', 'Mooie Citroën 2CV, net zoals vroeger maar dan in het klein', 2, 19.99, 'red', 500, 1),
(60, 'Politieauto VW Touran', 'Nederlandse politieauto VW Touran op een schaal van 1:57.', 4, 11.99, 'white', 250, 1),
(61, 'Vrachtwagen MAN TGX van DHL', 'DHL Vrachtwagen', 5, 9.99, 'yellow', 600, 1),
(62, 'Volkswagen Passat', 'Kleine betaalbare modelauto op een schaal van 1:87', 8, 4.99, 'blue', 450, 1);

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
(20, 54, 'busje.png', 1),
(21, 55, 'tank.jpg', 1),
(22, 56, 'barbie.jpg', 1),
(23, 57, 'busje.png', 1),
(24, 58, 'minichamps-max-verstappen-auto-rb15-118-minichamps.jpg', 1),
(25, 59, 'Citroën_2CV.jpg', 1),
(26, 60, 'politie.jpg', 1),
(27, 61, 'man_dhl.jpg', 1),
(28, 62, 'passaat.jpg', 1),
(29, 63, 'IMG_9361.HEIC', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `street` varchar(70) NOT NULL,
  `houseNumber` int(4) NOT NULL,
  `houseNumber_addon` varchar(4) NOT NULL,
  `zipCode` varchar(8) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `delivery` enum('ophalen','bezorgen_thuis','bezorgen_anders') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `date`, `street`, `houseNumber`, `houseNumber_addon`, `zipCode`, `city`, `country`, `paid`, `delivery`) VALUES
(17, 14, '2020-04-02 09:54:26', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(18, 14, '2020-04-02 14:24:53', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(19, 14, '2020-04-02 14:48:51', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(20, 14, '2020-04-02 14:51:06', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(21, 14, '2020-04-02 14:51:37', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(22, 14, '2020-04-02 15:36:03', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(23, 14, '2020-04-02 15:37:15', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(24, 14, '2020-04-02 15:38:20', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(25, 14, '2020-04-02 15:40:37', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(26, 14, '2020-04-02 16:51:43', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(27, 14, '2020-04-02 16:52:51', 'straatnaampje', 1, 's', 'sss11', 'sss', 'België', 1, 'ophalen'),
(28, 14, '2020-04-02 16:55:02', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(29, 14, '2020-04-02 16:56:21', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(30, 14, '2020-04-02 16:59:45', 'test', 1, 'a', '2800te', 'test', 'test', 1, 'bezorgen_anders'),
(31, 14, '2020-04-02 17:02:34', 'straatnaam', 1, 'a', '020code', 'plaats', 'Nederland', 1, 'bezorgen_thuis'),
(32, 15, '2020-04-02 17:04:42', 'riool', 1, '', 'eerw 2', 'riol', 'riol', 1, 'ophalen'),
(33, 16, '2020-04-02 17:21:27', 'Traverse', 7, 'NONE', '2861HC', 'Bergambacht', 'Nederland', 1, 'bezorgen_thuis'),
(34, 16, '2020-04-02 17:35:56', 'Traverse', 7, 'NONE', '2861HC', 'Bergambacht', 'Belgie', 1, 'bezorgen_thuis');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(50) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES
(14, 17, 58, 1),
(15, 17, 57, 1),
(16, 18, 56, 1),
(17, 19, 56, 1),
(18, 20, 56, 1),
(19, 21, 56, 1),
(20, 22, 58, 2),
(21, 22, 56, 1),
(22, 22, 55, 1),
(23, 23, 56, 1),
(24, 23, 61, 1),
(25, 23, 62, 2),
(26, 24, 58, 2),
(27, 24, 60, 1),
(28, 24, 55, 3),
(29, 25, 59, 2),
(30, 25, 57, 2),
(31, 25, 62, 2),
(32, 26, 59, 2),
(33, 26, 57, 2),
(34, 26, 62, 2),
(35, 27, 57, 3),
(36, 17, 57, 3),
(37, 29, 57, 3),
(38, 30, 57, 3),
(39, 31, 57, 2),
(40, 32, 57, 2),
(41, 32, 62, 2),
(42, 33, 56, 1),
(43, 33, 57, 3),
(44, 34, 56, 1),
(45, 34, 57, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `firstName`, `middleName`, `lastName`, `birthDate`, `email`, `password`) VALUES
(1, 'Dylan', 'vand', 'Nierop', '2000-10-17', 'dylanvannierop@gmail.com', 'dylan2000'),
(2, 'Jan', 'van', 'Os', '1982-04-17', 'jos@glu.com', '12345'),
(3, 'wdqe', 'edfsd', 'dsa', NULL, '$ingevuldem@em', '$ingevuldpw'),
(4, 'Dylan', 'van', 'Nierop', '2000-10-17', 'dylanvannierop@iets.com', 'ietsietsiets'),
(6, 'it', 'it', 'it', NULL, 'it@it', 'itit'),
(7, 'tets', 'tet', 'tete', '2010-10-14', 'refe@fwefw', 'ewfewf'),
(8, 'Gebruiker', 'op', 'Site', '1010-10-10', 'gebruiker@webshop.nl', 'gebruiker');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
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
-- Indexen voor tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `e-mailadress` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT voor een tabel `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
