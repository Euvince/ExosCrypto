<?php 

/* 
    while(true) {
        $gap = readline('Entrez le décalage que vous souhaitez appliquer : ');
        if (filter_var($gap, FILTER_VALIDATE_INT) !== false && (int)$gap > 0) {
            $gap = (int)$gap;
            break;
        } 
        else {
            $gap = readline('Le décalage doit être positif!.Réessayez : ');
        }
    } 
    echo 'Bonjour'; 
*/

$choice = readline('Entrez l\'Opération à éffectuer : 1-Pour crypter, 2-Pour décrypter : ');

switch ($choice) {
    case 1 : 
        $text = readline('Entrez le message à crypter : ');
        $gap = readline('Entrez le décalage que vous souhaitez appliquer : ');

        while(!filter_var($gap, FILTER_VALIDATE_INT)) {
            $gap = readline('Le décalage doit être un nombre positif!.Réessayez : ');
        }

        $msg = [];
        $encryptMessageTable = [];

        for ($i = 0; $i < strlen($text); $i++) {
            $msg[] = ord($text[$i]) + $gap;
        }
        for ($i = 0; $i < count($msg); $i++) {
            $encryptMessageTable[] = chr($msg[$i]);
        }

        $encryptMessage = implode('', $encryptMessageTable);
        echo $text . ' crypté est : ' . $encryptMessage;
        break;
    case 2 : 
        $text = readline('Entrez le message à décrypter : ');
        $gap = readline('Entrez le décalage que vous souhaitez appliquer : ');

        while(!filter_var($gap, FILTER_VALIDATE_INT)) {
            $gap = readline('Le décalage doit être un nombre positif!.Réessayez : ');
        }

        $msg = [];
        $encryptMessageTable = [];

        for ($i = 0; $i < strlen($text); $i++) {
            $msg[] = ord($text[$i]) - $gap;
        }
        for ($i = 0; $i < count($msg); $i++) {
            $encryptMessageTable[] = chr($msg[$i]);
        }

        $encryptMessage = implode('', $encryptMessageTable);
        echo $text . ' décrypté est : ' . $encryptMessage;
        break;

    default : 
        echo 'Choix Invalide';
        break;
}

?>