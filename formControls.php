<?php

$regexPhoneNumber = '/^[0-9]{10}$/';
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\'\ ]+$/';
$regexText = '/^[0-9a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\'\ ]+$/';
$regexAddress = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-\'\ ]+$/';
$formError = array();

if (isset($_POST['your-name'])) {
    //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
    $lastName = htmlspecialchars($_POST['your-name']);
    //test de la regex si elle est invalide
    if (!preg_match($regexName, $lastName)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['your-name'] = 'Nom invalide.';
    }
    if (empty($lastName)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['your-name'] = 'Champ nom obligatoire.';
    }
}
if (isset($_POST['your-tel-615'])) {
    //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
    $phone = htmlspecialchars($_POST['your-tel-615']);
    //test de la regex si elle est invalide
    if (!preg_match($regexPhoneNumber, $phone)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['your-tel-615'] = 'Téléphone invalide.';
    }
    // verifie si le champs de nom et vide
    if (empty($phone)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['your-tel-615'] = 'Champ téléphone obligatoire.';
    }
}
if (isset($_POST['your-subject'])) {
    //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
    $subject = htmlspecialchars($_POST['your-subject']);
    //test de la regex si elle est invalide
    if (!preg_match($regexText, $subject)) {
        //stocker dans le tableau le rapport d'érreur
        $subjectError = 'Sujet invalide.';
    }
}
if (isset($_POST['your-ville'])) {
    //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
    $country = htmlspecialchars($_POST['your-ville']);
    //test de la regex si elle est invalide
    if (!preg_match($regexAddress, $country)) {
        //stocker dans le tableau le rapport d'erreur
        $countryError = 'Ville invalide.';
    }
}
if (isset($_POST['your-message'])) {
    //déclarion de la variable message avec le htmlspecialchar qui change l'interprétation des balises par le code
    $message = htmlspecialchars($_POST['your-message']);
    //test de la regex si elle est invalide
    if (!preg_match($regexText, $message)) {
        //stocker dans le tableau le rapport d'erreur
        $formError['your-message'] = 'Message invalide.';
    }
    if (empty($message)) {
        //stocker dans le tableau le rapport d'érreur
        $formError['your-message'] = 'Champ message obligatoire.';
    }
}
if (isset($_POST['your-email'])) {
    $mail = htmlspecialchars($_POST['your-email']);
    //le filtre permet de verifier l'email
    if (!FILTER_VAR($mail, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Email invalide.';
    }
}
?>