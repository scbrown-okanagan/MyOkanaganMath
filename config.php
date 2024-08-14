<?php
//IMathAS Math Config File.  Adjust settings here!

//database access settings
$dbserver = "localhost";
$dbname = "imathasdb";
$dbusername = "adminer";
$dbpassword = file_get_contents("dbpassword.conf");

//error reporting level.  Set to 0 for production servers.
error_reporting(E_ALL & ~E_NOTICE);

//install name
$installname = 'MyOkanaganMath';

//login prompts
$loginprompt = "Username";
$longloginprompt = "Enter an email or other username.  Use only numbers, letters, periods, dashes, underscores, and @.";
//$loginformat = '/^[\w+\-]+$/';
$loginformat = '/^[\w\-_.@]+$/';

//require email confirmation of new users?
$emailconfirmation = false;

//email to send notices from
$sendfrom = "no-reply@imathas.okanagan.bc.ca";

//color shift icons as deadline approaches?
$colorshift = true;

//path settings
//web path to install
$imasroot = "";

//base site url - use when generating full URLs to site pages.
$httpmode = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	? 'https://' : 'http://';
$GLOBALS['basesiteurl'] = $httpmode . Sanitize::domainNameWithPort($_SERVER['HTTP_HOST']) . $imasroot;

//mimetex path
$mathimgurl = "http://www.imathas.com/cgi-bin/mimetex.cgi";

//A small logo to display on the upper right of course pages
  //set = '<img src="/path/to/img.gif">' or = 'Some Text'
  //Image should be about 120 x 80px
//$smallheaderlogo = '<img src="favicon.ico" width="50" height="50">';

//enable lti?
$enablebasiclti = true;

//allow nongroup libs?
$allownongrouplibs = false;

//allow course import of questions?
$allowcourseimport = false;

//allow macro install?
$allowmacroinstall = true;

//use more secure password hashes? requires PHP 5.3.7+
$CFG['GEN']['newpasswords'] = 'only';
$CFG['reqadminmfa'] = 'true';

$CFG['CPS']['theme'] = array('mom.css_fw1000',1);
$CFG['CPS']['themelist'] = "mom.css,mom.css_fw1000,mom.css_fw1920";
$CFG['CPS']['themenames'] = "MOM,MOM Fixed,MOM Fixed Wide";

$CFG['GEN']['headerinclude'] = 'myheadercontent.php';

$CFG['GEN']['enrollonnewinstructor'] = array(8);

$CFG['GEN']['qerroronold'] = array(100,25);

//LTI options
$CFG['LTI']['noCourseLevel'] = true;

//session path 
//$sessionpath = "";

//Amazon S3 access for file upload 

//$AWSkey = "";

//$AWSsecret = "";

//$AWSbucket = "";

//livepoll server config
$CFG['GEN']['livepollserver'] = 'imathas.okanagan.bc.ca';
$CFG['GEN']['livepollpassword'] = 'momlivepollpass';

//Uncomment to change the default course theme, also used on the home & admin page:
//$defaultcoursetheme = "default.css"
//To change loginpage based on domain/url/etc, define $loginpage here

$CFG['GEN']['domainlevel'] = -4;

//no need to change anything from here on
  /* Connecting, selecting database */
	try {
	 $DBH = new PDO("mysql:host=$dbserver;dbname=$dbname", $dbusername, $dbpassword);
	 $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	 $GLOBALS["DBH"] = $DBH;
	} catch(PDOException $e) {
	 die("<p>Could not connect to database: <b>" . $e->getMessage() . "</b></p></div></body></html>");
	}
	$DBH->query("set session sql_mode=''");

	  unset($dbserver);
	  unset($dbusername);
	  unset($dbpassword);

?>