<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Digilabs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/croppie.css" rel="stylesheet" async="async" />
    <link href="css/style.css" rel="stylesheet" async="async" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/croppie.min.js" async="async"></script>
    <script src="js/app.js" async="async"></script>
    <script src="js/fb.js" async="async"></script>
  </head>
  <body>
    <div id="wrapper">
      <div id="content">
      <img src="./frames/Logo-01.png" alt="Brand Logo" width="200" height="86">
        <!-- <h1>Grogain PhotoFramer</h1> -->
        <span></span><br>
        <!-- <p>Digilabs Profile Picture</p> -->
        <div id="preview">
          <div id="crop-area">
            <img src="http://demos.subinsb.com/isl-profile-pic/image/person.png" id="profile-pic" />
          </div>
          <img src="frames/frame-1.png" id="fg" data-design="0" />
        </div>
        <p>
          <button id="download" disabled>Download Profile Picture</button>
          <!--<button id="fb-set-pic" disabled>Set As <b>Facebook</b> Profile Picture</button>-->
        </p>
        <!-- <h2>Upload</h2> -->
        <input id ="fc1" type="file" name="file" onchange="onFileChange(this)">
        <!-- <h2>OR</h2> -->
        <!-- <div class="fb-login-button" data-scope="public_profile,publish_actions" onlogin="checkLoginState();" data-max-rows="5" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div> -->
        <!-- <div id="status"></div> -->
        <h3>Pick up Frame Designs</h3>
        <div id="designs">
          <img class="design active" src="frames/frame-0.png" data-design="0" />
          <img class="design" src="frames/frame-1.png" data-design="1" />
          <!-- <img class="design" src="frames/frame-2.png" data-design="2" /> -->
        </div>
        <?php
        require_once __DIR__ . "/footer.php";
        ?>
      </div>
    </div>
  </body>
</html>