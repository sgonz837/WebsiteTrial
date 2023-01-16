<?php
    require_once("header.html");

    //ini_set ('display_errors', 1); // Let me learn from my mistakes!
    //error_reporting (E_ALL);

    session_start();

    $db = new PDO("sqlite:onlinestore.db");

    (float)$arrayID = 0;
    $query = "select * from Orders";
    $result = $db -> query($query);

    $userName = $_SESSION['userName'];
    if(!$userName){
      echo"<h2>You must Login in First</h2>";
    }
    else{
    echo"<h2>$userName - Your Orders<br></h2>";
    echo"<table class = 'loginbox'>
      <tr>
        <td>
        <b><u>Order Number
        </td>
        <td>
        <b><u>OrderDate
        </td>
        <td>
        <b><u>Products
        </td>
        <td>
        <b><u>Tax
        </td>
        <td>
        <b><u>Total Amount
        </td>
      </tr>
      ";
?>

<?php
        while($row = $result->fetch()){
          $orderID = $row['OrderID'];
          $orderDate = $row['OrderDate'];
          $products = $row['ProductCost'];
          $tax = $row['Tax'];
          $total = $row['Total'];

          $newOrderDate = $orderDate;
          $newOrderID = $orderID;
          $newProdCost = $products;
          $newTax = $tax;
          $newTotal = $total;

          //$action = "checkOrderDetails.php?&orderID=$orderID";
          echo"
            <tr>
              <td>
            <a href = checkOrderDetails.php?&orderID=$orderID>
              $orderID<br></a>


              </td>
              <td>
              $newOrderDate<br>
              </td>
              <td>
              $newProdCost<br>
              </td>
              <td>
              $newTax<br>
              </td>
              <td>
              $newTotal<br>
              </td>
            </tr>

              ";
          //echo"$newOrderID<br>";
          //$orderDate = $row['OrderDate'];
          //echo"$orderDate<br>";
          //$orderDate = $row['OrderDate'];
          //echo"$orderDate";
        }
        //echo"$newOrderID<br>";
        echo"
        </table>

        ";
}
    require_once("footer.html");
?>
