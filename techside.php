<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Technician Dashboard</title>
<style>
  /* Styles for the technician dashboard */
 body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #e9f3f9; /* light blue */
}

header {
  background-color: #003a6d; /* darker blue */
  color: #ffffff;
  padding: 20px;
  text-align: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.logo {
  margin-bottom: 20px;
}

.logo h1 {
  font-size: 48px;
  margin: 0;
  color: #ffffff;
}

nav {
  background-color: #005a9c; /* medium blue */
  padding: 10px 0;
  text-align: center;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
  margin: 0 15px;
}

nav ul li a {
  color: #ffffff; /* white */
  text-decoration: none;
  font-weight: 500;
}

nav ul li a:hover {
  color: #cce4f7; /* very light blue */
}

main {
  padding: 20px;
  max-width: 900px;
  margin: 0 auto;
}

.section {
  background-color: #ffffff;
  margin-bottom: 20px;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
  color: #003a6d; /* darker blue */
}

.button {
  padding: 10px 20px;
  background-color: #003a6d; /* darker blue */
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  font-weight: 500;
}

.button:hover {
  background-color: #002b5e; /* even darker blue */
}

.issue-card, .feedback-card {
  border: 1px solid #d0d0d0; /* light gray */
  border-radius: 8px;
  padding: 15px;
  margin-bottom: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  background-color: #ffffff;
}

.issue-card:hover, .feedback-card:hover {
  background-color: #f7f9fc; /* very light gray-blue */
}

.user-info-form {
  max-width: 400px;
  margin: 0 auto;
}

</style>
</head>
<body>
  <header>
    <div class="logo">
      <h1>M</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#view-issues">View Issues</a></li>
        <li><a href="#respond-issues">Respond to Issues</a></li>
        <li><a href="#view-feedback">View Feedback</a></li>
        <li><a href="#respond-feedback">Respond Feedback</a></li>          
        <li><a href="index.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="view-issues" class="section">
      <!-- View Issues section content -->
      <h2>View Issues</h2>
	  <?php
	  require_once("functions.php");
	  $conn = dbConnection();
	  $sql = "SELECT * FROM issues";
	  $query=mysqli_query($conn,$sql) or die("Error cannot query the database");
	  while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	  {
      echo '<div class="issue-card" onclick="selectIssue('.$result["id"].')">'.$result["issue"].'</div>';
	  }
	  mysqli_close($conn);
	  ?>
      <!--<div class="issue-card" onclick="selectIssue(2)">Issue 2</div>-->
      <!-- Add more issue cards as needed -->
    </section>
    
    <section id="respond-issues" class="section">
      <!-- Respond to Issues section content -->
      <h2>Respond to Issues</h2>
      <div id="selected-issue-info"></div>
	  <form method=post action="techside.php">
      <textarea id="issue-response" name="issue-response" rows="4" cols="50" placeholder="Type your response to the selected issue here..."></textarea><br>
	  <input type=hidden id=issueNumber name=issueNumber>
      <input type=submit id="submit-issue-response" class="button" value="Submit Response" name="submit-issue-response">
	  </form>
    </section>

    <section id="view-feedback" class="section">
      <!-- View Feedback section content -->
      <h2>View Feedback</h2>
	  <?php
	  require_once("functions.php");
	  $conn = dbConnection();
	  $sql = "SELECT * FROM feedback";
	  $query=mysqli_query($conn,$sql) or die("Error cannot query the database");
	  while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	  {
      echo '<div class="feedback-card" onclick="selectFeedback('.$result["id"].')">'.$result["message"].'</div>';
	  }
	  mysqli_close($conn);
	  ?>
      <!--<div class="feedback-card" onclick="selectFeedback(2)">Feedback 2</div>
       Add more feedback cards as needed -->
    </section>

   <section id="respond-feedback" class="section">
      <!-- Respond to Feedback section content -->
      <h2>Respond to Feedback</h2>
	   <form method=post action="techside.php">
      <div id="selected-feedback-info"></div>
      <textarea id="feedback-response" name="feedback_response" rows="4" cols="50" placeholder="Type your response to the selected feedback here..."></textarea><br>
	  <input type=hidden id=feedback_id name=feedback_id>
      <input type=submit id="submit-feedback-response" name="submit-feedback-response" class="button" value="Submit Response">
	   </form>
    </section>
    
    
  </main>
  <script>
    // Function to handle selecting an issue
    function selectIssue(issueNumber) {
      var issueInfo = "Issue " + issueNumber + " details...";
	  document.getElementById('issueNumber').value =issueNumber;
      document.getElementById('selected-issue-info').innerText = issueInfo;
    }

    // Function to handle selecting a feedback
    function selectFeedback(feedbackNumber) {
      var feedbackInfo = "Feedback " + feedbackNumber + " details...";
	  document.getElementById('feedback_id').value=feedbackNumber;
      document.getElementById('selected-feedback-info').innerText = feedbackInfo;
    }

     </script>
</body>
</html>
<?php
require_once("functions.php");

if (isset($_POST["submit-issue-response"])) {
    $conn = dbConnection();
    $issue_response = $_POST["issue-response"];
    $issueNumber = $_POST["issueNumber"];

    if (empty($issueNumber)) {
        echo "<script>alert('Click on the issue first then type a response');</script>";
        mysqli_close($conn);
        return;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO technician_responses (issue_id, response) VALUES (?, ?)");
    $stmt->bind_param("ss", $issueNumber, $issue_response);

    if ($stmt->execute()) {
        echo "<script>alert('Technician Response was submitted successfully');</script>";
    } else {
        echo "<script>alert('An error has occurred: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    mysqli_close($conn);

} elseif (isset($_POST["submit-feedback-response"])) {
    $conn = dbConnection();
    $feedback_response = $_POST["feedback_response"];
    $feedback_id = $_POST["feedback_id"];

    if (empty($feedback_id)) {
        echo "<script>alert('Click on the feedback first then type a response');</script>";
        mysqli_close($conn);
        return;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO technician_feedback_responses (feedback_id, feedback_response) VALUES (?, ?)");
    $stmt->bind_param("ss", $feedback_id, $feedback_response);

    if ($stmt->execute()) {
        echo "<script>alert('Technician Feedback Response was submitted successfully');</script>";
    } else {
        echo "<script>alert('An error has occurred: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
