<?php
    session_start();
    if(!isset($_SESSION['username']) || ($_SESSION['can_edit'] != 1)) {
        header('location: login.php');
    }

    $edit_location = 'http://ComputerName/exam_clock/edit_exams.php';
    $app_location = 'http://ComputerName/exam_clock';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit_exam.css">
    <link rel="stylesheet" href="css/screens.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Name of school</a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $app_location ?>?location=hall">Main Hall</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $app_location ?>?location=enterprise_centre">Enterprise Centre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $app_location ?>?location=custom1">Custom1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $app_location ?>?location=custom2">Custom2</a>
        </li>
        </ul>
    </div>
    </nav>

    <div class="table_container">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="hidden">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Paper</th>
                <th scope="col">Start</th>
                <th scope="col">Finish</th>
                <th scope="col">Exam Location</th>
                <th scope="col">Visibility</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require 'includes/connection.inc.php';

                $sql = "SELECT * FROM exam_clock";

                $exams = $db->query($sql);

                // start of for loop to create the table of exams for editing
                foreach($exams as $exam)
                {
            ?>

            <tr>
                <form action="http://ComputerName/exam_clock/update_exam.php" method="GET">
                    <th scope="row" class="hidden"><input type="text" name="id" value=<?php echo $exam['id'] ?> readonly></th>
                    <td><input type="text" name="subject" value="<?php echo $exam['subject'] ?>"></td>
                    <td><input type="text" name="paper" value="<?php echo $exam['paper'] ?>"></td>
                    <td><input type="text" name="start" value="<?php echo $exam['start'] ?>"></td>
                    <td><input type="text" name="finish" value="<?php echo $exam['finish'] ?>"></td>

                    <td>
                    <select class="form-select" name="exam_location">
                        <option value="hall" <?php if($exam['exam_location'] === 'hall') { echo ' selected';} ?>>Main Hall</option>
                        <option value="ent" <?php if($exam['exam_location'] === 'ent') { echo ' selected';} ?>>Enterprise Centre</option>
                        <option value="custom1" <?php if($exam['exam_location'] === 'custom1') { echo ' selected';} ?>>Custom1</option>
                        <option value="custom2" <?php if($exam['exam_location'] === 'custom2') { echo ' selected';} ?>>Custom2</option>
                    </select>
                    </td>

                    <td>
                        <input type="checkbox" name="visible" <?php if($exam['visible'] === 'on') { echo ' checked';} ?>>
                    </td>
                    <td>
                        <button type="submit" value="Update" class="btn btn-light">Update</button>
                    </td>
                </form>
            </tr>

            <?php
                } 
            ?> 
            <!-- closing the exam for loop -->
            
        </tbody>
        </table>
        <!-- <button name="hall_btn" class="btn btn-outline-secondary btn-secondary btn-lg"> Hall Exams</button>
        <button name="ent_btn" class="btn btn-outline-secondary btn-secondary btn-lg">Enterprise Centre Exams</button> -->
    </div>
</body>
</html>