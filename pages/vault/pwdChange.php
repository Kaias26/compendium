<div class="starter-template">
	<h1 class="mt-5">Changez votre mot de passe</h1>
	<p class="lead">Entrez votre nouveau mot de passe.</p>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5 col-md-8 rounded-5 shadow-5-strong p-5">
			<?php echo display_flash_messages(); clear_flash_messages(); ?>
			<?php if( isset( $user ) ) { ?>
				<form action="/vault/pwdChange?selector=<?php echo htmlspecialchars( $_GET['selector'] );?>&validator=<?php echo  htmlspecialchars( $_GET['validator'] );?>" method="post" class=" needs-validation" novalidate>
					<input type="hidden" name="selector" value="<?php echo htmlspecialchars( $_GET['selector'] ); ?>">
					<!-- Email -->
					<div class="form-outline form-floating mb-4"> 
						<input type="email" id="email" name="email" class="form-control disabled" placeholder="Email" required value="<?php echo htmlspecialchars( $user[ 'email' ] );?>" readonly />
						<label class="form-label" for="email">Email</label>
						<div class="invalid-feedback">
							L'adresse email est obligatoire et doit etre valide.
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

					<!-- Confirm Password -->
					<div class="form-outline form-floating mb-4">
						<input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer mot de passe" required />
						<label class="form-label" for="confirmPassword">Confirmer mot de passe</label>
						<div class="invalid-feedback">
							Le mot de passe est oblibatoire.
	      				</div>
					</div>

					<!-- Submit button -->
					<div class="text-center">				
						<button type="submit" name="pwdChange" value="Changer le mot de passe" class="btn btn-primary btn-block">Changer le mot de passe</button>
					</div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>