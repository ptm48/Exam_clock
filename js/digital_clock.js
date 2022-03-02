var DigitalClock = function(today) {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    
    function getCurrentDate(today) {
        var curWeekDay = days[today.getDay()];
        var curDay = today.getDate();
        var curMonth = months[today.getMonth()];
        var curYear = today.getFullYear();
        var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;

        return date;
        
    }

    function getTime(today) {
        var hr = today.getHours();
        var min = today.getMinutes();
        var sec = today.getSeconds();
        ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
        hr = (hr == 0) ? 12 : hr;
        hr = (hr > 12) ? hr - 12 : hr;

        return {
            hr, min, sec, ap
        }
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function checkAddZero(n) {
        //Add a zero in front of numbers<10
        return checkTime(n);
    }

    function updateClockDisplay(hr, min, sec, ap, date) {
        document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
        document.getElementById("date").innerHTML = date;
    }

    function updateClock() {
        var today = new Date();
        var timeDate = getTime(today);
        var currentDate = getCurrentDate(today);
        updateClockDisplay(checkAddZero(timeDate.hr), checkAddZero(timeDate.min), checkAddZero(timeDate.sec), timeDate.ap, currentDate);
    }

    return {
        updateClock: updateClock
    };
}