<?php
require('top.php');
$services_id=mysqli_real_escape_string($con, $_GET['id']);
$get_services = get_services($con,'','',$services_id);
?>
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
                                  <a class="breadcrumb-item" href="categories.php?id=<?php echo $get_services['0']['categories_id'] ?>">
                                    <?php echo $get_services['0']['categories'] ?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $get_services['0']['name'] ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start service Details Area -->
        <section class="htc__service__details bg__white ptb--100">
            <!-- Start service Details Top -->
            <div class="htc__service__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__service__details__tab__content">
                                <!-- Start service Big Images -->
                                <div class="service__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo SERVICE_IMAGE_SITE_PATH.$get_services['0']['img'] ?>" alt="full-image">
                                        </div>
                                    </div>
                                </div>
                                <!-- End service Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__service__dtl">
                                <h2><?php echo $get_services['0']['name'] ?></h2>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Tk. <?php echo $get_services['0']['unit_price'] ?></li>
                                    <!-- <li><?php echo $get_services['0']['total_price'] ?></li> -->
                                </ul>
                                <p class="pro__info"><?php echo $get_services['0']['short_desc'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> Available</p>
                                    </div>
                                    <div class="sin__desc">
                                        <p><span>Qty:</span>
                                        <select id="qty">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>

                                        </p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_services['0']['categories'] ?></a></li>
                                        </ul>
                                    </div>
                                    
                                    </div>
                                <a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_services['0']['id']?>','add')">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End service Details Top -->
        </section>
        <!-- End service Details Area -->
		<!-- Start service Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $get_services['0']['descpt'] ?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End service Description -->

<?php
require('footer.php');

?>