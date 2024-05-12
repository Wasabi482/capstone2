<?php
include '../../database/config.php';


// Check if the 'form' GET parameter is set
if (isset($_GET['form'])) {
    $form = $_GET['form'];

    // Include the appropriate form based on the selection
    if ($form == 'order') {
        include 'admin_view_push.php'; // Path to your Push Order form file
    } elseif ($form == 'report') {
        include 'admin_view_reports.php'; // Path to your Report Item form file
    }elseif ($form == 'today') {
        include 'admin_today_sales.php'; // Path to your Report Item form file
    }elseif ($form == 'last_month') {
        include 'admin_last_month_sales.php'; // Path to your Report Item form file
    }elseif ($form == 'last_year') {
        include 'admin_last_year_sales.php'; // Path to your Report Item form file
    }elseif ($form == 'overall') {
        include 'admin_overall_sales.php'; // Path to your Report Item form file
    }
}
?>