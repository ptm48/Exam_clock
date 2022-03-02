<?php
    session_start();
    
    require 'includes/auth.inc.php';

    $edit_location = 'http://ComputerName/exam_clock/edit_exams.php';
    $app_location = 'http://ComputerName/exam_clock';
    $id = "1";
    $subject = "";
    $paper = "";
    $start = "";
    $finish = "";
    $visible = "";
    $exam_location = "";
    $edit_exam_url = "http://ComputerName/exam_clock/edit_exams.php";

    $ok = true;

    if(!isset($_GET['subject']) || $_GET['subject'] === "") {
        $ok = false;
    } else {
        $subject = $_GET['subject'];
    };

    if(!isset($_GET['paper']) || $_GET['paper'] === "") {
        $ok = false;
    } else {
        $paper = $_GET['paper'];
    };

    if(!isset($_GET['start']) || $_GET['start'] === "") {
        $ok = false;
    } else {
        $start = $_GET['start'];
    };

    if(!isset($_GET['finish']) || $_GET['finish'] === "") {
        $ok = false;
    } else {
        $finish = $_GET['finish'];
    };

    if(!isset($_GET['visible'])) {
        $visible = 'off';
    } else {
        $visible = 'on';
    };
    
    if(!isset($_GET['exam_location']) || $_GET['exam_location'] === "") {
        $ok = false;
    } else {
        $exam_location = $_GET['exam_location'];
    };

    if(!isset($_GET['id']) || $_GET['id'] === '') {
        $ok = false;
    } else {
        $id = $_GET['id'];
    }

    require 'connection.inc.php';

    $sql = sprintf("UPDATE exam_clock SET subject='%s', paper='%s', start='%s', finish='%s', visible='%s', exam_location='%s'
    WHERE id=%s",
    $db->real_escape_string($subject),
    $db->real_escape_string($paper),
    $db->real_escape_string($start),
    $db->real_escape_string($finish),
    $db->real_escape_string($visible),
    $db->real_escape_string($exam_location),
    $db->real_escape_string($id)
    );

    $db->query($sql);
    echo $exam_location;
    $db->close();

    header("Location: http://ComputerName/exam_clock/edit_exams.php");
?>
