<?php if (isset($category)): ?>
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1><?= ucfirst($category->name); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
            </div>
            <div class="col-lg-6 offset-lg-3 mt-2">
                <button class="btn btn-dark" id="sortHighToLow">Sort by Price (High to Low)</button>
                <button class="btn btn-dark" id="sortLowToHigh">Sort by Price (Low to High)</button>
            </div>
        </div>
    </div>


<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container" id="searchResults">
        <div class="row product-lists">
            <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="<?= base_url ?>product/singleProduct&id=<?= $product->id ?>"><img src="<?= base_url ?>uploads/images/<?= $product->image ?>" alt=""></a>
                    </div>
                    <h3><?= $product->name ?></h3>
                    <p class="product-price"><span>Per Kg</span> <?= $product->price ?>$ </p>
                    <a href="<?= base_url ?>cart/add&id=<?= $product->id; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- end products -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Search function using AJAX
            $("#searchInput").on("keyup", function () {
                var searchText = $(this).val();

                $.ajax({
                    url: "<?= base_url ?>product/searchProducts",
                    type: "POST",
                    data: { searchText: searchText, category_id: <?= $category->id; ?> },
                    success: function (response) {
                        $("#searchResults").html(response);
                    }
                });
            });

            // Sorting by Price (High to Low)
            $("#sortHighToLow").on("click", function () {
                sortProducts("highToLow");
            });

            // Sorting by Price (Low to High)
            $("#sortLowToHigh").on("click", function () {
                sortProducts("lowToHigh");
            });

            // Function to handle sorting
            function sortProducts(sortType) {
                $.ajax({
                    url: "<?= base_url ?>product/sortProducts",
                    type: "POST",
                    data: { sortType: sortType, category_id: <?= $category->id; ?> },
                    success: function (response) {
                        $("#searchResults").html(response);
                    }
                });
            }
        });
    </script>
<?php else: ?>
    <h1>No categories found...</h1>
<?php endif; ?>
