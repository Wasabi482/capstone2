<?php
// pdo connection
$pdo = new PDO(
    "mysql:host=localhost;dbname=capstone;charset=utf8mb4",
    "root",
    ""
);
?>


<?php
$query = $pdo->prepare("SELECT * FROM reports");
$query->execute();

// Fetch all the rows from the result set
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<h5>Item Reported</h5>
<section class='intro'>
    <div class='gradient-custom-2 h-100'>
        <div class='mask d-flex align-items-center h-100'>
            <div class='container'>
                <div class='row justify-content-center'>
                    <div class='col-12'>
                        <div class='table-responsive'>
                            <table class='table table-dark table-bordered mb-0'>
                                <thead>
                                    <tr>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>Item Name</th>
                                        <th scope='col'>Reason</th>
                                        <th scope='col'>Quantity</th>
                                        <th scope='col'>Expiry Date</th>
                                        <th scope='col'>Status</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $row) : ?>
                                        <tr>
                                            <td class='id'><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['item_name']; ?></td>
                                            <td><?php echo $row['reason']; ?></td>
                                            <td><?php echo $row['qty']; ?></td>
                                            <td><?php echo $row['expiry_date']; ?></td>
                                            <td <?php if ($row['status'] == 'unread') {
                                                    echo "style='color: red;'";
                                                } ?>><?php echo $row['status']; ?></td>
                                            <td><a href="#" class='btn btn-success mr-2 mark_as_read'>Mark as Read</a><a href="#" class='btn btn-danger'>Delete</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade custom-fade" id="markAsReadModal" tabindex="-1" role="dialog" aria-labelledby="markAsReadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg custom-modal-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="markAsReadModalLabel">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="edit_form">


                </div>
            </div>
        </div>
    </div>
</div>