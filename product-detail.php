<?php
include("header.php");
if(!empty($_GET['pid'])){
    $pid = $_GET['pid'];
    $json = file_get_contents("https://fakestoreapi.com/products/$pid");
}
$obj = json_decode($json);
?>
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Product Detail View</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">Product Detail</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                          <div class="simpleLens-big-image-container"><a data-lens-image="<?=$obj->image;?>" class="simpleLens-lens-image"><img src="<?=$obj->image;?>" class="simpleLens-big-image" width="250px;" height="300px;"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?=$obj->title;?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">₹<?=$obj->price;?></span>
                      <p class="aa-product-avilability">Availability: <span>In stock</span></p>
                    </div>
                    <p><?=$obj->description;?></p>
                    <div class="aa-prod-view-bottom">
                        <a class="aa-add-to-cart-btn" href="#" data-id="<?=$obj->id;?>">Add To Cart</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>            
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
                </div>          
              </div>
            </div>
          </div>
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
    $('.aa-add-to-cart-btn').click(function(event) {
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