<?php
include("connect.php");

date_default_timezone_set('Asia/Hong_Kong');
$datenow = date("m/d/Y h:i:s A");
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <!-- CSS styles -->
  <!-- <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/start.css"> -->
  <link rel="stylesheet" href="css/styles.css">

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Treasure Quest</title>
</head>

<body>
  <audio id="player" autoplay loop>
    <source src="sounds/tre.mp3" type="audio/mp3">
  </audio>


  <div class="container">
    <div class="row">
      <div class="col-md-12 image_logo_header">
        <div class="image_logo">
          <img src="images/logo1.png" alt="" id="game_title"/>
        </div>
      </div>
      <div class="col-md-12">
        <div class="image">
          <img src="images/hangman/0.png" id="hangman" >
        </div>
        <div id="lives-left-div" class="live-left">
          Treasures left: <span id="lives-left">
           <?= $_SESSION['lives'] ?> 
          </span>
        </div>

      </div>

      <div class="col-md-12">
        <div class="guessed-word-div" id="guessed-word-div">
          <?= $blankWord ?>
        </div>
      </div>

      <div class="col-md-12">
          <span id="hint"><?= $_SESSION['hint']?></span>
      </div>

      <div class="col-md-12">
        <div class="letters" id="letters">
          <div class="choose_title title">
            <h3> Choose a letter</h3>
          </div>
          <div class="choose_letters">
            <?php
            foreach (range('A', 'Z') as $char) {

              echo '<span class="letter button">' . $char . '</span>    ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div id="play-again-div" class="display-none word1 many1 centerme">
      <div class="">
        <!-- <div id="the-word-was-div" class=""></div> -->
      </div>
      <div class="title">
  <br>
        <h2>THANK YOU FOR PLAYING!</h2>
      </div>
      <h3>
        <label>The word was:</label><br>
        <?php echo '<b>' .$_SESSION['word'] . '</b>'; 
 
        
        
        ?>
<br>
          Score: <span id="lives-left1">
      
          </span>
    

      </h3>

      <center>
        <form action="" method="POST">
          <input type="submit" name="end" value="Okay" class="btn btn-primary">
          </form>
      </center>
    </div>

  </div>

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>