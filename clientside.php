<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Client Dashboard</title>
<style>
 body {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background-color: #e9f3f9; /* light blue */
}

header {
  background-color: #003366; /* dark blue */
  color: #ffffff; /* white */
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
  background-color: #007acc; /* medium blue */
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
  color: #d0e6f2; /* lighter blue */
}

main {
  padding: 20px;
  max-width: 800px;
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
  color: #003366; /* dark blue */
}

.button {
  padding: 10px 20px;
  background-color: #003366; /* dark blue */
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  font-weight: 500;
}

.button:hover {
  background-color: #002244; /* even darker blue */
}

.hidden {
  display: none;
}

.confirmation-message {
  margin-top: 20px;
  color: #007acc; /* medium blue */
  font-weight: bold;
}

#issue-form label,
#give-feedback-form label {
  display: block;
  margin-top: 15px;
  font-weight: 500;
}

textarea {
  width: 100%;
  padding: 10px;
  border-radius: 4px;
  border: 1px solid #cccccc;
  margin-top: 10px;
  font-family: inherit;
  font-size: 14px;
}

form button {
  margin-top: 20px;
}

.issue-card {
  background-color: #f4f8fa; /* very light blue */
  padding: 15px;
  margin-top: 10px;
  border: 1px solid #dddddd;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.issue-card:hover {
  background-color: #e0e6eb; /* light grayish blue */
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
        <li><a href="#report-issue">Report an Issue</a></li>
        <li><a href="#give-feedback">Give Feedback</a></li>
        <li><a href="#issue-response">Issue Response</a></li>
        <li><a href="#company-website">Company Website</a></li>
        <li><a href="guidedtroubleshoot.html">Guided Troubleshoot</a></li>
        <li><a href="index.php">Log Out</a></li>
        <!-- Add more navigation links as needed -->
      </ul>
    </nav>
  </header>
  <main>
    <section id="report-issue" class="section">
      <h2>Report an Issue</h2>
      <p>Use this section to report any issues you encounter while using our services.</p>
      <a href="#" class="button" id="report-issue-btn">Report Issue</a>
      <div id="issue-form" class="hidden">
        <form id="issue-report-form" action="clientside.php" method="POST">
          <label for="issue-description">Issue Description:</label><br>
          <textarea id="issue-description" name="issue-description" rows="4" cols="50" required></textarea><br><br>
          <input type="submit" name="submit_issue" class="button" value="Submit Issue">
        </form>
      </div>
      <div id="confirmation-message" class="confirmation-message hidden">
        Your issue has been reported to <span id="technician-name"></span>.
      </div>
    </section>
    
    <section id="give-feedback" class="section">
      <h2>Give Feedback</h2>
      <p>We appreciate your feedback! Please share your thoughts and suggestions with us.</p>
      <a href="#" class="button" id="give-feedback-btn">Submit Feedback</a>
      <div id="feedback-form" class="hidden">
        <form id="give-feedback-form" action="clientside.php" method="POST">
          <label for="feedback-description">Feedback:</label><br>
          <textarea id="feedback-description" name="feedback-description" rows="4" cols="50" required></textarea><br><br>
          <input type="submit" name="submit_feedback" class="button" value="Submit Feedback">
        </form>
      </div>
      <div id="feedback-confirmation-message" class="confirmation-message hidden">
        Thank you for your feedback!
      </div>
    </section>
    
    <section id="company-website" class="section">
      <h2>Company Website</h2>
      <p>Visit our website to learn more about our products and services.</p>
      <a href="https://memory.co.ke/" target="_blank" class="button">Visit Website</a>
    </section>
    
    <section id="guided-troubleshoot" class="section">
      <h2>Guided Troubleshoot</h2>
      <p>Need help troubleshooting common issues? Check out our guided troubleshoot section.</p>
      <a href="#" class="button">Guided Troubleshoot</a>
    </section>
    
    <section id="issue-response" class="section">
      <h2>View Responses</h2>
      <?php
      require_once("functions.php");
      $conn = dbConnection();
      $sql = "SELECT * FROM technician_responses";
      $query = mysqli_query($conn, $sql) or die("Error cannot query the database");
      while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        echo '<div class="issue-card">' . htmlspecialchars($result["response"]) . '</div>';
      }
      mysqli_close($conn);
      ?>
    </section>
    
    <section id="view-feedback" class="section">
      <!-- View Feedback section content -->
      <h2>Feedback Response</h2>
	  <?php
	  require_once("functions.php");
	  $conn = dbConnection();
	  $sql = "SELECT * FROM technician_feedback_responses";
	  $query=mysqli_query($conn,$sql) or die("Error cannot query the database");
	  while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	  {
      echo '<div class="feedback-card" onclick="selectFeedback('.$result["feedback_id"].')">'.$result["feedback_response"].'</div>';
	  }
	  mysqli_close($conn);
	  ?>
      <!--<div class="feedback-card" onclick="selectFeedback(2)">Feedback 2</div>
       Add more feedback cards as needed -->
    </section>
    <!-- Add more sections as needed -->
  </main>
</body>
</html>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const reportIssueBtn = document.getElementById('report-issue-btn');
      const issueForm = document.getElementById('issue-form');
      const issueReportForm = document.getElementById('issue-report-form');
      const confirmationMessage = document.getElementById('confirmation-message');
      const technicianName = document.getElementById('technician-name');

      const giveFeedbackBtn = document.getElementById('give-feedback-btn');
      const feedbackForm = document.getElementById('feedback-form');
      const feedbackReportForm = document.getElementById('give-feedback-form');
      const feedbackConfirmationMessage = document.getElementById('feedback-confirmation-message');

      reportIssueBtn.addEventListener('click', function() {
        issueForm.classList.toggle('hidden');
      });

      issueReportForm.addEventListener('submit', function(event) {
        //event.preventDefault();
        const technicians = ['John Doe', 'Jane Smith', 'David Brown', 'Emma Johnson']; // List of technicians
        const randomTechnician = technicians[Math.floor(Math.random() * technicians.length)];
        technicianName.textContent = randomTechnician;
        issueForm.classList.add('hidden');
        confirmationMessage.classList.remove('hidden');
        setTimeout(function() {
          confirmationMessage.classList.add('hidden');
        }, 5000); // Hide confirmation after 5 seconds
      });

      giveFeedbackBtn.addEventListener('click', function() {
        feedbackForm.classList.toggle('hidden');
      });

      feedbackReportForm.addEventListener('submit', function(event) {
        //event.preventDefault();
        feedbackForm.classList.add('hidden');
        feedbackConfirmationMessage.classList.remove('hidden');
        setTimeout(function() {
          feedbackConfirmationMessage.classList.add('hidden');
        }, 5000); // Hide confirmation after 5 seconds
      });
    });
  </script>
</body>
</html>
<?php
require_once("functions.php");
if(isset($_POST["submit_issue"]))
{
	//echo "<script>alert(Issue submitted);</script>";
	$conn = dbConnection();
	$issue_description=$_POST["issue-description"];
$sql="INSERT INTO issues(user_id, issue) VALUES (2, '".$issue_description."')";	
	if($query = mysqli_query($conn,$sql))
	{
		echo "<script>alert(Feedback was submitted successfully);</script>";
	}
	else
	{
		//echo "<script>alert(Feedback was not submitted);</script>";
	}
	mysqli_close($conn);
}
elseif(isset($_POST["submit_feedback"]))
{
	echo "<script>alert(Feedback submitted);</script>";
	$conn = dbConnection();
	$feedback_description=$_POST["feedback-description"];
	$sql="INSERT INTO feedback(user_id, message) VALUES (2, '".$feedback_description."')";
	if($query = mysqli_query($conn,$sql))
	{
		echo "<script>alert(Feedback was submitted successfully);</script>";
	}
	else
	{
		//echo "<script>alert(Feedback was not submitted);</script>";
	}
	mysqli_close($conn);
}
	
?>