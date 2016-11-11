<?php


?>

<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<body>

<div class="w3-container">
  <h2>Dynamic Progress Bar with Labels</h2>
  <p>Centered label:</p>

  <div class="w3-progress-container">
    <div id="myBar" class="w3-progressbar w3-green" style="width:20%">
      <div id="demo" class="w3-center w3-text-white">20%</div>
    </div>
  </div>
  <br>

  <button class="w3-btn w3-dark-grey" onclick="move()">Click Me</button>
</div>

<script>
function move() {
  var elem = document.getElementById("myBar");
  var width = 20;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
      document.getElementById("demo").innerHTML = width * 1  + '%';
    }
  }
}
</script>

</body>
</html>

