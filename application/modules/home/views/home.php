 <div class="content-area">

        <div id="main">
        <!-- SLIDER -->
        <section class="page-section no-padding">
            <div class="container full-width">

            <div id="main-slider" class="owl-carousel owl-theme">

                <!-- Slide 1 -->
                <div class="item page slide1">
                    <img class="slide-img" src="<?php echo base_url(); ?>assets/images/slider/1.jpg" alt="slide1"/>
                    <div class="caption">
                        <div class="container">
                            <div class="div-table">
                            <div class="div-cell">
                                <div class="caption-content">
                                        <h2 class="caption-title">We Have Varieties</h2>
                                        <h3 class="caption-subtitle">This is the only place to get a <strong>Variety</strong> of drugs</h3>
                                        <p class="caption-text">
                                            <a class="btn btn-theme" href="#category">Check Out Some</a>
                                        </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="item page slide2">
                    <img class="slide-img" src="<?php echo base_url(); ?>assets/images/slider/2.jpg" alt="slide2"/>
                    <div class="caption">
                    <div class="container">
                        <div class="div-table">
                        <div class="div-cell">
                            <div class="caption-content">
                                <h2 class="caption-title">Properly Tested</h2>
                                <h3 class="caption-subtitle">Our Medicine is  <strong>Properly</strong> Tested</h3>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="item page slide3">
                    <img class="slide-img" src="<?php echo base_url(); ?>assets/images/slider/3.jpg" alt="slide3"/>
                    <div class="caption">
                    <div class="container">
                        <div class="div-table">
                        <div class="div-cell">
                            <div class="caption-content">
                                <h2 class="caption-title">Competitive Prices</h2>
                                <h3 class="caption-subtitle">We offer deliveries with <strong>competitive</strong> Prices</h3>
                                <p class="caption-text">
                                    <a class="btn btn-theme" href="#category">Check them here</a>
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

            </div>
        </section>
        <!-- /SLIDER -->
        </div>

        <section class="page-section color sm-padding">
            <div class="container">
                <div class="text-banner">
                    <span class="relative">
                        <i class="diamond"></i>
                        <i class="diamond"></i>
                        Free shipping if orders are above KSH. 30, 000
                    </span>
                </div>
            </div>
        </section>

        <!-- PAGE FEATURES/ABOUT -->
        <section class="page-section" id="features">
            <div class="container">

                <!-- ABOUT -->
                    <div class="before"></div>
                    <div class="after"></div>
                    <i></i>
                </div>

                <h1 class="section-title">We Welcome You To NobbleDrug<small>the No1 Medicine Delivery Point</small></h1>

                <div class="row welcome-list">

                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-shopping-cart"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Single Click Easy Shop</h4>
                                With Properly arranged products, you can have fun while shopping your favorite products.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-phone"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">24-Hour Active Support</h4>
                                We are always available for you when you need us
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-thumbs-up"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Hight Quality Items</h4>
                                Our items are of the best quality and have been tested by the best.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-money"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Pay on Delivery</h4>
                                You only pay when you get the commodities
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-calendar"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Lower Price</h4>
                                We have the most competitive of prices.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <div class="pull-left">
                                <div class="media-object"><i class="fa fa-umbrella"></i></div>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Safe Shopping</h4>
                                Shopping is safe thanks to our secured systems
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- /PAGE FEATURES/ABOUT -->

        <!-- PAGE CATEGORY -->
        <section class="page-section light" id="category">
            <div class="container">

                <h1 class="section-title">Check out latest products <small>That Just Arrived in the Store</small></h1>

                <div class="clearfix text-center">
                    <ul id="filtrable" class="filtrable clearfix">
                        <li class="dress"><a href="#" data-filter=".latest">Latest Products</a></li>
                        <li class="accessories"><a href="#" data-filter=".common">Most Common</a></li>
                    </ul>
                </div>

                <div class="row thumbnails category latest-products isotope isotope-items">
                   <?php echo $products['latest']; ?>
                   <?php echo $products['common']; ?>
                </div>

            </div>
        </section>
        <!-- /PAGE CATEGORY -->

        <div class = "section-separator"></div>

        <section class="page-section latest-blog no-padding-bottom">
            <div class="container">
                <h1 class="section-title">Latest Blog</h1>
                <div class="row">
                	<?php echo $latest_blogs; ?>
                </div>

            </div>
        </section>
         <div class="section-separator"><i></i></div>
        <!-- PAGE MAP -->
        <section class="page-section no-padding">
            <div class="container full-width">

                <!-- Google map -->
                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:50vh;width:100%;"><div id="gmap_canvas" style="height:50vh;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.map-embed.com" id="get-map-data">www.map-embed.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(-1.2882626,36.81375920000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-1.2882626, 36.81375920000005)});infowindow = new google.maps.InfoWindow({content:"<b>Nobble Drug</b><br/>Kenyatta Avenue<br/> Nairobi" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                <!-- /Google map -->

            </div>
        </section>
        <!-- /PAGE MAP -->

    </div>