<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Post Page</title>
    <style>
    * {
	    text-align: center;
    }
    </style>
</head>

<body>
    <main><h1>Blogs</h1>
<br/><br/>
    <?php
    if (!(isset($_POST['title'])))
    {
        // the title was not selected from postspage.
        header('Location: postspage.php');
    }
    else
    {
        $theTitle = $_POST['title'];
        $theTitle = htmlentities($theTitle, ENT_QUOTES, "Utf-8");
        $dbc = mysqli_connect ('localhost', 'root', '', 'project') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());

        $q = "SELECT title, postcontent, style, userName, date FROM posts WHERE title=\"$theTitle\";";

        $r = mysqli_query($dbc, $q);

        if (!($r))
        {
            echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
        }
        else
        {
            $row = mysqli_fetch_array($r, MYSQLI_NUM);

            echo "<table><tr><th>".$row[0]." </th></tr><tr><td><span style=\"color:".$row[2].";font-style:italic\">".$row[1]."</span></td></tr><tr><td>".$row[3]."</td></tr><tr><td>".$row[4]."</td></tr></table></br>";

        }

        mysqli_free_result ($r);
        mysqli_close($dbc);

    }
?>
<button><a href="postsPage.php">Back</a></button><br/>
<hr/>
<br/><br/>
</main>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/><br/>
</body>

</html>
