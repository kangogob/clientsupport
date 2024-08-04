<?php
function dbConnection()
{
	$host="localhost";
	$username="root";
	$password="";
	$database="webapp";
	$conn=new mysqli($host,$username,$password,$database);
	if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
	}
	
	return $conn;
}
?>