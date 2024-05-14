function updateClock() {
    var now = new Date();
    var selectedFormat = document.getElementById('formatSelect').value;

    var hours, ampm;
    if (selectedFormat === 'local12') {
        hours = now.getHours() % 12 || 12;
        ampm = now.getHours() >= 12 ? 'PM' : 'AM';
    } else if (selectedFormat === 'local24') {
        hours = now.getHours();
        ampm = '';
    } else if (selectedFormat === 'gmt') {
        hours = now.getUTCHours();
        ampm = '';
    }

    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    hours = padZero(hours);
    minutes = padZero(minutes);
    seconds = padZero(seconds);


    var timeString = hours + ":" + minutes + ":" + seconds + " " + ampm;

   
    document.getElementById('clock').textContent = timeString;
}

function padZero(num) {
    return (num < 10) ? "0" + num : num;
}

setInterval(updateClock, 1000);


updateClock();


document.getElementById('formatSelect').addEventListener('change', updateClock);
