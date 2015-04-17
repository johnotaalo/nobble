<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->

<!-- Mirrored from eazzy.me/html/luxy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Apr 2015 15:04:50 GMT -->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NobbleDrug</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <!-- CSS Global -->
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/owlcarousel2/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/owlcarousel2/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/plugins/countdown/jquery.countdown.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bower_components/ionicons/css/ionicons.min.css">
    <link href="<?php echo base_url(); ?>assets/frontend/css/theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/frontend/css/theme-blue-1.css" rel="stylesheet" id="theme-config-link">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/frontend/plugins/iesupport/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend/plugins/iesupport/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "713c6039-9de6-4117-8e30-0456b4328648", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body id="home" class="wide">

<!-- Preloader -->
<div id="preloader">
    <div id="preloader-status">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="preloader-title">Loading</div>
    </div>
</div>

<!-- Wrap all content -->
<div class="wrapper">

    <!-- Checkout popup -->
    <div class="modal fade popup-checkout" id="popup-checkout" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Checkout</h4>
        </div>

        <div class="modal-body">
        <section>

            <h3 class="block-title">Returning customer?</h3>
            <p><a class="link" href="#">Click here to login</a></p>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
            <form action="#" method="post" class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input id="login-email" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="login-password">Email</label>
                        <input id="login-password" type="password" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-theme" href="#">Login</a>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="link" href="#">Lost password</a>
                </div>
            </form>

        </section>
        <section>

            <h3 class="block-title">Have a coupon?</h3>
            <p><a class="link" href="#">click below to enter your code</a></p>
            <form action="#" method="post" class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <input id="have-coupon" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-12">
                    <a class="btn btn-theme" href="#">Apply Coupon</a>
                </div>
            </form>

        </section>
        <section>

            <form action="#" method="post">
            <section class="address">

                <h3 class="block-title">Address</h3>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Country</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group selectpicker-wrapper">
                            <select
                                    class="selectpicker input-price" data-live-search="true" data-width="100%"
                                    data-toggle="tooltip" title="Select">
                                <option>Select</option>
                                <option>Country</option>
                                <option>Country</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>First name</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Last name</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Company name</label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Address</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!---->
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Town/City</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>County</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Postcode</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>E-mail address</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group"><label>Phone</label></div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"><input type="text" class="form-control"/></div>
                    </div>
                </div>

            </section>
            <section>

                <div class="form-group">
                    <label><input type="checkbox"> Create an account</label>
                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" class="form-control"/>
                </div>

            </section>
            <section>

                <h3 class="block-title">Order notes</h3>
                <div class="form-group">
                    <textarea cols="30" rows="10" class="form-control"></textarea>
                </div>

            </section>
            <section>

                <h3 class="block-title">Your order</h3>
                <table class="table order">
                    <thead>
                    <tr>
                        <th>Products</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Luxury suit no 1 lorem ipsum</td>
                        <td>$889.00</td>
                    </tr>
                    <tr class="subtotal">
                        <td>Cart subtotal</td>
                        <td><strong>$889.00</strong></td>
                    </tr>
                    <tr class="shipping">
                        <td>Shipping</td>
                        <td><strong>Free shipping</strong></td>
                    </tr>
                    <tr class="total">
                        <td>Order total</td>
                        <td class="price"><strong>$889.00</strong></td>
                    </tr>

                    </tbody>
                </table>

            </section>
            <section>

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Direct bank transfer
                        </label>
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Cheque payment
                        </label>
                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                            PayPal
                        </label>
                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                    </div>
                </div>

            </section>
            </form>

        </section>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-theme" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-theme btn-theme-red">Place order</button>
        </div>

    </div>
    </div>
    </div>
    <!-- /Checkout popup -->

    <!-- Popup Cart items -->
    <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="container">
                <div class="cart-items">
                    <div class="cart-items-inner">
                        <?php
                        	$image_src = '';
                        	foreach ($this->cart->contents() as $value) {
                        		$image_src = $this->cart->product_options($value['rowid'])['image'];
                        		echo '<div class="media">
                            <a class="pull-left" href="#"><img class="media-object item-image" src="'.$image_src.'" alt=""></a>
                            <p class="pull-right item-price">Ksh. '.$value['qty'] * $value['price'].'</p>
                            <div class="media-body">
                                <h4 class="media-heading item-title"><a href="#">'.$value['qty'].'x '.$value['name'].'</a></h4>
                            </div>
                        </div>';
                        	}
                        ?>
                        <div class="media">
                            <p class="pull-right item-price">KSH. <?php echo $this->cart->total();?></p>
                            <div class="media-body">
                                <h4 class="media-heading item-title summary">Total</h4>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <div>
                                    <a href="#" class="btn btn-theme btn-theme-transparent" data-dismiss="modal">Close</a>
                                    <a href="<?php echo base_url(); ?>customercart/completeorder" class="btn btn-theme btn-call-checkout">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Popup Cart items -->

    <!-- HEADER -->
    <header class="header header-sticky">
        <div class="container">
            <div class="header-wrapper clearfix">

            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo base_url(); ?>" class="scroll-to">
                    <span class="logo-text">NobbleDrug</span>
                    <small>The Drug Shop</small>
                </a>
            </div>
            <!-- /Logo -->

            <!-- Mobile menu toggle button-->
            <a href="#" class="menu-toggle btn"><i class="fa fa-bars"></i></a>
            <!-- /Mobile menu toggle button-->

            <!-- Cart -->
            <div id="cart-wrapper" class="cart-wrapper pull-right">
                <div class="cart-total"  data-toggle="modal" data-target="#popup-cart">
                    <span class="total"><span class="currency">Ksh.</span><span class="value"><?php echo $this->cart->total();?></span></span>
                    <i class="fa fa-shopping-cart"></i>
                    <span class="items">(<?php echo $this->cart->total_items();?>)</span>
                </div>
            </div>
            <!-- /Cart -->
            <style type="text/css">
            .thumbnails.category .thumbnail > .caption
            {
            	bottom: 20%;
            }
            </style>
            <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                <ul class="sf-menu nav">
                    <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
                    <li class="megamenu">
                        <a href="#category">Products</a>
                        <ul>
                            <li class="row">
                                <!---->
                                <div class="col-md-2">
                                    <h4 class="block-title">Categories</h4>
                                    <ul>
                                    	<?php echo $product_listing; ?>
                                    </ul>
                                </div>
                                <!---->
                                <!---->
                                <div class="col-md-2">
                                    <h4 class="block-title">Most Viewed</h4>
                                    <ul>
                                        <?php echo $most_ordered; ?>
                                    </ul>
                                </div>
                                <!---->
                                <!---->
                                <div class="col-md-2">
                                   <h4 class="block-title">Most Viewed</h4>
                                    <ul>
                                        <?php echo $latest_products; ?>
                                    </ul>
                                </div>
                                <!---->
                                <!---->
                                <div class="col-md-3">
                                	<h4 class = "block-title">Most Ordered</h4>
                                    <div class="thumbnails category">
                                        <div class="thumbnail no-border no-padding">
                                            <?php echo $recommended; ?>
                                        </div>
                                    </div>
                                </div>
                                <!---->
                                <!---->
                                <div class="col-md-3">
                                	<h4 class = "block-title">Cheapest</h4>
                                    <div class="thumbnails category">
                                        <div class="thumbnail no-border no-padding">
                                           <?php echo $cheapest; ?>
                                        </div>
                                    </div>
                                </div>
                                <!---->

                            </li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>blog/page">Blog</a></li>
                    <li><a href="<?php echo base_url();?>contact">Contact</a>
                        <!--ul>
                            <li><a href="#">Submenu</a></li>
                            <li><a href="#">Submenu</a></li>
                        </ul-->
                    </li>
                </ul>
            </nav>
            <!-- /Navigation -->

            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- Content area -->
    <div class = "content-area">
    	<?php $this->load->view($content_view); ?>
    </div>
    <!-- /Content area -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                	<div class="col-md-9 pull-left">
	                	<div class="widget widget-subscription">
	                        <div class="clearfix">
                				<span class="copyright">&copy; NobbleDrug <?php echo date("Y");?> All Rights Reserved</span>
                			</div>
                		</div>
                	</div>
                    <div class="col-md-3 pull-right">
                        <div class="widget widget-subscription">
                            <div class="clearfix">
                                <ul class="social-line list-inline">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- /FOOTER -->

    <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

</div>

<!-- Popup product quick view -->
                <div class="modal fade popup-product-view" id="popup-product-view" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="container">
                        <div class="modal-content">

                            <div class="extended_product_page" id="extended_product_page">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h2 class="modal-title" id = "product_name"></h2>
                                </div>
                                <div class="modal-body">
                                    <div class="row product-single blocks">
                                        <div class="col-lg-5 col-md-4 col-sm-5 col-xsp-6">
                                            <div class="block">
                                                <div class="owl-carousel product-img-carousel" id = "product_images">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-8 col-sm-7 col-xsp-6">
                                            <div class="block">
                                                <div class="product-price" id = "product_price"></div>
                                                <div class="product-qty">
                                                    <form class="form-inline" method="post" enctype="multipart/form-data" action = "<?php echo base_url();?>products/my_cart">
                                                        <div class="form-group"><label>Qty:</label><input class="form-control qty" value="1" type="text" name = "quantity"></div>
                                                        <input type="hidden" name="add-to-cart">
                                                        <button type="submit" class="btn btn-theme btn-theme-md">Add to cart</button>
                                                    </form>
                                                </div>
                                                <p id = "product_description"></p>
                                                <ul class="list">
                                                    <li><i class="fa fa-check-square-o"></i>In Stock</li>
                                                    <li><i class="fa fa-check-square-o"></i>Tested</li>
                                                    <li><i class="fa fa-check-square-o"></i>Guaranteed</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-theme" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
                <!-- Popup product quick view -->
<!-- /Wrap all content -->

<!-- JS Global -->

<!--[if lt IE 9]><script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery/jquery-1.11.1.min.js"></script><![endif]-->
<!--[if gte IE 9]><!--><!--<![endif]-->
<script src="<?php echo base_url(); ?>assets/frontend/plugins/modernizr.custom.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/superfish/js/superfish.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/prettyphoto/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery.smoothscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/smooth-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery.sticky.min.js"></script>

<!-- JS Page Level -->
<script src="<?php echo base_url(); ?>assets/frontend/plugins/owlcarousel2/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/countdown/jquery.plugin.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/plugins/countdown/jquery.countdown.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script> -->

<script src="<?php echo base_url(); ?>assets/frontend/js/theme-ajax-mail.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/theme.js"></script>
<script type="text/javascript">
    base_url = '<?php echo base_url(); ?>';
	$('.product_popup').click(function(){
		
		product_id = $(this).attr('data-id');
		$.ajax({
		url: base_url + 'products/get_product_details_/' + product_id + '/ajax',
			beforeSend: function( xhr ) {
				$('#product_name').html('<i class = "fa fa-spinner fa-spin"></i> Please Wait...');
				$('#product_images').html('');
				$('#product_price').html('');
				$('#product_description').html('');
				$('input[name="add-to-cart"]').val('');
			}
		})
		.done(function( data ) {
			obj = jQuery.parseJSON(data);
			$('#product_name').html(obj.product_name);
			$('#product_images').html(obj.main_image);
			$('#product_price').html('Ksh. ' + obj.price);
			$('#product_description').html(obj.description);
			$('input[name="add-to-cart"]').val(obj.product_id);
		});
	});
    $('#clear-btn').click(function(){
        var alert_box = confirm("Are you sure you want to clear your cart?!");
        if (alert_box === true) {
            window.location = base_url + 'customercart/removeitem';
        }
    });
</script>
<!--<![endif]-->

</body>

<!-- Mirrored from eazzy.me/html/luxy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Apr 2015 15:07:14 GMT -->
</html>
