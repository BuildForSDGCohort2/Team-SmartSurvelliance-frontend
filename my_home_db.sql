-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 08, 2020 at 08:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `record_label_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `contact_number` varchar(500) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(500) NOT NULL,
  `access_level` varchar(500) NOT NULL,
  `profile_img` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `_id`, `firstname`, `lastname`, `email`, `password`, `contact_number`, `address`, `gender`, `access_level`, `profile_img`, `created`, `modified`) VALUES
(1, 'dc2be8a1783ce0ac6a3cb2da2e8b65cc', 'kingsley', 'okeke', 'kingsley@gmail.com', '$2y$10$NKDtHknJN4/UpZxGOlnwwePtDctiDjV01/qIByOcAjP8oNhqZCl0i', '92887777673', 'no 12 okigwe road', 'male', 'superadmin', '../../uploads/record-label_1594518085.png', '2020-06-02 22:22:37', '2020-07-18 21:34:28'),
(2, '109018145094e35d826141466d8cdd80', 'Kingsley', 'Okeke', 'Kingsley@gmail.com', '$2y$10$iV4mVGYJKg3o0IPMyb5B.OmMaGZ9y.lFZ6mj/UhAs9b/4rIcoH9BK', '92887777673', 'No 12 okigwe road', 'male', 'admin', '../../uploads/record-label_1594518085.png', '2020-06-02 22:24:49', '2020-07-18 21:34:32'),
(6, 'ed4cd01b8dfd12351efcc986a6c3f081', 'Greg', 'Nwaike', 'Michealgreg123@gmail.com', '$2y$10$beyjDBgJHyjGA7WQI4ZgxO65PyVuZLhhP/oPU4SzU4Jdk16QNkudW', '35553535353', 'House 26 1st Avenue FHE Egbeada', 'female', 'auxiliary', '../../uploads/record-label_1594570786.jpeg', '2020-07-12 17:19:46', '2020-07-18 21:34:43');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `stage_name` varchar(500) NOT NULL,
  `info` text NOT NULL,
  `age` varchar(11) NOT NULL,
  `artist_gender` varchar(500) NOT NULL,
  `genre` text NOT NULL,
  `location` text NOT NULL,
  `social_media_link` varchar(500) NOT NULL DEFAULT 'nil',
  `artist_img` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `_id`, `firstname`, `lastname`, `stage_name`, `info`, `age`, `artist_gender`, `genre`, `location`, `social_media_link`, `artist_img`, `created`, `modified`) VALUES
(19, '3e143b93b1adf38fc1f13c19bdbcce85', 'joe', 'boy', 'joeboy', 'Joseph Akinfenwa Donus, known professionally as Joeboy, is a Nigerian singer and songwriter. Mr Eazi discovered him in 2017 after watching an instagram video of his cover to Ed Sheeran\'s', '24', 'male', 'Reggae, Blues, Jazz', 'lagos', 'https://www.instagram.com/am_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/DavidDonkeke?s=08', '../../uploads/record-label_1593625318.jpeg', '2020-07-01 17:41:58', '2020-07-01 17:41:59'),
(20, '1d84329fa26d5abb74ca0d0d94e7b8c9', 'opeyemi', 'babatunde', 'lyta', 'Opeyemi Babatunde Rahim, known professionally as Lyta, is a Nigerian singer and songwriter. He signed a record deal with YBNL Nation in 2018 but left the label in May 2019 after having a disagreement with Olamide. He released the 5-track debut EP Id in 2019', '20', 'male', 'Folk, Reggae', 'lagos', 'https://www.instagram.com/am_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/DavidDonkeke?s=08', '../../uploads/record-label_1593625693.jpeg', '2020-07-01 17:48:13', '2020-07-01 17:48:13'),
(21, '9e13d4b222e32ff9ebee1375c43abaf6', 'Ayodeji ', 'balogun', 'wizkid', 'Ayodeji Ibrahim Balogun, known professionally as Wizkid, is a Nigerian singer and songwriter. He began recording music at the age of 11 and managed to release a collaborative album with the Glorious Five, a group he and a couple of his church friends formed.', '29', 'male', 'Reggae, Classical, Blues, Jazz', 'us', 'https://www.instagram.com/official_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/alexisreng?lang=en', '../../uploads/record-label_1593625829.jpeg', '2020-07-01 17:50:29', '2020-07-01 17:50:29'),
(22, 'c25cf6ef5752f617a5a6d46903c9900c', 'Adedamola', 'Adefolahan', 'fireboy', 'Adedamola Adefolahan, known professionally as Fireboy DML, is a Nigerian singer and songwriter. He is signed to YBNL Nation, an independent record label founded by Nigerian rapper Olamide. His debut studio album Laughter, Tears and Goosebumps was released in 2019.', '28', 'male', 'Hip hop, Blues, Jazz', 'lagos', 'https://www.instagram.com/youngoche/, https://soundcloud.com/wizkid-official, https://twitter.com/youngoche?s=08', '../../uploads/record-label_1593630379.jpeg', '2020-07-01 19:06:19', '2020-07-01 19:06:19'),
(23, 'f47f35300be33f24d8a69ebdd98be61c', 'Divine ', 'Ikubor', 'rema', 'Divine Ikubor, known professionally as Rema, is a Nigerian singer and rapper. In 2019, he signed a record deal with Jonzing World, a subsidiary of Mavin Records. He rose to prominence with the release of the song &quot;Iron Man&quot;, which appeared on Barack Obama\'s 2019 summer playlist.', '18', 'male', 'Folk, Blues, Rock', 'uk', 'https://www.instagram.com/am_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/DavidDonkeke?s=08', '../../uploads/record-label_1593630467.jpeg', '2020-07-01 19:07:47', '2020-07-01 19:07:47'),
(24, 'a73afca67e7029d7dd7a4d6ef9f9817f', 'Mayowa ', 'Adewale ', 'mayorkun', 'Adewale Mayowa Emmanuel, known professionally as Mayorkun, is a Nigerian singer, songwriter and pianist. He released a cover of Davido\'s &quot;The Money&quot; single and was discovered by the singer on Twitter.', '26', 'male', 'Reggae, Blues, Jazz', 'warri', 'https://www.instagram.com/am_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/DavidDonkeke?s=08', '../../uploads/record-label_1593630548.jpeg', '2020-07-01 19:09:08', '2020-07-01 19:09:08'),
(25, 'ad0061dddb88060bc698d9b64ddfc8d6', 'Oluwatosin ', 'Ajibade', 'mr eazi', 'Oluwatosin Ajibade, better known by his stage name Mr Eazi, is a Nigerian singer, songwriter, and entrepreneur. He is the pioneer of Banku music, a fusion sound he describes as a mixture of Ghanaian highlife and Nigerian chord progressions and patterns', '29', 'male', 'Classical, Jazz', 'lagos', 'https://www.instagram.com/official_donkk/, https://soundcloud.com/wizkid-official, https://twitter.com/alexisreng?lang=en', '../../uploads/record-label_1593630618.jpeg', '2020-07-01 19:10:18', '2020-07-01 19:10:18'),
(26, '16accf46b5eb712ea7aa34016957b2c4', 'Azeez', 'Adeshina', 'Naira Marley', 'Azeez Adeshina Fashola, known professionally as Naira Marley, is a Nigerian singer and songwriter. He is known as the president of his controversial fan base, &quot;Marlians&quot;.', '26', 'male', 'Hip hop, Blues, Rock', 'lagos', 'https://www.instagram.com/youngoche/, https://soundcloud.com/wizkid-official, https://twitter.com/youngoche?s=08', '../../uploads/record-label_1593630685.jpeg', '2020-07-01 19:11:25', '2020-07-01 19:11:25'),
(27, '1028da0e4341233e64a0276b5df1da5e', 'David ', 'Adeleke', 'Davido', 'David Adedeji Adeleke, who is better known as Davido, is an American-born Nigerian singer, songwriter and record producer. Davido was born in Atlanta, US, and raised in Lagos; he made his music debut as a member of the music group KB International.', '29', 'Male', 'Folk, Blues, Jazz', 'Uk', 'https://www.instagram.com/youngoche/, https://soundcloud.com/wizkid-official, https://twitter.com/youngoche?s=08', '../../uploads/record-label_1594873577.jpeg', '2020-07-01 20:25:58', '2020-07-16 03:26:17'),
(55, '837f6edd33796a3a9a13ee1a15a3f410', 'Cynthia', 'Morgan', 'Cynthiamorgan', 'Dddddddddddddddddddddddddd', '26', 'Female', 'Electronic, Folk', 'Lagos', 'https://www.instagram.com/am_donkk/, https://twitter.com/DavidDonkeke?s=08', '../../uploads/record-label_1598390635.jpeg', '2020-08-25 21:23:55', '2020-08-26 04:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `banner_title` varchar(500) NOT NULL,
  `banner_img` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `_id`, `banner_title`, `banner_img`, `created`) VALUES
(1, '2a1bd9b6d95b5bbae57008079c088a34', 'salad by don kk', '../../uploads/record-label_1595448983.jpeg', '2020-07-22 21:16:23'),
(2, '23663a4641b50251b4a1c083c34f84b7', 'Python dance by don kk', '../../uploads/record-label_1595451837.jpeg', '2020-07-22 21:21:08'),
(3, 'aa1174fc641a47fe70bfbe37bdb9dbf7', 'Holly blaise records', '../../uploads/record-label_1595451968.jpeg', '2020-07-22 22:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `reply` text DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `ip_address` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `_id`, `name`, `email`, `subject`, `message`, `reply`, `seen`, `ip_address`, `created`) VALUES
(5, 'e3d2128ab332ba16381700fbc4a7a1cb', 'ndo chisom', 'ndochisom@gmail.com', 'why did you guys sign don kk', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\nAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'nil', 1, '::1', '2020-07-23 06:32:47'),
(4, '76637c48999b0e57d15a96b4b75cef13', 'Greg Nwaike', 'Michealgreg123@gmail.com', 'how to get signed', 'Hello admin, i want to know the procedures on how to get signed thank you.', 'nil', 0, '::1', '2020-07-22 23:18:28'),
(6, 'bd15a7c5ac4e32c8066f8e8d1a1bfbcd', 'Greg Magnus', 'mag101@gmail.com', 'when is he buying', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'nil', 0, '::1', '2020-07-23 23:01:53'),
(7, 'fbe329ca969d67600203b7b179fdd8fc', 'Greg Magnus', 'her@gmail.com', 'im going home', 'Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.', 'nil', 0, '::1', '2020-07-23 23:02:34'),
(8, '3405bd531c34a5edf6e66a3e7776f524', 'Greg Nwaike', 'Michealgreg123@gmail.com', 'how to get signed now', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 'nil', 0, '::1', '2020-08-07 05:10:28'),
(9, '36f496eed6e13542ba31f9bea78fe7af', 'Greg Nwaike', 'Michealgreg123@gmail.com', 'how to get signed', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'nil', 0, '::1', '2020-08-07 19:39:54'),
(10, 'c76e793fb31ba7d0802f3e4d3cf56523', 'test', 'test@gmail.com', 'testing the waters', 'thisis to test the waters', NULL, 1, '::1', '2020-08-26 06:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `event_title` varchar(500) NOT NULL,
  `event_date` varchar(500) NOT NULL,
  `event_time` varchar(500) NOT NULL,
  `event_location` text NOT NULL,
  `event_desc` text NOT NULL,
  `event_img` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `_id`, `event_title`, `event_date`, `event_time`, `event_location`, `event_desc`, `event_img`, `created`) VALUES
(1, '549c66aa81d658563fc69e1cdc36cd2d', 'Don KK album launch', 'jan 2, 2020', '02:00 pm', 'no 2 wetheral road, owerri imo state', 'album lunch of jaywise demo track', '../../uploads/record-label_1595105865.jpeg', '2020-07-18 21:57:45'),
(2, '517b5d498f875ee8861ef474e7c5b428', 'Tekno album launch', 'Dec 12, 2020', '03:45 pm', 'The event center lekki', 'Davido sets to launch his hot album mated since a year back', '../../uploads/record-label_1595106062.jpeg', '2020-07-18 22:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `genre_name` varchar(500) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `_id`, `genre_name`) VALUES
(1, 'a5d46db93383c6407bb3dfe1edc09ec1', 'rock'),
(2, '6c59e298d60da763480fd6eb1530765c', 'jazz'),
(3, 'ccb128caa1be1bd8302ecc64dd448f6c', 'blues'),
(4, '2f42c637a08b46e8f56757e5b0c0f6b4', 'classical'),
(5, 'cacbb9d714e57c8f8736f1d3c77c4d5d', 'hip hop'),
(6, 'a4b695a32b9fca2f7d23eb72108e1a21', 'reggae'),
(7, '53cffbe25be0e0a1ec5ba8bf0720a767', 'folk'),
(8, 'c3aeab9b4460b15cfe3ac8fe661179d0', 'electronic'),
(14, 'f1395ab0e14263695281e7aaafae80fa', 'classicalllllllllll');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `releases`
--

DROP TABLE IF EXISTS `releases`;
CREATE TABLE IF NOT EXISTS `releases` (
  `release_id` int(11) NOT NULL AUTO_INCREMENT,
  `_id` varchar(500) NOT NULL,
  `release_title` varchar(500) NOT NULL,
  `artist` varchar(500) NOT NULL,
  `producer` varchar(500) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `release_date` varchar(100) NOT NULL,
  `release_info` text NOT NULL,
  `media_link` varchar(500) NOT NULL DEFAULT 'nil',
  `release_audio` varchar(500) NOT NULL,
  `release_img` varchar(500) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`release_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `releases`
--

INSERT INTO `releases` (`release_id`, `_id`, `release_title`, `artist`, `producer`, `genre`, `release_date`, `release_info`, `media_link`, `release_audio`, `release_img`, `created`, `modified`) VALUES
(21, '771017247c603a684ab9a33d92b74d5d', 'salad', 'Naira Marley', 'master craft', 'Folk', '18/08/2020', 'Here\'s everything you need to know about each major music event!', 'https://www.naijaloaded.com.ng/download-music/donkk-ebiri, https://youtu.be/Ql_MCVRTcvA', '../../uploads/record-label_audio_5f220c75331fc1596066933.mpeg', '../../uploads/record-label_1596066933.jpeg', '2020-07-29 23:55:33', '2020-07-29 23:55:33'),
(26, 'f7612d6cdaa5bfb689326a0df220e225', 'Hate', 'Davido', 'Sarz', 'Electronic, Folk', 'Apr 4, 2020', 'Dddddddddddddddddddddd', 'Https://www.naijaloaded.com.ng/download-music/donkk-ebiri, https://youtu.be/Ql_MCVRTcvA ', '', '../../uploads/record-label_1596665820.jpeg', '2020-08-05 22:17:00', '2020-08-26 04:39:28'),
(19, 'd4ffb5632879266079cb25a98d094d77', 'python dance', 'Naira Marley', 'sarz', 'Electronic', '09/18/2020', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 'https://www.naijaloaded.com.ng/download-music/donkk-ebiri, https://youtu.be/Ql_MCVRTcvA', '../../uploads/record-label_audio_5f21f6a0ce18e1596061344.mpeg', '../../uploads/record-label_1596061344.jpeg', '2020-07-29 22:22:24', '2020-07-29 22:22:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
