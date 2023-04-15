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
		 	<?php if(! empty($erreur)) { ?>
		 		<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Danger:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					  </svg>
					<div><?php echo $erreur; ?></div>
				</div>
			<?php } ?>
			<?php if( isset( $success ) && $success ) { ?>
		 		<div class="alert alert-success d-flex align-items-center" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Danger:">
						<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
					  </svg>
					<div>
						Vos informations ont été mises à jour.
             		</div>
				</div>
			<?php } ?>
			<form action="" method="post" class=" needs-validation" novalidate>
				<!-- Identifiant -->
				<div class="form-outline form-floating mb-4"> 
					<input type="text" id="username" name="username" class="form-control" placeholder="Identifiant" required value="<?php echo $user[ 'username' ];?>" />
					<label class="form-label" for="username">Identifiant</label>
					<div class="invalid-feedback">
						L'identifiant est obligatoire.
      				</div>
				</div>

				<!-- Email -->
				<div class="form-outline form-floating mb-4"> 
					<input type="email" id="email" name="email" class="form-control" placeholder="Email" required required value="<?php echo $user[ 'email' ];?>" />
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