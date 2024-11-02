<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
/*
This logout.php script handles the logout process:
1. Starts a PHP session
2. Destroys the session
3. Redirects to login.php
4. Exits to prevent further execution
*/
