
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> Alter Quantity</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
if(isset($_POST['abtnSubmit']) && $_POST['abtnSubmit'] == "alter"){
$purchaseno=$_POST['apno'];
$supplierid=$_POST['asid'];
$quantity=$_POST['aquantity'];

}


?>

<h2>Alter Quantity</h2>

<div class="topnav">
  <a href="display.php">Display</a>
  <a href="newpurchase.html">New Purchase</a>
  <a href="query.html">Supplier Query</a>
  <a href="delete.php">Delete Purchase</a>
  <a class="active" href="alter.php">Alter Quantity</a>
</div>

<div class="pageContainer centerText">

<form method="post" class="formLayout" action="<?php echo $_SERVER['PHP_SELF']; ?>" >


<div class="formGroup">
    <label>Purchase No:</label>
    <input type="text" name="apno" class="textbox" required placeholder="Purchase Number" maxlength="10" pattern="[P|p][0-9]+" autofocus />
</div>

<div class="formGroup">
     <label>Enter Supplier ID:</label>
     <input type="text" name="asid" class="textbox" required  
                      placeholder="Supplier ID" maxlength="4" pattern="[S|s][0-9][0-9][0-9]" />
</div>

<div class="formGroup">
       <label>Enter New Quantity:</label>
       <input type="number" name="aquantity" class="textbox" required 
                      placeholder="quantity" pattern="[0-9]+" />
</div>

<div class="formGroup">
        <label></label>
        <button type="submit" id="abtnSubmit" name="abtnSubmit" value="alter">Alter Quantity</button><br><br>
</div>


</form>

<?php

if(isset($_POST['abtnSubmit']) && $_POST['abtnSubmit'] == "alter"){
$con = mysqli_connect('localhost','asubramanian5','asubramanian5','asubramanian5');


if(!mysqli_select_db($con,'asubramanian5'))
{
  echo "Database not selected";
}

$sql = "UPDATE Purchases SET Quantity='$quantity' WHERE PurchaseNo = '$purchaseno' and SupplierID = '$supplierid' ";

$records=mysqli_query($con,$sql);

if(! $records ) {
               die('Could not update data: ' . mysql_error());
            }
            
            echo "<h3>Updated data successfully</h3>";
            

mysqli_close($con);
}
?>


</div>


</body>
</html>