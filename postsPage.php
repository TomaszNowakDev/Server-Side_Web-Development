<! DOCTYPE HTML>
<html lang = "en">
<head>
    <meta charset="UTF-8" />
    <title>posts page</title>
    <meta name="Blog of the authors of famous rock songs" content="Blogs" />
</head>
<body>
<h1>Blogs</h1>
<br/>

<br/>
<button type="button"><a href="logging.php">Log in</a></button>
<br/><hr/>

<?php


$dbc = mysqli_connect ('localhost', 'root', '', 'project') OR die ("Something went wrong when I tried to connect to the database. There error message was :" . mysqli_connect_error());

$q = 'SELECT userName FROM postsauthors;';

$r = mysqli_query($dbc, $q);

if (!($r))
{
    echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($dbc) . "<br/>";
}
else
{
    echo "<form action=\"author.php\" method=\"POST\">";
    while ($row = mysqli_fetch_array($r, MYSQLI_NUM))
        {

            echo "<input type=\"submit\" name=\"author\" value=\"".$row[0]."\"></input>";

        }
        echo "</form>";
}

mysqli_free_result ($r);

?>

<hr/>
<br/>
<br/>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/>
<br/>
</body>
</html>
