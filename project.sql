-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 02:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'CSE', 'Computer Science Engineering'),
(2, 'ECE', 'Electrical and Communications Engineering'),
(3, 'EEE', 'Electrical and Electronics Engineering'),
(4, 'Civil', 'Civil Engineering'),
(5, 'Mech', 'Mechanical Engineering'),
(6, 'IT', 'Information Technology'),
(7, 'Soft Skills', 'All queries regarding soft skills'),
(8, 'Placements', 'All queries regarding Placements'),
(9, 'Others', 'Any Other Category...');

-- --------------------------------------------------------

--
-- Table structure for table `quacat`
--

CREATE TABLE `quacat` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quacat`
--

INSERT INTO `quacat` (`id`, `category`) VALUES
(6, 'Civil'),
(7, 'Civil'),
(8, 'Civil'),
(9, 'Civil'),
(10, 'Civil'),
(11, 'Civil'),
(12, 'Civil'),
(1, 'CSE'),
(2, 'CSE'),
(3, 'CSE'),
(19, 'CSE'),
(20, 'CSE'),
(21, 'CSE'),
(22, 'CSE'),
(43, 'CSE'),
(46, 'CSE'),
(55, 'CSE'),
(4, 'ECE'),
(5, 'ECE'),
(45, 'ECE'),
(54, 'ECE'),
(28, 'EEE'),
(49, 'EEE'),
(50, 'EEE'),
(51, 'EEE'),
(52, 'EEE'),
(53, 'EEE'),
(15, 'IT'),
(16, 'IT'),
(17, 'IT'),
(18, 'IT'),
(47, 'IT'),
(13, 'Mech'),
(14, 'Mech'),
(34, 'Others'),
(23, 'Placements'),
(24, 'Placements'),
(25, 'Placements'),
(26, 'Placements'),
(27, 'Placements'),
(29, 'Soft Skills'),
(30, 'Soft Skills'),
(32, 'Soft Skills'),
(33, 'Soft Skills'),
(42, 'Soft Skills'),
(44, 'Soft Skills'),
(48, 'Soft Skills');

-- --------------------------------------------------------

--
-- Table structure for table `quans`
--

CREATE TABLE `quans` (
  `id` int(11) UNSIGNED NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` longtext DEFAULT NULL,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL,
  `likes` bigint(20) NOT NULL DEFAULT 0,
  `dislikes` bigint(20) NOT NULL DEFAULT 0,
  `modified` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quans`
--

INSERT INTO `quans` (`id`, `question`, `answer`, `askedby`, `answeredby`, `likes`, `dislikes`, `modified`, `status`) VALUES
(1, ' What is the computer system?', 'A computer system is a combination of memory, CPU, peripheral devices that are connected to it, and OS (Operating System).<br>or<br>computer system is a combination of hardware and software components.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(2, 'What is Computer Science?', 'A computer system is a combination of memory, CPU, peripheral devices that are connected to it, and OS (Operating System).', 'pjain', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(3, 'Why is computer science important?', 'The most important aspect of computer science is problem solving, an essential skill for life. Students study the design, development and analysis of software and hardware used to solve problems in a variety of business, scientific and social contexts.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(4, 'What is meant by electronics and communication?', 'Electronic engineering (also called electronics and communications engineering) is an electrical engineering discipline which utilizes nonlinear and active electrical components (such as semiconductor devices, especially transistors and diodes) to design electronic circuits, devices, integrated circuits and their ...', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(5, 'What are types of electronic communication?', 'There are many different types of electronic communication including but not limited to: email, social media newsgroups, chat rooms, video conferencing, instant messaging, phone and fax.', 'ayush', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(6, 'What is civil engineering?', 'Civil engineering is a professional engineering discipline that deals with the design, construction, and maintenance of the physical and naturally built environment, including public works such as roads, bridges, canals, dams, airports, sewerage systems, pipelines, structural components of buildings, and railways.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(7, 'What exactly do civil engineers do?', 'Civil engineers design major transportation projects. Civil engineers conceive, design, build, supervise, operate, construct and maintain infrastructure projects and systems in the public and private sector, including roads, buildings, airports, tunnels, dams, bridges, and systems for water supply and sewage treatment.', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(8, 'Why is it called civil engineering?', 'Civil Engineering is named as it is because it is a part of Science which deals with the comfort acessories required by the civilians with respect to their basic needs of shelter, transportation, work place and other.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(9, 'What are the subjects of civil engineering?', 'Various Civil Engineering Subjects, their Details and Importance\r\nSurveying in Civil Engineering. ...\r\nStrength of Material or Solid Mechanics. ...\r\nBuilding Material and Construction Technology. ...\r\nGeology in Civil Engineering. ...\r\nConcrete Technology in Civil Engineering. ...\r\nStructural Analysis. ...\r\nBuilding Planning and Drawing.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(10, 'What are the basics of civil engineering?', 'Civil Engineering Construction Tips.\r\nHand Mixing of Concrete -Procedure and Precautions.\r\nReinforcement Calculator – Areas of Different Diameters and Numbers of Rebars.\r\nQuantity and Rate Analysis for Reinforced Concrete Construction.\r\nRate Analysis of Excavation in Earthwork -Calculate Cost of Excavation.', 'ayush', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(11, 'What skills does a civil engineer need?', 'Essential Skills for a Career in Civil Engineering\r\nTechnical training. ...\r\nMathematical skills. ...\r\nWritten communication skills. ...\r\nOral communication skills. ...\r\nLeadership skills. ...\r\nOrganizational skills. ...\r\nProblem-solving. ...\r\nDecision-making.', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(12, 'Do civil engineers need to be good at drawing?', 'You do not have to be talented at drawing to become a civil engineer. ... While they are not architects, civil engineers need to be skilled in architectural design techniques, working with blueprints, maps, drawings and models as well as computer programs used for architectural design and construction.', 'user1', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(13, 'What is mechanical engineering?', 'Mechanical engineering is a branch of engineering that applies the principles of Mechanics and Materials science for analysis, design, manufacturing, and maintenance of mechanical systems. It involves the production and usage of heat and mechanical power for the design, production, and operation of machines and tools.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(14, 'What are the types of mechanical engineering?', 'However, the most common specializations of mechanical engineering include manufacturing, transportation systems, combustion, nanotechnology and robotics. Mechatronics engineering may also be of interest; this combines mechanical and electronic engineering with areas such as computer and control engineering.', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(15, 'What is computer software?', 'Computer software is a complete package, which includes software program, its documentation and user guide on how to use the software.\r\n<br>Thank You', 'ayush', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(16, 'Can you differentiate computer software and computer program?\r\n', 'Yes, a computer program is piece of programming code which performs a well defined task where as software includes programming code, its documentation and user guide.\r\nSo finally yes we can differentiate.', 'user3', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(17, 'What is software engineering?', 'Software engineering is an engineering branch associated with software system development.\r\n It is also a subject relating the software development', 'user2', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(18, 'When you know programming, what is the need to learn software engineering concepts?\r\n', 'A person who knows how to build a wall may not be good at building an entire house. Likewise, a person who can write programs may not have knowledge of other concepts of Software Engineering. The software engineering concepts guide programmers on how to assess requirements of end user, design the algorithms before actual coding starts, create programs by coding, testing the code and its documentation.\r\n', 'user1', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(19, 'What is software process or Software Development Life Cycle (SDLC)?\n', 'Software Development Life Cycle, or software process is the systematic development of software by following every stage in the development process namely, Requirement Gathering, System Analysis, Design, Coding, Testing, Maintenance and Documentation in that order.\r\n', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(20, 'What are SDLC models available?\r\n', 'There are several SDLC models available such as Waterfall Model, Iterative Model, Spiral model, V-model and Big-bang Model etc.\r\n', 'ayush', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(21, 'What are various phases of SDLC?\r\n', 'The generic phases of SDLC are: Requirement Gathering, System Analysis and Design, Coding, Testing and implementation. The phases depend upon the model we choose to develop software.', 'user3', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(22, 'Which SDLC model is the best?', 'SDLC Models are adopted as per requirements of development process. It may very software-to-software to ensuring which model is suitable.\r\n\r\nWe can select the best SDLC model if following answers are satisfied -\r\n\r\nIs SDLC suitable for selected technology to implement the software ?\r\nIs SDLC appropriate for client’s requirements and priorities ?\r\nIs SDLC model suitable for size and complexity of the software ?\r\nIs the SDLC model suitable for type of projects and engineering we do ?\r\nIs the SDLC appropriate for the geographically co-located or dispersed developers ?\r\n', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(23, 'What is software project management?\r\n', 'Software project management is process of managing all activities like time, cost and quality management involved in software development.\r\n', 'user3', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(24, 'Who is software project manager?\r\n', 'A software project manager is a person who undertakes the responsibility of carrying out the software project.\r\n\r\n', 'user2', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(25, 'What is SRS?\r\n', 'SRS or Software Requirement Specification is a document produced at the time of requirement gathering process. It can be also seen as a process of refining requirements and documenting them.\r\n', 'ayush', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(26, 'What are functional requirements?\r\n', 'Functional requirements are functional features and specifications expected by users from the proposed software product.\r\n', 'Ujwal', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(27, 'What are non-functional requirements?\r\n', 'Non-functional requirements are implicit and are related to security, performance, look and feel of user interface, interoperability, cost etc.', 'User', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(28, 'What is electric current?', 'An electric current is the rate of flow of electric charge past a point or region. An electric current is said to exist when there is a net flow of electric charge through a region. ... In electric circuits the charge carriers are often electrons moving through a wire.', 'user01', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(29, 'What is the purpose of this website?', 'To connect Students and Faculty', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(30, 'Ask a Question?', 'Why This question', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(32, 'Are Softskills important', 'YES', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(33, 'How is this page working?', 'This page is working on HTML, CSS, JavaScript, PHP, and on MySQL Database.', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(34, 'Do we have sports coordinator in VCE?', 'yes', 'user', 'admin', 0, 0, '0000-00-00 00:00:00', 1),
(42, 'what is black hat?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(43, 'hello world?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(44, 'what is what?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(45, 'what is control unit?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(46, 'what is RAM', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(47, 'what is IT?', NULL, 'keer', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(48, 'what is softskill?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(49, 'What EEE stands for?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(50, 'is EEE easy?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(51, 'why is EEE easy?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(52, 'I think the error is solved?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(53, 'Which is the best editor for sql?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(54, 'I think now I\'m done?', NULL, 'root', NULL, 0, 0, '0000-00-00 00:00:00', 1),
(55, 'books to learn algorithms?', NULL, 'keerthi', NULL, 0, 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `year`, `branch`, `name`, `email`, `join_date`, `category`) VALUES
(23, '', '', '', '', '', '', '2020-09-01 08:04:31', 'CSE,ECE,'),
(20, '123456', '$2y$10$40XvwZjrZY5IO8FY.ECW8ORtOIe5EJIDTtv643ECJvbdmEL8WPqI.', '3', 'ECE', 'tony cipher', 'rohitkumarlingala17@gmail.com', '2020-08-29 12:14:45', NULL),
(27, 'ADC', '$2y$10$IVkm5I9718vnVEFSqUZhYur6EEcAA0bz.Yyomurrh7Pjvcg.Zg1y6', '3', 'ECE', 'tony cipher', 'swamivivekananda1217@gmail.com', '2020-09-02 05:42:23', 'CSE,ECE,IT,Mech,Civil,EEE,'),
(17, 'admin', '$2y$10$P8b3vf6Z9U81CyDhoe4XhOglpC6BNPmpwoY46oxCyuXB4P0JDLDEG', '1', 'cse', 'Developer', 'vcequries82@gmail.com', '2017-04-11 18:59:57', NULL),
(9, 'ayusht2396', '$2y$10$sN9WIHwcj5urboVA.fHZouLQM7/neAf1QOHJaYi4Mqysps3kdYgBq', '1', 'ece', 'Ayush Tripathi', 'ayusht2396@gmail.com', '2017-03-30 16:34:59', NULL),
(28, 'DBMS', '$2y$10$GN8as0PhksvL8U.w8eEPfOWk78.jZLwmN7FGPPm818ywy511GnI6m', '3', 'CSE', 'tony cipher', 'rohitkumarlingala17@gmail.com', '2020-09-02 07:33:22', NULL),
(26, 'keer', '$2y$10$biUiKMkhLti7GXsrDJgBEePUU3XmYkXGUMx2DGQUJvgzf9dYdA9Zq', '3', 'CSE', 'arjun reddy', 'rohitkumarlingala17@gmail.com', '2020-09-01 08:53:44', 'ECE,IT,Mech,Civil,EEE,Soft Skills,Placement,'),
(29, 'keerthi', '$2y$10$IqyZfaxJ1KJ1KZ8Uw/Y6b.QtPaU7EhSWYUvDiJewsz6WVJBk3SPUO', '3', 'CSE', 'arjun reddy', 'tonystark8231@gmail.com', '2020-09-02 09:42:26', NULL),
(13, 'pjain', '$2y$10$iMvJcCrkuDaeaquwzjZZjehRFCdGrojkchTCLnJtihG6GNtviohjq', '1', 'cse', 'Prakhar Jain', 'pjain@gmail.com', '2017-03-30 17:09:07', NULL),
(21, 'rohit123456', '$2y$10$Gr7h7rBuvVwlulGHLO84.etwsnEuzCBku0sMCgtCZiGK2A.0MGR9S', '3', 'ECE', 'Rohit Lingala', 'rohitkumarlingala17@gmail.com', '2020-08-29 12:37:38', NULL),
(22, 'root', '$2y$10$tHE4vuYilKIyrBrlgPYkWeIrXe3vzYTDY5xyjf0Y7T5UO6XdXmZ6C', '3', 'ECE', 'Lingala Rohit', 'rohitkumarlingala17@gmail.com', '2020-08-29 14:31:10', 'IT,'),
(8, 'Shivam010', '$2y$10$QWwY6YAqgf2Vx1IOIzflHeMcmwKf7h/W1a.FfRYrLxpcLkRg13Ypm', '1', 'cse', 'Shivam Rathore', 'shivam.rathore010@gmail.com', '2017-03-30 13:26:51', NULL),
(11, 'shub011', '$2y$10$eu7S5jsNaBHoI2twfrpPxOxcnUuvL0h7oGHzWH9sPPL96eNvR2QMC', '1', 'ece', 'Shubham Bairagi', 'sbv351997@gmail.com', '2017-03-30 16:43:21', NULL),
(14, 'Ujwal_1997', '$2y$10$c4TeDn9ZuFeGOLkUfrbx6u5GtKhN5EKtVrAgBztCiLaeX33.pDt76', '1', 'cse', 'Ujwal Shah', 'ujwalsaurav@gmail.com', '2017-04-02 11:31:17', NULL),
(16, 'user', '$2y$10$eEIXvBr8rUoxUbEBzag3N.fqKfrzTYfhC3p6.2g78ql2ujhOLy1Pa', '1', 'cse', 'Username', 'user@gmail.com', '2017-04-07 06:05:51', NULL),
(15, 'xyz', '$2y$10$YOZ/L6mGVPJ6ng0vVoGXxO5h7rI8XizNl/2z.kaRGx/4338aaUaDe', '1', 'cse', 'XYZ', 'xyz@gmail.com', '2017-04-06 13:30:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`name`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `quacat`
--
ALTER TABLE `quacat`
  ADD PRIMARY KEY (`category`,`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `quans`
--
ALTER TABLE `quans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `askedby` (`askedby`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quans`
--
ALTER TABLE `quans`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quacat`
--
ALTER TABLE `quacat`
  ADD CONSTRAINT `quacat_ibfk_1` FOREIGN KEY (`id`) REFERENCES `quans` (`id`),
  ADD CONSTRAINT `quacat_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
