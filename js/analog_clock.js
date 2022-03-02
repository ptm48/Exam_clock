var AnalogClock = function() {
    var dialLines = document.getElementsByClassName('diallines');
    var clockEl = document.getElementsByClassName('clock')[0];
    
    function drawDialLines() {
        for (var i = 1; i < 60; i++) {
            clockEl.innerHTML += "<div class='diallines'></div>";
            dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
          }
    }

    function getTimeAndDate() {
        let d = new Date();
        let day = d.getDay();
        let h = d.getHours();
        let m = d.getMinutes();
        let s = d.getSeconds();
        let date = d.getDate();
        let month = d.getMonth() + 1
        let year = d.getFullYear();

        return {h, m, s, date, day, month, year};
    }

    function getHourHandDegrees(h, m) {
        return (h * 30 + m * (360/720));
    }

    function getMinHandDegrees(m, s) {
        return (m * 6 + s * (360/3600));
    }

    function getSecHandDegrees(s) {
        return (s * 6);
    }


    function setWeekDay(day) {
        var weekday = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
        ];
        return weekday[day];
    }

    function setTime(hDeg, mDeg, sDeg, month, year, day, date) {
        if(month < 9) {
            month = "0" + month;
        }
        var hEl = document.querySelector('.hour-hand');
        var mEl = document.querySelector('.minute-hand');
        var sEl = document.querySelector('.second-hand');
        var dateEl = document.querySelector('.date');
        var dayEl = document.querySelector('.day');

        hEl.style.transform = "rotate("+hDeg+"deg)";
        mEl.style.transform = "rotate("+mDeg+"deg)";
        sEl.style.transform = "rotate("+sDeg+"deg)";
        dateEl.innerHTML = date+"/"+month+"/"+year;
        dayEl.innerHTML = day;
    }
    

    function updateClock() {
        
        let currentTimeDate = getTimeAndDate();
        // get position of hands (hour)
        let hDeg = getHourHandDegrees(currentTimeDate.h, currentTimeDate.m);
        // get position of hands (minutes)
        let mDeg = getMinHandDegrees(currentTimeDate.m, currentTimeDate.s);
        // get position of hands (seconds)
        let sDeg = getSecHandDegrees(currentTimeDate.s);
        let day = setWeekDay(currentTimeDate.day);
        let month = currentTimeDate.month;
        let date = currentTimeDate.date;
        let year = currentTimeDate.year;

        setTime(hDeg, mDeg, sDeg, month, year, day, date);
        console.log(hDeg + " " + mDeg + " " + sDeg);
    }

    drawDialLines();

    return {
        updateClock: updateClock
    };        
}

