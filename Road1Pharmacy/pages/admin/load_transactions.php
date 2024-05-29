<?php
include '../../database/config.php';

$received_by = $_POST['received_by'];
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$limit = 7; // Number of items per page
$offset = ($page - 1) * $limit;

$whereClause = ($received_by === 'all') ? "" : "WHERE received_by='$received_by'";

// Get total number of items
$total_items = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM deliver_received $whereClause"));

// Calculate total number of pages
$total_pages = ceil($total_items / $limit);

$total_query = "SELECT SUM(total) as total_amount FROM deliver_received $whereClause";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row['total_amount'];
$ftotal = number_format($total, 2, '.', '');

echo "<h2>Total ₱: $ftotal</h2>";

$transaction = "SELECT * FROM deliver_received $whereClause ORDER BY post_trans_number DESC LIMIT $offset, $limit";
$result = mysqli_query($conn, $transaction);
if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {

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
                                                <th scope='col'>System #</th>
                                                <th scope='col'>Transaction #</th>
                                                <th scope='col'>Total</th>
                                                <th scope='col'>Date Received</th>
                                                <th scope='col'>Received By</th>
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
        echo "<tr>
                <td scope='col' class='system'>$system</td>
                <td scope='col' class='id'>$id</td>
                <td scope='col' class='total'>$total</td>
                <td scope='col' class='date'>$date</td>
                <td scope='col' class='received_by'>$received_by</td>
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
