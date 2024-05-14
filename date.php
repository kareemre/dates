<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Time with Cookies</title>
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

    function checkGreeting(currentTime) {
      let greeting = null;
      let currentDate = new Date().toLocaleDateString();

      // Check if a cookie exists for today's date
      if (document.cookie) {
        let cookies = document.cookie.split(';');
        for (let cookie of cookies) {
          let [key, value] = cookie.trim().split('=');
          if (key === 'greetingShown' && value === currentDate) {
            return; // Greeting already shown today
          }
        }
      }

      // Determine greeting based on hour passed as argument
      hours = currentTime.getHours(); // Access hours from argument
      if (hours < 12) {
        greeting = "Good morning!";
      } else if (hours < 18) {
        greeting = "Good afternoon!";
      } else {
        greeting = "Good evening!";
      }

      // Display greeting and set cookie for today
      document.getElementById("greeting").textContent = greeting;
      document.cookie = `greetingShown=${currentDate}; expires=0; path=/`;
    }
  </script>
</head>
<body onload="updateTime(); checkGreeting(new Date())">
  <p id="greeting"></p>
  <h2 id="time"></h2>
</body>
</html>
