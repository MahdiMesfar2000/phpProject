<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <?php if(isset($edit) && isset($editCategory) && is_object($editCategory)):?>
        <h1 class="h3 mb-2 text-gray-800">Edit Category - <?= $editCategory->name;?></h1>
        <?php $url_action = base_url."category/save&id=".$editCategory->id; ?>
    <?php else : ?>
        <h1 class="h3 mb-2 text-gray-800">Add Category</h1>
        <?php $url_action = base_url."category/save"; ?>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?=$url_action?>" method="POST">
                <div class="input-group-lg">
                    <label for="name">Name:</label>
                    <input class="form-control bg-light small" type="text" name="name" required value="<?=isset($editCategory) && is_object($editCategory) ? $editCategory->name : ''; ?>">
                </div>
                <input class="form-control btn btn-primary w-25 mt-4" type="submit" class="btn" value="<?=isset($editCategory) && is_object($editCategory) ? 'Edit Category' : 'Create Category'; ?>">
            </form>
        </div>
    </div>
