SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `User` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Medic` (
  `medic_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Reservation` (
  `reservation_id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(60) NOT NULL,
  `status` boolean,
  `created_at` datetime,
  `user_id` int,
  `medic_id` int,
  FOREIGN KEY (user_id) REFERENCES User(user_id),
  FOREIGN KEY (medic_id) REFERENCES Medic(medic_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `User` (`email`, `password`) VALUES
('william@unow.com', 'william.abc'),
('marc@unow.com', 'marc.abc'),
('john@unow.com', 'john.abc'),
('antonio@unow.com', 'antonio.abc');

INSERT INTO `Medic` (`name`, `email`) VALUES
('Jonathan', 'jonathan@unow.com'),
('Julian', 'julian@unow.com');

INSERT INTO `Reservation`(`title`, `description`, `status`, `created_at` ,`user_id`, `medic_id`)
   VALUES ('My first reservation', 'Description reservation 1', false, NOW(), 1, 1),
          ('My second reservation', 'Description reservation 2', false, NOW(), 2, 1);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;