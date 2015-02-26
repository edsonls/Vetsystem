-- phpMyAdmin SQL Dump
-- version 4.3.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2015 às 18:55
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vetsystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 232),
(2, 1, NULL, NULL, 'Animals', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'new_animals', 5, 6),
(5, 2, NULL, NULL, 'view', 7, 8),
(6, 2, NULL, NULL, 'add', 9, 10),
(7, 2, NULL, NULL, 'edit', 11, 12),
(8, 2, NULL, NULL, 'delete', 13, 14),
(9, 1, NULL, NULL, 'Breeds', 16, 27),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'view', 19, 20),
(12, 9, NULL, NULL, 'add', 21, 22),
(13, 9, NULL, NULL, 'edit', 23, 24),
(14, 9, NULL, NULL, 'delete', 25, 26),
(15, 1, NULL, NULL, 'CashFlows', 28, 39),
(16, 15, NULL, NULL, 'index', 29, 30),
(17, 15, NULL, NULL, 'view', 31, 32),
(18, 15, NULL, NULL, 'add', 33, 34),
(19, 15, NULL, NULL, 'edit', 35, 36),
(20, 15, NULL, NULL, 'delete', 37, 38),
(21, 1, NULL, NULL, 'Clients', 40, 51),
(22, 21, NULL, NULL, 'index', 41, 42),
(23, 21, NULL, NULL, 'view', 43, 44),
(24, 21, NULL, NULL, 'add', 45, 46),
(25, 21, NULL, NULL, 'edit', 47, 48),
(26, 21, NULL, NULL, 'delete', 49, 50),
(27, 1, NULL, NULL, 'Clinics', 52, 65),
(28, 27, NULL, NULL, 'index', 53, 54),
(29, 27, NULL, NULL, 'quant_clinics', 55, 56),
(30, 27, NULL, NULL, 'view', 57, 58),
(31, 27, NULL, NULL, 'add', 59, 60),
(32, 27, NULL, NULL, 'edit', 61, 62),
(33, 27, NULL, NULL, 'delete', 63, 64),
(34, 1, NULL, NULL, 'Examinations', 66, 77),
(35, 34, NULL, NULL, 'index', 67, 68),
(36, 34, NULL, NULL, 'view', 69, 70),
(37, 34, NULL, NULL, 'add', 71, 72),
(38, 34, NULL, NULL, 'edit', 73, 74),
(39, 34, NULL, NULL, 'delete', 75, 76),
(40, 1, NULL, NULL, 'ExaminationsOrders', 78, 89),
(41, 40, NULL, NULL, 'index', 79, 80),
(42, 40, NULL, NULL, 'view', 81, 82),
(43, 40, NULL, NULL, 'add', 83, 84),
(44, 40, NULL, NULL, 'edit', 85, 86),
(45, 40, NULL, NULL, 'delete', 87, 88),
(46, 1, NULL, NULL, 'Expenses', 90, 101),
(47, 46, NULL, NULL, 'index', 91, 92),
(48, 46, NULL, NULL, 'view', 93, 94),
(49, 46, NULL, NULL, 'add', 95, 96),
(50, 46, NULL, NULL, 'edit', 97, 98),
(51, 46, NULL, NULL, 'delete', 99, 100),
(52, 1, NULL, NULL, 'Groups', 102, 113),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'view', 105, 106),
(55, 52, NULL, NULL, 'add', 107, 108),
(56, 52, NULL, NULL, 'edit', 109, 110),
(57, 52, NULL, NULL, 'delete', 111, 112),
(58, 1, NULL, NULL, 'Orders', 114, 131),
(59, 58, NULL, NULL, 'index', 115, 116),
(60, 58, NULL, NULL, 'ajax_animal', 117, 118),
(61, 58, NULL, NULL, 'recibo', 119, 120),
(62, 58, NULL, NULL, 'quant_exames_analise', 121, 122),
(63, 58, NULL, NULL, 'view', 123, 124),
(64, 58, NULL, NULL, 'add', 125, 126),
(65, 58, NULL, NULL, 'edit', 127, 128),
(66, 58, NULL, NULL, 'delete', 129, 130),
(67, 1, NULL, NULL, 'Pages', 132, 135),
(68, 67, NULL, NULL, 'display', 133, 134),
(69, 1, NULL, NULL, 'PaymentMethods', 136, 147),
(70, 69, NULL, NULL, 'index', 137, 138),
(71, 69, NULL, NULL, 'view', 139, 140),
(72, 69, NULL, NULL, 'add', 141, 142),
(73, 69, NULL, NULL, 'edit', 143, 144),
(74, 69, NULL, NULL, 'delete', 145, 146),
(75, 1, NULL, NULL, 'Species', 148, 159),
(76, 75, NULL, NULL, 'index', 149, 150),
(77, 75, NULL, NULL, 'view', 151, 152),
(78, 75, NULL, NULL, 'add', 153, 154),
(79, 75, NULL, NULL, 'edit', 155, 156),
(80, 75, NULL, NULL, 'delete', 157, 158),
(81, 1, NULL, NULL, 'Users', 160, 173),
(82, 81, NULL, NULL, 'index', 161, 162),
(83, 81, NULL, NULL, 'view', 163, 164),
(84, 81, NULL, NULL, 'add', 165, 166),
(85, 81, NULL, NULL, 'edit', 167, 168),
(86, 81, NULL, NULL, 'delete', 169, 170),
(87, 81, NULL, NULL, 'logout', 171, 172),
(88, 1, NULL, NULL, 'Veterinarians', 174, 187),
(89, 88, NULL, NULL, 'index', 175, 176),
(90, 88, NULL, NULL, 'quant_veterinarians', 177, 178),
(91, 88, NULL, NULL, 'view', 179, 180),
(92, 88, NULL, NULL, 'add', 181, 182),
(93, 88, NULL, NULL, 'edit', 183, 184),
(94, 88, NULL, NULL, 'delete', 185, 186),
(95, 1, NULL, NULL, 'Admin', 188, 231),
(96, 95, NULL, NULL, 'Dashboard', 189, 192),
(97, 96, NULL, NULL, 'admin_index', 190, 191),
(98, 95, NULL, NULL, 'Groups', 193, 204),
(99, 98, NULL, NULL, 'index', 194, 195),
(100, 98, NULL, NULL, 'view', 196, 197),
(101, 98, NULL, NULL, 'add', 198, 199),
(102, 98, NULL, NULL, 'edit', 200, 201),
(103, 98, NULL, NULL, 'delete', 202, 203),
(104, 95, NULL, NULL, 'Languages', 205, 208),
(105, 104, NULL, NULL, 'admin_set', 206, 207),
(106, 95, NULL, NULL, 'Permissions', 209, 216),
(107, 106, NULL, NULL, 'admin_index', 210, 211),
(108, 106, NULL, NULL, 'admin_change', 212, 213),
(109, 106, NULL, NULL, 'admin_sync', 214, 215),
(110, 95, NULL, NULL, 'Users', 217, 230),
(111, 110, NULL, NULL, 'index', 218, 219),
(112, 110, NULL, NULL, 'view', 220, 221),
(113, 110, NULL, NULL, 'add', 222, 223),
(114, 110, NULL, NULL, 'edit', 224, 225),
(115, 110, NULL, NULL, 'delete', 226, 227),
(116, 110, NULL, NULL, 'logout', 228, 229);

-- --------------------------------------------------------

--
-- Estrutura da tabela `animals`
--

CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `client_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `sex` char(1) NOT NULL DEFAULT 'M',
  `age` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `breeds`
--

CREATE TABLE IF NOT EXISTS `breeds` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `breeds`
--

INSERT INTO `breeds` (`id`, `created`, `modified`, `removed`, `active`, `name`, `description`) VALUES
(1, '2015-01-31 15:06:00', '2015-02-02 13:44:22', 'N', 'S', 'Pinthcer', 'Muito Ativo\r\n'),
(2, '2015-02-13 01:49:56', '2015-02-13 01:49:56', 'N', 'S', 'Labrador', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cash_flows`
--

CREATE TABLE IF NOT EXISTS `cash_flows` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `order_id` int(11) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(100) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinics`
--

CREATE TABLE IF NOT EXISTS `clinics` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'S',
  `removed` char(1) NOT NULL DEFAULT 'N',
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `neighborhood` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `examinations`
--

CREATE TABLE IF NOT EXISTS `examinations` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(100) NOT NULL,
  `value` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `examinations_orders`
--

CREATE TABLE IF NOT EXISTS `examinations_orders` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) DEFAULT 'N',
  `active` char(1) DEFAULT 'S',
  `examination_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) DEFAULT 'S' COMMENT 'S ativo e N inativo',
  `type` char(1) NOT NULL COMMENT 'F para fixas e V para variaves',
  `status` char(1) DEFAULT 'P' COMMENT 'P para pago e N para nao pago',
  `name` varchar(20) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `date_payment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `removed` char(1) DEFAULT 'N',
  `active` char(1) DEFAULT 'S',
  `name` varchar(100) NOT NULL,
  `alias` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `removed`, `active`, `name`, `alias`, `created`, `modified`) VALUES
(1, 'N', 'S', 'Admin', 'admin', '2015-02-13 03:37:45', '2015-02-13 03:37:45'),
(2, 'N', 'S', 'Public', 'public', '2015-02-13 03:37:59', '2015-02-13 03:37:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) DEFAULT 'N',
  `active` char(1) DEFAULT 'S',
  `animal_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `veterinarian_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `status` char(1) DEFAULT '2' COMMENT '1 em analise 2 completado',
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created`, `modified`, `removed`, `active`, `name`) VALUES
(1, '2015-02-08 19:01:49', '2015-02-08 19:01:49', 'N', 'S', 'CartÃ£o Banese');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(10) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `species`
--

CREATE TABLE IF NOT EXISTS `species` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `species`
--

INSERT INTO `species` (`id`, `created`, `modified`, `removed`, `active`, `name`, `description`) VALUES
(1, '2015-01-31 15:06:26', '2015-02-13 03:06:51', 'N', 'S', 'Canina', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `removed` char(1) DEFAULT 'N',
  `active` char(1) DEFAULT 'S',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `removed`, `active`, `username`, `password`, `group_id`, `created`, `modified`, `status`, `name`, `email`, `image`) VALUES
(1, 'N', 'S', 'edson', 'e056727c4ecbcacc5cb366e1ef8fcd8fdb54e0f4', 1, '2015-02-13 03:43:37', '2015-02-13 03:49:31', 1, 'Edson Lima', 'edson@fabtechinfo.com.br', 'img/avatars/Edson_Junior.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veterinarians`
--

CREATE TABLE IF NOT EXISTS `veterinarians` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `removed` char(1) NOT NULL DEFAULT 'N',
  `active` char(1) NOT NULL DEFAULT 'S',
  `name` varchar(50) NOT NULL,
  `crmv` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veterinarians`
--

INSERT INTO `veterinarians` (`id`, `created`, `modified`, `removed`, `active`, `name`, `crmv`, `phone`, `phone_2`, `email`, `cep`, `address`, `neighborhood`, `city`, `uf`) VALUES
(1, '2015-01-31 15:15:54', '2015-02-13 01:18:31', 'N', 'S', 'Steffani de Jesus Santos', '1024354', '7988386305', '', 'stefani@ste.com', 49087473, 'Rua A', 'Santos Dumont', 'Aracaju', 'SE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_flows`
--
ALTER TABLE `cash_flows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations_orders`
--
ALTER TABLE `examinations_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cash_flows`
--
ALTER TABLE `cash_flows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examinations_orders`
--
ALTER TABLE `examinations_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `veterinarians`
--
ALTER TABLE `veterinarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
