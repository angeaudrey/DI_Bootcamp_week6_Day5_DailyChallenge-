<?php

// Recuperer les mots dans liste.txt
$listedemots = file_get_contents("liste.txt");
$mots = explode("\n", $listedemots);

// Selectionner un mot aleatoirement
$mot = rtrim($mots[array_rand($mots)]);

// Initialisation de la  mauvaise reponse
$mauvaisereponse = 0;

// initialiser le mot choisi par "_"
$motchoisi = str_repeat("-", strlen($mot));

// lancement du jeu
while ($motchoisi != $mot && $mauvaisereponse < 7) {
    echo "Mot actuel: $motchoisi\n";
    echo "Entrez une lettre: ";

    // recuperer la saisie du joueur
    $lettre = trim(fgets(STDIN));
    if (strpos($mot, $lettre) === false) {
        // Si la reponse est incorrecte
        $mauvaisereponse++;
        echo "Incorrect.\n";
    } else {
        // Si la reponse est correcte
        for ($i = 0; $i < strlen($mot); $i++) {
            if ($mot[$i] == $lettre) {
                $motchoisi[$i] = $lettre;
            }
        }
        echo "Correct!\n";
    }
}

// Verifier si le mot est trouvé
if ($motchoisi == $mot) {
    echo "Felicitations, vous avez trouvé le mot  $mot.\n";
} else {
    echo "Désolé , vous avez perdu vous auriez du trouver   $mot.\n";
}

?>