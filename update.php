<?php
function updateRecord($purchaseno, $supplierid, $date, $quantity, $desc, $price)
{
  $con = mysqli_connect('localhost','asubramanian5','asubramanian5','asubramanian5');

if(!mysqli_select_db($con,'asubramanian5'))
{
  echo "Database not selected";
}

$sql = "INSERT INTO Purchases (PurchaseNo, SupplierID, Date, Quantity, Description, Price) VALUES ('$purchaseno', '$supplierid', '$date', '$quantity', '$desc', '$price')";

if(mysqli_query($con, $sql)){
  
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($con);
}
?>