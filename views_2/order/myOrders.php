<?php if (isset($admin)) : ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Orders</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>State</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($res as $item) : ?>
                        <tr>
                            <td>
                                <?= $item->user_id; ?>
                            </td>
                            <?php if (isset($item->first_name)) : ?>
                                <td>
                                    <?= $item->first_name; ?>
                                </td>
                            <?php endif; ?>
                            <?php if (isset($item->last_name)) : ?>
                                <td>
                                    <?= $item->last_name; ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <a style="color: blue;" title="click to see order details" href="<?= base_url ?>order/orderDetailsAdmin&id=<?= $item->id ?>"><?= $item->id ?></a>
                            </td>
                            <td>
                                $<?= $item->total_price; ?>
                            </td>
                            <td>
                                <?= $item->date ?>
                            </td>
                            <td>
                                <?= $item->status ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php else : ?>

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

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-image">Order ID</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Date</th>
                                <th class="product-total">State</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($res as $item) : ?>
                            <tr class="table-body-row">
                                <td class="product-image"><a class="boxed-btn" href="<?= base_url ?>order/orderDetails&id=<?= $item->id ?>"><?= $item->id ?></a></td>
                                <td class="product-price">$<?= $item->total_price; ?></td>
                                <td class="product-quantity"><?= $item->date ?></td>
                                <td class="product-total"><?= $item->status ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
<?php endif; ?>
