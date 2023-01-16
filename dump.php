<!DOCTYPE html>
<?php
  // check if session is started, start if not
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
?>

<html>
<head>
   <meta charset="utf-8">
   <title>Online Store</title>
   <title>Dump data using PHP</title>
</head>

<body>

    Post array:
    <pre>
    <?php
       print_r($_POST);
    ?>
    </pre>

</body>
</html>
