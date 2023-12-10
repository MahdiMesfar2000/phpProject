<?php
require_once 'models/product.php';

class productController{
    public function index(){
        // Render index
        $product = new Product();
        $products = $product->getRandom(9);
        require_once 'views_2/product/featured-products.php';
    }

    public function manage(){
        Utils::isAdmin();

        $product = new Product();
        $products = $product->getAllProductsWithCategory();
        require_once 'views_2/product/manage.php';
    }


    public function sortProducts() {
        if (isset($_POST['sortType'])) {
            $sortType = $_POST['sortType'];
            $categoryId = $_POST['category_id'];

            // Perform the sorting in the Product model
            $product = new Product();
            $sortedProducts = $product->sortProductsInCategory($sortType, $categoryId);

            // Output the sorted results in the desired format
            echo "<div class='row product-lists'>";
            foreach ($sortedProducts as $product) {
                ?>
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
                <?php
            }
            echo "</div>";
        }
    }

    public function searchProducts() {
        if (isset($_POST['searchText'])) {
            $searchText = $_POST['searchText'];
            $categoryId = $_POST['category_id'];
            // Perform the search in the Product model
            $product = new Product();
            $searchResults = $product->searchProductsInCategory($searchText, $categoryId);

            // Output the search results in the desired format
            echo "<div class='row product-lists'>";
            foreach ($searchResults as $result) {
                ?>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= base_url ?>product/singleProduct&id=<?= $result->id ?>"><img src="<?= base_url ?>uploads/images/<?= $result->image ?>" alt=""></a>
                        </div>
                        <h3><?= $result->name ?></h3>
                        <p class="product-price"><span>Per Kg</span> <?= $result->price ?>$ </p>
                        <a href="<?= base_url ?>cart/add&id=<?= $result->id; ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <?php
            }
            echo "</div>";
        }
    }




    public function create(){
        Utils::isAdmin();
        require_once 'views_2/product/create.php';
    }


    // productController.php
    //search method to search by name from the Productmodel
    // productController.php




    public function save() {
        Utils::isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? false;
            $description = $_POST['description'] ?? false;
            $price = $_POST['price'] ?? false;
            $stock = $_POST['stock'] ?? false;
            $category = $_POST['category'] ?? false;

            if ($name && $description && $price && $stock && $category) {
                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setCategory_id($category);

                // Save image
                if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                    $image = $_FILES['image'];
                    $imageName = $image['name'];
                    $mimeType = $image['type'];

                    // Validate file type
                    $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                    if (in_array($mimeType, $allowedTypes)) {
                        // Validate file size (adjust the limit as needed)
                        $maxFileSize = 5 * 1024 * 1024; // 5 MB
                        if ($image['size'] <= $maxFileSize) {
                            if (!is_dir('uploads/images')) {
                                mkdir('uploads/images', 0777, true);
                            }

                            $uploadPath = 'uploads/images/' . $imageName;

                            if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                                $product->setImage($imageName);
                            } else {
                                // Handle file move failure
                                echo "Failed to move the uploaded file.";
                                $_SESSION['product'] = "failed";
                                header("Location:" . base_url . "product/manage");
                                exit;
                            }
                        } else {
                            // Handle file size exceeded
                            echo "File size exceeds the limit.";
                            $_SESSION['product'] = "failed";
                            header("Location:" . base_url . "product/manage");
                            exit;
                        }
                    } else {
                        // Handle invalid file type
                        echo "Invalid file type.";
                        $_SESSION['product'] = "failed";
                        header("Location:" . base_url . "product/manage");
                        exit;
                    }
                }

                // Check if creating a new product or updating an existing product
                if (isset($_GET['id'])) {
                    $product->setId($_GET['id']);
                    $save = $product->update();
                } else {
                    $save = $product->save();
                }

                if ($save) {
                    $_SESSION['product'] = "completed";
                } else {
                    $_SESSION['product'] = "failed";
                }
            } else {
                $_SESSION['product'] = "failed";
            }
        } else {
            $_SESSION['product'] = "failed";
        }

        header("Location:" . base_url . "product/manage");
        exit;
    }


    public function edit(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $edit = true;
            $product = new Product();
            $product->setId($_GET['id']);
            $editProduct = $product->getCurProduct();

            require_once 'views_2/product/create.php';
        } else{
            header("Location:".base_url."product/manage");
        }


    }// end edit


    public function delete(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $product = new Product();
            $product->setId($_GET['id']);
            $delete = $product->delete();

            if($delete){
                $_SESSION['deleted'] = "completed";
            } else{
                $_SESSION['deleted'] = "failed";
            }
        }else{
            $_SESSION['deleted'] = "failed";
        }

        header("Location:".base_url."product/manage");

    }// end delete


    public function singleProduct(){
        if(isset($_GET['id'])){
            $product = new Product();
            $product->setId($_GET['id']);
            $singleProduct = $product->getCurProductWithCategory();

            require_once 'views_2/product/single-product.php';
        } else{
            header("Location:".base_url."product/manage");
        }
    }
}