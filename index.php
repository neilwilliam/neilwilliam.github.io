<?php  
 
 if(isset($_POST['submit'])) {
  $mailto = "neilsites@programmer.net";  //My email address
  //getting customer data
  $name = $_POST['name']; //getting customer name
  $fromEmail = $_POST['email']; //getting customer email
  $phone = $_POST['tel']; //getting customer Phome number
  $subject = $_POST['subject']; //getting subject line from client
  $subject2 = "Thanks for Contacting us! | Neils Sites"; // For customer confirmation
  $body = file_get_contents("./contact.php");
  $head = "MIME-Version: 1.0\r\n";
  $head .= "Content-type: text/html; charset=utf-8";
  
  //Email body I will receive
  $message = "Client Name: " . $name . "\n"
  . "Phone Number: " . $phone . "\n\n"
  . "Client Message: " . "\n" . $_POST['message'];
  
  //Message for client confirmation
  $message2 = "Dear " . $name . " \n"
  . "Thank you for contacting us! We will get back to you shortly!" . "\n\n"
  . "Regards," . "\n" . "- Neils Sites";
  
  //Email headers
  $headers = "From: " . $fromEmail; // Client email, I will receive
  $headers2 = "From: " . $mailto; // This will receive client
  
  //PHP mailer function
  
   $result1 = mail($mailto, $subject, $message, $headers); // This email sent to My address
   $result2 = mail($fromEmail, $subject2, $headers2, $body, $head); //This confirmation email to client
   //Checking if Mails sent successfully
  
   if ($result1 && $result2) {
     $success = "Your Message was sent Successfully!";
   } else {
     $failed = "Sorry! Message was not sent! Please try again later!";
   }
  
 }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/main.scss">
  <link rel="stylesheet" href="/css/contact.css">
  <link rel="shortcut icon" href="/images/favicons/main-logo-favicons/favicon.ico" type="image/x-icon" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <title>Contact</title>
</head>
<body>
<nav class="navbar">
      <div class="navbar-container container">
          <input type="checkbox" name="" id="">
          <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
          </div>
          <ul class="menu-items">
              <li><a href="/index.html">Home</a></li>
              <li><a href="/about/">About</a></li>
              <li><a href="/contact/">Contact Us</a></li>
              <li><a href="/website/">Get your Website Today!</a></li>
          </ul>
          <a href="/index.html" class="logo"><img src="/images/logo.png"></a>
      </div>
  </nav>
  <br>
  <br>
  <div class="main-contact">
  <div class="contact">
  <form id="contact" method="post">
    <h3>Contact Us</h3>
    <p>Contact us today!</p>
      <br>
      <input placeholder="Your name" name="name" type="text" tabindex="1" autofocus>
      <br>
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2">
      <br>
      <input placeholder="Your Phone Number" name="tel" type="tel" tabindex="3" >
      <br>
      <input placeholder="Type your subject line" type="text" name="subject" tabindex="4">
      <br>
      <textarea type="text" class="msg" name="message" placeholder="Type your Message Here..." tabindex="5" ></textarea>
      <br>
    <div>
       <p class="success"> <?php echo $success;  ?></p>
       <p class="failed"> <?php echo $failed;  ?></p>
    </div>
      <button class="send-btn" type="submit" name="submit" id="contact-submit" data-submit="...Sending">Send</button>
  </form>
</div>
  </div>
  <br>
  <div class="cpyrght">
  <footer>
    © <span id="year"></span> Neils Sites
</footer>
  </div>
  <script src="/js/main.js"></script>
</body>
</html>
