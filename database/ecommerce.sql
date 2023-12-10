-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2023 at 02:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Organics'),
(2, 'Vegetables'),
(3, 'Fruits'),
(4, 'Herbs & Spices'),
(5, 'Salads');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` float(200,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordersproducts`
--

CREATE TABLE `ordersproducts` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `unities` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` float(100,2) NOT NULL,
  `stock` int NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `date`, `image`) VALUES
(1, 1, 'ORGANIC BANANAS', '(approximately 5-7 bananas)\r\n\r\nBananas contain essential nutrients that may enhance heart health, help manage blood pressure, and boost a person\'s mood, among other benefits.', 3.99, 30, '2023-12-10', 'Organicbananas.jpg'),
(2, 1, 'ORGANIC CARROTS', '(Approximately 6-8 carrots)\r\n\r\nThey make a great raw snack, a fresh addition to salads, can be cooked on their own or in savoury dishes, and baked into muffins and cakes.', 5.99, 50, '2023-12-10', 'CARROTS_460x.jpg'),
(3, 1, 'ORGANIC ORANGE KUMARA', 'Kumara are high in Vitamin C and a good source of Vitamin E. Orange kumara are high in Beta-carotene (a form of Vitamin A). They are also a good source of fibre when eaten with the skin on.', 11.99, 40, '2023-12-10', 'OrganicOrangeKumara.jpg'),
(4, 1, 'ORGANIC GOLD KIWIFRUIT', '(Approximately 6-8 kiwifruit)\r\n\r\nReducing tiredness and fatigue; Supporting collagen formation, which is essential for healthy skin, teeth and bones.', 6.99, 45, '2023-12-10', 'SungoldKiwi.jpg'),
(5, 1, 'ORGANIC ORANGES', '(Approximately 4-6 oranges)\r\n\r\nWith high levels of vitamin C, fiber, and antioxidants, organic oranges can support a healthy immune system, aid digestion, and promote healthy skin.', 5.99, 20, '2023-12-10', 'Screenshot2023-09-11110917.jpg'),
(6, 1, 'ORGANIC MANDARINS', '(Approximately 6-8 mandarins)\r\n\r\nMandarins contains Vitamins A, B, and a high level of Vitamin C, a powerful antioxidant that neutralizes free radicals, prevents infections, cramps, and vomiting, and is great for the health of your skin.', 5.99, 40, '2023-12-10', 'mandrains_460x.jpg'),
(7, 1, 'ORGANIC RED KUMARA', ' A good source of antioxidants, Virtually fat-free and a good source of dietary fibre.', 11.99, 60, '2023-12-10', 'RedKumara1KGBag_460x.jpg'),
(8, 1, 'ORGANIC BEETROOTS', 'Approximately 4-6 beetroots\r\n\r\nOrganic beetroot can be grown all year round. Early season organic beetroot can start late November/early December from an early spring planting.', 5.99, 20, '2023-12-10', 'ORGANICBEETROOTS1KGBAG_540x.jpg'),
(9, 1, 'ORGANIC BRAEBURN APPLE', 'Approximately 4-5 apples\r\n\r\nThe organic Braeburn apple is a bi-colored variety, with thin yellow skin covered with a red to orange blush and highlighted with red stripes.', 5.99, 35, '2023-12-10', 'APPLES_540x.jpg'),
(10, 1, 'ORGANIC BROWN ONIONS', '(Approximately 4-7 onions)\r\n\r\nIt is heart-healthy product, prebiotic diuretic, digestive, antioxidant, antidiabetic, anti-cancer and antiseptic, among other things.', 8.99, 25, '2023-12-10', 'ONION_460x.jpg'),
(11, 1, 'RED CAPSICUM', 'Organic Red Capsicum protect the body against infection by encouraging production of white blood cells.', 3.99, 25, '2023-12-10', 'RedCapsicum_460x.jpg'),
(12, 1, 'ORGANIC DATES MEDJOUL', 'It stimulate the immune system, reduce inflammation, prevent DNA damage, and improve hormone regulation.', 26.99, 30, '2023-12-10', 'IMG_0691__002_-removebg-preview_720x.jpg'),
(13, 1, 'ORGANIC GRANNY SMITH APPLE', '(Approximately 4-6 pieces)\r\n\r\nGranny Smith apples can help protect your vision by reducing oxidative stress in the cells of your eye to prevent macular degeneration or cataracts.', 5.99, 30, '2023-12-10', 'granny-smith2_720x.jpg'),
(14, 2, 'CUCUMBER TELEGRAPH', 'Cucumbers are a popular salad vegetable. While low in most nutrients cucumbers are a source of vitamin c and have a high water content.', 2.49, 50, '2023-12-10', 'TELEGRAPHCUCUMBERS.jpg'),
(15, 2, 'BROCCOLI', 'Broccoli is an edible green plant in the cabbage family whose large flowering head, stalk and small associated leaves are eaten as a vegetable.\r\n\r\n \r\n\r\nProduct Of New Zealand', 1.99, 30, '2023-12-10', 'BROCCOLI.jpg'),
(16, 2, 'CAPSICUM RED', 'Red capsicum is more mature than green, orange or yellow capsicum.  Red capsicums tend to be sweeter than the green variety with a mild spicy flavour and are a good source in Vitamin C.', 0.99, 50, '2023-12-10', 'REDCAPSICUM_720x.jpg'),
(17, 2, 'CARROTS', 'Carrots are the perfect snack — crunchy, full of nutrients, low in calories, and sweet.', 2.99, 30, '2023-12-10', 'CARROTS_7ff262eb-65b8-418b-9289-e14298bc140d_720x.jpg'),
(18, 2, 'LETTUCE ICEBERG', 'Red Oak Leaf has loose soft ruffled green or red-flushed leaves that look lovely with other leaves in a tossed salad.', 0.99, 70, '2023-12-10', 'freshcutlettuce_720x.jpg'),
(19, 2, 'TOMATOES', 'Tomatoes form the base of many curries and meals across a lot of cultures around the world. This fruit not only provides flavour to meals but it is also known as a powerful antioxidant. Furthermore, it helps strengthen the heart and prevent constipation.', 2.99, 25, '2023-12-10', 'TOMATOES_51e9f4c4-2037-4ad0-b882-b4f95b6d7811_720x.jpg'),
(20, 2, 'CAULIFLOWER', 'Cauliflower is an excellent blank canvas. You can steam or blanch it to keep its essential flavors intact, but by roasting or sautéing it, you can bring out its sweetness.', 3.99, 75, '2023-12-10', 'CAULIFLOWER_2d57b8b4-c496-45e4-ad15-1ea0ac2b8c40_720x.jpg'),
(21, 2, 'TOMATOES CHERRY', 'Cherry tomatoes are  small but nutrient-dense fruit that are great for snacks, salads, pastas, and more.', 2.99, 50, '2023-12-10', 'CHERRYTOMATOES_720x.jpg'),
(22, 2, 'EGGPLANT', 'The eggplant is a delicate, tropical perennial plant often cultivated as a tender or half-hardy annual in temperate climates.', 0.99, 30, '2023-12-10', 'eggplants_540x.jpg'),
(23, 2, 'ONIONS BROWN', '(approximately 5-7 brown onions)\r\n\r\nBrown onions Great in soups, stews, stir fry\'s, or even a salad.', 2.49, 30, '2023-12-10', 'BROWNONIONS_720x.jpg'),
(24, 2, 'CAPSICUM YELLOW', 'Yellow capsicum can be used raw in salads, marinated and tossed into pasta, cooked and served with rice delicacies.', 0.99, 55, '2023-12-10', 'YELLOWCAPSICUM_720x.jpg'),
(25, 2, 'COURGETTES', 'Courgettes contain the soluble fibre, pectin, which has been found to be effective at reducing bad cholesterol levels.', 1.99, 45, '2023-12-10', 'COURGETTES_930a10a9-8946-4f42-bae3-f0475932d184_720x.jpg'),
(26, 2, 'KUMARA (ORANGE)', 'The gold kumara is both sweeter to the taste and softer in texture than the red. Its flesh and its skin are gold so, peeled or unpeeled, it will add colour to whatever dish you are serving.', 8.99, 30, '2023-12-10', 'kumaraorange_540x.jpg'),
(27, 2, 'POTATOES AGRIA', '(approximately 4 - 8 potatoes)\r\n\r\n A yellow/brown skinned potato with a yellow flesh. Particularly suitable for wedges, roasting and chipping.', 3.49, 25, '2023-12-10', 'AGRIAPOTATOES_844d7d07-9f5f-4d71-9498-e5e0f7660191_720x.jpg'),
(28, 5, 'SALAD SPROUTS', 'Lifts the nutritional content of any meal due to the complex blend of vitamins, enzymes and all-important antioxidants.', 1.89, 30, '2023-12-10', 'alfalfasprouts_460x.jpg'),
(29, 5, 'LETTUCE CAESAR ROMAINE', 'Lifts the nutritional content of any meal due to the complex blend of vitamins, enzymes and all-important antioxidants.', 3.49, 15, '2023-12-10', 'ROMANINECOS_540x.jpg'),
(30, 5, 'TAYLOR FARMS SOUTHWEST CHOPPED SALAD', 'Salad', 4.99, 25, '2023-12-10', 'TAYLORFARMSSTHWSTCHPPD350G_360x.jpg'),
(31, 5, 'TAYLOR FARMS ASIAN CHOPPED SALAD', 'Salad', 5.99, 20, '2023-12-10', 'TAYLORASIANCHOPPED_360x.jpg'),
(32, 5, 'TAYLOR FARM JAPANESE SESAME SLAW', 'Salad', 5.99, 30, '2023-12-10', 'japaneseslaw_720x.jpg'),
(33, 5, 'TAYLOR FARM CHOPPED AVOCADO SALAD', 'Salad', 4.99, 30, '2023-12-10', 'TAYLORCHOPPEDAVOCADO_360x.jpg'),
(34, 5, 'TAYLOR FARM CHOPPED BUFFALO RANCH SALAD', 'Salad', 5.99, 40, '2023-12-10', 'TAYLORFARMCHOPBUFFALO_460x.jpg'),
(35, 5, 'TAYLOR FARMS KALE CHOPPED SALAD', 'Salad', 4.99, 30, '2023-12-10', 'TAYLORFARMSKALECHOPPED250G_360x.jpg'),
(36, 5, 'SALAD VITAL IMMUNITY SLAW', 'Salad', 5.99, 40, '2023-12-10', 'vitalimmunity-slaw_460x.jpg'),
(37, 4, 'SALADS CORIANDER', 'Herb', 2.99, 10, '2023-12-10', 'CORIANDER_720x.jpg'),
(38, 4, 'CHILLIES RED', 'Red chillies are hollow, and the pith and seeds are the hottest part. Many red chillies are milder than green chillies.', 2.49, 60, '2023-12-10', 'REDCHILLIES_65fddcab-ff2a-467f-8881-a74f811dc462_720x.jpg'),
(39, 4, 'FENNEL BULB', 'A member of the parsley family, fennel is an oddly shaped, layered bulb with stalks and delicate feathery leaves.', 2.49, 30, '2023-12-10', 'FENNELBULBS_460x.jpg'),
(40, 4, 'HERBS CURRY LEAVES', 'Commonly used as seasoning, this leaf adds a special flavour to every dish. ', 1.99, 30, '2023-12-10', 'CURRYLEAVES_460x.jpg'),
(41, 4, 'HERBS J/F GARLIC CRUSHED', 'Herb', 2.49, 30, '2023-12-10', 'CRUSHEGARLIC185_720x.jpg'),
(42, 4, 'HERBS PARSLEY CURLY', 'Curly Parsley can be used as garnish and flavouring and as a vegetable. ', 2.00, 30, '2023-12-10', 'curlyparsley_720x.jpg'),
(43, 4, 'HERBS PARSLEY ITALIAN', 'Italian parsley has a fresh, clean taste and is versatile in the kitchen and contains a powerhouse of nutrients.', 3.99, 45, '2023-12-10', 'ITALIANFLATPARSLEY_540x.jpg'),
(44, 4, 'HERBS BASIL LARGE POT', 'Basil is a deliciously fragrant, quick growing herb that pairs perfectly with tomatoes, garlic and lemon.', 3.99, 50, '2023-12-10', 'BASILPOT_460x.jpg'),
(45, 4, 'CHILLIES GREEN', 'Green Chillies are versatile and may be used raw or cooked. ', 2.49, 30, '2023-12-10', 'GREENCHILLIES_d1db9f1c-4c03-4f6f-9148-2d56ed379327_720x.jpg'),
(46, 4, 'HERBS J/F GINGER', 'Herb', 2.49, 15, '2023-12-10', 'GINGERGARLICMIX380_540x.jpg'),
(47, 3, 'BANANAS', '(approximately 5-7 bananas)\r\n\r\nBananas contain essential nutrients that may enhance heart health, help manage blood pressure, and boost a person\'s mood, among other benefits.', 2.99, 30, '2023-12-10', 'RIPEBANANA_540x.jpg'),
(48, 3, 'AVOCADO', 'Avocados are a good source of fiber, low in total carbohydrate, and rich in monounsaturated fats.', 0.79, 50, '2023-12-10', 'Avocado_540x.jpg'),
(49, 3, 'STRAWBERRIES', 'Red berries are a rich source of vitamin C, which boosts the immune system and promotes healthy skin. They are also high in fiber, aiding in digestion and promoting a feeling of fullness. Strawberries are low in calories and fat, making them a great addition to a balanced diet. ', 4.00, 70, '2023-12-10', 'STRAWBERRIES_540x.jpg'),
(50, 3, 'MANDARINS', '(approximately 5-8 mandarins)\r\n\r\nMandarins taste is considered sweeter and stronger than the common orange. A ripe mandarin is firm to slightly soft, heavy for its size, and pebbly-skinned.', 4.99, 35, '2023-12-10', 'MANDARINS_460x.jpg'),
(51, 3, 'BLUEBERRIES', 'Blueberries are considered a superfood, and can help maintain healthy bones, reduce blood pressure, manage diabetes, and ward off heart disease.', 4.99, 90, '2023-12-10', 'Blueberries_540x.jpg'),
(52, 3, 'PEARS PACKHAM', '(approximately 4-7 packham pears)\r\n\r\nPackham pears have juicy white flesh. They are rich in flavour, too, so are great eaten solo, baked in tarts, or poached and infused.', 5.99, 35, '2023-12-10', 'PACKHAMPEARS_720x.jpg'),
(53, 3, 'KIWIFRUIT GOLD', 'Delightfully sweet with a tropical touch: gold kiwifruit have a unique, surprising flavour.', 5.99, 60, '2023-12-10', 'KIWIFRUITGOLD_b93f4137-784d-41ac-8afb-f178dd979f65_720x.jpg'),
(54, 3, 'APPLES ROYAL GALA', '(approximately 5-6 apples)\r\n\r\nThe Royal Gala variety is sweet and juicy apple with firm white flesh. It has a distinctive crunch when you bite it. It is best for eating as a healthy snack or dessert. The Royal Gala is also good for fruit salad, cooking and making juice.', 5.99, 80, '2023-12-10', 'ROYALGALAAPPLE_460x.jpg'),
(55, 3, 'PINEAPPLE', 'Pineapple is an incredibly delicious, healthy tropical fruit. It\'s packed with nutrients and antioxidants.', 4.99, 30, '2023-12-10', 'PINEAPPLE_460x.jpg'),
(56, 3, 'KIWIFRUIT GREEN', 'Green kiwifruit is refreshing, juicy and full-flavoured. It\'s a tasty portable treat that provides a vitamin boost at the same time.', 5.99, 35, '2023-12-10', 'greenkiwifruit_460x.jpg'),
(57, 3, 'LEMONS', 'The lemon is a bright yellow citrus fruit. It has its distinctive sour taste because it\'s rich in citric acid. ', 7.99, 40, '2023-12-10', 'lemons_720x.jpg'),
(58, 3, 'MANGO', 'Mango is rich in vitamins, minerals, and antioxidants, and it has been associated with many health benefits.', 7.00, 45, '2023-12-10', 'mango_540x.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(2, 'Mahdi', 'Mesfar', 'mahdimesfar1@gmail.com', '$2y$04$apRYe0soAwSOCShjJ9GvKeHMZ5lanni/37jHmbhsqQovEO0RZyU0.', 'admin'),
(3, 'Mohamed', 'Ben Salah', 'mohamedbensalah@gmail.com', '$2y$04$huSMZj0JD5aNJAOI632YPes/oFMdyAdUc6XVK7OM46IkiWMS4UwnO', 'user'),
(5, 'Mariem', 'Mesfar', 'mariem.mesfar@mes.tn', '$2y$04$56qc.5OMj1QDAJwdCmGOU.D6k5QFOHe4BaSqJvy5zPpOoFsIVV8SK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_users` (`user_id`);

--
-- Indexes for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`order_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
