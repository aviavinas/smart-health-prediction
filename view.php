<?php require_once("lib/layout.php"); $_user->lockPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>MedAssist | Smart Health Prediction</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="icon" type="image/x-icon" href="gallery/img/ic.png">
	<link rel="stylesheet" href="/gallery/css/main.css" />
	<link rel="stylesheet" href="/gallery/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/gallery/css/health.css" />
	<link rel="stylesheet" type="text/css" href="/gallery/css/font-awesome-4.5.0/css/font-awesome.min.css" />
</head>
<body>
<?php require_once("header.php"); ?>
	<div class="container-fluid p-0">
		<form method="post" action="/result" id="u-input" name="user_input">
			<?=$_L->getTab()?>
			<div id="physiological" class="tabcontent">
			  <div class="display-4">Few Things more About You</div>
			  <div class="jumbotron">
					<div class="row p-3 justify-content-center">
						<div class="col-1">
							<span>Height : </span>
						</div>
						<div class="col-2">
							<select name="ht-ft" class="form-control">
								<option value="1">1 Feet</option>
								<option value="2">2 Feet</option>
								<option value="3">3 Feet</option>
								<option value="4">4 Feet</option>
								<option value="5">5 Feet</option>
								<option value="6">6 Feet</option>
							</select>
						</div>
						<div class="col-2">
							<select name="ht-in" class="form-control">
								<option value="0">0 Inch</option>
								<option value="1">1 Inch</option>
								<option value="2">2 Inch</option>
								<option value="3">3 Inch</option>
								<option value="4">4 Inch</option>
								<option value="5">5 Inch</option>
								<option value="6">6 Inch</option>
								<option value="7">7 Inch</option>
								<option value="8">8 Inch</option>
								<option value="9">9 Inch</option>
								<option value="10">10 Inch</option>
								<option value="11">11 Inch</option>
							</select>
						</div>
					</div>
					<div class="row p-3 justify-content-center">
						<div class="col-1">
							<span>Weight : </span>
						</div>
						<div class="col-2">
							<input type="number" placeholder="in Kg's" name="wt-kg" class="form-control"/>
						</div>
					</div>
			</div>
			<div class="sb-bt p-4">
				<button class="selector btn btn-success btn-lg" type="button" id="save" onClick="submitDetailsForm()">Save & Submit</button>
			</div>
		</form>
	</div>
	<?php require_once("footer.php"); ?>
	<script src="/gallery/js/jquery-3.1.0.min.js"></script>
	<script src="/gallery/js/health.js"></script>
</body>
</html>
