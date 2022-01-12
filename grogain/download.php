<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<head>
  <title>Download Profile Picture</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet" async="async" />
</head>

<body>
  <div id="wrapper">
    <div id="content">
      <div class="tlogo">
        <img src="./frames/Logo-01.png" alt="Brand Logo" width="200" height="86">
      </div>

      <!-- <h1><a href="http://demos.sim/isl-profile-pic/">Grogain</a></h1> -->
      <h2 id="dprofile">Make this as your profile picture </h2>
      <?php
      $url = htmlspecialchars($_GET["i"]);
      if (isset($_GET["i"]))
        echo "<a id='down' href='" . $url . "' download='" . basename($url) . "'><img src='" . $url . "' /></a>";
      else
        header("Redirect: index.php");
      ?>
      <h3 id="cdownload">
        Click the above image to download.</h3>
      <p>
        <a href="index.php"><button id="download">Create Another Profile Picture!</button></a>
      </p>
      <?php
      require_once __DIR__ . "/footer.php";
      ?>
    </div>
  </div>
</body>
<script>
  document.getElementById("down").click();
</script>

</html>