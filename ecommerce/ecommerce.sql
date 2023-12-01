-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:55 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `category`, `stock`) VALUES
(2, 'new balance', 'Re-introducing a basketball legend.\r\n The return of the 550 pays tribute to the 1989 original that defined a hoops generation. \r\nOriginally worn by pro ballers in the ’80s and ’90s, the new 550 is simple, clean and true to its legacy.', 200.00, 'pictures/s4.jpg', 'shoes', 0),
(3, 'Nike M2K Tekno', 'The Nike M2K Tekno projects the Monarch lineage into the future with space-age details. Its laminated upper mimics the style of the original Monarch, while the imposing outsole is inspired by the famous Monarch IV.', 250.00, 'pictures/s7.jpg', 'shoes', 0),
(4, 'LEATHER TRACK-SOLE ANKLE BOOTS', 'Leather ankle boots. Track sole with raised details. Elastic side gores. Back pull tab.', 100.00, 'pictures/s8.jpg', 'shoes', 0),
(5, 'LEATHER TRACK-SOLE ANKLE BOOTS', 'Leather ankle boots. Track sole with raised details. Elastic side gores. Back pull tab.', 100.00, 'pictures/s9.jpg', 'shoes', 0),
(7, 'LEATHER TRACK-SOLE ANKLE BOOTS', 'Leather ankle boots. Track sole with raised details. Elastic side gores. Back pull tab.', 100.00, 'pictures/s10.jpg', 'shoes', 0),
(8, 'LEATHER TRACK-SOLE ANKLE BOOTS', 'Leather ankle boots. Track sole with raised details. Elastic side gores. Back pull tab.\r\n', 100.00, 'pictures/s6.jpg', 'shoes', 0),
(9, 'Converse x AMBUSH Chuck 70', 'CdG x Chuck Taylor 70 Hi sneakers from CONVERSE featuring black/red, canvas, logo patch to the side, heart motif, contrast stitching, round toe, front lace-up fastening, branded insole and rubber sole. These styles are supplied by a premium sneaker marketplace. Stocking only the most sought-after footwear, they source and curate some of the most hard to find sneakers from around the world..\r\n\r\nMaterial	Canvas\r\nModel	Cdg X Chuck Taylor 70 Hi\r\nBrand	\r\nCONVERSE\r\n\r\nColor	\r\nwhite', 195.00, 'pictures/s5.jpg', 'shoes', 0),
(10, 'Nike Air Force', 'Nike Air Force 1 Low Just Do It White Red Green DQ0791-100', 90.00, 'pictures/s1.jpg', 'shoes', 0),
(11, 'Chuck Taylor All Star Platform Cold Fusion', 'CdG x Chuck Taylor 70 Hi sneakers from CONVERSE featuring black/red, canvas, logo patch to the side, heart motif, contrast stitching, round toe, front lace-up fastening, branded insole and rubber sole. These styles are supplied by a premium sneaker marketplace. Stocking only the most sought-after footwear, they source and curate some of the most hard to find sneakers from around the world..\r\n\r\nMaterial	Canvas\r\nModel	Cdg X Chuck Taylor 70 Hi\r\nBrand	\r\nCONVERSE\r\n\r\nColor	\r\nwhite', 90.00, 'pictures/s2.jpg', 'shoes', 0),
(12, 'Reebok', 'Enjoy this Reebok Workout LO Plus model. This article sneakers shoes, signed Reebok, has it all! Product features: color: beige, pink, material: leather, closure: lace-up, season: autumn winter, collection: 2022, gender: female, age: adult, outsole material: rubber, shoe lining: textile, shoe height: low, heel height: flat, shoe width: normal, brand color: white / practical pink, insole material: textile.', 70.00, 'pictures/s3.jpg', 'shoes', 0),
(13, 'Gloves', 'Harssidanzar Luxury womens Italian lambskin leather gloves lined with cashmere', 10.00, 'pictures/a1.jpg', 'accessories', 0),
(14, 'sunglasses ', 'Small rectangle sunglasses women Vintage brand designer square sun glasses for women fashion driving shades Oculos de sol Gafas Hombre', 3.00, 'pictures/a2.jpg', 'accessories', 0),
(15, 'Braclet', 'KBJW new arrival natural alloy bracelet Beige color cord handmade weaving jewelry personalized accessories', 3.00, 'pictures/a3.jpg', 'accessories', 0),
(16, ' Hat', 'Autumn and winter wool hat for women and men sunscreen hat England style leather octagonal hat Vintage chain beret hat Military style', 20.00, 'pictures/a4.jpg', 'accessories', 0),
(17, 'hair clips', 'Elegant full diamond hair clips for women girls no crease makeup alligator barrettes hair styling tool duckbill biscuit hair clips', 1.00, 'pictures/a5.jpg', 'accessories', 0),
(18, 'sunglasses ', 'imless Y2K sunglasses with star for women and men, men s sunglasses, SIM glasses, shades, one piece, UV400', 2.00, 'pictures/a6.jpg', 'accessories', 0),
(19, 'earrings', 'Cute star dangle earrings for kids birthday party jewelry gift for children macaron rain drop earrings brincos brincos', 0.70, 'pictures/a7.jpg', 'accessories', 0),
(20, 'earrings', '20mm Gold Hoop Earrings for Women Hip Hop Punk Simple Optical Round Circle Stainless Steel Earrings Jewelry', 1.50, 'pictures/a8.jpg', 'accessories', 0),
(21, 'sunglasses ', 'Small rectangle sunglasses women Vintage brand designer square sun glasses for women fashion driving shades Oculos de sol Gafas Hombre', 12.00, 'pictures/a9.jpg', 'accessories', 0),
(22, 'Pearl Necklace,', 'The Pearl Source 14 K White Gold Freshwater Cultured Pearl Necklace, Princess Length 45.7 cm', 2.00, 'pictures/a10.jpg', 'accessories', 0),
(23, 'necklace ', 'Vintage Baroque maple leaf butterfly heart crystal bead chain necklace for women silver plated pendant necklace jewelry', 3.00, 'pictures/a11.jpg', 'accessories', 0),
(24, 'necklace ', 'Vintage Baroque maple leaf butterfly heart crystal bead chain necklace for women silver plated pendant necklace jewelry', 0.50, 'pictures/a12.jpg', 'accessories', 0),
(25, 'necklace ', 'PROSILVER Women s Clavicle Necklace In 925 Sterling Silver Heart / Star / Moon / Bar Minimalist Chain 41 + 5 cm / 1.5 mm', 2.00, 'pictures/a13.jpg', 'accessories', 0),
(26, 'necklace ', 'Cazador minimalist stainless steel double layer heart-shaped beads pendant necklace for women jewelry', 2.00, 'pictures/a14.jpg', 'accessories', 0),
(27, 'necklace ', 'RSTJBH Cross Knot Pendant not Ribbon Chain Cosplay Women Necklace (Length: Other, Metal Color: Style 10)', 1.00, 'pictures/a15.jpg', 'accessories', 0),
(28, 'hair clip', 'Women s Hair Clip 2PCS Large Hair Clip Girls Hairpin Hairpin Keel Clip Shark Clip Hair Accessories Headdress Gift Jewelry Pink', 0.50, 'pictures/a16.jpg', 'shoes', 0),
(29, 'cap', 'Girl s Baseball cap star pattern ponytail snapback hat Hip Hop style fitted hat for men and women multicolor', 2.00, 'pictures/a17.jpg', 'accessories', 0),
(30, 'Handbag', 'This structured bag is synonymous with Diesel s distinctive style and has become a signature accessory. Made of nappa leather, it has a handle that can be worn over the shoulder and an optional belt-shaped strap to carry it over the shoulder. The flap is adorned with an enamelled metal plate emblazoned with the new Oval D logo, which makes it instantly recognizable.\r\n\r\nComposition: 100%Cow Leather\r\nTop handle\r\nRemovable adjustable shoulder strap\r\nMagnetic flap closure\r\nMain compartment with patch pocket\r\nFlat front compartment', 30.00, 'pictures/b2.jpg', 'bags', 0),
(31, 'Handbag', 'New women s mini zipper handbags shoulder messenger bags for phone card holder small purse ', 30.00, 'pictures/b3.jpg', 'bags', 0),
(32, 'Handbag', 'Stylish and practical-cotton bags are not only super practical and eco-friendly, they are now statements and fashion accessories for casual or urban fashion.\r\nIdeal for shopping bags or leisure, parties, festivals or daily life.\r\nMaterial: stable and durable fabric quality, 100% cotton. The long handle also makes it comfortable to carry, and the bag can be worn as a tote bag or over the shoulder.\r\nEco-friendly cotton bags are a natural and sustainable alternative to plastic bags. They are easy to clean and reuse, helping to reduce plastic waste if used frequently.', 10.00, 'pictures/b4.jpg', 'bags', 0),
(33, 'bag', 'DOLCE & GABBANA Beautiful Dolce & Gabbana women s bag with labels, 100% authentic. Model: VANDA evening handbag Material: 61% rayon, 29% silk, 10% leather. Color: golden fur with crystal studs. Strap: removable leather shoulder strap and golden chain. Flap closure Logo details. Made in Italy. Very exclusive and high quality craftsmanship. Dimensions: 22 cm x 13 cm x 4 cm. Strap: 27cm x 2cm/70cm x 2cm', 15.00, 'pictures/b5.jpg', 'bags', 0),
(34, 'Handbag', 'A handbag is a staple piece to finish off any look. So surely our Kenny bag in pink has a place in your wardrobe?! Featuring 2 straps in a faux croc finish. Dress up or down, the choice is yours!\r\n\r\nCOMPOSITION: 100% PU\r\n\r\n', 15.00, 'pictures/b6.jpg', 'bags', 0),
(35, 'Handbag', 'Prada Cleo model handbag in shiny black brushed leather, in perfect condition, with dustbag and certificate of authenticity, measures 27x22 cm\r\n\r\nTranslated by Google', 12.00, 'pictures/b7.jpg', 'bags', 0),
(36, 'bag', 'Butterfly chain shoulder bag for women fashion casual ladies small handbags purse\r\nFeature:\r\nShoulder bag for ladies.\r\nNylon material, butterfly chain design.\r\nFashion, stylish and durable.', 10.00, 'pictures/b9.jpg', 'bags', 0),
(37, 'handbag', 'Rimue Half Crescent Handbags Leather Handbags Shoulder Bags for Girl Women Wear Handbag Underarm Bag Fashionable Armpit Bag Fashion Bag Shoulder Bag', 25.00, 'pictures/b10.jpg', 'bags', 0),
(38, 'Brielle Zip Cardigan', 'A soft knitted slightly cropped zip cardigan. It has a boxy cut, ribbed hems, a high collar, and falls at the hips\r\nLength: Cropped\r\nSleeve length: Long sleeves\r\nDescription: Dark taupe, Plain, Dark taupe', 80.00, 'pictures/p2.jpg', 'clothes', 0),
(39, 'Achlibe Pull ample', 'Women s long-sleeved striped print loose sweater for autumn warm streetwear\r\n\r\nStriped print, round neck, long sleeves, loose fit, elegant and comfortable, loose women s sweater, women s sweater, women s knitted sweaters are the perfect addition to your autumn wardrobe.\r\n\r\nSuitable for daily life, office, outdoor activities, shopping, appointments, parties, street and any other occasion.', 100.00, 'pictures/p3.jpg', 'clothes', 0),
(40, 'Leather blazer', 'Oversized imitation leather blazer. Model with lapel collar, flap pockets and front button closure. Lining in recycled polyester fabric.\r\n\r\nItem Number:0906169002\r\nSize:\r\nSleeve: Length: 61.4 cm (Size M), Waist: Width: 43.6 cm (Size M)\r\nSleeve length: Long sleeves\r\nFit: Oversized\r\nCollar: Notched lapel collar\r\nStyle: Blazer\r\nDescription: Black, Solid color\r\nConcept: EVERYDAY FASHION', 40.00, 'pictures/p4.jpg', 'clothes', 0),
(41, 'Pants', 'WANZ Denim Pants women Hip hop Four Letter stars Embroidery Jeans For Men Streetwear college Casual Straight Pants Washed Light Joggers-13M', 14.00, 'pictures/p5.jpg', 'clothes', 0),
(42, 'Aviator jacket', 'Aviator jacket with collar, cuffs and base in soft and fluffy material. Model with oblique pockets and front zipper closure. Doubled.\r\n\r\nItem Number:1179753001\r\nLength: Regular length\r\nSleeve length: Long sleeves\r\nFit: Regular fit\r\nStyle: Aviator jacket\r\nDescription: Black/white', 20.00, 'pictures/p6.jpg', 'clothes', 0),
(43, 'hoodie', 'woman s denim jacket - Mid-season jacket - Summer jacket - Spring jacket - Autumn jacket - Transition jacket - Biker jacket - woman s transition jacket - Outdoor vest with many pockets - Lightweight vest - Safari vest - Multi-function summer vest - Breathable - Fishing jacket - Leisure jacket - Casual jacket - woman s - Casual jacket - Zipper - Long sleeve collar - Printed collar - Sportswear - Aker Jean windbreaker coat Vintage jeans Winter jacket Solid color casual coats long sleeve warm coat stand-up collar jacket zip pocket fashion coat jean jacket woman s rain jacket woman s rain jacket mid-season jacket woman s hooded jacket woman s hooded jacket hooded jacket with high collar slim fit hoody tops transitional jacket quilted jacket lightweight winter jacket woman s windbreaker lining with stand-up collar quilted jacket outerwear jacket with removable hood elegant winter jacket woman s winter jacket woman s winter jacket vintage frack long steampunk jacket gothic plain jacket Formform Formform Formform M Halloween Costume', 40.00, 'pictures/p7.jpg', 'clothes', 0),
(44, 'CABLE TRIM CHUNKY HAND KNIT CARDIGAN', 'Bring the classics back to your wardrobe with this vintage-style chunky candle knit cardigan. It features all the iconic details you love in a go-sweater including an open front, a cable pattern trimming, and a ribbed detail along the cuffs and hem.\r\n\r\n- Open front\r\n- Handmade chunky knit\r\n- Cable pattern trimming\r\n- Ribbed neck, cuffs and hem\r\n- Knit fabric provides flexibility\r\n- Not lined\r\n- 100% Acrylic\r\n- Hand wash cold', 40.00, 'pictures/p8.jpg', 'clothes', 0),
(45, 'Sleeveless sweater', 'Women sweater vest cute sleeveless sweater V-neck college sweatshirts teenage girls aesthetic clothes\r\nSeason: All season\r\n\r\nGender: Women\r\n\r\nMaterial: Polyester\r\n\r\nDecoration: None\r\n\r\nClothes Length: Regular\r\n\r\nSleeve Length: Sleveeless\r\n\r\nCollar: V-neck', 30.00, 'pictures/p9.jpg', 'clothes', 0),
(46, 'Knitted sweater', 'Glaze V-neck knitted sweater women s autumn preppy style vest sweaters and pullovers slim fit top\r\nMaterial: COTTON\r\nMaterial composition: Mercerized cotton\r\nSleeve length (cm): sleeveless\r\nStyle: Preppy Style\r\nSleeve style: regular\r\nDecoration: Bow\r\nClothing length: regular\r\nCollar: V-neck\r\nPattern Type: Geometric\r\nClosure type: None\r\nPlace of Origin: China (Mainland)\r\nModel Number: None\r\nThickness: STANDARD\r\nAge: 18-35 years old', 25.00, 'pictures/p10.jpg', 'clothes', 0),
(47, 'sweatShirt', 'New spring women s dark green letter printed oversized sweatshirt American retro style o-neck pullover', 10.00, 'pictures/p11.jpg', 'clothes', 0),
(48, 'Wide Leg Pants', 'Fashion Women Wide Leg Pants Casual High Waist Solid Long Trousers Autumn Work Pantalon Loose (Color : Black Size : XXXX-Large) (Black X)', 11.00, 'pictures/p12.jpg', 'clothes', 0),
(49, 'fleece pants', 'Wixra new winter thick warm fleece pants women drawstring sweatpants elastic waist trousers with pockets', 9.00, 'pictures/p13.jpg', 'clothes', 0),
(50, 'jeans', '5-pocket jeans in washed cotton denim. High-waisted model with zip fly topped with a button. Straight and wide legs.\r\nLength: Long\r\nWaist type: High waist\r\nFit: Slim fit\r\nStyle: Straight legs, Wide\r\nDescription: Light denim blue, Plain\r\nConcept: DIVIDED', 9.00, 'pictures/p14.jpg', 'clothes', 0),
(51, 'Vintage Jacket', 'Y2k Harajuku hip hop jacket varsity sports jacket\r\nStyle: Boys or girls with a pink aesthetic.\r\nBoyfriend loose jackets can show a variety of styles\r\nSports jacket\r\nThis long-sleeved varsity bomber jacket is suitable for casual wear, dating, school, college, camping, street wear, sports and outdoor sports.', 40.00, 'pictures/p15.jpg', 'clothes', 0),
(52, 'Vintage Jacket', 'Y2k Harajuku hip hop jacket varsity sports jacket\r\nStyle: Boys or girls with a pink aesthetic.\r\nBoyfriend loose jackets can show a variety of styles\r\nSports jacket\r\nThis long-sleeved varsity bomber jacket is suitable for casual wear, dating, school, college, camping, street wear, sports and outdoor sports.', 30.00, 'pictures/p16.jpg', 'clothes', 0),
(53, 'hoodie', 'Women s hoodie - Zip Up print - Long sleeves - Loose hoodie with pockets - Vintage 90 - For couples - Unisex - Women s tracksuit jacket - Hooded sweatshirt - Hooded sweater - Hooded sweater - Kawaii sweater - Hooded sweater - Gradient color - Hooded blanket - Ultra soft - Comfortable fleece - Women s hoodie - Zip jacket - Gothic skeleton pattern with rhinestones Oversized sweatshirt- Vintage hooded jacket with drawstring - Hooded sweatshirt - Hooded sweater - Flannel\r\n\r\nNsw Phnx Flc Qz Crop\r\n\r\nCutout: Stand-up collar\r\n\r\nBrand: Nike\r\n\r\nCategory: Sweaters\r\n\r\nColor: gray\r\n\r\nManufacturer color: grey\r\n\r\nMaterial Composition: 80% Cotton, 20% Polyester, 3% Elastane\r\n\r\nArt.Nr : DQ5767-00111', 10.00, 'pictures/p17.jpg', 'clothes', 0),
(54, 'jeans', 'Women Straight Ripped Jeans Waist Crossover Classic Relaxed Fit Mid Rise Distressed Comfortable Denim Pants', 13.00, 'pictures/p18.jpg', 'clothes', 0),
(55, 'NIKE W NK ESSENTIAL TIGHT DF 831659-010 Black', 'Women s Nike Essential Running Tights 831659 energize your run with a tight, supportive fit and full-length coverage. Its sweat-wicking technology and adjustable waistband keep you comfortable while you challenge your pace.\r\n\r\nFeatures:\r\n\r\nNike Power fabric provides a range of compression and support\r\nZippered pocket on the center back provides secure storage\r\nWide elastic waistband with a drawcord personalizes your fit\r\nBack pocket has a vapor barrier to help guard items from sweat\r\n', 12.00, 'pictures/p19.jpg', 'clothes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `registration_date`, `isAdmin`) VALUES
(1, 'imane jarrari', 'benjarrariimane@gmail.com', '$2y$10$6vhADLcYj4Tb9Mox9eD8Wu2HqNyDLQ36OZ8FNPWeLqpmpc95ZDwFu', '2023-11-30 11:43:47', 0),
(2, 'Admin', 'Admin1@gmail.com', '$2y$10$9xf/cZzNSSP1q843zxdQf.EwUFCY.3sMovsdKmVi8cMjEtQvni34S', '2023-11-30 16:40:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
