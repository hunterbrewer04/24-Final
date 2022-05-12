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
    if (isset($_SESSION['tires']))
    $_SESSION['tires'] += $_POST['tires'];
    else
    $_SESSION['tires'] = $_POST['tires'];
}

?>
</head>
<body>
<?php readfile("lib/header.html"); ?>

This is the Tires page.

<form method='POST'>
<input type='number' name='tires' value='<?php echoPost("tires");?> '>
<input type='submit' name='choice' value='Buy'>
</form>

In cart: <?php echoSession("tires") ?>

<?php readfile("lib/footer.html"); ?>
</body>
