<?php
// Check si l'utilisateur n'est pas connecté pour le rediriger vers le login
if( !is_user_logged_in() ) {
	echo '<meta http-equiv="refresh" content="0; URL=/vault/login">';
	die();
}
?>