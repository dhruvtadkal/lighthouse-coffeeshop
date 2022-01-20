<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: web_index.php"); // Redirecting To Home Page
}
?>