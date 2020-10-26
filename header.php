<?php 
    ob_start();
    include("conn.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Assignment Shopping Site</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
<!--    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> -->
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-inr"></i>INR
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-usd"></i>USD</a></li>
                      <li><a href="#"><i class="fa fa-inr"></i>INR</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+91-97-1234-5678</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                   <?php 
                           if(isset($_SESSION['username']) && !empty($_SESSION['username'])){ ?>
                      <li><a href="account.php">My Account</a></li>
                   <?php } ?>                  
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                  <li>
                      <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){ ?>
                      <a href="logout.php">Logout</a></li>
                      <?php }else{ ?>
                      <a href="login.php">Login/Register</a></li>
                           <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Assignment<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
               <?php 
                        $bname = trim(basename($_SERVER['PHP_SELF']));
                        if($bname != "order.php"){
                            if(count($_SESSION['cart'])>=0){
                        ?>
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify"><?=count($_SESSION['cart']);?></span>
                </a>
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
                 <?php }  ?>
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
                          
              </div>
                <?php }} ?>
              <!-- / cart box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="product.php?type=men">Men</a>
              </li>
              <li><a href="product.php?type=women">Women</a>
              </li>
              <li><a href="product.php?type=jewelery">Jewellery</a>
              </li>
              <li><a href="product.php?type=electronics">Electronics</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>