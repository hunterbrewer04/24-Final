<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Hunter Brewer
CS155 -->
<html>
<head>
<?php
require("lib/phpfunctions.php");
session_start();
checkcredentials();   
if (!isset($_POST['choice']))
{
}
else if ($_POST['choice'] == 'Make Purchase')
{
    echo 'Your card on file has been charged!';
    $_SESSION['engine'] = 0;
    $_SESSION['tires'] = 0;
    $_SESSION['brakes'] = 0;
    $_SESSION['doors'] = 0;
}
else if ($_POST['choice'] == 'Remove Purchase')
{
    $_SESSION['engine'] = 0;
    $_SESSION['tires'] = 0;
    $_SESSION['brakes'] = 0;
    $_SESSION['doors'] = 0;
}
?>
</head>
<body>
<?php readfile("lib/header.html"); ?>

Listing of items: <br>
Trolls: <?php echoSession("engine") ?> <br>
Orcs: <?php echoSession("tires") ?> <br>
Goblins: <?php echoSession("brakes") ?> <br>
Rangers: <?php echoSession("doors") ?> <br>

<form method='POST'>
<input type='submit' name='choice' value='Make Purchase'>
<input type='submit' name='choice' value='Remove Purchase'>
</form>


<?php readfile("lib/footer.html"); ?>
</body>
