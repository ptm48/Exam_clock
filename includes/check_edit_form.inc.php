<?php 
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

    if(!isset($_GET['visible']) || $_GET['visible'] === "") {
        $ok = false;
    } else {
        $visible = $_GET['visible'];
    };

    if(!isset($_GET['exam_location']) || $_GET['exam_location'] === "") {
        $ok = false;
    } else {
        $exam_location = $_GET['exam_location'];
    };
?>