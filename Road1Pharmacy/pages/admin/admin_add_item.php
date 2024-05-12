<?php
include '../../database/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </link>
    <link rel="stylesheet" href="../../css/add_item.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Add New Item - Admin</title>
</head>

<body>





    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="text-center">Road 1 Pharmacy</h5>
                        <form ENCTYPE="multipart/form-data" action="../../actions/admin/admin_add_item.php" method="post">
                            <h3 class="text-center">Add New Item</h3>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" class="form-control" name="item_name" required placeholder="Enter Item Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="unit_qty">Unit of Measurement(Number)</label>
                                    <input type="number" class="form-control" name="unit_qty" required placeholder="Enter Item unit" min="1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="unit_type">Unit of Measurement</label>
                                    <select class="form-control" name="unit_type" id="">
                                        <option value="mg">Milligrams</option>
                                        <option value="ml">Milliliters</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="unit_price">Unit Price</label>
                                    <input type="number" class="form-control" inputmode="decimal" name="unit_price" required placeholder="Enter Unit Price" min="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mark_up">Mark up %</label>
                                    <input type="number" class="form-control" name="mark_up" required placeholder="Enter Mark up" min="1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Type">Type</label>
                                    <select class="form-control" name="type" id="">
                                        <option value="Generic">Generic</option>
                                        <option value="Branded">Branded</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="indication">Indidcation</label>
                                    <input type="text" class="form-control" name="indication" required placeholder="Enter Medicine Indication">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="vendor_name">Vendor Name</label>
                                    <input type="text" class="form-control" name="vendor_name" required placeholder="Enter Vendor Name">
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Add Item" class="btn btn-primary btn-block text">
                        </form>
                        <p class="text-center"><a href="admin_view_items.php" class="btn btn-danger mt-2 btn-block text ">Cancel</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>