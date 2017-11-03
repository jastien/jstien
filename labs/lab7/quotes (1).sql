-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03. Nov, 2017 19:55 PM
-- Server-versjon: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quotes`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `q_admin`
--

CREATE TABLE `q_admin` (
  `adminId` tinyint(4) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `q_admin`
--

INSERT INTO `q_admin` (`adminId`, `firstName`, `lastName`, `username`, `password`) VALUES
(1, 'Jannicke', 'Stien', 'jstien', '181dde79b3c07f098abf9e8a3f57327d71d85da7'),
(2, 'Admin', 'Admin', 'admin', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `q_author`
--

CREATE TABLE `q_author` (
  `authorId` smallint(6) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `dod` date NOT NULL,
  `profession` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `biography` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `q_author`
--

INSERT INTO `q_author` (`authorId`, `firstName`, `lastName`, `gender`, `dob`, `dod`, `profession`, `country`, `picture`, `biography`) VALUES
(1, 'Albert ', 'Einstein', 'M', '1879-03-14', '1955-04-18', 'Physicist', 'Germany', 'http://www.deism.com/images/Einstein_laughing.jpeg', 'Albert '),
(2, 'Benjamin', 'Franklin', 'M', '1706-01-17', '1790-04-17', 'One of the Founding Fathers of the United States', 'USA', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/BenFranklinDuplessis.jpg/800px-BenFranklinDuplessis.jpg', ' A renowned polymath, Franklin was a leading author, printer, political theorist, politician, freemason, postmaster, scientist, inventor, civic activist, statesman, and diplomat'),
(3, 'Mahatma', 'Gandhi', 'M', '1869-10-02', '1948-01-30', 'Leader', 'India', 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Portrait_Gandhi.jpg', 'a Hindu non-violent revolutionary'),
(4, 'Helen', 'Keller', 'F', '1880-06-27', '1968-06-01', 'Author', 'USA', 'http://www2.lhric.org/pocantico/womenenc/keller3.jpg', 'American author, political activist, and lecturer. She was the first deafblind person to earn a bachelor of arts degree.'),
(5, 'Abraham', 'Lincoln', 'M', '1809-12-02', '1865-04-15', 'Politician, US President', 'USA', 'http://img4.wikia.nocookie.net/__cb20131230003659/rickandmorty/images/d/dd/Rick.png', 'Abraham Lincoln was an American politician and lawyer who served as the 16th President of the United States from March 1861 until his assassination in April 1865. Lincoln led the United States through its Civil War—its bloodiest war and perhaps its greatest moral, constitutional, and political crisis.[2][3] In doing so, he preserved the Union, paved the way to the abolition of slavery, strengthened the federal government, and modernized the economy.'),
(6, 'Marie', 'Curie', 'F', '1867-11-07', '1934-07-04', 'Scientist', 'Poland', 'https://www.biography.com/.image/c_fill%2Ccs_srgb%2Cg_face%2Ch_170%2Cq_80%2Cw_300/MTQ1MTQwNjk5Mjk2NTA3Mjg4/marie-curie---mini-biography.jpg', 'Born Maria Sklodowska, Marie Curie (November 7, 1867 to July 4, 1934) became the first woman to win a Nobel Prize and the only woman to win the award in two different fields (physics and chemistry). Curie\'s efforts, with her husband Pierre Curie, led to the discovery of polonium and radium and, after Pierre\'s death, the further development of X-rays. '),
(7, 'Agatha', 'Christie', 'F', '1890-11-15', '1976-01-12', 'Novelist', 'England', 'https://www.biography.com/.image/t_share/MTE5NDg0MDU0OTI0MDY4MzY3/agatha-christie-9247405-1-402.jpg', 'She is best known for her 66 detective novels and 14 short story collections, particularly those revolving around her fictional detectives Hercule Poirot and Miss Marple. She also wrote the world\'s longest-running play, a murder mystery, The Mousetrap, and six romances under the name Mary Westmacott. Her novels have sold roughly 2 billion copies, and her estate claims that her works come third in the rankings of the world\'s most-widely published books, behind only Shakespeare\'s works and the Bible. Most of her books and short stories have been adapted for television, radio, video games and comics, and more than thirty feature films have been based on her work. In 1971 she was elevated to Dame Commander of the Order of the British Empire (DBE) for her contribution to literature. '),
(8, 'John', 'Smith', 'M', '1900-01-01', '1950-01-01', 'Teacher', 'USA', '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `q_category`
--

CREATE TABLE `q_category` (
  `categoryId` tinyint(4) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `q_category`
--

INSERT INTO `q_category` (`categoryId`, `category`) VALUES
(1, 'Peace'),
(2, 'Motivation'),
(3, 'Love'),
(4, 'War'),
(5, 'Philosophy'),
(6, 'Reflection'),
(7, 'Religion'),
(8, 'Humor'),
(9, 'Inspirational');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `q_cat_quote`
--

CREATE TABLE `q_cat_quote` (
  `cat_quote_Id` int(11) NOT NULL,
  `quoteId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `q_cat_quote`
--

INSERT INTO `q_cat_quote` (`cat_quote_Id`, `quoteId`, `categoryId`) VALUES
(1, 1, 5),
(2, 2, 2),
(3, 8, 2),
(4, 13, 2),
(5, 18, 2),
(6, 4, 6),
(7, 5, 5),
(8, 14, 5),
(9, 15, 5),
(10, 11, 6),
(11, 26, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `q_quote`
--

CREATE TABLE `q_quote` (
  `quoteId` int(11) NOT NULL,
  `quote` varchar(1000) NOT NULL,
  `authorId` smallint(6) NOT NULL,
  `addedBy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `q_quote`
--

INSERT INTO `q_quote` (`quoteId`, `quote`, `authorId`, `addedBy`) VALUES
(1, 'Insanity: doing the same thing over and over again and expecting different results.', 1, 'Eanstad'),
(2, 'An investment in knowledge pays the best interest.', 2, 'ralarcon'),
(3, 'Evil is not something superhuman, it\'s something less than human.', 7, 'hoconnell'),
(4, 'Life is either a great adventure or nothing.', 4, 'jstien'),
(5, 'America will never be destroyed from the outside. If we falter and lose our freedoms, it will be because we destroyed ourselves.', 5, 'brduncan'),
(6, 'Walking with a friend in the dark is better than walking alone in the light.', 4, 'hoconnell'),
(7, 'Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe.', 1, 'anorli'),
(8, 'Try not to become a man of success, but rather try to become a man of value.', 1, 'harn'),
(10, 'A scientist in his laboratory is not a mere technician: he is also a child confronting natural phenomena that impress him as though they were fairy tales.', 6, 'anorli'),
(11, 'There are sadistic scientists who hurry to hunt down errors instead of establishing the truth.', 6, 'lcraig'),
(12, 'No problem can be solved from the same level of consciousness that created it.', 1, 'cheads'),
(13, 'And in the end, it\'s not the years in your life that count. It\'s the life in your years.', 5, 'cbirchall'),
(14, 'First principle: never to let one\'s self be beaten down by persons or by events.', 6, 'jstien'),
(15, 'I was taught that the way of progress was neither swift nor easy.', 6, 'brduncan'),
(16, 'Better to remain silent and be thought a fool than to speak out and remove all doubt.', 5, 'ewessman'),
(17, 'But surely for everything you have to love you have to pay some price.', 7, 'lcraig'),
(18, 'Education is what remains after one has forgotten what one has learned in school.', 1, 'harn'),
(19, 'Imagination is more important than knowledge.', 1, 'ewessman'),
(20, 'Life is like riding a bicycle. To keep your balance you must keep moving.', 1, 'cheads'),
(22, 'Learn from yesterday, live for today, hope for tomorrow. The important thing is not to stop questioning.', 1, 'Eaanstad'),
(23, 'I have no special talents. I am only passionately curious.', 1, 'Maolsen'),
(24, 'Live as if you were to die tomorrow; learn as if you were to live forever.', 3, 'sdoan'),
(25, 'An investment in knowledge pays the best interest.', 2, 'sdoan'),
(26, 'Dogs are wise. They crawl away into a quiet corner and lick their wounds and do not rejoin the world until they are whole once more.', 7, 'cbirchall'),
(27, 'First they ignore you, then they laugh at you, then they fight you, then you win.', 3, 'mking'),
(28, 'An eye for eye only ends up making the whole world blind.', 3, 'mking'),
(29, '\" Be less curious about people and more curious about ideas.\"', 6, 'lgarcia'),
(30, 'The true sign of intelligence is not knowledge but imagination.', 1, 'Maolsen'),
(31, '\"Insanity: doing the same thing over and over again and expecting different results.', 1, 'eengle'),
(34, 'You may delay, but time will not.', 2, 'lgarcia'),
(35, 'Imagination is more important than knowledge.', 1, 'mruelas'),
(36, 'An investment in knowledge pays the best interest.', 2, 'mruelas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `q_admin`
--
ALTER TABLE `q_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `q_author`
--
ALTER TABLE `q_author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indexes for table `q_category`
--
ALTER TABLE `q_category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `q_cat_quote`
--
ALTER TABLE `q_cat_quote`
  ADD PRIMARY KEY (`cat_quote_Id`);

--
-- Indexes for table `q_quote`
--
ALTER TABLE `q_quote`
  ADD PRIMARY KEY (`quoteId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `q_admin`
--
ALTER TABLE `q_admin`
  MODIFY `adminId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `q_author`
--
ALTER TABLE `q_author`
  MODIFY `authorId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `q_category`
--
ALTER TABLE `q_category`
  MODIFY `categoryId` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `q_cat_quote`
--
ALTER TABLE `q_cat_quote`
  MODIFY `cat_quote_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `q_quote`
--
ALTER TABLE `q_quote`
  MODIFY `quoteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
