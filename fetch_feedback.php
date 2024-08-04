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

$sql = "SELECT id, message FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $feedback = [];
    while($row = $result->fetch_assoc()) {
        $feedback[] = $row;
    }
    echo json_encode(['success' => true, 'feedback' => $feedback]);
} else {
    echo json_encode(['success' => false, 'message' => 'No feedback found']);
}

$conn->close();
?>
