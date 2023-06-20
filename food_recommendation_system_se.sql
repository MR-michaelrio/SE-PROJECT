-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2023 at 02:29 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_recommendation_system_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` bigint(20) UNSIGNED NOT NULL,
  `bundle_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bookmark_id`, `bundle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, '2023-06-14 16:19:12', '2023-06-14 16:19:12'),
(3, 2, 2, '2023-06-14 16:19:32', '2023-06-14 16:19:32'),
(4, 1, 6, '2023-06-17 04:22:49', '2023-06-17 04:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `bundle`
--

CREATE TABLE `bundle` (
  `bundle_id` bigint(20) UNSIGNED NOT NULL,
  `bundle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bundle_publishdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bundle`
--

INSERT INTO `bundle` (`bundle_id`, `bundle_name`, `bundle_publishdate`, `created_at`, `updated_at`) VALUES
(1, 'EGGLESS DIET', '2023-06-04', NULL, NULL),
(2, 'testbundle', '2023-06-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bundle_list`
--

CREATE TABLE `bundle_list` (
  `bundlelist_id` bigint(20) UNSIGNED NOT NULL,
  `publish_id` bigint(20) UNSIGNED NOT NULL,
  `bundle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bundle_list`
--

INSERT INTO `bundle_list` (`bundlelist_id`, `publish_id`, `bundle_id`, `created_at`, `updated_at`) VALUES
(16867577179091, 37, 1, '2023-06-14 15:48:37', '2023-06-14 15:48:37'),
(16867586324029, 22, 2, '2023-06-14 16:03:52', '2023-06-14 16:03:52'),
(16869062369341, 30, 1, '2023-06-16 09:03:56', '2023-06-16 09:03:56'),
(16869072202756, 19, 2, '2023-06-16 09:20:20', '2023-06-16 09:20:20'),
(16869507086682, 12, 2, '2023-06-16 21:25:08', '2023-06-16 21:25:08'),
(16869507159610, 30, 2, '2023-06-16 21:25:15', '2023-06-16 21:25:15'),
(16869507234882, 31, 2, '2023-06-16 21:25:23', '2023-06-16 21:25:23'),
(16869727859006, 36, 1, '2023-06-17 03:33:05', '2023-06-17 03:33:05'),
(16869727894224, 26, 1, '2023-06-17 03:33:09', '2023-06-17 03:33:09'),
(16869757246374, 30, 1, '2023-06-17 04:22:04', '2023-06-17 04:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'test1234', NULL, NULL),
(2, 'Lactose intolerance', NULL, NULL),
(3, 'Vegetarianism', NULL, NULL),
(4, 'Veganism', NULL, NULL),
(5, 'Halal', NULL, NULL),
(6, 'Gluten sensitivity', NULL, NULL),
(7, 'Keto', NULL, NULL),
(8, 'Diabetes', NULL, NULL),
(9, 'No dairy', NULL, NULL),
(10, 'Low carb', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_02_172229_create_category_table', 1),
(6, '2023_06_02_172311_create_recipe_table', 1),
(7, '2023_06_02_172642_create_recipe_publish_table', 1),
(8, '2023_06_02_172829_create_bundle_table', 1),
(9, '2023_06_02_172913_create_bundle_list_table', 1),
(10, '2023_06_02_173044_create_mybundle_table', 1),
(11, '2023_06_02_174107_create_bookmark_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mybundle`
--

CREATE TABLE `mybundle` (
  `mybundle_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bundlelist_id` bigint(20) UNSIGNED NOT NULL,
  `Bundle_privacy` enum('off','on') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mybundle`
--

INSERT INTO `mybundle` (`mybundle_id`, `user_id`, `bundlelist_id`, `Bundle_privacy`, `created_at`, `updated_at`) VALUES
(1, 2, 16867577179091, 'on', '2023-06-14 15:48:37', '2023-06-17 03:06:30'),
(2, 2, 16867586324029, 'off', '2023-06-14 16:03:52', '2023-06-17 03:06:29'),
(3, 2, 16869062369341, 'on', '2023-06-16 09:03:56', '2023-06-17 03:06:30'),
(4, 2, 16869072202756, 'off', '2023-06-16 09:20:20', '2023-06-17 03:06:29'),
(5, 2, 16869507086682, 'off', '2023-06-16 21:25:08', '2023-06-17 03:06:29'),
(6, 2, 16869507159610, 'off', '2023-06-16 21:25:15', '2023-06-17 03:06:29'),
(7, 2, 16869507234882, 'off', '2023-06-16 21:25:23', '2023-06-17 03:06:29'),
(8, 6, 16869727859006, 'on', '2023-06-17 03:33:05', '2023-06-17 03:33:14'),
(9, 6, 16869727894224, 'on', '2023-06-17 03:33:09', '2023-06-17 03:33:14'),
(10, 6, 16869757246374, 'off', '2023-06-17 04:22:04', '2023-06-17 04:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_equipment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_steps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_tips` text COLLATE utf8mb4_unicode_ci,
  `recipe_picture` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_name`, `recipe_ingredients`, `recipe_equipment`, `recipe_steps`, `recipe_tips`, `recipe_picture`, `category_id`, `created_at`, `updated_at`) VALUES
(16866522224152, 'Chicken Zucchini Noodle Soup', '4 cups (1L) salt-reduced chicken stock, 500g Coles RSPCA Approved Australian Chicken Thigh Fillets, trimmed., 3 thyme sprigs, 2 small carrots, peeled, thinly sliced., 2 celery sticks, thinly sliced., 1 corn cob, husks and silk removed, kernels removed., 2 medium zucchini, cut lengthways into long noodles., Thyme sprigs, extra, to serve, Lemon wedges, to serve (optional), ', 'Large saucepan, Tongs, 2 Forks, Pan, Bowls, ', 'In a large saucepan, combine stock, chicken, thyme, and 1 1/2 tsp salt., Bring to the boil over medium-high heat., Reduce heat to medium-low., Bring to a simmer., Partially cover and cook for 20 mins or until the chicken is cooked through and pulls apart easily., Using tongs, transfer the chicken to a bowl and cool slightly., Use two forks to coarsely shred the chicken., While the chicken is cooling, add carrots and celery to pan and simmer for 5 mins or until the vegetables are crisp-tender., Add corn and simmer for 2 mins or until tender., Return chicken to pan and stir until heated through., Divide zucchini among serving bowls., Ladle the soup over the zucchini in the bowls., Top with extra thyme. Season. Serve with lemon wedges, if desired., ', '', '1686652222.jpg', 5, '2023-06-13 10:30:22', '2023-06-13 10:30:22'),
(16866533819316, 'Chicken Zucchini Noodle Soup', 'hello, ', 'hi, ', 'hello, ', '', '1686653381.jpg', 5, '2023-06-13 10:49:41', '2023-06-13 10:49:41'),
(16866533828264, 'OVERNIGHT OATS', 'Yogurt, ', '', '', '', '1686653382.jpg', 3, '2023-06-13 10:49:42', '2023-06-13 10:49:42'),
(16866536464440, 'OVERNIGHT OATS', 'Yogurt, Milk, Chia seeds, Rolled oats, Maple syrup', 'Jar, Spoon, Fridge', 'In the jar, stir together the oats, milk, yogurt, chia seeds, and maple syrup., Place the jar in the fridge to let the oats soak for at least 2 hours, though overnight is best., The next morning, you can add your favourite toppings and enjoy.', '', '1686653646.jpg', 3, '2023-06-13 10:54:06', '2023-06-13 10:54:06'),
(16866538261771, 'Vegan Super Soup', '60ml (1/4 cup) extra virgin olive oil., 1 red onion, finely chopped., 1 leek, trimmed, halved lengthways, thinly sliced., 1 celery stick, trimmed, coarsely chopped., 1 large carrot, peeled, coarsely chopped., 3 garlic cloves, finely chopped., 350g sweet potato, peeled, cut into 2cm pieces., 1.5L (6 cups) Massel Liquid Stock Vegetable., 220g (1 cup) pearl barley, rinsed., 2 fresh bay leaves., 2 large fresh rosemary sprigs., 2 cups loosely packed purple kale leaves, torn., 60g (1/3 cup) blanched almonds, toasted., 1 garlic clove, finely chopped., 1 1/2 cups fresh basil leaves., 100ml extra virgin olive oil., ', 'Large saucepan, Food processor, Bowls, ', 'Heat the oil in a large saucepan over high heat., Add the onion. Reduce heat to medium-low., Cook, stirring often, for 5 minutes or until soft., Add the leek, celery, carrot, and garlic., Cook, stirring often, for 15 minutes or until the vegetables are soft but not golden., Increase heat to high., Add the sweet potato and stir to coat., Add the stock, 1L (4 cups) water, barley, bay leaves, and rosemary. Bring to the boil., Reduce heat to low and simmer, stirring occasionally, for 40 minutes or until the soup is thick and the barley is tender. Taste and season., While the soup is cooking, make the pistou., Process the almonds and garlic in a small food processor until coarsely chopped., Add the basil, a large pinch of sea salt flakes and half of the oil., Process until nearly smooth., Transfer to a bowl and stir in the remaining oil., Cover and set aside until needed., Stir the kale through the soup and cook until just wilted., Dollop the soup with the pistou., ', '', '1686653826.jpg', 4, '2023-06-13 10:57:06', '2023-06-13 10:57:06'),
(16866541392624, 'Keto Egg Roll Wrap', '1 tablespoon sesame oil, 12 ounces ground pork, 3 tablespoon fresh ginger, grated, 3 teaspoon fresh garlic, minced, 1 1/2 cup green cabbage, shredded, 1/4 cup carrot, shredded, 1/4 cup gluten free soy sauce, 8 large eggs, 1/2 teaspoon salt, 1 teaspoon avocado oil', 'Frying pan, Stove, Bowl, Whisk, Spoon', 'In a frying pan over medium heat, add the sesame oil along with the ground pork, grated ginger, and minced garlic., Stir together and break up the meat until the pork starts to brown., Add the shredded cabbage, shredded carrots, and gluten free soy sauce. Stir together and let cook for 3-5 minutes., In a large bowl, crack the eggs. Season with salt., Whisk them together until they are combined well., In a frying pan over medium heat, add the avocado oil. Pour the egg mixture in until it fills up the pan. Let this sit and cook for about 1-2 minutes., Carefully flip over the egg wrap and let this side cook for 1-2 minutes. Move to a plate., Spoon the pork and vegetable mixture onto the egg wrap., Carefully roll the egg wrap like a burrito. Roll it over the pork then tuck both sides in and continue to roll.', '', '1686654139.jpg', 7, '2023-06-13 11:02:19', '2023-06-13 11:02:19'),
(16866542536357, 'Anzac Day Digger\'s Beef Stew', '100ml olive oil., 1kg beef chuck steak or beef shin, cut into 4-5cm pieces., plain flour, for dusting about 200g., salt and freshly ground pepper., 400g carrots, peeled and cut into 2cm dice., 400g onion, peeled and cut into 2cm dice., 300g celery, cut into 2cm dice., 400g parsnips, peeled and cut into 2cm dice., 2 cloves garlic, peeled and chopped finely., 1 sprig fresh thyme., 400g potato, peeled and cut into 2cm dice., 500ml dark beer (not stout)., 1 liter Massel beef stock., 300g button mushrooms, quartered., Damper bread, to serve., ', 'Saucepan, Pot, ', 'Heat a 30-40cm heavy saucepan with the oil., Dust the meat with the seasoned flour and saute until lightly browned., Add in the carrots, onion, celery, parsnips, garlic and thyme and cook for 10 minutes., Add the potato then deglaze the pan with the beer., Add the stock, it should cover the ingredients by 2cm., Slowly bring the pot to a boil, then reduce the heat and simmer for 1.5 to 2 hours or until the meat is tender., Add the mushrooms and cook for another 10 minutes., Adjust the seasoning and serve with fresh, warm damper., ', '', '1686654253.jpg', 5, '2023-06-13 11:04:13', '2023-06-13 11:04:13'),
(16866543392836, 'Keto Green Smoothie', '3/4 cup unsweetened almond milk, 30 grams low carb protein powder, 1/2 medium avocado, 1 cup spinach, 6 medium fresh mint, leaves, 2 tablespoon unsweetened toasted coconut flakes, for garnish', 'Blender, Glass', 'In a blender, combine all the ingredients except the coconut flakes., Pulse the blender until you achieve desired consistency or until smooth., Pour into a glass., Top the green smoothie with toasted coconut flakes.', 'This makes a total of 2 servings of Keto Green Smoothie. Each serving comes out to be 178 calories, 11.1g fat, 2.4g net carbs, and 13.9g protein.', '1686654339.jpg', 7, '2023-06-13 11:05:39', '2023-06-13 11:05:39'),
(16866546153150, 'KETO MUSHROOM SOUP', '20 ounces of mushrooms, sliced, 1/3 cup olive oil, 1/2 medium onion, chopped, 3 teaspoon fresh garlic, minced, 1/2 cup heavy whipping cream, 4 cup chicken broth, 6 ounces of cream cheese, 1/2 teaspoon cayenne pepper, 1/2 teaspoon thyme, 1/2 teaspoon chicken bouillon cube, Salt and pepper to taste', 'Saucepan, Stove, Bowl', 'In a saucepan over low to medium heat, add the chopped onions and minced garlic to the pan along with olive oil. Cook until fragrant., Add in the sliced mushrooms and season with salt and pepper. Stir to combine well and let cook for about 5 minutes., Pour in the chicken broth and stir to combine well., Add in the chicken bouillon cube, cayenne pepper, and thyme. Stir together. Turn the heat up to medium to high and let it come to a boil. Reduce heat to simmer and let cook for 10 minutes., Pour in the heavy whipping cream and cream cheese and stir to combine well. Let this cook for about 5 minutes and then pulse with an immersion blender to get it smooth., Simmer for another 5 minutes. Taste and adjust seasonings accordingly.', '', '1686654615.jpg', 7, '2023-06-13 11:10:15', '2023-06-13 11:10:15'),
(16866548999982, 'Vegan Pho', '200g dried flat rice noodles, 2 x 200g pkts Thai marinated tofu, 1 bunch choy sum, ends trimmed, cut into 4cm lengths, 100g bean sprouts, Mint leaves, to serve, Coriander leaves, to serve, 4 shallots, peeled, halved, 5cm-piece ginger, peeled, cut into quarters, 1 cinnamon stick or quill, 2 whole star anise, 6 whole cloves, 1 tsp black peppercorns, 1 large carrot, peeled, halved, 3/4 cup (20g) dried sliced shiitake mushrooms, 4 cups (1L) Coles Vegan Chicken Style Stock, 2 tbsp soy sauce', 'Pan, Slow Cooker, Slotted Spoon, Large Heat Proof Bowl', 'To make the pho broth, place the shallot and ginger in a frying pan over medium-high heat., Cook, stirring occasionally, for 3 mins or until browned., Add cinnamon, star anise, cloves and peppercorns and cook, stirring, for 1 min or until aromatic., Transfer to a slow cooker., Add carrot, mushroom, stock and 4 cups (1L) water. Cover and cook for 4 hours on high  (or 6 hours on low)., Use a slotted spoon to remove the shallot, ginger, cinnamon and star anise. Discard. Remove carrot. Slice and return to the slow cooker., Stir in the soy sauce., Place noodles in a large heatproof bowl and cover with boiling water., Set aside for 5 mins to soak. Drain., Add the tofu, noodles and choy sum to the slow cooker., Cover and cook for 10 mins or until heated through., Divide the noodle mixture among serving bowls., Top with bean sprouts, mint and coriander., ', 'To make this without a slow cooker, cook the broth, covered, in a saucepan over low heat for 1 hour, stirring occasionally. Add noodles, choy sum and tofu. Cook for 10 mins.', '1686654899.jpg', 4, '2023-06-13 11:14:59', '2023-06-13 11:14:59'),
(16866549716439, 'NO-BAKE BANANA SPLIT CAKE', '2 c. graham cracker crumbs, 1 c. (2 sticks) unsalted butter, 8 oz. cream cheese, softened, 2 c. confectioners\' sugar, Pinch salt, 4 bananas, 1 (20 oz.) can crushed pineapple, well drained, 1 (8 oz.) container Cool Whip non-dairy whipped topping (or homemade whipped cream), 1/3 c. chopped pecans, 1 (10 oz.) jar maraschino cherries, drained & patted dry with a paper towel', 'Bowl, Spoon, Whisk, Electric mixer, Fork, Knife, Refrigerator', 'Melt 1/2 cup butter (1 stick) and blend in graham cracker crumbs with a fork until evenly moistened. Press into the bottom of a 9x13\" pan., With an electric mixer, blend remaining 1/2 cup (1 stick) butter with cream cheese, confectioners\' sugar, and salt. beat 3 to 4 minutes until fluffy. Spread mixture over graham cracker crumbs., Slice bananas and arrange evenly over cream cheese mixture, top with crushed pineapple. Spread Cool Whip on top of pineapple, sprinkle with chopped pecans and place cherries on top., Cover and refrigerate at least 2 to 3 hours, or overnight, before serving.', '', '1686654971.jpg', 9, '2023-06-13 11:16:11', '2023-06-13 11:16:11'),
(16866551483446, 'CHURROS', 'Water, Sugar, Salt, Oil, Flour, Cinnamon', 'Pastry bag, Saucepan, Deep fryer', 'Boil water, sugar, salt, and vegetable oil. Remove from the heat, then stir in flour, Transfer the dough to a pastry bag and pipe into strips, Fry the strips in hot oil until they are golden, Drain the churros, then roll in cinnamon-sugar', '', '1686655148.jpg', 9, '2023-06-13 11:19:08', '2023-06-17 03:01:44'),
(16866551873758, 'Vegan Pho', '200g dried flat rice noodles, 2 x 200g pkts Thai marinated tofu, 1 bunch choy sum, ends trimmed, cut into 4cm lengths, 100g bean sprouts, Mint leaves, to serve, Coriander leaves, to serve, 4 shallots, peeled, halved, 5cm-piece ginger, peeled, cut into quarters, 1 cinnamon stick or quill, 2 whole star anise, 6 whole cloves, 1 tsp black peppercorns, 1 large carrot, peeled, halved, 3/4 cup (20g) dried sliced shiitake mushrooms, 4 cups (1L) Coles Vegan Chicken Style Stock, 2 tbsp soy sauce, ', 'Pan, Slow cooker, Slotted spoon, Heatproof bowl, ', 'To make the pho broth, place the shallot and ginger in a frying pan over medium-high heat., Cook, stirring occasionally, for 3 mins or until browned., Add cinnamon, star anise, cloves and peppercorns and cook, stirring, for 1 min or until aromatic., Transfer to a slow cooker. Add carrot, mushroom, stock and 4 cups (1L) water., Cover and cook for 4 hours on high (or 6 hours on low)., Use a slotted spoon to remove the shallot, ginger, cinnamon and star anise. Discard. Remove carrot. Slice and return to the slow cooker., Stir in the soy sauce., Place noodles in a large heatproof bowl and cover with boiling water. Set aside for 5 mins to soak. Drain., Add the tofu, noodles and choy sum to the slow cooker., Cover and cook for 10 mins or until heated through., Divide the noodle mixture among serving bowls., Top with bean sprouts, mint and coriander., ', 'To make this without a slow cooker, cook the broth, covered, in a saucepan over low heat for 1 hour, stirring occasionally. Add noodles, choy sum and tofu. Cook for 10 mins.', '1686655187.jpg', 4, '2023-06-13 11:19:47', '2023-06-13 11:19:47'),
(16866554222757, 'CARROT CAKE', '6 cups grated carrots, 1 cup brown sugar, 1 cup raisins, 4 eggs, 1 ½ cups white sugar, 1 cup vegetable oil, 2 teaspoons vanilla extract, 1 cup crushed pineapple, drained, 3 cups all-purpose flour, 4 teaspoons ground cinnamon, 1 ½ teaspoons baking soda, 1 teaspoon salt, 1 cup chopped walnuts', 'Bowls, Cake pans, Oven, Toothpick', 'Combine grated carrots and brown sugar in a medium bowl. Let sit for 1 hour, then stir in raisins., Preheat the oven to 350 degrees F (175 degrees C). Grease and flour two 10-inch round cake pans., Beat eggs in a large bowl until light. Gradually beat in white sugar, oil, and vanilla. Stir in pineapple. Combine flour, cinnamon, baking soda, and salt in a separate bowl, then stir into egg mixture until absorbed. Stir in carrot mixture and walnuts. Pour evenly into the prepared pans., Bake in the preheated oven until an inserted toothpick comes out clean, 45 to 50 minutes. Cool for 10 minutes before removing cake layers from the pans; let cool completely.', '', '1686655422.jpg', 9, '2023-06-13 11:23:42', '2023-06-13 11:23:42'),
(16866556894766, 'Chocolate-Peanut Butter Nice Cream Sandwiches', '2 large bananas, sliced and frozen, ⅓ cup natural peanut butter, 3 tablespoons oat milk or other non-dairy milk, such as almond, plus more if needed, ⅓ cup mini non-dairy chocolate chips, 12 chocolate graham cracker sheets (6 1/2 ounces)', 'Bowl, Blender, Refrigerator', 'Place frozen bananas, peanut butter and 3 tablespoons oat milk in a blender. Blend on High until smooth, adding more milk, 1 tablespoon at a time, if needed to reach a creamy consistency. Transfer the mixture to a medium bowl. Fold in chocolate chips. Freeze until the mixture is semi-firm, about 30 minutes., Break graham cracker sheets in half. Spread 2 tablespoons banana mixture evenly on 1 half: top with the other half. Repeat with the remaining graham crackers and banana mixture. Freeze in a covered container until firm, about 2 hours.', '', '1686655689.jpg', 8, '2023-06-13 11:28:09', '2023-06-13 11:28:09'),
(16866557542318, 'Vegetarian San Choy Bow', '1 tbsp vegetable oil, 400g pkt plant-based mince, 1/3 cup (100g) red curry paste, 2 tbsp vegetable stock, 200g broccoli, cut into small florets, 1 red capsicum, seeded, finely chopped, 3 celery sticks, finely chopped, 3 spring onions, thinly sliced, 1/3 cup coriander leaves, 12 small iceberg lettuce leaves, 1 cup bean sprouts, 1/4 cup (20g) flaked almonds, toasted, ', 'Large non-stick frying pan, Wooden spoon, ', 'Heat half the oil in a large non-stick frying pan over medium-high heat., Add the mince and cook, stirring with a wooden spoon to break up lumps, for 10 mins or until browned, adding remaining oil halfway through cooking., Add the curry paste to pan. Cook, stirring, for 2 mins or until aromatic., Add stock, broccoli, capsicum and celery. Cook for 3 mins or until broccoli is tender. Season. Add spring onion and half the coriander and toss to combine., Divide the mince mixture evenly among the lettuce leaves., Arrange the bean sprouts, almond and remaining coriander over the mince mixture to serve., ', '', '1686655754.jpg', 3, '2023-06-13 11:29:14', '2023-06-13 11:29:14'),
(16866558576396, 'Gluten-Free S’mores Bars', 'Gluten-free graham crackers, Baking powder, Salt, Gluten-free flour, Brown and white sugar, Marshmallow crème, Chocolate, Egg, Vanilla, Butter', 'Oven, Parchment paper, Bowls, Mixer, Baking pan', 'Preheat the oven to 350F. Line an 8×8-inch baking dish with parchment paper., In the bowl of a stand mixer (or in a large bowl with an electric hand mixer), add the butter, granulated sugar, and brown sugar. Cream together until well-mixed, 2-3 minutes., Add the egg and vanilla extract and mix until combined., Add the gluten-free flour, baking powder and salt. Mix on low speed until totally combined, scraping down the bowl once halfway through., Stir in the gluten-free graham cracker crumbs., Press 1/2 of the dough into the bottom of the parchment-lined baking pan. Lift out the parchment with the dough on it and set it aside – this will be your top cookie layer., Line the pan with parchment again and press the remaining dough into the bottom of the pan. Top the cookie base with the chocolate bars., Spread the marshmallow creme over the top of the chocolate. Flip the top cookie layer on top of the gooey marshmallows layer., Bake for 25-30 minutes, or until golden brown. Let cool completely for best serving results. Enjoy!', '', '1686655857.jpg', 6, '2023-06-13 11:30:57', '2023-06-13 11:30:57'),
(16866561095418, 'EGG MUFFINS', '1 tbsp oil, 150g broccoli, finely chopped, 1 red pepper, finely chopped, 2 spring onions, sliced, 6 large eggs, 1 tbsp milk, Large pinch of smoked paprika, 50g cheddar or gruyère, grated, Small handful of chives, chopped (optional)', 'Whisk, Oven, Frying pan, Muffin tin, Brush, Bowl', 'Heat the oven to 200C/180C fan/gas 4. Brush half the oil in an 8-hole muffin tin. Heat the remaining oil in a frying pan and add the broccoli, pepper, and spring onions. Fry for 5 mins. Set aside to cool., Whisk the eggs with the milk, smoked paprika and half the cheese in a bowl. Add the cooked veg. Pour the egg mixture into the muffin holes and top each with the remaining cheese and a few chives, if you like. Bake for 15-17 mins or until golden brown and cooked through.', '', '1686656109.jpg', 6, '2023-06-13 11:35:09', '2023-06-13 11:35:09'),
(16866562646499, 'Dairy-free pea and leek soup recipe', '2 leeks, pale section only,thickly sliced, 1 large washed potato, peeled, coarsely chopped, 4 cups (1L) Massel Vegetable Stock, 500g pkt frozen peas, 2 tbsp lemon juice, ', 'Large saucepan, Stick blender, ', 'Combine the leek, potato and stock in a large saucepan. Place over high heat., Bring to the boil. Reduce heat to medium and cook, partially covered, for 20 mins or until potato is tender., Reserve 1 cup (120g) peas. Add the remaining peas to the pan and bring to a simmer. Set aside to cool slightly., Use a stick blender to carefully blend the pea mixture until smooth., Return pan to medium heat. Add the lemon juice and reserved peas., Stir until heated through., Season well. Divide the soup evenly among serving bowls., ', '', '1686656264.jpg', 9, '2023-06-13 11:37:44', '2023-06-13 11:37:44'),
(16866564013924, 'tuna, avocado & quinoa salad', '100g quinoa, 3 tbsp extra virgin olive oil, juice 1 lemon, ½ tbsp white wine vinegar, 120g can tuna, drained, 1 avocado, stoned, peeled, and cut into chunks, 200g cherry tomatoes on the vine, halved, 50g feta, crumbled, 50g baby spinach, 2 tbsp mixed seeds, toasted', 'Saucepan, Bowl, Jug', 'Rinse the quinoa under cold water. Tip into a saucepan, cover with water and bring to the boil. Reduce the heat and simmer for 15 mins until the grains have swollen but still have some bite. Drain, then transfer to a bowl to cool slightly., Meanwhile, in a jug, combine the oil, lemon juice and vinegar with some seasoning., Once the quinoa has cooled, mix with the dressing and all the remaining ingredients and season.', '', '1686656401.webp', 6, '2023-06-13 11:40:01', '2023-06-13 11:40:01'),
(16866565609244, 'Mixed Berries and Banana Smoothie', '1 cup frozen mixed berries, 1 frozen ripe banana, 1/2 cup low-fat vanilla yogurt, 1/4 cup orange juice, 1 teaspoon honey (optional), ', 'Blender, ', 'Combine all ingredients together in a blender and puree until smooth., ', '', '1686656560.jpg', 2, '2023-06-13 11:42:40', '2023-06-13 11:42:40'),
(16866565747605, 'Beef & Broccoli Noodles', '2 heads broccoli, florets separated (2 c.) and stems peeled, 1/4 c. hoisin sauce, 1/4 c. fresh-squeezed orange juice, 2 tbsp. reduced-sodium soy sauce, 2 (5 oz. each) sirloin steaks, 1\" thick, Kosher salt, Cooking spray, 1 tsp. sesame oil, 1/4 large white onion, sliced thin, 3 cloves garlic, minced, 1 tbsp. fresh ginger, minced', 'Bowls, Whisk, Refrigerator, Pot, Non-stick skillet, Saucepan, Spiralizer (optional)', 'If using a spiralizer, spiralize the broccoli stems. If not, cut into ⅛\"-thick planks, then slice into “noodles.”, In a large bowl, whisk hoisin, orange juice, and soy sauce. Add steaks, cover, and refrigerate for 2 hours., While steaks are marinating, bring a large pot of salted water to a boil and create an ice bath in a large bowl. Boil broccoli florets for about 2 to 3 minutes or until bright green and just tender. Transfer broccoli to the ice bath until cool, then drain., Remove steaks from the refrigerator and transfer to a plate. Leave the marinade in the bowl., Heat a large non-stick skillet over high heat and grease with cooking spray. When hot, cook the steaks for about 3 minutes on each side (for medium-rare) or until a thermometer reads 130º in the thickest part of the steaks. Transfer steaks to a cutting board to let rest for 10 minutes, then slice into thin strips., In a small saucepan over medium-low heat, bring reserved marinade to a boil and simmer until slightly thickened, 2 to 3 minutes., Add sesame oil to skillet over medium heat. Add onions, garlic, and ginger and cook on high, 1 to 2 minutes. Add broccoli noodles, season with salt, and cook for about 3 minutes. Add blanched florets and cook until hot, then add the thickened marinade and toss to coat., Divide the noodles between 2 plates. Top with sliced steaks and serve.', '', '1686656574.jpg', 10, '2023-06-13 11:42:54', '2023-06-13 11:42:54'),
(16866567024165, 'Turkey Taco Lettuce Wraps', '2 tbsp. extra-virgin olive oil, 1 small yellow onion, chopped, 1 lb. ground turkey, 1 tsp. kosher salt, 1 tbsp. tomato paste, 1 tbsp. chili powder, 1 c. low-sodium chicken broth, 2 heads romaine lettuce, outer leaves separated, Shredded Mexican cheese, Chopped tomatoes, Chopped red onion, Chopped avocado or guacamole, Freshly chopped cilantro', 'Skillet, Spoon', 'Heat oil in a large skillet over medium-high. Add onion and cook until just soft, about 5 minutes. Add turkey and season with salt. Cook, breaking up meat with the side of a spoon, until meat is cooked through, 4 minutes., Stir in tomato paste and chili powder and cook 1 minute. Add broth and simmer, stirring occasionally, until thickened, about 2 minutes more., Double up lettuce leaves. Divide meat mixture among leaves. Sprinkle with cheese, tomato, onion, avocado, and cilantro and serve.', '', '1686656702.jpg', 10, '2023-06-13 11:45:02', '2023-06-13 11:45:02'),
(16866568006339, 'Cheesy Mushroom Omelette', '1 tbsp olive oil, Handful button or chestnut mushrooms, sliced, 25g vegetarian cheddar, grated, Small handful parsley leaves, roughly chopped, 2 eggs, beaten, chicken', 'Non-stick frying pan, Bowl, Fork & Spoon, Spatula or palette knife', 'Heat the olive oil in a small non-stick frying pan. Tip in the mushrooms and fry over a high heat, stirring occasionally for 2-3 mins until golden. Lift out of the pan into a bowl and mix with the cheese and parsley., Place the pan back on the heat and swirl the eggs into it. Cook for 1 min or until set to your liking, swirling with a fork now and again., Spoon the mushroom mix over one half of the omelette. Using a spatula or palette knife, flip the omelette over to cover the mushrooms. Cook for a few moments more, lift onto a plate and serve with oven chips and salad.', '', '1686656800.webp', 3, '2023-06-13 11:46:40', '2023-06-13 11:46:40'),
(16866589668624, 'Berry vanilla bread and butter pudding', '3 eggs, 2 tbsp Hermesetas sweetener, 1 1/2 tsp vanilla essence, 1 tsp ground cinnamon, 2 1/2 cups skim milk, 6 slices wholegrain fruit bread, crusts removed, 1 tbsp low-fat spread, 1 cup frozen raspberries, 2 tsp Hermesetas sweetener, extra, to dust, ', 'Oven, Bowls, Spread, Large baking dish, ', 'Preheat oven to 180°C/160°C fan-forced., Whisk eggs, sweetener, vanilla, cinnamon and milk together in a bowl., Spread both sides of bread slices with spread., Cut slices in half diagonally to make triangles., Layer bread, in rows, in a 6cm-deep, 22cm x 13cm (base), 4 cup-capacity ovenproof dish., Sprinkle with raspberries. Pour over egg mixture., Place dish in a large baking dish., Pour boiling water into baking dish until halfway up the side of smaller dish., Bake for 40 minutes or until golden and just set. Set aside to cool for 5 minutes., Dust with sweetener. Serve., ', '', '1686658966.jpg', 8, '2023-06-13 12:22:46', '2023-06-13 12:22:46'),
(16866594613121, 'Fiery parsnip chips', 'Vegetable oil, to deep-fry, 2 (about 450g) parsnips, peeled into ribbons, 1 1/2 tsp sea salt, 1/2 tsp finely grated orange rind, 1/2 tsp chilli flakes, ', 'Small Bowls, Non-stick frying pan, Slotted Spoon, ', 'To make the chilli salt, combine the sea salt, orange rind, chilli flakes and cumin in a small bowl., Add oil to a large, non-stick frying pan to come 5cm up the side of the pan., Heat oil to 170°C over medium-high heat (when the oil is ready a cube of bread will turn golden in 20 seconds)., Deep-fry the parsnip, in batches, for 1 minute or until crisp and golden., Use a slotted spoon to transfer to a baking tray lined with paper towel., Sprinkle with chilli salt., ', 'For the best-flavoured parsnips, buy ones that are medium in size. Larger ones tend to be tougher and woodier., ', '1686659461.jpg', 2, '2023-06-13 12:31:01', '2023-06-13 12:31:01'),
(16866597809982, 'Spinach & Cheese Filo Pies', 'Melted butter, to grease, 2 x 240g pkts cherry truss tomatoes, 1 tbsp olive oil, 1 x 250g pkt frozen chopped spinach, thawed, 400g feta, crumbled, 300g fresh ricotta, 3 shallots, ends trimmed, thinly sliced, 2 tbsp chopped fresh dill, 3 tsp finely grated lemon rind, 4 eggs, lightly whisked, 6 sheets filo pastry, 100g butter, melted', 'Oven, Baking tray, Non-stick baking paper, Scissors, Sieve, Bowl, Filo sheets, Tea towels, Pan', 'Preheat oven to 180°C. Brush eight 150ml capacity muffin pans with butter. Line a baking tray with non-stick baking paper., Use scissors to cut the tomatoes into small bunches, leaving the stems intact. Place on the prepared tray and drizzle over the oil. Season with salt and pepper., Place spinach in a sieve and use your hands to squeeze out as much excess liquid as possible. Combine the spinach, feta, ricotta, shallot, dill and lemon rind in a large bowl. Add the egg and stir until well combined. Season with salt and pepper., Place the filo sheets on a clean work surface. Cut each filo sheet crossways into 4 pieces. Place the filo pieces in a stack and cut the stack in half crossways to make 48 pieces. Cover with a clean tea towel, then a damp tea towel (this prevents the filo from drying out). Brush 1 filo piece with butter and place it in the base of 1 prepared pan, allowing the corners to extend over the top of the pan. Repeat with 5 filo pieces, rotating them slightly, to completely cover the side of the pan. Repeat with remaining filo and butter to line remaining prepared pans. Spoon the spinach mixture among the filo cases. Bake for 30 minutes., Bake the tomatoes with the pies for a further 10-15 minutes or until the tomatoes are tender and the pies are golden.', 'If you\'d like to add meat, stir in cooked chopped bacon in step 2., For a lighter version of these cheesy pies, use reduced-fat feta and ricotta. Omit the 100g of butter and spray the filo sheets with oil rather than brush them with butter in step 3.', '1686659780.jpg', 10, '2023-06-13 12:36:20', '2023-06-13 12:36:20'),
(16866598326246, 'Baked Potatoes with Creamy Herb Topping', '4 small russet potatoes (about 1 1/4 pound total), 1/2 cup nonfat Greek-style yogurt or 2/3 cup regular, plain nonfat yogurt, 1 tablespoon olive oil, 1 tablespoon finely chopped parsley leaves, 1 tablespoon finely chopped chives, ', 'Oven, Fork, Baking paper, Foil, Small bowls, ', 'Preheat the oven to 450 degrees F., Poke each potato with a fork a few times., Place on a baking sheet lined with foil and bake for 45 to 50 minutes, until they are easily pierced with a knife., Wrap them loosely in the foil for 5 minutes or until ready to serve., If using regular yogurt, place it in a strainer lined with paper towel and set the strainer over a bowl., Let the yogurt drain and thicken for 20 minutes., Combine the Greek-style yogurt or regular thickened yogurt, the oil, parsley and chives of the in a small bowl., Slice the potatoes in half lengthwise and dollop a tablespoon of the creamy herb topping on each half., ', '', '1686659832.jpg', 2, '2023-06-13 12:37:12', '2023-06-13 12:37:12'),
(16866599549298, 'Breakfast fried rice', '1 tsp macadamia oil, 3/4 cup sliced vegetables (such as broccoli, beans, carrot, zucchini), 1/2 x 125g tub 90-second microwave brown rice, 1 tsp salt-reduced tamari, 1 pan-fried egg or poached egg, to serve, 1 tsp hot chilli sauce, ', 'Large non-stick pan, ', 'Heat oil in a large non-stick pan over medium-high heat, Cook the vegies, stirring, for 2-3 minutes or until just tender., Add rice and tamari and cook, stirring, for 1-2 minutes or until heated through., Serve rice topped with egg. Drizzle over the chilli sauce., ', '', '1686659954.jpg', 5, '2023-06-13 12:39:14', '2023-06-13 12:39:14'),
(16866600697292, 'Vanilla Spice Oatmeal', '3 1/2 cups water, 1/4 teaspoon salt, optional, 2 cups old-fashioned oats, 1/2 cup raisins, 1/2 cup walnuts, coarsely chopped, optional, 1/4 teaspoon vanilla extract, Pinch nutmeg, 2 tablespoons dark brown sugar, plus more, to taste, 1 cup lowfat milk, divided, 1/8 teaspoon ground cinnamon', 'Saucepan, Skillet, Bowls', 'In a medium saucepan, bring the water and salt to a boil. Stir in the oats and raisins, reduce the heat to low and simmer, stirring occasionally, uncovered, for 5 minutes., In the meantime, place nuts, if using, in a dry skillet over a medium-high flame, and toast, stirring frequently, until golden and fragrant, about 5 minutes. Set aside., When the oats are cooked remove pan from the flame and stir in the vanilla and nutmeg. Swirl in the brown sugar and place the oatmeal in serving bowls. Pour 1/4 cup of milk on top of each bowl, and top with toasted nuts and a sprinkle of cinnamon., For a quicker version using quick cooking or plain instant oatmeal: Cook the oatmeal according to the directions on the package. Stir raisins, brown sugar, and nutmeg into the cooked oatmeal. Top with milk, nuts (toasted or un-toasted) and cinnamon.', 'Recipe Analysis Note: Ingredients without discrete measurements such as \"Salt, to taste\" or \"Ice cream, optional\" are omitted from analysis. This is because amounts can be highly variable and difficult to determine.', '1686660069.jpg', 2, '2023-06-13 12:41:09', '2023-06-13 12:41:09'),
(16866601809943, 'Chocolate and Strawberry Stuffed French Toast', '3 eggs, 1 1/4 cups nonfat milk, 1/2 teaspoon vanilla extract, 1/4 cup part-skim ricotta cheese, 8 slices of whole-wheat sandwich bread, crusts removed, 1 (8-ounce) container strawberries, hulled and sliced, 4 teaspoons bittersweet chocolate chips, Cooking spray, 2 teaspoons confectioners\' sugar, ', 'Large bowls, Nonstick skillet or griddle, ', 'In a large bowl, whisk together the eggs, milk and vanilla. Set aside., Place 1 tablespoon of ricotta in the center of 4 of the pieces of bread and spread around slightly., Top with about 6 slices of strawberries and a teaspoon of chocolate chips., Cover each with another piece of bread to make a \"sandwich\"., Spray a large nonstick skillet or griddle with cooking spray and preheat., Carefully dip each of the \"sandwiches\" into the egg mixture until completely moistened., Then place on the skillet and cook over a medium heat for 3 to 4 minutes per side, until the outside is golden brown and the center is warm and chocolate is melted., Transfer to serving places., Top with remaining strawberries and sprinkle with confectioners\' sugar., ', '', '1686660180.jpg', 2, '2023-06-13 12:43:00', '2023-06-13 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_publish`
--

CREATE TABLE `recipe_publish` (
  `publish_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipe_publish`
--

INSERT INTO `recipe_publish` (`publish_id`, `user_id`, `recipe_id`, `publish_date`, `created_at`, `updated_at`) VALUES
(12, 7, 16866536464440, '2023-06-13', '2023-06-13 10:54:06', '2023-06-13 10:54:06'),
(13, 6, 16866538261771, '2023-06-13', '2023-06-13 10:57:06', '2023-06-13 10:57:06'),
(14, 7, 16866541392624, '2023-06-13', '2023-06-13 11:02:19', '2023-06-13 11:02:19'),
(15, 6, 16866542536357, '2023-06-13', '2023-06-13 11:04:13', '2023-06-13 11:04:13'),
(16, 7, 16866543392836, '2023-06-13', '2023-06-13 11:05:39', '2023-06-13 11:05:39'),
(17, 7, 16866546153150, '2023-06-13', '2023-06-13 11:10:15', '2023-06-13 11:10:15'),
(18, 6, 16866548999982, '2023-06-13', '2023-06-13 11:14:59', '2023-06-13 11:14:59'),
(19, 7, 16866549716439, '2023-06-13', '2023-06-13 11:16:11', '2023-06-13 11:16:11'),
(20, 7, 16866551483446, '2023-06-13', '2023-06-13 11:19:08', '2023-06-13 11:19:08'),
(21, 6, 16866551873758, '2023-06-13', '2023-06-13 11:19:47', '2023-06-13 11:19:47'),
(22, 7, 16866554222757, '2023-06-13', '2023-06-13 11:23:42', '2023-06-13 11:23:42'),
(23, 7, 16866556894766, '2023-06-13', '2023-06-13 11:28:09', '2023-06-13 11:28:09'),
(24, 6, 16866557542318, '2023-06-13', '2023-06-13 11:29:14', '2023-06-13 11:29:14'),
(25, 7, 16866558576396, '2023-06-13', '2023-06-13 11:30:57', '2023-06-13 11:30:57'),
(26, 7, 16866561095418, '2023-06-13', '2023-06-13 11:35:09', '2023-06-13 11:35:09'),
(27, 6, 16866562646499, '2023-06-13', '2023-06-13 11:37:44', '2023-06-13 11:37:44'),
(29, 7, 16866564013924, '2023-06-13', '2023-06-13 11:40:01', '2023-06-13 11:40:01'),
(30, 6, 16866565609244, '2023-06-13', '2023-06-13 11:42:40', '2023-06-13 11:42:40'),
(31, 7, 16866565747605, '2023-06-13', '2023-06-13 11:42:54', '2023-06-13 11:42:54'),
(32, 7, 16866567024165, '2023-06-13', '2023-06-13 11:45:02', '2023-06-13 11:45:02'),
(33, 7, 16866568006339, '2023-06-13', '2023-06-13 11:46:40', '2023-06-13 11:46:40'),
(34, 6, 16866589668624, '2023-06-13', '2023-06-13 12:22:46', '2023-06-13 12:22:46'),
(35, 6, 16866594613121, '2023-06-13', '2023-06-13 12:31:01', '2023-06-13 12:31:01'),
(36, 6, 16866597809982, '2023-06-13', '2023-06-13 12:36:20', '2023-06-13 12:36:20'),
(37, 6, 16866598326246, '2023-06-13', '2023-06-13 12:37:12', '2023-06-13 12:37:12'),
(38, 6, 16866599549298, '2023-06-13', '2023-06-13 12:39:14', '2023-06-13 12:39:14'),
(39, 6, 16866600697292, '2023-06-13', '2023-06-13 12:41:09', '2023-06-13 12:41:09'),
(40, 6, 16866601809943, '2023-06-13', '2023-06-13 12:43:00', '2023-06-13 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `user_passwordUpdateDate` datetime DEFAULT NULL,
  `user_birthday` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_profile`, `user_passwordUpdateDate`, `user_birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'michaelriotan', 'michaelrio9966@gmail.com', '$2y$10$vEDtiX44V5dKa9qnF58NEumd3mV5kP1VZ2Ep.iFTvOtcNur.PdRSW', '1686934758.jpg', '2023-06-14 22:47:59', NULL, NULL, '2023-06-03 08:10:13', '2023-06-16 17:04:45'),
(3, 'michael', 'michaelrio123@gmail.com', '$2y$10$49UWy.7AivpNoldlfJ4z0.G8uisnqYqcicGZF2KMENUdEwVTcTBq6', 'user.png', NULL, NULL, NULL, '2023-06-03 22:58:09', '2023-06-03 22:58:09'),
(4, 'michael', 'michaelriotan@gmail.com', '$2y$10$nrrnpNvyR8MKftBH6Jg4UOQ0LxSmZJkC4Ks3MF4BJvbRh5CpB5M0e', 'user.png', NULL, NULL, NULL, '2023-06-03 23:21:27', '2023-06-03 23:21:27'),
(6, 'Pannavara', 'pannavaradv@gmail.com', '$2y$10$vEDtiX44V5dKa9qnF58NEumd3mV5kP1VZ2Ep.iFTvOtcNur.PdRSW', '1686934758.jpg', NULL, NULL, NULL, '2023-06-13 05:20:11', '2023-06-13 05:20:11'),
(7, 'jeandarc', 'elin.felicia@binus.ac.id', '$2y$10$08grpYec57AZedK6dqTCo.qT.PkRgVrdqrfkPPnYa3DY17HkfqxES', 'user.png', '2023-06-13 17:51:58', NULL, NULL, '2023-06-13 05:22:26', '2023-06-13 10:51:58'),
(8, 'test', 'test@gmail.com', '$2y$10$KX09FQRxlf9o/GPmLdEEx.8q0aFUQKdr2FziaS8Wu/TrHZVaBcFoC', 'user.png', NULL, NULL, NULL, '2023-06-17 04:24:12', '2023-06-17 04:24:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`),
  ADD KEY `bookmark_user_id_foreign` (`user_id`),
  ADD KEY `bundle_id` (`bundle_id`);

--
-- Indexes for table `bundle`
--
ALTER TABLE `bundle`
  ADD PRIMARY KEY (`bundle_id`);

--
-- Indexes for table `bundle_list`
--
ALTER TABLE `bundle_list`
  ADD PRIMARY KEY (`bundlelist_id`),
  ADD KEY `bundle_list_publish_id_foreign` (`publish_id`),
  ADD KEY `bundle_list_bundle_id_foreign` (`bundle_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mybundle`
--
ALTER TABLE `mybundle`
  ADD PRIMARY KEY (`mybundle_id`),
  ADD KEY `mybundle_user_id_foreign` (`user_id`),
  ADD KEY `mybundle_bundlelist_id_foreign` (`bundlelist_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `recipe_category_id_foreign` (`category_id`);

--
-- Indexes for table `recipe_publish`
--
ALTER TABLE `recipe_publish`
  ADD PRIMARY KEY (`publish_id`),
  ADD KEY `recipe_publish_user_id_foreign` (`user_id`),
  ADD KEY `recipe_publish_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bundle`
--
ALTER TABLE `bundle`
  MODIFY `bundle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bundle_list`
--
ALTER TABLE `bundle_list`
  MODIFY `bundlelist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16869757246375;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mybundle`
--
ALTER TABLE `mybundle`
  MODIFY `mybundle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16866601809944;

--
-- AUTO_INCREMENT for table `recipe_publish`
--
ALTER TABLE `recipe_publish`
  MODIFY `publish_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`bundle_id`) REFERENCES `bundle` (`bundle_id`),
  ADD CONSTRAINT `bookmark_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bundle_list`
--
ALTER TABLE `bundle_list`
  ADD CONSTRAINT `bundle_list_bundle_id_foreign` FOREIGN KEY (`bundle_id`) REFERENCES `bundle` (`bundle_id`),
  ADD CONSTRAINT `bundle_list_publish_id_foreign` FOREIGN KEY (`publish_id`) REFERENCES `recipe_publish` (`publish_id`);

--
-- Constraints for table `mybundle`
--
ALTER TABLE `mybundle`
  ADD CONSTRAINT `mybundle_bundlelist_id_foreign` FOREIGN KEY (`bundlelist_id`) REFERENCES `bundle_list` (`bundlelist_id`),
  ADD CONSTRAINT `mybundle_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `recipe_publish`
--
ALTER TABLE `recipe_publish`
  ADD CONSTRAINT `recipe_publish_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`),
  ADD CONSTRAINT `recipe_publish_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
