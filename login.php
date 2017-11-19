<?php
require_once('lib/client.php');
$_user->unlockPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>MedAssist | Smart Health Prediction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="image/x-icon" href="/gallery/img/ic.png">
	<link rel="stylesheet" href="/gallery/css/main.css" />
	<link rel="stylesheet" href="/gallery/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/gallery/css/font-awesome-4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/gallery/css/login.css" />
</head>
<body>
<?php include_once("header.php"); ?>
	<div class="container-fluid p-2 justify-content-center row">
		<div class="jumbotron col-7 ml-3 pt-0 pb-2 mt-4">
			<div class="w-100 display-4 mb-4 pb-1">Sign Up</div>
			<?php $_ac->signUp(); ?>
			<form method="post" action="#">
				<div class="form-group row">
			    <label for="inputName" class="col-sm-2 col-form-label">Your Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control w-50" id="inputName" placeholder="Name" name="snName" required>
			    </div>
			  </div>
				<div class="form-group row">
			    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control w-75" id="inputEmail" placeholder="Email" name="snEmail" required>
			    </div>
			  </div>
        <div class="form-group row">
			    <label for="inputPass" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-5">
			      <input type="password" class="form-control" id="inputPass" placeholder="Password" name="snPass" required>
			    </div>
					<div class="col-sm-5">
			      <input type="password" class="form-control" id="inputPass" placeholder="Repeat Password" name="snPass" required>
			    </div>
			  </div>
        <div class="form-group row">
			    <label for="inputAge" class="col-sm-2 col-form-label">Age</label>
          <div class="form-group col-md-2">
			      <input type="number" min="1" max="125" class="form-control" id="inputAge" placeholder="Age" name="snAge" required>
		     </div>
		     <fieldset class="form-group ml-4">
		       <div class="row">
		         <legend class="col-form-legend col-sm-2">Gender</legend>
		         <div class="col-sm-10">
		       <select class="custom-select mb-2 mr-sm-2 mb-sm-0 ml-4" id="inlineFormCustomSelect"  name="snGen" required>
				     <option value="M">Male</option>
				     <option value="F">Female</option>
				     <option value="O">Other</option>
				   </select>
		     </div>
		       </div>
		     </fieldset>
			  </div>
        <div class="form-group row">
          <label for="inputPhone" class="col-sm-2 col-form-label">Phone </label>
          <div class="col-sm-10">
            <input type="text" class="form-control w-50" id="inputPhone" placeholder="Number" name="snPh" required>
          </div>
        </div>
			  <div class="form-group row justify-content-center">
			    <div class="col-sm-10 sndCont">
			      <button type="submit" class="btn btn-primary" name="snSub" value="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>Sign Up</button>
			    </div>
			  </div>
			</form>
   </div>
   <div class="jumbotron col-4 pt-0 pb-2 ml-5  mt-4">
     <div class="w-100 display-4 mb-4 pb-1">Log In</div>
			 <?php $_ac->login(); ?>
			 <form method="post" action="#">
			  <div class="form-group">
			    <label for="exampleDropdownFormEmail2">Email address</label>
			    <input type="email" class="form-control" value="avi@gmail.com" id="exampleDropdownFormEmail2" placeholder="email@example.com" name="lnEmail" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleDropdownFormPassword2">Password</label>
			    <input type="password" class="form-control" value="pass123" id="exampleDropdownFormPassword2" placeholder="Password" name="lnPass" required>
			  </div>
			  <div class="form-check">
			    <label class="form-check-label">
			      <input type="checkbox" class="form-check-input">
			      Remember me
			    </label>
			  </div>
		    <div class="form-group row justify-content-center">
		      <div class="col-sm-10 sndCont">
		        <button type="submit" class="btn btn-primary" name="lnSub" value="submit">Log In</button>
		      </div>
		    </div>
	    </div>
	   </form>
		</div>
	</div>
	<?php include_once("footer.php"); ?>
	</body>
	</html>
