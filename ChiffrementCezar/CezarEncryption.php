<?php 

$compt = 0;

do {
    if ($compt == 0) echo "\n";
    $choice = readline("Entrez l'Opération à éffectuer : 1-Pour crypter un message, 2-Pour décrypter un message : ");
    echo "\n";
    $continue = "";
    switch ($choice) {

        case 1 : 
            $text = readline('Entrez le message à crypter : ');
            echo "\n";
            while(!ctype_alpha($text)) {
                $text = readline('Le méssage ne doit contenir que des lettres alphabétiques.Réessayez : ');
                echo "\n";
            }
            $gap = readline('Entrez le décalage que vous souhaitez appliquer : ');
            echo "\n";
            while(!filter_var($gap, FILTER_VALIDATE_INT) || $gap<=0) {
                $gap = readline('Le décalage doit être un nombre positif!.Réessayez : ');
                echo "\n";
            }

            $msg = [];
            $encryptMessageTable = [];

            for ($i = 0; $i < strlen($text); $i++) {
                if (ctype_alpha($text[$i]) && ($text[$i] >= 'A' && $text[$i] <= 'Z')) {
                    $msg[] = (((ord($text[$i]) - ord('A')) + $gap) % 26) + ord('A');
                }
                elseif (ctype_alpha($text[$i]) && ($text[$i] >= 'a' && $text[$i] <= 'z')) {
                    $msg[] = (((ord($text[$i]) - ord('a')) + $gap) % 26) + ord('a');
                }
                else {
                    $msg[] = ord($text[$i]);
                }
            }
            for ($i = 0; $i < count($msg); $i++) {
                $encryptMessageTable[] = chr($msg[$i]);
            }
            echo $text . " crypté est : " . implode('', $encryptMessageTable) . "\n";
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
            $text = readline('Entrez le message à décrypter : ');
            echo "\n";
            while(!ctype_alpha($text)) {
                $text = readline('Le méssage ne doit contenir que des lettres alphabétiques.Réessayez : ');
                echo "\n";
            }
            $gap = readline('Entrez le décalage que vous souhaitez appliquer : ');
            echo "\n";
            while(!filter_var($gap, FILTER_VALIDATE_INT)) {
                $gap = readline('Le décalage doit être un nombre positif!.Réessayez : ');
                echo "\n";
            }

            $msg = [];
            $encryptMessageTable = [];

            for ($i = 0; $i < strlen($text); $i++) {
                if ($text[$i] >= 'A' && $text[$i] <= 'Z') {
                    $msg[] = (((ord($text[$i]) - ord('A')) - $gap + 26) % 26) + ord('A');
                }
                elseif ($text[$i] >= 'a' && $text[$i] <= 'z') {
                    $msg[] = (((ord($text[$i]) - ord('a')) - $gap + 26) % 26) + ord('a');
                }
                else {
                    $msg[] = ord($text[$i]);
                }
            }
            for ($i = 0; $i < count($msg); $i++) {
                $encryptMessageTable[] = chr($msg[$i]);
            }
            echo $text . ' décrypté est : ' . implode('', $encryptMessageTable) . "\n";
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