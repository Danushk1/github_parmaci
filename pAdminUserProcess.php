<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];
}
?>

<?php
$sto = 0;


$drug1 = $_POST["d1"];
$qty1 = $_POST["q1"];
$ma1 = $_POST["m1"];
$amount1 = $_POST["a1"];



$total = $_POST["t"];

$sam = $qty1 * $ma1;





?>
<?php



$drug2 = $_POST["d2"];
$qty2 = $_POST["q2"];
$ma2 = $_POST["m2"];
$amount2 = $_POST["a2"];



$total = $_POST["t"];

$sam1 = $qty2 * $ma2;
$status = 1;





if ($sto >= 0) {
    $total = $sam + $sam1;


 


    Database::iud("INSERT INTO `balense` 
    (`drug`,`qty1`,`max`,`amount`,`total`,`add_order_id`,`status`) VALUES 
    ('" . $drug1 . "','" . $qty1 . "','" . $ma1 . "','" . $sam . "','" . $total . "','" . $pid . "','" . $status . "')");


    Database::iud("INSERT INTO `balense` 
(`drug`,`qty1`,`max`,`amount`,`total`,`add_order_id`,`status`) VALUES 
('" . $drug2 . "','" . $qty2 . "','" . $ma2 . "','" . $sam1 . "','" . $total . "','" . $pid . "','" . $status . "')");

$product_rs = Database::search("SELECT * FROM `add_order` WHERE `id`='".$pid."'");
$product_num = $product_rs->num_rows;
$product_data = $product_rs->fetch_assoc();

if($product_data["status"] == 1){
    Database::iud("UPDATE `add_order` SET `status`= '2' WHERE `id`='".$pid."'");
    
}


echo("deta save succsess");
    }

?>