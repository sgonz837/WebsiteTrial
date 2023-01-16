<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    session_start();
    //Product Info post Items
    $prodID = $_POST['productID'];
    $prodName = $_POST['name'];
    $price = $_POST['price'];
    $tax = $_POST['taxable'];
    $quantity = $_POST['quantity'];

    //$_SESSION['']
    $Email = $_SESSION["CustomerID"];

    $db = new PDO("sqlite:onlinestore.db");

    $stmt = $db->prepare("SELECT * FROM Customers WHERE Email=?");
    //$stmt->execute($Email);
    $user = $stmt->fetch();
    if (!$Email) {
      // Not Logged in, Does not add anything to cart
      echo"<h2>You need to log in first</h2>";
    } else {

//comnpute tax
      $lineTotal = $quantity * $price;
      if($tax = "yes"){

        $totalValue = 0.06 * (float)$lineTotal;

      } else if ($tax = "no"){

        $totalValue = 0;
      }

//echo"<h2>$totalValue</h2>";
      $_SESSION['Name'][] = $prodName;
      $_SESSION['prodID'][] = $prodID;
      $_SESSION['qty'][] = $quantity;
      $_SESSION['tax'][] = $totalValue;
      $_SESSION['linetotal'][] = $lineTotal;

      //redirects to dumpVars
      header("Location:showCart.php");
    }



    require_once("footer.html");
?>
