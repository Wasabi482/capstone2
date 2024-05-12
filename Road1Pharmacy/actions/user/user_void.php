<?php


if (isset($_POST['remove_button'])) {
    if (isset($_POST['remove_btn'])) {
    $remove_key = $_POST['remove_key'];
    if (isset($_SESSION['cart'][$remove_key])) {
        $total -= $_SESSION['cart'][$remove_key]['cost'];
        unset($_SESSION['cart'][$remove_key]);
        header('location:../../pages/user/user_frontend.php');
        echo"galing action";
        exit();

        //     if (isset($_POST['remove'])) {
//     $remove_key = $_POST['remove_key'];
//     if (isset($_SESSION['cart'][$remove_key])) {
//         $total -= $_SESSION['cart'][$remove_key]['cost'];
//         unset($_SESSION['cart'][$remove_key]);
//         header('location:' . htmlspecialchars($_SERVER['PHP_SELF']));
//             exit();
//     }
// }
    }
}
}else{
    echo"??";
}

    



?>