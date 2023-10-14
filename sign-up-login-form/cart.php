<?php
//session_start();
if(!empty($_SESSION["cart_item"])){
$item_total = 0;
?>
<head>
	<meta charset="utf-8" />
	<title>Table Style</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #8FEB00;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#8FEB00;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:##00008B;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:10px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
  text-align: center;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

input[type=button] {
  width: 100%;
  background-color: #333436;
  color: #8FEB00;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button]:hover {
  background-color: #090A0B;
}
</style>

</head>
<div class="table-title">
	<center>
<h3 style="color:#1b1e24">Cart</h3>
</center>
<table class="table-fill">
<thead>
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>
<?php
foreach ($_SESSION["cart_item"] as $item){
?>
</thead>

<tr>
<td><strong><?php echo $item["name"]; ?></strong></td>
<td><?php echo $item["qty"]; ?></td>
<td><?php echo "$".$item["price"]; ?></td>
<td><a href="product-action.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><input type="button" value="Remove Item"></a></td>
</tr>
<?php
$item_total += ($item["price"]*$item["qty"]);
$item_nam[]  = $item["name"];
$item_qty[]  = $item["qty"];

$_SESSION['total']=$item_total;
$_SESSION['gpu']=$item_nam;
$_SESSION['qty']=$item_qty;
}
?>

<tr>
<td colspan="4" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
<center>
<a href="product-action.php?action=empty"><input type="button" value="Empty Cart"></a>

<a href="prods.php"><input type="button" value="Shop"></a>

<a href="paytry.php"><input type="button" value="Checkout"></a>
</center>
<?php
}