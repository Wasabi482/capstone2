<?php

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

echo "<h2>Total ₱: $total</h2>";
echo "<h3>Cash ₱: $cash</h3>";
echo "<h3>Gcash ₱: $gcash</h3>";
?>
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
                                                            <th scope='col'>Payment Mode</th>
                                                            <th scope='col'>Trasacted By</th>
                                                            <th scope='col'>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $trans = "SELECT * FROM transactions";
                                                        $result = mysqli_query($conn, $trans);
                                                        
                                                        if (!$result) {
                                                            die('Error in query: '. mysqli_error($conn));
                                                        }
                                                        if(mysqli_num_rows( $result ) > 0){
                                                            while($row = mysqli_fetch_assoc($result)){
                                                        echo"    
                                                        <tr>
                                                            <td scope='col' class ='id'> ".$row['id']."</td>
                                                            <td scope='col' class='amount'> ".$row['amount']."</td>
                                                            <td scope='col' class='amount_tendered'> ".$row['tender_amount']."</td>
                                                            <td scope='col' class='date'> ".$row['date_transacted']."</td>
                                                            <td scope='col' class='payment_mode'> ".$row['payment_mode']."</td>
                                                            <td scope='col' class='transact_by'> ".$row['transact_by']."</td>
                                                            <td scope='col' class=''> "."<a href='#' class='btn btn-info view_details'>View Details</a>"."</td>
                                                        </tr>";
                                                    
                     }
                                                        }                        
                     ?>
                     
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
<div class="modal fade custom-fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg custom-modal-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewDetailsModalLabel">View Details</h5>
      </div>
      <div class="modal-body">
        <div class="view_form">


        </div>
      </div>
    </div>
  </div>
</div>