

<html>
<head><title>Display Results</title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<?php
if(isset($_POST['qbtnSubmit']) && $_POST['qbtnSubmit'] == "Submit"){
$supplierid=$_POST['qsid'];

}
?>

<h2>Purchase Details for Supplier ID : <?php echo $supplierid ?> </h2>

<div class="topnav">
  <a href="display.php">Display</a>
  <a href="newpurchase.html">New Purchase</a>
  <a class="active" href="query.html">Supplier Query</a>
  <a href="delete.php">Delete Purchase</a>
  <a href="alter.php">Alter Quantity</a>
</div>

<table class="center">
<tr>
<th>Date</th>
<th>Description</th>
<th>Unit Price</th>
</tr>

<?php

$con = mysqli_connect('localhost','asubramanian5','asubramanian5','asubramanian5');


if(!mysqli_select_db($con,'asubramanian5'))
{
  echo "Database not selected";
}

$sql = "SELECT Date,Description,Price FROM Purchases WHERE SupplierID = '$supplierid' ";
$records=mysqli_query($con,$sql);

if(mysqli_num_rows($records) > 0)
{
while($row=mysqli_fetch_array($records))
{
  echo "<tr>";
  echo "<td>".$row['Date']."</td>";
  echo "<td>".$row['Description']."</td>";
  echo "<td>".$row['Price']."</td>";
  echo "</tr>";
}
}
else
{
 echo "<h3>No Matching records are found.</h3>"; 
}


mysqli_close($con);

?>
</table>

</body>
</html>