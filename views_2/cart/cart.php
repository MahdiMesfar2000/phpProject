<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Cart</h1>
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
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th class="product-remove"></th>
                            <th class="product-image">Product Image</th>
                            <th class="product-name">Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($cart)):
                            foreach($cart as $index => $product):
                                $item = $product['product'];
                                ?>
                                <tr class="table-body-row">
                                    <td class="product-remove"><a class="boxed-btn" href="<?=base_url?>cart/remove&index=<?=$index?>"><i class="fa fa-times"></i></a></td>
                                    <td class="product-image"><img src="<?=base_url?>/uploads/images/<?=$item->image?>" alt=""></td>
                                    <td class="product-name"><a class="boxed-btn" href="<?=base_url?>product/singleProduct&id=<?=$item->id?>"><?= $item->name; ?></a></td>

                                    <td class="product-price">$<?= $item->price?></td>
                                    <td class="product-quantity">
                                        <a class="boxed-btn" href="<?=base_url?>cart/minus&index=<?=$index?>"><i class="fas fa-minus"></i></a>
                                        <a class="boxed-btn" href="<?=base_url?>cart/plus&index=<?=$index?>"><i class="fas fa-plus"></i></a>
                                    </td>
                                    <td class="product-total"><?= $_SESSION['cart'][$index]['unities']?></td>
                                </tr>
                            <?php endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                        <tr class="table-total-row">
                            <th>Total</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) :?>
                        <tr class="total-data">
                            <td><strong>Subtotal: </strong></td>
                            <?php $vals = Utils::valsCart();?>
                            <td>$<?=number_format((float)$vals['total'], 2, '.', '');?></td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Shipping: </strong></td>
                            <td>Free</td>
                        </tr>
                        <tr class="total-data">
                            <td><strong>Total: </strong></td>
                            <?php $vals = Utils::valsCart();?>
                            <td>$<?=number_format((float)$vals['total'], 2, '.', '');?></td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <?php  if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) :?>
                            <a href="<?=base_url?>cart/delete" class="boxed-btn">Empty Cart</a>
                            <a href="<?=base_url?>order/order" class="boxed-btn black">Checkout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end cart -->