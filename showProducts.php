<?php
    require_once("header.html");

    ini_set ('display_errors', 1); // Let me learn from my mistakes!
    error_reporting (E_ALL);

    $type = $_GET['type'];
    $catID = $_GET['catID'];
    $db = new PDO("sqlite:onlinestore.db");

    $cquery = "select * from Categories where CategoryID == $catID";
    $cresult = $db->query($cquery);

    if (!$cresult) {
    echo "<h2>There are no categories of products in the database!</h2>";
    } // end if

 else{

   while($row = $cresult->fetch()) { // just get assoc array
    $catID= $row['CategoryID'];
    $catName= $row['CategoryName'];
   }

   echo "
   <h2>$catName,$type</h2>
    <table class = 'loginbox'>
      <tbody>
      <tr style ='font-size: x-large;'>
        <td style='padding-left: 0%'><b><em><u>Product</u></em></b></td>
            <td><b><em><u>Price</u></em></b></td>
      </tr>
   ";

//$catID= $row['CategoryID'];

    // $tquery = "SELECT distinct Type from Products WHERE CategoryID=$catID";
     $presult = $db->query("select * from Products where type=='$type'");
     //$prod = $
     while($prow = $presult->fetch(PDO::FETCH_ASSOC)) {
       //$catName = ["CategoryName"]
       $prodName = $prow["Name"];
       $prodID = $prow["ProductID"];
       $price = $prow["Price"];

       $action = "productInfo.php?&catID=$catID&type=$type&prodID={$prodID}";
       $Price = "$" . number_format($price,2);




     echo "
        <tr>
        <td>
            <a style='font-size: large' href=productInfo.php?&catID=$catID&type=$type&prodID={$prodID}>
            {$prodName}</a>
        </td>
        <td>$Price</td>
        </tr>
        ";
     //$prodName= "";
   //end while
 }//end while
   echo "
       </tbody>
     </table>
     <br>
   ";

}
$db= null;

require_once("footer.html")
?>
