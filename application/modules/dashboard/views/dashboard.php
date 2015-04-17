<style type="text/css">
  .content
  {
    padding: 0;
  }
</style>
<div class = "row" style = "margin-right: 5px;">
  <div class="col-md-8" style = "margin-left: 0;">
    <p class="text-center">
      <strong><span id = "range"></span></strong>
    </p>
    <div class = "pull-right">
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm filter" data-range = "1_months">1 Month</button>
        <button type="button" class="btn btn-default btn-sm filter" data-range = "3_months">3 Months</button>
        <button type="button" class="btn btn-default btn-sm filter" data-range = "6_months">6 Months</button>
        <button type="button" class="btn btn-default btn-sm filter" data-range = "1_year" id = "1yr">1 Year</button>
      </div>
    </div>
    <div class="chart-responsive">
      <div id="container" style="width: 100%; height: 300px; margin: 0 auto"></div>
    </div><!-- /.chart-responsive -->

    
  </div>
  <div class="col-md-4">
    <p class="text-center">
      <strong>Order Summary</strong>
    </p>
    <div class="progress-group">
      <span class="progress-text">Completed Orders</span>
      <span class="progress-number"><b><?php echo $order_counts->completed ?></b>/<?php echo $order_counts->total_orders; ?></span>
      <div class="progress sm">
        <div class="progress-bar progress-bar-aqua" style="width: <?php echo $order_counts->completed/$order_counts->total_orders*100; ?>%"></div>
      </div>
    </div><!-- /.progress-group -->
    <div class="progress-group">
      <span class="progress-text">In Transit Orders</span>
      <span class="progress-number"><b><?php echo $order_counts->in_transit ?></b>/<?php echo $order_counts->total_orders; ?></span>
      <div class="progress sm">
        <div class="progress-bar progress-bar-red" style="width: <?php echo $order_counts->in_transit/$order_counts->total_orders*100; ?>%"></div>
      </div>
    </div><!-- /.progress-group -->
    <div class="progress-group">
      <span class="progress-text">Pending Orders</span>
      <span class="progress-number"><b><?php echo $order_counts->pending ?></b>/<?php echo $order_counts->total_orders ?></span>
      <div class="progress sm">
        <div class="progress-bar progress-bar-green" style="width: <?php echo $order_counts->pending/$order_counts->total_orders*100; ?>%"></div>
      </div>
    </div><!-- /.progress-group -->
    <div class="progress-group">
      <span class="progress-text">Deleted Orders</span>
      <span class="progress-number"><b><?php echo $order_counts->deleted ?></b>/<?php echo $order_counts->total_orders ?></span>
      <div class="progress sm">
        <div class="progress-bar progress-bar-yellow" style="width: <?php echo $order_counts->deleted/$order_counts->total_orders*100; ?>%"></div>
      </div>
    </div><!-- /.progress-group -->
    <div class="row">
      <h4><center>Today compared to Yesterday</center></h4>
      <div class = "box-footer">
        <div class="col-sm-6 col-xs-6">
          <div class="description-block border-right">
            <?php echo $today_data; ?>
            <span class="description-text">TOTAL ORDERS</span>
          </div><!-- /.description-block -->
        </div><!-- /.col -->
        <div class="col-sm-6 col-xs-6">
          <div class="description-block border-right">
            <?php echo $today_returns; ?>
            <span class="description-text">EXPECTED RETURNS</span>
          </div><!-- /.description-block -->
        </div><!-- /.col -->
        </div>
      </div>
  </div>
</div>
<div class = "row" style="margin-left: 2px;">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-green">
      <span class="info-box-icon"><i class="fa fa-newspaper-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Blog Posts</span>
        <span class="info-box-number"><?php echo $blog_stats['blog_numbers']; ?></span>
        <div class="progress">
          <div class="progress-bar" style="width: <?php echo $blog_stats['blog_percentage_increase_number']; ?>%"></div>
        </div>
        <span class="progress-description">
          <?php echo round($blog_stats['blog_percentage_increase_description'], 1); ?>% in 30 Days
        </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-aqua">
      <span class="info-box-icon"><i class="fa fa-table"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Categories</span>
        <span class="info-box-number"><?php echo $cat_pro_counts->categories; ?></span>
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Active Categories
        </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-yellow">
      <span class="info-box-icon"><i class="fa fa-barcode"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Products</span>
        <span class="info-box-number"><?php echo $cat_pro_counts->products; ?></span>
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
          Active Products
        </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red">
      <span class="info-box-icon"><i class="fa fa-pause"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pending Orders</span>
        <span class="info-box-number"><?php echo $order_counts->pending; ?></span>
        <div class="progress">
          <div class="progress-bar" style="width: <?php echo $order_counts->pending/$order_counts->total_orders*100; ?>%"></div>
        </div>
        <span class="progress-description">
          Total Pending Orders
        </span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div>

</div>

<div class = "row">
  <div class = "col-md-5" style = "border-right: 1px solid #f4f4f4;">
    <div id = 'pie-container' style = "width: 100%; height: 350px;">
    </div>
  </div>
  <div class = "col-md-3" style = "border-right: 1px solid #f4f4f4;">
    <h3><center>Order Summary</center></h3>
    <div class="col-sm-12 col-xs-6">
      <div class="description-block" style = "border-bottom: 1px solid #f4f4f4;">
        <span>MOST ORDERED PRODUCT</span>
        <h5 class="description-header"><?php echo $order_summary['most']->product_name;?></h5>
        <span class="description-percentage text-green"><?php echo $order_summary['most']->order_counts;?> times</span>
      </div><!-- /.description-block -->
    </div><!-- /.col -->
     <div class="col-sm-12 col-xs-6">
      <div class="description-block" style = "border-bottom: 1px solid #f4f4f4;">
        <span>LEAST ORDERED PRODUCT</span>
        <h5 class="description-header"><?php echo $order_summary['least']->product_name;?></h5>
        <span class="description-percentage text-red"><?php echo $order_summary['least']->order_counts;?></span>
      </div><!-- /.description-block -->
    </div><!-- /.col -->
     <div class="col-sm-12 col-xs-6">
      <div class="description-block" style = "border-bottom: 1px solid #f4f4f4;">
        <span>MOST RECENT PRODUCT ORDER</span>
        <h5 class="description-header"><?php echo $order_summary['latest']->product_name;?></h5>
        <span class="description-percentage text-green"><?php echo $order_summary['latest']->latest_order_date;?></span>
      </div><!-- /.description-block -->
    </div><!-- /.col -->
     <div class="col-sm-12 col-xs-6">
      <div class="description-block">
        <span>LEAST RECENT ORDERED PRODUCT</span>
        <h5 class="description-header"><?php echo $order_summary['oldest']->product_name;?></h5>
        <span class="description-percentage text-red"><?php echo $order_summary['oldest']->latest_order_date; ?></span>
      </div><!-- /.description-block -->
    </div><!-- /.col -->
  </div>

  <div class = "col-md-4">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Recently Added Products</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div><!-- /.box-header -->
        <div class="box-body">
          <ul class="products-list product-list-in-box">
            <?php echo $product_list; ?>
          </ul>
        </div><!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="<?php echo base_url(); ?>dashboard/category" class="uppercase">View All Products</a>
          </div><!-- /.box-footer -->
        </div>
  </div>
</div>


<script src="<?php echo base_url(); ?>assets/admin/js/analytics.js" type = "text/javascript"></script>