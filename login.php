
<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id= session_id();

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $db = new PDO("sqlite:onlinestore.db");

    $grab =  $db->prepare("SELECT * FROM Customers WHERE Email=?");
    $grab->execute([$email]);
//$Users = $grab -> fetch();

    while($Grow = $grab->fetch(PDO::FETCH_ASSOC)) {
      $userID = $Grow['CustomerID'];
      $userName = $Grow['UserName'];
      $_SESSION['CustomerID'] = $userID;
      $_SESSION['userName'] = $userName;
}
    $stmt = $db->prepare("SELECT * FROM Customers WHERE Email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
      // email found
      echo"<h2>Welcome
        {$_SESSION['userName']}
        to our Grocery Store</h2>";
    } else {
      ?>
      <html>
      <script>

      function handleEvent (){
        window.alert("Missing Required Information");
      }
      </script>
</html>

      <?php
      // or not
      echo"<h2>Incorrect account information</h2>";
    }


    require_once("footer.html"); ?>
