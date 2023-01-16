<?php
    require_once("header.html");

    //ini_set ('display_errors', 1); // Let me learn from my mistakes!
    //error_reporting (E_ALL);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $db = new PDO("sqlite:onlinestore.db");

?>

<script>
    function checkReq(e){
      if(!confirm('Confirm Order?')){
        e.preventDefault();
      }
    }

    window.addEventListener("submit", checkReq);
</script>

<?php
    $prodName = $_SESSION['Name'];

    (float)$Total = 0.0;
    (float)$newTotal = 0.0;
    (float)$subTotal = 0.0;
    if(!$prodName){
      echo"<h2>Shopping Cart is Empty</h2>";
    }
    else{
      $customerID = $_SESSION['CustomerID'];
      $userName = $_SESSION['userName'];
      $quantity = $_SESSION['qty'];
      $tax = $_SESSION['tax'];
      $price = $_SESSION['linetotal'];
    //cho"$prodName";
    echo"<h2>$userName - Your Cart</h2>
      <table class = 'loginbox'>
      <tr colspan = '1'>
        <td colspan = '1'>
          <b><u>Name
        </td>
        <td>
          <b><u>Quantity
        </td>
        <td>
          <b><u>Tax
        </td>
        <td>
          <b><u>Line Total
        </td>
      </tr>
<tr>
<td>

";

foreach($prodName as $arrayName){
  echo"$arrayName <br>";

}

    echo"</td><td>";
    foreach($quantity as $arrayQty){
      echo"$arrayQty<br>";

    }


    echo"</td>
    <td>  ";
    foreach($tax as $arrayTax){
      echo"$arrayTax<br>";

    }
echo"</td>
<td>";
foreach($price as $arrayPrice){
  $subTotal += $arrayPrice;
  echo"$arrayPrice<br>";
//echo"$newTotal";
}
//echo"$subTotal";
//calculates the total
//$newTotal = $arrayPrice + $arrayTax;
$newTotal = $subTotal + $arrayTax;
//$_SESSION['grandTotal'] = $newTotal;
      echo"
      </td>
    </tr>
      </table>
";
?>
<br>
<?php
echo"

      <table class = 'loginbox'>
        <tr>
          <td>
            <b>Sub-Total:
          </td>
          <td>
            $ $subTotal
          </td>
        </tr>
        <tr>
          <td>
            <b>Tax:
          </td>
          <td>
            $ $arrayTax
          </td>
        </tr>
        <tr>
          <td>
            <b>Total:
          </td>
          <td>
            $ $newTotal
          </td>
        </tr>
      </table>
    ";

      ?>
<form method='post' action='checkout.php'>

<br><input type='submit' value='Checkout'><br><br>
<?php
/*
    //insert into OrderDetails
    $sql = "INSERT INTO Orders (CustomerID,ProductCost,Tax,OrderDate)
        VALUES('$customerID','$arrayQty','$newTotal','$newTotal')";
    $num = $db -> exec($sql);
    */
}
    require_once("footer.html");
 ?>
