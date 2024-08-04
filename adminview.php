<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- choose a theme file -->
<link rel="stylesheet" href="css/theme.jui.min.css">
<!-- load jQuery and tablesorter scripts -->
<!--<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>

<-- tablesorter widgets (optional)
<script type="text/javascript" src="js/jquery.tablesorter.widgets.min.js"></script>
<script src="js/widgets/widget-filter.min.js"></script>
<script src="js/widgets/widget-stickyHeaders.min.js"></script>
<script src="js/widgets/widget-storage.js"></script>
<script src="js/widgets/widget-uitheme.min.js"></script>
<script src="js/widgets/widget-filter-formatter-jui.min.js"></script>
<script src="js/widgets/widget-columnSelector.min.js"></script>
-->

<link rel="stylesheet" type="text/css" href="css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.yadcf.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">


<title>Admin Dashboard</title>
<style>

body {
  font-family: 'Arial', sans-serif;
  background-color: #e9f3f9; /* light blue */
  margin: 0;
  padding: 0;
}

header {
  background-color: #002d72; /* darker blue */
  color: #ffffff; /* white */
  padding: 20px;
  text-align: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

nav {
  background-color: #004a8f; /* medium blue */
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
  color: #b0d4f1; /* light blue */
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
  color: #002d72; /* darker blue */
}

button, .button {
  padding: 10px 20px;
  background-color: #002d72; /* darker blue */
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  font-weight: 500;
}

button:hover, .button:hover {
  background-color: #001e4a; /* even darker blue */
}

form {
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table, th, td {
  border: 1px solid #cccccc;
}

th, td {
  padding: 10px;
  text-align: left;
}

th {
  background-color: #002d72; /* darker blue */
  color: #ffffff; /* white */
}

tr:nth-child(even) {
  background-color: #f9f9f9; /* very light gray */
}

form table tr td {
  border: none;
  background-color: #ffffff;
}

.dt-button-collection .dt-button.buttons-columnVisibility {
  background: none !important;
  background-color: transparent !important;
  box-shadow: none !important;
  border: none !important;
  padding: 0.25em 1em !important;
  margin: 0 !important;
  text-align: left !important;
}

.dt-button-collection .buttons-columnVisibility:before,
.dt-button-collection .buttons-columnVisibility.active span:before {
  display: block;
  position: absolute;
  top: 1.2em;
  left: 0;
  width: 12px;
  height: 12px;
  box-sizing: border-box;
}

.dt-button-collection .buttons-columnVisibility:before {
  content: ' ';
  margin-top: -8px;
  margin-left: 10px;
  border: 1px solid #000000; /* black */
  border-radius: 3px;
}

.dt-button-collection .buttons-columnVisibility.active span:before {
  font-family: 'Arial' !important;
  content: '\2714'; /* check mark */
  margin-top: -15px;
  margin-left: 12px;
  text-align: center;
  text-shadow: 1px 1px #ffffff, -1px -1px #ffffff, 1px -1px #ffffff, -1px 1px #ffffff;
}

.dt-button-collection .buttons-columnVisibility span {
  margin-left: 17px;
  float: right;
}

.dt-down-arrow {
  float: none;
  display: none;
}

.dt-button, .buttons-collection, .buttons-colvis span {
  float: right;
  margin-left: 30px;
}

.dataTables_length label {
  margin-top: 10px;
}

.dataTables_filter label,
.dataTables_filter input {
  display: none;
}

td {
  vertical-align: middle !important;
}

td p {
  margin: unset;
}


</style>
</head>
<body>
  <header>
    <div class="logo">
      <h1>Admin Dashboard</h1>
    </div>
    <nav>
      <ul>
        <li><a href="#manage-users" onclick="showSection('manage-users')">Manage Users</a></li>
        <li><a href="#feedback" onclick="showSection('feedback')">View Feedback</a></li>
        <li><a href="#issues" onclick="showSection('issues')">View Issues</a></li>
        <li><a href="#technician-responses" onclick="showSection('technician-responses')">Technician Responses</a></li>
		<li><a href="#technician-feedback-responses" onclick="showSection('technician-feedback-responses')">Technician Feedback Responses</a></li>
    <li><a href="index.php">Log Out</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section id="manage-users" class="section" >
      <h2>Manage Users</h2>
      <form id="addUserForm">
    <h3>Add User</h3>
    <table border=0>
        <tr>
            <td><label for="firstname">First Name:</label></td>
            <td><input type="text" id="firstname" name="firstname" required></td>
        </tr>
        <tr>
            <td><label for="lastname">Last Name:</label></td>
            <td><input type="text" id="lastname" name="lastname" required></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" id="email" name="email" required></td>
        </tr>
        <tr>
            <td><label for="company">Company:</label></td>
            <td><input type="text" id="company" name="company" required></td>
        </tr>
        <tr>
            <td><label for="userid">User ID:</label></td>
            <td><input type="text" id="userid" name="userid" required></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" id="password" name="password" required></td>
        </tr>
        <tr>
            <td><label for="role">Role:</label></td>
            <td>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="client">Client</option>
                    <option value="technician">Technician</option>
                </select>
            </td>
        </tr>
        <tr style="background-color: #ffffff;">
            <td><button type="submit" class="button">Add User</button></td>
            <td><button type="reset" class="button"></button></td>
        </tr>
    </table>
</form>

	  </table><br/><br/>
	  <div id="columnFilter"></div>
      <div id="userList"></div>
    </section>

    <section id="feedback" class="section" style="display:none;">
      <h2>View and Respond to Feedback</h2>
      <div id="feedbackList"></div>
    </section>

    <section id="issues" class="section" style="display:none;">
      <h2>View and Respond to Issues</h2>
      <div id="issueList"></div>
    </section>

    <section id="technician-responses" class="section" style="display:none;">
      <h2>View Technician Responses</h2>
      <div id="responseList"></div>
    </section>
	
	<section id="technician-feedback-responses" class="section" style="display:none;">
      <h2>View Technician Feedback Responses</h2>
      <div id="feedbackResponseList"></div>
    </section>
	
  </main>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.buttons.min.js"></script>
  <script src="js/buttons.colVis.min.js"></script>
  <script src="js/jquery.dataTables.yadcf.js"></script>

  <script>
    function showSection(sectionId) {
      const sections = document.querySelectorAll('.section');
      sections.forEach(section => {
        section.style.display = 'none';
      });
      document.getElementById(sectionId).style.display = 'block';
    }
    document.getElementById('addUserForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const user = {
        firstname: formData.get('firstname'),
        lastname: formData.get('lastname'),
        email: formData.get('email'),
        company: formData.get('company'),
        userid: formData.get('userid'),
        password: formData.get('password'),
        role: formData.get('role')
    };
    fetch('add_users.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(user)
    })
    .then(response => response.text())
    .then(data => {
        console.log('Response:', data);
        if (data.includes("User added successfully")) {
            alert('User added successfully!');
            event.target.reset();
            loadUsers();
        } else {
            alert('Failed to add user: ' + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});

    function loadUsers() {
    fetch('fetch_users.php')
        .then(response => response.json())
        .then(data => {
            console.log('Users:', data.users);
            const userList = document.getElementById('userList');
            userList.innerHTML = '';
            if (data.users.length === 0) {
                userList.innerHTML = '<p>No users found.</p>';
            } else {
                const userDiv = document.createElement('div');
                const table = document.createElement('table');
                table.setAttribute('id', 'usersTable');
                
                const thead = document.createElement('thead');
                const headerRow = document.createElement('tr');
                
                const headers = ['User ID', 'Firstname', 'Lastname', 'Email', 'Company', 'Role'];
                headers.forEach(headerText => {
                    const th = document.createElement('th');
                    th.appendChild(document.createTextNode(headerText));
                    headerRow.appendChild(th);
                });
                
                thead.appendChild(headerRow);
                table.appendChild(thead);
                
                const tbody = document.createElement('tbody');
                table.appendChild(tbody);
                
                data.users.forEach(user => {
                    const row = document.createElement('tr');
                    
                    const userid_td = document.createElement('td');
                    userid_td.appendChild(document.createTextNode(`${user.userid}`));
                    row.appendChild(userid_td);
                    
                    const firstname_td = document.createElement('td');
                    firstname_td.appendChild(document.createTextNode(`${user.firstname}`));
                    row.appendChild(firstname_td);
                    
                    const lastname_td = document.createElement('td');
                    lastname_td.appendChild(document.createTextNode(`${user.lastname}`));
                    row.appendChild(lastname_td);
                    
                    const email_td = document.createElement('td');
                    email_td.appendChild(document.createTextNode(`${user.email}`));
                    row.appendChild(email_td);
                    
                    const company_td = document.createElement('td');
                    company_td.appendChild(document.createTextNode(`${user.company}`));
                    row.appendChild(company_td);
                    
                    const role_td = document.createElement('td');
                    role_td.appendChild(document.createTextNode(`${user.role}`));
                    row.appendChild(role_td);
                    
                    tbody.appendChild(row);
                });
                
                userList.appendChild(table);
                userList.appendChild(userDiv);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to load users.');
        });
}

    
		function loadFeedback() {
      fetch('fetch_feedback.php')
        .then(response => response.json())
        .then(data => {
          //data = JSON.parse(data);
          console.log('Feedback:', data.feedback);
          const feedbackList = document.getElementById('feedbackList');
          feedbackList.innerHTML = '';
          if (data.feedback.length === 0) {
            feedbackList.innerHTML = '<p>No feedback found.</p>';
          } else {
            const feedbackDiv = document.createElement('div');
			  const table = document.createElement('table');
			  //table.setAttribute('border', '1');
			  // Create thead element and append it to the table
			const thead = document.createElement('thead');
			const headerRow = document.createElement('tr');

			// Define the table headers
			const headers = ['#','Message'];

			headers.forEach(headerText => {
				const th = document.createElement('th');
				th.appendChild(document.createTextNode(headerText));
				if(headerText=="#")
				{					
				th.classList.add("filter-false");
				}
				headerRow.appendChild(th);
			});

			thead.appendChild(headerRow);
			table.appendChild(thead);
			// Create tbody element and append it to the table
			const tbody = document.createElement('tbody');
			table.appendChild(tbody);
            data.feedback.forEach(feedback => {
				const row = document.createElement('tr');
              const id_td = document.createElement('td');
              id_td.appendChild(document.createTextNode(`${feedback.id}`));
			  row.appendChild(id_td);
			const message_td = document.createElement('td');
			  message_td.appendChild(document.createTextNode(`${feedback.message}`));
			row.appendChild(message_td);        
			tbody.appendChild(row);
             // userDiv.textContent = `${user.firstname} ${user.lastname} (${user.role})`;
			 
            });
            feedbackList.appendChild(table);
            feedbackList.appendChild(feedbackDiv);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to load feedback.');
        });
    }
    function loadIssues() {
      fetch('fetch_issues.php')
        .then(response => response.json())
        .then(data => {
          //data = JSON.parse(data);
          console.log('Issues:', data.issues);
          const issueList = document.getElementById('issueList');
          issueList.innerHTML = '';
          if (data.issues.length === 0) {
            issueList.innerHTML = '<p>No issue was found in the database.</p>';
          } else {
            const issuesListDiv = document.createElement('div');
			  const table = document.createElement('table');
			  //table.setAttribute('border', '1');
			  // Create thead element and append it to the table
			const thead = document.createElement('thead');
			const headerRow = document.createElement('tr');

			// Define the table headers
			const headers = ['#','Issue'];

			headers.forEach(headerText => {
				const th = document.createElement('th');
				th.appendChild(document.createTextNode(headerText));
				if(headerText=="#")
				{					
				th.classList.add("filter-false");
				}
				headerRow.appendChild(th);
			});

			thead.appendChild(headerRow);
			table.appendChild(thead);
			// Create tbody element and append it to the table
			const tbody = document.createElement('tbody');
			table.appendChild(tbody);
            data.issues.forEach(issue => {
				const row = document.createElement('tr');
              const id_td = document.createElement('td');
              id_td.appendChild(document.createTextNode(`${issue.id}`));
			  row.appendChild(id_td);
			const message_td = document.createElement('td');
			  message_td.appendChild(document.createTextNode(`${issue.issue}`));
			row.appendChild(message_td);        
			tbody.appendChild(row);             			 
            });
            issueList.appendChild(table);
            issueList.appendChild(issuesListDiv);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to load issues.'+error);
        });
    }
    function loadTechniciansResponses() {
      fetch('fetch_technicians_responses.php')
        .then(response => response.json())
        .then(data => {
          //data = JSON.parse(data);
          console.log('Technician Responses:', data.technician_responses);
          const responseList = document.getElementById('responseList');
          responseList.innerHTML = '';
          if (data.technician_responses.length === 0) {
            responseList.innerHTML = '<p>No Technician Response was found.</p>';
          } else {
            const responseListDiv = document.createElement('div');
			  const table = document.createElement('table');
			  //table.setAttribute('border', '1');
			  // Create thead element and append it to the table
			const thead = document.createElement('thead');
			const headerRow = document.createElement('tr');

			// Define the table headers
			const headers = ['#','Technician Response'];

			headers.forEach(headerText => {
				const th = document.createElement('th');
				th.appendChild(document.createTextNode(headerText));
				if(headerText=="#")
				{					
				th.classList.add("filter-false");
				}
				headerRow.appendChild(th);
			});

			thead.appendChild(headerRow);
			table.appendChild(thead);
			// Create tbody element and append it to the table
			const tbody = document.createElement('tbody');
			table.appendChild(tbody);
            data.technician_responses.forEach(technician_responses => {
				const row = document.createElement('tr');
              const id_td = document.createElement('td');
              id_td.appendChild(document.createTextNode(`${technician_responses.id}`));
			  row.appendChild(id_td);
			const message_td = document.createElement('td');
			  message_td.appendChild(document.createTextNode(`${technician_responses.response}`));
			row.appendChild(message_td);        
			tbody.appendChild(row);             			 
            });
            responseList.appendChild(table);
            responseList.appendChild(responseListDiv);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to load technician responses.'+error);
        });
    }
	function loadTechniciansFeedbackResponses() {
      fetch('fetch_technician_feedback_responses.php')
        .then(response => response.json())
        .then(data => {
          //data = JSON.parse(data);
          console.log('Technician Feedback Responses:', data.technician_feedback_responses);
          const feedbackResponseList = document.getElementById('feedbackResponseList');
          feedbackResponseList.innerHTML = '';
          if (data.technician_feedback_responses.length === 0) {
            feedbackResponseList.innerHTML = '<p>No Technician Response was found.</p>';
          } else {
            const feedbackResponseListDiv = document.createElement('div');
			  const table = document.createElement('table');
			  //table.setAttribute('border', '1');
			  // Create thead element and append it to the table
			const thead = document.createElement('thead');
			const headerRow = document.createElement('tr');

			// Define the table headers
			const headers = ['#','Feedback Technician Response'];

			headers.forEach(headerText => {
				const th = document.createElement('th');
				th.appendChild(document.createTextNode(headerText));
				if(headerText=="#")
				{					
				th.classList.add("filter-false");
				}
				headerRow.appendChild(th);
			});

			thead.appendChild(headerRow);
			table.appendChild(thead);
			// Create tbody element and append it to the table
			const tbody = document.createElement('tbody');
			table.appendChild(tbody);
            data.technician_feedback_responses.forEach(technician_feedback_responses => {
				const row = document.createElement('tr');
              const id_td = document.createElement('td');
              id_td.appendChild(document.createTextNode(`${technician_feedback_responses.feedback_id}`));
			  row.appendChild(id_td);
			const message_td = document.createElement('td');
			  message_td.appendChild(document.createTextNode(`${technician_feedback_responses.feedback_response}`));
			row.appendChild(message_td);        
			tbody.appendChild(row);             			 
            });
            feedbackResponseList.appendChild(table);
            feedbackResponseList.appendChild(feedbackResponseListDiv);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Failed to load technician feedback responses.');
        });
    }
	loadUsers();
	loadFeedback();
  loadIssues();
  loadTechniciansResponses();
  loadTechniciansFeedbackResponses();
  
	$(document).ready(function () {
	var oTable=$('#usersTable').DataTable( {
       "dom": 'lBfrtlip',
       "fixedHeader": true,
	   "pagingType": "full_numbers",
	   "deferRender": true,
	   "lengthMenu": [[10, 25, 50, 100,-1], [10, 25, 50, 100,"All"]],
       "buttons": [
					{"extend": 'colvis',"text": 'Show / Hide Columns',"container": '#columnFilter',"postfixButtons": ['colvisRestore']
				  }],
    });
	yadcf.init(oTable,[
	{column_number : 0, filter_type: "text",filter_default_label: "filter by firstname"},
	{column_number : 1, filter_type: "text",filter_default_label: "filter by lastname"},
	{column_number : 2, filter_type: "select",filter_default_label: "filter by role"}
	]);
	
	});
  </script>
</body>
</html>
