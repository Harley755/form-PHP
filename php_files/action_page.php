<?php

function errorMessage(string $e)
{
    echo $e;
}

// if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['password'])) {
//     if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['sexe']) && !empty($_POST['password'])) {
//         echo 'Prenom : ' . $_POST['prenom'] . '<br/>' .  'Nom : ' . $_POST['nom'] . '<br/>' . 'Sexe : ' .  $_POST['sexe'] . '<br/>' . 'Gout : ' . $_POST['gout'] . '<br/>' . 'Checkbox : ' . $_POST['case'] . '<br/>';

//         var_dump($_FILES['monFichier']['type']);
//     } else {
//         errorMessage('Les valeurs sont vides');
//     }
// } else {
//     errorMessage('Les variables ne sont pas définies');
// }

if (isset($_FILES['monFichier']) && $_FILES['monFichier']['error'] == 0) {
    if ($_FILES['monFichier']['size'] < 1000000) { // 1 mo
        // testons si l'extension est autorisée
        $fileInfo = pathinfo($_FILES['monFichier']['name']);
        $extension_upload = $fileInfo['extension'];
        $valid_extensions = array('gif, png, jpeg, jpg');
        if (in_array($extension_upload, $valid_extensions)) {
            move_uploaded_file($_FILES['monFichier']['tmp_name'], 'uploads/' .
                basename($_FILES['monFichier']['name']));
            echo "L'envoi a bien été effectué !";
        }
    } else {
        echo "trop gros";
    }
}
