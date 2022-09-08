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

}

?>
<hr/>
<br/>
<button><a href="createpost.php">Create a new post</a></button><br/>
<hr/>

<br/>
<br/>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/>
<br/>
</body>
</html>