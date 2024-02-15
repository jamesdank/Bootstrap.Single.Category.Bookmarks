SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `bookmarks` (
  `bookmark_id` int(10) UNSIGNED NOT NULL,
  `bookmark_date` date NOT NULL,
  `bookmark_title` varchar(500) NOT NULL,
  `bookmark_bookmark` text NOT NULL,
  `bookmark_category_id` tinyint(3) UNSIGNED NOT NULL,
  `bookmark_description` text NOT NULL,
  `bookmark_hidden` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `bookmark_categories` (
  `bookmark_category_id` tinyint(3) UNSIGNED NOT NULL,
  `bookmark_category_title` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`bookmark_id`),
  ADD UNIQUE KEY `bookmark_bookmark` (`bookmark_bookmark`) USING HASH;

ALTER TABLE `bookmark_categories`
  ADD PRIMARY KEY (`bookmark_category_id`),
  ADD UNIQUE KEY `bookmark_category_title` (`bookmark_category_title`);


ALTER TABLE `bookmarks`
  MODIFY `bookmark_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `bookmark_categories`
  MODIFY `bookmark_category_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
