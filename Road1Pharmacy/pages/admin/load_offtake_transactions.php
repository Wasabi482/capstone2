<?php
include '../../database/config.php';

$transact_by = $_POST['transact_by'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$limit = 7; // Number of items per page
$offset = ($page - 1) * $limit;

$whereClause = ($transact_by === 'all') ? "" : "WHERE transact_by='$transact_by'";

// Get total number of items
$total_items_query = "SELECT COUNT(*) as count FROM transactions $whereClause";
$total_items_result = mysqli_query($conn, $total_items_query);
$total_items_row = mysqli_fetch_assoc($total_items_result);
$total_items = $total_items_row['count'];

// Calculate total number of pages
$total_pages = ceil($total_items / $limit);

$total_query = "SELECT SUM(amount) as total_amount FROM transactions $whereClause";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total_amount'];
$ftotal = number_format($total, 2, '.', '');

// Adjust the cash and gcash queries
$cash_query = "SELECT SUM(amount) as cash_amount FROM transactions ";
$gcash_query = "SELECT SUM(amount) as gcash_amount FROM transactions ";
if ($transact_by === 'all') {
    $cash_query .= "WHERE payment_mode = 'Cash'";
    $gcash_query .= "WHERE payment_mode = 'Gcash'";
} else {
    $cash_query .= "WHERE payment_mode = 'Cash' AND transact_by = '$transact_by'";
    $gcash_query .= "WHERE payment_mode = 'Gcash' AND transact_by = '$transact_by'";
}

$cash_result = mysqli_query($conn, $cash_query);
$cash_row = mysqli_fetch_assoc($cash_result);
$cash = $cash_row['cash_amount'];
$fcash = number_format($cash, 2, '.', '');

$gcash_result = mysqli_query($conn, $gcash_query);
$gcash_row = mysqli_fetch_assoc($gcash_result);
$gcash = $gcash_row['gcash_amount'];
$fgcash = number_format($gcash, 2, '.', '');

echo "<h2>Total ₱: $ftotal &nbsp&nbsp&nbspCash ₱: $fcash &nbsp&nbsp&nbspGcash ₱: $fgcash</h2>";

$transaction_query = "SELECT * FROM transactions $whereClause ORDER BY id DESC LIMIT $offset, $limit";
$transaction_result = mysqli_query($conn, $transaction_query);
if (!$transaction_result) {
    die('Error: ' . mysqli_error($conn));
}

if (mysqli_num_rows($transaction_result) > 0) {
    echo "<section class='intro'>
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
                                                <th scope='col'>Transacted By</th>
                                                <th scope='col'>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
    while ($row = mysqli_fetch_assoc($transaction_result)) {
        $id = $row['id'];
        $amount = $row['amount'];
        $tender_amount = $row['tender_amount'];
        $date = $row['date_transacted'];
        $time = $row['time_transacted'];
        $payment_mode = $row['payment_mode'];
        $transact_by = $row['transact_by'];
        echo "<tr>
                <td scope='col' class='id'>$id</td>
                <td scope='col' class='amount'>$amount</td>
                <td scope='col' class='amount_tendered'>$tender_amount</td>
                <td scope='col' class='date'>$date</td>
                <td scope='col' class='time'>$time</td>
                <td scope='col' class='payment_mode'>$payment_mode</td>
                <td scope='col' class='transact_by'>$transact_by</td>
                <td scope='col'><a href='#' class='btn btn-info view_details'>🔍View Details</a></td>
              </tr>";
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

    // Pagination
    echo "<div class='row justify-content-center mt-4'>
            <nav aria-label='Page navigation example'>
                <ul class='pagination'>";
    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' href='#' data-page='" . ($page - 1) . "'>Previous</a></li>";
    }

    $startPage = max(1, $page - 1);
    $endPage = min($startPage + 2, $total_pages);

    for ($i = $startPage; $i <= $endPage; $i++) {
        echo "<li class='page-item " . ($page == $i ? 'active' : '') . "'><a class='page-link' href='#' data-page='$i'>$i</a></li>";
    }

    if ($page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='#' data-page='" . ($page + 1) . "'>Next</a></li>";
    }

    echo "</ul>
            </nav>
          </div>";
} else {
    echo "<p>No transactions found.</p>";
}
