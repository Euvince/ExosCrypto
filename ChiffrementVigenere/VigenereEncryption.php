<?php

$compt = 0;

do {
    if ($compt == 0) echo "\n";
    $choice = readline("Entrez l'Opération à éffectuer : 1-Pour crypter un message, 2-Pour décrypter un message : ");
    echo "\n";
    $continue = "";

    switch ($choice) {

        case 1 : 
            $indexOfKey = 0;
            $key = readline("Entrez la clé de cryptage : ");
            echo "\n";
            while(!ctype_alpha($key)) {
                $key = readline("La clé doit contenir uniquement des lettres alphabétiques.Rééssayez : ");
                echo "\n";
            }
            $text = readline('Entrez le message à crypter : ');
            echo "\n";
            while(!ctype_alpha($text)) {
                $text = readline("Le méssage doit contenir uniquement des lettres alphabétiques.Rééssayez : ");
                echo "\n";
            }

            $msgNumbers = [];
            $msgCharacters = [];

            for ($i = 0; $i < strlen($text); $i++) {
                if (ctype_alpha($text[$i]) && ($text[$i] >= 'a' && $text[$i] <= 'z')) {
                    $msgNumbers[] = (((ord($text[$i]) - ord('a')) + (ord($key[$indexOfKey]) - ord('a'))) % 26) + ord('a');
                    $indexOfKey = ($indexOfKey + 1) % strlen($key);
                }
                elseif (ctype_alpha($text[$i]) && ($text[$i] >= 'A' && $text[$i] <= 'Z')) {
                    $msgNumbers[] = (((ord($text[$i]) - ord('A')) + (ord($key[$indexOfKey]) - ord('A'))) % 26) + ord('A');
                    $indexOfKey = ($indexOfKey + 1) % strlen($key);
                }
                else {
                    $msgNumbers[] = ord($text[$i]);
                }
            }
            for ($i = 0; $i < count($msgNumbers); $i++) {
                $msgCharacters[] = chr($msgNumbers[$i]);
            }
            echo $text . ' crypté est : ' . implode('', $msgCharacters) . "\n";
            echo "\n";
            while ($continue !== strtolower("oui") && $continue !== strtolower("non")) {
                $continue = readline("Voulez-vous continuer le programme (Oui ou Non) ? : ");
                echo "\n";
                if ($continue === strtolower("non")) {
                    echo("Programme terminé.") . "\n";
                    echo "\n";
                    break;
                }
                else if ($continue !== strtolower("oui")) echo("Réponse invalide.") . "\n";
                else $compt++;
                echo "\n";
            }
        break;

        case 2 : 
            $indexOfKey = 0;
            $key = readline("Entrez la clé de décryptage : ");
            echo "\n";
            while(!ctype_alpha($key)) {
                $key = readline("La clé doit contenir uniquement des lettres alphabétiques.Rééssayez : ");
                echo "\n";
            }
            $text = readline('Entrez le message à décrypter : ');
            echo "\n";
            while(!ctype_alpha($text)) {
                $text = readline("Le méssage doit contenir uniquement des lettres alphabétiques.Rééssayez : ");
                echo "\n";
            }

            $msgNumbers = [];
            $msgCharacters = [];

            for ($i = 0; $i < strlen($text); $i++) {
                if (ctype_alpha($text[$i]) && ($text[$i] >= 'a' && $text[$i] <= 'z')) {
                    $msgNumbers[] = (((ord($text[$i]) - ord('a') + 26) - (ord($key[$indexOfKey]) - ord('a'))) % 26) + ord('a');
                    $indexOfKey = ($indexOfKey + 1) % strlen($key);
                }
                elseif (ctype_alpha($text[$i]) && ($text[$i] >= 'A' && $text[$i] <= 'Z')) {
                    $msgNumbers[] = (((ord($text[$i]) - ord('A') + 26) - (ord($key[$indexOfKey]) - ord('A'))) % 26) + ord('A');
                    $indexOfKey = ($indexOfKey + 1) % strlen($key);
                }
                else {
                    $msgNumbers[] = ord($text[$i]);
                }
            }
            for ($i = 0; $i < count($msgNumbers); $i++) {
                $msgCharacters[] = chr($msgNumbers[$i]);
            }
            echo $text . ' décrypté est : ' . implode('', $msgCharacters) . "\n";
            echo "\n";
            while ($continue !== strtolower("oui") && $continue !== strtolower("non")) {
                $continue = readline("Voulez-vous continuer le programme (Oui ou Non) ? : ");
                echo "\n";
                if ($continue === strtolower("non")) {
                    echo("Programme terminé.") . "\n";
                    echo "\n";
                    break;
                }
                else if ($continue !== strtolower("oui")) echo("Réponse invalide.") . "\n";
                else $compt++;
                echo "\n";
            }
        break;

        default : 
            echo 'Choix Invalide' . "\n";
            echo "\n";
            while ($continue !== strtolower("oui") && $continue !== strtolower("non")) {
                $continue = readline("Voulez-vous continuer le programme (Oui ou Non) ? : ");
                echo "\n";
                if ($continue === strtolower("non")) {
                    echo("Programme terminé.") . "\n";
                    echo "\n";
                    break;
                }
                else if ($continue !== strtolower("oui")) echo("Réponse invalide.") . "\n";
                else $compt++;
                echo "\n";
            }
        break;
    }
} while (strtolower($continue) === 'oui');

?>