<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if the user is an admin (You can also validate based on roles or privileges)
include('database/config.php');
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// If user is not an admin, redirect to login
if ($result->num_rows <= 0) {
    header("Location: login.php");
    exit;
}

require_once('database/config.php');
$query = "SELECT StudentID, FirstName, LastName, Subject1, Subject2, Email, Actions FROM Students";
$results = mysqli_query($conn, $query);
$countQuery = "SELECT COUNT(*) AS total FROM Students";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalStudents = $countRow['total'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fect data from Php database</title>
    <link rel="stylesheet" href="vendors/styles/adminDash.css">
</head>

<body>
<header>
<nav>
    <div class="title"><b> DSI Tutoring</b></div>
				<div class="nav-upper-options"> 
					<div class="nav-option"> 
						<h3><a href=""> Dashboard</a></h3> 
					</div> 
 

					<div class="nav-option"> 

						<h3><a href="">Insights</a></h3> 
					</div> 

					<div class="nav-option"> 
						<h3><a href="">Grading</a></h3> 
					</div> 

					<div class="nav-option"> 
						<h3><a href=""> Files</a></h3> 
					</div> 

					<div class="nav-option"> 
						<h3><a href="">Settings</a></h3> 
					</div> 

					<div class="nav-option"> 
						<h3><a href="">Logout</a></h3> 
					</div> 

				</div> 
			</nav> 
		</div>
        </nav> 
        </header>
        <div class="main">
<div class="box-container"> 

				<div class="box box1">
	<div class="text">
		<h2 class="topic-heading"><?php echo $totalStudents; ?></h2>
		<h2 class="topic" name="enrolled">Enrolled Students</h2>

    </div>
    
	</div>
    		<div class="box box1">
	<div class="text">
		<h2 class="topic-heading"><?php echo $totalStudents; ?></h2>
		<h2 class="topic" name="DEV1">DEV1</h2>

    </div>
    
	</div>
    		<div class="box box1">
	<div class="text">
		<h2 class="topic-heading"><?php echo $totalStudents; ?></h2>
		<h2 class="topic" name="DEV2">DEV2</h2>

    </div>
    
	</div>
     <div class="box box4"> 
					<div class="text"> 
						<h2 class="topic-heading"><?php echo $totalStudents; ?></h2> 
						<h2 class="TP1">TP1</h2> 
					</div> 
        </div>
	</div>

   <div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <br>
                <div class="card-header">
                    <h2 class="display-6"><b>Registered Students</b></h2>
                    <div class="search">
                        <form action="search_results.php" method="GET">
                            <input type="text" name="search_term" placeholder="Search Student">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <br>
                <hr>
                <div class="card-body">
                    <table class="table-border">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Subject 1</th>
                            <th>Subject 2</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_assoc($results)) {
                        ?>
                        <tr>
                            <td><?php echo $row['FirstName']?></td>
                            <td><?php echo $row['LastName']?></td>
                            <td><?php echo $row['Subject1']?></td>
                            <td><?php echo $row['Subject2']?></td>
                            <td><a href="Email.php"><?php echo $row['Email']?></a></td>
                            <td><?php echo $row['Actions']?></td>
                            <td class="button-primary"><a href="#" class="delete-button">Delete</a></td>
                        </tr>
                        <?php
                        } 
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</body>

</html>