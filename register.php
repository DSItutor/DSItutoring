<?php
include('database/config.php');

if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Gender = $_POST['Program'];
    $Email = $_POST['Email'];
    $Subject1 = $_POST['Subject1'];
    $Subject2 = $_POST['Subject2'];
    $Address = $_POST['Address'];
    $ContactNum = $_POST['ContactNum'];
    $Password = $_POST['password'];

    $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
    $reference = $_POST['reference'];
    $proof = $_FILES['proof']['name'];
    $tmp_name = $_FILES['proof']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($proof);

    if (move_uploaded_file($tmp_name, $target_file)) {
        $Actions = "Pending";

        $checkQuery = "SELECT COUNT(*) as count FROM Students WHERE Email = '$Email'";
        $result = $conn->query($checkQuery);
        $row = $result->fetch_assoc();
        if ($row['count'] > 0) {
            // Email already exists, display error message or take appropriate action
        } else {
            $sql = "INSERT INTO Students (FirstName, LastName, Subject1, Subject2, Email, Address, ContactNum, Password, Actions, reference, proof) VALUES ('$FirstName', '$LastName', '$Subject1', '$Subject2', '$Email', '$Address', '$ContactNum', '$hashed_password', '$Actions', '$reference', '$proof')";

            if ($conn->query($sql) === TRUE) {
                // Get the ID of the inserted record
                $inserted_id = $conn->insert_id;

                // Redirect to thank you page
                header("Location: thank_you.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="home.page.pic/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="home.page.pic/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="home.page.pic/logo.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title> DSI Tutoring | Application</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');

    .flex-row {
        display: flex;
    }

    .wrapper {
        border: 1px solid #000000;
        border-right: 0;
    }

    canvas#signature-pad {
        background: #100d1030;
        width: 100%;
        height: 100%;
        cursor: crosshair;
    }

    button#clear {
        height: 100%;
        background: #000000;
        border: 1px solid transparent;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    button#clear span {
        transform: rotate(90deg);
        display: block;
    }
</style>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Login.php" target="_self">
                <i class="fa fa-sign-in text-light"> login</i>
            </a>
        </div>
    </nav>
    <br>
    <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="card m-5 bg-light">
            <div class="card-body p-4">
                <table style="width: 100%;border-radius:20%;">

                    <tbody>
                        <tr>
                            <td>
                                <div class="h1" style="text-align: center;"><strong>DSI Tutoring</strong>
                                </div>
                                <!-- <div class="h3" style="text-align: center;"><u>Sport &nbsp;Indemnity&nbsp;</u></div> -->
                                <p><br></p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">First Name
                                                :</label>
                                            <input type="text" class="form-control" name="FirstName" require="true"
                                                placeholder="Enter yourFirst Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Last Name
                                                :</label>
                                            <input type="text" class="form-control" name="LastName" require="true"
                                                placeholder="Enter yourFirst Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Gender:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="Program" require="true">
                                                <option selected>Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="Others">Others</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Email Address:</label>
                                            <input type="email" class="form-control" name="Email" require="true"
                                                placeholder="Enter your email address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Subject:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="Subject1" required>
                                                <option selected="">Select Subject</option>
                                                <option value="Dev1">Development Software 1</option>
                                                <option value="Dev2">Development Software 2</option>
                                                <option value="Tp1">Technical Programming 1</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Subject: (Optional)
                                            </label>
                                            <select class="form-select" aria-label="Default select example"
                                                name="Subject2">
                                                <option selected="">Select Subject</option>
                                                <option value="Dev1">Development Software 1</option>
                                                <option value="Dev2">Development Software 2</option>
                                                <option value="Tp1">Technical Programming 1</option>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Address:</label>
                                            <input type="text" name="Address" class="form-control" require="true"
                                                placeholder="Enter your address">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Contact Number:</label>
                                            <input type="text" name="ContactNum" onchange="checkPhone1()"
                                                id="phone_number" placeholder="Enter your phone number e.g 0811234567"
                                                pattern="[0-9]{10}" class="form-control" require="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Password:</label>
                                            <input type="text" name="password" class="form-control"
                                                placeholder="Create a new password" require="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Confirm Password:</label>
                                            <input type="text" name="ConPassword" id="next_of_kin_phone"
                                                class="form-control" placeholder="Confirm password " require="true">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Reference number:</label>
                                            <input type="text" name="reference" id="next_of_kin_phone"
                                                class="form-control" placeholder="Reference is your student Number" require="true">
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputPassword6" class="col-form-label">Proof of Payment:</label>
                                            <input type="file" name="proof" id="proof"
                                                class="form-control" placeholder="Reference is your student Number"   accept=".jpg,.jpeg,.png,.pdf"require="true">
                                                
                                              
                                        </div>
                                    </div>
                                    <p><br></p>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="submit" name="submit" id="save" class="btn btn-dark"
                                                class="form-control">
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       

        <script>
            function checkPhone1() {
                var phone = document.getElementById("phone_number").value;
                if (phone.length !== 10) {
                    alert(" Contact Number must be 10 digits");
                    document.getElementById("phone_number").value = "";
                    return false;
                }
                if ((phone.startsWith('0') == false || x.startsWith(0) == false)) {
                    alert(" Contact Number must start with 0");
                    document.getElementById("phone_number").value = "";
                    return false;
                }
            }

            document.getElementById("save").addEventListener("click", function(event) {
        var password = document.getElementsByName("password")[0].value;
        var confirm_password = document.getElementsByName("ConPassword")[0].value;

        if (password !== confirm_password) {
            alert("Passwords do not match.");
            event.preventDefault();
        }
    });
        </script>


    </form>
   
</body>

</html>