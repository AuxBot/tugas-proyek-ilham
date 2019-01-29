<?php

if(isset($_GET['filter'])){
      $var = $_GET['filter'];
      
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
</head>
<body>
      <form>
      <input type="radio" onclick="check()" name="colors" id="a">R<br>
      <input type="radio" name="colors" id="b">B
      </form>

      <button onclick="check()">Check "Red"</button>
      <button onclick="uncheck()">Uncheck "Red"</button>
      <div id="text">haa</div>

      <script>
      function check() {
      document.getElementById("text").innerHTML = "aaa";
      }
      function uncheck() {
      document.getElementById("a").checked = false;
      }
      </script>
</body>
</html>