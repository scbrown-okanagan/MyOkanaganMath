<?php
$nologo = true;
$dbsetup = true; //prevents connection to database
include("../init_without_validate.php");
//This is stuff I added to get otbs.css loaded up
$coursetheme = $CFG['CPS']['theme'][0];
$placeinhead = "<link rel=\"stylesheet\" href=\"$staticroot/infopages.css\" type=\"text/css\">\n";
$placeinhead .= "<link rel=\"stylesheet\" href=\"$staticroot/themes/otbs.css\" type=\"text/css\">\n";
require("../header.php");
$pagetitle = "About MOM";
require((isset($CFG['GEN']['diagincludepath'])?$CFG['GEN']['diagincludepath']:'../')."infoheader.php");
?>

<img class="floatleft" src="<?php echo "$imasroot/img/typing.jpg"?>" alt="Picture of typing"/>

<div class="content">

<h1>What is <?php echo $installname; ?>?</h1>

<p><?php echo $installname; ?> is a web based assessment and course management platform designed for mathematics and other 
quantitative fields. The primary focus of this system is to provide algorithmically generated assessments for homework, 
quizzes, tests, practice tests, and diagnostics. 
</p>

<p>
<?php echo $installname; ?> runs on the open source <a href="http://www.imathas.com/">IMathAS</a> online assessment software 
and is hosted in Kelowna, BC by the Canadian hosting company, <a href="https://www.canhost.ca/">CanHost</a>.
</p>

<h1>An open, collaborate platform for assessments</h1>

<p>
<?php echo $installname; ?> is supported by a collaborative community of instructors. Question libraries and pre-built courses 
are all created by faculty and shared with others. Much of the question library has been generously contributed by the community 
over at <a href="https://www.myopenmath.com/">MyOpenMath</a>, which serves as the primary server running 
<a href="http://www.imathas.com/">IMathAS</a>.
</p>

</div>

</body>
</html>
