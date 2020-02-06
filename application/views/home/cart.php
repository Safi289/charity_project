<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a> 
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                       
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart_item as $item) { ?>
                                <tr>
                                    <td class="cart-pic first-row">

                                        <img src="<?php echo base_url();?>uploads/<?php echo $item['image'];?>" height="150" width="150" alt="">
                                    </td>

                                    <td class="cart-title first-row">
                                        <h5><?php echo $item['name']; ?></h5>
                                    </td>

                                    <td class="p-price first-row">
                                        <?php echo '$'.$item["price"].' BDT'; ?>
                                            
                                    </td>

                                    <td class="qua-col first-row">
   
                                       <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">          

                                    </td>
                                    <td class="total-price first-row">
                                         <?php echo '$'.$item["subtotal"]; ?>
                                    </td>
                                     
                                    <td class="close-td first-row">
                                        <a href="<?php echo base_url('remove-cart/'.$item["rowid"]); ?>"> 
                                        <i class="ti-close"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                               <?php } ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>$240.00</span></li>
                                    <li class="cart-total">Total <span></span></li>
                                </ul>
                                <a href="<?php echo base_url('checkout/'); ?>" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/update_cart_qty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>