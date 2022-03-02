var analogClock = new AnalogClock();
var digitalClock = new DigitalClock();

function updateClocks() {
    digitalClock.updateClock();
    analogClock.updateClock();
}

var startClock = setInterval("updateClocks()", 100);


