

<div class="container-fluid">

    <!-- Page Heading -->


    <?php if(isset($edit) && isset($editProduct) && is_object($editProduct)):?>
        <h1 class="h3 mb-2 text-gray-800">Edit Product - <?= $editProduct->name;?></h1>
        <?php $url_action = base_url."product/save&id=".$editProduct->id; ?>
    <?php else : ?>
        <h1 class="h3 mb-2 text-gray-800">Add Product</h1>
        <?php $url_action = base_url."product/save"; ?>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
                <div class="input-group-lg">
                    <label for="name">Name:</label>
                    <input class="form-control bg-light small" type="text" name="name" value="<?=isset($editProduct) && is_object($editProduct) ? $editProduct->name : ''; ?>">
                    <label for="description">Description:</label>
                    <textarea class="form-control bg-light small" name="description"><?=isset($editProduct) && is_object($editProduct) ? $editProduct->description : ''; ?></textarea>
                    <label for="price">Price:</label>
                    <input class="form-control bg-light small" type="text" name="price" value="<?=isset($editProduct) && is_object($editProduct) ? $editProduct->price : ''; ?>">
                    <label for="stock">Stock:</label>
                    <input class="form-control bg-light small" type="number" name="stock" value="<?=isset($editProduct) && is_object($editProduct) ? $editProduct->stock : ''; ?>">
                    <label for="category">Category:</label>
                    <select class="form-control bg-light small" name="category">
                        <?php $categories = Utils::showCategories(); ?>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?=$category->id?>" <?=isset($editProduct) && is_object($editProduct) && $category->id == $editProduct->category_id ? 'selected' : ''; ?>>
                            <?=$category->name?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="image">Image:</label>
                    <input class="form-control bg-light small" type="file" name="image">
                </div>
                <input class="form-control btn btn-primary w-25 mt-4" type="submit" class="btn" value="<?=isset($editProduct) && is_object($editProduct) ? 'Edit Product' : 'Add Product'; ?>">
            </form>
        </div>
    </div>
