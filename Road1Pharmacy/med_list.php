<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
            }

            table thead {
                display: none;
            }

            table tr {
                margin-bottom: 10px;
                display: block;
                border-bottom: 2px solid #ddd;
            }

            table td {
                display: block;
                text-align: right;
                font-size: 13px;
                border-bottom: 1px dotted #ccc;
            }

            table td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }
        }
       
    </style>
</head>

<body id="medlist">
    <p class="text-center fs-1">Medicine Lists</p>
    <?php
    include 'database/config.php';

    // Get the total number of rows
    $countSql = "SELECT COUNT(*) as total FROM items WHERE classification = 'medicine'";
    $countResult = mysqli_query($conn, $countSql);
    $countRow = mysqli_fetch_assoc($countResult);
    $totalRows = $countRow['total'];

    // Calculate the total number of pages
    $limit = 7; // Number of rows per page
    $totalPages = ceil($totalRows / $limit);

    // Get the current page number
    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    // Calculate the offset for the SQL query
    $offset = ($currentPage - 1) * $limit;

    // Fetch the rows for the current page
    $sql = "SELECT code, item_name, type FROM items WHERE classification = 'medicine' ORDER BY item_name ASC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Code</th>";
        echo "<th>Item Name</th>";
        echo "<th>Type</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            $code = $row['code'];
            $item_name = $row['item_name'];
            $type = $row['type'];
            echo "<tr>";
            echo "<td data-label='Code'>" . $code . "</td>";
            echo "<td data-label='Item Name'>" . $item_name . "</td>";
            echo "<td data-label='Type'>" . $type . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Pagination buttons
        echo "<div class='row justify-content-center mt-4'>";
        echo "<nav aria-label='Page navigation example'>";
        echo "<ul class='pagination'>";
        if ($currentPage > 1) {
            echo "<li class='page-item'><a class='page-link' href='#' data-page='" . ($currentPage - 1) . "'>Previous</a></li>";
        }

        $startPage = max(1, $currentPage - 1);
        $endPage = min($startPage + 2, $totalPages);

        for ($i = $startPage; $i <= $endPage; $i++) {
            echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='#' data-page='$i'>$i</a></li>";
        }

        if ($currentPage < $totalPages) {
            echo "<li class='page-item'><a class='page-link' href='#' data-page='" . ($currentPage + 1) . "'>Next</a></li>";
        }

        echo "</ul>";
        echo "</nav>";
        echo "</div>";
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>