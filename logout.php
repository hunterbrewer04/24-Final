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

logout_processing();  
header('Refresh:5; url=login.php', true, 303);

?>
</head>
<body>

Good Bye ... 


</body>
