<?php
require('top.php');
$str=mysqli_real_escape_string($con, $_GET['str']);
if($str !=''){
    $get_services = get_services($con,'','','',$str);
}

?>
<div class="body__overlay"></div>
       
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Search</span>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active"><?php echo $str ?> </span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start service Grid -->
        <section class="htc__service__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
				<?php if(count ($get_services)>0){?>
					
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__service__rightidebar">
                            <!-- Start service View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <?php
										foreach($get_services as $list){

											 ?>
							<!-- Start Single Category -->
							<div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
								<div class="category">
									<div class="ht__cat__thumb">
										<a href="services.php?id=<?php echo $list['id'] ?>">
                                            <img src="<?php echo SERVICE_IMAGE_SITE_PATH.$list['img'] ?>" alt="Service images">
                                        </a>
                                    </div>
                                    <div class="fr__service__inner">
                                        <h4><a href="service-details.html"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo $list['unit_price'] ?></li>
                                            <li><?php echo $list['total_price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php } ?>
                                    </div>
                            </div>
                            <!-- End service View -->
                        </div>
                        
                    </div>
				<?php } else{
					echo "Data not found";
				}?>
                </div>
            </div>
        </section>
        <!-- End service Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="service-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="service-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->

<?php
require('footer.php');

?>