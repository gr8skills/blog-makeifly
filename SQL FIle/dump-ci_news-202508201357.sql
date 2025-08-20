-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: localhost    Database: ci_news
-- ------------------------------------------------------
-- Server version	8.0.43-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbladdnews`
--

DROP TABLE IF EXISTS `tbladdnews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladdnews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `newtitle` varchar(200) DEFAULT NULL,
  `Category` varchar(200) DEFAULT NULL,
  `Sub_category` varchar(200) DEFAULT NULL,
  `Upload_Image` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladdnews`
--

LOCK TABLES `tbladdnews` WRITE;
/*!40000 ALTER TABLE `tbladdnews` DISABLE KEYS */;
INSERT INTO `tbladdnews` VALUES (2,'Best Clinics and Costs in Austria 2025 - Get the best medical attention you deserve','4','10','20250820130825-610769.jpeg','<p>The&nbsp;<a href=\"https://us-uk.bookimed.com/page/clinic-ranking-policy/\">Bookimed clinic ranking</a>&nbsp;is based on data science algorithms, providing a trusted, transparent, and objective comparison. It takes into account patient demand, review scores (both positive and negative), the frequency of updates to treatment options and prices, response speed, and clinic certifications.</p>\r\n\r\n<p><a href=\"https://us-uk.bookimed.com/clinic/wiener-privat-klinik/\">Wiener Privatklinik is a private hospital in Austria. Prof. Rainer Kotz is the Medical Director of the Clinic. Wiener Privatklinik has the connection with some Nobel Prize winners. Among them Theodor Billroth, Robert Barany, Karl Landsteiner, Konrad Lorenz,</a></p>\r\n','2022-01-17 17:32:12'),(3,'Newcastle do not foresee Isak leaving the club','1','3','20250820130823-688852.jpeg','<p><strong>Club respond to striker&#39;s social media post calling for exit by saying he will remain at St James&#39; Park</strong></p>\r\n\r\n<p>Newcastle United have said that do not foresee&nbsp;<a href=\"https://www.premierleague.com/en/players/219168/alexander-isak/overview\">Alexander Isak</a>&nbsp;being sold this transfer window after the striker posted on social media that he wanted to leave the club.</p>\r\n\r\n<p>The Swedish striker has not featured for&nbsp;<a href=\"https://www.premierleague.com/en/clubs/4/newcastle-united/overview\">Newcastle</a>&nbsp;since pre-season and has been heavily linked with a move to&nbsp;<a href=\"https://www.premierleague.com/en/clubs/14/liverpool/overview\">Liverpool</a>&nbsp;this summer.</p>\r\n\r\n<p>In an Instragam post on Tuesday evening Isak, who scored 23 Premier League goals in 2024/25, explained that he &quot;didn&#39;t feel it right&quot; to attend the PFA awards ceremony that night despite being named in their Team of the Season due to &quot;everything going on&quot;.</p>\r\n','2022-01-17 17:34:39'),(5,'A Guide to Road Travel by Night in Nigeria','5','12','20250820130842-194894.jpg','<p>The high demand by Nigerian commuters for night journey has left bus drivers no other option but to give in to their demands.</p>\r\n\r\n<p>Nigerians who travel at night say they have reasons for preferring night buses even though they know that the poor conditions of the luxury buses could endanger their lives.</p>\r\n\r\n<p>Time management is possibly the major reason why commuters prefer night travel by road. For businessmen and women, travelling at night makes it possible for them to get their destination on time, make their purchases and make a u-turn back to their homes. This way, they would be able to evade incurring extra costs for feeding and hotel accommodations.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>These tips will make your road travel by night in Nigeria easier and safer:</strong></p>\r\n\r\n<p><strong>MAKE SURE THE ROUTE IS SAFE</strong></p>\r\n\r\n<p>This should be the first thing to consider before boarding a night bus. Check local travel advisories and be sure that the routes the bus would be taking are not places where robberies and/ or accidents are common at night. If you see warnings about this, you might want to go for a day bus.</p>\r\n\r\n<p><strong>TAKE A FIRST CLASS BUS</strong></p>\r\n\r\n<p>Before embarking on a night journey, think carefully if you would rather opt for the cheapest bus than taking a first-class bus. A first-class bus would definitely put your mind at ease because there would be no fear of breakdowns during the journey.</p>\r\n\r\n<p><strong>Nigerian transport companies that provide topnotch services to commuters include:&nbsp;</strong><strong>God is Good Motors</strong><strong>,&nbsp;</strong><strong>Peace Mass Transit</strong><strong>,&nbsp;</strong><strong>ABC Transport</strong><strong>,&nbsp;</strong><strong>Young Shall Grow Motors</strong><strong>,&nbsp;</strong><strong>Agofure Motors</strong><strong>,&nbsp;</strong><strong>GUO Transport</strong><strong>, etc.</strong></p>\r\n\r\n<p>These companies place a high priority on the life and security of their passengers.</p>\r\n\r\n<p>You might want to read on how to survive the daily traffic congestion in Lagos.</p>\r\n\r\n<p><strong>CHOOSE YOUR SEAT CAREFULLY</strong></p>\r\n\r\n<p>There are several factors to consider when choosing your seat on a night bus. Some people feel they would sleep better near the window as this is the perfect angle to place your travel pillow to rest your head, others prefer to sit in front. This might help for better vision and can be reassuring. If you love roller coasters, you might want to take a seat in front. Others prefer to sit at the back, but know that the further you are, the bumpier the ride. Considering the state of the roads<strong>, the</strong>&nbsp;<strong>middle seat might be the safest place to sit.</strong></p>\r\n','2022-01-17 17:42:39'),(6,'Music festivals and tours are happening in the US in the coming months. ','2','7','20250820130808-850427.jpg','<p>Several major music festivals and tours are happening in the US in the coming months.&nbsp;These include the&nbsp;North Coast Music Festival, Bumbershoot, and Sun Soaked, as well as tours by artists like Deftones, Chris Brown, and The Weeknd.&nbsp;</p>\r\n\r\n<p>Here&#39;s a more detailed look:</p>\r\n\r\n<p>Festivals:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong><a href=\"https://www.google.com/search?sca_esv=1c2c48b035966a68&amp;q=Sun+Soaked&amp;sa=X&amp;ved=2ahUKEwjDpfmutJmPAxUKVEEAHe_hA5MQxccNegUIiwEQAQ&amp;mstk=AUtExfACMf9ZmjMiBGfZ8wJnO3Z_qba9oUGDRyVtDpxKDwmY9tym3zZimUvfNuZ8nw4VGUCAuqm29RhukdiZMnpvvoDJAV3qEgLfvk_VPGqXi-1D39QQ9UkwkhU97_dm5Q4V1Lo&amp;csui=3\" target=\"_blank\">Sun Soaked</a>:</strong></p>\r\n\r\n	<p>Taking place on September 6, 2025, in Huntington Beach, CA, this festival features MEDUZA, Kaskade, and more, according to Songkick.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong><a href=\"https://www.google.com/search?sca_esv=1c2c48b035966a68&amp;q=Governors+Ball+Music+Festival&amp;sa=X&amp;ved=2ahUKEwjDpfmutJmPAxUKVEEAHe_hA5MQxccNegUIigEQAQ&amp;mstk=AUtExfACMf9ZmjMiBGfZ8wJnO3Z_qba9oUGDRyVtDpxKDwmY9tym3zZimUvfNuZ8nw4VGUCAuqm29RhukdiZMnpvvoDJAV3qEgLfvk_VPGqXi-1D39QQ9UkwkhU97_dm5Q4V1Lo&amp;csui=3\" target=\"_blank\">Governors Ball Music Festival</a>:</strong></p>\r\n\r\n	<p>This festival is taking place in Corona Park, New York City, with a lineup including electronic, indie rock, hip-hop, and more,&nbsp;<a href=\"https://www.musicfestivalwizard.com/music-festivals-this-june-united-states/\">notes Music Festival Wizard</a>.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong><a href=\"https://www.google.com/search?sca_esv=1c2c48b035966a68&amp;q=Rolling+Loud&amp;sa=X&amp;ved=2ahUKEwjDpfmutJmPAxUKVEEAHe_hA5MQxccNegUIiQEQAQ&amp;mstk=AUtExfACMf9ZmjMiBGfZ8wJnO3Z_qba9oUGDRyVtDpxKDwmY9tym3zZimUvfNuZ8nw4VGUCAuqm29RhukdiZMnpvvoDJAV3qEgLfvk_VPGqXi-1D39QQ9UkwkhU97_dm5Q4V1Lo&amp;csui=3\" target=\"_blank\">Rolling Loud</a>:</strong></p>\r\n\r\n	<p>Scheduled for March 15-16, 2025, in Inglewood, California, Rolling Loud is known for its groundbreaking performances,&nbsp;<a href=\"https://www.lemon8-app.com/@iamhayleymarie/7256514447433400837?region=us\">according to Lemon 8</a>.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong><a href=\"https://www.google.com/search?sca_esv=1c2c48b035966a68&amp;q=North+Coast+Music+Festival&amp;sa=X&amp;ved=2ahUKEwjDpfmutJmPAxUKVEEAHe_hA5MQxccNegQIJhAB&amp;mstk=AUtExfACMf9ZmjMiBGfZ8wJnO3Z_qba9oUGDRyVtDpxKDwmY9tym3zZimUvfNuZ8nw4VGUCAuqm29RhukdiZMnpvvoDJAV3qEgLfvk_VPGqXi-1D39QQ9UkwkhU97_dm5Q4V1Lo&amp;csui=3\" target=\"_blank\">North Coast Music Festival</a>:</strong></p>\r\n\r\n	<p>This festival takes place from August 29-31, 2025, at SeatGeek Stadium in Bridgeview, IL, and features artists like Zedd, Deadmau5, and Galantis,&nbsp;<a href=\"https://www.songkick.com/festivals/countries/us\">according to Songkick</a>.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong><a href=\"https://www.google.com/search?sca_esv=1c2c48b035966a68&amp;q=Bumbershoot&amp;sa=X&amp;ved=2ahUKEwjDpfmutJmPAxUKVEEAHe_hA5MQxccNegQILhAB&amp;mstk=AUtExfACMf9ZmjMiBGfZ8wJnO3Z_qba9oUGDRyVtDpxKDwmY9tym3zZimUvfNuZ8nw4VGUCAuqm29RhukdiZMnpvvoDJAV3qEgLfvk_VPGqXi-1D39QQ9UkwkhU97_dm5Q4V1Lo&amp;csui=3\" target=\"_blank\">Bumbershoot</a>:</strong></p>\r\n\r\n	<p>Held in Seattle Center, Seattle, WA, from August 30-31, 2025, this festival includes Weezer, Sylvan Esso, and others, says Songkick.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n','2022-01-17 17:44:28'),(8,'Brexit Blues: UK Threatens to Cancel Security Cooperation','3','9','20250820130830-358754.jpg','<p>Brexit negotiations have started with a bang, not a whimper, as Britain&#39;s prime minster, Theresa May, has threatened to cancel the U.K.&#39;s participation in the EU&#39;s cross-border, police-led intelligence operations unless Britain gets what it wants.</p>\r\n\r\n<p>The threat comes despite those operations, coordinated by Europol and its &quot;EC3&quot; European Cybercrime Center, having helped disrupt numerous criminal syndicates, including cybercrime operators. It also follows by just one week the&nbsp;<a href=\"https://www.databreachtoday.com/british-home-secretary-demands-backdoored-communications-a-9796\">Westminster attack</a>, launched in the vicinity of where Parliament meets by a British national and potential extremist.</p>\r\n\r\n<p>On March 29, Britain&#39;s ambassador to the EU, Tim Barrow, delivered a&nbsp;<a href=\"https://www.gov.uk/government/uploads/system/uploads/attachment_data/file/604079/Prime_Ministers_letter_to_European_Council_President_Donald_Tusk.pdf\" target=\"_blank\">six-page letter</a>&nbsp;from May to the European Council President Donald Tusk. The letter triggers Article 50 of the EU treaty, which begins up to two years of negotiations over how exactly Britain will exit the EU.</p>\r\n','2022-01-26 09:29:18'),(9,'Things you must know before traveling','5','12','20250820130816-6928.png','<p>Before traveling, ensure you have necessary documents (passport, visa if required), understand destination specifics (culture, laws, weather), and prioritize health (vaccinations, insurance) and safety (awareness, secure belongings). Also, research transportation, accommodation, and exchange currency as needed. Detailed Checklist:</p>\r\n\r\n<p>Documents:-</p>\r\n\r\n<ul>\r\n	<li>Passport: Ensure it&#39;s valid for at least six months beyond your trip&#39;s return date.</li>\r\n	<li>Visa: If required for your destination, obtain it before departure.</li>\r\n	<li>Travel Insurance: Protect yourself against unexpected events like illness, injury, or trip cancellations.</li>\r\n	<li>Other Documents: Keep copies of your itinerary, tickets, hotel reservations, and any other relevant booking confirmations. Photocopies: Make copies of your passport and other important documents, storing them separately from the originals.</li>\r\n</ul>\r\n','2022-01-26 09:38:29');
/*!40000 ALTER TABLE `tbladdnews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbladmin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmin`
--

LOCK TABLES `tbladmin` WRITE;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` VALUES (1,'Admin','admin@gmail.com','Test@123','2022-01-08 03:58:42');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategory`
--

DROP TABLE IF EXISTS `tblcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategory`
--

LOCK TABLES `tblcategory` WRITE;
/*!40000 ALTER TABLE `tblcategory` DISABLE KEYS */;
INSERT INTO `tblcategory` VALUES (1,'sports'),(2,'Entertainment'),(3,'Politics'),(4,'Technology'),(5,'General');
/*!40000 ALTER TABLE `tblcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcomment`
--

DROP TABLE IF EXISTS `tblcomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcomment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postid` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `emailid` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcomment`
--

LOCK TABLES `tblcomment` WRITE;
/*!40000 ALTER TABLE `tblcomment` DISABLE KEYS */;
INSERT INTO `tblcomment` VALUES (1,'5','Shiv','shiv@gmail.com','Please Take care sir ','1','2022-01-17 18:06:43'),(2,'4','Anuj kumar','ak@gmail.com','Test@123','1','2022-01-26 05:26:08'),(3,'7','Anuj ','test@gmail.com','Test comment','1','2022-01-26 06:04:32'),(4,'9','Amit','amit@gmail.com','Happy Republic Day','1','2022-01-26 09:39:17'),(5,'5','Igvar','igvar@mailinator.com','Kamprad','1','2025-08-20 00:24:43'),(6,'6','Kyle Walker','kyle@gmail.com','test comment','1','2025-08-20 00:32:48');
/*!40000 ALTER TABLE `tblcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsub_category`
--

DROP TABLE IF EXISTS `tblsub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  `subcategory_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsub_category`
--

LOCK TABLES `tblsub_category` WRITE;
/*!40000 ALTER TABLE `tblsub_category` DISABLE KEYS */;
INSERT INTO `tblsub_category` VALUES (1,'1','cricket'),(2,'1','tokyo-olympics-2021'),(3,'1','football'),(7,'2','Hollywood'),(8,'2','Web Series'),(9,'3','National'),(10,'4','Blockchain'),(12,'5','Travel');
/*!40000 ALTER TABLE `tblsub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ci_news'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-20 13:57:56
