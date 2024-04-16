<!-- <?php
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["Send"])) {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kgaugelommakola@gmail.com';
        $mail->Password = 'fbenqhknmusvlebl';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Sender and recipient
        $mail->setFrom($email, $name); // Sender's email and name
        $mail->addAddress('kgaugelommakola@gmail.com'); // Admin's email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Contact Information from $name";
        $mail->Body = "<p><strong>Name:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Message:</strong></p>
                       <p>$message</p>";

        // Send email
        if ($mail->send()) {
            echo '<script>alert("Message has been sent successfully.");</script>';
        } else {
            echo '<script>alert("Error: '. $mail->ErrorInfo. '");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("An error occurred. Please try again later.");</script>';
        echo 'Error: '. $e->getMessage(); // Display detailed PHPMailer exception message
    }
}
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="indexstyle.css" .css>
    <title>DSI Tutoring | Contact</title>

</head>
<style>
 .input-container {
  position: relative;
  margin: 1rem 0;
}


.input {
  width: 100%;
  outline: none;
  border: 2px solid #fafafa;
  background: none;
  padding: 0.6rem 1.2rem;
  color: #fff;
  font-weight: 500;
  font-size: 0.95rem;
  letter-spacing: 0.5px;
  border-radius: 5px;
  transition: 0.3s;
}

textarea.input {
  padding: 0.8rem 1.2rem;
  min-height: 150px;
  border-radius: 5px;
  resize: none;
  overflow-y: auto;
}


.btn {
  padding: 0.6rem 1.3rem;
  background-color: #4b1290;
  border: none;
  font-size: 0.95rem;
  color: #fff;
  line-height: 1;
  border-radius: 5px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  margin-left: 20px;
  width: 100%;
  position: relative;
  margin: 1rem 0;
  margin-left: 20px;
 
}


.btn:hover {
  background-color: #360f6f;
  
}


.right-box{
    text-align: center;
   
}
.contact-info {
  padding: 2.3rem 2.2rem;
  position: relative;
}

.contact-info .title {
  color: #1abc9c;
}

.text {
  color: #fff;
  margin: 1.5rem 0 2rem 0;
}

.information {
  display: flex;
  color: #555;
  margin: 0.7rem 0;
  align-items: center;
  font-size: 0.95rem;
}

.information i {
  color: #1ABC9C;
}

.icon {
  width: 28px;
  margin-right: 0.7rem;
}

.social-media {
  padding: 2rem 0 0 0;
}

.social-media p {
  color: #333;
}

.social-icons {
  display: flex;
  margin-top: 0.5rem;
}

.social-icons a {
  width: 35px;
  height: 35px;
  border-radius: 5px;
  background: linear-gradient(45deg, #4b1290, #149279);
  color: #fff;
  text-align: center;
  line-height: 35px;
  margin-right: 0.5rem;
  transition: 0.3s;
}

.social-icons a:hover {
  transform: scale(1.05);
}


.form{
    display: flex;
}
.left-box{
    display: flex;
}

</style>
<body>
    <header>
        <div class="logo">
            <img src="home.page.pic\logo.png" alt="Logo">
        </div>

        <nav>
            <a href="index.php" target="_self">Home</a> 
            <div class="dropdown">
                <a href="#">SUBJECTS</a>
                <div class="dropdown-content">
                    <a href="register.php" target="_self">DEVELOPMENT SOFTWARE 1</a>
                    <a href="register.php" target="_self">DEVELOPMENT SOFTWARE 2</a>
                    <a href="register.php" target="_self">TECHNICAL PROGRAMMING 1</a>
                </div>
            </div>
            <a href="contact.php" target="_self" style="color:#4b1290;">CONTACT</a>
            <a href="login.php" target="_self">LOGIN</a>
        </nav>
        <button onclick="window.location.href='register.php'">GET A TUTOR</button>
    </header>
    <main>
      <h1 style="text-align: center;">Enquiry Details</h1>
        <div class="container">
            <div class="left-box">
                <div class="form">
        <div class="contact-info">
         
          <p class="text">
            If  you have any questions or need assistance, please contact us.
          </p>

          <div class="info">
            <div class="information">
              <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp

              <p>Potsdam East, Eastern Cape, East London 5219</p>
            </div>
            <div class="information">
              <i class="fas fa-envelope"></i> &nbsp &nbsp
              <p>kgaugelommakola@outlook.com</p>
            </div>
            <div class="information">
              <i class="fas fa-phone"></i>&nbsp&nbsp
              <p>064-858-7175</p>
            </div>
          </div>
          <!-- <div class="social-media">
            <p style="color:#fff;">Connect with us: </p>
            <p>  </p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
            </div> -->
           <!-- <div class="contact-info" style="width: 30vh;">
              
                <form  method="post" >
                    <div class="input-container">
              <input type="text" name="name" class="input" placeholder="Enter your First Name" />
              
              
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" placeholder="Enter you Email Address"/>
              
             
            </div>
            <div class="input-container textarea">
                
              <textarea name="message" class="input" placeholder="Enter your message"></textarea>
             
              
            </div>
            <input type="submit" name="Send" class="btn" />
                </form> -->
            </div>
        </div>
    </main>
</body>
</html>