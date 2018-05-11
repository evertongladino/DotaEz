-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2016 at 09:13 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dotaez`
--

-- --------------------------------------------------------

--
-- Table structure for table `build`
--

CREATE TABLE `build` (
  `idt_build` int(11) NOT NULL,
  `nme_build` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `build`
--

INSERT INTO `build` (`idt_build`, `nme_build`) VALUES
(1, 'Explosion Seer');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `idt_hero` int(11) NOT NULL,
  `nme_hero` varchar(45) NOT NULL,
  `type_hero` varchar(45) NOT NULL,
  `cod_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`idt_hero`, `nme_hero`, `type_hero`, `cod_status`) VALUES
(1, 'Dark Seer', 'Intellect', 1);

-- --------------------------------------------------------

--
-- Table structure for table `herobuild`
--

CREATE TABLE `herobuild` (
  `cod_hero` int(11) NOT NULL,
  `cod_build` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herobuild`
--

INSERT INTO `herobuild` (`cod_hero`, `cod_build`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `idt_item` int(11) NOT NULL,
  `nme_item` varchar(45) NOT NULL,
  `effect_item` longtext NOT NULL,
  `dano_item` int(11) DEFAULT NULL,
  `type_item` varchar(45) DEFAULT NULL,
  `tb_build_idt_build` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`idt_item`, `nme_item`, `effect_item`, `dano_item`, `type_item`, `tb_build_idt_build`) VALUES
(1, 'Black King Bar', 'Imunidade a magias', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `idt_skill` int(11) NOT NULL,
  `nme_skill` varchar(45) NOT NULL,
  `effect_skill` longtext NOT NULL,
  `dano_skill` int(11) DEFAULT NULL,
  `type_dano_skill` varchar(45) DEFAULT NULL,
  `cod_hero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`idt_skill`, `nme_skill`, `effect_skill`, `dano_skill`, `type_dano_skill`, `cod_hero`) VALUES
(1, 'Surge', 'Velocidade maxima durante alguns segundos', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idt_status` int(11) NOT NULL,
  `strenght` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `intellect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idt_status`, `strenght`, `agility`, `intellect`) VALUES
(1, 22, 12, 29);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idt_user` int(11) NOT NULL,
  `nme_user` varchar(50) NOT NULL,
  `lgn_user` varchar(45) NOT NULL,
  `psw_user` varchar(45) NOT NULL,
  `email_user` varchar(80) NOT NULL,
  `nickdota_user` varchar(50) NOT NULL,
  `status_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idt_user`, `nme_user`, `lgn_user`, `psw_user`, `email_user`, `nickdota_user`, `status_user`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'everton-cs@hotmail.com.br', 'Abraga', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `build`
--
ALTER TABLE `build`
  ADD PRIMARY KEY (`idt_build`),
  ADD UNIQUE KEY `idt_build_UNIQUE` (`idt_build`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`idt_hero`,`cod_status`),
  ADD UNIQUE KEY `idt_hero_UNIQUE` (`idt_hero`),
  ADD KEY `fk_tb_hero_tb_status1_idx` (`cod_status`);

--
-- Indexes for table `herobuild`
--
ALTER TABLE `herobuild`
  ADD PRIMARY KEY (`cod_hero`,`cod_build`),
  ADD KEY `fk_tb_hero_has_tb_build_tb_build1_idx` (`cod_build`),
  ADD KEY `fk_tb_hero_has_tb_build_tb_hero1_idx` (`cod_hero`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idt_item`,`tb_build_idt_build`),
  ADD KEY `fk_tb_item_tb_build1_idx` (`tb_build_idt_build`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`idt_skill`,`cod_hero`),
  ADD KEY `fk_tb_skill_tb_hero1_idx` (`cod_hero`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idt_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idt_user`),
  ADD UNIQUE KEY `idt_user_UNIQUE` (`idt_user`),
  ADD UNIQUE KEY `lgn_user_UNIQUE` (`lgn_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `build`
--
ALTER TABLE `build`
  MODIFY `idt_build` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `idt_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `idt_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `idt_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `idt_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idt_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hero`
--
ALTER TABLE `hero`
  ADD CONSTRAINT `fk_tb_hero_tb_status1` FOREIGN KEY (`cod_status`) REFERENCES `status` (`idt_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `herobuild`
--
ALTER TABLE `herobuild`
  ADD CONSTRAINT `fk_tb_hero_has_tb_build_tb_build1` FOREIGN KEY (`cod_build`) REFERENCES `build` (`idt_build`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_hero_has_tb_build_tb_hero1` FOREIGN KEY (`cod_hero`) REFERENCES `hero` (`idt_hero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_tb_item_tb_build1` FOREIGN KEY (`tb_build_idt_build`) REFERENCES `build` (`idt_build`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_tb_skill_tb_hero1` FOREIGN KEY (`cod_hero`) REFERENCES `hero` (`idt_hero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
