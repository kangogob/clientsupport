<?php
require_once("functions.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit();
}

// Create connection
$conn = dbConnection();
// Get JSON data from request body
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit();
}

$firstname = $data['firstname'];
$lastname = $data['lastname'];
$email = $data['email'];
$userid = $data['userid'];
$password = $data['password'];
$role = $data['role'];

// Check if user ID or email already exists
$check_sql = "SELECT * FROM users WHERE userid = ? OR email = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param('ss', $userid, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'User ID or Email already exists.']);
    $stmt->close();
    $conn->close();
    exit();
}
$password=md5($password);
// Insert new user
$sql = "INSERT INTO users (firstname, lastname, email, userid, password, role) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssss', $firstname, $lastname, $email, $userid, $password, $role);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add user.']);
}

$stmt->close();
$conn->close();
?>
