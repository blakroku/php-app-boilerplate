SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
    `id` int(11) UNSIGNED NOT NULL,
    `username` longtext DEFAULT NULL,
    `password` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
    (1, 'admin', 'secret') -- password should be hashed
;

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `lottery_results` (
    `id` int(11) UNSIGNED NOT NULL,
    `confirmation_code` varchar NOT NULL,
    `confirmation_date` varchar DEFAULT NULL,
    `prize_won` varchar DEFAULT NULL,
    `ticket_value` longtext DEFAULT NULL,
    `tracked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;