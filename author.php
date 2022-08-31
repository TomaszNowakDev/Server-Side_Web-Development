<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Author Page</title>
    <style>
    * {
	    text-align: center;
    }
    </style>
</head>

<body>
    <main><h1>Blogs</h1>
<br/>
        <?php
        if (!(isset($_POST['author'])))
        {
            // the author was not selected from postspage.
            header('Location: postspage.php');
        }
        else
        {
            $theAuthor = $_POST['author'];
            echo "<strong>$theAuthor</strong>";
            echo "<figure>
                <img src=\"img/".$theAuthor.".jpg\" alt=\"".$theAuthor."\" title=\"".$theAuthor."\" width=\"450\" height=\"450\">
                <figcaption>\"".$theAuthor."\"</figcaption>
                </figure>";

            echo "<form action=\"postsPage.php\" method=\"POST\">";
			echo "<input type=\"submit\" name=\"author\" value=\"$theAuthor\"></input>";
			echo "</form>";
        }
        ?>
    <hr/>
    <br/><br/>
    </main>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/><br/>
</body>

</html>
