<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Products</h1>
    <?php if (isset($_SESSION['product']) && $_SESSION['product'] == "completed"): ?>
        <div class="alert alert-success" role="alert">
            Product successfully added!
        </div>
    <?php elseif (isset($_SESSION['product']) && $_SESSION['product'] !== "completed"): ?>
        <div class="alert alert-danger" role="alert">
            Product could not be added!
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('product'); ?>
    <!-- Feedback display when deleting product -->
    <?php if (isset($_SESSION['deleted']) && $_SESSION['deleted'] == "completed"): ?>
        <div class="alert alert-success" role="alert">
            Successfully deleted!
        </div>
    <?php elseif (isset($_SESSION['deleted']) && $_SESSION['deleted'] !== "completed"): ?>
        <div class="alert alert-danger" role="alert">
            Delete failed!
        </div>
    <?php endif; ?>
    <?php Utils::deleteSession('deleted'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url ?>product/create" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                <span class="text">Add Product</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><center><img width="50px" src="<?=base_url?>uploads/images/<?=$product->image;?>"></center></td>
                            <td><?= $product->id; ?></td>
                            <td><?= $product->name; ?></td>
                            <td><?= $product->category_name ?></td>
                            <td><?= $product->price; ?></td>
                            <td><?= $product->stock; ?></td>
                            <td>
                                <a href="<?= base_url ?>product/delete&id=<?= $product->id; ?>"><i class="trash-icon fas fa-trash"></i></a>
                                <a href="<?= base_url ?>product/edit&id=<?= $product->id; ?>"><i class="edit-icon fas fa-edit"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>







