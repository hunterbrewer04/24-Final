<!--  I honor Parkland's core values by affirming that I have
followed all academic integrity guidelines for this work.
Hunter Brewer
CS155 -->
<html>
<head>
<title>Welcome.php</title>
<?php 
session_start();
if (!isset($_SESSION['username']))
    header("Location: login.php");
?>
</head>
<body>
<?php readfile('lib/header.html'); ?>
<h1><b>Hello! Welcome!</b></h1>


<?php readfile('lib/footer.html'); ?>
</body>
</html>
