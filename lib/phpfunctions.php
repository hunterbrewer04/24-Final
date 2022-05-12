<?php

function connectDB()
{
// Create connection object
    $user = "hbrewer7";
    $conn = mysqli_connect("localhost",$user,$user,$user);
// Check connection
    if (mysqli_connect_errno())
    {
        echo "<b>Failed to connect to MySQL: " . mysqli_connect_error() . "</b>";
        // go to an error page
    }

    return $conn;
}


function echoPost($name)
{
    if (isset($_POST[$name]))
        echo htmlspecialchars($_POST[$name]);
}

function getPost($name)
{
    if (isset($_POST[$name]))
        return htmlspecialchars($_POST[$name]);
    return '';
}

function echoSession($name)
{
    if (isset($_SESSION[$name]))
        echo htmlspecialchars($_SESSION[$name]);
}
// assumes the session has started!
function checkcredentials($group="None Specificed")
{
    if ( !isset( $_SESSION['username'] ) )
    {
        // bounce on invalid user
        header("Location: login.php");
    }
}
function logout_processing()
{
    session_destroy();   // clear out the session
}

function lookupUsername($conn, $username) {
    // echo "looking up $username";
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 0) {
        // not found echo 'not found';
        return 0;
    }
    else if ($num_rows > 1) {
        // too many results ... exit!  echo 'too many found';
        header("Location: goodbye.php");
    }
    else {
        // one result, return the row echo 'one found';
        return $result->fetch_assoc();
    }
}

?>

