<?php
include("header.php");
$obj = new Fyn();
if(isset($_POST['submit'])){
    $obj->addUserDetails($_POST['email'],$_POST['fname'],$_POST['lname'],$_POST['phone'],$_POST['address'],$_POST['country'],$_POST['apt'],$_POST['city'],$_POST['district'],$_POST['pincode'],$_POST['note']);
    $oid = $obj->getLastOrderID();
    //print_r($id);
    $id = $oid['oid']+1;
    foreach($_SESSION['cart'] as $item){                               
            $json = file_get_contents("https://fakestoreapi.com/products/$item");
            $oj = json_decode($json);
            $itemid = $oj->id;
            $email= $_POST['email'];
            $res = $obj->addOrder($id, $email, $itemid);
    }
    if($res){
        unset($_SESSION['cart']);
        echo "<br/><br/><center style='margin-top: 20px;'><h3>Your Order has been successfully placed.</h3><center>";
        echo '<center><a href="product.php"><input type="submit" value="Countine Shopping" name="submit" class="aa-browse-btn"> </a></center>';
    }
}