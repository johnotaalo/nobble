        <!-- PAGE SECTION -->
        <section class="page-section no-padding-top">
            <div class="container">

                <div class="row product-single blocks">
                    <div class="col-md-4 col-sm-5 col-xsp-6">
                        <div class="block">
                            <div class="owl-carousel img-carousel">
                               <?php echo $product_details['image_slider']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-xsp-6">
                        <div class="block">
                            <h2 class="product-title"><?php echo $product_details['product_name']; ?></h2>
                            <div class="product-price">Ksh. <?php echo $product_details['price']; ?></div>
                            <div class="product-qty">
                                <form class="form-inline" method="post" enctype="multipart/form-data" action = "<?php echo base_url();?>products/my_cart">
                                    <div class="form-group"><label>Qty:</label><input class="form-control qty" value="1" type="text" name = "quantity"></div>
                                    <input type="hidden" name="add-to-cart" value = "<?php echo $product_details['product_id']; ?>">
                                    <button type="submit" class="btn btn-theme btn-theme-md">Add to cart</button>
                                </form>
                            </div>
                            <p><?php echo $product_details['description'];?></p>
                            <ul class="list">
                                <li><i class="fa fa-check-square-o"></i>In Stock</li>
                                <li><i class="fa fa-check-square-o"></i>Tested</li>
                                <li><i class="fa fa-check-square-o"></i>Guaranteed</li>
                            </ul>
                            <hr/>
                            <!-- <div class="product-category">Categories: <a href="#">Accessories</a>, <a href="#">Dresses</a>, <a href="#">Bags</a></div> -->
                        </div>
                    </div>
                </div>

                <hr/>

                <h2>Related Products</h2>
                <div class="row thumbnails products">
                    <?php echo $related_product; ?>
                </div>

            </div>
        </section>
        <!-- /PAGE SECTION -->

    <!-- /Content area