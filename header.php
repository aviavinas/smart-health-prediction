	<nav id="myNav" class="navbar navbar-dark bg-dark navbar-expand-sm">
		<div class="col-md-2">
			<a href="/"><img src="/gallery/img/logo.png" class="navbar-brand mr-0" width="60px" alt="Logo" /></a>
			<h4 class="brand-tit">MedAssist</h4>
		</div>

		<div class="col-md-10">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarMain">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navBarMain">
				<ul class="navbar-nav">
					<li class="nav-item">
						<?php if(!$_user->isLogged()) {
						echo '<a href="/login" class="nav-link m-1 btn-dark lgn-bt"><i class="fa fa-power-off" aria-hidden="true"></i>Login / Sign Up</a>';
					} else {
						$u = $_user->getInfo();
						echo '
						<a class="btn text-white btn-dark" href="/health">
							Health Panel
						</a>
					</li>
					<li class="nav-item">
						<div class="dropdown">
						  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Hello, '.$u['Name'].'
						  </button>
						  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="/logout">Logout</a>
						  </div>
						</div>';;
					} ?>
					</li>
				</ul>
			</div>
		</div>
	</nav>
