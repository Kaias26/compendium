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
		 	<?php echo display_flash_messages(); clear_flash_messages(); ?>
			<form action="" method="post" class=" needs-validation" novalidate>
				<!-- Identifiant -->
				<div class="form-outline form-floating mb-4"> 
					<input type="text" id="username" name="username" class="form-control" placeholder="Identifiant" required />
					<label class="form-label" for="username">Identifiant</label>
					<div class="invalid-feedback">
						L'identifiant est obligatoire.
      				</div>
				</div>

				<!-- Password -->
				<div class="form-outline form-floating mb-4">
					<input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required />
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
						<a class="openModal" href="/vault/pwdReset">Mot de passe oublié ?</a>
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