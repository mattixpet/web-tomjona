<!DOCTYPE html>
<html lang="is">
  <?php 
  if (isset($_GET['lang'])) {
   if ($_GET['lang']=="is") {
     include("static/php/is.php");
   } elseif ($_GET['lang']=="en") {
     include("static/php/en.php");
   } else {
     include("static/php/is.php");
   }
  } else {
   include("static/php/is.php");
  }
  ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <link rel="shortcut icon" href="static/img/favicon.ico">
    <title><?php echo utf8_decode($title) ?></title>
  </head>
  <body><?php include_once("static/php/analyticstracking.php") ?>
    <div class="wrapper">
      <p class="hidden">you have found the secret message, hidden, not empty space</p>
      <main role="main">
        <div class="smallwrap">
          <p><?php echo utf8_decode($about_description) ?></p>
        </div>
      </main>
      <footer>
        <div class="container">
          <?php
          if (isset($_GET['lang'])) {
           if ($_GET['lang']=="is") {
             echo "<a href='./?lang=is'>".$home."</a>";
           } elseif ($_GET['lang']=="en") {
             echo "<a href='./?lang=en'>".$home."</a>";
           } else {
             echo "<a href='./'>".$home."</a>";
           }
          } else {
           echo "<a href='./'>".$home."</a>";
          }
          ?>
          <?php
          if (isset($_GET['lang'])) {
           if ($_GET['lang']=="is") {
             echo "<a href='about.php?lang=is'>".$about."</a>";
           } elseif ($_GET['lang']=="en") {
             echo "<a href='about.php?lang=en'>".$about."</a>";
           } else {
             echo "<a href='about.php'>".$about."</a>";
           }
          } else {
           echo "<a href='about.php'>".$about."</a>";
          }
          ?>
          <?php
          if (isset($_GET['lang'])) {
           if ($_GET['lang']=="is") {
             echo "<a href='contact.php?lang=is'>".$contact."</a>";
           } elseif ($_GET['lang']=="en") {
             echo "<a href='contact.php?lang=en'>".$contact."</a>";
           } else {
             echo "<a href='contact.php'>".$contact."</a>";
           }
          } else {
           echo "<a href='contact.php'>".$contact."</a>";
          }
          ?><a href="static/other/resume.pdf"><?php echo utf8_decode($resume) ?></a>
          <div class="translate">
            <ul>
              <li class="is"><a href="?lang=is">is</a></li>
              <li class="en"><a href="?lang=en">en</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    <script src="static/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="static/js/emailobfuscate.js" type="text/javascript"></script>
    <script src="static/js/chat.js" type="text/javascript"></script>
    <script src="static/js/chatDisplayHack.js" type="text/javascript"></script>
  </body>
</html>