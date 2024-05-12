<?php
include '../../database/config.php';
session_start();

//middleware
if (!isset($_SESSION['admin_name'])) {
   header('location:../index.php');
   exit();
}

if (isset($_POST['submit'])) {
   $startDate = $_POST['startDate'];
   $endDate = $_POST['endDate'];

   $total_query = "SELECT SUM(amount) as total_amount FROM transactions WHERE date_transacted BETWEEN '$startDate' AND '$endDate'";
   $total_result = mysqli_query($conn, $total_query);
   $total_row = mysqli_fetch_assoc($total_result);
   $sales = $total_row['total_amount'];

   $total_query = "SELECT SUM(total) as total_amount FROM deliver_received WHERE date_received BETWEEN '$startDate' AND '$endDate'";
   $total_result = mysqli_query($conn, $total_query);
   $total_row = mysqli_fetch_assoc($total_result);
   $capital = $total_row['total_amount'];

   $income =  $sales - $capital;
   $dataPoints = array(
      array("y" => $capital, "label" => "Received"),
      array("y" => $sales, "label" => "Sold"),
      array("y" => $income, "label" => "Income")
   );
} else {
   date_default_timezone_set('Asia/Manila');
   $today =  date("Y-m-d");
   $total_query = "SELECT SUM(amount) as total_amount FROM transactions WHERE date_transacted = '$today'";
   $total_result = mysqli_query($conn, $total_query);
   $total_row = mysqli_fetch_assoc($total_result);
   $sales = $total_row['total_amount'];
   if (empty($sales)) {
      $sales = 0;
   }

   $total_query = "SELECT SUM(total) as total_amount FROM deliver_received WHERE date_received = '$today'";
   $total_result = mysqli_query($conn, $total_query);
   $total_row = mysqli_fetch_assoc($total_result);
   $capital = $total_row['total_amount'];
   if (empty($capital)) {
      $capital = 0;
   }

   $income =  $sales - $capital;
   $dataPoints = array(
      array("y" => $capital, "label" => "Received"),
      array("y" => $sales, "label" => "Sold"),
      array("y" => $income, "label" => "Income")
   );
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "ham.php"; ?>
   <style>
      #dashboard,
      #main_card {
         border: 1px solid #4723D9;
      }

      #content {
         border: 2px solid black;
      }

      .top {
         height: 71vh;
      }

      .profit {
         background-image: url("../../img/profit.gif");
         background-repeat: no-repeat;
         background-size: 100% 100%;

         width: 100%;
      }
   </style>

   <!-- Container Main start -->
   <div class="height-100 bg-light">
      <div class="container-fluid px-4" id="dashboard">
         <div class="card" id="main_card">
            <div class="card-header"><b>
                  <h1>Dashboard</h1>
               </b></div>
            <div class="row">
               <div class="col-md-4 my-4">
                  <div class="card">
                     <div class="card-body top profit" id="content">
                        <p class="card-title text-start fs-3"><b>Profit</b></p>
                        <p class="card-text text-start fs-2">Your current profit
                           <?php
                           if (isset($_POST['submit'])) {
                              echo "from " . $startDate . " to " . $endDate . " is: <b> P" . number_format($income, 2) . "</b>";
                           } else {
                              echo "for Today is <b> P" . number_format($income, 2) . "</b>";
                           }
                           ?>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 my-4">
                  <div class="card">
                     <div class="card-body top" id="content">
                        <p class="card-title text-start fs-5"><b>Sales Report</b></p>
                        <p class="class-title text-center fs-3">
                           <?php
                           if (isset($_POST['submit'])) {
                              echo "The sales from " . $startDate . " to " . $endDate . ":";
                           } else {
                              echo "Today's Sales";
                           }
                           ?>
                        </p>
                        <form action="" method="post">
                           <label for="">From</label>
                           <input type="date" id="startDate" name="startDate" placeholder="Start Date (YYYY/MM/DD)" pattern="\d{4}/\d{2}/\d{2}" required>
                           <label for="">To</label>
                           <input type="date" id="endDate" name="endDate" placeholder="End Date (YYYY/MM/DD)" pattern="\d{4}/\d{2}/\d{2}" required max="<?php echo $today; ?>">
                           <input type="submit" name="submit" class="btn btn-primary"></input>
                        </form>
                        <div id="chartContainer" style="height: 45vh; width: 95%;"></div>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-md-4 my-4">
                  <div class="card">
                     <div class="card-body top" id="content">
                        <p class="card-title text-start fs-3"><b>Line Graph</b></p>
                        <div id="chartContainer3" style="height: 58vh; width: 100%;"></div>
                     </div>
                  </div>
               </div> -->
               <div class="col-md-8 mb-4">
                  <div class="card">
                     <div class="card-body bottom" id="content">
                        <p class="card-title text-start fs-3"><b>Recent Transactions</b></p>
                        <section class="intro">
                           <div class="gradient-custom-2 h-100">
                              <div class="mask d-flex align-items-center h-100">
                                 <div class="container">
                                    <div class="row justify-content-center">
                                       <div class="col-12">
                                          <div class="table-responsive">
                                             <table class="table table-light table-bordered mb-0" style="height:46.5vh; width: 100%;">
                                                <thead>
                                                   <t>
                                                      <th scope="col">Transaction #</th>
                                                      <th scope="col">Amount</th>
                                                      <th scope="col">Amount Tendered</th>
                                                      <th scope="col">Date Of Transaction</th>
                                                      <th scope="col">Time</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                   <?php
                                                   $query = "SELECT * FROM transactions ORDER BY id DESC LIMIT 5";
                                                   $result = mysqli_query($conn, $query);
                                                   while ($row = mysqli_fetch_assoc($result)) {
                                                   ?>
                                                      <tr>
                                                         <td><?php echo $row['id']; ?></td>
                                                         <td><?php echo $row['amount']; ?></td>
                                                         <td><?php echo $row['tender_amount']; ?></td>
                                                         <td><?php echo $row['date_transacted']; ?></td>
                                                         <td><?php echo $row['time_transacted']; ?></td>
                                                      </tr>
                                                   <?php
                                                   }
                                                   ?>
                                                </tbody>
                                                <!-- table body -->
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 mb-4">
                  <div class="card">
                     <div class="card-body bottom" id="content">
                        <p class="card-title text-start fs-3"><b>Pie graph</b></p>
                        <div id="chartContainer1" style="height: 46.5vh; width: 100%;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   </body>
   <!-- Load the full jQuery build first -->
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha254-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

   <!-- Then load Popper.js and Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ4hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF84dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjmdVgyd0p3pXB1rRibZUAYoIIy4OrQ4VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="admin.js"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+945DzO0rT7abK41JStQIAqVgRVzmbzo5mdXKp4YfRvH+8abtTE1Pi4jizo" crossorigin="anonymous"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ4hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF84dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjmdVgyd0p3pXB1rRibZUAYoIIy4OrQ4VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   <script>
      window.onload = function() {
         var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            title: {
               text: "Sales today"
            },
            subtitles: [{
               text: "<?php echo $today; ?>"
            }],
            data: [{
               type: "pie",
               showInLegend: "true",
               legendText: "{label}",
               indexLabelFontSize: 16,
               indexLabel: "{label} - #percent%",
               yValueFormatString: "฿#,##0",
               dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
         });
         chart1.render();

         var chart2 = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2",
            title: {
               text: "Sales"
            },
            axisY: {
               title: "Pesos"
            },
            data: [{
               type: "column",
               yValueFormatString: "#,##0.## Pesos",
               dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
         });
         chart2.render();
      }
   </script>

</html>