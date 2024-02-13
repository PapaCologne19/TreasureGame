<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

if (isset($_POST['back'])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--for Data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/top.css">
  <title>Top Players</title>
</head>

<body>
  <center>
    <div class="container">
      <div class="title">
        <h1 class="mt-5">TOP PLAYERS</h1>
      </div>
      <div class="button mb-4 mt-5" style="float: left;">
        <button type="button" class="btn btn-secondary float-start" onclick="location.href = 'index.php'">Back</button>
      </div>

      <div class="container table-responsive mt-5">
        <table class="table table-sm" id="example">
          <thead>
            <tr>
              <th>Player Name</th>
              <th>Score</th>
              <th>Date Played</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $queryx = "SELECT *
            FROM (
                SELECT *
                FROM data
                GROUP BY name
            ) AS unique_names
            ORDER BY score DESC
            LIMIT 10;
            ";
            $resultx = mysqli_query($link, $queryx);
            while ($rowx = mysqli_fetch_assoc($resultx)) {
              $date = $rowx['datenow'];
              $date_create = date_create($date);
              $date_format = date_format($date_create, 'F d, Y - h:i A');
              ?>
              <tr>
                <td>
                  <?php echo $rowx['name'] ?>
                </td>
                <td>
                  <?php echo $rowx['score'] ?>
                </td>
                <td>
                  <?php echo $date_format ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </center>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#example').DataTable(); // Corrected selector with #
    });
  </script>
</body>

</html>