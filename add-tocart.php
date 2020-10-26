<?php
include('conn.php');
session_start();
$_SESSION['cart'][] = $_POST['pid'];
?>
<a class="aa-cart-link" href="#">
    <span class="fa fa-shopping-basket"></span>
    <span class="aa-cart-title">SHOPPING CART</span>
    <span class="aa-cart-notify"><?=count($_SESSION['cart']);?></span>
  </a>
   <?php if(count($_SESSION['cart'])>0){ ?> 
  <div class="aa-cartbox-summary">
    <ul>
        <?php foreach($_SESSION['cart'] as $item){                               
                  $json = file_get_contents("https://fakestoreapi.com/products/$item");
                  $oj = json_decode($json);
                  $tprice[] = $oj->price;
                //echo "<pre>";print_r($obj);
        ?>
      <li>
        <a class="aa-cartbox-img" href="product-detail.php?pid=<?=$oj->id;?>"><img src="<?=$oj->image;?>" alt="img"></a>
        <div class="aa-cartbox-info">
          <h4><a href="#"><?=substr($oj->title,0,20);?></a></h4>
          <p>₹<?=$oj->price;?></p>
        </div>
<!--                      <a class="aa-remove-product" href="#" data-id="<?=$oj->id;?>"><span class="fa fa-times"></span></a>-->
      </li>
      <?php } ?>
      <li>
        <span class="aa-cartbox-total-title">
          Total
        </span>
        <span class="aa-cartbox-total-price">
          ₹<?=array_sum($tprice);?>
        </span>
      </li>
    </ul>
    <a class="aa-cartbox-checkout aa-primary-btn" href="cart.php">Go To Cart</a>
  </div>
   <?php } ?>