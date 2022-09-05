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
    ?>
<button><a href="postsPage.php">Back</a></button><br/>
<hr/>
<br/><br/>
</main>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/><br/>
</body>

</html>
