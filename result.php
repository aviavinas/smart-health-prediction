<?php require_once("lib/layout.php");$_user->lockPage(); ?>
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
	<style>
	.result span {
		font-weight: 500;
		color:#565c63;
	}
	.jumbotron {
		margin: 0;
		border-radius: 0;
	}
	.bg-light {
		padding: 0 16% 5%;
	}
	p {
		font-size: 20px;
	}
	li {
		padding-left: 1em;
		list-style-type: decimal;
		list-style-position: inside;
		line-height: 2em;
	}
	.display-4 {
		color : #3F51B5;
	}
	.card-img-overlay {
		padding:1.5% 3.4% 9% 13%;
	}
	.fa-map-marker {
		font-size: 24px;
		position: absolute;
	}
	</style>
</head>
<body>
<?php require_once("header.php"); ?>
<div class="container-fluid">
	<div class="jumbotron">
		<?php $_L->calInput(5); ?>
		<div class="card w-50" style="margin-left:25%">
			<img src="/gallery/img/chartbmi.png" class="card-img-top">
			<div class="card-img-overlay">
				<i class="fa fa-map-marker text-dark" style="bottom: <?=($_L->chH+13) ?>%;left: <?=($_L->chW+13) ?>%;"></i>
			</div>
		</div>
	</div>
	<div class="jumbotron bg-light">
		<?=$article[$_L->disease]?>
	</div>
</div>
<?php require_once("footer.php"); ?>
<script src="/gallery/js/jquery-3.1.0.min.js"></script>
<script src="/gallery/js/health.js"></script>
</body>
</html>
