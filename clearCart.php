<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    session_start();

    unset($_SESSION["Name"]);
    unset($_SESSION["prodID"]);
    unset($_SESSION["qty"]);
    unset($_SESSION["tax"]);
    unset($_SESSION["linetotal"]);

    echo"<h2>Shopping cart is currently empty!</h2>";

    require_once("footer.html");
?>
