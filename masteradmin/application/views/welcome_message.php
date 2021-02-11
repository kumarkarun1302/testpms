<!doctype html>
<html class="no-js" lang="en">
<head>
<title>Coming Soon</title>
</head>
<body>
<div class="bgimg">
  
  <div class="middle">
    <h1>COMING SOON</h1>
    <h3 style="text-align: center;"><strong><br>Please check back later</strong>.</h3>
    <hr>
    <h1 id="demo" style="font-size:80px"></h1>
  </div>
  <div class="bottomleft">
    <p>ANJ PMS</p>
  </div>
</div>

<script>
var countDownDate = new Date("2021-02-01 19:10:5").getTime();
var countdownfunction = setInterval(function() {
var now = new Date().getTime();  
var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
</body>
</html>
