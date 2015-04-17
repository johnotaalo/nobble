        <form action="<?php echo base_url();?>customercart/update" method = "POST">
            <fieldset>
                <table class = "table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity col-md-1">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($this->cart->contents()){
                                foreach ($this->cart->contents() as $key => $value) {
                                    echo "<tr class = 'cart_item'>";
                                    echo "<td class = 'product-remove'  valign = 'middle'><a href='".base_url()."customercart/removeitem/".$key."' class='remove' title='Remove this item'><i class = 'ion ion-close-round'></i></a></td>";
                                    echo "<td class = 'product-thumbnail'><a href = '".base_url()."products/view/".$value['id']."'><img width='90' height='90' src='".$this->cart->product_options($key)['image']."' alt='".$value['name']."'></a></td>";
                                    echo "<td class = 'product-name'  valign = 'middle'><a href = '".base_url()."products/view/".$value['id']."'>".$value['name']."</a></td>";
                                    echo "<td class = 'product-price'><span class = 'amount'>Ksh. ".$value['price']."</span></td>";
                                    echo "<td class = 'product-quanitity'><input type='number' step='1' min='0' name='qty_".$key."' value='".$value['qty']."' title='Qty' class='form-control'>
                                    </td>";
                                    echo "<td class = 'product-subtotal'><span class='amount'>Ksh. ".$value['subtotal']."</span></td>
                                    <input type = 'hidden' name = 'rowid_".$key."' value = '".$key."' />";
                                    echo "</tr>";
                                }
                                echo '<tr>
                                <td colspan = "6" class = "actions">
                                    <div class = "cart-actions col-md-10 pt-left">
                                        <div class = "col-md-4"><h3>Grand Total: <span style = "color: #222;">Ksh. '.$this->cart->total().'</span></h3></div>
                                        <div class = "col-md-8">
                                            <a href = "#" class = "btn btn-danger" id = "clear-btn"><i class = "ion ion-trash-a"></i>&nbsp;Clear Cart</a>
                                            <a href = "'.base_url().'customercart/completeorder" class = "btn btn-success"><i class = "ion ion-checkmark-round"></i>&nbsp;Complete Order</a>
                                            <a href = "" class = "btn btn-success"><i class = "ion ion-android-arrow-back"></i>&nbsp;Continue Shopping</a>
                                        </div>
                                    </div>
                                    <div class="cart-actions col-md-2 pt-right">

                                <input type="submit" class="btn btn-default" name="update_cart" value="Update Cart">

                                </div>
                                </td>
                                </tr>';
                            }
                            else
                            {
                                echo "<tr class = 'cart_item'>
                                <td colspan = '6'><center><h3>No items in cart</h3></center></td>
                                </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </fieldset>
        </form>
    <script type="text/javascript">
        $(document).ready(function(){
            
        });
    </script>
