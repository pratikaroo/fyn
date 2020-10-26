<?php
include("header.php");
if(isset($_GET['rm'])){
    if (($key = array_search($_GET['rm'], $_SESSION['cart'])) !== false) 
        unset($_SESSION['cart'][$key]);
}
?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $tprice = array(); 
                        foreach($_SESSION['cart'] as $item){                               
                                $json = file_get_contents("https://fakestoreapi.com/products/$item");
                                $oj = json_decode($json);
                                $tprice[] = $oj->price;
                              //echo "<pre>";print_r($obj);
                      ?>
                      <tr>
                        <td><a class="remove" href="cart.php?rm=<?=$oj->id;?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="<?=$oj->image;?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?=$oj->title;?></a></td>
                        <td>₹<?=$oj->price;?></td>
                      </tr>
                      <?php } ?>                      
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                        </td>
                      </tr>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>₹<?=array_sum($tprice);?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>₹<?=array_sum($tprice);?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


<?php
include("footer.php");
?>