<!-- css -->
<link href="<?php echo base_url(); ?>assets/crash/css/style.css" rel="stylesheet" />

	<style type="text/css">
		#loading
		{
			display: hidden;
			width: 100%;
			text-align: center;
			color: green;
		}
	</style>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<section id="content">
	<div class="map">
		<!-- <iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
		</iframe> -->
		<div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas" style="height:500px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.map-embed.com" id="get-map-data">www.map-embed.com</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:13,center:new google.maps.LatLng(-1.2882626,36.81375920000005),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(-1.2882626, 36.81375920000005)});infowindow = new google.maps.InfoWindow({content:"<b>Nobble Drug</b><br/>Kenyatta Avenue<br/> Nairobi" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Get in touch with us by filling <strong>contact form below</strong></h4>
				<form id="contactform" action="<?php echo base_url(); ?>contact/submit_contact" method="post" class="validateform" name="send-contact">
					<div id="sendmessage">
						 Your message has been sent. Thank you!
					</div>
					
					<div class="row">
						<div class="col-lg-4 field">
							<input type="text" name="contact_name" placeholder="* Enter your full name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-4 field">
							<input type="text" name="contact_email" placeholder="* Enter your email address" data-rule="email" data-msg="Please enter a valid email" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-4 field">
							<input type="text" name="contact_subject" placeholder="Enter your subject" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
							<div class="validation">
							</div>
						</div>
						<div class="col-lg-12 margintop10 field">
							<textarea rows="12" name="contact_message" class="input-block-level" placeholder="* Your message here..." data-rule="required" data-msg="Please write something"></textarea>
							<div class="validation">
							</div>
							<p>
								<button class="btn btn-theme margintop10 pull-left" type="submit" id = "x">Submit message</button>
								<!-- <div id = "loading">
									<i class = "fa fa-spinner fa-spin"></i>&nbsp;&nbsp;Please wait as we submit your request
								</div> -->
								<span class="pull-right margintop20">* Please fill all required form field, thanks!</span>
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</section>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/crash/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/jquery.fancybox-media.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/portfolio/jquery.quicksand.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/portfolio/setting.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/animate.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/crash/js/validate.js"></script>
</body>
</html>