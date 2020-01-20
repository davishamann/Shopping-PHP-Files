<!doctype html>
<META HTTPEQUIV="CACHECONTROL" CONTENT="NOCACHE">
<meta httpequiv="expires" content="0" />
<html lang="en">
<head>
  <title> Shopping Example </title>
  <link rel="stylesheet" href="shopping.css">
</head>
<body>

  <div  id="prodlist"> 
  <form method="post" action="shopping.php">
  <table>
  <tr><th> Proudct </th> <th> Cost </th>  <th> </th> </tr>
<?
   // print out all the products and costs in the files. 
   $products= file("products.txt", FILE_IGNORE_NEW_LINES);
   $prices=file("costs.txt", FILE_IGNORE_NEW_LINES);
   foreach ($products as $i=>$product){
       //<img src=$---[i]>
       print"<tr>
            <td>$product</td>
            <td>$prices[$i]</td>
            <td> 
            <input type=\"text\" name=\"$i\" value=\"$_POST[$i]\" size=3>
            </td>
            </tr>";
   }
 ?>
  </table>
   <input type="submit" name="submit" value="Submit"> </input>
  </form>
  </div>
  
  <div id="results"> 

   <?
	// print out everything ordered so far
	// search the POST array for every value > 0
	if (isset($_POST['submit'])){
	foreach($_POST as $i=>$qty){
	    if($qty > 0){
	        $cost= $qty * $prices[$i];
	        $total+=$cost;
	        print "$products[$i]::$qty::$cost <br />";
	    }
	}
	print "Total for order: $".number_format($total,2);
	}
   ?>   

  </div>
  
</body>
</html>