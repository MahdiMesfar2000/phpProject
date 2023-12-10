<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>My Orders</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<?php if(isset($_SESSION['order']) && $_SESSION['order' ]== "completed"): ?>
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <h1>Order Confirmed</h1>
            <h4>Your order has been successful! Here are the info:</h4>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Order ID</th>
                                <th class="product-name">Delivery Address</th>
                                <th class="product-price">Date</th>
                                <th class="product-quantity">Time</th>
                                <th class="product-total">Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr class="table-body-row">
                                        <td class="product-image"><?=$lastOrder->id;?></td>
                                        <td class="product-name"><?=$lastOrder->address;?></td>
                                        <td class="product-price"><?=$lastOrder->date;?></td>
                                        <td class="product-quantity">
                                            <?=$lastOrder->time;?>
                                        </td>
                                        <td class="product-total"><?=$lastOrder->total_price;?></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                        <a class="boxed-btn mt-4" href="<?=base_url?>order/toDownload">
                            Download Confirmation
                        </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
<?php elseif(isset($_SESSION['order']) && $_SESSION['order' ] != "completed"):?>
    <div class="cart-section mt-150 mb-150">
        <div class="container">
    <h3 class="table-align">Sorry, your order could not be processed.</h3>
        </div>
    </div>
<?php endif; ?>