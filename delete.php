
<html lang="en">
<head>
<meta charset="UTF-8" />
<title> Delete a Purchase</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
if(isset($_POST['dbtnSubmit']) && $_POST['dbtnSubmit'] == "delete"){
$purchaseno=$_POST['dpno'];
$supplierid=$_POST['dsid'];
}


?>

<h2>Delete a Purchase</h2>

<div class="topnav">
  <a href="display.php">Display</a>
  <a href="newpurchase.html">New Purchase</a>
  <a href="query.html">Supplier Query</a>
  <a class="active" href="delete.php">Delete Purchase</a>
  <a href="alter.php">Alter Quantity</a>
</div>

<div class="pageContainer centerText">

<form method="post" class="formLayout" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<div class="formGroup">
     <label>Enter Purchase No to delete:</label>
     <input type="text" name="dpno" class="textbox" required placeholder="Purchase Number" maxlength="10" pattern="[P|p][0-9]+"  />
</div>

<div class="formGroup">
     <label>Enter Supplier ID:</label>
     <input type="text" name="dsid" class="textbox" required  
                      placeholder="Supplier ID" maxlength="4" pattern="[S|s][0-9][0-9][0-9]" />
</div>


<div class="formGroup">
        <label></label>
        <button type="submit" id="dbtnSubmit" name="dbtnSubmit" value="delete">Delete</button><br><br>
</div>


</form>

<?php

if(isset($_POST['dbtnSubmit']) && $_POST['dbtnSubmit'] == "delete"){
$con = mysqli_connect('localhost','asubramanian5','asubramanian5','asubramanian5');


if(!mysqli_select_db($con,'asubramanian5'))
{
  echo "Database not selected";
}

$sql = "DELETE FROM Purchases WHERE PurchaseNo = '$purchaseno' and SupplierID = '$supplierid' ";

$records=mysqli_query($con,$sql);

if(! $records ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "<h3>Deleted data successfully</h3>";
            

mysqli_close($con);
}
?>


</div>


</body>
</html>