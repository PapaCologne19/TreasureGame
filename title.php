<?php
include("connect.php");
date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");

if (isset($_POST['top10'])) {
  header("location:top.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 20px;
      padding: 15px 15px 15px 15px;
      width: 200px;
      transition: all 0.5s;
      cursor: pointer;
      margin: 5px;
    }

    .button span {
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    .button span:after {
      content: '>';
      position: absolute;
      opacity: 0;
      top: 0;
      right: -20px;
      transition: 0.5s;
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .button:hover span {
      padding-right: 25px;
    }

    .button:hover span:after {
      opacity: 1;
      right: 0;

    }

    .w2 {
      position: absolute;
      top: 8%;
      left: 30%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    .treasures {
      position: absolute;
      top: 5%;
      left: 50%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    .lives {
      position: absolute;
      top: 30%;
      left: 66%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    .word {
      position: absolute;
      top: 50%;
      left: 53%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    .word1 {
      position: absolute;
      top: 500px;
      left: 30%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    .word1a {
      position: absolute;
      top: 45%;
      left: 30%;
      border: 0px solid tomato;
      border-radius: 2%;
    }

    body {

      background-image: url(bg.jpg);

      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
      background-size: 99% 99%;

    }

    .modal-content {
      background: url('red.png');
    }


    input[type=button],
    input[type=submit],
    input[type=reset] {
      background-color: #392613;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      width: 200px;
      border-radius: 10px;
    }

    input:hover[type="submit"] {
      font-weight: 900;

      background: #996633;
    }

    .select-user{
      height:45px;
      width:50%;
      background: #BABABA;
      border-radius: 15px;
      padding: 1rem;
    }

    .select-user:focus{
      border: none;
      outline: none;
    }
  </style>

  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Treasure Quest</title>
</head>

<body style="background-image: url(bg.jpg); background-size: 100% 105% ; background-repeat: no-repeat;">
  <audio id="player" autoplay loop>
    <source src="sounds/tre1.mp3" type="audio/mp3">
  </audio>

  <div id="hangman-div">
    <form action="controller.php" method="POST">
      <input type="hidden" name="action" value="1" />
      <br><br><br><br><br><br><br>
      <img src="images/logo1.png" id="logo" />

      <div class="center">
        <div id="levels-div">
          <span id="level">
            <input type="radio" name="level" checked="checked" id="level_0" value="0">
            <!--<label for="level_0">Easy game: you are allowed 10 misses.</label><br>-->
            <input type="radio" name="level" id="level_1" value="1">
            <!--<label for="level_1">Medium game: you are allowed 5 misses.</label><br>-->
            <input type="radio" name="level" id="level_2" value="2">
            <!--<label for="level_2">Hard game: you are allowed 3 misses.</label>-->
          </span>
        </div>

        <div class="form-group">
          <h1>
            <label style="color:Black;height:45px;width:60%;font-size:35"> Select Player: </label>
          </h1>
          <select class="form-group select-user" name="user" data-placeholder=""
            onchange="blur_key()"> ';
            <?php
            echo '<option></option> ';
            $querypro = "SELECT * FROM book1 where played != '1' order by user ASC ";
            $resultpro = mysqli_query($link, $querypro);
            while ($rowpro = mysqli_fetch_array($resultpro)) {
              echo '<option  value="' . $rowpro[0] . '">' . $rowpro[9] . ' </option>';
            }
            ?>
          </select>
        </div>
        <div>
          <input type="submit" name="play" value="Play!!!" id="submit-button" /> <br><br>
        </div>
      </div>
    </form>
    <form action="" method="POST">
      <input type="submit" name="top10" id="top10" value="View Top 10" class="btn btn-info btn-lg"
        style="font-size:15;width:200px;height:50px">
    </form>
  </div>
</body>

</html>

<script type="text/javascript">
  document.getElementById("submit-button").disabled = true;
  document.getElementById("level_0").style.display = "none";
  document.getElementById("level_1").style.display = "none";
  document.getElementById("level_2").style.display = "none";

  //on keyup
  function blur_key() {
    document.getElementById("submit-button").disabled = false;
  }
</script>