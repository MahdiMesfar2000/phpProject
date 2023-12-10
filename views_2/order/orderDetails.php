<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Order Details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <a class="boxed-btn mb-80" href="<?=base_url?>/order/myOrders">Go Back To My Orders</a>
        <div class="row">
            <h2 class="table-align">Order Info</h2>
            <div class="col-lg-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th>Order ID</th>
                            <th>Delivery Address</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="table-body-row">
                                <td><?=$lastOrder->id;?></td>
                                <td><?=$lastOrder->address;?></td>
                                <td><?=$lastOrder->date;?></td>
                                <td><?=$lastOrder->time;?></td>
                                <td>$<?=$lastOrder->total_price;?></td>
                                <td><?=$lastOrder->status;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <h2 class="table-align" style="margin-top: 20px;">Products Info</h2>
            <div class="col-lg-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Unities</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $item) :?>
                            <tr>
                                <td>
                                    <img width="115px;" src="<?=base_url?>/uploads/images/<?=$item->image?>" alt="product image">
                                </td>
                                <td>
                                    <a class="boxed-btn" href="<?=base_url?>product/singleProduct&id=<?=$item->id?>"><?= $item->name; ?></a>
                                </td>
                                <td>
                                    $<?= $item->price?>
                                </td>
                                <td>
                                    <?= $item->unities;?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->