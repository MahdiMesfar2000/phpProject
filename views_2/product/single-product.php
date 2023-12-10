<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Single Product</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->


<?php if(isset($singleProduct)): ?>
<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="<?=base_url?>uploads/images/<?=$singleProduct->image;?>" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3><?= ucfirst($singleProduct->name); ?></h3>
                    <p class="single-product-pricing"><span>Per Kg</span> $<?= $singleProduct->price; ?></p>
                    <p><?= $singleProduct->description; ?></p>
                    <div class="single-product-form">
                        <a href="<?= base_url ?>cart/add&id=<?= $singleProduct->id; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <p><strong>Category: </strong><?= ucfirst($singleProduct->category_name); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->
<?php else: ?>
    <h1>No product found...</h1>
<?php endif; ?>