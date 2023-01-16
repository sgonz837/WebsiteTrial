<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);
?>
<script>

  function checkReq(e){
    if((document.getElementById("quantity").value == "")){
      alert("Quantity must be at least 1");
      document.getElementById("quantity").focus();
      e.preventDefault();
    }
    if((document.getElementById("quantity").value < 0)){
      alert("Quantity must be at least 1");
      document.getElementById("quantity").focus();
      e.preventDefault();
    }

  }

  window.addEventListener("submit", checkReq);
</script>
<?php
    $prodID = $_GET['prodID'];
    //$prodName = $_GET['prodName'];
    $db = new PDO("sqlite:onlinestore.db");

    $cquery = "SELECT CategoryID, CategoryName FROM Categories";
    $cresult = $db->query($cquery);
    if (!$cresult) {
      echo "<h2>There are no categories of products in the database!</h2>";
    } // end if

    else{


while($row = $cresult->fetch()) { // just get assoc array
 $catID= $row['CategoryID'];
 $catName= $row['CategoryName'];
}

$presult = $db->query("select * from Products where ProductID=='$prodID'");
while($prow = $presult->fetch()) {
  //$prodID = $prow["ProductID"];
  $prodName = $prow["Name"];
  $Image = $prow["Image"];
  $Tax = $prow["Taxable"];
  $Description = $prow["Description"];
  $Price = $prow["Price"];
//$url = "https://kuvapcsitrd01.kutztown.edu/~carelli/website/courses/csc242/images/";
  $action = "dumpVars.php?&prodID=$prodID&prodName=$prodName&price =$Price&tax=$Tax";
  $displayPrice = "$" . number_format($Price,2);
  $url = $row['images'];

  echo "
  <h2>$prodName</h2>
<table class ='loginbox'>
<tbody>
  <tr colspan = '2'>
    <td colspan = '2'>
";
?>
<img src="https://kuvapcsitrd01.kutztown.edu/~carelli/website/courses/csc242/images/<?php echo $Image; ?> "  width = "400" height = "400">

<?php

  echo "
    </td>
  </tr>

  ";
?>



<?php


echo"
    <tr style = 'border-style:solid;' colspan = '2'>
      <td style='padding-left: 1em' colspan = '2'>
        $Description
      </td>
    </tr>
    <tr style='font-size: x-large;' colspan = '1'>
      <td style='padding-left: 15%' colspan = '1'><b>Price</b></td>
      <td colspan = '1'><b><em>Quantity</em></b></td>
    </tr>
    <tr style='font-size: x-large;' colspan = '1'>
      <td style='padding-left: 15%' colspan = '1'><b><em>$displayPrice</em></b></td>
      <td style='padding-left: 5%' colspan = '1'>

      ";

    ?>

  <form method='post' action='addToCart.php'>
    <input type="hidden" id="productID" name="productID" value="<?php echo $prodID; ?>">
    <input type="hidden" id="name" name="name" value="<?php echo $prodName; ?>">
    <input type="hidden" id="price" name="price" value="<?php echo $Price; ?>">
    <input type="hidden" id="tax" name="taxable" value="<?php echo $Tax; ?>">
    <br><input type='number' id="quantity" name ='quantity' style='width: 7em'><br><br>

<?php
  echo"
      </td>
    </tr>
</table>

";


}
?>

 <br><input type='submit' value='Add to Cart'><br><br>
</form>

<?php
  echo"
      </tbody>

";

}
$db= null;
require_once("footer.html");

?>
