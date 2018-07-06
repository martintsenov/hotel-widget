SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `hotel-app`
--
CREATE DATABASE IF NOT EXISTS `hotel-app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hotel-app`;

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);
COMMIT;
