<html>
<head>
<?php 
readfile("lib/header.html");
$user = "hbrewer7";
$conn = mysqli_connect("localhost",$user,$user,$user);

// Check connection
if (mysqli_connect_errno()) {
  echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
}
else {
  echo "";
}

$sql = "SELECT id, username, email FROM users";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table align='center' bgcolor='MintCream'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Users</th>";
		echo "<th>Email</th>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 

mysqli_close($conn);




?>
</head>
<body>





<?php readfile("lib/footer.html"); ?>
</body>
</html>

