<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("../../includes/config.php");	
	require_once("../../includes/mailer.php");	
	require_once("../../includes/framework.php");	
	require_once("../../includes/authenticate.php");
?>

<form action="/vault/pwdReset" method="post" class="ajaxForm">
	<div class="modal-header">
		<h5 class="modal-title" id="modal-title">Mot de passe oublié</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	<div class="modal-body">
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
					Un lien pour changer votre mot de passe vous a été envoyé par email
         		</div>
			</div>
		<?php } ?>
		<input type="hidden" name="pwdReset" value="1">
		<!-- Email -->
		<div class="form-outline form-floating mb-4"> 
			<input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
			<label class="form-label" for="email">Email</label>
			<div class="invalid-feedback">
				L'adresse email est obligatoire et doit etre valide.
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
		<button type="submit" value="Réinitialiser" class="btn btn-primary btn-block">Réinitialiser</button>
	</div>
</form>