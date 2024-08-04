<?php
include("functions.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit();
}

// Create connection
$conn = dbConnection();

$sql = "SELECT id, response FROM technician_responses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $technicians_responses = [];
    while($row = $result->fetch_assoc()) {
        $technicians_responses[] = $row;
    }
    echo json_encode(['success' => true, 'technician_responses' => $technicians_responses]);
} else {
    echo json_encode(['success' => false, 'message' => 'No users found']);
}

$conn->close();
?>
