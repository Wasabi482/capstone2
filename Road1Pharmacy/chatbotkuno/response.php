<?php

require_once 'database.php';

// Function to handle user input and generate response
function handleInput($input)
{
    $input = strtolower($input);
    $tokens = explode(' ', $input);
    $sql = "SELECT * FROM training_words WHERE words IN ('" . implode("','", $tokens) . "')";
    $result = query($sql);
    if (mysqli_num_rows($result) > 0) {
        // Check if any tokens are found in the database
        $sql = "SELECT * FROM items WHERE what_for IN ('" . implode("','", $tokens) . "')";
        $result = query($sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $use_found = $row['what_for'];

            // Search for items with the same What_for
            $sql = "SELECT item_name FROM items WHERE `what_for` = '$use_found'";
            $result = query($sql);

            $for_warehouse = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $for_warehouse[] = $row['item_name'];
                }
                return $for_warehouse;
            } else {
                return "Currently, there is no alternative yet for the medicine you are looking for that is available in our pharmacy.";
            }
        } else {
            $sql = "SELECT * FROM training_items WHERE words IN ('" . implode("','", $tokens) . "')";
            $result = query($sql);
            if (mysqli_num_rows($result) > 1) {
                $result_values = "";
                while ($row = mysqli_fetch_assoc($result)) {
                    $result_values .= $row['words'] . " ";
                }
                $sql = "SELECT * FROM items WHERE `item_name` = '$result_values'";
                $result = query($sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $what_for = $row['what_for'];
                    $sql = "SELECT item_name FROM items WHERE what_for = '$what_for' AND item_name != '$result_values'";
                    $result = query($sql);
                    $for_warehouse = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $for_warehouse[] = $row['item_name'];
                    }
                    return $for_warehouse;
                } else {
                    return "The item " . $result_values . " is not found";
                }
            } elseif (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $token = $row["words"];
                return "Give more information about the " . $token;
            } else {
                return "Currently, there is no alternative yet for the medicine you are looking for that is available in our pharmacy.";
            }
        }
    } else {
        return "I don't understand that."; // add intructions for next step 
    }
}
// Function to check warehouse stock
function checkStock($items)
{
    $available_items = [];
    foreach ($items as $item) {
        $sql = "SELECT * FROM warehouse WHERE item_name = '$item' AND item_qty > 0";
        $result = query($sql);
        if (mysqli_num_rows($result) > 0) {
            $available_items[] = $item;
        }
    }
    return $available_items;
}
