<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Change Order Status</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="<?=base_url?>order/status" method="POST">
                <div class="input-group-lg">
                    <input type="text" style="display: none;" name="orderId" value="<?=$lastOrder->id?>">
                    <label for="name">Status:</label>
                    <select class="form-control bg-light small" name="status" style="width: 35%" id="order-status">
                        <option value="confirmed" <?=$lastOrder->status == "confirmed" ? 'selected' : ''?>>Confirmed to be delivered</option>
                        <option value="processing" <?=$lastOrder->status == "processing" ? 'selected' : ''?>>Being processed</option>
                        <option value="sent" <?=$lastOrder->status == "sent" ? 'selected' : ''?>>Already sent</option>
                        <option value="delivered" <?=$lastOrder->status == "delivered" ? 'selected' : ''?>>Order delivered</option>
                    </select>
                </div>
                <input class="form-control btn btn-primary w-25 mt-4" type="submit" value="Change Status" class="btn">
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Order Info</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Delivery Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=$lastOrder->id;?></td>
                        <td><?=$lastOrder->address;?></td>
                        <td><?=$lastOrder->date;?></td>
                        <td><?=$lastOrder->time;?></td>
                        <td>$<?=$lastOrder->total_price;?></td>
                        <td><?=$lastOrder->status;?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 mb-2 text-gray-800">Products Info</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Unities</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $item) :?>
                    <tr>
                        <td>
                            <center><img width="50px;" src="<?=base_url?>/uploads/images/<?=$item->image?>" alt="product image"></center>
                        </td>
                        <td>
                            <?= $item->name; ?>
                        </td>
                        <td>
                            $<?= $item->price?>
                        </td>
                        <td>
                            <?= $item->unities;?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






