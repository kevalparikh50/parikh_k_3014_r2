<?php
   require_once('phpscripts/config.php');
   // confirm_logged_in();
   if(isset($_POST['submit'])){
     $fname = trim($_POST['fname']);
     $username = trim($_POST['username']);
     $email = trim($_POST['email']);
     $lvllist = $_POST['lvllist'];
     if(empty($lvllist)){
       $message = "Please select the user level.";

     }else {
       $result = createUser($fname, $username, $email, $lvllist);
       $message = $result;
     }}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to the admin panel login</title>
</head>
<body>
  <h2>Create User</h2>
  <?php if(!empty($message)){ echo $message;} ?>
  <form action="admin_createuser.php" method="post">
    <label>First Name:</label>
    <input type="text" name="fname" value="">
    <label>Username:</label>
    <input type="text" name="username" value="">
    <label>Email:</label>
    <input type="text" name="email" value="">
    <select name="lvllist">
      <option value="">select the  user level</option>
      <option value="2">Web Admin</option>
      <option value="1">Web Master</option>
    </select>
    <input type="submit" name="submit" value="Create User">
    </form>

</body>
</html>
