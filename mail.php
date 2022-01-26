<?php

use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;

require("includes/utilities.php");
require("vendor/autoload.php");

if (isset($_POST["send_message"])) {

  $email = new Mail();

  $client_name = cleanData($_POST["name"]);
  $client_email = cleanData($_POST["email"]);
  $client_message = cleanData($_POST["message"]);

  try {
    $email->setFrom("consult@nyamusa.tech", "Innocent Nyamusa");
  } catch (TypeException $e) {

  }
  try {
    $email->setSubject("Thanks for getting in touch");

  } catch (TypeException $e) {
  }
  try {
    $email->addTo("$client_email", "$client_name");

  } catch (TypeException $e) {
  }
  try {
    $email->addContent("text/plain", "$client_message");
  } catch (TypeException $e) {
  }
  try {
    $email->addContent("text/html", "<strong>$client_message</strong>");
  } catch (TypeException $e) {
  }

  $sendgrid = new SendGrid("sengrid_key");

  try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
  } catch (Exception $e) {
    echo "Caught exception " . $e->getMessage() . "\n";
  }

}

