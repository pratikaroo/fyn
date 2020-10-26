<?php
include("header.php");
$obj = new Fyn();
if(isset($_POST['register'])){
    $ru = $obj->registerUser($_POST['username'], $_POST['password']);
}elseif(isset($_POST['login'])){
    $li = $obj->validateUser($_POST['username'], $_POST['password']);
}
?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="" class="aa-login-form" method="POST">
                     <?php if(isset($li) && !empty($li)){ ?>
                     <div class="alert alert-danger" role="alert"><?=$li;?></div>
                     <?php } ?>
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" placeholder="Username or email" required="" name="username">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" required="" name="password">
                    <button type="submit" name="login" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Forgot your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" method="POST">
                     <?php if(isset($ru) && !empty($ru)){ ?>
                     <div class="alert alert-danger" role="alert"><?=$ru;?></div>
                     <?php } ?>
                    <label for="">Username or Email address<span>*</span></label>
                    <input type="text" placeholder="Username or email" required="" name="username">
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" required="" name="password">
                    <button type="submit" name="register" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
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