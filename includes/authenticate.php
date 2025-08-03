<?php

require_once(__DIR__ . "/AuthService.php");

// Instantiate the AuthService
$database = Database::getInstance();
$flashMessenger = new FlashMessenger();
$authService = new AuthService($database, $flashMessenger);

// Au submit du formulaire Login, vérifie l'authentification
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) $flashMessenger->set_flash_message('danger', "L'identifiant est obligatoire");
    elseif (empty($password)) $flashMessenger->set_flash_message('danger', "Le mot de passe est oblibatoire");
    else {
        if ($authService->login($username, $password, isset($_POST['remember_me']))) {
            echo '<meta http-equiv="refresh" content="0; URL=/vault/home">';
            die();
        } else {
            $flashMessenger->set_flash_message('danger', "L'identifiant ou le mot de passe est incorrect.");
        }
    }
}

// Au submit du formulaire Register, vérifie l'authentification
if (isset($_POST["register"])) {
    // récupérer le post et supprimer les antislashes ajoutés par le formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    if (empty($username)) $flashMessenger->set_flash_message('danger', "L'identifiant est obligatoire");
    elseif (empty($password)) $flashMessenger->set_flash_message('danger', "Le mot de passe est oblibatoire");
    elseif ($password != $confirmPassword) $flashMessenger->set_flash_message('danger', "Les mots des passes ne sont pas identiques");
    elseif (empty($email)) $flashMessenger->set_flash_message('danger', "L'email est oblibatoire");
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $flashMessenger->set_flash_message('danger', "L'email n'est pas valide");
    else {
        $user = $authService->find_user_by_username($username);

        if ($user) {
            $flashMessenger->set_flash_message('danger', "Cet identifiant existe déjà.");
        } else {
            $user = $authService->find_user_by_email($email);

            if ($user) {
                $flashMessenger->set_flash_message('danger', "Cette adresse email existe déjà.");
            } else {
                if ($authService->register($username, $password, $email)) {
                    $flashMessenger->set_flash_message('success', "Votre compte a été créé avec succès.");
                } else {
                    $flashMessenger->set_flash_message('danger', "Une erreur s'est produite, impossible de créer le compte.");
                }
            }
        }
    }
}

// Au submit du formulaire Reset pwd, envoit un mail de reset
if (isset($_POST["pwdReset"])) {
    // récupérer le post et supprimer les antislashes ajoutés par le formulaire
    $email = $_POST['email'];

    if (empty($email)) $flashMessenger->set_flash_message('danger', "L'email est oblibatoire");
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $flashMessenger->set_flash_message('danger', "L'email n'est pas valide");
    else {
        $user = $authService->find_user_by_email($email);

        if ($user) {
            //Supprimer les anciens tokens
            $authService->delete_user_token($user['id']);

            //Générer un nouveau token
            [$selector, $validator, $token] = $authService->generate_tokens();

            // 1 heure d'expiration
            $expired_seconds = time() + 3600;

            // insérer le token dans la DB
            $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
            $expiry = date('Y-m-d H:i:s', $expired_seconds);

            if ($authService->insert_user_token($user['id'], $selector, $hash_validator, $expiry)) {
                $link = "http://naheulbeuk-db.byethost9.com/vault/pwdChange?selector=" . $selector . "&validator=" . $validator;

                $sendMail = smtpmailer(
                    $email,
                    'naheulbeukdb@gmail.com',
                    'Naheulbeuk DB',
                    'Reinitialiser votre mot de passe',
                    'Bonjour ' . $user['username'] . ' ,<br><br>Une demande de changement de mot de passe a &eacute;t&eacute; faites sur le site Naheulbeuk-db.<br>Si vous souhaitez changer votre mot de passe, 
                    <a href="' . $link . '">cliquez ici</a><br><br>Ou copiez/collez cette URL dans votre navigateur : <br>' . $link . '<br><br>Ce lien expirera dans 1 heure.<br><br>Naheulbeuk-DB'
                );

                if ($sendMail) {
                    $flashMessenger->set_flash_message('success', "Un email vous a été envoyé pour réinitialiser votre mot de passe.");
                } else {
                    $flashMessenger->set_flash_message('danger', $sendMail);
                }
            } else {
                $flashMessenger->set_flash_message('danger', "Une erreur s'est produite, impossible de générer le lien de réinitialisation.");
            }
        } else {
            $flashMessenger->set_flash_message('danger', "Cet identifiant n'existe pas.");
        }
    }
}

// Au chargement de la page changement de mot de passe (via email)
if (isset($_GET['selector']) && isset($_GET['validator'])) {
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    $token = $authService->find_user_token_by_selector($selector);

    if ($token && password_verify($validator, $token['hashed_validator'])) {
        $user = $authService->find_user_by_id($token['user_id']);
    } else {
        $flashMessenger->set_flash_message('danger', "Le lien de changement de mot de passe n'est pas valide ou a expiré.");
    }
}

// Au submit du formulaire change pwd
if (isset($_POST["pwdChange"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($password)) $flashMessenger->set_flash_message('danger', "Le mot de passe est oblibatoire");
    elseif ($password != $confirmPassword) $flashMessenger->set_flash_message('danger', "Les mots des passes ne sont pas identiques");
    else {
        $token = $authService->find_user_token_by_selector($selector);
        if ($token) {
            $user = $authService->find_user_by_id($token['user_id']);
            if ($authService->update($user['id'], $user['username'], $password, $user['email'])) {
                $authService->delete_user_token($user['id']);
                $flashMessenger->set_flash_message('success', "Votre mot de passe a été changé avec succès.");
            } else {
                $flashMessenger->set_flash_message('danger', "Une erreur s'est produite, impossible de changer le mot de passe.");
            }
        } else {
            $flashMessenger->set_flash_message('danger', "Le lien de changement de mot de passe n'est pas valide ou a expiré.");
        }
    }
}

// Au submit du formulaire d'update de compte
if (isset($_POST["update"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];

    if (empty($username)) $flashMessenger->set_flash_message('danger', "L'identifiant est obligatoire");
    elseif ($password != $confirmPassword) $flashMessenger->set_flash_message('danger', "Les mots des passes ne sont pas identiques");
    elseif (empty($email)) $flashMessenger->set_flash_message('danger', "L'email est oblibatoire");
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $flashMessenger->set_flash_message('danger', "L'email n'est pas valide");
    else {
        $user = $authService->find_user_by_username($username);

        if ($user && $user['id'] !== $_SESSION['user_id']) {
            $flashMessenger->set_flash_message('danger', "Cet identifiant existe déjà.");
        }
        else {
            $user = $authService->find_user_by_email($email);

            if ($user && $user['id'] !== $_SESSION['user_id']) {
                $flashMessenger->set_flash_message('danger', "Cette adresse email existe déjà.");
            } else {
                if ($password == "") {
                    $user = $authService->find_user_by_id($_SESSION['user_id']);
                    $password = $user['password'];
                }

                if ($authService->update($_SESSION['user_id'], $username, $password, $email)) {
                    $flashMessenger->set_flash_message('success', "Votre compte a été mis à jour avec succès.");
                    $authService->log_user_in($user);
                } else {
                    $flashMessenger->set_flash_message('danger', "Une erreur s'est produite, impossible de mettre à jour le compte.");
                }
            }
        }
    }
}

if ($group == 'logout') {
    $authService->logout();
}

// Helper function for is_user_logged_in (assuming it's defined elsewhere or will be refactored)
function is_user_logged_in(): bool
{
    global $authService;
    return $authService->is_user_logged_in();
}

?>