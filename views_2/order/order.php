<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1>Check Out Products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<?php if(!isset($_SESSION['identity'])): ?>
<div class="checkout-section mt-150 mb-150">
        <div class="container">
            <h3 class="table-align">Please, login to complete your purchase!</h3>
        </div>
</div>
<?php else: ?>
    <!-- check out section -->
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <a class="boxed-btn mb-4" href="<?=base_url?>/cart/index">Go Back To Cart</a>
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" aria-expanded="true">
                                            Shipping Address
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="billing-address-form">
                                            <form action="<?=base_url?>order/add" method="POST">
                                                <p><input type="text" name="address" id="address" placeholder="Address"></p>
                                                <p><input type="text" name="city" id="city" placeholder="City"></p>
                                                <p><input type="text" name="state" id="state" placeholder="State"></p>
                                                <input type="submit" class="boxed-btn" value="Buy Now">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end check out section -->
<?php endif; ?>