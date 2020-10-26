<?php
include("header.php");
if(empty($_GET['type'])){
    $json = file_get_contents('https://fakestoreapi.com/products');
}elseif($_GET['type'] == "men"){
    $json = file_get_contents('https://fakestoreapi.com/products/category/men%20clothing');
}elseif($_GET['type'] == "women"){
    $json = file_get_contents('https://fakestoreapi.com/products/category/women%20clothing');
}elseif($_GET['type'] == "jewelery"){
    $json = file_get_contents('https://fakestoreapi.com/products/category/jewelery');
}elseif($_GET['type'] == "electronics"){
    $json = file_get_contents('https://fakestoreapi.com/products/category/electronics');
}

$obj = json_decode($json);
?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Products</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li class="active">Products</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="3">Price</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php foreach($obj as $oj) { ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="product-detail.php?pid=<?=$oj->id;?>"><img src="<?=$oj->image;?>" alt="product_image" width="250px" height="300px"></a>
                    <a class="aa-add-card-btn" href="#" data-id="<?=$oj->id;?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?=substr($oj->title,0,40);?></a></h4>
                      <span class="aa-product-price">₹<?=$oj->price;?></span><span class="aa-product-price"></span>
                      
                    </figcaption>
                  </figure>  
                </li>
                <?php } ?>                                       
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
                  <li><a href="product.php?type=men">Men</a></li>
                <li><a href="product.php?type=women">Women</a></li>
                <li><a href="product.php?type=jewelery">Jewellery</a></li>
                <li><a href="product.php?type=electronics">Electronics</a></li>
              </ul>
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <br/>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
<?php
include("footer.php");
?>
<script>
    $('.aa-add-card-btn').click(function(event) {
        event.preventDefault();
        var di = $(this).attr("data-id");
        $.ajax({
            url:"add-tocart.php",
            method:"POST",
            data:{pid:di},
            success:function(data)
             {        
              $(".aa-cartbox").html(data);   
              alert("Product has been added to cart");
             }
         });
    });

</script>