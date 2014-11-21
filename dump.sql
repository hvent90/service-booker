-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dates
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `dates`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dates` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dates`;

--
-- Table structure for table `advisor_company`
--

DROP TABLE IF EXISTS `advisor_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisor_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisor_company`
--

LOCK TABLES `advisor_company` WRITE;
/*!40000 ALTER TABLE `advisor_company` DISABLE KEYS */;
/*!40000 ALTER TABLE `advisor_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advisor_expertise`
--

DROP TABLE IF EXISTS `advisor_expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisor_expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `expertise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisor_expertise`
--

LOCK TABLES `advisor_expertise` WRITE;
/*!40000 ALTER TABLE `advisor_expertise` DISABLE KEYS */;
INSERT INTO `advisor_expertise` VALUES (1,1,1),(3,1,2),(4,2,41),(5,2,3),(6,2,12),(7,3,4),(8,3,5),(9,3,6),(12,4,9),(13,5,10),(14,5,11),(15,5,12),(16,6,13),(17,6,38),(18,6,14),(19,7,15),(20,7,16),(21,7,17),(22,8,18),(23,8,19),(24,8,20),(25,9,21),(26,9,22),(27,9,2),(28,10,23),(29,10,24),(30,10,25),(31,11,26),(32,11,27),(33,11,28),(34,12,29),(35,12,30),(36,12,31),(37,13,32),(39,13,34),(40,14,35),(41,14,36),(42,14,37),(43,15,38),(44,15,39),(45,15,40),(46,16,41),(47,16,42),(48,16,43),(53,1,42),(54,1,44),(55,19,21),(57,19,2),(58,18,2),(59,20,2),(60,20,43),(68,22,2),(69,22,45),(70,22,12),(71,4,46),(72,4,45),(73,4,42),(74,19,12),(76,6,2),(77,21,47),(79,21,49),(81,21,50),(82,21,48),(84,13,2),(89,17,25),(90,20,46),(91,20,9),(93,20,56),(94,20,57),(95,20,58),(96,20,59),(97,20,60),(98,20,61),(99,20,62),(100,20,63),(101,20,64),(102,20,45),(103,13,65),(104,13,66);
/*!40000 ALTER TABLE `advisor_expertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advisor_meeting`
--

DROP TABLE IF EXISTS `advisor_meeting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisor_meeting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `meeting_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisor_meeting`
--

LOCK TABLES `advisor_meeting` WRITE;
/*!40000 ALTER TABLE `advisor_meeting` DISABLE KEYS */;
INSERT INTO `advisor_meeting` VALUES (1,17,1),(2,17,2),(3,17,3),(4,17,4),(5,17,5),(6,17,6),(7,1,7),(8,1,8),(9,1,9),(10,18,10),(11,1,11);
/*!40000 ALTER TABLE `advisor_meeting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advisor_service`
--

DROP TABLE IF EXISTS `advisor_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisor_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `advisor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisor_service`
--

LOCK TABLES `advisor_service` WRITE;
/*!40000 ALTER TABLE `advisor_service` DISABLE KEYS */;
INSERT INTO `advisor_service` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1);
/*!40000 ALTER TABLE `advisor_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advisors`
--

DROP TABLE IF EXISTS `advisors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `permissions` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `advisors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisors`
--

LOCK TABLES `advisors` WRITE;
/*!40000 ALTER TABLE `advisors` DISABLE KEYS */;
INSERT INTO `advisors` VALUES (1,'Chris','Dima','','I solve problems and create opportunities by connecting the dots in new media and technology. I’m at home in the churn of technological change and media upheaval — that’s where the fun is.\r\n\r\n','chris@walnutstlabs.com','$2y$10$YiA4coeEHyvaR.O3Q97XhuOoSmGug8kO2naD4MqXA.Z/b6I7ZtG9y',0,100,'2014-11-11 17:35:33','2014-11-19 16:43:26','UcHJuzRSJHkLXmXKB9GtIPPcBHjPSP4rQYNHCLEtaVcsmXz0HmtUDMmPxLYz','/img/profile/chrisdima.jpg',''),(2,'Kevin','Fleming','','I’m a partner at Walnut St. Labs and the founder of multiple internet and technology based startups. I work directly with founders to help them refine and validate their idea, build a prototype, go to market and scale.\n\n“In the 20 minutes I spent with Kevin, I learned so much. He encouraged me to think about how to monetize and create repeatability. That wasn’t the important part, though. I sensed WSL was a special place. It was humming with creative energy, fearless exploration, and critical thought. I wanted to become a part of it.I attended everything at WSL for that summer: all the Startup Meetups and every single Night Owls. Im now the special events coordinator, including WSL’s Indie Film Nite and the West Chester Chili Cook-off. Im grateful to be a part of WSL’s mission and I never would have thought that it would have resulted from a 20 minute meeting.”\n–Jesse Piersol, WCUPA Professor & WSL Special Events Coordinator','kevin@walnutstlabs.com','$2y$10$9QsDSgBbIEcPjjKSa2CbZeBq/cPK/PYpc2VlWHQ2ro.DMm0.wqWFq',0,100,'2014-11-11 17:35:33','2014-11-11 17:35:33',NULL,'/img/profile/kevinfleming.jpg',''),(3,'Mary','Fuchs','','Mary Fuchs has helped companies in the region receive millions of dollars in grants and tax credits. Mary currently leads the Ideas x Innovation Network directing program initiatives and resources to support emerging growth businesses throughout their entire life cycle by leveraging the assets of academic institutions and other partners. Mary also helped start two innovation centers in Chester County for technology (along with Evolve IP and GPX Realty) and life science (along with The Hankin Group) entrepreneurs and continues to provide support for those centers as well as Walnut St. Labs.Mary has been with CCEDC/Seedcopa since 2006. Prior to leading the i2n initiative, she worked with CCEDC’s health care industry partnership. Mary also served as the director for adult training and education programs in Chester County for Delaware County Community College. She worked in marketing for a major pharmaceutical company and was a general manager of a small publishing company in West Chester.','mfuchs@cceconomicdevelopment.com ','$2y$10$TxMkr51y7f7qq.Xs1Ke8HeyQctRI39VNj3/vkfWe0Dj4mkR3s1gVW',0,1,'2014-11-11 17:35:33','2014-11-11 17:35:33',NULL,'/img/profile/maryfuchs.jpg',''),(4,'Dave','Mann','','I’ve been “working with computers” (as my friends and family call it) for just shy of 20 years. In that time, I’ve done everything from Novell and Windows NT networking to Lotus Notes development and administration, cc:Mail and Exchange and now SharePoint. Recently, I’ve been involved with Windows Azure, Amazon Web Services (AWS), WordPress, PHP, ASP.NET MVC, Orchard CMS and mobile technologies – Apple, Android and Windows Phone.','Dave@mannsoftware.com','$2y$10$mxlygnXXuZkhXHUKmVlnauGv221W9VgbXred8f28DB.Oz99qfiLdS',0,1,'2014-11-11 17:35:33','2014-11-18 05:37:31','S5BVIc17DYEJIT9nhbtra5t2qolQfwvx4Q6X6Q8wtzMKx2PANCiDAjAzHggH','/img/profile/davemann.jpg',''),(5,'Terry','Kerwin','','Terry Kerwin is a business attorney who works with clients across a range of industries. He regularly advise to start-up, emerging growth and middle market businesses on corporate matters from formation to exit, including entity structure, governance issues, intellectual property protection and transfer, contract preparation and review, corporate finance (including angel, private equity and venture capital transactions), and mergers and acquisitions. Terry also serves as an advisor to Walnut St. Labs.','tkerwin@foxrothschild.com','$2y$10$0DJ9M/TcVnueikSSp7KhZuCZEpJYGX8lLKeETEAk41g3T.AZTHFSW',0,1,'2014-11-11 17:35:33','2014-11-18 17:04:33','x7ez3r7SK4yCh2b8GiI5I8lt4D5ovoa8i2n900KzZuaEpvfpGAhnpHFlNHEY','/img/profile/terrykerwin.jpg',''),(6,'Raymond','Sarnacki','','Pitching is an essential tool for entrepreneurs, whether you are raising money or trying to reach agreement with a key partner. A bad pitch will kill even the best of ideas. Raymond’s experience with entrepreneurs as a venture capitalist, business plan competition judge and mentor over the past 14 years can help you understand the communications process, unique characteristics and best practices to craft a persuasive message about your business model.','rpsarnacki@gmail.com','$2y$10$DJ/Ecu.yxHjAm/1CfNSZLOLcLPRR1cyrB9iaO2WDG.whJ6vRBCOWm',0,1,'2014-11-11 17:35:33','2014-11-19 16:18:15','HrzRjkeWz7tyPCBVqUCb6PDZRZPU3cSP1UwfO2j4G95osCqMROA3AOmCEwn8','/img/profile/raymondsarnacki.jpg',''),(7,'Craig','Schroeder','','Craig Schroeder is the owner and general manager of Blue Skies Properties, a residential real estate investment company. He is also an early-stage investor, board member, and past president of Robin Hood Ventures, a Philadelphia-based early stage investment partnership.\n\nPrior to starting this business, he worked for 16 years at MBNA (now part of Bank of America), serving as senior executive vice president from 1996 to 2005. He has a bachelor’s degree in psychology, and a master’s degree in computer and information technology, both from the University of Pennsylvania.','craig@sunriseinnovation.com','$2y$10$YK/IfW27fsQYuhM0w/s04.4avkzp92pH9YswTI2q0ccCgUWokQZ7y',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/craigschroeder.jpeg',''),(8,'Eamon','Gallagher','','Eamon Gallagher understands the intersection of policy, business and law, and he applies that understanding to his work with several entrepreneurship and startup initiatives in and around Philadelphia. He worked in Drexel’s Entrepreneurial Law Clinic, founded its Transactional Law Team, and volunteered at Philadelphia Volunteer Lawyers for the Arts. He has also served as a Due Diligence Fellow for Keiretsu Forum Mid-Atlantic, and he has a wealth of knowledge about crowdfunding and the JOBS Act. Eamon’s first career was in corporate recruiting before he decided to return to school to pursue law. He earned a J.D. from the Earle Mack School of Law at Drexel University with a concentration in Business and Entrepreneurship Law. He also holds a B.S. in Public Policy and a B.A. in Philosophy from the University of Rhode Island. Eamon is licensed to practice law in Pennsylvania only. He has been providing support to Weber Law and its clients since May 2013. In his limited free time, Eamon likes to steal away to his man cave to watch English Premier League soccer with his dog.','eg@weberlawyers.com','$2y$10$Q3Wg5vZyQ4gdb/Y2cnliheh0ardbOVYjVxkqb/PbHI7pHAYKB2/gO',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/eamongallagher.jpg',''),(9,'Mark','Rybarczyk','','Mark created his first two companies from scratch, both in the financial services sector, which he operated over a period of 15 years. He has successfully managed a multi-million dollar warehouse line of credit for those businesses and was a finalist as the entrepreneur of the year. He has always been proud of his perseverance to overcome obstacles thrown his way in both business and in life. Passionate about all things tech related and web related he has been living the startup life for the past six years.  His frustration with outsourced developers was his inspiration to teach himself web development and he has re-built his own site Vuier in Ruby on Rails along with his Co-Founder/CTO.  ','mark@vuier.com','$2y$10$FEFjrreRpiE5t5DQCPfYQuvzbmq36LI402PDKfdci9bIY6/p/eYKG',0,1,'2014-11-11 17:35:34','2014-11-21 18:42:36',NULL,'/img/profile/markrybarczyk.jpg','https://www.linkedin.com/in/markrybarczyk'),(10,'Stacy','Martin','','Stacy has over 25 years of commercial real estate experience in the Chester, Montgomery, Bucks and Delaware Counties. Experienced in representing both tenants and landlords from start ups to Fortune 100 companies. She Represents the Innovation Center at Eagleview, and is an Executive Board Member of the Chester County Chamber of Business and Industry, i2n Board Member, STEM Academy Advisory Board. Ms. Martin is also Philadelphia Business Journal’s Women of Distinction Awardee 2012.','stacy.martin@hankingroup.com','$2y$10$2550dv2crrjLEcZAis0Vf.hwM0AnKvQQlQuHL5tkv.w0TfF3TRRuu',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/stacymartin.jpg',''),(11,'Paul','Prestia','','Paul Prestia received his Bachelor of Science in Chemical Engineering (BSChE) at Lehigh University and his Juris Doctorate (JD) at Georgetown University. Paul started and ran prominent IP firm, RatnerPrestia, for many years. He recently retired in 2013 and decided to contribute his time to helping young professionals succeed. He presently volunteers at SCORE, a nationally recognized organization comprised of retired professionals that offer free business insights.','pfpvfpa@gmail.com','$2y$10$ovzhNN5gD7KytN2XMCPMQukoeAWyCuaK7apTohbTZc53KLmiNAQ2m',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/paulprestia.jpg',''),(12,'Denise','Smart','','As President of Smart Consulting Group, Denise have over 30 years’ of Life Science industry-specific manufacturing and quality experience with such companies as SmithKline Beecham, DuPont, Wyeth, Pfizer and Schering-Plough. With a plethora of experience in providing FDA regulatory compliance consulting services, She has a true passion for providing solutions to the Life Sciences industry’s most difficult and complex challenges.\n\nDenise holds a BS in Biology from Kutztown University, a MBA from Penn State, and a JD from Widener Law School. While attending Widener University School of Law, She realized my instinctual passion for health and corporate law, which led to a desire to start my own pharmaceutical consulting firm right in the borough of West Chester, Pa.\n\nMs. Smart is a certified Women’s Business Enterprise (WBENC) business owner, meaning that she is dedicated to continually gaining relationships with local women owned businesses as a way to ultimately provide a sense of community for women entrepreneurs in the region.\n\nHer expert team at Smart Consulting Group focuses on quality compliance, regulatory affairs, training, product/process development/manufacturing, laboratory services, project management. The SCG team also provides highly specialized services to the government supporting the Biological Advanced Research and Development Authority (BARDA) within HHS, serving as Interim Monitor of pharmaceutical divestitures for Federal Trade Commission and providing strategic regulatory compliance advice to the FDA. I am dedicated to providing outstanding technical and regulatory services to SCG’s client base as a way to truly change the nature of this industry.','dsmart@smartconsultinggroup.com','$2y$10$wEv5C80sukuJlIeNP0U3VOzrRUW1.7h2kdzpfQwEuJJk6RzZ8Ri.e',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/denisesmart.jpg',''),(13,'Wilson','Chu','','Wilson is a marketing and business development specialist with extensive experience in chemical, environmental, power, energy and semiconductor industries.  He is an active SCORE mentor counseling small business.  He has a BS in Chemical Engineering and gained years of Global Business Development and Marketing experience during his time at Johnson Matthey Stationary Emissions Control, Product Development for The Franklin Mint and Process Development for Goodyear Tire & Rubber Co.  Wilson also has extensive experience with federal and state government agencies raising monies for R&D and Demonstrations as well as providing expert advice to these agencies on catalytic emissions reduction technology.  He is a West Chester resident.','wchu@comcast.net','$2y$10$q0NXQLCKyM.pmZB4SzSSj.TzOqNUhlRJng9H1WhKNEzfKbwqTnhqa',0,1,'2014-11-11 17:35:34','2014-11-21 18:14:29','OIgzeVrfW3KibU80i1Qq1RsrDUddC4vvSs7CTNjB6dRBNC7t42M4f5Zu9KwI','/img/profile/wilsonchu.jpg','https://www.linkedin.com/profile/view?id=28832745&authType=NAME_SEARCH&authToken=EMDU&locale=en_US&srchid=288327451416593637577&srchindex=1&srchtotal=6&trk=vsrp_people_res_name&trkInfo=VSRPsearchId%3A288327451416593637577%2CVSRPtargetId%3A28832745%2CVSRPc'),(14,'Lars','Knutsen','','Dr. Knutsen heads up a new start-up Biotech, Requis Pharma, which is developing a drug treatment for snoring and other sleep disorders. He began his Pharma Research career at Glaxo Group Research in Ware, Herts., UK after completing his M.A. in Chemistry at Christ Church, Oxford. While at Glaxo he completed a Ph.D. in Medicinal Chemistry, and joined Novo Nordisk in Denmark in 1986.\n\nWhile in the Novo Central Nervous System R & D Group he led projects that identified Tiagabine, a marketed anticonvulsant acting as a GABA uptake inhibitor, and then selected adenosine agonist drug candidates for Stroke.\n\nIn 1997, he joined Vernalis (Cerebrus) in the UK as Associate Director of Medicinal Chemistry, initiating projects such as the adenosine A2A antagonist program leading to V2006/BIIB014 that showed PoC in Phase II trials for Parkinson’s disease in 2008. He joined Ionix Pharmaceuticals Ltd., a pain-focused Biotech in Cambridge, UK in 2001 as Director of Chemistry. In 2005 Lars moved to the Cephalon CNS Medicinal Chemistry group as the company’s first Distinguished Scientist, where he invented the histamine H3 antagonist Irdabisant (CEP-26401), now in Phase II clinical trials for Cognition.','l.knutsen@requispharma.com','$2y$10$8YdgxYTRtlSc3.Fc2TkIFetq7RG.HRKiI4vdNc2v7ubUC0ULmMWZ2',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/larsknutsen.jpg',''),(15,'Jim','Lauckner','','Jim has over 20 years of Management, Recruiting and Sales experience. The last five years he has been focusing on Workforce Development and Industry Clusters. Jim has also assisted companies establish successful, cost effective recruiting and retention programs while developing their staff members to become better managers, consultants, recruiters and sales professionals. He has hired and placed hundreds of Information Systems professionals and is familiar with multiply industries including Pharmaceuticals, Financials, Insurance, Manufacturing, Telecom, Health Care and Consulting.','jlauckner@cceconomicdevelopment.com','$2y$10$OcgqSwuasGtlMyroZmcqV.swollaJGn.15e7As7stN9kF1XGKaaaO',0,1,'2014-11-11 17:35:34','2014-11-11 17:35:34',NULL,'/img/profile/jimlauckner.png',''),(16,'Leo','Daiuto','','Leo am a husband, a father, a musician, a technology geek and an entrepreneur.Leo is a creative professional with a passion for creating compelling experiences. He\'s been building and leading creative teams for over 15 years. \r\n\r\nAs the SVP of User Experience & Innovation @ Evolve (and Formerly head of New Product Development), Leo was the driver and showed how people interact with our platform, products and brand as well as product innovation, design and marketing initiatives. \r\n\r\nFormerly the Founder and CEO of software design agency Slamm Creative, he has a passion for building not only great experiences but a true passion for building and developing the creating teams that build them. Prior to that, Leo was Director of Human Factors and Design at Unisys. ','leo@leodaiuto.com','$2y$10$Rv5axvoj78gdEDkVtiUD3uuNR99u.w4XPGjXjhvF237RGoHjHOMNG',0,1,'2014-11-11 17:35:34','2014-11-17 22:48:43','cZ6jNU0SWMF2uXRDH1yhUJKVBY84U4BrcT47iJWT7FM2imjDyQIY4hR6F7Ob','/img/profile/leodaiuto.jpg',''),(17,'Barry','White','','testesttestfsadf','hvent90@gmail.com','$2y$10$3l47eZrLJ2Z2ht5w0PHub.xhACRWCHRoF.PqaIUhiuf36TT0h4cly',0,999,'2014-11-11 17:35:34','2014-11-21 18:13:47','a3pU48M54l7AUcRDNB0XqGhEATWYMsXslBjz6EPuzRlEdFlg7cKdxYFFSkjG','','http://hvent90@gmail.com'),(18,'Ben','Bock','','Community Evangelist at WSL \r\n\r\nBenjamin Bock coordinates the Walnut St Labs’ Startup Meetups and Night Owls events. He’s the “go-to guy” for coworking and community-based inquiries. Ben maintains the site and regularly updates our blog with each week’s most notable happenings. He blasts out our social media and press releases and is happy to get behind your startup’s successes and champion your cause. Ben recently received his MA in Industrial/Organizational Psychology and loves meditation.','ben@walnutstlabs.com','$2y$10$DQhAlpkE5fQHsVkfqGszlujKP6j9aVTncGEfydwFtW8tV.m3cXsA.',0,100,'2014-11-13 19:43:57','2014-11-17 23:36:15','rnUIF8AUk2UeJLlhcqZl3VOOXpJtv5VEi4y1SezU7v1dw6VQkjfIxaHX3lYt','',''),(19,'Jim','O\'Brien','','Jim is an experienced CFO with a strong accounting, tax, and business financing background. Most recently, Jim led the finance function of Synygy, a privately owned global cloud software and services company specializing in incentive compensation programs and sales performance management, for over 13 years. Previously, Jim worked for 14 years as Vice President Finance and Controller at publicly held IMS HEALTH, the healthcare information subsidiary of Dun & Bradstreet, where he was also part of a team that executed numerous acquisitions and divestitures, performed due diligence, and implemented numerous programs to improve cash flow.\r\n\r\nJim has experience obtaining government grants and tax credits, executing loans from hedge funds and commercial banks, and raising venture capital.\r\n\r\nJim is excited to use his finance expertise in software, professional services, IT, and pharma to help entrepreneurs, start-ups and growing companies achieve their goals.','jim.obrien.cfo@gmail.com ','$2y$10$C0JxM88WgOXF85chTVVoMuQLuTNAzhTf9st5rM3On2rbh5ts1FeIq',0,1,'2014-11-17 15:21:26','2014-11-18 15:37:01','nISMq0CTniGKl0uJzW3IWwLegyXY99OBtnJgjrJGD42S0rU0ZPUkRTH1hB8O','',''),(20,'Ilya ','Lehrman','','<p>I\'ve been intimately connected with the technology scene since mid-90s. Having spent 10 years working on large scale information management solutions and high-volume datacenter projects, I decided to start a  company dedicated to moving technology services to enterprise cloud infrastructure.</p>\r\n<p>inWorks LLC now focuses almost exclusively on three things:</p>\r\n<ul><li>helping customers move to the cloud</li>\r\n<li>providing ongoing support for cloud and on-premises technology solutions via MSOnlineHelpdesk.com</li>\r\n<li>building scalable enterprise apps on top of cloud platforms</li>\r\n</ul>\r\n<p>Go to <a href=\"http://msonlinehelpdesk.com\">MSOnlineHelpdesk.com</a> and <a href=\"http://inworksllc.com\">inWorks LLC</a> to learn more about our services and get assistance with your technology projects!</p>','ilya@inworksllc.com','$2y$10$.o4Wf.NO7ZFd/kT7eGoFCufkOZeryMgsZSbsC/ITIyIyHL/IOaFFK',0,1,'2014-11-17 15:47:09','2014-11-21 18:19:02','Gadl5s8C27bdTU0ZEdMSVngtAjNbzuOVq1xtlX0gVLXddJqYK4xA0jpB0Nlz','','http://www.linkedin.com/in/ilyalehrman'),(21,'David   ','Chopko','','David Chopko worked at the Pittsburgh Corporate Law firm as a Legal Counsel. He also spent time at DuPont, working primarily on positions in finance and marketing areas. David worked for W.L. Gore and oversaw several businesses and helped others launch businesses. At S.C Blodgett, David worked in the following areas: M&A, Capital raises, Co. Valuations, New & emerging business consulting He is a current professor at the University of Delaware (Lerner Business School) and teaches classes on pricing and market planning ','chopkod@udel.edu','$2y$10$LJcPdXi9Pd.kOZ46oOoYY.YBdbWnKDIwsPkvjGt6Hf/3HsKFmipZG',0,1,'2014-11-17 16:01:17','2014-11-18 17:29:17','qZi7YAPYsrFLpTALGxAsV0t7pbr96QGWfYqkoHqJBrAOupojWnuNdken7TIr','',''),(22,'Guy','Fardone','','Guy is a Founding Partner of Evolve IP, the nation\'s leading Cloud Services Company. With 25 years of visible business success, Guy has led and launched business practices from $1M to $400M, founded companies, led dozens of buy and sell side acquisitions and conducted business turnarounds at all levels. Guy is also an active board adviser with i2n, PACT, VISTA 2025, STEM, Junior Achievement and several technology start ups. He lives in Chester County with his wife and 3 children. ','gfardone@evolveip.net ','$2y$10$ejO.jTtl4XBwv10TdXMbguZbnkiyFBxrlQsEF.wWxMdvVNRCAWxGi',0,1,'2014-11-17 16:08:22','2014-11-17 23:37:08','Pbgi0DEmhNk3oJxKEVsO0wyqkD8WWaWvnjb3LBcDUTAsOleS5MLm4HKD8ixT','','');
/*!40000 ALTER TABLE `advisors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availabilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `is_booked` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `reminder_sent` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availabilities`
--

LOCK TABLES `availabilities` WRITE;
/*!40000 ALTER TABLE `availabilities` DISABLE KEYS */;
INSERT INTO `availabilities` VALUES (9,'','',0,'2014-11-13 02:35:50','2014-11-13 02:35:50',0),(10,'','',0,'2014-11-13 02:35:50','2014-11-13 02:35:50',0),(17,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(18,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(19,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(20,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(21,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(22,'','',0,'2014-11-17 22:45:44','2014-11-17 22:45:44',0),(31,'','',0,'2014-11-17 22:58:35','2014-11-17 22:58:35',0),(32,'','',0,'2014-11-17 22:58:35','2014-11-17 22:58:35',0),(33,'','',0,'2014-11-17 22:58:35','2014-11-17 22:58:35',0),(34,'','',0,'2014-11-17 22:58:35','2014-11-17 22:58:35',0),(35,'','',0,'2014-11-18 00:34:44','2014-11-18 00:34:44',0),(36,'','',0,'2014-11-18 00:34:44','2014-11-18 00:34:44',0),(37,'','',0,'2014-11-18 00:34:44','2014-11-18 00:34:44',0),(38,'','',0,'2014-11-18 00:34:44','2014-11-18 00:34:44',0),(39,'','',0,'2014-11-18 00:35:20','2014-11-18 00:35:20',0),(42,'','',0,'2014-11-18 00:44:52','2014-11-18 00:44:52',0),(43,'','',0,'2014-11-18 00:44:52','2014-11-18 00:44:52',0),(44,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(45,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(46,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(47,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(48,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(49,'','',0,'2014-11-18 13:17:42','2014-11-18 13:17:42',0),(52,'','',0,'2014-11-18 13:17:50','2014-11-18 13:17:50',0),(53,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(54,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(55,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(56,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(57,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(58,'','',0,'2014-11-18 13:18:24','2014-11-18 13:18:24',0),(61,'','',0,'2014-11-18 15:48:43','2014-11-18 15:48:43',0),(62,'','',0,'2014-11-18 15:50:16','2014-11-18 15:50:16',0),(63,'','',0,'2014-11-18 15:50:16','2014-11-18 15:50:16',0),(64,'','',0,'2014-11-18 15:50:45','2014-11-18 15:50:45',0),(65,'','',0,'2014-11-18 15:50:45','2014-11-18 15:50:45',0),(66,'','',0,'2014-11-18 15:51:17','2014-11-18 15:51:17',0),(67,'','',0,'2014-11-18 15:51:17','2014-11-18 15:51:17',0),(74,'','',0,'2014-11-18 17:05:40','2014-11-18 17:05:40',0),(81,'','',0,'2014-11-19 16:12:24','2014-11-19 16:12:24',0),(82,'','',0,'2014-11-19 16:12:24','2014-11-19 16:12:24',0),(83,'','',0,'2014-11-19 16:31:01','2014-11-19 16:31:01',0),(84,'','',0,'2014-11-19 16:31:01','2014-11-19 16:31:01',0),(85,'','',0,'2014-11-19 16:31:33','2014-11-19 16:31:33',0),(86,'','',0,'2014-11-19 16:31:33','2014-11-19 16:31:33',0),(87,'','',0,'2014-11-19 16:31:49','2014-11-19 16:31:49',0),(88,'','',0,'2014-11-19 16:31:50','2014-11-19 16:31:50',0),(91,'','',0,'2014-11-19 16:42:54','2014-11-19 16:42:54',0),(92,'','',0,'2014-11-19 16:42:54','2014-11-19 16:42:54',0),(97,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(98,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(99,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(100,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(101,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(102,'','',0,'2014-11-19 20:42:48','2014-11-19 20:42:48',0),(103,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(104,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(105,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(106,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(107,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(108,'','',0,'2014-11-19 20:42:49','2014-11-19 20:42:49',0),(117,'','',0,'2014-11-21 17:28:43','2014-11-21 17:28:43',0),(118,'','',0,'2014-11-21 17:28:43','2014-11-21 17:28:43',0),(119,'','',0,'2014-11-21 17:28:57','2014-11-21 17:28:57',0),(120,'','',0,'2014-11-21 17:28:57','2014-11-21 17:28:57',0),(121,'','',0,'2014-11-21 17:29:16','2014-11-21 17:29:16',0),(122,'','',0,'2014-11-21 17:29:16','2014-11-21 17:29:16',0);
/*!40000 ALTER TABLE `availabilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability_advisor`
--

DROP TABLE IF EXISTS `availability_advisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability_advisor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability_advisor`
--

LOCK TABLES `availability_advisor` WRITE;
/*!40000 ALTER TABLE `availability_advisor` DISABLE KEYS */;
INSERT INTO `availability_advisor` VALUES (5,5,1),(6,6,1),(7,7,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(16,16,18),(17,17,4),(18,18,4),(19,19,4),(20,20,4),(21,21,4),(22,22,4),(23,23,9),(24,24,9),(25,25,9),(26,26,9),(27,27,9),(28,28,9),(30,30,11),(31,31,11),(32,32,11),(33,33,11),(34,34,11),(35,35,6),(36,36,6),(37,37,6),(38,38,6),(41,42,6),(42,43,6),(43,44,5),(44,45,5),(45,46,5),(46,47,5),(47,48,5),(48,49,5),(49,50,5),(50,51,5),(51,53,5),(52,54,5),(53,55,5),(54,56,5),(55,57,5),(56,58,5),(59,62,19),(60,63,19),(61,64,19),(62,65,19),(63,66,19),(64,67,19),(65,68,17),(66,69,17),(67,70,17),(68,71,17),(73,77,17),(74,78,17),(77,81,6),(78,82,6),(79,83,9),(80,84,9),(81,85,9),(82,86,9),(83,87,9),(84,88,9),(87,91,1),(88,92,1),(89,93,13),(90,94,13),(91,95,13),(92,96,13),(93,97,13),(94,98,13),(95,99,13),(96,100,13),(97,101,13),(98,102,13),(99,103,13),(100,104,13),(101,105,13),(102,106,13),(103,107,13),(104,108,13),(111,115,20),(112,116,20),(113,117,20),(114,118,20),(115,119,20),(116,120,20),(117,121,20),(118,122,20);
/*!40000 ALTER TABLE `availability_advisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability_day`
--

DROP TABLE IF EXISTS `availability_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability_day` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability_day`
--

LOCK TABLES `availability_day` WRITE;
/*!40000 ALTER TABLE `availability_day` DISABLE KEYS */;
INSERT INTO `availability_day` VALUES (5,5,34,'10 AM'),(6,6,34,'10:30 AM'),(7,7,48,'10 AM'),(9,9,55,'10 AM'),(10,10,55,'10:30 AM'),(11,11,35,'2 PM'),(12,12,35,'2:30 PM'),(13,13,36,'2 PM'),(14,14,36,'2:30 PM'),(16,16,39,'8:30 AM'),(17,17,55,'9 AM'),(18,18,55,'9:30 AM'),(19,19,62,'9 AM'),(20,20,62,'9:30 AM'),(21,21,69,'9 AM'),(22,22,69,'9:30 AM'),(23,23,19,'1 PM'),(24,24,19,'1:30 PM'),(25,25,26,'1 PM'),(26,26,26,'1:30 PM'),(27,27,26,'1 PM'),(28,28,26,'1:30 PM'),(30,30,39,'11:30 AM'),(31,31,52,'10 AM'),(32,32,52,'10:30 AM'),(33,33,53,'11 AM'),(34,34,53,'11:30 AM'),(35,35,46,'10 AM'),(36,36,46,'10:30 AM'),(37,37,53,'10 AM'),(38,38,53,'10:30 AM'),(41,42,67,'10 AM'),(42,43,67,'10:30 AM'),(43,44,53,'10 AM'),(44,45,53,'10:30 AM'),(45,46,60,'10 AM'),(46,47,60,'10:30 AM'),(47,48,67,'10 AM'),(48,49,67,'10:30 AM'),(49,50,74,' null'),(50,51,74,':30 null'),(51,53,53,'10 AM'),(52,54,53,'10:30 AM'),(53,55,60,'10 AM'),(54,56,60,'10:30 AM'),(55,57,67,'10 AM'),(56,58,67,'10:30 AM'),(59,62,47,'9 AM'),(60,63,47,'9:30 AM'),(61,64,54,'9 AM'),(62,65,54,'9:30 AM'),(63,66,61,'9 AM'),(64,67,61,'9:30 AM'),(65,68,33,'12 AM'),(66,69,33,'12:30 AM'),(67,70,32,'12 PM'),(68,71,32,'12:30 PM'),(73,77,38,' AM'),(74,78,38,':30 AM'),(77,81,81,'10 AM'),(78,82,81,'10:30 AM'),(79,83,47,'1 PM'),(80,84,47,'1:30 PM'),(81,85,54,'1 PM'),(82,86,54,'1:30 PM'),(83,87,61,'1 PM'),(84,88,61,'1:30 PM'),(87,91,45,'4 PM'),(88,92,45,'4:30 PM'),(89,93,41,'10 AM'),(90,94,41,'10:30 AM'),(91,95,42,'10 AM'),(92,96,42,'10:30 AM'),(93,97,55,'10 AM'),(94,98,55,'10:30 AM'),(95,99,56,'10 AM'),(96,100,56,'10:30 AM'),(97,101,62,'10 AM'),(98,102,62,'10:30 AM'),(99,103,63,'10 AM'),(100,104,63,'10:30 AM'),(101,105,69,'10 AM'),(102,106,69,'10:30 AM'),(103,107,70,'10 AM'),(104,108,70,'10:30 AM'),(111,115,34,'5 AM'),(112,116,34,'5:30 AM'),(113,117,55,'10 AM'),(114,118,55,'10:30 AM'),(115,119,62,'10 AM'),(116,120,62,'10:30 AM'),(117,121,69,'10 AM'),(118,122,69,'10:30 AM');
/*!40000 ALTER TABLE `availability_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability_location`
--

DROP TABLE IF EXISTS `availability_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability_location`
--

LOCK TABLES `availability_location` WRITE;
/*!40000 ALTER TABLE `availability_location` DISABLE KEYS */;
INSERT INTO `availability_location` VALUES (5,5,1),(6,6,1),(7,7,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(16,16,1),(17,17,2),(18,18,2),(19,19,2),(20,20,2),(21,21,2),(22,22,2),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(41,42,1),(42,43,1),(43,44,1),(44,45,1),(45,46,1),(46,47,1),(47,48,1),(48,49,1),(49,50,0),(50,51,0),(51,53,1),(52,54,1),(53,55,1),(54,56,1),(55,57,1),(56,58,1),(59,62,1),(60,63,1),(61,64,1),(62,65,1),(63,66,1),(64,67,1),(65,68,3),(66,69,3),(67,70,1),(68,71,1),(73,77,1),(74,78,1),(77,81,1),(78,82,1),(79,83,1),(80,84,1),(81,85,1),(82,86,1),(83,87,1),(84,88,1),(87,91,1),(88,92,1),(89,93,1),(90,94,1),(91,95,1),(92,96,1),(93,97,1),(94,98,1),(95,99,1),(96,100,1),(97,101,1),(98,102,1),(99,103,1),(100,104,1),(101,105,1),(102,106,1),(103,107,1),(104,108,1),(111,115,1),(112,116,1),(113,117,1),(114,118,1),(115,119,1),(116,120,1),(117,121,1),(118,122,1);
/*!40000 ALTER TABLE `availability_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `availability_service`
--

DROP TABLE IF EXISTS `availability_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `availability_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `availability_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `availability_service`
--

LOCK TABLES `availability_service` WRITE;
/*!40000 ALTER TABLE `availability_service` DISABLE KEYS */;
INSERT INTO `availability_service` VALUES (5,5,1),(6,6,1),(7,7,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(41,42,1),(42,43,1),(43,44,1),(44,45,1),(45,46,1),(46,47,1),(47,48,1),(48,49,1),(49,50,1),(50,51,1),(51,53,1),(52,54,1),(53,55,1),(54,56,1),(55,57,1),(56,58,1),(59,62,1),(60,63,1),(61,64,1),(62,65,1),(63,66,1),(64,67,1),(65,68,1),(66,69,1),(67,70,1),(68,71,1),(73,77,1),(74,78,1),(77,81,1),(78,82,1),(79,83,1),(80,84,1),(81,85,1),(82,86,1),(83,87,1),(84,88,1),(87,91,1),(88,92,1),(89,93,1),(90,94,1),(91,95,1),(92,96,1),(93,97,1),(94,98,1),(95,99,1),(96,100,1),(97,101,1),(98,102,1),(99,103,1),(100,104,1),(101,105,1),(102,106,1),(103,107,1),(104,108,1),(111,115,1),(112,116,1),(113,117,1),(114,118,1),(115,119,1),(116,120,1),(117,121,1),(118,122,1);
/*!40000 ALTER TABLE `availability_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_advisor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=702 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,'2014-10-11','2014-11-11 17:35:34','2014-11-11 17:35:34'),(2,'2014-10-12','2014-11-11 17:35:34','2014-11-11 17:35:34'),(3,'2014-10-13','2014-11-11 17:35:34','2014-11-11 17:35:34'),(4,'2014-10-14','2014-11-11 17:35:34','2014-11-11 17:35:34'),(5,'2014-10-15','2014-11-11 17:35:34','2014-11-11 17:35:34'),(6,'2014-10-16','2014-11-11 17:35:34','2014-11-11 17:35:34'),(7,'2014-10-17','2014-11-11 17:35:34','2014-11-11 17:35:34'),(8,'2014-10-18','2014-11-11 17:35:34','2014-11-11 17:35:34'),(9,'2014-10-19','2014-11-11 17:35:34','2014-11-11 17:35:34'),(10,'2014-10-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(11,'2014-10-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(12,'2014-10-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(13,'2014-10-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(14,'2014-10-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(15,'2014-10-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(16,'2014-10-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(17,'2014-10-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(18,'2014-10-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(19,'2014-10-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(20,'2014-10-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(21,'2014-10-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(22,'2014-11-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(23,'2014-11-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(24,'2014-11-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(25,'2014-11-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(26,'2014-11-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(27,'2014-11-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(28,'2014-11-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(29,'2014-11-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(30,'2014-11-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(31,'2014-11-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(32,'2014-11-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(33,'2014-11-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(34,'2014-11-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(35,'2014-11-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(36,'2014-11-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(37,'2014-11-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(38,'2014-11-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(39,'2014-11-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(40,'2014-11-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(41,'2014-11-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(42,'2014-11-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(43,'2014-11-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(44,'2014-11-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(45,'2014-11-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(46,'2014-11-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(47,'2014-11-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(48,'2014-11-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(49,'2014-11-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(50,'2014-11-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(51,'2014-11-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(52,'2014-12-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(53,'2014-12-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(54,'2014-12-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(55,'2014-12-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(56,'2014-12-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(57,'2014-12-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(58,'2014-12-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(59,'2014-12-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(60,'2014-12-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(61,'2014-12-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(62,'2014-12-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(63,'2014-12-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(64,'2014-12-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(65,'2014-12-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(66,'2014-12-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(67,'2014-12-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(68,'2014-12-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(69,'2014-12-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(70,'2014-12-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(71,'2014-12-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(72,'2014-12-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(73,'2014-12-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(74,'2014-12-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(75,'2014-12-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(76,'2014-12-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(77,'2014-12-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(78,'2014-12-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(79,'2014-12-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(80,'2014-12-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(81,'2014-12-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(82,'2014-12-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(83,'2015-01-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(84,'2015-01-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(85,'2015-01-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(86,'2015-01-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(87,'2015-01-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(88,'2015-01-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(89,'2015-01-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(90,'2015-01-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(91,'2015-01-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(92,'2015-01-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(93,'2015-01-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(94,'2015-01-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(95,'2015-01-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(96,'2015-01-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(97,'2015-01-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(98,'2015-01-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(99,'2015-01-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(100,'2015-01-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(101,'2015-01-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(102,'2015-01-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(103,'2015-01-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(104,'2015-01-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(105,'2015-01-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(106,'2015-01-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(107,'2015-01-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(108,'2015-01-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(109,'2015-01-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(110,'2015-01-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(111,'2015-01-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(112,'2015-01-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(113,'2015-01-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(114,'2015-02-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(115,'2015-02-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(116,'2015-02-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(117,'2015-02-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(118,'2015-02-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(119,'2015-02-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(120,'2015-02-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(121,'2015-02-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(122,'2015-02-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(123,'2015-02-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(124,'2015-02-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(125,'2015-02-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(126,'2015-02-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(127,'2015-02-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(128,'2015-02-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(129,'2015-02-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(130,'2015-02-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(131,'2015-02-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(132,'2015-02-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(133,'2015-02-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(134,'2015-02-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(135,'2015-02-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(136,'2015-02-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(137,'2015-02-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(138,'2015-02-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(139,'2015-02-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(140,'2015-02-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(141,'2015-02-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(142,'2015-03-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(143,'2015-03-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(144,'2015-03-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(145,'2015-03-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(146,'2015-03-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(147,'2015-03-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(148,'2015-03-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(149,'2015-03-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(150,'2015-03-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(151,'2015-03-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(152,'2015-03-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(153,'2015-03-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(154,'2015-03-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(155,'2015-03-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(156,'2015-03-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(157,'2015-03-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(158,'2015-03-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(159,'2015-03-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(160,'2015-03-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(161,'2015-03-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(162,'2015-03-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(163,'2015-03-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(164,'2015-03-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(165,'2015-03-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(166,'2015-03-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(167,'2015-03-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(168,'2015-03-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(169,'2015-03-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(170,'2015-03-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(171,'2015-03-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(172,'2015-03-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(173,'2015-04-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(174,'2015-04-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(175,'2015-04-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(176,'2015-04-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(177,'2015-04-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(178,'2015-04-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(179,'2015-04-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(180,'2015-04-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(181,'2015-04-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(182,'2015-04-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(183,'2015-04-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(184,'2015-04-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(185,'2015-04-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(186,'2015-04-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(187,'2015-04-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(188,'2015-04-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(189,'2015-04-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(190,'2015-04-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(191,'2015-04-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(192,'2015-04-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(193,'2015-04-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(194,'2015-04-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(195,'2015-04-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(196,'2015-04-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(197,'2015-04-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(198,'2015-04-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(199,'2015-04-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(200,'2015-04-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(201,'2015-04-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(202,'2015-04-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(203,'2015-05-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(204,'2015-05-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(205,'2015-05-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(206,'2015-05-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(207,'2015-05-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(208,'2015-05-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(209,'2015-05-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(210,'2015-05-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(211,'2015-05-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(212,'2015-05-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(213,'2015-05-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(214,'2015-05-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(215,'2015-05-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(216,'2015-05-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(217,'2015-05-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(218,'2015-05-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(219,'2015-05-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(220,'2015-05-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(221,'2015-05-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(222,'2015-05-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(223,'2015-05-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(224,'2015-05-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(225,'2015-05-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(226,'2015-05-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(227,'2015-05-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(228,'2015-05-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(229,'2015-05-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(230,'2015-05-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(231,'2015-05-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(232,'2015-05-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(233,'2015-05-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(234,'2015-06-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(235,'2015-06-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(236,'2015-06-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(237,'2015-06-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(238,'2015-06-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(239,'2015-06-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(240,'2015-06-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(241,'2015-06-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(242,'2015-06-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(243,'2015-06-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(244,'2015-06-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(245,'2015-06-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(246,'2015-06-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(247,'2015-06-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(248,'2015-06-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(249,'2015-06-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(250,'2015-06-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(251,'2015-06-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(252,'2015-06-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(253,'2015-06-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(254,'2015-06-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(255,'2015-06-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(256,'2015-06-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(257,'2015-06-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(258,'2015-06-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(259,'2015-06-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(260,'2015-06-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(261,'2015-06-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(262,'2015-06-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(263,'2015-06-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(264,'2015-07-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(265,'2015-07-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(266,'2015-07-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(267,'2015-07-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(268,'2015-07-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(269,'2015-07-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(270,'2015-07-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(271,'2015-07-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(272,'2015-07-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(273,'2015-07-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(274,'2015-07-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(275,'2015-07-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(276,'2015-07-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(277,'2015-07-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(278,'2015-07-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(279,'2015-07-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(280,'2015-07-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(281,'2015-07-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(282,'2015-07-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(283,'2015-07-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(284,'2015-07-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(285,'2015-07-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(286,'2015-07-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(287,'2015-07-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(288,'2015-07-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(289,'2015-07-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(290,'2015-07-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(291,'2015-07-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(292,'2015-07-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(293,'2015-07-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(294,'2015-07-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(295,'2015-08-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(296,'2015-08-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(297,'2015-08-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(298,'2015-08-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(299,'2015-08-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(300,'2015-08-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(301,'2015-08-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(302,'2015-08-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(303,'2015-08-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(304,'2015-08-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(305,'2015-08-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(306,'2015-08-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(307,'2015-08-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(308,'2015-08-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(309,'2015-08-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(310,'2015-08-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(311,'2015-08-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(312,'2015-08-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(313,'2015-08-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(314,'2015-08-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(315,'2015-08-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(316,'2015-08-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(317,'2015-08-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(318,'2015-08-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(319,'2015-08-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(320,'2015-08-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(321,'2015-08-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(322,'2015-08-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(323,'2015-08-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(324,'2015-08-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(325,'2015-08-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(326,'2015-09-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(327,'2015-09-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(328,'2015-09-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(329,'2015-09-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(330,'2015-09-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(331,'2015-09-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(332,'2015-09-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(333,'2015-09-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(334,'2015-09-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(335,'2015-09-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(336,'2015-09-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(337,'2015-09-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(338,'2015-09-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(339,'2015-09-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(340,'2015-09-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(341,'2015-09-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(342,'2015-09-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(343,'2015-09-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(344,'2015-09-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(345,'2015-09-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(346,'2015-09-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(347,'2015-09-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(348,'2015-09-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(349,'2015-09-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(350,'2015-09-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(351,'2015-09-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(352,'2015-09-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(353,'2015-09-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(354,'2015-09-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(355,'2015-09-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(356,'2015-10-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(357,'2015-10-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(358,'2015-10-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(359,'2015-10-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(360,'2015-10-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(361,'2015-10-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(362,'2015-10-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(363,'2015-10-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(364,'2015-10-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(365,'2015-10-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(366,'2015-10-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(367,'2015-10-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(368,'2015-10-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(369,'2015-10-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(370,'2015-10-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(371,'2015-10-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(372,'2015-10-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(373,'2015-10-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(374,'2015-10-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(375,'2015-10-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(376,'2015-10-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(377,'2015-10-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(378,'2015-10-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(379,'2015-10-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(380,'2015-10-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(381,'2015-10-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(382,'2015-10-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(383,'2015-10-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(384,'2015-10-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(385,'2015-10-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(386,'2015-10-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(387,'2015-11-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(388,'2015-11-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(389,'2015-11-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(390,'2015-11-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(391,'2015-11-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(392,'2015-11-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(393,'2015-11-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(394,'2015-11-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(395,'2015-11-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(396,'2015-11-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(397,'2015-11-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(398,'2015-11-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(399,'2015-11-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(400,'2015-11-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(401,'2015-11-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(402,'2015-11-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(403,'2015-11-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(404,'2015-11-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(405,'2015-11-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(406,'2015-11-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(407,'2015-11-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(408,'2015-11-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(409,'2015-11-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(410,'2015-11-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(411,'2015-11-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(412,'2015-11-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(413,'2015-11-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(414,'2015-11-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(415,'2015-11-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(416,'2015-11-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(417,'2015-12-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(418,'2015-12-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(419,'2015-12-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(420,'2015-12-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(421,'2015-12-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(422,'2015-12-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(423,'2015-12-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(424,'2015-12-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(425,'2015-12-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(426,'2015-12-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(427,'2015-12-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(428,'2015-12-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(429,'2015-12-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(430,'2015-12-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(431,'2015-12-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(432,'2015-12-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(433,'2015-12-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(434,'2015-12-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(435,'2015-12-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(436,'2015-12-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(437,'2015-12-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(438,'2015-12-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(439,'2015-12-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(440,'2015-12-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(441,'2015-12-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(442,'2015-12-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(443,'2015-12-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(444,'2015-12-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(445,'2015-12-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(446,'2015-12-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(447,'2015-12-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(448,'2016-01-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(449,'2016-01-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(450,'2016-01-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(451,'2016-01-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(452,'2016-01-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(453,'2016-01-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(454,'2016-01-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(455,'2016-01-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(456,'2016-01-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(457,'2016-01-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(458,'2016-01-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(459,'2016-01-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(460,'2016-01-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(461,'2016-01-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(462,'2016-01-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(463,'2016-01-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(464,'2016-01-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(465,'2016-01-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(466,'2016-01-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(467,'2016-01-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(468,'2016-01-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(469,'2016-01-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(470,'2016-01-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(471,'2016-01-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(472,'2016-01-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(473,'2016-01-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(474,'2016-01-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(475,'2016-01-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(476,'2016-01-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(477,'2016-01-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(478,'2016-01-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(479,'2016-02-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(480,'2016-02-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(481,'2016-02-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(482,'2016-02-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(483,'2016-02-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(484,'2016-02-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(485,'2016-02-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(486,'2016-02-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(487,'2016-02-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(488,'2016-02-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(489,'2016-02-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(490,'2016-02-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(491,'2016-02-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(492,'2016-02-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(493,'2016-02-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(494,'2016-02-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(495,'2016-02-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(496,'2016-02-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(497,'2016-02-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(498,'2016-02-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(499,'2016-02-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(500,'2016-02-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(501,'2016-02-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(502,'2016-02-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(503,'2016-02-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(504,'2016-02-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(505,'2016-02-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(506,'2016-02-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(507,'2016-02-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(508,'2016-03-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(509,'2016-03-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(510,'2016-03-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(511,'2016-03-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(512,'2016-03-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(513,'2016-03-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(514,'2016-03-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(515,'2016-03-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(516,'2016-03-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(517,'2016-03-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(518,'2016-03-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(519,'2016-03-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(520,'2016-03-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(521,'2016-03-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(522,'2016-03-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(523,'2016-03-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(524,'2016-03-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(525,'2016-03-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(526,'2016-03-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(527,'2016-03-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(528,'2016-03-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(529,'2016-03-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(530,'2016-03-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(531,'2016-03-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(532,'2016-03-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(533,'2016-03-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(534,'2016-03-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(535,'2016-03-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(536,'2016-03-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(537,'2016-03-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(538,'2016-03-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(539,'2016-04-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(540,'2016-04-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(541,'2016-04-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(542,'2016-04-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(543,'2016-04-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(544,'2016-04-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(545,'2016-04-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(546,'2016-04-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(547,'2016-04-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(548,'2016-04-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(549,'2016-04-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(550,'2016-04-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(551,'2016-04-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(552,'2016-04-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(553,'2016-04-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(554,'2016-04-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(555,'2016-04-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(556,'2016-04-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(557,'2016-04-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(558,'2016-04-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(559,'2016-04-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(560,'2016-04-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(561,'2016-04-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(562,'2016-04-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(563,'2016-04-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(564,'2016-04-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(565,'2016-04-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(566,'2016-04-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(567,'2016-04-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(568,'2016-04-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(569,'2016-05-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(570,'2016-05-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(571,'2016-05-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(572,'2016-05-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(573,'2016-05-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(574,'2016-05-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(575,'2016-05-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(576,'2016-05-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(577,'2016-05-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(578,'2016-05-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(579,'2016-05-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(580,'2016-05-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(581,'2016-05-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(582,'2016-05-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(583,'2016-05-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(584,'2016-05-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(585,'2016-05-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(586,'2016-05-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(587,'2016-05-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(588,'2016-05-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(589,'2016-05-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(590,'2016-05-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(591,'2016-05-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(592,'2016-05-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(593,'2016-05-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(594,'2016-05-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(595,'2016-05-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(596,'2016-05-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(597,'2016-05-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(598,'2016-05-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(599,'2016-05-31','2014-11-11 17:35:35','2014-11-11 17:35:35'),(600,'2016-06-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(601,'2016-06-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(602,'2016-06-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(603,'2016-06-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(604,'2016-06-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(605,'2016-06-06','2014-11-11 17:35:35','2014-11-11 17:35:35'),(606,'2016-06-07','2014-11-11 17:35:35','2014-11-11 17:35:35'),(607,'2016-06-08','2014-11-11 17:35:35','2014-11-11 17:35:35'),(608,'2016-06-09','2014-11-11 17:35:35','2014-11-11 17:35:35'),(609,'2016-06-10','2014-11-11 17:35:35','2014-11-11 17:35:35'),(610,'2016-06-11','2014-11-11 17:35:35','2014-11-11 17:35:35'),(611,'2016-06-12','2014-11-11 17:35:35','2014-11-11 17:35:35'),(612,'2016-06-13','2014-11-11 17:35:35','2014-11-11 17:35:35'),(613,'2016-06-14','2014-11-11 17:35:35','2014-11-11 17:35:35'),(614,'2016-06-15','2014-11-11 17:35:35','2014-11-11 17:35:35'),(615,'2016-06-16','2014-11-11 17:35:35','2014-11-11 17:35:35'),(616,'2016-06-17','2014-11-11 17:35:35','2014-11-11 17:35:35'),(617,'2016-06-18','2014-11-11 17:35:35','2014-11-11 17:35:35'),(618,'2016-06-19','2014-11-11 17:35:35','2014-11-11 17:35:35'),(619,'2016-06-20','2014-11-11 17:35:35','2014-11-11 17:35:35'),(620,'2016-06-21','2014-11-11 17:35:35','2014-11-11 17:35:35'),(621,'2016-06-22','2014-11-11 17:35:35','2014-11-11 17:35:35'),(622,'2016-06-23','2014-11-11 17:35:35','2014-11-11 17:35:35'),(623,'2016-06-24','2014-11-11 17:35:35','2014-11-11 17:35:35'),(624,'2016-06-25','2014-11-11 17:35:35','2014-11-11 17:35:35'),(625,'2016-06-26','2014-11-11 17:35:35','2014-11-11 17:35:35'),(626,'2016-06-27','2014-11-11 17:35:35','2014-11-11 17:35:35'),(627,'2016-06-28','2014-11-11 17:35:35','2014-11-11 17:35:35'),(628,'2016-06-29','2014-11-11 17:35:35','2014-11-11 17:35:35'),(629,'2016-06-30','2014-11-11 17:35:35','2014-11-11 17:35:35'),(630,'2016-07-01','2014-11-11 17:35:35','2014-11-11 17:35:35'),(631,'2016-07-02','2014-11-11 17:35:35','2014-11-11 17:35:35'),(632,'2016-07-03','2014-11-11 17:35:35','2014-11-11 17:35:35'),(633,'2016-07-04','2014-11-11 17:35:35','2014-11-11 17:35:35'),(634,'2016-07-05','2014-11-11 17:35:35','2014-11-11 17:35:35'),(635,'2016-07-06','2014-11-11 17:35:36','2014-11-11 17:35:36'),(636,'2016-07-07','2014-11-11 17:35:36','2014-11-11 17:35:36'),(637,'2016-07-08','2014-11-11 17:35:36','2014-11-11 17:35:36'),(638,'2016-07-09','2014-11-11 17:35:36','2014-11-11 17:35:36'),(639,'2016-07-10','2014-11-11 17:35:36','2014-11-11 17:35:36'),(640,'2016-07-11','2014-11-11 17:35:36','2014-11-11 17:35:36'),(641,'2016-07-12','2014-11-11 17:35:36','2014-11-11 17:35:36'),(642,'2016-07-13','2014-11-11 17:35:36','2014-11-11 17:35:36'),(643,'2016-07-14','2014-11-11 17:35:36','2014-11-11 17:35:36'),(644,'2016-07-15','2014-11-11 17:35:36','2014-11-11 17:35:36'),(645,'2016-07-16','2014-11-11 17:35:36','2014-11-11 17:35:36'),(646,'2016-07-17','2014-11-11 17:35:36','2014-11-11 17:35:36'),(647,'2016-07-18','2014-11-11 17:35:36','2014-11-11 17:35:36'),(648,'2016-07-19','2014-11-11 17:35:36','2014-11-11 17:35:36'),(649,'2016-07-20','2014-11-11 17:35:36','2014-11-11 17:35:36'),(650,'2016-07-21','2014-11-11 17:35:36','2014-11-11 17:35:36'),(651,'2016-07-22','2014-11-11 17:35:36','2014-11-11 17:35:36'),(652,'2016-07-23','2014-11-11 17:35:36','2014-11-11 17:35:36'),(653,'2016-07-24','2014-11-11 17:35:36','2014-11-11 17:35:36'),(654,'2016-07-25','2014-11-11 17:35:36','2014-11-11 17:35:36'),(655,'2016-07-26','2014-11-11 17:35:36','2014-11-11 17:35:36'),(656,'2016-07-27','2014-11-11 17:35:36','2014-11-11 17:35:36'),(657,'2016-07-28','2014-11-11 17:35:36','2014-11-11 17:35:36'),(658,'2016-07-29','2014-11-11 17:35:36','2014-11-11 17:35:36'),(659,'2016-07-30','2014-11-11 17:35:36','2014-11-11 17:35:36'),(660,'2016-07-31','2014-11-11 17:35:36','2014-11-11 17:35:36'),(661,'2016-08-01','2014-11-11 17:35:36','2014-11-11 17:35:36'),(662,'2016-08-02','2014-11-11 17:35:36','2014-11-11 17:35:36'),(663,'2016-08-03','2014-11-11 17:35:36','2014-11-11 17:35:36'),(664,'2016-08-04','2014-11-11 17:35:36','2014-11-11 17:35:36'),(665,'2016-08-05','2014-11-11 17:35:36','2014-11-11 17:35:36'),(666,'2016-08-06','2014-11-11 17:35:36','2014-11-11 17:35:36'),(667,'2016-08-07','2014-11-11 17:35:36','2014-11-11 17:35:36'),(668,'2016-08-08','2014-11-11 17:35:36','2014-11-11 17:35:36'),(669,'2016-08-09','2014-11-11 17:35:36','2014-11-11 17:35:36'),(670,'2016-08-10','2014-11-11 17:35:36','2014-11-11 17:35:36'),(671,'2016-08-11','2014-11-11 17:35:36','2014-11-11 17:35:36'),(672,'2016-08-12','2014-11-11 17:35:36','2014-11-11 17:35:36'),(673,'2016-08-13','2014-11-11 17:35:36','2014-11-11 17:35:36'),(674,'2016-08-14','2014-11-11 17:35:36','2014-11-11 17:35:36'),(675,'2016-08-15','2014-11-11 17:35:36','2014-11-11 17:35:36'),(676,'2016-08-16','2014-11-11 17:35:36','2014-11-11 17:35:36'),(677,'2016-08-17','2014-11-11 17:35:36','2014-11-11 17:35:36'),(678,'2016-08-18','2014-11-11 17:35:36','2014-11-11 17:35:36'),(679,'2016-08-19','2014-11-11 17:35:36','2014-11-11 17:35:36'),(680,'2016-08-20','2014-11-11 17:35:36','2014-11-11 17:35:36'),(681,'2016-08-21','2014-11-11 17:35:36','2014-11-11 17:35:36'),(682,'2016-08-22','2014-11-11 17:35:36','2014-11-11 17:35:36'),(683,'2016-08-23','2014-11-11 17:35:36','2014-11-11 17:35:36'),(684,'2016-08-24','2014-11-11 17:35:36','2014-11-11 17:35:36'),(685,'2016-08-25','2014-11-11 17:35:36','2014-11-11 17:35:36'),(686,'2016-08-26','2014-11-11 17:35:36','2014-11-11 17:35:36'),(687,'2016-08-27','2014-11-11 17:35:36','2014-11-11 17:35:36'),(688,'2016-08-28','2014-11-11 17:35:36','2014-11-11 17:35:36'),(689,'2016-08-29','2014-11-11 17:35:36','2014-11-11 17:35:36'),(690,'2016-08-30','2014-11-11 17:35:36','2014-11-11 17:35:36'),(691,'2016-08-31','2014-11-11 17:35:36','2014-11-11 17:35:36'),(692,'2016-09-01','2014-11-11 17:35:36','2014-11-11 17:35:36'),(693,'2016-09-02','2014-11-11 17:35:36','2014-11-11 17:35:36'),(694,'2016-09-03','2014-11-11 17:35:36','2014-11-11 17:35:36'),(695,'2016-09-04','2014-11-11 17:35:36','2014-11-11 17:35:36'),(696,'2016-09-05','2014-11-11 17:35:36','2014-11-11 17:35:36'),(697,'2016-09-06','2014-11-11 17:35:36','2014-11-11 17:35:36'),(698,'2016-09-07','2014-11-11 17:35:36','2014-11-11 17:35:36'),(699,'2016-09-08','2014-11-11 17:35:36','2014-11-11 17:35:36'),(700,'2016-09-09','2014-11-11 17:35:36','2014-11-11 17:35:36'),(701,'2016-09-10','2014-11-11 17:35:36','2014-11-11 17:35:36');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expertise`
--

DROP TABLE IF EXISTS `expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `requested` tinyint(1) NOT NULL,
  `requested_adv_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expertise`
--

LOCK TABLES `expertise` WRITE;
/*!40000 ALTER TABLE `expertise` DISABLE KEYS */;
INSERT INTO `expertise` VALUES (1,'MVP','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(2,'Startups','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(3,'Product Management','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(4,'Board Management','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(5,'Grant Management','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(6,'Tax Credits','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(7,'ASP.NET','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(8,'Amazon Web Services','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(9,'SharePoint','Description goes here.','2014-11-11 17:35:32','2014-11-21 17:52:00',0,0),(10,'Equity Compensation','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(11,'IP Assignment & Protection','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(12,'Raising Capital','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(13,'Business Modeling','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(14,'Pitching to Investors','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(15,'Angel Investments','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(16,'Consumer Finance','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(17,'Residential Real Estate','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(18,'SEC Compliance','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(19,'Corporate Law','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(20,'Securities Law','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(21,'Financial','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(22,'Online Video','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(23,'Lease and Proposal Negotations','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(24,'Commercial Real Estate','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(25,'Analysis of Lease vs Buy','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(26,'Copyrights','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(27,'Trademarks','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(28,'Patents','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(29,'FDA Regulation of Life Science Products','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(30,'Women Owned Business','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(31,'FDA Regulation of Manufacturing and Development','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(32,'Air Emissions & Environmental','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(33,'Emissions Control Catalysts','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(34,'Government R&D Funding & Liason','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(35,'Biotechnology','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(36,'Pharmaceuticals','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(37,'Commercializing Science','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(38,'Project Management','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(39,'Recruiting','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32',0,0),(40,'Industry Partnerships','Description goes here.','2014-11-11 17:35:33','2014-11-11 17:35:33',0,0),(41,'Product Development','Description goes here.','2014-11-11 17:35:33','2014-11-11 17:35:33',0,0),(42,'User Experience','Description goes here.','2014-11-11 17:35:33','2014-11-11 17:35:33',0,0),(43,'Consulting','Description goes here.','2014-11-11 17:35:33','2014-11-11 17:35:33',0,0),(44,'Fundraising','','2014-11-13 02:40:38','2014-11-13 02:40:38',0,0),(45,'Technology Consulting','','2014-11-17 15:52:38','2014-11-21 17:52:14',0,0),(46,'Enterprise Cloud Infrastructure ','','2014-11-17 15:54:42','2014-11-18 17:35:04',0,0),(47,'Pricing','','2014-11-17 16:03:55','2014-11-17 16:03:55',0,0),(48,'Market Planning  ','','2014-11-17 16:04:12','2014-11-17 16:04:12',0,0),(49,'Strategic Planning  ','','2014-11-17 16:04:28','2014-11-17 16:04:28',0,0),(50,'New Product Introductions ','','2014-11-17 16:04:39','2014-11-17 16:04:39',0,0),(56,'Exchange','Description','2014-11-21 17:28:00','2014-11-21 17:28:00',0,0),(57,'Office 365','Description','2014-11-21 17:29:37','2014-11-21 17:29:37',0,0),(58,'Microsoft Azure','Description','2014-11-21 17:29:51','2014-11-21 17:29:51',0,0),(59,'Enterprise Application Architecture','Description','2014-11-21 17:30:09','2014-11-21 17:30:09',0,0),(60,'Custom Application Design','Description','2014-11-21 17:30:44','2014-11-21 17:30:44',0,0),(61,'Windows 8','Description','2014-11-21 17:43:05','2014-11-21 17:43:05',0,0),(62,'Windows','Description','2014-11-21 17:43:13','2014-11-21 17:43:13',0,0),(63,'Office','Description','2014-11-21 17:43:23','2014-11-21 17:43:23',0,0),(64,'Infrastructure Migration','Description','2014-11-21 17:51:08','2014-11-21 17:51:08',0,0),(65,'Marketing','Description','2014-11-21 17:54:02','2014-11-21 17:54:02',0,0),(66,'Business Development','Description','2014-11-21 17:55:04','2014-11-21 17:55:04',0,0);
/*!40000 ALTER TABLE `expertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expertisegroup_expertise`
--

DROP TABLE IF EXISTS `expertisegroup_expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expertisegroup_expertise` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `expertise_group_id` int(11) NOT NULL,
  `expertise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expertisegroup_expertise`
--

LOCK TABLES `expertisegroup_expertise` WRITE;
/*!40000 ALTER TABLE `expertisegroup_expertise` DISABLE KEYS */;
INSERT INTO `expertisegroup_expertise` VALUES (1,1,6),(2,1,18),(3,1,19),(4,1,20),(5,1,23),(6,1,29),(7,1,31),(8,1,34),(9,2,6),(10,2,11),(11,2,18),(12,2,23),(13,2,26),(14,2,27),(15,2,28),(16,2,29),(17,2,31),(18,3,17),(19,3,24),(20,3,25),(21,3,23),(22,4,41),(23,4,42),(24,4,1),(25,4,7),(26,4,8),(27,4,9),(28,4,22),(29,5,40),(30,5,39),(31,5,38),(32,5,37),(33,5,1),(34,5,3),(35,5,4),(36,5,5),(37,5,10),(38,5,12),(39,5,13),(40,5,30),(41,6,40),(42,6,6),(43,6,10),(44,6,14),(45,6,15),(46,6,16),(47,6,18),(48,6,21),(49,6,34),(50,7,40),(51,7,39),(52,7,37),(53,7,1),(55,7,3),(56,7,8),(57,7,10),(58,7,12),(59,7,13),(60,7,14),(61,7,15),(62,8,3),(63,9,36),(64,9,35),(65,9,29),(66,9,32),(67,9,33),(68,7,44),(69,6,44),(70,5,45),(71,4,46),(72,6,47),(73,8,48),(74,5,49),(75,7,50),(76,8,55),(77,4,56),(78,4,57),(79,4,58),(80,4,59),(81,4,60),(82,4,61),(83,4,62),(84,4,63),(85,4,64),(86,8,65),(87,5,66),(88,7,2),(89,7,66);
/*!40000 ALTER TABLE `expertisegroup_expertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expertisegroups`
--

DROP TABLE IF EXISTS `expertisegroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expertisegroups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expertisegroups`
--

LOCK TABLES `expertisegroups` WRITE;
/*!40000 ALTER TABLE `expertisegroups` DISABLE KEYS */;
INSERT INTO `expertisegroups` VALUES (1,'Government','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(2,'Legal','Description goes here.','2014-11-11 17:35:32','2014-11-13 02:39:21'),(3,'Real Estate','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(4,'Technology','Description goes here.','2014-11-11 17:35:32','2014-11-19 14:19:56'),(5,'Management','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(6,'Financial','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(7,'Startups','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(8,'Marketing','Description goes here.','2014-11-11 17:35:32','2014-11-11 17:35:32'),(9,'Life Sciences','Description goes here.','2014-11-11 17:35:32','2014-11-13 02:39:49');
/*!40000 ALTER TABLE `expertisegroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Walnut St. Labs','23 North Walnut St.',0.000000,0.000000,'http://walnutstlabs.com','',0,0,'2014-11-11 17:35:32','2014-11-11 17:35:32'),(2,'ICE','some address',0.000000,0.000000,'some website','',0,0,'2014-11-11 17:35:32','2014-11-11 17:35:32'),(3,'Evolve IP','some address',0.000000,0.000000,'some website','',0,0,'2014-11-11 17:35:32','2014-11-11 17:35:32'),(4,'Remote','',0.000000,0.000000,'remote','',0,17,'2014-11-21 14:58:25','2014-11-21 14:58:25');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_availability`
--

DROP TABLE IF EXISTS `meeting_availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_availability` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `availability_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_availability`
--

LOCK TABLES `meeting_availability` WRITE;
/*!40000 ALTER TABLE `meeting_availability` DISABLE KEYS */;
INSERT INTO `meeting_availability` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,3),(7,7,5),(8,8,8),(9,9,13),(10,10,16),(11,11,8);
/*!40000 ALTER TABLE `meeting_availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_day`
--

DROP TABLE IF EXISTS `meeting_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_day` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_day`
--

LOCK TABLES `meeting_day` WRITE;
/*!40000 ALTER TABLE `meeting_day` DISABLE KEYS */;
INSERT INTO `meeting_day` VALUES (1,1,33),(2,2,33),(3,3,33),(4,4,33),(5,5,33),(6,6,39),(7,7,34),(8,8,48),(9,9,36),(10,10,39),(11,11,48);
/*!40000 ALTER TABLE `meeting_day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_location`
--

DROP TABLE IF EXISTS `meeting_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_location`
--

LOCK TABLES `meeting_location` WRITE;
/*!40000 ALTER TABLE `meeting_location` DISABLE KEYS */;
INSERT INTO `meeting_location` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1);
/*!40000 ALTER TABLE `meeting_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_requestee`
--

DROP TABLE IF EXISTS `meeting_requestee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_requestee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `requestee_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_requestee`
--

LOCK TABLES `meeting_requestee` WRITE;
/*!40000 ALTER TABLE `meeting_requestee` DISABLE KEYS */;
INSERT INTO `meeting_requestee` VALUES (1,1,1),(2,2,2),(3,3,3),(4,4,4),(5,5,5),(6,6,6),(7,7,7),(8,8,8),(9,9,9),(10,10,10),(11,11,11);
/*!40000 ALTER TABLE `meeting_requestee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meeting_service`
--

DROP TABLE IF EXISTS `meeting_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meeting_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meeting_service`
--

LOCK TABLES `meeting_service` WRITE;
/*!40000 ALTER TABLE `meeting_service` DISABLE KEYS */;
INSERT INTO `meeting_service` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1);
/*!40000 ALTER TABLE `meeting_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meetings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES (1,'','',-1,'2014-11-11 18:14:54','2014-11-11 18:27:26'),(2,'','',-1,'2014-11-11 18:33:51','2014-11-11 18:38:34'),(3,'','',-1,'2014-11-11 21:22:29','2014-11-12 19:00:08'),(4,'','',-1,'2014-11-11 21:22:50','2014-11-12 19:00:12'),(5,'','',-1,'2014-11-12 19:00:42','2014-11-12 21:11:17'),(6,'','',-1,'2014-11-13 00:21:06','2014-11-13 00:22:05'),(7,'','',-1,'2014-11-13 02:36:37','2014-11-13 02:46:49'),(8,'','',-1,'2014-11-13 19:26:27','2014-11-13 19:31:07'),(9,'','',1,'2014-11-14 18:58:34','2014-11-14 18:58:39'),(10,'','',1,'2014-11-17 17:14:16','2014-11-17 17:14:38'),(11,'','',-1,'2014-11-18 17:28:34','2014-11-19 16:40:44');
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_18_014351_advisor',1),('2014_09_18_014407_meeting',1),('2014_09_18_014647_day',1),('2014_09_18_020810_company',1),('2014_09_18_020822_service',1),('2014_09_18_020835_location',1),('2014_09_18_020859_expertise',1),('2014_09_18_021409_advisor_meeting',1),('2014_09_18_021455_meeting_day',1),('2014_09_18_021515_advisor_company',1),('2014_09_18_021552_advisor_service',1),('2014_09_18_021652_meeting_location',1),('2014_09_18_021800_advisor_expertise',1),('2014_09_22_020018_service_location_advisor',1),('2014_09_22_022059_availabilities',1),('2014_09_22_022113_availability_advisor',1),('2014_09_22_022122_availability_service',1),('2014_09_22_022131_availability_location',1),('2014_09_22_022141_availability_day',1),('2014_10_03_204019_meeting_availability',1),('2014_10_08_232232_meeting_service',1),('2014_10_09_012457_requestee',1),('2014_10_09_012614_meeting_requestee',1),('2014_10_11_170537_expertisegroup',1),('2014_10_11_170549_expertisegroup_expertise',1),('2014_11_14_182817_add_reminder_column_to_availabilities',2),('2014_11_18_160128_make_new_expertise_requestable',3),('2014_11_21_151203_add_profile_images_to_advisors',4),('2014_11_21_160148_add_linkedin_column_to_advisors',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requestees`
--

DROP TABLE IF EXISTS `requestees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requestees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requestees`
--

LOCK TABLES `requestees` WRITE;
/*!40000 ALTER TABLE `requestees` DISABLE KEYS */;
INSERT INTO `requestees` VALUES (1,'hvent90@gmail.com','Henry Ventura','4848867635','sadhfjasdhkfhsadf','2014-11-11 18:14:54','2014-11-11 18:14:54'),(2,'hvent90@gmail.com','Henry Ventura','4848867635','fasdfasdf','2014-11-11 18:33:51','2014-11-11 18:33:51'),(3,'','','','','2014-11-11 21:22:29','2014-11-11 21:22:29'),(4,'','','','','2014-11-11 21:22:50','2014-11-11 21:22:50'),(5,'hvent90@gmail.com','Henry Ventura','4848867635','fasdfasdf','2014-11-12 19:00:42','2014-11-12 19:00:42'),(6,'hvent90@gmail.com','Henry Ventura','4848867635','Hi I would like to talk about X Y and Z.','2014-11-13 00:21:06','2014-11-13 00:21:06'),(7,'henry@23northdigital.com','Henry Ventura','4848867635','I would like to talk about x y and z.','2014-11-13 02:36:37','2014-11-13 02:36:37'),(8,'henry@walnutstlabs.com','Henry Ventura','484 886 7635','I want to talk about X Y and Z.','2014-11-13 19:26:27','2014-11-13 19:26:27'),(9,'henry@walnutstlabs.com','sadf','asdf','asdf','2014-11-14 18:58:34','2014-11-14 18:58:34'),(10,'hvent90@gmail.com','test','test','test','2014-11-17 17:14:16','2014-11-17 17:14:16'),(11,'testing@test.com','testing from phone','11111','Test','2014-11-18 17:28:34','2014-11-18 17:28:34');
/*!40000 ALTER TABLE `requestees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_location_advisor`
--

DROP TABLE IF EXISTS `service_location_advisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_location_advisor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_location_advisor`
--

LOCK TABLES `service_location_advisor` WRITE;
/*!40000 ALTER TABLE `service_location_advisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_location_advisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'25 Minute Free Consultation',25,'','2014-11-11 17:35:32','2014-11-11 17:35:32');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-21 13:45:12
