-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 04:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one_task_ahead`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `workspace_id` int(255) NOT NULL,
  `BoardName` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `workspace_id`, `BoardName`) VALUES
(1, 1, 'New Board'),
(2, 1, 'New Board'),
(3, 1, 'New Board'),
(4, 1, 'New Board'),
(5, 1, 'New Board'),
(6, 1, 'New Board'),
(7, 1, 'New Board'),
(8, 1, 'New Board');

-- --------------------------------------------------------

--
-- Table structure for table `board_task`
--

CREATE TABLE `board_task` (
  `board_task_id` int(255) NOT NULL,
  `board_id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Lane` enum('todo','doing','done') NOT NULL,
  `number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `board_task`
--

INSERT INTO `board_task` (`board_task_id`, `board_id`, `Title`, `Description`, `Lane`, `number`) VALUES
(2, 6, '0zxczxc', '0', 'doing', 1),
(4, 6, 'asd', 'asd', 'todo', 0),
(5, 5, 'asd', 'zxasdasdasc', 'todo', 5),
(6, 6, 'wew', 'asd', 'doing', 2),
(7, 6, 'daszx', 'zxc', 'todo', 1),
(8, 6, 'zxc', 'asd', 'doing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categ_id`, `categ_name`) VALUES
(1, 'Arts and Design'),
(2, 'Academics'),
(3, 'Architecture and Engineering \r\n'),
(4, 'Information Technology \r\n'),
(5, 'Person');

-- --------------------------------------------------------

--
-- Table structure for table `customized_template`
--

CREATE TABLE `customized_template` (
  `workspace_id` int(11) NOT NULL,
  `template_id` int(99) NOT NULL,
  `task_id` int(11) NOT NULL,
  `Title` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Lane` enum('todo','doing','done') NOT NULL,
  `number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customized_template`
--

INSERT INTO `customized_template` (`workspace_id`, `template_id`, `task_id`, `Title`, `Description`, `Lane`, `number`) VALUES
(1, 0, 3, 'Gather equipment (camera, lenses, tripod, etc.)', 'asd', 'doing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `edited_template_task`
--

CREATE TABLE `edited_template_task` (
  `edited_task_id` int(255) NOT NULL,
  `workspace_id` int(255) NOT NULL,
  `template_id` int(255) NOT NULL,
  `task_id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Lane` enum('todo','doing','done') NOT NULL,
  `number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `edited_template_task`
--

INSERT INTO `edited_template_task` (`edited_task_id`, `workspace_id`, `template_id`, `task_id`, `Title`, `Description`, `Lane`, `number`) VALUES
(0, 1, 0, 5, 'Plan the physical and logical design of the database system', '', 'done', 2),
(1, 1, 0, 3, 'Gather equipment (camera, lenses, tripod, etc.)', 'heyy\nasdzxc', 'doing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `perm_id` int(11) NOT NULL,
  `access_type` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `template_id` int(99) NOT NULL,
  `temp_name` varchar(99) NOT NULL,
  `categ_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`template_id`, `temp_name`, `categ_id`) VALUES
(1, 'Photography', 1),
(2, 'Graphic Design', 1),
(3, 'Fashion Design', 1),
(4, 'Drawing', 1),
(5, 'Interior Design', 1),
(6, 'Writing a Research Paper', 2),
(7, 'Studying for an Exam', 2),
(8, 'Writing a Book Review', 2),
(9, 'Giving a Presentation', 2),
(10, 'Applying to Graduate School', 2),
(11, 'Designing a Building', 3),
(12, 'Conducting Structural Analysis', 3),
(13, 'Creating 3D Model', 3),
(14, 'Conducting Energy Analysis', 3),
(15, 'Creating Technical Drawings', 3),
(16, 'Developing a Software Application', 4),
(17, 'Implementing a Network Infastructure', 4),
(18, 'Conducting a Security Assessment', 4),
(19, 'Creating a Database System', 4),
(20, 'Designing a User Interface', 4),
(21, 'Starting a Daily Exercise ', 5),
(22, 'Learning a New Language', 5),
(23, 'Starting a Pesonal Blog', 5),
(24, 'Planning Trip', 5),
(25, 'Starting a Gratitude Practice', 5);

-- --------------------------------------------------------

--
-- Table structure for table `template_task`
--

CREATE TABLE `template_task` (
  `task_id` int(11) NOT NULL,
  `Title` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Lane` enum('todo','doing','done') NOT NULL,
  `template_id` int(11) NOT NULL,
  `customized` tinyint(1) NOT NULL DEFAULT 0,
  `number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template_task`
--

INSERT INTO `template_task` (`task_id`, `Title`, `Description`, `Lane`, `template_id`, `customized`, `number`) VALUES
(3, 'Gather equipment (camera, lenses, tripod, etc.)', '', 'doing', 1, 0, 0),
(5, 'Determine project requirements (logo, brochure, website, etc.)', '', 'doing', 1, 0, 3),
(6, 'Finalizing design and delivering files to the client or printing for distribution', '', 'done', 1, 0, 1),
(7, 'Choose color palette and typography\n', '', 'doing', 2, 0, 0),
(8, 'Incorporating feedback and making revisions', '', 'doing', 2, 0, 1),
(9, 'Drafting initial concepts using software like Adobe Illustrator or Canva', '', 'done', 2, 0, 0),
(10, 'Gather inspiration and research similar designs\n', '', 'done', 2, 0, 1),
(11, 'Displaying designs at a fashion show or photoshoot\n', '', 'todo', 2, 0, 1),
(12, 'Marketing and selling the designs to consumers\n', '', 'todo', 2, 0, 0),
(13, 'Sewing and assembling garments', '', 'doing', 2, 0, 2),
(14, 'Adding embellishments and finishing touches', '', 'doing', 3, 0, 0),
(15, 'Brainstorm ideas and sketch designs', '', 'done', 3, 0, 0),
(16, 'Choose fabrics and materials', '', 'done', 3, 0, 0),
(17, 'Create patterns and prototypes', '', 'done', 3, 0, 0),
(18, 'Finishing touches and adding color (if desired)', '', 'todo', 3, 0, 0),
(19, 'Displaying or sharing the final artwork with others\r\n', '', 'todo', 3, 0, 0),
(20, 'Sketching initial ideas and rough drafts', '', 'doing', 3, 0, 0),
(21, 'Refining the drawing and adding details', '', 'doing', 3, 0, 0),
(22, 'Choose a subject or theme\r\n', '', 'done', 4, 0, 0),
(23, 'Gather materials (pencils, paper, erasers, etc.)', '', 'done', 4, 0, 0),
(24, 'Set up a comfortable workspace\r\n', '', 'done', 4, 0, 0),
(25, 'Final walkthrough with the client to ensure satisfaction\r\n', '', 'todo', 4, 0, 0),
(26, 'Photographing the finished space for a portfolio or website.\r\n', '', 'todo', 4, 0, 0),
(27, 'Choosing color schemes, furniture, and decor\r\n', '', 'doing', 4, 0, 0),
(28, 'Arranging and organizing the space\r\n', '', 'doing', 4, 0, 0),
(29, 'Incorporating lighting and other design elements\r\n', '', '', 4, 0, 0),
(30, 'Determine client\'s needs and preferences\r\n', '', 'done', 4, 0, 0),
(33, 'Measure and assess the space\r\n', '', 'done', 5, 0, 0),
(34, 'Create a budget and timeline\r\n', '', 'done', 5, 0, 0),
(35, 'Revising and editing for clarity and coherence\r\n', '', 'todo', 5, 0, 0),
(36, 'Formatting the paper according to guidelines\r\n', '', 'todo', 5, 0, 0),
(37, 'Submitting the paper to the professor or conference\r\n', '', 'todo', 5, 0, 0),
(38, 'Reading and note-taking\r\n', '', 'doing', 5, 0, 0),
(39, 'Outlining and organizing ideas\r\n', '', 'doing', 5, 0, 0),
(40, 'Drafting the paper', '', 'doing', 5, 0, 0),
(41, 'Choose a topic and research question', '', 'done', 5, 0, 0),
(42, 'Develop a thesis statement\r\n', '', 'done', 6, 0, 0),
(43, 'Gather and review sources', '', 'done', 6, 0, 0),
(44, 'Reviewing and testing knowledge in the days leading up to the exam\r\n', '', 'todo', 6, 0, 0),
(45, 'Relaxing and getting a good night\'s sleep before the exam\r\n', '', 'todo', 6, 0, 0),
(46, 'Taking the exam and reviewing answers afterwards', '', 'todo', 6, 0, 0),
(47, 'Reading and summarizing course materials\r\n', '', 'doing', 6, 0, 0),
(48, 'Memorizing key concepts and formulas\r\n', '', 'doing', 6, 0, 0),
(49, 'Taking practice quizzes and exams\r\n', '', 'doing', 6, 0, 0),
(50, 'Determine the scope and content of the exam\r\n', '', 'done', 6, 0, 0),
(51, 'Gather study materials (textbooks, notes, etc.)', '', 'done', 6, 0, 0),
(52, 'Create a study schedule', '', 'done', 7, 0, 0),
(53, 'Editing and revising the review for clarity and coherence\n', '', 'todo', 7, 0, 0),
(54, 'Formatting the review according to guidelines', '', 'todo', 7, 0, 1),
(55, 'Submitting the review to a journal or online platform\n', '', 'todo', 7, 0, 2),
(56, 'Developing a thesis or argument about the book', '', 'doing', 7, 0, 0),
(57, 'Writing a summary of the book\'s contents', '', 'doing', 7, 0, 0),
(58, 'Analyzing the book\'s strengths and weaknesses', '', 'doing', 7, 0, 0),
(59, 'Choose a book to review\n', '', 'done', 7, 0, 1),
(60, 'Read and take notes on the book\n', '', 'done', 7, 0, 2),
(61, 'Research the author and context of the book\r\n', '', 'done', 8, 0, 0),
(62, 'Giving the presentation and engaging with the audience\r\n', '', 'todo', 8, 0, 0),
(63, 'Answering questions and addressing feedback', '', 'todo', 8, 0, 0),
(64, 'Following up with attendees and distributing materials', '', 'todo', 8, 0, 0),
(65, 'Creating visual aids and materials', '', 'doing', 8, 0, 0),
(66, 'Rehearsing the presentation and timing', '', 'doing', 8, 0, 0),
(67, 'Practicing delivery and addressing questions', '', 'doing', 8, 0, 0),
(68, 'Choose a topic and create an outline', '', 'done', 8, 0, 0),
(69, 'Gather materials (slides, handouts, etc.)\r\n', '', 'done', 8, 0, 0),
(70, 'Research the audience and context of the presentation', '', 'done', 8, 0, 0),
(71, 'Waiting for admissions decisions and following up with schools', '', 'todo', 9, 0, 0),
(72, 'Considering financial aid and scholarships', '', 'todo', 9, 0, 0),
(73, 'Deciding on a graduate program and preparing for enrollment.', '', 'todo', 9, 0, 0),
(74, 'Writing a personal statement and essays', '', 'doing', 9, 0, 0),
(75, 'Requesting letters of recommendation\r\n', '', 'doing', 9, 0, 0),
(76, 'Submitting completed applications', '', 'doing', 9, 0, 0),
(77, 'Research graduate programs and requirements', '', 'done', 9, 0, 0),
(78, 'Prepare application materials (transcripts, letters of recommendation, etc.)', '', 'done', 9, 0, 0),
(79, 'Determine application deadlines and requirements\r\n', '', 'done', 9, 0, 0),
(80, 'Reviewing and revising plans based on feedback\r\n', '', 'todo', 9, 0, 0),
(81, 'Obtaining necessary permits and approvals\r\n', '', 'todo', 10, 0, 0),
(82, 'Overseeing construction and making necessary adjustments\r\n', '', 'todo', 10, 0, 0),
(83, 'Creating concept sketches and models\r\n', '', 'doing', 10, 0, 0),
(84, 'Developing detailed plans and specifications', '', 'doing', 10, 0, 0),
(85, 'Consulting with engineers and contractors\r\n', '', 'doing', 10, 0, 0),
(86, 'Determine the client\'s needs and budget\r\n', '', 'done', 10, 0, 0),
(87, 'Research building codes and regulations', '', 'done', 10, 0, 0),
(88, 'Gather information about the site and its surroundings', '', 'done', 10, 0, 0),
(89, 'Reviewing and revising analyses based on feedback\r\n', '', 'todo', 10, 0, 0),
(90, 'Preparing design drawings and specifications\r\n', '', 'todo', 10, 0, 0),
(91, 'Overseeing construction and making necessary adjustments\r\n', '', 'todo', 11, 0, 0),
(92, 'Performing hand calculations and computer simulations\r\n', '', 'doing', 11, 0, 0),
(93, 'Analyzing the results and verifying assumptions\r\n', '', 'doing', 11, 0, 0),
(94, 'Creating detailed reports and recommendations\r\n', '', 'doing', 11, 0, 0),
(95, 'Determine the structural system and loads', '', 'done', 11, 0, 0),
(96, 'Collect material properties and dimensions\r\n', '', 'done', 11, 0, 0),
(97, 'Identify constraints and boundary conditions\r\n', '', 'done', 11, 0, 0),
(98, 'Reviewing and revising the model based on feedback', '', 'todo', 11, 0, 0),
(99, 'Reviewing and revising the model based on feedback', '', 'todo', 11, 0, 0),
(101, 'Presenting the model to clients or stakeholders\r\n', '', 'todo', 12, 0, 0),
(102, 'Creating the basic shape and structure of the model', '', 'doing', 12, 0, 0),
(103, 'Refining the details and textures', '', 'doing', 12, 0, 0),
(104, 'Optimizing the model for rendering and animation\r\n', '', 'doing', 12, 0, 0),
(105, 'Gather information about the object or space to be modeled', '', 'done', 12, 0, 0),
(106, 'Determine the software and hardware requirements\r\n', '', 'done', 12, 0, 0),
(107, 'Set up the modeling environment\r\n', '', 'done', 12, 0, 0),
(108, 'Reviewing and revising the energy model based on feedback\r\n', '', 'todo', 12, 0, 0),
(109, 'Refining the details and textures', '', 'doing', 12, 0, 0),
(110, 'Optimizing the model for rendering and animation\r\n', '', 'doing', 13, 0, 0),
(111, 'Gather information about the object or space to be modeled\r\n', '', 'done', 13, 0, 0),
(112, 'Determine the software and hardware requirements', '', 'done', 13, 0, 0),
(113, 'Set up the modeling environment\r\n', '', 'done', 13, 0, 0),
(114, 'Reviewing and revising the energy model based on feedback', '', 'todo', 13, 0, 0),
(115, 'Incorporating the energy-saving measures into the design', '', 'todo', 13, 0, 0),
(116, 'Overseeing construction and monitoring energy performance\r\n', '', 'todo', 13, 0, 0),
(117, 'Creating an energy model of the building', '', 'doing', 13, 0, 0),
(118, 'Simulating different scenarios and evaluating their impact\r\n', '', 'doing', 13, 0, 0),
(119, 'Generating reports and recommendations\r\n', '', 'doing', 13, 0, 0),
(120, 'Determine the energy goals and constraints\r\n', '', 'done', 14, 0, 0),
(121, 'Gather information about the building and its systems\r\n', '', 'done', 14, 0, 0),
(122, 'Identify potential energy-saving measures\r\n', '', 'done', 14, 0, 0),
(123, 'Reviewing and revising the drawings based on feedback\r\n', '', 'todo', 14, 0, 0),
(124, 'Preparing final drawings and documentation\r\n', '', 'todo', 14, 0, 0),
(125, 'Providing support during construction and installation\r\n', '', 'todo', 14, 0, 0),
(126, 'Creating preliminary sketches and layouts', '', 'doing', 14, 0, 0),
(127, 'Developing detailed drawings and specifications\r\n', '', 'doing', 14, 0, 0),
(128, 'Coordinating with other designers and stakeholders\r\n', '', 'doing', 14, 0, 0),
(129, 'Determine the scope and requirements of the project\r\n', '', 'done', 14, 0, 0),
(130, 'Gather information about the materials and components', '', 'done', 15, 0, 0),
(131, 'Identify the necessary views and details\r\n', '', 'done', 15, 0, 0),
(132, 'Reviewing and refining the application based on feedback\r\n', '', 'todo', 15, 0, 0),
(133, 'Packaging and deploying the application to users', '', 'todo', 15, 0, 0),
(134, 'Maintaining and updating the application as needed\r\n', '', 'todo', 15, 0, 0),
(135, 'Designing the application architecture and user interface', '', 'doing', 15, 0, 0),
(136, 'Writing and testing the code\r\n', '', 'doing', 15, 0, 0),
(137, 'Debugging and optimizing the application\r\n', '', 'doing', 15, 0, 0),
(138, 'Define the requirements and goals of the application\r\n', '', 'done', 15, 0, 0),
(139, 'Choose a programming language and development environment\r\n', '', 'done', 15, 0, 0),
(140, 'Set up the necessary tools and resources\r\n', '', 'done', 16, 0, 0),
(141, 'Reviewing and refining the network design based on feedback\r\n', '', 'todo', 16, 0, 0),
(142, 'Documenting the network topology and configurations\r\n', '', 'todo', 16, 0, 0),
(143, 'Providing ongoing maintenance and support for the network', '', 'todo', 16, 0, 0),
(144, 'Installing and configuring the network devices and software', '', 'doing', 16, 0, 0),
(145, 'Testing and troubleshooting the network connectivity and performance', '', 'doing', 16, 0, 0),
(146, 'Securing the network against unauthorized access and attacks\r\n', '', 'doing', 16, 0, 0),
(147, 'Define the network requirements and constraints\r\n', '', 'done', 16, 0, 0),
(148, 'Choose the appropriate hardware and software components\r\n', '', 'done', 16, 0, 0),
(149, 'Plan the physical and logical layout of the network\r\n', '', 'done', 17, 0, 0),
(150, 'Reviewing and refining the security posture based on feedback\r\n', '', 'todo', 17, 0, 0),
(151, 'Documenting the security assessment and its findings\r\n', '', 'todo', 17, 0, 0),
(152, 'Providing ongoing monitoring and management of the security controls', '', 'todo', 17, 0, 0),
(153, 'Conducting vulnerability scanning and penetration testing', '', 'doing', 17, 0, 0),
(154, 'Analyzing the results and identifying vulnerabilities\r\n', '', 'doing', 17, 0, 0),
(155, 'Recommending and implementing security controls and measures\r\n', '', 'doing', 17, 0, 0),
(156, 'Define the scope and goals of the assessment\r\n', '', 'done', 17, 0, 0),
(157, 'Gather information about the system and its vulnerabilities\r\n', '', 'done', 17, 0, 0),
(158, 'Identify the potential security threats and risks\r\n', '', 'done', 17, 0, 0),
(159, 'Reviewing and refining the database design based on feedback\r\n', '', 'todo', 18, 0, 0),
(160, 'Documenting the database schema and queries', '', 'todo', 18, 0, 0),
(161, 'Providing ongoing maintenance and support for the database system', '', 'todo', 18, 0, 0),
(162, 'Creating and populating the database schema and tables', '', 'doing', 18, 0, 0),
(163, 'Developing queries and stored procedures for data retrieval and manipulation', '', 'doing', 18, 0, 0),
(164, 'Testing and optimizing the performance and scalability of the database system', '', 'doing', 18, 0, 0),
(165, 'Define the data requirements and relationships', '', 'done', 18, 0, 0),
(166, 'Choose the appropriate database technology and platform\r\n', '', 'done', 18, 0, 0),
(167, 'Plan the physical and logical design of the database system', '', 'done', 18, 0, 0),
(168, 'Reviewing and refining the design based on feedback\r\n', '', 'todo', 18, 0, 0),
(169, 'Delivering the design assets to the development team', '', 'todo', 19, 0, 0),
(170, 'Providing ongoing design support and maintenance as needed', '', 'todo', 19, 0, 0),
(171, 'Creating wireframes and prototypes of the user interface', '', 'doing', 19, 0, 0),
(172, 'Testing and refining the design based on user feedback\r\n', '', 'doing', 19, 0, 0),
(173, 'Developing the final design and graphic assets\r\n', '', 'doing', 19, 0, 0),
(174, 'Define the target users and their needs and preferences\r\n', '', 'done', 19, 0, 0),
(175, 'Choose the appropriate design tools and frameworks\r\n', '', 'done', 19, 0, 0),
(176, 'Develop a conceptual model and design guidelines\r\n', '', 'done', 19, 0, 0),
(177, 'Reviewing and refining the routine based on feedback\r\n', '', 'todo', 19, 0, 0),
(178, 'Celebrating milestones and achievements\r\n', '', 'todo', 19, 0, 0),
(179, 'Continuing the routine as a long-term habit', '', 'todo', 20, 0, 0),
(180, 'Starting with a warm-up and stretching\r\n', '', 'doing', 20, 0, 0),
(181, 'Performing the exercises according to your plan\r\n', '', 'doing', 20, 0, 0),
(182, 'Recording your progress and adjusting the routine as needed', '', 'doing', 20, 0, 0),
(183, 'Define your fitness goals and constraints\r\n', '', 'done', 20, 0, 0),
(184, 'Choose the appropriate exercises and equipment', '', 'done', 20, 0, 0),
(185, 'Schedule time in your daily routine for exercise\r\n', '', 'done', 20, 0, 0),
(186, 'Reviewing and refining your language learning based on feedback', '', 'todo', 20, 0, 0),
(187, 'Celebrating milestones and achievements', '', 'todo', 20, 0, 0),
(188, 'Continuing to use the language to maintain and improve your proficiency', '', 'todo', 20, 0, 0),
(189, 'Studying the language with a structured approach', '', 'doing', 21, 0, 0),
(190, 'Practicing speaking and listening with a language partner or tutor', '', 'doing', 21, 0, 0),
(191, 'Testing your language proficiency and progress\r\n', '', 'doing', 21, 0, 0),
(192, 'Choose the language you want to learn\r\n', '', 'done', 21, 0, 0),
(193, 'Find learning resources, such as books or online courses\r\n', '', 'done', 21, 0, 0),
(194, 'Set goals for your language learning\r\n', '', 'done', 21, 0, 0),
(195, 'Reviewing and refining your blogging strategy based on feedback\r\n', '', 'todo', 21, 0, 0),
(196, 'Celebrating milestones and achievements\r\n', '', 'todo', 21, 0, 0),
(197, 'Continuing to grow your blog and audience\r\n', '', 'todo', 21, 0, 0),
(198, 'Writing and publishing blog posts according to your plan', '', 'doing', 21, 0, 0),
(199, 'Engaging with your audience through comments and social media', '', 'doing', 22, 0, 0),
(200, 'Analyzing your blog traffic and performance\r\n', '', 'doing', 22, 0, 0),
(201, 'Choose the topic or niche for your blog\r\n', '', 'done', 22, 0, 0),
(202, 'Choose a blogging platform and set up your blog', '', 'done', 22, 0, 0),
(203, 'Develop a content plan and schedule\r\n', '', 'done', 22, 0, 0),
(204, 'Reviewing and reflecting on your trip experiences\r\n', '', 'todo', 22, 0, 0),
(205, 'Saving and sharing memories, such as photos or souvenirs\r\n', '', 'todo', 22, 0, 0),
(206, 'Planning your next trip or adventure', '', 'todo', 22, 0, 0),
(207, 'Booking travel arrangements and activities\r\n', '', 'doing', 22, 0, 0),
(208, 'Packing and preparing for the trip\r\n', '', 'doing', 22, 0, 0),
(209, 'Exploring the destination and enjoying your experiences', '', 'doing', 23, 0, 0),
(210, 'Choose the destination and duration of your trip\n', '', 'done', 23, 0, 0),
(211, 'Research travel options, such as flights or accommodations', '', 'done', 23, 0, 1),
(212, 'Set a budget and plan your expenses', '', 'done', 23, 0, 2),
(213, 'Reviewing and reflecting on your gratitude practice and its impact on your life', '', 'todo', 23, 0, 0),
(214, 'Celebrating and sharing your achievements and positive experiences', '', 'todo', 23, 0, 1),
(215, 'Continuing to practice gratitude as a long-term habit.\n', '', 'todo', 23, 0, 2),
(216, 'Reflecting on what you are grateful for and expressing gratitude\n', '', 'doing', 23, 0, 1),
(217, 'Recording your reflections in a journal or through other means\n', '', 'doing', 23, 0, 2),
(218, 'Recording your reflections in a journal or through other means\r\n', '', 'doing', 24, 0, 0),
(219, 'Sharing your gratitude with others and spreading positivity\r\n', '', 'doing', 24, 0, 0),
(220, 'Define what you are grateful for in your life\r\n', '', 'done', 24, 0, 0),
(221, 'Choose a gratitude practice, such as journaling or meditation', '', 'done', 24, 0, 0),
(222, 'Schedule time in your daily routine for your practice', '', 'done', 24, 0, 0),
(1110, 'Exporting the model to various formats\r\n', '', 'todo', 12, 0, 0),
(1216, 'zxc', 'zxc', 'todo', 5, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `access_lvl` int(11) NOT NULL,
  `workspace_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `access_lvl`, `workspace_id`) VALUES
(3, 'nat', 'gracilla', 'natswell', 'test@gmail.com', '$2y$10$v4qfrk56eshTs3YT3ahHs.HG3m98vRyW8hMzNXuRsKYgMq55eNkuO', 0, 0),
(4, 'ian', 'zapata', 'zptlks', 'ian@gmail.com', '$2y$10$TJPxyea7PLfofG7He.tv4OYTE7n3g0/ABbodMwvgyWnvvmVHvskpu', 0, 0),
(5, 'vic', 'hiwatig', 'vico', 'vic@gmail.com', '$2y$10$PwykPXLQgeBrjjKIIhsD7.Oc2cnIDJM4wkHcH/DnWmi70APWT49Ee', 0, 0),
(6, 'nat', 'zapata', 'wtf', 'test@gmail.com', '$2y$10$gTImnj3kL.gRqL2zk6tsU.QA/Pe5rt13Ev49m3aEH4jU37WTLTkmO', 0, 0),
(7, 'shaun', 'robles', 'shu', 'shu@gmail.com', '$2y$10$kPt7z59cbRg8Lxg894IQM.scuWPp4Uif1J5.8JNi8wF6EiSAjiXje', 0, 0),
(8, 'nat', 'gracilla', 'nats2', 'Nathaniel.gracilla@gmail.com', '$2y$10$dnpnKy5pjKNQsTzqsClfW.qdRJhn6ntPoi30BvmPyU794rKmsHFbi', 0, 0),
(16, 'nat', 'gracilla', 'natswell2', 'test1@gmail.com', '$2y$10$zOpPYtZ0/C8A2hfqf2BcF.FK7A/a5GCl5ZgYCb.xRVfF.xcyBU46C', 0, 0),
(17, 'test', 'test', 'test1', 'testtoday@gmail.com', '$2y$10$xCjLu5b.W7miyCWbsq6ac.DW3zi9c2NHQplIqtBPYjWBLWXuVZBne', 0, 0),
(18, 'testing lang', 'asdas', 'nats', 'nat@gmail.com', '$2y$10$Lm5ISdLAub4EeuISbLjsq.95.DjtSpNJzgUp8ScO/cARMDGZpKQC.', 0, 0),
(19, 'test', 'test', 'test2', 'test2@gmail.com', '$2y$10$ZFm2uif46BmkM7veC6ZAzehXF/6mWn61ck8OO24AP7Yw9jqlUBK0S', 0, 0),
(21, 'asd', 'asda', 'me', 'me@gmail.com', '$2y$10$4RMInkLCa./O0E8hDWD56eXihZSgEno2uDr8OTQ/21DHP/vND0yau', 0, 0),
(22, 'asdf', 'asdfas', 'asdf', 'sdfsa@gmail.com', '$2y$10$SWrqnONbxPQrg2cNlCtABOdTmObOVGzoKXPj.nHgoObBn3jL7oM4q', 0, 0),
(23, 'asdsa', 'asdas', 'dsaf', 'asdf@gmial.com', '$2y$10$5DX1U0a/ln/uWh41rviwWOu.K8LQxVVcGgFrZeMkBucMQhgfXf0Qe', 0, 0),
(24, 'asdas', 'asdsa', 'asd', 'asdsa@gmail.com', '$2y$10$IOElcnQt490WN9T1lGLJlunAjNdWd26BC6m0ZdY2lFVnWFLE/KwLG', 0, 0),
(25, 'asdas', 'asdas', 'asdd', 'asd@gmail.com', '$2y$10$zc20VwECsBwuE9oTcHDpoOQTq2vl2mGdjIYQVljMtVfcw6oI0rozS', 0, 0),
(26, 'das', 'asdas', 'asdsa', 'awdsadgas@gmail.com', '$2y$10$cp63nLk7d2uYGCNicW57z.pDezZDYePGT7oCbqkrhqCIrqdaQVHzW', 0, 0),
(27, 'test', 'test', 'today', 'today@gmail.com', '$2y$10$SZSxT6JmPJfq/g6Qf045.O8.CuAppuU389s59EU5ugqgF88ClQJ7S', 0, 0),
(28, 'test', 'test', 'aaaaaaaaaaaa', 'today2@gmail.com', '$2y$10$0LjpgYQosXtZ9VRqTFNrnOUhOWj0mgDsTG7gX4iXg3hw6JGRDHB4e', 0, 0),
(29, 'testfortoday', 'tess', 'successtets', 'successtest@gmail.com', '$2y$10$mO0u6/heXD.cwG8T4erade/B5oxSBXDs6zdJKh8o6wYTyntoU10bm', 0, 0),
(30, 'wefw', 'wqw', 'qwq', 'wqw@gmail.com', '$2y$10$lRYbBIOsgqlVe8l05EFDKOpX6h9yrkKqC8Dw8Mxz2xLStuik1O9A6', 0, 0),
(31, 'tesaasd', 'aadadasQ', 'qqqq', 'qqq@gmail.com', '$2y$10$a4R13GrnqSXZuDMSW3Q/g.IBLL1VmbjLt02QhqAiJw8427wMpU1KO', 0, 0),
(32, 'nat', 'gracilla', 'nattest', 'qwe@gmail.com', '$2y$10$/1An8cHBmPLjnh/6DsDd6uRU901JHEku/e3mF2F7SsK7u/Q7uK9H.', 0, 0),
(33, 'dsfsf', 'sdfsa', 'qwe', 'qwertyyy@gmail.com', '$2y$10$XMrzFtrtJmhnjk4Nln1cw.z1SqWyZ0BMlBHSosQcA/iy2VaKH0.o6', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `workspace_id` int(11) NOT NULL,
  `board` int(11) NOT NULL,
  `Task` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`workspace_id`, `board`, `Task`) VALUES
(1, 1, 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`),
  ADD KEY `workspace_id` (`workspace_id`);

--
-- Indexes for table `board_task`
--
ALTER TABLE `board_task`
  ADD PRIMARY KEY (`board_task_id`),
  ADD KEY `board_id` (`board_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indexes for table `customized_template`
--
ALTER TABLE `customized_template`
  ADD PRIMARY KEY (`workspace_id`,`template_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `edited_template_task`
--
ALTER TABLE `edited_template_task`
  ADD PRIMARY KEY (`edited_task_id`),
  ADD UNIQUE KEY `unique_workspace_task` (`workspace_id`,`task_id`),
  ADD KEY `workspace_id` (`workspace_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`template_id`),
  ADD KEY `cated_id` (`categ_id`);

--
-- Indexes for table `template_task`
--
ALTER TABLE `template_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `temp_id` (`template_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_lvl` (`access_lvl`),
  ADD KEY `workspace_id` (`workspace_id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`workspace_id`),
  ADD KEY `board` (`board`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `board_task`
--
ALTER TABLE `board_task`
  MODIFY `board_task_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customized_template`
--
ALTER TABLE `customized_template`
  MODIFY `workspace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `template_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `template_task`
--
ALTER TABLE `template_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1217;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `workspace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `template` (`categ_id`);

--
-- Constraints for table `edited_template_task`
--
ALTER TABLE `edited_template_task`
  ADD CONSTRAINT `edited_template_task_ibfk_1` FOREIGN KEY (`workspace_id`) REFERENCES `workspace` (`workspace_id`),
  ADD CONSTRAINT `edited_template_task_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `template_task` (`task_id`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `users` (`access_lvl`);

--
-- Constraints for table `template_task`
--
ALTER TABLE `template_task`
  ADD CONSTRAINT `template_task_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `template` (`template_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
