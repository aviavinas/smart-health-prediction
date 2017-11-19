<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Install Manager</title>
</head>
<body style="text-align: center">
  <fieldset>
  <form method="post" action="#" name="install-form">
	 <label>Enter Database : 
       <input type="text" name="db_name" placeholder="Enter Database Name ...." value="medical" />
     </label><br><br><br>
     <input type="submit" style="background-color: green; color: #fff; padding:4px 8px;" name="submit" value="install" /> <br><br>
  </form>
  <fieldset>
</body>
</html>

<?php 
require_once("installer.php");
if(isset($_REQUEST['submit']) && (isset($_REQUEST['db_name']) && !empty($_REQUEST['db_name']))) {
	$_db->database = $_REQUEST['db_name'];
	$installManager->makeInstall();
}
?>
