######################
ESX Homwwork Project
######################

Step 1: Adjust application/config/config.php on line 26 with your path for the project

Step 2: Process the SQL data before testing the project and don't forget to adjust application/config/database.php with your credentials. SQL provided bellow.

Step 3: Test the project accessing the default url you've set up on step 1


######################
API Functionality
######################
In order to get users JSON, use /api/users/id where id is the user's id in DB
In order to soft delete a user use /api/soft_delete/id where id is the user's id in DB
In order to reactivate a user use /api/reactivate/id where id is the user's id in DB
In order to hard delete a user use /api/hard_delete/id where id is the user's id in DB

######################
SQL Data
######################
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esx`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `flagged` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `flagged`) VALUES
(17, 'Yos', 'ESX', '$2y$10$Agj3jFUEt/fOcfal.bylJOB8kvfx2SPROXknar9VGZxqlMF8.bznS', 'yos@esx.com', 0),
(18, 'Andrei', 'Dumitru', '$2y$10$Wzy1ZGU1lM1RX2jaq5ZQV.fzJzxEcMu1qvI.F.mxCsLKLfyposOMu', 'thesemeth@gmail.com', 1);
COMMIT;