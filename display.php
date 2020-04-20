<?php
include 'update.php';

if(isset($_POST['btnSubmit']) && $_POST['btnSubmit'] == "Submit"){
 $purchaseno=$_POST['pno'];
 $supplierid=$_POST['sid'];
 $date=$_POST['date'];
 $quantity=$_POST['quantity'];
 $desc=$_POST['desc'];
 $price=$_POST['price'];

 updateRecord($purchaseno,$supplierid,$date,$quantity,$desc,$price);
}


?>


<html>
<head>
<title>Welcome to Nike T-shirts</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>


<body>
<div class="main">

<header class="topcontainer">

<h1> Welcome to Nike T-Shirts</h1>

<div class="topnav">
  <a class="active" href="#home">Display</a>
  <a href="newpurchase.html">New Purchase</a>
  <a href="query.html">Supplier Query</a>
  <a href="delete.php">Delete Purchase</a>
  <a href="alter.php">Alter Quantity</a>
</div>

</header>

<h2>Purchase Details</h2>

<table class="center">
<tr>
<th>Purchase No</th>
<th>Supplier ID</th>
<th>Date</th>
<th>Quantity</th>
<th>Description</th>
<th>Unit Price</th>
</tr>

<?php

$con = mysqli_connect('localhost','asubramanian5','asubramanian5','asubramanian5');

if(!mysqli_select_db($con,'asubramanian5'))
{
  echo "Database not selected";
}

$sql = "SELECT * FROM Purchases";
$records=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($records))
{
  echo "<tr>";
  echo "<td>".$row['PurchaseNo']."</td>";
  echo "<td>".$row['SupplierID']."</td>";
  echo "<td>".$row['Date']."</td>";
  echo "<td>".$row['Quantity']."</td>";
  echo "<td>".$row['Description']."</td>";
  echo "<td>".$row['Price']."</td>";
  echo "</tr>";
}

mysqli_close($con);

?>

</table>
</div>
</body>
</html>