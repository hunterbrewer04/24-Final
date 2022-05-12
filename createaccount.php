<html>
  <head>
<?php
require("lib/phpfunctions.php");


$conn = connectDB();
$accountMessage = '';

if (isset($_POST['choice']))
{
    $choice = getPost('choice');
    if ($choice == 'Create Account')
    {
    $password=$_POST['24password'];
    $confirmpassword=$_POST['24confirmpassword'];
    if (empty($_POST['24username']))
        {
            $accountmessage = 'USERNAME REQUIRED';
        }
        else if (empty($_POST['24password']))
        {
            $accountmessage = 'PASSWORD REQUIRED';
        }
        else if ( $_POST['24password'] != $_POST['24confirmpassword'])
        {
            $accountmessage = 'PASSWORDS DO NOT MATCH';
        }
        else if ( lookupUsername($conn, $_POST['24username']) != 0 )
        {
            $accountmessage = 'Username already exists';
        }

    if ($password == $confirmpassword) 
    {

        $stmt = $conn->prepare("INSERT INTO users (username, encrypted_password, usergroup, email) 
                                                VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $username, $encryptedpassword, $usergroup, $email);
      
        $username = getPost('24username');
        $encryptedpassword = password_hash($password, PASSWORD_DEFAULT);
        $usergroup = getPost('usergroup');
	$email = getPost('24email');
        $stmt->execute();
 
        $accountMessage = 'Account Created';
       header("Location: login.php");
 }
    else 
    {        
        $accountMessage = "Passwords don't match";
    }
    }
}



if (isset($_POST['cancel']))
{
    header("Location: login.php");
}

?>
</head>
<body>

<form method='POST'>
<table align='center' bgcolor='Thistle'>
<tr>
<td>Username:</td>
<td><input type='text' name='24username' value='<?php echoPost("24username");?>'></td>
</tr>

<tr>
<td>Password:</td>
<td><input type='password' name='24password' value='<?php echoPost("24password");?>'></td>
</tr>

<tr>
<td>Confirm Password:</td>
<td><input type='password' name='24confirmpassword' value='<?php echoPost("24confirmpassword");?>'></td>
</tr>

<tr>
<td>Email:</td>
<td><input type='text' name='24email' value='<?php echoPost("24email");?>'></td>
</tr>


<tr>
<td>Usergroup</td>
<td><select name='usergroup'>
<option>User</option>
<option>Admin</option>
</select></td>
</tr>

<tr>
<td colspan='2'><?php echo $accountMessage;?></td>
</tr>

<tr>
<td colspan='2'>
<input type='submit' name='choice' value='Create Account'>
<input type='submit' name='cancel' value='Cancel'>
</td>
</table>
</form>


</body>
</html>
