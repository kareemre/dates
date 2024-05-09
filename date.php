<?php
session_start([
  'cookie_lifetime' => 43200,
]);
function date1() {
    $now = new DateTime();
    $hour = $now->format('H');
    
    // Check if the greeting message has been displayed today
    $currentDate = date('Y-m-d');
    $greeting = null;
    if ($hour < 12) {
      $greeting = "Good morning!";
    } else if ($hour < 18) {
      $greeting = "Good afternoon!";
    } else {
      $greeting = "Good evening!";
    }
    
    if (! isset($_SESSION['greetingShown'])) {
        echo "<p>{$greeting}</p>";
        $_SESSION['greetingShown'] = true;
      }
}
date1();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Time</title>
    <script>
        function updateTime() {
            let currentTime = new Date();
            let hours = currentTime.getHours();
            let minutes = currentTime.getMinutes();
            let seconds = currentTime.getSeconds();

            let timeString = hours + ":" + minutes + ":" + seconds;

            document.getElementById("time").textContent = timeString;

            setTimeout(updateTime, 1000); // Update every second
        }
    </script>
</head>
<body onload="updateTime()">

    <h2 id="time"></h2>
</body>
</html>