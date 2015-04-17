<section class="page-section with-sidebar no-padding-top">
            <div class="container">
                <div class="row">

                    <!-- content -->
                    <section class="content col-sm-8 col-md-9">
                        <div class="row thumbnails products">
                            <?php echo $products_list; ?>
                        </div>

                        <!-- Pagination -->
                        <!-- <div class="pagination-wrapper">
                            <ul class="pagination">
                                <li class="disabled"><a href="#">«</a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div> -->
                        <!-- /Pagination -->

                    </section>
                    <!-- /content -->

                    <!-- sidebar -->
                    <aside class="sidebar col-sm-4 col-md-3">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">Product Categories</h4>
                            <ul>
                               <?php echo $sidebar['sidebar_categories']; ?>
                            </ul>
                        </div>

                        <div class="widget widget-best-sellers">
                            <h4 class="widget-title">Best Sellers</h4>
                            <?php echo $sidebar['sidebar_most']; ?>
                        </div>
                    </aside>
                    <!-- /sidebar -->

                </div>
            </div>
        </section>