<?php
if (!isset($imasroot)) { //don't allow direct access to loginpage.php
	header("Location: index.php");
	exit;
}
//any extra CSS, javascript, etc needed for login page
	$placeinhead = "<link rel=\"stylesheet\" href=\"$imasroot/infopages.css\" type=\"text/css\" />\n";
	$placeinhead .= "<script type=\"text/javascript\" src=\"$imasroot/javascript/jstz_min.js\" ></script>";
	$nologo = true;
	require("header.php");
	if (!empty($_SERVER['QUERY_STRING'])) {
		 $querys = '?'.$_SERVER['QUERY_STRING'];
	 } else {
		 $querys = '';
	 }
	 $loginFormAction = $GLOBALS['basesiteurl'] . substr($_SERVER['SCRIPT_NAME'],strlen($imasroot)) . Sanitize::encodeStringForDisplay($querys);
	 if (!empty($_SESSION['challenge'])) {
		 $challenge = $_SESSION['challenge'];
	 } else {
		 //use of microtime guarantees no challenge used twice
		 $challenge = base64_encode(microtime() . rand(0,9999));
		 $_SESSION['challenge'] = $challenge;
	 }
	 $pagetitle = "Welcome";
	 include("infoheader.php");
	 
?>
	


<div id="loginbox">
<form method="post" action="<?php echo $loginFormAction;?>">
<?php
	if ($haslogin) {
		if ($badsession) {
			if (isset($_COOKIE[session_name()])) {
				echo 'Problems with session storage';
			}  else {
				echo '<p>Unable to establish a session.  Check that your browser is set to allow session cookies</p>';
			}
		} else if (substr($line['password'],0,8)=='cleared_') {
			echo '<p>Your password has expired since your account has been unused. Use the Reset Password link below to reset your password.</p>';
		} else {
			echo "<p>Login Error.  Try Again</p>\n";
		}
	}
?>
<b>Login</b>

<div><noscript>JavaScript is not enabled.  JavaScript is required for <?php echo $installname; ?>.  Please enable JavaScript and reload this page</noscript></div>

<table>
<tr><td><label for="username"><?php echo $loginprompt;?></label>:</td><td><input type="text" size="15" id="username" name="username" /></td></tr>
<tr><td><label for="password">Password</label>:</td><td><input type="password" size="15" id="password" name="password" /></td></tr>
</table>
<div class=textright><input type="submit" value="Login"></div>

<div class="textright"><a href="<?php echo $imasroot; ?>/forms.php?action=newuser">Register as a new student</a></div>
<div class="textright"><a href="<?php echo $imasroot; ?>/forms.php?action=resetpw">Forgot Password</a><br/>
<a href="<?php echo $imasroot; ?>/forms.php?action=lookupusername">Forgot Username</a></div>

<input type="hidden" id="tzoffset" name="tzoffset" value=""> 
<input type="hidden" id="tzname" name="tzname" value=""> 
<input type="hidden" id="challenge" name="challenge" value="<?php echo $challenge; ?>" />
<script type="text/javascript">     
$(function() {
        var thedate = new Date();  
        document.getElementById("tzoffset").value = thedate.getTimezoneOffset();
        var tz = jstz.determine(); 
        document.getElementById("tzname").value = tz.name();
        $("#username").focus();
});
</script>  

</form>
</div>
<div class="text">

<h1>Instructors</h1>

<p><?php echo $installname; ?> is a web based assessment platform that provides delivery of homework, quizzes, tests, practice tests,
and diagnostics with rich mathematical content. Students can receive immediate feedback on algorithmically generated questions with a 
variety of different answer types, including numerical, algebraic, logical, and even chemical.
</p>

<p><?php echo $installname; ?> works best when connected to your institution's learning management system through LTI, but can also be
used as a standalone LMS.</p>

<p>If you are a instructor wishing to use <?php echo $installname; ?> for the first time, you can 
<a href="<?php echo $imasroot;?>/newinstructor.php">request an instructor account</a>.</p>

<h1>Students</h1>

<p>In most cases, your assignments will be accessed through your institution's Learning Management System (Canvas, Moodle, Blackboard, 
D2L Brightspace, etc.) and you will not be given a direct login to this page.</p>

<p>If you you were given a course ID and enrollment key, and need to set up a new account then you may 
<a href="<?php echo $imasroot; ?>/forms.php?action=newuser">register as a new student</a>.</p>

<br class=clear>
<p class="textright"><?php echo $installname;?> is powered by <a href="http://www.imathas.com">IMathAS</a> &copy; 2006-2025 David Lippman<br />
and managed by <a href="mailto:scbrown@okanagan.bc.ca">Stephen Brown</a></p>
</div>
<?php 
	require("footer.php");
?>
