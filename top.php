<!DOCTYPE html>


<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

if (isset($_POST['back'])) {





  // header("location:https://www.test.pcnpromopro.com/index.php");
  header("location:index.php");
}
?>





<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



  <!--for data table-->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
  <title>Top Players</title>
</head>

<body>

  <!--  Modal ===============================================================================-->



  <!--<div class="modal fade" id="myModal" role="dialog">//sm,med, lg , xl-->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"></button>
        <h4 class="modal-title">Top Players :<br> </h4>
      </div>
      <form action="" method="POST"><br>
        <div class="modal-body">

          <div class="form-group hover-shadow cursor " style="width:100%">
            <table id="tableto" class="table" style="width:100%">
              <thead>
                <tr>
                  <th>Player Name</th>
                  <th>Score</th>
                  <th>Date Played</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $queryx = "SELECT * FROM data order by score desc limit 10";
                $resultx = mysqli_query($link, $queryx);
                while ($rowx = mysqli_fetch_row($resultx)) {
                  echo ' <tr> ';
                  echo '  <td>  ' . $rowx[1] . '   </td> ';
                  echo '  <td> ' . $rowx[2] . '   </td> ';
                  echo '  <td> ' . $rowx[3] . '   </td> ';
                  echo ' </tr> ';
                }
                echo '
     </tbody>
        </table>';
                ?>
                </tr>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="back" value="Back" class="btn btn-info btn-lg"
            style="font-size:15;width: 100px;height: 50px" *>
        </div>
      </form>
    </div>
  </div>
  </div>
</body>

</html>
<script type="text/javascript">
  $(window).on('load', function () {
    $('#myModal').modal('show');
    document.getElementById("player").focus();
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('tableto').DataTable();
  });

  div.dataTables_wrapper {
    margin - bottom: 3em;
  }
</script>