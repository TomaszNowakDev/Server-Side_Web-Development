<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<meta charset="UTF-8" />
<style>
    * {
	    text-align: center;
    }
    </style>
</head>
<body>
<h1>"Adding new post"</h1>
<br/>
<h3>Create new post</h3><br/><br/>

<?php
if (!((isset($_SESSION['username']))&&(isset($_SESSION['password']))))
{
	// User is not logged in go back to logging.php.
	header('Location: logging.php');
}
else
{
	echo "<p>Welcome ".$_SESSION['acc']." ".$_SESSION['username'].'! [ <a href="logout.php">Logout!</a> ]</p>';

	if((isset($_POST['title'])) && (isset($_POST['postcontent'])))
	{
		$theTitle = $_POST['title'];
		$thePostcontent = $_POST['postcontent'];
		$theStyle = $_POST['style'];
		$theTitle = htmlentities($theTitle, ENT_QUOTES, "Utf-8");
		$thePostcontent = htmlentities($thePostcontent, ENT_QUOTES, "Utf-8");

	}
	else
	{
		// it is first time around on this page
		echo "<form action=\"createpost.php\" method=\"POST\">";
		echo "Title: <input name=\"title\" type=\"text\" required \"/><br/><br/>";
		echo "Post content: <textarea name=\"postcontent\" type=\"text\" cols=\"50\" rows=\"12\" required \"></textarea><br/><br/>";
		echo "<input type=\"radio\" name=\"style\" value=\"maroon\">Maroon ";
		echo "<input type=\"radio\" name=\"style\" value=\"navy\">Navy ";
		echo "<input type=\"radio\" name=\"style\" value=\"darkgreen\">Green ";
		echo "<input type=\"radio\" name=\"style\" value=\"purple\">Purple ";
		echo "<input type=\"radio\" name=\"style\" value=\"brown\">Brown<br/><br/>";
		echo "Written by ".$_SESSION['username'].".<br/><br/>";
		echo "<input type=\"submit\" value=\"Publish now\"/>";
	}
}

?>
<hr/>
<br/>
</form>
<br/>
<br/>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/>
<br/>
</body>
</html>