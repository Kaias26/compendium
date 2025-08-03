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
		<?php echo $flashMessenger->display_flash_messages(); $flashMessenger->clear_flash_messages(); ?>
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