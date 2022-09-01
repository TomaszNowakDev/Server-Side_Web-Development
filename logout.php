<?php
// unset the session
session_start();
session_unset();
header('Location: postsPage.php');
?>