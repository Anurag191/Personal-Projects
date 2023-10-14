<?php
session_start();
include('dbconnection.php');
if(!empty($_GET["action"])) {
$productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$_SESSION['prodid']=$productId;
$qty = isset($_POST['qty']) ? htmlspecialchars($_POST['qty']) : '';
switch($_GET["action"]) {
case "add":
if(!empty($qty)) {
$stmt = $con->prepare("SELECT * FROM product_details where id= ?");
$stmt->bind_param('i',$productId);
$stmt->execute();
$productDetails = $stmt->get_result()->fetch_object();
$itemArray = array($productDetails->id=>array('name'=>$productDetails->name, 'id'=>$productDetails->id, 'qty'=>$qty, 'price'=>$productDetails->price));
if(!empty($_SESSION["cart_item"])) {
if(in_array($productDetails->id,array_keys($_SESSION["cart_item"]))) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productDetails->id == $k) {
if(empty($_SESSION["cart_item"][$k]["qty"])) {
$_SESSION["cart_item"][$k]["qty"] = 0;
}
$_SESSION["cart_item"][$k]["qty"] += $qty;
}
}
} else {
$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
//var_dump($_SESSION["cart_item"]);
}
} else {
$_SESSION["cart_item"] = $itemArray;
//var_dump($_SESSION["cart_item"]);
}
}
include("cart.php");
break;
case "remove":
if(!empty($_SESSION["cart_item"])) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productId == $v['id'])
unset($_SESSION["cart_item"][$k]);
}
}
include("cart.php");
break;
case "empty":
unset($_SESSION["cart_item"]);
include("prods.php");
break;
}
}