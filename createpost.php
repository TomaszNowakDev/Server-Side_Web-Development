<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<title>Create new post</title>
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

		if(!(($theTitle == NULL) || (trim($theTitle) == "")||(($thePostcontent == NULL) || (trim($thePostcontent) == ""))))
		{
			// we have all what we need, update DB
			$theUsername = $_SESSION['username'];
			$date = date('Y-m-d H:i:s');

			$dbc = mysqli_connect ('localhost', 'root', '', 'project') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());

			$q = "INSERT INTO posts (title, postcontent, style, userName, date) VALUES ('$theTitle','$thePostcontent','$theStyle','$theUsername','$date')";

			$r = mysqli_query($dbc, $q);

			if (!($r))
			{
				echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
			}
			else
			{
				echo "Transaction was successful!\nPost published.";
			}

			mysqli_close($dbc);
			unset($_SESSION['title']);
			unset($_SESSION['postcontent']);
			header('Location: createpost.php');
		}
		else
		{
			// the title or the content was dodgy repeat
			echo "<form action=\"createpost.php\" method=\"POST\">";
			echo "Title: <input name=\"title\" type=\"text\" required \"/><br/><br/>";
			echo "Post content: <textarea name=\"postcontent\" type=\"text\" cols=\"50\" rows=\"12\" required \"></textarea><br/><br/>";
			echo "<input type=\"radio\" name=\"style\" value=\"maroon\">Maroon ";
			echo "<input type=\"radio\" name=\"style\" value=\"navy\">Navy ";
			echo "<input type=\"radio\" name=\"style\" value=\"darkgreen\">Green ";
			echo "<input type=\"radio\" name=\"style\" value=\"purple\">Purple ";
			echo "<input type=\"radio\" name=\"style\" value=\"brown\">Brown<br/><br/>";
			echo "<span style=\"color:red\">\tTitle or post content missing!</span><br/>";
			echo "Written by ".$_SESSION['username'].".<br/><br/>";
			echo "<input type=\"submit\" value=\"Publish now\"/>";
		}
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