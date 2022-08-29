<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Blogs</title>
    <meta name="Blog of the authors of famous rock songs" content="Blogs" />

</head>

<body>
    Log in to your account. <br/><hr/>
    <?php
        echo "<form action=\"logging.php\" method=\"POST\">";
        echo "Username: <br/><input name=\"username\" type=\"text\" required \"/><br/>";
        echo "Password: <br/><input name=\"password\" type=\"password\" required \"/><br/><hr/>";
        echo "<input type=\"reset\" value=\"Reset\"> ";
        echo "<input type=\"submit\" value=\"Log in\"/>";

    ?>
    </form>
    <hr/>
<br/>
<br/>
<footer>Tomasz Nowak | Server-Side Web Development Project</footer>
<br/>
<br/>
</body>

</html>
