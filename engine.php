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
else if ($_POST['choice'] == 'Buy')
{
    if (isset($_SESSION['engine']))
    $_SESSION['engine'] += $_POST['engine'];
    else
    $_SESSION['engine'] = $_POST['engine'];
}

?>
</head>
<body>
<?php readfile("lib/header.html"); ?>

This is the Engine page.

<form method='POST'>
<input type='number' name='engine' value='<?php echoPost("engine");?> '>
<input type='submit' name='choice' value='Buy'>
</form>

In cart: <?php echoSession("engine") ?>

<?php readfile("lib/footer.html"); ?>
</body>
