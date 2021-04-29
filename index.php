<?php
require('top.php');

?>
<div class="body__overlay"></div>
<!--    <section class="ftr__service__area ptb--100">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="menumenu__container clearfix"></div>-->
<!--                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">-->
<!--                        <div class="topnav">-->
<!--                            <div class="dropdown">-->
<!--                                <button class="dropbtn"><strong>Select your Area</strong> </button>-->
<!--                                    <div class="dropdown-content">-->
<!--                                        <a href="#">Adabor</a>-->
<!--                                        <a href="#">Banani</a>-->
<!--                                        <a href="#">Badda</a>-->
<!--                                        <a href="#">Dhanmondi</a>-->
<!--                                        <a href="#">Farmgate</a>-->
<!--                                        <a href="#">Gulshan</a>-->
<!--                                        <a href="#">Motijhil</a>-->
<!--                                        <a href="#">Uttora</a>-->
<!--                                        <a href="#">Gulshan</a>-->
<!--                                    </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">-->
<!--                   <div class="search">-->
<!--                    <form class="form-inline mr-auto">-->
<!--                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">-->
<!--                        <button class="btn btn-unique btn-rounded btn-sm my-0" type="submit">Search</button>-->
<!--                    </form>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
        <!-- Start Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals Services</h2>
                            <p>Explore new arrival services. Get on demand home services by one click </p>
                        </div>
                    </div>
                </div>
                <div class="htc__service__container">
                    <div class="row">
                        <div class="service__list clearfix mt--30">
                             <?php
                             $get_services = get_services($con,4);
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
                                        <h4><a href="services.php"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <!-- <li class="old__prize"><?php echo $list['unit_price'] ?></li>
                                            <li><?php echo $list['total_price'] ?></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->
        <!-- Start service Area -->
        <section class="ftr__service__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller Services</h2>
                            <p>People often takes these services. Get on demand home services by one click instantly. Save your valuable time </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="service__list clearfix mt--30">
                        <?php
                        $get_services = get_services($con,8);
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
                                        <h4><a href="services.php"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <!-- <li class="old__prize"><?php echo $list['unit_price'] ?></li>
                                            <li><?php echo $list['total_price'] ?></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End service Area -->
<?php

require('footer.php');

?>