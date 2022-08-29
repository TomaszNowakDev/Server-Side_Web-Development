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

    if (!((isset($_POST['username'])) && (isset($_POST['password']))))
    {
        // it is our first time around.
        // nothing has been entered yet.
        echo "<form action=\"logging.php\" method=\"POST\">";
        echo "Username: <br/><input name=\"username\" type=\"text\" required \"/><br/>";
        echo "Password: <br/><input name=\"password\" type=\"password\" required \"/><br/><hr/>";
        echo "<input type=\"reset\" value=\"Reset\"> ";
        echo "<input type=\"submit\" value=\"Log in\"/>";
    }
    else
    {
        // it does exist already. Some something has been sent to be processed
        $theUsername = $_POST['username'];
        $thePassword = $_POST['password'];
        $theUsername = htmlentities($theUsername, ENT_QUOTES, "Utf-8");
        $thePassword = htmlentities($thePassword, ENT_QUOTES, "Utf-8");

    }

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
