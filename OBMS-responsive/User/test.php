<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Clock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 100px;
        }

        #clock {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div id="clock"></div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var date = now.toDateString();

            var timeString = hours + ':' + minutes + ':' + seconds;
            var dateString = 'Date: ' + date;

            document.getElementById('clock').innerHTML = timeString + '<br>' + dateString;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Initial call to set the clock immediately
        updateClock();
    </script>
</body>

</html>