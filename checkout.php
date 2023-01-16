<?php
    require_once("header.html");

    //ini_set ('display_errors', 1); // Let me learn from my mistakes!
    //error_reporting (E_ALL);

    session_start();

    // access using procedural functions
    date_default_timezone_set("America/New_York");
    $today = date('Y-m-d H:i:s');
    //echo "Today is: $today<br><br>";

    $db = new PDO("sqlite:onlinestore.db");

    //all session values passed from addToCart.php

    $prodName = $_SESSION['Name'];


    //create new entry in the Orders Table
if(!$prodName){
  echo"<h2>Nothing Inside Cart</h2>";
}
else{

            $customerID = $_SESSION['CustomerID'];
            $userName = $_SESSION['userName'];
            $quantity = $_SESSION['qty'];
            $tax = $_SESSION['tax'];
            $price = $_SESSION['linetotal'];
            $prodID = $_SESSION['prodID'];


            //all pre set variables
            (float)$arrayQuantity = 0.0;
            (float)$arrayProd = 0;
            (float)$newTotal = 0.0;
            (float)$subTotal = 0.0;
            (float)$preTax = 0.0;
            //$x = array();

            //work area to get values to pass to database
            foreach($price as $arrayPrice){
                $subTotal += $arrayPrice;
              }
            //product cost
            //echo"$subTotal<br>";
            //Tax
            foreach($tax as $arrayTax){

                $preTax += $arrayTax;
              }
        //echo"$preTax<br>";



            //echo"<h2>ArrayProd: $preID <br></h2>";
            foreach($quantity as $arrayQuantity){

            }

          //  echo"<h2>Results:$preQuantity<br><h2>";
      //Total variable
            $newTotal = $subTotal + $preTax;


            $sql = "INSERT INTO Orders (CustomerID,ProductCost,Tax,Total,OrderDate)
                VALUES('$customerID','$subTotal','$preTax','$newTotal','$today')";
            $num = $db -> exec($sql);

            $query = "select * from Orders";
            $result = $db -> query($query);


///////////////

while($row = $result -> fetch()){
    $orderID = $row['OrderID'];

  }

foreach($prodID as $key => $data)
{
 $sql = "INSERT INTO OrderDetails (OrderID,ProductID,Quantity,LineTotal)
        Values('$orderID','$data','$quantity[$key]','$price[$key]')";
        $exec = $db -> exec($sql);
        //echo"<h2>Data: $data, Quantity: $quantity</h2>";
}



////////
          echo"<h2>Order #$orderID Confirmed...<br>
          ...Thank You for shopping with us!!!</h2><br>
          ";
          //clear cart so same order doesnt repeat

          unset($_SESSION["Name"]);
          unset($_SESSION["prodID"]);
          unset($_SESSION["qty"]);
          unset($_SESSION["tax"]);
          unset($_SESSION["linetotal"]);


}

    require_once("footer.html");
 ?>
