<?php
include '../../actions/session_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ham.php'; ?>
    <div class="height-100 bg-light">
        <h2>
            <left style="padding-left: 10px;">Reports</left>
        </h2>

        <center>
            <select name="form" id="formSelector" class="mb-5">
                <option value="order">Push Order</option>
                <option value="report">Item Report</option>
            </select>
        </center>
        <div id="main">
            <div id="formContent">
                <!-- The included form will be displayed here -->
            </div>
        </div>
    </div>

    <!-- Modal HTML -->
    <div class="modal fade" id="markAsReadModal" tabindex="-1" role="dialog" aria-labelledby="markAsReadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="markAsReadModalLabel">Mark as Read</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded here from the server -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </body>

    <!-- Load the full jQuery build first -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Then load Popper.js and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="admin.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var formSelector = document.getElementById('formSelector');
            var formContentDiv = document.getElementById('formContent');

            function loadForm() {
                var selectedForm = formSelector.value;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'admin_include_form.php?form=' + selectedForm, true);
                xhr.onload = function() {
                    if (this.status == 200) {
                        formContentDiv.innerHTML = this.responseText;
                        attachPaginationEvents();
                    } else {
                        formContentDiv.innerHTML = 'Error loading form.';
                    }
                };
                xhr.onerror = function() {
                    formContentDiv.innerHTML = 'Error loading form.';
                };
                xhr.send();
            }

            function loadPage(page) {
                var selectedForm = formSelector.value;
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'admin_include_form.php?form=' + selectedForm + '&page=' + page, true);
                xhr.onload = function() {
                    if (this.status == 200) {
                        document.querySelector('.orderTableContent').innerHTML = this.responseText;
                        attachPaginationEvents();
                    } else {
                        console.error('Error loading page.');
                    }
                };
                xhr.onerror = function() {
                    console.error('Error loading page.');
                };
                xhr.send();
            }

            function attachPaginationEvents() {
                var paginationLinks = document.querySelectorAll('.pagination .page-link');
                paginationLinks.forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        var page = this.getAttribute('data-page');
                        loadPage(page);
                    });
                });
            }

            formSelector.addEventListener('change', loadForm);
            loadForm(); // Initial load

            $('body').on('click', '.mark_as_read', function(e) {
                var selectedForm = $('#formSelector').val();
                e.preventDefault();
                var id = $(this).closest('tr').find('td.id').text();
                var url = selectedForm === 'order' ?
                    "../../actions/admin/admin_push_mark_as_read.php" :
                    "../../actions/admin/admin_reports_mark_as_read.php";

                $.ajax({
                    method: "POST",
                    url: url,
                    data: {
                        'click_mark_as_read': true,
                        'id': id,
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#markAsReadModal').modal('show');
                    }
                });
            });
        });
    </script>

</html>