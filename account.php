<?php
include("header.php");
$obj = new Fyn();
$data = $obj->getOrderDetails($_SESSION['username']);
//echo "<pre>";print_r($data);
?>  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
      <img src="img/account.png" alt="fashion img" width="100%">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">My Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->


 
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
             <h3>Past Orders:</h3>
           <div class="cart-view-table">
               
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                          <th>Order ID</th>
                        <th>Product</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($data as $dt) {
                            $items = explode(",",$dt['items']);
                      ?>
                      <tr>
                        <td>Order ID: <?=$dt['order_id'];?></td>
                        <td>
                            <?php foreach($items as $item){                               
                                    $json = file_get_contents("https://fakestoreapi.com/products/$item");
                                    $oj = json_decode($json);
                                    echo $oj->title." x 1<br/>";                                
                                }?>
                        </td>
                      </tr>
                        <?php } ?> 
                      </tbody>
                  </table>
                </div>
             </form>
           </div>
         </div>
       </div></div></div></section>
 <!-- / Cart view section -->
 
  <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>My Account</h4>
                 <form action="" class="aa-login-form">
                  <label for="">Username or Email address</label>
                  <input type="text" placeholder="Username or email" value="<?=$_SESSION['username'];?>" readonly="">
                   
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
<?php
include("footer.php");
?>