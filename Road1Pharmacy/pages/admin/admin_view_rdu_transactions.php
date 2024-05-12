<?php
include '../../database/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ham.php';
    ?>
    <div class="height-100 bg-light">
        <h2>
            <center>View Delivery Transactions</center>
        </h2>


        <!-- Push Order Form -->
        <center>
            <form action="" method="post">
                <select name="received_by" id="received_by selectForm" class="mb-2 form-select my-select" style="width:30%;">
                    <option value='all'>All</option>
                    <?php
                    $data = "SELECT username FROM accounts WHERE role_as = '3'";
                    $result = mysqli_query($conn, $data);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $username = $row['username'];
                            echo "<option value='individual $username'>$username</option>";
                        }
                    } else {
                        echo "<option value=''>No data found!</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Show Total">
            </form>
        </center>
        <div id="main">
            <div id="formContent">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['received_by'])) {
                    $received_by = $_POST['received_by'];
                    if ($received_by == 'all') {
                        $total_query = "SELECT SUM(total) as total_amount FROM deliver_received";
                        $total_result = mysqli_query($conn, $total_query);
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total = $total_row['total_amount'];

                        echo "<h2>Total ₱: $total</h2>";
                        $transaction = "SELECT * FROM deliver_received";
                        $result = mysqli_query($conn, $transaction);
                        if (!$result) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        if (mysqli_num_rows($result) > 0) {

                            echo "
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
                                                            <th scope='col'>System #</th>
                                                            <th scope='col'>Transaction #</th>
                                                            <th scope='col'>Total</th>
                                                            <th scope='col'>Date Received</th>
                                                            <th scope='col'>Trasacted By</th>
                                                            <th scope='col'>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $system = $row['post_trans_number'];
                                $id = $row['receipt_trans_number'];
                                $total = $row['total'];
                                $date = $row['date_received'];
                                $received_by = $row['received_by'];
                                echo "
                                                        <tr>
                                                            <td scope='col' class ='system'> " . $system . "</td>
                                                            <td scope='col' class ='id'> " . $id . "</td>
                                                            <td scope='col' class='total'> " . $total . "</td>
                                                            <td scope='col' class='date'> " . $date . "</td>
                                                            <td scope='col' class='received_by'> " . $received_by . "</td>
                                                            <td scope='col' class=''> " . "<a href='#' class='btn btn-info view_details'>🔍View Details</a>" . "</td>
                                                        </tr> ";
                            }
                            echo "</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                        }
                    } else {
                        $username = explode(" ", $received_by);
                        $target =  $username[1];
                        $total_query = "SELECT SUM(total) as total_amount FROM deliver_received WHERE received_by = '$target'";
                        $total_result = mysqli_query($conn, $total_query);
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total = $total_row['total_amount'];

                        echo "<h3>Transactions of:</h3>" . "<h2 class ='target'><b>" . $target . "</b></h2>";
                        echo "<h2>Total ₱: $total</h2>";
                        $transaction = "SELECT * FROM deliver_received WHERE received_by = '$target'";
                        $result = mysqli_query($conn, $transaction);
                        if (!$result) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        if (mysqli_num_rows($result) > 0) {

                            echo "
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
                                                            <th scope='col'>System #</th>
                                                            <th scope='col'>Transaction #</th>
                                                            <th scope='col'>Total</th>
                                                            <th scope='col'>Date Received</th>
                                                            <th scope='col'>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $system = $row['post_trans_number'];
                                $id = $row['receipt_trans_number'];
                                $total = $row['total'];
                                $date = $row['date_received'];
                                echo "
                                                        <tr>
                                                            <td scope='col' class ='system'> " . $system . "</td>
                                                            <td scope='col' class ='id'> " . $id . "</td>
                                                            <td scope='col' class='total'> " . $total . "</td>
                                                            <td scope='col' class='date'> " . $date . "</td>
                                                            <td scope='col' class=''> " . "<a href='#' class='btn btn-info view_details'>🔍View Details</a>" . "</td>
                                                        </tr> ";
                            }
                            echo "</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                        }
                    }
                }
                ?>
            </div>

        </div>
    </div>
    <div class="modal fade custom-fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg custom-modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailsModalLabel">View Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="view_form">


                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
    <!-- Load the full jQuery build first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Then load Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="admin.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>


<script>
    $(document).ready(function() {
        //pang retain ng clickevent sa static parent ele
        $('body').on('click', '.view_details', function(e) {
            var selectedForm = $('#formSelector').val();
            e.preventDefault();
            var id = $(this).closest('tr').find('td.system').text();
            var trans = $(this).closest('tr').find('td.id').text();
            var total = $(this).closest('tr').find('td.total').text();
            var date_received = $(this).closest('tr').find('td.date').text();
            var received_by = $(this).closest('tr').find('td.received_by').text();

            // console.log(id);

            $.ajax({
                method: "POST",
                url: "../../actions/admin/admin_view_rdu_details.php",
                data: {
                    'click_view_details': true,
                    'id': id,
                    'trans': trans,
                    'total': total,
                    'date_received': date_received,
                    'received_by': received_by,
                },
                success: function(response) {


                    $('.view_form').html(response);
                    $('#viewDetailsModal').modal('show');
                }
            });
        });
    });
</script>