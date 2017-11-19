<?php include_once("lib/layout.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>MedAssist | Smart Health Prediction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="image/x-icon" href="gallery/img/ic.png">
	<link rel="stylesheet" href="gallery/css/main.css" />
	<link rel="stylesheet" href="gallery/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="gallery/css/font-awesome-4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="gallery/css/home.css" />
</head>
<body>
	<?php include_once("header.php"); ?>

	<div class="container-fluid p-0">
		<div class="jumbotron w-100 mb-0 p-0 jb jb-mn">
			<div class="card w-100">
			  <img class="card-img-top" src="/gallery/img/circle.png" alt="Card image cap">
			  <div class="card-img-overlay">
			    <h4 class="card-title display-4">MedAssist is
						<div class="txVarCont">
							<div class="txCont">
								<div class="txVar">Digital Medical Assistant</div>
								<div class="txVar">Now Free</div>
								<div class="txVar">Anywhere, Anytime</div>
								<div class="txVar">Bot ? Doctor ?</div>
							</div>
						</div>
					</h4>
			    <p class="card-text">It can Identify even Bigger Health Problems.</p>
			    <?php if(!$_user->isLogged()) {echo '<a href="/login" class="btn btn-info btn-lg pl-4 pr-4">Try Now</a><br><span style="letter-spacing: .1em;">It\'s Free</span>';} ?>
			  </div>
			</div>
		</div>

		<div class="jumbotron w-100 mb-0 bg-light jb jb-sc">
			<div class="wrk display-4">See How It Works</div>
			<div class="wr-stp row justify-content-center">

				<div class="col-md-3 m-4 ct-a">
					<div class="cnt">1</div>
				  <img class="card-img-top" src="/gallery/img/account.png" alt="Card image cap">
				  <div class="card-body">
				    <p class="card-text display-1">Create Your Free Account</p>
				  </div>
				</div>

				<div class="col-md-3 m-4 ct-b">
					<div class="cnt">2</div>
					<img class="card-img-top" src="/gallery/img/idea.png" alt="Card image cap">
				  <div class="card-body">
				    <p class="card-text display-1">Identify Your Symptoms</p>
				  </div>
				</div>

				<div class="col-md-3 m-4 ct-c">
					<div class="cnt">3</div>
					<img class="card-img-top" src="/gallery/img/notes.png" alt="Card image cap">
				  <div class="card-body">
				    <p class="card-text display-1">Get quick medical advice</p>
				  </div>
				</div>

			</div>
		</div>

	</div>
	<?php include_once("footer.php"); ?>
	</body>
	</html>
