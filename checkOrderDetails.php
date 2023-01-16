<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    session_start();

    $orderNum = $_GET['orderID'];
    //$prodDesc = $_SESSION['Name'];
    $db = new PDO("sqlite:onlinestore.db");
    $query = "SELECT * FROM Orders WHERE OrderID = $orderNum";

    $result = $db -> query($query);

    $newQuery = "SELECT * FROM OrderDetails WHERE OrderID = $orderNum";
    $nresult = $db -> query($newQuery);


    echo"

    <h2>Order Number: $orderNum</h2>
    <table class = 'loginbox'>
";
    while($row= $result->fetch(PDO::FETCH_ASSOC)){
      $orderDate = $row['OrderDate'];
      $prodCost = $row['ProductCost'];
      $tax = $row['Tax'];
      $total = $row['Total'];
      echo"

      <tr>
        <td>
          <b>Order Date:
        </td>
        <td>
        $orderDate
        </td>
      </tr>
      <tr>
        <td>
          <b>Product Cost:
        </td>
        <td>
          $$prodCost
        </td>
      </tr>
      <tr>
        <td>
          <b>S/H
        </td>
        <td>
          $$tax
        </td>
      </tr>
      <tr>
        <td>
          <b>Total
        </td>
        <td>
          $$total
        </td>
      </tr>

";

    }
    echo"
</table>
<br><br>

";

echo"
<table class = 'loginbox'>
<tr>
  <td>
  <b><u>Product Description
  </td>
  <td>
    <b><u>ProductID
  </td>
  <td>
    <b><u>Quantity
  </td>
  <td>
    <b><u>Line Total
  </td>
</tr>
";
while($nrow = $nresult->fetch(PDO::FETCH_ASSOC)){
$prodID = $nrow['ProductID'];
$quantity = $nrow['Quantity'];
$lineTotal = $nrow['LineTotal'];
//echo"$prodID<br>";
$newProdID = $prodID;

$tquery = "SELECT * FROM Products WHERE ProductID = $prodID";
$tresult = $db ->query($tquery);
echo"
  <tr>
    <td>
    ";
    while($trow = $tresult->fetch()){
      $prodName = $trow['Name'];
      $newProdName = $prodName;
       echo"$newProdName<br>";
    }
    echo"
    </td>
    <td>
      $newProdID<br>
    </td>
    <td>
      $quantity<br>
    </td>
    <td>
      $$lineTotal<br>
    </td>
  </tr>
";
}
echo"
</table>
";
    require_once("footer.html");
?>
