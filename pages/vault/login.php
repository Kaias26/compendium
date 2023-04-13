<?php 
// Check si l'utilisateur est déja connecté pour le rediriger vers le vault
if( is_user_logged_in() ) {
	echo '<meta http-equiv="refresh" content="0; URL=/vault/home">';
	die();
}
?>

<div class="starter-template">
	<h1 class="mt-5">Connexion</h1>
</div>

<div class="container">
	<div class="row justify-content-center">
		 <div class="col-xl-5 col-md-8 rounded-5 shadow-5-strong p-5">
		 	<?php if(! empty($message)) { ?>
		 		<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Danger:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					  </svg>
					<div><?php echo $message; ?></div>
				</div>
			<?php } ?>
			<form action="" method="post" class=" needs-validation" novalidate>
				<!-- Identifiant -->
				<div class="form-outline form-floating mb-4"> 
					<input type="text" id="username" name="username" class="form-control" placeholder="Identifiant" />
					<label class="form-label" for="username">Identifiant</label>
					<div class="invalid-feedback">
						L'identifiant est obligatoire.
      				</div>
				</div>

				<!-- Password -->
				<div class="form-outline form-floating mb-4">
					<input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" />
					<label class="form-label" for="password">Mot de passe</label>
					<div class="invalid-feedback">
						Le mot de passe est oblibatoire.
      				</div>
				</div>

				<!-- 2 column grid layout for inline styling -->
				<div class="row mb-4">
					<div class="col d-flex justify-content-center">
						<!-- Checkbox -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember_me" checked />
							<label class="form-check-label" for="remember_me"> Rester connecté </label>
						</div>
					</div>

					<div class="col">
						<!-- Simple link -->
						<a href="#!">Mot de passe oublié ?</a>
					</div>
				</div>

				<!-- Submit button -->
				<div class="text-center">				
					<button type="submit" name="login" value="Connexion" class="btn btn-primary btn-block">Connexion</button>
				</div>

				<!-- Register buttons -->
				<div class="text-center">
					<p>Pas encore membre ? <a href="/vault/register">S'inscrire</a></p>
				</div>
			</form>
		</div>
	</div>
</div>