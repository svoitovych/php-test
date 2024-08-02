<?php
  session_start();
  $title = "Contacts";
  include_once "blocks/header.php";

  $username = $_SESSION['user_name'];
  $email = $_SESSION['email'];
  $subject = $_SESSION['subject'];
  $message = $_SESSION['message'];
?>

<h1><?=$title?></h1>
<?php
  if (isset($_SESSION['success_mail']))
      echo "<div class='text-success'>" . $_SESSION['success_mail']. "</div>";
?>

<form action="check_contact.php" method="post">
  <input type="text" name="username" value="<?=$username?>" placeholder="Enter you name" class="form-control">
    <div class="text-danger"><?=$_SESSION['error_username'] ?? ''?></div>
    <br>
  <input type="email" name="email" value="<?=$email?>" placeholder="Enter you email" class="form-control">
    <div class="text-danger"><?=$_SESSION['error_email'] ?? ''?></div>
    <br>
  <input type="text" name="subject" value="<?=$subject?>" placeholder="Message subject" class="form-control">
    <div class="text-danger"><?=$_SESSION['error_subject'] ?? ''?></div>
    <br>
  <textarea name="message" placeholder="Enter a message" class="form-control"><?=$message?></textarea>
    <div class="text-danger"><?=$_SESSION['error_message'] ?? ''?></div>
    <br>
  <button tupe="submit" class="btn btn-success">Send</button>
</form>

<?php
  include_once "blocks/footer.php";
?>
