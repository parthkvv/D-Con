-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 09:29 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Sr_No` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Sr_No`, `Name`, `Password`, `Admin`) VALUES
(1, 'Raj', '5a8f2530366a87ac7bfbd8e67acf9546', 'admin'),
(2, 'RAJJAAA', '5a8f2530366a87ac7bfbd8e67acf9546', ''),
(3, 'Hina', '5a8f2530366a87ac7bfbd8e67acf9546', 'admin'),
(4, 'KRUNAL', 'ed8096471e71c241c8c9a7350a01612a', ''),
(5, 'Parth', 'aab062f9d9c1ced58cefd28b59850ad4', 'admin'),
(6, 'Dev', '7e53c0c37c6d31a3d9fd88714b388107', 'admin'),
(7, 'JOHN', '30a22a074a44a4644f1d850c45fde7fb', ''),
(8, 'Eve', '26c0557a88055e819f0f351e8402fdc0', ''),
(9, 'Lucifer', '62af075f6818170ebf96ce486c3afe55', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `User_Id` int(6) NOT NULL,
  `Post_Id` int(6) NOT NULL,
  `Comment_id` int(11) NOT NULL,
  `Comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`User_Id`, `Post_Id`, `Comment_id`, `Comments`) VALUES
(3, 21, 2, 'One should be the knowing the basics of Programming and should have fun with it.'),
(1, 22, 3, 'Yes!! Its very impoertant to know th important quantities full stack developers.'),
(1, 4, 5, 'Yes!! Its very impoertant to know th important quantities full stack developers.'),
(1, 8, 6, 'Yes!! Its very impoertant to know th important quantities full stack developers.'),
(1, 28, 8, 'Working Hard is most important think that on should remember'),
(1, 27, 9, 'One should be the knowing the basics of Programming and should have fun with it.'),
(1, 26, 11, 'Working Hard is most important think that on should remember'),
(3, 25, 12, 'Hello i am eager to help'),
(2, 9, 13, 'Hello i am eager to help'),
(4, 10, 14, 'Nope could\'nt find an answer'),
(6, 11, 15, 'Yes go to chrome browser to find help'),
(7, 12, 16, 'Yes you can learn that from udemy'),
(9, 13, 17, 'Go to agoda.com to find out'),
(2, 14, 18, 'go to mysql serverbase to find answer'),
(3, 10, 19, 'Nope could\'nt find an answer'),
(5, 11, 20, 'Yes go to chrome browser to find help'),
(9, 12, 21, 'Yes you can learn that from udemy'),
(6, 13, 22, 'Go to agoda.com to find out'),
(1, 14, 23, 'go to mysql serverbase to find answer');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `User_Id` int(6) NOT NULL,
  `Developers_Id` int(6) NOT NULL,
  `Ratings` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`User_Id`, `Developers_Id`, `Ratings`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 3),
(7, 7, 2),
(8, 8, 5),
(9, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `User_Id` int(6) NOT NULL,
  `College_Name` varchar(50) NOT NULL,
  `Degree` varchar(30) NOT NULL,
  `Feild` varchar(30) NOT NULL,
  `Starting_date` date NOT NULL,
  `Ending_Date` date NOT NULL,
  `Project_Title` varchar(30) NOT NULL,
  `About_Project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`User_Id`, `College_Name`, `Degree`, `Feild`, `Starting_date`, `Ending_Date`, `Project_Title`, `About_Project`) VALUES
(1, 'GCET', 'BE', 'IT', '2020-12-01', '2020-12-31', 'D-conn', 'It is a website for developers'),
(2, 'GCET', 'B. Tech', 'CS', '2020-12-01', '2020-12-29', '', ''),
(3, 'BVM', 'B.Tech', 'CE', '2020-12-01', '2020-12-29', 'Dog care System', 'It is mobile application for dog training and helpful details'),
(4, 'ADIT', 'B. Tech', 'CP', '2020-08-03', '2021-03-31', '', ''),
(9, 'SVIT', 'B. E.', 'IT', '2020-08-04', '2020-08-04', 'E- Home Service', 'It is website'),
(5, 'SVNIT', 'B.Tech', 'CE', '2020-06-07', '2021-05-25', 'Gaming Website', 'Website for gamers'),
(6, 'GIDC', 'B. Tech', 'IT', '2020-12-01', '2020-12-11', 'Vehicle Renting Site', 'Website for vehicles renting'),
(7, 'BVM', 'B.Tech', 'CE', '0000-00-00', '0000-00-00', '', ''),
(8, 'ADIT', 'B. Tech', 'CS', '2020-12-01', '2021-03-31', '', ''),
(2, 'GCET', 'B.E', 'IT', '2020-12-07', '2020-12-07', 'D-coo', 'website');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `User_Id` int(6) NOT NULL,
  `Company_Name` varchar(30) NOT NULL,
  `Job_Tittle` varchar(30) NOT NULL,
  `Job_Location` varchar(30) NOT NULL,
  `Job_starting_date` date NOT NULL,
  `Job_Ending_date` date NOT NULL,
  `About_job` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`User_Id`, `Company_Name`, `Job_Tittle`, `Job_Location`, `Job_starting_date`, `Job_Ending_date`, `About_job`) VALUES
(9, 'SVIT', 'H R', 'Vasad', '2020-12-01', '2020-12-01', 'I am Hr'),
(1, 'XYS', 'Mobile App developer', 'Gujarat', '2020-12-01', '0000-00-00', 'I\'m mobile app developer'),
(2, 'ABC', 'Full Stack Developer', 'Mumbai', '2020-12-01', '0000-00-00', 'I m Devloper'),
(3, 'MNO', 'Junior Devloper', 'Mumbai', '2020-09-07', '2021-03-31', 'I was junior devloper'),
(4, 'ASD', 'Senior Developer', 'Benglore', '2020-04-01', '0000-00-00', 'I work as Senior developer'),
(5, 'XYS', 'Instructor', 'Delhi', '2020-12-01', '0000-00-00', 'I am good instructor'),
(6, 'PQR', 'Full Stack Developer', 'Kolkata', '2020-09-01', '2020-12-03', 'I am full stack developer'),
(7, 'RST', 'Junior Devloper', 'Mumbai', '2020-11-01', '0000-00-00', 'I am at mmbai working as junior devloper'),
(8, 'TWS', 'Senior Developer', 'Kerala', '2020-12-16', '0000-00-00', 'It is the job for Senior developer');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `User_Id` int(6) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Post_Description` varchar(10000) NOT NULL,
  `Post_Up_Votes` int(6) NOT NULL,
  `Post_Down_Votes` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`User_Id`, `Post_Id`, `Post_Description`, `Post_Up_Votes`, `Post_Down_Votes`) VALUES
(1, 1, 'hello how are you', 1, 1),
(3, 3, 'what is database?', 1, 0),
(1, 4, 'why flutter is better than native?', 5, 0),
(2, 5, 'Why there is less vacancy of Job in ML??', 3, 1),
(1, 6, 'What all thinks are important to learn building website?', 0, 0),
(1, 7, 'Hi', 0, 0),
(1, 8, 'What are the most important things that we need to learn ML', 0, 0),
(1, 9, 'What are the most important things that we need to learn ML', 0, 0),
(3, 14, 'When I try to build the \"A Minimal Book Example\" for Bookdown, I see an ivnerted picture on the RStudio Preview window, even though I set my RStudio preferences for \"Sweave\"\'s PDF Preview to \"System Viewer\".\r\n\r\nI obtained the example from: https://bookdown.org/home/about/.', 4, 1),
(4, 15, 'during my panel Linear model, I have a problem with an error popping up that says:\r\n\r\npool=plm(Ratio_Gini~Jumlah_Penduduk+PAD+IPM,data=panel,model=\"pooling\")\r\nsummary(pool)\r\nError in solve.default(vcov(x)[names(coefs_wo_int), names(coefs_wo_int)], : system is computationally singular: reciprocal condition number = 2.06839e-19\r\n\r\nIt appears, when I call the summary. The plm itself works actually and the results are saved in the environment. Any ideas, what is the problem? Thankyou', 5, 3),
(9, 16, 'After generating a resource (controller) using\r\n\r\n:Generate controller entries\r\n\r\n[No write since last change]\r\n      create  app/controllers/entries_controller.rb\r\n      invoke  erb\r\n      create    app/views/entries\r\n      invoke  test_unit\r\n      create    test/controllers/entries_controller_test.rb\r\n      invoke  helper\r\n      create    app/helpers/entries_helper.rb\r\n      invoke    test_unit\r\n      invoke  assets\r\n      invoke    coffee\r\n      create      app/assets/javascripts/entries.coffee\r\n      invoke    scss\r\n      create      app/assets/stylesheets/entries.scss\r\nvim-rails is showing (1 of 6): create in the status line / command window.\r\n\r\nAlso, the current buffer has automatically loaded the first created resource.\r\n\r\nDoes this mean rails-vim has loaded all the files generated by rails? If yes, how to traverse through those list of files one by one?', 9, 4),
(5, 17, 'I am working on an Android application in which I face an issue in Android push notification icon.\r\n\r\nThe notification icon does not display its content instead displaying in grey colour.\r\n\r\nAfter the research, I could understand that there is a change required in icon for adding transparent and/or white backgrounds since the Android version 5.0\r\n\r\nBut, my problem now is that I am unable to strongly convey my client about this issue as he shared a screenshot of his Realme X2 Pro device.\r\n\r\nt seems that sometimes the device displays in right manner but sometimes not. Please help me find out the solution.', 7, 1),
(2, 18, '\r\nI\'m trying to wrap some api request\r\n\r\n[Route(\"foo\")]\r\npublic Task Foo()\r\n{\r\n    using var http = new HttpClient();\r\n    return http.PostAsync(\r\n                  Endpoint,\r\n                  new FormUrlEncodedContent(new Dictionary<string, string>\r\n                  {\r\n                      { ClientId, \"ClientId\" },\r\n                  }),\r\n                  CancellationToken.None)\r\n            .ConfigureAwait(false);\r\n}', 5, 6),
(7, 19, 'I\'ve been stuck with this error anybody can figure this out? I keep getting an error right away. I\'m thinking it is a simple fix, but I can\'t figure it out. I\'ve been fixing this a while and I don\'t know where. Thank you for you help.\r\nimport java.util.Scanner;\r\n\r\n', 7, 8),
(8, 20, 'I know iOS has a Framework CallKit with Call Directory App Extension that can show caller name when phone is coming, but I want to know if the built-in phone app can show the name? does anyone explain to me?', 5, 2),
(6, 21, 'I have a df that contains several IDs, I´m trying to run a regression to the data and I need to be able to split it by ID to apply the regression to each ID:\r\n\r\nSample DF (this is only a sample real data is larger)\r\nI tried to save the ID´s within a list like this:\r\n\r\nid_list = []\r\n\r\nfor data in df[\'id\'].unique():\r\n    id_list.append(data)\r\nThe list output is [1,2,3]\r\n', 5, 1),
(5, 22, 'during my panel Linear model, I have a problem with an error popping up that says:\r\n\r\npool=plm(Ratio_Gini~Jumlah_Penduduk+PAD+IPM,data=panel,model=\"pooling\")\r\nsummary(pool)\r\nError in solve.default(vcov(x)[names(coefs_wo_int), names(coefs_wo_int)], : system is computationally singular: reciprocal condition number = 2.06839e-19\r\n\r\nIt appears, when I call the summary. The plm itself works actually and the results are saved in the environment. Any ideas, what is the problem? Thankyou', 5, 3),
(2, 24, 'I am working on an Android application in which I face an issue in Android push notification icon.\r\n\r\nThe notification icon does not display its content instead displaying in grey colour.\r\n\r\nAfter the research, I could understand that there is a change required in icon for adding transparent and/or white backgrounds since the Android version 5.0\r\n\r\nBut, my problem now is that I am unable to strongly convey my client about this issue as he shared a screenshot of his Realme X2 Pro device.\r\n\r\nt seems that sometimes the device displays in right manner but sometimes not. Please help me find out the solution.', 7, 1),
(4, 25, '\r\nI\'m trying to wrap some api request\r\n\r\n[Route(\"foo\")]\r\npublic Task Foo()\r\n{\r\n    using var http = new HttpClient();\r\n    return http.PostAsync(\r\n                  Endpoint,\r\n                  new FormUrlEncodedContent(new Dictionary<string, string>\r\n                  {\r\n                      { ClientId, \"ClientId\" },\r\n                  }),\r\n                  CancellationToken.None)\r\n            .ConfigureAwait(false);\r\n}', 5, 6),
(9, 26, 'I\'ve been stuck with this error anybody can figure this out? I keep getting an error right away. I\'m thinking it is a simple fix, but I can\'t figure it out. I\'ve been fixing this a while and I don\'t know where. Thank you for you help.\r\nimport java.util.Scanner;\r\n\r\n', 7, 8),
(1, 27, 'I know iOS has a Framework CallKit with Call Directory App Extension that can show caller name when phone is coming, but I want to know if the built-in phone app can show the name? does anyone explain to me?', 5, 2),
(5, 28, 'I have a df that contains several IDs, I´m trying to run a regression to the data and I need to be able to split it by ID to apply the regression to each ID:\r\n\r\nSample DF (this is only a sample real data is larger)\r\nI tried to save the ID´s within a list like this:\r\n\r\nid_list = []\r\n\r\nfor data in df[\'id\'].unique():\r\n    id_list.append(data)\r\nThe list output is [1,2,3]\r\n', 5, 1),
(2, 29, 'hello i have doubt', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `User_Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Company_Name` varchar(40) NOT NULL,
  `Comapny_Website` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Skills` varchar(100) NOT NULL,
  `About_You` varchar(300) NOT NULL,
  `LinkedIn_Profile` varchar(50) NOT NULL,
  `Github_Profile` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`User_Id`, `Name`, `Status`, `Company_Name`, `Comapny_Website`, `City`, `State`, `Skills`, `About_You`, `LinkedIn_Profile`, `Github_Profile`) VALUES
(1, 'Raj', 'Junior Devloper', 'XYS', 'http://ww.xyhz.com', 'Anand', 'Gujarat', 'Html, Css, Php, Javascript', 'I\'m Junior Devloper at XYZ', 'http://www.raj_linkedin.com', 'http://www.raj_github.com'),
(2, 'Raja', 'Student', 'GCET', 'http://www.gcet.com', 'Aanand', 'Gujarat', 'Java, Pyhton, C/C++, ', 'I m student at gcet', 'http://www.raja_linkedin.com', 'http://www.raja_lgithub.com'),
(3, 'Hina', 'Full Stack Devloper', 'MNO', 'http://ww.mno.com', 'Surat', 'Gujarat', 'Html, Css, MangoDB, NodeJs, React', 'I\'m Full Stack Devloper', 'http://www.hina_linkedin.com', 'http://www.hina_github.com'),
(4, 'Krunal', 'App Developer', 'TWS', 'http://www.tws.com', 'Navsari', 'Gujarat', 'FLutter, Android, Firebase', 'I am app devloper', 'http://www.k_linkedin.com', 'http://www.k_github.com'),
(6, 'John', 'Student', 'ADIT', 'http://www.adit.com', 'Aanand', 'Gujarat', 'ML, Ai, Data Science, Html, Css, Js', 'i am student at ADIT', 'http://www.john_linkedin.com', 'http://www.john_github.com'),
(8, 'Eve', 'Developer', 'SDF', 'http://ww.sdf.com', 'Bharuch', 'Gujarat', 'ML, Ai, Data Science, Cloud Computing, AWS', 'Im developer at SDF company', 'http://www.eve_linkedin.com', 'http://www.eve_github.com'),
(9, 'Lucifer', 'Student', 'BVM', 'http://www.bvm.com', 'Aanand', 'Gujarat', 'Html, Css, Js, Angular, Java, Python, C', 'I am student', 'http://www.luc_linkedin.com', 'http://www.luc_github.com'),
(5, 'Parth', 'Junior Developer', 'WXYZ', 'http://www.wxyz.com', 'Jamnagar', 'Guajart', 'Html, Css, Php', 'I am Junior Developer', 'http://www.parth.linkedin.com', 'http://www.parth.github.com'),
(7, 'DEV', 'Instructor', 'ASD', 'http://ww.asd.com', 'Rajkot', 'Gujarat', 'HTML, CSS, PHP, NODEJS, JAVASCRIPT, ANGULAR, MERN, REACT', 'I\'m instructor', 'http://www.dev_linkedin.com', 'http://www.dev_linkedin.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Sr_No`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Sr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
