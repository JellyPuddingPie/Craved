
<?php




$servername = "46.21.173.249";
$username = "bjorngv155";
$password = "7gc7e3qn";
$dbname = "bjorngv155_Craved";
$con = mysqli_connect($servername,$username,$password,$dbname);


$session_user =$_SESSION['username'];
$session_user_id = $_SESSION['user_id'];
$session_firstname = $_SESSION['first_name'];
$file = 'login.log';
// The new person to add to the file
$person = $_SESSION["username"];
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);
// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysqli_query("select user_login_naam from user_logon where user_login_naam='$user'", $con);
//$row = mysqli_fetch_assoc($ses_sql);

//$login_session =$row["user_login_naam"];

if(!(isset($session_user) && isset($session_firstname))){
mysqli_close($con); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>