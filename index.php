<?php
  session_start();

  $edit_location = 'http://ComputerName/exam_clock/edit_exams.php';
  $app_location = 'http://ComputerName/exam_clock/?location=hall';
  $login_location = 'http://ComputerName/exam_clock/login.php';
  $exam_location = "hall"; //exam_location is where the exam is taking place. eg. in the hall at 9:00am

  $subject = "";
  $paper = "";
  $start = "";
  $finish = "";

  //get the value of location (which room the display is in. hall or enterprise. Default hall)
  if(!isset($_GET['location'])) {
    header('location: login.php');
  } else {
    $location = $_GET['location'];
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/screens.css">
    <title>Document</title>
</head>
<body>
    <div class="title"><h1>Name of School</h1></div>
    <div class="main-page__centre-num centreNum"><h2>Centre Number: 12345</h2></div>
    <div class="main-page__three-dots">
      <a href="<?php echo $login_location ?>">Home</a>
    </div>
    <div class="col-1">
    <div class="clock">
        <div>
          <div class="info date"></div> 
          <div class="info day"></div>
        </div>
        <div class="dot"></div>
        <div>
          <div class="hour-hand"></div>
          <div class="minute-hand"></div>
          <div class="second-hand"></div>
        </div>
        <div>
          <span class="h3">3</span>
          <span class="h6">6</span>
          <span class="h9">9</span>
          <span class="h12">12</span>
        </div>
        <div class="diallines"></div>
      </div>
      
      <div id="clockdate">
        <div class="clockdate-wrapper">
          <div id="clock"></div>
          <div id="date"></div>
        </div>
      </div>
    </div>

    <div class="col-2">
      <?php 
        require 'connection.inc.php';

        if($location === "hall") {
          $result = $db->query("SELECT * FROM exam_clock where exam_location='hall' and visible='on'");
        } elseif ($location === "enterprise_centre"){
          $result = $db->query("SELECT * FROM exam_clock where exam_location='ent' and visible='on'");
        } elseif ($location === "custom1"){
          $result = $db->query("SELECT * FROM exam_clock where exam_location='custom1' and visible='on'");
        } elseif ($location === "custom2"){
          $result = $db->query("SELECT * FROM exam_clock where exam_location='custom2' and visible='on'");
        }
        
        if($location === 'hall') {
          $location_text = 'Main Hall';
        } else {
          $location_text = 'Enterprise Centre';
        }

        $count = 1;
        foreach ($result as $exam) {
          $loop_id = $exam['id'];
          $loop_subject = $exam['subject'];
          $loop_paper = $exam['paper'];
          $loop_start = $exam['start'];
          $loop_finish = $exam['finish'];
          $loop_exam_location = $exam['exam_location'];

          if($count <= 2) {
            printf('<div class="exam">');
            printf('<h2 class="exam--subject">Subject: &nbsp %s</h2>', htmlspecialchars($loop_subject, ENT_QUOTES));
            printf('<h2 class="exam--paper">Paper: &nbsp %s</h2>', htmlspecialchars($loop_paper, ENT_QUOTES));
            printf('<h2 class="exam--start">Start: &nbsp %s</h2>', htmlspecialchars($loop_start, ENT_QUOTES));
            printf('<h2 class="exam--finish">finish: &nbsp %s</h2>', htmlspecialchars($loop_finish, ENT_QUOTES));
            printf('</div>');
          }

          $count = $count + 1;
        }

        $db->close();
      ?>      
    </div>
</body>

<script src="./js/analog_clock.js"></script>
<script src="./js/digital_clock.js"></script>
<script src="./js/mainPage.js"></script>
<script src="./js/main.js"></script>
</html>