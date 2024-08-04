<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Care Connect</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #ffffff;
  }

  header {
    background-color: #ffffff;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .logo {
    margin-bottom: 20px;
  }

  .logo h1 {
    font-size: 64px;
    margin: 0;
    color: #83b2cc;
  }

  main {
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
  }

  .login-container {
    background-color: #f0f5f9;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
  }

  .login-container h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #336699;
  }

  .login-container form input,
  .login-container form select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #cccccc;
    border-radius: 4px;
  }

  .login-container form button {
    width: calc(100% - 20px);
    padding: 10px;
    background-color: #336699;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .login-container form button:hover {
    background-color: #004466;
  }

  .login-option {
    color: #336699;
    cursor: pointer;
    margin-top: 10px;
    text-decoration: underline;
  }

  .login-option:hover {
    color: #004466;
  }
</style>
</head>
<body>  
  <main>
    <div class="login-container">
	<div id="error-message" style="color:#FF0000"></div>
    <div id="success-message"></div>
      <h2>Login</h2>
      <form id="addUserForm" method="post" action="index.php">        
        <input type="email" id="email" name="email" placeholder="Email or User ID">        
        <input type="password" id="password" name="password" placeholder="Password">        
        <input type="submit" name="login" value="log in">
        <br/><br/><a href="signup.html" class="login-option">Don't have an account? Sign up here</a>
      </form>
    </div>
  </main>  
</body>
</html>
<?php
if(isset($_POST["login"]))
{
include("functions.php");
$conn = dbConnection();
$email = $_POST['email'];
$password = $_POST['password'];
$password=md5($password);
$sql = "SELECT * FROM users WHERE ((userid = '".$email."' OR email = '".$email."') AND password= '".$password."' )";
$query = mysqli_query($conn,$sql);
//$stmt->bind_param('ss', $email, $email,$password);
//$stmt->execute();
$number = mysqli_num_rows($query);
$results=mysqli_fetch_array($query,MYSQLI_ASSOC);
if ($number > 0) 
{	
	$role=strtolower($results["role"]);
	if($role=="admin")
	{
	@header("Location:adminview.php");
	}
	elseif($role=="client")
	{
	@header("Location:clientside.php");
	}
	elseif($role=="technician")
	{
	@header("Location:techside.php");
	}
}
else {
    //echo json_encode(['success' => false, 'message' => 'No user matched the credentials you keyed in.']);
	echo "<script>alert(`No user matched the credentials you keyed in`);</script>";
	exit();
}
//$stmt->close();
//$conn->close();
}
?>