<?php
$aLetters = fGetLettersArray();
$aWords = fGetFileWordsArray();
$iIndexWord = rand(0, count($aWords));
$sWord = strtolower(trim($aWords[$iIndexWord]));
$iWordLength = strlen($sWord); // si mot contenant des accent alors utiliser mb_strlen pour préciser l'encodage car strlen comptera 2 pour un caracter accentuer
for($i=0; $i < $iWordLength; $i++) {
    $sHiddenWord .= REPLACEMENT_CHAR;
}
$sSerializedLetters = urlencode(serialize($aLetters));
$iRemainingTrials = MAX_TRIALS;
