<?php
// Check si l'utilisateur n'est pas connecté pour le rediriger vers le login
if( !is_user_logged_in() ) {
	echo '<meta http-equiv="refresh" content="0; URL=/vault/login">';
	die();
}

$user = find_user_by_id( $_SESSION['user_id'] );
?>

<div class="starter-template">
	<h1 class="mt-5">Mon compte</h1>
	<p class="lead">Mettre à jour les informations de votre compte.</p>
</div>

<div class="container">
	<div class="row justify-content-center">
		 <div class="col-xl-5 col-md-8 rounded-5 shadow-5-strong p-5">
		 	<?php echo $flashMessenger->display_flash_messages(); $flashMessenger->clear_flash_messages(); ?>
			<form action="" method="post" class=" needs-validation" novalidate>
				<!-- Identifiant -->
				<div class="form-outline form-floating mb-4"> 
					<input type="text" id="username" name="username" class="form-control" placeholder="Identifiant" required value="<?php echo  htmlspecialchars( $user[ 'username' ] );?>" />
					<label class="form-label" for="username">Identifiant</label>
					<div class="invalid-feedback">
						L'identifiant est obligatoire.
      				</div>
				</div>

				<!-- Email -->
				<div class="form-outline form-floating mb-4"> 
					<input type="email" id="email" name="email" class="form-control" placeholder="Email" required required value="<?php echo  htmlspecialchars( $user[ 'email' ] );?>" />
					<label class="form-label" for="email">Email</label>
					<div class="invalid-feedback">
						L'adresse email est obligatoire et doit etre valide.
      				</div>
				</div>
				
				<!-- Password -->
				<div class="form-text">
					Si vous souhaitez le changer :
  				</div>
				<div class="form-outline form-floating mb-4">					
      				<input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" />
					<label class="form-label" for="password">Mot de passe</label>					
				</div>

				<!-- Confirm Password -->
				<div class="form-outline form-floating mb-4">
					<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer mot de passe" />
					<label class="form-label" for="confirmPassword">Confirmer mot de passe</label>

				</div>

				<!-- Submit button -->
				<div class="text-center">				
					<button type="submit" name="update" value="Mettre à jour" class="btn btn-primary btn-block">Mettre à jour</button>
				</div>
			</form>
		</div>
		</div>
	</div>