

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Manage Categories</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="<?=base_url?>category/create" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                            <span class="text">Add Category</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?=$category->id;?></td>
                                    <td><?=$category->name;?></td>
                                    <td>
                                        <a href="<?=base_url?>category/delete&id=<?=$category->id;?>"><i class="trash-icon fas fa-trash"></i></a>
                                        <a href="<?=base_url?>category/edit&id=<?=$category->id;?>"><i class="edit-icon fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>






