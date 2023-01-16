<?php
  require_once("header.html");
  //Connect to the database
  $db= new PDO("sqlite:onlinestore.db");

  // Select all categories in database
  $query = "SELECT CategoryID, CategoryName FROM Categories";
  $result = $db->query($query);

  if (!$result) {
     echo "<h2>There are no categories of products in the database!</h2>";
  } // end if

  else {
    // following is embedded html to create product category links
    echo "
      <h2>Browse by Product Category</h2>
      <table class = 'loginbox'>
        <tbody>
           <tr style='font-size: x-large;'>
             <td><b><em><u>Department</u></em></b></td>
             <td><b><em><u>Type</u></em></b></td>
           </tr>
    "; // end of echo

    while($row = $result->fetch()) {
      $catID= $row['CategoryID'];
      $catName= $row['CategoryName'];

      $tquery = "SELECT distinct Type from Products WHERE CategoryID=$catID";
      $tresult = $db->query($tquery);
      $cname= $catName;
      while($type = $tresult->fetch(PDO::FETCH_NUM)) {
        $action="showProducts.php?&catID=$catID&type={$type[0]}";
        echo "
           <tr>
           <td style='font-size: large;'>$cname</td>
           <td>
              <a style='font-size: large' href=showProducts.php?&catID=$catID&type={$type[0]}>
              {$type[0]}</a>
           </td>
           </tr>
         "; // end of echo
         $cname= "";
       } // end while
    } // end while

    echo "
        </tbody>
      </table>
      <br>
    "; // end of echo
  }  // end else

  $db= null;

  require_once("footer.html");
?>
