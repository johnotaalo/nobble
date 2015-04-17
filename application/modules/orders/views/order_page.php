<div class="col-md-12">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class = "fa fa-shopping-cart"></i>&nbsp;&nbsp;All Orders&nbsp;&nbsp;&nbsp;<span class = "pull-right">(<?php echo $order_details['counts']['all']; ?>)</span></a></li>
      <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class = "fa fa-clock-o"></i>&nbsp;&nbsp;Pending Orders&nbsp;&nbsp;&nbsp;<span class = "pull-right">(<?php echo $order_details['counts']['pending']; ?>)</span></a></li>
      <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><i class = "fa fa-truck"></i>&nbsp;&nbsp;In Transit&nbsp;&nbsp;&nbsp;<span class = "pull-right">(<?php echo $order_details['counts']['in_transit']; ?>)</span></a></li>
      <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"><i class = "fa fa-check"></i>&nbsp;&nbsp;Completed Orders&nbsp;&nbsp;&nbsp;<span class = "pull-right">(<?php echo $order_details['counts']['completed']; ?>)</span></a></li>
      <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false"><i class = "fa fa-times"></i>&nbsp;&nbsp;Cancelled Orders&nbsp;&nbsp;&nbsp;<span class = "pull-right">(<?php echo $order_details['counts']['is_active']; ?>)</span></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th><input type = "checkbox" value = "all" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Email Address</th>
              <th>Order Date</th>
              <th>Order Details</th>
              <th>Order Status</th>
              <th>Cancel Order</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $order_details['all']; ?>
          </tbody>
        </table>
      </div><!-- /.tab-pane -->
      <div class="tab-pane" id="tab_2">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th><input type = "checkbox" value = "all" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Email Address</th>
              <th>Order Date</th>
              <th>Order Details</th>
              <th>Order Status</th>
              <th>Cancel Order</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $order_details['pending']; ?>
          </tbody>
        </table>
      </div><!-- /.tab-pane -->
      <div class="tab-pane" id="tab_3">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th><input type = "checkbox" value = "all" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Email Address</th>
              <th>Order Date</th>
              <th>Order Details</th>
              <th>Order Status</th>
              <th>Cancel Order</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $order_details['in_transit']; ?>
          </tbody>
        </table>
      </div><!-- /.tab-pane -->
       <div class="tab-pane" id="tab_4">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th><input type = "checkbox" value = "all" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Email Address</th>
              <th>Order Date</th>
              <th>Order Details</th>
              <th>Order Status</th>
              <th>Cancel Order</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $order_details['completed']; ?>
          </tbody>
        </table>
      </div><!-- /.tab-pane -->
       <div class="tab-pane" id="tab_5">
        <table class = "table table-hover table-bordered">
          <thead>
            <tr>
              <th><input type = "checkbox" value = "all" /></th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone Number</th>
              <th>Email Address</th>
              <th>Order Date</th>
              <th>Order Details</th>
              <th>Order Status</th>
              <th>Restore Order</th>
            </tr>
          </thead>
          <tbody>
            <?php echo $order_details['is_active']; ?>
          </tbody>
        </table>
      </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
  </div><!-- nav-tabs-custom -->
</div>