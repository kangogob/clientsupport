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
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Get JSON data from request body
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit();
}

if (!isset($data['email']) || !isset($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    exit();
}

$email = $data['email'];
$password = $data['password'];

// Prepare SQL statement to avoid SQL injection
$check_sql = "SELECT password FROM users WHERE email = ?";
$stmt = $conn->prepare($check_sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Failed to prepare statement: ' . $conn->error]);
    exit();
}

$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashed_password = $user['password'];
    
    // Verify password
    if (password_verify($password, $hashed_password)) {
        echo json_encode(['success' => true, 'message' => 'User Login was successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No user found with that email.']);
}

$stmt->close();
$conn->close();
?>
