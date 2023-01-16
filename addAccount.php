<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    $db = new PDO("sqlite:onlinestore.db");

    $cquery = "select * from Customers ";
    $cresult = $db -> query($cquery);

    if (!$cresult){
      echo "<h2>There are no categories of products in the database!</h2>";
    }
    else{
      if(isset($_POST['user'])) {
        $cUser = $_POST['user'];
      }

      if(isset($_POST['email'])) {
        $cEmail = $_POST['email'];
      }

      if(isset($_POST['pass'])) {
        $pass = $_POST['pass'];
      }
      if(isset($_POST['phone'])) {
        $phone = $_POST['phone'];
      }
      $stmt = $db->prepare("SELECT * FROM Customers WHERE Email=?");
      $stmt->execute([$cEmail]);
      $user = $stmt->fetch();
      if ($user) {
      // email found
      echo"<h2>An Account already exists for that e-mail address!</h2>";
      } else {
        // or not
        echo"<h2>Account Created for $cUser !</h2>";
        $sql = "INSERT INTO Customers (UserName, Email, Passwd, PhoneNumber)
                  VALUES ('$cUser','$cEmail','$pass','$phone')";
        $num= $db->exec($sql);
    }
}
    require_once("footer.html");
 ?>
