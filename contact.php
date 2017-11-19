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
	<style>
		nav {
			 position: relative !important;
		}
		.jumbotron {
			 background-color: #ffffffb5 !important;
    	 box-shadow: 0px 0px 8px 0px rgba(0,0,0,0.16);
		}
		.container-fluid {
			background-image: url(gallery/img/nature-bird-bg.png);
	    background-size: contain;
		}
		.sndCont {
			text-align: center;
		}
		.sndCont button {
			padding: 8px 44px;
			margin-top: 28px;
		}
		.sndCont button i {
			margin: 0 6px;
		}
		.display-4 {
			text-align: center;border-bottom: 1px solid #dfe3e6;
		}
	</style>
</head>
<body>
<?php include_once("header.php"); ?>
	<div class="container-fluid p-2 justify-content-center row">
		<div class="jumbotron col-8 pt-0 pb-2 mt-4">
			<div class="w-100 display-4 mb-4 pb-1">Contact Us</div>
			<form>
				<div class="form-group row">
			    <label for="inputName" class="col-sm-2 col-form-label">Your Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control w-50" id="inputName" placeholder="Name">
			    </div>
			  </div>
				<div class="form-group row">
			    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control w-75" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <fieldset class="form-group">
			    <div class="row">
			      <legend class="col-form-legend col-sm-2">Select One</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="contactType" id="ct1" value="ct1" checked>
			            Suggetion / FeedBack / Request
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="contactType" id="ct2" value="ct2">
			            Report a Problem / Support
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="contactType" id="ct3" value="ct3">
			            Other Reason
			          </label>
			        </div>
			      </div>
			    </div>
			  </fieldset>

				<div class="form-group row">
					<label for="inputMsg" class="col-sm-2 col-form-label">Message</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="inputMsg" placeholder="Your Message Here"></textarea>
					</div>
				</div>

			  <div class="form-group row justify-content-center">
			    <div class="col-sm-10 sndCont">
			      <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	<?php include_once("footer.php"); ?>
	</body>
	</html>
