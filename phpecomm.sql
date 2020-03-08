-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 10:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `access_menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`access_menu_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 4),
(6, 1, 5),
(7, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_url` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu`) VALUES
(1, 'Admin utama'),
(2, 'user role'),
(3, 'Menu Management'),
(4, 'Transaksi'),
(5, 'Produk');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `address_id` varchar(100) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `order_closed` int(1) NOT NULL,
  `order_fulfilment_code` varchar(150) NOT NULL,
  `delivery_address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `poduct_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
  `name` varchar(100) NOT NULL,
  `category_id` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `member_price` varchar(100) NOT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`poduct_id`, `image`, `name`, `category_id`, `description`, `quantity`, `price`, `member_price`, `weight`, `shipping_id`) VALUES
(1, 'default.jpg', '', 'voucher', 'satu', '12', '3000', '6000', '10', 1),
(2, 'default.jpg', '', 'voucher', 'satu', '12', '3000', '6000', '', 1),
(3, '5954253d505511a4614edad05c75a9cc.jpg', '', 'voucher', 'satu', '12', '52000', '60000', '', 0),
(4, '5eb3ef295d63e6b44181af3d464cbfab.jpg', '', 'voucher', 'satu', '15', '21000', '25000', '', 0),
(5, 'cabe2c3c2a3e4c80c4ddb446af500c37.jpg', '', 'voucher', 'satu', '12', '21000', '25000', '', 0),
(6, '21e205a35d5db92701441740574d5a34.jpg', '', 'voucher', 'satu', '12', '52000', '60000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'CEO'),
(2, 'admin'),
(3, 'member'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'userAccess/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Menu Utama', 'adminMenu/index', 'far fa-fw fa-folder', 1),
(3, 3, 'Sub Menu', 'adminSubMenu/index', 'far fa-fw fa-folder-open', 1),
(4, 4, 'Pesanan', 'useraccess/admin', 'fas fa-fw fa-shopping-cart', 1),
(5, 2, 'User Role', 'adminSetUser/index', 'fas fa-fw fa-user-edit', 1),
(6, 5, 'Produk', 'adminProduct/index', 'fas fa-fw fa-box-open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(5) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `subdistrict` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `name`, `phone`, `country`, `province`, `city`, `subdistrict`) VALUES
(4, 'habib', 'habib@gmail.com', 'default.jpg', '$2y$10$TmYQSy3pJuRja7BC7gMrMemy3yL6VfkrOnM9cvmy6r0RTeeLg/bsm', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'isna', 'isna@gmail.com', 'default.jpg', '$2y$10$fYr7vK0Fs5h6GorFpNX1JOxnpV8D1WIq8RBnznmf5ArH2uC6rdXVq', 2, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'isnatul', 'isnatul@gmail.com', 'default.jpg', '$2y$10$d.Z8FR4lA8laXdL4OUyK9ui1HSmeQ0fumTGeVRPn6.ovIprXj5aSi', 3, 0, 1583337842, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`access_menu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`poduct_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `access_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `poduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
