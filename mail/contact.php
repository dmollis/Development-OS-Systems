<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "Danil.20033449@gmail.com"; 
$subject = "$m_subject:  $name";
$body = "Ви отримали нове повідомлення з контактної форми вашого сайту.\n\n"."Ось деталі:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "Від: $email";
$header .= "Відповідати на: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
