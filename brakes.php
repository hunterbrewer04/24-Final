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
    if (isset($_SESSION['brakes']))
    $_SESSION['brakes'] += $_POST['brakes'];
    else
    $_SESSION['brakes'] = $_POST['brakes'];
}

?>
</head>
<body>
<?php readfile("lib/header.html"); ?>

This is the Brakes page.

<form method='POST'>
<input type='number' name='brakes' value='<?php echoPost("brakes");?> '>
<input type='submit' name='choice' value='Buy'>
</form>

In cart: <?php echoSession("brakes") ?>

<?php readfile("lib/footer.html"); ?>
</body>
