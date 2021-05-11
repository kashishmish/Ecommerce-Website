-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 03:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Kashish Mishra', '6bcdf7a4d9239eb44ac92d55714bc99b'),
('Shivani Verma', '6bcdf7a4d9239eb44ac92d55714bc99b');

-- --------------------------------------------------------

--
-- Table structure for table `buyproduct`
--

CREATE TABLE `buyproduct` (
  `buyid` int(20) NOT NULL,
  `productid` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `vendor_email` varchar(200) NOT NULL,
  `dateposted` date NOT NULL,
  `delivered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyproduct`
--

INSERT INTO `buyproduct` (`buyid`, `productid`, `quantity`, `email`, `vendor_email`, `dateposted`, `delivered`) VALUES
(259572924, 57, 5, 'kashmish9555@gmail.com', 'vermashivani543@gmail.com', '2020-07-08', 0),
(260730179, 51, 1, 'vermashivani543@gmail.com', 'kashishmishra9911@gmail.com', '2020-07-08', 0),
(265229976, 73, 2, 'kashmish9555@gmail.com', 'shivani.18bcs1026@abes.ac.in', '2020-07-08', 0),
(300942360, 65, 2, 'kashish.18bcs1034@abes.ac.in', 'kashmish9555@gmail.com', '2020-07-09', 1),
(323328186, 66, 3, 'shivani.18bcs1026@abes.ac.in', 'kashmish9555@gmail.com', '2020-07-08', 1),
(478011632, 62, 4, 'shivani.18bcs1026@abes.ac.in', 'kashmish9555@gmail.com', '2020-07-08', 1),
(538144654, 56, 11, 'shivani.18bcs1026@abes.ac.in', 'vermashivani543@gmail.com', '2020-07-08', 0),
(562304050, 60, 5, 'kashishmishra9911@gmail.com', 'vermashivani543@gmail.com', '2020-07-08', 0),
(570433801, 67, 5, 'shivani.18bcs1026@abes.ac.in', 'kashmish9555@gmail.com', '2020-07-08', 0),
(593545611, 62, 6, 'kashmish9555@gmail.com', 'kashmish9555@gmail.com', '2020-07-08', 0),
(602563900, 72, 8, 'kashishmishra9911@gmail.com', 'shivani.18bcs1026@abes.ac.in', '2020-07-08', 0),
(652792419, 71, 2, 'vermashivani543@gmail.com', 'shivani.18bcs1026@abes.ac.in', '2020-07-08', 0),
(721874259, 65, 2, 'vermashivani543@gmail.com', 'kashmish9555@gmail.com', '2020-07-08', 1),
(793327760, 60, 2, 'kashish.18bcs1034@abes.ac.in', 'vermashivani543@gmail.com', '2020-07-09', 0),
(841407840, 70, 4, 'kashishmishra9911@gmail.com', 'shivani.18bcs1026@abes.ac.in', '2020-07-08', 0),
(921235166, 50, 1, 'kashish.18bcs1034@abes.ac.in', 'kashishmishra9911@gmail.com', '2020-07-09', 0),
(925717884, 60, 10, 'vermashivani543@gmail.com', 'vermashivani543@gmail.com', '2020-07-08', 0),
(933176491, 79, 11, 'kashishmishra9911@gmail.com', 'kashish.18bcs1034@abes.ac.in', '2020-07-08', 1),
(975267685, 59, 2, 'kashishmishra9911@gmail.com', 'vermashivani543@gmail.com', '2020-07-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `image1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `email_user`, `image1`) VALUES
(104, 'vermashivani543@gmail.com', '42a28e663009ff2749e2d7b97dd81354'),
(105, 'vermashivani543@gmail.com', '777182a4b64824e01fed3195e1d2d18a'),
(106, 'kashishmishra9911@gmail.com', '9bcbe7eb24f2c83509ba55834aa2b9a0'),
(107, 'kashishmishra9911@gmail.com', '8511738831661f84fb87f5b0d4560c13'),
(108, 'kashmish9555@gmail.com', '25dc07a6e146020ab05240d8080d0647'),
(109, 'kashmish9555@gmail.com', '42a28e663009ff2749e2d7b97dd81354'),
(110, 'kashmish9555@gmail.com', '9bcbe7eb24f2c83509ba55834aa2b9a0'),
(111, 'shivani.18bcs1026@abes.ac.in', 'a29f4c159935bbb765656f46108ba7a9'),
(112, 'shivani.18bcs1026@abes.ac.in', '42a28e663009ff2749e2d7b97dd81354'),
(113, 'shivani.18bcs1026@abes.ac.in', 'de3dac513bb3385145e893ce4f2baaf2'),
(114, 'shivani.18bcs1026@abes.ac.in', 'ca758ea9220bff5231f9c6db929d1c88'),
(115, 'kashish.18bcs1034@abes.ac.in', 'd73262367c7a1a0daa8b8e8ab1dc1173'),
(116, 'kashish.18bcs1034@abes.ac.in', '82e762a6cde6499f98ef4eecf6c3e9bb');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `vemail` varchar(100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `proname` varchar(100) NOT NULL,
  `prodesc` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `image4` varchar(200) NOT NULL,
  `mdim1` varchar(100) NOT NULL,
  `keyword` varchar(300) NOT NULL,
  `rating` int(10) NOT NULL,
  `offers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`vemail`, `category_id`, `subcategory_id`, `productid`, `proname`, `prodesc`, `price`, `quantity`, `image1`, `image2`, `image3`, `image4`, `mdim1`, `keyword`, `rating`, `offers`) VALUES
('kashishmishra9911@gmail.com', 1, 9, 50, 'Iphone 11 Pro Max', 'Iphone 11 Pro Max,apple latest phones', 110000, 18, 'uploads/kashishmishra9911@gmail.comiphone11promax.jpg', 'uploads/kashishmishra9911@gmail.comiphone11promax2.jpg', 'uploads/kashishmishra9911@gmail.comiphone11promax3jpg.jpg', 'uploads/kashishmishra9911@gmail.comiphone11promax4.jpg', '42a28e663009ff2749e2d7b97dd81354', 'Iphone 11 pro max,apple phones ', 5, '20% discount on SBI Debit Cards'),
('kashishmishra9911@gmail.com', 1, 1, 51, 'HP laptop', '15q laptop 8gb ram,i5  processor 8 generation', 50000, 299, 'uploads/kashishmishra9911@gmail.comhp.jpg', 'uploads/kashishmishra9911@gmail.comhp.jpg', 'uploads/kashishmishra9911@gmail.comhp.jpg', 'uploads/kashishmishra9911@gmail.comhp.jpg', 'de3dac513bb3385145e893ce4f2baaf2', 'HP laptops i5 processor 8th generation windows 10 home 1 tb hhd', 4, '10% discount '),
('kashishmishra9911@gmail.com', 1, 9, 52, 'Iphone 10 x max', 'Iphone 10 x max 256gb 128px camera', 83000, 250, 'uploads/kashishmishra9911@gmail.comiphone10.jpg', 'uploads/kashishmishra9911@gmail.comiphone10.jpg', 'uploads/kashishmishra9911@gmail.comiphone10.jpg', 'uploads/kashishmishra9911@gmail.comiphone10.jpg', '9bcbe7eb24f2c83509ba55834aa2b9a0', 'Iphone 10 x max,apple phones ', 5, '10% discount on SBI Debit Cards'),
('kashishmishra9911@gmail.com', 1, 1, 53, 'Macbook Pro Latest Release', '16 inch 16gb ram 2.3 gh 9th generation intel i 9 processor', 229000, 150, 'uploads/kashishmishra9911@gmail.commacbookpro.jpg', 'uploads/kashishmishra9911@gmail.commacbookpro.jpg', 'uploads/kashishmishra9911@gmail.commacbookpro.jpg', 'uploads/kashishmishra9911@gmail.commacbookpro.jpg', 'ca758ea9220bff5231f9c6db929d1c88', 'Macbook pro new 2019 model,16 inch 16gb ram 2.3 gh 9th generation intel i 9 processor', 5, '25% discount on Axis Bank Cards'),
('kashishmishra9911@gmail.com', 1, 9, 54, 'MI Phone', 'nice product', 15000, 200, 'uploads/kashishmishra9911@gmail.commimobile.jpg', 'uploads/kashishmishra9911@gmail.commimobile.jpg', 'uploads/kashishmishra9911@gmail.commimobile.jpg', 'uploads/kashishmishra9911@gmail.commimobile.jpg', 'a29f4c159935bbb765656f46108ba7a9', 'MI mobile', 4, '10% discount on all cards'),
('kashishmishra9911@gmail.com', 1, 2, 55, 'Led TV Sony 56 inch', 'nice product', 45000, 150, 'uploads/kashishmishra9911@gmail.comledtv.jpg', 'uploads/kashishmishra9911@gmail.comledtv.jpg', 'uploads/kashishmishra9911@gmail.comledtv.jpg', 'uploads/kashishmishra9911@gmail.comledtv.jpg', '9de5d45c0146aab52f1477a2d8944329', 'Led TV Sony 56 inch', 4, '15% discount on all cards'),
('vermashivani543@gmail.com', 1, 11, 56, 'Samsung Tab S6 new series', 'Samsung Tab S6 new series', 55000, 139, 'uploads/vermashivani543@gmail.comsamsung tab.jpg', 'uploads/vermashivani543@gmail.comsamsung tab.jpg', 'uploads/vermashivani543@gmail.comsamsung tab.jpg', 'uploads/vermashivani543@gmail.comsamsung tab.jpg', 'a78cff10e83eaeb6b3bd1dba3b883779', 'Samsung Tab S6 new series with keyboard', 5, '20% discount on SBI Debit Cards'),
('vermashivani543@gmail.com', 1, 12, 57, 'Apple Air pods pro', 'nice product', 24000, 195, 'uploads/vermashivani543@gmail.comappleearpods.jpg', 'uploads/vermashivani543@gmail.comappleearpods.jpg', 'uploads/vermashivani543@gmail.comappleearpods.jpg', 'uploads/vermashivani543@gmail.comappleearpods.jpg', 'c8f291562da73094db53446e035a59e6', 'Apple Air pods pro', 4, '15% discount on all cards'),
('vermashivani543@gmail.com', 1, 10, 58, 'Apple watch', 'Apple watch', 15000, 150, 'uploads/vermashivani543@gmail.comapplewatch.jpg', 'uploads/vermashivani543@gmail.comapplewatch.jpg', 'uploads/vermashivani543@gmail.comapplewatch.jpg', 'uploads/vermashivani543@gmail.comapplewatch.jpg', '8511738831661f84fb87f5b0d4560c13', 'Apple watch', 4, '10% discount on SBI Debit Cards'),
('vermashivani543@gmail.com', 1, 4, 59, 'Macbook air 13.5inches', 'Macbook air 13.5inches', 100000, 248, 'uploads/vermashivani543@gmail.commacbook.jpg', 'uploads/vermashivani543@gmail.commacbook.jpg', 'uploads/vermashivani543@gmail.commacbook.jpg', 'uploads/vermashivani543@gmail.commacbook.jpg', 'ef1e7ced613f16aa791ccfb9c9917860', 'Macbook air 13.5inches', 4, '15% discount on all cards'),
('vermashivani543@gmail.com', 1, 9, 60, 'One Plus 8 new in market', 'One Plus 8 new in market', 40000, 233, 'uploads/vermashivani543@gmail.comoneplus8.jpg', 'uploads/vermashivani543@gmail.comoneplus8.jpg', 'uploads/vermashivani543@gmail.comoneplus8.jpg', 'uploads/vermashivani543@gmail.comoneplus8.jpg', '45c95fbbd26486ff147e01182e6cdcdf', 'One Plus 8 new in market', 5, '10% discount on all cards'),
('vermashivani543@gmail.com', 1, 1, 61, 'Asus Zenbook flip', 'Asus Zenbook flip', 69000, 250, 'uploads/vermashivani543@gmail.comasus zenbook flip.jpg', 'uploads/vermashivani543@gmail.comasus zenbook flip.jpg', 'uploads/vermashivani543@gmail.comasus zenbook flip.jpg', 'uploads/vermashivani543@gmail.comasus zenbook flip.jpg', '6c5847064533671dbe99504a0789754f', 'Asus Zenbook flip', 5, '25% discount on Axis Bank Cards'),
('kashmish9555@gmail.com', 2, 18, 62, 'Women Tops', 'nice product', 1499, 140, 'uploads/kashmish9555@gmail.comtop.jpg', 'uploads/kashmish9555@gmail.comtop.jpg', 'uploads/kashmish9555@gmail.comtop.jpg', 'uploads/kashmish9555@gmail.comtop.jpg', '777182a4b64824e01fed3195e1d2d18a', 'Women Tops', 4, '5% discount on axis bank'),
('kashmish9555@gmail.com', 2, 7, 63, 'T-Shirt Men', 'flexible T-shirt', 1000, 150, 'uploads/kashmish9555@gmail.comtshirt.jpg', 'uploads/kashmish9555@gmail.comtshirt.jpg', 'uploads/kashmish9555@gmail.comtshirt.jpg', 'uploads/kashmish9555@gmail.comtshirt.jpg', 'd85db072c2d103ad1901b44a63bc1c76', 'T-Shirt Men', 3, '10% discount '),
('kashmish9555@gmail.com', 2, 15, 64, 'Saree Silk', 'Saree Silk', 2000, 150, 'uploads/kashmish9555@gmail.comsaree2.jpg', 'uploads/kashmish9555@gmail.comsaree2.jpg', 'uploads/kashmish9555@gmail.comsaree2.jpg', 'uploads/kashmish9555@gmail.comsaree2.jpg', '6602d82428f5ea5d06b65c22052d995a', 'Saree Silk', 4, '10% discount on all cards'),
('kashmish9555@gmail.com', 2, 13, 65, 'Women Jacket Black', 'Women Jacket Black', 1500, 196, 'uploads/kashmish9555@gmail.comjackets1.png', 'uploads/kashmish9555@gmail.comjackets1.png', 'uploads/kashmish9555@gmail.comjackets1.png', 'uploads/kashmish9555@gmail.comjackets1.png', '25dc07a6e146020ab05240d8080d0647', 'Women Jacket Black', 5, '10% discount on SBI Debit Cards'),
('kashmish9555@gmail.com', 2, 5, 66, 'Women Pants ', 'Women Pants ', 699, 247, 'uploads/kashmish9555@gmail.comwomen pants.jpg', 'uploads/kashmish9555@gmail.comwomen pants.jpg', 'uploads/kashmish9555@gmail.comwomen pants.jpg', 'uploads/kashmish9555@gmail.comwomen pants.jpg', '0d8d9c6a0744a55c2916cea35d1cd67c', 'Women Pants ', 5, '20% discount on SBI Debit Cards'),
('kashmish9555@gmail.com', 2, 6, 67, 'Shirt Denim', 'Shirt Denim', 899, 195, 'uploads/kashmish9555@gmail.comshirt1.jpg', 'uploads/kashmish9555@gmail.comshirt1.jpg', 'uploads/kashmish9555@gmail.comshirt1.jpg', 'uploads/kashmish9555@gmail.comshirt1.jpg', '8365d3fcfe24069bfa4c8558f0ca601f', 'Shirt Denim', 5, '10% discount on all cards'),
('kashmish9555@gmail.com', 2, 6, 68, 'Women Shirt', 'Women Shirt', 500, 150, 'uploads/kashmish9555@gmail.comshirtwomen.jpg', 'uploads/kashmish9555@gmail.comshirtwomen.jpg', 'uploads/kashmish9555@gmail.comshirtwomen.jpg', 'uploads/kashmish9555@gmail.comshirtwomen.jpg', '40f72590c2537a3fb250779c20628706', 'Women Shirt', 4, '15% discount on all cards'),
('vermashivani543@gmail.com', 2, 5, 69, 'Mens Chinos', 'nice product', 999, 200, 'uploads/vermashivani543@gmail.comchinos.jpg', 'uploads/vermashivani543@gmail.comchinos.jpg', 'uploads/vermashivani543@gmail.comchinos.jpg', 'uploads/vermashivani543@gmail.comchinos.jpg', '21ef0b93801c985db372e531e58beb1b', 'Mens Chinos', 5, '20% discount on SBI Debit Cards'),
('shivani.18bcs1026@abes.ac.in', 2, 8, 70, 'Adidas Shoes for men black', 'Adidas Shoes for men black', 4599, 296, 'uploads/shivani.18bcs1026@abes.ac.inadidasmen.jpg', 'uploads/shivani.18bcs1026@abes.ac.inadidasmen.jpg', 'uploads/shivani.18bcs1026@abes.ac.inadidasmen.jpg', 'uploads/shivani.18bcs1026@abes.ac.inadidasmen.jpg', 'bd18b88153855cc71a7c8631eafe42dc', 'Adidas Shoes for men black', 5, '25% discount on Axis Bank Cards'),
('shivani.18bcs1026@abes.ac.in', 2, 16, 71, 'Sandal Women Black', 'Sandal Women Black', 1500, 148, 'uploads/shivani.18bcs1026@abes.ac.insandalsw.jpg', 'uploads/shivani.18bcs1026@abes.ac.insandalsw.jpg', 'uploads/shivani.18bcs1026@abes.ac.insandalsw.jpg', 'uploads/shivani.18bcs1026@abes.ac.insandalsw.jpg', 'e0ba2b7bfa146dbfdb3a2a2cae232a6f', 'Sandal Women Black', 4, '10% discount '),
('shivani.18bcs1026@abes.ac.in', 2, 14, 72, 'Kurti Women daily Wear', 'Kurti Women daily Wear', 1100, 192, 'uploads/shivani.18bcs1026@abes.ac.inkurtiw.jpg', 'uploads/shivani.18bcs1026@abes.ac.inkurtiw.jpg', 'uploads/shivani.18bcs1026@abes.ac.inkurtiw.jpg', 'uploads/shivani.18bcs1026@abes.ac.inkurtiw.jpg', 'cb959cbe1056daa2ef584eab8e76daf6', 'Kurti Women daily Wear', 4, '10% discount '),
('shivani.18bcs1026@abes.ac.in', 2, 13, 73, 'Sweat Shirt Nike Women', 'Sweat Shirt Nike Women', 2500, 198, 'uploads/shivani.18bcs1026@abes.ac.insweatshirtnike.jpg', 'uploads/shivani.18bcs1026@abes.ac.insweatshirtnike.jpg', 'uploads/shivani.18bcs1026@abes.ac.insweatshirtnike.jpg', 'uploads/shivani.18bcs1026@abes.ac.insweatshirtnike.jpg', '16d69c0de6367be2a9d7b49f0f2991dc', 'Sweat Shirt Nike Women', 5, '15% discount on all cards'),
('shivani.18bcs1026@abes.ac.in', 1, 12, 74, 'BOAT Headphones', 'BOAT Headphones high bass sound', 1500, 150, 'uploads/shivani.18bcs1026@abes.ac.inpd.jpg', 'uploads/shivani.18bcs1026@abes.ac.inpd.jpg', 'uploads/shivani.18bcs1026@abes.ac.inpd.jpg', 'uploads/shivani.18bcs1026@abes.ac.inpd.jpg', '82e762a6cde6499f98ef4eecf6c3e9bb', 'headphones earphones ', 5, '5% discount on axis bank'),
('vshiv1479@gmail.com', 1, 12, 75, 'BOAT  wireless earphones', 'Earphones have nice sound quality', 1678, 200, 'uploads/vshiv1479@gmail.comBOATearphones.jpg', 'uploads/vshiv1479@gmail.comBOATearphones.jpg', 'uploads/vshiv1479@gmail.comBOATearphones.jpg', 'uploads/vshiv1479@gmail.comBOATearphones.jpg', 'd73262367c7a1a0daa8b8e8ab1dc1173', 'headphones earphones ', 4, '10% discount on all cards'),
('vshiv1479@gmail.com', 1, 12, 76, 'JBL Earphones', 'JBL earphones have nice sound', 2000, 250, 'uploads/vshiv1479@gmail.comJBLearphones.jpg', 'uploads/vshiv1479@gmail.comJBLearphones.jpg', 'uploads/vshiv1479@gmail.comJBLearphones.jpg', 'uploads/vshiv1479@gmail.comJBLearphones.jpg', '35842f2b548d33251b2fb10ef09e38b5', 'JBL earphones', 5, '10% discount on SBI Debit Cards'),
('vshiv1479@gmail.com', 1, 12, 77, 'SONY headphones', 'Sony headphones are fantastic', 3456, 300, 'uploads/vshiv1479@gmail.comsonyhp.jpg', 'uploads/vshiv1479@gmail.comsonyhp.jpg', 'uploads/vshiv1479@gmail.comsonyhp.jpg', 'uploads/vshiv1479@gmail.comsonyhp.jpg', '6d012356a8dd82c68fd126a7dfc0ba00', 'sony headphones', 4, '20% discount on SBI Debit Cards'),
('vshiv1479@gmail.com', 1, 12, 78, 'Philips headphones', 'Over-Ear Mega Bass Wired', 1698, 150, 'uploads/vshiv1479@gmail.comphilips.jpg', 'uploads/vshiv1479@gmail.compd.jpg', 'uploads/vshiv1479@gmail.comphilips.jpg', 'uploads/vshiv1479@gmail.compd.jpg', '700c2dcc396fb5e951cfd354041dae9e', 'Philips headphones', 4, '10% discount on SBI Debit Cards');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `subimage` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory_name`, `subimage`) VALUES
(1, 1, 'Laptops', 'subcategory_image/hp.jpg'),
(2, 1, 'Televisions', 'subcategory_image/ledtv.jpg'),
(3, 1, 'Cameras', 'subcategory_image/nikoncamera.jpg'),
(4, 1, 'Computers', 'subcategory_image/computer.jpg'),
(5, 2, 'Jeans', 'subcategory_image/jeans.jpg'),
(6, 2, 'Shirt', 'subcategory_image/shirt.jpg'),
(7, 2, 'T-shirt', 'subcategory_image/tshirt.jpg'),
(8, 2, 'Shoes', 'subcategory_image/shoes.jpg'),
(9, 1, 'Phone', 'subcategory_image/phone.jpg'),
(10, 1, 'Watch', 'subcategory_image/applewatch.jpg'),
(11, 1, 'Tablets', 'subcategory_image/tab.png'),
(12, 1, 'Earphones', 'subcategory_image/JBLheadphones2.jpg'),
(13, 2, 'Jackets', 'subcategory_image/jackets.jpg'),
(14, 2, 'Kurti', 'subcategory_image/kurti.jpg'),
(15, 2, 'Saree', 'subcategory_image/saree2.jpg'),
(16, 2, 'Heels', 'subcategory_image/heels.jpg'),
(17, 1, 'Washing Machine', 'subcategory_image/washing machine.jpg'),
(18, 2, 'Tops', 'subcategory_image/top.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `psw` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `email`, `psw`, `address`) VALUES
('Kashish Mishra', 'kashuuuuu', 'kashish.18bcs1034@abes.ac.in', '6bcdf7a4d9239eb44ac92d55714bc99b', 'c-564, nandgram ghaziabad'),
('Kashish Mishra', 'kashish', 'kashishmishra9911@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'h-123,ghaziabad'),
('kashish', 'kashish9911', 'kashmish9555@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'h-123 patel nagar ghaziabad'),
('Shivani Verma', 'shivuuuuuuu', 'shivani.18bcs1026@abes.ac.in', '6bcdf7a4d9239eb44ac92d55714bc99b', 'F-266 ghaziabad'),
('verma shivani', 'inavihs', 'vermashivani543@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'E-266, nandgram ghaziabad');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`name`, `username`, `email`, `password`, `address`) VALUES
('Kashish Mishra', 'kashish', 'kashishmishra9911@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'h-123,ghaziabad'),
('Kashish Mishra', 'kashish9911', 'kashmish9555@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'c-564,ghaziabad'),
('Shivani Verma', 'shivani', 'shivani.18bcs1026@abes.ac.in', '6bcdf7a4d9239eb44ac92d55714bc99b', 'E-266, nandgram ghaziabad'),
('Shivani Verma', 'shivani', 'vermashivani543@gmail.com', '6bcdf7a4d9239eb44ac92d55714bc99b', 'E-266 ghaziabad'),
('Johny', 'John', 'vshiv1479@gmail.com', '7473408a9be0b41bc38caeef2a1cb10f', 'G-123,ghaziabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `buyproduct`
--
ALTER TABLE `buyproduct`
  ADD PRIMARY KEY (`buyid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
