<?php
include '../../database/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ham.php'; ?>
</head>

<body>
    <div class="height-100 bg-light">
        <h2>
            <center>View Delivery Transactions</center>
        </h2>

        <!-- Filter Dropdown -->
        <center>
            <select id="received_by" class="mb-2 form-select my-select" style="width:30%;">
                <option value='all'>All</option>
                <?php
                $data = "SELECT username FROM accounts WHERE role_as = '3'";
                $result = mysqli_query($conn, $data);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $username = $row['username'];
                        echo "<option value='$username'>$username</option>";
                    }
                } else {
                    echo "<option value=''>No data found!</option>";
                }
                ?>
            </select>
        </center>

        <div id="main">
            <div id="formContent">
                <!-- Content will be loaded here via AJAX -->
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Details -->
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
                    <div class="view_form"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load the full jQuery build first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Then load Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function() {
            function loadTransactions(received_by, page) {
                $.ajax({
                    url: 'load_transactions.php',
                    type: 'POST',
                    data: {
                        received_by: received_by,
                        page: page
                    },
                    success: function(data) {
                        $('#formContent').html(data);
                    }
                });
            }

            $('#received_by').change(function() {
                var received_by = $(this).val();
                loadTransactions(received_by, 1);
            });

            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var received_by = $('#received_by').val();
                var page = $(this).attr('data-page');
                loadTransactions(received_by, page);
            });

            // Initial load
            loadTransactions('all', 1);

            // View Details
            $('body').on('click', '.view_details', function(e) {
                e.preventDefault();
                var id = $(this).closest('tr').find('td.system').text();
                var trans = $(this).closest('tr').find('td.id').text();
                var total = $(this).closest('tr').find('td.total').text();
                var date_received = $(this).closest('tr').find('td.date').text();
                var received_by = $(this).closest('tr').find('td.received_by').text();

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
</body>

</html>