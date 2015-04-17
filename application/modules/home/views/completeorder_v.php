	<style type="text/css">
    .form-group
    {
        height: 40px;
    }
    </style>
    <div class="container">
		<div class="row">
			<div class="col-lg-12">
                <div class="col-md-6">
                    <form method = "POST" action = "<?php echo base_url(); ?>customercart/complete" id = "customer_details" class="validateform">
                        <fieldset>
                            <legend><i class = "fa fa-truck"></i>&nbsp;&nbsp;Shipping Details</legend>
                            <div class = "form-group">
                                <label class = "control-label col-md-4">First Name:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "first_name"  data-rule = "required" required>
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Last Name:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "last_name"  data-rule = "required" required>
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Other Names: </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "other_name" data-rule = "required" >
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Phone Number:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "phonenumber"  data-rule = "required" required>
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Email Address:* </label>
                                <div class = "col-md-8">
                                    <input type = "email" class="form-control" name = "email_address"  data-rule = "required" required>
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Postal Address:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "postal_address"  data-rule = "required" required>
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">City:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "city" data-rule = "required" >
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <div class = "form-group">
                                <label class = "control-label col-md-4">Physical Address:* </label>
                                <div class = "col-md-8">
                                    <input type = "text" class="form-control" name = "physical_address" data-rule = "required" >
                                    <div class="validation"></div>
                                </div>
                            </div>

                            <legend><i class = "fa fa-archive"></i>&nbsp;&nbsp;Packaging Details</legend>
                            <label class = "control-label">How would you like the items to be packaged?</label>
                            <br/>
                            <input type = "radio" name = "packaging" value = "boxed" checked/> In boxes <br />
                            <input type = "radio" name = "packaging" value = "bundled" /> In bundles <br />
                            <input type = "radio" name = "packaging" value = "boxed" /> In bundles & boxes <br />
                        </fieldset>
                    
                </div>
                <div class="col-md-6">
                    <legend>Order Summary</legend>
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th style = "text-align: center;">Quantity</th>
                                <th style = "text-align: center;">Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($this->cart->contents() as $key => $value) {
                                    echo "<tr>
                                    <td>".$value['name']."</td>
                                    <td style = 'text-align: center;'>".$value['qty']."</td>
                                    <td style = 'text-align: center;'>".$value['price']."</td>
                                    <td>Ksh. ".$value['subtotal']."</td>
                                    </tr>";
                                }
                                echo "<tr>
                                <td colspan = '3' style = 'text-align: right;'>Grand Total</td>
                                <td style = 'text-align: left;'>Ksh. ".$this->cart->total()."</td>
                                </tr>";
                            ?>
                        </tbody>
                    </table>

                    <a href = "<?php echo base_url(); ?>customercart" class = "btn btn-danger btn-sm"><i class = "fa fa-pencil"></i>&nbsp;Edit Cart</a> | 
                    <!-- <a href href="javascript:{}" onclick="document.getElementById('customer_details').submit(); return false;" class = "btn btn-success btn-sm" id = "complete-transaction"><i class = "fa fa-save"></i>&nbsp;Complete Transaction</a> -->
                    <button type = "submit" class = "btn btn-success btn-sm"><i class = "fa fa-save"></i>&nbsp;Complete Transaction</button>
                    </form>
                </div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
    /*global jQuery:false */
// jQuery(document).ready(function($) {
// "use strict";

//     //Contact
//     $('form.validateform').submit(function(){

//         var f = $(this).find('.field'), 
//         ferror = false, 
//         emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

//         f.children('input').each(function(){ // run all inputs

//             var i = $(this); // current input
//             var rule = i.attr('data-rule');

//             if( rule != undefined ){
//             var ierror=false; // error flag for current input
//             var pos = rule.indexOf( ':', 0 );
//             if( pos >= 0 ){
//                 var exp = rule.substr( pos+1, rule.length );
//                 rule = rule.substr(0, pos);
//             }else{
//                 rule = rule.substr( pos+1, rule.length );
//             }
            
//             switch( rule ){
//                 case 'required':
//                 if( i.val()=='' ){ ferror=ierror=true; }
//                 break;

//                 case 'maxlen':
//                 if( i.val().length<parseInt(exp) ){ ferror=ierror=true; }
//                 break;

//                 case 'email':
//                 if( !emailExp.test(i.val()) ){ ferror=ierror=true; }
//                 break;


//                 case 'checked':
//                 if( !i.attr('checked') ){ ferror=ierror=true; }
//                 break;
                
//                 case 'regexp':
//                 exp = new RegExp(exp);
//                 if( !exp.test(i.val()) ){ ferror=ierror=true; }
//                 break;
//               }
//               i.next('.validation').html( ( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' ) ).show('blind');
//             }
//         });
//         f.children('textarea').each(function(){ // run all inputs

//             var i = $(this); // current input
//             var rule = i.attr('data-rule');

//             if( rule != undefined ){
//             var ierror=false; // error flag for current input
//             var pos = rule.indexOf( ':', 0 );
//             if( pos >= 0 ){
//                 var exp = rule.substr( pos+1, rule.length );
//                 rule = rule.substr(0, pos);
//             }else{
//                 rule = rule.substr( pos+1, rule.length );
//             }
            
//             switch( rule ){
//                 case 'required':
//                 if( i.val()=='' ){ ferror=ierror=true; }
//                 break;

//                 case 'maxlen':
//                 if( i.val().length<parseInt(exp) ){ ferror=ierror=true; }
//                 break;
//               }
//               i.next('.validation').html( ( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' ) ).show('blind');
//             }
//         });
//         if( ferror ) return false; 
//             else var str = $(this).serialize();
//             //    $.ajax({
//             //    type: "POST",
//             //    url: "contact/submit_contact",
//             //    data: str,
//             //    beforeSend: function(){
//             //     $('#x').html("<i class = 'fa fa-spinner fa-spin'></i> Please wait");
//             //    },
//             //    success: function(msg){
//             //     $('#x').html("Submit Message");
//             // $("#sendmessage").addClass("show");
//             // $("#errormessage").ajaxComplete(function(event, request, settings){
        
//             // if(msg == 'OK')
//             // {
//             //     $("#sendmessage").addClass("show");
                
//             // }
//             // else
//             // {
//             //     $("#sendmessage").removeClass("show");
//             //     result = msg;
//             // }
        
//             // $(this).html(result);});}});
//                 return false;
//     });

// });
</script>