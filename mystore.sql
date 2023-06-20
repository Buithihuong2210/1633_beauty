-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 12:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'huongthubui', 'huongthubui@gmail.com', '$2y$10$QUagBXQLXmvIA9va3Gvc9ucANHOR6gQgU0TaXLyGL2vB.DuHY5qYS'),
(4, 'thao', 'thao2008@gmail.com', '$2y$10$Plg6y6OWq9XFAef67sCA5Oyv/oWNmPwW/rNRdQJdoNM8Y44AbdzMW'),
(5, 'huong', 'huong2210@gmail.com', '$2y$10$3SMcpfeE6zHXd8nb2F3TxOEYCszmb9qEYuQ7IpBMWOnT0yfNmGdc2');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Unilever'),
(2, 'Olay'),
(3, 'MAC'),
(4, 'Neutrogena'),
(5, 'Innisfree'),
(6, 'Maybelline'),
(11, 'Nars'),
(12, 'Clinique'),
(13, 'SK-II'),
(14, 'Estee Lauder'),
(15, 'Urban Decay'),
(16, 'Tarte'),
(17, 'M.O.I'),
(18, 'Decumar'),
(19, 'Sao Thái Dương');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quanlity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`product_id`, `ip_address`, `quanlity`) VALUES
(16, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_title`) VALUES
(3, 'Skin Care'),
(4, 'Makeup'),
(5, 'Body Care'),
(6, 'Hair care'),
(7, 'Nail Care'),
(8, 'Oral care'),
(9, 'Sun Care'),
(10, 'Perfumes'),
(15, 'Skin Cleansing'),
(16, 'Hair Colouring'),
(17, ' Bleach for Body Hair');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_des_short` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_origin` varchar(255) NOT NULL,
  `product_expiration` varchar(100) NOT NULL,
  `product_manufacture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_des_short`, `product_description`, `product_keywords`, `categories_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `product_origin`, `product_expiration`, `product_manufacture`, `date`, `status`) VALUES
(2, 'St.Ives body lotion', '100% natural ingredients', 'St.Ives body lotion is a very popular product line of the famous St.Ives skin care brand originating from the US, with a formula extracted from natural ingredients, helping to gently clean copper. Nourishes and nourishes the skin', 'body', 5, 1, 'Sữa tắm St1.jpg', 'Sữa tắm st rời1.jpg', 'sữa tắm st rời l2.jpg', '175', 'USA', '3 years from date of manufacture', 'See product packaging', '2023-06-20 08:03:54', 'true'),
(3, 'Camay Bath Soap', 'Fragrance French Perfume', 'Camay Shower Soap with its mild formula will help gently cleanse the body and nourish a soft, youthful skin. The product has a unique formula with a fragrance from French perfume', 'soap, body, cammay', 10, 4, 'camay3.jpg', 'xà phòng camay1.jpg', 'camay2.jpg', '50', 'Viet Nam', '2 years from date of manufacture', 'See product packaging', '2023-06-20 07:47:26', 'true'),
(4, 'Retinol 24 Max Night', 'Penetrates deep skin\'s', 'Olay Regenerist Retinol 24 Max Night Hydrating Moisturizer is an exclusive formula with Vitamin B3 + Retinol that penetrates deep into the surface layers of the skin', 'skin, Olay, Max Night', 3, 2, 'Oley1.jpg', 'olay2.jpg', 'olay3.jpg', '395', 'England', '3 years from date of manufacture', 'See product packaging', '2023-06-20 08:04:39', 'true'),
(5, 'MAC Extra Dimension', ' Liquid-powder highlighter', 'Highlighter is the perfect blush for bright and vibrant cheeks. The texture of the powder particles captures and reflects natural light to help highlight the contours of the face', 'Skin, MAC', 4, 3, 'Phan batsang MAC1.jpg', 'PHANBATSANGMAC2.jpg', 'PhanbatsangMac3.jpg', '100', 'ThaiLand', '3 years from date of manufacture', 'See product packaging', '2023-06-20 08:04:29', 'true'),
(6, 'Neutrogena Ultra', 'Dry-touch feels super light', 'America neutrogena ultra sheer dry touch sunscreen is a product line that uses superior technology to give customers an impression.', 'Sunscreen, Neutrogena', 9, 4, 'KCN Neutrogena1.jpg', 'kcn Neutrogena2.jpg', 'kcn Neutrogena3.jpg', '70', 'USA', '3 years from date of manufacture', 'See product packaging', '2023-06-20 08:04:44', 'true'),
(13, 'Dove Body Love', 'Cleansers exfoliates rough', 'A hydrating body polish with plant-based cleansers that exfoliates rough skin to reveal a beautifully silky soft finish.', 'dove, body, clean', 5, 1, 'dove2.jpg', 'dove1.jpg', 'dove3.jpg', '122', 'US', '30 months from date of manufacture', 'Vietnam', '2023-06-20 08:05:05', 'true'),
(14, 'Shampoo al carbone  ', 'For unclean scalp and hair', 'Equilibra ® Activated Charcoal Detoxifying Shampoo, ideal for scalp and unclean hair, gently cleanses hair and scalp burdened by pollution, excess sebum and impurities. Activated charcoal naturally absorbs impurities, providing lightness and freshness. ', 'Shampoo, detox, carbone, clean, hair', 6, 1, 'daugoi1.jpg', 'daugoi2.jpg', 'daugoi3.jpg', '240', 'Italy', '24 months from date of manufacture', 'Vietnam', '2023-06-20 08:05:31', 'true'),
(15, 'SmartyPants Vitamin', 'Helps to maintain hair', 'SmartyPants Sugar Free Women’s Multivitamin is a sugar-free gummy made for women’s daily nutrition support. Made with Monk Fruit Sweetener instead of sugar. ', 'Vitamin, women, suager,gummies', 5, 1, 'vitamin1.jpg', 'vitamin2.jpg', 'vitamin3.jpg', '299', 'USA', '24 months from date of manufacture', ' Smarty Pants ', '2023-06-20 08:05:40', 'true'),
(16, 'Olay Super Serum', 'Lightweight and smooth', '5 Luxury Serum Benefits In 1. Use daily morning and night, before moisturizer. Should be used with the Cream for best results. Avoid contact with skin around eyes', 'Olay, Serum, luxury', 3, 2, 'serum2.jpg', 'serum1.jpg', 'serum3.jpg', '500', 'Paris', '12 months after opening', 'Korea', '2023-06-20 07:55:48', 'true'),
(17, 'Revitalizing Facial', 'Remove dirt and condition', 'Deep cleans to remove dirt, oil and impurities to reveal healthy skin. Fragrance-free gel cleanser that forms a refreshing lather for deep cleansing.', 'Cleanser, Revitalizing, skin', 15, 2, 'suaruamat1.jpg', 'suaruamat2.jpg', 'suaruamat3.jpg', '200', 'England', '2 years from the date of manufacture printed on the product packaging', 'Korea', '2023-06-20 08:07:02', 'true'),
(18, 'Brushstroke 24h Liner', 'Easy and precise lining', 'A liquid eyeliner pen with a precision brush tip that wears strong all day long for 24 hours. Add a painterly touch to the eyeliner application. Brushstroke Liner features a precision brush tip that makes liquid lining sharp, fast, and easy. ', 'Brushstroke, 24h, liner, eyeliner, pen', 4, 3, 'kemat1.jpg', 'kemat2.jpg', 'kemat3.jpg', '250', 'New York', '12 months after opening', 'Vietnam', '2023-06-20 07:57:36', 'true'),
(19, 'Chilis Crew', 'Six lip formulas', 'Velvety matte lipstick. Soft has never looked so bold with Powder Kiss Velvet Blur Slim Stick in Devoted To Chili. Experience moisture-matte to the max with her haute formula that delivers 12.', 'Chili, Crew, Lipstick', 4, 3, 'sonmoi1.jpg', 'sonmoi2.jpg', 'sonmoi3.jpg', '400', 'England', '3 years from the date of manufacture ', 'Vietnam', '2023-06-20 07:58:43', 'true'),
(20, 'Neutrogena Hydro Boost', 'Increase skin moisture', 'Quench your extra-dry skin with clinically proven, 48-hour hydration for healthy, glowing skin. Formulated with Hyaluronic Acid, this oil-free, non-comedogenic face moisturizer leaves dry skin looking smooth and hydrated day after day.', 'Neutrogena, cream, skin, hydro', 3, 4, 'hydro1.jpg', 'hydro2.jpg', 'hydro3.jpg', '250', 'France', '36 months from date of use', 'Vietnam', '2023-06-20 08:07:17', 'true'),
(21, 'Dewy Glow Jam ', 'Skin a glassy glow', 'A hydrating gel cleanser infused with Cherry Blossom Leaf Extract and betaine that delivers a glass-skin glow after washing. Our new Jam cleanser has an enchanting pale pink succulent jam texture.', 'clean, dewy, glow, jam', 15, 5, 'clean3.jpg', 'clean2.jpg', 'clean1.jpg', '180', 'Korea', '3 years from date of manufacture.', 'Product packaging design will change depending on the batch of goods.', '2023-06-20 08:08:10', 'true'),
(22, 'Face and Lip Makeup', 'Gently and effectively.', 'Quickly & effectively removes eye & lip makeup; The mild formula is completely non-irritating to even the most sensitive skin. Can be used for the entire face.', 'face, lip, makeup, eye', 15, 6, 'remove1.jpg', 'remove2.jpg', 'remove3.jpg', '78', 'New Y', '3 years from date of manufacture', 'China', '2023-06-20 08:08:01', 'true'),
(23, 'Skin care duo by M.O.I', 'Intensive skin care', 'Cleanse and moisturize from the very first step of your skin care routine. Gently removes residue from makeup products without irritating the skin.', 'Skin care, clean, M.O.I', 3, 17, 'MOI1.jpg', 'MOI2.jpg', 'MOI3.jpg', '499', 'Vietnam', '12 months after opening', 'Korea', '2023-06-20 08:00:59', 'true'),
(24, 'Thai Duong herbal hair', 'High quality and cheap', 'Dyeing the entire gray hair to black, gives natural shiny black hair, and also helps to make hair strong and durable after dyeing.', 'Thai Duong, hair, herbal, black', 16, 19, 'tnt1.jpg', 'tnt3.jpg', 'tnt2.jpg', '90', 'Vietnam', '3 years from date of manufacture', 'See on the packaging', '2023-06-20 08:07:30', 'true'),
(25, 'Decumar Oil control', 'Oil control for acne skin', 'Kem chống nắng ngừa mụn Decumar tạo lớp hàng rào bảo vệ mỏng nhẹ nhưng kiên cố, không bóng nhờn, bảo vệ da nhạy cảm trước tác hại của ánh mặt trời và môi trường ô nhiễm, tránh thâm sẹo.', 'Decumar, Oil, sunscreen, Skin', 9, 18, 'decumar3.jpg', 'decumar1.jpg', 'decumar2.jpg', '130', 'Vietnam', '36 months from date of use', 'Vietnam', '2023-06-20 08:08:31', 'true'),
(26, 'Colgate Optic White Teeth Pen ', 'Smile always bright white', 'Whiten teeth by 3 levels in 3 weeks, based on clinical research using the whitening pen once daily, compared to brushing alone.', 'colgate, white, teeth,pen', 8, 1, 'rang3.jpg', 'rang2.jpg', 'rang1.jpg', '389', 'USA', '2 years from the date of manufacture ', 'ThaiLand', '2023-06-20 08:02:14', 'true'),
(27, 'Audacious Fragrance', 'Like an abstract painting', 'New bold feeling. Discover the embodiment of boldness in Francois Nars signature fragrance. Where light meets darkness. Sensual looks mixed with personality. Perfume represents the personality.', 'Nars, Audacious , Francois', 10, 11, 'nars3.jpg', 'nars2.jpg', 'nars1.jpg', '425', 'France', '4 years from the date of manufacture ', 'Product packaging design will change depending on the batch of goods.', '2023-06-20 08:03:34', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'huong', 'huongbui2210@gmail.com', '$2y$10$JBYFO1uJ3mhGMA2lAC8f8.v.1uPRRDMWFPZTaHSUXgqwVUy1wrwFy', 'user1.jpg', '::1', 'Haiduong', '975148622');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
