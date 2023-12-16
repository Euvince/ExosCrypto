<?php

$compt = 0;

do {
    if ($compt == 0) echo "\n";
    $choice = readline("Entrez l'Opération à éffectuer : 1-Pour vérifier que deux nombres sont premiers entre eux. 2-Pour crypter un message, 3-Pour décrypter un message : ");
    echo "\n";
    $continue = "";

    switch ($choice) {

        case 1 : 
            try {
                $a = readline("Entrez la valeur entière du premier nombre : ");
                echo "\n";
                while (!filter_var($a, FILTER_VALIDATE_INT) ) {
                    $a = readline("Le nombre doit être entier. Réessayez : ");
                    echo "\n";
                }
                while ($a < 0) {
                    $a = readline("Entrez un nombre positif entier : ");
                    echo "\n";
                }
                $b = readline("Entrez la valeur entière du second nombre : ");
                echo "\n";
                while (!filter_var($b, FILTER_VALIDATE_INT) ) {
                    $b = readline("Le nombre doit être entier : ");
                    echo "\n";
                }
                while ($b < 0) {
                    $b = readline("Entrez un nombre positif entier. Réessayez : ");
                    echo "\n";
                }

                if ($a < $b) {
                    (int)$x = $b;
                    (int)$y = $a;
                }
                else {
                    (int)$x = $a; 
                    (int)$y = $b;
                }

                do {
                    $r = $x % $y;
                    $x = $y;
                    $y = $r;
                } while ($x % $y !== 0);

                echo "Le PGCD de $a et $b est : $y" . "\n";
                echo "\n";
                echo $y == 1 ? "$a et $b sont premiers entre eux" : "$a et $b ne sont pas premiers entre eux.";
                echo "\n";
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
            }
            catch (DivisionByZeroError $e) {
                echo "Impossible de diviser un nombre par 0." . "\n";
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
            }
        break;

        case 2 : 
            try {
                do {
                    $a = readline("Entrez la valeur de a de manière qu'il soit premier avec 26 : ");
                    echo "\n";
                    while (!filter_var($a, FILTER_VALIDATE_INT) ) {
                        $a = readline("Le nombre doit être entier. Réessayez : ");
                        echo "\n";
                    }
                    while ($a < 0) {
                        $a = readline("Entrez un nombre positif entier : ");
                        echo "\n";
                    }
                    echo "\n";

                    if ($a < 26) {
                        (int)$x = 26;
                        (int)$y = $a;
                    }
                    else {
                        (int)$x = $a; 
                        (int)$y = 26;
                    }

                    do {
                        $r = $x % $y;
                        $x = $y;
                        $y = $r;
                    } while ($x % $y !== 0);
                    echo "Le PGCD de $a et 26 est : $y" . "\n";
                    echo "\n";
                    echo $y == 1 ? "$a et 26 sont premiers entre eux" : "$a et 26 ne sont pas premiers entre eux.";
                    echo "\n";
                    echo "\n";
                } while ($y !== 1);

                $b = readline("Entrez la valeur de b : ");
                echo "\n";
                while (!filter_var($b, FILTER_VALIDATE_INT) ) {
                    $b = readline("Le nombre doit être entier : ");
                    echo "\n";
                }
                while ($b < 0) {
                    $b = readline("Entrez un nombre positif entier. Réessayez : ");
                    echo "\n";
                }
                $text = readline('Entrez le message à crypter : ');
                echo "\n";

                $msgNumbers = [];
                $msgCharacters = [];

                for ($i = 0; $i < strlen($text); $i++) {
                    if (ctype_alpha($text[$i]) && ($text[$i] >= 'a' && $text[$i] <= 'z')) {
                        $msgNumbers[] = (($a * (ord($text[$i]) - ord('a')) + $b) % 26) + ord('a');
                    }
                    elseif (ctype_alpha($text[$i]) && ($text[$i] >= 'A' && $text[$i] <= 'Z')) {
                        $msgNumbers[] = (($a * (ord($text[$i]) - ord('A')) + $b) % 26) + ord('A');
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
            }
            catch (DivisionByZeroError $e) {
                echo "Impossible de diviser un nombre par 0" . "\n";
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
            }
        break;

        case 3 : 
            try {
                do {
                    $a = readline("Entrez la valeur de a de manière qu'il soit premier avec 26 : ");
                    echo "\n";
                    while (!filter_var($a, FILTER_VALIDATE_INT) ) {
                        $a = readline("Le nombre doit être entier. Réessayez : ");
                        echo "\n";
                    }
                    while ($a < 0) {
                        $a = readline("Entrez un nombre positif entier : ");
                        echo "\n";
                    }
                    echo "\n";

                    if ($a < 26) {
                        (int)$x = 26;
                        (int)$y = $a;
                    }
                    else {
                        (int)$x = $a; 
                        (int)$y = 26;
                    }

                    do {
                        $r = $x % $y;
                        $x = $y;
                        $y = $r;
                    } while ($x % $y !== 0);
                    echo "Le PGCD de $a et 26 est : $y" . "\n";
                    echo "\n";
                    echo $y == 1 ? "$a et 26 sont premiers entre eux" : "$a et 26 ne sont pas premiers entre eux.";
                    echo "\n";
                    echo "\n";
                } while ($y !== 1);

                $b = readline("Entrez la valeur de b : ");
                echo "\n";
                while (!filter_var($b, FILTER_VALIDATE_INT) ) {
                    $b = readline("Le nombre doit être entier : ");
                    echo "\n";
                }
                while ($b < 0) {
                    $b = readline("Entrez un nombre positif entier. Réessayez : ");
                    echo "\n";
                }
                $text = readline('Entrez le message à décrypter : ');
                echo "\n";

                $msgNumbers = [];
                $msgCharacters = [];

                for ($i = 0; $i < strlen($text); $i++) {
                    if (ctype_alpha($text[$i]) && ($text[$i] >= 'a' && $text[$i] <= 'z')) {
                        $msgNumbers[] = (($a * (ord($text[$i]) - ord('a') +26 - $b)) % 26) + ord('a');
                    }
                    elseif (ctype_alpha($text[$i]) && ($text[$i] >= 'A' && $text[$i] <= 'Z')) {
                        $msgNumbers[] = (($a * (ord($text[$i]) - ord('A') +26 - $b)) % 26) + ord('A');
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
            }
            catch (DivisionByZeroError $e) {
                echo "Impossible de diviser un nombre par 0" . "\n";
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
            }
        break;

        default : 
            echo 'Choix Invalide';
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