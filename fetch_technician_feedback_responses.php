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

$sql = "SELECT feedback_id, feedback_response FROM technician_feedback_responses"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $technicians_feedback_responses = [];
    while($row = $result->fetch_assoc()) {
        $technician_feedback_responses[] = $row;
    }
    echo json_encode(['success' => true, 'technician_feedback_responses' => $technician_feedback_responses]);
} else {
    echo json_encode(['success' => false, 'message' => 'No users found']);
}

$conn->close();
?>
