let clockBtn = document.getElementsByClassName('clock-button');
let editorBtn = document.getElementsByClassName('login-main-text');

editorBtn[0].addEventListener('click', function() {
    location.href='http://ComputerName/exam_clock/edit_exams.php';
});

clockBtn[0].addEventListener('click', function() {
    location.href='http://ComputerName/exam_clock/?location=hall';
});

clockBtn[1].addEventListener('click', function() {
    location.href='http://ComputerName/exam_clock/?location=enterprise_centre';
});

clockBtn[2].addEventListener('click', function() {
    location.href='http://ComputerName/exam_clock/?location=custom1';
});

clockBtn[3].addEventListener('click', function() {
    location.href='http://ComputerName/exam_clock/?location=custom2';
});