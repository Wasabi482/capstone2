<?php
// pdo connection
$pdo = new PDO(
    "mysql:host=localhost;dbname=capstone;charset=utf8mb4",
    "root",
    ""
);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ham.php'; ?>
    <div class="height-100 bg-light">
        <h2>
            <left style="padding-left: 10px;">Reports</left>
        </h2>


        <!-- Push Order Form -->
        <center><select name="form" id="formSelector" class=" mb-5">
                <option value="order">Push Order</option>
                <option value="report">Item Report</option>
            </select></center>
        <div id="main">
            <div id="formContent">
                <!-- The included form will be displayed here -->

            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var formSelector = document.getElementById('formSelector');
                    var formContentDiv = document.getElementById('formContent');

                    // Clear the current content
                    formContentDiv.innerHTML = '';

                    // Function to handle the change event
                    function handleFormChange() {
                        var selectedForm = formSelector.value;

                        // Use AJAX to request the server to include the appropriate form
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'admin_include_form.php?form=' + selectedForm, true); // Correct path to include_form.php
                        xhr.onload = function() {
                            if (this.status == 200) {
                                formContentDiv.innerHTML = this.responseText;
                            } else {
                                formContentDiv.innerHTML = 'Error loading form.';
                            }
                        };
                        xhr.onerror = function() {
                            formContentDiv.innerHTML = 'Error loading form.';
                        };
                        xhr.send();
                    }

                    // Trigger the initial form change
                    handleFormChange();

                    // Listen for the change event on the form selector
                    formSelector.addEventListener('change', handleFormChange);
                });
            </script>
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

</html>



<script>
    $(document).ready(function() {
        //pang retain ng clickevent sa static parent ele
        $('body').on('click', '.mark_as_read', function(e) {
            var selectedForm = $('#formSelector').val();
            if (selectedForm === 'order') {
                e.preventDefault();
                var id = $(this).closest('tr').find('td.id').text();

                // console.log(id);

                $.ajax({
                    method: "POST",
                    url: "../../actions/admin/admin_push_mark_as_read.php",
                    data: {
                        'click_mark_as_read': true,
                        'id': id,
                    },
                    success: function(response) {


                        $('.edit_form').html(response);
                        $('#markAsReadModal').modal('show');
                    }
                });
            }
            if (selectedForm === 'report') {
                e.preventDefault();
                var id = $(this).closest('tr').find('td.id').text();

                // console.log(id);

                $.ajax({
                    method: "POST",
                    url: "../../actions/admin/admin_reports_mark_as_read.php",
                    data: {
                        'click_mark_as_read': true,
                        'id': id,
                    },
                    success: function(response) {


                        $('.edit_form').html(response);
                        $('#markAsReadModal').modal('show');
                    }
                });
            }
        });
    });
</script>