<?php
/*
2011/06/14  Jeremy:  The PHP Array Option of creating the database sucked, so I copied and pasted an
SQL dump into this file and made it my own.
*/

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Atempt to Create database, warn the creater if it doesn't work
if (mysql_query("CREATE DATABASE PHP_PROJECT_JRP",$con))
  {
  echo "Database created<br />";
  }
else
  {
  die("Error creating database: " . mysql_error() . "<br />");
  }
  
// Create content storage table
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = ("DROP TABLE IF EXISTS `CONTENT_STORAGE`;
CREATE TABLE IF NOT EXISTS `CONTENT_STORAGE` (
  `CONTENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENT_PAGE` varchar(50) NOT NULL,
  `CONTENT_SECTION` smallint(6) NOT NULL,
  `CONTENT_HTML` text NOT NULL,
  PRIMARY KEY (`CONTENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7;");

// Execute query
if (mysql_query($sql,$con)){
	echo "Users table created<br />";
}
else{
	die("Error creating Content Storge table: " . mysql_error() . "<br />");
}

// Create Testimonials table
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = ("DROP TABLE IF EXISTS `CUSTOMER_TESTIMONIALS`;
CREATE TABLE IF NOT EXISTS `CUSTOMER_TESTIMONIALS` (
  `TESTIMONIAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TESTIMONIAL` text NOT NULL,
  `CUSTOMER_NAME` varchar(100) NOT NULL,
  `CUSTOMER_COMPANY` varchar(100) NOT NULL,
  `CUSTOMER_LOCATION` varchar(100) NOT NULL,
  PRIMARY KEY (`TESTIMONIAL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11;");

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

// Create Meta Data table
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = ("DROP TABLE IF EXISTS `META_DATA`;
CREATE TABLE IF NOT EXISTS `META_DATA` (
  `PAGE_ID` varchar(50) NOT NULL,
  `META_TITLE` text NOT NULL,
  `META_KEYWORDS` text NOT NULL,
  `META_DESCRIPTION` text NOT NULL,
  PRIMARY KEY (`PAGE_ID`),
  UNIQUE KEY `PAGE_ID` (`PAGE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

// Create User Info table
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = ("DROP TABLE IF EXISTS `USER_INFO`;
CREATE TABLE IF NOT EXISTS `USER_INFO` (
  `USERNAME` varchar(30) NOT NULL,
  `USER_PASSWORD` varchar(30) NOT NULL,
  `USER_F_NAME` varchar(30) NOT NULL,
  `USER_L_NAME` varchar(30) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_QUESTION` text NOT NULL,
  `USER_ANSWER` text NOT NULL,
  `USER_LEVEL` varchar(30) NOT NULL,
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;;");

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

// Create Vendors table
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = ("DROP TABLE IF EXISTS `VENDORS`;
CREATE TABLE IF NOT EXISTS `VENDORS` (
  `VENDOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VENDOR_NAME` varchar(100) NOT NULL,
  `VENDOR_WEBSITE` varchar(100) NOT NULL,
  `VENDOR_GRAPHIC_INFO` varchar(50) NOT NULL,
  PRIMARY KEY (`VENDOR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;");

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into content storage
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `CONTENT_STORAGE` (`CONTENT_ID`, `CONTENT_PAGE`, `CONTENT_SECTION`, `CONTENT_HTML`) VALUES
(1, 'index.php', 2, '<p>\r\n	<strong>Welcome to Crafters Home!</strong></p>\r\n<p style='text-align: center'>\r\n	There are things we acquire throughout our lives of great worth; a house, a car, a boat or even a business. And then there are those things that you just can&rsquo;t put a value on. <strong>Events, memories, family and friends </strong>are the things that give us joy and create those moments that we never want to forget.<br />\r\n	<br />\r\n	You are invited to join the Crafters Home family by visiting one of over 110 independently owned craft and scrapbook stores. From invitations and announcements to greeting cards, scrapbook pages and even home decorating ideas, let us help you create and share those special moments throughout your life.<br />\r\n	<br />\r\n	<strong>Come visit a Crafters Home store near you and experience the difference!</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(2, 'index.php', 3, '<p style='text-align: center'>\r\n	Contact Crafters Home for more information!</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(3, 'index.php', 4, '<p style='text-align: center'>\r\n	By joining Crafters Home you will enjoy numerous membership benefits including everyday discounts with top industry vendors, promotional opportunities, a secure members only message board with great information and ideas, and more!&nbsp; Contact us to learn all the ways a Crafters Home membership can make you a more successful and&nbsp;profitable craft store!</p>\r\n'),
(4, 'membership-benefits-crafters-home.php', 1, '<p style='text-align: center;'>\r\n	&nbsp;Contact Crafters Home for more information!</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(5, 'about-crafters-home.php', 1, '<p style='text-align: center'>\r\n	&nbsp;Contact us to see which Crafters Home stores are carrying the&nbsp;Crafters Home exclusive limited edition Quickutz flower border die, frame and Heidi Swapp alphabet font!&nbsp; Yep Yep!</p>\r\n<p style='text-align: center'>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n'),
(6, 'about-crafters-home.php', 2, '<p style='text-align: center'>\r\n	By joining Crafters Home you will enjoy numerous membership benefits including everyday discounts with top industry vendors, promotional opportunities, a secure members only message board with great information and ideas, and more!&nbsp; Contact us to learn all the ways a Crafters Home membership can make you a more successful and profitable craft store!&nbsp; Just a little bit!</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into testimonials
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `CUSTOMER_TESTIMONIALS` (`TESTIMONIAL_ID`, `TESTIMONIAL`, `CUSTOMER_NAME`, `CUSTOMER_COMPANY`, `CUSTOMER_LOCATION`) VALUES
(1, '<p style='text-align: center;'>\r\n	<i>Being a new store owner, I really want to just say that I know if I have a question about anything, CH members are there for me!</i></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Dallas', 'DML Scrapbooks, Inc', 'Lubbock, TX '),
(5, '<p>\r\n	Testing alpha</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Jeremy', 'n/ah', 'EDCC'),
(6, '<p>Test beta</p>\r\n', 'Jeremy', 'n/a', 'EDCC'),
(7, '<p>test gamma</p>\r\n', 'Jeremy', 'n/a', 'EDCC'),
(9, '<p>\r\n	test omega</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'JEREMY', 'N/A', 'EDCC');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into testimonials
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `CUSTOMER_TESTIMONIALS` (`TESTIMONIAL_ID`, `TESTIMONIAL`, `CUSTOMER_NAME`, `CUSTOMER_COMPANY`, `CUSTOMER_LOCATION`) VALUES
(1, '<p style='text-align: center;'>\r\n	<i>Being a new store owner, I really want to just say that I know if I have a question about anything, CH members are there for me!</i></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Dallas', 'DML Scrapbooks, Inc', 'Lubbock, TX '),
(5, '<p>\r\n	Testing alpha</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Jeremy', 'n/ah', 'EDCC'),
(6, '<p>Test beta</p>\r\n', 'Jeremy', 'n/a', 'EDCC'),
(7, '<p>test gamma</p>\r\n', 'Jeremy', 'n/a', 'EDCC'),
(9, '<p>\r\n	test omega</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'JEREMY', 'N/A', 'EDCC');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into meta data
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `META_DATA` (`PAGE_ID`, `META_TITLE`, `META_KEYWORDS`, `META_DESCRIPTION`) VALUES
('about-crafters-home.php', 'Crafters - About us', 'crafters about us', 'Find out more about Crafters!'),
('index.php', 'Crafters - Home Page', 'crafters, crafters home page', 'Welcome to Crafters home page!'),
('membership-benefits-crafters-home.php', 'Crafters Membership Benefits Page', 'Crafters Membership Benefits', 'Find out the benefits of becoming a Crafters member!'),
('partner-vendors-crafters-home.php', 'Crafters - Our Vendor', 'Crafters, crafters vendors', 'Here is a list of our participating vendors.'),
('testimonials-crafters-home.php', 'Crafters - Testimonial Page', 'crafters, crafters testimonial page', 'Crafters Testimonial page');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into user info
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `USER_INFO` (`USERNAME`, `USER_PASSWORD`, `USER_F_NAME`, `USER_L_NAME`, `USER_EMAIL`, `USER_QUESTION`, `USER_ANSWER`, `USER_LEVEL`) VALUES
('admin', 'craftersJRP', 'Marti', 'Baker', 'mbaker@email.edcc.edu', 'Your profession?', 'Web instructor.', 'Super Administrator'),
('janeuser', 'janeuser1', 'Jane', 'User', 'janeuser@website.com', 'What position do you have?', 'Use', 'User'),
('jeremyrperry', 'Jrp1234!', 'Jeremy', 'Perry', 'jeremyrperry@gmail.com', 'The name of your first pet?', 'Weatherby', 'Super Administrator'),
('joeuser', 'joeuser1', 'Joe', 'User', 'joeuser@website.com', 'What position do you have?', 'User', 'User'),
('suzyadmin', 'admin1', 'Suzy', 'Admin', 'suzyadmin@website.com', 'What positin do you have?', 'Administration', 'Administrator');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

//Insert into vendors
mysql_select_db("PHP_PROJECT_JRP", $con);
$sql = "INSERT INTO `VENDORS` (`VENDOR_ID`, `VENDOR_NAME`, `VENDOR_WEBSITE`, `VENDOR_GRAPHIC_INFO`) VALUES
(1, '3 Bugs In a Rug', 'http://www.3bugsinarug.com', '3bugs_in_a_rug_logo.gif'),
(2, '7 Gypsies', 'http://www.7gypsies.com', '7gypsies_logo _website.jpg'),
(3, 'AccuCut', 'http://www.accucut.com', 'AClogo_4c_RGB.jpg'),
(4, 'Advantus', 'http://www.advantus.com', 'advantus.jpg'),
(5, 'Amate Studios', 'http://www.amantestudios.com', 'amate.jpg'),
(6, 'American Crafts', 'http://www.americancrafts.com', 'AC_Logo_2006.jpg'),
(7, 'ANW Crestwood - The Paper Company - Paper Adventures', 'http://www.anwcrestwood.com', 'anwcrestwood_logo.gif'),
(8, 'Art Gone Wild &amp; Friends', 'http://www.inkantics.com', 'agw_and_friends.jpg'),
(9, 'Art Institute Glitter, Inc.', 'http://www.artglitter.com', 'glitter.jpg'),
(10, 'Artistic Wire', 'http://www.beadalon.com', 'artistic_wire_(beadalon).jpg'),
(11, 'Bazzill BasicsPaper', 'http://www.bazzillbasics.com', 'Bazzill_Logo_Complete_red.jpg'),
(12, 'Beacon Adhesives', 'http://www.signaturecrafts.com', 'beaconadhesives.jpg'),
(13, 'Beadalon', 'http://www.beadalon.com', 'beadalon.jpg'),
(14, 'Bella Blvd', 'http://www.bellablvd.net', 'bellaBlvd.jpg'),
(15, 'Berwick Offray', 'http://www.offray.com', 'imgBerwickLogo.gif'),
(16, 'Bo-Bunny Pres', 'http://www.bobunny.com', 'bobunny.jpg'),
(17, 'Buttons Galore', 'http://www.morebuttons.com', 'buttons_galorelogo.gif'),
(18, 'C & T Publishing', 'http://www.ctpub.com', 'ctlogo.jpg'),
(19, 'C-Line Products, Inc.', 'http://www.C-LineProducts.com', 'clinelogo.jpg'),
(20, 'Carolee''s Creations-Adorn It', 'http://www.adornit.com', 'adorenit.jpg'),
(21, 'Chartpak', 'http://www.chartpak.com', 'chartpak_logo.jpg'),
(22, 'Clear Scraps', 'http://www.clearscraps.com', 'ClearScraps.jpg'),
(23, 'Clearsnap - Colorbox', 'http://www.clearsnap.com', 'clearsnaps.jpg'),
(24, 'Collected Memories', 'http://www.collectedmemories.com', 'collected.jpg'),
(25, 'Colorbok', 'http://www.colorbok.com', 'Colorbok_Logo.gif'),
(26, 'Cosmo Cricket', 'http://www.cosmocricket.com', 'cosmo_cricket_logo.jpg'),
(27, 'Creative Charms', 'http://www.creativecharms.com', 'creativecharms.jpg'),
(28, 'Creative Imaginations', 'http://www.creativeimaginations.us', 'CI_Logo(1).jpg');";

// Execute query
if (mysql_query($sql,$con)){
	echo "pages table created<br />";
}
else{
	die("Error pages table creation: " . mysql_error() . "<br />");
};

mysql_close($con);

?>