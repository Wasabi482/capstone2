<?php
// Ensure the session is started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Interface</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles */
    </style>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-4">Point of Sale (POS) System</h1>

        <!-- Product Selection -->
        <div class="row mb-3">
            <div class="col-12">
                <h3>Product Selection</h3>
                <!-- Product list or a way to search and add products -->
                <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include '../../database/config.php';

$data= "SELECT * FROM warehouse";
$result = mysqli_query($conn, $data);
echo"<center>
<form method='GET' action='user_search_item.php'>

    <input type='text' name='search'>
    <input type='submit' name='submit' value='search item'>
</form>
</center>
<hr />";

echo"  <div class='container'>
            <div class='row'>";
            ?>
            </div>
        </div>

        <!-- Cart -->
        <div class="row mb-3">
            <div class="col-12">
                <h3>Cart</h3>
                
        <!-- Checkout -->
        <div class="row mb-3">
            <div class="col-12">
                <h3>Checkout</h3>
                <!-- Checkout form with total amount, payment method, etc. -->
                <!-- ... -->
            </div>
        </div>

        <!-- POS Actions -->
        <div class="row">
            <div class="col-12">
                <h3>Actions</h3>
                <!-- Buttons or links for different POS actions -->
                <button class="btn btn-primary">Print Receipt</button>
                <button class="btn btn-secondary">New Sale</button>
                <!-- ... -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Custom JavaScript for POS functionality
        // Handle adding products to cart, calculating totals, etc.
    </script>
</body>
</html>