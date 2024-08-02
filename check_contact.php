<?php
  session_start();

  unset($_SESSION['user_name']);
  unset($_SESSION['email']);
  unset($_SESSION['subject']);
  unset($_SESSION['message']);

  unset($_SESSION['error_username']);
  unset($_SESSION['error_email']);
  unset($_SESSION['error_subject']);
  unset($_SESSION['error_message']);

  unset($_SESSION['success_mail']);

  function redirect() {
    header('Location: contacts.php');
    exit;
  }

  $user_name = htmlspecialchars(trim($_POST['username']));
  $from = htmlspecialchars(trim($_POST['email']));
  $subject = htmlspecialchars(trim($_POST['subject']));
  $message = htmlspecialchars(trim($_POST['message']));

  $_SESSION['user_name'] = $user_name;
  $_SESSION['email'] = $from;
  $_SESSION['subject'] = $subject;
  $_SESSION['message'] = $message;

  if (strlen($user_name) <= 2)
    $_SESSION['error_username'] = "Please enter correct name";

  if (strlen($from) < 5 || !strpos($from, "@"))
    $_SESSION['error_email'] = "Please enter valid email address";

  if (strlen($subject) <= 5)
    $_SESSION['error_subject'] = "Subject should be at least 5 characters long";

  if (strlen($message) <= 15)
    $_SESSION['error_message'] = "Message should be at least 15 characters long";

  if (!isset($_SESSION['error_username'])
    && !isset($_SESSION['error_email'])
    && !isset($_SESSION['error_subject'])
    && !isset($_SESSION['error_message'])
  ) {
    $subject = "=?UTF-8?B?".base64_encode($subject)."?=";
    $headers  = "From: $from\r\nReply-To: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
    mail('adfasdc@gmail.com', $subject, $message, $headers);

    $_SESSION['success_mail'] = "Emails sent successfully";
  }

  redirect();
