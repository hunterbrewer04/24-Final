<html>
<head>
<?php
require('lib/phpfunctions.php');

function getRowByUser($conn, $user)
{
    $sql = "SELECT * FROM users WHERE username=?"; 
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $user);
    $stmt->execute();
    
    $result = $stmt->get_result(); 

    if ($result->num_rows  == 1) 
    {
    return $result->fetch_assoc();
    }
    else
    {
    echo 'Login Failed';
    return "";
    }
}

function checkLogin($conn, $user, $pass)
{
    $row = getRowByUser($conn, $user);
    if ($row=="failed") return false;
    if (password_verify($pass, $row['encrypted_password']))
    {
    return true;
    }
    return false;
}


session_start();  
$conn = connectDB();


$message = '';
if (isset($_POST['choice'])) 
{
    if ( checkLogin($conn, $_POST['24username'], $_POST['24password']) )
    {
    header('Location: welcome.php');
    $_SESSION['username'] = $_POST['24username'];
    }
    else
    {
    $message = 'Invalid Username or Password';
    }
}
else 
{
  
}
?>
</head>
<body>

<h1>Login or Create New User!</h1>
<form method='POST'>
User: <input type='text' name='24username' value='<?php echoPost("24username"); ?>' > <br>
Password: <input type='password' name='24password' value='<?php echoPost("24password"); ?>'> <br>
<input type='submit' name='choice' value='Log In'>
</form>
<h2><?php echo $message;?></h2>
<a href="createaccount.php">Create Account
</body>
</html>
