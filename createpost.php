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
	echo "<p>Welcome ".$_SESSION['username'].'! [ <a href="logout.php">Logout!</a> ]</p>';

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