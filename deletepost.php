<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<title>Blogs</title>
<meta charset="UTF-8" />
<style>
    * {
	    text-align: center;
    }
    </style>
</head>
<body>
<h1>"Delete posts"</h1>

<h3>Delete old post</h3><br/>

<?php
if (!((isset($_SESSION['username']))&&(isset($_SESSION['password']))))
{
	// User is not logged in go back to logging.php.
	header('Location: logging.php');
}
else
{
	echo "<p>Welcome ".$_SESSION['acc']." ".$_SESSION['username'].'! [ <a href="logout.php">Logout!</a> ]</p>';

    $theUsername = $_SESSION['username'];
	$dbc = mysqli_connect ('localhost', 'root', '', 'project') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());

	if($_SESSION['acc'] == "admin")
	{
		$q = "SELECT title, date FROM posts ORDER BY date DESC;";

		$r = mysqli_query($dbc, $q);

		if (!($r))
		{
			echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
		}
		else
		{
			echo"<hr/><h3>All posts</h3>";
			while ($row = mysqli_fetch_array($r, MYSQLI_NUM))
			{
				echo "<table><tr><th>".$row[0]."</th><td>".$row[1]."</td><td><form action=\"delete.php\" method=\"POST\"><input name=\"delete\" value=\"".$row[0]."\" hidden></input><input type=\"submit\" value=\"Delete\"/></form></td></tr></table>";
			}
		}
		mysqli_free_result ($r);

		mysqli_close($dbc);

	}
	 else
	{
		$q = "SELECT title, date FROM posts WHERE userName=\"$theUsername\" ORDER BY date DESC;";

		$r = mysqli_query($dbc, $q);

		if (!($r))
		{
			echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
		}
		else
		{
			echo"<hr/><h3>Your posts</h3>";
			while ($row = mysqli_fetch_array($r, MYSQLI_NUM))
			{
				echo "<table><tr><th>".$row[0]."</th><td>".$row[1]."</td><td><form action=\"delete.php\" method=\"POST\"><input name=\"delete\" value=\"".$row[0]."\" hidden></input><input type=\"submit\" value=\"Delete\"/></form></td></tr></table>";
			}
		}
		mysqli_free_result ($r);


		mysqli_close($dbc);
	}
}

?>
<hr/>
<br/>
<button><a href="createpost.php">Create a new post</a></button><br/>
<hr/>

</form>
<br/>
<br/>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/>
<br/>
</body>
</html>