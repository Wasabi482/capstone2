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
            <center>View Offtake Transactions</center>
        </h2>


        <!-- Push Order Form -->
        <center>
            <form action="" method="post">
                <select name="transact_by" id="transact_by selectForm" class="mb-2 form-select my-select" style="width:30%;">
                    <option value='all'>All</option>
                    <?php
                    $data = "SELECT username FROM accounts WHERE role_as = '2'";
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transact_by'])) {
                    $transact_by = $_POST['transact_by'];
                    if ($transact_by == 'all') {
                        $total_query = "SELECT SUM(amount) as total_amount FROM transactions";
                        $total_result = mysqli_query($conn, $total_query);
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total = $total_row['total_amount'];


                        $cash_query = "SELECT SUM(amount) as cash_amount FROM transactions WHERE payment_mode = 'Cash'";
                        $cash_result = mysqli_query($conn, $cash_query);
                        $cash_row = mysqli_fetch_assoc($cash_result);
                        $cash = $cash_row['cash_amount'];


                        $gcash_query = "SELECT SUM(amount) as gcash_amount FROM transactions WHERE payment_mode = 'Gcash'";
                        $gcash_result = mysqli_query($conn, $gcash_query);
                        $gcash_row = mysqli_fetch_assoc($gcash_result);
                        $gcash = $gcash_row['gcash_amount'];

                        echo "<h2>Total ₱: $total</h2> &nbsp&nbsp&nbsp<h3>Cash ₱: $cash</h3> &nbsp&nbsp&nbsp<h3>Gcash ₱: $gcash</h3>";

                        $transaction = "SELECT * FROM transactions";
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
                                                            <th scope='col'>Transaction #</th>
                                                            <th scope='col'>Amount</th>
                                                            <th scope='col'>Amount Tendered</th>
                                                            <th scope='col'>Date Of Transaction</th>
                                                            <th scope='col'>Time</th>
                                                            <th scope='col'>Payment Mode</th>
                                                            <th scope='col'>Trasacted By</th>
                                                            <th scope='col'>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $amount = $row['amount'];
                                $tender_amount  = $row['tender_amount'];
                                $date = $row['date_transacted'];
                                $time = $row['time_transacted'];
                                $payment_mode = $row['payment_mode'];
                                $transact_by = $row['transact_by'];
                                echo "
                                                        <tr>
                                                            <td scope='col' class ='id'> " . $id . "</td>
                                                            <td scope='col' class='amount'> " . $amount . "</td>
                                                            <td scope='col' class='amount_tendered'> " . $tender_amount . "</td>
                                                            <td scope='col' class='date'> " . $date . "</td>
                                                            <td scope='col' class='time'> " . $time . "</td>
                                                            <td scope='col' class='payment_mode'> " . $payment_mode . "</td>
                                                            <td scope='col' class='transact_by'> " . $transact_by . "</td>
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
                        $username = explode(" ", $transact_by);
                        $target =  $username[1];
                        $total_query = "SELECT SUM(amount) as total_amount FROM transactions WHERE transact_by = '$target'";
                        $total_result = mysqli_query($conn, $total_query);
                        $total_row = mysqli_fetch_assoc($total_result);
                        $total = $total_row['total_amount'];


                        $cash_query = "SELECT SUM(amount) as cash_amount FROM transactions WHERE payment_mode = 'Cash' AND transact_by = '$target'";
                        $cash_result = mysqli_query($conn, $cash_query);
                        $cash_row = mysqli_fetch_assoc($cash_result);
                        $cash = $cash_row['cash_amount'];


                        $gcash_query = "SELECT SUM(amount) as gcash_amount FROM transactions WHERE payment_mode = 'Gcash' AND transact_by = '$target'";
                        $gcash_result = mysqli_query($conn, $gcash_query);
                        $gcash_row = mysqli_fetch_assoc($gcash_result);
                        $gcash = $gcash_row['gcash_amount'];

                        echo "<h3>Transactions of:</h3>" . "<h2 class ='target'><b>" . $target . "</b></h2>";
                        echo "<h2>Total ₱: $total</h2>";
                        echo "<h3>Cash ₱: $cash</h3>";
                        echo "<h3>Gcash ₱: $gcash</h3>";

                        $transaction = "SELECT * FROM transactions WHERE transact_by = '$target'";
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
                                                            <th scope='col'>Transaction #</th>
                                                            <th scope='col'>Amount</th>
                                                            <th scope='col'>Amount Tendered</th>
                                                            <th scope='col'>Date Of Transaction</th>
                                                            <th scope='col'>Time</th>
                                                            <th scope='col'>Payment Mode</th>
                                                            <th scope='col'>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $amount = $row['amount'];
                                $tender_amount  = $row['tender_amount'];
                                $date = $row['date_transacted'];
                                $time = $row['time_transacted'];
                                $payment_mode = $row['payment_mode'];
                                echo "
                                                        <tr>
                                                            <td scope='col' class ='id'> " . $id . "</td>
                                                            <td scope='col' class='amount'> " . $amount . "</td>
                                                            <td scope='col' class='amount_tendered'> " . $tender_amount . "</td>
                                                            <td scope='col' class='date'> " . $date . "</td>
                                                            <td scope='col' class='time'> " . $row['time_transacted'] . "</td>
                                                            <td scope='col' class='payment_mode'> " . $payment_mode . "</td>
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
            var id = $(this).closest('tr').find('td.id').text();
            var amount = $(this).closest('tr').find('td.amount').text();
            var amount_tendered = $(this).closest('tr').find('td.amount_tendered').text();
            var date_transacted = $(this).closest('tr').find('td.date').text();
            var time_transacted = $(this).closest('tr').find('td.time').text();
            var payment_mode = $(this).closest('tr').find('td.payment_mode').text();
            var transact_by = $(this).closest('tr').find('td.transact_by').text();

            // console.log(id);

            $.ajax({
                method: "POST",
                url: "../../actions/admin/admin_view_transactions_details.php",
                data: {
                    'click_view_details': true,
                    'id': id,
                    'amount': amount,
                    'amount_tendered': amount_tendered,
                    'date_transacted': date_transacted,
                    'time_transacted': time_transacted,
                    'payment_mode': payment_mode,
                    'transact_by': transact_by,
                },
                success: function(response) {


                    $('.view_form').html(response);
                    $('#viewDetailsModal').modal('show');
                }
            });
        });
    });
</script>