-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 02:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(2550) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `created`) VALUES
(1, 'python', '\nPython is a high-level, interpreted programming language known for its simplicity and readability. It offers dynamic typing and automatic memory management, making it ideal for diverse applications, from web development and scientific computing to artificial intelligence and data analysis. Python\'s extensive standard library provides built-in modules and functions for various tasks, further enhancing productivity. Its clean syntax emphasizes code readability and encourages developers to write clear, concise, and maintainable code. Python\'s popularity continues to grow due to its versatility, community support, and wide adoption in both industry and academia.', '2024-03-08 08:28:41'),
(2, 'java', '\r\nJava is a widely used, object-oriented programming language renowned for its platform independence and robustness. Developed by Sun Microsystems, it offers features like automatic memory management, exception handling, and multithreading, making it suitable for building scalable and secure applications. Java\'s \"write once, run anywhere\" principle allows code to run on any device with a Java Virtual Machine (JVM). Its extensive standard library and vast ecosystem of third-party libraries and frameworks enable developers to build a variety of software, from web applications and mobile apps to enterprise systems and embedded devices. Java remains a top choice for developers due to its reliability and performance.', '2024-03-08 13:52:39'),
(3, 'php', 'PHP is a popular server-side scripting language primarily used for web development. Initially created by Rasmus Lerdorf in 1994, it stands for \"Hypertext Preprocessor.\" PHP is widely known for its ease of use, extensive documentation, and compatibility with various databases and web servers. It allows developers to embed PHP code directly into HTML pages for dynamic content generation. PHP supports object-oriented programming paradigms, along with procedural and functional programming styles. It powers millions of websites and web applications worldwide, offering features like form handling, file processing, session management, and database connectivity through extensions like MySQLi and PDO.', '2024-03-08 15:15:33'),
(4, 'flask', '\r\nFlask is a lightweight and versatile web framework for Python, known for its simplicity and flexibility in building web applications. Developed by Armin Ronacher, it follows the WSGI toolkit and is designed to be easy to use and extend. Flask provides features like routing, templating, and request handling, allowing developers to quickly create web applications with minimal boilerplate code. It offers a modular structure, enabling integration with various extensions for additional functionality like authentication, database integration, and RESTful APIs. Flask\'s simplicity and extensive documentation make it popular among developers for projects ranging from small prototypes to large-scale web applications.', '2024-03-08 15:16:11'),
(5, 'jquery', 'jQuery is a fast, small, and feature-rich JavaScript library. It simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development. With jQuery, developers can create dynamic and interactive websites with ease', '2024-03-14 16:42:30'),
(6, 'C', 'A general-purpose programming language known for its performance and efficiency. It’s widely used in system/software development and embedded systems, offering low-level access to memory and system resources.', '2024-07-21 10:11:29'),
(7, 'C++', 'An extension of C, it introduces object-oriented programming features. C++ is used in a variety of applications, including game development, real-time simulations, and large-scale systems, thanks to its performance and flexibility.', '2024-07-21 10:11:29'),
(10, 'Bootstrap', 'A popular front-end framework for developing responsive, mobile-first websites. It provides pre-designed components and a grid system, making it easy to create visually appealing and consistent layouts.', '2024-07-21 10:12:56'),
(11, 'React', 'A JavaScript library for building user interfaces, particularly single-page applications. React uses a component-based architecture and virtual DOM to efficiently update and render UI components, making it popular for creating dynamic web apps.\r\n', '2024-07-21 10:14:22'),
(12, 'Tailwind CSS', ' A utility-first CSS framework that provides low-level utility classes to build custom designs without having to leave your HTML. It encourages a different approach compared to traditional CSS frameworks, focusing on composability and reusability.\r\n\r\n', '2024-07-21 10:14:22'),
(13, 'SQL', 'Structured Query Language (SQL) is used for managing and querying relational databases. It allows for efficient data retrieval, manipulation, and management, making it essential for database administration and backend development.', '2024-07-21 10:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(7) NOT NULL,
  `com_content` varchar(5000) NOT NULL,
  `thread_id` int(7) NOT NULL,
  `com_by` varchar(100) NOT NULL,
  `com_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_content`, `thread_id`, `com_by`, `com_time`) VALUES
(1, 'go to google Crome and install python', 2, '', '2024-03-15'),
(5, 'first thing is to dounload flask', 12, '', '2024-03-15'),
(6, 'whitch type of error ', 2, '', '2024-03-15'),
(8, 'If you are encountering an error while trying to run Python code on your PC, there could be several reasons for it. Here are some common issues and steps you can take to troubleshoot', 10, '', '2024-03-15'),
(13, '\r\nExperiencing errors while running Python on your PC can be frustrating. To diagnose the issue, start by checking the error message for details about what went wrong. Common causes include syntax errors, missing dependencies, or incompatible versions. Ensure Python is properly installed and configured on your system, and consider using virtual environments to manage dependencies. Check the Python code for any typos or logical errors. Online forums and documentation can provide valuable insights and solutions. By troubleshooting systematically and seeking assistance when needed, you can overcome these challenges and enjoy the power and versatility of Python programming on your PC.', 2, '', '2024-03-15'),
(14, 'Experiencing difficulty with Java installation or functionality can be frustrating. Ensure Java is properly installed and its directory is included in the systems PATH variable. Confirm compatibility with your system and consider reinstalling Java from the official source if needed, following installation instructions closely. Check for any firewall or antivirus software that might be blocking Java, and temporarily disable them for troubleshooting. Look up any error messages encountered for insights into potential solutions. If problems persist, seek assistance from online communities or Java experts who may offer valuable guidance. With patience and thorough troubleshooting, you can overcome Java-related issues and resume your development tasks', 4, '', '2024-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `contect`
--

CREATE TABLE `contect` (
  `con_id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contect`
--

INSERT INTO `contect` (`con_id`, `name`, `email`, `message`, `time`) VALUES
(1, 'anshu', 'iamashish@gmail.com', 'give me some emails', '2024-03-16 14:41:12'),
(2, 'pk', 'pk@pk.com', 'contect us', '2024-03-17 10:38:00'),
(3, 'ASHISH PATEL', 'iamashish761@gmail.com', 'hii', '2024-03-17 10:42:08'),
(4, 'JAVED KHAN', 'XMART4512@GMAIL.COM', 'how should we reach to you', '2024-03-17 10:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(7) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `cate_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `title`, `desc`, `cate_id`, `user_id`, `time`) VALUES
(1, 'unable to install python', 'i am aunable to install python in my systum', 1, 0, '2024-03-14 11:35:29'),
(2, 'python is not working', 'python is not work in my pc sowing error.', 1, 0, '2024-03-14 12:08:27'),
(3, 'flask is not installed', 'flask is not work in pc', 4, 0, '2024-03-14 12:49:59'),
(4, 'java is not working', 'i ama not able to install java  means java is not working', 2, 0, '2024-03-14 16:11:19'),
(7, 'php', 'newlist of php ', 3, 0, '2024-03-14 16:27:48'),
(10, 'python', 'new python script', 1, 0, '2024-03-14 16:33:12'),
(11, 'flask', 'not working', 4, 0, '2024-03-14 16:37:39'),
(12, 'flask', 'not able to install', 4, 0, '2024-03-14 16:39:03'),
(13, 'python', 'new', 1, 0, '2024-03-18 13:20:59'),
(14, 'java is running slow', 'unable to run the code of java in systum', 2, 0, '2024-03-18 13:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(12, 'hii@54321', '11'),
(13, 'iamashish761@gmail.com', 'anshu'),
(14, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contect`
--
ALTER TABLE `contect`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `title` (`title`,`desc`);
ALTER TABLE `thread` ADD FULLTEXT KEY `title_2` (`title`,`desc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contect`
--
ALTER TABLE `contect`
  MODIFY `con_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
