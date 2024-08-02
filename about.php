<?php
  $title = 'About us';
  require_once "blocks/header.php";
?>
<div class="container">
    <h1>About us</h1>
    <form action="check_get.php" method="get">
        <input type="text" name="user-name" placeholder="Enter you name" class="form-control">
        <br>
        <input type="email" name="email" placeholder="Enter you email" class="form-control">
        <br>
        <input type="password" name="password" placeholder="Enter you password" class="form-control">
        <br>
        <textarea name="message" placeholder="Enter a message" class="form-control"></textarea>
        <br>
        <input type="submit" value="Send" class="btn btn-success">
    </form>
</div>

<?php
  require_once "blocks/footer.php";
?>