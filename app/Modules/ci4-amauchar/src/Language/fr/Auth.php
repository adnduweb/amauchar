<?php

namespace Amauchar\Core\Language\fr;

return [
    // Exceptions
    'unknownHandler' => "{0} n'est pas un gestionnaire d'authentification valide",
    'unknownUserProvider' => "Impossible de déterminer le fournisseur d'utilisateur à utiliser",
    'invalidUser' => "Impossible de localiser l'utilisateur spécifié.",
    'badAttempt' => "Impossible de vous connecter. Veuillez vérifier vos informations d'identification.",
    'noPassword' => "Impossible de valider un utilisateur sans mot de passe",
    'invalidPassword' => "Impossible de vous connecter. Veuillez vérifier votre mot de pass",
    'noToken' => "Chaque requête doit avoir un jeton de porteur dans l'en-tête Authorization.",
    'badToken' => "Le jeton d'accès n'est pas valide.",
    'oldToken' => "Le jeton d'accès a expiré.",
    'noUserEntity' => "L'entité utilisateur doit être fournie pour la validation du mot de passe",
    'invalidEmail' => "Impossible de vérifier que l'adresse e-mail correspond à l'adresse e-mail enregistrée",

    'email' => "Email Address",
    'username' => "Username",
    'password' => "Mot de passe",
    'passwordConfirm' => "Mot de passe (encore)",
    'haveAccount' => "Vous avez déjà un compte? ",
    'confirm' => "Confirm",
    'forgotYourPassword' => 'mot de passe oublié ?',
    'enterYourPassword' => 'entrer votre mot de passe',
    'createAnAccount' => 'créer un compte',
    'emailOrUsername' => 'email ou identifiant',
    'newHere' => 'nouveau ?',

    // Enregistrement
    'register' => "Register",
    'registerDisabled' => "L'enregistrement n'est pas autorisé pour le moment",

    // Connexion
    'login' => "Login",
    'needAccount' => "Besoin d'un compte?",
    'rememberMe' => "Se souvenir de moi ? ",
    'forgotPassword' => "Vous avez oublié votre mot de passe?",
    'useMagicLink' => "envoyer un lien",
    'magicLinkSubject' => "Votre lien de connexion",
    'magicTokenNotFound' => "Impossible de vérifier le lien",
    'magicLinkExpired' => "Désolé votre lien a expiré.",
    'checkYourEmail' => "Vérifiez votre e-mail",
    'magicLinkDetails' => "Nous venons de vous envoyer un e-mail contenant un lien de connexion. Il n'est valable que pendant {0} minutes.",
    'loginSuccess' => "Connexion avec success",

    // Mots de passe
    'errorPasswordLength' => "Les mots de passe doivent comporter au moins {0, nombre} caractères.",
    'suggestPasswordLength' => "Les phrases de passe - jusqu'à 255 caractères - permettent de créer des mots de passe plus sûrs et faciles à retenir",
    'errorPasswordCommon' => "Le mot de passe ne doit pas être un mot de passe courant.",
    'suggestPasswordCommon' => "Le mot de passe a été comparé à plus de 65 000 mots de passe couramment utilisés ou à des mots de passe qui ont été divulgués par des pirates.",
    'errorPasswordPersonal' => "Les mots de passe ne peuvent pas contenir d'informations personnelles ré-assemblées.",
    'suggestPasswordPersonal' => "Les variations de votre adresse e-mail ou de votre nom d'utilisateur ne doivent pas être utilisées comme mots de passe",
    'errorPasswordTooSimilar' => "Le mot de passe est trop similaire au nom d'utilisateur",
    'suggestPasswordTooSimilar' => "N'utilisez pas de parties de votre nom d'utilisateur dans votre mot de passe",
    'errorPasswordPwned' => "Le mot de passe {0} a été exposé suite à une violation de données et a été vu {1, nombre} de fois dans {2} des mots de passe compromis.",
    'suggestPasswordPwned' => "{0} ne devrait jamais être utilisé comme mot de passe. Si vous l'utilisez quelque part, changez-le immédiatement.",
    'errorPasswordEmpty' => "Un mot de passe est requis.",
    'passwordChangeSuccess' => "Le mot de passe a été modifié avec succès",
    'userDoesNotExist' => "Le mot de passe n'a pas été modifié. L'utilisateur n'existe pas",
    'resetTokenExpired' => "Désolé. Votre jeton de réinitialisation a expiré",

    // 2FA
    'email2FATitle' => "Two Factor Authentication",
    'emailEnterCode' => "Confirm your Email",
    'emailConfirmCode' => "Entrez le code à 6 chiffres que nous venons d'envoyer à votre adresse e-mail",
    'email2FASubject' => "Confirmez votre adresse e-mail",
    'invalid2FAToken' => "Le jeton est incorrect",
    'need2FA' => "Vous devez effectuer une vérification à deux facteurs",
    'needVerification' => "Vérifiez votre e-mail pour terminer l'activation du compte",

    // Activation
    'emailActivateTitle' => "Activation par e-mail",
    'emailActivateSubject' => "Confirm your Email",

    // Groupes
    'unknownGroup' => "{0} n'est pas un groupe valide",
    'missingTitle' => "Les groupes doivent avoir un titre",

    // Permissions
    'unknownPermission' => "{0} n'est pas une autorisation valide",

    // Too many requests
    'tooManyRequests'           => 'Trop de requêtes. Veuillez attendre {0, number} secondes.',
];
