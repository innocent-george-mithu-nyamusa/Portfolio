<?php
require "vendor/autoload.php";
require "includes/utilities.php";
require "includes/db.php";

if (isset($_POST["send_message"])) {

  $email = new \SendGrid\Mail\Mail();

  $client_name = cleanData($_POST["name"]);
  $client_email = cleanData($_POST["email"]);
  $client_message = cleanData($_POST["message"]);


  $client_data_query = "INSERT INTO clients(client_name, client_email, client_message) VALUES(?,?,?)";

  $client_data_stmt = $pdo->prepare($client_data_query);
  $client_data_stmt->execute([$client_name, $client_email, $client_message]);

  $template = getTemplate();

  $email->setFrom("consult@nyamusa.tech", "Innocent Nyamusa");
  $email->setSubject("thank You For Getting in Touch");
  $email->addTo("$client_email", "$client_name");
  $email->addContent("text/plain", "Thank you for giving me the opportunity to acknowledge you. I couldn’t be prouder to call you our partner and a part of our community.Your loyalty and feedback have powered meaningful improvement in my work.For that, i am so grateful.");
  $email->addContent("text/html", "$template");

  $sendgrid = new \SendGrid("Sengrid Key");

  try {
    $response = $sendgrid->send($email);
    //print $response->statusCode() . "\n";
    //print_r($response->headers());
    //print $response->body() . "\n";
  } catch (\Exception $e) {
    echo "Caught exception " . $e->getMessage() . "\n";
  }
}
