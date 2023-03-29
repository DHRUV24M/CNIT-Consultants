<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form has been submitted


    // retrieve data using post request and sanitize it to prevent SQL injection attacks and other vulnrebilties
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // validate the data and look if it meets the form requrements
    if (empty($name) || empty($email) || empty($message)) {
        // one or more fields are empty
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // email address is not valid
      } elseif (strlen($message) < 10) {
        // message is too short
      } else {
        // form data is valid, proceed with processing
      }

      // if form is valid then send an email and store in database
        $to = "youremail@example.com";
        $subject = "New message from " . $name;
        $body = "Name: " . $name . "\n\n" . "Email: " . $email . "\n\n" . "Message: " . $message;
        $headers = "From: " . $email;

        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you for your message!";
        } 
        else {
            echo "An error occurred while sending your message.";
        }

        // message to user if the form is sucessfully submited or not
        if (mail($to, $subject, $body, $headers)) {
            echo "<p>Thank you for your message!</p>";
        } else {
            echo "<p>An error occurred while sending your message. Please try again later.</p>";
            }
}
?>