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
    if (isset($_SESSION['doors']))
    $_SESSION['doors'] += $_POST['doors'];
    else
    $_SESSION['doors'] = $_POST['doors'];
}

?>
</head>
<body>
<?php readfile("lib/header.html"); ?>

This is the Doors page.

<form method='POST'>
<input type='number' name='doors' value='<?php echoPost("doors");?> '>
<input type='submit' name='choice' value='Buy'>
</form>

In cart: <?php echoSession("doors") ?>

<?php readfile("lib/footer.html"); ?>
</body>
