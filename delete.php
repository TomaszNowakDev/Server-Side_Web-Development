<?php
// Start the session
session_start();

if (!((isset($_SESSION['username']))&&(isset($_SESSION['password']))))
{
	// User is not logged in go back to logging.php.
	header('Location: logging.php');
}
else
{
    if (!(isset($_POST['delete'])))
    {
        // the author was not selected from postspage.
        header('Location: deletepost.php');
    }
    else
    {
        $theDelete = $_POST['delete'];

        $dbc = mysqli_connect ('localhost', 'root', '', 'project') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());

        $q ="DELETE FROM posts WHERE title=\"$theDelete\";";

        $r = mysqli_query($dbc, $q);
        mysqli_close($dbc);
        header('Location: deletepost.php');

    }

}

?>