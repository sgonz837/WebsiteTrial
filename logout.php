<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    session_start();
    unset($_SESSION["CustomerID"]);
    unset($_SESSION["userName"]);

    session_destroy();

    echo"<h2>You have Successfully logged out</h2>";

    require_once("footer.html");
?>
