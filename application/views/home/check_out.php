<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="<?php echo base_url();?>submit-order" class="checkout-form" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input name="first_name" type="text" id="fir" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input name="last_name" type="text" id="last" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Company Name</label>
                                <input name="company_name" type="text" id="cun-name">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country<span>*</span></label>
                                <input name="country" type="text" id="cun" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Address<span>*</span></label>
                                <input name="address" type="text" id="street" class="street-first" required>
                               
                            </div>
                            
                            <div class="col-lg-12">
                                <label for="town">City<span>*</span></label>
                                <input name="city" type="text" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input name="email" type="text" id="email" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input name="phone" type="text" id="phone" required>
                            </div>


                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php $total = 0; foreach($cart_item as $row) { ?>  

                                     <input type="hidden" name="item_id[]" class="form-control" id="" value="<?php echo $row['id']; ?>">

                                     <input type="hidden" name="qty[]" class="form-control" id="" value="<?php echo $row['qty']; ?>">

                                      <input type="hidden" name="subtotal[]" class="form-control" id="" value="<?php echo $row['subtotal']; ?>">

                                    <li class="fw-normal" ><?php echo $row['name']  .' X '.$row['qty']; ?>
                                        <span>
                                            <?php echo $row['subtotal']; 
                                                $total = $total + $row['subtotal'];
                                            ?>
                                        </span>
                                    </li>

                                    <?php } ?>
                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                    <li class="total-price">Total <span id=""><?php echo  $total.' BDT'; ?></span></li>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>