<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'thehamzaraj@gmail.com';

  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true; // You can set this to false if you don't want to use AJAX

// Set email parameters
$contact->to = $receiving_email_address; // This is where the email will be sent
$contact->from_name = $_POST['name']; // Sender's name (taken from the form)
$contact->from_email = $_POST['email']; // Sender's email (taken from the form)
$contact->subject = $_POST['subject']; // Email subject (taken from the form)

// Uncomment and fill in with your SMTP credentials if you want to use SMTP
/*
$contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
);
*/

// Add form data to the email message
$contact->add_message($_POST['name'], 'From'); // Add sender's name to the email message
$contact->add_message($_POST['email'], 'Email'); // Add sender's email to the email message
$contact->add_message($_POST['message'], 'Message', 10); // Add message content to the email message

// Send the email and echo the result
echo $contact->send();
?>
