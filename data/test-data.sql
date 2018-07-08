SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Dumping data for table `hotel`
--
INSERT INTO `hotel` (`id`, `name`, `description`) VALUES
(1, 'hotel Berlin one', 'description hotel Berlin one'),
(2, 'hotel Berlin two', 'description hotel Berlin two');

--
-- Dumping data for table `review`
--
INSERT INTO `review` (`id`, `hotel_id`, `rating`, `text`, `created_date`) VALUES
(1, 1, 91, 'hotel Berlin one review 1', '2018-07-06 10:14:35'),
(2, 1, 87, 'hotel Berlin one review 2', '2018-07-06 10:14:35'),
(3, 1, 85, 'hotel Berlin one review 3', '2018-07-08 06:33:32'),
(4, 1, 93, 'hotel Berlin one review 4', '2018-07-08 06:33:32');
COMMIT;
